<?php
	class Print_admission extends CI_Controller{
		public function qrcode_pay(){
			$this->load->view('print/qrcode_pay');
		}
		public function store_pay($Pay_RSR_No,$Pay_RSR_Sud,$Pay_RSR_year){
			$run_store_pay=array('Pay_RSR_No'=>$Pay_RSR_No,'Pay_RSR_Sud'=>$Pay_RSR_Sud,'Pay_RSR_year'=>$Pay_RSR_year);
			$this->load->view('print/store_pay',$run_store_pay);
		}
		
		public function show_sum_store(){
			$this->load->view('print/show_sum_store');
		}
	}
?>