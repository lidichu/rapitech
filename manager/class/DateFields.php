<?php
	class DateFields implements ManagerItem{
		var $FieldName;
		var $ShowName;
		var $NullFlag;
		var $DefaultValue;
		public function DateFields($FieldNameIn,$ShowNameIn,$NullFlagIn=false,$DefaultValueIn=""){
			$this->FieldName = $FieldNameIn;
			$this->ShowName = $ShowNameIn;
			$this->NullFlag = $NullFlagIn;
			$this->DefaultValue = $DefaultValueIn;
		}
		function AddShow(){
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			if($this->NullFlag){
			echo "			<input type=\"text\" name=\"".$this->FieldName."\" id=\"".$this->FieldName."\" size=\"12\" maxlength=\"255\" readonly onclick=\"WdatePicker({isShowClear:false,readOnly:true});\" value=\"".$this->DefaultValue."\"/>\n";			
			}else{
			echo "			<input type=\"text\" name=\"".$this->FieldName."\" id=\"".$this->FieldName."\" size=\"12\" maxlength=\"255\" readonly onclick=\"WdatePicker();\" value=\"".$this->DefaultValue."\"/>\n";			
			}
			if($this->NullFlag){
			echo "			<font size=\"-1\" color=\"DarkGray\">(必填)</font>\n";
			}
			echo "		</td>\n";
			echo "	</tr>\n";
		}
		function ModifyShow(){
			global $Row;
			$DateArray = explode("-",$Row[$this->FieldName]);
			if($DateArray[0] == "0000" || $DateArray[0] == ""){
				$DateValue = "";
			}else{
				$DateValue = date("Y-m-d",strtotime($Row[$this->FieldName]));
			}
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			if($this->NullFlag){
			echo "			<input type=\"text\" name=\"".$this->FieldName."\" id=\"".$this->FieldName."\" size=\"12\" maxlength=\"255\" readonly onclick=\"WdatePicker({isShowClear:false,readOnly:true});\" value=\"".$DateValue."\"/>\n";			
			}else{
			echo "			<input type=\"text\" name=\"".$this->FieldName."\" id=\"".$this->FieldName."\" size=\"12\" maxlength=\"255\" readonly onclick=\"WdatePicker();\" value=\"".$DateValue."\"/>\n";			
			}
			if($this->NullFlag){
			echo "			<font size=\"-1\" color=\"DarkGray\">(必填)</font>\n";
			}
			echo "		</td>\n";
			echo "	</tr>\n";			
		}
		function ReadShow(){
			global $Row;
			$DateArray = explode("-",$Row[$this->FieldName]);
			if($DateArray[0] == "0000" || $DateArray[0] == ""){
				$ShowValue = "";
			}else{
				$ShowValue = date("Y-m-d",strtotime($Row[$this->FieldName]));
			}
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;".$ShowValue."</td>\n";
			echo "	</tr>\n";			
		}
		function CheckScript(){
			if($this->NullFlag){
			echo "if((rtn=CheckField(\"".$this->FieldName."\",\"".$this->ShowName."\",255))!=\"\"){\n";
			echo "	sError += (sError==\"\")?\"\":\"\\n\";\n";
			echo "	sError += rtn;\n";
			echo "}\n";
			}
		}
		function AddScript(){}
		function ModifyScript(){}
		function ShowScript(){}
		function AddHandle(&$Param){
			global $AddFieldsSQL,$AddValuesSQL;
			$DateValue = $_POST[$this->FieldName];
			if($DateValue==""){
				$DateValue = "0000-00-00";
			}
			if($AddFieldsSQL!=""){
				$AddFieldsSQL.=",";
				$AddValuesSQL.=",";
			}
			$Param[":".$this->FieldName] = $DateValue;
			$AddFieldsSQL.="`".$this->FieldName."`";
			$AddValuesSQL.=":".$this->FieldName;
		}
		function ModifyHandle(&$Param){
			global $ModifySQL;
			$DateValue = $_POST[$this->FieldName];
			if($DateValue==""){
				$DateValue = "0000-00-00";
			}
			if($ModifySQL!=""){
				$ModifySQL.=",";
			}
			$Param[":".$this->FieldName] = $DateValue;
			$ModifySQL.="`".$this->FieldName."`= :".$this->FieldName;
		}
		function GetDataHandle(&$data){
			$DateValue = $_POST[$this->FieldName];
			if($DateValue==""){
				$DateValue = "0000-00-00";
			}
			$data[$this->FieldName] = $DateValue;
		}
	}
?>