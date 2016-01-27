<?php
class PayPal {
	public $API_Endpoint;
	public $version;
	public $API_UserName;
	public $API_Password;
	public $API_Signature;
	public $DollarType; 	// 幣別
	public $PayPal_URL;
	public $nvp_Header;
	public $url;
	public $url_success;
	public $url_cancel;
	public $itemnum;		// 明細數量
	public $itemamt;		// 明細總額
	public $nvpstr;
	public function __construct(){
		global $Conn;
		// 明細數量
		$this->itemnum = 0;
		// 明細總額
		$this->itemamt = 0.00;
		$this->nvpstr = "";

		// 查詢 PayPal 設定
		$SQL="Select * From paypal";
		$Rs = $Conn->query($SQL);
		$Row = $Rs->fetch(PDO::FETCH_ASSOC);
		if($Row){
			$this->url = getHostUrl(); 							// 請先輸入此範例碼所放置在你的伺服器上的完整目錄路徑
			$url_success = $this->url.($Row["SuccessUrl"]); 	// 當顧客登入PayPal 後，會被帶回此商店網址進行後續結帳動作
			$url_cancel = $this->url.($Row["CancelUrl"]);		// 當顧客取消交易，會被帶回此網頁,你可以指定為其他頁面
			$this->API_UserName = $Row["API_USERNAME"];
			$this->API_Password = $Row["API_PASSWORD"];
			$this->API_Signature = $Row["API_SIGNATURE"];
			
			// 指定幣別
			$this->DollarType = $Row["DollarType"];
			if($Row["IsTest"] == "true"){
				//測試環境 API 端口為  https://api-3t.sandbox.paypal.com/nvp
				$this->API_Endpoint = $Row["API_ENDPOINTTest"];
				//測試環境 PayPal 收款頁面為  https://www.sandbox.paypal.com/webscr&cmd=_express-checkout&token=
				$this->PayPal_URL = $Row["PAYPAL_URLTest"];
			}else{
				//正式環境 API 端口為  https://api-3t.paypal.com/nvp
				$this->API_Endpoint = $Row["API_ENDPOINT"];
				//正式環境 PayPal 收款頁面為  https://www.paypal.com/webscr&cmd=_express-checkout&token=
				$this->PayPal_URL = $Row["PAYPAL_URL"];
			}
		}
		$this->version = "65.1";
		$this->nvp_Header = "";
		$this->nvp_Header = "&PWD=".urlencode($this->API_Password)."&USER=".urlencode($this->API_UserName)."&SIGNATURE=".urlencode($this->API_Signature);
	}
	// 加入明細
	public function add_item($L_NAME,$L_AMT,$L_QTY){
		$this->nvpstr.= "&L_PAYMENTREQUEST_0_NAME".$this->itemnum."=".urlencode($L_NAME) ;	//商品名稱
		$this->nvpstr.= "&L_PAYMENTREQUEST_0_AMT".$this->itemnum."=".$L_AMT ;				//商品單價
		$this->nvpstr.= "&L_PAYMENTREQUEST_0_QTY".$this->itemnum."=".$L_QTY ;				//商品數量
		$this->itemnum = $this->itemnum + 1;
		$this->itemamt = floatval($this->itemamt) + floatval($L_AMT*$L_QTY);
	}

	// 設置交易成功與交易取消網址
	public function set_transaction_url($success,$cancel){
		// 當顧客登入PayPal 後，會被帶回此商店網址進行後續結帳動作
		$this->url_success = $this->url.$success;
		// 當顧客取消交易，會被帶回此網頁,你可以指定為其他頁面
		$this->url_cancel = $this->url.$cancel;
	}


