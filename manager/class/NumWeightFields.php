<?php
	class NumWeightFields implements ManagerItem{
		var $WeightFieldName;
		var $WeightUnitFieldName;
		var $ShowName;
		var $NullFlag;
		var $NumLen;
		var $Numtype;
		var $DefaultValue;
		public function NumWeightFields($WeightFieldNameIn,$WeightUnitFieldNameIn,$ShowNameIn,$NullFlagIn=false,$NumLenIn,$NumtypeIn="",$DefaultValueIn=0){
			$this->WeightFieldName = $WeightFieldNameIn;
			$this->WeightUnitFieldName = $WeightUnitFieldNameIn;
			$this->ShowName = $ShowNameIn;
			$this->NullFlag = $NullFlagIn;
			$this->NumLen = $NumLenIn;
			$this->Numtype = $NumtypeIn;
			$this->DefaultValue = $DefaultValueIn;
		}
		function AddShow(){
			$Size = $this->NumLen + 2;
			if($Size>50){$Size = 50;}
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			echo "			<input type=\"text\" name=\"".$this->WeightFieldName."\" id=\"".$this->WeightFieldName."\" size=\"".$Size."\" maxlength=\"".$this->NumLen."\" value=\"".$this->DefaultValue."\"/>&nbsp;&nbsp;&nbsp;&nbsp;\n";
			echo "			<input type=\"radio\" name=\"".$this->WeightUnitFieldName."\" value=\"g\" checked=\"checked\" />&nbsp;g&nbsp;&nbsp;\n";
			echo "			<input type=\"radio\" name=\"".$this->WeightUnitFieldName."\" value=\"kg\" />&nbsp;kg&nbsp;&nbsp;\n";
			if($this->NullFlag){
			echo "			<font size=\"-1\" color=\"DarkGray\">(必填)</font>\n";
			}
			echo "		</td>\n";
			echo "	</tr>\n";
		}
		function ModifyShow(){
			global $Row;
			$Size = $this->NumLen + 2;
			if($Size>50){$Size = 50;}			
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			echo "			<input type=\"text\" name=\"".$this->WeightFieldName."\" id=\"".$this->WeightFieldName."\" size=\"".$Size."\" maxlength=\"".$this->NumLen."\" value=\"".$Row[$this->WeightFieldName]."\" />&nbsp;&nbsp;&nbsp;&nbsp;\n";
			if($Row[$this->WeightUnitFieldName] == "g"){
				echo "			<input type=\"radio\" name=\"".$this->WeightUnitFieldName."\" value=\"g\" checked=\"checked\" />&nbsp;g&nbsp;&nbsp;\n";
			}else{
				echo "			<input type=\"radio\" name=\"".$this->WeightUnitFieldName."\" value=\"g\" />&nbsp;g&nbsp;&nbsp;\n";
			}
			if($Row[$this->WeightUnitFieldName] == "kg"){
				echo "			<input type=\"radio\" name=\"".$this->WeightUnitFieldName."\" value=\"kg\" checked=\"checked\" />&nbsp;kg&nbsp;&nbsp;\n";
			}else{
				echo "			<input type=\"radio\" name=\"".$this->WeightUnitFieldName."\" value=\"kg\" />&nbsp;kg&nbsp;&nbsp;\n";			
			}
			if($this->NullFlag){
			echo "			<font size=\"-1\" color=\"DarkGray\">(必填)</font>\n";
			}
			echo "		</td>\n";
			echo "	</tr>\n";			
		}
		function ReadShow(){
			global $Row;
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;".$Row[$this->WeightFieldName]."/".$Row[$this->WeightUnitFieldName]."</td>\n";
			echo "	</tr>\n";			
		}
		function CheckScript(){
			if($this->NullFlag){
			echo "if((rtn=CheckField(\"".$this->WeightFieldName."\",\"".$this->ShowName."\",".$this->NumLen."))!=\"\"){\n";
			echo "	sError += (sError==\"\")?\"\":\"\\n\";\n";
			echo "	sError += rtn;\n";
			echo "}\n";
			}
		}
		function AddScript(){
			echo "<script language=\"javascript\" type=\"text/javascript\">\n";
			echo "$(function(){\n";
			if($this->Numtype ==""){
			echo "	$(\"#".$this->WeightFieldName."\").NumText();\n";
			}else{
			echo "	$(\"#".$this->WeightFieldName."\").NumText({Dot:\".\"});\n";
			}
			echo "})\n";
			echo "</script>\n";
		}
		function ModifyScript(){
			echo "<script language=\"javascript\" type=\"text/javascript\">\n";
			echo "$(function(){\n";
			if($this->Numtype ==""){
			echo "	$(\"#".$this->WeightFieldName."\").NumText();\n";
			}else{
			echo "	$(\"".$this->WeightFieldName."\").NumText({Dot:\".\"});\n";
			}
			echo "})\n";
			echo "</script>\n";			
		}
		function ShowScript(){}
		function AddHandle(&$Param){
			global $AddFieldsSQL,$AddValuesSQL;
			$FieldValue = $_POST[$this->WeightFieldName];
			if($FieldValue==""){$FieldValue=0;}
			if($AddFieldsSQL!=""){
				$AddFieldsSQL.=",";
				$AddValuesSQL.=",";
			}
			$Param[":".$this->WeightFieldName] = $FieldValue;
			$Param[":".$this->WeightUnitFieldName] = $_POST[$this->WeightUnitFieldName];
			$AddFieldsSQL.="`".$this->WeightFieldName."`";
			$AddFieldsSQL.=",`".$this->WeightUnitFieldName."`";
			$AddValuesSQL.=":".$this->WeightFieldName;
			$AddValuesSQL.=",:".$this->WeightUnitFieldName;
		}
		function ModifyHandle(&$Param){
			global $ModifySQL;
			$FieldValue = $_POST[$this->WeightFieldName];
			if($FieldValue==""){$FieldValue=0;}
			if($ModifySQL!=""){
				$ModifySQL.=",";
			}
			$Param[":".$this->WeightFieldName] = $FieldValue;
			$Param[":".$this->WeightUnitFieldName] = $_POST[$this->WeightUnitFieldName];
			$ModifySQL.="`".$this->WeightFieldName."`= :".$this->WeightFieldName;
			$ModifySQL.=",`".$this->WeightUnitFieldName."`= :".$this->WeightUnitFieldName;
		}
		function GetDataHandle(&$data){
			$DateValue = $_POST[$this->WeightFieldName];
			if($DateValue==""){
				$DateValue = 0;
			}
			$data[$this->WeightFieldName] = $DateValue;
			$DateValue = $_POST[$this->WeightUnitFieldName];
			if($DateValue==""){
				$DateValue = "";
			}
			$data[$this->WeightUnitFieldName] = $DateValue;
		}
	}
?>