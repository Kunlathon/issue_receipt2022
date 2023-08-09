<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>รับสมัครนักเรียนออนไลน์ รอบทั่วไป ปีการศึกษา 2565</title>
	<link href="img/logoserviam.png" rel="shortcut icon" type="image/png">
	<link href="img/logoserviam.png" rel="apple-touch-icon">
	<link href="img/logoserviam.png" rel="apple-touch-icon" sizes="72x72">
	<link href="img/logoserviam.png" rel="apple-touch-icon" sizes="114x114">
	<link href="img/logoserviam.png" rel="apple-touch-icon" sizes="144x144">
	<!-- Global stylesheets -->
	<link href="Bootstrap 3/Template/global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="Bootstrap 3/Template/layout_3/LTR/default/full/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="Bootstrap 3/Template/layout_3/LTR/default/full/assets/css/core.min.css" rel="stylesheet" type="text/css">
	<link href="Bootstrap 3/Template/layout_3/LTR/default/full/assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="Bootstrap 3/Template/layout_3/LTR/default/full/assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->
	<!--css code-->
<style>
	@font-face {
			font-family: 'surafont_sanukchang';
			src: url('font/surafont_sanukchang-webfont.eot');
			src: url('font/surafont_sanukchang-webfont.eot?#iefix') format('embedded-opentype'),
			url('font/surafont_sanukchang-webfont.woff') format('woff'),
			url('font/surafont_sanukchang.ttf') format('truetype');
	}

	body{
			font-family: "surafont_sanukchang";
			font-size: 16px;
			color: #032E3B;
		}
	
</style>
	


	<!-- Core JS files -->
	<script src="Bootstrap 3/Template/global_assets/js/plugins/loaders/pace.min.js"></script>
	<script src="Bootstrap 3/Template/global_assets/js/core/libraries/jquery.min.js"></script>
	<script src="Bootstrap 3/Template/global_assets/js/core/libraries/bootstrap.min.js"></script>
	<script src="Bootstrap 3/Template/global_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="Bootstrap 3/Template/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script src="Bootstrap 3/Template/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="Bootstrap 3/Template/global_assets/js/plugins/forms/styling/switch.min.js"></script>


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



</head>

