<td width="30%" align="left" valign="top">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td><img src="images/03_product/title.jpg" width="304" height="64" /></td>
					</tr>
					<tr>
						<td valign="top" style="padding:5px 20px 35px 35px">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<?php 
									$Sql="select * from productcategory where Status='上架' and Lang='$lang' order by Sort,SerialNo desc ";
									$Rs=mysql_query($Sql,$Conn);
									if($Rs && mysql_num_rows($Rs)>0){
										while($Row=mysql_fetch_array($Rs)){
											$SG0=$Row["SerialNo"];
											$Category=$Row["Category"];
											$Url="product_feature.php?G0=$SG0";
											if($G0==""){
												$G0=$SG0;
											}if(intval($G0)==$SG0){
												$ClassName="menu_02";
											}
											else{
												$ClassName="menu_01";
											}
								?>
								<tr>
									<td width="8%" height="33" align="center" style="border-bottom:1px solid #CCC"><img src="images/00/img_01.jpg" width="10" height="11" /></td>
									<td width="92%" height="33" class="<?php echo $ClassName?>" style="border-bottom:1px solid #CCC"><a href="<?php echo $Url?>"><?php echo $Category?></a></td>
								</tr>
								<?php
											$Sql2="select * from product where Status='上架' and G1=$G0 order by Sort,SerialNo desc";
											$Rs2=mysql_query($Sql2,$Conn);
											if($Rs2 && mysql_num_rows($Rs2)>0 && intval($G0)==$SG0){
								?>
								<tr>
									<td height="33" align="center" style="border-bottom:1px solid #CCC">&nbsp;</td>
									<td height="33" style="border-bottom:1px solid #CCC; padding:6px 0px;">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<?php
												while($Row2=mysql_fetch_array($Rs2)){
													$PrdName=$Row2["PrdName"];
													$G1=$Row2["SerialNo"];
													$Url2="product_feature.php?G0=$G0&Sn=$G1";
													if($Sn==""){
														$Sn=$G1;
													}if(intval($Sn)==$G1){
														$ClassName2="menu_04";
														$PrdTitle=$PrdName;
													}
													else{
														$ClassName2="menu_03";
													}
											?>
											<tr>
												<td width="9%" height="26"><img src="images/00/img_02.jpg" width="9" height="9" /></td>
												<td width="91%" height="26" class="<?php echo $ClassName2?>"><a href="<?php echo $Url2?>"><?php echo $PrdName?></a></td>
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
		</tr>
		<tr>
			<td style="padding-left:35px; padding-bottom:25px;"><a href="about.php"><img src="images/00/but_company.jpg" width="245" height="131" border="0" /></a></td>
		</tr>
		<tr>
			<td style="padding-left:35px;"><a href="contact.php"><img src="images/00/but_contact.jpg" width="245" height="130" border="0" /></a></td>
		</tr>
		<tr>
			<td height="40">&nbsp;</td>
		</tr>
	</table>
</td>

