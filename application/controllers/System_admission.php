<?php
	class System_admission extends CI_Controller{
		
		public function __construct(){
			parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->library(['form_validation','session']);
			$AdmissionRun=$this->load->database("default",TRUE);
			$Admission_up=$this->load->database("default",TRUE);
		}		
		public function index(){
			$this->load->view("system_admission/form_login");
		}
		
		public function admission_login(){
			$AL_date=date("Y-m-d H:i:s");
			$this->form_validation->set_rules('Username', 'Username', 'required');
			$this->form_validation->set_rules('Password', 'Password', 'required');
				if($this->form_validation->run() == FALSE){
					$this->session->sess_destroy();
					$this->load->view('system_admission/form_login');
				}else{
					$Admission_U=$this->input->post('Username');
					$Admission_P=$this->input->post('Password');
					$Admission_P=MD5($Admission_P);
					//$AdmissionRun=$this->load->database("default",TRUE);
					$AdmissionRun=$this->db->query("SELECT `ls_key`,`ls_login` FROM `login_system` WHERE `ls_user`='{$Admission_U}' AND `ls_password`='{$Admission_P}'");
					foreach($AdmissionRun->result_array() as $AdmissionRunRow){
						$ls_key=$AdmissionRunRow["ls_key"];
						$ls_login=$AdmissionRunRow["ls_login"];
					}
						if(isset($ls_key)){
							switch($ls_login){
								case "0":
									$AdmissionData=array('ls_key'=>$ls_key);
									$this->session->set_userdata($AdmissionData);
									$Admission_up=$this->db->query("UPDATE `login_system` SET `ls_login`='1',`ls_datetime`='{$AL_date}' WHERE `ls_key`='{$Admission_U}'");
									$this->load->view('admission/admin');									
								break;
								case "1":
									$AdmissionData=array('ls_key'=>$ls_key);
									$this->session->set_userdata($AdmissionData);
									$Admission_up=$this->db->query("UPDATE `login_system` SET `ls_login`='1',`ls_datetime`='{$AL_date}' WHERE `ls_key`='{$Admission_U}'");
									$this->load->view('admission/admin');									
								break;
								default:
									$this->session->sess_destroy();
									$this->load->view('system_admission/form_login');
							}
						}else{
							$this->session->sess_destroy();
							$this->load->view('system_admission/form_login');
						}
				}
		}
		
		public function admission_logout($ls_key){
			$AL_date=date("Y-m-d H:i:s");
			$Admission_up=$this->db->query("UPDATE `login_system` SET `ls_login`='0',`ls_datetime`='{$AL_date}' WHERE `ls_key`='{$ls_key}'");			
			$this->session->sess_destroy();
			$this->load->view('system_admission/form_login');
		}
		
		public function admission_out(){
			$this->session->sess_destroy();
			$this->load->view('system_admission/form_login');
		}
		
	}

?>