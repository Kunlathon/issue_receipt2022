<?php	
	defined('BASEPATH') OR exit('No direct script access allowed'); 
//---------------------------------------------------------------------------	
	include("tools/sql_pdo/gotolink.php");
	$ip_admission=$this->input->ip_address();
	$golink=new goingtolink($ip_admission);
	$goinglink=$golink->Rungotolink(); 
//---------------------------------------------------------------------------	
	
//---------------------------------------------------------------------------	
	$admission_mod=$this->input->get('admission_mod') ? $this->input->get('admission_mod') : "admission_home";
?> 

<?php
	if(isset($this->session->ls_key)){
		$AdmissionRun=$this->db->query("SELECT * FROM `login_system` WHERE `ls_user`='{$this->session->ls_key}'");
		foreach($AdmissionRun->result_array() as $AdmissionRunRow){
			$ls_key=$AdmissionRunRow["ls_key"];
			$ls_login=$AdmissionRunRow["ls_login"];
			$myname=$AdmissionRunRow["ls_name"]."&nbsp;".$AdmissionRunRow["ls_last"];
				if($ls_login==0 or $ls_login==1){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->				
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ระบบรับสมัครนักเรียนใหม่ โรงเรียนเรยีนาเชลีวิทยาลัย</title>
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
	<?php
		include("tools/js_top.php");
	?>
<!--****************************************************************************-->	
<?php
		if($admission_mod=="rc_store" or $admission_mod=="rc_store_code"){
			include("tools/admission_admin/mod/rc_store/rc_store_js.php");
		}elseif($admission_mod=="real_time_store"){
			include("tools/admission_admin/mod/real_time_store/real_time_store_js.php");
		}elseif($admission_mod=="rc_store_set_year"){
			include("tools/admission_admin/mod/rc_store_set_year/rc_store_set_year_js.php");
		}elseif($admission_mod=="report_rc_store"){
			include("tools/admission_admin/mod/report_rc_store/report_rc_store_js.php");
		}else{ ?>
	<!-- Theme JS files -->
			<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/visualization/d3/d3.min.js"></script>
			<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
			<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
			<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
			<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/ui/moment/moment.min.js"></script>
			<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/pickers/daterangepicker.js"></script>

			<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/demo_pages/dashboard.js"></script>
	<!-- /theme JS files -->			
<?php	} ?>

	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/layout_3/LTR/default/full/assets/js/app.js"></script>
	
</head>

<body class="navbar-bottom col-<?php echo $grid;?>-12" style="background-color: #00CCFF;">

	<!-- Main navbar -->
<?php include("tools/admission_admin/structure/main_navbar.php");?>
	<!-- /main navbar -->


	<!-- Page header -->
<?php include("tools/admission_admin/structure/page_header.php");?>
	<!-- /page header -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main sidebar-default">
				<div class="sidebar-content">

					<!-- Main navigation -->
<?php include("tools/admission_admin/structure/main_navigation.php");?>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

<?php
	
	$admission_load="tools/admission_admin/{$admission_mod}.php";
		if(file_exists($admission_load)){
			include $admission_load;
		}else{
			
		}
?>	




			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

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
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->				
		<?php	}else{
					exit("<script>window.location='$goinglink/system_admission/admission_out';</script>");				
				}
		}
	}else{
		exit("<script>window.location='$goinglink/system_admission/admission_out';</script>");
	}



?>





