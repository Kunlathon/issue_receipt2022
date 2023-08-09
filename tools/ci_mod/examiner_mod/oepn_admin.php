<?php
	include("../../database/class_admission.php");
	include("../../database/class_pdo.php");
	include("../../database/class_pdodatastu.php");

	include("../../database/pdo_admission.php");
	include("../../database/pdo_conndatastu.php");
	include("../../database/pdo_data.php");
	
	include("../../sql_pdo/gotolink.php");
	$goingtolink=new goingtolink($_SERVER['REMOTE_ADDR']);
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>

	<!-- Global stylesheets -->
	<link href="<?php echo $goingtolink->Rungotolink();?>/tools/Bootstrap 3/Template/global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $goingtolink->Rungotolink();?>/tools/Bootstrap 3/Template/layout_3/LTR/default/full/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $goingtolink->Rungotolink();?>/tools/Bootstrap 3/Template/layout_3/LTR/default/full/assets/css/core.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $goingtolink->Rungotolink();?>/tools/Bootstrap 3/Template/layout_3/LTR/default/full/assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $goingtolink->Rungotolink();?>/tools/Bootstrap 3/Template/layout_3/LTR/default/full/assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->
	<!--css code-->
<style>
	@font-face {
			font-family: 'surafont_sanukchang';
			src: url('<?php echo $goingtolink->Rungotolink();?>/tools/font/surafont_sanukchang-webfont.eot');
			src: url('<?php echo $goingtolink->Rungotolink();?>/tools/font/surafont_sanukchang-webfont.eot?#iefix') format('embedded-opentype'),
			url('<?php echo $goingtolink->Rungotolink();?>/tools/font/surafont_sanukchang-webfont.woff') format('woff'),
			url('<?php echo $goingtolink->Rungotolink();?>/tools/font/surafont_sanukchang.ttf') format('truetype');
	}

	body{
			font-family: "surafont_sanukchang";
			font-size: 16px;
			color: #032E3B;
		}
	
</style>
	


	<!-- Core JS files -->
	<script src="<?php echo $goingtolink->Rungotolink();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/loaders/pace.min.js"></script>
	<script src="<?php echo $goingtolink->Rungotolink();?>/tools/Bootstrap 3/Template/global_assets/js/core/libraries/jquery.min.js"></script>
	<script src="<?php echo $goingtolink->Rungotolink();?>/tools/Bootstrap 3/Template/global_assets/js/core/libraries/bootstrap.min.js"></script>
	<script src="<?php echo $goingtolink->Rungotolink();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="<?php echo $goingtolink->Rungotolink();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script src="<?php echo $goingtolink->Rungotolink();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="<?php echo $goingtolink->Rungotolink();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/forms/styling/switch.min.js"></script>


	<script src="<?php echo $goingtolink->Rungotolink();?>/tools/Bootstrap 3/Template/global_assets/js/demo_pages/form_checkboxes_radios.js"></script>
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

