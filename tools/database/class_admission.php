<?php
	error_reporting(error_reporting() & ~E_NOTICE); 
	
		class IntoSendDocuments{
		public  $sd_key,$sd_send_documents,$sd_student_photo,$sd_student_birth,$sd_student_house,$sd_name_change,$sd_educational_papers,$sd_quota;
		function __construct($sd_key,$sd_send_documents,$sd_student_photo,$sd_student_birth,$sd_student_house,$sd_name_change,$sd_educational_papers,$sd_quota){
			$this->sd_key=$sd_key;			
			$this->sd_send_documents=$sd_send_documents;
			$this->sd_student_photo=$sd_student_photo;
			$this->sd_student_birth=$sd_student_birth;
			$this->sd_student_house=$sd_student_house;
			$this->sd_name_change=$sd_name_change;
			$this->sd_educational_papers=$sd_educational_papers;
			$this->sd_quota=$sd_quota;
//---------------------------------------------------------------------------------	
			if(isset($this->sd_student_photo)){
				$copy_sd_student_photo="yes";
			}else{
				$copy_sd_student_photo="No";
			}			
			if(isset($this->sd_student_birth)){
				$copy_sd_student_birth="yes";
			}else{
				$copy_sd_student_birth="No";
			}
			if(isset($this->sd_student_house)){
				$copy_sd_student_house="yes";
			}else{
				$copy_sd_student_house="No";
			}			
			if(isset($this->sd_name_change)){
				$copy_sd_name_change="yes";
			}else{
				$copy_sd_name_change="No";
			}
			if(isset($this->sd_educational_papers)){
				$copy_sd_educational_papers="yes";
			}else{
				$copy_sd_educational_papers="No";
			}
			if(isset($this->sd_quota)){
				$copy_sd_quota="yes";
			}else{
				$copy_sd_quota="No";
			}		
//---------------------------------------------------------------------------------
			$connpdo_admission=new conntopdo_admission("mysql");
			$pdo_admission=$connpdo_admission->getconnto_admission_datastuect();			
//---------------------------------------------------------------------------------	
			$IntoSendDocumentsSql="INSERT INTO `send_documents` (`sd_key`, `sd_send_documents`, `sd_student_photo`, `sd_student_birth`, `sd_student_house`, `sd_name_change`, `sd_educational_papers`, `sd_quota`) 
								   VALUES ('{$this->sd_key}', '{$this->sd_send_documents}', '{$copy_sd_student_photo}', '{$copy_sd_student_birth}', '{$copy_sd_student_house}', '{$copy_sd_name_change}', '{$copy_sd_educational_papers}', '{$copy_sd_quota}');";
			try{
				$pdo_admission->exec($IntoSendDocumentsSql);
				$RunSendDocumentsSystem="Yes";
			}catch(PDOException $e){
				$RunSendDocumentsSystem="No";
			}
//*********************************************************************************			
			if(isset($RunSendDocumentsSystem)){
				$this->RunSendDocumentsSystem=$RunSendDocumentsSystem;
			}else{
//---------------------------------------------------------------------------------				
			}
//*********************************************************************************			
			$pdo_admission=null;
		}function RunIntoSendDocuments(){
			if(isset($this->RunSendDocumentsSystem)){
				return $this->RunSendDocumentsSystem;
			}else{
//---------------------------------------------------------------------------------				
			}
		}
	}
	
	
	
	
	
		
	class UpdataSendDocuments{
		public  $sd_key,$sd_send_documents,$sd_student_photo,$sd_student_birth,$sd_student_house,$sd_name_change,$sd_educational_papers,$sd_quota;
		function __construct($sd_key,$sd_send_documents,$sd_student_photo,$sd_student_birth,$sd_student_house,$sd_name_change,$sd_educational_papers,$sd_quota){
			$this->sd_key=$sd_key;			
			$this->sd_send_documents=$sd_send_documents;
			$this->sd_student_photo=$sd_student_photo;
			$this->sd_student_birth=$sd_student_birth;
			$this->sd_student_house=$sd_student_house;
			$this->sd_name_change=$sd_name_change;
			$this->sd_educational_papers=$sd_educational_papers;
			$this->sd_quota=$sd_quota;
//---------------------------------------------------------------------------------
			if(isset($this->sd_student_photo)){
				$copy_sd_student_photo="yes";
			}else{
				$copy_sd_student_photo="No";
			}			
			if(isset($this->sd_student_birth)){
				$copy_sd_student_birth="yes";
			}else{
				$copy_sd_student_birth="No";
			}
			if(isset($this->sd_student_house)){
				$copy_sd_student_house="yes";
			}else{
				$copy_sd_student_house="No";
			}			
			if(isset($this->sd_name_change)){
				$copy_sd_name_change="yes";
			}else{
				$copy_sd_name_change="No";
			}
			if(isset($this->sd_educational_papers)){
				$copy_sd_educational_papers="yes";
			}else{
				$copy_sd_educational_papers="No";
			}
			if(isset($this->sd_quota)){
				$copy_sd_quota="yes";
			}else{
				$copy_sd_quota="No";
			}			
//---------------------------------------------------------------------------------
			$connpdo_admission=new conntopdo_admission("mysql");
			$pdo_admission=$connpdo_admission->getconnto_admission_datastuect();			
//---------------------------------------------------------------------------------	
			$IntoSendDocumentsSql="UPDATE `send_documents` SET `sd_send_documents`='{$this->sd_send_documents}',`sd_student_photo`='{$copy_sd_student_photo}'
			,`sd_student_birth`='{$copy_sd_student_birth}',`sd_student_house`='{$copy_sd_student_house}',`sd_name_change`='{$copy_sd_name_change}'
			,`sd_educational_papers`='{$copy_sd_educational_papers}',`sd_quota`='{$copy_sd_quota}' WHERE `sd_key`='{$this->sd_key}';";
			try{
				$pdo_admission->exec($IntoSendDocumentsSql);
				$RunSendDocumentsSystem="Yes";
			}catch(PDOException $e){
				$RunSendDocumentsSystem="No";
			}
//*********************************************************************************			
			if(isset($RunSendDocumentsSystem)){
				$this->RunSendDocumentsSystem=$RunSendDocumentsSystem;
			}else{
//---------------------------------------------------------------------------------				
			}
//*********************************************************************************			
			$pdo_admission=null;
		}function RunUpdataSendDocuments(){
			if(isset($this->RunSendDocumentsSystem)){
				return $this->RunSendDocumentsSystem;
			}else{
//---------------------------------------------------------------------------------				
			}
		}
	}	
		
		

	
	class Data_Send_Documents{
		public $DSD_key;
		function __construct($DSD_key){
			$this->DSD_key=$DSD_key;
			$connpdo_admission=new conntopdo_admission("mysql");
			$pdo_admission=$connpdo_admission->getconnto_admission_datastuect();
			$DSD_sql="SELECT `sd_key`, `sd_send_documents`, `sd_student_photo`, `sd_student_birth`, `sd_student_house`, `sd_name_change`, `sd_educational_papers`, `sd_quota` 
					  FROM `send_documents` 
					  WHERE `sd_key`='{$this->DSD_key}'";
			if($DSD_rs=$pdo_admission->query($DSD_sql)){
				$DSD_row=$DSD_rs->Fetch(PDO::FETCH_ASSOC);
				if(is_array($DSD_row) && count($DSD_row)){
					$DSDsd_key=$DSD_row["sd_key"];
					$DSDsd_send_documents=$DSD_row["sd_send_documents"];
					$DSDsd_student_photo=$DSD_row["sd_student_photo"];
					$DSDsd_student_birth=$DSD_row["sd_student_birth"];
					$DSDsd_student_house=$DSD_row["sd_student_house"];
					$DSDsd_name_change=$DSD_row["sd_name_change"];
					$DSDsd_educational_papers=$DSD_row["sd_educational_papers"];
					$DSDsd_quota=$DSD_row["sd_quota"];
				}else{
					$DSDsd_key=null;
					$DSDsd_send_documents=null;
					$DSDsd_student_photo=null;
					$DSDsd_student_birth=null;
					$DSDsd_student_house=null;
					$DSDsd_name_change=null;
					$DSDsd_educational_papers=null;
					$DSDsd_quota=null;
				}
			}else{
				$DSDsd_key=null;
				$DSDsd_send_documents=null;
				$DSDsd_student_photo=null;
				$DSDsd_student_birth=null;
				$DSDsd_student_house=null;
				$DSDsd_name_change=null;
				$DSDsd_educational_papers=null;
				$DSDsd_quota=null;
			}
//---------------------------------------------------------------------------------			
			if(isset($DSDsd_key)){
				$this->DSDsd_key=$DSDsd_key;
				$this->DSDsd_send_documents=$DSDsd_send_documents;
				$this->DSDsd_student_photo=$DSDsd_student_photo;
				$this->DSDsd_student_birth=$DSDsd_student_birth;
				$this->DSDsd_student_house=$DSDsd_student_house;
				$this->DSDsd_name_change=$DSDsd_name_change;
				$this->DSDsd_educational_papers=$DSDsd_educational_papers;
				$this->DSDsd_quota=$DSDsd_quota;
			}else{
//---------------------------------------------------------------------------------				
			}
//---------------------------------------------------------------------------------			
			$pdo_admission=Null;
		}function __destruct(){
			if(isset($this->DSDsd_key)){
				$this->DSDsd_key;
				$this->DSDsd_send_documents;
				$this->DSDsd_student_photo;
				$this->DSDsd_student_birth;
				$this->DSDsd_student_house;
				$this->DSDsd_name_change;
				$this->DSDsd_educational_papers;
				$this->DSDsd_quota;
			}else{
//---------------------------------------------------------------------------------					
			}
		}
	}
	
	
	
	class call_level{
		public $txt_level;
		function __construct($txt_level){
			$this->txt_level=$txt_level;
			$connpdo_admission=new conntopdo_admission("mysql");
			$pdo_admission=$connpdo_admission->getconnto_admission_datastuect();
			$levelSql="SELECT `Sort_name`,`Lname` FROM `rc_level` WHERE `IDLevel`='{$this->txt_level}';";
			if($levelRs=$pdo_admission->query($levelSql)){
			   $levelRow=$levelRs->Fetch(PDO::FETCH_ASSOC);
			   $Sort_name=$levelRow["Sort_name"];
			   $Lname=$levelRow["Lname"];
			}else{
			   $Sort_name="";
			   $Lname="";
			}	
				$pdo_admission=Null;
				$this->Sort_name=$Sort_name;
				$this->Lname=$Lname;			
		}function __destruct(){
				$this->Sort_name;
				$this->Lname;
		}
	}
	
	
	
	class printstu_prefix{
		public $prefix;
		function __construct($prefix){
			$this->prefix=$prefix;
			$connpdo_admission=new conntopdo_admission("mysql");
			$pdo_admission=$connpdo_admission->getconnto_admission_datastuect();
			$prefix_sql="SELECT `prefixname`,`prefix_SName`,`prefix_EName` FROM `rc_prefix` WHERE `IDPrefix`='{$this->prefix}'";
			if($prefix_rs=$pdo_admission->query($prefix_sql)){
				$prefix_row=$prefix_rs->Fetch(PDO::FETCH_ASSOC);
				$prefix_prefixname=$prefix_row["prefixname"];
				$prefix_prefix_SName=$prefix_row["prefix_SName"];
				$prefix_prefix_EName=$prefix_row["prefix_EName"];
			}else{
				$prefix_prefixname="";
				$prefix_prefix_SName="";
				$prefix_prefix_EName="";
			}
			$pdo_admission=Null;
			$this->prefix_prefixname=$prefix_prefixname;
			$this->prefix_prefix_SName=$prefix_prefix_SName;
			$this->prefix_prefix_EName=$prefix_prefix_EName;
		}
		function __destruct(){
			$this->prefix_prefixname;
			$this->prefix_prefix_SName;
			$this->prefix_prefix_EName;
		}
	}
	
	

	class print_planAdmission{
		public $plan;
		function __construct($plan){
			$this->plan=$plan;
			$connpdo_admission=new conntopdo_admission("mysql");
			$pdo_admission=$connpdo_admission->getconnto_admission_datastuect();
			$plan_sql="SELECT `Name`,`LName` FROM `rc_plan` WHERE `IDPlan`='{$this->plan}'";
			if($plan_rs=$pdo_admission->query($plan_sql)){
				$plan_row=$plan_rs->Fetch(PDO::FETCH_ASSOC);
				$plan_Name=$plan_row["Name"];
				$plan_LName=$plan_row["LName"];
			}else{
				$plan_Name="";
				$plan_LName="";
			}
			$pdo_admission=Null;
			$this->plan_Name=$plan_Name;
			$this->plan_LName=$plan_LName;
		}
		function __destruct(){
			$this->plan_Name;
			$this->plan_LName;
		}
	}
	
	
	class  birth_txt{
		public $birthdate;
		function __construct($birthdate){
			$this->birthdate=$birthdate;
			$today = date('d-m-Y');
			list($bday,$bmonth,$byear) = explode('-',$this->birthdate);
			list($tday,$tmonth,$tyear) = explode('-',$today);
				if($byear < 1970){
					$yearad = 1970 - $byear;
					$byear = 1970;
				}else{
					$yearad = 0;
				}
			$mbirth = mktime(0,0,0, $bmonth,$bday,$byear);
			$mtoday = mktime(0,0,0, $tmonth,$tday,$tyear);
			
			$mage = ($mtoday - $mbirth);
			$wyear = (date('Y', $mage)-1970+$yearad);
			$wmonth = (date('m', $mage)-1);
			$wday = (date('d', $mage)-1);
			
			$ystr = ($wyear > 1 ? " Years" : " Year");
			$mstr = ($wmonth > 1 ? " Months" : " Month");
			$dstr = ($wday > 1 ? " Days" : " Days");
			
			if($wyear > 0 && $wmonth > 0 && $wday > 0) {
				$agestr = $wyear.$ystr." ".$wmonth.$mstr." ".$wday.$dstr;
			}else if($wyear == 0 && $wmonth == 0 && $wday > 0) {
				$agestr = $wday.$dstr;
				//$wyear=0;
				//$wmonth=0;
			}else if($wyear > 0 && $wmonth > 0 && $wday == 0) {
				$agestr = $wyear.$ystr." ".$wmonth.$mstr;
				//$wday=0;
			}else if($wyear == 0 && $wmonth > 0 && $wday > 0) {
				$agestr = $wmonth.$mstr." ".$wday.$dstr;
				//$wyear=0;
			}else if($wyear > 0 && $wmonth == 0 && $wday > 0) {
				$agestr = $wyear.$ystr." ".$wday.$dstr;
				//$wmonth=0;
			}else if($wyear == 0 && $wmonth > 0 && $wday == 0) {
				$agestr = $wmonth.$mstr;
				//$wyear=0;
				//$wday=0;
			}else {
				$agestr ="";
				//$wyear="";
				//$wmonth="";
				//$wday="";
			}
			$this->wyear=$wyear;
			$this->wmonth=$wmonth;
			$this->wday=$wday;
			$this->agestr=$agestr;
		}function __destruct(){
			$this->wyear;
			$this->wmonth;
			$this->wday;
			$this->agestr;
		}
	}
	
	
		class stu_prefix{
		public $prefix;
		function __construct($prefix){
			$this->prefix=$prefix;
			$connpdo_admission=new conntopdo_admission("mysql");
			$pdo_admission=$connpdo_admission->getconnto_admission_datastuect();
			$prefix_sql="SELECT `prefixname`,`prefix_SName`,`prefix_EName` FROM `rc_prefix` WHERE `IDPrefix`='{$this->prefix}'";
			if($prefix_rs=$pdo_admission->query($prefix_sql)){
				$prefix_row=$prefix_rs->Fetch(PDO::FETCH_ASSOC);
				$prefix_prefixname=$prefix_row["prefixname"];
				$prefix_prefix_SName=$prefix_row["prefix_SName"];
				$prefix_prefix_EName=$prefix_row["prefix_EName"];
			}else{
				$prefix_prefixname="";
				$prefix_prefix_SName="";
				$prefix_prefix_EName="";
			}
			$pdo_admission=Null;
			$this->prefix_prefixname=$prefix_prefixname;
			$this->prefix_prefix_SName=$prefix_prefix_SName;
			$this->prefix_prefix_EName=$prefix_prefix_EName;
		}
		function __destruct(){
			$this->prefix_prefixname;
			$this->prefix_prefix_SName;
			$this->prefix_prefix_EName;
		}
	}
