<?php
	class PICHandle{
		public static function ImageResize($from_filename, $save_filename, $in_width=300, $in_height=300, $BoxMode=true, $quality=100,$LogoView=false){
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
			$FinalWidth = $width;
			$FinalHeight = $height;

		
		
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
			
			if(is_file("mark2.png")){
				$ImgLogoObj = PICHandle::getImage("mark2.png");
				$FinalLogoWidth = $ImgLogoObj["width"];
				$FinalLogoHeight = $ImgLogoObj["height"];
				$ImgLogo = $ImgLogoObj["image"];
			}
			$new_width = $width;
			$new_height = $height;

			
			
			// 取得縮在此範圍內的比例
			//$percent = PICHandle::getResizePercent($width, $height, $in_width, $in_height);

			if($in_width != 0 || $in_height != 0){
				$do = false;
				if($in_width != 0 && $width>$in_width){$do = true;}
				if($in_height != 0 && $height>$in_height){$do = true;}
				if($do){
					if($in_width==0 || $in_height == 0 ){$BoxMode=false;}
					if($BoxMode){
						$WH = PICHandle::limitbox($width, $height, $in_width, $in_height);
						$new_width  = $WH[0];
						$new_height = $WH[1];
					
						$image_new = imagecreatetruecolor($new_width, $new_height);
						$image_newbox = imagecreatetruecolor($new_width-(2 * $WH[2]), $new_height-(2 * $WH[3]));
						//imagecopyresampled (目標圖,來源圖,載入到目標圖的X座標,載入到目標圖的Y座標,從來源圖的X座標,從來源圖的Y座標,縮放後寬度,縮放後高度,來源圖的縮放範圖_寬度,來源圖的縮放範圖_高度)
						$FinalWidth = $new_width;
						$FinalHeight = $new_height;
						imagecopyresampled($image_new, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
						imagecopyresampled($image_newbox, $image_new, 0, 0, $WH[2], $WH[3], $new_width-(2 * $WH[2]), $new_height-(2 * $WH[3]), $new_width-(2 * $WH[2]), $new_height-(2 * $WH[3]));
					}else{
						$WH = PICHandle::limit($width, $height, $in_width, $in_height);
						$new_width  = $WH[0];
						$new_height = $WH[1];

						$FinalWidth = $new_width;
						$FinalHeight = $new_height;						
						$image_newbox = imagecreatetruecolor($new_width, $new_height);
						
						
						imagecopyresampled($image_newbox, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
						
					}
				}else{

					$image_newbox = imagecreatetruecolor($width, $height);
					imagecopyresampled($image_newbox, $image, 0, 0, 0, 0, $width, $height, $width, $height);				
				}
			}else{
				$image_newbox = imagecreatetruecolor($width, $height);
				imagecopyresampled($image_newbox, $image, 0, 0, 0, 0, $width, $height, $width, $height);
			}
			if(is_file("mark2.png")){

				$WH = PICHandle::limit($FinalLogoWidth, $FinalLogoHeight, $FinalWidth , $FinalHeight);
				$FinalLogoWidth = $WH[0];
				$FinalLogoHeight = $WH[1];

				$FinalX = intval(($FinalWidth - $FinalLogoWidth) / 2);
				$FinalY = $FinalHeight - $FinalLogoHeight - 3 ;
			}
			
			
			switch ($sub_name) {
		    	case "jpg":
				case "jpeg":
					if(is_file("mark2.png")){
						imagecopyresampled($image_newbox, $ImgLogo, $FinalX, $FinalY, 0, 0, $FinalLogoWidth,$FinalLogoHeight,247,65);
					}
					return imagejpeg($image_newbox, $save_filename, 100);
					break;
				case "png":
					$image_newbox = imagecreatetruecolor($new_width, $new_height);
					imagealphablending($image_newbox, true);
					imagesavealpha($image_newbox, true);
					$trans_colour = imagecolorallocatealpha($image_newbox, 0, 0, 0, 127);
					imagefill($image_newbox, 0, 0, $trans_colour);
					imagecopyresampled($image_newbox, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
					if(is_file("mark2.png")){
						imagecopyresampled($image_newbox, $ImgLogo, $FinalX, $FinalY, 0, 0, $FinalLogoWidth,$FinalLogoHeight,247,65);
					}
					//ImageCopyResized($image_newbox, $image, 0,0, 0, 0, $new_width, $new_width, $width,  $height);
					return imagepng($image_newbox, $save_filename, 9);
					break;
				case "gif":
					if(is_file("mark2.png")){
						imagecopyresampled($image_newbox, $ImgLogo, $FinalX, $FinalY, 0, 0, $FinalLogoWidth,$FinalLogoHeight,247,65);
					}
					$image = imagegif($image_newbox, $save_filename, 100);
					break;
			}
		}
		
		public static function getImage($from_filename){
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
				$source_h = $source_h * $inside_w / $source_w;
				$source_w = $inside_w;
			}
			
			if($source_h > $inside_h){
				$source_w = $source_w * $inside_h / $source_h;
				$source_h = $inside_h;			
			}
			
			if($source_w < $inside_w){
				$source_h = $source_h * $inside_w / $source_w;
				$source_w = $inside_w;			
			}
			
			if($source_h < $inside_h){
				$source_w = $source_w * $inside_h / $source_h;
				$source_h = $inside_h;			
			}	
			
			$LeftPosition = ($source_w - $inside_w) /2;
			$TopPosition = ($source_h - $inside_h) /2;
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