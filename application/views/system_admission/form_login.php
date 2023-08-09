<?php 
	defined('BASEPATH') OR exit('No direct script access allowed'); 
//-------------------------------------------------------------------------
	include("tools/sql_pdo/gotolink.php");
	$ip_admission=$this->input->ip_address();
	$golink=new goingtolink($ip_admission);
	$goinglink=$golink->Rungotolink(); 
//-------------------------------------------------------------------------	
?>

<?php
		if(isset($this->session->ls_key)){
			exit("<script>window.location='$goinglink/admission/admin';</script>");
		}else{ ?>
		
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ระบบรับสมัครนักเรียนใหม่ สำหรับเจ้าหน้าที่ โรงเรียนเรยีนาเชลีวิทยาลัย</title>
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
				position: relative;
			}
		
	</style>

	<!-- Core JS files -->
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/loaders/pace.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/core/libraries/jquery.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/core/libraries/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

<!--****************************************************************************-->			
    <script type="text/javascript">
        function setScreenHWCookie() {
            $.cookie('sw',screen.width);
                //$.cookie('sh',screen.height);
            return true;
        }
            setScreenHWCookie();
    </script>
<!--****************************************************************************-->
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

	<!-- Theme JS files -->
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/layout_3/LTR/default/full/assets/js/app.js"></script>
	<!-- /theme JS files -->

</head>

<body class="navbar-bottom login-container">


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<div class="row">
					<div class="col-<?php echo $grid;?>-12">
<!-- Simple login form -->
<form name="form_login"  action="<?php echo base_url();?>system_admission/admission_login" method="post">
	<div class="panel panel-body login-form">
		
		<div class="row">
			<div class="col-<?php echo $grid;?>-12">
				<div class="text-center">
					<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
					<h5 class="content-group">ลงชื่อเข้าใช้บัญชีของคุณ<small class="display-block">ใส่ข้อมูลของคุณด้านล่าง</small></h5>
				</div>			
			</div>
		</div>


		<div class="row">
			<div class="col-<?php echo $grid;?>-12">
				<div class="form-group has-feedback has-feedback-left">
					<input type="text" name="Username" id="Username" class="form-control" placeholder="Username">
					<div class="form-control-feedback">
						<i class="icon-user text-muted"></i>
					</div>
				</div>

				<div class="form-group has-feedback has-feedback-left">
					<input type="password" name="Password" id="Password" class="form-control" placeholder="Password">
					<div class="form-control-feedback">
						<i class="icon-lock2 text-muted"></i>
					</div>
				</div>			
			</div>
		</div>

		<div class="row">
			<div class="col-<?php echo $grid;?>-12">
				<div class="form-group">
					<button type="submit" name="log_enter" id="log_enter" class="btn btn-primary btn-block">เข้าสู่ระบบ <i class="icon-circle-right2 position-right"></i></button>
				</div>			
			</div>
		</div>


	</div>
</form>
<!-- /simple login form -->					
					</div>
				</div>


			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->


	<!-- Footer -->
	<div class="navbar navbar-default navbar-fixed-bottom footer">
		<ul class="nav navbar-nav visible-xs-block">
			<li><a class="text-center collapsed" data-toggle="collapse" data-target="#footer"><i class="icon-circle-up2"></i></a></li>
		</ul>

		<div class="navbar-collapse collapse" id="footer">
			<div class="navbar-text">
				&copy; 2015. <a href="#" class="navbar-link">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" class="navbar-link" target="_blank">Eugene Kopyov</a>
			</div>

			<div class="navbar-right">
				<ul class="nav navbar-nav">
					<li><a href="#">About</a></li>
					<li><a href="#">Terms</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /footer -->

</body>
</html>		
		
<?php	}?>


