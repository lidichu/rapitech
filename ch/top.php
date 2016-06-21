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
										$Sql="select * from productCategory where Status='上架' and ParentSerialNo=1 order by Sort;";
										$Rs=mysql_query($Sql,$Conn);
										if($Rs && mysql_num_rows($Rs)>0){
											while($Row=mysql_fetch_array($Rs)){
												$sSerialNo=$Row["SerialNo"];
												$Category=$Row["Category"];
									?>
										<li><a href="productCategories.php?SN=<?php echo $sSerialNo?>"> <?php echo $Category?> </a></li>
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
							<div class="search-form ">
							<input type="text" placeholder="Search the product" onkeydown="searchProducts(event)"/>
							</div>
<!-- 						</form> -->
					</div>
				</div>
				<div class="module widget-handle cart-widget-handle left">
					<div class="cart wordColor">
						<i class="ti-bag"></i> <span id="cartListnum" class="label number"></span>
						<span class="title">Shopping Cart</span>
					</div>
					<div class="function displayNone">
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

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/flickr.js"></script>
<script src="js/flexslider.min.js"></script>
<script src="js/lightbox.min.js"></script> 
<script src="js/masonry.min.js"></script>
<script src="js/twitterfetcher.min.js"></script>
<script src="js/spectragram.min.js"></script>
<script src="js/ytplayer.min.js"></script>
<script src="js/countdown.min.js"></script>
<script src="js/smooth-scroll.min.js"></script> 
<script src="js/parallax.js"></script> 
<script src="js/wow.js"></script>
<script src="js/scripts.js"></script>

<script type="text/javascript">

	$(function() {
		setCartListNum();
	});
	
	function searchProducts(evt)
	{
		//按下Enter搜尋
		if(evt.keyCode == 13)
		{
			var txt = event.currentTarget;
			window.location = "ProductSearchResult.php?Val=" + encodeURI(txt.value);
		}
	}

	function getCartList()
	{
		var cartListArr = JSON.parse(window.localStorage.getItem("carList"));
		if(!cartListArr)
			cartListArr = [];
		return cartListArr;
	}

	function setCartListNum()
	{
		// 開始 local storage 塞入資料
	    var cartListArr = getCartList();
	    $.each(cartListArr, function(idx, prd) {
            $('#cartList').append(showCartItem(prd));
        });

	 	//#cartListnum塞入carList 個數
	    $("#cartListnum").text(cartListArr.length);
	}

	function showCartItem(prd)
	{
		var prdHtml = "";
		prdHtml += "<li>";
		prdHtml += "<a href=\"#\">";
		prdHtml += "<img src=\"" + prd.img + "\" class=\"img-responsive product-thumb  col-sm-6\">";
		prdHtml += "<div class=\"description\">";
		prdHtml += "<span class=\"product-title\">" + prd.title + "</span><br/>";
		prdHtml += "<span class=\"modelNo\">Model No：" + prd.modelNo + "</span>";
		prdHtml += "</div>";
		prdHtml += "</a>";
		prdHtml += "</li>";
		return prdHtml;
	}
	
	function addToList()
	{
		var newPrd = prdToObject($(this));
		var cartListArr = getCartList();
		var added = false;
	    $.each(cartListArr,function(index, obj) {
	        if (newPrd.id == obj.id) {
	        	added = true;
	            alert('產品已於購物車');
	            return false;
	        }
	    });

	    if (!added) {
	        $('#cartList').append(showCartItem(newPrd));
	        cartListArr.push(newPrd);
	        localStorage.setItem("carList", JSON.stringify(cartListArr));
	        $("#cartListnum").text(cartListArr.length);
	    }
	}

	function prdToObject(currentPrd)
	{
		var prdDiv,img,title,id,modelNo;
		if(currentPrd.parents('#likelist').length > 0)
	    {
	    	/** LikeList **/
	    	prdDiv = currentPrd.parents('.image-tile');
	    	img = prdDiv.children('a').children('img').prop('src');
	 	    var list = $(this).parents('.title').find('.likeImgTitle');
	 	    title = list.text();
	 	    id = list.data("sn");
	 	    modelNo = $(this).parents('.title').find('.modelNo').text();
	    }
	    else if($('.slides').length > 0)
	    {
	    	/** Product **/
	    	img = $('.slides li:not(.clone)').children('img').prop('src');
		    title = $('.productTitle').text();
		    id = $('.productTitle').data("sn");
		    modelNo = $('.modelNo').text();
	    }
	    else
	    {
	    	/** ProductList **/
	    	prdDiv = currentPrd.parents('.image-tile');
		    img = prdDiv.children('a').children('img').prop('src');
		    title = prdDiv.find('.product-title').text();
		    id = prdDiv.find('.product-title').data("sn");
		    modelNo = prdDiv.find('.modelNo').text();
	    }

	    var prd = {};
	    prd.id = id;
	    prd.img = img;
	    prd.title = title;
	    prd.modelNo = modelNo;
	    prd.amount = 1;
	    return prd;
	}
</script>