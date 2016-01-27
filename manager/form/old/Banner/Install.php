<?php ob_start(); ?>
<?php
include_once("../../class/Manager.php");
include_once("../../inc/Fun.php"); 			//公用程序
include_once("../../inc/CheckHead.php"); 	//權限檢查
include_once("../../inc/LevelOne.php"); 			//更新狀態與排序
	$ModName="Banner管理";
	$DBName="banner";
	$InstallFile="Install.sql";
	if (file_exists($InstallFile)){
		$sql_value="";
		$sqls=file($InstallFile);
		foreach($sqls as $sql){
			$sql_value.=$sql;
		}
		$sql_value = str_replace("{ModName}", $ModName, $sql_value);
		$sql_value = str_replace("{DBName}", $DBName, $sql_value);
		$a=explode(";\r\n", $sql_value);
		$total=count($a)-1;
		$Conn->exec("SET CHARACTER SET utf8");
		for ($i=0;$i<$total;$i++){
			$Conn->exec("SET CHARACTER SET utf8");
			$Conn->exec($a[$i]);
		}
		echo "資料庫建立成功";
	}else{
	   echo "文件不存在";
	}
?>
<?php ob_flush(); ?>