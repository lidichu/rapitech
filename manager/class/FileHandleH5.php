<?php
	class FileHandleH5{
		public static function Upload($FileObj,$FileRoot,$FileName,$Index){
			// 存入暫存區的檔名
			$FileRoot = FileHandleH5::GetPath($FileRoot);
			// $FileObj['tmp_name']
			
			
			
			CreatDir($FileRoot);
			$File_tmp = $FileObj['tmp_name'][$Index];
			//判斷欄位是否指定上傳檔案…
			// if(is_uploaded_file($File_tmp)){
				// echo($FileObj['tmp_name']."AAA");
			// }else{
				// echo("AAAA".$FileObj['tmp_name']."AAAB");
			// }
			
			// exit();
			if(is_uploaded_file($File_tmp)){
				//如果沒有輸入檔名，則用物件原來的檔名
				if($FileName==""){$FileName=$FileObj['name'][$Index];}
				//將檔名空白部分取代為'_'
				$FileName = str_replace(' ', '_', $FileName);
				//一律改為以日期時間命名
				$ExtendName = strtolower(FileHandleH5::GetExtendName($FileName));
				
				if(strrpos($ExtendName,'php') === false){
					if(FileHandleH5::GetExtendName($FileName)!=""){
						$FileName = date("Ymdhis").str_pad(rand(1, 99999),5,"0",STR_PAD_LEFT).".".FileHandleH5::GetExtendName($FileName);	
					}else{
						$FileName = date("Ymdhis").str_pad(rand(1, 99999),5,"0",STR_PAD_LEFT);
					}
					//查看此檔名是否已存在，若存在，則產生新檔案名稱	
					$NewFileName = FileHandleH5::MakeFile($FileRoot,$FileName);
					if(!@move_uploaded_file($File_tmp,iconv("utf-8", "big5",$FileRoot.$NewFileName))){
						//move_uploaded_file() 不能處理 utf-8 中文編碼，需利用 iconv() 函數作轉碼
						echo "檔案：".$FileName."上傳失敗";
						return "";
					}else{
						return $NewFileName;
					}
				}else{
					notify("檔案：".$FileName."上傳失敗",'','window.history.back()');
					return "";
				}
			}else{
				return "";
			}
		}
		public static function GetPath($FileRoot){
			$PathTemp = "";
			$PathArray = explode("/",$FileRoot);
			for($i=0;$i<(count($PathArray) - 1);$i++){
				switch($PathArray[$i]){
					case "files0":
						$PathTemp = files0."/";
						break;
					case "files1":
						$PathTemp = files1."/";
						break;
					case "files2":
						$PathTemp = files2."/";
						break;
					case "":
						break;
					default:
						$PathTemp .= $PathArray[$i]."/";
						break;
				}
			}
			$LastDir = $PathArray[(count($PathArray) - 1)];
			if($LastDir != ""){
				$PathTemp .= $LastDir;
			}
			return $PathTemp;
		}
		public static function CheckFileExists($FileRoot){
			$FileRoot = FileHandleH5::GetPath($FileRoot);
			if(is_file($FileRoot)){
				return true;
			}else{
				return false;
			}
		}
		
		public static function Delete($FileRoot,$FileName){
			$FileRoot = FileHandleH5::GetPath($FileRoot);
			if($FileName!=""){
				if(@fopen(iconv("utf-8", "big5",$FileRoot.$FileName),"rb")){
					if(!(@unlink(iconv("utf-8", "big5",$FileRoot.$FileName)))){
						echo "檔案：".$FileName."刪除失敗";
						return $FileName;
					}else{
						return "";	
					}
				}
			}
		}
		
		public static function Move($SourceFolder,$SourceFileName,$TargetFolder,$CheckFileName=false){
			$SourceFolder = FileHandleH5::GetPath($SourceFolder);
			$SourceFileName = FileHandleH5::GetPath($SourceFileName);
		
			CreatDir($TargetFolder);
			$NewFileName = "";
			if($CheckFileName){
				//一律改為以日期時間命名
				if(FileHandleH5::GetExtendName($SourceFileName)!=""){
					$FileName = date("Ymdhis",time()+8*60*60).".".FileHandleH5::GetExtendName($SourceFileName);
				}else{
					$FileName = date("Ymdhis",time()+8*60*60);
				}
				//查看此檔名是否已存在，若存在，則產生新檔案名稱	
				$NewFileName = FileHandleH5::MakeFile($TargetFolder,$FileName);
			}
			copy($SourceFolder.$SourceFileName,$TargetFolder.$NewFileName);
			FileHandleH5::Delete($SourceFolder,$SourceFileName);
			$NewFileName = ($NewFileName == "")?$SourceFileName:$NewFileName;
			return $NewFileName;
		}
		
		//取得副檔名
		public static function GetExtendName($FileName){
			$RtnVal = "";
			if(strrpos($FileName,".")!=false){
				$RtnValArray = explode(".", $FileName);
				$RtnVal = $RtnValArray[count($RtnValArray) - 1];
			}
			return $RtnVal;
		}
		
		//取得除副檔名之外的名稱
		public static function GetFileName($FileName){
			if(strrpos($FileName,".")!=false){
				$RtnValArray = explode(".", $FileName);
				$RtnVal = "";
				for($i=0;$i<=count($RtnValArray)-2;$i++){
					$RtnVal .= $RtnValArray[$i];
					if($i!=count($RtnValArray)-2){$RtnVal .=".";}
				}
			}
			return $RtnVal;
		}		
		
		public static function MakeFile($TargetFilePath,$TargetFileName){
			$TargetFilePath = FileHandleH5::GetPath($TargetFilePath);
			$MakeFileSuccess = false;
			$MakeFileFlag = 0 ;
			$FileExtendName = FileHandleH5::GetExtendName($TargetFileName);
			$FileSourceName = FileHandleH5::GetFileName($TargetFileName);
			$FileSourceNameO = floatval($FileSourceName);
			while(!$MakeFileSuccess){
				if($MakeFileFlag > 0){
					$FileSourceName = $FileSourceNameO + $MakeFileFlag;
					$TestResult = file_exists(iconv("utf-8", "big5",$TargetFilePath.$FileSourceName.".".$FileExtendName));
				}else{
					$TestResult = file_exists(iconv("utf-8", "big5",$TargetFilePath.$FileSourceName.".".$FileExtendName));
				}
				if(!$TestResult){
					if($MakeFileFlag > 0){
						return 	$FileSourceName."(".$MakeFileFlag.").".$FileExtendName;
					}else{
						return 	$FileSourceName.".".$FileExtendName;
					}
					$MakeFileSuccess = true;
				}else{
					$MakeFileFlag++;
				}
			}
		}
		
		//檔案下載
		public static function Downloadfile($file,$filename){
			$file = FileHandleH5::GetPath($file);
			// Must be fresh start
			$filename = mb_convert_encoding($filename, 'BIG-5','UTF-8');
			if( headers_sent()){die('Headers Sent');}
			// Required for some browsers
			if(ini_get('zlib.output_compression')){ini_set('zlib.output_compression', 'Off');}

			// File Exists?
			if( file_exists($file) ){
				// Parse Info / Get Extension
				$fsize = filesize($file);
				$path_parts = pathinfo($file);
				$ext = strtolower($path_parts["extension"]);

				// Determine Content Type
				switch ($ext) {
					case "pdf": $ctype="application/pdf"; break;
					case "exe": $ctype="application/octet-stream"; break;
					case "zip": $ctype="application/zip"; break;
					case "doc": $ctype="application/msword"; break;
					case "xls": $ctype="application/vnd.ms-excel"; break;
					case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
					case "gif": $ctype="image/gif"; break;
					case "png": $ctype="image/png"; break;
					case "jpeg":
					case "jpg": $ctype="image/jpg"; break;
					case "php": die('File Not Found'); break;
					default: $ctype="application/force-download";
				}

				header("Pragma: public"); // required
				header("Expires: 0");
				header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
				header("Cache-Control: private",false); // required for certain browsers
				header("Content-Type: $ctype");
				header("Content-Disposition: attachment; filename=\"".$filename."\";" );
				header("Content-Transfer-Encoding: binary");
				header("Content-Length: ".$fsize);
				ob_clean();
				flush();
				// 讀取來源檔案資料
				if ($stream = fopen($file, 'rb')){
					while(!feof($stream) && connection_status() == 0){
						echo(fread($stream,1024*8));
						flush();
					}
					fclose($stream);
				}							
			}else{
				die('File Not Found');
			}
		}
		// 判斷是否可以上傳
		public static function isImage($filename){
			$filename = FileHandleH5::GetPath($filename);
			// 定義可以上傳圖片類型
			$types = '.jpg|.gif|.jpeg|.png|.bmp';
			if(file_exists($filename)){
				$info = getimagesize($filename);
				$ext = strtolower(image_type_to_extension($info['2']));
				return stripos($types,$ext);
			}else{
				return false;
			}
		}
		
		//刪除資料夾
		public static function Deltree($dir){
			$dir = FileHandleH5::GetPath($dir);
			if(is_dir($dir)){
				$TrackDir = opendir($dir);
				while ($file = readdir($TrackDir)){
					if (!($file == "." || $file == "..")){
						if(is_dir($dir.$file)){
							FileHandleH5::Deltree($dir.$file.'/');
						}else if(is_file($dir.$file)){
							unlink($dir.$file);
						}
					}	
				}
				closedir($TrackDir);
				rmdir($dir);
			}
		}
	}
?>