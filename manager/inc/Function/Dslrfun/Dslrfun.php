<?php
	function SendMessage($From, $To, $Subject, $Note, $OldSerialNo = 0, $MessageType = "一般私訊"){
		global $Conn, $Web;
		// 查詢收件人資訊
		$ToData = myQueryDetail("member", "*", "SerialNo = :SerialNo", array(
			":SerialNo" => $To
		));
		
		// 新增私人訊息資料
		$SQL = "Insert Into member_private_message(`MsgType`,`To_SerialNo`,`From_SerialNo`,`Title`,`Note`,`IsRead`,`ReplySerialNo`,`IsFeedback`,`CreateTime`)";
		$SQL .= " Values(:MsgType,:To_SerialNo,:From_SerialNo,:Title,:Note,'false',:ReplySerialNo,'false',:CreateTime)";
		$InsertSerialNo = myExecSQL($SQL, array(
			":MsgType" => $MessageType,
			":To_SerialNo" => $ToData["SerialNo"],
			":From_SerialNo" => $From,
			":Title" => $Subject,
			":Note" => $Note,
			":ReplySerialNo" => $OldSerialNo,
			":CreateTime" => date('Y-m-d H:i:s')
		));
		// 定義系統變數
		$Sys = array();
		$Sys["host"] = getHostUrl();
		
		if($OldSerialNo != 0){
			// 查詢舊私人訊息內容
			$OldPM = myQueryDetail("member_private_message", "*", "SerialNo = :SerialNo", array(
				":SerialNo" => $OldSerialNo
			));
			
			// 查詢私訊回覆通知信件
			$MailTemplete = array();
			$SQL = "Select * From systememail Where SerialNo = 5";
			$MailTemplete = myQueryDetail("systememail", "*", "SerialNo = 5", array());
			$MailTemplete["Note"] = ReplaceEditorMail($MailTemplete["Note"]);
			// 取代信件內容
			foreach($Web as $Key => $Value){
				$MailTemplete["Subject"] = str_replace("{web_".$Key."}",$Value,$MailTemplete["Subject"]);
				$MailTemplete["Note"] = str_replace("{web_".$Key."}",$Value,$MailTemplete["Note"]);
			}
			foreach($Sys as $Key => $Value){
				$MailTemplete["Subject"] = str_replace("{sys_".$Key."}",$Value,$MailTemplete["Subject"]);
				$MailTemplete["Note"] = str_replace("{sys_".$Key."}",$Value,$MailTemplete["Note"]);
			}
			// 依會員資料取代信件內容
			foreach($ToData as $Key => $Value){
				$MailTemplete["Subject"] = str_replace("{db_".$Key."}",$Value,$MailTemplete["Subject"]);
				$MailTemplete["Note"] = str_replace("{db_".$Key."}",$Value,$MailTemplete["Note"]);
			}
			// 依舊私人訊息內容取代信件內容
			foreach($OldPM as $Key => $Value){
				$MailTemplete["Subject"] = str_replace("{db2_".$Key."}",$Value,$MailTemplete["Subject"]);
				$MailTemplete["Note"] = str_replace("{db2_".$Key."}",$Value,$MailTemplete["Note"]);
			}
			// 寄發信件
			$HtmlBody = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
			$HtmlBody .= "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";
			$HtmlBody .= "<head>\n";
			$HtmlBody .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\n";
			$HtmlBody .= "</head>\n";
			$HtmlBody .= "<body>\n";
			$HtmlBody .= $MailTemplete["Note"];
			$HtmlBody .= "</body>\n";
			$HtmlBody .= "</html>\n";
			$MailObj = new SendMail();
			$MailObj->SetFrom("『DSLR FUN外拍網』管理者",$Web['ManagerEmail']);
			$MailObj->AddTo($ToData["MemberName"],$ToData["EMail"]);
			$MailObj->Send($MailTemplete["Subject"],$HtmlBody);
			
		}else{
			// 查詢私訊通知信件
			$MailTemplete = array();
			$SQL = "Select * From systememail Where ";
			$MailTemplete = myQueryDetail("systememail", "*", "SerialNo = 3", array());
			$MailTemplete["Note"] = ReplaceEditorMail($MailTemplete["Note"]);
			
			// 取代信件內容
			foreach($Web as $Key => $Value){
				$MailTemplete["Subject"] = str_replace("{web_".$Key."}",$Value,$MailTemplete["Subject"]);
				$MailTemplete["Note"] = str_replace("{web_".$Key."}",$Value,$MailTemplete["Note"]);
			}
			foreach($Sys as $Key => $Value){
				$MailTemplete["Subject"] = str_replace("{sys_".$Key."}",$Value,$MailTemplete["Subject"]);
				$MailTemplete["Note"] = str_replace("{sys_".$Key."}",$Value,$MailTemplete["Note"]);
			}
			
			// 依會員資料取代信件內容
			foreach($ToData as $Key => $Value){
				$MailTemplete["Subject"] = str_replace("{db_".$Key."}",$Value,$MailTemplete["Subject"]);
				$MailTemplete["Note"] = str_replace("{db_".$Key."}",$Value,$MailTemplete["Note"]);
			}
			
			// 寄發信件
			$HtmlBody = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
			$HtmlBody .= "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";
			$HtmlBody .= "<head>\n";
			$HtmlBody .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\n";
			$HtmlBody .= "</head>\n";
			$HtmlBody .= "<body>\n";
			$HtmlBody .= $MailTemplete["Note"];
			$HtmlBody .= "</body>\n";
			$HtmlBody .= "</html>\n";
			$MailObj = new SendMail();
			$MailObj->SetFrom("『DSLR FUN外拍網』管理者",$Web['ManagerEmail']);
			$MailObj->AddTo($ToData["MemberName"],$ToData["EMail"]);
			$MailObj->Send($MailTemplete["Subject"],$HtmlBody);
		}
	}
?>