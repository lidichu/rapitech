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
	//語言版本狀態設定

	$M = new Manager();
	
	//性別
	$SexValue[] = "";
	$SexValue[] = "Male";
	$SexValue[] = "Female";
	$SexText[] = "請選擇";
	$SexText[] = "男";
	$SexText[] = "女";	
	
	$M->AddSelect2("Status","狀態",true,$StatusItem,$StatusItem,"未處理");	
	$M->AddDate("PostDate","日期",true,date("Y-m-d"));
	$M->AddText("Subject","主旨",true);
	$M->AddText("Name","姓名",true);
	$M->AddSelect2("Sex","性別",false,$SexText,$SexValue,"");	
	$M->AddText("Tel","電話",true);
	$M->AddEMail("EMail","信箱",true);
	$M->AddText("Address","地址",true);
	$M->AddNote2("Note","內容",true);
	$M->SetAddStatus("Status",true);
	$M->SetAddStatus("PostDate",true);
	$M->SetAddStatus("Subject",true);
	$M->SetAddStatus("Name",true);
	$M->SetAddStatus("Sex",true);
	$M->SetAddStatus("Tel",true);
	$M->SetAddStatus("EMail",true);
	$M->SetAddStatus("Address",true);	
	$M->SetAddStatus("Note",true);
	
	$M2 = new Manager();
	$M2->AddNote1("ReplyNote","回覆內容",true);

	//新增用SQL
	$AddFieldsSQL = "";
	$AddValuesSQL = "";
	
	//修改用SQL
	$ModifySQL = "";
	
	//查詢用
	$Row=null;
	
	$Option = "Modify";
	switch ($Option) {
		case "Modify":
			Modify();
			break;
		case "Download":
			Download();
			break;			
	}
	
