<style type="text/css">
.carousel {width:560px;}
.carousel .prev , .carousel .next {height:23px;width:50px;overflow:hidden;text-decoration:none;cursor:pointer;}
.jCarouselLite {float:left;width:426px;height:130px;overflow:hidden;/*必要元素*/}
.jCarouselLite li{height:130px;margin:0px 5px;width:182px;text-align:center;}
</style>
<?php
$Param=array(
	"Status"	=>'上架',
	"Discount" =>'true'
);
$PrdRow=GetTable("product","SerialNo,Title,PICHidden",$Param,"b");
$PrdAmount=count($PrdRow);
?>
<script type="text/javascript">
	$(function(){
		var w = 0;
		var f = true;
		if ("<?=$PrdAmount?>" >= 3)
		{
			if ("<?=$PrdAmount?>" == 3){
				f=false;
			}
			$('#ProductCs').jCarouselLite({
				btnPrev: '#GoPrev',
				btnNext: '#GoNext',
				auto: 800,
				speed: 2000
			});
		}else{
			if ("<?=$PrdAmount?>" == 2){
				w = 615
			}else{
				w = 620
			}
			$(".carousel").css(
				{
					width:w
				}
			);
			
			$('#ProductCs').jCarouselLite({
				btnPrev: '#GoPrev',
				btnNext: '#GoNext',
				auto: false,
				visible: "<?=$PrdAmount?>",
				speed: 2000
			});
		}
				
	});
</script>
<?php
if($PrdAmount>3){
?>
<div class="carousel">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td align="left" valign="top" style="width:26px">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td style="height:37px">&nbsp;</td>
					</tr>
					<tr>
						<td><a href="#" class="prev" id="GoPrev"><img src="../images/pro_but_left.jpg" width="26" height="34" border="0" /></a></td>
					</tr>
					<tr>
						<td style="height:39px">&nbsp;</td>
					</tr>
				</table>
			</td>
			<td align="left" valign="top">
				<div class="jCarouselLite" id="ProductCs">
					<ul>
						<?php
							foreach($PrdRow as $Row){
							$SerialNo=$Row["SerialNo"];
							$Title=$Row["Title"];
							$PIC="../files/Product/ProductPIC/".$Row["PICHidden"];
						?>
								<li>
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td align="left" valign="top" style="border:solid 1px #0f65ad; width:180px"><a href="products_01.php?G0=<?php echo $SerialNo;?>"><img src="<?php echo $PIC;?>" width="180" height="101" border="0" /></a></td>
										</tr>
										<tr>
											<td align="center" valign="top" style="padding-top:10px"><?php echo $Title;?></td>
										</tr>
									</table>
								</li>
						<?php
							}
						?>
					</ul>
				</div>
			</td>
			<td align="left" valign="top" style="width:25px">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td style="height:37px">&nbsp;</td>
					</tr>
					<tr>
						<td><a href="#" class="next" id="GoNext"><img src="../images/pro_but_right.jpg" width="25" height="34" border="0" /></a></td>
					</tr>
					<tr>
						<td style="height:39px">&nbsp;</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</div>
<?php
}else{
?>
<div class="carousel">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td align="left" valign="top" style="width:26px">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td style="height:37px">&nbsp;</td>
					</tr>
					<tr>
						<td><img src="../images/pro_but_left.jpg" width="26" height="34" border="0" /></a></td>
					</tr>
					<tr>
						<td style="height:39px">&nbsp;</td>
					</tr>
				</table>
			</td>
			<td align="left" valign="top">
				<div class="jCarouselLite" id="ProductCs">
					<ul>
						<?php
							foreach($PrdRow as $Row){
							$SerialNo=$Row["SerialNo"];
							$Title=$Row["Title"];
							$PIC="../files/Product/ProductPIC/".$Row["PICHidden"];
						?>
								<li>
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td align="left" valign="top" style="border:solid 1px #0f65ad; width:180px"><a href="products_01.php?G0=<?php echo $SerialNo;?>"><img src="<?php echo $PIC;?>" width="180" height="101" border="0" /></a></td>
										</tr>
										<tr>
											<td align="center" valign="top" style="padding-top:10px"><?php echo $Title;?></td>
										</tr>
									</table>
								</li>
						<?php
							}
						?>
					</ul>
				</div>
			</td>
			<td align="left" valign="top" style="width:25px">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td style="height:37px">&nbsp;</td>
					</tr>
					<tr>
						<td><img src="../images/pro_but_right.jpg" width="25" height="34" border="0" /></a></td>
					</tr>
					<tr>
						<td style="height:39px">&nbsp;</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</div>
<?php
}
?>