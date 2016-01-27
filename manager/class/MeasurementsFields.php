<?php
	class MeasurementsFields implements ManagerItem{
		var $ChestFieldName;
		var $WaistFieldName;
		var $HipsFieldName;
		var $CupFieldName;
		var $ShowName;
		var $NullFlag;
		var $Cup;
		public function MeasurementsFields($ChestFieldNameIn,$WaistFieldNameIn,$HipsFieldNameIn,$CupFieldNameIn,$ShowNameIn,$NullFlagIn=false){
			$this->ChestFieldName = $ChestFieldNameIn;
			$this->WaistFieldName = $WaistFieldNameIn;
			$this->HipsFieldName = $HipsFieldNameIn;
			$this->CupFieldName = $CupFieldNameIn;
			$this->ShowName = $ShowNameIn;
			$this->NullFlag = $NullFlagIn;
			$this->Cup = array("A", "B", "C", "D", "E", "F", "G", "H");
		}
		function AddShow(){
			if($this->NullFlag){
				$ShowName = $this->ShowName."&nbsp;<br /><font size=\"-1\" color=\"DarkGray\">(必填)</font>&nbsp;";
			}else{
				$ShowName = $this->ShowName."&nbsp;";
			}
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$ShowName."</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			echo "			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\n";
			echo "				<tr>\n";
			echo "					<td><input type=\"text\" name=\"".$this->ChestFieldName."\" id=\"".$this->ChestFieldName."\" style=\"width:40px;\" maxlength=\"3\" value=\"\" /></td>\n";
			echo "					<td>&nbsp;-&nbsp;</td>\n";
			echo "					<td>\n";
			echo "						<select name=\"".$this->CupFieldName."\" id=\"".$this->CupFieldName."\">\n";
			echo "						<option value=\"\">上圍尺寸</option>\n";
			foreach($this->Cup as $Value){
			echo "						<option value=\"".$Value."\">".$Value."</option>\n";
			}
			echo "						</select>\n";
			echo "					</td>\n";
			echo "					<td>&nbsp;-&nbsp;</td>\n";
			echo "					<td><input type=\"text\" name=\"".$this->WaistFieldName."\" id=\"".$this->WaistFieldName."\" style=\"width:40px;\" maxlength=\"3\" value=\"\" /></td>\n";
			echo "					<td>&nbsp;-&nbsp;</td>\n";
			echo "					<td><input type=\"text\" name=\"".$this->HipsFieldName."\" id=\"".$this->HipsFieldName."\" style=\"width:40px;\" maxlength=\"3\" value=\"\" /></td>\n";
			echo "					<td></td>\n";
			echo "				</tr>\n";
			echo "			</table>\n";
			echo "		</td>\n";
			echo "	</tr>\n";
		}
		function ModifyShow(){
			global $Row;
			if($this->NullFlag){
				$ShowName = $this->ShowName."&nbsp;<br /><font size=\"-1\" color=\"DarkGray\">(必填)</font>&nbsp;";
			}else{
				$ShowName = $this->ShowName."&nbsp;";
			}
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$ShowName."</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">\n";
			echo "			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"margin-left:10px;\">\n";
			echo "				<tr>\n";
			echo "					<td><input type=\"text\" name=\"".$this->ChestFieldName."\" id=\"".$this->ChestFieldName."\" style=\"width:40px;\" maxlength=\"3\" value=\"".$Row[$this->ChestFieldName]."\" /></td>\n";
			echo "					<td>&nbsp;-&nbsp;</td>\n";
			echo "					<td>\n";
			echo "						<select name=\"".$this->CupFieldName."\" id=\"".$this->CupFieldName."\">\n";
			echo "						<option value=\"\">上圍尺寸</option>\n";
			foreach($this->Cup as $Value){
				if($Row[$this->CupFieldName] == $Value){
			echo "						<option value=\"".$Value."\" selected=\"selected\">".$Value."</option>\n";
				}else{
			echo "						<option value=\"".$Value."\">".$Value."</option>\n";
				}
			}
			echo "						</select>\n";
			echo "					</td>\n";
			echo "					<td>&nbsp;-&nbsp;</td>\n";
			echo "					<td><input type=\"text\" name=\"".$this->WaistFieldName."\" id=\"".$this->WaistFieldName."\" style=\"width:40px;\" maxlength=\"3\" value=\"".$Row[$this->WaistFieldName]."\" /></td>\n";
			echo "					<td>&nbsp;-&nbsp;</td>\n";
			echo "					<td><input type=\"text\" name=\"".$this->HipsFieldName."\" id=\"".$this->HipsFieldName."\" style=\"width:40px;\" maxlength=\"3\" value=\"".$Row[$this->HipsFieldName]."\" /></td>\n";
			echo "					<td></td>\n";
			echo "				</tr>\n";
			echo "			</table>\n";
			echo "		</td>\n";
			echo "	</tr>\n";
		}
		function ReadShow(){
			global $Row;
			$Value = $Row[$this->ChestFieldName]."-".$Row[$this->CupFieldName]."-".$Row[$this->WaistFieldName]."-".$Row[$this->HipsFieldName];
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;<span id=\"".$this->ChestFieldName."_Span\">".$Value."</span></td>\n";
			echo "	</tr>\n";			
		}
		function CheckScript(){
			if($this->NullFlag){
			echo "var ".$this->ChestFieldName."Array = new Array();\n";
			echo $this->ChestFieldName."Array.push($(\"#".$this->ChestFieldName."\").val());\n";
			echo $this->ChestFieldName."Array.push($(\"#".$this->CupFieldName."\").val());\n";
			echo $this->ChestFieldName."Array.push($(\"#".$this->WaistFieldName."\").val());\n";
			echo $this->ChestFieldName."Array.push($(\"#".$this->HipsFieldName."\").val());\n";
			echo "if((rtn=CheckFieldMutilValue(".$this->ChestFieldName."Array,\"".$this->ShowName."\"))!=\"\"){\n";
			echo "	sError += (sError==\"\")?\"\":\"\\n\";\n";
			echo "	sError += rtn;\n";
			echo "}\n";
			}
		}
		function AddScript(){
			echo "<script language=\"javascript\" type=\"text/javascript\">\n";
			echo "$(function(){\n";
			echo "	$(\"#".$this->ChestFieldName."\").NumText();\n";
			echo "	$(\"#".$this->WaistFieldName."\").NumText();\n";
			echo "	$(\"#".$this->HipsFieldName."\").NumText();\n";
			echo "})\n";
			echo "</script>\n";
		}
		function ModifyScript(){
			echo "<script language=\"javascript\" type=\"text/javascript\">\n";
			echo "$(function(){\n";
			echo "	$(\"#".$this->ChestFieldName."\").NumText();\n";
			echo "	$(\"#".$this->WaistFieldName."\").NumText();\n";
			echo "	$(\"#".$this->HipsFieldName."\").NumText();\n";
			echo "})\n";
			echo "</script>\n";			
		}
		function ShowScript(){}
		function AddHandle(&$Param){
			global $AddFieldsSQL,$AddValuesSQL;
			$ChestFieldValue = $_POST[$this->ChestFieldName];
			$WaistFieldValue = $_POST[$this->WaistFieldName];
			$HipsFieldValue = $_POST[$this->HipsFieldName];
			$CupFieldValue = $_POST[$this->CupFieldName];
			if($ChestFieldValue==""){$ChestFieldValue=0;}
			if($WaistFieldValue==""){$WaistFieldValue=0;}
			if($HipsFieldValue==""){$HipsFieldValue=0;}
			if($AddFieldsSQL!=""){ $AddFieldsSQL .= ","; }
			if($AddValuesSQL!=""){ $AddValuesSQL .= ","; }
			if($AddFieldsSQL!=""){
				$AddFieldsSQL.=",";
				$AddValuesSQL.=",";
			}
			$Param[":".$this->ChestFieldName] = $ChestFieldValue;
			$Param[":".$this->WaistFieldName] = $WaistFieldValue;
			$Param[":".$this->HipsFieldName] = $HipsFieldValue;
			$Param[":".$this->CupFieldName] = $CupFieldValue;
			$AddFieldsSQL.="`".$this->ChestFieldName."`";
			$AddFieldsSQL.=",`".$this->WaistFieldName."`";
			$AddFieldsSQL.=",`".$this->HipsFieldName."`";
			$AddFieldsSQL.=",`".$this->CupFieldName."`";
			$AddValuesSQL.=":".$this->ChestFieldName;
			$AddValuesSQL.=",:".$this->WaistFieldName;
			$AddValuesSQL.=",:".$this->HipsFieldName;
			$AddValuesSQL.=",:".$this->CupFieldName;
		}
		function ModifyHandle(&$Param){
			global $ModifySQL;
			$ChestFieldValue = $_POST[$this->ChestFieldName];
			$WaistFieldValue = $_POST[$this->WaistFieldName];
			$HipsFieldValue = $_POST[$this->HipsFieldName];
			$CupFieldValue = $_POST[$this->CupFieldName];
			if($ChestFieldValue == ""){ $ChestFieldValue = 0; }
			if($WaistFieldValue == ""){ $WaistFieldValue = 0; }
			if($HipsFieldValue == ""){ $HipsFieldValue = 0; }
			if($ModifySQL!=""){
				$ModifySQL.=",";
			}
			$Param[":".$this->ChestFieldName] = $ChestFieldValue;
			$Param[":".$this->WaistFieldName] = $WaistFieldValue;
			$Param[":".$this->HipsFieldName] = $HipsFieldValue;
			$Param[":".$this->CupFieldName] = $CupFieldValue;
			$ModifySQL.="`".$this->ChestFieldName."`= :".$this->ChestFieldName;
			$ModifySQL.=",`".$this->WaistFieldName."`= :".$this->WaistFieldName;
			$ModifySQL.=",`".$this->HipsFieldName."`= :".$this->HipsFieldName;
			$ModifySQL.=",`".$this->CupFieldName."`= :".$this->CupFieldName;
		}
		function GetDataHandle(&$data){
			$ChestFieldValue = $_POST[$this->ChestFieldName];
			$WaistFieldValue = $_POST[$this->WaistFieldName];
			$HipsFieldValue = $_POST[$this->HipsFieldName];
			$CupFieldValue = $_POST[$this->CupFieldName];
			if($ChestFieldValue == ""){ $ChestFieldValue = 0; }
			if($WaistFieldValue == ""){ $WaistFieldValue = 0; }
			if($HipsFieldValue == ""){ $HipsFieldValue = 0; }
			$data[$this->ChestFieldName] = $ChestFieldValue;
			$data[$this->WaistFieldName] = $WaistFieldValue;
			$data[$this->HipsFieldName] = $HipsFieldValue;
			$data[$this->CupFieldName] = $CupFieldValue;
		}
	}
?>