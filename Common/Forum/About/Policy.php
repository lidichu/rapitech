<?php
	$TitleArray["Ch"]=Array("Text"=>"點此看擴大圖");
	$TitleArray["En"]=Array("Text"=>"Click to enlarge Figure");
	$TitleArray["Es"]=Array("Text"=>"Ver ampliar mapa");
	$TitleArray["Ru"]=Array("Text"=>"Просмотр расширить карту");
	$TitleArray["It"]=Array("Text"=>"Mostra per espandere la mappa");
	$TitleArray["Fr"]=Array("Text"=>"Voir à élargir la carte");
?>
<script type="text/javascript">
$(function(){
	$(".lightbox").lightBox();
	$("#BigPic").click(function(){
		$(".lightbox").click();
		return false;
	});
});
</script>
<?php 
	$Sql="select * from policy where Lang='$lang'";
	$Rs=mysql_query($Sql,$Conn);
	if($Rs && mysql_num_rows($Rs)>0){
		$Row=mysql_fetch_array($Rs);
		$Note=ReplaceEditor($Row["Note"]);
		$Title=$Row["Title"];
		$Note2=$Row["Note2"];
		if($Row["PICHidden"]!=""){
			$Pic="../files/Policy/Small/".$Row["PICHidden"];
			$BigPic="../files/Policy/Big/".$Row["PICHidden"];
		}else{
			$Pic="";
			$BigPic="";
		}
	}
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td class="title_01" style="padding: 5px 0px 15px 0px; border-bottom:1px dotted #999"><?php echo $MainTitle?></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td align="left" valign="top" ><?php echo $Note?></td>	
	</tr>
	<tr>
		<td height="36">&nbsp;</td>
	</tr>
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td height="32" style="font-size:18px; font-family:Arial, Helvetica, sans-serif; color:#2e2e2e; border-bottom:1px solid #c6c6c6 "><?php echo $Title?></td>
				</tr>
				<tr>
					<td valign="top" style="padding-top:18px;">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="57%" valign="top" style="padding-right:32px;">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td><?php echo $Note2?></td>
										</tr>
										<tr>
											<td align="right" style="padding-top:25px">
												<table  border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td  width="20" align="right"><img src="images/01_company/img_07.jpg" width="20" height="20" /></td>
														<td align="right"><a id="BigPic" href="#" style="color:#F90"><?php echo $TitleArray[$lang]["Text"]?> &gt;</a></td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
								<td width="43%" valign="top">
									<a class="lightbox" href="<?php echo $BigPic?>" target="_blank">
									<img src="<?php echo $Pic?>" width="267" height="358" border="0" /></a>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td height="40">&nbsp;</td>
	</tr>
</table>

