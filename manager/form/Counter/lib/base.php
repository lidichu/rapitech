<?php
include_once("config/config.php");
include_once("config/system.php");
@error_reporting($conf['debug_level']);
@set_time_limit($conf['max_exec_time']);
include_once("Function.php");
?>