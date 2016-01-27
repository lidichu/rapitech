<?php
//--------------------------------------------------------小強專用------------------------------------------------------
function GetSelRs($Table,$Filed="*",$Params="",$Sort="",$ShowMode=""){
	global $Conn;
	if($Sort=="b"){
		$Sort="order by Sort,SerialNo desc";
	}
	$ShowQuery=$Query="where true ";
	foreach($Params as $Key){
		$Query.=" and $Key=:".$Key;
		global ${"Sel_".$Key};
	}
	$Sql="select ".$Filed." from ".$Table." ".$Query." ".$Sort;
	$Rs = $Conn->prepare($Sql);
	foreach($Params as $Key){
		$Rs->bindParam(":".$Key,${"Sel_".$Key});
	}
	if($ShowMode!=""){
		toshow($Sql,$ShowMode);
		exit();
	}else{
		return $Rs;
	}
}
function GetUpRs($Table,$Filed=array(),$Where=array("SerialNo"),$ShowMode=""){
	global $Conn;

	$FileQuery="";
	foreach($Filed as $Key){
		if($Query!=""){$Query.=",";}
		$Query.="$Key=:".$Key;
		global ${"File_".$Key};
	}
	$WhereQuery="where true";
	foreach($Where as $Key){
		$WhereQuery.=" and $Key=:".$Key;
		global ${"Where_".$Key};
	}
	$Sql="update ".$Table." set ".$Query." ".$WhereQuery;
	$Rs = $Conn->prepare($Sql);
	foreach($Filed as $Key){
		$Rs->bindParam(":".$Key,${"File_".$Key});
	}
	foreach($Where as $Key){
		$Rs->bindParam(":".$Key,${"Where_".$Key});
	}
	if($ShowMode!=""){
		toshow($Sql,$ShowMode);
		exit();
	}else{
		return $Rs;
	}
}
function GetDelRs($Table,$Where=array("SerialNo"),$ShowMode=""){
	global $Conn;
	$WhereQuery="where true";
	foreach($Where as $Key){
		$WhereQuery.=" and $Key=:".$Key;
		global ${"Del_".$Key};
	}
	$Sql="Delete from ".$Table." ".$WhereQuery;
	$Rs = $Conn->prepare($Sql);
	foreach($Where as $Key){
		$Rs->bindParam(":".$Key,${"Del_".$Key});
	}
	if($ShowMode!=""){
		toshow($Sql,$ShowMode);
		exit();
	}else{
		return $Rs;
	}
}
function GetRow($Rs,$Mode=0){
	global $Conn;
	$Temp=array();
	$Rs->execute();
	if($Mode==0){
		while($Row=$Rs->fetch(PDO::FETCH_ASSOC)){
			$Temp[]=$Row;
		}
	}else{
		$Temp=$Rs->fetch(PDO::FETCH_ASSOC);
	}
	return $Temp;
}
function GetTable($Table,$Filed="*",$Params="b",$Sort="b",$Mode=0,$ShowMode=""){
	global $Conn;
	$Row=array();
	$Temp=array();
	if($Params=="b"){
		$Params=array(
			"Status"=>"上架"
		);
	}elseif($Params==""){
		$Params=array();
	}
	if($Sort=="b"){
		$Sort="order by Sort,SerialNo desc";
	}
	$ShowQuery=$Query="where true ";
	foreach($Params as $Key => $Value){
		$Query.=" and $Key=:".$Key;
		$ShowQuery.=" and $Key = ". $Conn->quote($Value);
	}
	$Sql="select ".$Filed." from ".$Table." ".$Query." ".$Sort;
	$ShowSql="select ".$Filed." from ".$Table." ".$ShowQuery." ".$Sort;
	$Rs = $Conn->prepare($Sql);
	foreach($Params as $Key => $Value){
		$Rs->bindValue(":".$Key,$Params[$Key]);
	}
	if($ShowMode!=""){
		toshow($ShowSql,$ShowMode);
		exit();
	}else{	
		$Rs->execute();
		if($Mode==0){			
			while($Row=$Rs->fetch(PDO::FETCH_ASSOC)){
				$Temp[]=$Row;
			}
		}else{			
			$Temp=$Rs->fetch(PDO::FETCH_ASSOC);
		}
		return $Temp;
	}

}
function GetTable2($Table,$Filed="*",$Query="",$Query2="",$Sort="",$Mode=0,$Test=false){
	global $Conn;
	if($Query==""){
		$Query=" where Status='上架'";
	}
	if($Sort==""){
		$Sort=" order by Sort,SerialNo Desc";
	}
	$Temp=array();
	$Sql="select ".$Filed." from ".$Table." ".$Query.$Query2.$Sort;
	if($Test){
		echo $Sql;
		exit();
	}else{
		if($Mode==0){
			$Rs = $Conn->query($Sql);
			while($Row=$Rs->fetch(PDO::FETCH_ASSOC)){
				$Temp[]=$Row;
			}
		}else{
			$Temp=$Conn->query($Sql)->fetch(PDO::FETCH_ASSOC);
		}
		return $Temp;
	}
}
function GetTable3($Table,$Filed="*",$Params="b",$Sort="b",$Mode=0,$ShowMode=""){
	global $Conn;
	$Row=array();
	$Temp=array();
	
	$Query=$Params;
	
	$Sql="select ".$Filed." from ".$Table." ".$Query." ".$Sort;
	$Rs = $Conn->prepare($Sql);
	$Rs->execute();
	if($Mode==0){			
		while($Row=$Rs->fetch(PDO::FETCH_ASSOC)){
			$Temp[]=$Row;
		}
	}else{			
		$Temp=$Rs->fetch(PDO::FETCH_ASSOC);
	}
	return $Temp;
	
}
function GetTable4($Table,$Filed="*",$Params="b",$Sort="b",$Mode=0,$ShowMode="",$Qu){
	global $Conn;
	$Row=array();
	$Temp=array();
	if($Params=="b"){
		$Params=array(
			"Status"=>"上架"
		);
	}elseif($Params==""){
		$Params=array();
	}
	if($Sort=="b"){
		$Sort="order by Sort,SerialNo desc";
	}
	$ShowQuery=$Query="where true and Status='上架' and ";
	$Qu1="";
	foreach($Params as $Key => $Value){
		if ($Qu1==""){
			$Qu1=" $Key=:".$Key;
		}else{
			$Qu1.=" or $Key=:".$Key;
		}
		
		$ShowQuery.=" or $Key = ". $Conn->quote($Value);
	}
	$Qu1=" ProductName like '%".$Qu."%'";
	$Sql="select ".$Filed." from ".$Table." ".$Query."(".$Qu1." ) ".$Sort;
	$ShowSql="select ".$Filed." from ".$Table." ".$ShowQuery." ".$Sort;
	$Rs = $Conn->prepare($Sql);
	foreach($Params as $Key => $Value){
		$Rs->bindValue(":".$Key,$Params[$Key]);
	}
	if($ShowMode!=""){
		toshow($ShowSql,$ShowMode);
		exit();
	}else{	
		$Rs->execute();
		if($Mode==0){			
			while($Row=$Rs->fetch(PDO::FETCH_ASSOC)){
				$Temp[]=$Row;
			}
		}else{			
			$Temp=$Rs->fetch(PDO::FETCH_ASSOC);
		}
		return $Temp;
	}

}
function GetField($Table,$Filed="",$Params="b",$ShowMode=""){
	global $Conn;
	if($Filed==""){
		$Filed=" count(*) as DataAmount ";
	}
	if($Params=="b"){
		$Params=array(
			"Status"=>"上架"
		);
	}elseif($Params==""){
		$Params=array();
	}
	$ShowQuery=$Query="where true ";
	foreach($Params as $Key => $Value){
		$Query.=" and $Key=:".$Key;
		$ShowQuery.=" and $Key = ". $Conn->quote($Value);
	}
	$Sql="select ".$Filed." from ".$Table." ".$Query;
	$ShowSql="select ".$Filed." from ".$Table." ".$ShowQuery;
	$Rs = $Conn->prepare($Sql);
	foreach($Params as $Key => $Value){
		$Rs->bindValue(":".$Key, $Params[$Key]);
	}
	if($ShowMode!=""){
		toshow($ShowSql,$ShowMode);
		exit();
	}else{
		$Rs->execute();	
		$Temp= $Rs->fetchColumn();
		return $Temp;
	}
}
function GetField2($Table,$Filed="",$Params="b",$ShowMode="",$Qu){
	global $Conn;
	if($Filed==""){
		$Filed=" count(*) as DataAmount ";
	}
	if($Params=="b"){
		$Params=array(
			"Status"=>"上架"
		);
	}elseif($Params==""){
		$Params=array();
	}
	$ShowQuery=$Query="where true ";
	foreach($Params as $Key => $Value){
		$Query.=" and $Key=:".$Key;
		$ShowQuery.=" and $Key = ". $Conn->quote($Value);
	}
	$Qu1=" and ProductName like '%".$Qu."%'";
	$Sql="select ".$Filed." from ".$Table." ".$Query.$Qu1;
	$ShowSql="select ".$Filed." from ".$Table." ".$ShowQuery;
	$Rs = $Conn->prepare($Sql);
	foreach($Params as $Key => $Value){
		$Rs->bindValue(":".$Key, $Params[$Key]);
	}
	if($ShowMode!=""){
		toshow($ShowSql,$ShowMode);
		exit();
	}else{
		$Rs->execute();	
		$Temp= $Rs->fetchColumn();
		return $Temp;
	}
}
function GetField3($Table,$Filed="",$Params="b",$ShowMode=""){
	global $Conn;
	if($Filed==""){
		$Filed=" count(*) as DataAmount ";
	}
	
	$Query=$Params;
	$Sql="select ".$Filed." from ".$Table." ".$Query;
	$Rs = $Conn->prepare($Sql);
	$Rs->execute();	
	$Temp= $Rs->fetchColumn();
	return $Temp;
}
function notify($msg,$href="",$Other="",$stop=true,$Include=""){
	echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";
	echo "<html xmlns=\"http://www.w3.org/1999/xhtml\">";
	echo "<head>";
	echo "	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>";
	if($Include !=""){
		echo $Include;
	}
	echo "</head>";
	echo "<body>";
	echo "<script type=\"text/javascript\" src=\"".VisualRoot."Scripts/jquery.js\"></script>";
	echo "<script type=\"text/javascript\">";
	if($msg!="")
	echo "	alert(\"$msg\");";
	if($href!="")
	echo	"	window.top.location.href='$href';";
	if($Other!="")
	echo		$Other;
	echo"</script>";
	echo"</body>";
	echo"</html>";
	if($stop){
		exit();
	}
}

function toshow($Str,$ShowMode="true"){
	switch($ShowMode){
		case "notify":
			notify($Str);
			break;
		case "file":
			$fp = fopen("log.txt",'a+');
			fputs($fp,$Str."\r\n");
			fclose($fp);
			break;
		case "echofile":
			$fp = fopen("log.txt",'a+');
			fputs($fp,$Str."\r\n");
			fclose($fp);
			echo "<a target='_blank' href='log.txt'>開啟</a>";
			break;
		case "showfile":
			$fp = fopen("log.txt",'a+');
			fputs($fp,$Str."\r\n");
			fclose($fp);
			notify("","","window.open('log.txt')");
			break;
		default:
			echo $Str;
	}
}
?>