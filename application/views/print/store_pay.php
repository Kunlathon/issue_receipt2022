<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
//--include
//--pay
	include("tools/js/pay.php");
	include("tools/js/pay_scb.php");
//--pay end
//DB admission
	include("tools/database/pdo_admission_rc.php");
	include("tools/database/class_admission_rc.php");
//DB admission end
//DB rc_store
	include("tools/database/pdo_rc_store.php");
	include("tools/database/class_rc_store.php");	
//DB rc_store end
//class function
	include("tools/sql_pdo/gotolink.php");
	$ip_admission=$_SERVER["REMOTE_ADDR"];
	$golink=new goingtolink($ip_admission);
	$goinglink=$golink->Rungotolink(); 
//class function end
//--include end
//set
	$SetYear=new SetYear();
	$est_year=$SetYear->RunSetYear();
//set end
?>

<?php
	/*$Pay_RSR_No="2565002";
	$Pay_RSR_Sud="18517";
	$Pay_RSR_year="2564";
	$Pay_RSR_Card="2579900059087";
	$Pay_RSR_IDReg="6403027";*/

			if(isset($Pay_RSR_No,$Pay_RSR_Sud,$Pay_RSR_year)){
				
				$StudentAdmission=new PrintStudentAdmission($Pay_RSR_Sud);
				
				?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!DOCTYPE html>
<html>
<head>
	<title>ใบเสร็จรับเงิน</title>

<!-- Global stylesheets -->
	<link href="<?php echo base_url();?>/tools/Bootstrap 3/Template/layout_3/LTR/material/full/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">-
<!-- /global stylesheets -->		
<!--Code Print css-->
	<link rel="stylesheet" href="<?php echo base_url();?>/tools/js/print_css_js/css/normalize.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/tools/js/print_css_js/css/paper.css"> 	
<!--Code Print css End-->

</head>

	<style>
		.psrA{
			margin: auto;
			border: 2px solid #73AD21;
		}
	</style>

	<style>
		@font-face {
            font-family: 'THSarabunNew';
            src: url('<?php echo base_url();?>tools/font/thsarabunnew-webfont.eot');
            src: url('<?php echo base_url();?>tools/font/thsarabunnew-webfont.eot?#iefix') format('embedded-opentype'),
            url('<?php echo base_url();?>tools/font/thsarabunnew-webfont.woff') format('woff'),
            url('<?php echo base_url();?>tools/font/THSarabunNew.ttf') format('truetype');
		}
		body{
			font-family: "THSarabunNew";
			font-size: 18px;
			color: #032E3B;
		}        
	</style>

	<style>
		@media print {
				
			@page{
				size: A4;
				margin: 1 cm;
			}
				
			button {
				display:none;
			}
				
			#p_echo{
				display:none;
			}
				
			body{
				font-family: "THSarabunNew";
				font-size: 16pt; 
							
			}
		}
			
		body{
			width: 210mm; height: 297mm;
		}
		.printA{
			width: 210mm; height: 297mm;
		}
	</style>

	<script type="text/javascript">
        function setScreenHWCookie() {
            $.cookie('sw',screen.width);
                //$.cookie('sh',screen.height);
            return true;
        }
            setScreenHWCookie();
    </script>

	<?php
		$width_system=filter_input(INPUT_COOKIE,'sw');
		if($width_system>=1200){
			$grid="lg";
		}elseif($width_system<=992){
			$grid="md";
		}elseif($width_system<=768){
			$grid="sm";
		}else{
			$grid="xs";
		}
    ?>

<!--****************************************************************************-->
	
<!-- Core JS files -->
<script src="<?php echo base_url();?>tools/Bootstrap 3/Template/global_assets/js/core/libraries/jquery.min.js"></script>
	<script src="<?php echo base_url();?>tools/Bootstrap 3/Template/global_assets/js/core/libraries/bootstrap.min.js"></script>
<!-- /core JS files -->	
<!--Code Print js-->
	<script src="<?php echo base_url();?>tools/js/print_css_js/js/html2canvas.js"></script>	
