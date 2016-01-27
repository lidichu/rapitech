<?php session_start(); ?>
<?php $Root = ""; ?>
<?php $SdbRoot="../../"; ?>
<?php $check_fileName="OrderQA.php";	//有2功能,1:檢查權限用,2:使下面的程式超聯結本網頁?>
<?php
//標題設定
	$ModName="訂單問與答";
	$Title01 = $ModName;
	$Title02 = $ModName."(回覆)";

//主頁檔案名稱
	$MainFileName01 = "OrderQA.php";
	$MainFileName02 = "OrderQAReply.php";

//修改頁檔案名稱
	$ModifyFileName01 = "OrderQA_Add_Modify.php";
	$ModifyFileName02 = "OrderQAReply_Add_Modify.php";

//資料庫名稱
	$DatabaseName01 = "orderquestion";
	$DatabaseName01_S = "orderquestion";
	$DatabaseName02 = "orderquestionreply";
	$DatabaseName02_S = "orderquestionreply";
?>