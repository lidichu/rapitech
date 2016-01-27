<td width="70%" align="left" valign="top" style="padding:15px 30px 0px 20px">
	<?php	
		if($Left=="about"){	
			include_once("../Common/Forum/About/About.php");
		}else if($Left=="milestone"){
			include_once("../Common/Forum/About/Milestone.php");
		}
		else if($Left=="policy"){
			include_once("../Common/Forum/About/Policy.php");
		}
	?>
</td>

