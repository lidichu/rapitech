<?php
	$G0 = CheckData($_REQUEST["G0"]);
	if($G0 == ""){
		$SQL = "Select SerialNo From adcategory Where Status = '上架' Order By Sort,SerialNo DESC limit 0,1";	
		$Rs = mysql_query($SQL,$Conn);	
		if($Rs && mysql_num_rows($Rs) > 0){
			$Row = mysql_fetch_array($Rs);
			$G0 = $Row[0];
		}else{
			$G0 = 0;
		}		
	}
	$G0 = intval($G0);
	
	$SQL = "Select Category".$Lang." From adcategory Where Status = '上架";	
	$Rs = mysql_query($SQL,$Conn);
	if($Rs && mysql_num_rows($Rs) > 0){
		$Row = mysql_fetch_array($Rs);
		$CategoryName = $Row[0];
	}else{
		$CategoryName = "";
	}		

	$data = array();
	$SQL = "Select * From ad Where G0 = ".$G0." And Status = '上架' Order By Sort,SerialNo DESC";
	$Rs = mysql_query($SQL,$Conn);
	if($Rs && mysql_num_rows($Rs) > 0){
		while($Row = mysql_fetch_array($Rs)){
			$data[] = $Row;
		}
	}
?>