<?php
	$PageSize = 10;
	$Page = CheckData($_REQUEST["Page"]);
	if($Page == ""){$Page = 1;}
	$Page = intval($Page);
	$data = array();
	$SQL = "Select A.SerialNo,B.Category".$Lang.",B.Color , A.Title".$Lang.", A.PostDate,A.Hits From qa as A, qanotecategory as B Where A.G0 = ".$G0." And A.QANoteSNo = B.SerialNo And A.Status = '上架' Order By A.Sort,A.PostDate DESC,A.SerialNo DESC limit ".($Page-1)*$PageSize.",".$PageSize ;
	$Rs = mysql_query($SQL,$Conn);
	if($Rs && mysql_num_rows($Rs) > 0){
		while($Row = mysql_fetch_array($Rs)){
			$Row["PostDate"] = date('Y-m-d',strtotime($Row["PostDate"]));
			$data[] = $Row;
		}
	}
	$dataAmount = 0;
	$SQL = "Select Count(1) From qa Where G0 = ".$G0." And Status = '上架'";
	$Rs = mysql_query($SQL,$Conn);
	if($Rs && mysql_num_rows($Rs) > 0){
		$Row = mysql_fetch_array($Rs);
		$dataAmount = $Row[0];
	}
	$PageAmount = NumHandle2($dataAmount,$PageSize) / $PageSize;
?>
<?php if(count($data) > 0){ ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<?php
        foreach($data as $Key => $Value){
    ?>
    <tr>
        <td width="17%" height="34" align="center" class="day" style="border-bottom:1px dotted #FC6"><?php echo($Value["PostDate"]); ?></td>
        <td width="1%" height="34" align="center" style="border-bottom:1px dotted #FC6">&nbsp;</td>
        <td width="15%" height="34" align="center" class="text06" style="border-bottom:1px dotted #FC6"><?php echo($Value["Category".$Lang]); ?></td>
        <td width="1%" height="34" style="border-bottom:1px dotted #FC6">&nbsp;</td>
        <td width="49%" height="34" align="left" style="border-bottom:1px dotted #FC6; padding-left:6px" class="text01"><div class="limitword" style="width:320px;"><a href="qa_detail.php?G0=<?php echo($G0); ?>&SerialNo=<?php echo($Value["SerialNo"]); ?>&Page=<?php echo($Page); ?>"><?php echo($Value["Title".$Lang]); ?></a></div></td>
        <td width="1%" height="34" style="border-bottom:1px dotted #FC6">&nbsp;</td>
        <td width="16%" height="34" align="center" style="border-bottom:1px dotted #FC6"><?php echo($Value["Hits"]); ?> / 人</td>
    </tr>
    <?php } ?>
    <tr>
        <td colspan="7" height="50" align="center" valign="bottom">
        	<?php $OtherQuery = "G0=".$G0; ?>
			<?php include_once('../Common/PageBar/PageBar.php'); ?>
        </td>
    </tr>
</table>
<?php } ?>