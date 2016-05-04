<?php
	class NoteFields2 implements ManagerItem{
		var $FieldName;
		var $ShowName;
		var $NullFlag;
		var $Maxlength;
		public function NoteFields2($FieldNameIn,$ShowNameIn,$NullFlagIn=false,$Maxlength=1000){
			$this->FieldName = $FieldNameIn ;
			$this->ShowName = $ShowNameIn ;
			$this->NullFlag = $NullFlagIn ;
			$this->Maxlength = $Maxlength ;
		}
		function AddShow(){

			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			echo "			<textarea name=\"".$this->FieldName."\" id=\"".$this->FieldName."\" maxlength=\"".$this->Maxlength."\" cols=\"45\" rows=\"8\"></textarea>\n";
			if($this->NullFlag){
			echo "				<br/><font size=\"-1\" color=\"DarkGray\">(必填)</font>\n";
			}
			echo "		</td>\n";
			echo "	</tr>\n";
		}
		function ModifyShow(){
			global $Row;
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			$Value = $Row[$this->FieldName];
			$Value = str_replace("<br />","\n",$Value);
			$Value = str_replace("<br/>","\n",$Value);
			$Value = str_replace("<br>","\n",$Value);
			$Value = htmlspecialchars_decode($Value);
			echo "			<textarea name=\"".$this->FieldName."\" id=\"".$this->FieldName."\" maxlength=\"".$this->Maxlength."\" cols=\"45\" rows=\"8\">".$Value."</textarea>\n";
			if($this->NullFlag){
			echo "			<br/><font size=\"-1\" color=\"DarkGray\">(必填)</font>\n";
			}
			echo "		</td>\n";
			echo "	</tr>\n";			
		}
		function ReadShow(){
			global $Row;
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\" style=\"padding-left:13px;\">".htmlspecialchars_decode($Row[$this->FieldName])."</td>\n";
			echo "	</tr>\n";			
		}
		function CheckScript(){
			if($this->NullFlag){
			echo "if($(\"#".$this->FieldName."\").val()==\"\"){\n";
			echo "	sError += (sError==\"\")?\"\":\"\\n\";\n";
			echo "	sError += \"．『".$this->ShowName."』不可為空值\";\n";
			echo "}\n";
			}
		}
		function AddScript(){}
		function ModifyScript(){}
		function ShowScript(){}
		function AddHandle(){
			global $AddFieldsSQL,$AddValuesSQL;
			if($AddFieldsSQL!=""){$AddFieldsSQL.=",`".$this->FieldName."`";}else{$AddFieldsSQL.="`".$this->FieldName."`";}
			$PostNote = $_POST[$this->FieldName] ;
			$PostNote = htmlspecialchars($PostNote);
			$order = array("\r\n", "\n", "\r"); 
			$replace = "<br />"; 
			$PostNote = str_replace($order, $replace, $PostNote);
			
			if($AddValuesSQL!=""){$AddValuesSQL.=",'".$PostNote."'";}else{$AddValuesSQL.="'".$PostNote."'";}
		}
		function ModifyHandle(){
			global $ModifySQL;
			$PostNote = $_POST[$this->FieldName] ;
			$PostNote = htmlspecialchars($PostNote);
			$order = array("\r\n", "\n", "\r"); 
			$replace = "<br />"; 
			$PostNote = str_replace($order, $replace, $PostNote);
			if($ModifySQL!=""){$ModifySQL.=",`".$this->FieldName."`='".$PostNote."'";}else{$ModifySQL.="`".$this->FieldName."`='".$PostNote."'";}
		}
	}
?>