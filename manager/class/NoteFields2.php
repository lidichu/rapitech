<?php
	class NoteFields2 implements ManagerItem{
		var $FieldName;
		var $ShowName;
		var $NullFlag;
		var $Maxlength;
		public function NoteFields2($FieldNameIn,$ShowNameIn,$NullFlagIn=false,$Maxlength=0){
			$this->FieldName = $FieldNameIn ;
			$this->ShowName = $ShowNameIn ;
			$this->NullFlag = $NullFlagIn ;
			$this->Maxlength = $Maxlength ;
		}
		function AddShow(){
			$TextArea = "<textarea";
			$TextArea .= " name=\"".$this->FieldName."\"";
			$TextArea .= " id=\"".$this->FieldName."\"";
			$TextArea .= " cols=\"45\"";
			$TextArea .= " rows=\"8\"";
			if($this->Maxlength > 0){ $TextArea .= " maxlength=\"".$this->Maxlength."\""; }
			$TextArea .= ">";
			$TextArea .= "</textarea>\n";
		
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			echo "			".$TextArea;
			if($this->NullFlag){
			echo "				<br/><font size=\"-1\" color=\"DarkGray\">(必填)</font>\n";
			}
			echo "		</td>\n";
			echo "	</tr>\n";
		}
		function ModifyShow(){
			global $Row;
			$Value = $Row[$this->FieldName];
			$Value = htmlspecialchars_decode($Value);
			$Value = str_replace("<br />","\n",$Value);
			$Value = str_replace("<br/>","\n",$Value);
			$Value = str_replace("<br>","\n",$Value);
			$Value = stripslashes($Value);
			
			$TextArea = "<textarea";
			$TextArea .= " name=\"".$this->FieldName."\"";
			$TextArea .= " id=\"".$this->FieldName."\"";
			$TextArea .= " cols=\"45\"";
			$TextArea .= " rows=\"8\"";
			if($this->Maxlength > 0){ $TextArea .= " maxlength=\"".$this->Maxlength."\""; }
			$TextArea .= ">";
			$TextArea .= $Value;
			$TextArea .= "</textarea>\n";
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			echo "			".$TextArea;
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
		function AddHandle(&$Param){
			global $AddFieldsSQL,$AddValuesSQL;
			$PostNote = $_POST[$this->FieldName] ;
			$PostNote = htmlspecialchars($PostNote);
			$order = array("\r\n", "\n", "\r"); 
			$replace = "<br />"; 
			$PostNote = str_replace($order, $replace, $PostNote);
			if(!get_magic_quotes_gpc()){
				$order = array("'"); 
				$replace = "\'"; 
				$PostNote = str_replace($order, $replace, $PostNote);
			}
			if($AddFieldsSQL!=""){
				$AddFieldsSQL.=",";
				$AddValuesSQL.=",";
			}
			$Param[":".$this->FieldName] = $PostNote;
			$AddFieldsSQL.="`".$this->FieldName."`";
			$AddValuesSQL.=":".$this->FieldName;
		}
		function ModifyHandle(&$Param){
			global $ModifySQL;
			$PostNote = $_POST[$this->FieldName] ;
			$PostNote = htmlspecialchars($PostNote);
			$order = array("\r\n", "\n", "\r"); 
			$replace = "<br />"; 
			$PostNote = str_replace($order, $replace, $PostNote);
			if(!get_magic_quotes_gpc()){
				$order = array("'"); 
				$replace = "\'"; 
				$PostNote = str_replace($order, $replace, $PostNote);
			}
			if($ModifySQL!=""){
				$ModifySQL.=",";
			}
			$Param[":".$this->FieldName] = $PostNote;
			$ModifySQL.="`".$this->FieldName."`= :".$this->FieldName;
		}
		function GetDataHandle(&$data){
			$PostNote = $_POST[$this->FieldName] ;
			$PostNote = htmlspecialchars($PostNote);
			$order = array("\r\n", "\n", "\r"); 
			$replace = "<br />"; 
			$PostNote = str_replace($order, $replace, $PostNote);
			$data[$this->FieldName] = $PostNote;
		}
	}
?>