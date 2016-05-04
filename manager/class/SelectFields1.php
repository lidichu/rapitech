<?php
	class SelectFields1 implements ManagerItem{
		var $FieldName;
		var $ShowName;
		var $NullFlag;
		var $RelField;
		var $RelShow;
		var $RelTable;
		var $RelQuery;
		var $RelOrder;
		var $SelectItemDefault;
		
		public function SelectFields1($FieldNameIn,$ShowNameIn,$NullFlagIn=false,$RelFieldIn,$RelShowIn,$RelTableIn,$RelQueryIn="",$RelOrderIn="",$SelectItemDefaultIn=""){
			$this->FieldName = $FieldNameIn;
			$this->ShowName = $ShowNameIn;
			$this->NullFlag = NullFlagIn;
			$this->RelField = $RelFieldIn;
			$this->RelShow = $RelShowIn;
			$this->RelTable = $RelTableIn;
			$this->RelQuery = $RelQueryIn;
			$this->RelOrder = $RelOrderIn;
			$this->SelectItemDefault = $SelectItemDefaultIn;
			if($this->RelQuery!=""){$this->RelQuery = " Where ".$this->RelQuery;}
			if($this->RelOrder!=""){$this->RelOrder = " Order By ".$this->RelOrder;}
		}
		function AddShow(){
			global $Conn;
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			echo "			<select id=\"".$this->FieldName."\" name=\"".$this->FieldName."\">\n";
			echo "				<option value=\"\">請選擇</option>\n";
			//查詢資料庫
			$SQL = "Select ".$this->RelField.",".$this->RelShow." from ".$this->RelTable.$this->RelQuery.$this->RelOrder;
			$Rs = mysql_query($SQL,$Conn);
			if($Rs && (mysql_num_rows($Rs)>0)){
				while($Row = mysql_fetch_array($Rs)){
					if(strval($this->SelectItemDefault)==strval($Row[$this->RelField])){
			echo "				<option value=\"".$Row[$this->RelField]."\" selected=\"selected\">".$Row[$this->RelShow]."</option>\n";
					}else{
			echo "				<option value=\"".$Row[$this->RelField]."\">".$Row[$this->RelShow]."</option>\n";
					}					
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
			global $Row,$Conn;
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			echo "			<select id=\"".$this->FieldName."\" name=\"".$this->FieldName."\">\n";
			echo "				<option value=\"\">請選擇</option>\n";
			//查詢資料庫
			$SQL = "Select ".$this->RelField.",".$this->RelShow." from ".$this->RelTable.$this->RelQuery.$this->RelOrder;
			$Rs = mysql_query($SQL,$Conn);
			if($Rs && (mysql_num_rows($Rs)>0)){
				while($Row2 = mysql_fetch_array($Rs)){
					if($Row[$this->FieldName]!=""){
						if(strval($Row[$this->FieldName])==strval($Row2[$this->RelField])){
				echo "				<option value=\"".$Row2[$this->RelField]."\" selected=\"selected\">".$Row2[$this->RelShow]."</option>\n";
						}else{
				echo "				<option value=\"".$Row2[$this->RelField]."\">".$Row2[$this->RelShow]."</option>\n";					
						}	
					}else{
				echo "				<option value=\"".$Row2[$this->RelField]."\">".$Row2[$this->RelShow]."</option>\n";
					}
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
			//查詢資料庫
			$SQL = "Select ".$this->RelField.",".$this->RelShow." from ".$this->RelTable.$this->RelQuery.$this->RelOrder;
			$Rs = mysql_query($SQL,$Conn);
			if($Rs && (mysql_num_rows($Rs)>0)){
				while($Row = mysql_fetch_array($Rs)){
					if($Row[$this->FieldName]!=""){
						if($Row[$this->FieldName]==$Row[$this->RelField]){
				echo $Row[$this->RelShow];
						}
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