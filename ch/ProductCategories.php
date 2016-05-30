<!doctype html>
<?php include_once('../PageHead.php');?>
<?php
	$Product_View=true;
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> Rapitech Product Categories</title>
        <meta name="viewport" content="width=device-width, initial-scale=0.9">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/themify-icons.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/flexslider.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/lightbox.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/ytplayer.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/theme.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400%7CRaleway:100,400,300,500,600,700%7COpen+Sans:400,500,600' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/animate.css">
      


    </head>
    <body>
<?php include_once ('top.php');?>

	<div class="container-fluid">
                <img src="https://placem.at/things?w=1920&h=400&random=0" alt="" class="img-responsive">
	</div>
	<div class="clearfix"></div>
	<div class="container">
		<br>

		<!-- <hr> -->
		<div class="row">
			<?php include_once("../Common/left.php");?>
					<!--end of widget-->
			<div class="widget">
				<h4 class="title">Search Product</h4>
				<hr>
				<form>
					<input class="mb0" type="text" placeholder="Search Product" />
				</form>
			</div>
			<!--end of widget-->

			<div class="widget">
				<h6 class="title">Returns Policy</h6>
				<hr>
				<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem
					antium doloremque laudantium, totam rem aperiam, eaque ipsa quae...</p>
			</div>

			<!--end of widget-->

			<!--end of sidebar-->
		</div>
		<div class="col-md-9 ">
			<h1 class="text-center wordColor wow bounceIn" data-wow-delay="3s"><?php echo $Name?></h1>
			<div class="row">
				<div class="col-md-4 col-sm-4 masonry-item col-xs-6"></div>
				<div class="col-md-8 text-right"></div>
			</div>
			<!--end of row-->
			<div class="row">
				<div class="col-sm-12">
					<hr>
				</div>
			</div>


			<!--end of row-->
			<div class="row masonry">
				 <?php
					$PageSize = 12;
					$Page = CheckData ( $_REQUEST ["Page"] );
					if ($Page == "") {
						$Page = 1;
					}
					$Page = intval ( $Page );
					$SQL = "Select Count(*) As DataAmount From product where Status = '上架' and G0=$G0";
					$Rs = mysql_query ( $SQL, $Conn );
					$Row = mysql_fetch_array ( $Rs );
					$DataAmount = intval ( $Row ["DataAmount"] );
					// 計算分頁數量
					$PageAmount = NumHandle2 ( $DataAmount, $PageSize ) / $PageSize;
					// 調整目前分頁
					if ($Page > $PageAmount) {
						$Page = $PageAmount;
					}
					if ($Page < 1) {
						$Page = 1;
					}
					$Data = array ();
					$SQL = "Select * From product Where Status = '上架' and G0=$G0 Order By Sort ,SerialNo DESC limit " . (($Page - 1) * $PageSize) . "," . $PageSize;
					$Rs = mysql_query ( $SQL, $Conn );
					if ($DataAmount > 0) {
						$Row = mysql_fetch_array ( $Rs );
						while ( $Row ) {
							?>
				<?php
							for($i = 1; $i <= 4; $i ++) {
								if ($Row) {
									$pSerialNo = $Row ["SerialNo"];
									$PrdName = $Row ["PrdName"];
									$PrdNote = $Row ["PrdNote"];
									$Notes = $Row ["Notes"];
									
									if ($Row ["PIC1Hidden"] != "") {
										$Pic = "../files/Product/PICList/" . $Row ["PIC1Hidden"];
									} else {
										$Pic = "../NoPIC/140x106.jpg";
									}
									$Url = "Product.php?G0=$G0&Sn=$pSerialNo";
									?>
				<div class="col-md-4 col-sm-4 masonry-item col-xs-6">
					<div class="image-tile outer-title text-center">

						<a href="<?php echo $Url?>" class="list"> <img src="<?php echo $Pic?>"
							alt="" class="img-responsive product-thumb ">
						</a>
						<div class="description">
							<span class="product-title"><?php echo $PrdName?></span>
                                             <br>
                                             <strong>Serial Number:</strong>
                                             <span class="serialNumber">8660</span>
						</div>
						<br />
						<!--  btn -->
						<a id="btn" class="btn btn-sm btn-rounded" href="#">add to List</a>
						<!-- btn -->
					</div>
				</div>
				<?php
									$Row = mysql_fetch_array ( $Rs );
								} else {
									?>
				<div class="col-md-4 col-sm-4 masonry-item col-xs-6"></div>
				<?php
								}
							}
						}
					}
				?>
                                              <br>
                                             <strong >Serial Number:</strong>
                                             <span class="serialNumber">8661</span>
				</div>
				
				<?php
				include_once ("../Common/PageBar/PageBar.php");
				?>
			</div>
		<!--end of nine col-->
		<!--end of container row-->
	</div>
	<!--end of container-->

	<?php include_once ('footer.php');?>
   
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
       

  <!-- add to cart -->
  <script>

