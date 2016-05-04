<?php session_start(); ?>
<?php $Root = ""; ?>
<?php $SdbRoot="../../"; ?>
<?php $_SESSION["check_fileName"]="Banner.php";	//有2功能,1:檢查權限用,2:使下面的程式超聯結本網頁?>
<?php
//標題設定
	$Title01 = "Banner管理";

//主頁檔案名稱
	$MainFileName01 = "Banner.php";

//修改頁檔案名稱
	$ModifyFileName01 = "Banner_Add_Modify.php";

//資料庫名稱
	$DatabaseName01 = "banner";
	$DatabaseName01_S = "banner";
	
//上傳檔案路徑
	$UploadPic["Source"]["Root"] = "../../../files/Banner/Source/";
	$UploadPic["Source"]["Width"] = "";
	$UploadPic["Source"]["Height"] = "";
	$UploadPic["PIC"]["Root"] = "../../../files/Banner/PIC/";
	$UploadPic["PIC"]["Width"] = 1003;
	$UploadPic["PIC"]["Height"] = 402;
?>

