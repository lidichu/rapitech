<?php
//取得本頁檔名
function GetSCRIPTNAME(){
	$FileName = substr($_SERVER[PHP_SELF],strrpos($_SERVER[PHP_SELF],"/")+1);
	return $FileName;
}
//取得完整網址
function GetSCRIPTNAMES()
{
    $pageURL = 'http';

    if ($_SERVER["HTTPS"] == "on")
    {
        $pageURL .= "s";
    }
    $pageURL .= "://";

    if ($_SERVER["SERVER_PORT"] != "80")
    {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    }
    else
    {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
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
//取得遠端網頁內容
function GetURL($URL){
	if($GetURLResult = @file_get_contents($URL)){
		return $GetURLResult;
	}else{
		return "沒有找到網頁!";	
	}
}
?>