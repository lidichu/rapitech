<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td class="title_01" style="padding: 5px 0px 15px 0px; border-bottom:1px dotted #999"><?php echo $MainTitle?></td>
	</tr>
	<tr>
		<td valign="top">&nbsp;</td>
	</tr>
	<tr>
		<td valign="top">
			<?php
				$Sql="select * from about where Lang='$lang'";
				$Rs=mysql_query($Sql,$Conn);
				if($Rs && mysql_num_rows($Rs)>0){
					$Row=mysql_fetch_array($Rs);
					echo ReplaceEditor($Row["AboutNote"]);
				}
			?>
		</td>
	</tr>
	<tr>
		<td height="40">&nbsp;</td>
	</tr>
</table>

