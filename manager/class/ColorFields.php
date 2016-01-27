<?php
	class ColorFields implements ManagerItem{
		var $FieldName;
		var $ShowName;
		var $NullFlag;
		var $DefaultColor;
		public function ColorFields($FieldNameIn,$ShowNameIn,$NullFlagIn,$DefaultColorIn = "#FFFFFF"){
			$this->FieldName = $FieldNameIn;
			$this->ShowName = $ShowNameIn;
			$this->NullFlag = $NullFlagIn;
			$this->DefaultColor = $DefaultColorIn;
		}
		function AddShow(){
			
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			echo "			<input type=\"text\" name=\"".$this->FieldName."\" id=\"".$this->FieldName."\" size=\"20\" maxlength=\"255\" value=\"".$this->DefaultColor."\"/>\n";
			if($this->NullFlag){
			echo "			<font size=\"-1\" color=\"DarkGray\">(必填)</font>\n";
			}
			echo "		</td>\n";
			echo "	</tr>\n";
		}
		function ModifyShow(){
			global $Row;
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			echo "			<input type=\"text\" name=\"".$this->FieldName."\" id=\"".$this->FieldName."\" size=\"20\" maxlength=\"255\" value=\"".htmlspecialchars_decode($Row[$this->FieldName])."\"/>\n";
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
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;".htmlspecialchars_decode($Row[$this->FieldName])."</td>\n";
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
		function AddScript(){
			echo "<script type=\"text/javascript\">\n";
			echo "$(function(){\n";
			echo "$(\"#".$this->FieldName."\").modcoder_excolor({callback_on_ok : function(){}});\n";
			echo "});\n";
			echo "</script>\n";
		}
		function ModifyScript(){
			echo "<script type=\"text/javascript\">\n";
			echo "$(function(){\n";
			echo "$(\"#".$this->FieldName."\").modcoder_excolor({callback_on_ok : function(){}});\n";
			echo "});\n";
			echo "</script>\n";		
		}
		function ShowScript(){}
		function AddHandle(&$Param){
			global $AddFieldsSQL,$AddValuesSQL;
			if($AddFieldsSQL!=""){
				$AddFieldsSQL.=",";
				$AddValuesSQL.=",";
			}
			$Param[":".$this->FieldName] = htmlspecialchars($_POST[$this->FieldName]);
			$AddFieldsSQL.="`".$this->FieldName."`";
			$AddValuesSQL.=":".$this->FieldName;
		}
		function ModifyHandle(&$Param){
			global $ModifySQL;
			if($ModifySQL!=""){
				$ModifySQL.=",";
			}
			$Param[":".$this->FieldName] = htmlspecialchars($_POST[$this->FieldName]);
			$ModifySQL.="`".$this->FieldName."`= :".$this->FieldName;
		}
		function GetDataHandle(&$data){
			$data[$this->FieldName] = htmlspecialchars($_POST[$this->FieldName]);
		}
	}
?>