<?php
	class MyError{
		public $Msg;
		public $MsgEn;
		// 建構子
		public function __construct(){
			$this->Msg = "";
			$this->MsgEn = "";
		}
		// 加入錯誤訊息
		public function add($Message){
			if($this->Msg != ""){ $this->Msg .= "\\n";}
			$this->Msg .= $Message;
		}
		
		// 加入錯誤訊息
		public function addEn($Message){
			if($this->MsgEn != ""){ $this->MsgEn .= "\\n";}
			$this->MsgEn .= $Message;
		}
		// 檢查空白
		public function checkNull($FieldName,$FieldValue){
			if(is_array($FieldValue)){
				foreach($FieldValue as $Value){
					if($Value == ""){
						$this->add("‧『".$FieldName."』不能為空白");
						return false;
						break;
					}
				}
				
			}else{
				if($FieldValue === ""){
					$this->add("‧『".$FieldName."』不能為空白");
					return false;
				}
				
			}
			return true;
		}
		
		// 檢查數字空白
		public function checkNullNum($FieldName,$FieldValue){
			if(is_array($FieldValue)){
				foreach($FieldValue as $Value){
					if($Value == ""){
						$this->add("‧『".$FieldName."』不能為空白");
						return false;
						break;
					}else{
						if(!preg_match('/[0-9]$/', $Value)){
							$this->add("‧『".$FieldName."』不得包含數字以外的字元");
							return false;
							break;
						}
					}
				}
				
			}else{
				if($FieldValue === ""){
					$this->add("‧『".$FieldName."』不能為空白");
					return false;
				}else{
					if(!preg_match('/[0-9]$/', $FieldValue)){
						$this->add("‧『".$FieldName."』不得包含數字以外的字元");
						return false;
					}
				}
			}
			return true;
		}
		// 檢查EMail
		public function checkEMail($FieldName,$FieldValue,$checkFlag = false,$ConfirmFieldName = "",$ConfirmValue = "",$CheckConfirm = false){
			// 檢查空白
			if($FieldValue == ""){
				if($checkFlag){
					$this->add("‧『".$FieldName."』不能為空白");
				}
				return;
			}
			// 查詢EMail格式
			if(!preg_match("/^[-A-Za-z0-9_]+[-A-Za-z0-9_.]*[@]{1}[-A-Za-z0-9_]+[-A-Za-z0-9_.]*[.]{1}[A-Za-z]{2,5}$/", $FieldValue)){
				$this->add("‧『".$FieldName."』格式不正確");
				return;
			}
			if($CheckConfirm){
				if($ConfirmValue == ""){
					$this->add("‧『".$ConfirmFieldName."』不能為空白");
					return ;
				}
				if(!preg_match("/^[-A-Za-z0-9_]+[-A-Za-z0-9_.]*[@]{1}[-A-Za-z0-9_]+[-A-Za-z0-9_.]*[.]{1}[A-Za-z]{2,5}$/", $ConfirmValue)){
					$this->add("‧『".$ConfirmFieldName."』格式不正確");
					return ;
				}
				//信箱與確認信箱比對
				if($FieldValue != $ConfirmValue){
					$this->add("‧『".$FieldName."』與『".$ConfirmFieldName."』不一致");
				}
			}
		}
		// 檢查EMail For Account
		public function checkEMailAccount($FieldName,$FieldValue,$TableName,$TableFieldName){
			global $Conn;
			// 檢查空白
			if($FieldValue == ""){
				$this->add("‧『".$FieldName."』不能為空白");
				return;
			}
			// 查詢EMail格式
			if(!preg_match("/^[-A-Za-z0-9_]+[-A-Za-z0-9_.]*[@]{1}[-A-Za-z0-9_]+[-A-Za-z0-9_.]*[.]{1}[A-Za-z]{2,5}$/", $FieldValue)){
				$this->add("‧『".$FieldName."』格式不正確");
				return ;
			}
			$Row = myQueryDetail($TableName, "Count(*) As C", $TableFieldName."= :TableFieldName", array(
				":TableFieldName" => $FieldValue
			));
			if(intval($Row["C"]) > 0){
				$this->add("‧『".$FieldName."』已存在");
			}
		}
		public function checkEMailAccount2($ErrorMsg1Ch,$ErrorMsg1En,$ErrorMsg2Ch,$ErrorMsg2En,$ErrorMsg3Ch,$ErrorMsg3En,$FieldValue,$TableName,$TableFieldName){
			global $Conn;
			// 檢查空白
			if($FieldValue == ""){
				$this->add($ErrorMsg1Ch);
				$this->addEn($ErrorMsg1En);
				return;
			}
			// 查詢EMail格式
			if(!preg_match("/^[-A-Za-z0-9_]+[-A-Za-z0-9_.]*[@]{1}[-A-Za-z0-9_]+[-A-Za-z0-9_.]*[.]{1}[A-Za-z]{2,5}$/", $FieldValue)){
				$this->add($ErrorMsg2Ch);
				$this->addEn($ErrorMsg2En);
				return ;
			}
			$Row = myQueryDetail($TableName, "Count(*) As C", "`".$TableFieldName."` = :TableFieldName", array(
				":TableFieldName" => $FieldValue
			));
			if(intval($Row["C"]) > 0){
				$this->add($ErrorMsg3Ch);
				$this->addEn($ErrorMsg3En);
			}
		}		
		//檢查匯款帳號後5碼
		public function checkAccount($FieldName,$FieldValue){
			if($FieldValue == ""){
				$this->add("‧『".$FieldName."』不能為空白");
				return ;
			}
			if(!preg_match('/[0-9]$/', $FieldValue)){
				$this->add("‧『".$FieldName."』不得包含數字以外的字元");
				return ;
			}
			if(strlen($FieldValue) != 5){
				$this->add("‧『".$FieldName."』請輸入5個數字");
				return ;
			}
		}
		
		// 檢查帳號
		public function checkID($FieldName,$FieldValue,$TableName,$TableFieldName){
			global $Conn;
			if($FieldValue == ""){
				$this->add("‧『".$FieldName."』不能為空白");
				return ;
			}
			if(!preg_match('/[A-Za-z0-9]$/', $FieldValue)){
				$this->add("‧『".$FieldName."』不得包含英數字以外的字元");
				return ;
			}
			if(strlen($FieldValue) > 32 || strlen($FieldValue) < 6){
				$this->add("‧『".$FieldName."』必須使用6-32個英文或數字");
				return ;
			}
			$Row = myQueryDetail($TableName, "Count(*) As C", "`".$TableFieldName."` = :TableFieldName", array(
				":TableFieldName" => $FieldValue
			));
			if(intval($Row["C"]) > 0){
				$this->add("‧『".$FieldName."』已存在");
			}
		}
		// 檢查密碼
		public function checkPWD($FieldName,$FieldValue,$ConfirmFieldName = "",$ConfirmValue = "",$CheckConfirm = false){
			if($FieldValue == ""){
				$this->add("‧『".$FieldName."』不能為空白");
				return ;
			}
						
			if(!preg_match('/[A-Za-z0-9]$/', $FieldValue)){
				$this->add("‧『".$FieldName."』不得包含英數字以外的字元");
				return ;
			}
			if(strlen($FieldValue) > 12 || strlen($FieldValue) < 6){
				$this->add("‧『".$FieldName."』必須使用6-12個英文或數字");
				return ;
			}
			if($CheckConfirm){
				if($ConfirmValue == ""){
					$this->add("‧『".$ConfirmFieldName."』不能為空白");
					return ;
				}
				if(!preg_match('/[A-Za-z0-9]$/', $ConfirmValue)){
					$this->add("‧『".$ConfirmFieldName."』不得包含英數字以外的字元");
					return ;
				}
				if(strlen($ConfirmValue) > 12 || strlen($ConfirmValue) < 6){
					$this->add("‧『".$ConfirmFieldName."』必須使用6-12個英文或數字");
					return ;
				}
				//密碼與密碼確認比對
				if($FieldValue != $ConfirmValue){
					$this->add("‧『".$FieldName."』與『".$ConfirmFieldName."』不一致");
				}
			}
		}
		// 檢查發票
		public function checkInvoice($FieldName,$FieldValue,$checkFlag = false){
			if($FieldValue == ""){
				if($checkFlag){
					$this->add("‧『".$FieldName."』不能為空白");
				}
				return ;
			}
			// 查詢發票格式
			if(!preg_match('/^[a-zA-Z]{2}[0-9]{8}$$/', $FieldValue)){
				$this->add("‧『".$FieldName."』格式不正確");
			}
		}
		// 檢查驗證碼
		public function checkVCode($FieldName,$FieldValue,$SessionValue){
			$FieldValue = strtolower($FieldValue);
			$SessionValue = strtolower($SessionValue);
			if($FieldValue == ""){
				$this->add("‧『".$FieldName."』不能為空白");
				return ;
			}
			if($SessionValue != $FieldValue){
				$this->add("‧『".$FieldName."』錯誤");
				
			}
		}
		
		// 檢查驗證碼
		public function checkVCode2($ErrorMsgCh,$ErrorMsgEn,$FieldValue,$SessionValue){
			$FieldValue = strtolower($FieldValue);
			$SessionValue = strtolower($SessionValue);
			if($FieldValue == ""){
				$this->add("‧『".$FieldName."』不能為空白");
				return ;
			}
			if($SessionValue != $FieldValue){
				$this->add($ErrorMsgCh);
				$this->addEn($ErrorMsgEn);
			}
		}
		
		
		// 檢查欄位值是否已存在
		public function checkExist($FieldName,$FieldValue,$TableName,$TableFieldName){
			global $Conn;
			if($FieldValue == ""){ return ;	}
			$Row = myQueryDetail($TableName, "Count(*) As C", "`".$TableFieldName."` = :TableFieldName", array(
				":TableFieldName" => $FieldValue
			));
			if(intval($Row["C"]) > 0){
				$this->add("‧『".$FieldName."』已存在");
			}
		}
		
		
		// 檢查欄位值是否已存在
		public function checkExistForCheckNull($FieldName,$FieldValue,$TableName,$TableFieldName){
			global $Conn;
			if($FieldValue == ""){
				$this->add("‧『".$FieldName."』不能為空白");
				return ;
			}
			$Row = myQueryDetail($TableName, "Count(*) As Num", "`".$TableFieldName."` = :TableFieldName", array(
				":TableFieldName" => $FieldValue
			));
			if(intval($Row["Num"]) > 0){
				$this->add("‧『".$FieldName."』已存在");
			}
		}
		
		
		// 檢查檔案上傳欄位是否有值
		public function checkFile($FieldName,$TrueFieldName){
			if($_FILES[$TrueFieldName]["size"] == 0){
				$this->add("‧『".$FieldName."』尚未選擇任何檔案");
			}
		}
		
		//檢查身份證字號
		public function checkPID($FieldName, $FieldValue, $NotNull = false){
			if($FieldValue == ""){
				if($NotNull){
					$this->add("‧『".$FieldName."』不能為空白");
					return ;
				}else{
					return ;
				}
			}
			// 是否為外藉
			$IsForeigner = false;
			// 轉成大寫
			$PID = strtoupper($FieldValue);
			// 取得字元長度
			$PIDLength = mb_strlen($PID);
			// 英文字母
			$PIDChar = "ABCDEFGHJKLMNPQRSTUVXYWZIO";
			// 判斷長度是否符合
			if($PIDLength != 10){ $this->add("‧『".$FieldName."』 身份證字號不正確"); return; }
			// 檢查第一個字元是否為英文字
			$FirstChar = strtoupper(mb_substr($PID, 0, 1, "utf-8"));
			if(strpos($PIDChar, $FirstChar, 0) === false){ $this->add("‧『".$FieldName."』 身份證字號不正確"); return; }
 			//檢查第二個字元是否為 1 或 2 或 英文字
			$SecondChar = strtoupper(mb_substr($PID, 1, 1, "utf-8"));
			if($SecondChar != "1" && $SecondChar != "2" && (strpos($PIDChar, $SecondChar, 0) === false)){ $this->add("‧『".$FieldName."』 身份證字號不正確"); return; }
			//依第2字元判斷是否為外國人
			if(strpos($PIDChar, $SecondChar, 0) !== false){ $IsForeigner = true; }
			//產生此身份證之檢查碼
			$Sum = 0;
			$PIDNun = "";
			if($IsForeigner){
				$PIDNun .= strval(intval(strpos($PIDChar, $FirstChar, 0)) + 10);
				$PIDNun .= strval((intval(strpos($PIDChar, $SecondChar, 0)) + 10) % 10);
			}else{
				$PIDNun .= strval(intval(strpos($PIDChar, $FirstChar, 0)) + 10).strval($SecondChar);
			}
			for($i=2;$i<=8;$i++){ $PIDNun .= mb_substr($PID, $i, 1, "utf-8"); }
			$Sum = intval(mb_substr($PIDNun, 0, 1, "utf-8"));
			for($i=9,$j=1;$i>=1;$i--,$j++){ $Sum += intval(mb_substr($PIDNun, $j, 1, "utf-8")) * $i; }
			$Sum %= 10;
			$Sum += intval(mb_substr($PID, 9, 1, "utf-8"));
			$Sum %= 10;
			if($Sum != 0 ){ $this->add("‧『".$FieldName."』 身份證字號不正確"); return; }
		
		}			
		// 取得結果
		public function pass(){
			if($this->Msg != ""){
				return false;
			}else{
				return true;
			}
		}
	}
?>