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
	$Query = "select * from treelist where Tree_ID in(select Tree_ID From popedom Where Member_ID = " . $LOGIN_SERIALNO . " and LENGTH(Tree_ID) = 3 order by Sort";
	
	$Rs_check0 = mysql_query($Query,$Conn);
	if($Rs_check0 && mysql_num_rows($Rs_check0)>0){
		for ($i = 0; $i < mysql_num_rows($Rs_check0) ; $i++) {
			$Row=mysql_fetch_array($Rs_check0);			//取得一筆查詢結果資料
			echo "AddFolderItem(\"" . "T" . $Row["SerialNo"] . "\",\"".$Row["Tree_Name"]."\",\"".$Row["Href_File"]."\");\n";
		}
	}
	//讀取資料夾節點
	$Query = "select * from treelist where Tree_ID in(select Tree_ID From popedom Where Member_ID = " . $LOGIN_SERIALNO . " and LENGTH(Tree_ID) = 2 ) order by Sort";
	$Rs_check = mysql_query($Query,$Conn);
	
	if($Rs_check && mysql_num_rows($Rs_check)>0){
		for ($i = 0; $i < mysql_num_rows($Rs_check) ; $i++) {
			$Row=mysql_fetch_array($Rs_check);			//取得一筆查詢結果資料
			if($Row["Tree_ID"] == "30"){	
				$SQL="Select Count(*) as Counter From  ordermain Where Status='未處理'";
				$Rs3 = mysql_query($SQL,$Conn);
				$Row3 = mysql_fetch_array($Rs3);
				echo "AddFolder(\"" . "T" . $Row["SerialNo"] . "\",\"".$Row["Tree_Name"]."<span style='color:#F00' id='order'>(".$Row3["Counter"].")</span>\");\n";
			}elseif($Row["Tree_ID"] == "45"){	
				$SQL="Select Count(*) as Counter From  contact Where Status='未處理'";
				$Rs3 = mysql_query($SQL,$Conn);
				$Row3 = mysql_fetch_array($Rs3);
				echo "AddFolder(\"" . "T" . $Row["SerialNo"] . "\",\"".$Row["Tree_Name"]."<span style='color:#F00' id='contact'>(".$Row3["Counter"].")</span>\");\n";
			}
			else{
				echo "AddFolder(\"" . "T" . $Row["SerialNo"] . "\",\"".$Row["Tree_Name"]."\");\n";
			}
			//讀取
			$Query = "select * from treelist where Tree_ID in(select Tree_ID From popedom Where Member_ID = " . $LOGIN_SERIALNO . " and LENGTH(Tree_ID) = 4 and Tree_ID like '" . $Row["Tree_ID"] . "%') order by Sort";	
			$Rs_check2 = mysql_query($Query,$Conn);
			if($Rs_check && mysql_num_rows($Rs_check2)>0){
				for ($j = 0; $j < mysql_num_rows($Rs_check2) ; $j++) {
					$Row2=mysql_fetch_array($Rs_check2);			//取得一筆查詢結果資料
					if($Row2["Tree_ID"] == "3020"){
						$SQL="Select Count(*) as Counter From ordermain Where Status='未處理'";
						$Rs3 = mysql_query($SQL,$Conn);
						$Row3 = mysql_fetch_array($Rs3);
						echo "AddItem(\""."T".$Row["SerialNo"]."\",\"".$Row["Tree_Name"]."\",\"".$Row2["Tree_Name"]."<span style='color:#F00' id='order2'>(".$Row3["Counter"].")</span>\",\"".$Row2["Href_File"]."\");\n";					
					}elseif($Row2["Tree_ID"] == "4510"){
						$SQL="Select Count(*) as Counter From contact Where Status='未處理'";
						$Rs3 = mysql_query($SQL,$Conn);
						$Row3 = mysql_fetch_array($Rs3);
						echo "AddItem(\""."T".$Row["SerialNo"]."\",\"".$Row["Tree_Name"]."\",\"".$Row2["Tree_Name"]."<span style='color:#F00' id='contact2'>(".$Row3["Counter"].")</span>\",\"".$Row2["Href_File"]."\");\n";					
					}else{
						echo "AddItem(\"" . "T" . $Row["SerialNo"] . "\",\"".$Row["Tree_Name"]."\",\"".$Row2["Tree_Name"]."\",\"".$Row2["Href_File"]."\");\n";
					}
				}
			}
		}
	}
																															   
?>		   
});
</script>
<script language="javascript" type="text/javascript">
$(function(){
	$(".Folder").live("click",function(event){
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
	}).live("mouseenter",function(){
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

