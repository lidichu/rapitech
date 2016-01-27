<?php
function quotes($content){
	//如果magic_quotes_gpc=Off，那麽就開始處理
	if (!get_magic_quotes_gpc()) {
		//判斷$content是否爲陣列
		if (is_array($content)) {
			//如果$content是陣列，那麽就處理它的每一個單無
			foreach ($content as $key=>$value) {
				if (is_array($value)){
					foreach ($value as $key1=>$value1) {
						$content[$key][$key1] = addslashes($value1);
					}
				}else{
					$content[$key] = addslashes($value);
				}
			}
		}else{
			//如果$content不是陣列，那麽就僅處理一次
			addslashes($content);
		}
	} else {
		//如果magic_quotes_gpc=On，那麽就不處理
	}
	//返回$content
	return $content;
}
function CheckData($value){
	if(isset($value)){
		$value=str_replace(chr(13).chr(10),"<br />",$value);
		// $value=mysql_real_escape_string(myStripslashes($value));
		return $value;
	}else{
		return "";
	}
}
function myStripslashes($value){
	if(get_magic_quotes_gpc())
	$value=stripslashes($value);
	return $value;
}
//不分大小寫取得$_GET值
function Request_Get($Name){
    if(is_array($_GET)){
        foreach($_GET as $key=>$value){
            if(strtolower($key)==strtolower($Name)){
                return $value;
            }
        }
    }
    return "";
}
?>