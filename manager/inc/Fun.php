<?php

if(!defined('VisualRoot')){
	if(!isset($VisualRoot)){ $VisualRoot = ''; }
	//抓取根目錄位置
	while(is_file($VisualRoot."PageHead.php")==false){
		if($i>=5){
			break;
		}
		$i++;
		$VisualRoot .= '../';
	}
	define('VisualRoot', $VisualRoot);
}
//涵式庫位置
$DirPath=VisualRoot."manager/inc/Function/";
//讀取
if(is_dir($DirPath)){
	$handle=opendir($DirPath);
	while ($file = readdir($handle)){
		if($file=="." || $file==".."){
			continue;
		}else if(is_file($DirPath.$file)){
			include_once($DirPath.$file);
		}else if(is_dir($DirPath.$file)){			
			load_fun($DirPath.$file."/");
		}
	};
}
function load_fun($Path){
	if(is_file($Path)){
		include_once($Path);
	}elseif(is_dir($Path)){
		$handle=opendir($Path);	
		while ($file = readdir($handle)){
			if($file=="." || $file==".."){
				continue;
			}else if(is_file($Path.$file)){
				include_once($Path.$file);
			}else if(is_dir($Path.$file)){
				load_fun($Path.$file."/");
			}
		}
	}
}

function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = ""){
  if (PHP_VERSION < 6) {
	$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }
  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);
  switch ($theType) {
	case "text":
	  $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
	  break;    
	case "long":
	case "int":
	  $theValue = ($theValue != "") ? intval($theValue) : "NULL";
	  break;
	case "double":
	  $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
	  break;
	case "date":
	  $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
	  break;
	case "defined":
	  $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
	  break;
  }
  return $theValue;
} 
?>