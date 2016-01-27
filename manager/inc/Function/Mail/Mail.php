<?php
class SendMail {
	public $PHPMailerObj;	//寄件物件
	public function __construct(){
		global $Conn;
		//建立新 PHPMailer 物件
		$this->PHPMailerObj = new PHPMailer();
		//信件內容的編碼方式
		$this->PHPMailerObj->CharSet = 'utf-8';
		//信件處理的編碼方式
		$this->PHPMailerObj->Encoding = 'base64';
		//設定使用SMTP方式寄信
		$this->PHPMailerObj->IsSMTP();
		$SQL = "Select `EMailServer` From `web` limit 0,1";
		$Rs = $Conn->prepare($SQL);
		$Rs->execute();
		$Row = $Rs->fetch(PDO::FETCH_ASSOC);
		
		$this->SetServer($Row["EMailServer"]);
		
		// $this->SetServer("mail.dslrfun.com.tw", 25, "dslr", "2604222");
	}
	public function SetServer($Host = "msa.hinet.net", $Port = "25", $ID = "", $PWD ="", $SSL = "false"){
		//設定SMTP主機位址
		$this->PHPMailerObj->Host = $Host;
		//設定SMTP主機的SMTP埠位
		$this->PHPMailerObj->Port = $Port;
		//判斷是否需要驗證
		if($ID != "" && $PWD != ""){
			//若有指定帳號密碼，則設定SMTP需要驗證
			$this->PHPMailerObj->SMTPAuth = true;
			//設定驗證帳號
			$this->PHPMailerObj->Username = $ID; 
			//設定驗證密碼
			$this->PHPMailerObj->Password = $PWD; 
		}else{
			//若無指定帳號密碼，則設定SMTP不需要驗證
			$this->PHPMailerObj->SMTPAuth = false;
		}
		//判斷是否須要 SSL
		if($SSL == "true"){
			//主機需要使用SSL連線
			$this->PHPMailerObj->SMTPSecure = "ssl"; 
		}
	}

	public function SetFrom($Name, $EMail){
		//設定寄件者信箱
		$this->PHPMailerObj->From = $EMail;
		//設定寄件者姓名
		$this->PHPMailerObj->FromName = $Name;
	}
	
	public function AddTo($Name, $EMail){
		$this->PHPMailerObj->AddAddress($EMail,$Name);
	}
	public function Send($Subject, $Body){
		//設定郵件標題
		$this->PHPMailerObj->Subject = $Subject;
		//設定郵件標題
		$this->PHPMailerObj->IsHTML(true);
		//設定郵件內容
		$this->PHPMailerObj->MsgHTML($Body);
		//寄送郵件
		if(!$this->PHPMailerObj->Send()){
			echo "發生錯誤，郵件未被寄出<br/ >";
			echo "錯誤訊息: " . $this->PHPMailerObj->ErrorInfo;
			return false;
		}else{
			// echo("郵件己被寄出");
			return true;
		}
	}
}
//將字串轉成Mailto格式
function EmailHandle($str){
	if($str!=""){
		return "<a href=\"mailto:".$str."\" target=\"_blank\">" . $str . "</a>";
	}
	return "";
}
//檢查E-mail格式
function CheckEmail($Email){
	if(!preg_match('/^[_.0-9a-z-]+@([0-9a-z-]+.)+[a-z]{2,3}$$/', $Email)){
		return false;
	}else{
		return true;
	}
}

// 建立聯絡我們通知信件
function CreateConcatEMail($EMailField,$WebTitleField = "WebTitle"){
	global $Web;
	$HtmlBody = "
	<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n
	<html xmlns=\"http://www.w3.org/1999/xhtml\">\n
	<title>".$Web[$WebTitleField]."</title>\n
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
	return $HtmlBody;
}
function CreateConcatReEMail($EMailNoteFields,$EMailName,$CompanyName,$CompanyEMail,$CompanyURL){
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
	$EMailNote .= "		<td width=\"100\" align=\"center\" valign=\"middle\" style=\"background-color:#E6E6E6;border:1px solid #000;padding:5px 5px;\">".$EMailNotekeys."</td>\n";
	$EMailNote .= "		<td width=\"550\" align=\"left\" style=\"border:1px solid #000;border-width:1px 1px 1px 0px;padding:5px 5px;\">".$EMailNotevalue."</td>\n";
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
	$EMailNote .= "如果您有任何疑問，可以利用下列的資訊與我們聯絡：<br />\n";
	$EMailNote .= "客服信箱：{CompanyEMail}<br />\n";
	$EMailNote .= "{CompanyName}：<a href=\"{CompanyURL}\">{CompanyURL}</a>\n";
	$EMailNote .= "</p>\n";
	$EMailNote .= "</body>\n";
	$EMailNote .= "</html>\n";
	
	$EMailNote = str_replace("{EMailName}",$EMailName,$EMailNote);
	$EMailNote = str_replace("{CompanyName}",$CompanyName,$EMailNote);
	$EMailNote = str_replace("{CompanyEMail}",$CompanyEMail,$EMailNote);
	$EMailNote = str_replace("{CompanyURL}",$CompanyURL,$EMailNote);
	return $EMailNote;
}

?>