	// 送出金流
	public function send($OrderSerialNo,$OrderCheck ="",$OrderType=""){

		$this->nvpstr .= "&PAYMENTREQUEST_0_ITEMAMT=".(string)$this->itemamt;		//商品金額小計
		$this->nvpstr .= "&PAYMENTREQUEST_0_AMT=".(string)$this->itemamt ;
		$this->nvpstr .= "&PAYMENTREQUEST_0_CURRENCYCODE=".urlencode($this->DollarType) ;
		$this->nvpstr .= "&PAYMENTREQUEST_0_PAYMENTACTION=sale";
		//(於PayPal網站上選擇付款方式，並確認明細後，會回到此網址繼續進行結帳)
		$returnURL =urlencode($this->url_success."?OS=".$OrderSerialNo."&OC=".$OrderCheck."&OT=".$OrderType."&currencyCodeType=".urlencode($this->DollarType)."&paymentType=sale&amt=".(string)$this->itemamt);
		//cancelURL  (於PayPal網站上點選取消交易或返回店家 後，會回到此網址)
		$cancelURL =urlencode($this->url_cancel."?OS=".$OrderSerialNo."&OT=".$OrderType);
		$this->nvpstr.= "&ReturnUrl=".$returnURL ;
		$this->nvpstr.= "&CANCELURL=".$cancelURL ;
		$this->nvpstr.= "&charset=UTF-8";
		$this->nvpstr = $this->nvp_Header.$this->nvpstr;
		// echo($this->nvpstr."<br />");
		// exit();
		//將資料傳送至 PayPal ,回傳值存入 $resArray
		$resArray = $this->hash_call("SetExpressCheckout",$this->nvpstr);
		
		$_SESSION["reshash"]=$resArray;
		$ack = strtoupper($resArray["ACK"]);
		// echo($ack);
		//判斷資料傳遞是否成功
		if($ack=="SUCCESS"){
			// Redirect to paypal.com here
			//如成功  將轉到PayPal付款頁面
			$token = urldecode($resArray["TOKEN"]);
			$payPalURL = $this->PayPal_URL.$token;
			header("Location: ".$payPalURL);
		} else  {
			//Redirecting to APIError.php to display errors.
			//失敗  將轉到錯誤訊息頁面
			$location = "PayPalError.php?flag=SetExpressCheckout";
			header("Location: $location");
		}
	}

	// hash_call 透過 curl 傳送資料至PayPal並得到結果
	public function hash_call($methodName,$nvpStr)
	{
		//setting the curl parameters.
		$ch = curl_init();

		// curl_setopt($ch, CURLOPT_URL,$this->API_Endpoint);
		curl_setopt($ch, CURLOPT_URL,"https://api-3t.sandbox.paypal.com/nvp");
		curl_setopt($ch, CURLOPT_VERBOSE, 1);

		//turning off the server and peer verification(TrustManager Concept).
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_POST, 1);

		//check if version is included in $nvpStr else include the version.
		if(strlen(str_replace('VERSION=', '', strtoupper($nvpStr))) == strlen($nvpStr)) {
			$nvpStr = "&VERSION=" . urlencode($this->version) . $nvpStr;
		}

		$nvpreq="METHOD=".urlencode($methodName).$nvpStr;

		//setting the nvpreq as POST FIELD to curl
		// echo($nvpreq);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$nvpreq);

		//getting response from server
		// 從PayPal主機取得結果
		
		$response = curl_exec($ch);
		//convrting NVPResponse to an Associative Array
		// 將結果格式化為陣列
		$nvpResArray=$this->deformatNVP($response);
		$nvpReqArray=$this->deformatNVP($nvpreq);
		$_SESSION['nvpReqArray']=$nvpReqArray;

	  //判斷結果是否正確
		if (curl_errno($ch)) {
			// moving to display page to display curl errors
			  $_SESSION['curl_error_no']=curl_errno($ch) ;
			  $_SESSION['curl_error_msg']=curl_error($ch);
			  $location = "PayPalError.php?flag=hash_call";
			  header("Location: $location");
		 } else {
			 //closing the curl
			curl_close($ch);
		  }
		return $nvpResArray;
	}

	/** This function will take NVPString and convert it to an Associative Array and it will decode the response.
  * It is usefull to search for a particular key and displaying arrays.
  * @nvpstr is NVPString.
  * @nvpArray is Associative Array.
  */

	//將字串格式化為陣列
	public function deformatNVP($nvpstr)
	{
		$intial=0;
		$nvpArray = array();

		while(strlen($nvpstr)){
			//postion of Key
			$keypos= strpos($nvpstr,'=');
			//position of value
			$valuepos = strpos($nvpstr,'&') ? strpos($nvpstr,'&'): strlen($nvpstr);

			/*getting the Key and Value values and storing in a Associative Array*/
			$keyval=substr($nvpstr,$intial,$keypos);
			$valval=substr($nvpstr,$keypos+1,$valuepos-$keypos-1);
			//decoding the respose
			$nvpArray[urldecode($keyval)] =urldecode( $valval);
			$nvpstr=substr($nvpstr,$valuepos+1,strlen($nvpstr));
		 }
		return $nvpArray;
	}
}

?>