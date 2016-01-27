<?php
//啟用 session
session_start();
//接收帳號及密碼
$id = $_POST['id'];
$pw = $_POST['pw'];
if(trim($id)!="" && trim($pw)!=""){
	setcookie("id", $id, time()+60*60*24, "/", "",  0);
	setcookie("pw", md5($pw), time()+60*60*24, "/", "",  0);
}
$_SESSION["check_fileName"]="login";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>後端管理系統</title>
</head>
<frameset  frameborder="NO" border="0" framespacing="0" cols="50,*,50"> 
		<frame name="leftFrame" scrolling="NO" noresize src="left.php">
		<frame src="mng.php">
		<frame name="rightFrame" src="right.php" noresize scrolling="NO">
</frameset>
<noframes><body bgcolor="#FFFFFF">本系統需要支援框架的瀏覽器
</body></noframes>
</html>

