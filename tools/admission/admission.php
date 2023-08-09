<?php	defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>รับสมัครนักเรียนใหม่&nbsp;โรงเรียนเรยีนาเชลีวิทยาลัย&nbsp;จังหวัดเชียงใหม่</title>
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
			position: relative;
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
	<?php
		include("tools/js_top.php");
	?>
<!--****************************************************************************-->		
<!--****************************************************************************-->		
</head>

<body class="col-<?php echo $grid;?>-12" style="background-color: #00CCFF;">

	<div class="row">
		<div class="col-<?php echo $grid;?>-12">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner">

						<div class="item active">
							<img src="<?php echo base_url();?>/tools/run_img/641102-001.jpg" alt="Los Angeles" style="width:100%;">
							<div class="carousel-caption">
								<!--<h3>Los Angeles</h3>
								<p>LA is always so much fun!</p>-->
							</div>
						</div>

						<div class="item">
							<img src="<?php echo base_url();?>/tools/run_img/640811-001.jpg" alt="Chicago" style="width:100%;">
							<div class="carousel-caption">
								<!--<h3>Chicago</h3>
								<p>Thank you, Chicago!</p>-->
							</div>
						</div>
					
						<div class="item">
							<img src="<?php echo base_url();?>/tools/run_img/640811-002.jpg" alt="New York" style="width:100%;">
							<div class="carousel-caption">
								<!--<h3>New York</h3>
								<p>We love the Big Apple!</p>-->
							</div>
						</div>
				  
				</div>

				<!-- Left and right controls -->
					<a class="left carousel-control" href="#myCarousel" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#myCarousel" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
						<span class="sr-only">Next</span>
					</a>
			</div>			
		</div>
	</div>

	<div class="row">
		<div class="col-<?php echo $grid;?>-12">
			<nav class="navbar navbar-inverse navbar-fixed">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>                        
						</button>
							  <!--<a class="navbar-brand" href="#">WebSiteName</a>-->
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="nav navbar-nav">
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">สมัครนักเรียนใหม่
									<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#">สมัครนักเรียนใหม่รอบทั่วไป</a></li>
									<li><a href="#">สมัครนักเรียนใหม่รอบแทรกชั้น</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">มอบตัวนักเรียนใหม่
									<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo base_url();?>surrender/primary">มอบตัวนักเรียนใหม่รอบทั่วไป&nbsp;ระดับชั้น&nbsp;อนุบาลและประถม</a></li>
									<li><a href="<?php echo base_url();?>surrender/secondary">มอบตัวนักเรียนใหม่&nbsp;ระดับชั้น&nbsp;มัธยมศึกษา</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">ผู้มีสิทธิ์สอบ&nbsp;/&nbsp;ผลการสอบ
								<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo base_url();?>ipst/testing">ตรวจสอบรายชื่อผู้มีสิทธิ์สอบห้องเรียน&nbsp;วิทยาศาสตร์&nbsp;สสวท.</a></li>									
									<li><a href="<?php echo base_url();?>ipst">ตรวจสอบผลการสอบห้องเรียน&nbsp;วิทยาศาสตร์&nbsp;สสวท.</a></li>
								</ul>
							</li>		

							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">ข้อมูลแผนการเรียน&nbsp;/&nbsp;โรงเรียน
								<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#regina">แนะนำโรงเรียน</a></li>									
									<li><a href="#kindergarten">ระดับ&nbsp;ชั้นอนุบาล</a></li>
									<li><a href="#primary">ระดับชั้น&nbsp;ประถมศึกษา</a></li>
									<li><a href="#junior_high_school">ระดับชั้น&nbsp;มัธยมศึกษาตอนต้น</a></li>
									<li><a href="#high_school">ระดับชั้น&nbsp;มัธยมศึกษาตอนปลาย</a></li>
								</ul>
							</li>
							
							<li><a href="<?php echo base_url();?>admission/admin">สำหรับเจ้าหน้าที่</a></li>
																	
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</div>
	
	<div class="page-container">
		<div class="page-content">
			
			<div class="row">
				<div class="col-<?php echo $grid;?>-12">
				
					<div id="regina" class="container-fluid">
						<div class="row">
							<div class="col-<?php echo $grid;?>-12">
								<div class="panel panel-info">
									<div class="panel-heading">แนะนำโรงเรียน</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-<?php echo $grid;?>-12">
												<img src="<?php echo base_url();?>tools/img/admission_img/111-01.jpg" style="width: 100%" class="img-rounded">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div id="kindergarten" class="container-fluid">
						<div class="row">
							<div class="col-<?php echo $grid;?>-12">
								<div class="panel panel-success">
									<div class="panel-heading">ระดับ&nbsp;ชั้นอนุบาล</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-<?php echo $grid;?>-12">
												<div class="row">
													<div class="col-<?php echo $grid;?>-6">
														<img src="<?php echo base_url();?>tools/img/admission_img/k3/111-k3.jpg" style="width: 100%" class="img-thumbnail">
													</div>
													<div class="col-<?php echo $grid;?>-6">
														<div class="row">
															<div class="col-<?php echo $grid;?>-6">
																<img src="<?php echo base_url();?>tools/img/admission_img/k3/k3-01-01.png" class="img-thumbnail" >
															</div>
															<div class="col-<?php echo $grid;?>-6">
																<img src="<?php echo base_url();?>tools/img/admission_img/k3/k3-01-02.png" class="img-thumbnail">
															</div>
														</div>
														<div class="row">
															<div class="col-<?php echo $grid;?>-6">
																<img src="<?php echo base_url();?>tools/img/admission_img/k3/k3-01-03.png" class="img-thumbnail" >
															</div>
															<div class="col-<?php echo $grid;?>-6">
																<img src="<?php echo base_url();?>tools/img/admission_img/k3/k3-01-04.png" class="img-thumbnail">
															</div>
														</div>
														<div class="row">
															<div class="col-<?php echo $grid;?>-6">
																<img src="<?php echo base_url();?>tools/img/admission_img/k3/k3-01-07.png" class="img-thumbnail" >
															</div>
															<div class="col-<?php echo $grid;?>-6">
																<img src="<?php echo base_url();?>tools/img/admission_img/k3/k3-01-08.png" class="img-thumbnail">
															</div>
														</div>															
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>	
					
					<div id="primary" class="container-fluid">
						<div class="row">
							<div class="col-<?php echo $grid;?>-12">
								<div class="panel panel-info">
									<div class="panel-heading">ระดับชั้น&nbsp;ประถมศึกษา</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-<?php echo $grid;?>-6">
												<img src="<?php echo base_url();?>tools/img/admission_img/p1/111-p1.jpg" class="img-thumbnail" >											
											</div>
											<div class="col-<?php echo $grid;?>-6">
												<div class="row">
													<div class="col-<?php echo $grid;?>-6">
														<img src="<?php echo base_url();?>tools/img/admission_img/p1/p1-01.png" class="img-thumbnail" >
													</div>
													<div class="col-<?php echo $grid;?>-6">
														<img src="<?php echo base_url();?>tools/img/admission_img/p1/p1-02.png" class="img-thumbnail">
													</div>
												</div>
													<div class="row">
														<div class="col-<?php echo $grid;?>-6">
															<img src="<?php echo base_url();?>tools/img/admission_img/p1/p1-03.png" class="img-thumbnail" >
														</div>
														<div class="col-<?php echo $grid;?>-6">
															<img src="<?php echo base_url();?>tools/img/admission_img/p1/p1-07.png" class="img-thumbnail">
														</div>
													</div>
												<div class="row">
													<div class="col-<?php echo $grid;?>-6">
														<img src="<?php echo base_url();?>tools/img/admission_img/p1/p1-05.png" class="img-thumbnail" >
													</div>
													<div class="col-<?php echo $grid;?>-6">
														<img src="<?php echo base_url();?>tools/img/admission_img/p1/p1-06.png" class="img-thumbnail">
													</div>
												</div>												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>					
					
					<div id="junior_high_school" class="container-fluid">
						<div class="row">
							<div class="col-<?php echo $grid;?>-12">
								<div class="panel panel-success">
									<div class="panel-heading">ระดับชั้น&nbsp;มัธยมศึกษาตอนต้น</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-<?php echo $grid;?>-6">
													<img src="<?php echo base_url();?>tools/img/admission_img/m1/111-m1.jpg" class="img-thumbnail" >											
											</div>
											<div class="col-<?php echo $grid;?>-6">
												<div class="row">
													<div class="col-<?php echo $grid;?>-6">
														<img src="<?php echo base_url();?>tools/img/admission_img/m1/m1-01.png" class="img-thumbnail" >
													</div>
													<div class="col-<?php echo $grid;?>-6">
														<img src="<?php echo base_url();?>tools/img/admission_img/m1/m1-02.png" class="img-thumbnail">
													</div>
												</div>
												<div class="row">
													<div class="col-<?php echo $grid;?>-6">
														<img src="<?php echo base_url();?>tools/img/admission_img/m1/m1-03.png" class="img-thumbnail" >
													</div>
													<div class="col-<?php echo $grid;?>-6"></div>
												</div>												
											</div>
										</div>										
									</div>
								</div>
							</div>
						</div>
					</div>		
						
					<div id="high_school" class="container-fluid">
						<div class="row">
							<div class="col-<?php echo $grid;?>-12">
								<div class="panel panel-info">
									<div class="panel-heading">ระดับชั้น&nbsp;มัธยมศึกษาตอนปลาย</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-<?php echo $grid;?>-6">
												<img src="<?php echo base_url();?>tools/img/admission_img/m4/111-m4-1.jpg" class="img-thumbnail" >											
											</div>
											<div class="col-<?php echo $grid;?>-6">
												<div class="row">
													<div class="col-<?php echo $grid;?>-6">
														<img src="<?php echo base_url();?>tools/img/admission_img/m4/m4-01.png" class="img-thumbnail" >
													</div>
													<div class="col-<?php echo $grid;?>-6">
														<img src="<?php echo base_url();?>tools/img/admission_img/m4/m4-02.png" class="img-thumbnail">
													</div>
												</div>		
												<div class="row">
													<div class="col-<?php echo $grid;?>-6">
														<img src="<?php echo base_url();?>tools/img/admission_img/m4/m4-03.png" class="img-thumbnail" >
													</div>
													<div class="col-<?php echo $grid;?>-6"></div>
												</div>												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>				
				
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