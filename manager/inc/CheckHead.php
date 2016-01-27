<?php include_once("Connection.php"); ?>
<?php
	$SdbRoot="../../";
	$id = $_COOKIE["id"];
	$pw = $_COOKIE["pw"];
	if ($id == ""){ $id = $_REQUEST["id"]; }
	if ($pw == ""){ $pw = $_REQUEST["pw"]; }
	$LOGIN_SERIALNO = 0;
	//檢查資料庫必備資料
	$SQL = "Select Count(*) From m_member Where SerialNo = 1";
	$DataAmount= $Conn->query($SQL)->fetchColumn();
	if($DataAmount > 0){
		$SQL = "Select * From m_member Where SerialNo = 1";
		$Rs = $Conn->query($SQL);
		$Row = $Rs->fetch(PDO::FETCH_ASSOC);
		if( $Row["Acc"] != "admin" && $Row["Acc"] != "6244b2ba957c48bc64582cf2bcec3d04"){
			$SQL = "Update m_member set Acc='admin' , Name='admin', Pwd='6244b2ba957c48bc64582cf2bcec3d04' Where SerialNo = 1";
			$Conn->exec($SQL);
		}
	}else{
		$SQL="Insert Into m_member(SerialNo,Acc,Name,Pwd) values(1,'admin','admin','6244b2ba957c48bc64582cf2bcec3d04')";
		$Conn->exec($SQL);
	}
	
	
	$SQL = "Select Count(*) From treelist where Tree_ID = '90'";
	$DataAmount= $Conn->query($SQL)->fetchColumn();
	if($DataAmount == 0){
		$SQL = "Insert Into treelist(Tree_ID,Tree_Name,Sort,AdminUse) values('90','選單管理','9000','Y')";
		$Conn->exec($SQL);
		$SQL = "Insert Into treelist(Tree_ID,Tree_Name,Href_File,FileName,Sort,AdminUse) values('9010','選單管理','../form/Tree/Tree.php','Tree.php','9010','Y')";
		$Conn->exec($SQL);
	}
	$SQL = "Select Count(*) From treelist where Tree_ID = '99'";
	$DataAmount= $Conn->query($SQL)->fetchColumn();
	if($DataAmount == 0){
		$SQL = "Insert Into treelist(Tree_ID,Tree_Name,Sort,AdminUse) values('99','權限管理','9900','N')";
		$Conn->exec($SQL);
		$SQL = "Insert Into treelist(Tree_ID,Tree_Name,Href_File,FileName,Sort,AdminUse) values('9910','管理者資料','../form/System/M_Member.php','M_Member.php','9910','N')";
		$Conn->exec($SQL);
		$SQL = "Insert Into treelist(Tree_ID,Tree_Name,Href_File,FileName,Sort,AdminUse) values('9920','權限維護','../form/System/Control.php','Control.php','9920','N')";
		$Conn->exec($SQL);
	}
	$SQL = "Select Count(*) From popedom where Member_ID =1 and Tree_ID='99'";
	$DataAmount= $Conn->query($SQL)->fetchColumn();
	if($DataAmount == 0){
		$SQL = "Insert Into popedom(Member_ID,Tree_ID) values('1','99')";
		$Conn->exec($SQL);
		$SQL = "Insert Into popedom(Member_ID,Tree_ID) values('1','9920')";
		$Conn->exec($SQL);
	}
	if(!isset($Check_FileName)){ $Check_FileName = ''; }

	if($id!="" && $pw!=""){
		$SQL = "Select Count(*) From m_member where acc = :acc and pwd = :pwd";
		$Rs = $Conn->prepare($SQL);
		$Rs->bindParam(':acc', $id);
		$Rs->bindParam(':pwd', $pw);
		$Rs->execute();
		$DataAmount = $Rs->fetchColumn();
		if($DataAmount > 0){
			//讀取會員資料
			$SQL = "Select * From m_member where acc = :acc and pwd = :pwd";
			$Rs = $Conn->prepare($SQL);
			$Rs->bindParam(':acc', $id);
			$Rs->bindParam(':pwd', $pw);
			$Rs->execute();
			$Row = $Rs->fetch(PDO::FETCH_ASSOC);
			$LOGIN_SERIALNO = $Row["SerialNo"];
			if($Check_FileName!="login" && $Check_FileName!="" && $id!="admin"){				
				$SQL = 	"Select Count(*) From popedom a,treelist b where a.Tree_ID = b.Tree_ID and a.Member_ID= :Member_ID and b.FileName= :FileName";
				$Rs2 = $Conn->prepare($SQL);
				$Rs2->bindParam(':Member_ID', $Row["SerialNo"]);
				$Rs2->bindParam(':FileName', $Check_FileName);
			}else{
				$SQL = "Select Count(*) from treelist limit 0,1";
				$Rs2 = $Conn->prepare($SQL);
			}
			$Rs2->execute();
			$DataAmount = $Rs2->fetchColumn();
			if($DataAmount == 0){
				//非正常登入
				$sResult = "";
				$sResult .= "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
				$sResult .= "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";
				$sResult .= "<head>\n";
				$sResult .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
				$sResult .= "<title>後端管理系統</title>\n";
				$sResult .= "</head>\n";
				$sResult .= "<body>\n";
				$sResult .= "<script language='javascript'>\n";
				$sResult .= "top.location.href='" . $SdbRoot . "inc/Error.php';\n";
				$sResult .= "</script>\n";
				$sResult .= "</body>\n";
				$sResult .= "</html>\n";
				echo($sResult);
				exit();
			}
		}else{
			//查無會員資料
			$sResult = "";
			$sResult .= "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
			$sResult .= "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";
			$sResult .= "<head>\n";
			$sResult .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
			$sResult .= "<title>後端管理系統</title>\n";
			$sResult .= "</head>\n";
			$sResult .= "<body>\n";
			$sResult .= "<script language='javascript'>\n";
			$sResult .= "alert('登入失敗<查無會員資料>.');\n";
			$sResult .= "window.history.go(-1);\n";
			$sResult .= "</script>\n";
			$sResult .= "</body>\n";
			$sResult .= "</html>\n";
			echo($sResult);
			exit();
		}
	}else{
		//帳號密碼遺失或未輸入
		$sResult = "";
		$sResult .= "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
		$sResult .= "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";
		$sResult .= "<head>\n";
		$sResult .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
		$sResult .= "<title>後端管理系統</title>\n";
		$sResult .= "</head>\n";
		$sResult .= "<body>\n";
		$sResult .= "<script language='javascript'>\n";
		$sResult .= "top.location.href='" . $SdbRoot . "login.php';\n";
		$sResult .= "</script>\n";
		$sResult .= "</body>\n";
		$sResult .= "</html>\n";
		echo($sResult);
		exit();
	}
?>