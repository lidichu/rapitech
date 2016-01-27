<?php
function ShowOnePageMe($Rs,$Page,$NoShowFields,$Href,$HrefField,$align,$PicField,$PicWidth,$PicHref,$DBTableName,$GName){
	global $Conn,$StatusItem,$CheckBoxShow;
	global $CheckBoxFields;
	global $ButtonFields;
	global $TextFields;
	global $DatabaseName02;
	global $IndexPhotosTable;
	global $ModifyFileName;
	
	$ModifyFieldCount = 0;
	$TargetWindowValue[0] = "_self";
	$TargetWindowValue[1] = "_blank";
	$TargetWindowItem[0] = "本頁開啟";
	$TargetWindowItem[1] = "另開新視窗";
	$iPage = 1;
	while($Row = $Rs->fetch(PDO::FETCH_ASSOC)){
		if(($iPage % 2) != 0){
			echo "<tr style=\"font-size:13px;color:black\" class=\"OnePageTr\" bgcolor=\"#F7FBFD\" id=\"tr".$iPage."\" onmouseout=\"tr_mouseOut('tr".$iPage."','#F7FBFD');\" onmouseover=\"tr_mouseOn('tr".$iPage."');\">\n";
		}else{
			echo "<tr style=\"font-size:13px;color:black\" class=\"OnePageTr\" bgcolor=\"#E0EFF8\" id=\"tr".$iPage."\" onmouseout=\"tr_mouseOut('tr".$iPage."','#E0EFF8');\" onmouseover=\"tr_mouseOn('tr".$iPage."');\">\n";
		}

		$FirstFieldFlag = true;
		if($CheckBoxShow==true){
			echo "<td align=\"center\">";
			echo "<input class=\"CheckBoxShow\" type=\"checkbox\" id=\"checkbox".$iPage."\"  name=\"checkbox".$iPage."\" value=\"".$Row["SerialNo"]."\" idvalue=\"checkbox\" />";
			if($FirstFieldFlag){
				echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>\n";
				$FirstFieldFlag = false;
			}
			echo "</td>\n";
		}
		$ModifyFieldCount = 0;
		foreach($Row as $FieldName => $Value){
			$IsShow = true ;
			//檢查是否顯示
			for($j=0;$j<count($NoShowFields);$j++){
				if(strtolower($FieldName)==strtolower($NoShowFields[$j])){$IsShow=false;break;}
			}
			if(!$IsShow){continue;}

			if($FieldName == "IndexPhotos"){
				$SQL = "Select PICHidden From ".$IndexPhotosTable." Where G0 = ".$Row["SerialNo"]." And `Status` = '上架' Order By IndexStatus DESC,Sort,SerialNo DESC limit 0,1";
				$Rs2 = mysql_query($SQL,$Conn);
				if($Rs2 && mysql_num_rows($Rs2) > 0){
					$Row2 = mysql_fetch_array($Rs2);
					$Row[$FieldName] = $Row2["PICHidden"];
				}else{
					$Row[$FieldName] = "";
				}
			}
			if($FieldName == "G1PIC"){
				if($Row["G1PIC"]=="否") $Row["G1PIC"] = "" ;
			}
			//檢查是否為修改欄位
			$IsModifyField = false;				
			if(is_array($HrefField)){
				for($j=0;$j<count($HrefField);$j++){
					
					if(strtolower($FieldName)==strtolower($HrefField[$j])){$IsModifyField=true;break;}
				}
			}else{
				if(strtolower($FieldName)==strtolower($HrefField)){$IsModifyField=true;}
			}
			//檢查是否為顯示核取欄位
			$IsCheckBoxField = false;
			if($CheckBoxFields){
				for($j=0;$j<count($CheckBoxFields);$j++){
					if(strtolower($FieldName)==strtolower($CheckBoxFields[$j])){$IsCheckBoxField=true;break;}
				}
			}
			//檢查是否為顯示核取欄位
			$IsButtonField = false;
			if($ButtonFields){
				for($j=0;$j<count($ButtonFields);$j++){
					if(strtolower($FieldName)==strtolower($ButtonFields[$j])){$IsButtonField=true;break;}
				}
			}
			//檢查是否為Text欄位
			$IsTextField = false;
			if($TextFields){
				for($j=0;$j<count($TextFields);$j++){
					if(strtolower($FieldName)==strtolower($TextFields[$j])){$IsTextField=true;break;}
				}
			}
			//檢查是否為圖片欄位
			$IsPicField = false;
			if(is_array($PicField)){
				for($j=0;$j<count($PicField);$j++){
					if(strtolower($FieldName)==strtolower($PicField[$j])){
						$IsPicField=true;
						$CurPicWidth = $PicWidth[$j];
						$CurPicHref = $PicHref[$j];
						break;
					}
				}
			}else{
				if(strtolower($FieldName)==strtolower($PicField)){
					$IsPicField=true;
					$CurPicWidth = $PicWidth;
					$CurPicHref = $PicHref;
				}
			}
			$ModifyHref = "";
			if(is_array($ModifyFileName)){
				$ModifyHref = $ModifyFileName[$ModifyFieldCount];
				if($IsModifyField){ $ModifyFieldCount++; }
			}else{
				$ModifyHref = $ModifyFileName;
			}
			
			include('OnePageCommon.php');
		}
		//下層連結按鈕
		if($DBTableName[0]!=""){
			for($i=0;$i<count($DBTableName);$i++){
				echo "<td align=\"center\">\n";
				if( $DBTableName[$i] == "TravelList.php"){
					$SQL = "Select Count(*) From travellist Where G0 = ".$Row["SerialNo"]." And Status = '未處理'";
					$Rs2 = mysql_query($SQL,$Conn);
					$Row2 = mysql_fetch_array($Rs2);
					echo "<a class=\"otherlink\" href=\"".$DBTableName[$i]."?".$GName."=".$Row["SerialNo"]."\">".$Row2[0]."</a>\n";
				}else{
					echo "<a class=\"otherlink\" href=\"".$DBTableName[$i]."?".$GName."=".$Row["SerialNo"]."\"><img src=\"../../images/add.gif\" border=\"0\"/></a>\n";
				}
				if($FirstFieldFlag){
					echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>";
					$FirstFieldFlag = false;
				}
				echo "</td>\n";
			}
		}
		$iPage++;
		echo "</tr>\n";
	}
}
function ShowOnePageData($Rs,$Page,$NoShowFields,$Href,$HrefField,$align,$PicField,$PicWidth,$PicHref,$DBTableName,$GName){
	global $Conn,$StatusItem,$CheckBoxShow;
	global $CheckBoxFields;
	global $ButtonFields;
	global $TextFields;
	global $DatabaseName02;
	global $IndexPhotosTable;
	global $ModifyFileName;
	$TargetWindowValue[0] = "_self";
	$TargetWindowValue[1] = "_blank";
	$TargetWindowItem[0] = "本頁開啟";
	$TargetWindowItem[1] = "另開新視窗";
	$ModifyFieldCount = 0;
	$RsLength = count($Rs);
	if($RsLength>0){
		$iPage = 1;
		foreach($Rs as $Key => $Row){
			if(($iPage % 2) != 0){
				echo "<tr style=\"font-size:13px;color:black\" class=\"OnePageTr\" bgcolor=\"#F7FBFD\" id=\"tr".$iPage."\" onmouseout=\"tr_mouseOut('tr".$iPage."','#F7FBFD');\" onmouseover=\"tr_mouseOn('tr".$iPage."');\">\n";
			}else{
				echo "<tr style=\"font-size:13px;color:black\" class=\"OnePageTr\" bgcolor=\"#E0EFF8\" id=\"tr".$iPage."\" onmouseout=\"tr_mouseOut('tr".$iPage."','#E0EFF8');\" onmouseover=\"tr_mouseOn('tr".$iPage."');\">\n";
			}

			$FirstFieldFlag = true;
			if($CheckBoxShow==true){
				echo "<td align=\"center\">";
				echo "<input class=\"CheckBoxShow\" type=\"checkbox\" id=\"checkbox".$iPage."\"  name=\"checkbox".$iPage."\" value=\"".$Row["SerialNo"]."\" idvalue=\"checkbox\" />";
				if($FirstFieldFlag){
					echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>\n";
					$FirstFieldFlag = false;
				}
				echo "</td>\n";
			}
			$ModifyFieldCount = 0;
			foreach($Row as $FieldName => $Value){
				$IsShow = true ;
				//檢查是否顯示
				for($j=0;$j<count($NoShowFields);$j++){
					if(strtolower($FieldName)==strtolower($NoShowFields[$j])){$IsShow=false;break;}
				}
				if(!$IsShow){continue;}

				if($FieldName == "IndexPhotos"){
					$SQL = "Select PICHidden From ".$IndexPhotosTable." Where G0 = ".$Row["SerialNo"]." And `Status` = '上架' Order By IndexStatus DESC,Sort,SerialNo DESC limit 0,1";
					$Rs2 = mysql_query($SQL,$Conn);
					if($Rs2 && mysql_num_rows($Rs2) > 0){
						$Row2 = mysql_fetch_array($Rs2);
						$Row[$FieldName] = $Row2["PICHidden"];
					}else{
						$Row[$FieldName] = "";
					}
				}
				//檢查是否為修改欄位
				$IsModifyField = false;
				if(is_array($HrefField)){
					for($j=0;$j<count($HrefField);$j++){
						if(strtolower($FieldName)==strtolower($HrefField[$j])){$IsModifyField=true;break;}
					}
				}else{
					if(strtolower($FieldName)==strtolower($HrefField)){$IsModifyField=true;}
				}
				//檢查是否為顯示核取欄位
				$IsCheckBoxField = false;
				if($CheckBoxFields){
					for($j=0;$j<count($CheckBoxFields);$j++){
						if(strtolower($FieldName)==strtolower($CheckBoxFields[$j])){$IsCheckBoxField=true;break;}
					}
				}
				//檢查是否為顯示核取欄位
				$IsButtonField = false;
				if($ButtonFields){
					for($j=0;$j<count($ButtonFields);$j++){
						if(strtolower($FieldName)==strtolower($ButtonFields[$j])){$IsButtonField=true;break;}
					}
				}
				//檢查是否為Text欄位
				$IsTextField = false;
				if($TextFields){
					for($j=0;$j<count($TextFields);$j++){
						if(strtolower($FieldName)==strtolower($TextFields[$j])){$IsTextField=true;break;}
					}
				}
				//檢查是否為圖片欄位
				$IsPicField = false;
				if(is_array($PicField)){
					for($j=0;$j<count($PicField);$j++){
						if(strtolower($FieldName)==strtolower($PicField[$j])){
							$IsPicField=true;
							$CurPicWidth = $PicWidth[$j];
							$CurPicHref = $PicHref[$j];
							break;
						}
					}
				}else{
					if(strtolower($FieldName)==strtolower($PicField)){
						$IsPicField=true;
						$CurPicWidth = $PicWidth;
						$CurPicHref = $PicHref;
					}
				}
				if(is_array($ModifyFileName)){
					$ModifyHref = $ModifyFileName[$ModifyFieldCount];
					if($IsModifyField){ $ModifyFieldCount++; }
				}else{
					$ModifyHref = $ModifyFileName;
				}
				include('OnePageCommon.php');
			}
			//下層連結按鈕
			if($DBTableName[0]!=""){
				for($i=0;$i<count($DBTableName);$i++){
					echo "<td align=\"center\">\n";
					if( $DBTableName[$i] == "TravelList.php"){
						$SQL = "Select Count(*) From travellist Where G0 = ".$Row["SerialNo"]." And Status = '未處理'";
						$Rs2 = mysql_query($SQL,$Conn);
						$Row2 = mysql_fetch_array($Rs2);
						echo "<a class=\"otherlink\" href=\"".$DBTableName[$i]."?".$GName."=".$Row["SerialNo"]."\">".$Row2[0]."</a>\n";
					}else{
						echo "<a class=\"otherlink\" href=\"".$DBTableName[$i]."?".$GName."=".$Row["SerialNo"]."\"><img src=\"../../images/add.gif\" border=\"0\"/></a>\n";
					}
					if($FirstFieldFlag){
						echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>";
						$FirstFieldFlag = false;
					}
					echo "</td>\n";
				}
			}
			$iPage++;
			echo "</tr>\n";
		}
	}
}
?>