<?php
//========================================================================
//將日期資料轉成 yyyy/mm/dd
//參數說明 
//DateString：日期資料
//explodeString：分隔字串
//例如 
//A = DateHandle("2008/6/02",".")
//結果 A值為 ：2008.06.02
//========================================================================
function DateHandle($DateString,$explodechar){
	
	if($DateString!=""){
		$DateString = strtotime($DateString);
		return date("Y", $DateString) . $explodechar . substr("0".date("m", $DateString),-2) . $explodechar . substr("0".date("d", $DateString),-2);
	}else{
		return "";
	}
}
//========================================================================
//農曆版
//將日期資料轉成 yyyy/mm/dd
//參數說明 
//DateString：日期資料
//explodeString：分隔字串
//例如 
//A = DateHandle("2008/6/02",".")
//結果 A值為 ：2008.06.02
//========================================================================
function DateHandleCh($DateString){
	$nongGong = new OT_NongLiGongLi();
	$errStr = "";
	$PostDateCh = $nongGong->GongToNong($DateString,0,$errStr);
	return $PostDateCh;
}
//========================================================================
//將日期資料轉成 yyyy/mm/dd
//參數說明 
//DateString：日期資料
//explodeString：分隔字串
//例如 
//A = DateHandle("2008/6/02 11:41",".")
//結果 A值為 ： June 2, 2008 11:41 PM
//========================================================================
function DateHandle2($DateString){
	if($DateString!=""){
		$DateString = strtotime($DateString);
		return date("F", $DateString). "&nbsp;".substr("0".date("d", $DateString),-2).",&nbsp;".date("Y", $DateString)."&nbsp;".substr("0".date("h", $DateString),-2).":".substr("0".date("i", $DateString),-2)."&nbsp;".substr("0".date("A", $DateString),-2);
	}else{
		return "";
	}
}
function DateHandle3($DateString){
	if($DateString!=""){
		$DateString = strtotime($DateString);
		
		$temp=date("A", $DateString);
		if ($temp=="AM")
			$temp="上午";
		else
			$temp="下午";
		return date("Y-m-d", $DateString)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$temp".date("h:i:s", $DateString);
	}else{
		return "";
	}
}
function DateHandle4($DateString){
	if($DateString!=""){
		$DateString = strtotime($DateString);
		
		$temp=date("A", $DateString);

		return date("Y/m/d", $DateString)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$temp &nbsp;".date("h:i", $DateString);
	}else{
		return "";
	}
}
//========================================================================
//將日期資料轉成 yy(ROC)年yy月yy日
//參數說明 
//DateString：日期資料
//例如 
//A = DateRoc("2008/6/02")
//結果 A值為  97(ROC)年06月02日
//========================================================================
function DateRoc($DateString){
	if($DateString!=""){
		$DateString = strtotime($DateString);
		return strval(intval(date("Y", $DateString))-1911) . "年" . substr("0".date("m", $DateString),-2) . "月" . substr("0".date("d", $DateString),-2)."日";
	}else{
		return "";
	}
}
//日期比較(>= ==>true   < ==>false)
function DateComparison($Date1,$Date2){
	if($Date1==""){$Date1 = "0000-00-00";}
	if($Date2==""){$Date2 = "0000-00-00";}
	list($D1Y,$D1M,$D1D) = preg_split("/[-\.\/ ]/",$Date1);
	list($D2Y,$D2M,$D2D) = preg_split("/[-\.\/ ]/",$Date2);
	if(intval($D1Y)>intval($D2Y)){
		return true;
	}elseif(intval($D1Y)<intval($D2Y)){
		return false;
	}else{
		if(intval($D1M)>intval($D2M)){
			return true;
		}elseif(intval($D1M)<intval($D2M)){
			return false;
		}else{
			if(intval($D1D)>intval($D2D)){
				return true;
			}elseif(intval($D1D)<intval($D2D)){
				return false;
			}else{
				return true;
			}			
		}
	}
}
//========================================================================
//將日期資料轉成 星期
//參數說明 
//Date：日期資料
//例如 
//A = Date_WeekCh("2013/8/5")
//結果 A值為 ：一
//========================================================================
function Date_WeekCh($Date){
	$Temp = Date("w", strtotime($Date));
	$TempArray=array("日","一","二","三","四","五","六");
	return $TempArray[$Temp];
}
//將日期資料轉成 yy(ROC)年yy月yy日
//參數說明 
//DateString：日期資料
//例如 
//A = DateRoc("2008/6/02")
//結果 A值為  97(ROC)年06月02日
//========================================================================
function DateRoc2($DateString){
	if($DateString!=""){
		$DateString = strtotime($DateString);
		return strval(intval(date("Y", $DateString))-1911) . "." . substr("0".date("m", $DateString),-2) . "." . substr("0".date("d", $DateString),-2);
	}else{
		return "";
	}
}
function Age($Birthday){
	$Birthday = date("Y-m-d",strtotime($Birthday));
	// 把年月日分開
	list($BYear, $BMonth, $DDay) = explode("-",$Birthday);
	// 現在年份減生日年份
	$Current_Age = date("Y") - $BYear;
	// 比較日期, 年份必須要一致.
	$CDate = sprintf("%04d-%02d-%02d",date("Y"),$BMonth,$DDay);
	// 如果還沒有過生日, 年齡要減 1
	if (date("Y-m-d") < $CDate){
		$Current_Age--;
	}
	return $Current_Age;
}
?>