<?php
	$TitleArray["Ch"]=Array("MTitle1"=>"首頁",	"MTitle2"=>"公司簡介","MTitle3"=>"最新消息","MTitle4"=>"產品介紹","MTitle5"=>"下載專區","MTitle6"=>"聯絡我們");
	$TitleArray["En"]=Array("MTitle1"=>"Index",	"MTitle2"=>"Company","MTitle3"=>"News","MTitle4"=>"Product","MTitle5"=>"Download","MTitle6"=>"Contact");
	$TitleArray["Es"]=Array("MTitle1"=>"Indice",	"MTitle2"=>"Empresa","MTitle3"=>"Noticias","MTitle4"=>"Noticias","MTitle5"=>"Descargar","MTitle6"=>"Contacto");
	$TitleArray["Ru"]=Array("MTitle1"=>"Индекс",	"MTitle2"=>"Компания","MTitle3"=>"Новости","MTitle4"=>"Продукт","MTitle5"=>"Загрузить","MTitle6"=>"Контакты");
	$TitleArray["It"]=Array("MTitle1"=>"Indice",	"MTitle2"=>"Società","MTitle3"=>"Novità","MTitle4"=>"Prodoctto","MTitle5"=>"Download","MTitle6"=>"Contatti");
	$TitleArray["Fr"]=Array("MTitle1"=>"Index",	"MTitle2"=>"T M P","MTitle3"=>"Nouveautés","MTitle4"=>"Produit","MTitle5"=>"Téléchargement","MTitle6"=>"Contact");
	$LeftTitle["Ch"]=Array("Left1"=>"關於三勝","Left2"=>"里程碑","Left3"	=>"環保政策");
	$LeftTitle["En"]=Array("Left1"=>"About ShinyStamp","Left2"=>"Milestone","Left3"	=>"Eco Policy");
	$LeftTitle["Es"]=Array("Left1"=>"Sobre Shiny Stamp","Left2"=>"Hitos","Left3"	=>"Política medioambiental");
	$LeftTitle["Ru"]=Array("Left1"=>"История","Left2"=>"веха","Left3"	=>"ЭКО линия");
	$LeftTitle["It"]=Array("Left1"=>"I timbri Shiny","Left2"=>"Tappe","Left3"	=>"Politica ecologica");
	$LeftTitle["Fr"]=Array("Left1"=>"A propos de SHINY","Left2"=>"Evènements importants","Left3"	=>"Politique Ecologique");

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td >
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td align="left" valign="top" style="padding:20px 30px">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td height="21" align="left" style="background-image:url(images/06_sitemap/h6.jpg); background-repeat:no-repeat; height:54px; border-bottom:3px solid #fff">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td width="27%">&nbsp;</td>
											<td width="73%" class="title_01"><a href="index.php"><?php echo $TitleArray[$lang]["MTitle1"]?></a></td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td width="33%" style="padding-top:10px; border-top:1px solid #CCC">&nbsp;</td>
							</tr>
						</table>
					</td>
					<td width="33%" align="left" valign="top" style="padding:20px 30px">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td height="21" align="left" style="background-image:url(images/06_sitemap/h1.jpg); background-repeat:no-repeat; height:54px; border-bottom:3px solid #fff">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td width="28%">&nbsp;</td>
											<td width="72%" class="title_01"><a href="about.php"><?php echo $TitleArray[$lang]["MTitle2"]?></a></td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td width="33%" style="padding-top:10px; border-top:1px solid #CCC">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td width="26%" height="24" align="right" style="padding-right:6px"><img src="images/00/img_02.jpg" width="9" height="9" /></td>
											<td width="74%" height="24" align="left" class="text_01"><a href="about.php"><?php echo $LeftTitle[$lang]["Left1"]?></a></td>
										</tr>
										<tr>
											<td height="24" align="right" style="padding-right:6px"><img src="images/00/img_02.jpg" width="9" height="9" /></td>
											<td height="24" align="left" class="text_01"><a href="milestone.php"><?php echo $LeftTitle[$lang]["Left2"]?></a></td>
										</tr>
										<tr>
											<td height="24" align="right" style="padding-right:6px"><img src="images/00/img_02.jpg" width="9" height="9" /></td>
											<td height="24" align="left" class="text_01"><a href="policy.php"><?php echo $LeftTitle[$lang]["Left3"]?></a></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
					<td width="33%" align="left" valign="top" style="padding:20px 30px">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td height="21" align="left" style="background-image:url(images/06_sitemap/h2.jpg); background-repeat:no-repeat; height:54px; border-bottom:3px solid #fff">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td width="28%">&nbsp;</td>
											<td width="72%" class="title_01"><a href="news_list.php"><?php echo $TitleArray[$lang]["MTitle3"]?></a></td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td style="padding-top:10px;padding-left:20px; border-top:1px solid #CCC">
								<?php 
									$Sql="select * from news where Status='上架' and Lang='$lang' order by Sort,PostDate desc,SerialNo desc limit 3";
									$Rs=mysql_query($Sql,$Conn);
									if($Rs && mysql_num_rows($Rs)>0){
										while($Row=mysql_fetch_array($Rs)){
											echo "<a href='news_main.php?Sn=".$Row["SerialNo"]."'>".Div_limit($Row["Title"],200)."</a>";
										}	
									}	
								?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td valign="top" style="padding:20px 30px">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td height="21" align="left" style="background-image:url(images/06_sitemap/h3.jpg); background-repeat:no-repeat; height:54px; border-bottom:3px solid #fff">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td width="27%">&nbsp;</td>
											<td width="73%" class="title_01"><a href="product_list.php"><?php echo $TitleArray[$lang]["MTitle4"]?></a></td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td valign="top" style="padding-top:10px; border-top:1px solid #CCC">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<?php 
											$Sql="select * from productcategory where Status='上架' and Lang='$lang' order by Sort,SerialNo desc ";
											$Rs=mysql_query($Sql,$Conn);
											if($Rs && mysql_num_rows($Rs)>0){
												while($Row=mysql_fetch_array($Rs)){
													$G0=$Row["SerialNo"];
													$Category=$Row["Category"];
													$Url="product_feature.php?G0=$G0";
										?>
										<tr>
											<td width="15%">&nbsp;</td>
											<td width="85%" height="28" class="text_07"><a href="<?php echo $Url?>"><?php echo $Category?></a></td>
										</tr>
										<?php
													$Sql2="select * from product where Status='上架' and G1=$G0 order by Sort,SerialNo desc";
													$Rs2=mysql_query($Sql2,$Conn);
													if($Rs2 && mysql_num_rows($Rs2)>0){
										?>
										<tr>
											<td>&nbsp;</td>
											<td>
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<?php
														while($Row2=mysql_fetch_array($Rs2)){
															$PrdName=$Row2["PrdName"];
															$Sn=$Row2["SerialNo"];
															$Url2="product_feature.php?G0=$G0&Sn=$Sn";
													?>
													<tr>
														<td width="13%" height="24" align="right" style="padding-right:6px"><img src="images/00/img_02.jpg" width="9" height="9" /></td>
														<td width="87%" height="24" align="left" class="text_01"><a href="<?php echo $Url2?>"><?php echo $PrdName?></a></td>
													</tr>
													<?php
														}
													?>
												</table>
											</td>
										</tr>
										<?php
													}
												}
											}
										?>
									</table>
								</td>
							</tr>
						</table>
					</td>
					<td valign="top" style="padding:20px 30px">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
							</tr>
							<tr>
								<td height="21" align="left" style="background-image:url(images/06_sitemap/h4.jpg); background-repeat:no-repeat; height:54px; border-bottom:3px solid #fff">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td width="28%">&nbsp;</td>
											<td width="72%" class="title_01"><a href="download.php"><?php echo $TitleArray[$lang]["MTitle5"]?></a></td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td width="33%" style="padding-top:10px;border-top:1px solid #CCC">&nbsp;</td>
							</tr>
						</table>
					</td>
					<td valign="top" style="padding:20px 30px">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td height="21" align="left" style="background-image:url(images/06_sitemap/h5.jpg); background-repeat:no-repeat; height:54px; border-bottom:3px solid #fff">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td width="28%">&nbsp;</td>
											<td width="72%" class="title_01"><a href="contact.php"><?php echo $TitleArray[$lang]["MTitle6"]?></a></td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td width="33%" style="padding-top:10px;padding-left:20px; border-top:1px solid #CCC">
								<?php 
									$Sql="select * from contactcategory where Status='上架' order by Sort,SerialNo desc";
									$Rs=mysql_query($Sql,$Conn);
									if($Rs && mysql_num_rows($Rs)>0){
										while($Row=mysql_fetch_array($Rs)){
											echo "<a href='contact2.php?G0=".$Row["SerialNo"]."'>".$Row["Category".$lang]."</a><br>";
										}	
									}	
								?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td height="35">&nbsp;</td>
	</tr>
</table>

