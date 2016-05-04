<?php ob_start(); ?>
<?php
	include_once("../../class/Manager.php");
	include_once("OrderParame.php");
	include_once("../../inc/Fun.php"); 			//公用程序
	include_once("../../inc/CheckHead.php"); 	//權限檢查
	include_once("../../inc/LevelOne.php"); 	//更新狀態與排序

	//層級
	$Level = 0;
	//標題文字
	$TableTitle = $Title01;
	//列表檔案名稱
	$MainFileName = $MainFileName01;
	//修改資料庫名稱
	$DBTable = $DatabaseName01;
	

	//接收參數
	$Option = $_REQUEST["option"];
	$YesNo = $_REQUEST["YesNo"];
	for($i=0;$i<=$Level;$i++){
		$G[$i] = $_REQUEST["G".$i];
	}
	//查詢用
	$Row=null;
	$SQL="select * From orderrecord Where SerialNo = ".$G[0];

	$Rs =mysql_query($SQL,$Conn);
	if($Rs && mysql_num_rows($Rs) > 0){
		$Row=mysql_fetch_array($Rs);
		$OrderMainSerialNo=$Row["G0"];            
		$MemberSerialNo=$Row["MemberSerialNo"];      
		$ManagerHandle=$Row["ManagerHandle"];      
		$PayHandle=$Row["PayHandle"];      
	}
	
	if($Option=="OK"){
		//產生新的訂單紀錄
		$SQL="UPDATE orderrecord SET `IsNew` = '否' WHERE  SerialNo =".$G[0];
		mysql_query($SQL,$Conn);
		if($PayMethod=="貨到付款")
		{
			$SQL  = "Insert Into orderrecord(`G0`,`MemberSerialNo`,`RecordDate`,`PayHandle`,`ManagerHandle`,`IsNew`)";
			$SQL .= " values($OrderMainSerialNo,'$MemberSerialNo',now(),'未付款','出貨中','是')";
		}else{
			$SQL  = "Insert Into orderrecord(`G0`,`MemberSerialNo`,`RecordDate`,`PayHandle`,`ManagerHandle`,`IsNew`)";
			$SQL .= " values($OrderMainSerialNo,'$MemberSerialNo',now(),'已付款','出貨中','是')";
		}
		mysql_query($SQL,$Conn);	
		echo "<script language=\"javascript\">";
		echo "alert(\"核對完成\");";
		echo "window.location.href=\"" . $MainFileName  . "\";";
		echo "</script>";
	}else if($Option=="NOK"){
	//訂單紀錄資訊
		//產生新的訂單紀錄
		$SQL="UPDATE orderrecord SET `IsNew` = '否' WHERE  SerialNo =".$G[0];
		mysql_query($SQL,$Conn);
		$SQL  = "Insert Into orderrecord(`G0`,`MemberSerialNo`,`RecordDate`,`PayHandle`,`ManagerHandle`,`IsNew`)";
		$SQL .= " values($OrderMainSerialNo,'$MemberSerialNo',now(),'未付款','金額有誤','是')";
		mysql_query($SQL,$Conn);	
		echo  "<script language=\"javascript\">";
		echo "alert(\"修改完成\");";
		echo "window.location.href=\"" . $MainFileName  . "\";";
		echo "</script>";
	}elseif($Option=="Del"){
		//查詢明細
		$Sql="select * from orderrecord where SerialNo =".$G[0];
		$Rs=mysql_query($Sql,$Conn);
		$Row=mysql_fetch_array($Rs);
		$OrderMainSerialNo=$Row["G0"];
		$Sql="select * from orderitem where G0=".$OrderMainSerialNo;
		$Rs=mysql_query($Sql,$Conn);
		if($Rs && mysql_num_rows($Rs)>0){
			while($Row=mysql_fetch_array($Rs)){
				$StyleSerialNo=$Row["StyleSerialNo"];
				$PrdAmount=$Row["PrdAmount"];
				$UpSql="update productstyle set OrderNum =OrderNum-".$PrdAmount." where SerialNo=".$StyleSerialNo;
				mysql_query($UpSql,$Conn);
			}
		}
		$SQL="UPDATE orderrecord SET `IsNew` = '否' WHERE  SerialNo =".$G[0];
		mysql_query($SQL,$Conn);
		$SQL  = "Insert Into orderrecord(`G0`,`MemberSerialNo`,`RecordDate`,`PayHandle`,`ManagerHandle`,`IsNew`)";
		$SQL .= " values($OrderMainSerialNo,'$MemberSerialNo',now(),'未付款','訂單取消','是')";
		mysql_query($SQL,$Conn);	
		echo  "<script language=\"javascript\">";
		echo "alert(\"訂單已取消\");";
		echo "window.location.href=\"" . $MainFileName  . "\";";
		echo "</script>";
	}else{}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script language="javascript" type="text/javascript" src="../../script/jquery.js"></script>
