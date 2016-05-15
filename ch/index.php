<!doctype html>
<?php include_once('../PageHead.php');?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> Rapitech index</title>
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
        <div class="nav-container wow bounceIn" data-wow-delay="1.5s">
        <div class="nav-utility wordColor "  >

                    <div class="module right">
                         <a href="contact.php">
                            <i class="ti-location-arrow">&nbsp;</i>
                            <span class="sub"> <?php echo $Web["WebAddress"]?></span>
                        </a>
                    </div>

                    <div class="module right">
                        <a href="contact.php">
                            <i class="ti-email">&nbsp;</i>
                            <span class="sub"><?php echo $Web["ManagerEmail"]?></span>
                        </a>
                    </div>
                    <div class="module left">
                      
                    </div>
                </div>
            <nav>
                <div class="nav-bar">
                    <div class="module left">
                        <a href="index.php">
                            <img class="logo logo-light" alt="heryi" src="img/logo-light.png" />
                            <img class="logo logo-dark" alt="heryi" src="img/logo-dark.png" />
                        </a>
                    </div>
                    <div class="module widget-handle mobile-toggle right visible-sm visible-xs">
                        <i class="ti-menu"></i>
                    </div>
                    <div class="module-group right">
                        <div class="module left">
                            <ul class="menu">
                                <li>
                                  
                                     <a href="about.php"><span class="label label-success">About Us</span></a>
                                    
                                </li>
                                <!--  -->
                                <li class="has-dropdown">
                                    <a href="#">
                                                <span class="label label-success">Products</span>
                                    </a>
                                         <ul class="mega-menu">
                                        <li>
                                            <ul>
                                                <li>
                                                     <a href="productCategories.php">
                                                        Measuring
                                                     </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        Garden Accessories
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        Outdoor & Indoor Clocks
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        Soil Test Kits
                                                    </a>
                                                   
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        Thermometers
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        Gardening Ties
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        Plant Labels
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        Plant Supports
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        </ul> 
                                <!--  -->
                                <li>
                                    <a href="news.php">
                                                <span class="label label-success">News </span>
                                    </a>
                                </li>          
                                <li>
                                    <a href="contact.php">
                                                 <span class="label label-success">Contact Us </span>
                                    </a>
                                </li> 


                            </ul>
                        </div>
                        <!--end of menu module-->
                        <div class="module widget-handle search-widget-handle left">
                            <div class="search wordColor">
                                <i class="ti-search"></i>
                                <span class="title">Search the product</span>
                            </div>
                            <div class="function ">
                                <form class="search-form ">
                                    <input type="text" placeholder="Search the product" />
                                </form>
                            </div>
                        </div>
                        <div class="module widget-handle cart-widget-handle left">
                            <div class="cart wordColor">
                                <i class="ti-bag"></i>
                                <span class="label number">2</span>
                                <span class="title">Shopping Cart</span>
                            </div>
                            <div class="function">
                                <div class="widget">
                                    <h6 class="title">Shopping Cart</h6>
                                    <hr>
                                    <ul class="cart-overview">
                                        <li>
                                            <a href="#">
                                                <img alt="Product" src="img/shop-widget-1.png" />
                                                <div class="description">
                                                    <span class="product-title">Canvas Backpack</span>
                                                   <!--  <span class="price number">$39.90</span> -->
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img alt="Product" src="img/shop-widget-2.png" />
                                                <div class="description">
                                                    <span class="product-title">Vintage Camera</span>
                                                   <!--  <span class="price number">$249.50</span> -->
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <hr>
                                    <div class="cart-controls">
                                        <a class="btn btn-sm btn-filled" href="cart.php">Inquiry List</a>
                                        <div class="list-inline pull-right">
                                           <!--  <span class="cart-total">Total: </span>
                                            <span class="number">$289.40</span> -->
                                        </div>
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
        <div class="main-container">
            <section class="projects p0 bg-dark">
                <ul class="filters floating cast-shadow mb0 col-md-12 col-md-push-0 col-sm-12"></ul>
                <div class="row masonry-loader fixed-center">
                    <div class="col-sm-12 text-center">
                        <div class="spinner"></div>
                    </div>
                </div>
                <div class="row masonry masonryFlyIn">
                    <div class="col-md-3 col-sm-6 masonry-item project" data-filter="Measuring">
                        <div class="image-tile inner-title hover-reveal text-center">
                            <a href="productCategories.php">
                                <img alt="Pic" src="img/project-single-1.jpg" class="myborder">
                                <div class="title titlebg1">
                                    <h5 class="uppercase mb0">Measuring</h5>
                                    <span>Measuring / all of our products</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 masonry-item project" data-filter="Garden Accessories">
                        <div class="image-tile inner-title hover-reveal text-center">
                            <a href="productCategories.php">
                                <img alt="Pic" src="img/project-single-16.jpg" class="myborder">
                                <div class="title titlebg2">
                                    <h5 class="uppercase mb0">Garden Accessories</h5>
                                    <span>Garden Accessories / all of our products</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 masonry-item project" data-filter="Outdoor & Indoor Clocks ">
                        <div class="image-tile inner-title hover-reveal text-center">
                            <a href="productCategories.php">
                                <img alt="Pic" src="img/project-single-3.jpg" class="myborder" />
                                <div class="title titlebg3">
                                    <h5 class="uppercase mb0">Outdoor & Indoor Clocks</h5>
                                    <span>Outdoor & Indoor Clocks / all of our products</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 masonry-item project" data-filter="Soil Test Kits">
                        <div class="image-tile inner-title hover-reveal text-center">
                            <a href="productCategories.php">
                                <img alt="Pic" src="img/project-single-5.jpg" class="myborder" />
                                <div class="title titlebg4">
                                    <h5 class="uppercase mb0">Soil Test Kits</h5>
                                    <span>Soil Test Kits / all of our products</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 masonry-item project" data-filter="Thermometers">
                        <div class="image-tile inner-title hover-reveal text-center">
                            <a href="productCategories.php">
                                <img alt="Pic" src="img/project-single-17.jpg" class="myborder">
                                <div class="title titlebg5">
                                    <h5 class="uppercase mb0">Thermometers</h5>
                                    <span>Thermometers / all of our products</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 masonry-item project" data-filter="Gardening Ties">
                        <div class="image-tile inner-title hover-reveal text-center">
                            <a href="productCategories.php">
                                <img alt="Pic" src="img/project-single-18.jpg" class="myborder">
                                <div class="title titlebg6">
                                    <h5 class="uppercase mb0">Gardening Ties</h5>
                                    <span>Gardening Ties / all of our products</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 masonry-item project" data-filter="Plant Labels">
                        <div class="image-tile inner-title hover-reveal text-center">
                            <a href="productCategories.php">
                                <img alt="Pic" src="img/project-single-6.jpg" class="myborder" />
                                <div class="title titlebg7">
                                    <h5 class="uppercase mb0">Plant Labels</h5>
                                    <span>Plant Labels / all of our products</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 masonry-item project" data-filter="Plant Supports">
                        <div class="image-tile inner-title hover-reveal text-center">
                            <a href="productCategories.php">
                                <img alt="Pic" src="img/project-single-19.jpg" class="myborder" />
                                <div class="title titlebg8">
                                    <h5 class="uppercase mb0">Plant Supports </h5>
                                    <span>Plant Supports / all of our products</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--  -->

                    <div class="clearfix"></div>
                    <div class="col-md-3 col-sm-6 masonry-item project" data-filter="New arrived">
                        <div class="image-tile inner-title hover-reveal text-center">
                            <a href="productCategories.php">
                                 <!-- <img alt="Pic" src="img/project-single-20.jpg" class="myborder" /> -->
                                  <img src="https://placem.at/things?w=1440&h=955&random=4" alt="Pic" class="myborder"/>
                                <div class="title titlebg9">
                                    <h5 class="uppercase mb0"> New arrived </h5>
                                    <span> New arrived / all of our products</span>
                                </div>
                            </a>
                            <!-- this is the last of block -->
                        </div>
                        <!--  -->
                    </div>
                </div>
                <!--end of row-->
            </section>
            <div class="clearfix"></div>
            <br>
            <div class="container-fluid ">
                <section class="bg-secondary pt64 pb32">
                    <div class="container ">
                        <!-- word slider -->
                        <!--end of row-->
                        <div class="row ">
                            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                                <div class="text-slider slider-arrow-controls text-center relative">
                                    <ul class="slides">
                                    	<?php
											$Sql="select * from news where Status='上架' and IndexShow='true' order by IndexSort";
											$Rs=mysql_query($Sql,$Conn);
											if($Rs && mysql_num_rows($Rs)>0){
												while($Row=mysql_fetch_array($Rs)){
													$Title=$Row["Title"];
													$Note=$Row["Note"];
													$PostDate=$Row["PostDate"];
										?>
                                        <li>
                                            <h2 class="text-center wordColor"><?php echo $Title?></h2>
                                            <hr />
                                            <p class="lead"><?php echo $Note?></p>
                                            <div class="quote-author">
                                                <span><?php echo $PostDate?></span>
                                            </div>
                                          <!--  something wrong with btn-modal -->
                                            <a class="btn btn-lg" href="news.php"> More Detail <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                                           
                                        </li>
                                        <?php
												}
											}
										?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--end of row-->
                        <br>
                    </div>
                </section>
            </div>
            <!-- word slider -->
            <div class="container-fliud description">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img src="img/company.jpg" alt="The Rapitech company profile" class="wow slideInLeft col-sm-12 col-xs-12" data-wow-delay=".5s">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h2 class="text-center wordColor">The Rapitech company profile</h2>
                        <p class="text-left col-sm-10 col-sm-push-1">
                            Rapitech started as a manufactring company of gardening products, it now also  acts
                            as a sourcing and a trading company for addtional products. The product range currently
                            handled is primarily for the garden,outdoor & indoors gardening clocks and electronic DIY
                            markets in Europe and North America. Our company is constandly reviewing the product
                            rang and offering new items to our customer based on the current markets needs.
                            <br><br>
                            <a class="btn btn-lg " href="about.php">More Detail <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row bgg">
                    <div class="col-md-4 col-sm-4 col-md-push-8">
                        <img src="img/facilties.jpg" alt="The Rapitech facilties " class="wow bounceInRight col-sm-12 col-xs-12" data-wow-offset="300">
                    </div>
                    <div class="col-md-8 col-sm-8 col-md-pull-4 col-xs-12 ">
                        <h2 class="text-center footerColor">The Rapitech facilties</h2>
                        <p class="col-sm-10 col-sm-push-1 footerColor">
                            Rapitech started as a manufactring company of gardening products, it now also  acts as a sourcing and a trading company for addtional products. The product range currentlyhandled is primarily for the garden,outdoor & indoors gardening clocks and electronic DIY markets in Europe and North America. Our company is constandly reviewing the productrang and offering new items to our customer based on the current markets needs.
                            <br><br>
                            <a class="btn btn-lg  mybtn" href="about.php">More Detail <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                        </p>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="col-sm-12">
                        <img src="img/tree.png" alt="" class="wow tada" data-wow-duration="1.5s">
                    </div>
                </div>
            </div>

            <!-- footer -->
            <footer class="footer-1 bg-dark bgcolor">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <img alt="Logo" class="logo" src="img/logo-light.png" />
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="widget">
                                <h6 class="title">contact us</h6>
                                <hr>

                                <ul class="link-list recent-posts">
                                    <li>
                                        <span class="date">
                                            <i class="fa fa-home" aria-hidden="true"></i>
                                            ADD: <?php echo $Web["WebAddress"]?>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="date">
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            Phone: <?php echo $Web["WebTel"]?>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="date">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                            E-Mail: <?php echo $Web["ManagerEmail"]?>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="date">
                                            <i class="fa fa-tty" aria-hidden="true"></i>
                                            Fax: <?php echo $Web["WebFax"]?>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <!--end of widget-->
                        </div>


                        <div class="col-md-4 col-sm-6">
                            <div class="widget">
                                <h6 class="title">Social Media</h6>
                                <hr>
                                <div class="row">
                                    <div class="col-xs-3 ">
                                        <a href="">
                                            <img src="img/fb.png" alt="" class="wow flipInX " data-wow-delay=".5s">
                                        </a>
                                    </div>

                                    <div class="col-xs-3 ">
                                        <a href="">
                                            <img src="img/alibaba.png" alt="" class="wow flipInX " data-wow-delay=".5s">
                                        </a>
                                    </div>
                                    <div class="col-xs-3 ">
                                        <a href="">
                                            <img src="img/youtube.png" alt="" class="wow flipInX " data-wow-delay=".5s">
                                        </a>
                                    </div>
                                    <div class="col-xs-3">
                                        <a href="">
                                            <img src="img/google.png" alt="" class="wow flipInX " data-wow-delay=".5s">
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--end of widget-->
                    </div>
                </div>
                <!--end of row-->
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <span class="sub">&copy; Copyright 2016 - Rapiteh Desgin by Heryi</span>
                    </div>
                </div>


            </footer>
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
        <script src="js/scripts.js"></script>
        <!--  -->
        <script src="js/wow.js"></script>
  <script>
    wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100,
        callback:     function(box) {
          console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        }
      }
    );
    wow.init();

  </script>

    </body>
</html>