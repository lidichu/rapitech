<!doctype html>
<?php include_once('../PageHead.php');?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> Rapitech news</title>
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
            <div class="container"> 
            <br/>     
                <h1 class="text-center wordColor wow bounceIn" data-wow-delay="3s">News</h1>
                <hr>
                </div>
          
            <section class="bg-secondary">
                
                <div class="container">
                    <div class="row masonry-loader">
                        <div class="col-sm-12 text-center">
                            <div class="spinner"></div>
                        </div>
                    </div>
                    <div class="row masonry masonryFlyIn mb40">
                    	<?php
							$Sql="select * from news where Status='上架' order by Sort,PostDate DESC,SerialNo Desc";
							$Rs=mysql_query($Sql,$Conn);
							if($Rs && mysql_num_rows($Rs)>0){
								while($Row=mysql_fetch_array($Rs)){
									$Title=$Row["Title"];
									$Note=$Row["Note"];
									$PostDate=$Row["PostDate"];
									
									$Url=$Row["Url"];
									$TargetWindow=$Row["TargetWindow"];
									
									$Pic="";
									if($Row["PICHidden"]!="")
										$Pic="../files/News/PIC/".$Row["PICHidden"];
						?>
                        <div class="col-sm-4 post-snippet masonry-item col-xs-12">
	                        <?php
		                        	if($Pic != "")
		                        	{
							?>
                            <a href="<?php echo $Url?>" target="<?php echo $TargetWindow?>">
                                <img src="<?php echo $Pic?>" alt="" >
                            </a>
	                        <?php
									}
							?>
                            <div class="inner">
                                <a href="<?php echo $Url?>" target="<?php echo $TargetWindow?>">
                                    <h5 class="mb0"><?php echo $Title?></h5>
                                    <span class="inline-block mb16"><?php echo $PostDate?></span>
                                </a>
                                <hr>
                                <p><?php echo $Note?></p>
                                <!-- <a class="btn btn-sm" href="#">Read More</a> -->
                            </div>
                        </div>
                         <?php
								}
							}
						?>

                      
                    </div>
                    <!--end of row-->
                   <!--  <div class="row">
                        <div class="text-center">
                            <ul class="pagination">
                                <li>
                                    <a href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="#">1</a>
                                </li>
                                <li>
                                    <a href="#">2</a>
                                </li>
                                <li>
                                    <a href="#">3</a>
                                </li>
                                <li>
                                    <a href="#">4</a>
                                </li>
                                <li>
                                    <a href="#">5</a>
                                </li>
                                <li>
                                    <a href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div> -->
                    <!--end of row-->
                </div>
                <!--end of container-->
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
        <script src="js/scripts.js"></script>
        <script src="js/wow.js"></script>


    </body>
</html>