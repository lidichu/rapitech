<!doctype html>
<?php include_once('../PageHead.php');?>
<?php
	$Product_View=true;
	function getBicPic($fileName)
	{
		return ($fileName == "" || $fileName == null) ? "" : "../files/Product/PICBig/".$fileName;
	}
		
	function getPic($fileName)
	{
		return ($fileName == "" || $fileName == null) ? "" : "../files/Product/PICDetail/".$fileName;
	}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> Rapitech product</title>
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
    <div class="main-container">
        <div class="container-fluid">
            <img src="https://placem.at/things?w=1920&h=400&random=0" alt="" class="img-responsive">
        </div>
        <div class="clearfix"></div>
   
                        </div>
                        <!--end of container-->
        <section>
            <div class="container">
                <div class="row">
                    <!--  -->
                    <div class="row">
						<?php include_once("../Common/left.php");?>
					</div>
					<?php
						$Sn=$_REQUEST["Sn"];
						if($Sn == null)
							$Sn = 0;
						$sql="select * from product where SerialNo=$Sn and Status='上架'";
						$rs=mysql_query($sql);
						if($rs && (mysql_num_rows($rs))>0){
							$row=mysql_fetch_array($rs);
							$PrdName=$row["PrdName"];	
							$PrdNote=$row["PrdNote"];
							$ModelNo=$row["ModelNo"];
							$PrdSize=$row["PrdSize"];
							$MOQ=$row["MOQ"];
							$Notes=$row["Notes"];
							
							$BigPic=getBicPic($row["PIC1Hidden"]);
						}
					?>
                    <div class="col-md-9">
                        <div class="product-single">
                            <div class="row mb24 mb-xs-48">
                                <div class="col-md-5 col-sm-6">
                                    <div class="image-slider slider-thumb-controls controls-inside">
                                       
                                        <ul class="slides">
                                        	<?php
                                        		$PicCount=8;
                                        		for($i = 1; $i <= $PicCount; $i ++) {
                                        			$Pic=getPic($row["PIC".$i."Hidden"]);
                                        			if($Pic != ""){
											?>
                                            <li>
                                                <img src="<?php echo $Pic?>" alt="" class="img-responsive">
                                            </li>
                                            <?php
                                        			}
												}
											?>
                                        </ul>
                                    </div>
                                    <!--end of image slider-->
                                </div>
                                <div class="col-sm-6">
                                    <div class="description">
                                        <h4 class="uppercase productTitle"><?php echo $PrdName?></h4>
                                        <div class="mb32 mb-xs-24">
                                            
                                        </div>
                                        <p><?php echo $PrdNote?></p>
                                        <ul>
                                            <li>
                                                <strong>Model No:</strong> <?php echo $ModelNo?>
                                            </li>
                                            <li>
                                                <strong>Product Size:</strong> <?php echo $PrdSize?>
                                            </li>
                                            <li>
                                                <strong>MOQ:</strong> <?php echo $MOQ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <hr class="mb48 mb-xs-24">
                                   <a class="btn btn-lg add-to-cart" id="btn">Add To List</a>
                                </div>
                            </div>
                            <!--end of row-->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="tabbed-content text-tabs">
                                        <ul class="tabs">
                                            <li class="active">
                                                <div class="tab-title">
                                                    <span>Product Detail</span>
                                                </div>
                                                <div class="tab-content">
                                                    <p><?php echo $Notes?></p>
                                                </div>
                                            </li>
                                           
                                        </ul>
                                    </div>
                                    <!--end of text tabs-->
                                </div>
                            </div>
                            <!--end of row-->
                        </div>
                        <!--end of product single-->
                    </div>
                    <!--end of nine col-->
                </div>
                <!--end of row-->
            </div>
     
            <!--end of container-->
        </section>
        <section class="pt0">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="uppercase mb80 mb-xs-40">You May Also Like</h4>
                    </div>
                </div>
                <!--end of row-->
                <div class="row" id="likelist">
                   <!--  <div class="col-md-2 col-sm-4">
                        <div class="image-tile outer-title text-center">
                            <a href="#">
                                <img src="https://placem.at/things?w=600&h=600&random=1" alt="" class="img-responsive product-thumb">
                            </a>
                            <div class="title">
                                <h5 class="mb0">Adrian LambsWool</h5>
                                   <br>
                                    <a class="btn btn-sm btn-rounded">Add To List</a>
                            </div>
                        </div>
                    </div> -->
                    <!--end three col-->
                   <!--  <div class="col-md-2 col-sm-4">
                        <div class="image-tile outer-title text-center">
                            <a href="#">
                                <img src="https://placem.at/things?w=600&h=600&random=2" alt="" class="img-responsive product-thumb">
                            </a>
                            <div class="title">
                                <h5 class="mb0">Stanley Leather</h5>
                                 <br>
                                <a class="btn btn-sm btn-rounded">Add To List</a>
                            </div>
                        </div>
                    </div> -->
                    <!--end three col-->
                 <!--    <div class="col-md-2 col-sm-4">
                        <div class="image-tile outer-title text-center">
                            <a href="#">
                                <img src="https://placem.at/things?w=600&h=600&random=3" alt="" class="img-responsive product-thumb">
                            </a>
                            <div class="title">
                                <h5 class="mb0">Vladimir Stainless</h5>
                                 <br>
                                <a class="btn btn-sm btn-rounded">Add To List</a>
                            </div>
                        </div>
                    </div> -->
                    <!--end three col-->
                  <!--   <div class="col-md-2 col-sm-4">
                        <div class="image-tile outer-title text-center">
                            <a href="#">
                                <img src="https://placem.at/things?w=600&h=600&random=4" alt="" class="img-responsive product-thumb">
                            </a>
                            <div class="title">
                                <h5 class="mb0">Luka Vintage Camera</h5>
                                <br>
                                <a class="btn btn-sm btn-rounded">Add To List</a>
                            </div>
                        </div>
                    </div> -->
                    <!--end three col-->
                    <!-- <div class="col-md-2 col-sm-4">
                        <div class="image-tile outer-title text-center">
                            <a href="#">
                                <img src="https://placem.at/things?w=600&h=600&random=5" alt="" class="img-responsive product-thumb">
                            </a>
                            <div class="title">
                                <h5 class="mb0">Luka Vintage Camerb</h5>
                                  <br>
                                <a class="btn btn-sm btn-rounded">Add To List</a>
                            </div>
                        </div>
                    </div> -->
                    <!--end three col-->
                   <!--  <div class="col-md-2 col-sm-4">
                        <div class="image-tile outer-title text-center">
                            <a href="#">
                                <img src="https://placem.at/things?w=600&h=600&random=6" alt="" class="img-responsive product-thumb">
                            </a>
                            <div class="title">
                                <h5 class="mb0">Luka Vintage Camerc</h5>
                                <br>
                                <a class="btn btn-sm btn-rounded">Add To List</a>
                            </div>
                        </div>
                    </div> -->
                    <!--end three col-->
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </section>
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
    <script src="js/scripts.js"></script>
    <!--  -->
    <script src="js/wow.js"></script>
    <script>
