<?php
if($IsModifyField){
	//修改欄位
	if($IsPicField){
		//圖片欄位
		if($Row[$FieldName]!="" && FileHandle::CheckFileExists($CurPicHref.$Row[$FieldName])){
			//取得副檔名
			$FileFormat = FileHandle::GetExtendName($Row[$FieldName]);
			$FileFormat = strtoupper($FileFormat);
			if($CurPicWidth!=""){$PicWidthString = "width=\"".$CurPicWidth."\"";}

			if($FileFormat="GIF" || $FileFormat = "JPG" || $FileFormat = "JEPG" || $FileFormat = "PNG" || $FileFormat ="BMP"){
				
				$size = getimagesize(FileHandle::GetPath($CurPicHref.$Row[$FieldName]));
				if($PicWidthString !=""){
					$width = $size[0];
					$height = $size[1];
					$width = $CurPicWidth;
					$height	= intval($width * $size[1] / $size[0]);
					if($height >= 250){
						$width = intval($width * 250 / $height);
						$height = 250;
					}
					$PicWidthString = " width=\"".$width."\" height=\"".$height."\"";
				}
				echo "<td align=\"center\">";
				echo "<a class=\"modifylink\" href=\"".$GName."=".$Row["SerialNo"]."\" data-modify=\"".$ModifyHref."\"><img src=\"".$CurPicHref.$Row[$FieldName]."\" ".$PicWidthString." border=\"0\" /></a>";
				if($FirstFieldFlag){
					echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>\n";
					$FirstFieldFlag = false;
				}
				echo "</td>\n";
			}elseif($FileFormat="SWF"){
				echo "<td align=\"center\">\n";
				echo "<object classid=\"clsid:D27CDB6E-AE6D-11CF-96B8-444553540000\" id=\"obj".$iPage."\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0\" border=\"0\" ".$PicWidthString.">\n";
				echo "<param name=\"movie\" value=\"".$CurPicHref.$Row[$FieldName]."\">\n";
				echo "<param name=\"quality\" value=\"High\">\n";
				echo "<embed src=\"".$CurPicHref.$Row[$FieldName]."\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" name=\"obj".$iPage."\" ".$PicWidthString."></object>\n";
				echo "<br /><a class=\"modifylink\" href=\"".$GName."=".$Row["SerialNo"]."\" data-modify=\"".$ModifyHref."\">修改</a>";
				if($FirstFieldFlag){
					echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>\n";
					$FirstFieldFlag = false;
				}
				echo "</td>\n";
			}else{
				echo "<td>";
				echo "<a class=\"modifylink\" href=\"".$GName."=".$Row["SerialNo"]."\" data-modify=\"".$ModifyHref."\">修改</a>";
				echo "&nbsp;";
				if($FirstFieldFlag){
					echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>\n";
					$FirstFieldFlag = false;
				}
				echo "</td>\n";
			}

		}else{
			echo "<td>";
			echo "<a class=\"modifylink\" href=\"".$GName."=".$Row["SerialNo"]."\" data-modify=\"".$ModifyHref."\">無圖片</a>";
			if($FirstFieldFlag){
				echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>\n";
				$FirstFieldFlag = false;
			}
			echo "</td>\n";
		}
	}elseif($IsTextField){
		// HTML 內容欄位
		echo "<td align=\"center\" class=\"".$FieldName."class\">";
		echo "<a class=\"modifylink\" href=\"".$GName."=".$Row["SerialNo"]."\" data-modify=\"".$ModifyHref."\">".$Row[$FieldName]."</a>";
		if($FirstFieldFlag){
			echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>";
			$FirstFieldFlag = false;
		}
		echo "</td>\n";
	}else{
		//一般文字欄位
		echo "<td align=\"".$align."\">";
		if(strtolower($FieldName) == strtolower("TitleText")){
			echo "<a class=\"modifylink\" href=\"".$GName."=".$Row["SerialNo"]."\" data-modify=\"".$ModifyHref."\">".$Row[$FieldName]."</a>";
		}else{
			echo "<a class=\"modifylink\" href=\"".$GName."=".$Row["SerialNo"]."\" data-modify=\"".$ModifyHref."\">".strip_tags(htmlspecialchars_decode($Row[$FieldName]))."</a>";
		}

		if($FirstFieldFlag){
			echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>\n";
			$FirstFieldFlag = false;
		}
		echo "</td>\n";
	}
}else{
	//非修改欄位
	if($IsCheckBoxField){
		//核取欄位
		echo "<td align=\"center\">\n";
		if(strtolower($Row[$FieldName])=="true"){
			echo "<input type=\"checkbox\" class=\"".$FieldName."Class\" checked=\"checked\" value=\"".$Row["SerialNo"]."\" />\n";
		}else{
			echo "<input type=\"checkbox\" class=\"".$FieldName."Class\" value=\"".$Row["SerialNo"]."\" />\n";
		}
		if($FirstFieldFlag){
			echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>\n";
			$FirstFieldFlag = false;
		}
		echo "</td>\n";
	}elseif($IsPicField){
		//圖片欄位
		if(strtolower($FieldName)==strtolower("IndexPIC")){
			$SQL = "Select * From activitiespic Where G0 = ".$Row["SerialNo"]." Order By IndexShow DESC,Sort ,SerialNo DESC";
			$Rs2 = mysql_query($SQL,$Conn);
			if($Rs2 && mysql_num_rows($Rs2) > 0){
				$Row2 = mysql_fetch_array($Rs2);
				$Row[$FieldName] = $Row2["PicHidden"];
			}
		}
		
		
		if($Row[$FieldName]!="" && FileHandle::CheckFileExists($CurPicHref.$Row[$FieldName])){
			//取得副檔名
			$FileFormat = FileHandle::GetExtendName($Row[$FieldName]);
			$FileFormat = strtoupper($FileFormat);
			if($CurPicWidth!=""){$PicWidthString = "width=\"".$CurPicWidth."\"";}
			if($FileFormat="GIF" || $FileFormat = "JPG" || $FileFormat = "JEPG" || $FileFormat = "PNG" || $FileFormat ="BMP"){
				$size = getimagesize(FileHandle::GetPath($CurPicHref.$Row[$FieldName]));
				if($PicWidthString !=""){
					$width = $size[0];
					$height = $size[1];
					if($width > $CurPicWidth){
						$width = $CurPicWidth;
						$height	= intval($width * $size[1] / $size[0]);
						if($height >= 250){
							$width = intval($width * 250 / $height);
							$height = 250;
						}
					}
					$PicWidthString = " width=\"".$width."\" height=\"".$height."\"";
				}
				echo "<td align=\"center\"><img class=\"".$FieldName."class\" src=\"".$CurPicHref.$Row[$FieldName]."\" ".$PicWidthString." /></td>\n";
			}elseif($FileFormat="SWF"){
				echo "<td align=\"center\">\n";
				echo "<object classid=\"clsid:D27CDB6E-AE6D-11CF-96B8-444553540000\" id=\"obj".$iPage."\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0\" border=\"0\" ".$PicWidthString.">\n";
				echo "<param name=\"movie\" value=\"".$CurPicHref.$Row[$FieldName]."\">\n";
				echo "<param name=\"quality\" value=\"High\">\n";
				echo "<embed src=\"".$CurPicHref.$Row[$FieldName]."\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" name=\"obj".$iPage."\" ".$PicWidthString."></object>\n";
				if($FirstFieldFlag){
					echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>\n";
					$FirstFieldFlag = false;
				}
				echo "</td>\n";
			}else{
				echo "<td>&nbsp;</td>\n";
			}

		}else{
			echo "<td align=\"center\" class=\"".$FieldName."class\" src=\"\"> ";
			echo "目前尚無圖片";
			if($FirstFieldFlag){
				echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>\n";
				$FirstFieldFlag = false;
			}
			echo "</td>\n";
		}
	}elseif($IsButtonField){
		echo "<td align=\"center\">\n";
		echo "<input type=\"button\" value=\"". $Row[$FieldName] ."\"  id=\"" . $Row["SerialNo"] . "\" class=\"" . $FieldName . "\">";
		if($FirstFieldFlag){
			echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>\n";
			$FirstFieldFlag = false;
		}
		echo "</td>\n";
	//是否標示為New
	}elseif(strtolower($FieldName)=="statuscheck"){
		//一般狀態欄位
		echo "<td align=\"center\">\n";
		if($Row[$FieldName] == "已確認"){
			echo "<span style=\"color:#F00;\">已確認</span>";
		}else{
			echo "<select id=\"status".$iPage."\" name=\"status".$iPage."\">\n";
			for($k=0;$k<count($StatusItem);$k++){
				if($Row[$FieldName]==$StatusItem[$k]){
					echo "<option value=\"".$StatusItem[$k]."\" selected=\"selected\">".$StatusItem[$k]."</option>\n";
				}else{
					echo "<option value=\"".$StatusItem[$k]."\">".$StatusItem[$k]."</option>\n";
				}
			}
			echo "</select>\n";
		}
		echo "<input type=\"hidden\" name=\"statusId".$iPage."\" id=\"statusId".$iPage."\" value=\"".$Row[$FieldName]."\"/>\n";
		if($FirstFieldFlag){
			echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>\n";
			$FirstFieldFlag = false;
		}
		echo "</td>\n";
	}elseif(strtolower($FieldName)=="status"){
		//一般狀態欄位
		echo "<td align=\"center\">\n";
		echo "<select id=\"status".$iPage."\" name=\"status".$iPage."\">\n";
		for($k=0;$k<count($StatusItem);$k++){
			if($Row[$FieldName]==$StatusItem[$k]){
				echo "<option value=\"".$StatusItem[$k]."\" selected=\"selected\">".$StatusItem[$k]."</option>\n";
			}else{
				echo "<option value=\"".$StatusItem[$k]."\">".$StatusItem[$k]."</option>\n";
			}
		}
		echo "</select>\n";
		echo "<input type=\"hidden\" name=\"statusId".$iPage."\" id=\"statusId".$iPage."\" value=\"".$Row[$FieldName]."\"/>\n";
		if($FirstFieldFlag){
			echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>\n";
			$FirstFieldFlag = false;
		}
		echo "</td>\n";
	}elseif(strtolower($FieldName)=="contactstatus"){
		//聯絡我們狀態欄位
		echo "<td align=\"center\">\n";
		$SQL="Select Count(*) From ".$DatabaseName02." Where G0 = :G0";
		$Rs2 = $Conn->prepare($SQL);
		$Rs2->bindParam(":G0", $Row["SerialNo"]);
		$Rs2->execute();
		$ReplyAmount = $Rs2->fetchColumn();
		if(($Row["ContactStatus"] == "已處理") || $ReplyAmount > 0) {
			//已經做處理
			echo "<span style=\"color:#F00;\">已處理</span>";
			echo "<input type=\"hidden\" name=\"status".$iPage."\" id=\"status".$iPage."\" value=\"".$Row[$FieldName]."\"/>\n";
		}else{
			echo "<select id=\"status".$iPage."\" name=\"status".$iPage."\">\n";
			for($k=0;$k<count($StatusItem);$k++){
				if($Row[$FieldName]==$StatusItem[$k]){
					echo "<option value=\"".$StatusItem[$k]."\" selected=\"selected\">".$StatusItem[$k]."</option>\n";
				}else{
					echo "<option value=\"".$StatusItem[$k]."\">".$StatusItem[$k]."</option>\n";
				}
			}
			echo "</select>\n";
		}
		echo "<input type=\"hidden\" name=\"statusId".$iPage."\" id=\"statusId".$iPage."\" value=\"".$Row[$FieldName]."\"/>\n";
		if($FirstFieldFlag){
			echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>\n";
			$FirstFieldFlag = false;
		}
		echo "</td>\n";
	}elseif(strtolower($FieldName)=="newsletterstatus"){
		//一般狀態欄位
		echo "<td align=\"center\">\n";
		if($Row[$FieldName] == "已寄送"){
			echo "<span style=\"color:#F00;\">已寄送</span>";
		}else{
			echo "<select id=\"status".$iPage."\" name=\"status".$iPage."\">\n";
			for($k=0;$k<count($StatusItem);$k++){
				if($Row[$FieldName]==$StatusItem[$k]){
					echo "<option value=\"".$StatusItem[$k]."\" selected=\"selected\">".$StatusItem[$k]."</option>\n";
				}else{
					echo "<option value=\"".$StatusItem[$k]."\">".$StatusItem[$k]."</option>\n";
				}
			}
			echo "</select>\n";
		}
		echo "<input type=\"hidden\" name=\"statusId".$iPage."\" id=\"statusId".$iPage."\" value=\"".$Row[$FieldName]."\"/>\n";
		if($FirstFieldFlag){
			echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>\n";
			$FirstFieldFlag = false;
		}
		echo "</td>\n";
	}elseif(strtolower($FieldName)==strtolower("TargetWindow")){
		//目標視窗狀態欄位
		echo "<td align=\"center\">\n";
		echo "<select id=\"TargetWindow".$iPage."\" name=\"TargetWindow".$iPage."\">\n";
		for($k=0;$k<count($TargetWindowValue);$k++){
			if(strtolower($Row[$FieldName])==$TargetWindowValue[$k]){
				echo "<option value=\"".$TargetWindowValue[$k]."\" selected=\"selected\">".$TargetWindowItem[$k]."</option>\n";
			}else{
				echo "<option value=\"".$TargetWindowValue[$k]."\">".$TargetWindowItem[$k]."</option>\n";
			}
		}
		echo "</select>\n";
		echo "<input type=\"hidden\" name=\"TargetWindowId".$iPage."\" id=\"TargetWindowId".$iPage."\" value=\"".$Row[$FieldName]."\"/>\n";
		if($FirstFieldFlag){
			echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>\n";
			$FirstFieldFlag = false;
		}
		echo "</td>\n";
	}elseif(strtolower($FieldName)=="sort"){
		//排序欄位
		echo "<td align=\"center\">\n";
		echo "<input type=\"text\" maxlength=\"6\" size=\"6\" id=\"sort".$iPage."\"  name=\"sort".$iPage."\" onkeyup=\"clearNoNum2(this);\" value=\"".$Row[$FieldName]."\">\n";
		echo "<input type=\"hidden\" name=\"sortId".$iPage."\" value=\"".$Row[$FieldName]."\">\n";
		if($FirstFieldFlag){
			echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>\n";
			$FirstFieldFlag = false;
		}
		echo "</td>\n";
	}elseif(strtolower($FieldName)==strtolower("IndexSort")){
		//首頁排序
		echo "<td align=\"center\">\n";
		echo "<input type=\"text\" maxlength=\"6\" size=\"6\" id=\"indexsort".$iPage."\"  name=\"indexsort".$iPage."\" onkeyup=\"clearNoNum2(this);\" value=\"".$Row[$FieldName]."\">\n";
		echo "<input type=\"hidden\" name=\"indexsortId".$iPage."\" value=\"".$Row[$FieldName]."\">\n";
		if($FirstFieldFlag){
			echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>\n";
			$FirstFieldFlag = false;
		}
		echo "</td>\n";
	}elseif(strtolower($FieldName)==strtolower("RecommendSort")){
		//推薦排序
		echo "<td align=\"center\">\n";
		echo "<input type=\"text\" maxlength=\"6\" size=\"6\" id=\"indexsort".$iPage."\"  name=\"indexsort".$iPage."\" onkeyup=\"clearNoNum2(this);\" value=\"".$Row[$FieldName]."\">\n";
		echo "<input type=\"hidden\" name=\"indexsortId".$iPage."\" value=\"".$Row[$FieldName]."\">\n";
		if($FirstFieldFlag){
			echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>\n";
			$FirstFieldFlag = false;
		}
		echo "</td>\n";
	}elseif(strtolower($FieldName)==strtolower("NewSort")){
		//新品排序
		echo "<td align=\"center\">\n";
		echo "<input type=\"text\" maxlength=\"6\" size=\"6\" id=\"indexsort".$iPage."\"  name=\"indexsort".$iPage."\" onkeyup=\"clearNoNum2(this);\" value=\"".$Row[$FieldName]."\">\n";
		echo "<input type=\"hidden\" name=\"indexsortId".$iPage."\" value=\"".$Row[$FieldName]."\">\n";
		if($FirstFieldFlag){
			echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>\n";
			$FirstFieldFlag = false;
		}
		echo "</td>\n";
	}elseif(strtolower($FieldName)==strtolower("youtube")){
		//Youtube欄位
		echo "<td align=\"center\">\n";
		if($Row[$FieldName]!=""){
			SetYoutube($Row[$FieldName],150,120,"",false);
		}else{
			echo "&nbsp;\n";
		}
		if($FirstFieldFlag){
			echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>\n";
			$FirstFieldFlag = false;
		}
		echo "</td>\n";
	}elseif(strtolower($FieldName)=="url"){
		//連結欄位
		echo "<td align=\"center\">";
		if($Row[$FieldName] != ""){
			echo "<div style=\"text-overflow:ellipsis;white-space:nowrap;width:300px;overflow:hidden;\">".$Row[$FieldName]."</div>";
			echo "<a href=\"".$Row[$FieldName]."\" target=\"_blank\">預覽</a>";
		}else{
		echo "&nbsp;";
		}
		if($FirstFieldFlag){
			echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>";
			$FirstFieldFlag = false;
		}
		echo "</td>\n";
	}elseif(strtolower($FieldName)==strtolower("button")){
		echo "<td align=\"center\">\n";
		echo "<input type=\"button\" value=\"". $Row[$FieldName] ."\" style=\"height:20\" class=\"button\" id=\"" . $Row["SerialNo"] . "\" name=\"" . $Row["OrderNumber"] . "\">";
		if($FirstFieldFlag){
			echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>\n";
			$FirstFieldFlag = false;
		}
		echo "</td>\n";	
	}elseif(strtolower($FieldName)=="email"){
		//Email欄位
		echo "<td align=\"left\">\n";
		echo "<a href=\"mailto:".$Row[$FieldName]."\">".$Row[$FieldName]."</a>";
		if($FirstFieldFlag){
			echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>\n";
			$FirstFieldFlag = false;
		}
		echo "</td>\n";
	}elseif(strtolower($FieldName)=="replyemail"){
		//回覆信件
		echo "<td align=\"center\">\n";
		echo "<a href=\"".$Row[$FieldName]."?G0=".$Row["SerialNo"]."\"><img src=\"../../images/mail.gif\" width=\"16\" height=\"16\" border=\"0\" /></a>";
		if($FirstFieldFlag){
			echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>\n";
			$FirstFieldFlag = false;
		}
		echo "</td>\n";
	}elseif(strtolower($FieldName)=="color"){
		echo "<td align=\"center\">\n";
		echo "<div style=\"width:20px;height:20px;background-color:".$Row[$FieldName]."\"></div>";
		if($FirstFieldFlag){
			echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>\n";
			$FirstFieldFlag = false;
		}
		echo "</td>\n";
	}elseif($IsTextField){
		// HTML 內容欄位
		echo "<td align=\"center\" class=\"".$FieldName."class\">";
		echo $Row[$FieldName];
		if($FirstFieldFlag){
			echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>";
			$FirstFieldFlag = false;
		}
		echo "</td>\n";
	}else{
		$GoView = false;
		include("WebSpecialField.php");
		if(!$GoView){
			//其它欄位
			if($IsTextField){
				echo "<td align=\"left\" class=\"".$FieldName."class\">";
				echo htmlspecialchars_decode($Row[$FieldName]);
			}else{
				if($FieldName=="IsVIP" || $FieldName=="BuyWay"){
					if($FieldName=="BuyWay" && $Row[$FieldName]=="來店"){
						$St="";
					}else{
						$St="style=\"color:#F00\"";
					}
					echo "<td align=\"center\" class=\"".$FieldName."class\" ".$St.">";
					echo strip_tags(htmlspecialchars_decode($Row[$FieldName]));
				}else{
					echo "<td align=\"center\" class=\"".$FieldName."class\">";
					echo strip_tags(htmlspecialchars_decode($Row[$FieldName]));
				}
			}
			if($FirstFieldFlag){
				echo "<input type=\"hidden\" class=\"SerialNoClass\" id=\"SERIALNO".$iPage."\" name=\"SERIALNO".$iPage."\" value=\"".$Row["SerialNo"]."\"/>";
				$FirstFieldFlag = false;
			}
			echo "</td>\n";
		}
	}
}
?>