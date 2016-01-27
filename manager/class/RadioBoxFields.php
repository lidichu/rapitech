<?php
	class RadioBoxFields implements ManagerItem{
		var $FieldName;
		var $ShowName;
		var $NullFlag;
		var $Cols;
		var $FieldType;
		var $ItemValArray;
		var $ItemTextArray;
		var $DefaultValue;
		var $Width;
		public function RadioBoxFields($FieldNameIn,$ShowNameIn,$NullFlagIn,$ItemValArrayIn,$ItemTextArrayIn,$ColsIn,$FieldTypeIn = "string",$WidthIn="90%",$DefaultIn=""){
			$this->FieldName = $FieldNameIn;
			$this->ShowName = $ShowNameIn;
			$this->NullFlag = $NullFlagIn;
			$this->ItemValArray = $ItemValArrayIn;
			$this->ItemTextArray = $ItemTextArrayIn;
			$this->Cols = $ColsIn;
			$this->FieldType = $FieldTypeIn;
			$this->Width = $WidthIn;
			$this->DefaultValue = $DefaultIn;
			if($this->Width != ""){ $this->Width = "width=\"".$this->Width."\""; }
		}
		function AddShow(){
			echo "	<tr>\n";
			if($this->NullFlag){
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;<br /><font size=\"-1\" color=\"DarkGray\">(必填)</font></font></td>\n";
			}else{
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			}
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">\n";
			$RadioBoxFieldsItemAmount = count($this->ItemValArray );
			$Rows = NumHandle2($RadioBoxFieldsItemAmount,$this->Cols) / $this->Cols;
				
			echo "			<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" ".$this->Width." style=\"margin-left:5px;\">\n";
			for($i=1;$i<=$Rows;$i++){
			echo "				<tr>\n";
				for($j=0;$j<$this->Cols;$j++){
					if((($i-1) * $this->Cols + $j) < $RadioBoxFieldsItemAmount){
						if($this->ItemValArray[($i-1) * $this->Cols + $j] == $this->DefaultValue){
							echo "					<td style=\"font-size:10pt;\"><input class=\"".$this->FieldName."Class\" type=\"radio\" name=\"".$this->FieldName."\" value=\"".$this->ItemValArray[($i-1) * $this->Cols + $j]."\"  checked=\"checked\" />".$this->ItemTextArray[($i-1) * $this->Cols + $j]."</td>\n";						
						}else{
							echo "					<td style=\"font-size:10pt;\"><input class=\"".$this->FieldName."Class\" type=\"radio\" name=\"".$this->FieldName."\" value=\"".$this->ItemValArray[($i-1) * $this->Cols + $j]."\" />".$this->ItemTextArray[($i-1) * $this->Cols + $j]."</td>\n";
						}					
					}else{
			echo "					<td style=\"font-size:10pt;\">&nbsp;</td>\n";		
					}
				}
			echo "				</tr>\n";
			}
			echo "			</table>\n";
			echo "		</td>\n";
			echo "	</tr>\n";
		}
		function AddShowTiny(){
			$RadioBoxFieldsItemAmount = count($this->ItemValArray );
			$Rows = NumHandle2($RadioBoxFieldsItemAmount,$this->Cols) / $this->Cols;
				
			echo "			<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" ".$this->Width." style=\"margin-left:5px;\">\n";
			for($i=1;$i<=$Rows;$i++){
			echo "				<tr>\n";
				for($j=0;$j<$this->Cols;$j++){
					if((($i-1) * $this->Cols + $j) < $RadioBoxFieldsItemAmount){
						if($this->ItemValArray[($i-1) * $this->Cols + $j] == $this->DefaultValue){
							echo "					<td style=\"font-size:10pt;\"><input class=\"".$this->FieldName."Class\" type=\"radio\" name=\"".$this->FieldName."\" value=\"".$this->ItemValArray[($i-1) * $this->Cols + $j]."\"  checked=\"checked\" />".$this->ItemTextArray[($i-1) * $this->Cols + $j]."</td>\n";						
						}else{
							echo "					<td style=\"font-size:10pt;\"><input class=\"".$this->FieldName."Class\" type=\"radio\" name=\"".$this->FieldName."\" value=\"".$this->ItemValArray[($i-1) * $this->Cols + $j]."\" />".$this->ItemTextArray[($i-1) * $this->Cols + $j]."</td>\n";
						}					
					}else{
			echo "					<td style=\"font-size:10pt;\">&nbsp;</td>\n";		
					}
				}
			echo "				</tr>\n";
			}
			echo "			</table>\n";
			if($this->NullFlag){
			echo "			<font size=\"-1\" color=\"DarkGray\">(必填)</font>\n";
			}
		}
		function ModifyShow(){
			global $Row;
			echo "	<tr>\n";
			if($this->NullFlag){
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;<br /><font size=\"-1\" color=\"DarkGray\">(必填)</font></font></td>\n";
			}else{
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			}
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">\n";
			$RadioBoxFieldsItemAmount = count($this->ItemValArray );
			$Rows = NumHandle2($RadioBoxFieldsItemAmount,$this->Cols) / $this->Cols;
			echo "			<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" ".$this->Width." style=\"margin-left:5px;\">\n";
			
			for($i=1;$i<=$Rows;$i++){
			echo "				<tr>\n";
			
				for($j=0;$j<$this->Cols;$j++){
					if((($i-1) * $this->Cols + $j) < $RadioBoxFieldsItemAmount){
						if($this->ItemValArray[($i-1) * $this->Cols + $j] == $Row[$this->FieldName]){
			echo "					<td style=\"font-size:10pt;\"><input class=\"".$this->FieldName."Class\" type=\"radio\" name=\"".$this->FieldName."\" value=\"".$this->ItemValArray[($i-1) * $this->Cols + $j]."\"  checked=\"checked\" />".$this->ItemTextArray[($i-1) * $this->Cols + $j]."</td>\n";						
						}else{
			echo "					<td style=\"font-size:10pt;\"><input class=\"".$this->FieldName."Class\" type=\"radio\" name=\"".$this->FieldName."\" value=\"".$this->ItemValArray[($i-1) * $this->Cols + $j]."\" />".$this->ItemTextArray[($i-1) * $this->Cols + $j]."</td>\n";
						}
					}else{
			echo "					<td style=\"font-size:10pt;\">&nbsp;</td>\n";		
					}
				}
			echo "				</tr>\n";
			}
			echo "			</table>\n";
			echo "		</td>\n";
			echo "	</tr>\n";			
		}
		function ModifyShowTiny(){
			global $Row;			
			$RadioBoxFieldsItemAmount = count($this->ItemValArray );
			$Rows = NumHandle2($RadioBoxFieldsItemAmount,$this->Cols) / $this->Cols;
			echo "			<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" ".$this->Width." style=\"margin-left:5px;\">\n";
			
			for($i=1;$i<=$Rows;$i++){
			echo "				<tr>\n";
			
				for($j=0;$j<$this->Cols;$j++){
					if((($i-1) * $this->Cols + $j) < $RadioBoxFieldsItemAmount){
						if($this->ItemValArray[($i-1) * $this->Cols + $j] == $Row[$this->FieldName]){
			echo "					<td style=\"font-size:10pt;\"><input class=\"".$this->FieldName."Class\" type=\"radio\" name=\"".$this->FieldName."\" value=\"".$this->ItemValArray[($i-1) * $this->Cols + $j]."\"  checked=\"checked\" />".$this->ItemTextArray[($i-1) * $this->Cols + $j]."</td>\n";						
						}else{
			echo "					<td style=\"font-size:10pt;\"><input class=\"".$this->FieldName."Class\" type=\"radio\" name=\"".$this->FieldName."\" value=\"".$this->ItemValArray[($i-1) * $this->Cols + $j]."\" />".$this->ItemTextArray[($i-1) * $this->Cols + $j]."</td>\n";
						}
					}else{
			echo "					<td style=\"font-size:10pt;\">&nbsp;</td>\n";		
					}
				}
			echo "				</tr>\n";
			}
			echo "			</table>\n";
			if($this->NullFlag){
			echo "			<font size=\"-1\" color=\"DarkGray\">(必填)</font>\n";
			}
		}		
		function ReadShow(){
			global $Row;
			$Value = $Row[$this->FieldName];
			if($Value == "true"){ $Value = "是"; }
			if($Value == "false"){ $Value = "否"; }
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\" style=\"padding-left:13px;\" id>".$Value."</td>\n";
			echo "	</tr>\n";			
		}
		
		function CheckScript(){
			if($this->NullFlag){
				echo "var ".$this->FieldName."ClassFlag = false;\n";
				echo "if($(\"." . $this->FieldName . "Class:checked\").length > 0){\n";
				echo "	".$this->FieldName."ClassFlag = true;\n";
				echo "}\n";
				echo "if(!".$this->FieldName."ClassFlag){\n";
				echo "	sError += (sError==\"\")?\"\":\"\\n\";\n";
				echo "	sError += \"‧『" . $this->ShowName . "』尚未選取\";\n";
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
			if($this->FieldType == "string"){
				$Param[":".$this->FieldName] = htmlspecialchars($_POST[$this->FieldName]);
			}else{
				$Param[":".$this->FieldName] = $_POST[$this->FieldName];
			}
		}
		function ModifyHandle(&$Param){
			global $ModifySQL;
			if($ModifySQL!=""){ $ModifySQL.=","; }
			$ModifySQL.="`".$this->FieldName."`= :".$this->FieldName;
			if($this->FieldType == "string"){
				$Param[":".$this->FieldName] = htmlspecialchars($_POST[$this->FieldName]);
			}else{
				$Param[":".$this->FieldName] = $_POST[$this->FieldName];
			}
		}
		function GetDataHandle(&$data){
			$DateValue = $_POST[$this->FieldName];
			if($DateValue==""){
				$DateValue = "";
			}
			$data[$this->FieldName] = $DateValue;
		}
	}
?>