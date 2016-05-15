<?php ob_start(); ?>
<?php
	include_once("../../class/Manager.php");
	include_once("BannerParame.php");
	include_once("../../inc/Fun.php"); 			//公用程序
	include_once("../../inc/CheckHead.php"); 	//權限檢查
	include_once("../../inc/LevelOne.php"); 	//更新狀態與排序
	//層級
	$Level = 0;
	//標題文字
	$TableTitle = $Title01;
	//列表檔案名稱
	$MainFileName = $MainFileName01;
	//修改資料庫名稱
	$DBTable = $DatabaseName01;
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
	foreach($UploadPic as $Key => $Value){
		$PICRootArray[] = $Value["Root"];
		$PICWidthArray[] = $Value["Width"];
		$PICHeightArray[] = $Value["Height"];
		$PICBoxArray[] = false;
	}
	$PICBoxArray[1] = true;
	$M = new Manager();
	$M->AddPIC3("PIC","Banner圖片",true,$PICRootArray,$PICWidthArray,$PICHeightArray,"圖片建議寬度為 1003 x 402 像素","","","","PICHidden",$PICBoxArray,334,112,$UploadPic["PIC"]["Root"]);
	
	//新增用SQL
	$AddFieldsSQL = "";
	$AddValuesSQL = "";
	
	//修改用SQL
	$ModifySQL = "";
	//查詢用
	$Row=null;
	
	switch ($Option) {
		case "Add":
			Add();
			break;
		case "Modify":
			Modify();
			break;
		case "Download":
			Download();
			break;
	}

