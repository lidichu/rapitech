<div class="col-md-9 ">
<?php	if(!$Query_View){?>
<h1 class="text-center wordColor wow bounceIn" data-wow-delay="3s"><?php echo $Name?></h1>
<?php	}?>
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
		
		
		$SQL = "Select Count(*) As DataAmount From product where Status = '上架' ";
		if($Query_View)
		{
			$Parameter = CheckData($_REQUEST["Val"]);
			if($Parameter == "")
				$Parameter = "'%'";
			else
				$Parameter = "'%".$Parameter."%'";
				
			$SQL.=" and (PrdName like $Parameter or PrdNote like $Parameter or Notes like $Parameter or ModelNo like $Parameter or PrdSize like $Parameter or MOQ like $Parameter)";
		}
		else if($SN != null)
			$SQL.=" and G0=(select SerialNo from productCategory where parentSerialNo=$SN limit 1)";
		else
			$SQL.=" and G0=$G0";
			
		
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
		
		
		$SQL = "Select * From product where Status = '上架' ";
		if($Query_View)
			$SQL.=" and (PrdName like $Parameter or PrdNote like $Parameter or Notes like $Parameter or ModelNo like $Parameter or PrdSize like $Parameter or MOQ like $Parameter)";
		else if($SN != null)
			$SQL.=" and G0=(select SerialNo from productCategory where parentSerialNo=$SN limit 1)";
		else
			$SQL.=" and G0=$G0";
		
		$SQL .= " Order By Sort ,SerialNo DESC limit " . (($Page - 1) * $PageSize) . "," . $PageSize;
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
						$ModelNo = $Row ["ModelNo"];
						
						if($Query_View)
							$G0 = $Row["G0"];
						
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
				<span class="product-title" data-sn="<?php echo $pSerialNo?>"><?php echo $PrdName?></span>
                                             <br>
                                             <strong>Model No:</strong>
                                             <span class="modelNo"><?php echo $ModelNo?></span>
						</div>
						<br />
						<!--  btn -->
			<a id="btn" class="btn btn-sm btn-rounded">add to List</a>
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
		else if($Query_View)
		{
	?>
		<span class="input-lh">查無結果</span>
	<?php 
		}
	?>
				</div>
				

</div>
<?php include_once ("../Common/PageBar/PageBar.php"); ?>

<script type="text/javascript">
	$(function(){
	  // 結束local storage 塞入資料
		$('.btn-rounded').click(addToList);
	});
</script>