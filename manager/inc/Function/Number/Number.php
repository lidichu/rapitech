<?php
//========================================================================
//數字格式設定
//參數說明
//Num：數字
//NumCount：以幾位數來表示
//例：NumHandle(3,2) 結果為 03
//========================================================================
function NumHandle($Num,$NumCount){
	if($Num!=""){
		if(strlen($Num) >= $NumCount){
			$RtnNumHandle = $Num;	
		}else{
			for($NumHandlei = 1 ; $NumHandlei <=($NumCount - strlen($Num));$NumHandlei++){
				$RtnNumHandle .= "0";
			}
			$RtnNumHandle .= $Num;
		}
	}
	return $RtnNumHandle;
}
//========================================================================
//無條件進位(限正數)
//參數說明
//Num1：目前數字
//Num2：倍數數字
//例：NumHandle2(18,5) 結果為 20
//========================================================================
function NumHandle2($Num1,$Num2){
	if($Num1 % $Num2 == 0){
		return $Num1;
	}else{
		return ($Num1 - ( $Num1 % $Num2) + $Num2);
	}
}
//數字3位,
//數字格式設定
//參數說明
//Num：數字
//NumHandle3(1000) 結果為 1,000
function NumHandle3($Num){
	if(strval($Num)==""){return "";}
	if(strval($Num)=="0"){return "0";}
	$Num = strval($Num);
	if(strlen($Num)<=3){
		return $Num;	
	}else{
		return NumHandle3(substr($Num,0,-3)).",".substr($Num,-3);
	}
}
//檢查數字欄位傳值
function CheckNumber($str){
	$rtn = "";
	if($str == "") return "";
	$str = CheckData($str);
	preg_match_all('/([0-9.]+)/',$str,$arr);
	foreach($arr[0] as $Key => $Value){
		$rtn .= $Value;
	}
	$arr = explode(".",$rtn);
	$rtn = "";
	for($i=0;$i<count($arr);$i++){
		if($i == 0){
			if($arr[$i] == ""){
				$rtn = 0;
			}else{
				$rtn = $arr[$i];
			}
		}else if($i == 1){
			$rtn .= ".".$arr[$i];
		}else{
			$rtn .= $arr[$i];
		}
	}
	return $rtn;
}
// 顯示至小數第 NumLength 位
function NumDot($Num,$NumLength){
	// 回傳值
	$Rtn = "";
	// 將傳入值轉字串
	$Num = strval($Num);
	// 判斷傳入值是否有『.』
	if(strrpos($Num,".") === false){
		$Rtn = $Num;
		$Rtn .= ($NumLength>0)?".":"";
		for($i=1;$i<=$NumLength;$i++){
			$Rtn .= "0";
		}
	}else{
		$Num_split = explode(".",$Num);
		$Rtn = $Num_split[0];
		$Rtn .= ($NumLength>0)?".":"";
		for($i=1;$i<=$NumLength;$i++){
			if($i<=$Num_split[1]){
				$Rtn .= substr($Num_split[1],($i-1),1);
			}else{
				$Rtn .= "0";
			}
		}
	}
	return $Rtn;
}
//依日期產品編號
function DateOrder($DateString){
	if($DateString != ""){
		$DateString = strtotime($DateString);
		return (date("Y", $DateString)-1911) . substr("0".date("m", $DateString),-2). substr("0".date("d", $DateString),-2) ;
	}else{
		return "";
	}
	
}
?>