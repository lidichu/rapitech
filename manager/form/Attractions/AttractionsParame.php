<?php session_start(); ?>
<?php $Root = ""; ?>
<?php $SdbRoot="../../"; ?>
<?php

include_once ("Mod_Data.php"); // 載入參數檔
?>
<?php $Check_FileName=$Menu_File;	//有2功能,1:檢查權限用,2:使下面的程式超聯結本網頁?>
<?php

$Title01 = $ModName;
$Title02_1 = $ModName . " - " . $ModName2_1;
$Title02_2 = $ModName . " - " . $ModName2_2;

$UploadPic ["PIC"] ["Path"] = "../../../files/Attractions/L/";
$UploadPic ["PIC"] ["Width"] = "480";
$UploadPic ["PIC"] ["Height"] = "320";
$UploadPic ["PIC"] ["BoxMode"] = true;
?>

