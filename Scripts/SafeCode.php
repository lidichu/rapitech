<?php
	//開啟Session功能
	session_start();
	//檔案類型
    Header("Content-type: image/PNG");
	//定義亂數字元
	$SafeCodeChar = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$SafeCodeCharLength = strlen($SafeCodeChar);
	//定義亂數字元數
	$SafeCodeLength = 4;
	//圖片寬度
	$PICWidth = 50;
	//圖片高度
	$PICHeight = 20;
	//驗證碼字串
	$SafeCode = "";
	//產生亂數
	for($i=1;$i<=$SafeCodeLength;$i++){
		$SafeCode .= substr($SafeCodeChar,mt_rand(0,($SafeCodeCharLength -1)),1);
	}

	//將亂數寫入Session
	$_SESSION["SafeCode"] = $SafeCode;
	//建立一張圖片
	$im=imagecreate($PICWidth,$PICHeight);
	//填入背景色
	$back=imagecolorallocate($im,0,0,0);
	//雜點顏色
	$pix=imagecolorallocate($im,0xF1,0xA9,0x98);
	//文字顏色
	$font=imagecolorallocate($im,255,255,255);
	//邊框顏色
	$border=imagecolorallocate($im,247,247,247);
	//加入文字 resource $image , int $font , int $x , int $y , string $string , int $color )
	imagestring($im, 5, 7, 2,$SafeCode, $font);
	//加入雜點
	/*
	for($i=0;$i <100;$i++){
		imagesetpixel($im,mt_rand(0,$PICWidth),mt_rand(0,$PICHeight),$pix);
	}
	*/
	//加入邊框
	imagerectangle($im,0,0,$PICWidth-1,$PICHeight-1,$border);
	//將圖片轉為png格式
	imagepng($im);
	//移除圖片物件
	imagedestroy($im);
 ?>
