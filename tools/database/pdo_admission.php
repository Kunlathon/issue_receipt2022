<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body>







<?php

	$db_admissionPDOID=$_SERVER['REMOTE_ADDR'];
	if(isset($db_admissionPDOID)){
		if($db_admissionPDOID=="127.0.0.1"){
		//db_admission
			$hostnamePDO_admission = "127.0.0.1";
			$usernamePDO_admission = "codebeer2021";
			$passwordPDO_admission = "codebeer2021";
			$databasePDO_admission = "regina_admission";
	
		}else{
		//db_admission
			$hostnamePDO_admission = "localhost";
			$usernamePDO_admission = "regina_admission";
			$passwordPDO_admission = "reginaadmission16";
			$databasePDO_admission = "regina_admission";
		}
	}else{

	}
?>

<?php
	class conntopdo_admission{
		private $connto_admission_datastu;
		private $dsn_mysql="mysql:host=localhost;dbname=sys_school_payment;charset=utf8;port=3306";
		private $dsn_sqlite="sqlite:my_sqlite.db";
		private $user="Regina@ict2022";
		private $password="Regina@ict2022";

		public function __construct($db){
			//$this->connto_admission_datastu=$connto_admission_datastu;
			//$this->dsn_mysql=$dsn_mysql;
			//$this->dsn_sqlite=$dsn_sqlite;
			//$this->user=$user;
			//$this->password=$password;
			
			try{
				switch($db){
					case "mysql":
					
					$this->connto_admission_datastu = new PDO($this->dsn_mysql, $this->user, $this->password);
					// set the PDO error mode to exception
					$this->connto_admission_datastu->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					//echo "connto_admission_datastuected successfully";
					
					break;
					
					case "sqlite":
					
					$this->connto_admission_datastu=new PDO($this->dsn_sqlite);
					break;
					
				default : echo "No database getconnto_admission_datastuect"; break;
					
				}
			}
			catch(PDOException $e){
				die('Could not connto_admission_datastuection to database because'.$e->getmessage());
				
			}
		}
		public function getconnto_admission_datastuect(){
			return $this->connto_admission_datastu;
		}
	}


?>

</body>
</html>