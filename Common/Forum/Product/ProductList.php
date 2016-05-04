<?php
	$PICRoot = "../files/Product/PICList/";
	$PageSize = 6;
	$data = array();
	$SQL = "Select SerialNo, ProductName".$Lang.", PICHidden From product Where G0 = ".$G0." And Status = '上架' Order By Sort,SerialNo DESC limit ".($Page-1)*$PageSize.",".$PageSize ;
	$Rs = mysql_query($SQL,$Conn);
	if($Rs && mysql_num_rows($Rs) > 0){
		while($Row = mysql_fetch_array($Rs)){
			if($Row["PICHidden"] != "" && is_file($PICRoot.$Row["PICHidden"])){
				$Row["PICHidden"] = $PICRoot.$Row["PICHidden"];
			}else{
				$Row["PICHidden"] = '../NoPIC/185x200.jpg';
			}
			$data[] = $Row;
		}
	}
	$dataAmount = 0;
	$SQL = "Select Count(1) From product Where G0 = ".$G0." And Status = '上架'";
	$Rs = mysql_query($SQL,$Conn);
	if($Rs && mysql_num_rows($Rs) > 0){
		$Row = mysql_fetch_array($Rs);
		$dataAmount = $Row[0];
	}
	$PageAmount = NumHandle2($dataAmount,$PageSize) / $PageSize;
	$Fields = array();
	$Fields["Ch"] = array(
		Title => "產品介紹",
		IndexLink => "../index.php"
	);
	$Fields["Cn"] = array(
		Title => "产品介绍",
		IndexLink => "index_cn.php"
	);
	$Fields["En"] = array(
		Title => "Product",
		IndexLink => "index_en.php"
	);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="6%"><img src="images/00/icon_02.jpg" width="37" height="37" /></td>
                    <td width="44%" class="title01"><?php echo($CategoryName); ?></td>
                    <td width="50%" align="right"><img src="images/00/img_01.jpg" width="8" height="8" /> <a href="<?php echo($Fields[$Lang]["IndexLink"]); ?>">Deary</a> / <a href="product_list.php"><?php echo($Fields[$Lang]["Title"]); ?></a> / <?php echo($CategoryName); ?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <?php if(count($data) > 0){ ?>
	
	
    <tr>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <?php
					
					$IndexTop = -1;
					while($IndexTop < count($data)){
				?>
                <tr>
                <?php
						for($i=1;$i<=3;$i++){	
							$IndexTop++;
							if($IndexTop < count($data)){
				?>
                	<td width="37%" valign="top">
                        <table width="185" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td align="center" valign="middle"><a href="product_main.php?G0=<?php echo($G0); ?>&SerialNo=<?php echo($data[$IndexTop]["SerialNo"]); ?>&Page=<?php echo($Page); ?>"><img src="<?php echo($data[$IndexTop]["PICHidden"]); ?>" border="0" class="photo" /></a></td>
                            </tr>
                            <tr>
                                <td height="26" align="center" class="text01"><div class="limitword" style="width:140px;"><?php echo($data[$IndexTop]["ProductName".$Lang]); ?></div></td>
                            </tr>
                        </table>
                    </td>
                <?php
							}else{
				?>
                	<td width="37%" valign="top">&nbsp;</td>
                <?php
							}
						}
				?>
                </tr>
                <?php
                	if($IndexTop < count($data)){
				?>
                <tr>
                    <td valign="top">&nbsp;</td>
                    <td valign="top">&nbsp;</td>
                    <td valign="top">&nbsp;</td>
                </tr>                
                <?php
				
					}
				}
				?>
            </table>
        </td>
    </tr>
    <tr>
        <td height="50" align="center" valign="bottom">
        	<?php $OtherQuery = "G0=".$G0; ?>
            <?php include_once('../Common/PageBar/PageBar.php'); ?>
        </td>
    </tr>
    <?php } ?>
</table>