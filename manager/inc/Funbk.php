<?php
include_once("class.phpmailer.php");

//SQL
	function myStripslashes($value){
		if(get_magic_quotes_gpc())
		$value=stripslashes($value);
		return $value;
	}
//========================================================================
//SQL Injection 檢查
//========================================================================
function post($url, $post = null) 
{ 
    $context = array(); 
 
    if (is_array($post)) 
    { 
        ksort($post); 
 
        $context['http'] = array 
        ( 
            'method' => 'post', 
            'content' => http_build_query($post, '', '&'), 
        ); 
    } 
 
    return file_get_contents($url, false, stream_context_create($context)); 
}  
function CheckData($value){
	if(isset($value)){
		$value=str_replace("<","&lt;",$value);
		$value=str_replace(chr(13).chr(10),"<br />",$value);
		$value=mysql_real_escape_string(myStripslashes($value));
		return $value;
	}else{
		return "";
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
function notify($msg,$href="",$Other=""){
	echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";
	echo "<html xmlns=\"http://www.w3.org/1999/xhtml\">";
	echo "<head>";
	echo "	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>";
	echo "</head>";
	echo "<body>";
	echo "<script type=\"text/javascript\">";
	if($msg!="")
	echo "	alert(\"$msg\");";
	if($href!="")
	echo	"	window.top.location.href='$href';";
	if($Other!="")
	echo		$Other;
	echo"</script>";
	echo"</body>";
	echo"</html>";
	exit();
}
function quotes($content){
	//如果magic_quotes_gpc=Off，那麽就開始處理
	if (!get_magic_quotes_gpc()) {
		//判斷$content是否爲陣列
		if (is_array($content)) {
			//如果$content是陣列，那麽就處理它的每一個單無
			foreach ($content as $key=>$value) {
				$content[$key] = addslashes($value);
			}
		}else{
			//如果$content不是陣列，那麽就僅處理一次
			addslashes($content);
		}
	} else {
		//如果magic_quotes_gpc=On，那麽就不處理
	}
	//返回$content
	return $content;
}
 


//========================================================================
//取得本頁檔名
//========================================================================
function GetSCRIPTNAME(){
	$FileName = substr($_SERVER[PHP_SELF],strrpos($_SERVER[PHP_SELF],"/")+1);
	return $FileName;
}
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
//產生訂單編號用
function DateOrder($DateString){
	if($DateString != ""){
		$DateString = strtotime($DateString);
		return date("Y", $DateString) . substr("0".date("m", $DateString),-2) . substr("0".date("d", $DateString),-2).substr("0".date("H", $DateString),-2).substr("0".date("i", $DateString),-2);
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
function DateRoc2($DateString){
	if($DateString!=""){
		$DateString = strtotime($DateString);
		return strval(intval(date("Y", $DateString))-1911) . "." . substr("0".date("m", $DateString),-2) . "." . substr("0".date("d", $DateString),-2);
	}else{
		return "";
	}
}
//========================================================================
//數字格式設定
//參數說明
//Num：數字
//NumCount：以幾位數來表示
//例：NumHandle(3,2) 結果為 03
//========================================================================
function NumHandle($Num,$NumCount){
	$Num = strval($Num);
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


//去除Html語法strip_tags()
function NoHTMLString($HandleString){
	return strip_tags($HandleString);
}

//取得遠端網頁內容
function GetURL($URL){
	if($GetURLResult = @file_get_contents($URL)){
		return $GetURLResult;
	}else{
		return "沒有找到網頁!";	
	}
}
//寄送EMail，請注意SMTP 及 寄件人的設置
function SendMail($FromName,$FromEmail,$ToName,$ToEmail,$Subject,$Msg,$ManagerEmail="",$MailServer="www.hibox.hinet.net:25",$ManagerEmailPWD=""){
	$mailer = new PHPMailer();   
	$mailer->CharSet = 'utf-8';   
	$mailer->Encoding = 'base64';   
	$mailer->IsSMTP();   
	$mailer->Host = $MailServer;
	if($ManagerEmail!=""&&$ManagerEmailPWD!=""){
		$mailer->SMTPAuth = true;
	}else{
		$mailer->SMTPAuth = false;
	}
	
	$mailer->Username = $ManagerEmail;
	$mailer->Password = $ManagerEmailPWD;
	$mailer->From = $FromEmail;
	$mailer->FromName = $FromName;
	$mailer->MsgHTML($Msg);   
	$mailer->Subject = $Subject;   
	$mailer->AddAddress($ToEmail);
	if(!$mailer->Send()){  
		echo "Message was not sent<br/ >";   
		echo "Mailer Error: " . $mailer->ErrorInfo;   
	}else{  
		//echo "Message has been sent";
	}
}


//寄送EMail，請注意SMTP 及 寄件人的設置
function SendMail2($FromName,$FromEmail,$ToName,$ToEmail,$Subject,$Msg,$ManagerEmail,$MailServer="msa.hinet.net"){
	ini_set("SMTP",$MailServer);
	ini_set("smtp_port",25);
	ini_set("sendmail_from",$ManagerEmail);
	$MailFrom = "=?UTF-8?B?".base64_encode($FromName)."?=<".$FromEmail.">";
	$MailTo = "=?UTF-8?B?".base64_encode($ToName)."?=<".$ToEmail.">";
	$MailSubject = "=?UTF-8?B?".base64_encode($Subject)."?=";
	$MailHeaders = "MIME-Version: 1.0\r\n"; 
	$MailHeaders .= "Content-type: text/html; charset=utf-8\r\n"; 
	$MailHeaders .= "From:".$MailFrom."\r\n"; 	
	mail($MailTo,$MailSubject,$Msg,$MailHeaders);
}

//檢查是否有資料
function CheckExist($DBTable,$Query){
	global $Conn;
	if($Query!=""){$Query = " Where ".$Query;}
	$SQL="Select Count(*) As Counter From ".$DBTable.$Query;
	$Rs = mysql_query($SQL,$Conn);
	if(!$Rs){
		echo($SQL);
		exit();
	}
	$Row = mysql_fetch_array($Rs);
	
	//echo($SQL);
	if(intval($Row["Counter"])>0){
		return true;		
	}else{
		return false;
	}
}

//日期比較(>= ==>true   < ==>false)
function DateComparison($Date1,$Date2){
	if($Date1==""){$Date1 = "0000-00-00";}
	if($Date2==""){$Date2 = "0000-00-00";}
	list($D1Y,$D1M,$D1D) = preg_explode("/[-\.\/ ]/",$Date1);
	list($D2Y,$D2M,$D2D) = preg_explode("/[-\.\/ ]/",$Date2);
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
//使用DIV控制長度
function Div_limit($string,$width){
	$str="<div style=\"text-overflow:ellipsis;white-space:nowrap;width:".$width."px;overflow:hidden;\">".$string."</div>";
	return $str;
}

function cutstr($string,$length,$endchar="..."){
	$string = trim($string);   
	return mb_strimwidth($string, 0, $length, $endchar, 'UTF-8');
}


//取得固定長度的字串
function getstr($string, $length, $encoding  = 'utf-8') {   
    $string = trim($string);   
    if($length && strlen($string) > $length) {   
        //截斷字符   
        $wordscut = '';   
        if(strtolower($encoding) == 'utf-8') {   
            //utf8   
            $n = 0;  
            $tn = 0;   
            $noc = 0;   
            while ($n < strlen($string)) {   
                $t = ord($string[$n]);   
                if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {   
                    $tn = 1;   
                    $n++;   
                    $noc++;   
                } elseif(194 <= $t && $t <= 223) {   
                    $tn = 2;   
                    $n += 2;   
                    $noc += 2;   
                } elseif(224 <= $t && $t < 239) {   
                    $tn = 3;   
                    $n += 3;   
                    $noc += 2;   
                } elseif(240 <= $t && $t <= 247) {   
                    $tn = 4;   
                    $n += 4;   
                    $noc += 2;   
                } elseif(248 <= $t && $t <= 251) {   
                    $tn = 5;   
                    $n += 5;   
                    $noc += 2;   
                } elseif($t == 252 || $t == 253) {   
                    $tn = 6;   
                    $n += 6;   
                    $noc += 2;   
                } else {   
                    $n++;   
                }   
                if ($noc >= $length) {   
                    break;   
                }   
            }   
            if ($noc > $length) {   
                $n -= $tn;   
            }   
            $wordscut = substr($string, 0, $n);   
        } else {   
            for($i = 0; $i < $length - 1; $i++) {   
                if(ord($string[$i]) > 127) {   
                    $wordscut .= $string[$i].$string[$i + 1];   
                    $i++;   
                } else {   
                    $wordscut .= $string[$i];   
                }   
            }   
        }   
        $string = $wordscut."...";   
    }
    return trim($string);
}  

//不分大小寫取得$_GET值
function Request_Get($Name){
    if(is_array($_GET)){
        foreach($_GET as $key=>$value){
            if(strtolower($key)==strtolower($Name)){
                return $value;
            }
        }
    }
    return "";
}

//編輯器內容處理
function ReplaceEditor($str){
	global $VisualRoot;
	return str_replace("{VisualRoot}",$VisualRoot."files/Upload/",htmlspecialchars_decode($str));
}
//編輯器內容處理，並去Html
function ReplaceEditor2($str){
	global $VisualRoot;
	return strip_tags(str_replace("{VisualRoot}",$VisualRoot."files/Upload/",htmlspecialchars_decode($str)));
}
//接收文字方塊
function RequestTextarea($str){
	$str = htmlspecialchars($str);
	$order = array("\r\n", "\n", "\r"); 
	$replace = "<br />"; 
	$str = str_replace($order, $replace, $str);	
	return $str;
}

function PageBar($PageAmount,$Page){
	echo("<select name=\"PageBar\" id=\"PageBar\">\n");
	for($i=1;$i<=$PageAmount;$i++){
		if($i != $Page){
			echo("<option value=\"". $i ."\">" . $i . "</option>\n");				
		}else{
			echo("<option value=\"". $i ."\" selected=\"selected\">" . $i . "</option>\n");
		}
	}
	echo("</select>\n");
	echo("<span class=\"page\">第".$Page."/".$PageAmount."頁 | 共" . $PageAmount . "頁</span>\n");
}

function EmailHandle($str){
	if($str!=""){
		return "<a href=\"mailto:".$str."\" target=\"_blank\">" . $str . "</a>";
	}
	return "";
}

function CreateOptionFromTable($ValueField,$TitleField,$TableName,$OtherStr,$defaultVal){
	global $Conn;
	$SQL="Select ".$ValueField.",".$TitleField." From " . $TableName . $OtherStr;
	$Rs = mysql_query($SQL,$Conn);
	if($Rs && mysql_num_rows($Rs) > 0){
		while($Row = mysql_fetch_array($Rs)){
			if(strtolower($Row[$ValueField])==strtolower($defaultVal)){
				echo('<option value="' . $Row[$ValueField] . '" selected="selected">' . $Row[$TitleField] . '</option>');
			}else{
				echo('<option value="' . $Row[$ValueField] . '">' . $Row[$TitleField] . '</option>');
			}
		}
		$Row = mysql_fetch_array($Rs);
	}	
}

function CreateOptionFromTable2($ValueFieldSelect,$TitleFieldSelect,$ValueField,$TitleField,$TableName,$OtherStr,$defaultVal){
	global $Conn;

	$Rs = mysql_query($SQL,$Conn);
	if($Rs && mysql_num_rows($Rs) > 0){
		while($Row = mysql_fetch_array($Rs)){
			if(strtolower($Row[$ValueField])==strtolower($defaultVal)){
				echo('<option value="' . $Row[$ValueField] . '" selected="selected">' . $Row[$TitleField] . '</option>');
			}else{
				echo('<option value="' . $Row[$ValueField] . '">' . $Row[$TitleField] . '</option>');
			}
		}
		$Row = mysql_fetch_array($Rs);
	}	
}
function GetTable($Table,$Filed="*",$Qther="where Status='上架' order by Sort,SerialNo Desc",$Mode=0,$Test=false){
	global $Conn;
	$Temp=array();
	$Sql="select ".$Filed." from ".$Table." ".$Qther;
	if($Test){
		echo $Sql;
		return "" ;
	}else{
		$Rs = mysql_query($Sql,$Conn);
		if($Rs &&mysql_num_rows($Rs)>0){
			if($Mode==0){
				while($Row=mysql_fetch_assoc($Rs)){
					$Temp[]=$Row;
				}
			}else{
				$Row=mysql_fetch_assoc($Rs);
				$Temp=$Row;
			}
			return $Temp;
		}else{	
			return $Temp;
		}
	}
}
function CreateOptionArray($ValueArray,$TitleArray,$defaultVal){
	for($i=0;$i<count($ValueArray);$i++){
		if(strtolower($ValueArray[$i])==strtolower($defaultVal)){
			echo('<option value="' . $ValueArray[$i] . '" selected="selected">' . $TitleArray[$i] . '</option>');
		}else{
			echo('<option value="' . $ValueArray[$i] . '">' . $TitleArray[$i] . '</option>');
			//echo("ValueArray[" . $i . "]=" . $ValueArray[$i] . "<br />TitleArray[" . $i . "] = ".$TitleArray[$i] ."<br />");
		}
	}
}

function QueryTitle($Value,$Title,$Table){
	global $Conn;
	$SQL="Select " . $Title . " From " . $Table . " Where SerialNo = " . $Value;
	$Rs = mysql_query($SQL,$Conn);
	if($Rs && mysql_num_rows($Rs) > 0 ){
		$Row = mysql_fetch_array($Rs);
		return $Row[$Title];
	}else{
		return "";	
	}
}
//取得資料表欄位型態
function myGetType($Rs,$FieldName){
	for($i=0;$i<mysql_num_fields($Rs);$i++){
		if(strtolower(mysql_field_name($Rs,$i)) == strtolower($FieldName)){
			return mysql_field_type($Rs,$i);
		}
	}
	return "";
}
//取得目前網站網址
function getHostUrl(){
	$VisualRootCount = count(explode("/",VisualRoot));
	$SelfCountArray = explode("/",$_SERVER['PHP_SELF']);
	$SelfCount = count($SelfCountArray);
	$URL = "";
	for($i=1;$i<($SelfCount-$VisualRootCount);$i++){
		$URL .= "/" . $SelfCountArray[$i];
	}
	return "http://".$_SERVER['HTTP_HOST'].$URL;
}
function getHostUrl2(){
	$VisualRootCount = count(explode("/",VisualRoot));
	$SelfCountArray = explode("/",$_SERVER['PHP_SELF']);
	$SelfCount = count($SelfCountArray);
	$URL = "";
	for($i=1;$i<($SelfCount-$VisualRootCount);$i++){
		$URL .= "/" . $SelfCountArray[$i];
	}
	return $_SERVER['HTTP_HOST'].$URL;
}
//產生亂碼
function generatorPassword($pt=24,$myWord=""){
    $password="";
    $str="0123456789abcdefghijklmnopqrstuvwxyz";
    $str.=$myWord;
    $str_len=strlen($str);
	for ($i=1;$i<=$pt;$i++){
        $rg=rand()%$str_len;
        $password.=$str{$rg};
    }
return $password;
}
//Youtube
function SetYoutube($YoutubeCode,$strWidth,$strHeight,$strMovieNote,$autoplay){
	if($YoutubeCode !=""){
		echo "<div style=\"width:".$strWidth."px;height:".($strHeight)."px\">\n";
		echo "<object width=\"" .$strWidth . "\" height=\"" . $strHeight . "\">\n";
		echo "<param name=\"allowfullscreen\" value=\"true\" />\n";
		echo "<param name=\"movie\" value=\"http://www.youtube.com/v/" .$YoutubeCode ."&rel=1&autoplay=".$autoplay."&loop=1\">\n";
		echo "<param name=\"wmode\" value=\"transparent\">\n";		
		echo "<embed allowfullscreen=\"true\" src=\"http://www.youtube.com/v/".$YoutubeCode ."&rel=1&autoplay=".$autoplay."&loop=1\" type=\"application/x-shockwave-flash\" wmode=\"transparent\" width=\"" .$strWidth . "\" height=\"" .$strHeight ."\">\n";
		if ($strMovieNote != ""){
			echo "<div class=\"bodytext\" style=\"padding:0px 3px;margin-top:5px;\">".$strMovieNote ."</div>\n";
		}		
		echo "</embed>\n";
		echo "</object>\n";
		echo "</div>\n";
	}
}
?>