//  add to cart
    $(function(){
    var likeList = [];
    // 1.開始 local storage 塞入資料
    // 宣告 carList是一個 arry
    var carList = []; 
    carList = JSON.parse(window.localStorage.getItem("carList"));
      // alert(carList);  
    if(carList){
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

//2.你可能會喜歡點過資料 
    // var likeList = [];
    likeList = JSON.parse(window.localStorage.getItem("likeList"));
    // alert(likeList);
    $('#likelist').append(likeList); 

// 3.你可能會喜歡 按鈕事件
        $('.btn-rounded').click(function(){
        // 抓到目前list img src
    var likeImgSrc= $(this).parents('.image-tile').children('a').children('img').prop('src');
     // alert(likeImgSrc);
        //抓到目前list span
    var list = $(this).parents('.title').find('.likeImgTitle');
        // span裡面的值
    var likelistName = list.text();
    // alert(likelistName);
    var likeSerialNumber = $(this).parents('.title').find('.serialNumber').text();
    // alert(likeSerialNumber);

        var newLikeProduct = "";
        newLikeProduct += "<li>";
        newLikeProduct += "<a href=\"#\">";
        newLikeProduct += "<img src=\"" + likeImgSrc + "\" class=\"img-responsive product-thumb  col-sm-6\">";
        newLikeProduct += "<div class=\"description\">";
        newLikeProduct += "<span class=\"product-title\">" + likelistName + "</span><br/>";
        newLikeProduct += "<span class=\"serialNumber\">serialNumber" +likeSerialNumber + "</span>";
        newLikeProduct += "</div>";
        newLikeProduct += "</a>";
        newLikeProduct += "</li>";


         // alert(newProduct);

        //抓到所有的cart h3 取到物件 沒值
    var cartItem = $('#cartList').children('li').find('.product-title');
        // alert(cartItem);
        // 宣告一個布林值 為false
        var b = false;
    // cart 裡的.product-title 跑迴圈
        $(cartItem).each(function(){
            // 取得cart h3值

            var cartItemName = $(this).text();
            // alert(cartItemName); 
        // 判斷 如果 cartItemName == likelistName
        if(cartItemName == likelistName)
            {   
                // 布林值是true;
                b = true;
                // 跳出 
                alert('加過了');
                return false;
            }                       
        });
        // 如果不是true
        if(!b)
        {
            
            // .cart加入newProduct結構
            $('#cartList').append(newLikeProduct);
             alert(likelistName +"add to inquiry List");
        // 宣告arr陣列
        var arr =[]; 
        // #cartList li 全部each 
        $('#cartList li').each(function(index,val) {  
        //塞入val 
        arr.push(val.outerHTML);
                });                    
        localStorage.setItem("carList",JSON.stringify(arr));
        $("#cartListnum").text(arr.length); 
        // 
        }
    });
    });

  //end add to cart add 


// product add

$(function(){$('#btn').click(
    function(){
        var ProductImg = $('.slides').children('li:eq(0)').children('img').prop('src');
        // alert(ProductImg);
        var ProductTittle = $('.productTitle').text();
        // alert(ProductTittle);
        var ProductNumber = $('.SerialNumber').text();
        // alert(ProductNumber);
        // var newProductBig = " <li><img src=\""+ ProductImg+"\" alt=\"\" class=\"img-responsive col-sm-6\"><span>"+ ProductTittle +"</span></li>";
        // alert(newProductBig);

        var newProductBig = ""
        newProductBig += "<li>";
        newProductBig += "<a href=\"#\">";
        newProductBig += "<img src=\"" + ProductImg + "\" class=\"img-responsive product-thumb  col-sm-6\">";
        newProductBig += "<div class=\"description\">";
        newProductBig += "<span class=\"product-title\">" + ProductTittle + "</span><br/>";
        newProductBig += "<span class=\"serialNumber\">serialNumber" + ProductNumber + "</span>";
        newProductBig += "</div>";
        newProductBig += "</a>";
        newProductBig += "</li>";

        // alert(newProductBig);
        // 宣告cartItem #cartList 的li .product-title的span
         var cartItem = $('#cartList').children('li').find('.product-title');
         // alert(cartItem);
          // 宣告一個布林值 為false
        var b = false;
        // cart 裡的h3 跑迴圈
        $(cartItem).each(function(){
            // 取得cart h3值
            var cartItemName = $(this).text();
            // alert(cartItemName); 
            // 判斷 如果 cartItemName == ProductTittle
            if(cartItemName == ProductTittle)
            {   
                // 布林值是true;
                b = true;
                // 跳出 
                alert('加過了');
                return false;
            }                       
        });
        // 如果不是true
        if(!b)
        {
            // .cart加入newProduct結構
            $('#cartList').append(newProductBig); 
             alert(ProductTittle + "add to inquiry List");
            // 宣告arr陣列
        var arr =[]; 
        // #cartList li 全部each 
        $('#cartList li').each(function(index,val) {  
        //塞入val 
        arr.push(val.outerHTML);
                });                    
        localStorage.setItem("carList",JSON.stringify(arr));
        $("#cartListnum").text(arr.length); 
        // 
        }
    });




});
// product add
 </script>
 
</body>
</html>