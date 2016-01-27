<?php session_start(); ?>
<?php $Root = ""; ?>
<?php $SdbRoot="../../"; ?>
<?php $check_fileName="Contact.php";	//有2功能,1:檢查權限用,2:使下面的程式超聯結本網頁?>
<?php
//標題設定
	$ModName="聯絡我們";
	$Title01 = $ModName;
	$Title02 = $ModName."(回覆)";

//主頁檔案名稱
	$MainFileName01 = "Contact.php";
	$MainFileName02 = "ContactReply.php";

//修改頁檔案名稱
	$ModifyFileName01 = "Contact_Add_Modify.php";
	$ModifyFileName02 = "ContactReply_Add_Modify.php";

//資料庫名稱
	$DatabaseName01 = "contact";
	$DatabaseName01_S = "contact";
	$DatabaseName02 = "contactreply";
	$DatabaseName02_S = "contactreply";
?>