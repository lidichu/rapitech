<script type="text/javascript">
$(function(){
	$(".CountryClass").mouseenter(function(){
		var IndexI = $(".CountryClass").index($(this));
		var G0 =$(this).attr("id");
		$("#Category").load("../Common/Forum/Contact/contact_panel.php?G0="+G0+"&lang=<?php echo $lang?>");
		$("#Category").css({top:$(this).position().top,left:$(this).position().left + $(this).width()}).show();
	}).mouseleave(function(){
		var IndexI = $(".CountryClass").index($(this));
		$("#Category").hide();
		$("#Detail").hide();
	});

	$("#Category").hide();	
	$("#Detail").hide();	
});
</script>
<style type="text/css">
.CategoryClass{
	position:absolute;
	width:200px;
	height:115px;
	z-index:1;
	left: 416px;
	top: 427px;
}
.DetailClass
{
	position:absolute;
	width:363px;
	height:276px;
	z-index:2;
	left: 204px;
	top: 0px;
}
</style>
<td width="30%" align="left" valign="top">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td valign="top">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td><img src="images/05_contact/title.jpg" width="304" height="64" /></td>
					</tr>
					<?php
						$Sql="select * from contactcategory where Status='上架' order by Sort";
						$Rs=mysql_query($Sql,$Conn);
						if($Rs && mysql_num_rows($Rs)>0){
					?>
					<tr>
						<td valign="top" style="padding:5px 20px 35px 35px">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								
								<?php
									while($Row=mysql_fetch_array($Rs)){
										$LeftG0=$Row["SerialNo"];
										$Category=$Row["Category".$lang];
										$Url="contact2.php?G0=".$LeftG0;
										$ClassName="menu_01";
										$MapSite=$Row["MapSite"];
										if($G0==$LeftG0){
											$ClassName="menu_02";
											$CategoryTitle=$Category;
										}
								?>
								<area shape="poly" coords="<?php echo $MapSite?>" href="<?php echo $Url?>" alt="<?php echo $Category?>" />
								<tr class="CountryClass" id="<?php echo $LeftG0?>">
									<td width="8%" height="33" align="center" style="border-bottom:1px solid #CCC"><img src="images/00/img_01.jpg" width="10" height="11" /></td>
									<td width="92%" height="33" class="<?php echo $ClassName ?>" style="border-bottom:1px solid #CCC"><a href="<?php echo $Url?>"><?php echo $Category?></a></td>
								</tr>
								
								<?php
									}
								?>
								
							</table>								
							<div id="Category" Class="CategoryClass"></div>
						</td>
					</tr>
					<?php
						}
					?>
				</table>
			</td>
		</tr>
		<tr>
			<td height="40">&nbsp;</td>
		</tr>
	</table>
</td>