?>
	
<?php	
	
	//insert_admission
	class insert_admission{
		public $admission_sql;
		function __construct($admission_sql){
			$this->admission_sql=$admission_sql;
			
			$connpdo_admission=new conntopdo_admission("mysql");
			$pdo_admission=$connpdo_admission->getconnto_admission_datastuect();
						
			$sql=$this->admission_sql;
			if($pdo_admission->exec($sql)>0){
				$system_insert="yes";
			}else{
				$system_insert="no";
			}
			unset($pdo_admission);
			$this->system_insert=$system_insert;
		}
		function into_insert_admission(){
			return $this->system_insert;
		}		
		
	}
	

	
		class notrow_admission{
			public $txt_admission;
			function __construct($txt_admission){
				$this->txt_admission=$txt_admission;
				$admission_array=array();
				$connpdo_admission=new conntopdo_admission("mysql");
				$pdo_admission=$connpdo_admission->getconnto_admission_datastuect();
				$admission_sql=$this->txt_admission;
					if($admission_rs=$pdo_admission->query($admission_sql)){
						$admission_row=$admission_rs->Fetch(PDO::FETCH_ASSOC);
						$admission_array[]=$admission_row;
					}else{
				
					}
						$pdo_admission=Null;
						$this->admission_array=$admission_array;				
				}function notrow_admission_print(){
					return $this->admission_array;
			}
		}			
		
		class row_admission{
			public $txt_admission;
			function __construct($txt_admission){
				$this->txt_admission=$txt_admission;
				$admission_array=array();
				$connpdo_admission=new conntopdo_admission("mysql");
				$pdo_admission=$connpdo_admission->getconnto_admission_datastuect();
				$admission_sql=$this->txt_admission;
					if($admission_rs=$pdo_admission->query($admission_sql)){
						while($admission_row=$admission_rs->Fetch(PDO::FETCH_ASSOC)){
							$admission_array[]=$admission_row;							
						}
					}else{
				
					}
						$pdo_admission=Null;
						$this->admission_array=$admission_array;				
				}function row_admission_print(){
					return $this->admission_array;
			}
		}
	
	
	
		function datethaiM2($strDate){
	        $strYear = date("Y",strtotime($strDate));
			//$strYear=substr($strYear,2,2);
	        $strMonth= date("n",strtotime($strDate));
	        $strDay= date("j",strtotime($strDate));
	        $strMonthCut = Array("","01","02","03","04","05","06","07","08","09","10","11","12");
	        $strMonthThai= $strDay."-".$strMonthCut[$strMonth]."-".$strYear;
	        return "$strMonthThai";
	    }
	
	


?>