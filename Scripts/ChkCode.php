<?php

session_start(); 
$SafeCode = strtoupper($_SESSION["SafeCode"]);
$VCode = strtoupper($_GET['VCode']); 



if ($SafeCode == $VCode ){ 
	echo json_encode(array('VCode' , true)); 	
}else{
	echo json_encode(array('VCode' , false)); 	
} 
?>