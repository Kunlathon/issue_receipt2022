



<?php
	class RowReginaClass{
		public $RRC_year;
		public $ReginaClassArray;
		function __construct($RRC_year){
			$this->RRC_year=$RRC_year;
			
			$IdAdder=$_SERVER["REMOTE_ADDR"];
			$AdmissionRegina=new AdmissionRegina($IdAdder);
			$pdo_admission_rc=$AdmissionRegina->CallAdmissionRegina();
			$ReginaClassArray=array();
			$ReginaClassSql="SELECT * FROM `regina_class` WHERE `rc_yaer`='{$this->RRC_year}'";
				if($ReginaClassRs=$pdo_admission_rc->query($ReginaClassSql)){
					while($ReginaClassRow=$ReginaClassRs->Fetch(PDO::FETCH_ASSOC)){
						$ReginaClassArray[]=$ReginaClassRow;
					}
				}else{
					$ReginaClassArray=null;
				}
			if(isset($ReginaClassArray)){
				$this->ReginaClassArray=$ReginaClassArray;
				$pdo_admission_rc=null;
			}else{
				$pdo_admission_rc=null;
			}
		}function RunRowReginaClass(){
			if(isset($this->ReginaClassArray)){
				return $this->ReginaClassArray;
			}else{}
		}
	}

?>


<?php
	class PrintStudentAdmission{
		public $PSA_IDReg;
		public $IDReg,$fnameTh;
		function __construct($PSA_IDReg){
			$this->PSA_IDReg=$PSA_IDReg;
			
			
			$IdAdder=$_SERVER["REMOTE_ADDR"];
			$AdmissionRegina=new AdmissionRegina($IdAdder);
			$pdo_admission_rc=$AdmissionRegina->CallAdmissionRegina();
			
						$RcAdmissionSql="SELECT `IDReg`,`stu_fname` 
										 FROM `student_rc` 
										 WHERE `IDReg`='{$this->PSA_IDReg}'";
							if($RcAdmissionRs=$pdo_admission_rc->query($RcAdmissionSql)){
								$RcAdmissionRow=$RcAdmissionRs->Fetch(PDO::FETCH_ASSOC);
									if(is_array($RcAdmissionRow) && count($RcAdmissionRow)){
										$IDReg=$RcAdmissionRow["IDReg"];
										$fnameTh=$RcAdmissionRow["stu_fname"];
									}else{
										$IDReg=null;
										$fnameTh=null;
									}
							}else{
								$IDReg=null;
								$fnameTh=null;
							}						
				
				if(isset($IDReg)){
					$this->IDReg=$IDReg;
					$this->fnameTh=$fnameTh;
					$pdo_admission_rc=null;
				}else{
					$pdo_admission_rc=null;
				}
		}function __destruct(){
			if(isset($this->IDReg)){
				$this->IDReg;
				$this->fnameTh;
			}else{}
		}
	}
?>


<?php
	class PrintReginaClass{
		public $PRC_key,$PRC_year;
		public $PRC_IDReg;
		function __construct($PRC_key,$PRC_year){
			$this->PRC_key=$PRC_key;
			$this->PRC_year=$PRC_year;
			
			$IdAdder=$_SERVER["REMOTE_ADDR"];
			$AdmissionRegina=new AdmissionRegina($IdAdder);
			$pdo_admission_rc=$AdmissionRegina->CallAdmissionRegina();
			
			$PrintReginaClassSql="SELECT `rc_IDReg` 
								  FROM `regina_class` 
								  WHERE `rc_IDReg`='{$this->PRC_key}' 
								  AND `rc_yaer`='{$this->PRC_year}';";
				if($PrintReginaClassRs=$pdo_admission_rc->query($PrintReginaClassSql)){
					$PrintReginaClassRow=$PrintReginaClassRs->Fetch(PDO::FETCH_ASSOC);
						if(is_array($PrintReginaClassRow) && count($PrintReginaClassRow)){
							$PRC_IDReg=$PrintReginaClassRow["rc_IDReg"];
						}else{
							$PRC_IDReg=null;
						}
				}else{
					$PRC_IDReg=null;					
				}
			
			if(isset($PRC_IDReg)){
				$this->PRC_IDReg=$PRC_IDReg;
				$pdo_admission_rc=null;
			}else{
				$pdo_admission_rc=null;
			}
		}function __destruct(){
			if(isset($this->PRC_IDReg)){
				$this->PRC_IDReg;
			}else{}
		}
	}
?>

