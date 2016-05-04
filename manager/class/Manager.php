<?php
	include_once("ManagerItem.php");
	include_once("FileHandle.php");
	include_once("PICHandle.php");
	include_once("ColorFields.php");
	include_once("CheckBoxFields.php");
	include_once("EMailFields.php");
	include_once("TextFields.php");
	include_once("PIDFields.php");
	include_once("MD5PWDFields.php");
	include_once("URLFields.php");
	include_once("AddressFields.php");
	include_once("URLType.php");
	include_once("PasswordFields.php");
	include_once("NumFields.php");
	include_once("NumWeightFields.php");
	include_once("DateFields.php");
	include_once("DateYFields.php");
	include_once("DateYMFields.php");
	include_once("DateMDFields.php");
	include_once("DateFields2.php");
	include_once("DateFields3.php");
	include_once("DateFields4.php");
	include_once("DateFields5.php");
	include_once("SelectFieldsG.php");
	include_once("SelectFields1.php");
	include_once("SelectFields2.php");
	include_once("NoteFields1.php");
	include_once("NoteFields1n.php");
	include_once("NoteFields2.php");
	include_once("FileFields.php");
	include_once("PICFields.php");
	include_once("PICFields2.php");
	include_once("PICFields3.php");
	include_once("PICFieldsM.php");
	include_once("YouTubeFields.php");
	include_once("SuburbStatePostcodeFields.php");
	include_once("TitleFields.php");
	class Manager{
		public $Fields;
		public $FieldsStatus;
		public static $NothingNum = 0;
		public static $FileNum = 0;
		public static $AddressNum = 0;
		public $haveG;
		public function Manager(){
			$this->haveG = false;
			$this->Fields = array();
			$this->FieldsStatus = array();
			if($_REQUEST["FileOption"] =="Download"){
				FileHandle::Downloadfile($_REQUEST["FilePath"]);
			}
		}
		
		
		
		//改變唯讀狀態
		public function SetAddStatus($FieldNameIn,$BooleanFlagIn){
			if(array_key_exists($FieldNameIn,$this->FieldsStatus)==false){exit("SetAddStatus Error ：`".$FieldNameIn."` is Not existed In FieldsStatus");}
			$this->FieldsStatus[$FieldNameIn] = $BooleanFlagIn;
		}
		//一般文字欄位
		public function AddText($FieldNameIn,$ShowNameIn,$NullFlagIn=false,$ErrorShowIn=""){
			if(array_key_exists($FieldNameIn,$this->Fields)==true){exit("AddText Error ：`".$FieldNameIn."` is existed In Fields");}
			$this->Fields[$FieldNameIn] = New TextFields($FieldNameIn,$ShowNameIn,$NullFlagIn,$ErrorShowIn);
			$this->FieldsStatus[$FieldNameIn] = false;
		}
		
		//身份證字號欄位
		public function AddPID($FieldNameIn,$ShowNameIn,$NullFlagIn=false){
			if(array_key_exists($FieldNameIn,$this->Fields)==true){exit("PIDFields Error ：`".$FieldNameIn."` is existed In Fields");}
			$this->Fields[$FieldNameIn] = New PIDFields($FieldNameIn,$ShowNameIn,$NullFlagIn);
			$this->FieldsStatus[$FieldNameIn] = false;
		}
		
		//顏色欄位
		public function AddColor($FieldNameIn,$ShowNameIn,$NullFlagIn=false,$DefaultColorIn="#FFFFFF"){
			if(array_key_exists($FieldNameIn,$this->Fields)==true){exit("AddColor Error ：`".$FieldNameIn."` is existed In Fields");}
			$this->Fields[$FieldNameIn] = New ColorFields($FieldNameIn,$ShowNameIn,$NullFlagIn,$DefaultColorIn);
			$this->FieldsStatus[$FieldNameIn] = false;			
		}
		
		//密碼欄位
		public function AddPWD($FieldNameIn,$ShowNameIn,$NullFlagIn=false){
			if(array_key_exists($FieldNameIn,$this->Fields)==true){exit("AddPWD Error ：`".$FieldNameIn."` is existed In Fields");}
			$this->Fields[$FieldNameIn] = New PasswordFields($FieldNameIn,$ShowNameIn,$NullFlagIn);
			$this->FieldsStatus[$FieldNameIn] = false;
		}
		
		//MD5密碼欄位
		public function AddMD5PWD($FieldNameIn,$ShowNameIn,$NullFlagIn=false){
			if(array_key_exists($FieldNameIn,$this->Fields)==true){exit("AddMD5PWD Error ：`".$FieldNameIn."` is existed In Fields");}
			$this->Fields[$FieldNameIn] = New MD5PWDFields($FieldNameIn,$ShowNameIn,$NullFlagIn);
			$this->FieldsStatus[$FieldNameIn] = false;
		}
		
		//網址列
		public function AddURL($FieldNameIn,$ShowNameIn,$NullFlagIn=false,$TitleFieldIn=""){
			if(array_key_exists($FieldNameIn,$this->Fields)==true){exit("AddURL Error ：`".$FieldNameIn."` is existed In Fields");}
			$this->Fields[$FieldNameIn] = New URLFields($FieldNameIn,$ShowNameIn,$NullFlagIn,$TitleFieldIn);
			$this->FieldsStatus[$FieldNameIn] = false;			
		}
		
		//地址欄位
		public function AddAddress($FieldCountyNameIn,$FieldAreaNameIn,$FieldZipCodeNameIn,$FieldOtherNameIn,$ShowNameIn,$NullFlagIn=false,$DefaultValueIn=""){
			if(array_key_exists($FieldNameIn,$this->Fields)==true){exit("AddAddress Error ：`".$FieldNameIn."` is existed In Fields");}
			$this->Fields[$FieldCountyNameIn] = New AddressFields($FieldCountyNameIn,$FieldAreaNameIn,$FieldZipCodeNameIn,$FieldOtherNameIn,$ShowNameIn,$NullFlagIn,$DefaultValueIn);
			$this->FieldsStatus[$FieldCountyNameIn] = false;
		}
		
		//區域 / 州 / 郵遞區號 欄位
		public function AddSuburbStatePostcode($SuburbFieldNameIn,$StateFieldNameIn,$PostcodeFieldNameIn,$ShowNameIn,$NullFlagIn){
			if(array_key_exists($SuburbFieldNameIn,$this->Fields)==true){exit("AddSuburbStatePostcode Error ：`".$SuburbFieldNameIn."` is existed In Fields");}
			$this->Fields[$SuburbFieldNameIn] = New SuburbStatePostcodeFields($SuburbFieldNameIn,$StateFieldNameIn,$PostcodeFieldNameIn,$ShowNameIn,$NullFlagIn);
			$this->FieldsStatus[$SuburbFieldNameIn] = false;			
		}
		//核取方塊
		public function AddCheckBox($FieldNameIn,$ShowNameIn,$NullFlagIn,$ItemValArrayIn,$ItemTextArrayIn,$ColsIn,$SaveCharIn = ",",$ReadOnlyCharIn = "、"){
			
			if(array_key_exists($FieldNameIn,$this->Fields)==true){exit("AddCheckBox Error ：`".$FieldNameIn."` is existed In Fields");}
			$this->Fields[$FieldNameIn] = New CheckBoxFields($FieldNameIn,$ShowNameIn,$NullFlagIn,$ItemValArrayIn,$ItemTextArrayIn,$ColsIn,$SaveCharIn,$ReadOnlyCharIn);
			$this->FieldsStatus[$FieldNameIn] = false;			
		}		
		
		//EMail欄位
		public function AddEMail($FieldNameIn,$ShowNameIn,$NullFlagIn=false){
			if(array_key_exists($FieldNameIn,$this->Fields)==true){exit("AddText Error ：`".$FieldNameIn."` is existed In Fields");}
			$this->Fields[$FieldNameIn] = New EMailFields($FieldNameIn,$ShowNameIn,$NullFlagIn);
			$this->FieldsStatus[$FieldNameIn] = false;
		}		
		//連結型態
		public function AddURLType($FieldNameIn,$ShowNameIn){
			if(array_key_exists($FieldNameIn,$this->Fields)==true){exit("AddURLType Error ：`".$FieldNameIn."` is existed In Fields");}
			$this->Fields[$FieldNameIn] = New URLType($FieldNameIn,$ShowNameIn);
			$this->FieldsStatus[$FieldNameIn] = false;			
		}
		//下拉式G
		public function AddSelectG($FieldNameIn,$ShowNameIn,$NullFlagIn=false,$ValueFieldIn,$TextFieldIn,$ItemTableIn,$ItemWhereIn="",$ItemOrderIn,$SelectItemDefaultIn=""){
			if(array_key_exists($FieldNameIn,$this->Fields)==true){exit("AddSelectG Error ：`".$FieldNameIn."` is existed In Fields");}
			$this->Fields[$FieldNameIn] = New SelectFieldsG($FieldNameIn,$ShowNameIn,$NullFlagIn,$ValueFieldIn,$TextFieldIn,$ItemTableIn,$ItemWhereIn,$ItemOrderIn,$SelectItemDefaultIn);
			$this->FieldsStatus[$FieldNameIn] = false;
			$this->haveG = true;
		}		

		//下拉式選單(資料庫取值)
		public function AddSelect1($FieldNameIn,$ShowNameIn,$NullFlagIn=false,$RelFieldIn,$RelShowIn,$RelTableIn,$RelQueryIn="",$RelOrderIn="",$SelectItemDefaultIn=""){
			if(array_key_exists($FieldNameIn,$this->Fields)==true){exit("AddSelect1 Error ：`".$FieldNameIn."` is existed In Fields");}
			$this->Fields[$FieldNameIn] = New SelectFields1($FieldNameIn,$ShowNameIn,$NullFlagIn=false,$RelFieldIn,$RelShowIn,$RelTableIn,$RelQueryIn,$RelOrderIn,$SelectItemDefaultIn="");
			$this->FieldsStatus[$FieldNameIn] = false;
		}
		
		//下拉式選單(非資料庫取值)
		public function AddSelect2($FieldNameIn,$ShowNameIn,$NullFlagIn=false,$SelectItemsIn,$SelectValuesIn,$SelectItemDefaultIn=""){
			if(array_key_exists($FieldNameIn,$this->Fields)==true){exit("AddSelect2 Error ：`".$FieldNameIn."` is existed In Fields");}
			$this->Fields[$FieldNameIn] = New SelectFields2($FieldNameIn,$ShowNameIn,$NullFlagIn,$SelectItemsIn,$SelectValuesIn,$SelectItemDefaultIn);
			$this->FieldsStatus[$FieldNameIn] = false;
		}

		//數字欄位
		public function AddNum($FieldNameIn,$ShowNameIn,$NullFlagIn=false,$NumLenIn,$NumtypeIn,$DefaultValueIn){
			if(array_key_exists($FieldNameIn,$this->Fields)==true){exit("AddNum Error ：`".$FieldNameIn."` is existed In Fields");}
			$this->Fields[$FieldNameIn] = New NumFields($FieldNameIn,$ShowNameIn,$NullFlagIn,$NumLenIn,$NumtypeIn,$DefaultValueIn);
			$this->FieldsStatus[$FieldNameIn] = false;
		}

		//重量欄位
		public function AddNumWeight($WeightFieldNameIn,$WeightUnitFieldNameIn,$ShowNameIn,$NullFlagIn=false,$NumLenIn,$NumtypeIn="",$DefaultValueIn=0){
			if(array_key_exists($WeightFieldNameIn,$this->Fields)==true){exit("AddNumWeightFields Error ：`".$WeightFieldNameIn."` is existed In Fields");}
			$this->Fields[$WeightFieldNameIn] = New NumWeightFields($WeightFieldNameIn,$WeightUnitFieldNameIn,$ShowNameIn,$NullFlagIn,$NumLenIn,$NumtypeIn,$DefaultValueIn);
			$this->FieldsStatus[$WeightFieldNameIn] = false;		
		}
		//日期欄位
		public function AddDate($FieldNameIn,$ShowNameIn,$NullFlagIn=false,$DefaultValueIn=""){
			if(array_key_exists($FieldNameIn,$this->Fields)==true){exit("AddDate Error ：`".$FieldNameIn."` is existed In Fields");}
			$this->Fields[$FieldNameIn] = New DateFields($FieldNameIn,$ShowNameIn,$NullFlagIn,$DefaultValueIn);
			$this->FieldsStatus[$FieldNameIn] = false;
		}
		//日期欄位(只有年)
		public function AddDateY($FieldNameIn,$ShowNameIn,$NullFlagIn=false,$DefaultValueIn=""){
			if(array_key_exists($FieldNameIn,$this->Fields)==true){exit("AddDateY Error ：`".$FieldNameIn."` is existed In Fields");}
			$this->Fields[$FieldNameIn] = New DateYFields($FieldNameIn,$ShowNameIn,$NullFlagIn,$DefaultValueIn);
			$this->FieldsStatus[$FieldNameIn] = false;
		}
		//日期欄位(只有年月)
		public function AddDateYM($FieldNameIn,$ShowNameIn,$NullFlagIn=false,$DefaultValueIn=""){
			if(array_key_exists($FieldNameIn,$this->Fields)==true){exit("AddDateYM Error ：`".$FieldNameIn."` is existed In Fields");}
			$this->Fields[$FieldNameIn] = New DateYMFields($FieldNameIn,$ShowNameIn,$NullFlagIn,$DefaultValueIn);
			$this->FieldsStatus[$FieldNameIn] = false;
		}
		//日期欄位(只有月日)，限里昂網站使用
		public function AddDateMD($FieldName1In,$FieldName2In,$ShowNameIn,$NullFlagIn=false,$DefaultValueIn=""){
			if(array_key_exists($FieldName1In,$this->Fields)==true){exit("AddDateMD Error ：`".$FieldNameIn."` is existed In Fields");}
			$this->Fields[$FieldName1In] = New DateMDFields($FieldName1In,$FieldName2In,$ShowNameIn,$NullFlagIn,$DefaultValueIn);
			$this->FieldsStatus[$FieldName1In] = false;
		}		
		//日期欄位(含起迄日期)
		public function AddDate2($StartFieldIn,$ShowNameIn,$NullFlagIn=false,$EndFieldIn,$DefaultStartValueIn="",$DefaultEndValueIn=""){
			if(array_key_exists($StartFieldIn,$this->Fields)==true){exit("AddDate2 Error ：`".$StartFieldIn."` is existed In Fields");}
			$this->Fields[$StartFieldIn] = New DateFields2($StartFieldIn,$ShowNameIn,$NullFlagIn,$EndFieldIn,$DefaultStartValueIn,$DefaultEndValueIn);
			$this->FieldsStatus[$StartFieldIn] = false;
		}		
		//日期欄位(三欄式ROC選單)
		public function AddDate3($FieldNameIn,$ShowNameIn,$NullFlagIn=false,$StartYearIn="",$FinishYearIn="",$DefaultValueIn=""){
			if(array_key_exists($FieldNameIn,$this->Fields)==true){exit("AddDate3 Error ：`".$FieldNameIn."` is existed In Fields");}
			$this->Fields[$FieldNameIn] = New DateFields3($FieldNameIn,$ShowNameIn,$NullFlagIn,$StartYearIn,$FinishYearIn,$DefaultValueIn);
			$this->FieldsStatus[$FieldNameIn] = false;
		}
		//日期欄位(含時間)
		public function AddDate4($FieldNameIn,$ShowNameIn,$NullFlagIn=false,$DefaultValueIn=""){
			if(array_key_exists($FieldNameIn,$this->Fields)==true){exit("AddDate4 Error ：`".$FieldNameIn."` is existed In Fields");}
			$this->Fields[$FieldNameIn] = New DateFields4($FieldNameIn,$ShowNameIn,$NullFlagIn,$DefaultValueIn);
			$this->FieldsStatus[$FieldNameIn] = false;
		}	
		//日期欄位(含時間、含起迄日期)
		public function AddDate5($StartFieldIn,$ShowNameIn,$NullFlagIn=false,$EndFieldIn,$DefaultStartValueIn="",$DefaultEndValueIn=""){
			if(array_key_exists($StartFieldIn,$this->Fields)==true){exit("AddDate5 Error ：`".$StartFieldIn."` is existed In Fields");}
			$this->Fields[$StartFieldIn] = New DateFields5($StartFieldIn,$ShowNameIn,$NullFlagIn,$EndFieldIn,$DefaultStartValueIn,$DefaultEndValueIn);
			$this->FieldsStatus[$StartFieldIn] = false;
		}		
		//文字編輯器
		public function AddNote1($FieldNameIn,$ShowNameIn,$NullFlagIn=false){
			if(array_key_exists($FieldNameIn,$this->Fields)==true){exit("AddNote1 Error ：`".$FieldNameIn."` is existed In Fields");}
			$this->Fields[$FieldNameIn] = New NoteFields1($FieldNameIn,$ShowNameIn,$NullFlagIn);
			$this->FieldsStatus[$FieldNameIn] = false;
		}
		//文字編輯器(不能上傳圖片)
		public function AddNote1n($FieldNameIn,$ShowNameIn,$NullFlagIn=false){
			if(array_key_exists($FieldNameIn,$this->Fields)==true){exit("AddNote1n Error ：`".$FieldNameIn."` is existed In Fields");}
			$this->Fields[$FieldNameIn] = New NoteFields1n($FieldNameIn,$ShowNameIn,$NullFlagIn);
			$this->FieldsStatus[$FieldNameIn] = false;
		}		
		
		//一般文字區域欄位
		public function AddNote2($FieldNameIn,$ShowNameIn,$NullFlagIn=false,$Maxlength=1000){
			if(array_key_exists($FieldNameIn,$this->Fields)==true){exit("AddNote2 Error ：`".$FieldNameIn."` is existed In Fields");}
			$this->Fields[$FieldNameIn] = New NoteFields2($FieldNameIn,$ShowNameIn,$NullFlagIn,$Maxlength);
			$this->FieldsStatus[$FieldNameIn] = false;
		}
		//檔案上傳
		public function AddFile($FieldNameIn,$ShowNameIn,$NullFlagIn=false,$FilePathIn,$TitleFieldIn="",$TitleShowIn="",$OtherVarIn="",$FieldNameHiddenIn=""){
			if(array_key_exists($FieldNameIn,$this->Fields)==true){exit("AddFile Error ：`".$FieldNameIn."` is existed In Fields");}
			Manager::$FileNum++;
			$this->Fields[$FieldNameIn] = New FileFields($FieldNameIn,$ShowNameIn,$NullFlagIn,$FilePathIn,$TitleFieldIn,$TitleShowIn,Manager::$FileNum,$OtherVarIn,$FieldNameHiddenIn);
			$this->FieldsStatus[$FieldNameIn] = false;
		}
		//YouTube
		public function AddYouTube($FieldNameIn,$ShowNameIn,$NullFlagIn=false){
			if(array_key_exists($FieldNameIn,$this->Fields)==true){exit("AddText Error ：`".$FieldNameIn."` is existed In Fields");}
			$this->Fields[$FieldNameIn] = New YouTubeFields($FieldNameIn,$ShowNameIn,$NullFlagIn);
			$this->FieldsStatus[$FieldNameIn] = false;
		}
		//圖片上傳
		public function AddPIC($FieldNameIn,$ShowNameIn,$NullFlagIn=false,$FilePathIn,$WidthIn,$HeightIn,$NoteIn,$TitleFieldIn,$TitleShowIn,$OtherVarIn="",$FieldNameHiddenIn=""){
			if(array_key_exists($FieldNameIn,$this->Fields)==true){exit("AddPIC Error ：`".$FieldNameIn."` is existed In Fields");}
			Manager::$FileNum++;
			$this->Fields[$FieldNameIn] = New PICFields($FieldNameIn,$ShowNameIn,$NullFlagIn,$FilePathIn,$WidthIn,$HeightIn,$NoteIn,$TitleFieldIn,$TitleShowIn,Manager::$FileNum,$OtherVarIn,$FieldNameHiddenIn);
			$this->FieldsStatus[$FieldNameIn] = false;
		}
		
		//圖片上傳(附縮圖)
		public function AddPIC2($FieldNameIn,$ShowNameIn,$NullFlagIn=false,$FilePathIn,$WidthIn,$HeightIn,$NoteIn,$TitleFieldIn,$TitleShowIn,$OtherVarIn="",$FieldNameHiddenIn="",$SmallPathIn,$SmallWidthIn,$SmallHeightIn){
			if(array_key_exists($FieldNameIn,$this->Fields)==true){exit("AddPIC2 Error ：`".$FieldNameIn."` is existed In Fields");}
			Manager::$FileNum++;
			$this->Fields[$FieldNameIn] = New PICFields2($FieldNameIn,$ShowNameIn,$NullFlagIn,$FilePathIn,$WidthIn,$HeightIn,$NoteIn,$TitleFieldIn,$TitleShowIn,Manager::$FileNum,$OtherVarIn,$FieldNameHiddenIn,$SmallPathIn,$SmallWidthIn,$SmallHeightIn);
			$this->FieldsStatus[$FieldNameIn] = false;
		}
		
		//圖片上傳(儲存為多尺寸)
		public function AddPIC3($FieldNameIn,$ShowNameIn,$NullFlagIn=false,$FilePathArrayIn,$WidthArrayIn,$HeightArrayIn,$NoteIn,$TitleFieldIn,$TitleShowIn,$OtherVarIn="",$FieldNameHiddenIn="",$BoxModeIn,$ShowWidthIn,$ShowHeightIn,$ShowRootIn=""){
			if(array_key_exists($FieldNameIn,$this->Fields)==true){exit("AddPIC3 Error ：`".$FieldNameIn."` is existed In Fields");}
			Manager::$FileNum++;
			$this->Fields[$FieldNameIn] = New PICFields3($FieldNameIn,$ShowNameIn,$NullFlagIn,$FilePathArrayIn,$WidthArrayIn,$HeightArrayIn,$NoteIn,$TitleFieldIn,$TitleShowIn,Manager::$FileNum,$OtherVarIn,$FieldNameHiddenIn,$BoxModeIn,$ShowWidthIn,$ShowHeightIn,$ShowRootIn);
			$this->FieldsStatus[$FieldNameIn] = false;
		}	
		public function AddPICM($FieldNameIn,$ShowNameIn,$NullFlagIn=false,$FilePathArrayIn,$WidthArrayIn=null,$HeightArrayIn=null,$NoteIn,$TitleFieldIn="",$TitleShowIn="",$NumIn=1,$OtherVarIn="",$FieldNameHiddenIn="",$BoxModeIn,$ShowWidthIn,$ShowHeightIn,$ShowRootIn=""){
			if(array_key_exists($FieldNameIn,$this->Fields)==true){exit("AddPICM Error ：`".$FieldNameIn."` is existed In Fields");}
			Manager::$FileNum++;
			$this->Fields[$FieldNameIn] = New PICFieldsM($FieldNameIn,$ShowNameIn,$NullFlagIn,$FilePathArrayIn,$WidthArrayIn,$HeightArrayIn,$NoteIn,$TitleFieldIn,$TitleShowIn,Manager::$FileNum,$OtherVarIn,$FieldNameHiddenIn,$BoxModeIn,$ShowWidthIn,$ShowHeightIn,$ShowRootIn);
			$this->FieldsStatus[$FieldNameIn] = false;
		}				
		//區塊
		public function AddTitle($Title,$Align = "center"){
			$this->Fields["Nothing".Manager::$NothingNum] = New TitleFields($Title,$Align);
			$this->FieldsStatus["Nothing".Manager::$NothingNum] = false;
			Manager::$NothingNum++;
		}
		//權限
		public function AddAuthority($FieldNameIn,$ShowNameIn,$NullFlagIn=false,$RelFieldIn,$RelShowIn,$RelTableIn,$RelQueryIn="",$RelOrderIn="",$ColsIn=1){
			if(array_key_exists($FieldNameIn,$this->Fields)==true){exit("AddAuthority Error ：`".$FieldNameIn."` is existed In Fields");}
			$this->Fields[$FieldNameIn] = New AuthorityFields($FieldNameIn,$ShowNameIn,$NullFlagIn,$RelFieldIn,$RelShowIn,$RelTableIn,$RelQueryIn,$RelOrderIn,$ColsIn);
			$this->FieldsStatus[$FieldNameIn] = false;
		}		

		public function AddScript(){
			foreach ($this->Fields as $key => $value){
				if(!$this->FieldsStatus[$key]){
					$this->Fields[$key]->AddScript();
				}
			}
		}
		public function ModifyScript(){
			foreach ($this->Fields as $key => $value){
				if(!$this->FieldsStatus[$key]){
					$this->Fields[$key]->ModifyScript();
				}
			}
		}
		
		public function AddShow(){
			foreach ($this->Fields as $key => $value){
				if(!$this->FieldsStatus[$key]){
					$this->Fields[$key]->AddShow();
				}else{
					$this->Fields[$key]->ReadShow();
				}				
			}
		}
		
		public function ModifyShow(){
			foreach ($this->Fields as $key => $value){
				if(!$this->FieldsStatus[$key]){
					$this->Fields[$key]->ModifyShow();
				}else{
					$this->Fields[$key]->ReadShow();
				}
			}
		}
		public function ReadShow(){
			foreach ($this->Fields as $key => $value){
				$this->Fields[$key]->ReadShow();
			}
		}
		public function CheckScript(){
			foreach ($this->Fields as $key => $value){
				if(!$this->FieldsStatus[$key]){
					$this->Fields[$key]->CheckScript();
				}				
			}
		}		
		
		public function AddHandle(){
			foreach ($this->Fields as $key => $value){
				if(!$this->FieldsStatus[$key]){
					$this->Fields[$key]->AddHandle();
				}
			}
		}
		public function ModifyHandle(){
			foreach ($this->Fields as $key => $value){
				if(!$this->FieldsStatus[$key]){
					$this->Fields[$key]->ModifyHandle();
				}
			}
		}
	}
?>