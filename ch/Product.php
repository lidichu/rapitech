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
	    <title>Rapitech product</title>
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
			<img src="https://placem.at/things?w=1920&h=400&random=0" alt=""
				class="img-responsive">
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
						$Sn=CheckData($_REQUEST["Sn"]);
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
                                            <li><img
											src="<?php echo $Pic?>" alt="" class="img-responsive"></li>
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
									<h4 class="uppercase productTitle" data-sn="<?php echo $Sn?>"><?php echo $PrdName?></h4>
									<div class="mb32 mb-xs-24"></div>
									<p><?php echo $PrdNote?></p>
									<ul>
										<li><strong>Model No:</strong> <?php echo $ModelNo?>
                                            </li>
										<li><strong>Product Size:</strong> <?php echo $PrdSize?>
                                            </li>
										<li><strong>MOQ:</strong> <?php echo $MOQ?>
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
	                <?php
						$SQL = "Select * From product where Status = '上架' and IndexShow = 'true'";
						$Rs = mysql_query ( $SQL, $Conn );
						if($Rs && mysql_num_rows($Rs)>0){
							while($Row=mysql_fetch_array($Rs)){
								$ParentSerialNo=$Row["G0"];
								$pSerialNo = $Row ["SerialNo"];
								$PrdName = $Row ["PrdName"];
								$ModelNo = $Row ["ModelNo"];
								
								if ($Row ["PIC1Hidden"] != "") {
									$Pic = "../files/Product/PICList/" . $Row ["PIC1Hidden"];
								} else {
									$Pic = "../NoPIC/140x106.jpg";
								}
								$Url = "Product.php?G0=$G0&Sn=$pSerialNo";
					?>
                   <div class="col-md-2 col-sm-4">
					<div class="image-tile outer-title text-center">
						<a href="<?php echo $Url?>" class="list"> <img
							src="<?php echo $Pic?>" alt=""
							class="img-responsive product-thumb ">
						</a>
						<div class="title">
							<h5 class="mb0" data-sn="<?php echo $pSerialNo?>"><?php echo $PrdName?></h5>
							<br>
                            <strong>Model No:</strong>
                            <span class="modelNo"><?php echo $ModelNo?></span>
							<br> <a class="btn btn-sm btn-rounded">Add To List</a>
						</div>
					</div>
				</div> 
	                <?php 
							}
						}
					?>
                </div>
			<!--end of row-->
		</div>
		<!--end of container-->
	</section>
<?php include_once ('footer.php');?>

	<script type="text/javascript">
		$(function(){
			$('#btn').click(addToList);
			$('.btn-rounded').click(addToList);
		});
	</script>
    

</body>
</html>