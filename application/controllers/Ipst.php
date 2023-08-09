<?php
	class Ipst extends CI_Controller {
		public function index(){
			$this->load->view("ipst/ipst_test");
		}		
		public function testing(){
			$this->load->view("ipst/ipst");
		}

	}
?>