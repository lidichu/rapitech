<?php
	class DateFields2 implements ManagerItem{
		var $StartField;
		var $EndField;
		var $ShowName;
		var $NullFlag;
		var $DefaultStartValue;
		var $DefaultEndValue;
		public function DateFields2($StartFieldIn,$ShowNameIn,$NullFlagIn=false,$EndFieldIn,$DefaultStartValueIn="",$DefaultEndValueIn=""){
			$this->StartField = $StartFieldIn;
			$this->EndField = $EndFieldIn;
			$this->ShowName = $ShowNameIn;
			$this->NullFlag = $NullFlagIn;
			$this->DefaultStartValue = $DefaultStartValueIn;
			$this->DefaultEndValue = $DefaultEndValueIn;
		}
		function AddShow(){
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			echo "		自&nbsp;<input type=\"text\" name=\"".$this->StartField."\" id=\"".$this->StartField."\" size=\"12\" maxlength=\"255\" readonly onclick=\"WdatePicker();\" value=\"".$this->DefaultStartValue."\"/>\n";
			echo "		&nbsp;至&nbsp;<input type=\"text\" name=\"".$this->EndField."\" id=\"".$this->EndField."\" size=\"12\" maxlength=\"255\" readonly onclick=\"WdatePicker();\" value=\"".$this->DefaultEndValue."\"/>&nbsp;止\n";
			if($this->NullFlag){
			echo "			<font size=\"-1\" color=\"DarkGray\">(必填)</font>\n";
			}
			echo "		</td>\n";
			echo "	</tr>\n";
		}
		function ModifyShow(){
			global $Row;
			$DateArray = explode("-",$Row[$this->StartField]);
			if($DateArray[0] == "0000" || $DateArray[0] == ""){
				$DateStartValue = "";
			}else{
				$DateStartValue = date("Y-m-d",strtotime($Row[$this->StartField]));
			}
			$DateArray = explode("-",$Row[$this->EndField]);
			
			if($DateArray[0] == "0000" || $DateArray[0] == ""){
				$DateEndValue = "";
			}else{
				$DateEndValue = date("Y-m-d",strtotime($Row[$this->EndField]));
			}			
			
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			echo "		自&nbsp;<input type=\"text\" name=\"".$this->StartField."\" id=\"".$this->StartField."\" size=\"12\" maxlength=\"255\" readonly onclick=\"WdatePicker();\" value=\"".$DateStartValue."\"/>\n";
			echo "		&nbsp;至&nbsp;<input type=\"text\" name=\"".$this->EndField."\" id=\"".$this->EndField."\" size=\"12\" maxlength=\"255\" readonly onclick=\"WdatePicker();\" value=\"".$DateEndValue."\"/>&nbsp;止\n";
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
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;自&nbsp;".$Row[$this->StartField]."&nbsp;至&nbsp;".$Row[$this->EndField]."&nbsp;止</td>\n";
			echo "	</tr>\n";			
		}
		function CheckScript(){
			if($this->NullFlag){
			echo "if((rtn=CheckField(\"".$this->StartField."\",\"".$this->ShowName."\",255))!=\"\"){\n";
			echo "	sError += (sError==\"\")?\"\":\"\\n\";\n";
			echo "	sError += rtn;\n";
			echo "}else{\n";
			echo "	if((rtn=CheckField(\"".$this->EndField."\",\"".$this->ShowName."\",255))!=\"\"){\n";
			echo "		sError += (sError==\"\")?\"\":\"\\n\";\n";
			echo "		sError += rtn;\n";
			echo "	}\n";			
			echo "}\n";
			}
		}
		function AddScript(){}
		function ModifyScript(){}
		function ShowScript(){}
		function AddHandle(&$Param){
			global $AddFieldsSQL,$AddValuesSQL;
			$DateStartValue = $_POST[$this->StartField];
			if($DateStartValue==""){
				$DateStartValue = "0000-00-00";
			}
			$DateEndValue = $_POST[$this->EndField];
			if($DateEndValue==""){
				$DateEndValue = "0000-00-00";
			}			
			
			if(DateComparison($DateStartValue,$DateEndValue)==true){
				$DateTemp = $DateStartValue;
				$DateStartValue = $DateEndValue;
				$DateEndValue = $DateTemp;
			}
			if($AddFieldsSQL!=""){
				$AddFieldsSQL.=",";
				$AddValuesSQL.=",";
			}
			$Param[":".$this->StartField] = $DateStartValue;
			$Param[":".$this->EndField] = $DateEndValue;
			$AddFieldsSQL.="`".$this->StartField."`,`".$this->EndField."`";
			$AddValuesSQL.=":".$this->StartField.",:".$this->EndField;
		}
		function ModifyHandle(&$Param){
			global $ModifySQL;
			$DateStartValue = $_POST[$this->StartField];
			if($DateStartValue==""){
				$DateStartValue = "0000-00-00";
			}
			$DateEndValue = $_POST[$this->EndField];
			if($DateEndValue==""){
				$DateEndValue = "0000-00-00";
			}
			if(DateComparison($DateStartValue,$DateEndValue)==true){
				$DateTemp = $DateStartValue;
				$DateStartValue = $DateEndValue;
				$DateEndValue = $DateTemp;
			}	
			if($ModifySQL!=""){
				$ModifySQL.=",";
			}
			$Param[":".$this->StartField] = $DateStartValue;
			$Param[":".$this->EndField] = $DateEndValue;
			$ModifySQL.="`".$this->StartField."`= :".$this->StartField.",`".$this->EndField."`= :".$this->EndField;
		}
		function GetDataHandle(&$data){
			$DateStartValue = $_POST[$this->StartField];
			if($DateStartValue==""){
				$DateStartValue = "0000-00-00";
			}
			$DateEndValue = $_POST[$this->EndField];
			if($DateEndValue==""){
				$DateEndValue = "0000-00-00";
			}
			if(DateComparison($DateStartValue,$DateEndValue)==true){
				$DateTemp = $DateStartValue;
				$DateStartValue = $DateEndValue;
				$DateEndValue = $DateTemp;
			}
			$data[$this->StartField] = $DateStartValue;
			$data[$this->EndField] = $DateEndValue;
		}
	}
?>