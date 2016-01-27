<?php ob_start(); ?>
<?php include_once('../../../PageHeadch.php');?>
<?php
	$TitleArray["Ch"]=Array("Text1"=>"電話","Text2"=>"傳真","Text3"=>"聯絡人","Text4"=>"e-mail","Text5"=>"網址");
	$TitleArray["En"]=Array("Text1"=>"Tel","Text2"=>"Fax","Text3"=>"Attn","Text4"=>"e-mail","Text5"=>"web");
	$TitleArray["Es"]=Array("Text1"=>"teléfono","Text2"=>"Fax","Text3"=>"Contacto","Text4"=>"e-mail","Text5"=>"web");
	$TitleArray["Ru"]=Array("Text1"=>"Tel","Text2"=>"Fax","Text3"=>"Attn","Text4"=>"e-mail","Text5"=>"web");
	$TitleArray["It"]=Array("Text1"=>"Tel","Text2"=>"Fax","Text3"=>"Attn","Text4"=>"e-mail","Text5"=>"web");
	$TitleArray["Fr"]=Array("Text1"=>"Tel","Text2"=>"Fax","Text3"=>"À l'attention de","Text4"=>"e-mail","Text5"=>"web");
?>
<?php
	$Sn=$_REQUEST["Sn"];
	$lang=$_REQUEST["lang"];
	$Sql="select * from contact where Status='上架' and SerialNo=$Sn";
	$Rs=mysql_query($Sql,$Conn);
	if($Rs && mysql_num_rows($Rs)>0){
		$Row=mysql_fetch_array($Rs);
		if($Row["PICHidden"]){
			$Pic="../files/Contact/".$Row["PICHidden"];
		}else{
			$Pic="";
		}
		$CategoryS=$Row["Category2".$lang];
		$CompName=$Row["CompName".$lang];
		$Tel=$Row["Tel".$lang];
		$Addr=$Row["Addr".$lang];
		$Fax=$Row["Fax".$lang];
		$ContName=$Row["ContName".$lang];
		$Email=$Row["Email".$lang];
		$WebUrl=$Row["WebUrl".$lang];
?>	
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td height="19" align="left" bgcolor="#FFFFFF" style="padding:14px; border:1px solid #CCC">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<?php	if($Pic!=""){?>
				<tr>
					<td style="padding:4px" width="334" height="200"><img src="<?php echo $Pic?>"  /></td>
				</tr>
				<?php	}?>
				<tr>
					<td style="padding:10px">
						<?php	if($CategoryS!=""){?>
						<span class="title_01"><?php echo $CategoryS?></span><br />
						<?php	}?>
						<?php	if($CompName!=""){?>
						<span class="title_01"><?php echo $CompName?></span><br />
						<?php	}?>
						<?php	if($Addr!=""){?>
						<?php echo $Addr?><br />
						<?php	}?>
						<?php	if($Tel!=""){?>
						<?php echo $TitleArray[$lang]["Text1"]?>：<?php echo $Tel?><br />
						<?php	}?>
						<?php	if($Fax!=""){?>
						<?php echo $TitleArray[$lang]["Text2"]?>：<?php echo $Fax?><br />
						<?php	}?>
						<?php	if($ContName!=""){?>
						<?php echo $TitleArray[$lang]["Text3"]?>：<?php echo $ContName?><br />
						<?php	}?>
						<?php	if($Email!=""){?>
						<?php echo $TitleArray[$lang]["Text4"]?>：<a href="mailto:<?php echo $Email?>" target="_blank"><?php echo $Email?></a><br />
						<?php	}?>
						<?php	if($WebUrl!=""){?>
						<?php echo $TitleArray[$lang]["Text5"]?>：<a href="<?php echo $WebUrl?>" target="_blank"><?php echo $WebUrl?></a>
						<?php	}?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<?php
	}
?>
<?php ob_flush(); ?>

