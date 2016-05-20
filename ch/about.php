<!doctype html>
<?php include_once('../PageHead.php');?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> Rapitech About us</title>
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
            <h1 class="text-center wordColor wow bounceIn" data-wow-delay="3s">About Rapitech</h1>
            <section class="image-square left">
                <div class="col-md-6 image">
                    <div class="background-image-holder">
                        
                         <img src="https://placem.at/things?w=800&h=533&random=4" alt="" class="wow slideInLeft" data-wow-delay=".5s">
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-1 content  wow bounceIn">
                    <h4 class="uppercase">The Rapitech Company Profile</h4>
                    <p>Rapitech started as a manufacturing company of gardening products, it now also acts as a sourcing and a trading company for additional products. The product range currently handled is primarily for the garden, outdoors & indoors gardening clocks and electronic DIY markets in Europe and North America. Our company is constantly reviewing the product range and offering new items to our customers based on the current markets needs.
                    </p>
                    <hr>
                   
                </div>
            </section>
            <section class="image-square right">
                <div class="col-md-6 p0 image">
                    <div class="map-holder background-image-holder">
                         <img src="https://placem.at/things?w=800&h=533&random=102" alt=""  >
                    </div>
                </div>
                <div class="col-md-6 content wow bounceIn">
                   <h4 class="uppercase">The Rapitech Factory Facilities</h4>
                    <p>
                        Our main office is based in Kaohsiung, Taiwan with the manufacturing facility in Zhangzhou, China and consolidation warehouse for sub-contracted goods.  The factory and warehouse consist of 2,400 sq/m and employs about 75 workers. The factory manufactures test meters, garden accessories, plant labels, gardening ties, thermometers, etc. It is also equipped with general packing line, quality control and distribution. And the warehouse is available for multifunctional consolidation before shipment.
                    </p>
                    <hr>
                   
                </div>
            </section>
<?php include_once ('footer.php');?>

        </div>
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

$(function(){

  // 開始 local storage 塞入資料
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
    else
        $("#cartListnum").text("0");
    }); 

</script>

    </body>
</html>