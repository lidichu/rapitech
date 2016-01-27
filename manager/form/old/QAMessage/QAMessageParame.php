<?php session_start(); ?>
<?php $Root = ""; ?>
<?php $SdbRoot="../../"; ?>
<?php $check_fileName="QAMessage.php";	//有2功能,1:檢查權限用,2:使下面的程式超聯結本網頁?>
<?php
//標題設定
	$ModName="問與答";
	$Title01 = $ModName;
	$Title02 = $ModName."(回覆)";

//主頁檔案名稱
	$MainFileName01 = "QAMessage.php";
	$MainFileName02 = "QAMessageReply.php";

//修改頁檔案名稱
	$ModifyFileName01 = "QAMessage_Add_Modify.php";
	$ModifyFileName02 = "QAMessageReply_Add_Modify.php";

//資料庫名稱
	$DatabaseName01 = "productquestion";
	$DatabaseName01_S = "productquestion";
	$DatabaseName02 = "productquestionreply";
	$DatabaseName02_S = "productquestionreply";
?>