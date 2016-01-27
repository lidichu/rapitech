<!-- 資料庫專區 -->
<?php
	/*GetSelRs，GetRow使用範例		
		$Query=array("SerialNo");//where欄位
		$MemberRs=GetSelRs("m_member","*",$Query);
		
		$Sel_SerialNo=1;
		$Row=GetRow($MemberRs,1);
		myprint_r($Row);
		exit();
	*/
	/*GetUpRs使用範例	
		$FileQuery=array("Name");	//修改欄位
		$WhereQuery=array("SerialNo"); /where 條件
		$Up_m_member_Rs=GetUpRs("m_member",$FileQuery,$WhereQuery);
		
		$File_Name="大雄"; 
		$Where_SerialNo=1; /
		$Up_m_member_Rs->execute();
	*/
	/*GetDelRs使用範例		
		$Query=array("SerialNo"); //刪除條件
		$Del_m_member_Rs=GetDelRs("m_member",$Query);
		
		$Del_SerialNo=1;
		$Del_m_member_Rs->execute();
		
	*/
	if($RsArray==""){
		$RsArray=array();
	}
	$RsArray = array_diff($RsArray, array(null,'null','',' '));
	$RsArray[]="banner";
	$RsArray[]="productcategory";
	//myprint_r($RsArray);
	foreach($RsArray as $Value){
		${$Value."_View"}=true;
	}
	if($MySqlRsView){
		//banner 專用
		if($banner_View){
			//查詢
			$Query=array("Status");	
			$Sel_banner_Rs=GetSelRs("banner","*",$Query,"ORDER BY RAND()");			
		}
		//首頁消息用
		if($indexnews_View){
			//查詢
			$Query=array("Status","IndexShow");				
			$Sel_indexnews_Rs=GetSelRs("news","*",$Query," limit 1");			
		}
		//news 專用
		if($newslist_View){
			//查詢
			$Query=array("Status");	
			$Sel_news_Rs=GetSelRs("banner","*",$Query,b);			
		}
		//productcategory 專用		
		if($productcategory_View){
			//查詢
			$Query=array("Status");	
			$Sel_productcategory_Rs=GetSelRs("productcategory","*",$Query,b);			
		}
		//m_member 專用
		if($m_member_View){
			//查詢
			$Query=array("SerialNo");	
			$Sel_m_member_Rs=GetSelRs("m_member","*",$Query);
			//修改
			$FileQuery=array("Name");	
			$WhereQuery=array("SerialNo");
			$Up_m_member_Rs=GetUpRs("m_member",$FileQuery,$WhereQuery);
			//刪除
			$Del_m_member_Rs=GetDelRs("m_member");
		}
	}
?>

