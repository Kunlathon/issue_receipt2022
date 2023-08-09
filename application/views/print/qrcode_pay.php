<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	include("tools/js/pay.php");
	include("tools/js/pay_scb.php");
?>


<?php
	$uesrid=$this->input->post("uesrid");
	$uesrname=$this->input->post("uesrname");
	$ref=$this->input->post("ref");
	$pay=$this->input->post("pay");
	$paytxt=$this->input->post("paytxt");
		if($uesrid==null and $uesrname==null and $ref==null and $pay==null and $paytxt==null){	?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->			
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->			
<?php	}elseif($uesrid==null or $uesrname==null or $ref==null or $pay==null or $paytxt==null){	?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->			
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->			
<?php	}else{	?>
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
                src: url('<?php echo base_url();?>/tools/font/thsarabunnew-webfont.eot');
                src: url('<?php echo base_url();?>/tools/font/thsarabunnew-webfont.eot?#iefix') format('embedded-opentype'),
                url('<?php echo base_url();?>/tools/font/thsarabunnew-webfont.woff') format('woff'),
                url('<?php echo base_url();?>/tools/font/THSarabunNew.ttf') format('truetype');
			}
			body{
				font-family: "THSarabunNew";
				font-size: 20px;
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
					font-size: 14pt; 
							
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
	<script src="<?php echo base_url();?>/tools//Bootstrap 3/Template/global_assets/js/core/libraries/jquery.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/core/libraries/bootstrap.min.js"></script>
<!-- /core JS files -->	
<!--Code Print js-->
	<script src="<?php echo base_url();?>/tools/js/print_css_js/js/html2canvas.js"></script>	
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
										<div><button type="button"  class="btn btn-default" onclick="window.print()"><b>พิมพ์&nbsp;รายการค่าธรรมเนียมทางการศึกษา&nbsp;ชั่วคราว</b></button></div>
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

    <section class="sheet padding-10mm printA">

        <table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td>
                        <div>
                            <center><div><img src="<?php echo base_url();?>/tools/img/images/logo_rc.jpg" alt="โรงเรียนเรยีนาเชลีวิทยาลัย จังหวัดเชียงใหม่"   style="width: 85px; height: 89px;"/></div></center>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>    

        <table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <th>
                        <div align="center">รายการค่าธรรมเนียมทางการศึกษา&nbsp;ชั่วคราว</div>
                        <div>ชื่อ - สกุล &nbsp;<?php echo $uesrname;?>&nbsp;เลขประจำตัวผู้สมัคร&nbsp;/&nbsp;นักเรียน&nbsp;<?php echo $uesrid;?>&nbsp;</div>
                    </th>                  
                </tr>
            </tbody>
        </table>
		
		<table style="width: 740px;" border="1" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <th style="width: 46px;"><div>ลำดับ</div></th>
                    <th style="width: 446px;"><div>รายการ</div></th>
                    <th style="width: 246px;"><div>ราคา</div></th>
                </tr>
                <tr>
                    
                    <td style="width: 46px;">
						<div>&nbsp;</div>
						<div>&nbsp;</div>
						<div><center>1</center></div>
						<div>&nbsp;</div>
						<div>&nbsp;</div>						
                    </td>
                    <td style="width: 656px;">
						<div>&nbsp;</div>
						<div>&nbsp;</div>					
						<div>&nbsp;<?php echo $paytxt;?></div>
						<div>&nbsp;</div>
						<div>&nbsp;</div>						
                    </td>
                    <td style="width: 36px;">
						<div>&nbsp;</div>
						<div>&nbsp;</div>					
						<div align="right"><?php echo number_format($pay, 2, '.', ',');?>&nbsp;&nbsp;&nbsp;</div>
						<div>&nbsp;</div>
						<div>&nbsp;</div>						
                    </td>
                    
                </tr> 
                 
                <tr>
                    <td></td>
                    <td>
						<?php $bathformat=new bathformat(number_format($pay, 2, '.', ','));?>
                        <div><center><?php echo $bathformat->run_pay();?> </center></div>
                    </td>
                    <td>
                        <div align="right"><?php echo number_format($pay, 2, '.', ',');?>&nbsp;&nbsp;&nbsp;</div>
                    </td>
                </tr>
                
            </tbody>
        </table>
<?php
	$BillerId="099400043439110";
	$Ref1=$uesrid."TEMPORARY";
    $Ref2=$ref;
    $Amount=$pay;
    $Width=180;
	$qrcode_scb=new qrcode_scb($BillerId,$Ref1,$Ref2,$Amount,$Width);
?>
        <br><br>
        <table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td>
                        <div>
                            <img src="<?php echo $qrcode_scb->call_qrcode_scb();?>" class="" width="180">    
                        </div>
                        <div>Biller&nbsp;ID&nbsp;:&nbsp;<?php echo $BillerId;?></div>
                        <div>Ref.1&nbsp;:&nbsp;<?php echo $Ref1;?></div>
                        <div>Ref.2&nbsp;:&nbsp;<?php echo $Ref2;?></div>   
                    </td>
                    <td>
                        <div><b>วิธีการชำระ</b></div>
                        <div>1&nbsp;.&nbsp;ทำการสแกน&nbsp;QR&nbsp;Code&nbsp;ที่ปรากฏในเพจนี้&nbsp;ด้วยแอปพลิเคชัน&nbsp;Mobile&nbsp;Banking&nbsp;ของท่าน</div>
                        <div>2&nbsp;.&nbsp;ตรวจสอบข้อมูลที่ปรากฏใน&nbsp;Mobile&nbsp;Banking&nbsp;ให้ถูกต้องก่อนชำระเงิน</div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;ตรวจสอบเลขประจำตัวผู้สมัคร&nbsp;/&nbsp;นักเรียน&nbsp;ให้ถูกต้อง</div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;ตรวจสอบจำนวนเงินให้ถูกต้อง</div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;ตรวจสอบชื่อผู้รับเงินต้องเป็น&nbsp;โรงเรียนเรยีนาเชลีวิทยาลัย&nbsp;หรือ&nbsp;REGINA&nbsp;COELI&nbsp;COLLEGE&nbsp;SCHOOL&nbsp;เท่านั้น</div>
                        <div>3&nbsp;.&nbsp;สำหรับหลักฐานการชำระเงินให้ท่านเก็บไว้เป็นหลักฐาน</div>
                        <div>4&nbsp;.&nbsp;ทางโรงเรียนจะทำการตรวจสอบรายการและยืนยันการชำระเงินของท่าน </div>
                        <div>5&nbsp;.&nbsp;การชำระเงินจะเสร็จสมบูรณ์&nbsp;เมื่อทางโรงเรียนได้ตรวจสอบการชำระเงินของท่านเรียบร้อยแล้ว</div>
                        <div>6&nbsp;.&nbsp;หากต้องการใบเสร็จรับเงิน&nbsp;ติดต่อขอรับได้ที่ห้องการเงินของโรงเรียน</div>
                        <div>7&nbsp;.&nbsp;กรณีต้องการสอบถามเพิ่มเติ่ม&nbsp;กรณาติดต่อ&nbsp;053-282395&nbsp;ต่อ&nbsp;0</div>
                    </td>
                    
                <tr>
            <tbody>
        </table>


    </section>
    
</body>
</html>		
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->			
<?php	}?>









