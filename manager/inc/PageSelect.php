<?php
function PageSelect($PageObjName){
	global $Page,$PageCount;
	echo "<font face=\"Arial\" size=\"2\" color=\"#333333\">\n";
	echo "<select onchange=\"JumpPage('".GetSCRIPTNAME()."',this.value,window.document.forms.form1.".$PageObjName.")\" size=\"1\" name=\"D1\">\n";
	if($PageCount==0){
		echo "<option value=\"1\">第1頁 </option>\n";
	}else{
		for($i=1;$i<=$PageCount;$i++){
			if($i==$Page){
				echo "<option value=\"".$i."\" selected=\"selected\">第".$i."頁</option>\n";
			}else{
				echo "<option value=\"".$i."\">第".$i."頁</option>\n";
			}	
		}
	}
	echo "</select>\n";
	echo "</font>\n";
	echo "<font size=\"2\" face=\"Arial\" color=\"#808080\"> | 第".$Page."/".$PageCount."頁 | 共".$PageCount."頁 |  </font>\n";
}
?>