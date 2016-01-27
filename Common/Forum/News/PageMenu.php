<tr>
	<?php
		if($BackUrl!=""&&$UpUrl!=""){
			$BackPic="images/02_news/img_07.jpg";
		}else if($BackUrl!=""){
			$BackPic="images/02_news/img_04.jpg";
		}
		else if($UpUrl!=""){
			$BackPic="images/02_news/img_08.jpg";
		}else{
			$BackPic="images/02_news/img_07.jpg";
		}
		
	?>
	<td align="right" style="padding-top:4px; background-image:url(<?php echo $BackPic?>); height:40px; background-repeat:no-repeat; background-position:bottom">
		<?php	if($lang=="Ch"){?>
		<table width="29%" border="0" align="right" cellpadding="0" cellspacing="0">
			<tr>
				<td width="58" height="38" align="left" class="page_01" style=" border-right:1px solid #CCC">
					<?php if($BackUrl!=""){?>
					<a href="<?php echo $BackUrl?>">上一頁</a>
					<?php	}?>
				</td>
				<td width="56" align="center" class="page_01" style=" border-right:1px solid #CCC">
					<a href="news_list.php?Page=<?php echo $Page?>">返回</a>
				</td>
				<td width="74" align="left" class="page_01" style="padding-left:10px">
					<?php if($UpUrl!=""){?>
					<a href="<?php echo $UpUrl?>">下一頁</a>
					<?php	}?>
				</td>
			</tr>
		</table>
		<?php	}else if($lang=="En"){?>
		<table width="29%" border="0" align="right" cellpadding="0" cellspacing="0">
			<tr>
				<td width="64" height="38" align="left" class="page_01" style=" border-right:1px solid #CCC">
					<?php if($BackUrl!=""){?>
					<a href="<?php echo $BackUrl?>">Previous</a>
					<?php	}?>
				</td>
				<td width="58" align="center" class="page_01" style=" border-right:1px solid #CCC">
					<a href="news_list.php?Page=<?php echo $Page?>">Back</a>
				</td>
				<td width="59" align="left" class="page_01" style="padding-left:10px">
					<?php if($UpUrl!=""){?>
					<a href="<?php echo $UpUrl?>">Next</a>
					<?php	}?>
				</td>
			</tr>
		</table>
		<?php	}else if($lang=="Es"){?>
		<table width="29%" border="0" align="right" cellpadding="0" cellspacing="0">
			<tr>
				<td width="53" height="38" align="left" class="page_01" style=" border-right:1px solid #CCC">
					<?php if($BackUrl!=""){?>
					<a href="<?php echo $BackUrl?>">Anterior</a>
					<?php	}?>
				</td>
				<td width="51" align="center" class="page_01" style=" border-right:1px solid #CCC">
					<a href="news_list.php?Page=<?php echo $Page?>">Volver</a>
				</td>
				<td width="84" align="left" class="page_01" style="padding-left:10px">
					<?php if($UpUrl!=""){?>
					<a href="<?php echo $UpUrl?>">Siguiente</a>
					<?php	}?>
				</td>
			</tr>
		</table>
		<?php	}else if($lang=="Ru"){?>
		<table width="35%" border="0" align="right" cellpadding="0" cellspacing="0">
			<tr>
				<td width="83" height="38" align="left" class="page_01" style=" border-right:1px solid #CCC">
					<?php if($BackUrl!=""){?>
					<a href="<?php echo $BackUrl?>">предыдущий</a>
					<?php	}?>
				</td>
				<td width="45" align="center" class="page_01" style=" border-right:1px solid #CCC">
					<a href="news_list.php?Page=<?php echo $Page?>">назад</a>
				</td>
				<td width="99" align="left" class="page_01" style="padding-left:10px">
					<?php if($UpUrl!=""){?>
					<a href="<?php echo $UpUrl?>">следующий</a>
					<?php	}?>
				</td>
			</tr>
		</table>
		<?php	}else if($lang=="It"){?>
		<table width="35%" border="0" align="right" cellpadding="0" cellspacing="0">
			<tr>
				<td width="70" height="38" align="left" class="page_01" style=" border-right:1px solid #CCC">
					<?php if($BackUrl!=""){?>
					<a href="<?php echo $BackUrl?>">Precedente</a>
					<?php	}?>
				</td>
				<td width="63" align="center" class="page_01" style=" border-right:1px solid #CCC">
					<a href="news_list.php?Page=<?php echo $Page?>">INDIETRO</a>
				</td>
				<td width="94" align="left" class="page_01" style="padding-left:10px">
					<?php if($UpUrl!=""){?>
					<a href="<?php echo $UpUrl?>">Successivo</a>
					<?php	}?>
				</td>
			</tr>
		</table>
		<?php	}else if($lang=="Fr"){?>
		<table width="30%" border="0" align="right" cellpadding="0" cellspacing="0">
			<tr>
				<td width="68" height="38" align="left" class="page_01" style=" border-right:1px solid #CCC">
					<?php if($BackUrl!=""){?>
					<a href="<?php echo $BackUrl?>">Precedent</a>
					<?php	}?>
				</td>
				<td width="57" align="center" class="page_01" style=" border-right:1px solid #CCC">
					<a href="news_list.php?Page=<?php echo $Page?>">Arriere</a>
				</td>
				<td width="69" align="left" class="page_01" style="padding-left:10px">
					<?php if($UpUrl!=""){?>
					<a href="<?php echo $UpUrl?>">Suivant</a>
					<?php	}?>
				</td>
			</tr>
		</table>
		<?php	}?>
	</td>
</tr>

