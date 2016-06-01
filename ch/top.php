<div class="nav-container wow bounceIn" data-wow-delay="1.5s">
	<div class="nav-utility wordColor ">

		<div class="module right">
			<a href="contact.php"> <i class="ti-location-arrow">&nbsp;</i> <span
				class="sub"> <?php echo $Web["WebAddress"]?></span>
			</a>
		</div>

		<div class="module right">
			<a href="contact.php"> <i class="ti-email">&nbsp;</i> <span
				class="sub"><?php echo $Web["ManagerEmail"]?></span>
			</a>
		</div>
		<div class="module left"></div>
	</div>
	<nav>
		<div class="nav-bar">
			<div class="module left">
				<a href="index.php"> <img class="logo logo-light" alt="heryi"
					src="img/logo-light.png" /> <img class="logo logo-dark" alt="heryi"
					src="img/logo-dark.png" />
				</a>
			</div>
			<div
				class="module widget-handle mobile-toggle right visible-sm visible-xs">
				<i class="ti-menu"></i>
			</div>
			<div class="module-group right">
				<div class="module left">
					<ul class="menu">
						<li><a href="about.php"><span class="label label-success">About Us</span></a>

						</li>
						<!--  -->
						<li class="has-dropdown"><a
							href="productCategories.php"> <span
								class="label label-success">Products</span>
						</a>
							<ul class="mega-menu">
								<li>
									<ul>
									<?php
										$Sql="select * from productCategory where Status='上架' and ParentSerialNo=1 order by Sort,SerialNo Desc";
										$Rs=mysql_query($Sql,$Conn);
										if($Rs && mysql_num_rows($Rs)>0){
											while($Row=mysql_fetch_array($Rs)){
												$ParentSerialNo=$Row["SerialNo"];
												$Category=$Row["Category"];
									?>
										<li><a href="productCategories.php?G0=<?php echo $ParentSerialNo?>"> <?php echo $Category?> </a></li>
									<?php
											}
										}
									?>
									</ul>
								</li>
							</ul> <!--  -->
						
						<li><a href="news.php"> <span class="label label-success">News </span>
						</a></li>
						<li><a href="contact.php"> <span class="label label-success">Contact Us </span>
						</a></li>


					</ul>
				</div>
				<!--end of menu module-->
				<div class="module widget-handle search-widget-handle left">
					<div class="search wordColor">
						<i class="ti-search"></i> <span class="title">Search the product</span>
					</div>
					<div class="function ">
<!-- 						<form class="search-form "> -->
							<input type="text" placeholder="Search the product" onkeydown="searchProducts(event)"/>
<!-- 						</form> -->
					</div>
				</div>
				<div class="module widget-handle cart-widget-handle left">
					<div class="cart wordColor">
						<i class="ti-bag"></i> <span id="cartListnum" class="label number">2</span>
						<span class="title">Shopping Cart</span>
					</div>
					<div class="function">
						<div class="widget">
							<h6 class="title">Shopping Cart</h6>
							<hr>
							<ul class="cart-overview" id="cartList">

							</ul>
							<hr>
							<div class="cart-controls">
								<a class="btn btn-sm btn-filled" href="cart.php">Inquiry List</a>
								<div class="list-inline pull-right"></div>
							</div>
						</div>
						<!--end of widget-->
					</div>
				</div>

			</div>
			<!--end of module group-->
		</div>
	</nav>
</div>
<!--end nav  -->

<script type="text/javascript">

function searchProducts(evt)
{
	//按下Enter搜尋
	if(evt.keyCode == 13)
	{
		var txt = event.currentTarget;
		window.location = "ProductSearchResult.php?Val=" + encodeURI(txt.value);
	}
}

</script>