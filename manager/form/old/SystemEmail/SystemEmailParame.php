<?php session_start(); ?>
<?php $Root = ""; ?>
<?php $SdbRoot="../../"; ?>
<?php $_SESSION["check_fileName"]="SystemEmail.php";	//有2功能,1:檢查權限用,2:使下面的程式超聯結本網頁?>
<?php
	$ModName="系統信件";
//標題設定
	$Title01 = $ModName;
//主頁檔案名稱
	$MainFileName01 = "SystemEmail.php";
//修改頁檔案名稱
	$ModifyFileName01 = "SystemEmail_Add_Modify.php";
//資料庫名稱
	$DatabaseName01 = "systememail";
	$DatabaseName01_S = "systememail";
//上傳檔案路徑
	$UploadFile = array();
?>