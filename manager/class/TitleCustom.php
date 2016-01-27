<?php
	class TitleCustom implements ManagerItem{
		var $ShowName;
		var $ShowCustomHtml;
		public function TitleCustom($ShowNameIn,$ShowCustomHtmlIn){
			$this->ShowName = $ShowNameIn;
			$this->ShowCustomHtml = $ShowCustomHtmlIn;
		}
		function AddShow(){
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			echo "			".$this->ShowCustomHtml."\n";
			echo "		</td>\n";
			echo "	</tr>\n";
		}
		function ModifyShow(){
			echo "	<tr>\n";			
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			echo "			".$this->ShowCustomHtml."\n";
			echo "		</td>\n";
			echo "	</tr>\n";			
		}
		function ReadShow(){
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			echo "			".$this->ShowCustomHtml."\n";
			echo "	</tr>\n";			
		}
		function CheckScript(){}
		function AddScript(){}
		function ModifyScript(){}
		function ShowScript(){}
		function AddHandle(&$Param){
			global $AddFieldsSQL,$AddValuesSQL;
		}
		function ModifyHandle(&$Param){	
			global $ModifySQL;
		}
		function GetDataHandle(&$data){		}
	}
?>