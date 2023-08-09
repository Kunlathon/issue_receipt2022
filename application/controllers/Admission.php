<?php
	class Admission extends CI_Controller {
		public function index(){
			$this->load->view("admission/admission");
		}
		public function examiner(){
			$this->load->view("admission/examiner");
		}
		public function qrcode_pay(){
			$this->load->view("admission/qrcode_pay");
		}
		public function general(){ //ทั่วไป
			$this->load->view("admission/general");
		}
		public function intoclass(){ //แทรกชั้น
			$this->load->view("admission/class");
		}
		public function admin(){
			$this->load->view("admission/admin");
		}
	}
?>

