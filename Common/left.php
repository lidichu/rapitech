<script type="text/javascript">
var CarNumber = 0;

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
<div class="col-md-3 hidden-sm">
				<!-- accordion -->
				<h4 class="title">Product Categories</h4>
				<hr>
				<div class="panel-group" id="accordion" role="tablist"
					aria-multiselectable="true">
					<?php
						$G0=CheckData($_REQUEST["G0"]);
						$Name="";
						$Sql="select * from productCategory where Status='上架' and ParentSerialNo=1 order by Sort,SerialNo Desc";
						$Rs=mysql_query($Sql,$Conn);
						if($Rs && mysql_num_rows($Rs)>0){
							while($Row=mysql_fetch_array($Rs)){
								$ParentSerialNo=$Row["SerialNo"];
								$ParentCategory=$Row["Category"];
					?>
					<div class="panel panel-default mypanel-default">

						<div class="panel-heading mypanel-heading" role="tab"
							id="heading<?php echo $ParentSerialNo?>">
							<h4 class="panel-title">
								<a role="button" data-toggle="collapse" data-parent="#accordion"
									href="#collapse<?php echo $ParentSerialNo?>" aria-expanded="true"
									aria-controls="collapseOne"> <?php echo $ParentCategory?> <i
									class="fa fa-caret-square-o-down pull-right text-justify"
									aria-hidden="true"></i>
								</a>
							</h4>
						</div>
						<div id="collapse<?php echo $ParentSerialNo?>" class="panel-collapse collapse in"
							role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								<ul>
									<?php
										$Sql1="select * from productCategory where Status='上架' and ParentSerialNo=".$ParentSerialNo." order by Sort,SerialNo Desc";
										$Rs1=mysql_query($Sql1,$Conn);
										if($Rs1 && mysql_num_rows($Rs1)>0){
											while($Row1=mysql_fetch_array($Rs1)){
												$SerialNo=$Row1["SerialNo"];
												$Category=$Row1["Category"];
												if($G0 == null)
													$G0=$SerialNo;
												if($SerialNo == $G0)
													$Name=$Category;
									?>
									<li><a href="productCategories.php?G0=<?php echo $SerialNo?>"><?php echo $Category?><i
											class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></li>
									<?php
											}
										}
									?>
								</ul>
							</div>

						</div>
					</div>
				 	<?php
							}
						}
					?>
				<!--end accordion  -->
			</div>
<?php	}?>
<!--end of widget-->
<div class="widget">
	<h4 class="title">Search Product</h4>
	<hr>
	<!--<form> -->
	<input class="mb0" type="text" placeholder="Search the Product"
		onkeydown="searchProducts(event)" />
	<!--</form> -->
</div>
<!--end of widget-->

<div class="widget">
	<h6 class="title">Returns Policy</h6>
	<hr>
	<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem
		antium doloremque laudantium, totam rem aperiam, eaque ipsa
		quae...</p>
</div>

<!--end of widget-->

<!--end of sidebar-->
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