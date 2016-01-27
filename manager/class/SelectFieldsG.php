<?php
class SelectFieldsG implements ManagerItem {
	var $FieldName;
	var $ShowName;
	var $NullFlag;
	var $ValueField;
	var $TextField;
	var $ItemTable;
	var $ItemWhere;
	var $ItemOrder;
	var $SelectItemDefault;
	public function SelectFieldsG($FieldNameIn, $ShowNameIn, $NullFlagIn = false, $ValueFieldIn, $TextFieldIn, $ItemTableIn, $ItemWhereIn = "", $ItemOrderIn, $SelectItemDefaultIn = "") {
		$this->FieldName = $FieldNameIn;
		$this->ShowName = $ShowNameIn;
		$this->NullFlag = $NullFlagIn;
		$this->ValueField = $ValueFieldIn;
		$this->TextField = $TextFieldIn;
		$this->ItemTable = $ItemTableIn;
		$this->ItemWhere = $ItemWhereIn;
		$this->ItemOrder = $ItemOrderIn;
		$this->SelectItemDefault = $SelectItemDefaultIn;
		if ($this->ItemWhere != "") {
			$this->ItemWhere = " where " . $this->ItemWhere;
		}
		if ($this->ItemOrder != "") {
			$this->ItemOrder = " order by " . $this->ItemOrder;
		}
	}
	function AddShow() {
		global $Conn;
		echo "	<tr>\n";
		echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">" . $this->ShowName . "&nbsp;</font></td>\n";
		echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
		echo "			<select id=\"" . $this->FieldName . "G\" name=\"" . $this->FieldName . "G\">\n";
		$SQL = "Select " . $this->ValueField . "," . $this->TextField . " From " . $this->ItemTable . $this->ItemWhere . $this->ItemOrder;
		$Rs = $Conn->query ( $SQL );
		if (! $this->NullFlag) {
			echo "				<option value=\"\">請選擇</option>\n";
		}
		while ( $Item = $Rs->fetch ( PDO::FETCH_ASSOC ) ) {
			if ($Item [$this->ValueField] == $this->SelectItemDefault) {
				echo "				<option value=\"" . $Item [$this->ValueField] . "\" selected=\"selected\">" . $Item [$this->TextField] . "</option>\n";
			} else {
				echo "				<option value=\"" . $Item [$this->ValueField] . "\">" . $Item [$this->TextField] . "</option>\n";
			}
		}
		echo "			</select>\n";
		if ($this->NullFlag) {
			echo "			<font size=\"-1\" color=\"DarkGray\">(必填)</font>\n";
		}
		echo "		</td>\n";
		echo "	</tr>\n";
	}
	function ModifyShow() {
		global $Conn, $Row;
		echo "	<tr>\n";
		echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">" . $this->ShowName . "&nbsp;</font></td>\n";
		echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;\n";
		echo "			<select id=\"" . $this->FieldName . "G\" name=\"" . $this->FieldName . "G\">\n";
		$SQL = "Select " . $this->ValueField . "," . $this->TextField . " From " . $this->ItemTable . $this->ItemWhere . $this->ItemOrder;
		$Rs = $Conn->query ( $SQL );
		if (! $this->NullFlag) {
			echo "				<option value=\"\">請選擇</option>\n";
		}
		while ( $Item = $Rs->fetch ( PDO::FETCH_ASSOC ) ) {
			if ($Item [$this->ValueField] == $Row [$this->FieldName]) {
				echo "				<option value=\"" . $Item [$this->ValueField] . "\" selected=\"selected\">" . $Item [$this->TextField] . "</option>\n";
			} else {
				echo "				<option value=\"" . $Item [$this->ValueField] . "\">" . $Item [$this->TextField] . "</option>\n";
			}
		}
		echo "			</select>\n";
		if ($this->NullFlag) {
			echo "			<font size=\"-1\" color=\"DarkGray\">(必填)</font>\n";
		}
		echo "		</td>\n";
		echo "	</tr>\n";
	}
	function ReadShow() {
		global $Row, $Conn;
		echo "	<tr>\n";
		echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">" . $this->ShowName . "&nbsp;</font></td>\n";
		echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">&nbsp;&nbsp;";
		$SQL = "Select " . $this->ValueField . "," . $this->TextField . " From " . $this->ItemTable . $this->ItemWhere . $this->ItemOrder;
		$Rs = $Conn->query ( $SQL );
		while ( $Item = $Rs->fetch ( PDO::FETCH_ASSOC ) ) {
			if ($Item [$this->ValueField] == $Row [$this->FieldName]) {
				// var_dump ( $Item [$this->ValueField], $Row [$this->FieldName] );
				echo $Item [$this->TextField];
			} else {
				// echo " <option value=\"" . $Item [$this->ValueField] . "\">" . $Item [$this->TextField] . "</option>\n";
			}
		}
		echo "		</td>\n";
		echo "	</tr>\n";
	}
	function CheckScript() {
		if ($this->NullFlag) {
			echo "if((rtn=CheckField(\"" . $this->FieldName . "G\",\"" . $this->ShowName . "\",255))!=\"\"){\n";
			echo "	sError += (sError==\"\")?\"\":\"\\n\";\n";
			echo "	sError += rtn;\n";
			echo "}\n";
		}
	}
	function AddScript() {
	}
	function ModifyScript() {
	}
	function ShowScript() {
	}
	function AddHandle(&$Param) {
		global $AddFieldsSQL, $AddValuesSQL;
		if ($AddFieldsSQL != "") {
			$AddFieldsSQL .= ",";
			$AddValuesSQL .= ",";
		}
		$Param [":" . $this->FieldName] = $_POST [$this->FieldName . "G"];
		$AddFieldsSQL .= "`" . $this->FieldName . "`";
		$AddValuesSQL .= ":" . $this->FieldName;
	}
	function ModifyHandle(&$Param) {
		global $ModifySQL;
		if ($ModifySQL != "") {
			$ModifySQL .= ",";
		}
		$Param [":" . $this->FieldName] = $_POST [$this->FieldName . "G"];
		$ModifySQL .= "`" . $this->FieldName . "`= :" . $this->FieldName;
	}
	function GetDataHandle(&$data) {
		$DateValue = $_POST [$this->FieldName . "G"];
		if ($DateValue == "") {
			$DateValue = "";
		}
		$data [$this->FieldName] = $DateValue;
	}
}
?>