//新增處理
function Add(){
	global	$Level,$TableTitle,$MainFileName,$DBTable,$M,$G,$SF,$SK,$TS,$P,$YesNo,$AddFieldsSQL,$AddValuesSQL,$Conn;
	if($YesNo=="true"){	

		$M->AddHandle();
		$SQL = "Insert Into ".$DBTable."(".$AddFieldsSQL.",`Sort`,`Status`) values(".$AddValuesSQL.",9999,'上架')";
		mysql_query($SQL,$Conn);
		exit();
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
<link href="css/default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="swfupload/swfupload.js"></script>
<script type="text/javascript" src="js/swfupload.queue.js"></script>
<script type="text/javascript" src="js/fileprogress.js"></script>
<script type="text/javascript" src="js/handlers.js"></script>
<script type="text/javascript">
	var upload1, upload2;
	window.onload = function() {
		upload1 = new SWFUpload({
			// Backend Settings
			upload_url: "<?php echo GetSCRIPTNAME();?>",
			post_params: {
				"PHPSESSID" : "<?php echo session_id(); ?>",
				"YesNo":"true",
				"option":"Add",
			<?php
			for($i=0;$i<=$Level;$i++){
				echo "\"G".$i."\":\"".$G[$i]."\",\n";
				echo "\"SF".$i."\":\"".$SF[$i]."\",\n";
				echo "\"SK".$i."\":\"".$SK[$i]."\",\n";
				echo "\"TS".$i."\":\"".$TS[$i]."\",\n";
				echo "\"P".$i."\":\"".$P[$i]."\",\n";
			}	
			?>			
				"id":"<?php echo($_COOKIE["id"]);?>",
				"pw":"<?php echo($_COOKIE["pw"]);?>"
			},
			// File Upload Settings
			file_post_name:"PIC",
			file_size_limit : "102400",	// 100MB
			file_types : "*.*",
			file_types_description : "All Files",
			file_upload_limit : "1000",
			file_queue_limit : "0",

			// Event Handler Settings (all my handlers are in the Handler.js file)
			file_dialog_start_handler : fileDialogStart,
			file_queued_handler : fileQueued,
			file_queue_error_handler : fileQueueError,
			file_dialog_complete_handler : fileDialogComplete,
			upload_start_handler : uploadStart,
			upload_progress_handler : uploadProgress,
			upload_error_handler : uploadError,
			upload_success_handler : uploadSuccess,
			upload_complete_handler : uploadComplete,

			// Button Settings
			button_image_url : "Upload.png",
			button_placeholder_id : "spanButtonPlaceholder1",
			button_width: 61,
			button_height: 22,
			
			// Flash Settings
			flash_url : "swfupload/swfupload.swf",
			custom_settings : {
				progressTarget : "fsUploadProgress1",
				cancelButtonId : "btnCancel1"
			},
			
			// Debug Settings
			debug: false
		});
	 }
</script>
<script language="javascript" type="text/javascript">
function cmdCancel_onclick(){
	<?php
	$VarString = "";
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
			<table width="560" cellpadding="0" cellspacing="0" bordercolorlight="#FFFFFF" style="border:solid #A3BFE2 1px" border="0" bgcolor="#FFFFE1">
				<tr>
					<td bgcolor="#E0EFF8" align="center" height="30" style="font-size:12pt;color:#000000">
						<img src="../../images/computer.gif" BORDER="0" align="absmiddle">&nbsp;新增-<?php echo $TableTitle; ?>&nbsp;&nbsp;&nbsp;
					</td>
				</tr>
			</table>		
		</td>
	</tr>
	<tr>
		<td align="center">
			<form action="<?php echo GetSCRIPTNAME();?>?option=Add&YesNo=true" method="POST" id="form1" name="form1" style="margin:0px;padding:0px;margin-top:40px;"  enctype="multipart/form-data" >
			<?php
			for($i=0;$i<=$Level;$i++){
				if($i!=$Level){
					echo "<input type=\"hidden\" name=\"G".$i."\" id=\"G".$i."\" value=\"".$G[$i]."\"/>\n";
				}	
				echo "<input type=\"hidden\" name=\"SF".$i."\" id=\"SF".$i."\" value=\"".$SF[$i]."\"/>\n";
				echo "<input type=\"hidden\" name=\"SK".$i."\" id=\"SK".$i."\" value=\"".$SK[$i]."\"/>\n";
				echo "<input type=\"hidden\" name=\"TS".$i."\" id=\"TS".$i."\" value=\"".$TS[$i]."\"/>\n";
				echo "<input type=\"hidden\" name=\"P".$i."\" id=\"P".$i."\" value=\"".$P[$i]."\"/>\n";
			}	
			?>
			<table width="600" border="1" cellspacing="0" bordercolorlight="#666666" bordercolordark="#FFFFFF">
				<tr> 
					<td>
						<div>
							<div style="padding-left: 5px;text-align:left">
								<span style="color:red">※ 圖片限制寬高 1002 * 366 像素</span><br />
								<span style="color:red">※ 按住 CTRL 即可多選檔案</span>
							</div>
							<br / >
							<div id="fsUploadProgress1">
								
							</div>
							<div style="padding-left: 5px;">
								<span id="spanButtonPlaceholder1"></span>
								<input id="btnCancel1" type="button" value="取消上傳" onclick="cancelQueue(upload1);" disabled="disabled" style="margin-left: 2px; height: 22px; font-size: 8pt;" />
								<br />
							</div>
							<div id="Message" style="display:none;text-align:left">
								<span style='color:red'>以下檔案找不到可對應商品：</span>
							</div>
						</div>
					</td>
				</tr>
			</table>
			<input type="button" value="回列表頁" id="cmdCancel" name="cmdCancel" onClick="cmdCancel_onclick();">
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
function Modify(){
	global	$Level,$TableTitle,$MainFileName,$DBTable,$M,$G,$SF,$SK,$TS,$P,$YesNo,$ModifySQL,$Conn,$Row;
	$SQL="Select * From ".$DBTable." Where SerialNo=".$G[$Level];
	$Rs = mysql_query($SQL,$Conn);
	if($Rs && (mysql_num_rows($Rs)>0)){
		$Row = mysql_fetch_array($Rs);
	}else{
		ReturnToPage($MainFileName,"查無此筆資料","");
	}
	if($YesNo=="true"){
		$M->ModifyHandle();
		$Query = "Update ".$DBTable." Set ".$ModifySQL." Where SerialNo=".$G[$Level];
		mysql_query($Query,$Conn);
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
<script language="javascript" type="text/javascript">
function cmdUpdate_onclick(){
	var sError="";
	<?php $M->CheckScript(); ?>
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
						<img src="../../images/computer.gif" BORDER="0" align="absmiddle">&nbsp;修改-<?php echo $TableTitle; ?>&nbsp;&nbsp;&nbsp;
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
	$SerialNo = $_REQUEST["SerialNo"];
	$FieldName = $_REQUEST["FieldName"];
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