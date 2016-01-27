<?php session_start(); ?>
<?php $Root = ""; ?>
<?php $SdbRoot="../../"; ?>
<?php $Check_FileName="Banner.php";	//有2功能,1:檢查權限用,2:使下面的程式超聯結本網頁?>
<?php
	$ModName="Banner管理";
//標題設定
	$Title01 = $ModName;

//主頁檔案名稱
	$MainFileName01 = "Banner.php";

//修改頁檔案名稱
	$ModifyFileName01 = "Banner_Add_Modify.php";

//資料庫名稱
	$DatabaseName01 = "banner";
	$DatabaseName01_S = "banner";
	
//上傳檔案路徑


	$UploadPic["PIC"]["Path"] = "../../../files/Banner/PIC/";
	$UploadPic["PIC"]["Width"] = 1178;
	$UploadPic["PIC"]["Height"] = 305;
	$UploadPic["PIC"]["BoxMode"] = true;

?>