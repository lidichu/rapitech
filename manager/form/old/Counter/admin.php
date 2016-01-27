<?php
//function getmicrotime()
//{
//    list($usec, $sec) = explode(" ", microtime());
//    return ((float)$usec + (float)$sec);
//}
///**********************************************************************/
//$time = getmicrotime();
$SdbRoot="../../";
$Check_FileName="Counter.php";	//有2功能,1:檢查權限用,2:使下面的程式超聯結本網頁
include_once("../../inc/CheckHead.php"); 	//權限檢查
include_once("lib/base.php");
if ($_POST['send'] == "doit") {
	$SQL = "Update web Set datedb = '',recentdb = '',startdb = ''";
	$Rs = $Conn->prepare($SQL);
	$Rs->execute();
}
ob_start("ob_gzhandler");
$showPopText = true;
$title = "Welcome";
include_once 'templates/common-header.inc';
include_once 'templates/admin.inc';
include_once 'templates/common-footer.inc';
//echo "<p>Time elapsed: ",getmicrotime() - $time, " seconds";
?>