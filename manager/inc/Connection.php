<?php
session_start();
/*資料庫連結設定*/
date_default_timezone_set("Asia/Taipei");
//$Conn = mysql_connect('localhost','root','2776');
$Conn = mysql_connect('localhost','motherwang_admin','2604222');
mysql_select_db("motherwang",$Conn);
mysql_query("SET NAMES 'utf8'");
header("Cache-control: private"); //防止網頁過期
$VisualRoot = "";
while(is_file($VisualRoot."PageHead.php")==false){
	$VisualRoot .= '../';
}
define('VisualRoot', $VisualRoot);
?>
