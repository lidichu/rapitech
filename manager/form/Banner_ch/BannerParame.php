<?php session_start(); ?>
<?php $Root = ""; ?>
<?php $SdbRoot="../../"; ?>
<?php $Check_FileName="Banner.php";	//有2功能,1:檢查權限用,2:使下面的程式超聯結本網頁?>
<?php

$ModName = "Banner管理";
// 標題設定
$Title01 = $ModName;

// 主頁檔案名稱
$MainFileName01 = "Banner.php";

// 修改頁檔案名稱
$ModifyFileName01 = "Banner_Add_Modify.php";

// 資料庫名稱
$DatabaseName01 = "banner_ch";
$DatabaseName01_S = "banner_ch";

// 上傳檔案路徑

/*
 * $UploadPic["PIC"]["Path"] = "../../../files/Banner/PIC/";
 * $UploadPic["PIC"]["Width"] = 1178;
 * $UploadPic["PIC"]["Height"] = 305;
 * $UploadPic["PIC"]["BoxMode"] = true;
 */
$UploadPic ["L"] ["Path"] = "../../../files/Banner/L/";
$UploadPic ["L"] ["Width"] = "2800";
$UploadPic ["L"] ["Height"] = "768";
$UploadPic ["L"] ["BoxMode"] = true;

/*
 * $UploadPic ["S"] ["Path"] = "../../../files/Banner/S/";
 * $UploadPic ["S"] ["Width"] = "700";
 * $UploadPic ["S"] ["Height"] = "220";
 * $UploadPic ["S"] ["BoxMode"] = true;
 */
?>