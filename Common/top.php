<script type="text/javascript">
var CarNumber = 0;
$(function(){
	CarNumber = <?php echo $CartNum?>;
	reload_minicart("<?php echo $CartNum?>");
	$("#MiniCartList").bind("mouseenter",function(){
		$("#CartList").stop(true,true).slideDown(300);
	}).bind("mouseleave",function(){
		$("#CartList").stop(true,true).slideUp(300);
	});
	$(".MiniCartBtn").live("click",function(){
		if(CarNumber <= 0){
			alert("商品清單無任何商品");
		}else{
			window.location='shoppingcart.php';
		}
	});
	var bodyWidth = $("body").width();
	var temp = (bodyWidth - 1002) / 2;
	bodyWidth = bodyWidth - temp - 215;
	

	$("#TopDiv").css({"left":bodyWidth});
});
function reload_minicart(CartNum){
	CarNumber = CartNum;
	$("#TopMiniCart").html(CartNum);
}
</script>
<tr>
	<td>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="19%">
					<?php 	if(!$IndexView){?>
					<a href="index.php"><img src="../images/logo.jpg" width="193" height="118" border="0" /></a>
					<?php	}else{?>
					<img src="../images/logo.jpg" width="193" height="118" border="0" />
					<?php	}?>
				</td>
				<td width="81%" valign="top">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td align="right" style="background-image:url(../images/top_01.jpg); width:810px; height:49px; background-repeat:no-repeat;">
								<div id="TopDiv" style="position:fixed;z-index:9999;top:15px">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td align="right"><a href="<?php echo $Web["FacebookUrl"]?>" target="_blank"><img src="../images/fackbook.jpg" border="0"></a></td>
											<td width="145" align="right">
												<table  border="0" cellpadding="0" cellspacing="0">
													<tr>
														<td width="88%">
															<table width="100%" border="0" cellspacing="0" cellpadding="0">
																<tr>
																	<td width="15%" align="right"><img src="../images/car_left.jpg" width="34" height="29" /></td>
																	<td width="69%" align="left" class="text01" style="background-image:url(../images/car_bg.jpg); background-repeat:repeat-x; height:29px;">
																		<a class="MiniCartBtn" href="#">我的購物車(<span class="pink_1" id="TopMiniCart"></span> )</a>		
																	</td>
																	<td align="left"><img src="../images/car_right.jpg" width="8" height="29" /></td>
																</tr>
															</table>
														</td>
														<td width="12%">&nbsp;</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<!--最新消息-->
										<?php	if($News_View){?>
										<td><a href="news_list.php"><img src="../images/but_a_o.jpg" width="116" height="69" border="0" /></a></td>
										<?php	}else{?>
										<td><a href="news_list.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image2','','../images/but_a_o.jpg',1)"><img src="../images/but_a.jpg" name="Image2" width="116" height="69" border="0" id="Image2" /></a></td>
										<?php	}?>
										<!--王家老木-->
										<?php	if($About_View){?>
										<td><a href="about.php"><img src="../images/but_b_o.jpg" width="124" height="69" border="0" /></a></td>
										<?php	}else{?>
										<td><a href="about.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image3','','../images/but_b_o.jpg',1)"><img src="../images/but_b.jpg" name="Image3" width="124" height="69" border="0" id="Image3" /></a></td>
										<?php	}?>
										<!--產品介紹-->
										<?php	if($Product_View){?>
										<td><a href="product_list.php"><img src="../images/but_c_o.jpg" width="118" height="69" border="0" /></a></td>
										<?php	}else{?>
										<td><a href="product_list.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','../images/but_c_o.jpg',1)"><img src="../images/but_c.jpg" name="Image4" width="118" height="69" border="0" id="Image4" /></a></td>
										<?php	}?>
										<!--推薦產品-->
										<?php	if($Recommend_View){?>
										<td><a href="recommend_list.php"><img src="../images/but_d_o.jpg" width="118" height="69" border="0" /></a></td>
										<?php	}else{?>
										<td><a href="recommend_list.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image5','','../images/but_d_o.jpg',1)"><img src="../images/but_d.jpg" name="Image5" width="118" height="69" border="0" id="Image5" /></a></td>
										<?php	}?>
										<!--訂購專區-->
										<?php	if($Order_View){?>
										<td><a href="orderhelp.php"><img src="../images/but_e_o.jpg" width="120" height="69" border="0" /></a></td>
										<?php	}else{?>
										<td><a href="orderhelp.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','../images/but_e_o.jpg',1)"><img src="../images/but_e.jpg" name="Image6" width="120" height="69" border="0" id="Image6" /></a></td>
										<?php	}?>
										<!--聯絡我們-->
										<?php	if($Contact_View){?>
										<td><a href="contact.php"><img src="../images/but_f_o.jpg" width="116" height="69" border="0" /></a></td>
										<?php	}else{?>
										<td><a href="contact.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image7','','../images/but_f_o.jpg',1)"><img src="../images/but_f.jpg" name="Image7" width="116" height="69" border="0" id="Image7" /></a></td>
										<?php	}?>
										<td><img src="../images/top_02.jpg" width="98" height="69" /></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</td>
</tr>
<tr>
	<td>
		<?php include_once(VisualRoot.'Common/Forum/Banner/BannerDiv.php'); ?>
	</td>
</tr>