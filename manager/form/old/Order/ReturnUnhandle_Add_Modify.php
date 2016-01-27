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
	$TableTitle = $Title06;
	//列表檔案名稱
	$MainFileName = $MainFileName06;
	//修改資料庫名稱
	$DBTable = $DatabaseName02M;
	//接收參數
	$Option = $_REQUEST["option"];
	$YesNo = $_REQUEST["YesNo"];
	for($i=0;$i<=$Level;$i++){
		$G[$i] = $_REQUEST["G".$i];
		$SF[$i] = $_REQUEST["SF".$i];
		$SK[$i] = $_REQUEST["SK".$i];
		$TS[$i] = $_REQUEST["TS".$i];
		$P[$i] = $_REQUEST["P".$i];
	}
	//狀態設定
	$StatusItem[0] = "男";
	$StatusItem[1] = "女";
	//接收列表
	$QueryList=Array();
	// 查詢參數
	$QueryParame = array();
	$UrlCode="";
	for($i=0;$i<count($QueryList);$i++){
		if($_REQUEST[$QueryList[$i]]!=""){
			$UrlCode.="&".$QueryList[$i]."=".$_REQUEST[$QueryList[$i]];
		}
	}
	$Param=array(
		"SerialNo"	=> $G[0]
	);
	$Temp_Row=GetTable("orderrecord","*",$Param,"Order by SerialNo DESC",1);   
	$PayHandle=$Temp_Row["PayHandle"];
	
	$M = new Manager();
	$M->AddDate("OrderDate","訂單日期",true);
	$M->AddText("OrderNumber","訂單編號",true);
	$M->AddText("FareWay","郵寄方式",true);
	$M->AddText("Fare","郵寄費用",true);
	$M->AddText("TotalPrice","總金額",true);
	$M->AddText("MemberID","會員編號",true);
	$M->AddText("MemberName","會員姓名",true);
	$M->AddText("MemberPriceCategory","會員身份",true);
	$M->AddText("MemberEmail","會員E-Mail",true);
	$M->AddText("MemberTel","會員電話",true);
	$M->AddText("MemberAddress","會員地址",true);
	$M->AddText("ReceiverName","收件人姓名",true);
	$M->AddText("ReceiverTel","收件人電話",true);
	$M->AddText("ReceiverAddress","收件人地址",true);
	$M->AddText("ReplyName","匯款人姓名",true);
	$M->AddText("ReplyTel","匯款人電話",true);
	$M->AddText("ReplyAccount","匯款人帳號",true);
	$M->AddDate4("ReplyDate","回報時間",true);
	$M->AddDate4("ShipDate","出貨時間",true);
	$M->AddText("BuyWay","購買方式",true);
	
	//新增用SQL
	$AddFieldsSQL = "";
	$AddValuesSQL = "";

	//修改用SQL
	$ModifySQL = "";
	if($Option=="Add"){
		//各項參數
		$TopTitle="新增-".$TableTitle;
		$MFun="AddShow";
		$SFun="AddScript";
		$Action=GetSCRIPTNAME()."?option=$Option&YesNo=true";
		$ButFun="cmdAdd_onclick()";
		
		if($YesNo=="true"){
			$M->AddHandle();
			if($Level > 0){
				if($AddFieldsSQL != ""){
					$AddFieldsSQL .= ",";
					$AddValuesSQL .= ",";
				}
				$AddFieldsSQL .= "G".($Level-1)."";
				$AddValuesSQL .= ":G".($Level-1);
				$QueryParame[":G".($Level-1)] = $G[$Level-1];
			}
			$SQL = "Insert Into ".$DBTable."(".$AddFieldsSQL.") values(".$AddValuesSQL.")";
			$Rs = $Conn->prepare($SQL);
			foreach($M->Param as $Field => $Value){
				$Rs->bindParam($Field, $M->Param[$Field]);
			}
			foreach($QueryParame as $Key => $Value){
				$Rs->bindParam($Key,$QueryParame[$Key]);
			}
			$Rs->execute();
			ReturnToPage($MainFileName,"新增完成",$UrlCode);
		}
	}elseif($Option=="Modify"){
		//各項參數
		$TopTitle="確認-".$TableTitle;
		$MFun="ModifyShow";
		$SFun="ModifyScript";
		$Action=GetSCRIPTNAME()."?option=$Option&YesNo=true";
		$ButFun="cmdUpdate_onclick()";
		//讀取資料
		$SQL="Select * From ".$DBTable." Where SerialNo = :SerialNo";
		$Rs = $Conn->prepare($SQL);
		$Rs->bindParam(":SerialNo", $G[$Level]);
		$Rs->execute();
		$Row = $Rs->fetch(PDO::FETCH_ASSOC);
		if(!$Row){
			ReturnToPage($MainFileName,"查無此筆資料",$UrlCode);
		}
		if($_POST["InternetCheck"]=="on"){
			$_POST["InternetCheck"]="true";
		}else{
			$_POST["InternetCheck"]="false";
		}
		if($_POST["FriendCheck"]=="on"){
			$_POST["FriendCheck"]="true";
		}else{
			$_POST["FriendCheck"]="false";
		}
		if($_POST["SkipCheck"]=="on"){
			$_POST["SkipCheck"]="true";
		}else{
			$_POST["SkipCheck"]="false";
		}
		if($_POST["OtherCheck"]=="on"){
			$_POST["OtherCheck"]="true";
		}else{
			$_POST["OtherCheck"]="false";
		}
		
		if($YesNo=="true"){
			//查詢目前修改id
			$M->ModifyHandle();
			$SQL = "Update ".$DBTable." Set ".$ModifySQL.",`InternetCheck` = '".$_POST["InternetCheck"]."',`FriendCheck` = '".$_POST["FriendCheck"]."',`SkipCheck` = '".$_POST["SkipCheck"]."',`OtherCheck` = '".$_POST["OtherCheck"]."',`OtherText` = '".$_POST["OtherText"]."' Where SerialNo= :SerialNo";
			$Rs = $Conn->prepare($SQL);
			foreach($M->Param as $Field => $Value){
				$Rs->bindParam($Field, $M->Param[$Field]);
			}
			$Rs->bindParam(":SerialNo", $G[$Level]);
			$Rs->execute();
			ReturnToPage($MainFileName,"修改完成",$UrlCode);
		}
	}elseif($Option=="Download"){
		$SerialNo = $_REQUEST["SerialNo"];
		$FieldName = $_REQUEST["FieldName"];
		$SQL="Select * From ".$DBTable." Where SerialNo = :SerialNo";
		$Rs = $Conn->prepare($SQL);
		$Rs->bindParam(":SerialNo", $SerialNo);
		$Rs->execute();
		$Row = $Rs->fetch(PDO::FETCH_ASSOC);
		FileHandle::Downloadfile($M->Fields[$FieldName]->FilePath.$Row[$M->Fields[$FieldName]->FieldNameHidden],$Row[$M->Fields[$FieldName]->FieldName]);
	}elseif($Option=="ReturnHandle"){
		$SN=$G[0];
		$Param=array(
			"SerialNo"	=> $SN
		);
		$Temp_Order_List=GetTable("order_list","*",$Param,"Order by SerialNo DESC",1);
		//修改訂單紀錄
		$SQL = "Update orderrecord Set IsNew = :IsNew Where G0 = :G0";
		$NewID = myExecSQL($SQL, array(
			":IsNew" => "否",
			":G0" => $SN
		));
		
		$Q="`G0`, `MemberID`, `RecordDate`, `PayHandle`, `ManagerHandle`, `IsNew`";
		$A="'".$SN."','".$Temp_Order_List["MemberID"]."','".Date('Y-m-d H:i:s')."','退貨申請','交易完成','是'";
		$SQL = "Insert Into orderrecord(".$Q.") values(".$A.")";
		$Rs = $Conn->prepare($SQL);
		$Rs->execute();
		
		//新增退換貨紀錄
		$SQL = "Update orderreturn Set Status = :Status Where G0 = :G0";
		$NewID = myExecSQL($SQL, array(
			":Status" => "已處理",
			":G0" => $SN
		));
		ReturnToPage($MainFileName,"執行完畢","");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../../css/style.css" rel="stylesheet" type="text/css" />
<?php include_once('../../inc/IncludeScript.php'); ?>
<?php $M->{$SFun}() ?>
<script language="javascript" type="text/javascript">
var PayHandle="<?php echo $PayHandle?>";
$(function(){

});
//新增按鈕
function cmdAdd_onclick(){
	var sError="";
	<?php $M->CheckScript(); ?>
	if(sError!=""){alert(sError);}
	else{$("#form1").submit();}
}
//修改按鈕
function cmdUpdate_onclick(){
	var sError="";
	<?php $M->CheckScript(); ?>
	var msg="是否確定要修改？";
	if(sError!=""){alert(sError);}
	else{if(confirm(msg)){$("#form1").submit();}}
	
}
//取消按鈕
function cmdCancel_onclick(){
	<?php
	$VarString = $UrlCode;
	for($i=0;$i<=$Level;$i++){if($VarString!=""){$VarString.="&";}if($i!=$Level){$VarString .="G".$i."=".$G[$i];}}
	for($i=0;$i<=$Level;$i++){if($VarString!=""){$VarString.="&";}$VarString .="SF".$i."=".$SF[$i];}
	for($i=0;$i<=$Level;$i++){if($VarString!=""){$VarString.="&";}$VarString .="SK".$i."=".$SK[$i];}
	for($i=0;$i<=$Level;$i++){if($VarString!=""){$VarString.="&";}$VarString .="TS".$i."=".$TS[$i];}
	for($i=0;$i<=$Level;$i++){if($VarString!=""){$VarString.="&";}$VarString .="P".$i."=".$P[$i];}
	if($VarString!=""){$VarString = "?".$VarString;}
	echo "window.location.href =\"".$MainFileName.$VarString."\"\n";
	?>
}
//完成
function cmdSubmit_onclick(){
	var msg="是否確定退換貨完成？";
		if(confirm(msg)){
			$("#form1").attr("action","<?php echo GetSCRIPTNAME(); ?>?option=ReturnHandle");
			$("#form1").submit();
		}	
}
</script>
</head>
<body>
<table cellpadding="0" cellspacing="0" border="0" width="100%">
	<tr>

		<td align="center">
			<table width="560" cellpadding="0" cellspacing="0" bordercolorlight="#FFFFFF" style="border:solid #A3BFE2 1px;margin-bottom:25px" border="0" bgcolor="#FFFFE1">
				<tr>
					<td bgcolor="#E0EFF8" align="center" height="30" style="font-size:12pt;color:#000000">
						<img src="../../images/computer.gif" BORDER="0" align="absmiddle">&nbsp;<?php echo $TopTitle; ?>&nbsp;&nbsp;&nbsp;
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td align="center">
			<form action="<?php echo $Action?>" method="POST" id="form1" name="form1" enctype="multipart/form-data" >
			<?php
			for($i=0;$i<=$Level;$i++){
				echo "<input type=\"hidden\" name=\"G".$i."\" id=\"G".$i."\" value=\"".$G[$i]."\"/>\n";
				echo "<input type=\"hidden\" name=\"SF".$i."\" id=\"SF".$i."\" value=\"".$SF[$i]."\"/>\n";
				echo "<input type=\"hidden\" name=\"SK".$i."\" id=\"SK".$i."\" value=\"".$SK[$i]."\"/>\n";
				echo "<input type=\"hidden\" name=\"TS".$i."\" id=\"TS".$i."\" value=\"".$TS[$i]."\"/>\n";
				echo "<input type=\"hidden\" name=\"P".$i."\" id=\"P".$i."\" value=\"".$P[$i]."\"/>\n";
			}
			 for($i=0;$i<count($QueryList);$i++){
				echo "<input type=\"hidden\" name=\"".$QueryList[$i]."\" id=\"H_".$QueryList[$i]."\" value=\"".$_REQUEST[$QueryList[$i]]."\"/>\n";
			}
			?>
			<table width="600" border="1" cellspacing="0" bordercolorlight="#666666" bordercolordark="#FFFFFF">
				<tr>
					<td>
						<table border="0" bgcolor="#A3BFE2" cellspacing="1" cellpadding="5" width="100%" style="font-size:10pt">
							<?php $M->ReadShow()//  純顯示 ?>
							<tr>
								<td width="100%" colspan="2" bgcolor="#EEEEEE" nowrap align="center"><font color="#FF8833">退換貨明細</font></td>
								
							</tr>
							<tr>
								<td width="100%" colspan="2" nowrap align="center" bgcolor="#FFFFFF">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td align="left" valign="top" bgcolor="#CCCCCC">
												<table width="100%" border="0" cellspacing="1" cellpadding="2">
													<tr>
														<td width="15%" align="center" valign="middle" bgcolor="#EAEAEA">退換貨日期</td>
														<td width="25%" height="30" align="center" valign="middle" bgcolor="#EAEAEA">商品名稱</td>
														<td width="15%" align="center" valign="middle" bgcolor="#EAEAEA">退換貨數量</td>
														<td width="45%" align="center" valign="middle" bgcolor="#EAEAEA">退換貨原因</td>
													</tr>
													<?php
														$Temp_Return_Detail=GetTable3("order_detail","*","Where ReturnPrdNum <> 0 And G0 = '".$Row["SerialNo"]."'","Order by SerialNo");
														foreach($Temp_Return_Detail as $ReturnRow){
															$Param=array(
																"G0" => $Row["SerialNo"]
															);
															$Temp_Return_Time=GetTable("orderreturn","*",$Param,"Order by SerialNo",1);
													?>
													<tr>
														<td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo (date("Y-m-d", strtotime($Temp_Return_Time["PostDate"]))); ?></td>
														<td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo ($ReturnRow["ProductName"]); ?></td>
														<td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo ($ReturnRow["ReturnPrdNum"]); ?></td>
														<td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo ($ReturnRow["ReturnPrdText"]); ?></td>
													</tr>
													<?php
														}
													?>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td width="100%" colspan="2" bgcolor="#EEEEEE" nowrap align="center"><font color="#FF8833">訂單明細</font></td>
							</tr>
							<tr>
								<td width="100%" colspan="2" nowrap align="center" bgcolor="#FFFFFF">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td align="left" valign="top" bgcolor="#CCCCCC">
												<table width="100%" border="0" cellspacing="1" cellpadding="2">
													<tr>
														<td width="30%" height="30" align="center" valign="middle" bgcolor="#EAEAEA">商品名稱</td>
														<td width="18%" height="30" align="center" valign="middle" bgcolor="#EAEAEA">商品編號</td>
														<td width="16%" height="30" align="center" valign="middle" bgcolor="#EAEAEA">商品售價</td>
														<td width="16%" align="center" valign="middle" bgcolor="#EAEAEA">VIP會員價</td>
														<td width="9%" align="center" valign="middle" bgcolor="#EAEAEA">數量</td>
														<td width="11%" align="center" valign="middle" bgcolor="#EAEAEA">小計</td>
													</tr>
													<?php
														$Param=array(
															"SerialNo" => $Row["SerialNo"]
														);
														$Temp_Order_List=GetTable("order_list","*",$Param,"Order by SerialNo",1);
														$Param=array(
															"G0" => $Temp_Order_List["SerialNo"]
														);
														$Temp_Order_Detail=GetTable("order_detail","*",$Param,"Order by SerialNo");
														$Fare=$Temp_Order_List["Fare"];
														$Total=0;
														foreach($Temp_Order_Detail as $Row){
															$ProductName=$Row["ProductName"];
															$ProductID=$Row["ProductID"];
															$Counts=$Row["ProductNum"];
															$Price=$Row["ProductPrice"];
															$VIPPrice=$Row["ProductPriceVIP"];
															if($Row["PriceCategory"]=="一般會員"){
																$PriceTotal=((int)$Price)*((int)$Counts);
															}else{
																$PriceTotal=((int)$VIPPrice)*((int)$Counts);
															}
															$Total=$Total+$PriceTotal;
															$Param=array(
																"SerialNo" => $Row["ProductSN"]
															);
																$Temp_Pro=GetTable("product","*",$Param,"Order by SerialNo",1);
													?>
													<tr>
													<td height="30" align="center" valign="middle" bgcolor="#FFFFFF"><span style="padding-top:3px"><?php echo ($ProductName); ?></span></td>
													<td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo ($ProductID); ?></td>
													<td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo ($Price); ?></td>
													<td align="center" valign="middle" bgcolor="#FFFFFF" class="red_2"><?php echo ($VIPPrice); ?></td>
													<td align="center" valign="middle" bgcolor="#FFFFFF"><span style="padding-top:3px"> <?php echo ($Counts); ?> </span></td>
													<td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo ($PriceTotal); ?></td>
													</tr>
													<?php
														}
														if($Total>=6000){
															$Total=$Total*0.9;
														}
													?>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td width="100%" colspan="2" nowrap align="center" bgcolor="#FFFFFF" >
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td width="33%" height="30">&nbsp;</td>
											<td width="45%" height="30" align="right">商品金額總計</td>
											<td width="22%" height="30" align="right" style="padding-right:50px"><?php echo ($Total); ?></td>
										</tr>
										<tr>
											<td height="30">&nbsp;</td>
											<td height="30" align="right">運費</td>
											<td height="30" align="right" style="padding-right:50px"><?php echo ($Fare); ?></td>
										</tr>
										<tr>
											<td height="30">&nbsp;</td>
											<td height="30" align="right">應付金額總計</td>
											<td height="30" align="right" style="padding-right:50px" class="red_4"><?php echo ($Total+$Fare); ?></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<input type="button" value="退換貨完成" id="cmdF" name="cmdF" onClick="cmdSubmit_onclick();">
			<input type="button" value="返回" id="cmdEnter" name="cmdEnter" onclick="cmdCancel_onclick();">
			</form>
		</td>
	</tr>
</table>
</body>
</html>
<?php ob_flush(); ?>