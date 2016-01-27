<?php
	class URLFields implements ManagerItem{
		var $FieldName;
		var $ShowName;
		var $NullFlag;
		var $TitleField;
		public function URLFields($FieldNameIn,$ShowNameIn,$NullFlagIn=false,$TitleFieldIn){
			$this->FieldName = $FieldNameIn;
			$this->ShowName = $ShowNameIn;
			$this->NullFlag = $NullFlagIn;
			$this->TitleField = $TitleFieldIn;
		}
		function AddShow(){
			echo  "	<tr>\n";
			echo  "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo  "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;\n";
			if($this->TitleField !=""){
			echo  "		&nbsp;&nbsp;網址標題：<input type=\"text\" name=\"".$this->TitleField."\" id=\"".$this->TitleField."\" size=\"41\" maxlength=\"255\" value=\"\"><br/>\n";
			}
			echo  "		&nbsp;&nbsp;網&nbsp;&nbsp;&nbsp&nbsp;&nbsp;址：<input type=\"text\" name=\"".$this->FieldName."\" id=\"".$this->FieldName."\" size=\"41\" maxlength=\"255\" value=\"http://\">\n";
			if($this->NullFlag){
			echo "			<font size=\"-1\" color=\"DarkGray\">(必填)</font>\n";
			}
			echo  "		</td>\n";
			echo  "	</tr>\n";			
		}
		function AddShowTiny(){
			if($this->TitleField !=""){
			echo  "		&nbsp;&nbsp;網址標題：<input type=\"text\" name=\"".$this->TitleField."\" id=\"".$this->TitleField."\" size=\"41\" maxlength=\"255\" value=\"\"><br/>\n";
			}
			echo  " <input type=\"text\" name=\"".$this->FieldName."\" id=\"".$this->FieldName."\" size=\"16\" maxlength=\"255\" value=\"http://\">\n";
			if($this->NullFlag){
			echo "			<font size=\"-1\" color=\"DarkGray\">(必填)</font>\n";
			}
		}		
		function ModifyShow(){
			global $Row;
			echo  "	<tr>\n";
			echo  "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo  "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;\n";
			if($this->TitleField !=""){
			echo  "		&nbsp;&nbsp;網址標題：<input type=\"text\" name=\"".$this->TitleField."\" id=\"".$this->TitleField."\" size=\"41\" maxlength=\"255\" value=\"".$Row[$this->TitleField]."\"><br/>\n";
			}
			if($Row[$this->FieldName]!=""){
			echo  "	&nbsp;&nbsp;網&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址：<input type=\"text\" name=\"".$this->FieldName."\" id=\"".$this->FieldName."\" size=\"41\" maxlength=\"255\" value=\"".$Row[$this->FieldName]."\"/>\n";
			}else{
			echo  "	&nbsp;&nbsp;網&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址：<input type=\"text\" name=\"".$this->FieldName."\" id=\"".$this->FieldName."\" size=\"41\" maxlength=\"255\" value=\"http://\"/>\n";				
			}
			if($this->NullFlag){
			echo "			<font size=\"-1\" color=\"DarkGray\">(必填)</font>\n";
			}
			echo  "		</td>\n";
			echo  "	</tr>\n";			
		}
		function ModifyShowTiny(){
			global $Row;
			if($this->TitleField !=""){
			echo  "		&nbsp;&nbsp;網址標題：<input type=\"text\" name=\"".$this->TitleField."\" id=\"".$this->TitleField."\" size=\"41\" maxlength=\"255\" value=\"".$Row[$this->TitleField]."\"><br/>\n";
			}
			if($Row[$this->FieldName]!=""){
			echo  " <input type=\"text\" name=\"".$this->FieldName."\" id=\"".$this->FieldName."\" size=\"16\" maxlength=\"255\" value=\"".$Row[$this->FieldName]."\"/>\n";
			}else{
			echo  " <input type=\"text\" name=\"".$this->FieldName."\" id=\"".$this->FieldName."\" size=\"16\" maxlength=\"255\" value=\"http://\"/>\n";				
			}
			if($this->NullFlag){
			echo "			<font size=\"-1\" color=\"DarkGray\">(必填)</font>\n";
			}
		}		
		function ReadShow(){
			global $Row;
			echo  "	<tr>\n";
			echo  "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo  "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">\n";
			if($Row[$this->FieldName]!=""){
				if($this->TitleField !=""){
					if($Row[$this->TitleField]!=""){
			echo  "		&nbsp;&nbsp;<a href=\"".$Row[$this->FieldName]."\" target=\"_blank\">".$Row[$this->TitleField]."</a>\n";
					}else{
			echo  "		&nbsp;&nbsp;<a href=\"".$Row[$this->FieldName]."\" target=\"_blank\">".$Row[$this->FieldName]."</a>\n";			
					}
				}else{
			echo  "		&nbsp;&nbsp;<a href=\"".$Row[$this->FieldName]."\" target=\"_blank\">".$Row[$this->FieldName]."</a>\n";		
				}
			}
			echo  "		</td>\n";
			echo  "	</tr>\n";			
		}
		function CheckScript(){
		
			if($this->NullFlag){
			//echo "sError += (sError==\"\")?\"\":\"\\n\";\n";
			echo "sError += CheckField(\"".$this->FieldName."\",\"".$this->ShowName."\",255);\n";
			echo "sError += sError==\"\"?\"\":\"\\n\";\n";
			echo "sError += $(\"#".$this->FieldName."\").val()==\"http://\"?\"．『".$this->ShowName."』不可為空值\\n\":\"\";\n";
			}
		}
		function AddScript(){

		}
		function ModifyScript(){
	
		}
		function ShowScript(){}
		function AddHandle(&$Param){
			global $AddFieldsSQL,$AddValuesSQL;
			if($AddFieldsSQL!=""){ $AddFieldsSQL.=","; $AddValuesSQL.=","; }
			$AddFieldsSQL.="`".$this->FieldName."`";
			$AddValuesSQL.=":".$this->FieldName;
			$FieldValue = $_POST[$this->FieldName];
			if(strtolower($FieldValue) == "http://" || strtolower($FieldValue) == "https://"){ $FieldValue = ""; }
			$Param[":".$this->FieldName] = $FieldValue;
			if($this->TitleField!=""){
				$AddFieldsSQL.=",`".$this->TitleField."`";
				$AddValuesSQL.=",:".$this->TitleField;
				$TitleValue = $_POST[$this->TitleField];
				if($TitleValue == ""){ $TitleValue = $FieldValue; }
				$Param[":".$this->TitleField] = $TitleValue;
			}
		}
		function ModifyHandle(&$Param){
			global $ModifySQL;
			if($ModifySQL!=""){ $ModifySQL.=","; }
			$ModifySQL.="`".$this->FieldName."`= :".$this->FieldName;
			$FieldValue = $_POST[$this->FieldName];
			if(strtolower($FieldValue) == "http://" || strtolower($FieldValue) == "https://"){ $FieldValue = ""; }
			$Param[":".$this->FieldName] = $FieldValue;
			if($this->TitleField!=""){
				$ModifySQL.=",`".$this->TitleField."`= :".$this->TitleField;
				$TitleValue = $_POST[$this->TitleField];
				if($TitleValue == ""){ $TitleValue = $FieldValue; }
				$Param[":".$this->TitleField] = $TitleValue;
			}
		}
		function GetDataHandle(&$data){
			$TitleValue = $_POST[$this->TitleField];
			$FieldValue = $_POST[$this->FieldName];
			if(strtolower($FieldValue)=="http://"){
				$FieldValue = "";
			}
			$data[$this->TitleField] = $TitleValue;
			$data[$this->FieldName] = $FieldValue;
		}
	}
?>