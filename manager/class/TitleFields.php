<?php
	class TitleFields implements ManagerItem{
		var $Title;
		var $Align;
		public function TitleFields($TitleIn, $AlignIn = "center"){
			$this->Title = $TitleIn;
			$this->Align = $AlignIn;
		}
		function AddShow(){
			echo "	<tr>\n";
			echo "		<td width=\"100%\" colspan=\"2\" bgcolor=\"#EEEEEE\" nowrap align=\"".$this->Align."\"><font color=\"#FF8833\">".$this->Title."&nbsp;</font></td>\n";
			echo "	</tr>\n";
			echo "	<tr>\n";
		}
		function ModifyShow(){
			global $Row;
			echo "	<tr>\n";
			echo "		<td width=\"100%\" colspan=\"2\" bgcolor=\"#EEEEEE\" nowrap align=\"".$this->Align."\"><font color=\"#FF8833\">".$this->Title."&nbsp;</font></td>\n";
			echo "	</tr>\n";		
		}
		function ReadShow(){
			global $Row;
			echo "	<tr>\n";
			echo "		<td width=\"100%\" colspan=\"2\" bgcolor=\"#EEEEEE\" nowrap align=\"".$this->Align."\"><font color=\"#FF8833\">".$this->Title."&nbsp;</font></td>\n";
			echo "	</tr>\n";
		}
		function CheckScript(){

		}
		function AddScript(){

		}
		function ModifyScript(){
			global $Row;
			echo "<script language=\"javascript\" type=\"text/javascript\">\n";
			echo "$(function(){\n";
			echo "$(\"#".$this->TableName."\").find(\"tr\").eq(0).find(\"td\").eq(0).css({\"border-right\":\"1px solid #a3bfe2\",\"padding-right\":\"5px\",\"height\":\"30px\"});\n";
			echo "});\n";
			echo "</script>\n";			
		}
		function ShowScript(){}
		function AddHandle(){
			global $AddFieldsSQL,$AddValuesSQL;

		}
		function ModifyHandle(){
			global $ModifySQL;
		}
	}
?>