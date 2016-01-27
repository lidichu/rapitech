<?php
	class YouTubeFields implements ManagerItem{
		var $FieldName;
		var $ShowName;
		var $NullFlag;
		public function YouTubeFields($FieldNameIn,$ShowNameIn,$NullFlagIn){
			$this->FieldName = $FieldNameIn;
			$this->ShowName = $ShowNameIn;
			$this->NullFlag = $NullFlagIn;			
		}
		function AddShow(){			
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			echo "			<input type=\"text\" name=\"".$this->FieldName."\" id=\"".$this->FieldName."\" size=\"20\" maxlength=\"255\" value=\"\"/>\n";
			if($this->NullFlag){
			echo "			<font size=\"-1\" color=\"DarkGray\">(必填)</font>\n";
			}
			echo "				<div><font size=\"2\"><font color=\"#0000ff\">&nbsp;&nbsp;請填寫範例中紅色字串部份<br>&nbsp;&nbsp;範例：YouTube影片網址 http://www.youtube.com/watch?v=</font><font color=\"red\">Y82YoasxW3k</font></font></div>\n";
		
			echo "		</td>\n";
			echo "	</tr>\n";
		}
		function ModifyShow(){
			global $Row;			
			echo "	<tr>\n";			
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			echo "			<input type=\"text\" name=\"".$this->FieldName."\" id=\"".$this->FieldName."\" size=\"20\" maxlength=\"255\" value=\"".htmlspecialchars_decode($Row[$this->FieldName])."\"/>\n";
			if($this->NullFlag){
			echo "			<font size=\"-1\" color=\"DarkGray\">(必填)</font>\n";
			}
			echo "			<div><font size=\"2\"><font color=\"#0000ff\">請填寫範例中紅色字串部份<br>範例：YouTube影片網址 http://www.youtube.com/watch?v=</font><font color=\"red\">Y82YoasxW3k</font></font></div>";						
			echo "		</td>\n";
			echo "	</tr>\n";			
		}
		function ReadShow(){
			global $Row;
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;".htmlspecialchars_decode($Row[$this->FieldName])."</td>\n";
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
		function AddHandle(&$Param){
			global $AddFieldsSQL,$AddValuesSQL;
			if($AddFieldsSQL!=""){ $AddFieldsSQL.=","; $AddValuesSQL.=","; }
			$AddFieldsSQL.="`".$this->FieldName."`";
			$AddValuesSQL.=":".$this->FieldName;
			$Param[":".$this->FieldName] = htmlspecialchars($_POST[$this->FieldName]);
		}
		function ModifyHandle(&$Param){
			global $ModifySQL;
			if($ModifySQL!=""){ $ModifySQL.=","; }
			$ModifySQL.="`".$this->FieldName."`= :".$this->FieldName;
			$Param[":".$this->FieldName] = htmlspecialchars($_POST[$this->FieldName]);
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