<?php
	class CheckBoxFields implements ManagerItem{
		var $FieldName;
		var $ShowName;
		var $NullFlag;
		var $Cols;
		var $ItemValArray;
		var $ItemTextArray;
		var $SaveChar;
		var $ReadOnlyChar;

		public function CheckBoxFields($FieldNameIn,$ShowNameIn,$NullFlagIn,$ItemValArrayIn,$ItemTextArrayIn,$ColsIn,$SaveCharIn,$ReadOnlyCharIn){
			$this->FieldName = $FieldNameIn;
			$this->ShowName = $ShowNameIn;
			$this->NullFlag = $NullFlagIn;
			$this->ItemValArray = $ItemValArrayIn;
			$this->ItemTextArray = $ItemTextArrayIn;
			$this->Cols = $ColsIn;
			$this->SaveChar = $SaveCharIn;
			$this->ReadOnlyChar = $ReadOnlyCharIn;
		}
		function AddShow(){
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">\n";
			$CheckBoxFieldsItemAmount = count($this->ItemValArray );
			$Rows = NumHandle2($CheckBoxFieldsItemAmount,$this->Cols) / $this->Cols;
				
			echo "			<table width=\"90%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"margin-left:5px;\">\n";
			for($i=1;$i<=$Rows;$i++){
			echo "				<tr>\n";
				for($j=0;$j<$this->Cols;$j++){
					if((($i-1) * $this->Cols + $j) < $CheckBoxFieldsItemAmount){
			echo "					<td style=\"font-size:10pt;\"><input class=\"".$this->FieldName."Class\" type=\"checkbox\" name=\"".$this->FieldName."[]\" value=\"".$this->ItemValArray[($i-1) * $this->Cols + $j]."\" />".$this->ItemTextArray[($i-1) * $this->Cols + $j]."</td>\n";
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
			echo "		</td>\n";
			echo "	</tr>\n";
		}
		function ModifyShow(){
			global $Row;
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">\n";
			$ValueString = $Row[$this->FieldName];
			$CheckBoxFieldsItemAmount = count($this->ItemValArray );
			
			
			
			
			$Rows = NumHandle2($CheckBoxFieldsItemAmount,$this->Cols) / $this->Cols;
			echo "			<table width=\"90%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"margin-left:5px;\">\n";
			for($i=1;$i<=$Rows;$i++){
			echo "				<tr>\n";
				for($j=0;$j<$this->Cols;$j++){
					if((($i-1) * $this->Cols + $j) < $CheckBoxFieldsItemAmount){
						if(strpos($ValueString, $this->SaveChar.$this->ItemValArray[($i-1) * $this->Cols + $j].$this->SaveChar) === false ){
			echo "					<td style=\"font-size:10pt;\"><input class=\"".$this->FieldName."Class\" type=\"checkbox\" name=\"".$this->FieldName."[]\" value=\"".$this->ItemValArray[($i-1) * $this->Cols + $j]."\" />".$this->ItemTextArray[($i-1) * $this->Cols + $j]."</td>\n";						
						}else{
			echo "					<td style=\"font-size:10pt;\"><input class=\"".$this->FieldName."Class\" type=\"checkbox\" name=\"".$this->FieldName."[]\" value=\"".$this->ItemValArray[($i-1) * $this->Cols + $j]."\" checked=\"checked\" />".$this->ItemTextArray[($i-1) * $this->Cols + $j]."</td>\n";
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
			echo "		</td>\n";
			echo "	</tr>\n";			
		}
		function ReadShow(){
			global $Row;
			$ValueString = $Row[$this->FieldName];
			$CheckBoxFieldsItemAmount = count($this->ItemValArray );
			$ShowData = "";
			for($i=0;$i<$CheckBoxFieldsItemAmount;$i++){
				if(!(strpos($ValueString, $this->SaveChar.$this->ItemValArray[$i].$this->SaveChar)=== false)){
					if($ShowData != ""){$ShowData .= $this->ReadOnlyChar;}
					$ShowData .= $this->ItemTextArray[$i];
				}
			}
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\" style=\"padding-left:13px;\" id>".$ShowData."</td>\n";
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
				echo "	sError += \"‧『" . $this->ShowName . "』請至少勾選一個\";\n";
				echo "}\n";
			}
		}
		function AddScript(){}
		function ModifyScript(){}
		function ShowScript(){}
		function AddHandle(){
			global $AddFieldsSQL,$AddValuesSQL;
			$ValuesArray = $_POST[$this->FieldName];
			if($ValuesArray != ""){
				$Values = $this->SaveChar . join($this->SaveChar,$ValuesArray).$this->SaveChar;
			}else{
				$Values = "";
			}
			if($AddFieldsSQL!=""){$AddFieldsSQL.=",`".$this->FieldName."`";}else{$AddFieldsSQL.="`".$this->FieldName."`";}
			if($AddValuesSQL!=""){$AddValuesSQL.=",'".$Values."'";}else{$AddValuesSQL.="'".$Values."'";}
		}
		function ModifyHandle(){
			global $ModifySQL;
			$ValuesArray = $_POST[$this->FieldName];
			if($ValuesArray != ""){
				$Values = $this->SaveChar . join($this->SaveChar,$ValuesArray).$this->SaveChar;
			}else{
				$Values = "";
			}
			if($ModifySQL!=""){$ModifySQL.=",`".$this->FieldName."`='".$Values."'";}else{$ModifySQL.="`".$this->FieldName."`='".$Values."'";}
		}
	}
?>