<?php
	$PageSize = 5;
	$Page = CheckData($_REQUEST["Page"]);
	if($Page == ""){$Page = 1;}
	$Page = intval($Page);
	$SQL = "Select Count(*) As DataAmount From news where Status = '上架' and Lang='$lang'";
	$Rs = mysql_query($SQL,$Conn);
	$Row = mysql_fetch_array($Rs);
	$DataAmount = intval($Row["DataAmount"]);
	//計算分頁數量
	$PageAmount = NumHandle2($DataAmount,$PageSize) / $PageSize;
	//調整目前分頁
	if($Page > $PageAmount){$Page = $PageAmount;}
	if($Page < 1){$Page = 1;}
	$SQL = "Select * From news Where Status = '上架' and Lang='$lang' Order By Sort,PostDate DESC,SerialNo DESC limit ".(($Page-1) * $PageSize).",".$PageSize;
	$Rs = mysql_query($SQL,$Conn);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #D9D9D9">
				<tr>
					<td bgcolor="#FFFFFF" style="padding-top:10px" valign="top" height="530">
						<?php 
							if($DataAmount > 0){
						?>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<?php
								while($Row = mysql_fetch_array($Rs)){ 
									$SerialNo=$Row["SerialNo"];																						
									$PostDate=DateHandle($Row["PostDate"],"-");
									$Title=$Row["Title"];
									$Note=cutstr(ReplaceEditor2($Row["Note"]),370);
									$Url="news_main.php?Page=$Page&Sn=".$SerialNo;
									if($Row["PICHidden"]!=""){
										$Pic="../files/News/$lang/SmallPIC/".$Row["PICHidden"];
									}else{
										$Pic="";
									}
							?>
							<tr>
								<td align="center" style="border-bottom:1px solid #D9D9D9">
									<table width="94%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td height="28" align="left" class="text_05" style="border-bottom:1px solid #D9D9D9">
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td width="86%" class="text_05"><?php echo $Title?></td>
														<td width="14%" align="right" class="day_2"><?php echo $PostDate?></td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td style="padding:12px 0px 6px 0px;">
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<?php 	if($Pic!=""){?>
														<td width="21%" valign="top">
															<table width="100%" border="0" cellspacing="0" cellpadding="0">
																<tr>
																	<td><a href="<?php echo $Url?>"><img src="<?php echo $Pic?>" width="125" height="85" border="0" /></a></td>
																</tr>
																<tr>
																	<td><img src="images/02_news/img_02.jpg" width="125" height="11" /></td>
																</tr>
															</table>
														</td>
														<td width="3%">&nbsp;</td>
														<td width="76%" align="left" valign="top"><a href="<?php echo $Url?>"><?php echo $Note?></a></td>
														<?php	}else{?>
														<td width="100%" align="left" valign="top"><a href="<?php echo $Url?>"><?php echo $Note?></a></td>
														<?php	}?>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td height="40" align="right" valign="top">
												<a href="<?php echo $Url?>" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image17','','images/02_news/but_detail_o.jpg',1)"><img src="images/02_news/but_detail.jpg" name="Image17"  border="0" id="Image17" /></a>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<?php	}?>
						</table>
						<?php	}?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<?php include_once("../Common/PageBar/PageBar.php");?>
	<tr>
		<td height="35">&nbsp;</td>
	</tr>
</table>

