<?php
	$LeftTitle["Ch"]=Array("Left1"=>"關於三勝","Left2"=>"里程碑","Left3"	=>"環保政策");
	$LeftTitle["En"]=Array("Left1"=>"About ShinyStamp","Left2"=>"Milestone","Left3"	=>"Eco Policy");
	$LeftTitle["Es"]=Array("Left1"=>"Sobre Shiny Stamp","Left2"=>"Hitos","Left3"	=>"Política medioambiental");
	$LeftTitle["Ru"]=Array("Left1"=>"История","Left2"=>"веха","Left3"	=>"ЭКО линия");
	$LeftTitle["It"]=Array("Left1"=>"I timbri Shiny","Left2"=>"Tappe","Left3"	=>"Politica ecologica");
	$LeftTitle["Fr"]=Array("Left1"=>"A propos de SHINY","Left2"=>"Evènements importants","Left3"	=>"Politique Ecologique");
?>
<td width="30%" align="left" valign="top">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td><img src="images/01_company/title.jpg" width="304" height="64" /></td>
					</tr>
					<tr>
						<td style="padding:5px 20px 35px 35px">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<?php
									if($Left=="about"){
										$ClassName1="menu_02";
										$ClassName2="menu_01";
										$ClassName3="menu_01";
									}else if($Left=="milestone"){
										$ClassName1="menu_01";
										$ClassName2="menu_02";
										$ClassName3="menu_01";
									}
									else if($Left=="policy"){
										$ClassName1="menu_01";
										$ClassName2="menu_01";
										$ClassName3="menu_02";
									}
								?>
								<tr>
									<td width="8%" height="33" align="center" style="border-bottom:1px solid #CCC"><img src="images/00/img_01.jpg" width="10" height="11" /></td>
									<td width="92%" height="33" class="<?php echo $ClassName1?>" style="border-bottom:1px solid #CCC"><a href="about.php"><?php echo $LeftTitle[$lang]["Left1"];?></a></td>
								</tr>
								<tr>
									<td height="33" align="center" style="border-bottom:1px solid #CCC"><img src="images/00/img_01.jpg" width="10" height="11" /></td>
									<td height="33" class="<?php echo $ClassName2?>" style="border-bottom:1px solid #CCC"><a href="milestone.php"><?php echo $LeftTitle[$lang]["Left2"];?></a></td>
								</tr>
								<tr>
									<td height="33" align="center" style="border-bottom:1px solid #CCC"><img src="images/00/img_01.jpg" width="10" height="11" /></td>
									<td height="33" class="<?php echo $ClassName3?>" style="border-bottom:1px solid #CCC"><a href="policy.php"><?php echo $LeftTitle[$lang]["Left3"];?></a></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td style="padding-left:35px; padding-bottom:25px;"><a href="product_feature.php"><img src="images/00/but_products.jpg" width="245" height="128" border="0" /></a></td>
		</tr>
		<tr>
			<td style="padding-left:35px;"><a href="contact.php"><img src="images/00/but_contact.jpg" width="245" height="130" border="0" /></a></td>
		</tr>
		<tr>
			<td height="40">&nbsp;</td>
		</tr>
	</table>
</td>

