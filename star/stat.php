<?php ob_start(); ?><?php
header('Content-type: text/css');
define('OS_UNKNOWN', 'Others');
define('BROWSER_UNKNOWN', 'Others');
include_once "../PageHead.php";
include_once "config/system.php";
include_once "config/config.php";
$visitpage = $_SERVER[HTTP_REFERER];
$visitip   = getIp();
$frompage = urldecode($_REQUEST["referrer"]);
if ($conf['avoid_refresh'] == true) {
    if (isset($HTTP_COOKIE_VARS['refresh_page']) && $HTTP_COOKIE_VARS['refresh_page'] == $visitpage) {
        exit();
    }
}
$browser   = getBrowserInfo();
$useros    = getOsInfo();
//查詢計數器內容
$Counter = myQueryDetail("web","datedb,recentdb,startdb") ;
if($Counter != ""){	//判斷是否為第一次	if($Counter["startdb"] == ""){		$notfirst = false;	}else{		$notfirst = true;	}	if($notfirst){		$statdate = getData($Counter["datedb"]);		$statsnap = $statdate['snap'];		$today     = getdate();		$lasttime  = $statsnap[6];		$nowtime   = time();		$statsnap[0]++;		if (date("Y-m-d H", $lasttime) == date("Y-m-d H", $nowtime)) {			$statsnap[4]++;			$statsnap[3]++;			$statsnap[2]++;			$statsnap[1]++;		} elseif (date("Y-m-d", $lasttime) == date("Y-m-d", $nowtime)) {			$statsnap[4]++;			$statsnap[3]++;			$statsnap[2]++;			$statsnap[1] = 1;		} elseif (date("Y-m", $lasttime) == date("Y-m", $nowtime)) {			$statsnap[4]++;			$statsnap[3]++;			if (date("Y-m-d", $nowtime-3600*24) == date("Y-m-d", $lasttime)) {				$statsnap[5] = $statsnap[2];			} else {				$statsnap[5] = 0;			}			$statsnap[2] = 1;			$statsnap[1] = 1;		} elseif (date("Y", $lasttime) == date("Y", $nowtime)) {
			$statsnap[4]++;
			$statsnap[3] = 1;
			$statsnap[2] = 1;
			$statsnap[1] = 1;
		} else {
			$lastyear = $statsnap[4];
			$statsnap[4] = 1;
			$statsnap[3] = 1;
			$statsnap[2] = 1;
			$statsnap[1] = 1;
		}

		$statsnap[6] = $nowtime;

		if ($statsnap[2] > $statsnap[8]) {
			$statsnap[8] = $statsnap[2];
			$statsnap[7] = date("Y-m-d");
		}
		if ($statsnap[3] > $statsnap[10]) {
			$statsnap[10] = $statsnap[3];
			$statsnap[9]  = date("Y-m");
		}

		// Update hour **********************************************************
		$stathour = $statdate['hour'];
		$stathour['all'][$today['hours']]++;
		$stathour['recent'][$today['hours']] = $statsnap[1];//小時

		// Update day **********************************************************
		$statday = $statdate['day'];
		$statday['all'][$today['mday']]++;
		$statday['recent'][$today['mday']] = $statsnap[2];//日

		// Update month **********************************************************
		$statmonth = $statdate['month'];
		$statmonth['all'][$today['mon']]++;
		$statmonth['recent'][$today['mon']] = $statsnap[3];//月

		// Update week **********************************************************
		$statweek = $statdate['week'];
		$statweek['all'][$today['wday']]++;
		$statweek['recent'][$today['wday']] = $statsnap[2];//周

		// Update year **********************************************************
		$statyear = $statdate['year'];
		if (isset($lastyear)) {
			array_push($statyear,1);
		} else {
			$statyear[count($statyear)-1] = $statsnap[4];//年
		}

		// Update browser **********************************************************
		$statbrowser = $statdate['browser'];
		if (isset($statbrowser[$browser])) {
			$statbrowser[$browser]++;
		} else {
			$statbrowser[$browser] = 1;//瀏覽器
		}

		// Update os **********************************************************
		$statuseros = $statdate['os'];
		if (isset($statuseros[$useros])) {
			$statuseros[$useros]++;
		} else {
			$statuseros[$useros] = 1;//作業系統
		}

		// 更新date.db **********************************************************
		$statdate['snap']     = $statsnap;
		$statdate['hour']     = $stathour;
		$statdate['day']      = $statday;
		$statdate['month']    = $statmonth;
		$statdate['week']     = $statweek;
		$statdate['year']     = $statyear;
		$statdate['browser']  = $statbrowser ;
		$statdate['os']       = $statuseros;

		setData("datedb", $statdate);

		// 更新recent.db **********************************************************
		$statrecent = getData($Counter["recentdb"]);
		$cur_click = array($nowtime, $visitip, $visitpage, $frompage);

		if (count($statrecent) > $conf['record_limit']) {
			array_splice($statrecent, $conf['record_limit']-1);
			array_unshift($statrecent, $cur_click);
		} elseif (count($statrecent) == $conf['record_limit']) {
			array_pop($statrecent);
			array_unshift($statrecent, $cur_click);
		} else {
			array_unshift($statrecent, $cur_click);
		}

		setData("recentdb", $statrecent);		
	}else{
		$today = getdate();
		$starttime = time();		$id = myExecSQL("Update web Set startdb = :starttime", $Params = array(			":starttime" => $starttime		));		$statsnap = array(1, 1, 1, 1, 1, 0, $starttime, date("Y-m-d"), 1, date("Y-m"), 1);		$hour_tmp = array();		for ($i=0; $i<24; $i++) {
			if ($i == $today['hours']) {
				$hour_tmp[] = 1;
			} else {
				$hour_tmp[] = 0;
			}
		}
		$stathour['recent']   = $hour_tmp;
		$stathour['all']      = $hour_tmp;

		$day_tmp = array();
		for ($i=1; $i<=31; $i++) {
			if ($i == $today['mday']) {
				$day_tmp[$i] = 1;
			} else {
				$day_tmp[$i] = 0;
			}
		}
		$statday['recent']   = $day_tmp;
		$statday['all']      = $day_tmp;

		$month_tmp = array();
		for ($i=1; $i<=12; $i++) {
			if ($i == $today['mon']) {
				$month_tmp[$i] = 1;
			} else {
				$month_tmp[$i] = 0;
			}
		}
		$statmonth['recent']   = $month_tmp;
		$statmonth['all']      = $month_tmp;

		$week_tmp = array();
		for ($i=0; $i<7; $i++) {
			if ($i == $today['wday']) {
				$week_tmp[] = 1;
			} else {
				$week_tmp[] = 0;
			}
		}
		$statweek['recent']   = $week_tmp;
		$statweek['all']      = $week_tmp;

		$statyear[] = 1;

		$statbrowser[$browser] = 1;
		$statuseros[$useros] = 1;

		$statdate['snap']     = $statsnap;
		$statdate['hour']     = $stathour;
		$statdate['day']      = $statday;
		$statdate['month']    = $statmonth;
		$statdate['week']     = $statweek;
		$statdate['year']     = $statyear;
		$statdate['browser']  = $statbrowser ;
		$statdate['os']       = $statuseros;
		setData("datedb", $statdate);
		$statrecent[] = array($starttime, $visitip, $visitpage, $frompage);
		setData("recentdb", $statrecent); //最新訪問記錄	
	}
}
//:~返回作業系統信息
function getOsInfo()
{
    $agent = $_SERVER['HTTP_USER_AGENT'];
     $os = false;
 
     if (eregi('win', $agent) && strpos($agent, '95'))
     {
       $os = 'Windows 95';
     }
     else if (eregi('win 9x', $agent) && strpos($agent, '4.90'))
     {
       $os = 'Windows ME';
     }
     else if (eregi('win', $agent) && ereg('98', $agent))
     {
       $os = 'Windows 98';
     }
     else if (eregi('win', $agent) && eregi('nt 6.0', $agent))
     {
       $os = 'Windows Vista';
     }
     else if (eregi('win', $agent) && eregi('nt 6.1', $agent))
     {
       $os = 'Windows 7';
     }
     else if (eregi('win', $agent) && eregi('nt 5.1', $agent))
     {
       $os = 'Windows XP';
     }
     else if (eregi('win', $agent) && eregi('nt 5', $agent))
     {
       $os = 'Windows 2000';
     }
     else if (eregi('win', $agent) && eregi('nt', $agent))
     {
       $os = 'Windows NT';
     }
     else if (eregi('win', $agent) && ereg('32', $agent))
     {
       $os = 'Windows 32';
     }
     else if (eregi('linux', $agent))
     {
       $os = 'Linux';
     }
     else if (eregi('unix', $agent))
     {
       $os = 'Unix';
     }
     else if (eregi('sun', $agent) && eregi('os', $agent))
     {
       $os = 'SunOS';
     }
     else if (eregi('ibm', $agent) && eregi('os', $agent))
     {
       $os = 'IBM OS/2';
     }
     else if (eregi('Mac', $agent) && eregi('PC', $agent))
     {
       $os = 'Macintosh';
     }
     else if (eregi('PowerPC', $agent))
     {
       $os = 'PowerPC';
     }
     else if (eregi('AIX', $agent))
     {
       $os = 'AIX';
     }
     else if (eregi('HPUX', $agent))
     {
       $os = 'HPUX';
     }
     else if (eregi('NetBSD', $agent))
     {
       $os = 'NetBSD';
     }
     else if (eregi('BSD', $agent))
     {
       $os = 'BSD';
     }
     else if (ereg('OSF1', $agent))
     {
       $os = 'OSF1';
     }
     else if (ereg('IRIX', $agent))
     {
       $os = 'IRIX';
     }
     else if (eregi('FreeBSD', $agent))
     {
       $os = 'FreeBSD';
     }
     else if (eregi('teleport', $agent))
     {
       $os = 'teleport';
     }
     else if (eregi('flashget', $agent))
     {
       $os = 'flashget';
     }
     else if (eregi('webzip', $agent))
     {
       $os = 'webzip';
     }
     else if (eregi('offline', $agent))
     {
       $os = 'offline';
     }
     else
     {
       $os = OS_UNKNOWN;
     }
     return $os;
}

