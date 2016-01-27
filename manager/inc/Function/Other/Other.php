<?php
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

//	產生新密碼
function NewPassword($pt=24,$myWord=""){
	$password = "";
	$str1 = "abcdefghijklmnopqrstuvwxyz";
    $str2 = "0123456789abcdefghijklmnopqrstuvwxyz";
    $str1_len = strlen($str1);
	$str2_len = strlen($str2);
	$rg1 = rand() % $str1_len;
	$password .= $str1{$rg1};
	for($i=2;$i<=$pt;$i++){
        $rg = rand()%$str2_len;
        $password .= $str2{$rg};
    }
	return $password;
}
function GetUserIP(){
	if (!empty($_SERVER['HTTP_CLIENT_IP'])){
		$ip=$_SERVER['HTTP_CLIENT_IP'];
	}else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	}else{
		$ip=$_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}
?>