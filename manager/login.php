<?php ob_start(); ?>
<?php
	//清除Cookies
	setcookie( "id", "", time()- 60, "/","", 0);
	setcookie( "pwd", "", time()- 60, "/","", 0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="zh-tw">
<title>後端管理系統</title>
<script language="javascript" type="text/javascript" src="script/jquery.js"></script>
<script language="javascript" type="text/javascript">
$(function(){
	//載入完成後 focus 在 id 輸入框
	$("#id").focus();

	//登入按鈕
	$("#B1").click(function(){
		if($("#id").val()=="" && $("#pw").val()==""){
			alert("帳號與密碼尚未填入資料");
			$("#id").focus();
		}else if($("#id").val()==""){
			alert("帳號尚未填入資料");
			$("#id").focus();
		}else if($("#pw").val()==""){
			alert("密碼尚未填入資料");
			$("#pw").focus();
		}else{
			$("#frmLogin").submit();
		}
	});

	$("#id,#pw").keydown(function(e){
		if(e.keyCode==13){
			$("#B1").click();
		}
	});
});
</script>
</head>
<body>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
	<tr>
		<td align="center">
			<table border="0" cellspacing="0" cellpadding="0" style="border:1px solid #000000" align="center">
				<tr>
					<td>
						<table cellpadding="0" cellspacing="0" border="0">
							<tr>
								<td><img width="180" height="50" src="images/title_1.jpg" border="0" /></td>
								<td><img width="180" height="50" src="images/title_2.jpg" border="0" /></td>
								<td><img width="180" height="50" src="images/title_3.jpg" border="0" /></td>
							</tr>
							<tr>
								<td><img width="180" height="50" src="images/title_4.jpg" border="0" /></td>
								<td><img width="180" height="50" src="images/title_5.jpg" border="0" /></td>
								<td><img width="180" height="50" src="images/title_6.jpg" border="0" /></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td align="center"><form name="frmLogin" id="frmLogin" method="post" action="main.php" style="margin:0px;margin-top:20px;padding:0px;">
			<table border="0" cellpadding="0" cellspacing="0" width="300" height="150">
				<tr style="font-size:12pt">
					<td rowspan="4" nowrap valign="middle"><img name="logon" src="images/wintitle.jpg" /></td>
					<td nowrap height="30" align="right" valign="middle">帳號：</td>
					<td nowrap height="30" valign="middle"><input type="text" name="id" id="id" size="19" maxlength="15" style="width:150px;" /></td>
				</tr>
				<tr>
					<td nowrap height="30" align="right" valign="middle">密碼：</td>
					<td nowrap height="30" valign="middle"><input type="password" name="pw" id="pw" size="19" maxlength="10" style="width:150px;" /></td>
				</tr>
				<tr>
					<td colspan="3" align="right" height="10"><hr width="95%" size="1"></td>
				</tr>
				<tr>
					<td colspan="3" align="center" height="40"><input type="button" value="登入" name="B1" id="B1" class="button1" /></td>
				</tr>
			</table></form></td>
		</tr>
		<tr>
			<td><marquee style="font-size:12pt;color:#00F;margin-top:200px;">本系統適用於 Internet Explorer 8.0 以上的版本，最佳瀏覽解析度為 1280 X 1024</marquee></td>
		</tr>
		<tr>
			<td align="center">
				<div style="font-size:12px;color:#000;margin-top:50px;">禾益網頁設計公司　製作</div></td>
			</tr>
		</table>
</body>
</html>
<?php ob_flush(); ?>