<!--Code Print js End-->	

	<body onload="window.print()">

		<div id="p_echo">
			<div class="container psrA">
				<div class="row">
					<div class="col-<?php echo $grid;?>-12">
						<div class="table-responsive">
							<table class="table" align="center">
								<thead>
									<tr>
										<th style="width: 20%">
											<div><button type="button"  class="btn btn-default" onclick="window.print()"><b>พิมพ์&nbsp;ใบเสร็จรับเงิน</b></button></div>
										</th>
									</tr>
									<tr>
										<th style="width: 20%">
											<div><font color="#F70105"><b>ระบบการพิมพ์ &nbsp;รองรับ&nbsp;เว็บเบราว์เซอร์ &nbsp;Google&nbsp;Chrome&nbsp;และ &nbsp;Microsoft&nbsp;Edge&nbsp;เท่านั้น<b></font></div>
										</th>								
									</tr>
								</thead>						
							</table>
							<table class="table" align="center">
								<thead>
									<tr>
										<th style="width: 20%"><div>ขนาดกระดาษ</div></th>
										<th style="width: 20%"><div>แนวกระดาษ</div></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><div>A4&nbsp;:&nbsp;210mm&nbsp;X&nbsp;296mm</div></td>
										<td><div>แนวตั้ง</div></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>		
				</div>		
			</div>
		</div>

		<?php
			$Call_Rcstore_Receipt=new DataRcstoreReceipt($Pay_RSR_Sud,$Pay_RSR_year,"B");
			foreach($Call_Rcstore_Receipt->RunDataRcstoreReceipt() as $rc=>$CRR_Row){
				$CRR_RSR_NO=$CRR_Row["RSR_NO"];
				$CRR_RSR_Sud=$CRR_Row["RSR_Sud"];
				$CRR_RSR_Year=$CRR_Row["RSR_Year"];
				$CRR_RSR_DateTime=$CRR_Row["RSR_DateTime"];
				$CRR_RSR_Officer=$CRR_Row["RSR_Officer"];
				$CRR_RSR_Pay=$CRR_Row["RSR_Pay"];
				$CRR_RSR_tre_id=$CRR_Row["RSR_tre_id"];
				$RSR_PayTime=$CRR_Row["RSR_PayTime"];

				$RSR_PayTime=date("d-m-Y",strtotime("+543 year",strtotime($RSR_PayTime)));

				$PayTime=date_create($RSR_PayTime);

				$RSR_Print=date("Y-m-d");
				$RSR_Print=date("d-m-Y",strtotime("+543 year",strtotime($RSR_Print)));
				$Print_Time=date_create($RSR_Print);

			}
		
				if(($CRR_RSR_tre_id!=null)){
					$CopyDate_treasurer=new manage_treasurer('read_id',$CRR_RSR_tre_id,'-','-');
					if(($CopyDate_treasurer->Run_Manage_Error()=="no_error")){
						foreach($CopyDate_treasurer->Run_Manage_Row() as $key=>$CopyDate_treasurerRow){
							$tre_key=$CopyDate_treasurerRow["tre_id"];
							$tre_txt=$CopyDate_treasurerRow["tre_name"];
						} 
					}else{
						$tre_key=null;
						$tre_txt=null;
					}
				}else{
					$tre_key=null;
					$tre_txt=null;
				}
		?>

