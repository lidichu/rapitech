<?php ob_start(); ?>
<?php
	include_once("MemberParame.php");
	include_once("../../class/FileHandle.php");
	include_once("../../inc/Fun.php"); 					//公用程序
	include_once("../../inc/CheckHead.php"); 			//權限檢查
	include_once("../../inc/PageSelect.php"); 			//分頁處理
	include_once("../../inc/OnePage.php"); 				//顯示結果
	include_once("../../inc/LevelOne.php"); 			//更新狀態與排序
	$Level = 1;
	for($i=0;$i<=$Level;$i++){
		$G[$i] = $_REQUEST["G".$i];
		$SF[$i] = $_REQUEST["SF".$i];
		$SK[$i] = $_REQUEST["SK".$i];
		$TS[$i] = $_REQUEST["TS".$i];
		$P[$i] = $_REQUEST["P".$i];
	}
	$Param=array(
		"SerialNo"	=>$G[0]
	);
	$Row=GetTable("member","*",$Param,"Order by SerialNo",1);
	if($Row){		
		setcookie("Member",$Row["SerialNo"]."_".md5($Row["PWD"].$CookieKey.$Row["SerialNo"]), time() + 24*60*60,"/","",0);
		setcookie("ByShop","true", time() + 24*60*60,"/","",0);
		notify("登入成功","","window.open('../../../index.php','_blank' );window.history.back(-1);");
	}else{
		notify("查無此會員資料","","window.history.back(-1)");
	}

?>

<?php ob_flush(); ?>