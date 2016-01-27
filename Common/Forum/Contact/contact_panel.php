<?php ob_start(); ?>
<?php include_once('../../../PageHeadch.php');?>
<?php
	$G0=$_REQUEST["G0"];
	$lang=$_REQUEST["lang"];
	$Sql="select * from contact where Status='上架' and G0=$G0";
	$Rs=mysql_query($Sql,$Conn);
	if($Rs && mysql_num_rows($Rs)>0){
?>
<script type="text/javascript">
$(function(){

	$(".CompanyClass").mouseenter(function(){
		var IndexI = $(".CompanyClass").index($(this));
		$("#Category").show();
		var Sn =$(this).attr("id");
		$(".MenuClass").css("background-image","url(images/05_contact/img_02.jpg)")
		$(".MenuClass").eq(IndexI).css("background-image","url(images/05_contact/img_01.jpg)");
		$("#Detail").load("../Common/Forum/Contact/contact_panel2.php?Sn="+Sn+"&lang=<?php echo $lang?>");
		$("#Detail").css({top:$(".CompanyClass").eq(0).position().top,left:$(this).position().left + $(this).width()}).show();

	}).mouseleave(function(){
		$("#Detail").hide();
		$("#Category").hide();
	});	
	$("#Detail").mouseenter(function(){	
		$("#Category").show();
		$("#Detail").show();
	}).mouseleave(function(){
		$("#Category").hide();
		$("#Detail").hide();
	});	
});
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #CCC">
	<?php
		while($Row=mysql_fetch_array($Rs)){
			$Sn=$Row["SerialNo"];
			$Category2=$Row["Category2".$lang];
	?>
	<tr Class="CompanyClass" id="<?php echo $Sn?>">
		<td Class="MenuClass" width="84%" height="26" style="padding-left:6px; border-bottom:1px solid #CCC; background-image:url(images/05_contact/img_02.jpg)">
			<div Class="ttt" Style="position:relative;z-index:3;">
			<?php echo $Category2?>		
			</div>
		</td>
	</tr>
	<?php
		}
	?>
</table>
<div id="Detail" class="DetailClass" ></div>
<?php
	}
?>
<?php ob_flush(); ?>

