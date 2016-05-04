<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <?php if(count($data) > 0){ ?>
    <tr>
        <td width="26%" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td><?php echo($data[0]["PICIndexHidden"]); ?></td>
                </tr>
                <tr>
                    <td height="34" valign="bottom">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="64%" align="right"><img src="images/03_product/img_06.jpg" width="20" height="20" /></td>
                                <td width="36%" class="text03">點小圖放大圖</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
        <td width="74%" valign="top" style="padding-left:25px">
            <?php
                if(count($data) > 1){
            ?>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <?php 
                    $IndexTop = 0;
                    while($IndexTop < count($data)){
                ?>
                <tr>
                    <?php
                        for($i=1;$i<=4;$i++){
                            $IndexTop++;
                            if($IndexTop < count($data)){
                    ?>
                    <td align="center" width="96"><?php echo($data[$IndexTop]["PICDetailHidden"]); ?></td>
                    <?php			
                            }else{
                    ?>
                    <td align="center" width="96">&nbsp;</td>
                    <?php	
                            }
                        }
                    ?>
                </tr>
                <?php
                        if($IndexTop < count($data)){
                ?>
                <tr>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                </tr>
                <?php
                        }
                    }
                ?>
            </table>
            <?php } ?>
        </td>
    </tr>
    <?php
        }
    ?>
</table>