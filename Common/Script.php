<script type="text/javascript" src="<?php echo(VisualRoot); ?>Scripts/jquery.js"></script>
<script type="text/javascript" src="<?php echo(VisualRoot); ?>Scripts/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo(VisualRoot); ?>manager/script/fun.js"></script>
<script type="text/javascript" src="<?php echo(VisualRoot); ?>Scripts/myError.js"></script>
<script type="text/javascript" src="<?php echo(VisualRoot); ?>Scripts/twzipcode2.js"></script>
<script type="text/javascript"><?php include_once $VisualRoot."star/statjs.php"; ?></script>
 <?php /*手動加入*/?>
<link rel="stylesheet" href="<?php echo(VisualRoot); ?>Scripts/colorbox/example2/colorbox.css" /><?php /*證照用*/ ?>
<script type="text/javascript" src="<?php echo(VisualRoot); ?>Scripts/colorbox/jquery.colorbox-min.js"></script><?php /*證照用*/ ?>
<link rel="stylesheet" href="<?php echo(VisualRoot); ?>Scripts/jquery-ui/jquery-ui.min.css" /><?php /*jquery ui*/ ?>
<script type="text/javascript" src="<?php echo(VisualRoot); ?>Scripts/jquery-ui/jquery-ui.min.js"></script><?php /*jquery ui*/ ?>
<?php /*<script type="text/javascript" src="<?php echo(VisualRoot); ?>Scripts/jquery.fly.min.js"></script>添加到購物車 - 動畫效果*/ ?>
<script type="text/javascript" src="<?php echo(VisualRoot); ?>Scripts/cookie/src/jquery.cookie.js"></script><?php /*jquery cookie 的套件 */ ?>
<script type="text/javascript" src="<?php echo(VisualRoot); ?>Scripts/shopping_cookie.js"></script><?php /*自定義購買商品儲存至cookie*/ ?>
<script type="text/javascript" src="<?php echo(VisualRoot); ?>Scripts/pnotify.custom.min.js"></script><?php /*訊息*/ ?>
<link rel="stylesheet" href="<?php echo(VisualRoot); ?>Scripts/pnotify.custom.min.css" /><?php /*訊息*/ ?>
<script type="text/javascript" src="<?php echo(VisualRoot); ?>Scripts/alerts/jquery.alerts.js"></script><?php /*方塊訊息*/ ?>
<link rel="stylesheet" href="<?php echo(VisualRoot); ?>Scripts/alerts/jquery.alerts.css" /><?php /*方塊訊息*/ ?>
<script>
$( document ).ready(function(){
	$('[href="#"]').on('click',function(){
		return false;
	});	
});
</script>
<script>
$( document ).ready(function(){
	
	r_SCookie = SCookie("<?php echo $WebTitle ?>","<?php echo $_website ?>","<?php echo $_user ?>", null , null );	
	$( ".box2 span ").html(r_SCookie);
	
	$( '.set' ).on('click',function(){
		//console.log(	$(this)		);		
		r_SCookie = SCookie("<?php echo $WebTitle ?>","<?php echo $_website ?>","<?php echo $_user ?>", null , null );	
		$( ".box2 span ").html(r_SCookie);
		if(r_SCookie==0)
		{
			jAlert('購物清單中，無任何商品！','提示訊息'  );
			
			return false;
		}
		
	});
});
</script>
<style>
	#popup_title{ background: #ECFFC9;  }
</style>	 