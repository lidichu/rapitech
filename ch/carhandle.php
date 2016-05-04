<?php ob_start(); ?>
<?php include_once('../PageHead.php');?>
<?php
	$opp = CheckData($_REQUEST["opp"]);
	$Product = CheckData($_POST["PrdSerialNo"]);
	$ProductNum = CheckData($_POST["PrdNum"]);
	if($opp == "add"){
		$BuyCar[$Product] = $ProductNum;
		setcookie("BuyCar",$json->encode($BuyCar),time() + 60*60,"/","",0);
		$CartNum=0;
		foreach ($BuyCar as $Key=>$Value){
			$CartNum+=$Value;
		}
		notify("加入購物車成功","","window.parent.reload_minicart('$CartNum');");
	}else if($opp == "del"){
		$PrdSerialNo = CheckData($_REQUEST["PrdSerialNo"]);
		unset($BuyCar[$PrdSerialNo]);
		setcookie("BuyCar",$json->encode($BuyCar),time() + 60*60,"/","",0);
		echo $PrdSerialNo;
		exit();
	}else if($opp == "modify"){
		$PrdSerialNo = CheckData($_REQUEST["PrdSerialNo"]);
		$ProductNum = CheckData($_REQUEST["ProductNum"]);
		$BuyCar[$PrdSerialNo] = intval($ProductNum);
		setcookie("BuyCar",$json->encode($BuyCar),time() + 60*60,"/","",0);
		echo $PrdSerialNo;
		exit();
	}	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php ob_flush(); ?>