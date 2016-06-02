<?php
	if($OtherQuery !="")
		$OtherQuery = "&" . $OtherQuery;
	$temp=$Page;
	$StartPage=1;
	$EndPage=9;
	while ($temp>9){
		$StartPage=$StartPage+9;
		$temp=$temp-9;
		$EndPage=$EndPage+9;
	}	
	if ($EndPage > $PageAmount) 
		$EndPage=$PageAmount;
?>
<div class="text-center ">
	<ul class="pagination">
		<?php if($Page>1){ ?>
			<li><a href="<?php echo GetScriptName()."?Page=".($Page - 1).$OtherQuery ?>" aria-label="Previous" title="上一頁,第<?php echo($Page - 1)?>頁"> <span aria-hidden="true">&laquo;</span></a></li>
		<?php }?>
		<?php for ($i=$StartPage;$i<=$EndPage;$i++){?>
			<?php if($i!=$Page){?>
				<li><a href="<?php echo GetScriptName() . "?Page=" . $i . $OtherQuery ?>" title="第<?php echo $i?>頁"><?php echo $i?></a></li>
			<?php }else{?>
				<li class="active"><a href="#" title="第 <?php echo $i?> 頁,目前所在頁"><?php echo $i?></a></li>
			<?php }?>
		<?php }?>
		<?php if ($Page < $PageAmount ){?>
			<li><a href="<?php echo GetScriptName()."?Page=".($Page + 1).$OtherQuery ?>" title="下一頁,第<?php echo($Page + 1)?>頁" aria-label="Next"> <span aria-hidden="true">&raquo;</span>
		<?php }?>
	</ul>
</div>