<script language="javascript" type="text/javascript" src="../../script/fun.js"></script>
<script language="javascript" type="text/javascript" src="../../script/NumText.js"></script>
<script language="javascript" src="../../script/My97DatePicker/WdatePicker.js"></script>
<script language="javascript" src="../../ckeditor/ckeditor.js"></script>
<style type="text/css">
.title2{
	color:#00F;
}
</style>
<script language="javaScript">
function cmdUpdate_onclick(){
 	var sError="";
	var msg="是否確定要修改？";
	if(sError!=""){alert(sError);}
	else{if(confirm(msg)){document.form1.submit();}}		
}
function cmdCancel_onclick(){
	window.location.href='Order.php'
}
function cmdOK_onclick(){
 	var sError="";
	var msg="是否確定核對無誤？";
	if(sError!=""){
		alert(sError);
	}
	else{
		if(confirm(msg)){
			window.location.href="<?php GetSCRIPTNAME()?>?option=OK&G0=<?php  echo $G[0] ?>"
		}
	}		
}
function cmdNOK_onclick(){
 	var sError="";
	var msg="金額確定有誤？";
	if(sError!=""){
		alert(sError);
	}
	else{
		if(confirm(msg)){
			window.location.href="<?php GetSCRIPTNAME()?>?option=NOK&G0=<?php  echo $G[0] ?>"
		}
	}		
}
function cmdDel_onclick(){
 	var sError="";
	var msg="是否確定取消訂單？";
	if(sError!=""){
		alert(sError);
	}
	else{
		if(confirm(msg)){
			window.location.href="<?php GetSCRIPTNAME()?>?option=Del&G0=<?php  echo $G[0] ?>"
		}
	}		
}
</script>
</head>
<body style="background-image:none;">
<table cellpadding="0" cellspacing="0" border="0" width="100%" Style="padding-top:10px">
	<tr>
		<td align="center">
			<table width="560" cellpadding="0" cellspacing="0" bordercolorlight="#FFFFFF" style="border:solid #A3BFE2 1px" border="0" bgcolor="#FFFFE1">
				<tr>
					<td bgcolor="#E0EFF8" align="center" height="30" style="font-size:12pt;color:#000000">
						<img src="../../images/computer.gif" BORDER="0" align="absmiddle">&nbsp;<?php echo $TableTitle; ?>&nbsp;&nbsp;&nbsp;
					</td>
				</tr>
			</table>		
		</td>
	</tr>
	<tr>
		<td align="center">
			<form action="<?php echo $MainFileName01?>" method="GET" id="form1" name="form1" style="margin:0px;padding:0px;margin-top:40px;" enctype="multipart/form-data">
			<?php include_once("Orderdetail.php"); ?>
			<INPUT type="button" value="返回" id="cmdCancel" name="cmdCancel" onClick="cmdCancel_onclick();">
			</form>		
		</td>
	</tr>	
</table>
</body>
</html>


<?php ob_flush(); ?>