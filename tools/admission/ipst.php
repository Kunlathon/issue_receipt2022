<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ประกาศรายชื่อผู้มีสิทธิ์สอบ&nbsp;ห้องเรียนพิเศษ&nbsp;สสวท.&nbsp;</title>
	<link href="<?php echo base_url();?>/tools/img/logoserviam.png" rel="shortcut icon" type="image/png">
	<link href="<?php echo base_url();?>/tools/img/logoserviam.png" rel="apple-touch-icon">
	<link href="<?php echo base_url();?>/tools/img/logoserviam.png" rel="apple-touch-icon" sizes="72x72">
	<link href="<?php echo base_url();?>/tools/img/logoserviam.png" rel="apple-touch-icon" sizes="114x114">
	<link href="<?php echo base_url();?>/tools/img/logoserviam.png" rel="apple-touch-icon" sizes="144x144">
	

	<!-- Global stylesheets -->

	<link href="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>/tools/Bootstrap 3/Template/layout_3/LTR/default/full/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>/tools/Bootstrap 3/Template/layout_3/LTR/default/full/assets/css/core.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>/tools/Bootstrap 3/Template/layout_3/LTR/default/full/assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>/tools/Bootstrap 3/Template/layout_3/LTR/default/full/assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->
	<!--css code-->
<style>
	@font-face {
			font-family: 'surafont_sanukchang';
			src: url('<?php echo base_url();?>/tools/font/surafont_sanukchang-webfont.eot');
			src: url('<?php echo base_url();?>/tools/font/surafont_sanukchang-webfont.eot?#iefix') format('embedded-opentype'),
			url('<?php echo base_url();?>/tools/font/surafont_sanukchang-webfont.woff') format('woff'),
			url('<?php echo base_url();?>/tools/font/surafont_sanukchang.ttf') format('truetype');
	}

	body{
			font-family: "surafont_sanukchang";
			font-size: 16px;
			color: #032E3B;
		}
	
</style>
	


	<!-- Core JS files -->
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/loaders/pace.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/core/libraries/jquery.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/core/libraries/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/forms/styling/switch.min.js"></script>


	<script src="Bootstrap 3/Template/global_assets/js/demo_pages/form_checkboxes_radios.js"></script>
	<!-- /theme JS files -->

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
	<?php
		include("tools/js_top.php");
	?>
<script>
	$(document).ready(function (){
		$("#button_cilk").click(function(){
			var stu_id=$("#stu_id").val();
			if(stu_id!=""){
				$.post("<?php echo base_url();?>/tools/code/oepn_admin.php",{
					copy_stuID:stu_id
				},function (data){
					if(data !=""){
						$("#show_admiss").html(data)
					}
				})
			}
			
		})
		
	})
</script>	
<!--****************************************************************************-->	

</head>

<body class="col-<?php echo $grid;?>-12" style="background-color: #00CCFF;">
	<div class="page-container">
		<div class="page-content">		
			<div class="row">
				<div class="col-<?php echo $grid;?>-12">
					<img src="<?php echo base_url();?>/tools/img/641103-002-02.jpg" alt="Cinque Terre" usemap="#Map" class="img-thumbnail" style="width: 100%;" >
				</div>
			</div>
			<div class="row">
				<div class="col-<?php echo $grid;?>-6">
					<div class="panel panel-info">
						<div class="panel-heading">ตรวจสอบรายชื่อผู้มีสิทธิ์สอบห้องเรียนพิเศษ สสวท.</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-<?php echo $grid;?>-10">
									<fieldset class="content-group">
										<div class="form-group">
											<label class="control-label col-<?php echo $grid;?>-6"><b style="color: #00008B">เลขบัตรประจำตัวประชาชนของนักเรียน</b></label>
											<div class="col-<?php echo $grid;?>-6">
												<div class="input-group">
													<input type="text" name="stu_id" id="stu_id"  maxlength="13" minlength="5"  class="form-control" required="required" size="100" style="font-family: surafont_sanukchang; font-size: 26px">
												</div>
											</div>
										</div>
									</fieldset>					
								</div>
								<div class="col-<?php echo $grid;?>-2">
									<button type="submit" id="button_cilk" name="button_cilk" class="btn btn-primary" style="font-family: surafont_sanukchang; font-size: 16px">ตรวจสอบ</button>
								</div>
							</div>
						</div>
					</div>						
				</div>
				<div id="show_admiss">
					<!--<div class="col-<?php //echo $grid;?>-6">
						<div class="panel panel-info">
							<div class="panel-heading">กำหนดการ....</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-<?php //echo $grid;?>-10">
										<div>-&nbsp;วันที่&nbsp;3&nbsp;พฤศจิกายน&nbsp;2564&nbsp;ตรวจสอบรายชื่อผู้มีสิทธิ์มอบตัว&nbsp;นักเรียนชั้น&nbsp;อ.3&nbsp;และ&nbsp;ป.1</div>
										<div>-&nbsp;วันที่&nbsp;6&nbsp;พฤศจิกายน&nbsp;2564&nbsp;<font color="#FF0000"><u>ยกเลิก</u></font>&nbsp;การทดสอบความพร้อมการเรียนและการสัมภาษณ์&nbsp;นักเรียนชั้น&nbsp;อ.3&nbsp;และ&nbsp;ป.1&nbsp;เนื่องด้วยสถานการณ์การแพร่ระบาดของโรคติดเชื้อไวรัสโคโรน่า&nbsp;2019&nbsp;(Covid-19)</div>
										<div>-&nbsp;วันที่&nbsp;6-25&nbsp;พฤศจิกายน&nbsp;2564&nbsp;กรอกใบมอบตัวในระบบออนไลน์&nbsp;(พิมพ์ใบมอบตัว)&nbsp;และชำระเงินค่าธรรมเนียมการเรียน&nbsp;ปีการศึกษา&nbsp;2565</div>
										<div>-&nbsp;วันที่&nbsp;5&nbsp;กุมภาพันธ์ 2565&nbsp;รายงานตัว&nbsp;พร้อมยื่นเอกสารมอบตัว&nbsp;และวัดตัวตัดชุดเครื่องแบบนักเรียน</div>								
									</div>
								</div>
							</div>
						</div>				
					</div>-->
				</div>
			</div>
						
		</div>
	</div>	
	
	
	<div class="page-container">
		<div class="page-content">
<!-- Footer -->
			<?php
				include("tools/footer.php");
			?>
<!-- /footer -->
		</div>
	</div	

</body>
</html>



