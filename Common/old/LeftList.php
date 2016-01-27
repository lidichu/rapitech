<script type="text/javascript">
$(function(){
	$("#keySubmit").click(function(){
		$("#form3").submit();
		return false;
	});
	
})
</script>
<tr>
	<td align="center" valign="top" style="background-image:url(../images/index/i_26.png);background-repeat:no-repeat;">
		<table width="219" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td height="32" align="left"></td>
			</tr>
			<tr>
				<td height="44" align="center" valign="middle" style="background-image:url(../images/index/i_37.png);background-repeat:no-repeat;">
					<form id="form3" action="product.php?opp=kyw" method="post" name="form3" style="padding:0px;margin:0px;" >
						<table width="219" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="164" align="center" valign="middle"><label for="textfield3"></label><input name="kyw" type="text" id="kyw" style="border:1px solid #999"  value="請輸入關鍵字" size="18" onfocus="this.value=(this.value=='請輸入關鍵字') ? '' : this.value;" onblur="this.value=(this.value=='') ? '請輸入關鍵字' : this.value;"/></td>
								<td width="55" align="left" valign="middle"><input type="submit" name="keySubmit" id="keySubmit" value="搜尋" /></td>
							</tr>
						</table>
					</form>
				</td>
			</tr>
			<tr>
				<td height="10" align="left"></td>
			</tr>
			<tr>
				<td align="left"><img src="images/menu.png" width="219" height="46" /></td>
			</tr>
			<tr>
				<td align="left" valign="top">
					<table width="219" border="0" cellspacing="0" cellpadding="0">
						<?php
							$Param=array(
								"Status"	=>"上架"
							);
							$Temp_Category=GetTable("productcategory","*",$Param,"order by Sort, SerialNo");
							
							foreach($Temp_Category as $Row){
						?>
						<tr>
							<td align="left" valign="top">
								<table width="219" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td align="left" valign="middle" style="padding:5px 0px 5px 21px"><a href="product.php?S=<?php echo ($Row["SerialNo"]); ?>"><?php echo ($Row["Category"]); ?></a></td>
									</tr>
									<tr>
										<td align="left" valign="middle"><img src="../images/index/i_31.png" alt="" width="219" height="7" /></td>
									</tr>
								</table>
							</td>
						</tr>
						<?php
							}
						?>
					</table>
				</td>
			</tr>
			<tr>
				<td align="left">&nbsp;</td>
			</tr>
			<tr>
				<td align="left"><a href="shopping.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image82','','../images/index/a_39.png',1)"><img src="../images/index/i_39.png" alt="" name="Image82" width="219" height="44" border="0" id="Image82" /></a></td>
			</tr>
			<tr>
				<td height="10" align="left"></td>
			</tr>
			<tr>
				<td align="left"><a href="shoppingcart.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image83','','../images/index/a_41.png',1)"><img src="../images/index/i_41.png" alt="" name="Image83" width="219" height="44" border="0" id="Image83" /></a></td>
			</tr>
			<tr>
				<td align="left" style="padding-top:25px"><img src="../images/index/facebook.png" alt="" width="219" height="27" /></td>
			</tr>
			<tr>
				<td align="left"><iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fdoublestp&amp;width=219&amp;height=320&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:219px; height:320px;" allowTransparency="true"></iframe></td>
			</tr>
		</table><p>&nbsp;</p>
	</td>
</tr>
<tr>
	<td align="left" valign="top" style="padding-left:22px">&nbsp;</td>
</tr>