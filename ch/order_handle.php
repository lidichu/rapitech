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
		
		//詢問人資訊
		$MemName =CheckData($_POST["Name"]);
		$MemEmail=CheckData($_POST["Email"]);
		$MemTel=CheckData($_POST["Phone"]); 
		$MemAddrCity=CheckData($_POST["AddressCity"]);
		$MemAddrArea="";//CheckData($_POST["MemAddrArea"]);
		$MemAddrZipCode="";//CheckData($_POST["MemAddrZipCode"]);
		$MemAddrOther="";//CheckData($_POST["MemAddrOther"]);
		$Address=$MemAddrZipCode.$MemAddrCity.$MemAddrArea.$MemAddrOther;
		$Message=CheckData($_POST["Message"]); 
		$OrderDate=date("Y-m-d H:i:s");
		$OrderNumber=DateOrder($OrderDate).time();
		$BuyCar=json_decode($_POST["CartList"], true);
		
		//新增一筆新的訂單
		$SQL  = "Insert Into ordermain(`OrderDate`,`OrderNumber`,`OrderName`,`OrderEMail`,`OrderTel`,`OrderAddress`,`Status`,`Message`,`MailString`) ";
		$SQL .= "values('$OrderDate','$OrderNumber','$MemName','$MemEmail','$MemTel','$Address','未處理','$Message','')";	
			
		$Rs = mysql_query($SQL,$Conn);
		$MainSerialNo = mysql_insert_id();

		//新增明細
		if (count($BuyCar) >0 ){
			foreach($BuyCar as $Key => $Value){
				$PrdSerialNo=$Value["id"];
				$SQL="select * from product where status='上架' and SerialNo=".$PrdSerialNo;
				$Rs = mysql_query($SQL,$Conn);
				if($Rs && mysql_num_rows($Rs) > 0){
					$Row=mysql_fetch_array($Rs);
					$PrdName=$Row["PrdName"];            	//產品名稱
					$PrdModelNo=$Row["ModelNo"];            	//產品ModelNo
					$PrdAmount=$Value["amount"];
					//新增訂單明細資料
					$SQL  = "Insert Into orderitem(G0,StyleSerialNo,PrdName,PrdAmount,PrdModelNo)";
					$SQL .= " values($MainSerialNo,$PrdSerialNo,'$PrdName',$PrdAmount,'$PrdModelNo')";
					mysql_query($SQL,$Conn);	
				}
				else{
					setcookie("BuyCar","",time() - 24*60*60,"/","",0);
					notify("ERROR！Please reselect","index.php","");
				}
			}
		}else{
			setcookie("BuyCar","",time() - 24*60*60,"/","",0);
			notify("ERROR！Please reselect","index.php","");	
		}
		
		//寄送購物通知信	
		/* */
		$MailString = $MailString . "<html>";
		$MailString = $MailString . "<head>";
		$MailString = $MailString . "<meta http-equiv=\"Content-Type\" Content=\"text/html;charset=utf-8\" />" ;
		$MailString = $MailString . "<title>".$Web["WebTitle"]."</title>" ;
		$MailString = $MailString . "</head>";
		$MailString = $MailString . "<body>" ;
		$MailString = $MailString . "<span style=\"font-size:10pt;\">";
		$MailString = $MailString . "Dear: $MemName:<br />";
		$MailString = $MailString . "This is an automatically generated email Please do not reply to this email address.<br /><br />";
		$MailString = $MailString . "Inquiry No：$OrderNumber<br /><br />";
		$MailString = $MailString . "<table width=\"100%\" border=\"0\">";
		$MailString = $MailString . "<tr>";
		$MailString = $MailString . "<td align=\"left\" valign=\"top\"><font color=\"blue\" size=\"3\">Inquiry detail</font></td>";
		$MailString = $MailString . "</tr>";
		$MailString = $MailString . "<tr>"; 
		$MailString = $MailString . "<td >";
		$MailString = $MailString . "<table width=\"70%\" border=\"0\" cellspacing=\"1\" cellpadding=\"1\">";
		$MailString = $MailString . "<tr>";
		$MailString = $MailString . "<td width=\"50%\" align=\"center\" bgcolor=\"#CCCCCC\" style=\"border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333\">Product Name</td>";
		$MailString = $MailString . "<td width=\"40%\" align=\"center\" bgcolor=\"#CCCCCC\" style=\"border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333\">Model No</td>";
		$MailString = $MailString . "<td width=\"10%\" align=\"center\" bgcolor=\"#CCCCCC\" style=\"border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333\">Qty</td>";
		$MailString = $MailString . "</tr>";
		foreach($BuyCar as $Key => $Value){			
			$MailString = $MailString . "<tr>";
			$MailString = $MailString . "<td align=\"center\" >".$Value["title"]."</td>";
			$MailString = $MailString . "<td align=\"center\" >".$Value["modelNo"]."</td>";
			$MailString = $MailString . "<td align=\"center\" >".$Value["amount"]."</td>";
			$MailString = $MailString . "</tr>";
		}
		$MailString = $MailString . "</table>";
		$MailString = $MailString . "</td>";
		$MailString = $MailString . "</tr>";
		$MailString = $MailString . "<tr>";
		$MailString = $MailString . "<td colspan=\"6\" >";
		$MailString = $MailString . "</td>";
		$MailString = $MailString . "</tr>";		
		$MailString = $MailString . "<tr>";
		$MailString = $MailString . "<td align=\"left\" valign=\"top\"><font color=\"blue\" size=\"3\"></font></td>";
		$MailString = $MailString . "</tr>";
		$MailString = $MailString . "<tr>";
		$MailString = $MailString . "<td align=\"left\" valign=\"top\">";
		$MailString = $MailString . "<table border=\"0\" cellspacing=\"1\" cellpadding=\"3\">";
		$MailString = $MailString . "<tr>";
		$MailString = $MailString . "<td width=\"100\" height=\"25\" align=\"center\" bgcolor=\"#f2f2f2\">Name</td>";
		$MailString = $MailString . "<td height=\"25\" align=\"left\" >". $MemName . "</td>";
		$MailString = $MailString . "</tr>";
		$MailString = $MailString . "<tr>";
		$MailString = $MailString . "<td height=\"25\" align=\"center\" bgcolor=\"#f2f2f2\">E-mail</td>";
		$MailString = $MailString . "<td height=\"25\" align=\"left\"><a>". $MemEmail ."</a></td>";
		$MailString = $MailString . "</tr>";
		$MailString = $MailString . "<tr>";
		$MailString = $MailString . "<td height=\"25\" align=\"center\" bgcolor=\"#f2f2f2\">Number</td>";
		$MailString = $MailString . "<td height=\"25\" align=\"left\">". $MemTel ."</td>";
		$MailString = $MailString . "</tr>";
		$MailString = $MailString . "<tr>";
		$MailString = $MailString . "<td height=\"25\" align=\"center\" bgcolor=\"#f2f2f2\">Country/Region</td>";
		$MailString = $MailString . "<td height=\"25\" align=\"left\">". $Address ."</td>";
		$MailString = $MailString . "</tr>";
		$MailString = $MailString . "</table>";
		$MailString = $MailString . "</td>";
		$MailString = $MailString . "</tr>";
		$MailString = $MailString . "</td>";
		$MailString = $MailString . "</tr>";
		$MailString = $MailString . "</table>";																					
		$MailString = $MailString . "<br/>";
		$MailString = $MailString . "Customer Service：<a href=\"".$Web["ManagerEmail"]."\">".$Web["ManagerEmail"]."</a><br/>";
		$MailString = $MailString . $Web["WebTitle"].":".getHostUrl()."<br/>";
		$MailString = $MailString . "</span>";
		$MailString = $MailString . "</body>";
		$MailString = $MailString . "</html>";	
		SendMail($Web["WebTitle"],$Web["ManagerEmail"],$MemName,$MemEmail,"Inquiry No：".$OrderNumber,$MailString,"",$Web["EMailServer"],"");
		SendMail($Web["WebTitle"],$Web["ManagerEmail"],$Web["WebTitle"],$Web["ManagerEmail"],"Inquiry No：".$OrderNumber,$MailString,"",$Web["EMailServer"],"");
		
		//將信件內容寫回訂單		
		$upsql="UPDATE ordermain SET `MailString` = '$MailString' WHERE `SerialNo` =$MainSerialNo";
		mysql_query($upsql,$Conn);
		setcookie("BuyCar","",time() - 24*60*60,"/","",0);
		notify("We just received your inquiry. We’ll get back to you about your order as soon as possible.","index.php"," localStorage.clear();");
?>
</body>
</html>
<?php ob_flush(); ?>