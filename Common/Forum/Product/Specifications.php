<?php
	$PageSize = 5;
	$Page = CheckData($_REQUEST["Page"]);
	if($Page == ""){$Page = 1;}
	$Page = intval($Page);
	
	$Sql="select * from product where Status='上架' and SerialNo=$Sn ";
	$Rs=mysql_query($Sql,$Conn);
	if($Rs && mysql_num_rows($Rs)>0){
		$Row=mysql_fetch_array($Rs);
		$Sort=$Row["Sort"];
	}
	//網址列資料	
	$BackValue="Page=$Page&G0=$G0";
	$UrlValue="G0=$G0&Sn=$Sn";		
	//檢查是否有上一項
	$BackUrl = "";
	$Sql="SELECT SerialNo,Sort FROM product where Status='上架' and G1=$G0 and SerialNo > $Sn and Sort = $Sort order by SerialNo ASC limit 0,1  ";
	$Rs = mysql_query($Sql,$Conn);
	if($Rs && mysql_num_rows($Rs) > 0){
		$Row=mysql_fetch_array($Rs);
		if($Row["SerialNo"] > $Sn){
			$BackUrl="product_specifications.php?".$BackValue."&Sn=".$Row[0];
		}
	}
	if($BackUrl == ""){
		$Sql="SELECT SerialNo,Sort FROM product where Status='上架' and G1=$G0 and SerialNo!=$Sn and Sort < $Sort order by Sort DESC, SerialNo ASC limit 1  ";
		$Rs = mysql_query($Sql,$Conn);
		if($Rs && mysql_num_rows($Rs) > 0){
			$Row=mysql_fetch_array($Rs);
			$BackUrl="product_specifications.php?".$BackValue."&Sn=".$Row[0];
		}
	}
	

	//檢查是否有下一項
	$UpUrl = "";
	$Sql="SELECT SerialNo,Sort FROM product where Status='上架' and G1=$G0 and SerialNo < $Sn and Sort = $Sort order by SerialNo DESC limit 1  ";
	$Rs = mysql_query($Sql,$Conn);
	if($Rs && mysql_num_rows($Rs) > 0){
		$Row=mysql_fetch_array($Rs);
		$UpUrl="product_specifications.php?".$BackValue."&Sn=".$Row[0];
	}
	if($UpUrl == ""){
		$Sql="SELECT SerialNo,Sort FROM product where Status='上架' and G1=$G0 and SerialNo!=$Sn and Sort > $Sort order by Sort ASC, SerialNo DESC limit 1  ";
		$Rs = mysql_query($Sql,$Conn);
		if($Rs && mysql_num_rows($Rs) > 0){
			$Row=mysql_fetch_array($Rs);
			$UpUrl="product_specifications.php?".$BackValue."&Sn=".$Row[0];
		}
	}		
	$OtherQuery="G0=G0&Sn=$Sn";
	
	$SQL = "Select Count(*) As DataAmount From productspecification where Status = '上架' and G2='$Sn'";
	$Rs = mysql_query($SQL,$Conn);
	$Row = mysql_fetch_array($Rs);
	$DataAmount = intval($Row["DataAmount"]);
	//計算分頁數量
	$PageAmount = NumHandle2($DataAmount,$PageSize) / $PageSize;
	//調整目前分頁
	if($Page > $PageAmount){$Page = $PageAmount;}
	if($Page < 1){$Page = 1;}
	$SQL = "Select * From productspecification Where Status = '上架'  and G2='$Sn' Order By Sort,SerialNo DESC limit ".(($Page-1) * $PageSize).",".$PageSize;
	$Rs = mysql_query($SQL,$Conn);
	$TitleArray["Ch"]=Array("Text1"=>"特色","Text2"=>"規格","Text3"=>"使用方法");
	$TitleArray["En"]=Array("Text1"=>"Feature","Text2"=>"Specifications","Text3"=>"Operating Instructions");
	$TitleArray["Es"]=Array("Text1"=>"Características","Text2"=>"Especificaciones","Text3"=>"Instrucciones de uso");
	$TitleArray["Ru"]=Array("Text1"=>"Характеристики","Text2"=>"Спецификация","Text3"=>"Инструкция по эксплуатации");
	$TitleArray["It"]=Array("Text1"=>"Caratteristiche","Text2"=>"Specifiche","Text3"=>"Istruzioni per l'uso");
	$TitleArray["Fr"]=Array("Text1"=>"Caractéristiques","Text2"=>"Spécifications","Text3"=>"Mode d'emploi");	

	$TextArray["Ch"]=Array("Text1"=>"尺寸","Text2"=>"印台","Text3"=>"包裝","Text4"=>"註記","Text5"=>"上一個產品","Text6"=>"下一個產品");
	$TextArray["En"]=Array("Text1"=>"Size","Text2"=>"Pad","Text3"=>"Packing","Text4"=>"Remark","Text5"=>"Previous Product","Text6"=>"Next Product");
	$TextArray["Es"]=Array("Text1"=>"Tamaño","Text2"=>"almohadilla","Text3"=>"embalaje","Text4"=>"observación","Text5"=>"Product Anterior","Text6"=>"Product Siguiente");
	$TextArray["Ru"]=Array("Text1"=>"Размер","Text2"=>"подушка","Text3"=>"упаковка","Text4"=>"примечание","Text5"=>"предыдущий продукт","Text6"=>"следующий продукт");
	$TextArray["It"]=Array("Text1"=>"Misura","Text2"=>"Cuscinetto","Text3"=>"Imballaggio","Text4"=>"Osservazioni","Text5"=>"Prodotto Precedente","Text6"=>"Prodotto Successivo");
	$TextArray["Fr"]=Array("Text1"=>"Dimension","Text2"=>"Surface","Text3"=>"Emballage","Text4"=>"Remarques","Text5"=>"Produit précédent","Text6"=>"Produit suivant");
