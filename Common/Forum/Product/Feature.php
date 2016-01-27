<?php
	$Sql="select * from product where Status='上架' and SerialNo=$Sn ";
	$Rs=mysql_query($Sql,$Conn);
	if($Rs && mysql_num_rows($Rs)>0){
		$Row=mysql_fetch_array($Rs);
		if($Row["PICHidden"]!=""){
			$Pic="../files/Product/$lang/Cha/".$Row["PICHidden"];
		}else{
			$Pic="";
		}
		$Note=ReplaceEditor($Row["Note"]);
	}

	$TitleArray["Ch"]=Array("Text1"=>"特色","Text2"=>"規格","Text3"=>"使用方法");
	$TitleArray["En"]=Array("Text1"=>"Feature","Text2"=>"Specifications","Text3"=>"Operating Instructions");
	$TitleArray["Es"]=Array("Text1"=>"Características","Text2"=>"Especificaciones","Text3"=>"Instrucciones de uso");
	$TitleArray["Ru"]=Array("Text1"=>"Характеристики","Text2"=>"Спецификация","Text3"=>"Инструкция по эксплуатации");
	$TitleArray["It"]=Array("Text1"=>"Caratteristiche","Text2"=>"Specifiche","Text3"=>"Istruzioni per l'uso");
	$TitleArray["Fr"]=Array("Text1"=>"Caractéristiques","Text2"=>"Spécifications","Text3"=>"Mode d'emploi");	
	$UrlValue="G0=$G0&Sn=$Sn";	
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td align="left" class="title_01" style="padding: 5px 0px 15px 0px;"><?php echo $PrdTitle?></td>
	</tr>
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td align="center" class="h3" style="background-image:url(images/03_product/but_01_o.jpg); width:177px; height:29px; background-repeat:no-repeat"><a href="product_feature.php?<?php echo $UrlValue?>"><?php echo $TitleArray[$lang]["Text1"]?></a></td>
								<td align="center" class="h3" style="background-image:url(images/03_product/but_02.jpg); width:198px; height:29px; background-repeat:no-repeat"><a href="product_specifications.php?<?php echo $UrlValue?>"><?php echo $TitleArray[$lang]["Text2"]?></a></td>
								<td align="center" class="h3" style="background-image:url(images/03_product/but_03.jpg); width:273px; height:29px; background-repeat:no-repeat"><a href="product_operating.php?<?php echo $UrlValue?>"><?php echo $TitleArray[$lang]["Text3"]?></a></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td bgcolor="#FFFFFF" style="border:1px solid #D9D9D9; padding:14px 18px ">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<?php	if($Pic!=""){?>
							<tr>
								<td align="center" width="600"><img src="<?php echo $Pic?>" /></td>
							</tr>
							<?php	}?>
							<tr>
								<td align="right">
									<a href="product_specifications.php?<?php echo $UrlValue?>" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image34','','images/03_product/but_product_o.jpg',1)"><img src="images/03_product/but_product.jpg" name="Image34" border="0" id="Image34" /></a>
								</td>
							</tr>
							<?php
								$Sql="select * from productchara where Status='上架' and G2=$Sn ";
								$Rs=mysql_query($Sql,$Conn);
								if($Rs && mysql_num_rows($Rs)>0){
							?>
							<tr>
								<td style="border-bottom:1px solid #CCC">&nbsp;</td>
							</tr>
							<tr>
								<td>
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<?php
											while($Row=mysql_fetch_array($Rs)){
												$Title=$Row["Title"];
												$CharaNote=$Row["Note"];
										?>
										<tr>
											<td style="padding-top:14px">
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td width="4%" align="center" style="padding-bottom:4px;"><img src="images/03_product/img_02.jpg" width="10" height="10" /></td>
														<td width="96%" class="title_03"><?php echo $Title?></td>
													</tr>
													<tr>
														<td>&nbsp;</td>
														<td><?php echo $CharaNote?></td>
													</tr>
												</table>
											</td>
										</tr>
										<?php
											}
										?>
									</table>
								</td>
							</tr>
							<?php
								}
							?>
							<?php
								if($Note!=""){
							?>
							<tr>
								<td style="border-bottom:1px solid #CCC">&nbsp;</td>
							</tr>
							<tr>
								<td align="left" valign="top" style="padding:14px 0px">
									<?php	echo $Note?>
								</td>
							</tr>
							<?php
								}
							?>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td height="40">&nbsp;</td>
	</tr>
</table>

