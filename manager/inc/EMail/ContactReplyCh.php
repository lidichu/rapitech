<?php
	$EMailNote = "";
	$EMailNote .= "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
	$EMailNote .= "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";
	$EMailNote .= "<head>\n";
	$EMailNote .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
	$EMailNote .= "</head>\n";
	$EMailNote .= "<body>\n";
	$EMailNote .= "<p>Dear {EMailName}</p>\n";
	$EMailNote .= "<p>根據您的疑問，回覆如下：</p>\n";
	$EMailNote .= "<table width=\"650\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
	$IsFirstEMailNoteFields = true;
	foreach($EMailNoteFields As $EMailNotekeys => $EMailNotevalue){
		if($IsFirstEMailNoteFields){
	$EMailNote .= "	<tr>\n";
	$EMailNote .= "		<td width=\"76\" align=\"center\" valign=\"middle\" style=\"background-color:#E6E6E6;border:1px solid #000;padding:5px 5px;\">".$EMailNotekeys."</td>\n";
	$EMailNote .= "		<td width=\"574\" align=\"left\" style=\"border:1px solid #000;border-width:1px 1px 1px 0px;padding:5px 5px;\">".$EMailNotevalue."</td>\n";
	$EMailNote .= "	</tr>\n";		
		}else{
	$EMailNote .= "	<tr>\n";
	$EMailNote .= "		<td align=\"center\" valign=\"middle\" style=\"background-color:#E6E6E6;border:1px solid #000;border-width:0px 1px 1px 1px;padding:5px 5px;\">".$EMailNotekeys."</td>\n";
	$EMailNote .= "		<td align=\"left\" style=\"border:1px solid #000;border-width:0px 1px 1px 0px;padding:5px 5px;\">".$EMailNotevalue."</td>\n";
	$EMailNote .= "	</tr>\n";		
		}
		$IsFirstEMailNoteFields = false;
	}
	$EMailNote .= "</table>\n";
	$EMailNote .= "<p>Best regards,<br />{CompanyName} </p>\n";
	$EMailNote .= "<p>\n";
	$EMailNote .= "如果您有任何使用上的疑問時，可以利用下列的資訊與我們聯絡：<br />\n";
	$EMailNote .= "客服信箱：{CompanyEMail}<br />\n";
	$EMailNote .= "{CompanyName}：<a href=\"{CompanyURL}\">{CompanyURL}</a>\n";
	$EMailNote .= "</p>\n";
	$EMailNote .= "</body>\n";
	$EMailNote .= "</html>\n";
	
	$EMailNote = str_replace("{EMailName}",$EMailName,$EMailNote);
	$EMailNote = str_replace("{CompanyName}",$CompanyName,$EMailNote);
	$EMailNote = str_replace("{CompanyEMail}",$CompanyEMail,$EMailNote);
	$EMailNote = str_replace("{CompanyURL}",$CompanyURL,$EMailNote);
?>