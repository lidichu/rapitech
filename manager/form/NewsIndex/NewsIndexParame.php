<?php session_start(); ?>
<?php $Root = ""; ?>
<?php $SdbRoot="../../"; ?>
<?php $_SESSION["check_fileName"]="NewsIndex.php";	//有2功能,1:檢查權限用,2:使下面的程式超聯結本網頁?>
<?php
//標題設定
	$Title01 = "首頁最新消息";

//主頁檔案名稱
	$MainFileName01 = "NewsIndex.php";

//修改頁檔案名稱
	

//資料庫名稱
	$DatabaseName01 = "news";
	$DatabaseName01_S = "news";
//上傳檔案路徑	
	$UploadPic["Big"]["Root"] = "../../../files/News/PIC/";
	$UploadPic["Big"]["Width"] = 135;
	$UploadPic["Big"]["Height"] = 102;
	$UploadPic["Small"]["Root"] = "../../../files/News/SmallPIC/";
	$UploadPic["Small"]["Width"] = 93;
	$UploadPic["Small"]["Height"] = 70;	
?>

