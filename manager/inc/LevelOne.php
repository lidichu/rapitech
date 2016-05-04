<?php
//更新狀態
function UpdateStatus(){
	global $DBTable,$Conn,$RowCount;
	for($i=1;$i<=$RowCount;$i++){
		if($_POST["status".$i] != $_POST["statusId".$i]){
			$SQL = "update ".$DBTable." set Status='".$_POST["status".$i]."' Where SerialNo=".$_POST["SERIALNO".$i];
			mysql_query($SQL,$Conn);
		}
	}	
}

//更新訂單狀態
function UpdateOrderStatus(){
	global $DBTable,$Conn,$RowCount;
	for($i=1;$i<=$RowCount;$i++){
		if($_POST["OrderStatus".$i] != $_POST["statusId".$i]){
			$SQL = "update ".$DBTable." set OrderStatus='".$_POST["OrderStatus".$i]."' Where SerialNo=".$_POST["SERIALNO".$i];
			mysql_query($SQL,$Conn);
		}
	}	
}

//更新排序
function UpdateSort(){
	global $DBTable,$Conn,$RowCount;
	for($i=1;$i<=$RowCount;$i++){
		if($_POST["sort".$i] != $_POST["sortId".$i]){
			$SQL = "update ".$DBTable." set Sort=".$_POST["sort".$i]." Where SerialNo=".$_POST["SERIALNO".$i];
			mysql_query($SQL,$Conn);
		}
	}	
}

//更新首頁排序
function UpdateIndexSort(){
	global $DBTable,$Conn,$RowCount;
	for($i=1;$i<=$RowCount;$i++){
		if($_POST["indexsort".$i] != $_POST["indexsortId".$i]){
			$SQL = "update ".$DBTable." set IndexSort=".$_POST["indexsort".$i]." Where SerialNo=".$_POST["SERIALNO".$i];
			mysql_query($SQL,$Conn);
		}
	}	
}


//更新開啟方式
function UpdateTargetWindow(){
	global $DBTable,$Conn,$RowCount;
	for($i=1;$i<=$RowCount;$i++){
		if($_POST["TargetWindow".$i] != $_POST["TargetWindowId".$i]){
			$SQL = "update ".$DBTable." set TargetWindow='".$_POST["TargetWindow".$i]."' Where SerialNo=".$_POST["SERIALNO".$i];
			mysql_query($SQL,$Conn);
		}
	}	
}



function ReturnToPage($Href,$MSG,$Other){
	global $Level,$G,$P,$SK,$TS,$SF;
	$rtnVar = "";
	$GString = "";
	$PString = "";
	$SKString = "";
	$SFString = "";
	for($i=0;$i<count($G);$i++){
		if($i!=$Level){
			if($GString!=""){$GString.="&";}
			$GString.="G".$i."=".$G[$i];
		}
	}
	for($i=0;$i<count($P);$i++){
		if($PString!=""){$PString.="&";}
		$PString.="P".$i."=".$P[$i];
	}		
	for($i=0;$i<count($SK);$i++){
		if($SKString!=""){$SKString.="&";}
		$SKString.="SK".$i."=".$SK[$i];
	}
	for($i=0;$i<count($TS);$i++){
		if($TSString!=""){$TSString.="&";}
		$TSString.="TS".$i."=".$TS[$i];			
	}		
	for($i=0;$i<count($SF);$i++){
		if($SFString!=""){$SFString.="&";}
		$SFString.="SF".$i."=".$SF[$i];			
	}
	$rtnVar .= $GString;
	if($rtnVar!="" && $PString!=""){$rtnVar.="&";}
	$rtnVar.=$PString;
	if($rtnVar!="" && $SKString!=""){$rtnVar.="&";}
	$rtnVar.=$SKString;
	if($rtnVar!="" && $TSString != ""){$rtnVar.="&";}
	$rtnVar.=$TSString;
	if($rtnVar!="" && $SFString!=""){$rtnVar.="&";}
	$rtnVar.=$SFString;
	if($rtnVar!="" && $Other!=""){$rtnVar.="&";}
	$rtnVar.=$Other;
	if($rtnVar!=""){$rtnVar="?".$rtnVar;}
	echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
	echo "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";
	echo "<head>\n";
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
	echo "</head>\n";
	echo "<body>\n";
	echo "<script type='text/javascript' language='javascript'>\n";
	echo "alert('".$MSG."');\n";
	echo "document.location.href=\"".$Href.$rtnVar."\";\n";
	echo "</script>\n";	
	echo "</body>\n";
	echo "</html>\n";
	exit();	
}
function ReturnToPage2($Href,$MSG,$Other){
	global $Level,$G,$P,$SK,$TS,$SF;
	$rtnVar = "";
	$GString = "";
	$PString = "";
	$SKString = "";
	$SFString = "";
	for($i=0;$i<count($G);$i++){
		if($i!=$Level){
			if($GString!=""){$GString.="&";}
			$GString.="G".$i."=".$G[$i];
		}
	}
	for($i=0;$i<count($P);$i++){
		if($PString!=""){$PString.="&";}
		$PString.="P".$i."=".$P[$i];
	}		
	for($i=0;$i<count($SK);$i++){
		if($SKString!=""){$SKString.="&";}
		$SKString.="SK".$i."=".$SK[$i];
	}
	for($i=0;$i<count($TS);$i++){
		if($TSString!=""){$TSString.="&";}
		$TSString.="TS".$i."=".$TS[$i];			
	}		
	for($i=0;$i<count($SF);$i++){
		if($SFString!=""){$SFString.="&";}
		$SFString.="SF".$i."=".$SF[$i];			
	}
	$rtnVar .= $GString;
	if($rtnVar!="" && $PString!=""){$rtnVar.="&";}
	$rtnVar.=$PString;
	if($rtnVar!="" && $SKString!=""){$rtnVar.="&";}
	$rtnVar.=$SKString;
	if($rtnVar!="" && $TSString != ""){$rtnVar.="&";}
	$rtnVar.=$TSString;
	if($rtnVar!="" && $SFString!=""){$rtnVar.="&";}
	$rtnVar.=$SFString;
	if($rtnVar!="" && $Other!=""){$rtnVar.="&";}
	$rtnVar.=$Other;
	if($rtnVar!=""){$rtnVar="?".$rtnVar;}
	echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
	echo "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";
	echo "<head>\n";
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
	echo "</head>\n";
	echo "<body>\n";
	echo "<script type='text/javascript' language='javascript'>\n";
	echo "alert('".$MSG."');\n";
	echo "window.parent.location.href=\"".$Href.$rtnVar."\";\n";
	echo "</script>\n";	
	echo "</body>\n";
	echo "</html>\n";
	exit();	
}
function ReturnToBack($MSG){
	echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
	echo "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";
	echo "<head>\n";
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
	echo "</head>\n";
	echo "<body>\n";
	echo "<script type='text/javascript' language='javascript'>\n";
	echo "alert('".$MSG."');\n";
	echo "window.history.go(-1);\n";
	echo "</script>\n";	
	echo "</body>\n";
	echo "</html>\n";
	
	exit();	
}
?>