<?php 
	$Page = CheckData($_REQUEST["Page"]);
	if($Page == ""){$Page = 1;}
	$Page = intval($Page);
	$SerialNo = CheckData($_REQUEST["SerialNo"]);
	if($SerialNo == ""){$SerialNo = 0;}
	$SerialNo = intval($SerialNo);	
	$G0 = CheckData($_REQUEST["$G0"]);
	if($G0 == "" && $SerialNo != ""){
		$SQL = "Select G0 From product Where Status = '上架' And SerialNo = ".$SerialNo;
		$Rs = mysql_query($SQL,$Conn);
		if($Rs && mysql_num_rows($Rs) > 0){
			$Row = mysql_fetch_array($Rs);
			$G0 = $Row[0];
		}else{
			$G0 = 0;
		}
	}else if($G0 == ""){
		$SQL = "Select SerialNo From productcategory Where Status = '上架' Order By Sort,SerialNo DESC limit 0,1";
		$Rs = mysql_query($SQL,$Conn);
		if($Rs && mysql_num_rows($Rs) > 0){
			$Row = mysql_fetch_array($Rs);
			$G0 = $Row[0];
		}else{
			$G0 = 0;
		}
	}
	$G0 = intval($G0);
	//查詢分類名稱
	$SQL = "Select Category".$Lang." From productcategory Where Status = '上架' And SerialNo = ".$G0;
	$Rs = mysql_query($SQL,$Conn);
	if($Rs && mysql_num_rows($Rs) > 0){
		$Row = mysql_fetch_array($Rs);
		$CategoryName = $Row[0];
	}else{
		$CategoryName = "";
	}
?>