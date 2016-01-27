<?php	if($BackUrl!="" || $UpUrl!=""){?>
<tr>
	<td align="center" style="padding-top:15px">
		<?php	if($lang=="Ch"){?>
		<table  border="0" cellspacing="0" cellpadding="0">
			<tr>
				<?php 	if($BackUrl!=""){?>
				<td style="background-image:url(images/03_product/page_left.jpg); width:109px; height:27px; background-repeat:no-repeat">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="26">&nbsp;</td>
							<td width="111" align="left" class="page_01"><a href="<?php echo $BackUrl?>"><?php echo $TextArray[$lang]["Text5"]?></a></td>
						</tr>
					</table>
				</td>
				<?php	}?>
				<td width="15">&nbsp;</td>
				<?php 	if($UpUrl!=""){?>
				<td style="background-image:url(images/03_product/page_right.jpg); width:109px; height:27px; background-repeat:no-repeat">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="85" align="right" class="page_01"><a href="<?php echo $UpUrl?>"><?php echo $TextArray[$lang]["Text6"]?></a></td>
							<td width="40" align="left">&nbsp;</td>
						</tr>
					</table>
				</td>
				<?php	}?>
			</tr>
		</table>
		<?php	}else if($lang=="En"){?>
		<table  border="0" cellspacing="0" cellpadding="0">
			<tr>
				<?php 	if($BackUrl!=""){?>
				<td style="background-image:url(images/03_product/page_left.jpg); width:132px; height:27px; background-repeat:no-repeat">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="26">&nbsp;</td>
							<td width="111" align="left" class="page_01"><a href="<?php echo $BackUrl?>"><?php echo $TextArray[$lang]["Text5"]?></a></td>
						</tr>
					</table>
				</td>
				<?php	}?>
				<td width="15">&nbsp;</td>
				<?php 	if($UpUrl!=""){?>
				<td style="background-image:url(images/03_product/page_right.jpg); width:109px; height:27px; background-repeat:no-repeat">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="85" align="right" class="page_01"><a href="<?php echo $UpUrl?>"><?php echo $TextArray[$lang]["Text6"]?></a></td>
							<td width="40" align="left">&nbsp;</td>
						</tr>
					</table>
				</td>
				<?php	}?>
			</tr>
		</table>
		<?php	}else if($lang=="Es"){?>
		<table  border="0" cellspacing="0" cellpadding="0">
			<tr>
				<?php 	if($BackUrl!=""){?>
				<td width="150" style="background-image:url(images/03_product/page_left.jpg); width:132px; height:27px; background-repeat:no-repeat">
					<table width="140" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="26">&nbsp;</td>
							<td width="111" align="left" class="page_01"><a href="<?php echo $BackUrl?>"><?php echo $TextArray[$lang]["Text5"]?></a></td>
						</tr>
					</table>
				</td>
				<?php	}?>
				<td width="15">&nbsp;</td>
				<?php 	if($UpUrl!=""){?>
				<td width="145" style="background-image:url(images/03_product/page_right.jpg); width:145px; height:27px; background-repeat:no-repeat; background-position:right">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="119" align="right" class="page_01"><a href="<?php echo $UpUrl?>"><?php echo $TextArray[$lang]["Text6"]?></a></td>
							<td width="34" align="left">&nbsp;</td>
						</tr>
					</table>
				</td>
				<?php	}?>
			</tr>
		</table>
		<?php	}else if($lang=="Ru"){?>
		<table  border="0" cellspacing="0" cellpadding="0">
			<tr>
				<?php 	if($BackUrl!=""){?>
				<td width="151" style="background-image:url(images/03_product/page_left.jpg); width:150px; height:27px; background-repeat:no-repeat">
					<table width="145" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="22">&nbsp;</td>
							<td width="118" align="left" class="page_01"><a href="<?php echo $BackUrl?>"><?php echo $TextArray[$lang]["Text5"]?></a></td>
						</tr>
					</table>
				</td>
				<?php	}?>
				<td width="15">&nbsp;</td>
				<?php 	if($UpUrl!=""){?>
				<td width="149" style="background-image:url(images/03_product/page_right.jpg); width:145px; height:27px; background-repeat:no-repeat">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="121" align="right" class="page_01"><a href="<?php echo $UpUrl?>"><?php echo $TextArray[$lang]["Text6"]?></a></td>
							<td width="32" align="left">&nbsp;</td>
						</tr>
					</table>
				</td>
				<?php	}?>
			</tr>
		</table>
		<?php	}else if($lang=="It"){?>
		<table  border="0" cellspacing="0" cellpadding="0">
			<tr>
				<?php 	if($BackUrl!=""){?>
				<td width="150" style="background-image:url(images/03_product/page_left.jpg); width:132px; height:27px; background-repeat:no-repeat">
					<table width="140" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="21">&nbsp;</td>
							<td width="114" align="left" class="page_01"><a href="<?php echo $BackUrl?>"><?php echo $TextArray[$lang]["Text5"]?></a></td>
						</tr>
					</table>
				</td>
				<?php	}?>
				<td width="15">&nbsp;</td>
				<?php 	if($UpUrl!=""){?>
				<td width="145" style="background-image:url(images/03_product/page_right.jpg); width:145px; height:27px; background-repeat:no-repeat; background-position:right">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="129" align="right" class="page_01"><a href="<?php echo $UpUrl?>"><?php echo $TextArray[$lang]["Text6"]?></a></td>
							<td width="24" align="left">&nbsp;</td>
						</tr>
					</table>
				</td>
				<?php	}?>
			</tr>
		</table>
		<?php	}else if($lang=="Fr"){?>
		<table  border="0" cellspacing="0" cellpadding="0">
			<tr>
				<?php 	if($BackUrl!=""){?>
				<td style="background-image:url(images/03_product/page_left.jpg); width:132px; height:27px; background-repeat:no-repeat">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="21">&nbsp;</td>
							<td width="115" align="left" class="page_01"><a href="<?php echo $BackUrl?>"><?php echo $TextArray[$lang]["Text5"]?></a></td>
						</tr>
					</table>
				</td>
				<?php	}?>
				<td width="15">&nbsp;</td>
				<?php 	if($UpUrl!=""){?>
				<td style="background-image:url(images/03_product/page_right.jpg); width:115px; height:27px; background-repeat:no-repeat;">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="87" align="right" class="page_01"><a href="<?php echo $UpUrl?>"><?php echo $TextArray[$lang]["Text6"]?></a></td>
							<td width="27" align="left">&nbsp;</td>
						</tr>
					</table>
				</td>
				<?php	}?>
			</tr>
		</table>
		<?php	}?>
	</td>
</tr>
<?php	}?>

