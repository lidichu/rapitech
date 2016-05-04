<div id="wrapper">
    <div class="slider-wrapper theme-default">
        <div id="slider" class="nivoSlider">
            <?php
                $SQL = "Select PICHidden From banner Where Status = '上架' Order By Sort,SerialNo DESC";
                $BannerRs = mysql_query($SQL,$Conn);
                if($BannerRs && mysql_num_rows($BannerRs) > 0){
                    while($Row = mysql_fetch_array($BannerRs)){
            ?>
            <img src="<?php echo(VisualRoot); ?>files/Banner/PIC/<?php echo($Row["PICHidden"]); ?> " />
            <?php	
                    }
                }
            ?>
        </div>
    </div>
</div>