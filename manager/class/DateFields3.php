<?php
	class DateFields3 implements ManagerItem{
		var $FieldName;
		var $ShowName;
		var $NullFlag;
		var $StartYear;
		var $FinishYear;
		var $DefaultValue;
		public function DateFields3($FieldNameIn,$ShowNameIn,$NullFlagIn=false,$StartYearIn="",$FinishYearIn="",$DefaultValueIn=""){
			$this->FieldName = $FieldNameIn;
			$this->ShowName = $ShowNameIn;
			$this->NullFlag = $NullFlagIn;
			$this->DefaultValue = $DefaultValueIn;
			$this->StartYear = $StartYearIn;
			if($this->StartYear==""){$this->StartYear ="1911";}
			$this->FinishYear = $FinishYearIn;
			if($this->FinishYear==""){$this->FinishYear = date("Y", time());}
		}
		function AddShow(){
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			echo "			民國&nbsp;<select name=\"".$this->FieldName."_Year\" id=\"".$this->FieldName."_Year\" style=\"width:50px;\">\n";
			echo "			</select>&nbsp;&nbsp;年&nbsp;\n";
			echo "			<select name=\"".$this->FieldName."_Month\" id=\"".$this->FieldName."_Month\" style=\"width:40px;\">\n";
			echo "			</select>&nbsp;月&nbsp;&nbsp;\n";
			echo "			<select name=\"".$this->FieldName."_Day\" id=\"".$this->FieldName."_Day\" style=\"width:40px;\">\n";
			echo "			</select>日\n";
			if($this->NullFlag){
			echo "			<font size=\"-1\" color=\"DarkGray\">(必填)</font>\n";
			}
			echo "		</td>\n";
			echo "	</tr>\n";
		}
		function ModifyShow(){
			global $Row;
			$DateValue = strtotime($Row[$this->FieldName]);
			if(date("Y",$DateValue)=="0000"||$DateValue==""){
				$DateValue = "";
			}else{
				$DateValue = date("Y-m-d",$DateValue);
			}
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			echo "			民國&nbsp;<select name=\"".$this->FieldName."_Year\" id=\"".$this->FieldName."_Year\" style=\"width:50px;\">\n";
			echo "			</select>&nbsp;&nbsp;年&nbsp;\n";
			echo "			<select name=\"".$this->FieldName."_Month\" id=\"".$this->FieldName."_Month\" style=\"width:40px;\">\n";
			echo "			</select>&nbsp;月&nbsp;&nbsp;\n";
			echo "			<select name=\"".$this->FieldName."_Day\" id=\"".$this->FieldName."_Day\" style=\"width:40px;\">\n";
			echo "			</select>日\n";
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
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;".$Row[$this->FieldName]."</td>\n";
			echo "	</tr>\n";			
		}
		function CheckScript(){
			if($this->NullFlag){
			echo "if($(\"#".$this->FieldName."_Year\").val()==\"\" || $(\"#".$this->FieldName."_Month\").val()==\"\" || $(\"#".$this->FieldName."_Day\").val()==\"\"){\n";
			echo "	sError += (sError==\"\")?\"\":\"\\n\";\n";
			echo "	sError += \"．『".$this->ShowName."』尚未填取\";\n";
			echo "}\n";
			}
		}
		function AddScript(){
			echo "<script language=\"javascript\" type=\"text/javascript\">\n";
			echo "$(function(){\n";
			if($this->DefaultValue!=""){
				$DateString = strtotime($this->DefaultValue);
				$Y = date("Y", $DateString);
				$M = date("m", $DateString);
				$D = intval(date("d", $DateString));
				echo "$(\"body\").DatePicker({\"YearFieldName\":\"".$this->FieldName."_Year\",\"MonthFieldName\":\"".$this->FieldName."_Month\",\"DayFieldName\":\"".$this->FieldName."_Day\",\"StartYear\":\"".$this->StartYear."\",\"EndYear\":\"".$this->FinishYear."\",\"defaultYear\":\"".$Y."\",\"defaultMonth\":\"".$M."\",\"defaultDay\":\"".$D."\"});\n";			
			}else{
				echo "$(\"body\").DatePicker({\"YearFieldName\":\"".$this->FieldName."_Year\",\"MonthFieldName\":\"".$this->FieldName."_Month\",\"DayFieldName\":\"".$this->FieldName."_Day\",\"StartYear\":\"".$this->StartYear."\",\"EndYear\":\"".$this->FinishYear."\"});\n";
			}
			echo "});\n";
			echo "</script>\n";
		}
		function ModifyScript(){
			global $Row;
			echo "<script language=\"javascript\" type=\"text/javascript\">\n";
			echo "$(function(){\n";			
			$DateString = strtotime($Row[$this->FieldName]);
			$Y = date("Y", $DateString);
			$M = date("m", $DateString);
			$D = intval(date("d", $DateString));
			echo "$(\"body\").DatePicker({\"YearFieldName\":\"".$this->FieldName."_Year\",\"MonthFieldName\":\"".$this->FieldName."_Month\",\"DayFieldName\":\"".$this->FieldName."_Day\",\"StartYear\":\"".$this->StartYear."\",\"EndYear\":\"".$this->FinishYear."\",\"defaultYear\":\"".$Y."\",\"defaultMonth\":\"".$M."\",\"defaultDay\":\"".$D."\"});\n";
			echo "});\n";			
			echo "</script>\n";
		}
		function ShowScript(){}
		function AddHandle(&$Param){
			global $AddFieldsSQL,$AddValuesSQL;
			if($_POST[$this->FieldName."_Year"] != "" && $_POST[$this->FieldName."_Month"] != "" && $_POST[$this->FieldName."_Day"] != ""){
				$DateValue = NumHandle($_POST[$this->FieldName."_Year"],4)."-".NumHandle($_POST[$this->FieldName."_Month"],2)."-".NumHandle($_POST[$this->FieldName."_Day"],2);
			}else{
				$DateValue = "0000-00-00";
			}
			if($AddFieldsSQL!=""){
				$AddFieldsSQL.=",";
				$AddValuesSQL.=",";
			}
			$Param[":".$this->FieldName] = $DateValue;
			$AddFieldsSQL.="`".$this->FieldName."`";
			$AddValuesSQL.=":".$this->FieldName;
		}
		function ModifyHandle(&$Param){
			global $ModifySQL;
			if($_POST[$this->FieldName."_Year"] != "" && $_POST[$this->FieldName."_Month"] != "" && $_POST[$this->FieldName."_Day"] != ""){
				$DateValue = NumHandle($_POST[$this->FieldName."_Year"],4)."-".NumHandle($_POST[$this->FieldName."_Month"],2)."-".NumHandle($_POST[$this->FieldName."_Day"],2);
			}else{
				$DateValue = "0000-00-00";
			}
			if($ModifySQL!=""){
				$ModifySQL.=",";
			}
			$Param[":".$this->FieldName] = $DateValue;
			$ModifySQL.="`".$this->FieldName."`= :".$this->FieldName;
		}
		function GetDataHandle(&$data){
			$DateValue = $_POST[$this->FieldName];
			if($_POST[$this->FieldName."_Year"] != "" && $_POST[$this->FieldName."_Month"] != "" && $_POST[$this->FieldName."_Day"] != ""){
				$DateValue = NumHandle($_POST[$this->FieldName."_Year"],4)."-".NumHandle($_POST[$this->FieldName."_Month"],2)."-".NumHandle($_POST[$this->FieldName."_Day"],2);
			}else{
				$DateValue = "0000-00-00";
			}
			$data[$this->FieldName] = $DateValue;
		}
	}
?>