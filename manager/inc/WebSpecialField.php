<?php	
	if(strtolower($FieldName) == strtolower("TelMobile")){
		$GoView = true;
		echo "<td align=\"center\">\n";
		echo($Row[$FieldName]);
		if($FirstFieldFlag){
			echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>";
			$FirstFieldFlag = false;
		}
		echo "</td>\n";
	}else if(strtolower($FieldName) == strtolower("LoginIP")){
		$GoView = true;
		echo "<td align=\"center\">\n";
		echo($Row[$FieldName]);
		if($FirstFieldFlag){
			echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>";
			$FirstFieldFlag = false;
		}
		echo "</td>\n";
	}else if(strtolower($FieldName) == strtolower("CheckTeam")){
		$GoView = true;
		echo "<td align=\"center\">\n";
		echo("<input type=\"button\" onclick=\"cmdNoPass_onclick('".$Row[$FieldName]."')\" value=\"不通過\" />");
		if($FirstFieldFlag){
			echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>";
			$FirstFieldFlag = false;
		}
		echo "</td>\n";
	}else if(strtolower($FieldName) == strtolower("NoPassTeam")){
		$GoView = true;
		echo "<td align=\"center\">\n";
		echo("<input type=\"button\" onclick=\"cmdNoPassReason_onclick('".$Row[$FieldName]."')\" value=\"原因\" />");
		if($FirstFieldFlag){
			echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>";
			$FirstFieldFlag = false;
		}
		echo "</td>\n";	
		
		
	}else if(strtolower($FieldName)=="sentnewsletter"){
		$GoView = true;
		echo "<td align=\"center\">";
		echo "<a class=\"btnSend\" id=\"NewsLetter_Send.php?S=".$Row["SerialNo"]."\" href=\"#\">寄送</a>";
		if($FirstFieldFlag){
			echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>";
			$FirstFieldFlag = false;
		}						
		echo "</td>\n";
	
	}
	
	
	
?>		