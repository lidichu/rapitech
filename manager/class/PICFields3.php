<?php
	class PICFields3 implements ManagerItem{
		var $FieldName;
		var $ShowName;
		var $NullFlag;
		var $FilePathArray;
		var $FilePath;
		var $WidthArray;
		var $HeightArray;
		var $Note;
		var $TitleField;
		var $TitleShow;
		var $Num;
		var $OtherVar;
		var $FieldNameHidden;
		var $BoxMode;
		var $ShowWidth;
		var $ShowHeight;
		var $ShowRoot;
		var $AddWaterMark;
		public function PICFields3($FieldNameIn,$ShowNameIn,$NullFlagIn=false,$FilePathArrayIn,$WidthArrayIn=null,$HeightArrayIn=null,$NoteIn,$TitleFieldIn="",$TitleShowIn="",$NumIn=1,$OtherVarIn="",$FieldNameHiddenIn="",$BoxModeIn,$ShowWidthIn,$ShowHeightIn,$ShowRootIn,$AddWaterMark=false){
		
			$this->FieldName = $FieldNameIn ;
			$this->ShowName = $ShowNameIn ;
			$this->NullFlag = $NullFlagIn ;
			$this->FilePathArray = $FilePathArrayIn ;
			$this->FilePath = $this->FilePathArray[0];
			$this->WidthArray = $WidthArrayIn;
			$this->HeightArray = $HeightArrayIn;
			$this->Note = $NoteIn;
			$this->TitleField = $TitleFieldIn ;
			$this->TitleShow = $TitleShowIn ;
			$this->Num = $NumIn ;
			$this->OtherVar = $OtherVarIn;
			$this->OtherVar = ($this->OtherVar=="")?"?":"?".$this->OtherVar."&";
			if($this->FieldNameHidden==""){$this->FieldNameHidden = $this->FieldName."Hidden";}
			$this->BoxMode = $BoxModeIn;
			$this->ShowWidth = $ShowWidthIn;
			$this->ShowHeight = $ShowHeightIn;
			$this->ShowRoot = $ShowRootIn;
			if($this->ShowRoot==""){$this->ShowRoot = $this->FilePath;}
			$this->AddWaterMark = $AddWaterMark;
		}
		
		
		function AddShow(){
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">\n";
			if($this->TitleField!=""){
			echo "		&nbsp;&nbsp;".$this->TitleShow."：<input type=\"text\" name=\"".$this->TitleField."\" id=\"".$this->TitleField."\" size=\"40\"><br/>\n";
			}
			echo "		&nbsp;&nbsp;路徑：<input type=\"file\" name=\"".$this->FieldName."\" id=\"".$this->FieldName."\" size=\"40\" />\n";
			echo "		<input type=\"hidden\" name=\"FileName_".$this->FieldName."\" id=\"FileName_".$this->FieldName."\" />\n";
			if($this->Note!=""){
			echo "		<br/><span style=\"color:#F00;\">".$this->Note."</span>\n";	
			}
			if($this->NullFlag){
			echo "			<font size=\"-1\" color=\"DarkGray\">(必填)</font>\n";
			}
			echo "		</td>\n";
			echo "	</tr>\n";
		}
		function ModifyShow(){
			global $Row;
			echo  "<tr>\n";
			echo  "	<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo  "	<td height=\"83%\" width=\"489\" valign=\"top\" bgcolor=\"#FFFFFF\" align=\"left\">\n";
			echo  "	<input type=\"hidden\" id=\"OldFile_".$this->FieldNameHidden."\" name=\"OldFile_".$this->FieldNameHidden."\" value=\"".$Row[$this->FieldNameHidden]."\"/>\n";
			echo  "	<input type=\"hidden\" id=\"OldFile_".$this->FieldName."\" name=\"OldFile_".$this->FieldName."\" value=\"".$Row[$this->FieldName]."\"/>\n";
			if($Row[$this->FieldName]!=""){
				$PICWidthString = "";
				$PICHeightString = "";
				if($this->ShowWidth != ""){$PICWidthString = " width=\"".$this->ShowWidth."\" ";}
				if($this->ShowHeight != ""){$PICHeightString = " height=\"".$this->ShowHeight."\" ";}
				$size = getimagesize($this->FilePathArray[0].$Row[$this->FieldNameHidden]);
				if($PICWidthString !=""){
					if($this->ShowWidth > $size[0]){
						$PICWidthString = " width=\"".$size[0]."\" ";
					}
				}
				if($PICHeightString !=""){
					if($this->ShowWidth > $size[1]){
						$PICHeightString = " height=\"".$size[1]."\" ";
					}
				}				
			echo  "		圖片：\n";	
				if($this->TitleField!=""){
					if($Row[$this->TitleField]!=""){
			echo  "			<a href=\"".GetSCRIPTNAME().$this->OtherVar."option=Download&SerialNo=".$Row["SerialNo"]."&FieldName=".$this->FieldName."\" target=\"_blank\" alt=\"".$Row[$this->TitleField]."\" title=\"".$Row[$this->TitleField]."\"><img src=\"".$this->ShowRoot.$Row[$this->FieldNameHidden]."\" alt=\"".$Row[$this->TitleField]."\"".$PICWidthString.$PICHeightString." border=\"0\"/></a><br/>\n";
					}else{
			echo  "			<a href=\"".GetSCRIPTNAME().$this->OtherVar."option=Download&SerialNo=".$Row["SerialNo"]."&FieldName=".$this->FieldName."\" target=\"_blank\" alt=\"".$Row[$this->FieldName]."\" title=\"".$Row[$this->FieldName]."\"><img src=\"".$this->ShowRoot.$Row[$this->FieldNameHidden]."\" alt=\"".$Row[$this->FieldName]."\"".$PICWidthString.$PICHeightString." border=\"0\"/></a><br/>\n";
					}
				}else{
			echo  "			<a href=\"".GetSCRIPTNAME().$this->OtherVar."option=Download&SerialNo=".$Row["SerialNo"]."&FieldName=".$this->FieldName."\" target=\"_blank\" alt=\"".$Row[$this->FieldName]."\" title=\"".$Row[$this->FieldName]."\"><img src=\"".$this->ShowRoot.$Row[$this->FieldNameHidden]."\" alt=\"".$Row[$this->FieldName]."\"".$PICWidthString.$PICHeightString." border=\"0\"/></a><br/>\n";
				}
			}else{
			echo  "		<font color=\"red\">沒有圖片</font><br/>\n";	
			}
			
			echo  "		<input type=\"radio\" value=\"no_change\" checked name=\"file".$this->Num."_modify\" onclick=\"$('#FileDiv_".$this->Num."').hide();$('#FileTitle_".$this->Num."').hide();\">不變&nbsp;&nbsp;\n";
			echo  "		<input type=\"radio\" value=\"new\" name=\"file".$this->Num."_modify\"  onclick=\"$('#FileDiv_".$this->Num."').show();$('#FileTitle_".$this->Num."').hide();\">上傳新檔\n";
			if($this->NullFlag!=true){
				if($Row[$this->FieldName]!=""){
			echo  "		<input type=\"radio\" value=\"del\" name=\"file".$this->Num."_modify\" onclick=\"$('#FileDiv_".$this->Num."').hide();$('#FileTitle_".$this->Num."').hide();\">刪除\n";
				}
			}
			if($this->TitleField!="" && $Row[$this->FieldName]!=""){
			echo  "		<input type=\"radio\" value=\"modify\" name=\"file".$this->Num."_modify\" onclick=\"$('#FileDiv_".$this->Num."').hide();$('#FileTitle_".$this->Num."').show();\">修改".$this->TitleShow."\n";
			}
			echo  "		<div id=\"FileDiv_".$this->Num."\" style=\"display:none\">\n";
			if($this->TitleField!=""){
			echo  "		&nbsp;".$this->TitleShow."：<input type=\"text\" name=\"".$this->TitleField."\" id=\"".$this->TitleField."\" size=\"40\" maxlength=\"255\" value=\"\"><br/>\n";	
			}
			echo  "		&nbsp;路徑：<input type=\"file\" name=\"".$this->FieldName."\"  id=\"".$this->FieldName."\" size=\"30\">\n";
			echo "		<input type=\"hidden\" name=\"FileName_".$this->FieldName."\" id=\"FileName_".$this->FieldName."\">\n";
			if($this->Note!=""){
			echo "		<br/><span style=\"color:#F00;\">".$this->Note."</span>\n";	
			}			
			echo  "		</div>\n";
			echo  "		<div id=\"FileTitle_".$this->Num."\" style=\"display:none\">";
			echo  "		&nbsp;".$this->TitleShow."：<input type=\"text\" name=\"Title_".$this->TitleField."\" id=\"Title_".$this->TitleField."\" size=\"40\" maxlength=\"255\" value=\"\"><br/>\n";	
			echo  "		</div>";
			echo  "	</td>\n";
			echo  "</tr>\n";
		}
		function ReadShow(){
			global $Row;
			echo  "<tr>\n";
			echo  "	<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo  "	<td height=\"83%\" width=\"489\" valign=\"top\" bgcolor=\"#FFFFFF\" align=\"left\">\n";
			echo  "	<input type=\"hidden\" id=\"OldFile_".$this->FieldNameHidden."\" name=\"OldFile_".$this->FieldNameHidden."\" value=\"".$Row[$this->FieldNameHidden]."\"/>\n";
			echo  "	<input type=\"hidden\" id=\"OldFile_".$this->FieldName."\" name=\"OldFile_".$this->FieldName."\" value=\"".$Row[$this->FieldName]."\"/>\n";
			if($Row[$this->FieldName]!=""){
				$PICWidthString = "";
				$PICHeightString = "";
				if($this->ShowWidth != ""){$PICWidthString = " width=\"".$this->ShowWidth."\" ";}
				if($this->ShowHeight != ""){$PICHeightString = " height=\"".$this->ShowHeight."\" ";}
				$size = getimagesize($this->FilePathArray[0].$Row[$this->FieldNameHidden]);
				if($PICWidthString !=""){
					if($this->ShowWidth > $size[0]){
						$PICWidthString = " width=\"".$size[0]."\" ";
					}
				}
				if($PICHeightString !=""){
					if($this->ShowWidth > $size[1]){
						$PICHeightString = " height=\"".$size[1]."\" ";
					}
				}				
			echo  "		圖片：\n";	
				if($this->TitleField!=""){
					if($Row[$this->TitleField]!=""){
			echo  "			<a href=\"".GetSCRIPTNAME().$this->OtherVar."option=Download&SerialNo=".$Row["SerialNo"]."&FieldName=".$this->FieldName."\" target=\"_blank\" alt=\"".$Row[$this->TitleField]."\" title=\"".$Row[$this->TitleField]."\"><img src=\"".$this->ShowRoot.$Row[$this->FieldNameHidden]."\" alt=\"".$Row[$this->TitleField]."\"".$PICWidthString.$PICHeightString." border=\"0\"/></a><br/>\n";
					}else{
			echo  "			<a href=\"".GetSCRIPTNAME().$this->OtherVar."option=Download&SerialNo=".$Row["SerialNo"]."&FieldName=".$this->FieldName."\" target=\"_blank\" alt=\"".$Row[$this->FieldName]."\" title=\"".$Row[$this->FieldName]."\"><img src=\"".$this->ShowRoot.$Row[$this->FieldNameHidden]."\" alt=\"".$Row[$this->FieldName]."\"".$PICWidthString.$PICHeightString." border=\"0\"/></a><br/>\n";
					}
				}else{
			echo  "			<a href=\"".GetSCRIPTNAME().$this->OtherVar."option=Download&SerialNo=".$Row["SerialNo"]."&FieldName=".$this->FieldName."\" target=\"_blank\" alt=\"".$Row[$this->FieldName]."\" title=\"".$Row[$this->FieldName]."\"><img src=\"".$this->ShowRoot.$Row[$this->FieldNameHidden]."\" alt=\"".$Row[$this->FieldName]."\"".$PICWidthString.$PICHeightString." border=\"0\"/></a><br/>\n";
				}
			}else{
			echo  "		<font color=\"red\">沒有圖片</font><br/>\n";	
			}
			echo  "	</td>\n";
			echo  "</tr>\n";			
		}
		function CheckScript(){
			if($this->NullFlag){
			echo "if($(\"input[name=file".$this->Num."_modify]:checked\").length>0){\n";
			echo "	if($(\"input[name=file".$this->Num."_modify]:checked\").val()==\"new\"){\n";
			echo "		if((rtn=CheckField(\"".$this->FieldName."\",\"".$this->ShowName."\",255))!=\"\"){\n";
			echo "			sError += (sError==\"\")?\"\":\"\\n\";\n";
			echo "			sError += rtn;\n";
			echo "		}\n";
			echo "	}\n";
			echo "}else{\n";
			echo "		if((rtn=CheckField(\"".$this->FieldName."\",\"".$this->ShowName."\",255))!=\"\"){\n";
			echo "			sError += (sError==\"\")?\"\":\"\\n\";\n";
			echo "			sError += rtn;\n";
			echo "		}\n";
			echo "}\n";
			}
		}
		function AddScript(){
			echo "<script language=\"javascript\" type=\"text/javascript\">\n";
			echo "	$(function(){\n";
			echo "		$(\"#form1\").submit(function(){\n";
			echo "			if($(\"#".$this->FieldName."\").length>0){\n";
			echo "				if($(\"#".$this->FieldName."\").val()!=\"\"){\n";
			echo "					var Ary = $(\"#".$this->FieldName."\").val().split(\"\\\\\");\n";
			echo "					$(\"#FileName_".$this->FieldName."\").val(Ary[Ary.length-1]);\n";
			echo "				}\n";
			echo "			}\n";
			echo "		});\n";
			echo "	});\n";			
			echo "</script>\n";
		}
		function ModifyScript(){
			echo "<script language=\"javascript\" type=\"text/javascript\">\n";
			echo "	$(function(){\n";
			echo "		$(\"#form1\").submit(function(){\n";
			echo "			if($(\"#".$this->FieldName."\").length>0){\n";
			echo "				if($(\"#".$this->FieldName."\").val()!=\"\"){\n";
			echo "					var Ary = $(\"#".$this->FieldName."\").val().split(\"\\\\\");\n";
			echo "					$(\"#FileName_".$this->FieldName."\").val(Ary[Ary.length-1]);\n";
			echo "				}\n";
			echo "			}\n";
			echo "		});\n";
			echo "	});\n";			
			echo "</script>\n";
		}
		function ShowScript(){}
		function AddHandle(){
			global $AddFieldsSQL,$AddValuesSQL;
			//判斷是否有上傳檔案
			if($_FILES[$this->FieldName]["size"] > 0){
				$FileName = ($_POST["FileName_".$this->FieldName]=="")?$_FILES[$this->FieldName]['name']:$_POST["FileName_".$this->FieldName];
				$FieldNameHiddenValue = FileHandle::Upload($_FILES[$this->FieldName],$this->FilePathArray[0],$_POST["FileName_".$this->FieldName]);
				
				//增加浮水印
				if($this->AddWaterMark)
					$this->attachWaterMark($this->FilePathArray[0]."/".$FieldNameHiddenValue);
				
				for($i=1;$i<count($this->FilePathArray);$i++){
					PICHandle::ImageResize($this->FilePathArray[0].$FieldNameHiddenValue, $this->FilePathArray[$i]."/".$FieldNameHiddenValue, $this->WidthArray[$i],$this->HeightArray[$i],$this->BoxMode[$i]);
				}
				PICHandle::ImageResize($this->FilePathArray[0].$FieldNameHiddenValue, $this->FilePathArray[0]."/".$FieldNameHiddenValue, $this->WidthArray[0],$this->HeightArray[0],$this->BoxMode[0]);
			}else{
				$FileName = "";
				$FieldNameHiddenValue = "";
			}
			if($AddFieldsSQL!=""){$AddFieldsSQL.=",`".$this->FieldName."`,`".$this->FieldNameHidden."`";}else{$AddFieldsSQL.="`".$this->FieldName."`,`".$this->FieldNameHidden."`";}
			if($AddValuesSQL!=""){$AddValuesSQL.=",'".$FileName."','".$FieldNameHiddenValue."'";}else{$AddValuesSQL.="'".$FileName."','".$FieldNameHiddenValue."'";}
			if($this->TitleField!=""){
				if($_POST[$this->TitleField]!=""){
					if($AddFieldsSQL!=""){$AddFieldsSQL.=",`".$this->TitleField."`";}else{$AddFieldsSQL.="`".$this->TitleField."`";}
					if($AddValuesSQL!=""){$AddValuesSQL.=",'".$_POST[$this->TitleField]."'";}else{$AddValuesSQL.="'".$_POST[$this->TitleField]."'";}
				}else{
					if($AddFieldsSQL!=""){$AddFieldsSQL.=",`".$this->TitleField."`";}else{$AddFieldsSQL.="`".$this->TitleField."`";}
					if($AddValuesSQL!=""){$AddValuesSQL.=",'".$FileName."'";}else{$AddValuesSQL.="'".$FileName."'";}
				}
			}
		}
		function ModifyHandle(){
			global $ModifySQL;
			if($_POST["file".$this->Num."_modify"]=="new"){
				//判斷是否有上傳檔案
				if($_FILES[$this->FieldName]["size"] > 0){
					$FileName = ($_POST["FileName_".$this->FieldName]=="")?$_FILES[$this->FieldName]['name']:$_POST["FileName_".$this->FieldName];
					$FieldNameHiddenValue = FileHandle::Upload($_FILES[$this->FieldName],$this->FilePathArray[0],$_POST["FileName_".$this->FieldName]);
					
					//增加浮水印
					if($this->AddWaterMark)
						$this->attachWaterMark($this->FilePathArray[0]."/".$FieldNameHiddenValue);
					
					for($i=1;$i<count($this->FilePathArray);$i++){
						PICHandle::ImageResize($this->FilePathArray[0].$FieldNameHiddenValue, $this->FilePathArray[$i]."/".$FieldNameHiddenValue, $this->WidthArray[$i],$this->HeightArray[$i],$this->BoxMode[$i]);
					}
					PICHandle::ImageResize($this->FilePathArray[0].$FieldNameHiddenValue, $this->FilePathArray[0]."/".$FieldNameHiddenValue, $this->WidthArray[0],$this->HeightArray[0],$this->BoxMode[0]);
						
					
					if($FieldNameHiddenValue!=""){
						$DelFileName = $_POST["OldFile_".$this->FieldNameHidden];
						for($i=0;$i<count($this->FilePathArray);$i++){
							$DelFileNameResult = FileHandle::Delete($this->FilePathArray[$i],$DelFileName);
						}
					}else{
						$FileName = $_POST["OldFile_".$this->FieldName];
						$FieldNameHiddenValue = $_POST["OldFile_".$this->FieldNameHidden];
					}					
				}else{
					$FileName = $_POST["OldFile_".$this->FieldName];
					$FieldNameHiddenValue = $_POST["OldFile_".$this->FieldNameHidden];				
				}
				if($ModifySQL!=""){$ModifySQL.=",";}
				$ModifySQL.="`".$this->FieldName."`='".$FileName."',`".$this->FieldNameHidden."`='".$FieldNameHiddenValue."'";
				if($this->TitleField!=""){
					if($_POST[$this->TitleField]!=""){
						if($ModifySQL!=""){$ModifySQL.=",";}
						$ModifySQL.="`".$this->TitleField."`='".$_POST[$this->TitleField]."'";
					}else{
						if($ModifySQL!=""){$ModifySQL.=",";}
						$ModifySQL.=",`".$this->TitleField."`='".$FileName."'";
					}
				}
			}elseif($_POST["file".$this->Num."_modify"]=="del"){
				$DelFileName = $_POST["OldFile_".$this->FieldNameHidden];
				for($i=0;$i<count($this->FilePathArray);$i++){
					$DelFileNameResult = FileHandle::Delete($this->FilePathArray[$i],$DelFileName);
				}				
				$FileName = "";
				$FieldNameHiddenValue = "";
				if($ModifySQL!=""){$ModifySQL.=",";}
				$ModifySQL.="`".$this->FieldName."`='".$FileName."',`".$this->FieldNameHidden."`='".$FieldNameHiddenValue."'";
				if($this->TitleField!=""){
					if($ModifySQL!=""){$ModifySQL.=",";}
					$ModifySQL.="`".$this->TitleField."`=''";
				}
			}elseif($_POST["file".$this->Num."_modify"]=="modify"){
				if($this->TitleField!=""){
					if($_POST["Title_".$this->TitleField]!=""){
						if($ModifySQL!=""){$ModifySQL.=",";}
						$ModifySQL.="`".$this->TitleField."`='".$_POST["Title_".$this->TitleField]."'";
					}else{
						if($ModifySQL!=""){$ModifySQL.=",";}
						$ModifySQL.="`".$this->TitleField."`=".$this->FieldName;
					}
				}
			}
		}
		
		function attachWaterMark($img_path)
		{
			list($img_width, $img_height, $img_type) = getimagesize($img_path);
			$img = $this->getImage($img_type,$img_path);
				
			$watermark_path = "../../images/RAPITECH_watermark.png";
			list($watermark_width, $watermark_height, $watermark_type) = getimagesize($watermark_path);
			$watermark = $this->getImage($watermark_type,$watermark_path);
				
				
			$scaleX = $img_width/$watermark_width;
			$new_width = $watermark_width * $scaleX;
			$new_height = $watermark_height * $scaleX;
			$new_x = $img_width/2 - $new_width/2;
			$new_y = $img_height/2 - $new_height/2;
			
			
			imagecopyresampled ( $img , $watermark, $new_x , $new_y , 0 , 0 , $new_width , $new_height , $watermark_width , $watermark_height);
			$this->saveImage($img_type,$img,$img_path);
		}
		
		function getImage($type,$path)
		{
			switch($type) {
				case 1:
					# GIF image
					$img = imageCreateFromGIF($path);
					break;
				case 2:
					# JPEG image
					$img = imageCreateFromJPEG($path);
					break;
				case 3:
					# PNG image
					$img = imageCreateFromPNG($path);
					break;
			}
			return $img;
		}
		
		function saveImage($type,$img,$path)
		{
			switch($type) {
				case 1:
					# GIF image
					imageGIF($img, $path);
					break;
				case 2:
					# JPEG image
					imageJPEG($img, $path);
					break;
				case 3:
					# PNG image
					imagePNG($img, $path);
					break;
			}
		}
	}
?>