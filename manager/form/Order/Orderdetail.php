<?php
	//詢問資訊
	$SQL="select * From ordermain Where SerialNo = ".$G[0];
	$Rs =mysql_query($SQL,$Conn);
	if($Rs && mysql_num_rows($Rs) > 0){
		$Row=mysql_fetch_array($Rs);
		$OrderNumber=$Row["OrderNumber"];		
		$OrderMessage=$Row["OrderMessage"];
	}
	//詢問人資訊
	$SQL="select * From ordermember Where G0 = ".$G[0];
	$Rs =mysql_query($SQL,$Conn);
	if($Rs && mysql_num_rows($Rs) > 0){
		$Row=mysql_fetch_array($Rs);
		$OrderName=$Row["OrderName"];   
		$OrderSex=$Row["OrderSex"];     	
		$OrderEmail=$Row["OrderEMail"];      
		$OrderTel=$Row["OrderTel"];      
		$OrderAddress=$Row["OrderAddress"];
		$TickectType=$Row["TickectType"];      
		$TicketID=$Row["TicketID"];      
		$TicketTitle=$Row["TicketTitle"];      
	}
	
	
?>	
<table width="60%" border="0" cellspacing="0" cellpadding="0">			
	<tr>
		<td align="left" class="title2" style="padding-top:10px">1）詢問明細</td>
	</tr>
	<tr>
		<td style="padding-top:5px">
			<table width="100%"  border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="10" rowspan="2" align="right" valign="bottom"></td>
					<td width="578" align="left" class="pro" style="padding-top:10px; border-bottom:none">
						<table width="100%" style="border:1px solid #000;border-bottom-width:0px;" border="0" cellpadding="0" cellspacing="0" style="border-bottom:none;">
							<tr>
								<td width="50%" height="30" align="center" style="border-bottom:1px solid #2c261e">商品名稱</td>
								<td width="16%" height="30" align="center" style="border-bottom:1px solid #2c261e">Model No</td>
								<td width="17%" height="30" align="center" style="border-bottom:1px solid #2c261e">數量</td>
							</tr>
							<?php	
								$SQL="Select * From orderitem Where G0 = ".$G[0];
								$Rs =mysql_query($SQL,$Conn);
								$TotalPrice = 0;
								while($Row=mysql_fetch_array($Rs)){
									$PrdName=$Row["PrdName"];										
									$PrdAmount=$Row["PrdAmount"];
									$ModelNo=$Row["ModelNo"];
									
							?>
							<tr>
								<td align="center" height="42"  style="border-bottom:1px dotted #2c261e"><?php echo $PrdName?></td>
								<td align="center"  style="border-bottom:1px dotted #2c261e"><?php echo NumHandle3($PrdPrice)?></td>
								<td align="center"  style="border-bottom:1px dotted #2c261e"><?php echo $PrdAmount?></td>
							</tr>
							<?php
								}
							?>
						</table>
					</td>
					<td width="8" rowspan="2" align="left" valign="bottom"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td class="pro" style="border-top:none;">&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td align="left" class="title2" style="padding-top:20px">2）詢問人資訊</td>
	</tr>
	<tr>
		<td align="left" style="padding-top:5px">
			
			<table width="97%" border="0" style="border:1px solid #000" align="center" cellpadding="0" cellspacing="0" class="pro">
				<tr>
					<td width="17%" height="30" style="padding-left:15px">中文全名</td>
					<td width="83%">
						<?php echo $OrderName?>&nbsp;<?php echo $OrderSex?>
					</td>
				</tr>
				<tr>
					<td height="30" style="padding-left:15px">電子郵件</td>
					<td>
						<?php echo $OrderEmail?>
					</td>
				</tr>
				<tr>
					<td height="30" style="padding-left:15px">聯絡電話</td>
					<td>
						<?php echo $OrderTel?>
					</td>
				</tr>
				<tr>
					<td height="30" style="padding-left:15px">聯絡區域</td>
					<td>
						<?php echo $OrderAddress?>
					</td>
				</tr>
				<tr>
					<td height="30" style="padding-left:15px">訊　　息</td>
					<td>
						<?php echo $OrderAddress?>
					</td>
				</tr>
				<!--
				<tr>
					<td height="30" valign="top" style="padding-left:15px; padding-top:8px">發票資訊</td>
					<td style="padding-top:5px"><?php echo $TickectType?></td>
						
				</tr>
				<?php if ($TickectType=="三聯式"){?>
				<tr>
					<td height="30" valign="top" style="padding-left:15px; padding-top:8px">統一編號</td>
					
					<td style="padding-top:5px"><?php echo $TicketID?></td>

				</tr>
				<tr>
					<td height="30" valign="top" style="padding-left:15px; padding-top:8px">公司抬頭</td>
					
					<td style="padding-top:5px"><?php echo $TicketTitle?></td>

				</tr>
				<?php }?>
				-->
				<tr>
					<td valign="top">&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<br>
