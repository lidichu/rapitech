<?php
$row = array ();
$row2 = array ();
$Sql = "Select * From banner_ch where Status='上架' order by Sort ASC ,SerialNo DESC";
$Rs = $Conn->prepare ( $Sql );
$Rs->execute ();
$rowCount = $Rs->rowCount ();
$row = $Rs->fetchAll ();
           
if (! empty ( $row )) {
	foreach ( $row as $key => $value ) {
		?>
<?php if($key == 0){ ?>
        <div class="item active">
<?php }else{ ?>
            <div class="item">
<?php } ?>
            <img
		src="<?php echo(VisualRoot); ?>files/Banner/L/<?php echo $value['PICHidden'] ?>"
		alt="" >
            <div class="container">
                <div class="carousel-caption"></div>
            </div>
        </div>
<?php
	}
	
	if ($rowCount <= 1) {
		?>
        <div class="item active">
            <img
		src="<?php echo(VisualRoot); ?>files/Banner/L/<?php echo $value['PICHidden'] ?>"
		alt="" >
            <div class="container">
                <div class="carousel-caption"></div>
            </div>
        </div>
<?php
	}
}
?> 