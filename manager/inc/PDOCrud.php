<?php
class PDOCrud{
	private $Conn;
	public function __construct(){
		$dsn = "mysql:host=".DbHost.";dbname=".DbName.";charset=utf-8";
		$this->Conn = new PDO($dsn, DbUser, DbPwd);
		$this->Conn->exec("SET CHARACTER SET utf8");
		$this->Conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	}
	public function query($SQL, $Parame = array()){
		$Rs = $this->Conn->prepare($SQL);
		$Rs->execute($Parame);
		$Rtn = new PDORecord();
		while($Row = $Rs->fetch(PDO::FETCH_ASSOC)){
			$Rtn->Data[] = $Row;
		}
		$Rtn->num_rows = count($Rtn->Data);
		return $Rtn;
	}
	
	public function exec($SQL, $Parame = array()){
		$Rs = $this->Conn->prepare($SQL);
		$Rs->execute($Parame);
	}
	public function __destruct(){
		$this->Conn = null;
	}
}
class PDORecord{
	public $num_rows = 0;
	public $Data = array();
	private $DataTop = 0;
	public function fetch(){
		if($this->DataTop < $this->num_rows){
			return $this->Data[$this->DataTop++];
		}else{
			return null;
		}
	}
}

?>