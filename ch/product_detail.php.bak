<?php ob_start(); ?>
<?php include_once('../PageHead.php');?>
<?php
	$Product_View=true;
	if ($Page =="")
		$Page="1";
	if($Sn=="")
		$Sn=0;
	$sql="select * from product where SerialNo=$Sn and Status='上架'";
	$rs=mysql_query($sql);
	if($rs && (mysql_num_rows($rs))>0){
		$row=mysql_fetch_array($rs);
		$PrdName=$row["PrdName"];	
		$PrdNote=$row["PrdNote"];	
		$PrdPrice=NumHandle3($row["PrdPrice"]);
		if($row["PICHidden"]!=""){
		$BigPic="../files/Product/PICBig/".$row["PICHidden"];
		$Pic="../files/Product/PICDetail/".$row["PICHidden"];
		}else{
			$BigPic="";
			$Pic="../NoPIC/350x263.jpg";
		}
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
<script type="text/javascript" src="../Scripts/lightbox/jquery.lightbox-0.5.js"></script>
<link rel="stylesheet" type="text/css" href="../Scripts/lightbox/jquery.lightbox-0.5.css" media="screen" />
<script type="text/javascript">
$(function(){
	$(".lightbox").lightBox();
	$("#AddCar").live("click",function(){
		$("#buyform").submit();
		return false;
	})
});
</script> 
<!-- InstanceEndEditable -->
</head>
<body onload="MM_preloadImages('../images/but_a_o.jpg','../images/but_b_o.jpg','../images/but_c_o.jpg','../images/but_d_o.jpg','../images/but_e_o.jpg','../images/but_f_o.jpg','images/03_product/but_buy_o.jpg','images/00/but_back_o.jpg')">
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
											<td class="page"><a href="index.php">首頁</a> &gt; 產品介紹</td>
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
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td height="31" colspan="2">&nbsp;</td>
										</tr>
										<tr>
											<td height="31" colspan="2" style="background-image:url(images/01_news/img_01.jpg); height:8px; background-repeat:repeat-x">&nbsp;</td>
										</tr>
										<tr>
											<td width="51%" valign="top">
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td style="border:5px solid #282828" width="350" height="264">
														<?php if($BigPic!=""){?>
														<a class="lightbox" href="<?php echo $BigPic?>"><img src="<?php echo $Pic?>"  border="0" /></a>
														<?php }else{?>
														<img src="<?php echo $Pic?>"  border="0" />
														<?php }?>
														</td>
													</tr>
													<tr>
														<td height="40" align="left">﹝點小圖放大圖﹞</td>
													</tr>
												</table>
											</td>
											<td width="49%" valign="top" style="padding-left:35px">
												<form id="buyform" name="buyform" style="margin:0px;padding:0px;" method="post" target="BuyIframe" action="carhandle.php">
												<input type="hidden" value="add" name="opp">
												<input type="hidden" value="<?php echo $Sn?>" name="PrdSerialNo"  id="PrdSerialNo">
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td width="6%"><img src="images/01_news/img_02.jpg" width="17" height="25" /></td>
														<td colspan="2" class="h1"><?php echo $CategoryTitle?></td>
													</tr>
													<tr>
														<td height="34">&nbsp;</td>
														<td width="17%" height="34" class="text02">品 名：</td>
														<td width="77%" height="34" class="text04"><?php echo $PrdName?></td>
													</tr>
													<tr>
														<td height="34">&nbsp;</td>
														<td height="34" class="text02">價 格：</td>
														<td height="34"><span class="text04"><?php echo $PrdPrice?></span> / 元</td>
													</tr>
													<tr>
														<td height="34">&nbsp;</td>
														<td height="34" valign="top" class="text02">說明：</td>
														<td height="34" valign="top"><?php echo $PrdNote?></td>
													</tr>
													<tr>
														<td height="34">&nbsp;</td>
														<td height="34"><span class="text02">數 量：</span></td>
														<td height="34">
															<select name="PrdNum" id="PrdNum" class="key"  style="width:75px">
																<?php 	for($i=1;$i<=10;$i++){?>
																<option value="<?php echo $i?>"><?php echo $i?></option>
																<?php	}?>
															</select>
														</td>
													</tr>
													<tr>
														<td height="36">&nbsp;</td>
														<td height="50" colspan="2" valign="bottom">
															<a id="AddCar" href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image24','','images/03_product/but_buy_o.jpg',1)">
															<img src="images/03_product/but_buy.jpg" name="Image24" width="111" height="29" border="0" id="Image24" /></a>
														</td>
													</tr>
												</table>
												</form>
											</td>
										</tr>
										<tr>
											<td colspan="2" align="right" valign="bottom" style="background-image:url(images/01_news/img_01.jpg); height:8px; background-repeat:repeat-x">&nbsp;</td>
										</tr>
										<tr>
											<td height="40" colspan="2" align="center" valign="bottom">
												<a href="product_list.php?G0=<?php echo $G0?>&Page=<?php echo $Page?>" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image25','','images/00/but_back_o.jpg',1)"><img src="images/00/but_back.jpg" name="Image25" width="93" height="25" border="0" id="Image25" /></a>
											</td>
										</tr>
									</table>
									<iframe id="BuyIframe" name="BuyIframe" style=" background-color:blue;width:0px; height:0px; border-width:0px;" frameborder="0"></iframe>
								</td>
							</tr>
							<tr>
								<td valign="top"><img src="images/00/line_bottom.jpg" width="4" height="4" /></td>
								<td>&nbsp;</td>
							</tr>
						</table>
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