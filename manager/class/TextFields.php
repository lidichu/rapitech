<?php
	class TextFields implements ManagerItem{
		var $FieldName;
		var $ShowName;
		var $NullFlag;
		var $ErrorShow;
		public function TextFields($FieldNameIn,$ShowNameIn,$NullFlagIn,$ErrorShowIn){
			$this->FieldName = $FieldNameIn;
			$this->ShowName = $ShowNameIn;
			$this->NullFlag = $NullFlagIn;
			$this->ErrorShow = $ErrorShowIn;
		}
		function AddShow(){
			if($this->FieldName=="SizeRange"){
				$FName=" <br />&nbsp;&nbsp;&nbsp;(必填)，尺寸若為數字請以橫線或逗號隔開，例：30-40或30,32,34<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;尺寸若為英文請以逗號隔開，例：M,XL";
			}else{
				$FName="(必填)";
			}
			echo "	<tr>\n";
			echo "		<td width=\"18%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"82%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			echo "			<input type=\"text\" name=\"".$this->FieldName."\" id=\"".$this->FieldName."\" size=\"50\" maxlength=\"255\" value=\"\"/>\n";
			if($this->NullFlag){
			echo "			<font size=\"-1\" color=\"DarkGray\">".$FName."</font>\n";
			}
			echo "		</td>\n";
			echo "	</tr>\n";
		}
		function ModifyShow(){
			if($this->FieldName=="SizeRange"){
				$FName=" <br />&nbsp;&nbsp;&nbsp;(必填)，尺寸若為數字請以橫線或逗號隔開，例：30-40或30,32,34<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;尺寸若為英文請以逗號隔開，例：M,XL";
			}else{
				$FName="(必填)";
			}
			global $Row;			
			echo "	<tr>\n";			
			echo "		<td width=\"18%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"82%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			echo "			<input type=\"text\" name=\"".$this->FieldName."\" id=\"".$this->FieldName."\" size=\"50\" maxlength=\"255\" value=\"".htmlspecialchars_decode($Row[$this->FieldName])."\"/>\n";
			if($this->NullFlag){
			echo "			<font size=\"-1\" color=\"DarkGray\">".$FName."</font>\n";
			}
			echo "		</td>\n";
			echo "	</tr>\n";			
		}
		function ReadShow(){
			global $Row;
			echo "	<tr>\n";
			echo "		<td width=\"18%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"82%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;".htmlspecialchars_decode($Row[$this->FieldName])."</td>\n";
			echo "	</tr>\n";			
		}
		function CheckScript(){
			if($this->NullFlag){
				if($this->ErrorShow != ""){
			echo "if((rtn=CheckField(\"".$this->FieldName."\",\"".$this->ErrorShow."\",255))!=\"\"){\n";
				}else{
			echo "if((rtn=CheckField(\"".$this->FieldName."\",\"".$this->ShowName."\",255))!=\"\"){\n";				
				}
			echo "	sError += (sError==\"\")?\"\":\"\\n\";\n";
			echo "	sError += rtn;\n";
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
			$DateValue = htmlspecialchars($_POST[$this->FieldName]);
			if($DateValue==""){
				$DateValue = "";
			}
			$data[$this->FieldName] = $DateValue;
		}
	}
?>