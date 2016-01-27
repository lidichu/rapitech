<?php
	class DateMDFields implements ManagerItem{
		var $FieldName1;
		var $FieldName2;
		var $ShowName;
		var $NullFlag;
		var $DefaultValue;
		public function DateMDFields($FieldName1In,$FieldName2In,$ShowNameIn,$NullFlagIn=false,$DefaultValueIn=""){
			$this->FieldName1 = $FieldName1In;
			$this->FieldName2 = $FieldName2In;
			$this->ShowName = $ShowNameIn;
			$this->NullFlag = $NullFlagIn;
			$this->DefaultValue = $DefaultValueIn;
		}
		function AddShow(){
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">\n";
			echo "			<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
			echo "				<tr>\n";
			echo "					<td align=\"left\">\n";
			echo "						<select id=\"".$this->FieldName1."\" name=\"".$this->FieldName1."\">\n";
			echo "							<option value=\"\">請選擇</option>\n";
			echo "						</select>\n";
			echo "					</td>\n";
			echo "					<td align=\"left\">&nbsp;&nbsp;月</td>\n";
			echo "					<td align=\"left\">\n";
			echo "						<select id=\"".$this->FieldName2."\" name=\"".$this->FieldName2."\">\n";
			echo "							<option value=\"\">請選擇</option>\n";
			echo "						</select>\n";
			echo "					</td>\n";
			echo "					<td align=\"left\">&nbsp;&nbsp;日</td>\n";
			echo "				</tr>\n";
			echo "			</table>\n";
			if($this->NullFlag){
			echo "			<font size=\"-1\" color=\"DarkGray\">(必填)</font>\n";
			}
			echo "		</td>\n";
			echo "	</tr>\n";
		}
		function ModifyShow(){
			global $Row;
			$DateValue1 = strtotime($Row[$this->FieldName1]);
			$DateValue2 = strtotime($Row[$this->FieldName2]);
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			echo "			<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
			echo "				<tr>\n";
			echo "					<td align=\"left\">&nbsp;&nbsp;\n";
			echo "						<select id=\"".$this->FieldName1."\" name=\"".$this->FieldName1."\">\n";
			echo "							<option value=\"\">請選擇</option>\n";
			echo "						</select>\n";
			echo "					</td>\n";
			echo "					<td align=\"left\">&nbsp;&nbsp;月</td>\n";
			echo "					<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			echo "						<select id=\"".$this->FieldName2."\" name=\"".$this->FieldName2."\">\n";
			echo "							<option value=\"\">請選擇</option>\n";
			echo "						</select>\n";
			echo "					</td>\n";
			echo "					<td align=\"left\">&nbsp;&nbsp;日</td>\n";
			echo "				</tr>\n";
			echo "			</table>\n";
			echo "		</td>\n";
			echo "	</tr>\n";			
		}
		function ReadShow(){
			global $Row;
			if($Row[$this->FieldName1] != "" && $Row[$this->FieldName2] != ""){
				$ShowValue = $Row[$this->FieldName1]."&nbsp;月&nbsp;".$Row[$this->FieldName2]."&nbsp;日&nbsp;";
			}
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;".$ShowValue."</td>\n";
			echo "	</tr>\n";			
		}
		function CheckScript(){
			if($this->NullFlag){
			echo "if((rtn=CheckField(\"".$this->FieldName1."\",\"".$this->ShowName."\",255))!=\"\"){\n";
			echo "	sError += (sError==\"\")?\"\":\"\\n\";\n";
			echo "	sError += rtn;\n";
			echo "}else{\n";
			echo "    if((rtn=CheckField(\"".$this->FieldName2."\",\"".$this->ShowName."\",255))!=\"\"){\n";
			echo "	    sError += (sError==\"\")?\"\":\"\\n\";\n";
			echo "	    sError += rtn;\n";
			echo "    }\n";			
			echo "}\n";
			}
		}
		function AddScript(){}
		function ModifyScript(){}
		function ShowScript(){}
		function AddHandle(&$Param){
			global $AddFieldsSQL,$AddValuesSQL;
			$DateValue1 = $_POST[$this->FieldName1];
			$DateValue2 = $_POST[$this->FieldName2];
			if($AddFieldsSQL!=""){
				$AddFieldsSQL.=",";
				$AddValuesSQL.=",";
			}
			$Param[":".$this->FieldName1] = $DateValue1;
			$Param[":".$this->FieldName2] = $DateValue2;
			$AddFieldsSQL.="`".$this->FieldName1."`,`".$this->FieldName2."`";
			$AddValuesSQL.=":".$this->FieldName1.", :".$this->FieldName2;
		}
		function ModifyHandle(&$Param){
			global $ModifySQL;
			$DateValue1 = $_POST[$this->FieldName1];
			$DateValue2 = $_POST[$this->FieldName2];
			if($ModifySQL!=""){
				$ModifySQL.=",";
			}
			$Param[":".$this->FieldName1] = $DateValue1;
			$Param[":".$this->FieldName2] = $DateValue2;
			$ModifySQL.="`".$this->FieldName1."`= :".$this->FieldName1.",`".$this->FieldName2."` = :".$this->FieldName2;
		}
		function GetDataHandle(&$data){
			$DateValue1 = $_POST[$this->FieldName1];
			$DateValue2 = $_POST[$this->FieldName2];
			$data[$this->FieldName1] = $DateValue1;
			$data[$this->FieldName2] = $DateValue2;
		}
	}
?>