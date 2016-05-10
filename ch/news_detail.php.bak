<?php ob_start(); ?>
<?php include_once('../PageHead.php');?>
<?php
	$News_View=true;
	
	if ($Page =="")
		$Page="1";
	//接收操作名稱
	$opp = $_REQUEST["opp"];
	if(strtolower($opp)=="download"){
		//接收檔案下載流水號
		$SerialNoFile = CheckData(Request_Get("SN"));
		if($SerialNoFile==""){$SerialNoFile = 0;}
		$SQL="Select * From newsfile  Where `SerialNo` = ".$SerialNoFile." And Status='上架'";
		$Rs = mysql_query($SQL,$Conn);
		if($Rs && mysql_num_rows($Rs) > 0){
			$Row = mysql_fetch_array($Rs);
			if($Row["FileHidden"]!=""){
				FileHandle::Downloadfile(VisualRoot."/files/News/Files/".$Row["FileHidden"],$Row["File"]);
			}else{
				die('File Not Found');
			}
		}else{
			die('File Not Found');
		}
		exit();
	}	
	

	$SQL="Select * From news Where Status='上架' and SerialNo=$Sn limit 1";
	$Rs = mysql_query($SQL,$Conn);
	if($Rs && mysql_num_rows($Rs) > 0){
		$Row = mysql_fetch_array($Rs);
		$SerialNo = $Row["SerialNo"];
		$Title = $Row["Title"];
		$PostDate = DateHandle($Row["PostDate"],"-");
		$Note = ReplaceEditor($Row["Note"]);
		if($Row["PICHidden"]!=""){
			$Pic="../files/News/PIC/".$Row["PICHidden"];
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
<script type="text/javascript">
$(function(){
	
});
</script> 
<!-- InstanceEndEditable -->
</head>
<body onload="MM_preloadImages('../images/but_a_o.jpg','../images/but_b_o.jpg','../images/but_c_o.jpg','../images/but_d_o.jpg','../images/but_e_o.jpg','../images/but_f_o.jpg','images/00/but_back_o.jpg')">
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
							<tr>
								<td height="401" style="background-image:url(images/00/line_bg.jpg); width:4px; background-repeat:repeat-y;">&nbsp;</td>
								<td align="left" valign="top" style="padding-left:30px">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td>
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td width="1%" valign="top"><img src="images/01_news/img_02.jpg" width="17" height="25" /></td>
														<td width="99%" class="h1"><?php echo $Title?></td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td style="background-image:url(images/01_news/img_01.jpg); height:8px; background-repeat:repeat-x;">&nbsp;</td>
										</tr>
										<tr>
											<td><span class="text02">發佈日期／</span><span class="day2"><?php echo $PostDate?></span></td>
										</tr>
										<tr>
											<td style="padding:12px 0px">
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<?php	if($Pic!=""){?>
													<tr>
														<td align="left" style="padding-top:10px" width="689"><img src="<?php echo $Pic?>"  /></td>
													</tr>
													<?php	}?>
													<tr>
														<td style="padding-top:10px"><?php echo $Note?></td>
													</tr>
												</table>
											</td>
										</tr>
										<?php 
											//查詢相關連結
											$SQL="Select * From newslink Where G0 = " . $SerialNo . " And Status='上架' Order By Sort,SerialNo DESC";
											$Rs = mysql_query($SQL,$Conn);
											if($Rs && mysql_num_rows($Rs) > 0){
										?>
										<tr>
											<td>
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td width="2%" valign="top" style="padding-top:3px"><img src="images/01_news/icon_01.jpg" width="13" height="14" /></td>
														<td width="10%" valign="top" class="text02">相關連結／</td>
														<td width="88%" valign="top">
															<table width="100%" border="0" cellspacing="0" cellpadding="0">
																<?php 								
																	while($Row = mysql_fetch_array($Rs)){
																		$Title=$Row["Title".$lang];
																		$Url=$Row["Url"];
																		$TargetWindow=$Row["TargetWindow"];
																?>   
																<tr>
																	<td height="24" class="text03"><a href="<?php echo $Url?>" target="<?php echo $TargetWindow?>"><?php echo $Title?></a></td>
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
											<td>&nbsp;</td>
										</tr>
										<?php
											}
										?>
										<?php 
											//查詢檔案下載
											$SQL="Select * From newsfile Where G0 = " . $SerialNo . " And Status='上架' Order By Sort,SerialNo DESC";
											$Rs = mysql_query($SQL,$Conn);
											if($Rs && mysql_num_rows($Rs) > 0){
										?>
										<tr>
											<td>
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td width="2%" valign="top" style="padding-top:3px"><img src="images/01_news/icon_01.jpg" width="13" height="14" /></td>
														<td width="10%" valign="top" class="text02">檔案下載／</td>
														<td width="88%" valign="top">
															<table width="100%" border="0" cellspacing="0" cellpadding="0">
																<?php 								
																	while($Row = mysql_fetch_array($Rs)){
																		$File=$Row["File"];
																?>  
																<tr>
																	<td height="24" class="text03"><a href="<?php echo(GetSCRIPTNAME());?>?SN=<?php echo($Row["SerialNo"]);?>&opp=download" target="_blank"><?php echo($Row["Title".$lang]);?></a></td>
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
											<td>&nbsp;</td>
										</tr>
										<?php
											}
										?>
										<tr>
											<td style="background-image:url(images/01_news/img_01.jpg); height:8px; background-repeat:repeat-x;">&nbsp;</td>
										</tr>
										<tr>
											<td height="40" align="center" valign="bottom">
												<a href="news_list.php?Page=<?php echo $Page?>" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image24','','images/00/but_back_o.jpg',1)">
													<img src="images/00/but_back.jpg" name="Image24" width="93" height="25" border="0" id="Image24" />
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