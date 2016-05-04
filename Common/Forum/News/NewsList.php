<?php
	$PICRoot = "../files/News/PIC/";
	$PageSize = 10;
	$Page = CheckData($_REQUEST["Page"]);
	if($Page == ""){$Page = 1;}
	$Page = intval($Page);
	$data = array();
	$SQL = "Select SerialNo, Title".$Lang.", PostDate,Note".$Lang.",PICHidden From news Where Status = '上架' Order By Sort,PostDate DESC,SerialNo DESC limit ".($Page-1)*$PageSize.",".$PageSize ;
	$Rs = mysql_query($SQL,$Conn);
	if($Rs && mysql_num_rows($Rs) > 0){
		while($Row = mysql_fetch_array($Rs)){
			if($Row["PICHidden"] != "" && is_file($PICRoot.$Row["PICHidden"])){
				$Row["PICHidden"] = $PICRoot.$Row["PICHidden"];
			}else{
				$Row["PICHidden"] = '../NoPIC/135x102.jpg';
			}
			$Row["PostDate"] = date('Y-m-d',strtotime($Row["PostDate"]));
			$Row["Note".$Lang] = cutstr($Row["Note".$Lang],240);
			$data[] = $Row;
		}
	}
	$dataAmount = 0;
	$SQL = "Select Count(1) From news Where Status = '上架'";
	$Rs = mysql_query($SQL,$Conn);
	if($Rs && mysql_num_rows($Rs) > 0){
		$Row = mysql_fetch_array($Rs);
		$dataAmount = $Row[0];
	}
	$PageAmount = NumHandle2($dataAmount,$PageSize) / $PageSize;
	
	
	$News = array();
	$News["Ch"] = array(
		Title => "最新消息",
		IndexLink => "../index.php"
	);
	$News["Cn"] = array(
		Title => "最新消息",
		IndexLink => "index_cn.php"
	);
	$News["En"] = array(
		Title => "News",
		IndexLink => "index_en.php"
	);	
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td width="6%" height="37"><img src="images/00/icon_02.jpg" width="37" height="37" /></td>
                                            <td width="44%" class="title01"><?php echo($News[$Lang]["Title"]); ?></td>
                                            <td width="50%" align="right"><img src="images/00/img_01.jpg" width="8" height="8" /> <a href="<?php echo($News[$Lang]["IndexLink"]); ?>">Deary</a> / <?php echo($News[$Lang]["Title"]); ?></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td width="100%" colspan="3" valign="top" style="padding-left:30px">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <?php
														foreach($data as $Key => $Value){
													?>
                                                    <tr>
                                                        <td width="22%" height="34">
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="23%" align="center" valign="middle"><img src="<?php echo($Value["PICHidden"]); ?>" class="photo"  style="padding:2px"/></td>
                                                                    <td width="77%" valign="top">
                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                            <tr>
                                                                                <td class="day"><?php echo($Value["PostDate"]); ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="32" class="title02"><div class="limitword" style="width:500px;"><a href="news_main.php?SerialNo=<?php echo($Value["SerialNo"]); ?>&Page=<?php echo($Page); ?>"><?php echo($Value["Title".$Lang]); ?></a></div></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text08"><?php echo($Value["Note".$Lang]); ?></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="28">&nbsp;</td>
                                                    </tr>                                                    
                                                    <?php
														}
													?>
	                                        	</table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td height="50" align="center" valign="bottom">
        	<?php include_once('../Common/PageBar/PageBar.php'); ?>
        </td>
    </tr>
</table>