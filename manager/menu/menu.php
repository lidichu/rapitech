<?php
$Root = "";
$SdbRoot = "../";
include_once("../inc/CheckHead.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>後端管理系統</title>
<link href="menu.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../script/jquery.js"></script>
<script language="javascript" type="text/javascript">
$(function(){
<?php
	//讀取外部結點
	if($id=="admin"){
		$SQL = "Select * From treelist Where LENGTH(Tree_ID) = 3 order by Sort";
		$Rs = $Conn->prepare($SQL);
	}else{
		$SQL = "Select * From treelist where Tree_ID in(Select Tree_ID From popedom Where Member_ID = :Member_ID ) and LENGTH(Tree_ID) = 3 order by Sort";
		$Rs = $Conn->prepare($SQL);
		$Rs->bindParam(':Member_ID', $LOGIN_SERIALNO);
	}
	$Rs->execute();
	while($Row = $Rs->fetch(PDO::FETCH_ASSOC)){
		echo "AddFolderItem(\"" . "T" . $Row->{"SerialNo"} . "\",\"".$Row->{"Tree_Name"}."\",\"".$Row->{"Href_File"}."\");\n";
	}
	//讀取資料夾節點
	if($id=="admin"){
		$SQL = "Select * From treelist where LENGTH(Tree_ID) = 2  order by Sort";
		$Rs = $Conn->prepare($SQL);
	}else{
		$SQL = "Select * From treelist where Tree_ID in(Select Tree_ID From popedom Where Member_ID = :Member_ID and LENGTH(Tree_ID) = 2 ) order by Sort";
		$Rs = $Conn->prepare($SQL);
		$Rs->bindParam(':Member_ID', $LOGIN_SERIALNO);
	}
	$AmountD = array();
	$Rs->execute();
	while($Row = $Rs->fetch(PDO::FETCH_ASSOC)){
		switch($Row["Tree_ID"]){
			
			/*
			case "32":
			// 訂單管理
				$Amount=0;
				$AmountD["3210"] = 0; 				
				
				// 檢查有沒有新留言
				$SQL = "select Count(*) As Num from qa_ch where Status = '上架' and G0 in ( select SerialNo from qacategory_ch where Status = '上架') AND SerialNo NOT in ( select G1 from qareply_ch )";
				$Rs2 = $Conn->prepare($SQL);
				$Rs2->execute();
				$Row2 = $Rs2->fetch(PDO::FETCH_ASSOC);
				$AmountD["3210"] = intval($Row2["Num"]);
				$Amount += intval($Row2["Num"]);
				
				$SQL = "select Count(*) As Num from qa_en where Status = '上架' and G0 in ( select SerialNo from qacategory_en where Status = '上架') AND SerialNo NOT in ( select G1 from qareply_en )";
				$Rs2 = $Conn->prepare($SQL);
				$Rs2->execute();
				$Row2 = $Rs2->fetch(PDO::FETCH_ASSOC);
				$AmountD["3220"] = intval($Row2["Num"]);
				$Amount += intval($Row2["Num"]);
				
				echo "AddFolder(\"" . "T" . $Row["SerialNo"] . "\",\"".$Row["Tree_Name"]."<span style='color:#F00' id='Menu_OA'>(".$Amount.")</span>\");\n";
				break;
				
			case "11":
				// 會員管理
				$Amount=0;
				$AmountD["1120"] = 0; // VIP會員
				$SQL = "Select Count(*) As Num From (SELECT M.SerialNo,M.MemberID,M.MemberName,M.EMail,CASE (M.IsVIP) WHEN 'false' THEN '否' WHEN 'true' THEN '是' END as IsVIP,M.VIPID,SUM(OL.TotalPrice) as TotalPrice FROM `order_list` as OL, `orderrecord` as OD, `member` as M Where OL.SerialNo = OD.G0 And OD.IsNew = '是' And PayHandle <> '取消' And ManagerHandle = '交易完成' And M.MemberID = OL.MemberID And M.IsVIP = 'false' Group By M.MemberID) as V Where true and TotalPrice > 10000";
				$Rs2 = $Conn->prepare($SQL);
				$Rs2->execute();
				$Row2 = $Rs2->fetch(PDO::FETCH_ASSOC);
				$Amount += intval($Row2["Num"]);
				$AmountD["1120"] = intval($Row2["Num"]);
				echo "AddFolder(\"" . "T" . $Row["SerialNo"] . "\",\"".$Row["Tree_Name"]."<span style='color:#F00' id='Menu_MemberManager'>(".$Amount.")</span>\");\n";
				break;
			
			case "40":
				// 訂單管理
				$Amount=0;
				$AmountD["4010"] = 0; 
				$AmountD["4020"] = 0; 
				$AmountD["4030"] = 0; 
				
				// 核帳訂單
				$SQL = "Select Count(*) As Num From order_list as OL, orderrecord as OD Where true and OD.IsNew='是' and OD.ManagerHandle ='未處理' and OD.PayHandle not in('訂單取消','退貨申請') and OL.SerialNo = OD.G0";
				$Rs2 = $Conn->prepare($SQL);
				$Rs2->execute();
				$Row2 = $Rs2->fetch(PDO::FETCH_ASSOC);
				$AmountD["4010"] = intval($Row2["Num"]);
				$Amount += intval($Row2["Num"]);
				
				// 待出貨
				$SQL = "Select Count(*) As Num From order_list as OL, orderrecord as OD Where true and OD.IsNew='是' and OD.ManagerHandle ='訂單確認' and OL.SerialNo = OD.G0";
				$Rs2 = $Conn->prepare($SQL);
				$Rs2->execute();
				$Row2 = $Rs2->fetch(PDO::FETCH_ASSOC);
				$AmountD["4020"] = intval($Row2["Num"]);
				$Amount += intval($Row2["Num"]);
				
				// 已出貨
				$SQL = "Select Count(*) As Num From order_list as OL, orderrecord as OD Where true and OD.IsNew='是' and OD.ManagerHandle ='已出貨' and OL.SerialNo = OD.G0";
				$Rs2 = $Conn->prepare($SQL);
				$Rs2->execute();
				$Row2 = $Rs2->fetch(PDO::FETCH_ASSOC);
				$AmountD["4030"] = intval($Row2["Num"]);
				$Amount += intval($Row2["Num"]);
				
				echo "AddFolder(\"" . "T" . $Row["SerialNo"] . "\",\"".$Row["Tree_Name"]."<span style='color:#F00' id='Menu_OrderManager'>(".$Amount.")</span>\");\n";
				break;
			case "41":
				// 退換貨管理
				$Amount=0;
				$AmountD["4110"] = 0; // 未處理訂單
				$SQL = "Select Count(*) As Num From order_list as OL, orderrecord as OD Where true and OD.IsNew='是' and OD.ManagerHandle ='未處理' and OD.PayHandle ='退貨申請' and OL.SerialNo = OD.G0";
				$Rs2 = $Conn->prepare($SQL);
				$Rs2->execute();
				$Row2 = $Rs2->fetch(PDO::FETCH_ASSOC);
				$Amount += intval($Row2["Num"]);
				$AmountD["4110"] = intval($Row2["Num"]);
				echo "AddFolder(\"" . "T" . $Row["SerialNo"] . "\",\"".$Row["Tree_Name"]."<span style='color:#F00' id='Menu_ReturnManager'>(".$Amount.")</span>\");\n";
				break;
			case "42":
				// 訂單問題管理
				$Amount=0;
				$AmountD["4210"] = 0; // 未處理問題
				$SQL = "Select Count(*) As Num From orderquestion Where true and Status = '未處理'";
				$Rs2 = $Conn->prepare($SQL);
				$Rs2->execute();
				$Row2 = $Rs2->fetch(PDO::FETCH_ASSOC);
				$Amount += intval($Row2["Num"]);
				$AmountD["4210"] = intval($Row2["Num"]);
				echo "AddFolder(\"" . "T" . $Row["SerialNo"] . "\",\"".$Row["Tree_Name"]."<span style='color:#F00' id='Menu_OrderQuestionManager'>(".$Amount.")</span>\");\n";
				break;
			
				case "60":
				// 問與答管理
				$Amount=0;
				$AmountD["6010"] = 0; // 未處理問題
				$SQL = "Select Count(*) As Num From productquestion Where true and Status = '未處理'";
				$Rs2 = $Conn->prepare($SQL);
				$Rs2->execute();
				$Row2 = $Rs2->fetch(PDO::FETCH_ASSOC);
				$Amount += intval($Row2["Num"]);
				$AmountD["6010"] = intval($Row2["Num"]);
				echo "AddFolder(\"" . "T" . $Row["SerialNo"] . "\",\"".$Row["Tree_Name"]."<span style='color:#F00' id='Menu_QAManager'>(".$Amount.")</span>\");\n";
				break;
			*/	
			/*case "70":
				// 聯絡我們
				$Amount=0;
				$AmountD["7010"] = 0; // 未處理問題
				$SQL = "Select Count(*) As Num From contact Where true and Status = '未處理'";
				$Rs2 = $Conn->prepare($SQL);
				$Rs2->execute();
				$Row2 = $Rs2->fetch(PDO::FETCH_ASSOC);
				$Amount += intval($Row2["Num"]);
				$AmountD["7010"] = intval($Row2["Num"]);
				echo "AddFolder(\"" . "T" . $Row["SerialNo"] . "\",\"".$Row["Tree_Name"]."<span style='color:#F00' id='Menu_ContactManager'>(".$Amount.")</span>\");\n";
				break;*/
			default:
				echo "AddFolder(\"" . "T" . $Row["SerialNo"] . "\",\"".$Row["Tree_Name"]."\");\n";
				break;
				
		}
		//讀取
		if($id=="admin"){
			$SQL = "select * from treelist where  LENGTH(Tree_ID) = 4 and Tree_ID like Concat(:Tree_ID,'%') order by Sort";
			$Rs2 = $Conn->prepare($SQL);
			$Rs2->bindParam(':Tree_ID', $Row["Tree_ID"]);
			
		}else{
			$SQL = "select * from treelist where Tree_ID in(select Tree_ID From popedom Where Member_ID = :Member_ID and LENGTH(Tree_ID) = 4 and Tree_ID like Concat(:Tree_ID,'%')) order by Sort";
			$Rs2 = $Conn->prepare($SQL);
			$Rs2->bindParam(':Member_ID', $LOGIN_SERIALNO);
			$Rs2->bindParam(':Tree_ID', $Row["Tree_ID"]);
			
		}
		$Rs2->execute();
		while($Row2 = $Rs2->fetch(PDO::FETCH_ASSOC)){
			switch($Row2["Tree_ID"]){
				/*
				case "3210":
					echo "AddItem(\""."T".$Row["SerialNo"]."\",\"".$Row["Tree_Name"]."\",\"".$Row2["Tree_Name"]."<span style='color:#F00' id='Tree_OA_ch'>(".$AmountD[$Row2["Tree_ID"]].")</span>\",\"".$Row2["Href_File"]."\");\n";
					break;
				case "3220":
					echo "AddItem(\""."T".$Row["SerialNo"]."\",\"".$Row["Tree_Name"]."\",\"".$Row2["Tree_Name"]."<span style='color:#F00' id='Tree_OA_en'>(".$AmountD[$Row2["Tree_ID"]].")</span>\",\"".$Row2["Href_File"]."\");\n";
					break;
				case "1120":
					echo "AddItem(\""."T".$Row["SerialNo"]."\",\"".$Row["Tree_Name"]."\",\"".$Row2["Tree_Name"]."<span style='color:#F00' id='Tree_OUpDateVIP'>(".$AmountD[$Row2["Tree_ID"]].")</span>\",\"".$Row2["Href_File"]."\");\n";
					break;
					
				case "4010":
					echo "AddItem(\""."T".$Row["SerialNo"]."\",\"".$Row["Tree_Name"]."\",\"".$Row2["Tree_Name"]."<span style='color:#F00' id='Tree_OAOrder'>(".$AmountD[$Row2["Tree_ID"]].")</span>\",\"".$Row2["Href_File"]."\");\n";
					break;
				case "4020":
					echo "AddItem(\""."T".$Row["SerialNo"]."\",\"".$Row["Tree_Name"]."\",\"".$Row2["Tree_Name"]."<span style='color:#F00' id='Tree_OShipment'>(".$AmountD[$Row2["Tree_ID"]].")</span>\",\"".$Row2["Href_File"]."\");\n";
					break;
				case "4030":
					echo "AddItem(\""."T".$Row["SerialNo"]."\",\"".$Row["Tree_Name"]."\",\"".$Row2["Tree_Name"]."<span style='color:#F00' id='Tree_OFinished'>(".$AmountD[$Row2["Tree_ID"]].")</span>\",\"".$Row2["Href_File"]."\");\n";
					break;
				case "4110":
					echo "AddItem(\""."T".$Row["SerialNo"]."\",\"".$Row["Tree_Name"]."\",\"".$Row2["Tree_Name"]."<span style='color:#F00' id='Tree_RUnhandle'>(".$AmountD[$Row2["Tree_ID"]].")</span>\",\"".$Row2["Href_File"]."\");\n";
					break;
				
				case "4210":
					echo "AddItem(\""."T".$Row["SerialNo"]."\",\"".$Row["Tree_Name"]."\",\"".$Row2["Tree_Name"]."<span style='color:#F00' id='Tree_OQA'>(".$AmountD[$Row2["Tree_ID"]].")</span>\",\"".$Row2["Href_File"]."\");\n";
					break;
				case "6010":
					echo "AddItem(\""."T".$Row["SerialNo"]."\",\"".$Row["Tree_Name"]."\",\"".$Row2["Tree_Name"]."<span style='color:#F00' id='Tree_QAM'>(".$AmountD[$Row2["Tree_ID"]].")</span>\",\"".$Row2["Href_File"]."\");\n";
					break;
				*/	
				/*
				case "7010":
					echo "AddItem(\""."T".$Row["SerialNo"]."\",\"".$Row["Tree_Name"]."\",\"".$Row2["Tree_Name"]."<span style='color:#F00' id='Tree_OContact'>(".$AmountD[$Row2["Tree_ID"]].")</span>\",\"".$Row2["Href_File"]."\");\n";
					break;
					*/
				default:
					echo "AddItem(\"" . "T" . $Row["SerialNo"] . "\",\"".$Row["Tree_Name"]."\",\"".$Row2["Tree_Name"]."\",\"".$Row2["Href_File"]."\");\n";
					break;
					
			}
		}
	}
?>
});
</script>
<script language="javascript" type="text/javascript">
$(function(){
	$(".Folder").on("click",function(event){
		//if($(event.target).prop("className")=="Folder"){
			if($(this).parent().find(".Item").length > 0){
				if($(this).parent().find(".Item").eq(0).css("display")=="none"){
					$(this).parent().find(".Item").show();
					if($(this).parent().find(".openStatus1").eq(0).prop("src")=="ftv2plastnode.gif"){
						$(this).parent().find(".openStatus1").eq(0).prop("src","ftv2mlastnode.gif");
					}else{
						$(this).parent().find(".openStatus1").eq(0).prop("src","ftv2mnode.gif");
					}
					$(this).parent().find(".openStatus2").eq(0).prop("src","ftv2folderopen.gif");
				}else{
					if($(this).parent().find(".openStatus1").eq(0).prop("src")=="ftv2mlastnode.gif"){
						$(this).parent().find(".openStatus1").eq(0).prop("src","ftv2plastnode.gif");
					}else{
						$(this).parent().find(".openStatus1").eq(0).prop("src","ftv2pnode.gif");
					}
					$(this).parent().find(".openStatus2").eq(0).prop("src","ftv2folderclosed.gif");
					$(this).parent().find(".Item").hide();
				}
			}
		//}
	}).on("mouseenter",function(){
		$(this).css({"cursor":"pointer"})
	});
	$("#logoutlink").mouseover(function(){
		$(this).find("img").prop("src","../images/iconKey2.gif");
	}).mouseout(function(){
		$(this).find("img").prop("src","../images/iconKey1.gif");
	});

	$(".FolderAll").eq($(".FolderAll").length-1).find(".openStatus1").eq(0).prop("src","ftv2plastnode.gif");
	$(".FolderAll").each(function(){
		$(this).find(".Item").eq($(this).find(".Item").length-1).find(".ItemPic2").eq(0).prop("src","ftv2lastnode.gif");
	});
	$(".FolderAll").eq($(".FolderAll").length-1).find(".Item").each(function(){
		$(this).find(".ItemPic1").each(function(){
			$(this).prop("src","ftv2blank.gif");
		});
	});

});
function AddFolder(TreeSerialNo,FolderName){
	$("#TreeMenu").append('<div align="left" id="' + TreeSerialNo + '" class="FolderAll"><div class="Folder"><table border="0" cellspacing="0" cellpadding="0"><tr><td><img src="ftv2pnode.gif" border="0" class="openStatus1" /></td><td><img src="ftv2folderclosed.gif" border="0" class="openStatus2" /></td><td style="font-size:10pt;">'+FolderName+'</td></tr></table></div></div>');
}
function AddItem(TreeSerialNo,FolderName,ItemName,Href){
	$("#"+TreeSerialNo).append('<div align="left" id="' + ItemName + '" class="Item" style="display:none;"><div><table border="0" cellspacing="0" cellpadding="0"><tr><td><img src="ftv2vertline.gif" border="0" class="ItemPic1" /></td><td><img src="ftv2node.gif" border="0" class="ItemPic2" /></td><td><a href="'+Href+'" target="main">'+ItemName+'</a></td></tr></table></div></div>');
}
function AddFolderItem(TreeSerialNo,ItemName,Href){
	$("#TreeMenu").append('<div align="left" id="' + ItemName + '" class="Item"><div><table border="0" cellspacing="0" cellpadding="0"><tr><td><img src="ftv2node.gif" border="0" class="ItemPic2" /></td><td><a href="'+Href+'" target="main">'+ItemName+'</a></td></tr></table></div></div>');
}
</script>
</head>
<body bgColor="#EEEEEE" leftMargin="5" rightMargin="0" topmargin="0">
<br>
<img src="img/open.gif" border="0"><font size="2">後端管理</font>
<br>
<div id="TreeMenu"></div>
<hr size="1" width="95%">
<table WIDTH="100%" BORDER="0" CELLSPACING="0" CELLPADDING="1">
<tr><td align="center">
<span id="Logout">
<br/><a target="_top" href="../login.php" id="logoutlink"><img SRC="../images/iconKey1.gif" align="absmiddle" id="imgKey" border="0">登出系統 </a></span>
</td>
</tr>
</table>
</body>
</html>