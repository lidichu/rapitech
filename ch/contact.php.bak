<?php ob_start(); ?>
<?php include_once('../PageHead.php');?>
<?php
	$Contact_View=true;
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
<script type="text/javascript">
$(function(){
	$("body").TwZipCode({CountryFieldName : 'AddressCity',AreaFieldName:'AddressArea',ZipCodeFieldName:'AddressZipCode',CountryDefaultValue : '縣/市',AreaDefaultValue: '鄉/鎮/市/區'});
	$("#btnSubmit").click(function(){
		$("#form1").submit();
		return false;
	});
	$("#btnReset").click(function(){
		$("#form1").get(0).reset();
		return false;
	});	
	$("#form1").submit(function(){
		var sError = new MyErrorCh();
		var AddressValue = new Array();
		AddressValue.push($("#AddressCity").val());
		AddressValue.push($("#AddressArea").val());
		AddressValue.push($("#AddressZipCode").val());
		AddressValue.push($("#AddressOther").val());
		sError.checkNull("姓名",$("#Name").val());
		sError.checkNull("連絡電話",$("#Tel").val());

		sError.checkNull("主旨",$("#Subject").val());
		sError.checkNull("內容",$("#Note").val());
		sError.checkNull("驗證碼",$("#VCode").val());
		return sError.pass();
	});
	$("#imgVCode").click(function(){
		$(this).find("img").prop("src","../Scripts/SafeCode.php?r=" + Math.random());
		return false;
	});
});
</script> 
<!-- InstanceEndEditable -->
</head>
<body onload="MM_preloadImages('../images/but_a_o.jpg','../images/but_b_o.jpg','../images/but_c_o.jpg','../images/but_d_o.jpg','../images/but_e_o.jpg','../images/but_f_o.jpg','images/06_contact/but_refill_o.jpg','images/06_contact/but_sent_o.jpg')">
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
											<td class="page"><a href="index.php">首頁</a> &gt; 聯絡我們</td>
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
								<td align="left" valign="top" style="padding-left:30px; background-image:url(images/06_contact/img_03.jpg); width:684px; height:404px; background-repeat:no-repeat; background-position:right bottom">
									<form id="form1" action="contact_handle.php" target="MyIframe" method="post" name="form1" style="padding:0px;margin:0px;">     
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td height="63" align="right">&nbsp;</td>
											<td height="63" style="padding-left:8px">&nbsp;</td>
										</tr>
										<tr>
											<td width="22%" height="34" align="right"><img src="images/06_contact/img_02.jpg" width="13" height="14" /><span class="text02">姓　名／</span></td>
											<td width="78%" height="34" style="padding-left:8px"><input name="Name" type="text" class="key" id="Name"  style="width:380px" /></td>
										</tr>
										<tr>
											<td height="34" align="right" class="text02">性　別／</td>
											<td height="34" style="padding-left:8px">
												<table width="20%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td width="16%"><input type="radio" name="Sex" value="Male" /></td>
														<td width="33%" align="left">男</td>
														<td width="17%"><input type="radio" name="Sex" value="Female" /></td>
														<td width="34%" align="left">女</td>
													</tr>
												</table>
											</td>
										</tr>

										<tr>
											<td height="34" align="right" ><img src="images/06_contact/img_02.jpg" width="13" height="14" /><span class="text02">連絡電話／</span></td>
											<td height="34" style="padding-left:8px">
												<input name="Tel" type="text" class="key" id="Tel"  style="width:180px" />													
											</td>
										</tr>
										<tr>
											<td height="34" align="right"><span class="text02">信　箱／</span></td>
											<td height="34" style="padding-left:8px"><input name="EMail" type="text" class="key" id="EMail"  style="width:380px" /></td>
										</tr>
										<tr>
											<td height="34" align="right" valign="top"><span class="text02">地　址／</span></td>
											<td height="34" valign="top" style="padding-left:8px">
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td height="26">  
															<select name="AddressCity" id="AddressCity" class="key">
																<option>縣/市</option>
															</select>-
															<select name="AddressArea" id="AddressArea" class="key">
																<option>鄉/鎮/市/區</option>
															</select>-<input name="AddressZipCode" type="text" class="key" id="AddressZipCode"  style="width:40px" readonly="readonly" />
														</td>
													</tr>
													<tr>
														<td height="26"><input name="AddressOther" type="text" class="key" id="AddressOther"  style="width:380px" /></td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td height="34" align="right"><img src="images/06_contact/img_02.jpg" width="13" height="14" /><span class="text02">主　旨／</span></td>
											<td height="34" style="padding-left:8px"><input name="Subject" type="text" class="key" id="Subject"  style="width:380px" /></td>
										</tr>
										<tr>
											<td height="34" align="right" valign="top" style="padding-top:4px"><img src="images/06_contact/img_02.jpg" width="13" height="14" /><span class="text02">內　容／</span></td>
											<td height="34" style="padding-left:8px;padding-top:4px"><textarea name="Note" class="key" id="Note" style="width:380px;height:120px;"></textarea></td>
										</tr>
										 <tr>
											<td height="34" align="right"><img src="images/06_contact/img_02.jpg" width="13" height="14" /><span class="text02">驗證碼／</span></td>
											<td height="34" align="left">
												<table cellpadding="0" cellspacing="0" border="0">
													<tr>
														<td width="60"><a id="imgVCode" href="#" class="number" onfocus="blur()"><img src="../Scripts/SafeCode.php" border="0" /></a></td>
														<td><input  name="VCode" class="key" type="text" id="VCode" size="30" style="width:120px" maxlength="4" /></td>
													</tr>
												</table>     
											</td>
										</tr>
										<tr>
											<td height="45" colspan="2" align="center" valign="bottom" style="padding-top:4px">
												<table width="30%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td><a href="#" id="btnReset" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image25','','images/06_contact/but_refill_o.jpg',1)"><img src="images/06_contact/but_refill.jpg" name="Image25" width="93" height="25" border="0" id="Image25" /></a></td>
														<td><a href="#" id="btnSubmit" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image26','','images/06_contact/but_sent_o.jpg',1)"><img src="images/06_contact/but_sent.jpg" name="Image26" width="93" height="25" border="0" id="Image26" /></a></td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
									</form>
								</td>
							</tr>
							<tr>
								<td valign="top"><img src="images/00/line_bottom.jpg" width="4" height="4" /></td>
								<td>&nbsp;</td>
							</tr>
						</table>
						<iframe id="MyIframe" name="MyIframe" style="width:0px; height:0px; background-color:blue;border-width:0px;"frameborder="0"></iframe>
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