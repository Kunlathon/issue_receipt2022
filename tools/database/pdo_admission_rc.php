<?php
	class AdmissionRegina{
		public $IdAdder;
		function __construct($IdAdder){
			$this->IdAdder=$IdAdder;
				switch($this->IdAdder){
				case "127.0.0.1" or "localhost" or "::1";
					$CRR_Server="localhost";
					$CRR_Username="Regina@ict2022";
					$CRR_Password="Regina@ict2022";
					$CRR_DB="sys_school_payment";
					$CRR_Port=3309;
						try{
							$RunAdmissionRegina=new PDO("mysql:host=$CRR_Server;dbname=$CRR_DB;port=$CRR_Port;charset=utf8",$CRR_Username,$CRR_Password);
							$RunAdmissionRegina->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						}catch(PDOException $e_rc){
							echo "Connection to The AdmissionRegina db".$e_rc->getMessage();
						}
				break;
				default:
					$CRR_Server="localhost";
					$CRR_Username="Regina@ict2022";
					$CRR_Password="Regina@ict2022";
					$CRR_DB="sys_school_payment";
					$CRR_Port=3306;
						try{
							$RunAdmissionRegina=new PDO("mysql:host=$CRR_Server;dbname=$CRR_DB;port=$CRR_Port;charset=utf8",$CRR_Username,$CRR_Password);
							$RunAdmissionRegina->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						}catch(PDOException $e_rc){
							echo "Connection to The sys_school_payment db".$e_rc->getMessage();
						}				
				}
			if(isset($RunAdmissionRegina)){
				$this->RunAdmissionRegina=$RunAdmissionRegina;
			}else{}	
		}function CallAdmissionRegina(){
			if(isset($this->RunAdmissionRegina)){
				return $this->RunAdmissionRegina;
			}else{} 
		}
	}
?>