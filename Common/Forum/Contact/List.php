<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td align="center" style="padding-top:50px">
			<img src="images/05_contact/map.jpg" width="611" border="0" height="383" usemap="#Map"/>
		</td>
	</tr>
	<tr>
		<td height="40">&nbsp;</td>
	</tr>
</table>
<map name="Map" id="Map">
<?php
	$Sql="select * from contactcategory where Status='上架' order by Sort";
	$Rs=mysql_query($Sql,$Conn);
	if($Rs && mysql_num_rows($Rs)>0){
		while($Row=mysql_fetch_array($Rs)){
			$G0=$Row["SerialNo"];
			$Category=$Row["Category".$lang];
			$Url="contact2.php?G0=$G0";
			$MapSite=$Row["MapSite"];
?>
<area shape="poly" coords="<?php echo $MapSite?>" href="<?php echo $Url?>" title="<?php echo $Category?>" alt="<?php echo $Category?>" />
<?php
		}
	}
?>
</map>				

