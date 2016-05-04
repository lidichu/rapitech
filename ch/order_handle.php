<?php ob_start(); ?>
<?php include_once('../PageHead.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name= "keywords" content="<?php echo($Web_Keywords);?>" />
<meta name= "description" content="<?php echo($Web_Description);?>" />
<title><?php echo($Web_Title); ?></title>
</head>
<script type="text/javascript" src="../Scripts/jquery.js"></script>
<body>
<?php
		$MysqlView=true;
	//訂購人資訊
		$MemName =CheckData($_POST["MemName"]);
		$MemEmail=CheckData($_POST["MemEmail"]);
		$MemTel=CheckData($_POST["MemTel"]); 
		$MemAddrCity=CheckData($_POST["MemAddrCity"]);
		$MemAddrArea=CheckData($_POST["MemAddrArea"]);
		$MemAddrZipCode=CheckData($_POST["MemAddrZipCode"]);
		$MemAddrOther=CheckData($_POST["MemAddrOther"]);
		$Address=$MemAddrZipCode.$MemAddrCity.$MemAddrArea.$MemAddrOther;
	//收件人資訊
		$ReceiverName=CheckData($_POST["ReceiverName"]);
		$ReceiverTel=CheckData($_POST["ReceiverTel"]);
		$SendAddrCity=CheckData($_POST["SendAddrCityFinal"]);
		$SendAddrArea=CheckData($_POST["SendAddrAreaFinal"]);
		$SendAddrZipCode=CheckData($_POST["SendAddrZipCode"]);
		$SendAddrOther=CheckData($_POST["SendAddrOther"]);
		$ReceiverAddress= "$SendAddrZipCode$SendAddrCity$SendAddrArea$SendAddrOther";
	//發票資訊
		//發票種類 二聯式 / 三聯式
		$TickectType=CheckData($_POST["TickectType"]);
		//統一編號
		$TicketID=CheckData($_POST["TicketID"]);
		//公司抬頭 
		$TicketTitle=CheckData($_POST["TicketTitle"]);
		$PayMethod="銀行匯款";
		$MemberSerialNo="123";
		//新增一筆新的訂單
		$SQL  = "Insert Into ordermain(MemberSerialNo,OrderDate,PayMethod,Status) ";
		$SQL .= "values($MemberSerialNo,NOW(),'$PayMethod','未處理')";	
			
		$Rs = mysql_query($SQL,$Conn);
		$MainSerialNo = mysql_insert_id();
		
		//新增一筆訂購人資料
		$SQL  = "Insert Into ordermember(`G0`,`MemberSerialNo`,`OrderName`,`OrderSex`,`OrderEMail`,`OrderTel`,`OrderAddress`,`TickectType`,`TicketID`,`TicketTitle`)";
		$SQL .= " values($MainSerialNo,$MemberSerialNo,'$MemName','$MemSex','$MemEmail','$MemTel','$Address','$TickectType','$TicketID','$TicketTitle')";
		mysql_query($SQL,$Conn);	

		//新增一筆收件人資料
		$SQL  = "Insert Into orderreceiver(`G0`,`ReceiverName`,`ReceiverSex`,`ReceiverTel`,`ReceiverAddress`)";
		$SQL .= " values($MainSerialNo,'$ReceiverName','$ReceiverSex','$ReceiverTel','$ReceiverAddress')";
		mysql_query($SQL,$Conn);
		//新增明細
		if (count($BuyCar) >0 ){
			$TempPrice=0;
			$TotalPrice=0;
			foreach($BuyCar as $Key => $Value){
				$PrdSerialNo=$Key;
				$SQL="select * from product where status='上架' and SerialNo=".$PrdSerialNo;
				$Rs = mysql_query($SQL,$Conn);
				if($Rs && mysql_num_rows($Rs) > 0){
					$Row=mysql_fetch_array($Rs);
					$PrdName=$Row["PrdName"];            	//產品名稱
					$PrdPrice=$Row["PrdPrice"];				//價格
					$TempPrice = $PrdPrice * $Value;
					$TotalPrice = $TotalPrice + $TempPrice;			
					//新增訂單明細資料
					$SQL  = "Insert Into orderitem(G0,StyleSerialNo,PrdName,PrdAmount,PrdPrice)";
					$SQL .= " values($MainSerialNo,$PrdSerialNo,'$PrdName','$Value','$PrdPrice')";
					mysql_query($SQL,$Conn);	
				}
				else{
					setcookie("BuyCar","",time() - 24*60*60,"/","",0);
					notify("發生錯誤1，請重新購買","index.php","");
					
				}
			}
		}else{
			setcookie("BuyCar","",time() - 24*60*60,"/","",0);
			notify("發生錯誤2，請重新購買","index.php","");	
		}
		
		
		//取得訂單編號並更新訂單
		$SQL="Select OrderDate from ordermain Where SerialNo = ".$MainSerialNo;
		$Rs = mysql_query($SQL,$Conn);
		if($Rs && mysql_num_rows($Rs) > 0){
			$Row = mysql_fetch_array($Rs);
			$OrderNumber = DateOrder($Row["OrderDate"]).substr(strval($MainSerialNo),-1);
			$SQL = "Update ordermain Set OrderNumber = '".$OrderNumber."',TotalPrice=$TotalPrice Where SerialNo = ".$MainSerialNo;
			if($MysqlView){
				$Rs = mysql_query($SQL,$Conn);
			}	
		}	
		//寄送購物通知信		
		$MailString = $MailString . "<html>";
		$MailString = $MailString . "<head>";
		$MailString = $MailString . "<meta http-equiv=\"Content-Type\" Content=\"text/html;charset=utf-8\" />" ;
		$MailString = $MailString . "<title>".$Web["WebTitle"]."</title>" ;
		//$MailString = $MailString . "<link href=\"".getHostUrl()."/css/style.css\" rel=\"stylesheet\" type=\"text/css\" />";
		$MailString = $MailString . "</head>";
		$MailString = $MailString . "<body>" ;
		$MailString = $MailString . "<span style=\"font-size:10pt;\">";
		$MailString = $MailString . "親愛的 $MemName  您好 :<br />";
		$MailString = $MailString . "這封信件是由 ".$Web["WebTitle"]." 系統自動發出，通知您本次的訂購程序已經完成，請勿直接回信！<br /><br />";
		$MailString = $MailString . "您的訂單編號：$OrderNumber ，以下為訂購清單：<br /><br />";
		$MailString = $MailString . "<table width=\"100%\" border=\"0\">";
		$MailString = $MailString . "<tr>";
		$MailString = $MailString . "<td align=\"left\" valign=\"top\"><font color=\"blue\" size=\"3\">購物明細</font></td>";
		$MailString = $MailString . "</tr>";
		$MailString = $MailString . "<tr>"; 
		$MailString = $MailString . "<td >";
		$MailString = $MailString . "<table width=\"70%\" border=\"0\" cellspacing=\"1\" cellpadding=\"1\">";
		$MailString = $MailString . "<tr>";
		$MailString = $MailString . "<td width=\"50%\" align=\"center\" bgcolor=\"#666666\" style=\"border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333\">商品名稱</td>";
		$MailString = $MailString . "<td width=\"16%\" align=\"center\" bgcolor=\"#666666\" style=\"border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333\">價格</td>";
		$MailString = $MailString . "<td width=\"17%\" align=\"center\" bgcolor=\"#666666\" style=\"border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333\">數量</td>";
		$MailString = $MailString . "<td width=\"17%\" align=\"center\" bgcolor=\"#666666\" style=\"border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333\">小計</td>";
		$MailString = $MailString . "</tr>";
		$TotalPrice=0;
		foreach($BuyCar as $Key => $Value){			
			//查詢資料庫
			$PrdSerialNo=$Key;
			$Sql="select * from product where status='上架' and SerialNo=".$PrdSerialNo;
			$Rs = mysql_query($Sql,$Conn);
			if($Rs && mysql_num_rows($Rs) > 0){
				$Row = mysql_fetch_array($Rs);
				$PrdName=$Row["PrdName"];
				$ProductPrice=$Row["PrdPrice"];
				$TempPrice = $ProductPrice * $Value;
				$TotalPrice = $TotalPrice + $TempPrice;	
			}
			$MailString = $MailString . "<tr>";
			$MailString = $MailString . "<td align=\"center\" >".$PrdName."</td>";
			$MailString = $MailString . "<td align=\"center\" >".NumHandle3($ProductPrice)."</td>";
			$MailString = $MailString . "<td align=\"center\" >".$Value."</td>";
			$MailString = $MailString . "<td align=\"center\" >".NumHandle3($TempPrice)."</td>";					
			$MailString = $MailString . "</tr>";
		}
		$MailString = $MailString . "</table>";
		$MailString = $MailString . "</td>";
		$MailString = $MailString . "</tr>";
		$MailString = $MailString . "<tr>";
		$MailString = $MailString . "<td colspan=\"6\" >";
		$MailString = $MailString . "<table width=\"70%\" bgcolor=\"#CCCCCC\" border=\"0\" cellspacing=\"1\" cellpadding=\"1\">";
		$MailString = $MailString . "<tr>";
		$MailString = $MailString . "<td width=\"83%\" align=\"right\">商品金額總計</td>";
		$MailString = $MailString . "<td width=\"17%\" align=\"center\">". NumHandle3($TotalPrice). "</td>";
		$MailString = $MailString . "</tr>";
		$MailString = $MailString . "</table>";
		$MailString = $MailString . "</td>";
		$MailString = $MailString . "</tr>";		
		$MailString = $MailString . "<tr>";
		$MailString = $MailString . "<td align=\"left\" valign=\"top\"><font color=\"blue\" size=\"3\">訂購人資訊</font></td>";
		$MailString = $MailString . "</tr>";
		$MailString = $MailString . "<tr>";
		$MailString = $MailString . "<td align=\"left\" valign=\"top\">";
		$MailString = $MailString . "<table border=\"0\" cellspacing=\"1\" cellpadding=\"3\">";
		$MailString = $MailString . "<tr>";
		$MailString = $MailString . "<td width=\"100\" height=\"25\" align=\"center\" bgcolor=\"#CCCCCC\">中文全名</td>";
		$MailString = $MailString . "<td height=\"25\" align=\"left\" >". $MemName . $MemSex . "</td>";
		$MailString = $MailString . "</tr>";
		$MailString = $MailString . "<tr>";
		$MailString = $MailString . "<td height=\"25\" align=\"center\" bgcolor=\"#CCCCCC\">電子郵件</td>";
		$MailString = $MailString . "<td height=\"25\" align=\"left\"><a>". $MemEmail ."</a></td>";
		$MailString = $MailString . "</tr>";
		$MailString = $MailString . "<tr>";
		$MailString = $MailString . "<td height=\"25\" align=\"center\" bgcolor=\"#CCCCCC\">聯絡電話</td>";
		$MailString = $MailString . "<td height=\"25\" align=\"left\">". $MemTel ."</td>";
		$MailString = $MailString . "</tr>";
		$MailString = $MailString . "<tr>";
		$MailString = $MailString . "<td height=\"25\" align=\"center\" bgcolor=\"#CCCCCC\">聯絡地址</td>";
		$MailString = $MailString . "<td height=\"25\" align=\"left\">". $Address ."</td>";
		$MailString = $MailString . "</tr>";
		$MailString = $MailString . "<tr>";
		$MailString = $MailString . "<td height=\"25\" align=\"center\" bgcolor=\"#CCCCCC\">發票資訊</td>";
		$MailString = $MailString . "<td height=\"25\" align=\"left\">". $TickectType ."</td>";
		$MailString = $MailString . "</tr>";
		if ($TickectType=="三聯式"){
		$MailString = $MailString . "<tr>";
		$MailString = $MailString . "<td height=\"25\" align=\"center\" bgcolor=\"#CCCCCC\">統一編號</td>";
		$MailString = $MailString . "<td height=\"25\" align=\"left\">". $TicketID ."</td>";
		$MailString = $MailString . "</tr>";
		$MailString = $MailString . "<tr>";
		$MailString = $MailString . "<td height=\"25\" align=\"center\" bgcolor=\"#CCCCCC\">公司抬頭</td>";
		$MailString = $MailString . "<td height=\"25\" align=\"left\">". $TicketTitle ."</td>";
		$MailString = $MailString . "</tr>";
		}
		$MailString = $MailString . "</table>";
		$MailString = $MailString . "</td>";
		$MailString = $MailString . "</tr>";
		$MailString = $MailString . "<tr>";
		$MailString = $MailString . "<td align=\"left\" valign=\"top\"><font color=\"blue\" size=\"3\">收件人資訊</font></td>";
		$MailString = $MailString . "</tr>";
		$MailString = $MailString . "<tr>";
		$MailString = $MailString . "<td align=\"left\" valign=\"top\">";
		$MailString = $MailString . "<table border=\"0\" cellspacing=\"1\" cellpadding=\"3\">";
		$MailString = $MailString . "<tr>";
		$MailString = $MailString . "<td width=\"100\" height=\"25\" align=\"center\" bgcolor=\"#CCCCCC\">中文全名</td>";
		$MailString = $MailString . "<td height=\"25\" align=\"left\">". $ReceiverName . $ReceiverSex . "</td>";
		$MailString = $MailString . "</tr>";
		$MailString = $MailString . "<tr>";
		$MailString = $MailString . "<td height=\"25\" align=\"center\" bgcolor=\"#CCCCCC\">聯絡電話</td>";
		$MailString = $MailString . "<td height=\"25\" align=\"left\">". $ReceiverTel ."</td>";
		$MailString = $MailString . "</tr>"	;
		$MailString = $MailString . "<tr>";
		$MailString = $MailString . "<td height=\"25\" align=\"center\" bgcolor=\"#CCCCCC\">聯絡地址</td>";
		$MailString = $MailString . "<td height=\"25\" align=\"left\">". $ReceiverAddress ."</td>";
		$MailString = $MailString . "</tr>";
		$MailString = $MailString . "</table>";
		$MailString = $MailString . "</td>";
		$MailString = $MailString . "</tr>";
		$MailString = $MailString . "</table>";																					
		$MailString = $MailString . "當您有任何使用上的問題時，可以利用下列的資訊與我們聯絡：<br/>";
		$MailString = $MailString . "客服信箱：<a href=\"".$Web["ManagerEmail"]."\">".$Web["ManagerEmail"]."</a><br/>";
		$MailString = $MailString . $Web["WebTitle"].":".getHostUrl()."<br/>";
		$MailString = $MailString . "</span>";
		$MailString = $MailString . "</body>";
		$MailString = $MailString . "</html>";	
		SendMail($Web["WebTitle"],$Web["ManagerEmail"],$MemName,$MemEmail,"購物通知!訂單編號：".$OrderNumber,$MailString,"",$Web["EMailServer"],"");
		SendMail($Web["WebTitle"],$Web["ManagerEmail"],$Web["WebTitle"],$Web["ManagerEmail"],"購物通知!訂單編號：".$OrderNumber,$MailString,"",$Web["EMailServer"],"");
		
		//將信件內容寫回訂單		
		$upsql="UPDATE ordermain SET `MailString` = '$MailString' WHERE `SerialNo` =$MainSerialNo";
		mysql_query($upsql,$Conn);
		setcookie("BuyCar","",time() - 24*60*60,"/","",0);
		notify("感謝您的購買，我們會盡快處理您的訂單","index.php","window.parent.CloseBG();");
?>
</body>
</html>
<?php ob_flush(); ?>