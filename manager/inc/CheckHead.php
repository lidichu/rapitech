<?php include_once("Connection.php"); ?>
<?php
$SdbRoot="../../"; 
$id = mysql_real_escape_string($_COOKIE["id"]);
$pw = mysql_real_escape_string($_COOKIE["pw"]);
if ($id=="")
	$id=$_REQUEST["id"];
if ($pw=="")
	$pw=$_REQUEST["pw"];	
$LOGIN_SERIALNO = 0;
if($id!="" && $pw!=""){

	//讀取會員資料
	$Query = "select * from m_member where acc='" . $id . "' and pwd='" . $pw . "'";
	//exit($Query);
	$Rs_member = mysql_query($Query,$Conn); 						//查詢資料庫 

	if($Rs_member && (mysql_num_rows($Rs_member)>0)){
		$Row=mysql_fetch_array($Rs_member);
		$LOGIN_SERIALNO = $Row['SerialNo'];
		if($Check_FileName!="login" && $Check_FileName!=""){
			$Query="select * from popedom a,treelist b where a.Tree_ID=b.Tree_ID and a.Member_ID=" . $Row['SerialNo'] . " and b.FileName='" . $Check_FileName . "'";
		}else{
			$Query="select * from treelist limit 0,1";
		}
		$Rs_member = mysql_query($Query,$Conn); //查詢資料庫
		if(!$Rs_member || (mysql_num_rows($Rs_member)==0)){
		  //非正常登入
		  	$sResult = "";
			$sResult .= "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
			$sResult .= "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";
			$sResult .= "<head>\n";
			$sResult .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
			$sResult .= "<title>後端管理系統</title>\n";
			$sResult .= "</head>\n";
			$sResult .= "<body>\n";
			$sResult .= "<script language='javascript'>\n";
			$sResult .= "top.location.href='" . $SdbRoot . "inc/Error.php';\n";
			$sResult .= "</script>\n";
			$sResult .= "</body>\n";
			$sResult .= "</html>\n";
			exit($sResult);
		}
	}else{
			//查無會員資料
			$sResult = "";
			$sResult .= "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
			$sResult .= "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";
			$sResult .= "<head>\n";
			$sResult .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
			$sResult .= "<title>後端管理系統</title>\n";
			$sResult .= "</head>\n";
			$sResult .= "<body>\n";
			$sResult .= "<script language='javascript'>\n";
			$sResult .= "alert('登入失敗<查無會員資料>.');\n";
			$sResult .= "window.history.go(-1);\n";
			$sResult .= "</script>\n";
			$sResult .= "</body>\n";
			$sResult .= "</html>\n";
			exit($sResult);
   }
}else{

	//帳號密碼遺失或未輸入
	$sResult = "";
	$sResult .= "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
	$sResult .= "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";
	$sResult .= "<head>\n";
	$sResult .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
	$sResult .= "<title>後端管理系統</title>\n";
	$sResult .= "</head>\n";
	$sResult .= "<body>\n";	  
	$sResult .= "<script language='javascript'>\n";
	$sResult .= "top.location.href='" . $SdbRoot . "login.php';\n";
	$sResult .= "</script>\n";
	$sResult .= "</body>\n";
	$sResult .= "</html>\n";
	exit($sResult);
}
?>