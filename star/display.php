<?php
	//查詢計數器內容
	$SQL = "Select datedb,recentdb,startdb From web";
	$Rs_Counter = mysql_query($SQL,$Conn);
	if($Rs_Counter && mysql_num_rows($Rs_Counter) > 0)
	{
	
		$Counter = mysql_fetch_array($Rs_Counter);
		if($Counter["datedb"] != ""){
			$statdate = unserialize($Counter["datedb"]);
			$statsnap = $statdate['snap'];
			$vtotal     = $statsnap[0];
			$vthismonth = $statsnap[3];
			$vtoday     = $statsnap[2];
			$vyesterday = $statsnap[5];
			$now = gmdate('D, d M Y H:i:s') . ' GMT';
			
			$Web["Counter"] = array(total => $vtotal,Month=> $vthismonth,today=>$vtoday ,yesterday=>$vyesterday);		
		}else{
			$Web["Counter"] = array(total => "1",Month=> "1",today=>"1" ,yesterday=>"1");
		}
	}
?>