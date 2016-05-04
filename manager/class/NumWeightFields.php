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
		function AddHandle(){
			global $AddFieldsSQL,$AddValuesSQL;
			$FieldValue = $_POST[$this->WeightFieldName];
			if($FieldValue==""){$FieldValue=0;}
			if($AddFieldsSQL!=""){$AddFieldsSQL.=",";}
			$AddFieldsSQL.="`".$this->WeightFieldName."`,`".$this->WeightUnitFieldName."`";
			if($AddValuesSQL!=""){$AddValuesSQL.=",";}
			$AddValuesSQL.= $FieldValue.",'".$_POST[$this->WeightUnitFieldName]."'";
		}
		function ModifyHandle(){
			global $ModifySQL;
			$FieldValue = $_POST[$this->WeightFieldName];
			if($FieldValue==""){$FieldValue=0;}
			if($ModifySQL!=""){$ModifySQL.=",";}
			$ModifySQL.="`".$this->WeightFieldName."`=".$FieldValue.",`".$this->WeightUnitFieldName."`='".$_POST[$this->WeightUnitFieldName]."'";
		}
	}
?>