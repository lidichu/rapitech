<?php session_start(); ?>
<?php $Root = ""; ?>
<?php $SdbRoot="../../"; ?>
<?php
	include_once("Mod_Data.php"); 	//載入參數檔
?>
<?php $Check_FileName=$Menu_File;	//有2功能,1:檢查權限用,2:使下面的程式超聯結本網頁?>
<?php
	$Title01 = $ModName;
	$Title02 = $ModName2;
	$Title03 = $ModName3;
	$Title03_2 = $ModName3_2;
	$Title04 = $ModName4;
	$Title05 = $ModName5;

	$UploadPic["Big"]["Path"] = $UploadPicPath2;
	$UploadPic["Big"]["Width"] = $UploadPicWidth2;
	$UploadPic["Big"]["Height"] = $UploadPicHeight2;
	$UploadPic["Big"]["BoxMode"] = $UploadPicMode2;
	
	$UploadPic["PIC"]["Path"] = $UploadPicPath;
	$UploadPic["PIC"]["Width"] = $UploadPicWidth;
	$UploadPic["PIC"]["Height"] = $UploadPicHeight;
	$UploadPic["PIC"]["BoxMode"] = $UploadPicMode;
	
	$UploadPic["Small"]["Path"] = $UploadPicPath3;
	$UploadPic["Small"]["Width"] = $UploadPicWidth3;
	$UploadPic["Small"]["Height"] = $UploadPicHeight3;
	$UploadPic["Small"]["BoxMode"] = $UploadPicMode3;

?>