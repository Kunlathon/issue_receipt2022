<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	include("tools/js/pay.php");
	include("tools/js/pay_scb.php");
//----------------------------------------------------------------------------
	include("tools/database/pdo_admission_rc.php");
	include("tools/database/class_admission_rc.php");
//----------------------------------------------------------------------------	
	include("tools/database/pdo_rc_store.php");
	include("tools/database/class_rc_store.php");
//----------------------------------------------------------------------------
	include("tools/sql_pdo/gotolink.php");
	$ip_admission=$_SERVER["REMOTE_ADDR"];
	$golink=new goingtolink($ip_admission);
	$goinglink=$golink->Rungotolink(); 
//---------------------------------------------------------------------------
//---------------------------------------------------------------------------
	$SetYear=new SetYear();
	$est_year=$SetYear->RunSetYear();
//--------------------------------------------------------------------------
	
?>


<?php
	/*$Pay_RSR_No="2565002";
	$Pay_RSR_Sud="18517";
	$Pay_RSR_year="2564";
	$Pay_RSR_Card="2579900059087";
	$Pay_RSR_IDReg="6403027";*/
		if(isset($Pay_RSR_No,$Pay_RSR_Sud,$Pay_RSR_year)){ ?>
<?php
	$StudentAdmission=new PrintStudentAdmission($Pay_RSR_Sud);	
	
	/*switch($StudentAdmission->level){
		case 3:
			$class_txt="อ.3";
		break;
		case 11:
			$class_txt="ป.1";
		break;
		case 12:
			$class_txt="ป.2";
		break;
		case 13:
			$class_txt="ป.3";
		break;
		case 21:
			$class_txt="ป.4";
		break;
		case 22:
			$class_txt="ป.5";
		break;
		case 23:
			$class_txt="ป.6";
		break;
		case 31:
			$class_txt="ม.1";
		break;
		case 32:
			$class_txt="ม.2";
		break;
		case 33:
			$class_txt="ม.3";
		break;
		case 41:
			$class_txt="ม.4";
		break;
		default:
			$class_txt=null;
	}*/
?>		
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>QR&nbsp;Code&nbsp;For&nbsp;Bill&nbsp;Payment&nbsp;(BOT&nbsp;Format)</title>

<!-- Global stylesheets -->
    <link href="<?php echo base_url();?>/tools/Bootstrap 3/Template/layout_3/LTR/material/full/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<!-- /global stylesheets -->		
<!--Code Print css-->
	<link rel="stylesheet" href="<?php echo base_url();?>/tools/js/print_css_js/css/normalize.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/tools/js/print_css_js/css/paper.css"> 	
<!--Code Print css End-->

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
				width: 210mm; height: 296mm;
			}
				.printA{
				width: 210mm; height: 296mm;
			}
		</style>
<!--****************************************************************************-->			
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
</head>

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
										<div><button type="button"  class="btn btn-default" onclick="window.print()"><b>พิมพ์&nbsp;ใบแทนใบเสร็จรับเงิน&nbsp;ค่าเครื่องแบบนักเรียน&nbsp;ปีการศึกษา&nbsp;<?php echo $est_year;?></b></button></div>
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
	$Call_Rcstore_Receipt=new DataRcstoreReceipt($Pay_RSR_Sud,$Pay_RSR_year,"A");
		foreach($Call_Rcstore_Receipt->RunDataRcstoreReceipt() as $rc=>$CRR_Row){
			$CRR_RSR_NO=$CRR_Row["RSR_NO"];
			$CRR_RSR_Sud=$CRR_Row["RSR_Sud"];
			$CRR_RSR_Year=$CRR_Row["RSR_Year"];
			$CRR_RSR_DateTime=$CRR_Row["RSR_DateTime"];
			$CRR_RSR_Officer=$CRR_Row["RSR_Officer"];
			$CRR_RSR_Pay=$CRR_Row["RSR_Pay"];
		}
