<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<?php
    	$SQL = "Select SerialNo, Category".$Lang." From productcategory Where Status = '上架' Order By Sort,SerialNo DESC";
		$Rs = mysql_query($SQL,$Conn);
		if($Rs && mysql_num_rows($Rs) > 0){
			while($Category = mysql_fetch_array($Rs)){
				if(intval($Category["SerialNo"]) == intval($G0)){

	?>
	<tr>
        <td width="24%">&nbsp;</td>
        <td width="76%">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="5%"><img src="images/00/icon_01.jpg" width="27" height="25" /></td>
                    <td width="95%" class="menu01" style="padding-left:5px"><a href="product_list.php<?php echo("?G0=".$Category["SerialNo"]); ?>"><?php echo($Category["Category".$Lang]); ?></a></td>
                </tr>
	<?php
			    	$SQL = "Select SerialNo, ProductName".$Lang." From product Where G0 = ".$Category["SerialNo"]." And Status = '上架' Order By Sort,SerialNo DESC";
					$Rs2 = mysql_query($SQL,$Conn);
					if($Rs2 && mysql_num_rows($Rs2) > 0){
	?>
                <tr>
                    <td>&nbsp;</td>
                    <td style="padding-left:5px">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        	<?php
	                            while($Product = mysql_fetch_array($Rs2)){
							?>
                            <tr>
                                <td height="22" class="menu02"><div class="limitword" style="width:110px;"><a href="product_main.php?G0=<?php echo($Category["SerialNo"]); ?>&SerialNo=<?php echo($Product["SerialNo"]); ?>&Page=<?php echo($Page); ?>"><?php echo($Product["ProductName".$Lang]); ?></a></div></td>
                            </tr>
                            <?php
								}
							?>
                        </table>
                    </td>
                </tr>
	<?php
                	}
	?>
            </table>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td style="padding:5px 0px"><img src="images/00/line_01.jpg" width="183" height="10" /></td>
    </tr>    
    <?php
				}else{
	?>
	<tr>
        <td width="24%">&nbsp;</td>
        <td width="76%">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="5%"><img src="images/00/icon_01.jpg" width="27" height="25" /></td>
                    <td width="95%" class="menu01" style="padding-left:5px"><a href="<?php echo(GetSCRIPTNAME()."?G0=".$Category["SerialNo"]); ?>"><?php echo($Category["Category".$Lang]); ?></a></td>
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
		}
	?>
    
    
</table>