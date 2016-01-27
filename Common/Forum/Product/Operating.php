<?php
	$Sql="select * from product where Status='上架' and SerialNo=$Sn ";
	$Rs=mysql_query($Sql,$Conn);
	if($Rs && mysql_num_rows($Rs)>0){
		$Row=mysql_fetch_array($Rs);
		$Youtube=$Row["Youtube"];
	}
	$OtherQuery="G0=G0&Sn=$Sn";
	$UrlValue="G0=$G0&Sn=$Sn";	
	$PageSize = 5;
	$Page = CheckData($_REQUEST["Page"]);
	if($Page == ""){$Page = 1;}
	$Page = intval($Page);
	$SQL = "Select Count(*) As DataAmount From productmethod where Status = '上架' and G2='$Sn'";
	$Rs = mysql_query($SQL,$Conn);
	$Row = mysql_fetch_array($Rs);
	$DataAmount = intval($Row["DataAmount"]);
	//計算分頁數量
	$PageAmount = NumHandle2($DataAmount,$PageSize) / $PageSize;
	//調整目前分頁
	if($Page > $PageAmount){$Page = $PageAmount;}
	if($Page < 1){$Page = 1;}
	$SQL = "Select * From productmethod Where Status = '上架'  and G2='$Sn' Order By Sort,SerialNo DESC limit ".(($Page-1) * $PageSize).",".$PageSize;
	$Rs = mysql_query($SQL,$Conn);
	$TitleArray["Ch"]=Array("Text1"=>"特色","Text2"=>"規格","Text3"=>"使用方法");
	$TitleArray["En"]=Array("Text1"=>"Feature","Text2"=>"Specifications","Text3"=>"Operating Instructions");
	$TitleArray["Es"]=Array("Text1"=>"Características","Text2"=>"Especificaciones","Text3"=>"Instrucciones de uso");
	$TitleArray["Ru"]=Array("Text1"=>"Характеристики","Text2"=>"Спецификация","Text3"=>"Инструкция по эксплуатации");
	$TitleArray["It"]=Array("Text1"=>"Caratteristiche","Text2"=>"Specifiche","Text3"=>"Istruzioni per l'uso");
	$TitleArray["Fr"]=Array("Text1"=>"Caractéristiques","Text2"=>"Spécifications","Text3"=>"Mode d'emploi");		
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td align="left" class="title_01" style="padding: 5px 0px 15px 0px;"><?php echo $PrdTitle?></td>
	</tr>
	<tr>
		<td valign="top">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td align="center" class="h3" style="background-image:url(images/03_product/but_01.jpg); width:177px; height:29px; background-repeat:no-repeat"><a href="product_feature.php?<?php echo $UrlValue?>"><?php echo $TitleArray[$lang]["Text1"]?></a></td>
								<td align="center" class="h3" style="background-image:url(images/03_product/but_02.jpg); width:198px; height:29px; background-repeat:no-repeat"><a href="product_specifications.php?<?php echo $UrlValue?>"><?php echo $TitleArray[$lang]["Text2"]?></a></td>
								<td align="center" class="h3" style="background-image:url(images/03_product/but_03_o.jpg); width:273px; height:29px; background-repeat:no-repeat"><a href="product_operating.php<?php echo $UrlValue?>"><?php echo $TitleArray[$lang]["Text3"]?></a></td>
							</tr>
						</table>
					</td>
				</tr>
				<?php 
					if($DataAmount > 0){
						while($Row = mysql_fetch_array($Rs)){ 
							$Note=ReplaceEditor($Row["Note"]);
							if($Row["PICHidden"]!=""){
								$Pic="../files/Product/$lang/Method/".$Row["PICHidden"];
							}else{
								$Pic="";
							}
				?>
				<tr>
					<td valign="top" bgcolor="#FFFFFF" style="border:1px solid #D9D9D9; padding:14px 18px ">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<?php	if($Pic!=""){?>
							<tr>
								<td width="600"><img src="<?php echo $Pic?>"/></td>
							</tr>
							<tr>
								<td style="border-bottom:1px solid #CCC;">&nbsp;</td>
							</tr>
							<?php	}?>
							<tr>
								<td align="left" style="padding-top:14px;"><?php echo $Note?></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td align="center">&nbsp;</td>
				</tr>
				<?php
						}
					}
				?>
				<?php	if($Page==1 && $Youtube!=""){?>
				<tr>
					<td align="center" valign="top" bgcolor="#FFFFFF" style="border:1px solid #D9D9D9; padding:14px 18px ">
						<?php  SetYoutube($Youtube,600,366,"","")?>
					</td>
				</tr>
				<?php	}?>
			</table>
		</td>
	</tr>
	<?php include_once("../Common/PageBar/PageBar.php");?>
	<tr>
		<td height="40">&nbsp;</td>
	</tr>
</table>

