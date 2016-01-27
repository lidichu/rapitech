<?php
	class PageSpliter{
		/*使用範例
			$PS = new PageSpliter();
			$PS->Fields = "Title";
			$PS->DBTable = "news";
			$PS->Where = "Status='上架'";
			$PS->Where = "Status='上架'";
			$PS->Order = "PostDate DESC,SerialNo DESC";
			$PS->setPage($_REQUEST["Page"]);
			$PS->init();
			$Rs = mysql_query($PS->getSQL(),$Conn);
			if($Rs && (mysql_num_rows($Rs)>0)){
				while($Row = mysql_fetch_array($Rs)){
					echo $Row["Title"]."<br/>";	
				}	
			}
		*/
		var $PageSize;		//分頁大小
		var $curPage;		//目前分頁
		var $MinPage;		//最小分頁數
		var $MaxPage;		//最大分頁數
		var $DBTable;		//資料表名稱
		var $Fields;		//欄位名稱
		var $Where;			//Where條件
		var $Order;			//排序字串
		var $RsAmount;		//資料總筆數
		
		public function PageSpliter(){
			$this->MinPage = 1;
			$this->PageSize = 10;
			$this->Fields = "*";
			
		}
		
		//初始化
		public function init(){
			global $Conn;
			if($this->CheckField()){
				$SQL = "Select Count(*) as Num From ".$this->DBTable;
				if($this->Where!=""){$SQL.=" Where ".$this->Where;}
				$Rs = mysql_query($SQL,$Conn);
				if($Rs && (mysql_num_rows($Rs)>0)){
					$Row = mysql_fetch_array($Rs);
					$this->RsAmount = $Row["Num"];
					if($this->PageSize!=0){
						$this->MaxPage = NumHandle2($this->RsAmount,$this->PageSize) / $this->PageSize;
					}else{
						$this->MaxPage = $this->RsAmount;
					}
					if($this->curPage > $this->MaxPage){$this->curPage = $this->MaxPage;}
					if($this->curPage < $this->MinPage){$this->curPage = $this->MinPage;}
				}	
			}
		}


		//檢查欄位是否都有值
		public function CheckField(){
			$Pass = true;
			if($this->DBTable==""){
				$Pass = false;	
			}
			return $Pass;
		}
		
		
		//設置目前分頁
		public function setPage($Page){
			if($Page==""){
				$this->curPage = 1;	
			}else{
				$this->curPage = intval($Page);	
			}
		}
		//取得此分頁查詢SQL
		public function getSQL(){
			$SQL = "Select ".$this->Fields." From ".$this->DBTable;
			if($this->Where!=""){$SQL.=" Where ".$this->Where;}
			if($this->Order!=""){$SQL.=" Order By  ".$this->Order;}
			if($this->PageSize!=0){
				$SQL .=" Limit ".(($this->curPage - 1 ) * $this->PageSize ).",".$this->PageSize;
			}
			return $SQL;
		}
	}
?>