?>

	<section class="sheet padding-10mm printA">

        <table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td><div><img src="<?php echo base_url();?>/tools/img/images/logo_rc.jpg" alt="โรงเรียนเรยีนาเชลีวิทยาลัย จังหวัดเชียงใหม่"   style="width: 65px; height: 69px;"/></div></td>
                    <td><div style="text-align :center; font-style:bold; font-size: 28px;"><b>ใบแทนใบเสร็จรับเงิน&nbsp;ค่าเครื่องแบบนักเรียน&nbsp;ปีการศึกษา&nbsp;<?php echo $est_year;?></b></div>
						<div style="text-align :center;">ชื่อ - สกุล &nbsp;<?php echo $StudentAdmission->fnameTh."&nbsp";?></div>
					</td>
					<td>
						<div style="text-align :center; font-style:bold;"><b>สำหรับโรงเรียน</b></div>
						<div>เลขที่&nbsp;<?php echo $CRR_RSR_NO;?></div>
						<div>วันที่&nbsp;<?php echo date("d/m/Y");?></div>
					</td>
                </tr>
            </tbody>
        </table>
		<table style="width: 740px;" border="1" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th style="width: 146px;"><div>ลำดับ</div></th>
					<th style="width: 446px;"><div>รายการ</div></th>
					<th style="width: 146px;"><div>จำนวน&nbsp;/&nbsp;บาท</div></th>
				</tr>
			</thead>
			<tbody>
	<?php
		$StoreListRun=new RowRcStoreList($Pay_RSR_No);
		$rs_count=1; 
			foreach($StoreListRun->PrintRowRcStoreList() as $rc=>$StoreListRow){ ?>
			
				<tr style="vertical-align: top;">
					<td style="text-align :center;"><div><?php echo $rs_count;?></div></td>
					<td><div>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $StoreListRow["RSD_Txt"];?></div></td>
					<td style="text-align :right;"><div><?php echo number_format($StoreListRow["RL_Price"], 2, '.', ',');?>&nbsp;&nbsp;&nbsp;&nbsp;</div></td>
				</tr>			
			
	<?php	$rs_count=$rs_count+1;
			} ?>

<?php $bathformat=new bathformat(number_format($StoreListRun->PrintSumRcStoreList(), 2, '.', ','));?>

				<tr style="vertical-align: top;">
					<td style="text-align :center;"><div>รวม</div></td>
					<td style="text-align :center;"><div><?php echo $bathformat->run_pay();?></div></td>
					<td style="text-align :right;"><div><?php echo number_format($StoreListRun->PrintSumRcStoreList(), 2, '.', ',');?>&nbsp;&nbsp;&nbsp;&nbsp;</div></td>
				</tr>
				
			</tbody>		
		</table>
<?php
	$BillerId="099400043439110";
	$Ref1=$Pay_RSR_Sud;
    $Ref2="RCSTORE".$Pay_RSR_No;
    $Amount=number_format($StoreListRun->PrintSumRcStoreList(), 2, '.', '');
    $Width=145;
	$qrcode_scb=new qrcode_scb($BillerId,$Ref1,$Ref2,$Amount,$Width);
?>
	<div>&nbsp;</div>
		<table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td style="width: 370px;">
					    <div>
                            <center><img src="<?php echo $qrcode_scb->call_qrcode_scb();?>"  width="145"><center>    
                        </div>
                        <div style="text-align :left;">Biller&nbsp;ID&nbsp;:&nbsp;<?php echo $BillerId;?></div>
                        <div style="text-align :left;">Ref.1&nbsp;:&nbsp;<?php echo $Ref1;?></div>
                        <div style="text-align :left;">Ref.2&nbsp;:&nbsp;<?php echo $Ref2;?></div> 
					</td>					
					<td style="width: 370px;">
						<div style="text-align :center;">ช่องทางการชำระเงิน</div>
		<?php
				if($CRR_RSR_Pay=="C"){	?>
						<div>&nbsp;<img src="<?php echo base_url();?>tools/img/f.JPG" width="22" height="22" alt=""/>&nbsp;เงินสด</div>
						<div>&nbsp;<img src="<?php echo base_url();?>tools/img/t.JPG" width="22" height="22" alt=""/>&nbsp;เงินโอน&nbsp;(QRCode)</div>				
		<?php	}elseif($CRR_RSR_Pay=="M"){	?>
						<div>&nbsp;<img src="<?php echo base_url();?>tools/img/t.JPG" width="22" height="22" alt=""/>&nbsp;เงินสด</div>
						<div>&nbsp;<img src="<?php echo base_url();?>tools/img/f.JPG" width="22" height="22" alt=""/>&nbsp;เงินโอน&nbsp;(QRCode)</div>		
		<?php	}else{	?>
						<div>&nbsp;<img src="<?php echo base_url();?>tools/img/t.JPG" width="22" height="22" alt=""/>&nbsp;เงินสด</div>
						<div>&nbsp;<img src="<?php echo base_url();?>tools/img/t.JPG" width="22" height="22" alt=""/>&nbsp;เงินโอน&nbsp;(QRCode)</div>				
		<?php	} ?>	
						<br>
						<div>ชื่อ-สกุล(ผู้โอน)....................................................</div>
						<div>เบอร์โทรศัพท์.......................................................</div>
						<br>
						<div>ลงชื่อผู้รับเงิน.......................................................</div>
					</td>
				</tr>
			</tbody>
		</table>
		
		<center><div>-----------------------------------------------------------------------------------------------------------------------------------------------------------</div></center>
		
		<table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td><div><img src="<?php echo base_url();?>/tools/img/images/logo_rc.jpg" alt="โรงเรียนเรยีนาเชลีวิทยาลัย จังหวัดเชียงใหม่"   style="width: 65px; height: 69px;"/></div></td>
                    <td><div style="text-align :center; font-style:bold; font-size: 28px;"><b>ใบแทนใบเสร็จรับเงิน&nbsp;ค่าเครื่องแบบนักเรียน&nbsp;ปีการศึกษา&nbsp;<?php echo $est_year;?></b></div>
						<div style="text-align :center;">ชื่อ - สกุล &nbsp;<?php echo $StudentAdmission->fnameTh."&nbsp;";?>&nbsp;</div>
					</td>
					<td>
						<div style="text-align :center; font-style:bold;"><b>สำหรับผู้ปกครอง</b></div>
						<div>เลขที่&nbsp;<?php echo $CRR_RSR_NO;?></div>
						<div>วันที่&nbsp;<?php echo date("d/m/Y");?></div>
					</td>
                </tr>
            </tbody>
        </table>
		
		<table style="width: 740px;" border="1" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th style="width: 146px;"><div>ลำดับ</div></th>
					<th style="width: 446px;"><div>รายการ</div></th>
					<th style="width: 146px;"><div>จำนวน&nbsp;/&nbsp;บาท</div></th>
				</tr>
			</thead>
			<tbody>
	<?php
		$StoreListRun=new RowRcStoreList($Pay_RSR_No);
		$rs_count=1; 
			foreach($StoreListRun->PrintRowRcStoreList() as $rc=>$StoreListRow){ ?>
			
				<tr style="vertical-align: top;">
					<td style="text-align :center;"><div><?php echo $rs_count;?></div></td>
					<td><div>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $StoreListRow["RSD_Txt"];?></div></td>
					<td style="text-align :right;"><div><?php echo number_format($StoreListRow["RL_Price"], 2, '.', ',');?>&nbsp;&nbsp;&nbsp;&nbsp;</div></td>
				</tr>			
			
	<?php	$rs_count=$rs_count+1;
			} ?>

