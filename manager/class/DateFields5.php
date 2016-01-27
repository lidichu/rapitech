<?php
	class DateFields5 implements ManagerItem{
		var $StartField;
		var $EndField;
		var $ShowName;
		var $NullFlag;
		var $DefaultStartValue;
		var $DefaultEndValue;
		public function DateFields5($StartFieldIn,$ShowNameIn,$NullFlagIn=false,$EndFieldIn,$DefaultStartValueIn="",$DefaultEndValueIn=""){
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
			echo "		自&nbsp;<input type=\"text\" name=\"".$this->StartField."\" id=\"".$this->StartField."\" size=\"12\" maxlength=\"255\" readonly onclick=\"WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'});\" value=\"".$this->DefaultStartValue."\"/>\n";
			echo "		&nbsp;至&nbsp;<input type=\"text\" name=\"".$this->EndField."\" id=\"".$this->EndField."\" size=\"12\" maxlength=\"255\" readonly onclick=\"WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'});\" value=\"".$this->DefaultEndValue."\"/>&nbsp;止\n";
			if($this->NullFlag){
			echo "			<font size=\"-1\" color=\"DarkGray\">(必填)</font>\n";
			}
			echo "		</td>\n";
			echo "	</tr>\n";
		}
		function ModifyShow(){
			global $Row;
			if($Row[$this->StartField] == "0000-00-00 00:00:00"){
				$DateStartValue = "";
			}else{
				$DateStartValue = strtotime($Row[$this->StartField]);
				$DateStartValue = date("Y-m-d H:i:s",$DateStartValue);
			}
			
			
			if($Row[$this->EndField] == "0000-00-00 00:00:00"){
				$DateEndValue = "";
			}else{
				$DateEndValue = strtotime($Row[$this->EndField]);
				$DateEndValue = date("Y-m-d H:i:s",$DateEndValue);
			}			
			
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			echo "		自&nbsp;<input type=\"text\" name=\"".$this->StartField."\" id=\"".$this->StartField."\" size=\"12\" maxlength=\"255\" readonly onclick=\"WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'});\" value=\"".$DateStartValue."\"/>\n";
			echo "		&nbsp;至&nbsp;<input type=\"text\" name=\"".$this->EndField."\" id=\"".$this->EndField."\" size=\"12\" maxlength=\"255\" readonly onclick=\"WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'});\" value=\"".$DateEndValue."\"/>&nbsp;止\n";
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
			echo ("if( $(\"#".$this->StartField."\").val() == \"\" || $(\"#".$this->EndField."\").val() == \"\"){\n");
			echo ("	sError += (sError==\"\")?\"\":\"\\n\";\n");
			echo "	sError += \"．『".$this->ShowName."』不可為空值\";\n";
			echo ("}\n");
			}
		}
		function AddScript(){}
		function ModifyScript(){}
		function ShowScript(){}
		function AddHandle(&$Param){
			global $AddFieldsSQL,$AddValuesSQL;
			$DateStartValue = $_POST[$this->StartField];
			if($DateStartValue==""){
				$DateStartValue = "0000-00-00 00:00:00";
			}
			$DateEndValue = $_POST[$this->EndField];
			if($DateEndValue==""){
				$DateEndValue = "0000-00-00 00:00:00";
			}			
			$DateStartValueD = strtotime($DateStartValue);
			$DateEndValueD = strtotime($DateEndValue);
			if($DateStartValueD > $DateEndValueD){
				$DateTempValue = $DateStartValue;
				$DateStartValue = $DateEndValue;
				$DateEndValue = $DateTempValue;
			}
			if($AddFieldsSQL!=""){
				$AddFieldsSQL.=",";
				$AddValuesSQL.=",";
			}
			$Param[":".$this->StartField] = $DateStartValue;
			$Param[":".$this->EndField] = $DateEndValue;
			$AddFieldsSQL.="`".$this->StartField."`,`".$this->EndField."`";
			$AddValuesSQL.=":".$this->StartField.", :".$this->EndField;
		}
		function ModifyHandle(&$Param){
			global $ModifySQL;
			$DateStartValue = $_POST[$this->StartField];
			if($DateStartValue==""){
				$DateStartValue = "0000-00-00 00:00:00";
			}
			$DateEndValue = $_POST[$this->EndField];
			if($DateEndValue==""){
				$DateEndValue = "0000-00-00 00:00:00";
			}
			$DateStartValueD = strtotime($DateStartValue);
			$DateEndValueD = strtotime($DateEndValue);
			if($DateStartValueD > $DateEndValueD){
				$DateTempValue = $DateStartValue;
				$DateStartValue = $DateEndValue;
				$DateEndValue = $DateTempValue;
			}
			if($ModifySQL!=""){
				$ModifySQL.=",";
			}
			$Param[":".$this->StartField] = $DateStartValue;
			$Param[":".$this->EndField] = $DateEndValue;
			$ModifySQL.="`".$this->StartField."`= :".$this->StartField.",`".$this->EndField."` = :".$this->EndField;
		}
		function GetDataHandle(&$data){
			$DateStartValue = $_POST[$this->StartField];
			if($DateStartValue==""){
				$DateStartValue = "0000-00-00 00:00:00";
			}
			$DateEndValue = $_POST[$this->EndField];
			if($DateEndValue==""){
				$DateEndValue = "0000-00-00 00:00:00";
			}
			if(strtotime($DateStartValue) > strtotime($DateEndValue )){
				$DateTemp = $DateStartValue;
				$DateStartValue = $DateEndValue;
				$DateEndValue = $DateTemp;
			}
			$data[$this->StartField] = $DateStartValue;
			$data[$this->EndField] = $DateEndValue;
		}
	}
?>