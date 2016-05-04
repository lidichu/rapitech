<?php
	$PICRoot = "../files/Link/";
	$PageSize = 12;
	$Page = CheckData($_REQUEST["Page"]);
	if($Page == ""){$Page = 1;}
	$Page = intval($Page);
	$data = array();
	$SQL = "Select SerialNo, Title".$Lang.", Url,PICHidden From link Where Status = '上架' Order By Sort,SerialNo DESC limit ".($Page-1)*$PageSize.",".$PageSize ;
	$Rs = mysql_query($SQL,$Conn);
	if($Rs && mysql_num_rows($Rs) > 0){
		while($Row = mysql_fetch_array($Rs)){
			if($Row["PICHidden"] != "" && is_file($PICRoot.$Row["PICHidden"])){
				$Row["PICHidden"] = $PICRoot.$Row["PICHidden"];
			}else{
				$Row["PICHidden"] = '../NoPIC/160x60.jpg';
			}
			$data[] = $Row;
		}
	}
	$dataAmount = 0;
	$SQL = "Select Count(1) From link Where Status = '上架'";
	$Rs = mysql_query($SQL,$Conn);
	if($Rs && mysql_num_rows($Rs) > 0){
		$Row = mysql_fetch_array($Rs);
		$dataAmount = $Row[0];
	}
	$PageAmount = NumHandle2($dataAmount,$PageSize) / $PageSize;
?>
<?php if(count($data) > 0){ ?>
<table width="100%" border="0" cellspacing="6" cellpadding="0">
    <?php
		$IndexTop = -1;
		while($IndexTop < count($data)){
	?>
	<tr>
	<?php
			for($i=1;$i<=4;$i++){	
				$IndexTop++;
				if($IndexTop < count($data)){
	?>
        <td width="25%">
            <table width="160" border="0" cellpadding="0" cellspacing="0" class="photo">
                <tr>
                    <td style="padding:2px"><a href="<?php echo($data[$IndexTop]["Url"]); ?>" target="_blank" title="<?php echo($data[$IndexTop]["Title".$Lang]); ?>"><img src="<?php echo($data[$IndexTop]["PICHidden"]); ?>" border="0" /></a></td>
                </tr>
                <tr>
                    <td height="24" align="center" bgcolor="#EFEFEF"><?php echo($data[$IndexTop]["Title".$Lang]); ?></td>
                </tr>
            </table>
        </td>    
	<?php
				}else{
	?>
		<td width="25%">&nbsp;</td>
	<?php
				}
			}
	?>
	</tr>
	<?php
			if($IndexTop < count($data)){
	?>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>               
	<?php
			}
		}
	?>
    <tr>
        <td colspan="4" height="50" align="center" valign="bottom">
            <?php include_once('../Common/PageBar/PageBar.php'); ?>
        </td>
    </tr>
</table>
<?php } ?>