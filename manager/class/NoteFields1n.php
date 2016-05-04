<?php
	class NoteFields1n implements ManagerItem{
		var $FieldName;
		var $ShowName;
		var $NullFlag;
		var $baseUrl;
		public function NoteFields1n($FieldNameIn,$ShowNameIn,$NullFlagIn=false){
			$this->FieldName = $FieldNameIn ;
			$this->ShowName = $ShowNameIn ;
			$this->NullFlag = $NullFlagIn ;
			$script_filename = getenv('SCRIPT_NAME');
			$script_filenameArray = explode("/",$script_filename);
			$baseUrli = 0;
			for($i=0;$i<count($script_filenameArray);$i++){
				if($script_filenameArray[$i]=="manager"){
					$baseUrli = $i;
					break;
				}
			}
			for($i=0;$i<$baseUrli;$i++){
				if($script_filenameArray[$i]!=""){
					$baseUrl = $baseUrl.'/'.$script_filenameArray[$i];
				}
			}
			$this->baseUrl = $baseUrl.'/files/Upload/';				
		}
		function AddShow(){

			echo "	<tr>\n";
			echo "		<td width=\"100%\" bgcolor=\"#EEEEEE\" nowrap align=\"center\" colspan=\"2\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "	</tr>\n";
			echo "	<tr>\n";
			echo "		<td width=\"100%\" bgcolor=\"#FFFFFF\" colspan=\"2\" align=\"left\">\n";
			echo "			<textarea name=\"".$this->FieldName."\" id=\"".$this->FieldName."\" cols=\"45\" rows=\"8\"></textarea>\n";
			echo "			<script type=\"text/javascript\">\n";
			echo "			CKEDITOR.replace('".$this->FieldName."',{toolbar : 'MyToolbar2'});\n";
			echo "			</script>\n";			
			if($this->NullFlag){
			echo "				<br/><font size=\"-1\" color=\"DarkGray\">(必填)</font>\n";
			}
			echo "		</td>\n";
			echo "	</tr>\n";
		}
		function ModifyShow(){
			global $Row;
			echo "	<tr>\n";
			echo "		<td width=\"100%\" bgcolor=\"#EEEEEE\" nowrap align=\"center\" colspan=\"2\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "	</tr>\n";
			echo "	<tr>\n";
			echo "		<td width=\"100%\" bgcolor=\"#FFFFFF\" colspan=\"2\" align=\"left\">\n";
			echo "			<textarea name=\"".$this->FieldName."\" id=\"".$this->FieldName."\" cols=\"45\" rows=\"8\">".str_replace("{VisualRoot}",$this->baseUrl,htmlspecialchars_decode($Row[$this->FieldName]))."</textarea>\n";
			echo "			<script type=\"text/javascript\">\n";
			echo "			CKEDITOR.replace('".$this->FieldName."',{toolbar : 'MyToolbar2'});\n";
			echo "			</script>\n";
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
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">".str_replace("{VisualRoot}",$this->baseUrl,htmlspecialchars_decode($Row[$this->FieldName]))."</td>\n";
			echo "	</tr>\n";			
		}
		function CheckScript(){
			if($this->NullFlag){
			echo "var temp=CKEDITOR.instances.$this->FieldName.getData();\n";
			echo "if(temp.length ==0){\n";
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
			$PostNote = str_replace($this->baseUrl,"{VisualRoot}",$PostNote);
			$PostNote = htmlspecialchars($PostNote);
			if($AddValuesSQL!=""){$AddValuesSQL.=",'".$PostNote."'";}else{$AddValuesSQL.="'".$PostNote."'";}
		}
		function ModifyHandle(){
			global $ModifySQL;
			$PostNote = $_POST[$this->FieldName] ;
			$PostNote = str_replace($this->baseUrl,"{VisualRoot}",$PostNote);
			$PostNote = htmlspecialchars($PostNote);
			if($ModifySQL!=""){$ModifySQL.=",`".$this->FieldName."`='".$PostNote."'";}else{$ModifySQL.="`".$this->FieldName."`='".$PostNote."'";}
		}
	}
?>