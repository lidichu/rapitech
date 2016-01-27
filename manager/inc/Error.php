<?php 
header("Cache-control: private"); //防止網頁過期  
session_start();  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>後端管理系統</title>
</head>
<body>
	<script type="text/javascript" language="javascript">
		function display_time(outTime){		//設定幾秒後,回到上一頁
		setTimeout("backHtml()",outTime);
	}
	function backHtml(){
		window.history.go(-2);
	}
	</script>
<div align="center">
<table border="0" width="500" id="table106" cellspacing="0" cellpadding="0">
	<tr>
		<td width="65" valign="top">　</td>
		<td width="88" valign="top">　</td>
		<td width="347" valign="top">　</td>
	</tr>
	<tr>
		<td width="65" valign="top"><img border="0" src="../images/e07_fram_01.gif" width="21" height="23"/></td>
		<td width="88" valign="top"><img border="0" src="../images/e07_fram_02.gif" width="455" height="23"/></td>
		<td width="347" valign="top"><img border="0" src="../images/e07_fram_03.gif" width="24" height="23"/></td>
	</tr>
	<tr>
		<td width="65" valign="top"><img border="0" src="../images/e07_fram_04.gif" width="21" height="203"/></td>
		<td valign="top" background="../images/e07_fram_05.gif" align="center">
				<script type="text/javascript" language="javaScript">
					display_time(5000);
				</script>
				<font color="#000000" size="3"><b>系統訊息</b></font>
				<b><font color=blue size="2"><p>此網頁禁止觀看：<P></font></b>
				<table border="0">
					<tr>
						<td>
							<b><font color=blue size="2">
								1.您並非本頁面的管理人員.<br>
								2.權限不足.
								<p></p>
								如需使用本頁面功能，請與網管申請！
								</font>
						</td>
					</tr>
				</table>
			</td>
			<td width="347" valign="top"><img border="0" src="../images/e07_fram_06.gif" width="24" height="203"/></td>
		</tr>
		<tr>
			<td width="65" valign="top"><img border="0" src="../images/e07_fram_07.gif" width="21" height="24"/></td>
			<td width="88" valign="top"><img border="0" src="../images/e07_fram_08.gif" width="455" height="24"/></td>
			<td width="347" valign="top"><img border="0" src="../images/e07_fram_09.gif" width="24" height="24"/></td>
		</tr>
</table>
</div> 
</body>
</html>