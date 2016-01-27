<?php
//使用DIV控制長度
function Div_limit($string,$width){
	$str="<div style=\"text-overflow:ellipsis;white-space:nowrap;width:".$width."px;overflow:hidden;\">".$string."</div>";
	return $str;
}

//多行限制
function M_limit($string,$width){
	$order = array("<br />", "<br/>", "<br>");
	$replace = "<br />"; 
	$string = str_replace($order, $replace, $string);	
	$StringArray = explode("<br />",$string);
	$Rtn = "";
	foreach($StringArray as $Value){
		while(mb_strlen($Value, 'UTF-8') > $width){
			if($Rtn != ""){ $Rtn .= "<br />"; }
			$Rtn .= mb_substr($Value, 0, $width, 'UTF-8');
			$Value = mb_substr($Value, $width, null, 'UTF-8');
		}
		if($Value != ""){
			if($Rtn != ""){ $Rtn .= "<br />"; }
			$Rtn .= $Value;
		}
	}
	return $Rtn;
}
//取得固定長度的字串
function cutstr($string,$length,$endchar="..."){
	$string = trim($string);   
	return mb_strimwidth($string, 0, $length, $endchar, 'UTF-8');
}
//編輯器內容處理
function ReplaceEditor($str){
	global $VisualRoot;
	$str = htmlspecialchars_decode($str);
	$order = array("\\\"");
	// 處理雙引號
	$replace = "\"";
	$str = str_replace($order, $replace, $str);	
	$str = str_replace("{VisualRoot}",$VisualRoot."/files/Upload/",$str);

	return $str;
}
//編輯器內容處理，並去Html
function ReplaceEditor2($str){
	global $VisualRoot;
	$str = htmlspecialchars_decode($str);
	$str = str_replace("{VisualRoot}",$VisualRoot."/files/Upload/",$str);
	return strip_tags($str);
}

//信件使用編輯器內容處理
function ReplaceEditorMail($str){
	global $VisualRoot;
	$str = htmlspecialchars_decode($str);
	$str = str_replace("{VisualRoot}",getHostUrl()."/files/Upload/",$str);

	return $str;
}

// 接收編輯器內容處理
function RequestEditor($str){
	global $VisualRoot;
	$baseUrl = $VisualRoot."files/Upload/";
	$str = str_replace($baseUrl,"{VisualRoot}",$str);
	$str = htmlspecialchars($str);
	return $str;
}
//接收文字方塊
function RequestTextarea($str){
	$str = htmlspecialchars($str);
	$order = array("\r\n", "\n", "\r"); 
	$replace = "<br />"; 
	$str = str_replace($order, $replace, $str);	
	return $str;
}
//去除Html語法strip_tags()
function NoHTMLString($HandleString){
	return strip_tags($HandleString);
}
//接收文字方塊反轉
function WriteTextarea($str)
{
	$order = array("<br>", "<br />", "<br/>"); 
	$replace = "\n"; 
	$str = str_replace($order, $replace, $str);
	// 處理雙引號
	$order = array("\\\"");
	$replace = "&#34;";
	$str = str_replace($order, $replace, $str);
	// 處理單引號
	$order = array("\\'");
	$replace = "&#39;";
	$str = str_replace($order, $replace, $str);
	return $str;
}

function myprint_r($temp){
	echo "<pre>".print_r($temp,true)."</pre>";
}

function sql_str($SQL,$Param = array()){
	foreach($Param as $Key => $Value){
		$SQL = str_replace($Key, "'".$Param[$Key]."'",$SQL );
	}
	return $SQL;
}

// 處理輸入框關鍵字
function W_KeyWord($str){
  // 處理雙引號
  $order = array("\\\"");
  $replace = "&#34;";
  $str = str_replace($order, $replace, $str);
  // 處理單引號
  $order = array("\\'");
  $replace = "&#39;";
  $str = str_replace($order, $replace, $str);
  return $str;
}

function ran_str(){
	//$random預設為10，更改此數值可以改變亂數的位數----(程式範例-PHP教學)
	$random=10;
	//FOR回圈以$random為判斷執行次數
	for ($i=1;$i<=$random;$i=$i+1)
	{
		// 亂數$c設定三種亂數資料格式大寫、小寫、數字，隨機產生
		// $c=rand(1,3);
		// 在$c==1的情況下，設定$a亂數取值為97-122之間，並用chr()將數值轉變為對應英文，儲存在$b
		// if($c==1){$a=rand(97,122);$b=chr($a);}
		// 在$c==2的情況下，設定$a亂數取值為65-90之間，並用chr()將數值轉變為對應英文，儲存在$b
		// if($c==2){$a=rand(65,90);$b=chr($a);}
		// 在$c==3的情況下，設定$b亂數取值為0-9之間的數字
		// if($c==3){$b=rand(0,9);}
		// 使用$randoma連接$b
		$b=rand(0,9);
		$randoma=$randoma.$b;
	}
	//輸出$randoma每次更新網頁你會發現，亂數重新產生了
	return $randoma;
	//以上全部的程式碼就結束了----(程式範例-PHP教學)
}


function cut_str($sourcestr, $cutlength, $addstr='...'){
//utf8格式下的中文字符截斷
//$sourcestr 是要處理的字符串
//$cutlength 為截取的長度(即字數)
//$addstr 超過長度時在尾處加上的字符
	$returnstr='';
	$i=0;
	$n=0;
	$str_length=strlen($sourcestr);//字符串的字節數
	while (($n<$cutlength) and ($i<=$str_length)){
			$temp_str=substr($sourcestr,$i,1);
			$ascnum=Ord($temp_str);//得到字符串中第$i位字符的ascii碼
		if ($ascnum>=224){ //如果ASCII位高與224，
			$returnstr=$returnstr.substr($sourcestr,$i,3); //根據UTF-8編碼規範，將3個連續的字符計為單個字符
			$i=$i+3; //實際Byte計為3
			$n++; //字串長度計1
		}elseif ($ascnum>=192){ //如果ASCII位高與192，
			$returnstr=$returnstr.substr($sourcestr,$i,2); //根據UTF-8編碼規範，將2個連續的字符計為單個字符
			$i=$i+2; //實際Byte計為2
			$n++; //字串長度計1
		}elseif ($ascnum>=65 && $ascnum<=90){ //如果是大寫字母，
			$returnstr=$returnstr.substr($sourcestr,$i,1);
			$i=$i+1; //實際的Byte數仍計1個
			$n++; //但考慮整體美觀，大寫字母計成一個高位字符
		}else{ //其他情況下，包括小寫字母和半角標點符號，
			$returnstr=$returnstr.substr($sourcestr,$i,1);
			$i=$i+1; //實際的Byte數計1個
			$n=$n+0.5; //小寫字母和半角標點等與半個高位字符寬...
		}
	}
	if ($str_length>$cutlength){
	$returnstr = $returnstr . $addstr;//超過長度時在尾處加上的字符
	}
	return $returnstr;
}
?>