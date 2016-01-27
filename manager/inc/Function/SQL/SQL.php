<?php
/*
$Rs = myQuery("TableName", "*", "WhereSQL", "OrderSQL" , array(), 0 , 0);
$Row = myQueryDetail("TableName", "*", "WhereSQL", array(), "OrderSQL");
$Row = myQueryDetail("TableName", "*", "WhereSQL", array());
$NewID = myExecSQL($SQL, array());
ShowTable($TableName)
*/
//檢查是否有資料
function CheckExist($DBTable,$Query,$Param){
	global $Conn;
	if($Query!=""){$Query = " Where ".$Query;}
	$SQL="Select  From ".$DBTable.$Query;
	$Row = myQueryDetail($DBTable, "Count(*) As Counter", $Query, $Param);
	if(intval($Row["Counter"])>0){
		return true;		
	}else{
		return false;
	}
}

//取得資料表欄位型態
function myGetType2($TableName,$Fields = array(),$RemoveField = array("SerialNo")){
	global $Conn;
	$Rtn = array();
	$CheckArray = (count($Fields) > 0)?true:false;
	$SQL = "SHOW FULL FIELDS FROM ".$TableName;
	$Rs = $Conn->prepare($SQL);
	$Rs->execute();
	while($Row = $Rs->fetch(PDO::FETCH_ASSOC)){
		$IsDataItem = true;
		if($CheckArray && !(in_array($Row["Field"], $Fields))){ $IsDataItem = false; }
		if($IsDataItem){
			$Rtn[$Row["Field"]] = $Row["Type"];
		}
	}
	if(count($RemoveField) > 0){
		foreach($RemoveField as $Field){
			unset($Rtn[$Field]);
		}
	}
	return $Rtn ;
}




//初始化資料
function InitData($TypeArray,&$DataArray){
	foreach($TypeArray as $Key => $Value){
		if($Key == "SerialNo"){
			$DataArray[$Key] = "default";
		}else{
			$ValueTemp = explode("(", $Value);
			$Type = $ValueTemp[0];
			switch($Type){
				case "int":
					$DataArray[$Key] = 0;
					break;
				case "double":
					$DataArray[$Key] = 0.00;
					break;
				case "date":
					$DataArray[$Key] = "0000-00-00";
					break;
				case "datetime":
					$DataArray[$Key] = "0000-00-00 00:00:00";
					break;
				default :
					$DataArray[$Key] = "";
					break;
			}
		}
	}
}

//初始化資料
function InitData2($TableName,&$TypeArray,&$DataArray,$Fields = array(),$RemoveField = array("SerialNo")){
	$TypeArray = myGetType2($TableName,$Fields,$RemoveField);
	foreach($TypeArray as $Key => $Value){
		if($Key == "SerialNo"){
			$DataArray[$Key] = "default";
		}else{
			$ValueTemp = explode("(", $Value);
			$Type = $ValueTemp[0];
			switch($Type){
				case "int":
					$DataArray[$Key] = 0;
					break;
				case "double":
					$DataArray[$Key] = 0.00;
					break;
				case "date":
					$DataArray[$Key] = "0000-00-00";
					break;
				case "datetime":
					$DataArray[$Key] = "0000-00-00 00:00:00";
					break;
				default :
					$DataArray[$Key] = "";
					break;
			}
		}
	}
}
function myQuery($TableName, $Fields = "*", $WhereSQL="", $OrderSQL="", $Params = array(), $GetDataAmount=0, $GetDataStart = 0, $IsTest = false){
	// $data = myQuery("TableName", "Fields", "WhereSQL", "OrderSQL" , $Params, 0 , 0);
	global $Conn;
	$Data = array();
	$SQL = "Select ".$Fields." From ".$TableName;
	if($WhereSQL != ""){
		$SQL .= " Where ".$WhereSQL;
	}
	if($OrderSQL != ""){
		$SQL .= " Order By ".$OrderSQL;
	}
	if($GetDataAmount != 0){
		$SQL .= " limit ".$GetDataStart.",".$GetDataAmount;
	}
	if($IsTest){
		//開啟檔案
		$fp = fopen("log.txt",'a+');
		fputs($fp,$SQL."\r\n");
		fclose($fp);
	}
	$Rs = $Conn->prepare($SQL);
	foreach($Params as $Key => $Value){
		$Rs->bindValue($Key, $Params[$Key]);
	}
	$Rs->execute();
	while($Row = $Rs->fetch(PDO::FETCH_ASSOC)){
		$Data[] = $Row;
	}
	return $Data;
}
function myQueryDetail($TableName, $Fields = "*", $WhereSQL="", $Params =array(), $OrderSQL="",$IsTest = false){
	// $Row = myQuery("TableName", "Fields", "WhereSQL", $Params, "OrderSQL");
	global $Conn;
	$Data = array();
	$SQL = "Select ".$Fields." From ".$TableName;
	if($WhereSQL != ""){
		$SQL .= " Where ".$WhereSQL;
	}
	if($OrderSQL != ""){
		$SQL .= " Order By ".$OrderSQL;
	}
	$SQL .= " limit 0,1";
	if($IsTest){
		//開啟檔案
		$fp = fopen("log.txt",'a+');
		fputs($fp,$SQL."\r\n");
		fclose($fp);
	}
	$Rs = $Conn->prepare($SQL);
	foreach($Params as $Key => $Value){
		$Rs->bindValue($Key, $Params[$Key]);
	}
	$Rs->execute();
	$Data = $Rs->fetch(PDO::FETCH_ASSOC);
	
	if($Data){
		return $Data;
	}else{
		return "";
	}
}
function ShowTable($TableName){
	global $Conn;
	$Data = array();
	$SQL = "SHOW FULL FIELDS FROM ".$TableName;
	$Rs = $Conn->prepare($SQL);
	$Rs->execute();
	$data = array();
	while($Row = $Rs->fetch(PDO::FETCH_ASSOC)){
		$data[$Row["Field"]] = $Row["Comment"];
	}
	return $data;
}

function myExecSQL($SQL, $Params = array()){
	global $Conn;
	$Rs = $Conn->prepare($SQL);
	foreach($Params as $Key => $Value){
		$Rs->bindValue($Key, $Params[$Key]);
	}
	$Rs->execute();
	$SQLSplit = explode(" ", $SQL);
	$opp = strtolower($SQLSplit[0]);
	if($opp == "insert"){
		return $Conn->lastInsertId();
	}
	return "";
}

function myGetSQL($TypeArray,$DataArray,$GetType,&$Var1,&$Var2 = null){
	$SplitChar = "";
	$Param = array();
	if($GetType == "Update"){
		foreach($TypeArray as $Key => $Value){
			if($Key != "SerialNo"){
				$Param[":".$Key] = $DataArray[$Key];
				$Var1 .= $SplitChar."`".$Key."` = :".$Key;
				$SplitChar = ",";
			}
		}
	}else if($GetType == "Insert"){
		foreach($TypeArray as $Key => $Value){
			$Param[":".$Key] = $DataArray[$Key];
			$Var1 .= $SplitChar."`".$Key."`";
			if($Key != "SerialNo"){
				$Var2 .= $SplitChar.":".$Key;
				$SplitChar = ",";
			}
		}
	}
	return $Param;
}
?>