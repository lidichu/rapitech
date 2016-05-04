<?php 
	foreach($data as $Key => $Value){
?>
<tr>
	<td>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="61%" style="border:3px solid #f9d543"><?php SetYoutube($Value["Youtube"],431,263,"",false); ?></td>
				<td width="39%" valign="top" style="padding-left:40px">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td class="h3"><?php echo($Value["Title".$Lang]); ?></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td><?php echo($Value["Note".$Lang]); ?></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</td>
</tr>
<tr>
	<td>&nbsp;</td>
</tr>
<?php	
	}
?>