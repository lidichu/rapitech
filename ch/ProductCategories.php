﻿<!doctype html>
<?php include_once('../PageHead.php');?>
<?php
	$Product_View=true;
	
	$BannerPic="";
	$G0=CheckData($_REQUEST["G0"]);
	$SN=CheckData($_REQUEST["SN"]);
	$Sql="select * from productcategory where Status='上架'";
	if($SN != null)
		$Sql .= " and SerialNo=$SN";
	else if($G0 != null)
		$Sql .= " and SerialNo=(select ParentSerialNo from productcategory where SerialNo=$G0)";
	else 
		$Sql .= " and SerialNo=(select SerialNo from productcategory where Status='上架' and ParentSerialNo=1 order by Sort,SerialNo Desc limit 1)";
	$Rs=mysql_query($Sql,$Conn);
	if($Rs && mysql_num_rows($Rs)>0){
		if($Row=mysql_fetch_array($Rs))
			$BannerPic="../images/".$Row["Category"].".jpg";
	}
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
	<div class="main-container">
		<div class="container-fluid">
			<img src="<?php echo $BannerPic?>" alt=""
				class="img-responsive">
		</div>
		<div class="clearfix"></div>
	</div>
	<section>
		<div class="container">
			<br>

			<!-- <hr> -->
			<div class="row">
			<?php include_once("../Common/left.php");?>
					
			</div>
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