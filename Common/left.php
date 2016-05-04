<script type="text/javascript">
var CarNumber = 0;
$(function(){
	
	

});

</script>

<!--最新消息-->

<?php	if($News_View){?>
<td width="15%" valign="top">
	<a  name="ToTop"></a>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><img src="images/01_news/title_01.jpg" width="259" height="87" /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td align="center"><a href="product_list.php" title="產品介紹"><img src="images/00/icon_product.jpg" width="180" height="175" border="0" /></a></td>
		</tr>
		<tr>
			<td align="center">&nbsp;</td>
		</tr>
		<tr>
			<td align="center"><a href="orderhelp.php" title="訂購說明"><img src="images/00/icon_order.jpg" width="181" height="159" border="0" /></a></td>
		</tr>
	</table>
</td>
<?php	}?>
<!--王家老木-->
<?php	if($About_View){?>
<td width="15%" valign="top">
	<a id="ToTop" name="ToTop"></a>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><img src="images/02_about/title_01.jpg" width="259" height="87" /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td align="center"><a href="product_list.php" title="產品介紹"><img src="images/00/icon_product.jpg" width="180" height="175" border="0" /></a></td>
		</tr>
		<tr>
			<td align="center">&nbsp;</td>
		</tr>
		<tr>
			<td align="center"><a href="orderhelp.php" title="訂購說明"><img src="images/00/icon_order.jpg" width="181" height="159" border="0" /></a></td>
		</tr>
	</table>
</td>	
<?php	}?>
<!--產品介紹-->
<?php	if($Product_View){?>
<td width="15%" valign="top">
	<a id="ToTop" name="ToTop"></a>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><img src="images/03_product/title_01.jpg" width="259" height="87" /></td>
		</tr>
		<tr>
			<td>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<?php
						$Sql="select * from productcategory where Status='上架' order by Sort,SerialNo desc";
						$LeftRs=mysql_query($Sql,$Conn);
						if($LeftRs &&mysql_num_rows($LeftRs)>0){
							while($LeftRow=mysql_fetch_array($LeftRs)){
								$LeftCategory=$LeftRow["Category"];
								$LaftSerialNo=$LeftRow["SerialNo"];
								if($G0==""){
									$G0=$LaftSerialNo;
								}
								$LeftUrl="product_list.php?G0=$LaftSerialNo";
								if($G0==$LaftSerialNo){
									$ClassName="menu02";
								}else{
									$ClassName="menu01";
								}
					?>
					<tr>
						<td width="28%" height="30" align="right" style="padding-right:5px"><img src="images/00/img_02.jpg" width="13" height="13" /></td>
						<td width="72%" height="30" class="<?php echo $ClassName?>"><a href="<?php echo $LeftUrl?>" title="產品介紹"><?php echo $LeftCategory?></a></td>
					</tr>
					<?php 	
								if($ClassName=="menu02"){
									$CategoryTitle=$LeftCategory;
									$Sql2="select * from product where Status='上架' and G0=$G0 order by Sort,SerialNo desc";
									$LeftRs2=mysql_query($Sql2,$Conn);
									if($LeftRs2 &&mysql_num_rows($LeftRs2)>0){	
					?>
					<tr>
						<td>&nbsp;</td>
						<td style="padding-bottom:6px">
							<table width="85%" border="0" cellspacing="0" cellpadding="0">
								<?php
									while($LeftRow2=mysql_fetch_array($LeftRs2)){
										$LeftSn=$LeftRow2["SerialNo"];
										$LeftPrdName=$LeftRow2["PrdName"];
										$LeftUrl2="product_detail.php?G0=$LaftSerialNo&Sn=$LeftSn";	
								?>
								<tr>
									<td width="92%" height="24" style="border-bottom:1px solid #242424;padding-left:10px">
										<a href="<?php echo $LeftUrl2?>"><?php echo $LeftPrdName?></a>
									</td>
								</tr>
								<?php
									}
								?>
							</table>
						</td>
					</tr>
					<?php
									}	
								}
							}
						}
					?>
				</table>
			</td>
		</tr>
	</table>
</td>
<?php	}?>
<!--推薦產品-->
<?php	if($Recommend_View){?>
<td width="15%" valign="top">
	<a id="ToTop" name="ToTop"></a>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><img src="images/04_recommend/title_01.jpg" width="259" height="87" /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td align="center"><a href="product_list.php" title="產品介紹"><img src="images/00/icon_product.jpg" width="180" height="175" border="0" /></a></td>
		</tr>
		<tr>
			<td align="center">&nbsp;</td>
		</tr>
		<tr>
			<td align="center"><a href="orderhelp.php"  title="訂購說明"><img src="images/00/icon_order.jpg" width="181" height="159" border="0" /></a></td>
		</tr>
	</table>
</td>
<?php	}?>
<!--訂購專區-->
<?php	if($Order_View){?>
<td width="15%" valign="top">
	<a id="ToTop" name="ToTop"></a>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><img src="images/05_order/title_01.jpg" width="259" height="87" /></td>
		</tr>
		<tr>
			<td>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="28%" height="30" align="right" style="padding-right:5px"><img src="images/00/img_02.jpg" width="13" height="13" /></td>
						<td width="72%" height="30" class="<?php echo $OrderClass1?>"><a href="orderhelp.php"  title="訂購說明">訂購說明</a></td>
					</tr>
					<tr>
						<td height="30" align="right" style="padding-right:5px"><img src="images/00/img_02.jpg" width="13" height="13" /></td>
						<td height="30" class="<?php echo $OrderClass2?>"><a class="MiniCartBtn" href="#" title="購物車" >我的購物車</a></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</td>
<?php	}?>
<!--聯絡我們-->
<?php	if($Contact_View){?>
<td width="15%" valign="top">
	<a id="ToTop" name="ToTop"></a>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><img src="images/06_contact/title_01.jpg" width="259" height="87" /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td align="center"><img src="images/06_contact/img_01.jpg" width="180" height="432" /></td>
		</tr>
	</table>
</td>
<?php	}?>