<body class="col-<?php echo $grid;?>-12">
	<div class="page-container">
		<div class="page-content">
			<div class="row">
				<div class="col-<?php echo $grid;?>-12">
					<img src="img/640821_101.jpg" alt="Cinque Terre" usemap="#Map" class="img-thumbnail" style="width: 100%;" >
				</div>
			</div>		
		</div>
	
		<?php
			$schedule=filter_input(INPUT_GET,'schedule');
			switch($schedule){
				case "k3": ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
		<div class="row">
			<div class="col-<?php echo $grid;?>-12" style="text-align: center; display: inline-block;">
				<img src="img/documents/img/03.jpg" class="img-thumbnail" alt="กำหนดการอนุบาล 3">
			</div>
		</div>	
<hr>
		<div class="row">
			<div class="col-<?php echo $grid;?>-12">
				<div class="panel panel-body border-top-primary">
					<div class="row">
						<div class="col-<?php echo $grid;?>-6">
							<div class="media">
								<div class="media-left">
									<a href="img/documents/pdf/03.pdf"><i class="icon-file-download2 text-success-400 icon-2x no-edge-top mt-5"></i></a>
								</div>

								<div class="media-body">
									<h6 class="media-heading text-semibold"><a href="img/documents/pdf/03.pdf" class="text-default">
									<div>ดาวน์โหลดเอกสารระเบียบและปฎิทินการรับสมัครนักเรียน</div>
									<div>ระดับชั้นอนุบาล 3</div>
								</div>
							</div>						
						</div>
						<div class="col-<?php echo $grid;?>-6">
							<center><a href="index.php"><button type="button"  class="btn btn-success">กลับไปที่หน้าสมัครเรียน</button></a></center>
						</div>
					</div>
				</div>
			</div>
		</div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->				
		<?php	break;
				case "p1": ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
		<div class="row">
			<div class="col-<?php echo $grid;?>-12" style="text-align: center; display: inline-block;">
				<img src="img/documents/img/1101.jpg" class="img-thumbnail" alt="กำหนดการประถมศึกษาปีที่ 1">
			</div>
		</div>	
		<div class="row">
			<div class="col-<?php echo $grid;?>-12" style="text-align: center; display: inline-block;">
				<img src="img/documents/img/1102.jpg" class="img-thumbnail" alt="กำหนดการประถมศึกษาปีที่ 1">
			</div>
		</div>
<hr>
		<div class="row">
			<div class="col-<?php echo $grid;?>-12">
				<div class="panel panel-body border-top-primary">
					<div class="row">
						<div class="col-<?php echo $grid;?>-4">
							<div class="media">
								<div class="media-left">
									<a href="img/documents/pdf/1101.pdf"><i class="icon-file-download2 text-success-400 icon-2x no-edge-top mt-5"></i></a>
								</div>

								<div class="media-body">
									<h6 class="media-heading text-semibold"><a href="img/documents/pdf/1101.pdf" class="text-default">
									<div>ดาวน์โหลดเอกสารระเบียบและปฎิทินการรับสมัครนักเรียน ฉบับที่ 1</div>
									<div>ระดับชั้นประถมศึกษาปีที่ 1 </div>
								</div>
							</div>						
						</div>
						<div class="col-<?php echo $grid;?>-4">
							<div class="media">
								<div class="media-left">
									<a href="img/documents/pdf/1102.pdf"><i class="icon-file-download2 text-success-400 icon-2x no-edge-top mt-5"></i></a>
								</div>

								<div class="media-body">
									<h6 class="media-heading text-semibold"><a href="img/documents/pdf/1102.pdf" class="text-default">
									<div>ดาวน์โหลดเอกสารระเบียบและปฎิทินการรับสมัครนักเรียน ฉบับที่ 2</div>
									<div>ระดับชั้นประถมศึกษาปีที่ 1 </div>
								</div>
							</div>						
						</div>						
						<div class="col-<?php echo $grid;?>-4">
							<center><a href="index.php"><button type="button"  class="btn btn-success">กลับไปที่หน้าสมัครเรียน</button></a></center>
						</div>
					</div>
				</div>
			</div>
		</div>		
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->				
		<?php	break;
				case "m1": ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
		<div class="row">
			<div class="col-<?php echo $grid;?>-12" style="text-align: center; display: inline-block;">
				<img src="img/documents/img/3101.jpg" class="img-thumbnail" alt="กำหนดการมัธยมศึกษาปีที่ 1">
			</div>
		</div>	
		<div class="row">
			<div class="col-<?php echo $grid;?>-12" style="text-align: center; display: inline-block;">
				<img src="img/documents/img/3102.jpg" class="img-thumbnail" alt="กำหนดการมัธยมศึกษาปีที่ 1">
			</div>
		</div>
<hr>
		<div class="row">
			<div class="col-<?php echo $grid;?>-12">
				<div class="panel panel-body border-top-primary">
					<div class="row">
						<div class="col-<?php echo $grid;?>-6">
							<div class="media">
								<div class="media-left">
									<a href="img/documents/pdf/31.pdf"><i class="icon-file-download2 text-success-400 icon-2x no-edge-top mt-5"></i></a>
								</div>

								<div class="media-body">
									<h6 class="media-heading text-semibold"><a href="img/documents/pdf/31.pdf" class="text-default">
									<div>ดาวน์โหลดเอกสารระเบียบและปฎิทินการรับสมัครนักเรียน</div>
									<div>ระดับชั้นมัธยมศึกษาปีที่ 1</div>
								</div>
							</div>						
						</div>
						<div class="col-<?php echo $grid;?>-6">
							<center><a href="index.php"><button type="button"  class="btn btn-success">กลับไปที่หน้าสมัครเรียน</button></a></center>
						</div>
					</div>
				</div>
			</div>
		</div>		
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->				
		<?php	break;
				case "m4": ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
		<div class="row">
			<div class="col-<?php echo $grid;?>-12" style="text-align: center; display: inline-block;">
				<img src="img/documents/img/4101.jpg" class="img-thumbnail" alt="กำหนดการมัธยมศึกษาปีที่ 4">
			</div>
		</div>	
		<div class="row">
			<div class="col-<?php echo $grid;?>-12" style="text-align: center; display: inline-block;">
				<img src="img/documents/img/4102.jpg" class="img-thumbnail" alt="กำหนดการมัธยมศึกษาปีที่ 4">
			</div>
		</div>
<hr>
		<div class="row">
			<div class="col-<?php echo $grid;?>-12">
				<div class="panel panel-body border-top-primary">
					<div class="row">
						<div class="col-<?php echo $grid;?>-6">
							<div class="media">
								<div class="media-left">
									<a href="img/documents/pdf/41.pdf"><i class="icon-file-download2 text-success-400 icon-2x no-edge-top mt-5"></i></a>
								</div>

								<div class="media-body">
									<h6 class="media-heading text-semibold"><a href="img/documents/pdf/41.pdf" class="text-default">
									<div>ดาวน์โหลดเอกสารระเบียบและปฎิทินการรับสมัครนักเรียน</div>
									<div>ระดับชั้นมัธยมศึกษาปีที่ 4</div>
								</div>
							</div>						
						</div>
						<div class="col-<?php echo $grid;?>-6">
							<center><a href="index.php"><button type="button"  class="btn btn-success">กลับไปที่หน้าสมัครเรียน</button></a></center>
						</div>
					</div>
				</div>
			</div>
		</div>		
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->				
	    <?php	break;
				default: ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
				
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->				
		<?php	}?>
		<div class="page-content">


		</div>	
<!-- Footer -->		
		<div class="page-content">
			<div class="footer text-muted">
				&copy; Copyright © 2020 Regina Coeli Collage. All Rights Reserved.
			</div>
		</div>
<!-- /footer -->		
	</div>	
</body>
</html>
