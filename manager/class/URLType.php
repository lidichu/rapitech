<?php
	class URLType implements ManagerItem{
		var $FieldName;
		var $ShowName;
		public function URLType($FieldNameIn,$ShowNameIn){
			$this->FieldName = $FieldNameIn;
			$this->ShowName = $ShowNameIn;
		}
		function AddShow(){
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			echo "			<input type=\"radio\" name=\"".$this->FieldName."\" id=\"".$this->FieldName."\" value=\"File\" checked=\"checked\"/>&nbsp;檔案";
			echo "			<input type=\"radio\" name=\"".$this->FieldName."\" id=\"".$this->FieldName."\" value=\"URL\"/>&nbsp;連結";
			echo "		</td>\n";
			echo "	</tr>\n";
		}
		function ModifyShow(){
			global $Row;
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			$FileChecked = "";
			$URLChecked = "";			
			if($Row[$this->FieldName]=="File"){
				$FileChecked = "checked=\"checked\"";
			}else{
				$URLChecked = "checked=\"checked\"";
			}
			echo "			<input type=\"radio\" name=\"".$this->FieldName."\" id=\"".$this->FieldName."\" value=\"File\" ".$FileChecked." />&nbsp;檔案";
			echo "			<input type=\"radio\" name=\"".$this->FieldName."\" id=\"".$this->FieldName."\" value=\"URL\" ".$URLChecked."/>&nbsp;連結";
			echo "		</td>\n";
			echo "	</tr>\n";			
		}
		function ReadShow(){
			global $Row;
			$Value = "";
			if($Row[$this->FieldName]=="File"){
				$Value = "檔案";
			}else{
				$Value = "連結";
			}			
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;".$Value."</td>\n";
			echo "	</tr>\n";			
		}
		function CheckScript(){
		}
		function AddScript(){}
		function ModifyScript(){}
		function ShowScript(){}
		function AddHandle(){
			global $AddFieldsSQL,$AddValuesSQL;
			if($AddFieldsSQL!=""){$AddFieldsSQL.=",".$this->FieldName;}else{$AddFieldsSQL.=$this->FieldName;}
			if($AddValuesSQL!=""){$AddValuesSQL.=",'".$_POST[$this->FieldName]."'";}else{$AddValuesSQL.="'".$_POST[$this->FieldName]."'";}
		}
		function ModifyHandle(){
			global $ModifySQL;
			if($ModifySQL!=""){$ModifySQL.=",".$this->FieldName."='".$_POST[$this->FieldName]."'";}else{$ModifySQL.=$this->FieldName."='".$_POST[$this->FieldName]."'";}
		}
	}
?>