//:~返回瀏覽器信息
function getBrowserInfo()
{
    global $_SERVER;
    $agent= $_SERVER['HTTP_USER_AGENT'];
    $browser= '';
    $browser_ver= '';
    if (preg_match('/OmniWeb\/(v*)([^\s|;]+)/i', $agent, $regs))
    {
         $browser='OmniWeb';
         $browser_ver= $regs[2];
    }
 
     if (preg_match('/Netscape([\d]*)\/([^\s]+)/i', $agent, $regs))
     {
         $browser='Netscape';
         $browser_ver= $regs[2];
     }
 
     if (preg_match('/safari\/([^\s]+)/i', $agent, $regs))
     {
         $browser='Safari';
         $browser_ver=$regs[1];
     }
 
     if (preg_match('/MSIE\s([^\s|;]+)/i', $agent, $regs))
     {
         $browser='Internet Explorer';
         $browser_ver= $regs[1];
     }
 
     if (preg_match('/Opera[\s|\/]([^\s]+)/i', $agent, $regs))
     {
         $browser='Opera';
         $browser_ver=$regs[1];
     }
 
     if (preg_match('/NetCaptor\s([^\s|;]+)/i', $agent, $regs))
     {
         $browser='(Internet Explorer ' .$browser_ver. ') NetCaptor';
         $browser_ver= $regs[1];
     }
 
     if (preg_match('/Maxthon/i', $agent, $regs))
     {
         $browser='(Internet Explorer ' .$browser_ver. ') Maxthon';
         $browser_ver='';
     }
 
     if (preg_match('/FireFox\/([^\s]+)/i', $agent, $regs))
     {
         $browser='FireFox';
         $browser_ver=$regs[1];
     }
 
     if (preg_match('/Lynx\/([^\s]+)/i', $agent, $regs))
     {
         $browser='Lynx';
         $browser_ver=$regs[1];
     }
 
     if ($browser != '')
     {
         return $browser.' '.$browser_ver;
     }
     else
     {
         return BROWSER_UNKNOWN;
     }
}

function getIp(){
	$ip = "Unknown";
	if($HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"]){
		$ip = $HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"];
	}elseif($HTTP_SERVER_VARS["HTTP_CLIENT_IP"]){
		$ip = $HTTP_SERVER_VARS["HTTP_CLIENT_IP"];
	}elseif ($HTTP_SERVER_VARS["REMOTE_ADDR"]){
		$ip = $HTTP_SERVER_VARS["REMOTE_ADDR"];
	}elseif (getenv("HTTP_X_FORWARDED_FOR")){
		$ip = getenv("HTTP_X_FORWARDED_FOR");
	}elseif (getenv("HTTP_CLIENT_IP")){
		$ip = getenv("HTTP_CLIENT_IP");
	}elseif (getenv("REMOTE_ADDR")){
		$ip = getenv("REMOTE_ADDR");
	}
	return $ip;
}
function getData($dbName)
{
	if($dbName == "")
	{
		return false;
	}else
	{
		return unserialize($dbName);
    }
}

function setData($dbName, $dbContent){    global $Conn;	$id = myExecSQL("Update web Set ".$dbName." = :dbContent", $Params = array(		":dbContent" => serialize($dbContent)	));
	return "";}?> <?php ob_flush(); ?>