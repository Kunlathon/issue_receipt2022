<?php
	class Surrender extends CI_Controller{
		public function secondary(){
			$this->load->view("surrender/secondary");
		}
		public function primary(){
			$this->load->view("surrender/primary");
		}
		public function update(){
			$this->load->view("surrender/update");
		}
		public function addmission_rc($user_login,$user_card,$user_level,$user_plan){
			$print_Arc=array('user_login'=>$user_login,'user_card'=>$user_card,'user_level'=>$user_level,'user_plan'=>$user_plan);
			$this->load->view("surrender/addmission_rc",$print_Arc);		
		}
		public function print_surrender($user_login,$user_card,$user_level,$user_plan){
			$print_PS=array('user_login'=>$user_login,'user_card'=>$user_card,'user_level'=>$user_level,'user_plan'=>$user_plan);
			$this->load->view("surrender/print");
		}
	}
?>