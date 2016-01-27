<?php

define('LOC_UNKNOWN', '未知地區');
define('OS_UNKNOWN', 'Others');
define('BROWSER_UNKNOWN', 'Others');

function setData($dbName, $dbContent)
{
    global $datadir;
    $oFile = fopen($datadir . $dbName, 'w');
    flock($oFile, 3);
    fwrite($oFile, $dbContent);
    fclose($oFile);
}


//:~返回作業系統信息
function getOsInfo()
{
    global $HTTP_SERVER_VARS;
    $os = "";
    $Agent = $HTTP_SERVER_VARS["HTTP_USER_AGENT"];

    if (eregi('win',$Agent) && strpos($Agent, '95')) {
        $os = "Windows 95";
    } elseif (eregi('win 9x',$Agent) && strpos($Agent, '4.90')) {
        $os = "Windows ME";
    } elseif (eregi('win',$Agent) && ereg('98',$Agent)) {
        $os = "Windows 98";
    } elseif (eregi('win',$Agent) && eregi('nt 5.1',$Agent)) {
        $os = "Windows XP";
    } elseif (eregi('win',$Agent) && eregi('nt 5',$Agent)) {
        $os = "Windows 2000";
    } elseif (eregi('win',$Agent) && eregi('nt',$Agent)) {
        $os = "Windows NT";
    } elseif (eregi('win',$Agent) && ereg('32',$Agent)) {
        $os = "Windows 32";
    } elseif (eregi('linux',$Agent)) {
        $os = "Linux";
    } elseif (eregi('unix',$Agent)) {
        $os = "Unix";
    } elseif (eregi('sun',$Agent) && eregi('os',$Agent)) {
        $os = "SunOS";
    } elseif (eregi('ibm',$Agent) && eregi('os',$Agent)) {
        $os = "IBM OS/2";
    } elseif (eregi('Mac',$Agent) && eregi('PC',$Agent)) {
        $os = "Macintosh";
    } elseif (eregi('PowerPC',$Agent)) {
        $os = "PowerPC";
    } elseif (eregi('AIX',$Agent)) {
        $os = "AIX";
    } elseif (eregi('HPUX',$Agent)) {
        $os = "HPUX";
    } elseif (eregi('NetBSD',$Agent)) {
        $os = "NetBSD";
    } elseif (eregi('BSD',$Agent)) {
        $os = "BSD";
    } elseif (ereg('OSF1',$Agent)) {
        $os = "OSF1";
    } elseif (ereg('IRIX',$Agent)) {
        $os = "IRIX";
    } elseif (eregi('FreeBSD',$Agent)) {
        $os = "FreeBSD";
    }
    if ($os == '') $os = OS_UNKNOWN;
    return $os;
}

//:~返回瀏覽器信息
function getBrowserInfo()
{
    global $HTTP_SERVER_VARS;

    $browser = "";
    $browserver = "";
    $Browsers = array("Lynx","MOSAIC","AOL","Opera","JAVA","MacWeb","WebExplorer","OmniWeb");
    $Agent = $HTTP_SERVER_VARS["HTTP_USER_AGENT"];

    for ($i=0,$sum=count($Browsers); $i<$sum; $i++) {
        if (strpos($Agent,$Browsers[$i])) {
            $browser = $Browsers[$i];
            $browserver = "";
        }
    }
    if (ereg("Mozilla",$Agent) && !ereg("MSIE",$Agent)) {
        $temp = explode("(", $Agent); $Part=$temp[0];
        $temp = explode("/", $Part); $browserver=$temp[1];
        $temp = explode(" ",$browserver); $browserver=$temp[0];
        $browserver =preg_replace("/([\d\.]+)/","\\1",$browserver);
        $browserver = " $browserver";
        $browser = "Netscape Navigator";
    }
    if (ereg("Mozilla",$Agent) && ereg("Opera",$Agent)) {
        $temp = explode("(", $Agent); $Part=$temp[1];
        $temp = explode(")", $Part); $browserver=$temp[1];
        $temp = explode(" ",$browserver);$browserver=$temp[2];
        $browserver =preg_replace("/([\d\.]+)/","\\1",$browserver);
        $browserver = " $browserver";
        $browser = "Opera";
    }
    if (ereg("Mozilla",$Agent) && ereg("MSIE",$Agent)) {
        $temp = explode("(", $Agent); $Part=$temp[1];
        $temp = explode(";",$Part); $Part=$temp[1];
        $temp = explode(" ",$Part);$browserver=$temp[2];
        $browserver = preg_replace("/([\d\.]+)/","\\1",$browserver);
        $browserver = " $browserver";
        $browser = "Internet Explorer";
    }
    if ($browser != "") {
        $browseinfo = "$browser$browserver";
    } else {
        $browseinfo = BROWSER_UNKNOWN;
    }
    return $browseinfo;
}

//:~返回位置信息
function getLocationInfo($ip)
{
    $ipa = split("[\.]",$ip);
    $ips = $ipa[0]*1000000000+$ipa[1]*1000000+$ipa[2]*1000+$ipa[3];
    $ipa[0] = intval($ipa[0]);

    if (file_exists(STAT_BASE . "/ipdata/$ipa[0].txt")) {
        $datafile = STAT_BASE . "/ipdata/$ipa[0].txt";
    } else {
        $datafile = STAT_BASE . "/ipdata/other.txt";
    }

    $from1 = "";
    $from2 = "";
    $location = "";
    $ipdata=file($datafile);

    for ($i=0, $sum=count($ipdata); $i<$sum; $i++) {
        $ipb=split("[\_]",$ipdata[$i]);
        $from1 = $ipb[4];
        $from2 = $ipb[6];
        $ipc = split("[\.]",$ipb[0]);
        $ipd = split("[\.]",$ipb[2]);
        $ipbegin = $ipc[0]*1000000000+$ipc[1]*1000000+$ipc[2]*1000+$ipc[3];
        $ipend = $ipd[0]*1000000000+$ipd[1]*1000000+$ipd[2]*1000+$ipd[3];

        if (($ips <= $ipend) && ($ips >= $ipbegin)) {
            $location  = $from1.$from2;
            break;
        }
    }
    if (strpos($location, "Unknow") !== false) {
        $location = LOC_UNKNOWN;
    }
    return $location;
}

?>