<?php
	class URLFields implements ManagerItem{
		var $FieldName;
		var $ShowName;
		var $NullFlag;
		var $TitleField;
		public function URLFields($FieldNameIn,$ShowNameIn,$NullFlagIn=false,$TitleFieldIn){
			$this->FieldName = $FieldNameIn;
			$this->ShowName = $ShowNameIn;
			$this->NullFlag = $NullFlagIn;
			$this->TitleField = $TitleFieldIn;
		}
		function AddShow(){
			echo  "	<tr>\n";
			echo  "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo  "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;\n";
			if($this->TitleField !=""){
			echo  "		&nbsp;&nbsp;網址標題：<input type=\"text\" name=\"".$this->TitleField."\" id=\"".$this->TitleField."\" size=\"41\" maxlength=\"255\" value=\"\"><br/>\n";
			}
			echo  "		&nbsp;&nbsp;網&nbsp;&nbsp;&nbsp&nbsp;&nbsp;址：<input type=\"text\" name=\"".$this->FieldName."\" id=\"".$this->FieldName."\" size=\"41\" maxlength=\"255\" value=\"http://\">\n";
			if($this->NullFlag){
			echo "			<font size=\"-1\" color=\"DarkGray\">(必填)</font>\n";
			}
			echo  "		</td>\n";
			echo  "	</tr>\n";			
		}
		function ModifyShow(){
			global $Row;
			echo  "	<tr>\n";
			echo  "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo  "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;\n";
			if($this->TitleField !=""){
			echo  "		&nbsp;&nbsp;網址標題：<input type=\"text\" name=\"".$this->TitleField."\" id=\"".$this->TitleField."\" size=\"41\" maxlength=\"255\" value=\"".$Row[$this->TitleField]."\"><br/>\n";
			}
			if($Row[$this->FieldName]!=""){
			echo  "	&nbsp;&nbsp;網&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址：<input type=\"text\" name=\"".$this->FieldName."\" id=\"".$this->FieldName."\" size=\"41\" maxlength=\"255\" value=\"".$Row[$this->FieldName]."\"/>\n";
			}else{
			echo  "	&nbsp;&nbsp;網&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址：<input type=\"text\" name=\"".$this->FieldName."\" id=\"".$this->FieldName."\" size=\"41\" maxlength=\"255\" value=\"http://\"/>\n";				
			}
			if($this->NullFlag){
			echo "			<font size=\"-1\" color=\"DarkGray\">(必填)</font>\n";
			}
			echo  "		</td>\n";
			echo  "	</tr>\n";			
		}
		function ReadShow(){
			global $Row;
			echo  "	<tr>\n";
			echo  "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo  "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">\n";
			if($Row[$this->FieldName]!=""){
				if($this->TitleField !=""){
					if($Row[$this->TitleField]!=""){
			echo  "		&nbsp;&nbsp;<a href=\"".$Row[$this->FieldName]."\" target=\"_blank\">".$Row[$this->TitleField]."</a>\n";
					}else{
			echo  "		&nbsp;&nbsp;<a href=\"".$Row[$this->FieldName]."\" target=\"_blank\">".$Row[$this->FieldName]."</a>\n";			
					}
				}else{
			echo  "		&nbsp;&nbsp;<a href=\"".$Row[$this->FieldName]."\" target=\"_blank\">".$Row[$this->FieldName]."</a>\n";		
				}
			}
			echo  "		</td>\n";
			echo  "	</tr>\n";			
		}
		function CheckScript(){
		
			if($this->NullFlag){
			//echo "sError += (sError==\"\")?\"\":\"\\n\";\n";
			echo "sError += CheckField(\"".$this->FieldName."\",\"".$this->ShowName."\",255);\n";
			echo "sError += sError==\"\"?\"\":\"\\n\";\n";
			echo "sError += $(\"#".$this->FieldName."\").val()==\"http://\"?\"．『".$this->ShowName."』不可為空值\\n\":\"\";\n";
			}
		}
		function AddScript(){

		}
		function ModifyScript(){
	
		}
		function ShowScript(){}
		function AddHandle(){
			global $AddFieldsSQL,$AddValuesSQL;
			$TitleValue = $_POST[$this->TitleField];
			$FieldValue = $_POST[$this->FieldName];

			if($this->TitleField!=""){
				if($FieldValue!=""){
					if(strtolower($FieldValue)!="http://"){
						if($AddFieldsSQL!=""){$AddFieldsSQL.=",`".$this->FieldName."`";}else{$AddFieldsSQL.="`".$this->FieldName."`";}
						if($AddValuesSQL!=""){$AddValuesSQL.=",'".$FieldValue."'";}else{$AddValuesSQL.="'".$FieldValue."'";}
						if($TitleValue!=""){
							if($AddFieldsSQL!=""){$AddFieldsSQL.=",`".$this->TitleField."`";}else{$AddFieldsSQL.="`".$this->TitleField."`";}
							if($AddValuesSQL!=""){$AddValuesSQL.=",'".$TitleValue."'";}else{$AddValuesSQL.="'".$TitleValue."'";}							
						}else{
							if($AddFieldsSQL!=""){$AddFieldsSQL.=",`".$this->TitleField."`";}else{$AddFieldsSQL.="`".$this->TitleField."`";}
							if($AddValuesSQL!=""){$AddValuesSQL.=",'".$FieldValue."'";}else{$AddValuesSQL.="'".$FieldValue."'";}
						}
					}
				}				
			}else{
				if($FieldValue!=""){
					if(strtolower($FieldValue)!="http://"){
						if($AddFieldsSQL!=""){$AddFieldsSQL.=",`".$this->FieldName."`";}else{$AddFieldsSQL.="`".$this->FieldName."`";}
						if($AddValuesSQL!=""){$AddValuesSQL.=",'".$FieldValue."'";}else{$AddValuesSQL.="'".$FieldValue."'";}
					}
				}
			}
		}
		function ModifyHandle(){
			global $ModifySQL;
			$TitleValue = $_POST[$this->TitleField];
			$FieldValue = $_POST[$this->FieldName];
			if($this->TitleField!=""){
				if($FieldValue!=""){
					if(strtolower($FieldValue)!="http://"){
						if($ModifySQL!=""){$ModifySQL.=",`".$this->FieldName."`='".$FieldValue."'";}else{$ModifySQL.="`".$this->FieldName."`='".$FieldValue."'";}
						if($TitleValue!=""){
							if($ModifySQL!=""){$ModifySQL.=",`".$this->TitleField."`='".$TitleValue."'";}else{$ModifySQL.="`".$this->TitleField."`='".$TitleValue."'";}						
						}else{
							if($ModifySQL!=""){$ModifySQL.=",`".$this->TitleField."`='".$FieldValue."'";}else{$ModifySQL.="`".$this->TitleField."`='".$FieldValue."'";}						
						}						
					}else{
						if($ModifySQL!=""){$ModifySQL.=",`".$this->FieldName."`=''";}else{$ModifySQL.="`".$this->FieldName."`=''";}
						if($ModifySQL!=""){$ModifySQL.=",`".$this->TitleField."`=''";}else{$ModifySQL.="`".$this->TitleField."`=''";}						
					}
				}else{
					if($ModifySQL!=""){$ModifySQL.=",`".$this->FieldName."`=''";}else{$ModifySQL.="`".$this->FieldName."`=''";}
					if($ModifySQL!=""){$ModifySQL.=",`".$this->TitleField."`=''";}else{$ModifySQL.="`".$this->TitleField."`=''";}
				}
			}else{
				if($FieldValue!=""){
					if(strtolower($FieldValue)!="http://"){
						if($ModifySQL!=""){$ModifySQL.=",`".$this->FieldName."`='".$FieldValue."'";}else{$ModifySQL.="`".$this->FieldName."`='".$FieldValue."'";}
					}else{
						if($ModifySQL!=""){$ModifySQL.=",`".$this->FieldName."`=''";}else{$ModifySQL.="`".$this->FieldName."`=''";}
					}
				}else{
					if($ModifySQL!=""){$ModifySQL.=",`".$this->FieldName."`=''";}else{$ModifySQL.="`".$this->FieldName."`=''";}
				}
			}
		}
	}
?>