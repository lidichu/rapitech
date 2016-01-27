<?php
	class AuthorityFields implements ManagerItem{
		var $FieldName;
		var $ShowName;
		var $NullFlag;
		var $RelField;
		var $RelShow;
		var $RelTable;
		var $RelQuery;
		var $RelOrder;
		var $Cols;
		
		public function AuthorityFields($FieldNameIn,$ShowNameIn,$NullFlagIn=false,$RelFieldIn,$RelShowIn,$RelTableIn,$RelQueryIn="",$RelOrderIn="",$ColsIn=0){
			$this->FieldName = $FieldNameIn;
			$this->ShowName = $ShowNameIn;
			$this->NullFlag = NullFlagIn;
			$this->RelField = $RelFieldIn;
			$this->RelShow = $RelShowIn;
			$this->RelTable = $RelTableIn;
			$this->RelQuery = $RelQueryIn;
			$this->RelOrder = $RelOrderIn;
			$this->Cols = intval($ColsIn);
			
			//NumHandle2
			if($this->RelQuery!=""){$this->RelQuery = " Where ".$this->RelQuery;}
			if($this->RelOrder!=""){$this->RelOrder = " Order By ".$this->RelOrder;}
		}
		function AddShow(){
			global $Conn;
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
			
			$Rows = 0;
			//查詢數量
			$SQL="Select Count(*) As Counter From ".$this->RelTable.$this->RelQuery;
			$Rs = $Conn->prepare($SQL);
			$Rs->execute();
			$DataAmount = $Rs->fetchColumn();
			$Rows = NumHandle2(intval($DataAmount),$this->Cols) / $this->Cols;				
			//查詢選項
			$SQL="Select ".$this->RelField.",".$this->RelShow." From ".$this->RelTable.$this->RelQuery.$this->RelOrder;
			$Rs = $Conn->prepare($SQL);
			$Rs->execute();
			echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"100%\">\n";
			for($i=1;$i<=$Rows;$i++){
				echo "	<tr>\n";
				for($j=1;$j<=$this->Cols;$j++){
					if($Row2 = $Rs->fetch(PDO::FETCH_ASSOC)){
						echo "		<td><input class=\"".$this->FieldName."Class\" type=\"checkbox\" name=\"".$this->FieldName."[]\" value=\"".NumHandle($Row2[$this->RelField],6)."\" />".$Row2[$this->RelShow]."</td>\n";
					}else{
						echo "		<td>&nbsp;</td>\n";
					}
				}
				echo "	</tr>\n";
			}			
			echo "</table>\n";
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
			$RowItem = $Row[$this->FieldName];
			$RowItemArray = split(",", $RowItem);
			$Rows = 0;
			//查詢數量
			$SQL="Select Count(*) As Counter From ".$this->RelTable.$this->RelQuery;
			$Rs = $Conn->prepare($SQL);
			$Rs->execute();
			$DataAmount = $Rs->fetchColumn();
			$Rows = NumHandle2(intval($DataAmount),$this->Cols) / $this->Cols;
			//查詢選項
			$SQL="Select ".$this->RelField.",".$this->RelShow." From ".$this->RelTable.$this->RelQuery.$this->RelOrder;
			$Rs = $Conn->prepare($SQL);
			$Rs->execute();
			$CheckFlag = "";
			echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"100%\">\n";
			for($i=1;$i<=$Rows;$i++){
				echo "	<tr>\n";
				for($j=1;$j<=$this->Cols;$j++){
					
					if($Row2 = $Rs->fetch(PDO::FETCH_ASSOC)){
						$CheckFlag = (in_array(NumHandle($Row2[$this->RelField],6),$RowItemArray))?"checked=\"checked\"":"";
						echo "		<td><input class=\"".$this->FieldName."Class\" type=\"checkbox\" name=\"".$this->FieldName."[]\" value=\"".NumHandle($Row2[$this->RelField],6)."\"".$CheckFlag." />".$Row2[$this->RelShow]."</td>\n";
					}else{
						echo "		<td>&nbsp;</td>\n";
					}
				}
				echo "	</tr>\n";
			}			
			echo "</table>\n";
			if($this->NullFlag){
			echo "			<font size=\"-1\" color=\"DarkGray\">(必填)</font>\n";
			}
			echo "		</td>\n";
			echo "	</tr>\n";			
		}
		function ReadShow(){
			global $Row,$Conn;
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;";
			$RowItem = $Row[$this->FieldName];
			$RowItemArray = split(",", $RowItem);			
			//查詢選項
			$SQL="Select ".$this->RelField.",".$this->RelShow." From ".$this->RelTable.$this->RelQuery.$this->RelOrder;
			$Rs = $Conn->prepare($SQL);
			$Rs->execute();
			$Result = "";
			while($Row2 = $Rs->fetch(PDO::FETCH_ASSOC)){
				if(in_array(NumHandle($Row2[$this->RelField],6),$RowItemArray)){
					$Result .= ($Result=="")?"":",";
					$Result .= $Row2[$this->RelShow];
				}
			}
			echo $Result;
			echo "		</td>\n";
			echo "	</tr>\n";			
		}
		function CheckScript(){
			if($this->NullFlag){
				//echo "alert($(\":checkbox.".$this->FieldName."Class[checked]\").length);\n";
				echo "if($(\":checkbox.".$this->FieldName."Class[checked]\").length < 1){\n";
				echo "	sError += (sError==\"\")?\"\":\"\\n\";\n";
				echo "	sError += \"‧『".$this->ShowName."』請至少勾選一個\";\n";
				echo "}\n";
			}
		}
		function AddScript(){}
		function ModifyScript(){}
		function ShowScript(){}
		function AddHandle(&$Param){
			global $AddFieldsSQL,$AddValuesSQL;
			
			//接收參數
			$Result = $_POST[$this->FieldName];
			while (list ($key,$val) = @each ($Result)) { 
				$ResultString .= ($ResultString=="")?"":",";
				$ResultString .= $val;
			}
			if($AddFieldsSQL!=""){
				$AddFieldsSQL.=",";
				$AddValuesSQL.=",";
			}
			$Param[":".$this->FieldName] = $ResultString;
			$AddFieldsSQL.="`".$this->FieldName."`";
			$AddValuesSQL.=":".$this->FieldName;
		}
		function ModifyHandle(&$Param){
			global $ModifySQL;
			//接收參數
			$Result = $_POST[$this->FieldName];
			while (list ($key,$val) = @each ($Result)) { 
				$ResultString .= ($ResultString=="")?"":",";
				$ResultString .= $val;
			}
			if($ModifySQL!=""){
				$ModifySQL.=",";
			}
			$Param[":".$this->FieldName] = $ResultString;
			$ModifySQL.="`".$this->FieldName."`= :".$this->FieldName;
		}
		function GetDataHandle(&$data){
			//接收參數
			$Result = $_POST[$this->FieldName];
			$ResultString = "";
			while (list ($key,$val) = @each ($Result)) { 
				$ResultString .= ($ResultString=="")?"":",";
				$ResultString .= $val;
			}
			$data[$this->FieldName] = $ResultString;
		}
	}
?>