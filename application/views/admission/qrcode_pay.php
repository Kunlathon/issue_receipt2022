<?php	defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>QR&nbsp;Code&nbsp;For&nbsp;Bill&nbsp;Payment&nbsp;(BOT&nbsp;Format)</title>
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

	<!-- Theme JS files form_validation.html-->
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/forms/validation/validate.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/forms/inputs/touchspin.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/forms/styling/switch.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/demo_pages/form_validation.js"></script>
	<!-- /theme JS files -->


	<!-- Theme JS files -->
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/demo_pages/form_checkboxes_radios.js"></script>
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
<!--****************************************************************************-->		
</head>

<body class="col-<?php echo $grid;?>-12" style="background-color: #00CCFF;">

	<div class="page-container">
		<div class="page-content">
			<div class="row">
				<div class="col-<?php echo $grid;?>-12">
					<div class="jumbotron text-center">
						<div><h1>QR&nbsp;Code&nbsp;For&nbsp;Bill&nbsp;Payment</h1></div>
						<div>สร้าง&nbsp;QR&nbsp;Code&nbsp;สำหรับจ่ายเงินผ่าน Mobile&nbsp;Banking</div>
					</div>
				</div>
			</div>	
<form name="qrcode_pay" action="<?php echo base_url();?>print_admission/qrcode_pay" method="post">
			<div class="row">
				<div class="col-<?php echo $grid;?>-12">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h6 class="panel-title"><div>(BOT&nbsp;Format)</div></h6>
						</div>
						<div class="panel-body">
							<form class="form-horizontal" action="">
								<div class="row">
									<fieldset class="content-group">
										<div class="col-<?php echo $grid;?>-6">
											<div class="form-group">
												<div class="col-<?php echo $grid;?>-3">
													<input type="text" style="font-family: surafont_sanukchang; font-size: 20px;" name="uesrid" id="uesrid" class="form-control" minlength="3" maxlength="10" required="required" placeholder="เลขผู้สมัคร&nbsp;/&nbsp;เลขนักเรียน">
												</div>
												<div class="col-<?php echo $grid;?>-9">
													<input type="text" style="font-family: surafont_sanukchang; font-size: 20px;" name="uesrname" id="uesrname" class="form-control" minlength="3" maxlength="100" required="required" placeholder="ชื่อ-สกุล">
												</div>												
											</div>										
										</div>
										<div class="col-<?php echo $grid;?>-6">
											<div class="col-<?php echo $grid;?>-12">
												<input type="text" style="font-family: surafont_sanukchang; font-size: 20px;" name="ref" id="ref" class="form-control" required="required" minlength="3" maxlength="20" placeholder="Ref&nbsp;2&nbsp;ตัวภาษาอักฤษจำกัด&nbsp;20&nbsp;ตัว">
											</div>										
										</div>									
									</fieldset>
								</div>							
								<div class="row">
									<fieldset class="content-group">
										<div class="col-<?php echo $grid;?>-6">
											<div class="form-group">
												<div class="col-<?php echo $grid;?>-12">
													<input type="text" style="font-family: surafont_sanukchang; font-size: 20px;" name="pay" id="pay" class="form-control"required="required" placeholder="จำนวนเงิน Ex: 200.00" minlength="0" maxlength="10">
												</div>
											</div>										
										</div>
										<div class="col-<?php echo $grid;?>-6">
											<div class="col-<?php echo $grid;?>-12">
												<input type="text" style="font-family: surafont_sanukchang; font-size: 20px;" name="paytxt" id="paytxt" class="form-control" required="required" placeholder="เรื่องค่าใช้จ่าย"  minlength="5" maxlength="100">
											</div>										
										</div>									
									</fieldset>
								</div>
								<div class="row">
									<div class="col-<?php echo $grid;?>-12">
										<center>
											<button style="font-family: surafont_sanukchang; font-size: 20px;" type="submit" class="btn btn-success">Print&nbsp;Qr&nbsp;Code</button>
											<button style="font-family: surafont_sanukchang; font-size: 20px;" type="reset" class="btn btn-warning">ล้างรายการ</button>
										</center>
									</div>
								</div>	
							</form>
						</div>
					</div>
				</div>
			</div>
</form>			

<hr>
			<div class="row">
				<div class="col-<?php echo $grid;?>-12">
					<center><button type="button" class="btn btn-default"><i class="icon-home position-left"></i>Home</button></center>
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
	</div>	


</body>
</html>


