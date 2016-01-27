<?php
	class NumFields implements ManagerItem{
		var $FieldName;
		var $ShowName;
		var $NullFlag;
		var $NumLen;
		var $Numtype;
		var $DefaultValue;
		public function NumFields($FieldNameIn,$ShowNameIn,$NullFlagIn=false,$NumLenIn,$NumtypeIn="",$DefaultValueIn=0){
			$this->FieldName = $FieldNameIn;
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
			echo "			<input type=\"text\" name=\"".$this->FieldName."\" id=\"".$this->FieldName."\" size=\"".$Size."\" maxlength=\"".$this->NumLen."\" value=\"".$this->DefaultValue."\" />\n";
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
			echo "			<input type=\"text\" name=\"".$this->FieldName."\" id=\"".$this->FieldName."\" size=\"".$Size."\" maxlength=\"".$this->NumLen."\" value=\"".$Row[$this->FieldName]."\"/>\n";
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
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;<span id=\"".$this->FieldName."_Span\">".strval($Row[$this->FieldName])."</span></td>\n";
			echo "	</tr>\n";			
		}
		function CheckScript(){
			if($this->NullFlag){
			echo "if((rtn=CheckField(\"".$this->FieldName."\",\"".$this->ShowName."\",".$this->NumLen."))!=\"\"){\n";
			echo "	sError += (sError==\"\")?\"\":\"\\n\";\n";
			echo "	sError += rtn;\n";
			echo "}\n";
			}
		}
		function AddScript(){
			echo "<script language=\"javascript\" type=\"text/javascript\">\n";
			echo "$(function(){\n";
			if($this->Numtype ==""){
			echo "	$(\"#".$this->FieldName."\").NumText();\n";
			}else{
			echo "	$(\"#".$this->FieldName."\").NumText({Dot:\".\"});\n";
			}
			echo "})\n";
			echo "</script>\n";
		}
		function ModifyScript(){
			echo "<script language=\"javascript\" type=\"text/javascript\">\n";
			echo "$(function(){\n";
			if($this->Numtype ==""){
			echo "	$(\"#".$this->FieldName."\").NumText();\n";
			}else{
			echo "	$(\"#".$this->FieldName."\").NumText({Dot:\".\"});\n";
			}
			echo "})\n";
			echo "</script>\n";			
		}
		function ShowScript(){}
		function AddHandle(&$Param){
			global $AddFieldsSQL,$AddValuesSQL;
			$FieldValue = $_POST[$this->FieldName];
			if($FieldValue==""){$FieldValue=0;}
			if($AddFieldsSQL!=""){
				$AddFieldsSQL.=",";
				$AddValuesSQL.=",";
			}
			$Param[":".$this->FieldName] = $FieldValue;
			$AddFieldsSQL.="`".$this->FieldName."`";
			$AddValuesSQL.=":".$this->FieldName;
		}
		function ModifyHandle(&$Param){
			global $ModifySQL;
			$FieldValue = $_POST[$this->FieldName];
			if($FieldValue==""){$FieldValue=0;}
			if($ModifySQL!=""){
				$ModifySQL.=",";
			}
			$Param[":".$this->FieldName] = $FieldValue;
			$ModifySQL.="`".$this->FieldName."`= :".$this->FieldName;
		}
		function GetDataHandle(&$data){
			$DateValue = $_POST[$this->FieldName];
			if($DateValue==""){
				$DateValue = 0;
			}
			$data[$this->FieldName] = $DateValue;
		}
	}
?>