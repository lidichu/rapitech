<?php
	$_POST = quotes($_POST);
	//接收參數 
	$SafeCodeTmp = strtolower($_SESSION["SafeCode"]);
	$_SESSION["SafeCode"] = "";
	$KeyPair["Name"] = CheckData($_POST["Name"]);
	$KeyPair["Sex"] = CheckData($_POST["Sex"]);
	$KeyPair["Tel"] = CheckData($_POST["Tel"]);
	$KeyPair["EMail"] = CheckData($_POST["EMail"]);
	$AddressCity = CheckData($_POST["AddressCity"]);
	$AddressArea = CheckData($_POST["AddressArea"]);
	$AddressZipCode = CheckData($_POST["AddressZipCode"]);
	$AddressOther = CheckData($_POST["AddressOther"]);
	$Address = CheckData($_POST["Address"]);
	$KeyPair["Address"] = $AddressZipCode.$AddressCity.$AddressArea.$AddressOther.$Address;
	$KeyPair["Subject"] = CheckData($_POST["Subject"]);
	$KeyPair["Note"] = CheckData($_POST["Note"]);
	$KeyPair["PostDate"] = date("Y-m-d");
	$KeyPair["Status"] = "未處理";
	$KeyPair["Lang"] = $Lang;
	$VCode = strtolower(CheckData($_POST["VCode"]));
	$order = array("\r\n", "\n", "\r"); 
	$replace = "<br />"; 
	$KeyPair["Note"] = str_replace($order, $replace, $KeyPair["Note"]);
	$ResultCode = 0;
	
	$CheckField = explode(",","Name,Tel,EMail,Address,Subject,Note");
	$CheckResult = true;
	foreach($CheckField as $Key => $Value){
		if($KeyPair[$Value] == ""){
			$CheckResult = false;
		}
	}
	if(!$CheckResult){
		$ResultCode = 2;
	}
	
	
	if($SafeCodeTmp != $VCode){
		$ResultCode = 1;
	}
	if($ResultCode==0){	
		$SplitChar = "";
		$InsertFields = "";
		$InsertValue = "";
		foreach($KeyPair As $Key => $Value){
			$InsertFields .= $SplitChar."`".$Key."`";
			$InsertValue .= $SplitChar."'".$Value."'";
			$SplitChar = ",";
		}
		$SQL = "Insert Into contact(".$InsertFields.") values(".$InsertValue.")";
		mysql_query($SQL,$Conn);
		if($KeyPair["EMail"] != ""){
			$CusEmail = $KeyPair["EMail"];
			$KeyPair["EMail"] = "<a href=\"mailto:" . $KeyPair["EMail"] . "\">" . $KeyPair["EMail"] . "</a>"; 
		}
		switch ($Lang) {
    		case "Ch":
        		$LangStr = "繁體中文";
		        break;
		    case "Cn":
        		$LangStr = "簡體中文";
        		break;
    		case "En":
        		$LangStr = "英文";
        		break;
		}
		switch ($KeyPair["Sex"]) {
    		case "Male":
        		$SexStr = "男";
		        break;
		    case "Female":
        		$SexStr = "女";
        		break;
		}
		$EMailField = array(
			"語言版本" => $LangStr,
			"姓名" => $KeyPair["Name"],
			"性別" => $SexStr,
			"電話" => $KeyPair["Tel"],
			"信箱" => $KeyPair["EMail"],
			"地址" => $KeyPair["Address"],
			"主旨" => $KeyPair["Subject"],
			"內容" => $KeyPair["Note"],
			"日期" => $KeyPair["PostDate"]
		);
		include_once("../Common/Forum/Contact/ContactEMail.php");

		//寄信通知管理者
		$HtmlBody = str_replace("{WebTitle}",$Web["WebTitle".$Lang],$HtmlBody);
		foreach($KeyPair As $Key => $Value){
			$HtmlBody = str_replace("{".$Key."}",$Value,$HtmlBody);
		}		
		if($CusEmail != ""){
			SendMail($KeyPair["Name"],$CusEmail,$Web["WebTitleCh"],$Web["ManagerEmail"],$Web["WebTitleCh"]."系統自動通告-聯絡我們通知",$HtmlBody,"",$Web["EMailServer"],"");
		}
	}
	//若發生錯誤SafeCode寫回
	if($ResultCode != 0){
		$_SESSION["SafeCode"] = $SafeCodeTmp;
	}	
	
	$ErrorMessage = array( 
		0 => array(
			"Ch" => "留言完成，我們將盡快給您回覆",
			"Cn" => "留言完成，我们将尽快给您回覆",
			"En" => "Message completed, we will reply to you as soon as possible."
			),
		1 => array(
			"Ch" => "驗證碼錯誤",
			"Cn" => "验证码错误",
			"En" => "Verification code error."
			),
		2 => array(
			"Ch" => "部份欄位未填寫",
			"Cn" => "部份栏位未填写",
			"En" => "Part of the field is not filled."		
			)
		);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name= "keywords" content="<?php echo($Web_Keywords);?>" />
<meta name= "description" content="<?php echo($Web_Description);?>" />
<title><?php echo($Web["WebTitle".$Lang]); ?></title>
<script type="text/javascript" src="../Scripts/jquery.js"></script>
<script type="text/javascript">
$(function(){
	alert("<?php echo($ErrorMessage[$ResultCode][$Lang]); ?>");
	<?php
		if($ResultCode == 0){
	?>
	window.parent.location.href = "contact.php";
	<?php
		}
	?>	
});
</script>
</head>
<body>
</body>
</html>