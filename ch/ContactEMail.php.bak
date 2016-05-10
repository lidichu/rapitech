<?php
$HtmlBody = "
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n
<html xmlns=\"http://www.w3.org/1999/xhtml\">\n
<title>".$Web["WebTitleCh"]."</title>\n
<head>\n
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n
</head>\n
<body>\n
<table width=\"500\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\">\n";
foreach($EMailField as $Key => $Value){
	$HtmlBody .= "<tr>\n
		<td width=\"19%\" height=\"30\" align=\"right\" valign=\"middle\" style=\"font-size:10pt;padding-left:5px;\">".$Key."： </td>\n
		<td width=\"81%\" height=\"30\" align=\"left\" valign=\"middle\" style=\"font-size:10pt;padding-left:5px;\">".$Value."</td>\n
	</tr>\n";
}
$HtmlBody .= "</table>\n
</body>\n
</html>\n
";
?>