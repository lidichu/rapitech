<?php
	class PICFieldsH5P implements ManagerItem{
		var $FieldTitle;
		var $FieldName;
		var $ShowName;
		var $NullFlag;
		var $FilePathArray;
		var $FileRealPathArray;
		var $FilePath;
		var $FileRealPath;
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
		public function PICFieldsH5P($FieldTitleIn,$FieldNameIn,$ShowNameIn,$NullFlagIn=false,$FilePathArrayIn,$WidthArrayIn=null,$HeightArrayIn=null,$NoteIn,$TitleFieldIn="",$TitleShowIn="",$NumIn=1,$OtherVarIn="",$FieldNameHiddenIn="",$BoxModeIn,$ShowWidthIn,$ShowHeightIn,$ShowRootIn){
			$this->FieldTitle = $FieldTitleIn ;
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
		}
		
		
		function AddShow(){
			echo "	<tr>\n";
			echo "		<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo "		<td width=\"83%\" bgcolor=\"#FFFFFF\" align=\"left\">\n";
			if($this->TitleField!=""){
			echo "		&nbsp;&nbsp;".$this->TitleShow."：<input type=\"text\" name=\"".$this->TitleField."\" id=\"".$this->TitleField."\" size=\"40\"><br/>\n";
			}
			echo "<div id='drop'>拖曳至此上傳<br />";			
			echo "		&nbsp;&nbsp;路徑：<input type=\"file\" name=\"".$this->FieldName."[]\" id=\"".$this->FieldName."\" size=\"40\" multiple=\"multiple\" />\n";
			echo "		<input type=\"hidden\" name=\"FileName_".$this->FieldName."\" id=\"FileName_".$this->FieldName."\"  />\n";
			echo "		<input type=\"hidden\" name=\"token"."\" id=\"token"."\" value='".md5('unique_salt' . $timestamp)."' />\n";
			echo "		<input type=\"hidden\" name=\"timestamp"."\" id=\"timestamp"."\"  value='".$timestamp."' />\n";
			echo "		<spen style='color: grey;'>★自動上傳</spen>\n";
			echo "</div>";
			if($this->Note!=""){
			echo "		<br/><span style=\"color:#F00;\">".$this->Note."</span>\n";	
			}
			if($this->NullFlag){
			echo "			<font size=\"-1\" color=\"DarkGray\">(必填)</font>\n";
			}
			echo "		</td>\n";
			echo "	</tr>\n";
			
			//echo "<div id='show'></div><div id='progress'><div class='bar' style='width: 0%;'></div><div class='item'></div></div>";

		}
		function ModifyShow(){
			global $Row;
			echo  "<tr>\n";
			echo  "	<td width=\"17%\" bgcolor=\"#EEEEEE\" nowrap align=\"right\"><font color=\"#FF8833\">".$this->ShowName."&nbsp;</font></td>\n";
			echo  "	<td height=\"83%\" width=\"489\" valign=\"top\" bgcolor=\"#FFFFFF\" align=\"left\">\n";
			echo  "	<input type=\"hidden\" id=\"OldFile_".$this->FieldNameHidden."\" name=\"OldFile_".$this->FieldNameHidden."\" value=\"".$Row[$this->FieldNameHidden]."\"/>\n";
			echo  "	<input type=\"hidden\" id=\"OldFile_".$this->FieldName."\" name=\"OldFile_".$this->FieldName."\" value=\"".$Row[$this->FieldName]."\"/>\n";
			if($Row[$this->FieldName]!="" && is_file(FileHandle::GetPath($this->ShowRoot.$Row[$this->FieldNameHidden]))){
				$PICWidthString = "";
				$PICHeightString = "";
				if($this->ShowWidth != ""){$PICWidthString = " width=\"".$this->ShowWidth."\" ";}
				if($this->ShowHeight != ""){$PICHeightString = " height=\"".$this->ShowHeight."\" ";}
				$size = getimagesize(FileHandle::GetPath($this->ShowRoot.$Row[$this->FieldNameHidden]));
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
			if($Row[$this->FieldName]!="" && is_file(FileHandle::GetPath($this->ShowRoot.$Row[$this->FieldNameHidden]))){
				$PICWidthString = "";
				$PICHeightString = "";
				if($this->ShowWidth != ""){$PICWidthString = " width=\"".$this->ShowWidth."\" ";}
				if($this->ShowHeight != ""){$PICHeightString = " height=\"".$this->ShowHeight."\" ";}
				$size = getimagesize(FileHandle::GetPath($this->ShowRoot.$Row[$this->FieldNameHidden]));
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
			$path=$_SERVER[PHP_SELF];
			$path_parts = pathinfo($path); 
			echo "<link rel='stylesheet' href='../../script/jquery-ui/jquery-ui.css' id='theme'>\n";
			echo "<script src='../../script/jquery-ui/jquery-ui.min.js'></script>\n";
			echo "<script src='../../script/jQuery-File-Upload/js/jquery.iframe-transport.js'></script>\n";
			echo "<script src='../../script/jQuery-File-Upload/js/jquery.fileupload.js'></script>\n";
			echo "<style>\n";
			echo"	.progress-bar.active, .progress.active .progress-bar {\n";
			echo"	  -webkit-animation: progress-bar-stripes 2s linear infinite;\n";
			echo"	  -webkit-animation-name: progress-bar-stripes;\n";
			echo"	  -webkit-animation-duration: 2s;\n";
			echo"	  -webkit-animation-timing-function: linear;\n";
			echo"	  -webkit-animation-delay: initial;\n";
			echo"	  -webkit-animation-iteration-count: infinite;\n";
			echo"	  -webkit-animation-direction: initial;\n";
			echo"	  -webkit-animation-fill-mode: initial;\n";
			echo"	  -webkit-animation-play-state: initial;\n";
			echo"	  -o-animation: progress-bar-stripes 2s linear infinite;\n";
			echo"	  animation: progress-bar-stripes 2s linear infinite;\n";
			echo"	}\n";
			echo"	.progress-bar-striped, .progress-striped .progress-bar {\n";
			echo"	  background-image: -webkit-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);\n";
			echo"	  background-image: -o-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);\n";
			echo"	  background-image: linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);\n";
			echo"	  -webkit-background-size: 40px 40px;\n";
			echo"	  background-size: 40px 40px;\n";
			echo"	}\n";
			echo"	.progress-bar {\n";
			echo"	  float: left;\n";
			echo"	  width: 0;\n";
			echo"	  height: 100%;\n";
			echo"	  font-size: 12px;\n";
			echo"	  line-height: 20px;\n";
			echo"	  color: #fff;\n";
			echo"	  text-align: center;\n";
			echo"	  background-color: #337ab7;\n";
			echo"	  -webkit-box-shadow: inset 0 -1px 0 rgba(0,0,0,.15);\n";
			echo"	  box-shadow: inset 0 -1px 0 rgba(0,0,0,.15);\n";
			echo"	  -webkit-transition: width .6s ease;\n";
			echo"	  -webkit-transition-property: width;\n";
			echo"	  -webkit-transition-duration: 0.6s;\n";
			echo"	  -webkit-transition-timing-function: ease;\n";
			echo"	  -webkit-transition-delay: initial;\n";
			echo"	  -o-transition: width .6s ease;\n";
			echo"	  transition: width .6s ease;\n";
			echo"	  transition-property: width;\n";
			echo"	  transition-duration: 0.6s;\n";
			echo"	  transition-timing-function: ease;\n";
			echo"	  transition-delay: initial;\n";
			echo"	}\n";
			//
			echo ".alertify .ajs-dimmer {\n";
			echo " background-color: #FFF; !important; \n";
			echo "opacity: .5;\n";
			echo "}\n";
			echo "  #drop{\n";
			echo "	  width: 500px;\n";
			echo "	  height: 50px;\n";
			echo "	  background: #eee;\n";
			echo "	  border: 3px dashed;\n";
			echo "	  text-align: center;\n";
			echo "	  padding: 50;\n";
			echo "  }\n";
			echo "  .active{\n";
			//echo "	  border: 3px dashed red !important;\n";
			echo "  }\n";
			echo "  .bar {\n";
			echo "	  height: 18px;\n";
			//echo "	  background: red;\n";
			echo "	  text-align: center;\n";
			echo "	  font-weight: bold;\n";
			echo "  }\n";
			echo "  .ctrl {\n";
			echo "  color: red;\n";
			echo "  }\n";
			echo "</style>\n";
			echo "<script>\n";
			echo "	$(document).ready(function(){ \n";
			echo "	$('#form1').append( \" <br/><br/><table width='600' border='0' cellspacing='0' ><tr><td><div id='show'></div><div id='progress'><div class='progress-bar progress-bar-striped active bar' style='width: 0%;'></div><br/><br/><div class='item'></div></div></td></tr></table> \" ); \n";
			//echo "	$('#cmdCancel').before( \" <input type='button' value='上傳' id='start'  > <input type='reset' class='' value='清除列表' id='remove'  > \" );\n";
			echo "	$('#cmdCancel').before( \" <br/><input type='reset' class='' value='中止' id='remove'  > \" );\n";
			echo "	$('#cmdEnter').remove();\n";			
			echo " 		$('#".$this->FieldName."').fileupload({\n";
			echo "			dropZone: $('#drop'),	//拖曳上傳區域\n";
			echo "	    	url: '".$path_parts['basename']."?option=Add&YesNo=true',		//上傳處理的PHP";
			echo "\n";
			echo "			dataType: 'html',\n";
			echo "	        //將要上傳的資料顯示\n";
			echo "	        add: function (e, data) {\n";
			echo "	            var tpl = $(\"<div class='working'><span class='pro' /><span class='info'></span><span class='ctrl'> (取消) </span></div>\");\n";
			echo "	            tpl.find('.info').text(data.files[0].name);\n";
			echo "	            data.context = tpl.appendTo($('.item'));\n";
			echo "\n";
			echo "	            tpl.find('.ctrl').click(function(e,data){\n";
			echo "	                if(tpl.hasClass('working')){\n";
			echo "	                    jqXHR.abort();  //取消上傳\n";
			echo "	                }\n";
			echo "\n";
			echo "	                tpl.fadeOut(function(){\n";
			echo "	                    tpl.remove();\n";
			echo "	                });\n";
			echo "	            });\n";
			echo "	            //執行 data.submit() 開始上傳\n";
			//echo "	            $('#start').click(function() {\n";
			echo "	            	var jqXHR = data.submit();\n";
			//echo "	            });\n";
			echo "	            //自動歸零 \n";
			echo "	            $('#PIC').click(function() {\n";
			echo "	            	$('#progress .bar').css('width',  '0%');\n";
			echo "					$('#progress .bar').text('0%');\n";
			echo "	            });\n";
			echo "	            //清除 \n";
			echo "	            $('#remove').click(function(e) {\n";
			echo "	            	$('#progress .bar').css('width',  '0%');\n";
			echo "	                    jqXHR.abort();  //取消上傳\n";
			echo "	              	  	tpl.fadeOut(function(){\n";
			echo "	             	       tpl.remove();\n";
			echo "	              		  });\n";
			echo "	            });\n";
			echo "	        },\n";
			echo "\n";
			echo "	        //單一檔案進度\n";
			echo "	        progress: function(e, data){\n";
			echo "	            var progress = parseInt(data.loaded / data.total * 100, 10);\n";
			echo "	            data.context.find('.pro').text(progress+'%　　').change();\n";
			echo "	            if(progress == 100){\n";
			echo "	                data.context.removeClass('working');\n";
			echo "	            }\n";
			echo "	        },\n";
			echo "\n";
			echo "			//整體進度\n";
			echo "			progressall: function (e, data) {\n";
			echo "				var progress = parseInt(data.loaded / data.total * 100, 10);\n";
			echo "				$('#progress .bar').css('width', progress + '%');\n";
			echo "				$('#progress .bar').text(progress + '%');\n";
			echo "			},\n";
			echo "\n";
			echo "	        //上傳失敗\n";
			echo "	        fail:function(e, data){\n";
			echo "	            data.context.addClass('error');\n";
			echo "	        },\n";
			echo "\n";
			echo "	        //單一檔案上傳完成\n";
			echo "	        done: function (e, data) {\n";
			echo "	        	var tmp = data.context.find('.pro').html();			\n";
			//echo "	        	console.log('單一檔案上傳完成',e, data);\n";
			//echo "	     		data.context.find('.pro').html(tmp + data.result.status + '　　' + '<img width=300 src=../../../files/ToursListPIC/PIC/' + data.result.show+ '></img>');\n";
			//echo "	     		data.context.find('.pro').html(tmp + data);\n";
			//echo "				console.log('ok2', data,data.status,data.show,data.var_dump); \n";
			echo "	        },\n";
			echo "\n";
			echo "	        //全部上傳完畢\n";
			echo "	        stop: function (e) {\n";
			echo "	        	alert('上傳完畢');\n";
			echo "	        	location.reload();\n";
			echo "			 \n";
			echo "			//--------------------		\n";
			echo "			//-------\n";
			echo "			}\n";
			echo "	    });\n";
			echo "	\n";
			echo "		//拖曳成功讓框變色\n";
			echo "		$('#drop').bind({\n";
			echo "		   	dragenter: function() {\n";
			echo "		   		$(this).addClass('active');\n";
			echo "		   	},\n";
			echo "			dragleave: function() {\n";
			echo "		   		$(this).removeClass('active');\n";
			echo "		   	}\n";
			echo "		});	\n";
			echo "	});\n";
			echo "	</script>\n";
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
		function AddHandle(&$Param){
			global $AddFieldsSQL,$AddValuesSQL;
			//判斷是否有上傳檔案
			$FileName = array();
			$FieldNameHiddenValue = array();
			if(is_array($_FILES[$this->FieldName]["size"])){ 
				$FilesNum = count($_FILES[$this->FieldName]["size"]);
				for($j=0;$j<$FilesNum;$j++){ 
					if($_FILES[$this->FieldName]["size"][$j] > 0){ 
						$FileName[] = ($_POST["FileName_".$this->FieldName]=="")?$_FILES[$this->FieldName]['name'][$j]:$_POST["FileName_".$this->FieldName];
						$FieldNameHiddenValueStr = FileHandleH5::Upload($_FILES[$this->FieldName],$this->FilePathArray[0],$_POST["FileName_".$this->FieldName],$j);
						$FieldNameHiddenValue[] = $FieldNameHiddenValueStr;
						$FieldName_FILENAME_Storage[] = pathinfo(($_FILES[$this->FieldName]['name'][$j]), PATHINFO_FILENAME );//儲存檔名
						$FieldName_BASENAME_Storage[] = pathinfo(($_FILES[$this->FieldName]['name'][$j]), PATHINFO_BASENAME );//儲存檔名+副檔名
						for($i=1;$i<count($this->FilePathArray);$i++){
							PICHandle::ImageResize($this->FilePathArray[0].$FieldNameHiddenValueStr, $this->FilePathArray[$i]."/".$FieldNameHiddenValueStr, $this->WidthArray[$i],$this->HeightArray[$i],$this->BoxMode[$i]);
						}
						PICHandle::ImageResize($this->FilePathArray[0].$FieldNameHiddenValueStr, $this->FilePathArray[0]."/".$FieldNameHiddenValueStr, $this->WidthArray[0],$this->HeightArray[0],$this->BoxMode[0]);
					}
				}
			}
			if($AddFieldsSQL!=""){
				$AddFieldsSQL.=",";
				$AddValuesSQL.=",";
			}
			$OtherParam = $Param;
			$Param = array();
			
			for($i=0;$i<count($FileName);$i++){
				$Param[$i] = $OtherParam;				
				$Param[$i][":".$this->FieldName] = $FileName[$i];
				$Param[$i][":".$this->FieldNameHidden] = $FieldNameHiddenValue[$i];
				if(is_array($this->FieldTitle)==true){
					for($i1=0;$i1<count($this->FieldTitle);$i1++){
						$Param[$i][":".$this->FieldTitle[$i1]] = $FieldName_FILENAME_Storage[$i];
					}
				}else{
					$Param[$i][":".$this->FieldTitle] = $FieldName_FILENAME_Storage[$i];	
				}				
			}
			if(is_array($this->FieldTitle)==true){
				for($i1=0;$i1<count($this->FieldTitle);$i1++){
				$Comma =( ($i1==0)?"":",");
					$AddFieldsSQL.="$Comma`".$this->FieldTitle[$i1]."`";
					$AddValuesSQL.="$Comma:".$this->FieldTitle[$i1];
				}
			}else{
				$AddFieldsSQL.="`".$this->FieldTitle."`";
				$AddValuesSQL.=":".$this->FieldTitle;
			}			
			$AddFieldsSQL.=",`".$this->FieldName."`";
			$AddFieldsSQL.=",`".$this->FieldNameHidden."`";
			$AddValuesSQL.=",:".$this->FieldName;
			$AddValuesSQL.=",:".$this->FieldNameHidden;
			if($this->TitleField!=""){
				if($AddFieldsSQL!=""){
					$AddFieldsSQL.=",";
					$AddValuesSQL.=",";
				}
				$AddFieldsSQL.="`".$this->TitleField."`";
				$AddValuesSQL.=":".$this->TitleField;
				for($i=0;$i<count($FileName);$i++){
					
					if($_POST[$this->TitleField]!=""){
						$Param[$i][":".$this->TitleField] = $_POST[$this->TitleField];
					}else{
						$Param[$i][":".$this->TitleField] = $FileName[$i];
					}
				}
			}
		}
		function ModifyHandle(&$Param){

			global $ModifySQL;
			
			if($_POST["file".$this->Num."_modify"]=="new"){
				//判斷是否有上傳檔案
				if($_FILES[$this->FieldName]["size"] > 0){
					$FileName = ($_POST["FileName_".$this->FieldName]=="")?$_FILES[$this->FieldName]['name']:$_POST["FileName_".$this->FieldName];
					$FieldNameHiddenValue = FileHandle::Upload($_FILES[$this->FieldName],$this->FilePathArray[0],$_POST["FileName_".$this->FieldName]);
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
				if($ModifySQL!=""){
					$ModifySQL.=",";
				}
				$Param[":".$this->FieldName] = $FileName;
				$Param[":".$this->FieldNameHidden] = $FieldNameHiddenValue;
				$ModifySQL.="`".$this->FieldName."`= :".$this->FieldName;
				$ModifySQL.=",`".$this->FieldNameHidden."`= :".$this->FieldNameHidden;
				if($this->TitleField!=""){
					$ModifySQL.="`".$this->TitleField."`= :".$this->TitleField;
					if($_POST[$this->TitleField]!=""){
						$Param[":".$this->TitleField] = $_POST[$this->TitleField];
					}else{
						$Param[":".$this->TitleField] = $FileName;
					}
				}
			}elseif($_POST["file".$this->Num."_modify"]=="del"){
				$DelFileName = $_POST["OldFile_".$this->FieldNameHidden];
				for($i=0;$i<count($this->FilePathArray);$i++){
					$DelFileNameResult = FileHandle::Delete($this->FilePathArray[$i],$DelFileName);
				}				
				$FileName = "";
				$FieldNameHiddenValue = "";
				if($ModifySQL!=""){
					$ModifySQL.=",";
				}
				$Param[":".$this->FieldName] = $FileName;
				$Param[":".$this->FieldNameHidden] = $FieldNameHiddenValue;
				$ModifySQL.="`".$this->FieldName."`= :".$this->FieldName;
				$ModifySQL.=",`".$this->FieldNameHidden."`= :".$this->FieldNameHidden;
				if($this->TitleField!=""){
					if($ModifySQL!=""){
						$ModifySQL.=",";
					}
					$Param[":".$this->TitleField] = "";
					$ModifySQL.="`".$this->TitleField."`= :".$this->TitleField;
				}
			}elseif($_POST["file".$this->Num."_modify"]=="modify"){
				if($this->TitleField!=""){
					if($ModifySQL!=""){
						$ModifySQL.=",";
					}
					$ModifySQL.="`".$this->TitleField."`= :".$this->TitleField;
					if($_POST["Title_".$this->TitleField]!=""){
						$Param[":".$this->TitleField] = $_POST["Title_".$this->TitleField];
					}else{
						$Param[":".$this->TitleField] = $Row[$this->FieldName];
					}
				}
			}
		}
		function GetDataHandle(&$data){
			// 不做任何事
		}
	}
?>