<link href="<?php echo(VisualRoot); ?>Scripts/NivoSlider/nivo-slider.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo(VisualRoot); ?>Scripts/NivoSlider/jquery.nivo.slider.js"></script>
<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({"prevText":'<img src="<?php echo(VisualRoot); ?>images/left_01.png" />',"nextText":'<img src="<?php echo(VisualRoot); ?>images/right_01.png" />'});
	window.location.hash="#ToTop";
});
</script>        
