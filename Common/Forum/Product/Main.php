<td width="70%" align="left" valign="top" style="padding:15px 30px 0px 20px">
	<?php	
		if($Left=="feature"){	
			include_once("../Common/Forum/Product/Feature.php");
		}else if($Left=="specifications"){
			include_once("../Common/Forum/Product/Specifications.php");
		}
		else if($Left=="operating"){
			include_once("../Common/Forum/Product/Operating.php");
		}
	?>
</td>

