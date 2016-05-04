<?php
$HtmlBody = "
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n
<html xmlns=\"http://www.w3.org/1999/xhtml\">\n
<title>{WebTitle}-聯絡我們</title>\n
<head>\n
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n
</head>\n
<body>\n
Dear {PostedName}<br />\n
Replies your message to be as follows:<br />\n
<table width=\"500\" border=\"1\" cellspacing=\"2\" cellpadding=\"3\">\n
	<tr>\n
		<td width=\"19%\" height=\"30\" align=\"right\" valign=\"center\" style=\"font-size:10pt;background-color:#E6E6E6;\">Message</td>\n
		<td width=\"81%\" height=\"30\" align=\"left\" valign=\"middle\" style=\"font-size:10pt;\">{PostedNote}</td>\n
	</tr>\n
	<tr>\n
		<td width=\"19%\" height=\"30\" align=\"right\" valign=\"center\" style=\"font-size:10pt;background-color:#E6E6E6;\">Reply</td>\n
		<td width=\"81%\" height=\"30\" align=\"left\" valign=\"middle\" style=\"font-size:10pt;\">{ReplyNote}</td>\n
	</tr>\n
</table>\n
<br /><br />\n
Best regards,<br />\n
{WebName}<br />\n
<br />\n
當您有任何使用上的問題時，可以利用下列的資訊與我們聯絡：<br />\n
客服信箱：<a href=\"{ManagerEmail}\">{ManagerEmail}</a><br />\n
{WebName}：<a href=\"{ServerHost}\" target=\"_blank\">{ServerHost}</a><br />\n
</body>\n
</html>\n
";
?>