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
<tr>
	<td height="40" align="center" valign="bottom">
		<table cellpadding="0" cellspacing="0" border="0" align="center">
			<tr>
				<td>
					<?php if($Page>1){ ?>
					<div class="pagebar"><a href="<?php echo GetScriptName()."?Page=".($Page - 1).$OtherQuery ?>" title="上一頁,第<?php echo($Page - 1)?>頁" style="padding:2px 3px 0px 3px">上一頁</a></div>
					<?php }?>
					<?php for ($i=$StartPage;$i<=$EndPage;$i++){?>
						<?php if($i!=$Page){?>
							<div class="pagebar"><a href="<?php echo GetScriptName() . "?Page=" . $i . $OtherQuery ?>" title="第<?php echo $i?>頁"><?php echo $i?></a></div>
						<?php }else{?>
							<div  class="pagebar2"><a href="#" title="第 <?php echo $i?> 頁,目前所在頁"><?php echo $i?></a></div>
						<?php }?>
					<?php }?>
					<?php if ($Page < $PageAmount ){?>
					<div class="pagebar"><a href="<?php echo GetScriptName()."?Page=".($Page + 1).$OtherQuery ?>" title="下一頁,第<?php echo($Page + 1)?>頁" style="padding:2px 3px 0px 3px">下一頁</a></div>
					<?php }?>
				</td>
			</tr>
		</table>
	</td>
</tr>
