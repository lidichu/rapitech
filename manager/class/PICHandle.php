<?php
	class PICHandle{
		public static function ImageResize($from_filename, $save_filename, $in_width=300, $in_height=300, $BoxMode=true, $quality=100,$LogoPath=""){
			$from_filename = FileHandle::GetPath($from_filename);
			$save_filename = FileHandle::GetPath($save_filename);
			//存檔路徑
			$SaveRoot = "";
			$ArrayPath = explode("/",$save_filename);
			for($i=0;$i<(count($ArrayPath)-1);$i++){
				$TargetRoot .= ($TargetRoot=="")?"":"/";
				$TargetRoot .= $ArrayPath[$i];
			}

			//確保存檔路徑一定存在
			CreatDir($TargetRoot);

			//允許處理的副檔名
			$allow_format = array('jpg','jpeg', 'png', 'gif');

			//縮放後大小
			if($in_width == ""){$in_width = 0; }
			if($in_height == ""){$in_height = 0; }

			//取得來源檔資訊
			$ImgLogoObj = PICHandle::getImage($from_filename);
			$width    = $ImgLogoObj['img_info']['0'];
			$height   = $ImgLogoObj['img_info']['1'];
			$imgtype  = $ImgLogoObj['img_info']['2'];
			$imgtag   = $ImgLogoObj['img_info']['3'];
			$bits     = $ImgLogoObj['img_info']['bits'];
			$channels = $ImgLogoObj['img_info']['channels'];
			$mime     = $ImgLogoObj['img_info']['mime'];
			$image = $ImgLogoObj["image"];
			//副檔名
			$temparry = explode('/', $mime);
			$sub_name = $temparry[1];

			//檢查是否為合法方副檔名
			if (!in_array(strtolower($sub_name), $allow_format)) { return false; }

			//檢查是否有要做圖片處理
			if($in_width != 0 || $in_height != 0){
				$Width_Over = false;
				$Height_Over = false;
				//檢查寬度是否超出
				if($in_width != 0 && $width>$in_width){ $Width_Over = true;}
				//檢查高度是否超出
				if($in_height != 0 && $height>$in_height){$Height_Over = true;}

				if($Width_Over || $Height_Over){
					//防呆，若寬高限制有一邊為 0 ，則不能執行裁圖模式
					if($in_width==0 || $in_height == 0 ){$BoxMode=false;}
					if($BoxMode){
						//取得縮放後圖片的大小與擷圖位置
						$WH = PICHandle::limitbox($width, $height, $in_width, $in_height);
						$new_width  = $in_width;
						$new_height = $in_height;
						// exit();
						//建立縮放後圖片
						$image_temp = PICHandle::CreateImage($sub_name,$WH[0], $WH[1]);
						imagecopyresampled($image_temp, $image, 0, 0, 0, 0, $WH[0], $WH[1], $width, $height);
						$width = $in_width;
						$height = $in_height;
						//建立
						$image_newbox = PICHandle::CreateImage($sub_name,$in_width, $in_height);
						imagecopyresampled($image_newbox, $image_temp, 0, 0, $WH[2], $WH[3], $in_width, $in_height, $in_width, $in_height);
						$image_newbox = PICHandle::PrintLogo($image_newbox,$in_width,$in_height,$LogoPath);
						PICHandle::SaveImage($sub_name,$image_newbox,$save_filename);
					}else{
						$WH = PICHandle::limit($width, $height, $in_width, $in_height);
						$new_width  = $WH[0];
						$new_height = $WH[1];
						$FinalWidth = $new_width;
						$FinalHeight = $new_height;
						$image_newbox = PICHandle::CreateImage($sub_name,$new_width, $new_height);
						imagecopyresampled($image_newbox, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
						$image_newbox = PICHandle::PrintLogo($image_newbox,$new_width,$new_height,$LogoPath);
						PICHandle::SaveImage($sub_name,$image_newbox,$save_filename);
					}
				}else{
					$image_newbox = PICHandle::CreateImage($sub_name,$width, $height);
					imagecopyresampled($image_newbox, $image, 0, 0, 0, 0, $width, $height, $width, $height);
					$image_newbox = PICHandle::PrintLogo($image_newbox,$width,$height,$LogoPath);
					PICHandle::SaveImage($sub_name,$image_newbox,$save_filename);
				}
			}else{
				$image_newbox = PICHandle::CreateImage($sub_name,$width, $height);
				imagecopyresampled($image_newbox, $image, 0, 0, 0, 0, $width, $height, $width, $height);
				$image_newbox = PICHandle::PrintLogo($image_newbox,$width,$height,$LogoPath);
				PICHandle::SaveImage($sub_name,$image_newbox,$save_filename);
			}

		}
		public static function PrintLogo($Image,$Width,$Height,$LogoPath){
			$LogoPath = FileHandle::GetPath($LogoPath);
			if(is_file($LogoPath)){
				$ImgLogoObj = PICHandle::getImage($LogoPath);
				$ImgLogo_Width = $FinalLogoWidth = $ImgLogoObj["width"];
				$ImgLogo_Height = $FinalLogoHeight = $ImgLogoObj["height"];
				$ImgLogo = $ImgLogoObj["image"];
				
				$WH = PICHandle::limit($FinalLogoWidth, $FinalLogoHeight, $Width , $Height);
				$FinalLogoWidth = $WH[0];
				$FinalLogoHeight = $WH[1];
				$FinalX = intval(($Width - $FinalLogoWidth) / 2);
				$FinalY = $Height - $FinalLogoHeight - 3 ;
				imagecopyresampled($Image, $ImgLogo, $FinalX, $FinalY, 0, 0, $FinalLogoWidth,$FinalLogoHeight,$ImgLogo_Width,$ImgLogo_Height);
			}
			return $Image;
		}
		
		
		public static function CreateImage($Sub_Name,$Width,$Height){
			
			if($Sub_Name == "png"){
				$newimage = imagecreatetruecolor($Width, $Height);
				imagealphablending($newimage, true);
				imagesavealpha($newimage, true);
				$trans_colour = imagecolorallocatealpha($newimage, 0, 0, 0, 127);
				imagefill($newimage, 0, 0, $trans_colour);
			}else{
				$newimage = imagecreatetruecolor($Width, $Height);
			}
			return $newimage;
		}

		public static function SaveImage($Sub_Name,$Image,$SavePath){
			$SavePath = FileHandle::GetPath($SavePath);
			switch ($Sub_Name) {
		    	case "jpg":
				case "jpeg":
					imagejpeg($Image, $SavePath, 100);
					break;
				case "png":
					imagepng($Image, $SavePath, 9);
					break;
				case "gif":
					$image = imagegif($Image, $SavePath, 100);
					break;
			}
		}

		public static function getImage($from_filename){
			$from_filename = FileHandle::GetPath($from_filename);
			$obj = array();
			$allow_format = array('jpg','jpeg', 'png', 'gif');
			$sub_name = $t = '';
			// Get new dimensions
			$img_info = getimagesize($from_filename);
			$width    = $img_info['0'];
			$height   = $img_info['1'];
			$imgtype  = $img_info['2'];
			$imgtag   = $img_info['3'];
			$bits     = $img_info['bits'];
			$channels = $img_info['channels'];
			$mime     = $img_info['mime'];
			if($in_width == ""){$in_width = 0; }
			if($in_height == ""){$in_height = 0; }
			list($t, $sub_name) = explode('/', $mime);
			$tmp = explode('/', $mime);
				//exit($from_filename);
			if (!in_array(strtolower($sub_name), $allow_format)) {
				return false;
			}
			$obj["width"] = $width ;
			$obj["height"] = $height ;
			switch ($sub_name) {
		    	case "jpg":
				case "jpeg":
					$image = imagecreatefromjpeg($from_filename);
					break;
				case "png":
					$image = imagecreatefrompng($from_filename);
					imagesavealpha($image, true);
					imageAlphaBlending($image, false);
    				imageSaveAlpha($image, true);
					break;
				case "gif":
					$image = imagecreatefromgif($from_filename);
					break;
			}

			$obj["image"] = $image ;
			$obj["img_info"] = $img_info ;
			
			return $obj;
		}

		public static function limit($source_w, $source_h, $inside_w, $inside_h){
			//判斷寬廣是否相符
			$WidthLike = true;
			$HeightLike = true;
			if($inside_w != 0 && $source_w != $inside_w){$WidthLike = false;}
			if($inside_h != 0 && $source_h != $inside_h){$HeightLike = false;}
			if($WidthLike && $HeightLike){
				$WH[0] = $source_w;
				$WH[1] = $source_h;
				return $WH;
			}
			//需調整
			if($inside_w != 0 && $source_w > $inside_w){
				$source_h = intval($source_h * $inside_w / $source_w);
				$source_w = $inside_w;
			}

			if($inside_h !=0 && $source_h > $inside_h){
				$source_w = intval($source_w * $inside_h / $source_h);
				$source_h = $inside_h;
			}
			$WH[0] = $source_w;
			$WH[1] = $source_h;
			return $WH;
		}

		public static function limitbox($source_w, $source_h, $inside_w, $inside_h){
			if($source_w > $inside_w){
				$source_h = intval($source_h * $inside_w / $source_w);
				$source_w = $inside_w;
			}

			if($source_h > $inside_h){
				$source_w = intval($source_w * $inside_h / $source_h);
				$source_h = $inside_h;
			}

			if($source_w < $inside_w){
				$source_h = intval($source_h * $inside_w / $source_w);
				$source_w = $inside_w;
			}

			if($source_h < $inside_h){
				$source_w = intval($source_w * $inside_h / $source_h);
				$source_h = $inside_h;
			}

			$LeftPosition = intval(($source_w - $inside_w) /2);
			$TopPosition = intval(($source_h - $inside_h) /2);


			$WH[0] = $source_w;
			$WH[1] = $source_h;
			$WH[2] = $LeftPosition;
			$WH[3] = $TopPosition;

			return $WH;
		}

		public static function getResizePercent($source_w, $source_h, $inside_w, $inside_h){
			if ($source_w < $inside_w && $source_h < $inside_h) {
				return 1; // Percent = 1, 如果都比預計縮圖的小就不用縮
			}

			$w_percent = $inside_w / $source_w;
			$h_percent = $inside_h / $source_h;

			return ($w_percent > $h_percent) ? $h_percent : $w_percent;
		}
	}
?>