<?php
	class SuburbStatePostcodeFields implements ManagerItem{
		var $SuburbFieldName;
		var $StateFieldName;
		var $PostcodeFieldName;
		var $ShowName;
		var $NullFlag;
		public function SuburbStatePostcodeFields($SuburbFieldNameIn,$StateFieldNameIn,$PostcodeFieldNameIn,$ShowNameIn,$NullFlagIn){
			$this->SuburbFieldName = $SuburbFieldNameIn;
			$this->StateFieldName = $StateFieldNameIn;
			$this->PostcodeFieldName = $PostcodeFieldNameIn;
			$this->ShowName = $ShowNameIn;
			$this->NullFlag = $NullFlagIn;
		}
		function AddShow(){
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			echo "			<input type=\"text\" name=\"".$this->SuburbFieldName."\" id=\"".$this->SuburbFieldName."\" style=\"width:57px;\" size=\"30\" maxlength=\"255\" value=\"\" />&nbsp;/&nbsp;\n";
			echo "			<input type=\"text\" name=\"".$this->StateFieldName."\" id=\"".$this->StateFieldName."\" style=\"width:57px;\" size=\"30\" maxlength=\"255\" value=\"\" />&nbsp;/&nbsp;\n";
			echo "			<input type=\"text\" name=\"".$this->PostcodeFieldName."\" id=\"".$this->PostcodeFieldName."\" style=\"width:57px;\" size=\"30\" maxlength=\"255\" value=\"\" />\n";
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
			echo "			<input type=\"text\" name=\"".$this->SuburbFieldName."\" id=\"".$this->SuburbFieldName."\" style=\"width:57px;\" size=\"30\" maxlength=\"255\" value=\"".htmlspecialchars_decode($Row[$this->SuburbFieldName])."\" />&nbsp;/&nbsp;\n";
			echo "			<input type=\"text\" name=\"".$this->StateFieldName."\" id=\"".$this->StateFieldName."\" style=\"width:57px;\" size=\"30\" maxlength=\"255\" value=\"".htmlspecialchars_decode($Row[$this->StateFieldName])."\" />&nbsp;/&nbsp;\n";
			echo "			<input type=\"text\" name=\"".$this->PostcodeFieldName."\" id=\"".$this->PostcodeFieldName."\" style=\"width:57px;\" size=\"30\" maxlength=\"255\" value=\"".htmlspecialchars_decode($Row[$this->PostcodeFieldName])."\" />\n";			
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
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;".htmlspecialchars_decode($Row[$this->SuburbFieldName])."&nbsp;/&nbsp;".htmlspecialchars_decode($Row[$this->StateFieldName])."&nbsp;/&nbsp;".htmlspecialchars_decode($Row[$this->PostcodeFieldName])."</td>\n";
			echo "	</tr>\n";			
		}
		function CheckScript(){
			if($this->NullFlag){
			echo "if((rtn=CheckSuburbStatePostcode(\"".$this->SuburbFieldName."\",\"".$this->StateFieldName."\",\"".$this->PostcodeFieldName."\",\"".$this->ShowName."\"))!=\"\"){\n";
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
			if($AddFieldsSQL!=""){$AddFieldsSQL.=",";}
			$AddFieldsSQL.="`".$this->SuburbFieldName."`,`".$this->StateFieldName."`,`".$this->PostcodeFieldName."`";
			if($AddValuesSQL!=""){$AddValuesSQL.=",";}
			$AddValuesSQL.="'".htmlspecialchars($_POST[$this->SuburbFieldName])."','".htmlspecialchars($_POST[$this->StateFieldName])."','".htmlspecialchars($_POST[$this->PostcodeFieldName])."'";
		}
		function ModifyHandle(){
			global $ModifySQL;
			if($ModifySQL!=""){$ModifySQL.=",";}
			$ModifySQL.="`".$this->SuburbFieldName."`='".htmlspecialchars($_POST[$this->SuburbFieldName])."',`".$this->StateFieldName."`='".htmlspecialchars($_POST[$this->StateFieldName])."',`".$this->PostcodeFieldName."`='".htmlspecialchars($_POST[$this->PostcodeFieldName])."'";
		}
	}
?>