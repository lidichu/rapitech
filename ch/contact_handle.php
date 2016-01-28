 <?php ob_start(); ?>
<?php include_once('../PageHead.php');?>
<?php
	$_POST = quotes($_POST);
	$SafeCode = strtolower($_SESSION["SafeCode"]);
	$opp=$_REQUEST["opp"];
	
	if($opp=='yes'){
	
		//接收會員資料
		$Ip=$_SERVER["REMOTE_ADDR"];
		
		$DataArray["Name"] = CheckData($_POST["Name"]);
		$DataArray["Sex"] = CheckData($_POST["Sex"]);
		$DataArray["Tel"] = CheckData($_POST["Tel"]);
		$DataArray["Fax"] = CheckData($_POST["Fax"]);
		$DataArray["Address"] = CheckData($_POST["Address"]);
		$DataArray["EMail"] = CheckData($_POST["EMail"]);
		$DataArray["Subject"] = CheckData($_POST["Subject"]);
		$DataArray["Note"]= CheckData($_POST["Note"]);
		
		
		$DataArray["Sex"] = $DataArray["Sex"]=='先生'||$DataArray["Sex"]=='小姐'?$DataArray["Sex"]:'';
		$DataArray["Fax"] = $DataArray["Fax"]==''?'未填寫':$DataArray["Fax"];
		$DataArray["Address"] = $DataArray["Address"]==''?'未填寫':$DataArray["Address"];
		
		$DataArray["PostDate"]=date("Y-m-d H:i:s");
		$DataArray["Status"] = "未處理";

		$Checked = false;
		$VCode = strtolower($_POST["VCode"]);

		if($SafeCode != $VCode){
			notify("驗證碼錯誤！");
		}else{				
			unset($_SESSION["SafeCode"]);
			$CheckField = explode(",","Name,Tel,EMail,Note,Subject,PostDate,Status");
			$CheckResult = true;
			foreach($CheckField as $Key => $Value){
				if($DataArray[$Value] == ""){
					$CheckResult = false;
				}
			}
			if(!$CheckResult){
				notify("部份欄位未填寫");
			}
					

			$InsertFields="";
			$InsertValue="";
			foreach($DataArray as $Key=>$Value){
				if($InsertFields!=""){$InsertFields.=",";}
				if($InsertValue!=""){$InsertValue.=",";}
				$InsertFields.=$Key;
				$InsertValue.=GetSQLValueString($Value,'text');
			}
			$SQL = "Insert Into contact (".$InsertFields.") values(".$InsertValue.")";
			mysql_query($SQL,$Conn);

			function SendMail($FromName,$FromEmail,$ToName,$ToEmail=array(),$Subject,$Msg,$ManagerEmail="",$MailServer="www.hibox.hinet.net:25",$ManagerEmailPWD=""){
				$mailer = new PHPMailer();   
				$mailer->CharSet = 'utf-8';   
				$mailer->Encoding = 'base64';   
				$mailer->IsSMTP();   
				$mailer->Host = $MailServer;
				if($ManagerEmail!=""&&$ManagerEmailPWD!=""){
					$mailer->SMTPAuth = true;
				}else{
					$mailer->SMTPAuth = false;
				}
				
				$mailer->Username = $ManagerEmail;
				$mailer->Password = $ManagerEmailPWD;
				$mailer->From = $FromEmail;
				$mailer->FromName = $FromName;
				$mailer->MsgHTML($Msg);   
				$mailer->Subject = $Subject;   
				foreach($ToEmail as $Value){
				$mailer->AddAddress($Value);
				}
				if(!$mailer->Send()){  
					echo "Message was not sent<br/ >";   
					echo "Mailer Error: " . $mailer->ErrorInfo;   
				}else{  
					//echo "Message has been sent";
				}
			}
			
			//寄信給管理員
			$Contact = "<html>\n";
			$Contact .= "<head>\n";
			$Contact .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\n";
			$Contact .= "</head>\n";
			$Contact .= "<body>\n";
			$Contact .= "<span style=\"font-size:14pt;color:#A50800;\">\n";
			$Contact .= "新留言通知<br /><br />\n";
			$Contact .= "</span>\n";
			$Contact .= "<span style=\"font-size:10pt;\">\n";
			$Contact .= "親愛的 ".$Web["WebTitle"]."  管理員您好："."<br />\n";
			$Contact .= "這封通知信是由 ".$Web["WebTitle"]." 網站發出，用以告知您的後台聯絡我們，新增了一筆留言，請勿直接回信！<br /><br />\n";
			$Contact .= "標　　題: ".$DataArray["Subject"]."<br />\n";
			$Contact .= "姓　　名: ".$DataArray["Name"]."<br />\n";
			$Contact .= "電　　話: ".$DataArray["Tel"]."<br />\n";
			$Contact .= "傳　　真: ".$DataArray["Fax"]."<br />\n";
			$Contact .= "地　　址: ".$DataArray["Address"]."<br />\n";
			$Contact .= "信　　箱: ".$DataArray["EMail"]."<br />\n";
			$Contact .= "詢問內容: ".$DataArray["Note"]."<br />\n";
			$Contact .= "</span>\n";
			$Contact .= "</body>\n";
			$Contact .= "</html>\n";
			$Web["EMailServer"] = '127.0.0.1';
			$ToEmail = array();
			$ToEmail[] = $Web["ManagerEmail"];
			SendMail($Web["WebTitle"],$Web["ManagerEmail"],$Web["WebTitle"],$ToEmail,$Web["WebTitle"]."-新信件通知",$Contact,"",$Web["EMailServer"],"");
			notify("送出留言成功","index.php");
			
		}
	}
?>
<?php ob_flush(); ?>