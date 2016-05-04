<?php ob_start(); ?>
<?php include_once('../PageHead.php');?>
<?php
	$Order_View=true;
	$OrderClass1="menu01";
	$OrderClass2="menu02";
	if($CartNum<=0){
		notify("購物清單無任何商品","index.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/main.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name= "keywords" content="<?php echo $Web["Keywords"];?>" />
<meta name= "description" content="<?php echo $Web["Description"];?>" />
<!-- InstanceBeginEditable name="doctitle" -->
<title><?php echo($Web["WebTitle".$Lang]);?></title>
<!-- InstanceEndEditable -->
<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function MM_findObj(n, d) { //v4.01
var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
if(!x && d.getElementById) x=d.getElementById(n); return x;
}
function MM_swapImage() { //v3.0
var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
<?php include_once(VisualRoot.'Common/Script.php'); ?>
<script type="text/javascript"><?php include_once $VisualRoot."star/statjs.php"; ?></script>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<?php include_once(VisualRoot.'Common/Forum/Banner/BannerScript.php'); ?>
<link href="../Scripts/Carousel/Carousel.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../Scripts/Carousel/Carousel.js"></script>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<script type="text/javascript" src="../Scripts/myError.js"></script>
<script type="text/javascript" src="../Scripts/twzipcode2.js"></script>
<link href="../Scripts/lightBoxMessage/jquery-lightbox-Message.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../Scripts/lightBoxMessage/jquery-lightbox.js"></script>
<script type="text/javascript">
$(function(){
	$(".TickectTypeClass").bind("click",function(){
		
		if($(this).val()=="二聯式"){
			$(this).get(0).checked = true;
			$("#TicketID").val("").prop("readonly",true);
			$("#TicketTitle").val("").prop("readonly",true);
		}else if($(this).val()=="三聯式"){
			$(this).get(0).checked = true;
			$("#TicketID").prop("readonly",false);
			$("#TicketTitle").prop("readonly",false);
		}
	});
	
	if ($("#TicketID").val()!="")
		$(".TickectTypeClass").eq(1).trigger("click");
	else{
		$(".TickectTypeClass").eq(0).trigger("click");
	}	
	$("#MemAddrZipCode").attr("readonly",true);
	$("#MemAddrZipCode").val("");
	$("body").TwZipCode({
		CountryFieldName: 'MemAddrCity' , 
		AreaFieldName: 'MemAddrArea',
		ZipCodeFieldName:'MemAddrZipCode'
	});
	$("body").TwZipCode({
		CountryFieldName: 'SendAddrCity' ,
		AreaFieldName: 'SendAddrArea',
		ZipCodeFieldName:'SendAddrZipCode'
	});
	$("#Same").bind("click",function(){
		SameCheck();
	});	
	$("#MemName").blur(function(){
		if($("#Same").prop("checked")){
			$("#ReceiverName").val($(this).val());
		}
	})
	$("#MemTel").blur(function(){
		if($("#Same").prop("checked")){
			$("#ReceiverTel").val($(this).val());
		}
	})

	$("#MemAddrArea").change(function(){
		if($("#Same").prop("checked")){
			$("#SendAddrCity").val($("#MemAddrCity").val());
			$("#SendAddrCity").trigger("change");	
			$("#SendAddrArea").val($("#MemAddrArea").val());
			$("#SendAddrArea").trigger("change");
		}
	});
	$("#btnsubmit").lightbox_message({Width:400,Height:100,Title:"資料送出處理中，請稍候!!"});		
	$("#MemAddrOther").blur(function(){
		if($("#Same").prop("checked")){
			$("#SendAddrOther").val($(this).val());
		}
	})
	$("#btnsubmit").click(function(){
		$("#form1").submit();	
		
		return false;
	});
	$("#form1").submit(function(){
		var sError = new MyErrorCh();
		sError.checkNull("訂購人資訊-中文全名",$("#MemName").val());	
		sError.checkNull("訂購人資訊-聯絡電話",$("#MemTel").val());	
	//	sError.checkEMail("訂購人資訊-電子郵件",$("#MemEmail").val(),true);	
		sError.checkNull("訂購人資訊-聯絡地址縣/市",$("#MemAddrCity").val());
		sError.checkNull("訂購人資訊-聯絡地址鄉/鎮/市/區",$("#MemAddrArea").val());
		sError.checkNull("訂購人資訊-聯絡地址",$("#MemAddrOther").val());
		
		if($("#TicketID").prop("readonly")==false){
			sError.checkNull("統一編號",$("#TicketID").val());
			sError.checkCompanyID("統一編號",$("#TicketID").val());
			sError.checkNull("公司抬頭",$("#TicketTitle").val());	
		}
		sError.checkNull("收件人資訊-中文全名",$("#ReceiverName").val());	
		$("#ReceiverSexHidden").val($(".SexClass:checked").val());
		sError.checkNull("收件人資訊-聯絡電話",$("#ReceiverTel").val());	
		sError.checkNull("收件人資訊-收件地址縣/市",$("#SendAddrCity").val());
		sError.checkNull("收件人資訊-收件地址鄉/鎮/市/區",$("#SendAddrArea").val());		
		sError.checkNull("收件人資訊-收件地址",$("#SendAddrOther").val());
		$("#SendAddrCityFinal").val($("#SendAddrCity").val());
		$("#SendAddrAreaFinal").val($("#SendAddrArea").val());
		if(sError.pass()){
			$("#btnsubmit").trigger("_show");
			return true;
		}else{
			return false;	
		}
	});
	//SameCheck();
	$(".ProductAmountClass").each(function(i){
		$(".ProductAmountClass").eq(i).val($(".PrdAmount").eq(i).val());
	});
	//刪除商品
	$(".DeleteProduct").live("click",function(){
		var testMode = false;
		var Url = "carhandle.php";
		var eqIndex = $(".DeleteProduct").index($(this));
		var options = {
			PrdSerialNo: $(".PrdSerialNo").eq(eqIndex).val(),
			opp:"del"
		}
		if(!testMode){
			$.post(Url,options,function(data){
				if(data=="reload"){
					window.location.reload();
				}else{
					$(".PrdSerialNo[value=" + data + "]").parent().parent().remove();
					ResetTable();
				}
			});
		}else{
			//錯誤時測試用
			var QueryString = "";
			for(var key in options){
				if(QueryString!=""){QueryString+="&";}
				QueryString = QueryString + key + "=" + options[key];
			}
			if(QueryString!=""){QueryString = "?" + QueryString;}
			window.open(Url + QueryString);
		}			
		return false;	
	});	
	//修改商品
	$(".ProductAmountClass").change(function(){
		var testMode = false;
		var Url = "carhandle.php";
		var eqIndex = $(".ProductAmountClass").index($(this));
		var options = {
			PrdSerialNo: $(".PrdSerialNo").eq(eqIndex).val(),
			ProductNum:$(this).val(),
			opp:"modify"
		}
		var tempPrice = 0;
		tempPrice = parseInt($(".PrdPrice").eq(eqIndex).val()) * parseInt($(this).val());
		$(".TempPriceClass").eq(eqIndex).html(NumHandle3(tempPrice));
		if(!testMode){
			$.post(Url,options,function(data){			
				ResetTable();
			});
		}else{
			//錯誤時測試用
			var QueryString = "";
			for(var key in options){
				if(QueryString!=""){QueryString+="&";}
				QueryString = QueryString + key + "=" + options[key];
			}
			if(QueryString!=""){QueryString = "?" + QueryString;}
			window.open(Url + QueryString);
		}	
	});	
});
function ResetTable(){	
	var Amount= 0;
	var option="";
	total=0;
	//更新金額
	$(".PrdPrice").each(function(i){
		total += parseInt($(".PrdPrice").eq(i).val()) * parseInt($(".ProductAmountClass").eq(i).val());
		Amount+=parseInt($(".ProductAmountClass").eq(i).val());
	});
	//更新最後金額
	$("#TotalPrice").html(NumHandle3(total.toString()));
	//更新網站顯示資料
	$("#TopMiniCart").html(Amount);
	$("#CarNum").html(Amount);
	if(Amount<=0){
		alert("購物清單無任何商品");
		window.location='index.php';
	}
}
function SameCheck(){
	var $Same = $("#Same");
	if($Same.prop("checked")==true){
		$("#ReceiverName").val($("#MemName").val()).prop("readonly",true);
		$("#ReceiverTel").val($("#MemTel").val()).prop("readonly",true);
		$("body").TwZipCode({
			CountryFieldName: 'SendAddrCity' ,
			AreaFieldName: 'SendAddrArea',
			ZipCodeFieldName:'SendAddrZipCode',
			CurrentCountryValue:$("#MemAddrCity").val(),
			CurrentAreaValue:$("#MemAddrArea").val()				
		});
		$("#SendAddrOther").val($("#MemAddrOther").val()).prop("readonly",true);
		$("#SendAddrCity").prop("disabled",true);	
		$("#SendAddrArea").prop("disabled",true);
	}else{
		$("#ReceiverName").prop("readonly",false);
		$("#ReceiverTel").prop("readonly",false);
		$("#SendAddrCity").prop("disabled",false);	
		$("#SendAddrArea").prop("disabled",false);	
		$("#SendAddrOther").prop("readonly",false);		
	}	
}

function SetTitle(title){
	$("#btnSubmit").trigger("_setTitle",title);
}
function CloseBG(){
	$("#lightbox-message-background").trigger("_close");
}
</script> 
<!-- InstanceEndEditable -->
</head>
<body onload="MM_preloadImages('../images/but_a_o.jpg','../images/but_b_o.jpg','../images/but_c_o.jpg','../images/but_d_o.jpg','../images/but_e_o.jpg','../images/but_f_o.jpg')">
<table width="1003" border="0" align="center" cellpadding="0" cellspacing="0">
	<?php include_once("../Common/top.php");?>
	<tr>
		<td valign="top">
			<!-- InstanceBeginEditable name="EditRegion1" -->
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<?php include_once("../Common/left.php");?>
					<td width="85%" valign="top" style="padding-right:20px">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td height="56" valign="bottom">&nbsp;</td>
								<td align="right" valign="bottom">
									<table border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td><img src="images/00/img_01.jpg" width="22" height="22" /></td>
											<td class="page"><a href="index.php">首頁</a> &gt; 訂購說明</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td width="10" valign="bottom"><img src="images/00/line_top.jpg" width="4" height="4" /></td>
								<td width="734">&nbsp;</td>
							</tr>
							<tr>
								<td height="401" style="background-image:url(images/00/line_bg.jpg); width:4px; background-repeat:repeat-y;">&nbsp;</td>
								<td align="left" valign="top" style="padding-left:30px">
									<form id="form1" name="form1" action="order_handle.php" method="post" style="margin:0px;padding:0px;" target="MyIframe">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td>
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td width="3%"><img src="images/05_order/img_01.jpg" width="20" height="22" /></td>
														<td width="97%">目前購物車內合計有 <span class="text04" id="CarNum"><?php echo $CartNum?></span> 項商品</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td>&nbsp;</td>
										</tr>
										<tr>
											<td style="border:4px solid #171717">
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr class="text02">
														<td width="9%" height="34" align="center" bgcolor="#15151" style="border-right:1px solid #000; border-bottom:1px solid #333; border-top:1px solid #333; border-left:1px solid #333">刪除</td>
														<td width="41%" align="center" bgcolor="#15151" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">商品名稱</td>
														<td width="16%" align="center" bgcolor="#15151" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">價格</td>
														<td width="17%" align="center" bgcolor="#15151" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">數量</td>
														<td width="17%" align="center" bgcolor="#15151" style="border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333; border-right:1px solid #333">小計</td>
													</tr>
													<?php	
														$TotalPrice=0;
														$TotalAmount=0;
														if ($BuyCar !=""){
															foreach($BuyCar as $Key => $Value){
																$PrdSerialNo=$Key;
																$Sql="select * from product where status='上架' and SerialNo=".$PrdSerialNo;
																$Rs = mysql_query($Sql,$Conn);
																if($Rs && mysql_num_rows($Rs) > 0){
																	$Row = mysql_fetch_array($Rs);
																	$PrdName=$Row["PrdName"];
																	$PrdPrice=$Row["PrdPrice"];
																	$TempPrice = $PrdPrice * $Value;
																	$TotalPrice = $TotalPrice + $TempPrice;	
													?>
													<tr>
														<td height="34" align="center" style="border-bottom:1px solid #333; border-left:1px solid #333"><a class="DeleteProduct"  href="#">
															<img src="images/05_order/img_02.jpg" width="19" height="19" border="0" /></a>
															<input type="hidden" class="PrdSerialNo" value="<?php echo $PrdSerialNo?>" />
															<input type="hidden" class="PrdPrice" value="<?php echo $PrdPrice?>" />
														</td>
														<td height="34" class="text02" style="border-bottom:1px solid #333; padding-left:8px"><?php echo $PrdName?></td>
														<td height="34" align="center" class="text02" style="border-bottom:1px solid #333"><?php echo NumHandle3($PrdPrice)?></td>
														<td height="34" align="center" style="border-bottom:1px solid #333">
															<select class="ProductAmountClass" class="key">
																<?php for($i=1;$i<=10;$i++){?>
																<option value="<?php echo $i?>"><?php echo $i?></option>
																<?php }?>
															</select>
															<input class="PrdAmount" type="hidden" value="<?php echo($Value); ?>" />
														</td>
														<td height="34" align="center" class="text04 TempPriceClass" style="border-bottom:1px solid #333; border-right:1px solid #333"><?php echo NumHandle3($TempPrice)?></td>
													</tr>
													<?php
																}
															}
														}
														
													?>
													<tr>
														<td height="32" colspan="5" align="right" bgcolor="#151515" style="border-bottom:1px solid #333; border-right:1px solid #333; border-left:1px solid #333">
															<table border="0" cellspacing="0" cellpadding="0">
																<tr>
																	<td width="83%" align="right" class="text06">訂單金額總計：</td>
																	<td width="17%" align="right" class="text04" style="padding-right:40px" id="TotalPrice"><?php echo NumHandle3($TotalPrice)?></td>
																</tr>
															</table>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td height="30">&nbsp;</td>
										</tr>
										<tr>
											<td>
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td height="30" class="h1">
															<table width="100%" border="0" cellspacing="0" cellpadding="0">
																<tr>
																	<td width="1%"><img src="images/01_news/img_02.jpg" width="17" height="25" /></td>
																	<td width="99%">訂購人資訊</td>
																</tr>
															</table>
														</td>
													</tr>
													<tr>
														<td style="border:1px solid #333">
															<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="pro">
																<tr>
																	<td>&nbsp;</td>
																	<td>&nbsp;</td>
																</tr>
																<tr>
																	<td width="13%" height="30" style="padding-left:15px">中文全名／</td>
																	<td width="87%"><input name="MemName" type="text" id="MemName" value="" class="key" size="50" /><span class="text5"> 　先生/小姐</span></td>
																</tr>
																<tr>
																	<td height="30" style="padding-left:15px">電子郵件／</td>
																	<td><input name="MemEmail" type="text" id="MemEmail" value="" class="key" size="50" /></td>
																</tr>
																<tr>
																	<td height="30" style="padding-left:15px">聯絡電話／</td>
																	<td><input name="MemTel" type="text" id="MemTel" value="" class="key" size="50" /></td>
																</tr>
																<tr>
																	<td height="30" style="padding-left:15px">聯絡地址／</td>
																	<td>
																		<table border="0" cellspacing="0" cellpadding="0">
																			<tr>
																				<td><select name="MemAddrCity" class="key" id="MemAddrCity" style="width:80px;"></select></td>
																				<td width="10" align="center">-</td>
																				<td><select name="MemAddrArea" class="key" id="MemAddrArea" style="width:100px;"></select></td>
																				<td width="10" align="center">-</td>
																				<td><input type="text" name="MemAddrZipCode" class="key" id="MemAddrZipCode" style="width:40px;" maxlength="6" /></td>
																				<td width="10" align="center"></td>
																				<td><input name="MemAddrOther" type="text" class="key" id="MemAddrOther" size="30" value="<?php echo $MemAddrOther ?>" /></td>
																			</tr>
																		</table> 
																		
																	</td>
																</tr>
																<!--
																<tr>
																	<td height="30" valign="top" style="padding-left:15px; padding-top:8px">發票資訊／</td>
																	<td style="padding-top:5px">
																		<table width="100%" border="0" cellspacing="0" cellpadding="0">
																			<tr>
																				<td width="5%" height="25"><input class="TickectTypeClass key" name="TickectType" type="radio" value="二聯式" checked="checked" /></td>
																				<td width="95%" align="left" class="text5" style="padding-top:4px">二聯式</td>
																			</tr>
																			<tr>
																				<td height="25"><input class="TickectTypeClass key" value="三聯式" type="radio" name="TickectType" /></td>
																				<td align="left" class="text5" style="padding-top:4px">三聯式</td>
																			</tr>
																			<tr>
																				<td>&nbsp;</td>
																				<td>
																					<table width="100%" border="0" cellspacing="0" cellpadding="0">
																						<tr>
																							<td width="12%" class="text5">統一編號：</td>
																							<td width="36%"><input id="TicketID"  class="key" maxlength="8" size="25" name="TicketID" /></td>
																							<td width="13%" class="text5">公司抬頭：</td>
																							<td width="39%"><input id="TicketTitle" class="key" maxlength="255" size="25" name="TicketTitle" /></td>
																						</tr>
																					</table>
																				</td>
																			</tr>
																		</table>
																	</td>
																</tr>
																-->
																<tr>
																	<td valign="top">&nbsp;</td>
																	<td>&nbsp;</td>
																</tr>
															</table>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td height="30">&nbsp;</td>
										</tr>
										<tr>
											<td>
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td>
															<table width="100%" border="0" cellspacing="0" cellpadding="0">
																<tr>
																	<td width="2%"><img src="images/01_news/img_02.jpg" width="17" height="25" /></td>
																	<td width="13%" class="h1">收件人資訊</td>
																	<td width="85%">
																		<table width="100%" border="0" cellspacing="0" cellpadding="0">
																			<tr>
																				<td width="5%"><input type="checkbox" name="Same" id="Same" /></td>
																				<td width="95%" class="text02">收件人同上請打勾</td>
																			</tr>
																		</table>
																	</td>
																</tr>
															</table>
														</td>
													</tr>
													<tr>
														<td style="border:1px solid #333">
															<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="pro">
																<tr>
																	<td>&nbsp;</td>
																	<td>&nbsp;</td>
																</tr>
																<tr>
																	<td width="13%" height="30" style="padding-left:15px">中文全名／</td>
																	<td width="87%"><input class="key" size="50" name="ReceiverName" type="text" id="ReceiverName" />　先生/小姐</span></td>
																</tr>
																<tr>
																	<td height="30" style="padding-left:15px">聯絡電話／</td>
																	<td><input class="key" size="50" name="ReceiverTel" type="text" id="ReceiverTel" /></td>
																</tr>
																<tr>
																	<td height="30" style="padding-left:15px">聯絡地址／</td>
																	<td>
																		<table cellpadding="0" cellspacing="0" border="0">
																			<tr>
																				<td><select name="SendAddrCity" id="SendAddrCity" class="key" style="width:80px;"></select></td>
																				<td width="10" align="center">-</td>
																				<td><select name="SendAddrArea" id="SendAddrArea" class="key" style="width:100px;"></select></td>
																				<td width="10" align="center">-</td>
																				<td><input type="text" name="SendAddrZipCode" class="key" id="SendAddrZipCode" style="width:40px;" maxlength="6" /></td>
																				<td width="10" align="center">-</td>
																				<td><input name="SendAddrOther" type="text" class="key" id="SendAddrOther" size="30" value="" /></td>
																				<input type="hidden" id="SendAddrCityFinal" name="SendAddrCityFinal">
																				<input type="hidden" id="SendAddrAreaFinal" name="SendAddrAreaFinal">
																			</tr>
																		</table> 
																	</td>
																</tr>
																<tr>
																	<td>&nbsp;</td>
																	<td>&nbsp;</td>
																</tr>
															</table>
														</td>
													</tr>
												</table>
												</form>
											</td>
										</tr>
										<tr>
											<td height="30">&nbsp;</td>
										</tr>
										<tr>
											<td height="30" align="center">
												<a id="btnsubmit" href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image26','','images/06_contact/but_sent_o.jpg',1)">
													<img src="images/06_contact/but_sent.jpg" name="Image26" width="93" height="25" border="0" id="Image26" />
												</a>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td valign="top"><img src="images/00/line_bottom.jpg" width="4" height="4" /></td>
								<td>&nbsp;</td>
							</tr>
						</table>
						<iframe id="MyIframe" name="MyIframe" style="width:0px;height:0px;background-color:blue" frameborder="0"></iframe>
					</td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
			</table>
			<!-- InstanceEndEditable -->
		</td>
	</tr>
	<?php include_once("../Common/footer.php");?>
</table>
</body>
<!-- InstanceEnd --></html>
<?php ob_flush(); ?>