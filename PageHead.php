<?php extract($_GET); ?>
<?php

define ( 'APP_PATH', str_replace ( '\\', '/', dirname ( __FILE__ ) ) );
include_once (APP_PATH . '/manager/inc/Connection.php');
include_once (APP_PATH . '/manager/inc/Fun.php');
include_once (APP_PATH . '/manager/inc/JSon.php');
include_once (APP_PATH . '/manager/class/FileHandle.php');
include_once (APP_PATH . '/manager/class/PICHandle.php');
include_once (APP_PATH . '/Common/MyError.php');
$json = new Services_JSON ( SERVICES_JSON_LOOSE_TYPE );
// 查詢網站資訊
$Web = array ();
$SQL = "Select * From web where true";
$Web = $Conn->query ( $SQL )->fetch ( PDO::FETCH_ASSOC );
include_once ($VisualRoot . "star/display.php");

$title = $Web ["WebTitle" . $lang];
$keywords = $Web ["Keywords" . $lang];
$copyright = $Web ["Copyright" . $lang];
$description = $Web ["Description" . $lang];
$address = $Web["WebAddress". $lang];
$tel = $Web["WebTel". $lang];
$email = $Web["ManagerEmail". $lang];
$Fax = $Web["WebFax". $lang];
$time = $Web["WebTime". $lang];

?>
<link rel="shortcut icon" href="images/favicon.png">