<!---->
	<section class="sheet padding-10mm printA">

		<table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td style="text-align :left; font-style:bold; font-size: 25px;"><!--<div> เล่มที่ ............</div>--></td>
				<td style="text-align :right; font-style:bold; font-size: 25px;"><div>
				เลขที่ <font><?php echo $CRR_RSR_NO;?></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></td>
			</tr>
		</table>

		<table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td style="text-align :center; font-style:bold; font-size: 25px; "><div style="font-weight: bold;">ใบเสร็จรับเงิน<div></td>
			</tr>
		</table>

		<table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td style="width: 140px;">
					<div><img src="<?php echo base_url();?>/tools/img/images/ss.png" alt="โรงเรียนเรยีนาเชลีวิทยาลัย จังหวัดเชียงใหม่"   style="width: 125px; height: 124px;"/></div>
				</td>
				<td style="width: 600px;">
					<div style="text-align :left; font-style:bold; font-size: 20px; font-weight: bold; ">สมาคมสถานศึกษาเอกชนจังหวัดเชียงใหม่&nbsp;</div>
					<div style="text-align :left; font-style:bold; font-size: 20px; font-weight: bold; ">Chiang Mai Private Education Institution Association&nbsp;</div>
					<div style="text-align :left; font-style:bold; font-size: 18px; ">409 ถนนเจริญประเทศ ต.ช้างคลาน อ.เมืองเชียงใหม่ จ.เชียงใหม่ 50100&nbsp;</div>
					<div style="text-align :left; font-style:bold; font-size: 18px; ">โทร 053-276209&nbsp;</div>
				</td>
			</tr>
		</table>

		<table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td style="text-align :left; font-style:bold; font-size: 18px;">
					<div>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						วันที่&nbsp;<font style="color: blue"><?php echo date_format($Print_Time,"d/m/Y") ;?></font>&nbsp;
					</div>
				</td>
			</tr>
			<tr>
				<td style="text-align :left; font-style:bold; font-size: 18px;">
					<div>ได้รับเงินจาก&nbsp;<font style="color: blue"><?php echo $StudentAdmission->fnameTh."&nbsp";?></font></div>
					<div>ตามรายการดังต่อไปนี้</div>
				</td>				
			</tr>
		</table>


		<table style="width: 690px; font-style:bold; font-size: 18px;" border="1" cellpadding="0" cellspacing="0">
			<tr>
				<th style="width: 60px;">
					<div>ลำดับที่</div>
				</th>
				<th style="width: 440px;" colspan="2">
					<div>รายการ</div>
				</th>
				<th style="width: 240px;">
					<div>จำนวนเงิน</div>
					<div>(บาท)</div>
				</th>
			</tr>
			<tr>
				<td style="vertical-align: text-top;">
					<div style="text-align :center; font-style:bold; font-size: 18px;">1</div>
				</td>
				<td colspan="2">

					<table style="width: 440px;" border="0"  cellpadding="0" cellspacing="0">
						<tr>
							<td style="width: 290px;">

								<div style="text-align :left; font-style:bold; font-size: 18px;">&nbsp;&nbsp;&nbsp;&nbsp;ค่าบำรุงสมาชิกรายหัว สศอ.ชม. ปีการศึกษา <?php echo $CRR_RSR_Year;?></div>
								<div style="text-align :left; font-style:bold; font-size: 18px;">&nbsp;&nbsp;&nbsp;&nbsp;ตามรายการ ดังนี้</div>

	<?php
		$StoreListRun=new RowRcStoreList($Pay_RSR_No);
		$rs_count=1; 
			foreach($StoreListRun->PrintRowRcStoreList() as $rc=>$StoreListRow){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
		<?php
			$sid_id=$StoreListRun->PrintRSR_sid_id();
			$PrintData_IncreaseDecrease=new ShowDataIncreaseDecrease("Row",$sid_id);
			foreach($PrintData_IncreaseDecrease->RunDataSDIDLoop() as $pay=>$PrintData_IncreaseDecreaseRow){
				$sid_int=$PrintData_IncreaseDecreaseRow["sid_int"];
				$status_maths=$PrintData_IncreaseDecreaseRow["status_maths"];
				$sid_txt=$PrintData_IncreaseDecreaseRow["sid_txt"];
			}

				if(($PrintData_IncreaseDecrease->RunDataSDIDError()=="NoError")){
					if(($sid_id!="sid01")){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php
						if(($StoreListRow["RL_Price"]!="0.00")){ ?>

								<div style="text-align :left; font-style:bold; font-size: 18px;">
								&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $StoreListRow["RSD_Txt"];?>
								</div>


				<?php $rs_count=$rs_count+1; ?>

				<?php	}else{} ?>	
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
		<?php		}else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
				<?php
						if(($StoreListRow["RL_Price"]!="0.00")){ ?>

							<div style="text-align :left; font-style:bold; font-size: 18px;">
							&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $StoreListRow["RSD_Txt"];?>
						    </div>


				<?php $rs_count=$rs_count+1; ?>

				<?php	}else{} ?>	
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
		<?php       } ?>
		<?php 	}else{} ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<?php	} ?>


							</td>
							<td style="width: 50px;">
								<div style="text-align :left; font-style:bold; font-size: 18px;">&nbsp;</div>
								<div style="text-align :left; font-style:bold; font-size: 18px;">&nbsp;</div>
						
	<?php
		$StoreListRun=new RowRcStoreList($Pay_RSR_No);
		$rs_count=1; 
			foreach($StoreListRun->PrintRowRcStoreList() as $rc=>$StoreListRow){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
		<?php
			$sid_id=$StoreListRun->PrintRSR_sid_id();
			$PrintData_IncreaseDecrease=new ShowDataIncreaseDecrease("Row",$sid_id);
			foreach($PrintData_IncreaseDecrease->RunDataSDIDLoop() as $pay=>$PrintData_IncreaseDecreaseRow){
				$sid_int=$PrintData_IncreaseDecreaseRow["sid_int"];
				$status_maths=$PrintData_IncreaseDecreaseRow["status_maths"];
				$sid_txt=$PrintData_IncreaseDecreaseRow["sid_txt"];
			}

				if(($PrintData_IncreaseDecrease->RunDataSDIDError()=="NoError")){
					if(($sid_id!="sid01")){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php
						if(($StoreListRow["RL_Price"]!="0.00")){ ?>

								<div style="text-align :left; font-style:bold; font-size: 18px;"><?php echo number_format($StoreListRow["RL_Price"], 0, '.', ',');?></div>


				<?php $rs_count=$rs_count+1; ?>

				<?php	}else{} ?>	
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
		<?php		}else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
				<?php
						if(($StoreListRow["RL_Price"]!="0.00")){ ?>

						


				<?php $rs_count=$rs_count+1; ?>

				<?php	}else{} ?>	
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
		<?php       } ?>
		<?php 	}else{} ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<?php	} ?>						

						
							</td>

							<td style="width: 50px;">
								<div style="text-align :left; font-style:bold; font-size: 18px;">&nbsp;</div>
								<div style="text-align :left; font-style:bold; font-size: 18px;">&nbsp;</div>
	<?php
		$StoreListRun=new RowRcStoreList($Pay_RSR_No);
		$rs_count=1; 
			foreach($StoreListRun->PrintRowRcStoreList() as $rc=>$StoreListRow){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
		<?php
			$sid_id=$StoreListRun->PrintRSR_sid_id();
			$PrintData_IncreaseDecrease=new ShowDataIncreaseDecrease("Row",$sid_id);
			foreach($PrintData_IncreaseDecrease->RunDataSDIDLoop() as $pay=>$PrintData_IncreaseDecreaseRow){
				$sid_int=$PrintData_IncreaseDecreaseRow["sid_int"];
				$status_maths=$PrintData_IncreaseDecreaseRow["status_maths"];
				$sid_txt=$PrintData_IncreaseDecreaseRow["sid_txt"];
			}

				if(($PrintData_IncreaseDecrease->RunDataSDIDError()=="NoError")){
					if(($sid_id!="sid01")){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php
						if(($StoreListRow["RL_Price"]!="0.00")){ ?>

								<div style="text-align :left; font-style:bold; font-size: 18px;">คน</div>

				<?php $rs_count=$rs_count+1; ?>

				<?php	}else{} ?>	
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
		<?php		}else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
				<?php
						if(($StoreListRow["RL_Price"]!="0.00")){ ?>

						


				<?php $rs_count=$rs_count+1; ?>

				<?php	}else{} ?>	
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
		<?php       } ?>
		<?php 	}else{} ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<?php	} ?>						

							</td>



						</tr>
					</table>

				</td>
				<td>
