<?php
	class ConnectStore{
		public $IdAdder;
		public $RunConnectStore;
		function __construct($IdAdder){
			$this->IdAdder=$IdAdder;
				switch($this->IdAdder){
				case "127.0.0.1" or "localhost" or "::1";
					$CRR_Server="localhost";
					$CRR_Username="root";
					$CRR_Password="123456";
					$CRR_DB="sys_store";
					$CRR_Port=3398;
						try{
							$RunConnectStore=new PDO("mysql:host=$CRR_Server;dbname=$CRR_DB;port=$CRR_Port;charset=utf8",$CRR_Username,$CRR_Password);
							$RunConnectStore->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						}catch(PDOException $e_rc){
							echo "Connection to The Store db".$e_rc->getMessage();
						}
				break;
				default:
					$CRR_Server="localhost";
					$CRR_Username="Regina@ict2022";
					$CRR_Password="Regina@ict2022";
					$CRR_DB="sys_store";
					$CRR_Port=3306;
						try{
							$RunConnectStore=new PDO("mysql:host=$CRR_Server;dbname=$CRR_DB;port=$CRR_Port;charset=utf8",$CRR_Username,$CRR_Password);
							$RunConnectStore->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						}catch(PDOException $e_rc){
							echo "Connection to The Store db".$e_rc->getMessage();
						}				
				}
			if(isset($RunConnectStore)){
				$this->RunConnectStore=$RunConnectStore;
			}else{}	
		}function CallConnectStore(){
			if(isset($this->RunConnectStore)){
				return $this->RunConnectStore;
			}else{} 
		}
	}
?>