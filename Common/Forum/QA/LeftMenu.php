<table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php
	$SQL = "Select SerialNo,Category".$Lang." From qacategory Where Status = '上架' Order by Sort,SerialNo DESC";
	$Rs = mysql_query($SQL,$Conn);
	if($Rs && mysql_num_rows($Rs) > 0){
		while($Row = mysql_fetch_array($Rs)){
?>
    <tr>
        <td width="24%">&nbsp;</td>
        <td width="76%">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="5%"><img src="images/00/icon_01.jpg" width="27" height="25" /></td>
                    <td width="95%" class="menu01" style="padding-left:5px"><a href="qa_list.php?G0=<?php echo($Row["SerialNo"]); ?>"><?php echo($Row["Category".$Lang]); ?></a></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td style="padding:5px 0px"><img src="images/00/line_01.jpg" width="183" height="10" /></td>
    </tr>
<?php	
		}
	}
?>
</table>