<body>
	
	<?php
		$copy_stuID=filter_input(INPUT_POST,'copy_stuID');
			if($copy_stuID==""){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->		
				<div class="col-<?php echo $grid;?>-6">
					<div class="panel panel-info">
						<div class="panel-heading">ไม่พบข้อมูล</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-<?php echo $grid;?>-12">
									<li></li>
								</div>
							</div>
						</div>
					</div>				
				</div> 	
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->				
	<?php	}else{
				$rc_admission_testSql="SELECT * 
									   FROM `rc_admission_test`
									   WHERE `rat_IDCard`='{$copy_stuID}' and `rat_year`='2565' and `rat_testStatus`='5';";
				$rc_admission_test=new notrow_admission($rc_admission_testSql);
				foreach($rc_admission_test->notrow_admission_print() as $rc_key=>$rc_admission_testRow){
					$rat_IDReg=$rc_admission_testRow["rat_IDReg"];
					$rat_testtxt=$rc_admission_testRow["rat_testtxt"];
					$rat_plan=$rc_admission_testRow["rat_plan"];
					$rat_testStatus=$rc_admission_testRow["rat_testStatus"];
//plan						
					$rc_planA="SELECT `Name` FROM `rc_plan` WHERE `IDPlan`='{$rat_plan}';";
					$rc_planARs=new notrow_admission($rc_planA);
					foreach($rc_planARs->notrow_admission_print() as $rckey=>$rc_planARow){
						$plan_nameA=$rc_planARow["Name"];
					}					
//plan End					
						if($rat_IDReg==""){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->		
					<div class="col-<?php echo $grid;?>-6">
						<div class="panel panel-info">
							<div class="panel-heading">ประกาศผลผู้มีสิทธิ์สอบรอบทั่วไป ปีการศึกษา 2565</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-<?php echo $grid;?>-12">
										<li>ท่านไม่มีสิทธิ์สอบรอบทั่วไป</li>
									</div>
								</div>
							</div>
						</div>				
					</div> 		
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->	
				<?php	}else{
							$admissionSql="select `stu_level`,`stu_prefix`,`stu_fname`,`stu_sname`  from `rc_student_admission` where `IDReg`='{$rat_IDReg}' and `IDCard`='{$copy_stuID}';";
							$admissionRs=new notrow_admission($admissionSql);
							 foreach($admissionRs->notrow_admission_print() as $rckey=>$admissionRow){
								if(is_array($admissionRow) && count($admissionRow)){ 
									$admiss_level=$admissionRow["stu_level"];
									if($admissionRow["stu_prefix"]==2){
										$myname="เด็กหญิง&nbsp;".$admissionRow["stu_fname"]."&nbsp;".$admissionRow["stu_sname"];
									}elseif($admissionRow["stu_prefix"]==4){
										$myname="นางสาว&nbsp;".$admissionRow["stu_fname"]."&nbsp;".$admissionRow["stu_sname"];
									}else{
										$myname=$admissionRow["stu_fname"].$admissionRow["stu_sname"];
									}						
									?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->	
							<?php
									if($admiss_level==31){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->										
									<div class="col-<?php echo $grid;?>-6">
										<div class="panel panel-info">
											<div class="panel-heading">ประกาศผลผู้มีสิทธิ์สอบรอบทั่วไป ปีการศึกษา 2565</div>
											<div class="panel-body">
												<div class="row">
													<div class="col-<?php echo $grid;?>-12">
														<li>เลขประจำตัวสอบ&nbsp;<?php echo $rat_IDReg;?>&nbsp;<?php echo $myname;?>&nbsp;เป็นผู้มีสิทธิ์เข้าสัมภาษณ์เพื่อศึกษาต่อระดับชั้นมัธยมศึกษาปีที่ 1 (รอบทั่วไป)</li>
														<li>วิธีการสัมภาษณ์&nbsp;:&nbsp;ZOOM&nbsp;Meeting</li>
														<li>ในวันที่สอบ&nbsp;:&nbsp;วันเสาร์ที่&nbsp;6&nbsp;เดือน&nbsp;พฤศจิกายน&nbsp;พ.ศ.&nbsp;2564&nbsp;เวลา&nbsp;<?php echo $rat_testtxt;?></li>
														<li><a href="<?php echo $goingtolink->Rungotolink();?>/tools/img/documents/pdf/ม.1 กำหนดการสอบ นร.ใหม่ ปี 65(รอบทั่วไป).pdf" target="_blank">รายละเอียดการเข้าสัมภาษณ์ผ่านระบบออนไลน์&nbsp;(ดาวน์โหลด)</a></li>
													</div>
												</div>
											</div>
										</div>				
									</div> 	
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->											
							<?php	}elseif($admiss_level==41){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->								
									<div class="col-<?php echo $grid;?>-6">
										<div class="panel panel-info">
											<div class="panel-heading">ประกาศผลผู้มีสิทธิ์สอบรอบทั่วไป ปีการศึกษา 2565</div>
											<div class="panel-body">
												<div class="row">
													<div class="col-<?php echo $grid;?>-12">
														<li>เลขประจำตัวสอบ&nbsp;<?php echo $rat_IDReg;?>&nbsp;<?php echo $myname;?>&nbsp;เป็นผู้มีสิทธิ์เข้าสอบ เเละสัมภาษณ์เพื่อศึกษาต่อระดับชั้นมัธยมศึกษาปีที่ 4 (รอบทั่วไป)</li>
														<li><b>ในวันเสาร์ที่ 6 พฤศจิกายน 2564</b></li>
														<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เวลา&nbsp;07.30&nbsp;-&nbsp;11.50 น.&nbsp;สอบผ่านระบบออนไลน์</li>
														<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เวลา&nbsp;<?php echo $rat_testtxt;?>&nbsp;เข้าสัมภาษณ์พร้อมผู้ปกครองผ่านระบบออนไลน์</li>
														<li><a href="<?php echo $goingtolink->Rungotolink();?>/tools/img/documents/pdf/ม.4 กำหนดการสอบ นร.ใหม่ ปี 65(รอบทั่วไป).pdf" target="_blank">รายละเอียดการเข้าสอบ เเละสัมภาษณ์ผ่านระบบออนไลน์&nbsp;(ดาวน์โหลด)</a></li>
													</div>
												</div>
											</div>
										</div>				
									</div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->										
						<?php		}else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->	
					
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->								
						<?php		}?>		 	 
						<?php	}else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->							
						<?php	}
							 }
						}
				}
			}?>	
</body>
</html>