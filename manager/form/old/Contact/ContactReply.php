<?php ob_start(); ?>
<?php
	include_once("../../class/Manager.php");
	include_once("ContactParame.php");
	include_once("../../inc/Fun.php"); 			//公用程序
	include_once("../../inc/CheckHead.php"); 	//權限檢查
	include_once("../../inc/LevelOne.php"); 	//更新狀態與排序
	//層級
	$Level = 1;
	//標題文字
	$TableTitle = $Title02;
	//列表檔案名稱
	$MainFileName = $MainFileName01;
	//修改資料庫名稱
	$DBTable = $DatabaseName02;
	// 欄位名稱
	$DBFieldName = array();
	$SQL = "SHOW FULL FIELDS FROM ". $DatabaseName01;
	$Rs = $Conn->prepare($SQL);
	$Rs->execute();
	while($Row = $Rs->fetch(PDO::FETCH_ASSOC)){
		$DBFieldName[$Row["Field"]] = $Row["Comment"];
	}
	// 查詢參數
	$QueryParame = array();
	//接收參數
	$Option = $_REQUEST["option"];
	$YesNo = $_REQUEST["YesNo"];
	$SerialNo = $_REQUEST["SerialNo"];
	$FieldName = $_REQUEST["FieldName"];
	for($i=0;$i<=$Level;$i++){
		$G[$i] = $_REQUEST["G".$i];
		$SF[$i] = $_REQUEST["SF".$i];
		$SK[$i] = $_REQUEST["SK".$i];
		$TS[$i] = $_REQUEST["TS".$i];
		$P[$i] = $_REQUEST["P".$i];
	}
	
	//狀態設定
	$StatusItem[0] = "未處理";
	$StatusItem[1] = "已處理";
	$M = new Manager();
	$M->AddSelect2("Status",$DBFieldName["Status"],true,$StatusItem,$StatusItem,"未處理");		
	$M->AddDate("PostDate",$DBFieldName["PostDate"],true,date("Y-m-d"));
	$M->AddText("Name",$DBFieldName["Name"],true);
	$M->AddEMail("EMail",$DBFieldName["EMail"],true);
	$M->AddText("Tel",$DBFieldName["Tel"],true);
	$M->AddText("Subject",$DBFieldName["Subject"],true);
	$M->AddNote2("Note",$DBFieldName["Note"],true);
	$M2 = new Manager();
	$M2->AddNote1("ReplyNote","回覆內容",true);
	$Option="Modify";
	if($Option=="Add"){
		
	}elseif($Option=="Modify"){
		//各項參數
		$TopTitle="修改-".$TableTitle;
		$MFun="ReadShow";
		$Action=GetSCRIPTNAME()."?option=$Option&YesNo=true";
		$ButFun="cmdUpdate_onclick()";
		$SQL="Select * From " . $DBTable . " Where G0 = :G0";
		$Rs = $Conn->prepare($SQL);
		$Rs->bindParam(":G0", $G[0]);
		$Rs->execute();
		$Row = $Rs->fetch(PDO::FETCH_ASSOC);
		if($Row){
			$M2->SetAddStatus("ReplyNote",true);
		}
		$SQL="Select * From ".$DatabaseName01." Where SerialNo= :SerialNo";
		$Rs = $Conn->prepare($SQL);
		$Rs->bindParam(":SerialNo", $G[0]);
		$Rs->execute();
		$Row = $Rs->fetch(PDO::FETCH_ASSOC);
		if(!$Row){
			ReturnToPage($MainFileName,"查無此筆資料",$UrlCode);
		}
		if($YesNo=="true"){
			//檢查資料是否存在			
			$M2->GetDataHandle();
			$M2->AddHandle();
			if($AddFieldsSQL != ""){ $AddFieldsSQL .= ","; $AddValuesSQL .= ","; }
			$AddFieldsSQL .= "G".($Level-1)."";
			$AddValuesSQL .= ":G".($Level-1);
			$QueryParame[":G".($Level-1)] = $G[$Level-1];
			$SQL = "Insert Into ".$DBTable."(".$AddFieldsSQL.",`ReplyDate`) values(".$AddValuesSQL.",NOW())";
			$Rs = $Conn->prepare($SQL);
			foreach($M2->Param as $Field => $Value){
				$Rs->bindParam($Field, $M2->Param[$Field]);
			}
			foreach($QueryParame as $Key => $Value){
				$Rs->bindParam($Key, $QueryParame[$Key],PDO::PARAM_INT);
			}
			$Rs->execute();
			// 查詢聯絡我們回覆信件內容
			$Mail = array();
			$SQL = "Select * From systememail Where SerialNo = 1";
			$Rs = $Conn->prepare($SQL);
			$Rs->execute();
			$Row = $Rs->fetch(PDO::FETCH_ASSOC);
			$Mail["Subject"] = $Row["Subject"];
			$Mail["Note"] = ReplaceEditorMail($Row["Note"]);

			// 查詢網站基本資料
			$SQL = "Select * From web";
			$Rs = $Conn->prepare($SQL);
			$Rs->execute();
			$Web = $Rs->fetch(PDO::FETCH_ASSOC);
			// 取代信件內容
			foreach($Web as $Field => $Value){
				$Mail["Subject"] = str_replace("{web_".$Field."}", $Value,$Mail["Subject"]);
				$Mail["Note"] = str_replace("{web_".$Field."}", $Value,$Mail["Note"]);
			}

			// 查詢聯絡我們內容
			$SQL="Select * From " . $DatabaseName01 . " Where SerialNo = :SerialNo";
			$Rs = $Conn->prepare($SQL);
			$Rs->bindParam(":SerialNo", $G[0]);
			$Rs->execute();
			$Contact = $Rs->fetch(PDO::FETCH_ASSOC);
			// 取代信件內容
			foreach($Contact as $Field => $Value){
				$Mail["Subject"] = str_replace("{db_".$Field."}", $Value,$Mail["Subject"]);
				$Mail["Note"] = str_replace("{db_".$Field."}", $Value,$Mail["Note"]);
			}
			
			// 變數
			$Var = array();
			$Var["data"] = "";
			$Var["host"] = getHostUrl();
			
			$IsFirstEMailNoteFields = true;
			$EMailNoteFields = array();
			$EMailNoteFields["問題內容"] = ReplaceEditorMail($Contact["Note"]);
			$EMailNoteFields["回覆內容"] = ReplaceEditorMail($M2->data["ReplyNote"]);
			$Var["data"] .= "<table width=\"650\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
			foreach($EMailNoteFields As $EMailNotekeys => $EMailNotevalue){
				$Var["data"] .= "<tr>\n";
				if($IsFirstEMailNoteFields){
					$Var["data"] .= "<td width=\"100\" align=\"center\" valign=\"middle\" style=\"background-color:#E6E6E6;border:1px solid #000;padding:5px 5px;\">".$EMailNotekeys."</td>\n";
					$Var["data"] .= "<td width=\"550\" align=\"left\" style=\"border:1px solid #000;border-width:1px 1px 1px 0px;padding:5px 5px;\">".$EMailNotevalue."</td>\n";
				}else{
					$Var["data"] .= "<td align=\"center\" valign=\"middle\" style=\"background-color:#E6E6E6;border:1px solid #000;border-width:0px 1px 1px 1px;padding:5px 5px;\">".$EMailNotekeys."</td>\n";
					$Var["data"] .= "<td align=\"left\" style=\"border:1px solid #000;border-width:0px 1px 1px 0px;padding:5px 5px;\">".$EMailNotevalue."</td>\n";
				}
				$Var["data"] .= "</tr>\n";
				$IsFirstEMailNoteFields = false;
			}
			$Var["data"] .= "</table>\n";
			
			// 取代信件內容
			foreach($Var as $Field => $Value){
				$Mail["Subject"] = str_replace("{var_".$Field."}", $Value,$Mail["Subject"]);
				$Mail["Note"] = str_replace("{var_".$Field."}", $Value,$Mail["Note"]);
			}
			$HtmlHead = "";
			$HtmlFooter = "";
			$HtmlHead .= "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
			$HtmlHead .= "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";
			$HtmlHead .= "<head>\n";
			$HtmlHead .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
			$HtmlHead .= "</head>\n";
			$HtmlHead .= "<body>\n";
			$HtmlFooter .= "</body>\n";
			$HtmlFooter .= "</html>\n";
			$Mail["Note"] = $HtmlHead.$Mail["Note"].$HtmlFooter;
			//寄送信件
			// include_once("ContactEMail.php");
			$MailObj = new SendMail();
			$MailObj->SetFrom($Web["ManagerEmail"],$Web["ManagerEmail"]);
			$MailObj->AddTo($Contact["Name"],$Contact["EMail"]);
			$MailObj->Send($Mail["Subject"],$Mail["Note"]);
			
			
			//更新聯絡我們狀態
			$SQL="Update " . $DatabaseName01 . " Set Status = '已處理' Where SerialNo = :SerialNo";
			$Rs = $Conn->prepare($SQL);
			$Rs->bindParam(":SerialNo", $G[0]);
			$Rs->execute();
			ReturnToPage($MainFileName,"修改完成","");
		}
		
	}elseif($Option=="Download"){
		$SerialNo = $_REQUEST["SerialNo"];
		$FieldName = $_REQUEST["FieldName"];
		$SQL="Select * From ".$DBTable." Where SerialNo = :SerialNo";
		$Rs = $Conn->prepare($SQL);
		$Rs->bindParam(":SerialNo", $SerialNo);
		$Rs->execute();
		$Row = $Rs->fetch(PDO::FETCH_ASSOC);
		FileHandle::Downloadfile($M->Fields[$FieldName]->FilePath.$Row[$M->Fields[$FieldName]->FieldNameHidden],$Row[$M->Fields[$FieldName]->FieldName]);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include_once('../../inc/IncludeScript.php'); ?>
<?php $M->AddScript(); ?>
<script language="javascript" type="text/javascript">
$(function(){
	
});
//新增按鈕
function cmdAdd_onclick(){
	var sError="";
	<?php $M->CheckScript(); ?>
	if(sError!=""){alert(sError);}
	else{$("#form1").submit();} 
}
//修改按鈕
function cmdUpdate_onclick(){
	var sError="";
	<?php $M2->CheckScript(); ?>
	var msg="是否確定要回覆？";
	if(sError!=""){alert(sError);}
	else{if(confirm(msg)){$("#form1").submit();}}
}
//取消按鈕
function cmdCancel_onclick(){
	<?php
	$VarString = $UrlCode;
	for($i=0;$i<=$Level;$i++){if($VarString!=""){$VarString.="&";}if($i!=$Level){$VarString .="G".$i."=".$G[$i];}}
	for($i=0;$i<=$Level;$i++){if($VarString!=""){$VarString.="&";}$VarString .="SF".$i."=".$SF[$i];}
	for($i=0;$i<=$Level;$i++){if($VarString!=""){$VarString.="&";}$VarString .="SK".$i."=".$SK[$i];}
	for($i=0;$i<=$Level;$i++){if($VarString!=""){$VarString.="&";}$VarString .="TS".$i."=".$TS[$i];}
	for($i=0;$i<=$Level;$i++){if($VarString!=""){$VarString.="&";}$VarString .="P".$i."=".$P[$i];}
	if($VarString!=""){$VarString = "?".$VarString;}
	echo "window.location.href =\"".$MainFileName.$VarString."\"\n";
	?>
}
</script>
</head>
<body>
<table cellpadding="0" cellspacing="0" border="0" width="100%">
	<tr>
	
		<td align="center">
			<table width="560" cellpadding="0" cellspacing="0" bordercolorlight="#FFFFFF" style="border:solid #A3BFE2 1px;margin-bottom:25px" border="0" bgcolor="#FFFFE1">
				<tr>
					<td bgcolor="#E0EFF8" align="center" height="30" style="font-size:12pt;color:#000000">
						<img src="../../images/computer.gif" BORDER="0" align="absmiddle">&nbsp;<?php echo $TopTitle; ?>&nbsp;&nbsp;&nbsp;
					</td>
				</tr>
			</table>		
		</td>
	</tr>
	<tr>
		<td align="center">
			<form action="<?php echo $Action?>" method="POST" id="form1" name="form1" enctype="multipart/form-data" >
			<?php
			for($i=0;$i<=$Level;$i++){
				echo "<input type=\"hidden\" name=\"G".$i."\" id=\"G".$i."\" value=\"".$G[$i]."\"/>\n";
				echo "<input type=\"hidden\" name=\"SF".$i."\" id=\"SF".$i."\" value=\"".$SF[$i]."\"/>\n";
				echo "<input type=\"hidden\" name=\"SK".$i."\" id=\"SK".$i."\" value=\"".$SK[$i]."\"/>\n";
				echo "<input type=\"hidden\" name=\"TS".$i."\" id=\"TS".$i."\" value=\"".$TS[$i]."\"/>\n";
				echo "<input type=\"hidden\" name=\"P".$i."\" id=\"P".$i."\" value=\"".$P[$i]."\"/>\n";
			}	
			 for($i=0;$i<count($QueryList);$i++){                           
				echo "<input type=\"hidden\" name=\"".$QueryList[$i]."\" id=\"H_".$QueryList[$i]."\" value=\"".$_REQUEST[$QueryList[$i]]."\"/>\n";
			}
			?>
			<table width="600" border="1" cellspacing="0" bordercolorlight="#666666" bordercolordark="#FFFFFF">
				<tr> 
					<td>
						<table border="0" bgcolor="#A3BFE2" cellspacing="1" cellpadding="5" width="100%" style="font-size:10pt">
						<?php $M->{$MFun}() ?>
						<?php $Status = $Row["Status"]; ?>
						<?php
							//檢查資料是否存在
							$SQL="Select * From " . $DBTable . " Where G0 = :G0";
							$Rs = $Conn->prepare($SQL);
							$Rs->bindParam(":G0", $G[0]);
							$Rs->execute();
							$Row = $Rs->fetch(PDO::FETCH_ASSOC);
							if($Row){
								$M2->ModifyShow();
							}else{
								$M2->AddShow();
							}
						?>
						</table>
					</td>
				</tr>
			</table>
			<?php
				if(!$Row){
			?>
			<input type="button" value="確定" id="cmdEnter" name="cmdEnter" onclick="<?php echo $ButFun?>">&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="button" value="取消" id="cmdCancel" name="cmdCancel" onClick="cmdCancel_onclick();">
			<?php
				}else{
			?>
			<input type="button" value="回上頁" id="cmdCancel" name="cmdCancel" onClick="cmdCancel_onclick();">
			<?php	
				}
			?>
			</form>		
		</td>
	</tr>	
</table>
</body>
</html>
<?php ob_flush(); ?>