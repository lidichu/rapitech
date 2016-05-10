<?php ob_start(); ?>
<?php include_once('../PageHead.php');?>
<?php
	$IndexView=true;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name= "keywords" content="<?php echo $Web["Keywords"];?>" />
<meta name= "description" content="<?php echo $Web["Description"];?>" />
<title><?php echo($Web["WebTitle".$Lang]);?></title>
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
<script type="text/javascript">
var ItemWidth = 0;
var timer1 = 0;
var curDirection = "btnLeft";
var delayTime = 3000;
var moveTime = 1000;
var CanPlay = true;
$(function(){
	//取得目前寬度
	ItemWidth = $("#ItemDiv").width();
	//取得原始內容
	var trHtml = $("#ItemDiv").find("tr").html();
	var trHtml3 = "";
	//複製為3份原始內容
	for(i=1;i<=3;i++){
		trHtml3 += trHtml
	}
	//加回原本的tr
	$("#ItemDiv").find("tr").html(trHtml3);
	//預設顯示第2份內容
	$("#ItemDiv").css({"left":-ItemWidth});
	$("#ItemDiv").mouseenter(function(){
		CanPlay = false;
		if(timer1 != 0){
			window.clearTimeout(timer1);
		}
		$("#ItemDiv").stop(false,true);
	}).mouseleave(function(){
		CanPlay = true;
		timer1 = window.setTimeout(AutoPlay,delayTime);
	});
	$("#btnLeft").click(function(){
		if(timer1 != 0){window.clearTimeout(timer1);}
		curDirection = "btnLeft";
		$("#ItemDiv").stop(false,true).animate(
			{
				left:$("#ItemDiv").position().left-197
			},
			{
				duration:moveTime,
				complete:function(){
					if($("#ItemDiv").position().left <= -2 * ItemWidth){
						$("#ItemDiv").css({"left":-ItemWidth});
					}
					if(timer1 != 0){
						window.clearTimeout(timer1);
					}
					timer1 = window.setTimeout(AutoPlay,delayTime);
				}
			}
		);
		return false;
	});
	$("#btnRight").click(function(){
		if(timer1 != 0){window.clearTimeout(timer1);}
		curDirection = "btnRight";
		$("#ItemDiv").stop(false,true).animate(
			{
				left:$("#ItemDiv").position().left+197
			},
			{
				duration:moveTime,
				complete:function(){
					if($("#ItemDiv").position().left >= 0){
						$("#ItemDiv").css({"left":-ItemWidth});
					}
					if(timer1 != 0){
						window.clearTimeout(timer1);
					}
					timer1 = window.setTimeout(AutoPlay,delayTime);
				}
			}
		);	
		return false;
	});
	timer1 = window.setTimeout(AutoPlay,delayTime);
});
function AutoPlay(){
	if(CanPlay){
		$("#" + curDirection).click();
	}
}
</script>
</head>
<body onload="MM_preloadImages('../images/but_a_o.jpg','../images/but_b_o.jpg','../images/but_c_o.jpg','../images/but_d_o.jpg','../images/but_e_o.jpg','../images/but_f_o.jpg')">
<table width="1003" border="0" align="center" cellpadding="0" cellspacing="0">
	<?php include_once("../Common/top.php");?>
	<tr>
		<td valign="top">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td valign="top">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td><img src="../images/product_title.jpg" width="312" height="70" border="0" usemap="#Map" /></td>
							</tr>
							<tr>
								<td align="center" style="padding-top:8px">
									<table border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td align="right" valign="top" style="padding-top:55px">
												<a id="btnLeft" href="#"><img src="../images/left_but.jpg" width="33" height="45" border="0"/></a>
											</td>
											<td align="center">
												<div style="width:197px;height:190px;overflow:hidden;position:relative;">
													<div id="ItemDiv" style="height:190px;overflow:hidden;position:absolute;top:0px;;left:0px;">
														<table cellpadding="0" cellspacing="0" border="0">
															<tr>
																<?php
																	$Sql="select * from product where Status='上架' and IndexShow='true' order by IndexSort";
																	$Rs=mysql_query($Sql,$Conn);
																	while($Row=mysql_fetch_array($Rs)){
																		$PrdName=$Row["PrdName"];
																		$G0=$Row["G0"];
																		$Sn=$Row["SerialNo"];
																		$Url="product_detail.php?G0=$G0&Sn=$Sn";
																		if($Row["PICHidden"]!=""){
																			$Pic="../files/Product/PICIndex/".$Row["PICHidden"];
																		}else{
																			$Pic="../NoPIC/187x140.jpg";
																		}
																		
																?>
																<td valign="top" width="190">
																	<table width="197" border="0" cellspacing="0" cellpadding="0">
																		<tr>
																			<td style="border:5px solid #282828" width="187" height="141" ><a href="<?php echo $Url?>"><img src="<?php echo $Pic?>"  border="0" /></a></td>
																		</tr>
																		<tr>
																			<td height="30" align="center"><a href="<?php echo $Url?>"><?php echo $PrdName?></a></td>
																		</tr>
																	</table>
																</td>												
																<?php
																	}
																?>
															</tr>
														</table>
													</div>
												</div>
											</td>
											<td align="left" valign="top" style="padding-top:55px">
												<a id="btnRight" href="#"><img src="../images/right_but.jpg" width="35" height="45" border="0"/></a>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
					<td valign="top">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td><img src="../images/about_title.jpg" width="370" height="70" border="0" usemap="#Map2" /></td>
							</tr>
							<tr>
								<td valign="top">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td width="48%"><img src="../images/about_01.jpg" width="177" height="202" /></td>
											<td width="52%" valign="top" style="padding-top:15px; padding-right:20px">王家老木創立於1987年，本店前身為台南鹽水意麵，地址位於左營區華夏路1059號。 取自王家老母的諧音，傳承來自媽媽溫暖的好味道。 真材實料製作，用注入在地情懷的手藝，打造為子女身體健康著想的料理。 現在無論您身在何處，只要一通電話，便可將...</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
					<td valign="top">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td><img src="../images/news_title.jpg" width="321" height="70" border="0" usemap="#Map3" /></td>
							</tr>
							<tr>
								<td style="padding-left:18px; padding-right:18px">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<?php 
											$Sql="select * from news where Status='上架' and IndexShow ='true' order by IndexSort,PostDate Desc,SerialNo desc limit 6";
											$Rs=mysql_query($Sql,$Conn);
											if($Rs && mysql_num_rows($Rs)>0){
												while($Row=mysql_fetch_array($Rs)){
													$Sn=$Row["SerialNo"];
													$Title=$Row["Title"];
													$PostDate=DateHandle($Row["PostDate"],"-");
													$Url="news_detail.php?Sn=$Sn";
										?>
										<tr>
											<td width="5%" height="28"><img src="../images/icon_01.jpg" width="15" height="16" /></td>
											<td width="63%" height="28">
												<a href="<?php echo $Url?>">
													<div style="text-overflow:ellipsis;white-space:nowrap;width:160px;overflow:hidden;">
														<?php echo $Title?>
													</div>	
												</a>
											</td>
											<td width="32%" height="28" class="day"><?php echo $PostDate?></td>
										</tr>
										<?php
												}
											}	
										?>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td valign="top" colspan="3">&nbsp;</td>
				</tr>
			</table>
			<map name="Map" id="Map"><area shape="rect" coords="247,37,298,61" href="recommend_list.php" /></map>
			<map name="Map2" id="Map2"><area shape="rect" coords="297,41,350,60" href="about.php" /></map>
			<map name="Map3" id="Map3"><area shape="rect" coords="233,39,283,61" href="news_list.php" /></map>
		</td>
	</tr>
	<?php include_once("../Common/footer.php");?>
</table>
</body>
</html>
<?php ob_flush(); ?>