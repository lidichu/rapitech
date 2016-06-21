<?php
	//詢問資訊
	$SQL="select * From ordermain Where SerialNo = ".$G[0];
	//`OrderDate`,`OrderNumber`,`OrderName`,`OrderEMail`,`OrderTel`,`OrderAddress`,`Status`,`Message`,`MailString`
	$Rs =mysql_query($SQL,$Conn);
	if($Rs && mysql_num_rows($Rs) > 0){
		$Row=mysql_fetch_array($Rs);
		$OrderNumber=$Row["OrderNumber"];		
		$OrderName=$Row["OrderName"];
		$OrderEmail=$Row["OrderEMail"];
		$OrderTel=$Row["OrderTel"];
		$OrderAddress=$Row["OrderAddress"];
		$OrderMessage=$Row["Message"];
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
								<td width="40%" height="30" align="center" style="border-bottom:1px solid #2c261e">Model No</td>
								<td width="10%" height="30" align="center" style="border-bottom:1px solid #2c261e">數量</td>
							</tr>
							<?php	
								$SQL="Select * From orderitem Where G0 = ".$G[0];
								$Rs =mysql_query($SQL,$Conn);
								while($Row=mysql_fetch_array($Rs)){
									$PrdName=$Row["PrdName"];										
									$PrdAmount=$Row["PrdAmount"];
									$PrdModelNo=$Row["PrdModelNo"];
									
							?>
							<tr>
								<td align="center" height="42"  style="border-bottom:1px dotted #2c261e"><?php echo $PrdName?></td>
								<td align="center"  style="border-bottom:1px dotted #2c261e"><?php echo $PrdModelNo?></td>
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
					<td width="20%" height="40" style="padding-left:20px">中文全名</td>
					<td width="80%"><?php echo $OrderName?></td>
				</tr>
				<tr>
					<td height="40" style="padding-left:20px">電子郵件</td>
					<td><?php echo $OrderEmail?></td>
				</tr>
				<tr>
					<td height="40" style="padding-left:20px">聯絡電話</td>
					<td><?php echo $OrderTel?></td>
				</tr>
				<tr>
					<td height="40" style="padding-left:20px">聯絡區域</td>
					<td><?php echo $OrderAddress?></td>
				</tr>
				<tr>
					<td style="padding-left:20px">訊　　息</td>
					<td><?php echo $OrderMessage?></td>
				</tr>
				<!-- <tr>
					<td valign="top">&nbsp;</td>
					<td>&nbsp;</td> 
				</tr>-->
			</table>
		</td>
	</tr>
</table>
<br>
