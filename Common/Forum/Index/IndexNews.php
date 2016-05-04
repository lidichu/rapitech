<?php
	$DetailPage = array(
		"Ch" => "ch/news_main.php",
		"Cn" => "news_main.php",
		"En" => "news_main.php"
	)
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed">
	<?php
        $SQL = "Select SerialNo, PostDate, Title".$Lang.", Note".$Lang.", PICHidden From news Where IndexShow = 'true' And Status = '上架' Order By IndexSort,SerialNo DESC limit 0,2";
        $Rs = mysql_query($SQL,$Conn);
        if($Rs && mysql_num_rows($Rs) > 0){
            $Row = mysql_fetch_array($Rs);
            while($Row){
                $Row["PostDate"] = date('Y-m-d',strtotime($Row["PostDate"]));
                $Row["Note".$Lang] = cutstr($Row["Note".$Lang],60);
                if($Row["PICHidden"] != "" && is_file(VisualRoot."files/News/SmallPIC/".$Row["PICHidden"])){
                    $Row["PICHidden"] = VisualRoot."files/News/SmallPIC/".$Row["PICHidden"];
                }else{
                    $Row["PICHidden"] = VisualRoot."NoPIC/93x70.jpg";
                }
    ?>
    <tr>
        <td width="33%" valign="middle" align="center"><a href="<?php echo($DetailPage[$Lang]); ?>?SerialNo=<?php echo($Row["SerialNo"]); ?>"><img src="<?php echo($Row["PICHidden"]); ?>" border="0" class="photo"  style="padding:2px"/></a></td>
        <td width="67%" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="day"><?php echo($Row["PostDate"]); ?></td>
                </tr>
                <tr>
                    <td><div class="limitword" style="width:200px;"><a href="<?php echo($DetailPage[$Lang]); ?>?SerialNo=<?php echo($Row["SerialNo"]); ?>"><?php echo($Row["Title".$Lang]); ?></a></div></td>
                </tr>
                <tr>
                    <td class="text08" style="overflow:hidden;"><?php echo($Row["Note".$Lang]); ?></td>
                </tr>
            </table>
        </td>
    </tr>
    <?php
                $Row = mysql_fetch_array($Rs);
                if($Row){
    ?>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <?php	
                }
            }
        }
    
    ?>
</table>