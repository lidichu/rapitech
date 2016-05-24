<?php ob_start(); ?>
<?php include_once('../PageHead.php');?>
<?php
	$_POST = quotes($_POST);
	//接收參數 
	$SafeCodeTmp = strtolower($_SESSION["SafeCode"]);
	$_SESSION["SafeCode"] = "";
	$KeyPair["Name"] = CheckData($_POST["name"]);
	$KeyPair["Sex"] = CheckData($_POST["Sex"]);
	$KeyPair["Tel"] = CheckData($_POST["Tel"]);

	$KeyPair["EMail"] = CheckData($_POST["EMail"]);
	$AddressCity = CheckData($_POST["AddressCity"]);
	$AddressArea = "";//CheckData($_POST["AddressArea"]);
	$AddressZipCode = "";//CheckData($_POST["AddressZipCode"]);
	$AddressOther = "";//CheckData($_POST["AddressOther"]);
	$Address = "";//CheckData($_POST["Address"]);
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
		if($Value!="Sex" && $Value!="Address"){
			if($KeyPair[$Value] == ""){				
				notify("部份欄位未填寫","history.back()");
			}
		}
	}	
	if($SafeCodeTmp != $VCode){
		$_SESSION["SafeCode"] = $SafeCodeTmp;
		notify("驗證碼錯誤","","history.back()");
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
		switch ($KeyPair["Sex"]) {
    		case "Male":
        		$SexStr = "男";
		        break;
		    case "Female":
        		$SexStr = "女";
        		break;
		}
		$EMailField = array(
			"姓名" => $KeyPair["Name"],
			"性別" => $SexStr,
			"電話" => $KeyPair["Tel"],
			"信箱" => $KeyPair["EMail"],
			"地址" => $KeyPair["Address"],
			"主旨" => $KeyPair["Subject"],
			"內容" => $KeyPair["Note"],
			"日期" => $KeyPair["PostDate"]
		);
		include_once("ContactEMail.php");

		//寄信通知管理者
		$HtmlBody = str_replace("{WebTitle}",$Web["WebTitle".$Lang],$HtmlBody);
		foreach($KeyPair As $Key => $Value){
			$HtmlBody = str_replace("{".$Key."}",$Value,$HtmlBody);
		}		
		if($CusEmail != ""){
			SendMail($KeyPair["Name"],$CusEmail,$Web["WebTitle"],$Web["ManagerEmail"],$Web["WebTitle"]."系統自動通告-聯絡我們通知",$HtmlBody,"",$Web["EMailServer"],"");
		}
		notify("留言完成，我們將盡快給您回覆","contact.php");
	}	
?>
<?php ob_flush(); ?>