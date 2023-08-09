<?php
	include("../database/pdo_project.php");
	include("../database/class_project.php");
	include("../sql_pdo/gotolink.php");
	$goingtolink=new goingtolink($_SERVER["REMOTE_ADDR"]);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ประกาศรายชื่อผู้มีสิทธิ์สอบ&nbsp;ห้องเรียน&nbsp;วิทยาศาสตร์&nbsp;วิทยาศาสตร์&nbsp;สสวท.</title>
	
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
			src: url('../font/surafont_sanukchang-webfont.eot');
			src: url('../font/surafont_sanukchang-webfont.eot?#iefix') format('embedded-opentype'),
			url('../font/surafont_sanukchang-webfont.woff') format('woff'),
			url('../font/surafont_sanukchang.ttf') format('truetype');
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
	$copy_year="2565";
	
		if(isset($copy_stuID)){
		$data_project=new data_project($copy_stuID,$copy_year);
			if(!isset($data_project->dpro_user,$data_project->dpro_key,$data_project->dpro_plan,$data_project->dpro_level)){   ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

	<div class="col-<?php echo $grid;?>-6">
		<div class="panel panel-danger">
			<div class="panel-heading">ผลการตรวจสอบรายชื่อผู้มีสิทธิ์สอบห้องเรียน&nbsp;วิทยาศาสตร์&nbsp;สสวท.</div>
			<div class="panel-body">
				<div>-&nbsp;<font color="#FF0000">เลขประจำตัวประชาชน&nbsp;<b>"<?php echo $copy_stuID;?>"</b>&nbsp;ไม่พบรายชื่อผู้มีสิทธิ์ห้องเรียน&nbsp;วิทยาศาสตร์&nbsp;สสวท.</font></div>

			</div>
		</div>	
	</div>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->				
<?php		}else{
//----------------------------------------------------------------------------------		
				$data_key=$data_project->dpro_user;
				$data_keyid=$data_project->dpro_key;
				$data_plan=$data_project->dpro_plan;
				$data_level=$data_project->dpro_level;
//----------------------------------------------------------------------------------
					if($data_level==31){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
					<?php
						$user_test="IPTST31";
						$verify_ipst=new verify_ipst($data_keyid,$data_level,$data_plan,$user_test,$copy_year);
							if($verify_ipst->vi_project_status_ps_no==1){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->							
	<div class="col-<?php echo $grid;?>-6">
		<div class="panel panel-success">
			<div class="panel-heading">ผลการตรวจสอบรายชื่อผู้มีสิทธิ์สอบห้องเรียน&nbsp;วิทยาศาสตร์&nbsp;สสวท.</div>
			<div class="panel-body">
				<div>-&nbsp;<font color="#3401FB"><?php echo $verify_ipst->vi_nameTh;?>&nbsp;เป็นผู้มีสิทธิ์สอบห้องเรียน&nbsp;วิทยาศาสตร์&nbsp;สสวท. ม.ต้น</font></div>
				<div>-&nbsp;<font color="#3401FB">สอบผ่านระบบออนไลน์&nbsp;วันเสาร์ที่&nbsp;27&nbsp;พฤศจิกายน&nbsp;พ.ศ.&nbsp;2564</font></div>
				<div>-&nbsp;<a href="<?php echo $goingtolink->Rungotolink();?>/tools/img/documents/pdf/กำหนดการสอบห้อง สสวท. ม.1.ม.4.pdf" target="_blank"><font color="#FF0000"><b>รายละเอียดกำหนดการสอบคัดเลือกห้องเรียนวิทยาศำสตร์&nbsp;วิทยาศาสตร์&nbsp;สสวท.&nbsp;(ดาวน์โหลด)</b></font></a></div>
			</div>
		</div>	
	</div>		
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->	
<?php						}elseif($verify_ipst->vi_project_status_ps_no==2){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->										
	<div class="col-<?php echo $grid;?>-6">
		<div class="panel panel-info">
			<div class="panel-heading">ผลการสอบดัดเลือกนักเรียนห้องเรียน&nbsp;วิทยาศาสตร์&nbsp;สสวท.</div>
			<div class="panel-body">
				<div>-&nbsp;<font color="#3401FB"><?php echo $verify_ipst->vi_nameTh;?>&nbsp;ผ่านเกณฑ์การสอบห้องเรียน&nbsp;วิทยาศาสตร์&nbsp;สสวท. ม.ต้น</font></div>

			</div>
		</div>	
	</div>										
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->										
<?php						}elseif($verify_ipst->vi_project_status_ps_no==3){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<div class="col-<?php echo $grid;?>-6">
		<div class="panel panel-danger">
			<div class="panel-heading">ผลการสอบดัดเลือกนักเรียนห้องเรียน&nbsp;วิทยาศาสตร์&nbsp;สสวท.</div>
			<div class="panel-body">
				<div>-&nbsp;<font color="#3401FB"><?php echo $verify_ipst->vi_nameTh;?>&nbsp;ไม่ผ่านเกณฑ์การสอบห้องเรียน&nbsp;วิทยาศาสตร์&nbsp;สสวท. ม.ต้น</font></div>

			</div>
		</div>	
	</div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->										
<?php						}elseif($verify_ipst->vi_project_status_ps_no==4){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<div class="col-<?php echo $grid;?>-6">
		<div class="panel panel-warning">
			<div class="panel-heading">ผลการสอบดัดเลือกนักเรียนห้องเรียน&nbsp;วิทยาศาสตร์&nbsp;สสวท.</div>
			<div class="panel-body">
				<div>-&nbsp;<font color="#3401FB"><?php echo $verify_ipst->vi_nameTh;?>&nbsp;ติดรอบสำรองลำดับที่&nbsp;</font></div>
				
			</div>
		</div>	
	</div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->										 
<?php						}elseif($verify_ipst->vi_project_status_ps_no==5){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<div class="col-<?php echo $grid;?>-6">
		<div class="panel panel-warning">
			<div class="panel-heading">ผลการสอบดัดเลือกนักเรียนห้องเรียน&nbsp;วิทยาศาสตร์&nbsp;สสวท.</div>
			<div class="panel-body">
				<div>-&nbsp;<font color="#3401FB"><?php echo $verify_ipst->vi_nameTh;?>&nbsp;ติดปัญหาวิชาการ&nbsp;</font></div>
				
			</div>
		</div>	
	</div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->										
<?php						}elseif($verify_ipst->vi_project_status_ps_no==6){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<div class="col-<?php echo $grid;?>-6">
		<div class="panel panel-warning">
			<div class="panel-heading">ผลการสอบดัดเลือกนักเรียนห้องเรียน&nbsp;วิทยาศาสตร์&nbsp;สสวท.</div>
			<div class="panel-body">
				<div>-&nbsp;<font color="#3401FB"><?php echo $verify_ipst->vi_nameTh;?>&nbsp;ติดปัญหาวิชาการ&nbsp;</font></div>
				
			</div>
		</div>	
	</div>										
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->										
<?php						}else{ ?>
										
<?php						}	
					?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->						
<?php				}elseif($data_level==41){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
					<?php
						$user_test="IPTST41";
						$verify_ipst=new verify_ipst($data_keyid,$data_level,$data_plan,$user_test,$copy_year);
							if($verify_ipst->vi_project_status_ps_no==1){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->							
<div class="col-<?php echo $grid;?>-6">
		<div class="panel panel-success">
			<div class="panel-heading">ผลการตรวจสอบรายชื่อผู้มีสิทธิ์สอบห้องเรียน&nbsp;วิทยาศาสตร์&nbsp;สสวท.</div>
			<div class="panel-body">
				<div>-&nbsp;<font color="#3401FB"><?php echo $verify_ipst->vi_nameTh;?>&nbsp;เป็นผู้มีสิทธิ์สอบห้องเรียน&nbsp;วิทยาศาสตร์&nbsp;สสวท. ม.ปลาย</font></div>
				<div>-&nbsp;<font color="#3401FB">สอบผ่านระบบออนไลน์&nbsp;วันเสาร์ที่&nbsp;27&nbsp;พฤศจิกายน&nbsp;พ.ศ.&nbsp;2564</font></div>
				<div>-&nbsp;<a href="<?php echo $goingtolink->Rungotolink();?>/tools/img/documents/pdf/กำหนดการสอบห้อง สสวท. ม.1.ม.4.pdf" target="_blank"><font color="#FF0000"><b>รายละเอียดกำหนดการสอบคัดเลือกห้องเรียนวิทยาศำสตร์&nbsp;วิทยาศาสตร์&nbsp;สสวท.&nbsp;(ดาวน์โหลด)</b></font></a></div>
			</div>
		</div>	
	</div>								
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->									
<?php						}elseif($verify_ipst->vi_project_status_ps_no==2){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<div class="col-<?php echo $grid;?>-6">
		<div class="panel panel-info">
			<div class="panel-heading">ผลการสอบดัดเลือกนักเรียนห้องเรียน&nbsp;วิทยาศาสตร์&nbsp;สสวท.</div>
			<div class="panel-body">
				<div>-&nbsp;<font color="#3401FB"><?php echo $verify_ipst->vi_nameTh;?>&nbsp;ผ่านเกณฑ์การสอบห้องเรียน&nbsp;วิทยาศาสตร์&nbsp;สสวท. ม.ปลาย</font></div>

			</div>
		</div>	
	</div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->										
<?php						}elseif($verify_ipst->vi_project_status_ps_no==3){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<div class="col-<?php echo $grid;?>-6">
		<div class="panel panel-danger">
			<div class="panel-heading">ผลการสอบดัดเลือกนักเรียนห้องเรียน&nbsp;วิทยาศาสตร์&nbsp;สสวท.</div>
			<div class="panel-body">
				<div>-&nbsp;<font color="#3401FB"><?php echo $verify_ipst->vi_nameTh;?>&nbsp;ไม่ผ่านเกณฑ์การสอบห้องเรียน&nbsp;วิทยาศาสตร์&nbsp;สสวท. ม.ปลาย</font></div>

			</div>
		</div>	
	</div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->										
<?php						}elseif($verify_ipst->vi_project_status_ps_no==4){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<div class="col-<?php echo $grid;?>-6">
		<div class="panel panel-warning">
			<div class="panel-heading">ผลการสอบดัดเลือกนักเรียนห้องเรียน&nbsp;วิทยาศาสตร์&nbsp;สสวท.</div>
			<div class="panel-body">
				<div>-&nbsp;<font color="#3401FB"><?php echo $verify_ipst->vi_nameTh;?>&nbsp;ติดรอบสำรองลำดับที่&nbsp;</font></div>
				
			</div>
		</div>	
	</div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->										 
<?php						}elseif($verify_ipst->vi_project_status_ps_no==5){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<div class="col-<?php echo $grid;?>-6">
		<div class="panel panel-warning">
			<div class="panel-heading">ผลการสอบดัดเลือกนักเรียนห้องเรียน&nbsp;วิทยาศาสตร์&nbsp;สสวท.</div>
			<div class="panel-body">
				<div>-&nbsp;<font color="#3401FB"><?php echo $verify_ipst->vi_nameTh;?>&nbsp;ติดปัญหาวิชาการ&nbsp;</font></div>
				
			</div>
		</div>	
	</div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->										
<?php						}elseif($verify_ipst->vi_project_status_ps_no==6){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<div class="col-<?php echo $grid;?>-6">
		<div class="panel panel-warning">
			<div class="panel-heading">ผลการสอบดัดเลือกนักเรียนห้องเรียน&nbsp;วิทยาศาสตร์&nbsp;สสวท.</div>
			<div class="panel-body">
				<div>-&nbsp;<font color="#3401FB"><?php echo $verify_ipst->vi_nameTh;?>&nbsp;ติดปัญหาวิชาการ&nbsp;</font></div>
				
			</div>
		</div>	
	</div>	
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->										
<?php						}else{ ?>
										
<?php						}	
					?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->						
<?php				}else{
						
					}
			}
		}else{
			
		}
?>






	
		

</body>
</html>