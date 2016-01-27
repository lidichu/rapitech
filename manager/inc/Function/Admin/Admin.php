<?php
//建立多層資料夾
function CreatDir($Path){
	if(is_dir($Path)){
		return true;
	}else{
		while(!@mkdir($Path,0755)){
			$PathArray = explode("/",$Path);
				if(count($PathArray)>0){
					for($i=0;$i<count($PathArray)-2;$i++){
						if($NewPath!=""){
							$NewPath.="/";
						}
						$NewPath.=$PathArray[$i];
					}
					$NewPath.="/";
					CreatDir($NewPath);
				}else{
					$Temp=false;
				}
		}
		chmod($Path,0777);
	}
}
?>