<!--+++++++-->			

					<div style="text-align :left; font-style:bold; font-size: 18px;">&nbsp;</div>
					<div style="text-align :left; font-style:bold; font-size: 18px;">&nbsp;</div>


	<?php
		$StoreListRun=new RowRcStoreList($Pay_RSR_No);
		$rs_count=1; 
			foreach($StoreListRun->PrintRowRcStoreList() as $rc=>$StoreListRow){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
		<?php
			$sid_id=$StoreListRun->PrintRSR_sid_id();
			$PrintData_IncreaseDecrease=new ShowDataIncreaseDecrease("Row",$sid_id);
			foreach($PrintData_IncreaseDecrease->RunDataSDIDLoop() as $pay=>$PrintData_IncreaseDecreaseRow){
				$sid_int=$PrintData_IncreaseDecreaseRow["sid_int"];
				$status_maths=$PrintData_IncreaseDecreaseRow["status_maths"];
				$sid_txt=$PrintData_IncreaseDecreaseRow["sid_txt"];
			}

				if(($PrintData_IncreaseDecrease->RunDataSDIDError()=="NoError")){
					if(($sid_id!="sid01")){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php
						if(($StoreListRow["RL_Price"]!="0.00")){ ?>

								<div style="text-align :right; font-style:bold; font-size: 18px;">
								<?php echo number_format($StoreListRow["RL_Price"]*10, 2, '.', ',');?>&nbsp;&nbsp;
								</div>

								<!--ชั่วคราวไปก่อน กลับมาแก้-->

				<?php $rs_count=$rs_count+1; ?>

				<?php	}else{} ?>	
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
		<?php		}else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
				<?php
						if(($StoreListRow["RL_Price"]!="0.00")){ ?>

								<div style="text-align :right; font-style:bold; font-size: 18px;">
								<?php echo number_format($StoreListRow["RL_Price"], 2, '.', ',');?>&nbsp;&nbsp;
								</div>


				<?php $rs_count=$rs_count+1; ?>

				<?php	}else{} ?>	
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
		<?php       } ?>
		<?php 	}else{} ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<?php	} ?>	


