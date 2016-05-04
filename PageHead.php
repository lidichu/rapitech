<?php extract($_GET); ?>
<?php
	define('APP_PATH', str_replace('\\', '/', dirname(__FILE__)));
	include_once(APP_PATH . '/manager/inc/Connection.php');
	include_once(APP_PATH . '/manager/inc/Fun.php');	
	include_once(APP_PATH . '/manager/inc/JSon.php');
	include_once(APP_PATH . '/manager/class/FileHandle.php');
	$json = new Services_JSON(SERVICES_JSON_LOOSE_TYPE);
	//查詢網站資訊
	$SQL="Select * From web";
	$Rs = mysql_query($SQL,$Conn);
	if($Rs && mysql_num_rows($Rs) > 0){
		$Web = mysql_fetch_array($Rs);	
	}
	include_once($VisualRoot."star/display.php");
	
	$CartNum=0;
	if(isset($_COOKIE["BuyCar"])){	
		$BuyCar = $json->decode($_COOKIE["BuyCar"]);
		foreach ($BuyCar as $Key=>$Value){
			$CartNum+=$Value;
		}
	}
?>