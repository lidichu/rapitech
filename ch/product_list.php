<?php ob_start(); ?>
<?php include_once('../PageHead.php');?>
<?php
	$Product_View=true;
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
<script type="text/javascript">
$(function(){
	
});
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
									<?php
										$PageSize = 12;
										$Page = CheckData($_REQUEST["Page"]);
										if($Page == ""){$Page = 1;}
										$Page = intval($Page);
										$SQL = "Select Count(*) As DataAmount From product where Status = '上架' and G0=$G0";
										$Rs = mysql_query($SQL,$Conn);
										$Row = mysql_fetch_array($Rs);
										$DataAmount = intval($Row["DataAmount"]);
										//計算分頁數量
										$PageAmount = NumHandle2($DataAmount,$PageSize) / $PageSize;
										//調整目前分頁
										if($Page > $PageAmount){$Page = $PageAmount;}
										if($Page < 1){$Page = 1;}
										$Data = array();
										$SQL = "Select * From product Where Status = '上架' and G0=$G0 Order By Sort ,SerialNo DESC limit ".(($Page-1) * $PageSize).",".$PageSize;
										$Rs = mysql_query($SQL,$Conn);
										if($DataAmount>0){
											$Row=mysql_fetch_array($Rs);
									?>
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td height="38">
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td width="1%" style="padding-bottom:3px"><img src="images/01_news/img_02.jpg" width="17" height="25" /></td>
														<td width="99%" class="h1"><?php echo $CategoryTitle?></td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td>
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<?php
														while($Row){														
													?>
													<tr>
														<?php
															for($i=1;$i<=4;$i++){
																if($Row){
																	$PrdName=$Row["PrdName"];
																	$Sn=$Row["SerialNo"];
																	if($Row["PICHidden"]!=""){
																		$Pic="../files/Product/PICList/".$Row["PICHidden"];
																	}else{
																		$Pic="../NoPIC/140x106.jpg";
																	}
																	$Url="product_detail.php?G0=$G0&Sn=$Sn";
														?>
														<td width="140" valign="top">
															<table width="140" border="0" cellspacing="5" cellpadding="0">
																<tr>
																	<td style="border:3px solid #282828" width="140" height="106">
																		<a href="<?php echo $Url?>"><img src="<?php echo $Pic?>" border="0" /></a>
																	</td>
																</tr>
																<tr>
																	<td height="28" align="center" style="border-bottom:1px solid #242424; border-top:1px solid #242424">
																		<a href="<?php echo $Url?>"><?php echo $PrdName?></a>
																	</td>
																</tr>
															</table>
														</td>
														<?php
																$Row=mysql_fetch_array($Rs);
																}else{
														?>
														<td width="140" valign="top">&nbsp;</td>
														<?php	
																}
															}	
														?>
													</tr>
													<tr>
														<td height="30" colspan="4">&nbsp;</td>
													</tr>
													<?php
														}
													?>

												</table>
											</td>
										</tr>
										<?php include_once("../Common/PageBar/PageBar.php");?>
									</table>
									<?php	
										}
									?>
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