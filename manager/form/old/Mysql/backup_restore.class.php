<?php
class backup_restore{
	private $Conn;
    // Constructor
 	function __construct($dbhost,$database,$dbUser ,$dbPass ,$tables="*" ) {
 	   //let me collact all data before we start
		$this->host = $dbhost;
 		$this->database = $database;
 		$this->user = $dbUser;
 		$this->pass = $dbPass ;
 		$this->file = "../../../files/BackSQL/".date("Y_m_d_H_i_s").".sql";
 		$this->tables =$tables;
	    $this->msg='';
	 	}
	// Connnect
	private function Connect() {
		$dsn = "mysql:host=".$this->host.";dbname=".$this->database.";charset=utf-8";
		$this->Conn = new PDO($dsn, $this->user, $this->pass);
		$this->Conn->exec("SET CHARACTER SET utf8");
		$this->Conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
 	}

	//Backup
	public function backup(){
		$this->Connect();
		$mysql= "set charset utf8;\r\n";
		$SQL = "show tables";
		$Rs = $this->Conn->prepare($SQL);
		$Rs->execute();
		while($table = $Rs->fetchColumn()){
			$SQL = "show create table `".$table."`";
			$Rs2 = $this->Conn->prepare($SQL);
			$Rs2->execute();
			$Row2 = $Rs2->fetch(PDO::FETCH_ASSOC);
			$mysql.="DROP TABLE IF EXISTS `$table`;\r\n";
			$mysql.=$Row2['Create Table'].";\r\n";
			$SQL = "Select * from `".$table."`";
			$Rs3 = $this->Conn->prepare($SQL);
			$Rs3->execute();
			while($Row3 = $Rs3->fetch(PDO::FETCH_ASSOC)){
				$keys = array_keys($Row3);
				$keys=array_map('addslashes',$keys);
				$keys=join('`,`',$keys);
				$keys="`".$keys."`";
				$vals=array_values($Row3);
				$vals=array_map('addslashes',$vals);
				$vals=join("','",$vals);
				$vals="'".$vals."'";
				$mysql.="insert into `$table`($keys) values($vals);\r\n";
			}
		}
		$filename=$this->file;  
		$fp = fopen($filename,'w');
		fputs($fp,$mysql);
		fclose($fp);
		return "備份成功";
	}
    //Restore
 	public function restore($FileName) {
		$this->Connect();
		if (file_exists($FileName)){
			$sql_value="";
			$cg=0;
			$sb=0;
			$sqls=file($FileName);
			foreach($sqls as $sql){
				$sql_value.=$sql;
			}			
			$a=explode(";\r\n", $sql_value);
			$total=count($a)-1;
			for ($i=0;$i<$total;$i++){
				if($this->Conn->exec($a[$i])){
					$cg+=1;
				}else{
					$sb+=1;
					$sb_command[$sb]=$a[$i];
				}
			}
			return "操作結束，共處理 $total 條命令，成功 $cg 條，失敗 $sb 條";
			if ($sb>0){
				echo "<hr><br><br>失敗命令如下：<br>";
				for ($ii=1;$ii<=$sb;$ii++){
					echo "<p><b>第 ".$ii." 條命令（内容如下）：</b><br>".$sb_command[$ii]."</p><br>";
				}
			}
		}else{
		   return "文件不存在";
		}		
 	}
}
?>