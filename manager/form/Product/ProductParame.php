<?php session_start(); ?>
<?php $Root = ""; ?>
<?php $SdbRoot="../../"; ?>
<?php $_SESSION["check_fileName"]="Product.php";	//有2功能,1:檢查權限用,2:使下面的程式超聯結本網頁?>
<?php
//標題設定
	$Title01 = "產品分類";
	$Title02 = "產品";

//主頁檔案名稱
	$MainFileName01 = "ProductCategory.php";
	$MainFileName02 = "Product.php";

//修改頁檔案名稱
	$ModifyFileName01 = "ProductCategory_Add_Modify.php";
	$ModifyFileName02 = "Product_Add_Modify.php";

//資料庫名稱
	$DatabaseName01 = "productcategory";
	$DatabaseName01_S = "productcategory";
	$DatabaseName02 = "product";
	$DatabaseName02_S = "product";

//上傳檔案路徑
	$UploadPic["Source"]["Root"] = "../../../files/Product/PICSource/";
	$UploadPic["Source"]["Width"] = "";
	$UploadPic["Source"]["Height"] = "";
	
	$UploadPic["Big"]["Root"] = "../../../files/Product/PICBig/";
	$UploadPic["Big"]["Width"] = 800;
	$UploadPic["Big"]["Height"] = "";
	
	$UploadPic["Index"]["Root"] = "../../../files/Product/PICIndex/";
	$UploadPic["Index"]["Width"] = 400;
	$UploadPic["Index"]["Height"] = 400;
	
	$UploadPic["List"]["Root"] = "../../../files/Product/PICList/";
	$UploadPic["List"]["Width"] = 400;
	$UploadPic["List"]["Height"] = 400;
	
	$UploadPic["Detail"]["Root"] = "../../../files/Product/PICDetail/";
	$UploadPic["Detail"]["Width"] = 800;
	$UploadPic["Detail"]["Height"] = 603;
?>

