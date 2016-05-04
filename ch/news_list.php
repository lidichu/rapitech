<?php ob_start(); ?>
<?php include_once('../PageHead.php');?>
<?php
	$News_View=true;
	$PageSize = 5;
	$Page = CheckData($_REQUEST["Page"]);
	if($Page == ""){$Page = 1;}
	$Page = intval($Page);
	$SQL = "Select Count(*) As DataAmount From news where Status = '上架'";
	$Rs = mysql_query($SQL,$Conn);
	$Row = mysql_fetch_array($Rs);
	$DataAmount = intval($Row["DataAmount"]);
	//計算分頁數量
	$PageAmount = NumHandle2($DataAmount,$PageSize) / $PageSize;
	//調整目前分頁
	if($Page > $PageAmount){$Page = $PageAmount;}
	if($Page < 1){$Page = 1;}
	$Data = array();
	$SQL = "Select * From news Where Status = '上架' Order By Sort,PostDate DESC,SerialNo DESC limit ".(($Page-1) * $PageSize).",".$PageSize;
	$Rs = mysql_query($SQL,$Conn);
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
											<td class="page"><a href="index.php">首頁</a> &gt; 最新消息</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td width="10" valign="bottom"><img src="images/00/line_top.jpg" width="4" height="4" /></td>
								<td width="734">&nbsp;</td>
							</tr>
							<?php 
								if($DataAmount > 0){
							?>
							<tr>
								<td height="401" style="background-image:url(images/00/line_bg.jpg); width:4px; background-repeat:repeat-y;">&nbsp;</td>
								<td align="left" valign="top" style="padding-left:30px">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<?php
											while($Row = mysql_fetch_array($Rs)){ 
												$SerialNo=$Row["SerialNo"];																						
												$PostDate=DateHandle($Row["PostDate"],"-");
												$Title=$Row["Title"];
												$Note=cutstr(ReplaceEditor2($Row["Note"]),220);
												$Url="news_detail.php?Page=$Page&Sn=".$SerialNo;
												if($Row["PICHidden"]!=""){
													$Pic="../files/News/SmallPIC/".$Row["PICHidden"];
												}
												else{
													$Pic="";
												}	
										?>
										<tr>
											<td>
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td>
															<table width="100%" border="0" cellspacing="0" cellpadding="0">
																<tr>
																	<td width="2%"><img src="images/01_news/img_02.jpg" width="17" height="25" /></td>
																	<td width="84%" align="left" class="h1"><a href="<?php echo $Url?>"><?php echo Div_limit($Title,500)?></a></td>
																	<td width="14%" align="right" class="day2" style="padding-right:10px"><?php echo $PostDate?></td>
																</tr>
															</table>
														</td>
													</tr>
													<tr>
														<td style="background-image:url(images/01_news/img_01.jpg); height:8px; background-repeat:repeat-x;">&nbsp;</td>
													</tr>
													<tr>
														<td>
															<table width="100%" border="0" cellspacing="0" cellpadding="0">
																<tr>
																	<?php	if($Pic!=""){?>
																	<td width="17%" style="padding:4px; border:1px solid #600002"><img src="<?php echo $Pic?>" width="120" height="90" /></td>
																	<td width="83%" valign="top" style="padding-left:25px">
																		<table width="100%" border="0" cellspacing="0" cellpadding="0">
																			<tr>
																				<td align="left"><?php echo $Note?></td>
																			</tr>
																			<tr>
																				<td align="right" style="padding-top:10px; padding-right:10px">
																					<a href="<?php echo $Url?>"><img src="images/01_news/but_detail.jpg" width="62" height="19" border="0" /></a>
																				</td>
																			</tr>
																		</table>
																	</td>
																	<?php	}else{?>
																	<td width="100%" valign="top" style="padding-left:5px">
																		<table width="100%" border="0" cellspacing="0" cellpadding="0">
																			<tr>
																				<td align="left"><?php echo $Note?></td>
																			</tr>
																			<tr>
																				<td align="right" style="padding-top:10px; padding-right:10px">
																					<a href="<?php echo $Url?>"><img src="images/01_news/but_detail.jpg" width="62" height="19" border="0" /></a>
																				</td>
																			</tr>
																		</table>
																	</td>
																	<?php	}?>
																</tr>
																<tr>
																	<td colspan="2">&nbsp;</td>
																</tr>
																<tr>
																	<td colspan="2" style="background-image:url(images/01_news/img_01.jpg); height:8px; background-repeat:repeat-x;">&nbsp;</td>
																</tr>
															</table>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td height="25">&nbsp;</td>
										</tr>
										<?php	}?>
										<?php include_once("../Common/PageBar/PageBar.php");?>
									</table>
								</td>
							</tr>
							<?php
								}
							?>
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
