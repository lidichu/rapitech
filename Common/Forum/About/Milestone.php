<?php
	$TitleArray["Ch"]=Array("Top"=>"歷史與里程碑","Footer"=>"Shiny目前在全世界71個國家有獨家代理，並在109個國家販售。");
	$TitleArray["En"]=Array("Top"=>"HISTORY AND MILESTONE","Footer"=>"Shiny now works with exclusive agents in 71 countries and has been selling to 109 countries. ");
	$TitleArray["Es"]=Array("Top"=>"HISTORIA E HITOS","Footer"=>"Shiny trabaja con distribuidores exclusivos en 71 países y vende en 109 países.");
	$TitleArray["Ru"]=Array("Top"=>"История и вехи","Footer"=>"Сейчас Шайни работает с эксклюзивными представителями  в 71 стране и продает свою <br />продукцию  в 109 странах мира.");
	$TitleArray["It"]=Array("Top"=>"STORIA E TAPPE FONDAMENTALI","Footer"=>"Oggi  Shiny lavora con agenti esclusivisti in 71 paesi e vende in 109 paesi.");
	$TitleArray["Fr"]=Array("Top"=>"Histoire et Evènements importants","Footer"=>"SHINY travaille alors avec 71 agents exclusifs qui vendent dans 109 pays.");
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td class="title_01" style="padding: 5px 0px 15px 0px"><?php echo $MainTitle?></td>
	</tr>
	<tr>
		<td valign="top">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td align="left" valign="top" bgcolor="#383838" class="h2" style="padding-left:6px;"><?php echo $TitleArray["$lang"]["Top"]?></td>
				</tr>
				<?php
					$Sql="select * from milestonecategory where Status='上架' order by Sort,SerialNo Desc";
					$Rs=mysql_query($Sql,$Conn);
					if($Rs && mysql_num_rows($Rs)>0){
						$Row=mysql_fetch_array($Rs);
						$Change=false;
						while($Row){
							$Change=!$Change;
							$Title=$Row["Title"];
							$BackPic="../files/Milestone/".$Row["PICHidden"];
							$G0=$Row["SerialNo"];
				?>
				<tr>
					<td align="left" height="320" valign="top" style="background-image:url(<?php echo $BackPic?>);  padding-bottom:4px; background-repeat:no-repeat;">
						<?php	if($Change){?>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td>&nbsp;</td>
								<td width="97%" class="title_02" style="padding:25px 0px 20px 0px;"><?php echo $Title?></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td style="padding-right:194px">
									<?php
										$Sql="select * from milestone where Status='上架' and G0=$G0 order by Sort,SerialNo desc";
										$Rs2=mysql_query($Sql,$Conn);
										if($Rs2 && mysql_num_rows($Rs2)>0){
									?>
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<?php
											while($Row2=mysql_fetch_array($Rs2)){
												$YearTitle=$Row2["YearTitle"];
												$Note=$Row2["Note".$lang];
										?>
										<tr>
											<td width="10%" valign="top" class="h1"><?php echo $YearTitle?></td>
											<td width="90%" class="text_01"><?php echo $Note?><br /><br /></td>
										</tr>
										<?php
											}
										?>
									</table>
									<?php
										}
									?>
								</td>
							</tr>
						</table>
						<?php	}else{?>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="28%" class="title_02">&nbsp;</td>
								<td width="72%" class="title_02" style="padding:20px 0px 22px 0px;"><?php echo $Title?></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td valign="top">
									<?php
										$Sql="select * from milestone where Status='上架' and G0=$G0 order by Sort,SerialNo desc";
										$Rs2=mysql_query($Sql,$Conn);
										if($Rs2 && mysql_num_rows($Rs2)>0){
									?>
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<?php
											while($Row2=mysql_fetch_array($Rs2)){
												$YearTitle=$Row2["YearTitle"];
												$Note=$Row2["Note".$lang];
										?>
										<tr>
											<td width="10%" valign="top" class="h1"><?php echo $YearTitle?></td>
											<td width="90%" class="text_01"><?php echo $Note?><br /><br /></td>
										</tr>
										<?php
											}
										?>
									</table>
									<?php
										}
									?>
								</td>
							</tr>
						</table>
						<?php	}?>
					</td>
				</tr>
				<?php
							if($Row=mysql_fetch_array($Rs)){
				?>
				<tr>
					<td align="left" valign="top" style="border-top:1px dotted #999">&nbsp;</td>
				</tr>
				<?php
							}
						}	
					}
				?>
			</table>
		</td>
	</tr>
	<tr>
		<td height="40" align="center" bgcolor="#383838" class="text_02"><?php echo $TitleArray[$lang]["Footer"]?><br /></td>
	</tr>
	<tr>
		<td height="40">&nbsp;</td>
	</tr>
</table>

