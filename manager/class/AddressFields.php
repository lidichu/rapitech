<?php
	class AddressFields implements ManagerItem{
		var $FieldCountyName;
		var $FieldAreaName;
		var $FieldZipCodeName;
		var $FieldOtherName;
		var $ShowName;
		var $NullFlag;
		var $DefaultValue;
		public function AddressFields($FieldCountyNameIn,$FieldAreaNameIn,$FieldZipCodeNameIn,$FieldOtherNameIn,$ShowNameIn,$NullFlagIn=false,$DefaultValueIn=""){
			$this->FieldCountyName = $FieldCountyNameIn;
			$this->FieldAreaName = $FieldAreaNameIn;
			$this->FieldZipCodeName = $FieldZipCodeNameIn;
			$this->FieldOtherName = $FieldOtherNameIn;
			$this->ShowName = $ShowNameIn;
			$this->NullFlag = $NullFlagIn;
			$this->DefaultValue = $DefaultValueIn;
		}
		function AddShow(){
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			echo "		<select name=\"".$this->FieldCountyName."\" id=\"".$this->FieldCountyName."\" style=\"width:80px;\">\n";
			echo "			<option>縣/市</option>\n";
			echo "		</select>\n";
			echo "		-\n";
			echo "		<select name=\"".$this->FieldAreaName."\" id=\"".$this->FieldAreaName."\" style=\"width:100px;\">\n";
			echo "			<option>中正區</option>\n";
			echo "		</select>\n";
			echo "		-\n";
			echo "		<input name=\"".$this->FieldZipCodeName."\" type=\"text\" id=\"".$this->FieldZipCodeName."\" size=\"3\" />\n";
			echo "		-\n";
			echo "		<br />&nbsp;&nbsp;&nbsp;<input name=\"".$this->FieldOtherName."\" type=\"text\" id=\"".$this->FieldOtherName."\" size=\"40\" value=\"\" />\n";
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
			echo "		<select name=\"".$this->FieldCountyName."\" id=\"".$this->FieldCountyName."\" style=\"width:80px;\">\n";
			echo "			<option>縣/市</option>\n";
			echo "		</select>\n";
			echo "		-\n";
			echo "		<select name=\"".$this->FieldAreaName."\" id=\"".$this->FieldAreaName."\" style=\"width:100px;\">\n";
			echo "			<option>中正區</option>\n";
			echo "		</select>\n";
			echo "		-\n";
			echo "		<input name=\"".$this->FieldZipCodeName."\" type=\"text\" id=\"".$this->FieldZipCodeName."\" size=\"3\" />\n";
			echo "		-\n";
			echo "		<br />&nbsp;&nbsp;&nbsp;<input name=\"".$this->FieldOtherName."\" type=\"text\" id=\"".$this->FieldOtherName."\" size=\"40\" value=\"".$Row[$this->FieldOtherName]."\" />\n";
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
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;".$Row[$this->FieldZipCodeName].$Row[$this->FieldCountyName].$Row[$this->FieldAreaName].$Row[$this->FieldOtherName]."</td>\n";
			echo "	</tr>\n";			
		}
		function CheckScript(){
			if($this->NullFlag){
			echo "if($(\"#".$this->FieldCountyName."\").val()==\"\" || $(\"#".$this->FieldAreaName."\").val()==\"\" || $(\"#".$this->FieldZipCodeName."\").val()==\"\" || $(\"#".$this->FieldOtherName."\").val()==\"\"){\n";
			echo "	sError += (sError==\"\")?\"\":\"\\n\";\n";
			echo "	sError += \"．『".$this->ShowName."』尚未填取\";\n";
			echo "}\n";
			}
		}
		function AddScript(){
		
			echo "<script language=\"javascript\" type=\"text/javascript\">\n";
			echo "$(function(){\n";
			echo "$(\"body\").TwZipCode({\"CountryFieldName\":\"".$this->FieldCountyName."\",\"AreaFieldName\":\"".$this->FieldAreaName."\",\"ZipCodeFieldName\":\"".$this->FieldZipCodeName."\"});\n";
			echo "});\n";
			echo "</script>\n";		
		}
		function ModifyScript(){
			global $Row;
			echo "<script language=\"javascript\" type=\"text/javascript\">\n";
			echo "$(function(){\n";
			echo "$(\"body\").TwZipCode({\"CountryFieldName\":\"".$this->FieldCountyName."\",\"AreaFieldName\":\"".$this->FieldAreaName."\",\"ZipCodeFieldName\":\"".$this->FieldZipCodeName."\",\"CurrentCountryValue\":\"".$Row[$this->FieldCountyName]."\",\"CurrentAreaValue\":\"".$Row[$this->FieldAreaName]."\",\"CurrentZipCodeValue\":\"".$Row[$this->FieldZipCodeName]."\"});\n";
			echo "});\n";
			echo "</script>\n";			
		}
		function ShowScript(){}
		function AddHandle(){
			global $AddFieldsSQL,$AddValuesSQL;
			$CountyName = htmlspecialchars($_POST[$this->FieldCountyName]);
			$AreaName = htmlspecialchars($_POST[$this->FieldAreaName]);
			$ZipCodeName = htmlspecialchars($_POST[$this->FieldZipCodeName]);
			$OtherName = htmlspecialchars($_POST[$this->FieldOtherName]);
			if($AddFieldsSQL!=""){$AddFieldsSQL.=",`".$this->FieldCountyName."`,`".$this->FieldAreaName."`,`".$this->FieldZipCodeName."`,`".$this->FieldOtherName."`";}else{$AddFieldsSQL.="`".$this->FieldCountyName."`,`".$this->FieldAreaName."`,`".$this->FieldZipCodeName."`,`".$this->FieldOtherName."`";}
			if($AddValuesSQL!=""){$AddValuesSQL.=",'".$CountyName."','".$AreaName."','".$ZipCodeName."','".$OtherName."'";}else{$AddValuesSQL.="'".$CountyName."','".$AreaName."','".$ZipCodeName."','".$OtherName."'";}
		}
		function ModifyHandle(){
			global $ModifySQL;
			$CountyName = htmlspecialchars($_POST[$this->FieldCountyName]);
			$AreaName = htmlspecialchars($_POST[$this->FieldAreaName]);
			$ZipCodeName = htmlspecialchars($_POST[$this->FieldZipCodeName]);
			$OtherName = htmlspecialchars($_POST[$this->FieldOtherName]);
			if($ModifySQL!=""){$ModifySQL.=",`".$this->FieldCountyName."`='".$CountyName."',`".$this->FieldAreaName."`='".$AreaName."',`".$this->FieldZipCodeName."`='".$ZipCodeName."',`".$this->FieldOtherName."`='".$OtherName."'";}else{$ModifySQL.="`".$this->FieldCountyName."`='".$CountyName."',`".$this->FieldAreaName."`='".$AreaName."',`".$this->FieldZipCodeName."`='".$ZipCodeName."',`".$this->FieldOtherName."`='".$OtherName."'";}
		}
	}
?>