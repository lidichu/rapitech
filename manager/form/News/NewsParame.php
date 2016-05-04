<?php session_start(); ?>
<?php $Root = ""; ?>
<?php $SdbRoot="../../"; ?>
<?php $_SESSION["check_fileName"]="News.php";	//有2功能,1:檢查權限用,2:使下面的程式超聯結本網頁?>
<?php
//標題設定
	$Title01 = "最新消息";
	$Title02_1 = "最新消息-相關連結";
	$Title02_2 = "最新消息-檔案下載";

//主頁檔案名稱
	$MainFileName01 = "News.php";
	$MainFileName02_1 = "NewsLink.php";
	$MainFileName02_2 = "NewsFile.php";

//修改頁檔案名稱
	$ModifyFileName01 = "News_Add_Modify.php";
	$ModifyFileName02_1 = "NewsLink_Add_Modify.php";
	$ModifyFileName02_2 = "NewsFile_Add_Modify.php";
	

//資料庫名稱

	$DatabaseName01 = "news";
	$DatabaseName01_S = "news";
	$DatabaseName02_1 = "newslink";
	$DatabaseName02_1_S = "newslink";
	$DatabaseName02_2 = "newsfile";
	$DatabaseName02_2_S = "newsfile";	
	
//上傳檔案路徑
	$UploadFilePath = "../../../files/News/Files/";
	
	$UploadPic["Big"]["Root"] = "../../../files/News/PIC/";
	$UploadPic["Big"]["Width"] = 689;
	$UploadPic["Big"]["Height"] = 517;
	$UploadPic["Small"]["Root"] = "../../../files/News/SmallPIC/";
	$UploadPic["Small"]["Width"] = 120;
	$UploadPic["Small"]["Height"] = 90;
?>

