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
			$DateStartValue = strtotime($Row[$this->StartField]);
			if(date("Y",$DateStartValue)=="0000"){
				$DateStartValue = "";
			}else{
				$DateStartValue = date("Y-m-d",$DateStartValue);
			}
			
			$DateEndValue = strtotime($Row[$this->EndField]);
			if(date("Y",$DateEndValue)=="0000"){
				$DateEndValue = "";
			}else{
				$DateEndValue = date("Y-m-d",$DateEndValue);
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
		function AddHandle(){
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
			
			if($AddFieldsSQL!=""){$AddFieldsSQL.=",`".$this->StartField."`,`".$this->EndField."`";}else{$AddFieldsSQL.="`".$this->StartField."`,`".$this->EndField."`";}
			if($AddValuesSQL!=""){$AddValuesSQL.=",'".$DateStartValue."','".$DateEndValue."'";}else{$AddValuesSQL.="'".$DateStartValue."','".$DateEndValue."'";}
		}
		function ModifyHandle(){
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
			if($ModifySQL!=""){$ModifySQL.=",`".$this->StartField."`='".$DateStartValue."',`".$this->EndField."`='".$DateEndValue."'";}else{$ModifySQL.="`".$this->StartField."`='".$DateStartValue."',`".$this->EndField."`='".$DateEndValue."'";}
		}
	}
?>