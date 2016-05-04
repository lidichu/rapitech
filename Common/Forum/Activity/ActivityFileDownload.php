<?php
	//接收操作名稱
	$opp = $_REQUEST["opp"];
	if(strtolower($opp)=="download"){
		//接收檔案下載流水號
		$SerialNoFile = CheckData($_REQUEST["S"]);
		if($SerialNoFile==""){$SerialNoFile = 0;}
		$SQL="Select * From activityfile Where `SerialNo` = ".$SerialNoFile." And Status='上架'";
		$Rs = mysql_query($SQL,$Conn);
		if($Rs && mysql_num_rows($Rs) > 0){
			$Row = mysql_fetch_array($Rs);
			if($Row["FileHidden"]!=""){
				FileHandle::Downloadfile($VisualRoot."/files/Activity/Files/".$Row["FileHidden"],$Row["File"]);
			}else{
				die('File Not Found');
			}
		}else{
			die('File Not Found');
		}
		exit();
	}
?>    