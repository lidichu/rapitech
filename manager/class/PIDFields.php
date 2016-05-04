<?php
	class PIDFields implements ManagerItem{
		var $FieldName;
		var $ShowName;
		var $NullFlag;
		public function PIDFields($FieldNameIn,$ShowNameIn,$NullFlagIn){
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
			echo "			<input type=\"text\" name=\"".$this->FieldName."\" id=\"".$this->FieldName."\" size=\"50\" maxlength=\"255\" value=\"".htmlspecialchars_decode($Row[$this->FieldName])."\"/>\n";
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
			echo "if((rtn=checkPID(\"".$this->ShowName."\",$(\"#".$this->FieldName."\").val(),true))!=\"\"){\n";
			echo "	sError += (sError==\"\")?\"\":\"\\n\";\n";
			echo "	sError += rtn;\n";
			echo "}\n";
			}else{
			echo "if((rtn=checkPID(\"".$this->ShowName."\",$(\"#".$this->FieldName.").val(),false))!=\"\"){\n";
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
			if($AddFieldsSQL!=""){$AddFieldsSQL.=",`".$this->FieldName."`";}else{$AddFieldsSQL.="`".$this->FieldName."`";}
			if($AddValuesSQL!=""){$AddValuesSQL.=",'".htmlspecialchars($_POST[$this->FieldName])."'";}else{$AddValuesSQL.="'".htmlspecialchars($_POST[$this->FieldName])."'";}
		}
		function ModifyHandle(){
			global $ModifySQL;
			if($ModifySQL!=""){$ModifySQL.=",`".$this->FieldName."`='".htmlspecialchars($_POST[$this->FieldName])."'";}else{$ModifySQL.="`".$this->FieldName."`='".htmlspecialchars($_POST[$this->FieldName])."'";}
		}
	}
?>