?>
<script type="text/javascript">
$(function(){
	$(".lightbox").lightBox();
});
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td align="left" class="title_01" style="padding: 5px 0px 15px 0px;"><?php echo $PrdTitle?></td>
	</tr>
	<tr>
		<td valign="top">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td align="center" class="h3" style="background-image:url(images/03_product/but_01.jpg); width:177px; height:29px; background-repeat:no-repeat"><a href="product_feature.php?<?php echo $UrlValue?>"><?php echo $TitleArray[$lang]["Text1"]?></a></td>
								<td align="center" class="h3" style="background-image:url(images/03_product/but_02_o.jpg); width:198px; height:29px; background-repeat:no-repeat"><a href="product_specifications.php?<?php echo $UrlValue?>"><?php echo $TitleArray[$lang]["Text2"]?></a></td>
								<td align="center" class="h3" style="background-image:url(images/03_product/but_03.jpg); width:273px; height:29px; background-repeat:no-repeat"><a href="product_operating.php?<?php echo $UrlValue?>"><?php echo $TitleArray[$lang]["Text3"]?></a></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td valign="top" bgcolor="#FFFFFF" style="border:1px solid #D9D9D9; padding:16px 10px " height="33">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<?php 
								if($DataAmount > 0){
									while($Row = mysql_fetch_array($Rs)){ 
										$G3=$Row["SerialNo"];
										$Title=$Row["Title"];
										$Size=$Row["Size"];
										$Note=$Row["Note"];
										$Package=$Row["Package"];
										$PackageArray=explode(",",$Package);
										$Stamp=$Row["Stamp"];
										$StampArray=explode(",",$Stamp);
										if($Row["PICHidden"]!=""){
											$Pic="../files/Product/$lang/PIC/".$Row["PICHidden"];
											$BigPic="../files/Product/$lang/Big/".$Row["PICHidden"];
										}else{
											$Pic="";
											$BigPic="";
										}
										if($Row["FacePICHidden"]!=""){
											$FacePic="../files/Product/$lang/Face/".$Row["FacePICHidden"];
										}else{
											$FacePic="";
										}
							?>
							<tr>
								<td style="padding-bottom:8px">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td height="32" colspan="3" align="left" class="title_01" style="padding-left:10px;background-image:url(images/03_product/img_04.jpg); width:625px; height:32px; background-repeat:no-repeat"><?php echo $Title?></td>
										</tr>
										<tr>
											<td width="25%" align="left" valign="top" style="padding:5px;" width="146" height="153">
												<?php	if($Pic!=""){?>
												<a class="lightbox" href="<?php echo $BigPic?>" target="_blank">
												<img src="<?php echo $Pic?>"  border="0" /></a>
												<?php	}?>
											</td>
											<td width="38%" align="center" valign="top" style="padding:10px 5px 5px 5px;">
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<?php	if($FacePic!=""){?>
													<tr>
														<td align="left">
															<img src="<?php echo $FacePic?>"  />
														</td>
													</tr>
													<?php	}?>
													<?php
														$Sql2="select * from productpic where Status='上架' and G3=$G3 order by Sort,SerialNo desc";
														$Rs2=mysql_query($Sql2,$Conn);
														if($Rs2 && mysql_num_rows($Rs2)>0){
															$Row2=mysql_fetch_array($Rs2);
															
													?>
													<tr>
														<td style="padding-top:20px">
															<table width="100%" border="0" cellspacing="4" cellpadding="0">
																<?php
																	while($Row2){
																?>	
																<tr>
																	<?php	
																			for($i=1;$i<=4;$i++){
																				if($Row2){
																					$SmallPic="../files/Product/$lang/Small/".$Row2["PICHidden"];
																	?>
																	<td align="center" width="50"><img border="0" src="<?php echo $SmallPic?>"/></td>
																	<?php 		
																					$Row2=mysql_fetch_array($Rs2);
																				}else{
																	?>
																	<td align="center" width="50">&nbsp;</td>
																	<?php
																				}
																			}	
																	?>
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
												</table>
											</td>
											<td width="37%" valign="top" style="padding:5px;">
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td colspan="2" align="left" valign="top" class="title_03" style="border-bottom:1px dotted #CCC; padding:5px 0px"><?php echo $Title?></td>
													</tr>
													<tr>
														<td width="19%" align="left" valign="top" style="border-bottom:1px dotted #CCC; padding:5px 0px"><?php echo $TextArray[$lang]["Text1"]?>：</td>
														<td width="81%" style="border-bottom:1px dotted #CCC; padding:5px 0px"><?php echo $Size?></td>
													</tr>

													<tr>
														<td align="left" style="border-bottom:1px dotted #CCC; padding:5px 0px" valign="top"><?php echo $TextArray[$lang]["Text2"]?>：</td>
														<td style="border-bottom:1px dotted #CCC; padding:5px 0px">
															<table width="100%" border="0" cellspacing="0" cellpadding="0">
																<?php
																	for($i=1;$i<count($StampArray)-1;$i+=2){
																?>
																<tr>
																	<?php
																		
																		for($j=0;$j<2;$j++){
																			$temp+=1;
																			if($StampArray[$i+$j]!=""){
																				$Sql="select * from stamp where SerialNo=".$StampArray[$i+$j];
																				$Rs2=mysql_query($Sql,$Conn);
																				$Row2=mysql_fetch_array($Rs2);
																				$Title=$Row2["Title"];
																				$Pic="../files/Product/Stamp/".$Row2["PICHidden"];	
																	?>
																	<td ><?php	echo $Title?>&nbsp;&nbsp;<img src="<?php echo $Pic?>"  /></td>
																	<?php	
			
																			}else{

																	?>
																	<td width="30">&nbsp;</td>
																	<?php
																			}																	
																		}
																	?>
																</tr>
																<?php
																	}
																?>
															</table>
														</td>
													</tr>
													<tr>
														<td align="left" valign="top" style="border-bottom:1px dotted #CCC; padding:5px 0px"><?php echo $TextArray[$lang]["Text3"]?>：</td>
														<td style="border-bottom:1px dotted #CCC; padding:5px 0px" width="35" height="39" >
															<?php
																	for($i=1;$i<count($PackageArray)-1;$i++){
																		if($PackageArray[$i]!=""){
																				$Sql="select * from package where SerialNo=".$PackageArray[$i];
																				$Rs2=mysql_query($Sql,$Conn);
																				$Row2=mysql_fetch_array($Rs2);
																				$Pic="../files/Product/Package/".$Row2["PICHidden"];	
															?>
															<img src="<?php echo $Pic?>"  />
															<?php
																		}
																	}
															?>
														</td>
													</tr>
													
													<tr>
														<td align="left" valign="top" style="padding:5px 0px"><?php echo $TextArray[$lang]["Text4"]?>：</td>
														<td style="padding:5px 0px"><?php echo $Note?></td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<?php
									}
								}
							?>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<?php include_once("../Common/PageBar/PageBar.php");?>
	<?php include_once("../Common/Forum/Product/PageMenu.php");?>
	<tr>
		<td height="40">&nbsp;</td>
	</tr>
</table>

