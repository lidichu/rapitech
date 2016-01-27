<?php
	class MD5PWDFields implements ManagerItem{
		var $FieldName;
		var $ShowName;
		var $NullFlag;
		public function MD5PWDFields($FieldNameIn,$ShowNameIn,$NullFlagIn){
			$this->FieldName = $FieldNameIn;
			$this->ShowName = $ShowNameIn;
			$this->NullFlag = $NullFlagIn;
		}
		function AddShow(){

			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			echo "			<input type=\"text\" name=\"".$this->FieldName."\" id=\"".$this->FieldName."\" size=\"50\" maxlength=\"255\" value=\"\"/>\n";
			if($this->NullFlag){
			echo "			<font class=\"DarkGrayClass\" size=\"-1\" color=\"DarkGray\">(必填)</font>\n";
			}
			echo "		</td>\n";
			echo "	</tr>\n";
		}
		function ModifyShow(){
			global $Row;
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			echo "			<input type=\"text\" name=\"".$this->FieldName."\" id=\"".$this->FieldName."\" size=\"50\" maxlength=\"255\" value=\"\"/>\n";
			echo "		</td>\n";
			echo "	</tr>\n";
		}
		function ReadShow(){
			global $Row;
			// echo "	<tr>\n";
			// echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			// echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;".htmlspecialchars_decode($Row[$this->FieldName])."</td>\n";
			// echo "	</tr>\n";
		}
		function CheckScript(){
			if($this->NullFlag){
				echo "if($(\"#".$this->FieldName."\").parent().find(\".DarkGrayClass\").length > 0){\n" ;
				echo "	if((rtn=CheckField(\"".$this->FieldName."\",\"".$this->ShowName."\",255))!=\"\"){\n";
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
			if($AddFieldsSQL!=""){
				$AddFieldsSQL.=",";
				$AddValuesSQL.=",";
			}
			$Param[":".$this->FieldName] = md5(htmlspecialchars($_POST[$this->FieldName]));
			$AddFieldsSQL.="`".$this->FieldName."`";
			$AddValuesSQL.=":".$this->FieldName;
		}
		function ModifyHandle(&$Param){
			global $ModifySQL;
			if($_POST[$this->FieldName] != ""){
				if($ModifySQL!=""){
					$ModifySQL.=",";
				}
				$Param[":".$this->FieldName] = md5(htmlspecialchars($_POST[$this->FieldName]));
				$ModifySQL.="`".$this->FieldName."`= :".$this->FieldName;
			}
		}
		function GetDataHandle(&$data){
			$DateValue = $_POST[$this->FieldName];
			if($DateValue==""){
				$DateValue = "";
			}else{
				$DateValue = md5(htmlspecialchars($DateValue));
			}
			$data[$this->FieldName] = $DateValue;
		}
	}
?>