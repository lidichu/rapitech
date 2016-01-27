<?php ob_start(); ?>
<?php
	include_once("../../class/Manager.php");
	include_once("NewsParame.php");
	include_once("../../inc/Fun.php"); 			//公用程序
	include_once("../../inc/CheckHead.php"); 	//權限檢查
	include_once("../../inc/LevelOne.php"); 	//更新狀態與排序
	//層級
	$Level = 1;
	//標題文字
	$TableTitle = $Title02_1;
	//列表檔案名稱
	$MainFileName = $MainFileName02_1;
	//修改資料庫名稱
	$DBTable = $DatabaseName02_1;
	//接收參數
	$Option = $_REQUEST["option"];
	$YesNo = $_REQUEST["YesNo"];
	for($i=0;$i<=$Level;$i++){
		$G[$i] = $_REQUEST["G".$i];
		$SF[$i] = $_REQUEST["SF".$i];
		$SK[$i] = $_REQUEST["SK".$i];
		$TS[$i] = $_REQUEST["TS".$i];
		$P[$i] = $_REQUEST["P".$i];
	}
	//狀態設定
	$StatusItem[0] = "上架";
	$StatusItem[1] = "下架";
	//接收列表
	$QueryList=Array();
	$UrlCode="";
	for($i=0;$i<count($QueryList);$i++){
		if($_REQUEST[$QueryList[$i]]!=""){
			$UrlCode.="&".$QueryList[$i]."=".$_REQUEST[$QueryList[$i]];
		}
	}
		//開啟方式狀態設定
	$TargetWindowValue[0] = "_self";
	$TargetWindowValue[1] = "_blank";
	$TargetWindowItem[0] = "本頁開啟";
	$TargetWindowItem[1] = "另開新視窗";	
	
	$M = new Manager();
	$M->AddNum("Sort","排序",true,4,"","9999");
	$M->AddSelect2("Status","狀態",true,$StatusItem,$StatusItem,"上架");
	$M->AddText("Title","標題",true);
	$M->AddURL("LinkUrl","網址",true,"");
	$M->AddSelect2("TargetWindow","開啟方式",true,$TargetWindowItem,$TargetWindowValue,"_blank");		
	
	//新增用SQL
	$AddFieldsSQL = "";
	$AddValuesSQL = "";
	
	//修改用SQL
	$ModifySQL = "";
	if($Option=="Add"){
		//各項參數
		$TopTitle="新增-".$TableTitle;
		$MFun="AddShow";
		$SFun="AddScript";
		$Action=GetSCRIPTNAME()."?option=$Option&YesNo=true";
		$ButFun="cmdAdd_onclick()";
		
		if($YesNo=="true"){
			$M->AddHandle();
			if($Level > 0){
				if($AddFieldsSQL != ""){
					$AddFieldsSQL .= ",";
					$AddValuesSQL .= ",";
				}
				$AddFieldsSQL .= "G".($Level-1)."";
				$AddValuesSQL .= ":G".($Level-1);
				$QueryParame[":G".($Level-1)] = $G[$Level-1];
			}
			$SQL = "Insert Into ".$DBTable."(".$AddFieldsSQL.") values(".$AddValuesSQL.")";
			$Rs = $Conn->prepare($SQL);
			foreach($M->Param as $Field => $Value){
				$Rs->bindParam($Field, $M->Param[$Field]);
			}
			foreach($QueryParame as $Key => $Value){
				$Rs->bindParam($Key,$QueryParame[$Key]);
			}
			$Rs->execute();
			ReturnToPage($MainFileName,"新增完成",$UrlCode);
		}
	}elseif($Option=="Modify"){
		$TopTitle="修改-".$TableTitle;
		$MFun="ModifyShow";
		$SFun="ModifyScript";
		$Action=GetSCRIPTNAME()."?option=$Option&YesNo=true";
		$ButFun="cmdUpdate_onclick()";
		//讀取資料
		$SQL="Select * From ".$DBTable." Where SerialNo = :SerialNo";
		$Rs = $Conn->prepare($SQL);
		$Rs->bindParam(":SerialNo", $G[$Level]);
		$Rs->execute();
		$Row = $Rs->fetch(PDO::FETCH_ASSOC);
		if(!$Row){
			ReturnToPage($MainFileName,"查無此筆資料",$UrlCode);
		}
		//修改資料
		if($YesNo=="true"){
			$M->ModifyHandle();
			$SQL = "Update ".$DBTable." Set ".$ModifySQL." Where SerialNo= :SerialNo";
			$Rs = $Conn->prepare($SQL);
			foreach($M->Param as $Field => $Value){
				$Rs->bindParam($Field, $M->Param[$Field]);
			}
			$Rs->bindParam(":SerialNo", $G[$Level]);
			$Rs->execute();
			ReturnToPage($MainFileName,"修改完成",$UrlCode);
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
<?php $M->{$SFun}() ?>
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
	<?php $M->CheckScript(); ?>
	var msg="是否確定要修改？";
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
						</table>
					</td>
				</tr>
			</table>
			<input type="button" value="確定" id="cmdEnter" name="cmdEnter" onclick="<?php echo $ButFun?>">&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="button" value="取消" id="cmdCancel" name="cmdCancel" onClick="cmdCancel_onclick();">
			</form>		
		</td>
	</tr>	
</table>
</body>
</html>
<?php ob_flush(); ?>