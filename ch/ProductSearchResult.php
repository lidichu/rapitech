<!doctype html>
<?php include_once('../PageHead.php');?>
<?php
	$Product_View=true;
	$Query_View=true;
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> Rapitech Product Search Results</title>
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
	<section>
	<div class="clearfix"></div>
	<div class="container">
		<br>

		<!-- <hr> -->
		<div class="row">
			<?php include_once("../Common/left.php");?>
		</div>
		<h1 class="text-center wordColor wow bounceIn" data-wow-delay="1s">Search Results</h1>
		<?php include_once("ProductList.php");?>
		
		<!--end of nine col-->
		<!--end of container row-->
	</div>
	<!--end of container-->
</section>
	<?php include_once ('footer.php');?>
   
         
  <!--end add to cart add -->

    </body>
</html>