<!--+++++++-->
				</td>
			</tr>
	
	<?php $bathformat=new bathformat(number_format($StoreListRun->PrintSumRcStoreList(), 2, '.', ','));?>		
			
			<tr>
				<td colspan="3">
					<div style="text-align :left; font-style:bold; font-size: 18px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ตัวอักษร&nbsp;(<?php echo $bathformat->run_pay();?>)</div>
				</td>
    			<td>
				<div style="text-align :right; font-style:bold; font-size: 18px;"><?php echo number_format($StoreListRun->PrintSumRcStoreList(), 2, '.', ',');?>&nbsp;&nbsp;</div>
				
				</td>
			</tr>
		</table>
		<div>&nbsp;</div>
		<div>&nbsp;</div>
		<table style=" width: 740px; font-size: 18px;" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td style="vertical-align: text-top;"><div >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ชำระโดย</div></td>					
					<td >
						
		<?php
				if($CRR_RSR_Pay=="C"){	?>
						<div>&nbsp;<img src="<?php echo base_url();?>tools/img/f.JPG" width="22" height="22" alt=""/>&nbsp;&nbsp;เงินสด&nbsp;&nbsp;</div>
						<div>&nbsp;<img src="<?php echo base_url();?>tools/img/t.JPG" width="22" height="22" alt=""/>&nbsp;&nbsp;เงินโอน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>				
		<?php	}elseif($CRR_RSR_Pay=="M"){	?>
						<div>&nbsp;<img src="<?php echo base_url();?>tools/img/t.JPG" width="22" height="22" alt=""/>&nbsp;&nbsp;เงินสด&nbsp;&nbsp;</div>
						<div>&nbsp;<img src="<?php echo base_url();?>tools/img/f.JPG" width="22" height="22" alt=""/>&nbsp;&nbsp;เงินโอน&nbsp;&nbsp;วันที่&nbsp;&nbsp;<?php echo date_format($PayTime,"d/m/Y");?>&nbsp;&nbsp;</div>		
		<?php	}else{	?>
						<div>&nbsp;<img src="<?php echo base_url();?>tools/img/t.JPG" width="22" height="22" alt=""/>&nbsp;&nbsp;เงินสด&nbsp;&nbsp;</div>
						<div>&nbsp;<img src="<?php echo base_url();?>tools/img/t.JPG" width="22" height="22" alt=""/>&nbsp;&nbsp;เงินโอน&nbsp;&nbsp;</div>				
		<?php	} ?>			
						<div>&nbsp;</div>
						<!--<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						วันที่&nbsp;&nbsp;<?php echo date_format($PayTime,"d/m/Y");?>&nbsp;&nbsp;</div>
						<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						ลงชื่อผู้รับเงิน.......................................................</div>-->
					</td>
				</tr>
			</tbody>
		</table>

		<div>&nbsp;</div>


		<table style="text-align :center; width: 740px; font-size: 18px;" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td>
						<div>ลงชื่อ&nbsp;<img src="<?php echo base_url();?>/tools/image/treasurer/<?php echo $tre_key;?>.jpg" class="img-rounded" alt="Cinque Terre">&nbsp;ผู้รับเงิน</div>
						<div>
							(&nbsp;<?php echo $tre_txt;?>&nbsp;)</div>
						<div>	
							เหรัญญิกสมาคมสถานศึกษาเอกชน จังหวัดเชียงใหม่</div>
						<br>
					</td>
				</tr>
			</tbody>
		</table>


	</section>
<!---->


	</body>

</html>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<?php 	}else{} 
	
	?>
