<table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php 
	$SQL = "Select SerialNo,PostDate,Title".$Lang." From activity Where Status = '上架' Order By Sort,PostDate DESC,SerialNo DESC";
	$Rs = mysql_query($SQL,$Conn);
	if($Rs && mysql_num_rows($Rs) > 0){
		while($Row = mysql_fetch_array($Rs)){
?>
    <tr>
        <td width="21%">&nbsp;</td>
        <td width="70%">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="day2"><?php echo(date('Y-m-d',strtotime($Row["PostDate"]))); ?></td>
                </tr>
                <tr>
                    <td class="text07"><a href="activity.php?SerialNo=<?php echo($Row["SerialNo"]); ?>"><?php echo($Row["Title".$Lang]); ?></a></td>
                </tr>
            </table>
        </td>
        <td width="9%">&nbsp;</td>
    </tr>
<?php
		}		
	}
?>    
</table>