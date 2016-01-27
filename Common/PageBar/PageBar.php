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
	/*if($opp=="kyw" && $kyw!=""){
		$Pg="&opp=".$opp."&kyw=".$kyw;
	}
	if($QTime!=""){
		$Pg="&QTime=".$QTime."&Qu=".$Qu;
	}*/
	if(G0!=""){
		$Pg.="&G0=".$G0;
	}
	if(G1!=""){
		$Pg.="&G1=".$G1;
	}
?>

<?php	if($PageAmount>0){?>
<div id="pagebar">
<div class="pagebox">
				<?php if($Page>1){ ?>
						
				<?php }?>
				<?php for ($i=$StartPage;$i<=$EndPage;$i++){?>
					<?php if($i!=$Page){?>
						<div class="page"><a href="<?php echo GetScriptName() . "?Page=" . $i . $OtherQuery.$Pg ?>" ><?php if($i==$EndPage){ echo $i; }else{ echo $i; } ?></a></div>			
					<?php }else{?>
						<div class="page" style="font-weight: bold;"><a href="#"><?php if($i==$EndPage){ echo $i; }else{ echo $i; } ?></a></div>	
					<?php }?>	
				<?php }?>
				<?php if ($Page < $PageAmount ){?>
							<div class="pagebox2"><a href="<?php echo GetScriptName()."?Page=".($Page + 1).$OtherQuery.$Pg ?>"><img src="images/00/icon_next.png" width="20" height="20" /></a></div>							
				<?php	}?>
</div><!-- pagebox end-->
</div><!-- pagebar end-->
<?php	}?>