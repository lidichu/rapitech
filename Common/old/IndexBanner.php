<link rel="stylesheet" type="text/css" href="../Scripts/Carousel01.css"/>
<script type="text/javascript" src="../Scripts/Carousel01.js"></script>
<?php
	//Banner管理
	$BannerArray='';
	$Sel_Status="上架";
	$BannerRow=GetRow($Sel_banner_Rs);
	
	foreach($BannerRow as $Row){
		if($Row["PICHidden"]!=""){
				if($BannerArray!=""){
				$BannerArray.=",";
			}
			$BannerArray.='"'.$Row["PICHidden"].'"';
		}	
	}
?>
<script type="text/javascript">
$(function(){
	$("#BannerDiv").Carousel01({
		"PicNames":new Array(<?php echo $BannerArray?>),
		"PicRoot":"../files/Banner/PIC/"
	});	
});
</script>
<div id="BannerDiv" style="width:1178px;height:305px"></div>
