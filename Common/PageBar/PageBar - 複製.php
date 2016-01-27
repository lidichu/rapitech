<?php
	if($OtherQuery !="")
		$OtherQuery = "&" . $OtherQuery;
	$temp=$Page;
	$StartPage=1;
	$LimitPage=9;
	$EndPage=$LimitPage;
	$CenterPage=round($LimitPage/2);
	if($Page>$CenterPage){
		$StartPage=$StartPage+($Page-$CenterPage);
		$EndPage=$EndPage+($Page-$CenterPage);
	}
	if($PageAmount<=$LimitPage){		
		$StartPage=1;
		$EndPage=$LimitPage;
	}
	if ($EndPage > $PageAmount){ 
		$EndPage=$PageAmount;
	}
	if($opp=="kyw" && $kyw!=""){
		$Pg="&opp=".$opp."&kyw=".$kyw;
	}
	if($QTime!=""){
		$Pg="&QTime=".$QTime."&Qu=".$Qu;
	}
?>
<?php	if($PageAmount>0){?>

<tr>
	<td align="center" valign="top" >
		<table border="0" cellspacing="0" cellpadding="0">
			<tr>
				<?php if($Page>1){ ?>
						<td width="40" height="40" align="left" valign="middle"><a href="<?php echo GetScriptName()."?Page=".($Page - 1).$OtherQuery.$Pg ?>">上一頁</a></td>
				<?php }?>
				<?php for ($i=$StartPage;$i<=$EndPage;$i++){?>
					<?php if($i!=$Page){?>
						<td width="20" height="40" align="center" valign="middle" ><a href="<?php echo GetScriptName() . "?Page=" . $i . $OtherQuery.$Pg ?>" ><?php if($i==$EndPage){ echo $i; }else{ echo $i."."; } ?></a></td>
					<?php }else{?>
						<td width="20" height="40" align="center" valign="middle" ><a href="#"><?php if($i==$EndPage){ echo $i; }else{ echo $i."."; } ?></a></td>
					<?php }?>	
				<?php }?>
				<?php if ($Page < $PageAmount ){?>
							<td width="43" height="40" align="right" valign="middle"><a href="<?php echo GetScriptName()."?Page=".($Page + 1).$OtherQuery.$Pg ?>">下一頁</a></td>
				<?php	}?>
			</tr>
		</table>
	</td>
</tr>
<tr>
<?php	}?>