function Modify(){
	global $Level,$TableTitle,$MainFileName,$DBTable,$M,$M2,$G,$SF,$SK,$TS,$P,$YesNo,$AddFieldsSQL,$AddValuesSQL,$ModifySQL,$Conn,$Row;
	global $DatabaseName01;
	$SQL="Select * From " . $DBTable . " Where G0 = " . $G[0];
	$Rs = mysql_query($SQL,$Conn);
	if($Rs && mysql_num_rows($Rs) > 0){
		$M2->SetAddStatus("ReplyNote",true);
	}
	$SQL="Select * From ".$DatabaseName01." Where SerialNo=".$G[0];
	$Rs = mysql_query($SQL,$Conn);
	if($Rs && (mysql_num_rows($Rs)>0)){
		$Row = mysql_fetch_array($Rs);
	}else{
		ReturnToPage($MainFileName,"查無此筆資料","");
	}
	
	if($YesNo=="true"){
		//檢查資料是否存在
		$SQL="Select * From " . $DBTable . " Where G0 = " . $G[0];
		$Rs = mysql_query($SQL,$Conn);
		if($Rs && mysql_num_rows($Rs) > 0){
			$M2->ModifyHandle();
			$Query = "Update ".$DBTable." Set ".$ModifySQL." Where SerialNo=".$G[$Level];
			mysql_query($Query,$Conn);					
		}else{
			$M2->AddHandle();
			if($M2->haveG){
				$SQL = "Insert Into ".$DBTable."(".$AddFieldsSQL.",`ReplyDate`) values(".$AddValuesSQL.",NOW())";
			}else{
				$SQL = "Insert Into ".$DBTable."(".$AddFieldsSQL.",G".($Level-1).",`ReplyDate`) values(".$AddValuesSQL.",".$G[$Level-1].",NOW())";
			}
			mysql_query($SQL,$Conn);

			//取得回覆流水號
			$ReplySerialNo = mysql_insert_id();
			
			

			$script_filename = getenv('SCRIPT_NAME');
			$script_filenameArray = explode("/",$script_filename);
			$baseUrli = 0;
			for($i=0;$i<count($script_filenameArray);$i++){
				if($script_filenameArray[$i]=="manager"){
					$baseUrli = $i;
					break;
				}
			}
			$baseUrl = "";
			for($i=1;$i<$baseUrli;$i++){
				if($script_filenameArray[$i]!=""){
					if($baseUrl!=""){$baseUrl .= "/";}
					$baseUrl = $baseUrl.$script_filenameArray[$i];
				}
			}	
			
			if($baseUrl!=""){$baseUrl = "/" . $baseUrl . "/";}			
			
			//查詢聯絡我們內容
			$SQL="Select * From " . $DatabaseName01 . " Where SerialNo = " . $G[0];
			$Rs = mysql_query($SQL,$Conn);
			if($Rs && mysql_num_rows($Rs) > 0){
				$Row = mysql_fetch_array($Rs);
				$PostedName = $Row["Name"];
				$PostedEMail = $Row["EMail"];
				$Postedlang = $Row["Lang"];
				$PostedSubject = $Row["Subject"];
				$PostedNote = htmlspecialchars_decode($Row["Note"]);
			}
			
			//查詢網站資訊
			$SQL = "Select * From web";
			$Rs = mysql_query($SQL,$Conn);
			if($Rs && mysql_num_rows($Rs) > 0){
				$Row = mysql_fetch_array($Rs);
				$WebTitle = $Row["WebTitle".$Postedlang];
				$ManagerEmail = $Row["ManagerEmail"];
				$EMailServer = $Row["EMailServer"];
			}			
			
			
			//查詢回覆內容
			$SQL="Select * From " . $DBTable . " Where SerialNo = " . $ReplySerialNo;
			$Rs = mysql_query($SQL,$Conn);
			if($Rs && mysql_num_rows($Rs) > 0){
				$Row = mysql_fetch_array($Rs);
				$ReplyNote = str_replace("{VisualRoot}","http://".$_SERVER["HTTP_HOST"] . $baseUrl ."/files/Upload/",htmlspecialchars_decode($Row["ReplyNote"]));
			}
			$EMailNoteFields = array();
			$EMailNoteFields["留言內容"] = $PostedNote;
			$EMailNoteFields["回覆內容"] = $ReplyNote;
			$EMailName = $PostedName;
			$CompanyName = $WebTitle;
			$CompanyEMail = $ManagerEmail;
			$CompanyURL = "http://".$_SERVER["HTTP_HOST"].$baseUrl;
			//處理EMail
			include_once("../../inc/EMail/ContactReplyCh.php");
			//寄送信件
			SendMail($WebName,$ManagerEmail,$PostedName,$PostedEMail,"Re：".$PostedSubject,$EMailNote,$ManagerEmailAccount,$EMailServer,$ManagerEmailPWD);
		}
		
		//更新聯絡我們狀態
		$SQL="Update " . $DatabaseName01 . " Set Status = '已處理' Where SerialNo = " . $G[0];
		mysql_query($SQL,$Conn);
		
		ReturnToPage($MainFileName,"修改完成","");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" type="text/javascript" src="../../script/jquery.js"></script>
<script language="javascript" type="text/javascript" src="../../script/fun.js"></script>
<script language="javascript" type="text/javascript" src="../../script/NumText.js"></script>
<script language="javascript" src="../../script/My97DatePicker/WdatePicker.js"></script>
<script language="javascript" src="../../ckeditor/ckeditor.js"></script>
<?php $M->ModifyScript(); ?>
<?php $M2->ModifyScript(); ?>
<script language="javascript" type="text/javascript">
function cmdUpdate_onclick(){
	var sError="";
	<?php $M->CheckScript(); ?>
	<?php $M2->CheckScript(); ?>
	var msg="是否確定要修改？";
	if(sError!=""){alert(sError);}
	else{if(confirm(msg)){$("#form1").submit();}}
}
function cmdCancel_onclick(){
	<?php
	$VarString = "";
	for($i=0;$i<=$Level;$i++){if($VarString!=""){$VarString.="&";}$VarString .="G".$i."=".$G[$i];}
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
			<table width="560" cellpadding="0" cellspacing="0" bordercolorlight="#FFFFFF" style="border:solid #A3BFE2 1px" border="0" bgcolor="#FFFFE1">
				<tr>
					<td bgcolor="#E0EFF8" align="center" height="30" style="font-size:12pt;color:#000000">
						<img src="../../images/computer.gif" BORDER="0" align="absmiddle">&nbsp;<?php echo $TableTitle; ?>&nbsp;&nbsp;&nbsp;
					</td>
				</tr>
			</table>		
		</td>
	</tr>
	<tr>
		<td align="center">
			<form action="<?php echo GetSCRIPTNAME();?>?option=Modify&YesNo=true" method="POST" id="form1" name="form1" style="margin:0px;padding:0px;margin-top:40px;" enctype="multipart/form-data">
			<?php
			for($i=0;$i<=$Level;$i++){
				echo "<input type=\"hidden\" name=\"G".$i."\" id=\"G".$i."\" value=\"".$G[$i]."\"/>\n";
				echo "<input type=\"hidden\" name=\"SF".$i."\" id=\"SF".$i."\" value=\"".$SF[$i]."\"/>\n";
				echo "<input type=\"hidden\" name=\"SK".$i."\" id=\"SK".$i."\" value=\"".$SK[$i]."\"/>\n";
				echo "<input type=\"hidden\" name=\"TS".$i."\" id=\"TS".$i."\" value=\"".$TS[$i]."\"/>\n";
				echo "<input type=\"hidden\" name=\"P".$i."\" id=\"P".$i."\" value=\"".$P[$i]."\"/>\n";
			}	
			?>
			<table width="600" border="1" cellspacing="0" bordercolorlight="#666666" bordercolordark="#FFFFFF">
				<tr> 
					<td>
						<table border="0" bgcolor="#A3BFE2" cellspacing="1" cellpadding="5" width="100%" style="font-size:10pt">
						<?php $M->ModifyShow() ?>
						<?php
							//檢查資料是否存在
							$SQL="Select * From " . $DBTable . " Where G0 = " . $G[0];
							$Rs = mysql_query($SQL,$Conn);
							if($Rs && mysql_num_rows($Rs) > 0){
								$Row = mysql_fetch_array($Rs);
								$M2->ModifyShow();
							}else{
								$M2->AddShow();
							}
						?>
						</table>
					</td>
				</tr>
			</table>
			<input type="button" value="確定" id="cmdEnter" name="cmdEnter" onclick="cmdUpdate_onclick();">&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="button" value="取消" id="cmdCancel" name="cmdCancel" onClick="cmdCancel_onclick();">
			</form>		
		</td>
	</tr>	
</table>
</body>
</html>
<?php	
}
?>
<?php
function Download(){
	global	$Level,$TableTitle,$MainFileName,$DBTable,$M,$G,$SF,$SK,$TS,$P,$YesNo,$ModifySQL,$Conn,$Row,$SerialNo,$FieldName;
	$SQL="Select * From ".$DBTable." Where SerialNo=".$SerialNo;
	$Rs = mysql_query($SQL,$Conn);
	if($Rs && (mysql_num_rows($Rs)>0)){
		$Row = mysql_fetch_array($Rs);
		FileHandle::Downloadfile($M->Fields[$FieldName]->FilePath.$Row[$M->Fields[$FieldName]->FieldNameHidden],$Row[$M->Fields[$FieldName]->FieldName]);
	}else{
		die("檔案不存在");
	}
}
?>
<?php ob_flush(); ?>