$(function(){

  // 開始 local storage 塞入資料
    // 宣告 carList是一個 arry
    var carList = []; 
    // 宣告carList 從localStorage取得carList並序列化 
    carList = JSON.parse(window.localStorage.getItem("carList"));
      // alert(carList);  
    if(carList != null)
    {
        $.each(carList,function(idx, value){
        	$('#cartList').append(value); 
        })
        // #cartListnum塞入carList 各數
        $("#cartListnum").text(carList.length);
    } 
        //#cartListnum else塞入0
    else
    	$("#cartListnum").text("0");
    
  // 結束local storage 塞入資料

    $('.btn-rounded').click(function(){

        var myImg = $(this).parents('.image-tile').children('a').children('img').prop('src');
        // var myTitle = $(this).parent().children()[1].innerText;//$('.list .product-title').text();
        var myTitle = $(this).parents('.image-tile').find('.product-title').text();
        // alert(myTitle);
        var myNumber = $(this).parents('.image-tile').find('.serialNumber').text();
        // alert(myNumber);
        var newProduct = "";
            newProduct += "<li>";
            newProduct += "<a href=\"#\">";
            newProduct += "<img src=\"" + myImg + "\" class=\"img-responsive product-thumb  col-sm-6\">";
            newProduct += "<div class=\"description\">";
            newProduct += "<span class=\"product-title\">" + myTitle + "</span><br/>";
            newProduct += "<span class=\"serialNumber\">serialNumber" + myNumber + "</span>";
            newProduct += "</div>";
            newProduct += "</a>";
            newProduct += "</li>";

        // 布林值    
        var b = false;

        var cartItem = $('.cart-overview').children('li');
        $(cartItem).each(function(){
           var carItemName = $(this).children('a').children('.description').children('span:eq(0)').text();
           // alert(carItemName);
            if(myTitle == carItemName){
            // 布林值是true;
            b = true;
            // 跳出 
            alert('加過了');
            return false;
            }   
        });

        if(!b){
      // alert('u can del')
         $('#cartList').append(newProduct);
         alert(myTitle +"add to inquiry List");
                 // 宣告arr陣列
        var arr =[]; 
        // #cartList li 全部each 
        $('#cartList li').each(function(index,val) {  
        //塞入val 
        arr.push(val.outerHTML);
                });                    
        localStorage.setItem("carList",JSON.stringify(arr));
        $("#cartListnum").text(arr.length); 
    }


        // for(i = 0;i<select.length;i++)
        // {
        //   if(!select[i])
        //     break;
        //     var title = select[i].children[0].textContent;
        //     // alert(title);

        //   if(title == myTitle) 
        //     alert('加過了');
        //         break;
        // }
        // if(title!= myTitle && title !="")
        // {
        //     $('#cartList').append(newProduct); 

        //     if(!carList)

        //     carList = [];
        //     carList.push(newProduct);
        //     var jsonStr = JSON.stringify(carList);
        //     localStorage.setItem("carList",jsonStr);
        //     $("#cartListnum").text(carList.length);
            
        //     // // alert("已加入清單。");
        // }
    });

//加入你可能會喜歡點過資料
    // 宣告一個陣列
    var likeList = [];    

    $('.list img').click(
      function(){
         var likeImgSrc = $(this).prop('src');
        // alert(likeImgSrc);
         var likeImgTitle = $(this).parents('.image-tile').find('.product-title').text();
        // alert(likeImgTitle);
        var likeImgNumber = $(this).parents('.image-tile').find('.serialNumber').text();
        // alert(likeImgNumber);



        // 產品頁面 你可能會喜歡li結構
         var likeProduct = "";
             likeProduct += "<div class=\"col-md-2 col-sm-4\">";
             likeProduct += "<div class=\"image-tile outer-title text-center\">";
             likeProduct += "<a href=\"#\">";
             likeProduct += " <img src=\""+ likeImgSrc +"\" alt=\"\" class=\"img-responsive product-thumb\">";
             likeProduct += "</a>";
             likeProduct += "<div class=\"title\">";
             likeProduct += "<span class=\"mb0 likeImgTitle\">" + likeImgTitle + "</span>";
             likeProduct += "<span>SerialNumber:</span> ";
             likeProduct += "<span class=\"mb0 serialNumber\">" + likeImgNumber + "</span>";
             likeProduct += "<br/><br/>";
             likeProduct += "<a class=\"btn btn-sm btn-rounded\">Add To List</a>";
             likeProduct += "</div>";
             likeProduct += "</div>";
             likeProduct += "</div>";


        // 將likeproduct塞入likeList
        likeList.push(likeProduct);
        // 宣告jsonLikeStr反序列化likeList
        var jsonLikeStr = JSON.stringify(likeList);
        // 將likeList裡的jsonLikeStr 存到localStorage
        localStorage.setItem( "likeList", jsonLikeStr );
        // 取得likeList裡的jsonLikeStr 顯示
        alert(localStorage.getItem( "likeList", jsonLikeStr ));
        // $("#likeListnum").text(likeList.length);

        });
       
});




</script>
  <!--end add to cart add -->

    </body>
</html>