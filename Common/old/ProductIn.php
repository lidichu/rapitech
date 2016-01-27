<script type="text/javascript">
var p = '../files/Product/ProductBig/';

$(function(){
	var LoginView = '<?php echo ($IsLogin); ?>';
	$('#Carsubmit').click(function() {
		if(!LoginView){
			alert("請先登入會員");
			return false;
		}
		
		var Sz = document.getElementById("SelectSize");
		var SelectSize = Sz.options[Sz.selectedIndex].value;
		var Num = document.getElementById("SelectNum");
		var SelectNum = Num.options[Num.selectedIndex].value;
		var PID = '<?php echo ($Temp_Product["ProductID"]); ?>';
		
		var options = {
			opp : "Car_Add",
			PrdSn : PID,
			PrdSz : SelectSize,
			PrdNum : SelectNum
		}
		$.post(Ajax_Url,options,function(data){
			data = $.parseJSON(data);
			if(data.Err !=""){
				alert(data.Err);
			}else{
				alert("加入購物車成功");					
			}
		});
		return false;
	});
	// 點圖放大
	$('.BigImg').click(function() {
		$("#imgBig").html("<img src='"+p+$(this).attr("data-pic")+"' width=\"400\" height=\"400\" />");
		return false;
	});
});
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<?php
		if($Temp_Product_Img["PICHidden"]==""){
		$PIC="images/product/nopic_400.jpg";
		}else{
		$PIC="../files/Product/ProductBig/".$Temp_Product_Img["PICHidden"];
		}
		?>
		<td width="46%" align="left" valign="top" id="imgBig"><img src="<?php echo ($PIC); ?>" width="400" height="400" /></td>
		<td width="3%" align="left" valign="top">&nbsp;</td>
		<td width="51%" align="left" valign="top">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td align="left" valign="top">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="58%" align="left" valign="top">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td align="left" valign="top" class="gray_6"><?php echo ($Temp_Product["ProductName"]); ?></td>
										</tr>
										<tr>
											<td height="30" align="left" valign="middle">商品編號：<?php echo ($Temp_Product["ProductID"]); ?></td>
										</tr>
									</table>
								</td>
								<td width="14%" align="right" valign="top" class="red_4">NT$</td>
								<td width="28%" align="left" valign="top" class="red_3" style="padding-top:5px; font-family: Arial, Verdana, Helvetica, sans-serif; font-weight: bold;"><?php echo ($Temp_Product["ProductPrice"]); ?></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td align="left" valign="top">&nbsp;</td>
				</tr>
				<tr>
					<td align="left" valign="top"><hr  size="1px"  color="#eeeeee"/></td>
				</tr>
				<tr>
					<td align="left" valign="top">&nbsp;</td>
				</tr>
				<tr>
					<td align="left" valign="top">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<?php
									$Param=array(
										"Status" => "上架",
										"G1" => $P
									);
									$Temp_Product_Img=GetTable("product_pic","*",$Param,"Order by Sort, SerialNo");
									foreach($Temp_Product_Img as $Row){
										$Pic="../files/Product/ProductPIC/".$Row["PICHidden"];
								?>
								<td width="25%" align="center" valign="top" class="BigImg" data-pic="<?php echo($Row["PICHidden"]); ?>"><img src="<?php echo ($Pic); ?>" width="80" height="80" /></td>
								<?php
									}
								?>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td align="left" valign="top">&nbsp;</td>
				</tr>
				<tr>
					<td align="left" valign="top"><hr  size="1px"  color="#eeeeee"/></td>
				</tr>
				<tr>
					<td align="left" valign="top">&nbsp;</td>
				</tr>
				<tr>
					<td align="left" valign="top">
						<table width="100%" border="0" cellspacing="0" cellpadding="2">
							<tr>
								<td width="11%" height="35" align="left" valign="top">尺寸：</td>
								<td width="89%" height="35" align="left" valign="top"><label for="select"></label>
									<select name="SelectSize" id="SelectSize">
										<?php
											$StrSZ=$Temp_Product["SizeRange"];
											$Horizontal=false;
											$Comma=false;
											$str1 = "-";
											$str2 = ",";
											if (false !== ($rst = strpos($StrSZ, $str1))) {
												$Horizontal=true; // 有找到-
											}
											if (false !== ($rst = strpos($StrSZ, $str2))) {
												$Comma=true; // 有找到,
											}

											if($StrSZ!="" && !($Horizontal==true && $Comma==true)){
												if($Horizontal==true){
													// 橫線隔開
													$Sz=explode("-",$StrSZ);
													if((int)$Sz[0]>(int)$Sz[1]){
														$SzB=(int)$Sz[0];
														$SzS=(int)$Sz[1];
													}else{
														$SzB=(int)$Sz[1];
														$SzS=(int)$Sz[0];
													}
													for($i=$SzS;$i<=$SzB;$i++){
										?>
										<option value="<?php echo ($i); ?>"><?php echo ($i); ?></option>
										<?php
													}
												}else if($Comma==true){
													// 逗號隔開
													$Sz=explode(",",$StrSZ);
													for($i=0;$i<count($Sz);$i++){
										?>
										<option value="<?php echo ($Sz[$i]); ?>"><?php echo ($Sz[$i]); ?></option>
										<?php
													}
												}else{
												// 零碼
										?>
										<option value="<?php echo ($StrSZ); ?>"><?php echo ($StrSZ); ?></option>
										<?php
												}
											}else{
										?>		
										<option value="請選擇">請選擇</option>
										<?php		
											}
										?>
									</select>&nbsp; 吋
								</td>
							</tr>
							<tr>
								<td height="35" align="left" valign="top">數量：</td>
								<td height="35" align="left" valign="top">
									<select name="SelectNum" id="SelectNum">
										<?php
											for($i=1;$i<=10;$i++){
										?>
										<option value="<?php echo ($i); ?>"><?php echo ($i); ?></option>
										<?php
											}
										?>
									</select>&nbsp; 件
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td height="60" align="right" valign="bottom">
						<input name="Carsubmit" type="image" id="Carsubmit" src="images/icon_1.png" width="153" height="37" border="0" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Carsubmit','','images/icon_1_over.png',1)"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>