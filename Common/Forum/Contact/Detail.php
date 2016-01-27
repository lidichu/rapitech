<?php
	$TitleArray["Ch"]=Array("Text1"=>"電話","Text2"=>"傳真","Text3"=>"聯絡人","Text4"=>"e-mail","Text5"=>"網址");
	$TitleArray["En"]=Array("Text1"=>"Tel","Text2"=>"Fax","Text3"=>"Attn","Text4"=>"e-mail","Text5"=>"web");
	$TitleArray["Es"]=Array("Text1"=>"teléfono","Text2"=>"Fax","Text3"=>"Contacto","Text4"=>"e-mail","Text5"=>"web");
	$TitleArray["Ru"]=Array("Text1"=>"Tel","Text2"=>"Fax","Text3"=>"Attn","Text4"=>"e-mail","Text5"=>"web");
	$TitleArray["It"]=Array("Text1"=>"Tel","Text2"=>"Fax","Text3"=>"Attn","Text4"=>"e-mail","Text5"=>"web");
	$TitleArray["Fr"]=Array("Text1"=>"Tel","Text2"=>"Fax","Text3"=>"À l'attention de","Text4"=>"e-mail","Text5"=>"web");
?>	
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #D9D9D9">
	<tr>
		<td align="left" valign="top" bgcolor="#FFFFFF" >
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="5%" height="40" style="border-bottom:1px solid #D9D9D9">&nbsp;</td>
					<td width="95%" class="h1" style="border-bottom:1px solid #D9D9D9"><?php echo $CategoryTitle?></td>
				</tr>
				<tr>
					<td height="26">&nbsp;</td>
					<td height="26">
						<?php
							$Sql="select * from contact where Status='上架' and G0=$G0";
							$Rs=mysql_query($Sql,$Conn);
							if($Rs && mysql_num_rows($Rs)>0){
						?>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="50%" valign="top" style="padding-top:10px">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<?php
											while($Row=mysql_fetch_array($Rs)){
												$G1=$Row["SerialNo"];
												$Category2=$Row["Category2".$lang];
												$Url="contact2.php?G0=$G0&Sn=$G1";
												if($Sn==""){
													$Sn=$G1;
												}
												if(intval($Sn)==$G1){
													if($Row["PICHidden"]){
														$Pic="../files/Contact/".$Row["PICHidden"];
													}else{
														$Pic="";
													}
													$CategoryS=$Row["Category2".$lang];
													$CompName=$Row["CompName".$lang];
													$Tel=$Row["Tel".$lang];
													$Addr=$Row["Addr".$lang];
													$Fax=$Row["Fax".$lang];
													$ContName=$Row["ContName".$lang];
													$Email=$Row["Email".$lang];
													$WebUrl=$Row["WebUrl".$lang];
												}
										?>
										<tr>
											<td width="7%" height="26"><img src="images/02_news/img_06.jpg" width="16" height="16" /></td>
											<td width="93%" height="26" class="text_01"><a href="<?php echo $Url?>"><?php echo $Category2?></a></td>
										</tr>
										<?php
											}
										?>
									</table>
								</td>
								<td width="50%" style="padding:15px  25px 25px 0px;">
									<table width="100%" border="0" cellspacing="0" cellpadding="0" style=" border:3px solid #D9D9D9">
										<?php	if($Pic!=""){?>
										<tr>
											<td style="padding:4px" width="334" height="200"><img src="<?php echo $Pic?>"  /></td>
										</tr>
										<?php	}?>
										<tr>
											<td style="padding:10px">
												<?php	if($CategoryS!=""){?>
												<span class="title_01"><?php echo $CategoryS?></span><br />
												<?php	}?>
												<?php	if($CompName!=""){?>
												<span class="title_01"><?php echo $CompName?></span><br />
												<?php	}?>
												<?php	if($Addr!=""){?>
												<?php echo $Addr?><br />
												<?php	}?>
												<?php	if($Tel!=""){?>
												<?php echo $TitleArray[$lang]["Text1"]?>：<?php echo $Tel?><br />
												<?php	}?>
												<?php	if($Fax!=""){?>
												<?php echo $TitleArray[$lang]["Text2"]?>：<?php echo $Fax?><br />
												<?php	}?>
												<?php	if($ContName!=""){?>
												<?php echo $TitleArray[$lang]["Text3"]?>：<?php echo $ContName?><br />
												<?php	}?>
												<?php	if($Email!=""){?>
												<?php echo $TitleArray[$lang]["Text4"]?>：<a href="mailto:<?php echo $Email?>" target="_blank"><?php echo $Email?></a><br />
												<?php	}?>
												<?php	if($WebUrl!=""){?>
												<?php echo $TitleArray[$lang]["Text5"]?>：<a href="<?php echo $WebUrl?>" target="_blank"><?php echo $WebUrl?></a>
												<?php	}?>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
						<?php
							}
						?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<br>

