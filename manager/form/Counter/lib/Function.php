<?php
function getFormData($var, $default = null)
{
    if (isset($_POST[$var])) {
        return $_POST[$var];
    } elseif (isset($_GET[$var])) {
        return $_GET[$var];
    } else {
        return $default;
    }
}

function cycle()
{
    global $cycleArray;
    if (!isset($cycleArray['index'])) {
        $cycleArray['index'] = 0;
    }
    if ($cycleArray['index'] > count($cycleArray['cycle']) -1) {
        $cycleArray['index'] = 0;
    }
    echo $cycleArray['cycle'][$cycleArray['index']];
    $cycleArray['index']++;
}

//:~返回位置信息
function getLocationInfo($ip)
{
    $ipa = split("[\.]",$ip);
    $ips = $ipa[0]*1000000000+$ipa[1]*1000000+$ipa[2]*1000+$ipa[3];
    $ipa[0] = intval($ipa[0]);

    if (file_exists("ipdata/$ipa[0].txt")) {
        $datafile = "ipdata/$ipa[0].txt";
    } else {
        $datafile = "ipdata/other.txt";
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
    if (strpos($location, "Unknow") !== false || $location == "") {
        $location = LOC_UNKNOWN;
    }
    return $location;
}

?>