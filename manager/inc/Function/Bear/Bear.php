<?php
function post($url, $post = null) 
{ 
    $context = array(); 
    if (is_array($post)) 
    { 
        ksort($post); 
        $context['http'] = array 
        ( 
            'method' => 'post', 
            'content' => http_build_query($post, '', '&'), 
        ); 
    } 
 
    return file_get_contents($url, false, stream_context_create($context)); 
}  
function CreateOptionFromTable($ValueField,$TitleField,$TableName,$OtherStr,$defaultVal){
	global $Conn;
	$SQL="Select ".$ValueField.",".$TitleField." From " . $TableName . $OtherStr;
	$Rs = $Conn->query($SQL);
	$Rs->execute();
	while($Row = $Rs->fetch(PDO::FETCH_ASSOC)){
		if(strtolower($Row[$ValueField])==strtolower($defaultVal)){
			echo('<option value="' . $Row[$ValueField] . '" selected="selected">' . $Row[$TitleField] . '</option>');
		}else{
			echo('<option value="' . $Row[$ValueField] . '">' . $Row[$TitleField] . '</option>');
		}
	}
}

function CreateOptionFromTable2($ValueFieldSelect,$TitleFieldSelect,$ValueField,$TitleField,$TableName,$OtherStr,$defaultVal){
	global $Conn;
	$SQL="Select ".$ValueFieldSelect.",".$TitleFieldSelect." From " . $TableName . $OtherStr;
	$Rs = $Conn->query($SQL);
	$Rs->execute();
	while($Row = $Rs->fetch(PDO::FETCH_ASSOC)){
		if(strtolower($Row[$ValueField])==strtolower($defaultVal)){
			echo('<option value="' . $Row[$ValueField] . '" selected="selected">' . $Row[$TitleField] . '</option>');
		}else{
			echo('<option value="' . $Row[$ValueField] . '">' . $Row[$TitleField] . '</option>');
		}
	}
}

function CreateOptionArray($ValueArray,$TitleArray,$defaultVal){
	for($i=0;$i<count($ValueArray);$i++){
		if(strtolower($ValueArray[$i])==strtolower($defaultVal)){
			echo('<option value="' . $ValueArray[$i] . '" selected="selected">' . $TitleArray[$i] . '</option>');
		}else{
			echo('<option value="' . $ValueArray[$i] . '">' . $TitleArray[$i] . '</option>');
			//echo("ValueArray[" . $i . "]=" . $ValueArray[$i] . "<br />TitleArray[" . $i . "] = ".$TitleArray[$i] ."<br />");
		}
	}
}

function notify2($msg,$href="",$Other="",$End=true){
	echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
	echo "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";
	echo "<head>\n";
	echo "	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>\n";
	echo "	<script type=\"text/javascript\" src=\"".VisualRoot."Scripts/jquery.js\"></script>\n";
	echo "<script type=\"text/javascript\">\n";
	echo "$(function(){\n";

	$Rtn = "";
	if($msg != "")
	{
		if($href !="")
		{
			echo "window.parent.MsgObj.trigger('_setTitle','".$msg."<br /><p align=\'center\'><input type=\'button\' value=\'OK\' onclick=\'MsgBg.trigger(\"_close\");window.location.href=\"".$href."\";".$Other."\' /></p>');\n";
		}
		else
		{
			echo "window.parent.MsgObj.trigger('_setTitle','".$msg."<br /><p align=\'center\'><input type=\'button\' value=\'OK\' onclick=\'MsgBg.trigger(\"_close\");".$Other."\' /></p>');\n";
		}
		echo "window.parent.MsgObj.trigger('_show');\n";
	}
	else
	{
		if($href !="")
		{
			echo "window.top.location.href=\"".$href."\"\n";
		}
		else
		{
			echo "window.parent.MsgBg.trigger('_close');\n";
			echo($Other);
		}	
	}
	echo "});\n";
	echo"</script>\n";
	echo "</head>\n";
	echo "<body>\n";
	echo "</body>\n";
	echo "</html>";
	if($End){
		exit();
	}
}
function notify3($href = "", $data = array()){
	echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
	echo "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";
	echo "<head>\n";
	echo "	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>\n";
	echo "	<script type=\"text/javascript\" src=\"".VisualRoot."Scripts/jquery.js\"></script>\n";
	echo "<script type=\"text/javascript\">\n";
	echo "$(function(){\n";
	echo "	$(\"#form1\").submit();\n";
	echo "});\n";
	echo"</script>\n";
	echo "</head>\n";
	echo "<body>\n";
	echo "<form action=\"".$href."\" name=\"form1\" target=\"_self\" method=\"post\" id=\"form1\">\n";
	foreach($data as $Key => $Value){
	echo "<input type=\"hidden\" name=\"".$Key."\" value=\"".$Value."\" />\n";
	}
	echo "</form>\n";
	echo "</body>\n";
	echo "</html>";
	exit();
}
?>