<?php $bathformat=new bathformat(number_format($StoreListRun->PrintSumRcStoreList(), 2, '.', ','));?>

				<tr style="vertical-align: top;">
					<td style="text-align :center;"><div>รวม</div></td>
					<td style="text-align :center;"><div><?php echo $bathformat->run_pay();?></div></td>
					<td style="text-align :right;"><div><?php echo number_format($StoreListRun->PrintSumRcStoreList(), 2, '.', ',');?>&nbsp;&nbsp;&nbsp;&nbsp;</div></td>
				</tr>
				
			</tbody>		
		</table>		
	<div>&nbsp;</div>
		<table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td style="width: 370px;"><div>&nbsp;</div></td>					
					<td style="width: 370px;">
						<div style="text-align :center;">ช่องทางการชำระเงิน</div>
		<?php
				if($CRR_RSR_Pay=="C"){	?>
						<div>&nbsp;<img src="<?php echo base_url();?>tools/img/f.JPG" width="22" height="22" alt=""/>&nbsp;เงินสด</div>
						<div>&nbsp;<img src="<?php echo base_url();?>tools/img/t.JPG" width="22" height="22" alt=""/>&nbsp;เงินโอน&nbsp;(QRCode)</div>				
		<?php	}elseif($CRR_RSR_Pay=="M"){	?>
						<div>&nbsp;<img src="<?php echo base_url();?>tools/img/t.JPG" width="22" height="22" alt=""/>&nbsp;เงินสด</div>
						<div>&nbsp;<img src="<?php echo base_url();?>tools/img/f.JPG" width="22" height="22" alt=""/>&nbsp;เงินโอน&nbsp;(QRCode)</div>		
		<?php	}else{	?>
						<div>&nbsp;<img src="<?php echo base_url();?>tools/img/t.JPG" width="22" height="22" alt=""/>&nbsp;เงินสด</div>
						<div>&nbsp;<img src="<?php echo base_url();?>tools/img/t.JPG" width="22" height="22" alt=""/>&nbsp;เงินโอน&nbsp;(QRCode)</div>				
		<?php	} ?>			
						<br>
						<div>ชื่อ-สกุล(ผู้โอน)....................................................</div>
						<div>เบอร์โทรศัพท์.......................................................</div>
						<br>
						<div>ลงชื่อผู้รับเงิน.......................................................</div>
					</td>
				</tr>
			</tbody>
		</table>		
		
	</section>
    
</body>
</html>		
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->			
<?php	}else{
			
		}
?>