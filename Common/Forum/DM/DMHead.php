<?php

	$PICDetailRoot = "../files/DM/PICDetail/";
	$PICIndexRoot = "../files/DM/PICIndex/";
	$PICBigRoot = "../files/DM/PICBig/";
	$SQL = "Select SerialNo From dm Where Status = '上架' Order By IndexShow DESC,Sort,SerialNo ";
	$Rs = mysql_query($SQL,$Conn);
	if($Rs && mysql_num_rows($Rs) > 0){
		$Row = mysql_fetch_array($Rs);
		$G0 = $Row[0];
	}else{
		$G0 = 0;
	}
	$data = array();
	$SQL = "Select * From dmpic Where G0 = ".$G0." And Status = '上架' Order By IndexShow DESC,Sort,SerialNo DESC";
	$Rs = mysql_query($SQL,$Conn);
	if($Rs && mysql_num_rows($Rs) > 0){
		while($Row = mysql_fetch_array($Rs)){
			if($Row["PICHidden"] != "" && is_file($PICDetailRoot.$Row["PICHidden"])){
				$Row["PICDetailHidden"] = $PICDetailRoot.$Row["PICHidden"];
			}else{
				$Row["PICDetailHidden"] = "../NoPIC/96x145.jpg";
			}
			if($Row["PICHidden"] != "" && is_file($PICIndexRoot.$Row["PICHidden"])){
				$Row["PICIndexHidden"] = $PICIndexRoot.$Row["PICHidden"];
			}else{
				$Row["PICIndexHidden"] = "../NoPIC/212x320.jpg";
			}
			if($Row["PICHidden"] != "" && is_file($PICBigRoot.$Row["PICHidden"])){
				$Row["PICBigHidden"] = $PICBigRoot.$Row["PICHidden"];
			}else{
				$Row["PICBigHidden"] = "";
			}
			if($Row["PICBigHidden"] != ""){
				$Row["PICDetailHidden"] = "<a class=\"ShowPic\" href=\"".$Row["PICBigHidden"]."\" ><img src=\"".$Row["PICDetailHidden"]."\" border=\"0\" class=\"photo\" /></a>";
				$Row["PICIndexHidden"] = "<a class=\"ShowPic\" href=\"".$Row["PICBigHidden"]."\" ><img src=\"".$Row["PICIndexHidden"]."\" border=\"0\" class=\"photo\" /></a>";			
			}else{
				$Row["PICDetailHidden"] = "<img src=\"".$Row["PICDetailHidden"]."\" border=\"0\" class=\"photo\" />";
				$Row["PICIndexHidden"] = "<img src=\"".$Row["PICIndexHidden"]."\" border=\"0\" class=\"photo\" />";
			}
			$data[] = $Row;
		}
	}
?>