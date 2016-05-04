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
			$DateValue = strtotime($Row[$this->FieldName]);
			if(date("Y",$DateValue)=="0000"||$DateValue==""){
				$DateValue = "";
			}else{
				$DateValue = date("Y-m-d",$DateValue);
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
			if(date("Y",strtotime($Row[$this->FieldName])) == 1970){
				$ShowValue = "";
			}else{
				$ShowValue = $Row[$this->FieldName];
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
		function AddHandle(){
			global $AddFieldsSQL,$AddValuesSQL;
			$DateValue = $_POST[$this->FieldName];
			if($DateValue==""){
				$DateValue = "0000-00-00";
			}
			if($AddFieldsSQL!=""){$AddFieldsSQL.=",`".$this->FieldName."`";}else{$AddFieldsSQL.="`".$this->FieldName."`";}
			if($AddValuesSQL!=""){$AddValuesSQL.=",'".$DateValue."'";}else{$AddValuesSQL.="'".$DateValue."'";}
		}
		function ModifyHandle(){
			global $ModifySQL;
			$DateValue = $_POST[$this->FieldName];
			if($DateValue==""){
				$DateValue = "0000-00-00";
			}
			if($ModifySQL!=""){$ModifySQL.=",`".$this->FieldName."`='".$DateValue."'";}else{$ModifySQL.="`".$this->FieldName."`='".$DateValue."'";}
		}
	}
?>