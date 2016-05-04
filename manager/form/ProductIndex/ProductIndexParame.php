<?php session_start(); ?>
<?php $Root = ""; ?>
<?php $SdbRoot="../../"; ?>
<?php $_SESSION["check_fileName"]="ProductIndex.php";	//有2功能,1:檢查權限用,2:使下面的程式超聯結本網頁?>
<?php
//標題設定
	$Title01 = "首頁產品";

//主頁檔案名稱
	$MainFileName01 = "ProductIndex.php";

//修改頁檔案名稱
	

//資料庫名稱
	$DatabaseName01 = "product";
	$DatabaseName01_S = "(Select A.*,B.Category From product as A,productcategory as B Where A.G0 = B.SerialNo) as Prd_View";
	
//上傳檔案路徑
	$UploadPic["Source"]["Root"] = "../../../files/Product/PICSource/";
	$UploadPic["Source"]["Width"] = "";
	$UploadPic["Source"]["Height"] = "";
	
	$UploadPic["Big"]["Root"] = "../../../files/Product/PICBig/";
	$UploadPic["Big"]["Width"] = 800;
	$UploadPic["Big"]["Height"] = "";
	
	$UploadPic["Index"]["Root"] = "../../../files/Product/PICIndex/";
	$UploadPic["Index"]["Width"] = 187;
	$UploadPic["Index"]["Height"] = 141;
	
	$UploadPic["List"]["Root"] = "../../../files/Product/PICList/";
	$UploadPic["List"]["Width"] = 140;
	$UploadPic["List"]["Height"] = 106;
	
	$UploadPic["Detail"]["Root"] = "../../../files/Product/PICDetail/";
	$UploadPic["Detail"]["Width"] = 350;
	$UploadPic["Detail"]["Height"] = 264;
?>

