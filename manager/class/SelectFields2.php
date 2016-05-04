<?php
	class SelectFields2 implements ManagerItem{
		var $FieldName;
		var $ShowName;
		var $NullFlag;
		var $SelectItems;
		var $SelectValues;
		var $SelectItemDefault;
		
		public function SelectFields2($FieldNameIn,$ShowNameIn,$NullFlagIn=false,$SelectItemsIn,$SelectValuesIn,$SelectItemDefaultIn=""){
			$this->FieldName = $FieldNameIn;
			$this->ShowName = $ShowNameIn;
			$this->NullFlag = $NullFlagIn;
			$this->SelectItems = $SelectItemsIn;
			$this->SelectValues = $SelectValuesIn;
			$this->SelectItemDefault = $SelectItemDefaultIn;
		}
		function AddShow(){
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			echo "			<select id=\"".$this->FieldName."\" name=\"".$this->FieldName."\">\n";
			for($i=0;$i<count($this->SelectValues);$i++){
				if($this->SelectValues[$i]==$this->SelectItemDefault){
			echo "				<option value=\"".$this->SelectValues[$i]."\" selected=\"selected\">".$this->SelectItems[$i]."</option>\n";
				}else{
			echo "				<option value=\"".$this->SelectValues[$i]."\">".$this->SelectItems[$i]."</option>\n";					
				}
			}
			echo "			</select>\n";
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
			echo "			<select id=\"".$this->FieldName."\" name=\"".$this->FieldName."\">\n";
			for($i=0;$i<count($this->SelectValues);$i++){
				if($Row[$this->FieldName]!=""){
					if($this->SelectValues[$i]==$Row[$this->FieldName]){
			echo "				<option value=\"".$this->SelectValues[$i]."\" selected=\"selected\">".$this->SelectItems[$i]."</option>\n";
					}else{
			echo "				<option value=\"".$this->SelectValues[$i]."\">".$this->SelectItems[$i]."</option>\n";
					}
				}else{
			echo "				<option value=\"".$this->SelectValues[$i]."\">".$this->SelectItems[$i]."</option>\n";
				}
			}
			echo "			</select>\n";
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
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;";
			for($i=0;$i<count($this->SelectValues);$i++){
				if($Row[$this->FieldName]!=""){
					if($this->SelectValues[$i]==$Row[$this->FieldName]){
			echo 			$this->SelectItems[$i];
					}
				}
			}
			echo "		</td>\n";
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
		function AddScript(){}
		function ModifyScript(){}
		function ShowScript(){}
		function AddHandle(){
			global $AddFieldsSQL,$AddValuesSQL;
			if($AddFieldsSQL!=""){$AddFieldsSQL.=",`".$this->FieldName."`";}else{$AddFieldsSQL.="`".$this->FieldName."`";}
			if($AddValuesSQL!=""){$AddValuesSQL.=",'".$_POST[$this->FieldName]."'";}else{$AddValuesSQL.="'".$_POST[$this->FieldName]."'";}
		}
		function ModifyHandle(){
			global $ModifySQL;
			if($ModifySQL!=""){$ModifySQL.=",`".$this->FieldName."`='".$_POST[$this->FieldName]."'";}else{$ModifySQL.="`".$this->FieldName."`='".$_POST[$this->FieldName]."'";}
		}
	}
?>