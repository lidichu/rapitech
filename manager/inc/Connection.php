<?php
session_start ();
/* 資料庫連結設定 */
$DbHost = "localhost";
$DbName = "spdgadmin";
$DbUser = "root";
$DbPwd = "";
date_default_timezone_set ( "Asia/Taipei" );
$dsn = "mysql:host=" . $DbHost . ";dbname=" . $DbName;
try {
	$Conn = new PDO ( $dsn, $DbUser, $DbPwd );
} catch ( PDOException $e ) {
	echo 'Connection failed: ' . $e->getMessage ();
}
$Conn->exec ( "SET CHARACTER SET utf8" );
$Conn->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
// 防止網頁過期
header ( "Cache-control: private" );
$VisualRoot = "";
$i = 0;
if (! defined ( 'VisualRoot' )) {
	if (! isset ( $VisualRoot )) {
		$VisualRoot = '';
	}
	// 抓取根目錄位置
	while ( is_file ( $VisualRoot . "PageHead.php" ) == false ) {
		if ($i >= 5) {
			break;
		}
		$i ++;
		$VisualRoot .= '../';
	}
	define ( 'VisualRoot', $VisualRoot );
}
?>