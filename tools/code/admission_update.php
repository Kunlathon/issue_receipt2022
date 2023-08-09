<?php
	error_reporting(error_reporting() & ~E_NOTICE); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>รับสมัครนักเรียนออนไลน์ รอบทั่วไป ปีการศึกษา 2565</title>
	<link href="../img/logoserviam.png" rel="shortcut icon" type="image/png">
	<link href="../img/logoserviam.png" rel="apple-touch-icon">
	<link href="../img/logoserviam.png" rel="apple-touch-icon" sizes="72x72">
	<link href="../img/logoserviam.png" rel="apple-touch-icon" sizes="114x114">
	<link href="../img/logoserviam.png" rel="apple-touch-icon" sizes="144x144">
	
	
	
	
	<!-- Global stylesheets -->

	<link href="../Bootstrap 3/Template/global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="../Bootstrap 3/Template/layout_3/LTR/default/full/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../Bootstrap 3/Template/layout_3/LTR/default/full/assets/css/core.min.css" rel="stylesheet" type="text/css">
	<link href="../Bootstrap 3/Template/layout_3/LTR/default/full/assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="../Bootstrap 3/Template/layout_3/LTR/default/full/assets/css/colors.min.css" rel="stylesheet" type="text/css">
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


	<link rel="stylesheet" href="../js/icheck-bootstrap-master/icheck-bootstrap.min.css"/>
	<link rel="stylesheet" href="../js/Simple-Lightweight-jQuery-Input-Mask-Plugin-Masked-input/demo/css/main.css">
	

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
	<script src="../Bootstrap 3/Template/global_assets/js/plugins/loaders/pace.min.js"></script>
	<script src="../Bootstrap 3/Template/global_assets/js/core/libraries/jquery.min.js"></script>
	<script src="../Bootstrap 3/Template/global_assets/js/core/libraries/bootstrap.min.js"></script>
	<script src="../Bootstrap 3/Template/global_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<?php include("profile/profile_js.php"); ?>



</head>

<body onload="loadFMstatus()" class="col-<?php echo $grid;?>-12">

	<div class="page-container">
		<div class="page-content">
		



	<?php
	include("../database/pdo_data.php");
	include("../database/class_pdo.php");	
	
	include("../database/pdo_conndatastu.php");
	include("../database/class_pdodatastu.php");
//+++++++++++++++++++++++++++++++++++++++++++****************
	include("../database/database_swip/pdo_data_sw.php");
	include("../database/database_swip/class_pdo_sw.php");	
	
	include("../database/database_swip/pdo_conndatastu_sw.php");
	include("../database/database_swip/class_pdodatastu_sw.php");
	
	include("../database/pdo_admission.php");	
	include("../database/class_admission.php");


	
	
	
	
	
	
//+++++++++++++++++++++++++++++++++++++++++++*****************
	//$data_yaer=2563;
	$user_login=filter_input(INPUT_POST,'user_login');
	//$user_login=6431020;//*********
	//********************************************************
	//$next_yaer=2565;
	//********************************************************
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++	

//ระดับชั้น
	//$call_stu=new stu_levelpdo($user_login,$data_yaer,"1");	
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++	
	
	
?>





<form class="form-horizontal" name="data_stu" method="post" action="view/mod/student/code/profile/profile_modify.php">
<?php
	$regina_stu_dataSql="SELECT `stu_prefix`,`stu_fname`,`stu_sname`,`stu_fname_e`,`stu_sname_e`,`nickTh`,`nickEn`,`IDCard`,`stu_level`,`stu_plan`,`stu_birth`,`stu_blood` FROM `rc_student_admission` WHERE `IDReg`='{$user_login}';";
	$regina_stu_data=new notrow_admission($regina_stu_dataSql);
	foreach($regina_stu_data->notrow_admission_print() as $rc_key=>$regina_stu_datarow){}
	
	$data_studentSql="SELECT * FROM `data_student` WHERE `stu_id`='{$user_login}'";
	$data_student=new notrow_datastu_sw($data_studentSql);
	foreach($data_student->datastu_array as $rc_key=>$data_studentrow){}
	
	$stu_addressSql="SELECT * FROM `stu_address` WHERE `stu_id`='{$user_login}'";
	$stu_address=new notrow_datastu_sw($stu_addressSql);
	foreach($stu_address->datastu_array as $rc_key=>$stu_addressRow){}
	
	$stu_address_homeSql="SELECT * FROM `stu_address_home` WHERE `stu_id`='{$user_login}'";
	$stu_address_home=new notrow_datastu_sw($stu_address_homeSql);
	foreach($stu_address_home->datastu_array as $rc_key=>$stu_address_homeRow){}
	
?>
<div class="row">
	<div class="col-<?php echo $grid;?>-12">
		<div class="panel panel-success">
			<div class="panel-heading" style="color: #000000"><h4 style="font-family: surafont_sanukchang; font-size: 18px">ข้อมูลนักเรียน</h4></div>
			<div class="panel-body">
				<div class="row">
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">ชื่อ (ภาษาไทย)</b></label>							
								<div class="col-<?php echo $grid;?>-10">
									<div class="input-group">
										<input type="text"  name="rsd_name" id="rsd_name" class="form-control" placeholder="ชื่อ (ภาษาไทย)" size="100" value="<?php echo $regina_stu_datarow["stu_fname"];?>" maxlength="100" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>
					</div>
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">นามสกุล (ภาษาไทย)</b></label>
								<div class="col-<?php echo $grid;?>-9">
									<div class="input-group">
										<input type="text" name="rsd_surname" id="rsd_surname" class="form-control" placeholder="นามสกุล (ภาษาไทย)" size="100" value="<?php echo $regina_stu_datarow["stu_sname"];?>" maxlength="100" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>					
					</div>
				</div>				
				<div class="row">
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">ชื่อเล่น (ภาษาไทย)</b></label>							
								<div class="col-<?php echo $grid;?>-10">
									<div class="input-group">
										<input type="text" name="nickTh" id="nickTh" class="form-control" placeholder="ชื่อเล่น (ภาษาไทย)" size="100" value="<?php echo $regina_stu_datarow["nickTh"];?>" maxlength="20" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>
					</div>
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">ชื่อเล่น (ภาษาอังกฤษ)</b></label>
								<div class="col-<?php echo $grid;?>-9">
									<div class="input-group">
										<input type="text"  name="nickEn" id="nickEn" class="form-control" placeholder="ชื่อเล่น (ภาษาอังกฤษ)" size="100" value="<?php echo $regina_stu_datarow["nickEn"];?>" maxlength="20" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>					
					</div>
				</div>			
				<div class="row">
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">ชื่อ (ภาษาอังกฤษ)</b></label>							
								<div class="col-<?php echo $grid;?>-10">
									<div class="input-group">
										<input type="text" name="rsd_nameEn" id="rsd_nameEn" class="form-control" placeholder="ชื่อ (ภาษาอังกฤษ)" size="100" value="<?php echo $regina_stu_datarow["stu_fname_e"];?>" maxlength="100" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>
					</div>
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">นามสกุล (ภาษาอังกฤษ)</b></label>
								<div class="col-<?php echo $grid;?>-9">
									<div class="input-group">
										<input type="text" name="rsd_surnameEn" id="rsd_surnameEn" class="form-control" placeholder="นามสกุล (ภาษาอังกฤษ)" size="100" value="<?php echo $regina_stu_datarow["stu_sname_e"];?>" maxlength="100" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>					
					</div>
				</div>
				<div class="row">
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-5"><b style="color: #00008B">เลขประจำตัวประชาชน</b></label>							
								<div class="col-<?php echo $grid;?>-7">
									<div class="input-group">
										<input type="text" name="rsd_Identification" id="rsd_Identification" class="form-control" placeholder="เลขประจำตัวชาชน / G Code" size="100" value="<?php echo $regina_stu_datarow["IDCard"];?>" maxlength="13"  required="required" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>
					</div>
					
				
					
		<?php
				if($data_studentrow["stu_birth"]==null){ ?>
					<div class="col-<?php echo $grid;?>-5">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-5"><b style="color: #00008B">วัน/เดือน/ปี เกิด ค.ศ.</b></label>
								<div class="col-<?php echo $grid;?>-7">
									<div class="input-group">
										<input type="text"  name="stu_birth" id="stu_birth" class="form-control pickadate-accessibility" placeholder="คลิกเลือก วัน/เดือน/ปี เกิด" size="100" value="<?php echo date("d-m-Y",strtotime($regina_stu_datarow["stu_birth"]));?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>					
					</div>				
		<?php	}else{ ?>
					<div class="col-<?php echo $grid;?>-5">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-5"><b style="color: #00008B">วัน/เดือน/ปี เกิด ค.ศ.</b></label>
								<div class="col-<?php echo $grid;?>-7">
									<div class="input-group">
										<input type="text"  name="stu_birth" id="stu_birth" class="form-control pickadate-accessibility" placeholder="คลิกเลือก วัน/เดือน/ปี เกิด" size="100" value="<?php echo $data_studentrow["stu_birth"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>					
					</div>				
		<?php	} ?>
					

					
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">กรุ๊ปเลือด</b></label>
								<div class="col-<?php echo $grid;?>-8">
										<select name="stu_blood" id="stu_blood" data-placeholder="กรุ๊ปเลือด..." class="select-size-<?php echo $grid;?>" style="font-family: surafont_sanukchang; font-size: 22px">
						<?php
							if($data_studentrow["stu_blood"]=="A"){ ?>
											<option></option>
											<optgroup label="กรุ๊ปเลือด">
												<option value="A" selected="selected">กรุ๊ปเลือด A</option>
												<option value="B">กรุ๊ปเลือด B</option>
												<option value="O">กรุ๊ปเลือด O</option>
												<option value="AB">กรุ๊ปเลือด AB</option>
											</optgroup>								
					<?php	}elseif($data_studentrow["stu_blood"]=="B"){ ?>
											<option></option>
											<optgroup label="กรุ๊ปเลือด">
												<option value="A">กรุ๊ปเลือด A</option>
												<option value="B" selected="selected">กรุ๊ปเลือด B</option>
												<option value="O">กรุ๊ปเลือด O</option>
												<option value="AB">กรุ๊ปเลือด AB</option>
											</optgroup>								
					<?php	}elseif($data_studentrow["stu_blood"]=="O"){ ?>
											<option></option>
											<optgroup label="กรุ๊ปเลือด">
												<option value="A">กรุ๊ปเลือด A</option>
												<option value="B">กรุ๊ปเลือด B</option>
												<option value="O" selected="selected">กรุ๊ปเลือด O</option>
												<option value="AB">กรุ๊ปเลือด AB</option>
											</optgroup>								
					<?php	}elseif($data_studentrow["stu_blood"]=="AB"){ ?>
											<option></option>
											<optgroup label="กรุ๊ปเลือด">
												<option value="A">กรุ๊ปเลือด A</option>
												<option value="B">กรุ๊ปเลือด B</option>
												<option value="O">กรุ๊ปเลือด O</option>
												<option value="AB" selected="selected">กรุ๊ปเลือด AB</option>
											</optgroup>								
					<?php	}else{ ?>
					
						<?php 	if($regina_stu_datarow["stu_blood"]=="A"){ ?>
											<option></option>
											<optgroup label="กรุ๊ปเลือด">
												<option value="A" selected="selected">กรุ๊ปเลือด A</option>
												<option value="B">กรุ๊ปเลือด B</option>
												<option value="O">กรุ๊ปเลือด O</option>
												<option value="AB">กรุ๊ปเลือด AB</option>
											</optgroup>								
						<?php	}elseif($regina_stu_datarow["stu_blood"]=="B"){ ?>
											<option></option>
											<optgroup label="กรุ๊ปเลือด">
												<option value="A">กรุ๊ปเลือด A</option>
												<option value="B" selected="selected">กรุ๊ปเลือด B</option>
												<option value="O">กรุ๊ปเลือด O</option>
												<option value="AB">กรุ๊ปเลือด AB</option>
											</optgroup>								
						<?php	}elseif($regina_stu_datarow["stu_blood"]=="O"){ ?>
											<option></option>
											<optgroup label="กรุ๊ปเลือด">
												<option value="A">กรุ๊ปเลือด A</option>
												<option value="B">กรุ๊ปเลือด B</option>
												<option value="O" selected="selected">กรุ๊ปเลือด O</option>
												<option value="AB">กรุ๊ปเลือด AB</option>
											</optgroup>								
						<?php	}elseif($regina_stu_datarow["stu_blood"]=="AB"){ ?>
											<option></option>
											<optgroup label="กรุ๊ปเลือด">
												<option value="A">กรุ๊ปเลือด A</option>
												<option value="B">กรุ๊ปเลือด B</option>
												<option value="O">กรุ๊ปเลือด O</option>
												<option value="AB" selected="selected">กรุ๊ปเลือด AB</option>
											</optgroup>								
						<?php	}else{  ?>
											<option></option>
											<optgroup label="กรุ๊ปเลือด">
												<option value="A">กรุ๊ปเลือด A</option>
												<option value="B">กรุ๊ปเลือด B</option>
												<option value="O">กรุ๊ปเลือด O</option>
												<option value="AB">กรุ๊ปเลือด AB</option>
											</optgroup>								
						<?php	}?>

					<?php	}   ?>
										</select>
								</div>
							</div>
                        </fieldset>						
					</div>
									
				</div>				
				<div class="row">
				
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">เชื้อชาติ</b></label>
								<div class="col-<?php echo $grid;?>-9">
									<div class="form-group">
										<select name="stu_nation" id="stu_nation" data-placeholder="เชื้อชาติ..." class="select-size-<?php echo $grid;?>" style="font-family: surafont_sanukchang; font-size: 22px">
											<option></option>
											<optgroup label="เชื้อชาติ">
						<?php
								if($data_studentrow["stu_nation"]=="188"){ ?>
												<option value="188" selected="selected">ไทย / Thailand</option>
						<?php	}else{ ?>
												<option value="188">ไทย / Thailand</option>
						<?php	}      ?>				
						
							<?php
								$stusun_stu="SELECT `id`,`country_name_th`,`country_name_en` FROM `db_country`where `id`!='188' order by convert ( `country_name_th` using tis620) asc";
								$stusun_sturs=new row_datastu($stusun_stu);
								foreach($stusun_sturs->datastu_array as $rc_key=>$stusun_sturow){ 
									if($data_studentrow["stu_nation"]==$stusun_sturow["id"]){
										$stu_selected="selected";
									}else{
										$stu_selected="";
									}
								?>
											<option value="<?php echo $stusun_sturow["id"] ;?>" <?php echo $stu_selected;?>><?php echo $stusun_sturow["country_name_th"]." / ".$stusun_sturow["country_name_en"];?></option>
							<?php		 } ?>						
						
											</optgroup>
										</select>
									</div>
								</div>
							</div>
                        </fieldset>					
					</div>
				
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">สัญชาติ</b></label>
								<div class="col-<?php echo $grid;?>-9">
										<select name="stu_sun" id="stu_sun" data-placeholder="สัญชาติ..." class="select-size-<?php echo $grid;?>" style="font-family: surafont_sanukchang; font-size: 22px">
											<option></option>
											<optgroup label="สัญชาติ">

						<?php
								if($data_studentrow["stu_sun"]=="188"){ ?>
												<option value="188" selected="selected">ไทย / Thailand</option>
						<?php	}else{ ?>
												<option value="188">ไทย / Thailand</option>
						<?php	}      ?>				
						
							<?php
								$stusun_stu="SELECT `id`,`country_name_th`,`country_name_en` FROM `db_country`where `id`!='188' order by convert ( `country_name_th` using tis620) asc";
								$stusun_sturs=new row_datastu($stusun_stu);
								foreach($stusun_sturs->datastu_array as $rc_key=>$stusun_sturow){ 
									if($data_studentrow["stu_sun"]==$stusun_sturow["id"]){
										$stu_selected="selected";
									}else{
										$stu_selected="";
									}
								?>
											<option value="<?php echo $stusun_sturow["id"] ;?>" <?php echo $stu_selected;?>><?php echo $stusun_sturow["country_name_th"]." / ".$stusun_sturow["country_name_en"];?></option>
							<?php		 } ?>

											</optgroup>
										</select>
								</div>
							</div>
                        </fieldset>					
					</div>

					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">ศาสนา</b></label>
								<div class="col-<?php echo $grid;?>-9">
										<select name="IDReligion" id="IDReligion" data-placeholder="ศาสนา..." class="select-size-<?php echo $grid;?>" style="font-family: surafont_sanukchang; font-size: 22px">
											<option></option>
											<optgroup label="ศาสนา">
							<?php
								$ReligionSql="SELECT `IDReligion`,`Religion` FROM `rc_religion`";
								$Religion=new row_datastu($ReligionSql);
								foreach($Religion->datastu_array as $rc_key=>$Religion_print){ 
								if($data_studentrow["IDReligion"]==$Religion_print["IDReligion"]){
									$stu_Religion="selected";
								}else{
									$stu_Religion="";
								}
								?>
											<option value="<?php echo $Religion_print["IDReligion"];?>" <?php echo $stu_Religion;?>><?php echo $Religion_print["Religion"];?></option>
							<?php	} ?>					

											</optgroup>
										</select>	
								</div>
							</div>
                        </fieldset>					
					</div>

					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-5"><b style="color: #00008B">เบอร์โทรศัทพ์</b></label>							
								<div class="col-<?php echo $grid;?>-7">
									<div class="input-group">
										<input type="text" name="stu_phone" id="stu_phone" class="form-control" placeholder="เบอร์โทรศัทพ์..." size="100" data-masked-input="9999999999" maxlength="10"  value="<?php echo $data_studentrow["stu_phone"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>					
					</div>
				</div>
				
				<div class="row">
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">จำนวนพี่น้องรวม</b></label>
								<div class="col-<?php echo $grid;?>-6">
									<div class="input-group">
										<input type="number"  name="stu_brethren" id="stu_brethren" value="<?php echo $data_studentrow["stu_brethren"];?>" min="0" class="form-control"  size="100" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
								<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">คน</b></label>
							</div>
                        </fieldset>					
					</div>
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-6"><b style="color: #00008B">มีพี่น้องเรียนสถานศึกษานี้</b></label>
								<div class="col-<?php echo $grid;?>-4">
									<div class="input-group">
										<input type="number" name="stu_brethreS" id="stu_brethreS" value="<?php echo $data_studentrow["stu_brethreS"];?>" min="0" class="form-control"  size="100" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
								<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">คน</b></label>
							</div>
                        </fieldset>					
					
					</div>
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">เป็นบุตรคนที่</b></label>
								<div class="col-<?php echo $grid;?>-8">
									<div class="input-group">
										<input type="number"  name="stu_child" id="stu_child" value="<?php echo $data_studentrow["stu_child"];?>"  min="0" class="form-control"  size="100" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>					
					
					</div>
				</div>
				
				<div class="row">
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">ความบกพร่องทางร่างกาย</b></label>
								<div class="col-<?php echo $grid;?>-8">
										<select name="stu_physical" id="stu_physical" data-placeholder="ความบกพร่องทางร่างกาย..." class="select-size-<?php echo $grid;?>" >
											<option></option>
											<optgroup label="ความบกพร่องทางร่างกาย">
									
							<?php
									if($data_studentrow["stu_physical"]==""){ ?>
<!--********************************************************************************************************************************-->									
							<?php
									$physicalSql="SELECT `disabled_id`,`disabled_txt` FROM `data_disabled`;";
									$physicalRs=new row_datastu($physicalSql);
									foreach($physicalRs->datastu_array as $rc_key=>$physicalRow){
									if($physicalRow["disabled_id"]=="0000"){
										$stu_p="selected";
									}else{
										$stu_p="";
									}
									
							?>
										<option value="<?php echo $physicalRow["disabled_id"];?>" <?php echo $stu_p;?>><?php echo $physicalRow["disabled_txt"];?></option>
							<?php	}?>
<!--********************************************************************************************************************************-->								
							<?php	}else{ ?>
<!--********************************************************************************************************************************-->								
							<?php
									$physicalSql="SELECT `disabled_id`,`disabled_txt` FROM `data_disabled`;";
									$physicalRs=new row_datastu($physicalSql);
									foreach($physicalRs->datastu_array as $rc_key=>$physicalRow){
									if($data_studentrow["stu_physical"]==$physicalRow["disabled_id"]){
										$stu_p="selected";
									}else{
										$stu_p="";
									}
									
							?>
										<option value="<?php echo $physicalRow["disabled_id"];?>" <?php echo $stu_p;?>><?php echo $physicalRow["disabled_txt"];?></option>
							<?php	}?>	
<!--********************************************************************************************************************************-->								
							<?php	}  ?>
									
		
											</optgroup>
										</select>
								</div>
							</div>
                        </fieldset>					
					</div>
				

					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">สถานที่เกิด (โรงพยาบาล)</b></label>
								<div class="col-<?php echo $grid;?>-8">
									<div class="input-group">
										<input type="text" name="breed_add" id="breed_add" class="form-control" placeholder="สถานที่เกิด (โรงพยาบาล)" size="100" maxlength="100" value="<?php echo $data_studentrow["breed_add"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>					
					</div>
				</div>
				<div class="row">
				
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">จังหวัดที่เกิด (โรงพยาบาล)</b></label>
									<div class="col-<?php echo $grid;?>-8">	
										<select name="breed_province" id="breed_province" data-placeholder="จังหวัดที่เกิด..." class="select-size-<?php echo $grid;?>" style="font-family: surafont_sanukchang; font-size: 22px">
											<option></option>
											<optgroup label="จังหวัด">
											
								<?php
									$data_provinces="SELECT `PROVINCE_ID`,`PROVINCE_NAME`,`PROVINCE_NAME_ENG` FROM `provinces` order by convert ( `PROVINCE_NAME` using tis620) asc";
									$txt_provinces=new row_datastu($data_provinces);
									foreach($txt_provinces->datastu_array as $rc_key=>$provincesRow){
										if($data_studentrow["breed_province"]==$provincesRow["PROVINCE_ID"]){
											$pr_selected="selected";
										}else{
											$pr_selected="";
										}
										?>
									
												<option value="<?php echo $provincesRow["PROVINCE_ID"];?>" <?php echo $pr_selected;?>><?php echo $provincesRow["PROVINCE_NAME"]." / ".$provincesRow["PROVINCE_NAME_ENG"];?></option>
								<?php	} ?>			 
											</optgroup>
										</select>
									</div>	
							</div>
                        </fieldset>					
					</div>					
				
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">อำเภอที่เกิด (โรงพยาบาล)</b></label>
									<div class="col-<?php echo $grid;?>-9">	
										<div class="form-group">
											<select name="breed_city" id="breed_city" data-placeholder="อำเภอที่เกิด..." class="select-size-<?php echo $grid;?>" style="font-family: surafont_sanukchang; font-size: 22px">
												<option></option>
												<optgroup label="อำเภอ">
												
								<?php
									$amphuresSql="SELECT `AMPHUR_ID`,`AMPHUR_NAME`,`AMPHUR_NAME_ENG` FROM `amphures` WHERE `PROVINCE_ID`='{$data_studentrow["breed_province"]}'";
									$amphuresRs=new row_datastu($amphuresSql);
									foreach($amphuresRs->datastu_array as $rc_key=>$amphuresRow){
										if($data_studentrow["breed_city"]==$amphuresRow["AMPHUR_ID"]){
											$bc_selected="selected";
										}else{
											$bc_selected="";
										}

										?>
													<option value="<?php echo $amphuresRow["AMPHUR_ID"];?>" <?php echo $bc_selected;?>><?php echo $amphuresRow["AMPHUR_NAME"]." / ".$amphuresRow["AMPHUR_NAME_ENG"];?></option>
							<?php	}   ?>				
												</optgroup>
											</select>
										</div>
									</div>	
							</div>
                        </fieldset>					
					
					</div>
					
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">ตำบลที่เกิด (โรงพยาบาล)</b></label>
									<div class="col-<?php echo $grid;?>-9">	
										<div class="form-group">
											<select name="breed_district" id="breed_district" data-placeholder="ตำบลที่เกิด..." class="select-size-<?php echo $grid;?>">
												<option></option>
												<optgroup label="ตำบล">
									<?php
										$districtsSql="SELECT `DISTRICT_ID`,`DISTRICT_NAME`,`DISTRICT_NAME_ENG` FROM `districts` WHERE `AMPHUR_ID`='{$data_studentrow["breed_city"]}';";
										$districts=new row_datastu($districtsSql);
										foreach($districts->datastu_array as $rc_key=>$districts_print){
											if($data_studentrow["breed_district"]==$districts_print["DISTRICT_ID"]){
												$bd_selected="selected";
											}else{
												$bd_selected="";
											}
											?>
												<option value="<?php echo $districts_print["DISTRICT_ID"];?>" <?php echo $bd_selected;?>><?php echo $districts_print["DISTRICT_NAME"]." / ".$districts_print["DISTRICT_NAME_ENG"];?></option>
								<?php	} ?>

												</optgroup>
											</select>
										</div>
									</div>	
							</div>
                        </fieldset>						
					
					</div>
				
				</div><hr>
				
				<div class="row">
					<div class="col-<?php echo $grid;?>-12">
						<p><h4><u><b style="color: #336600">ที่อยู่ตามทะเบียนบ้าน</b></u></h4></p>
					</div>
				</div><hr>
				
                
                <div class="row">
                    <div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">บ้านเลขที่</b></label>
								<div class="col-<?php echo $grid;?>-8">
									<div class="input-group">
										<input type="text" name="stu_reg_hno" id="stu_reg_hno" class="form-control" placeholder="บ้านเลขที่ ตามทะเบียนบ้าน" size="100" maxlength="30" value="<?php echo $stu_address_homeRow["stu_reg_hno"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>	                    
                    </div>
                    <div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">ชื่อหมู่บ้าน</b></label>
								<div class="col-<?php echo $grid;?>-9">
									<div class="input-group">
										<input type="text" name="stu_reg_moo_name" id="stu_reg_moo_name" class="form-control" placeholder="ชื่อหมู่บ้าน ตามทะเบียนบ้าน" size="100" maxlength="100" value="<?php echo $stu_address_homeRow["stu_reg_moo_name"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>	                    
                    </div>
                    <div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">หมู่ที่</b></label>
								<div class="col-<?php echo $grid;?>-9">
									<div class="input-group">
										<input type="text" name="stu_reg_moo" id="stu_reg_moo" class="form-control" placeholder="หมู่ที่ ตามทะเบียนบ้าน" size="100" maxlength="3" value="<?php echo $stu_address_homeRow["stu_reg_moo"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>	                    
                    </div>                    
                </div>
                
                
				<div class="row">
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">ซอย</b></label>
								<div class="col-<?php echo $grid;?>-10">
									<div class="input-group">
										<input type="text" name="stu_reg_soi" id="stu_reg_soi" class="form-control" placeholder=" ซอย ตามทะเบียนบ้าน" size="100" maxlength="100" value="<?php echo $stu_address_homeRow["stu_reg_soi"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>						
					</div>
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">ถนน</b></label>
								<div class="col-<?php echo $grid;?>-10">
									<div class="input-group">
										<input type="text" name="stu_reg_road" id="stu_reg_road" class="form-control" placeholder="ถนน ตามทะเบียนบ้าน" size="100" maxlength="100" value="<?php echo $stu_address_homeRow["stu_reg_road"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>						
					</div>
				</div>








				<div class="row">
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">จังหวัด</b></label>
								<div class="col-<?php echo $grid;?>-10">
									<div class="form-group">

										<select  name="stu_reg_province" id="stu_reg_province" data-placeholder="จังหวัด..." class="select-size-<?php echo $grid;?>">
											<option></option>
											<optgroup label="จังหวัด">
											
								<?php
									$data_provinces="SELECT `PROVINCE_ID`,`PROVINCE_NAME`,`PROVINCE_NAME_ENG` FROM `provinces` order by convert ( `PROVINCE_NAME` using tis620) asc";
									$txt_provinces=new row_datastu($data_provinces);
									foreach($txt_provinces->datastu_array as $rc_key=>$provincesRow){
										if($stu_address_homeRow["stu_reg_province"]==$provincesRow["PROVINCE_ID"]){
											$srp_selected="selected";
										}else{
											$srp_selected="";
										}
										?>
									
												<option value="<?php echo $provincesRow["PROVINCE_ID"];?>" <?php echo $srp_selected;?>><?php echo $provincesRow["PROVINCE_NAME"]." / ".$provincesRow["PROVINCE_NAME_ENG"];?></option>
								<?php	} ?>											
			 
											</optgroup>
										</select>
									</div>
								</div>
							</div>
                        </fieldset>					
					</div>

					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">อำเภอ</b></label>
								<div class="col-<?php echo $grid;?>-9">
									<div class="form-group">

										<select name="stu_reg_amphur" id="stu_reg_amphur" data-placeholder="อำเภอ..." class="select-size-<?php echo $grid;?>">
											<option></option>
											<optgroup label="อำเภอ">
											
							<?php
								$amphuresSql="SELECT `AMPHUR_ID`,`AMPHUR_NAME`,`AMPHUR_NAME_ENG` FROM `amphures` WHERE `PROVINCE_ID`='{$stu_address_homeRow["stu_reg_province"]}'";
								$amphuresRs=new row_datastu($amphuresSql);
								foreach($amphuresRs->datastu_array as $rc_key=>$amphuresRow){ 
								if($stu_address_homeRow["stu_reg_amphur"]==$amphuresRow["AMPHUR_ID"]){
									$sra_selected="selected";
								}else{
									$sra_selected="";
								}
								
								?>
												<option value="<?php echo $amphuresRow["AMPHUR_ID"];?>" <?php echo $sra_selected;?>><?php echo $amphuresRow["AMPHUR_NAME"]." / ".$amphuresRow["AMPHUR_NAME_ENG"];?></option>
						<?php	}   ?>				
											</optgroup>


										</select>
									</div>	
								</div>
							</div>
                        </fieldset>					
					</div>
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">ตำบล</b></label>
								<div class="col-<?php echo $grid;?>-9">
									<div class="form-group">
										<select name="stu_reg_tumbon" id="stu_reg_tumbon" data-placeholder="ตำบล..." class="select-size-<?php echo $grid;?>">
											<option></option>
											<optgroup label="ตำบล">
								<?php
									$districtsSql="SELECT `DISTRICT_ID`,`DISTRICT_NAME`,`DISTRICT_NAME_ENG` FROM `districts` WHERE `AMPHUR_ID`='{$stu_address_homeRow["stu_reg_amphur"]}';";
									$districts=new row_datastu($districtsSql);
									foreach($districts->datastu_array as $rc_key=>$districts_print){ 
									if($stu_address_homeRow["stu_reg_tumbon"]==$districts_print["DISTRICT_ID"]){
										$srt_selected="selected";
									}else{
										$srt_selected="";
									}
									?>
											<option value="<?php echo $districts_print["DISTRICT_ID"];?>"<?php echo $srt_selected;?>><?php echo $districts_print["DISTRICT_NAME"]." / ".$districts_print["DISTRICT_NAME_ENG"];?></option>
							<?php	} ?>

											</optgroup>
										</select>
									</div>	
								</div>
							</div>
                        </fieldset>					
					</div>
					<div class="col-<?php echo $grid;?>-3"> 
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-5"><b style="color: #00008B">รหัสไปรษณีย์</b></label>
								<div class="col-<?php echo $grid;?>-7">
									<div class="input-group">
										<div id="stu_reg_zipcode"><input type="text" name="stu_reg_zipcode" id="stu_reg_zipcodecopy" readonly="readonly" class="form-control" placeholder="รหัสไปรษณีย์" size="100" maxlength="6" value="<?php echo $stu_address_homeRow["stu_reg_zipcode"];?>" style="font-family: surafont_sanukchang; font-size: 18px"></div>
									</div>
								</div>
							</div>
                        </fieldset>					
					</div>
				</div>
			

			
	<?php
		if($stu_addressRow["stu_province"]==null and $stu_addressRow["stu_amphur"]==null and $stu_addressRow["stu_tumbon"]==null){ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->				
				<div class="row">
					<div class="col-<?php echo $grid;?>-2">
						<p><h4><u><b style="color: #336600">ที่อยู่ปัจจุบัน</b></u></h4></p>
					</div>
					<div class="col-<?php echo $grid;?>-10">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="radio-inline">
									<input type="radio" class="styled" name="copy_home" id="homeA" value="A">
									อ้างอิงจากที่อยู่ทะเบียนบ้าน
								</label>
								<label class="radio-inline">
									<input type="radio" class="styled" name="copy_home" id="homeB" value="B">
									ไม่อ้างอิงจากที่อยู่ทะเบียนบ้าน
								</label>								
							</div>
						</fieldset>
					</div>
				</div>
				<div id="call_run_adder"></div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->			
<?php	}else{ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
				<div class="row">
					<div class="col-<?php echo $grid;?>-12">
						<p><h4><u><b style="color: #336600">ที่อยู่ปัจจุบัน</b></u></h4></p>
					</div>
				</div>			
                
                <div class="row">
                    <div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">บ้านเลขที่</b></label>
								<div class="col-<?php echo $grid;?>-8">
									<div class="input-group">
										<input type="text" name="stu_hno" id="stu_hno" class="form-control" placeholder="บ้านเลขที่" size="100" maxlength="100" value="<?php echo $stu_addressRow["stu_hno"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>	                    
                    </div>
                    <div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">ชื่อหมู่บ้าน</b></label>
								<div class="col-<?php echo $grid;?>-9">
									<div class="input-group">
										<input type="text" class="form-control" name="stu_moo_name" id="stu_moo_name" placeholder="ชื่อหมู่บ้าน" size="100" maxlength="100" value="<?php echo $stu_addressRow["stu_moo_name"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>                    
                    </div>
                    <div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">หมู่ที่</b></label>
								<div class="col-<?php echo $grid;?>-10">
									<div class="input-group">
										<input type="text" class="form-control" name="stu_moo" id="stu_moo" placeholder="หมู่ที่" size="100" maxlength="3" value="<?php echo $stu_addressRow["stu_moo"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>                    
                    </div>
                </div>
			
				<div class="row">
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">ซอย</b></label>
								<div class="col-<?php echo $grid;?>-10">
									<div class="input-group">
										<input type="text" class="form-control" name="stu_soi" id="stu_soi" placeholder="ซอย" size="100" maxlength="100" value="<?php echo $stu_addressRow["stu_soi"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>					
					</div>
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">ถนน</b></label>
								<div class="col-<?php echo $grid;?>-10">
									<div class="input-group">
										<input type="text" class="form-control" name="stu_road" id="stu_road" placeholder="ถนน" size="100" maxlength="100" value="<?php echo $stu_addressRow["stu_road"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>							
					</div>
				</div>

				<div class="row">
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">จังหวัด</b></label>
								<div class="col-<?php echo $grid;?>-9">
										<select data-placeholder="จังหวัด..." class="select-size-<?php echo $grid;?>"  id="stu_province" name="stu_province">
											<option></option>
											<optgroup label="จังหวัด">
											
								<?php
									$data_provinces="SELECT `PROVINCE_ID`,`PROVINCE_NAME`,`PROVINCE_NAME_ENG` FROM `provinces` order by convert ( `PROVINCE_NAME` using tis620) asc";
									$txt_provinces=new row_datastu($data_provinces);
									foreach($txt_provinces->datastu_array as $rc_key=>$provincesRow){
										if($stu_addressRow["stu_province"]==$provincesRow["PROVINCE_ID"]){
											$pr_selected="selected";
										}else{
											$pr_selected="";
										}
										?>
									
												<option value="<?php echo $provincesRow["PROVINCE_ID"];?>" <?php echo $pr_selected;?>><?php echo $provincesRow["PROVINCE_NAME"]." / ".$provincesRow["PROVINCE_NAME_ENG"];?></option>
								<?php	} ?>			 
											</optgroup>
										</select>
								</div>
							</div>
                        </fieldset>									
					</div>
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">อำเภอ</b></label>
								<div class="col-<?php echo $grid;?>-9">
										<select data-placeholder="อำเภอ..." class="select-size-<?php echo $grid;?>" name="stu_amphur" id="stu_amphur">
											<option></option>
											<optgroup label="อำเภอ">
											
							<?php
								$amphuresSql="SELECT `AMPHUR_ID`,`AMPHUR_NAME`,`AMPHUR_NAME_ENG` FROM `amphures` WHERE `PROVINCE_ID`='{$stu_addressRow["stu_province"]}'";
								$amphuresRs=new row_datastu($amphuresSql);
								foreach($amphuresRs->datastu_array as $rc_key=>$amphuresRow){ 
								if($stu_addressRow["stu_amphur"]==$amphuresRow["AMPHUR_ID"]){
									$sa_selected="selected";
								}else{
									$sa_selected="";
								}
								?>
												<option value="<?php echo $amphuresRow["AMPHUR_ID"];?>" <?php echo $sa_selected;?>><?php echo $amphuresRow["AMPHUR_NAME"]." / ".$amphuresRow["AMPHUR_NAME_ENG"];?></option>
						<?php	}   ?>				
											</optgroup>
										</select>
								</div>
							</div>
                        </fieldset>									
					</div>
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">ตำบล</b></label>
								<div class="col-<?php echo $grid;?>-9">
										<select data-placeholder="ตำบล..." class="select-size-<?php echo $grid;?>" name="stu_tumbon" id="stu_tumbon">
											<option></option>
											<optgroup label="ตำบล">
								<?php
									$districtsSql="SELECT `DISTRICT_ID`,`DISTRICT_NAME`,`DISTRICT_NAME_ENG` FROM `districts` WHERE `AMPHUR_ID`='{$stu_addressRow["stu_amphur"]}';";
									$districts=new row_datastu($districtsSql);
									foreach($districts->datastu_array as $rc_key=>$districts_print){ 
										if($stu_addressRow["stu_tumbon"]==$districts_print["DISTRICT_ID"]){
											$stum_selected="selected";
										}else{
											$stum_selected="";
										}
									
									?>
											<option value="<?php echo $districts_print["DISTRICT_ID"];?>" <?php echo $stum_selected;?>><?php echo $districts_print["DISTRICT_NAME"]." / ".$districts_print["DISTRICT_NAME_ENG"];?></option>
							<?php	} ?>

											</optgroup>
										</select>
								</div>
							</div>
                        </fieldset>											
					</div>
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-5"><b style="color: #00008B">รหัสไปรษณีย์</b></label>
								<div class="col-<?php echo $grid;?>-7">
									<div class="input-group">
										<div id="stu_zipcode"><input type="text" name="stu_zipcode" id="stu_zipcodecopy" class="form-control" readonly="readonly" placeholder="รหัสไปรษณีย์" size="100" maxlength="6" value="<?php echo $stu_addressRow["stu_zipcode"];?>" style="font-family: surafont_sanukchang; font-size: 18px"></div>
									</div>
								</div>
							</div>
                        </fieldset>						
					</div>
				</div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->			
<?php	}?>		
			
			
			

				<div class="row">
					<div class="col-<?php echo $grid;?>-12">
						<p><h4><u><b style="color: #336600">ประวิติการศึกษา</b></u></h4></p>
					</div>
				</div><hr>


				<div class="row">
				
				
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-5"><b style="color: #00008B">ชั้นเรียนสุดท้ายก่อนเข้าเรียน โรงเรียนเรยีนา</b>
								<p style="color: #ff6600">(ตัวอย่าง เข้าเรียนชั้น อ.3 ชั้นเรียนสุดท้ายก่อนโรงเรียน คือ ชั้น อ.2 )</p>								
								</label>

								<div class="col-<?php echo $grid;?>-7">
									<select  data-placeholder="ระดับชั้น..." class="select-size-<?php echo $grid;?>" name="ds_OriginalClass" id="ds_OriginalClass" >
										<option></option>
											
					<?php
							if($data_studentrow["ds_OriginalClass"]==2){ ?>
	<!--************************************************************************************-->	
			
											<optgroup label="อนุบาล">

												<option value="2" selected>อนุบาล 2</option>
												<option value="3">อนุบาล 3</option>
											</optgroup>
											<optgroup label="ประถมศึกษา">
													<option value="11">ประถมศึกษาปีที่ 1</option>
													<option value="12">ประถมศึกษาปีที่ 2</option>
													<option value="13">ประถมศึกษาปีที่ 3</option>
													<option value="21">ประถมศึกษาปีที่ 4</option>
													<option value="22">ประถมศึกษาปีที่ 5</option>
													<option value="23">ประถมศึกษาปีที่ 6</option>
											</optgroup>
											<optgroup label="มัธยมศึกษาตอนต้น">
													<option value="31">มัธยมศึกษาปีที่ 1</option>
													<option value="32">มัธยมศึกษาปีที่ 2</option>
													<option value="33">มัธยมศึกษาปีที่ 3</option>
											</optgroup>											
											<optgroup label="มัธยมศึกษาปลาย">
													<option value="41">มัธยมศึกษาปีที่ 4</option>
													<option value="42">มัธยมศึกษาปีที่ 5</option>
													<option value="43">มัธยมศึกษาปีที่ 6</option>
											</optgroup>					
	<!--************************************************************************************-->						
				<?php		}elseif($data_studentrow["ds_OriginalClass"]==3){ ?>
	<!--************************************************************************************-->	
											
											<optgroup label="อนุบาล">

												
												<option value="2">อนุบาล 2</option>
												<option value="3" selected>อนุบาล 3</option>
											</optgroup>
											<optgroup label="ประถมศึกษา">
													<option value="11">ประถมศึกษาปีที่ 1</option>
													<option value="12">ประถมศึกษาปีที่ 2</option>
													<option value="13">ประถมศึกษาปีที่ 3</option>
													<option value="21">ประถมศึกษาปีที่ 4</option>
													<option value="22">ประถมศึกษาปีที่ 5</option>
													<option value="23">ประถมศึกษาปีที่ 6</option>
											</optgroup>
											<optgroup label="มัธยมศึกษาตอนต้น">
													<option value="31">มัธยมศึกษาปีที่ 1</option>
													<option value="32">มัธยมศึกษาปีที่ 2</option>
													<option value="33">มัธยมศึกษาปีที่ 3</option>
											</optgroup>											
											<optgroup label="มัธยมศึกษาปลาย">
													<option value="41">มัธยมศึกษาปีที่ 4</option>
													<option value="42">มัธยมศึกษาปีที่ 5</option>
													<option value="43">มัธยมศึกษาปีที่ 6</option>
											</optgroup>					
	<!--************************************************************************************-->						
				<?php		}elseif($data_studentrow["ds_OriginalClass"]==11){ ?>
	<!--************************************************************************************-->	
											
											<optgroup label="อนุบาล">
												
												
												<option value="2">อนุบาล 2</option>
												<option value="3">อนุบาล 3</option>
											</optgroup>
											<optgroup label="ประถมศึกษา">
													<option value="11" selected>ประถมศึกษาปีที่ 1</option>
													<option value="12">ประถมศึกษาปีที่ 2</option>
													<option value="13">ประถมศึกษาปีที่ 3</option>
													<option value="21">ประถมศึกษาปีที่ 4</option>
													<option value="22">ประถมศึกษาปีที่ 5</option>
													<option value="23">ประถมศึกษาปีที่ 6</option>
											</optgroup>
											<optgroup label="มัธยมศึกษาตอนต้น">
													<option value="31">มัธยมศึกษาปีที่ 1</option>
													<option value="32">มัธยมศึกษาปีที่ 2</option>
													<option value="33">มัธยมศึกษาปีที่ 3</option>
											</optgroup>											
											<optgroup label="มัธยมศึกษาปลาย">
													<option value="41">มัธยมศึกษาปีที่ 4</option>
													<option value="42">มัธยมศึกษาปีที่ 5</option>
													<option value="43">มัธยมศึกษาปีที่ 6</option>
											</optgroup>					
	<!--************************************************************************************-->						
				<?php		}elseif($data_studentrow["ds_OriginalClass"]==12){ ?>
	<!--************************************************************************************-->	
											
											<optgroup label="อนุบาล">
												
												
												<option value="2">อนุบาล 2</option>
												<option value="3">อนุบาล 3</option>
											</optgroup>
											<optgroup label="ประถมศึกษา">
													<option value="11">ประถมศึกษาปีที่ 1</option>
													<option value="12" selected>ประถมศึกษาปีที่ 2</option>
													<option value="13">ประถมศึกษาปีที่ 3</option>
													<option value="21">ประถมศึกษาปีที่ 4</option>
													<option value="22">ประถมศึกษาปีที่ 5</option>
													<option value="23">ประถมศึกษาปีที่ 6</option>
											</optgroup>
											<optgroup label="มัธยมศึกษาตอนต้น">
													<option value="31">มัธยมศึกษาปีที่ 1</option>
													<option value="32">มัธยมศึกษาปีที่ 2</option>
													<option value="33">มัธยมศึกษาปีที่ 3</option>
											</optgroup>											
											<optgroup label="มัธยมศึกษาปลาย">
													<option value="41">มัธยมศึกษาปีที่ 4</option>
													<option value="42">มัธยมศึกษาปีที่ 5</option>
													<option value="43">มัธยมศึกษาปีที่ 6</option>
											</optgroup>					
	<!--************************************************************************************-->						
				<?php		}elseif($data_studentrow["ds_OriginalClass"]==13){ ?>
	<!--************************************************************************************-->	
											
											<optgroup label="อนุบาล">
												
												
												<option value="2">อนุบาล 2</option>
												<option value="3">อนุบาล 3</option>
											</optgroup>
											<optgroup label="ประถมศึกษา">
													<option value="11">ประถมศึกษาปีที่ 1</option>
													<option value="12">ประถมศึกษาปีที่ 2</option>
													<option value="13" selected>ประถมศึกษาปีที่ 3</option>
													<option value="21">ประถมศึกษาปีที่ 4</option>
													<option value="22">ประถมศึกษาปีที่ 5</option>
													<option value="23">ประถมศึกษาปีที่ 6</option>
											</optgroup>
											<optgroup label="มัธยมศึกษาตอนต้น">
													<option value="31">มัธยมศึกษาปีที่ 1</option>
													<option value="32">มัธยมศึกษาปีที่ 2</option>
													<option value="33">มัธยมศึกษาปีที่ 3</option>
											</optgroup>											
											<optgroup label="มัธยมศึกษาปลาย">
													<option value="41">มัธยมศึกษาปีที่ 4</option>
													<option value="42">มัธยมศึกษาปีที่ 5</option>
													<option value="43">มัธยมศึกษาปีที่ 6</option>
											</optgroup>					
	<!--************************************************************************************-->						
				<?php		}elseif($data_studentrow["ds_OriginalClass"]==21){ ?>
	<!--************************************************************************************-->	
											
											<optgroup label="อนุบาล">
												
												
												<option value="2">อนุบาล 2</option>
												<option value="3">อนุบาล 3</option>
											</optgroup>
											<optgroup label="ประถมศึกษา">
													<option value="11">ประถมศึกษาปีที่ 1</option>
													<option value="12">ประถมศึกษาปีที่ 2</option>
													<option value="13">ประถมศึกษาปีที่ 3</option>
													<option value="21" selected>ประถมศึกษาปีที่ 4</option>
													<option value="22">ประถมศึกษาปีที่ 5</option>
													<option value="23">ประถมศึกษาปีที่ 6</option>
											</optgroup>
											<optgroup label="มัธยมศึกษาตอนต้น">
													<option value="31">มัธยมศึกษาปีที่ 1</option>
													<option value="32">มัธยมศึกษาปีที่ 2</option>
													<option value="33">มัธยมศึกษาปีที่ 3</option>
											</optgroup>											
											<optgroup label="มัธยมศึกษาปลาย">
													<option value="41">มัธยมศึกษาปีที่ 4</option>
													<option value="42">มัธยมศึกษาปีที่ 5</option>
													<option value="43">มัธยมศึกษาปีที่ 6</option>
											</optgroup>					
	<!--************************************************************************************-->						
				<?php		}elseif($data_studentrow["ds_OriginalClass"]==22){ ?>
	<!--************************************************************************************-->	
											
											<optgroup label="อนุบาล">
												
												
												<option value="2">อนุบาล 2</option>
												<option value="3">อนุบาล 3</option>
											</optgroup>
											<optgroup label="ประถมศึกษา">
													<option value="11">ประถมศึกษาปีที่ 1</option>
													<option value="12">ประถมศึกษาปีที่ 2</option>
													<option value="13">ประถมศึกษาปีที่ 3</option>
													<option value="21">ประถมศึกษาปีที่ 4</option>
													<option value="22" selected>ประถมศึกษาปีที่ 5</option>
													<option value="23">ประถมศึกษาปีที่ 6</option>
											</optgroup>
											<optgroup label="มัธยมศึกษาตอนต้น">
													<option value="31">มัธยมศึกษาปีที่ 1</option>
													<option value="32">มัธยมศึกษาปีที่ 2</option>
													<option value="33">มัธยมศึกษาปีที่ 3</option>
											</optgroup>											
											<optgroup label="มัธยมศึกษาปลาย">
													<option value="41">มัธยมศึกษาปีที่ 4</option>
													<option value="42">มัธยมศึกษาปีที่ 5</option>
													<option value="43">มัธยมศึกษาปีที่ 6</option>
											</optgroup>					
	<!--************************************************************************************-->						
				<?php		}elseif($data_studentrow["ds_OriginalClass"]==23){ ?>
	<!--************************************************************************************-->	
											
											<optgroup label="อนุบาล">
												
												
												<option value="2">อนุบาล 2</option>
												<option value="3">อนุบาล 3</option>
											</optgroup>
											<optgroup label="ประถมศึกษา">
													<option value="11">ประถมศึกษาปีที่ 1</option>
													<option value="12">ประถมศึกษาปีที่ 2</option>
													<option value="13">ประถมศึกษาปีที่ 3</option>
													<option value="21">ประถมศึกษาปีที่ 4</option>
													<option value="22">ประถมศึกษาปีที่ 5</option>
													<option value="23" selected>ประถมศึกษาปีที่ 6</option>
											</optgroup>
											<optgroup label="มัธยมศึกษาตอนต้น">
													<option value="31">มัธยมศึกษาปีที่ 1</option>
													<option value="32">มัธยมศึกษาปีที่ 2</option>
													<option value="33">มัธยมศึกษาปีที่ 3</option>
											</optgroup>											
											<optgroup label="มัธยมศึกษาปลาย">
													<option value="41">มัธยมศึกษาปีที่ 4</option>
													<option value="42">มัธยมศึกษาปีที่ 5</option>
													<option value="43">มัธยมศึกษาปีที่ 6</option>
											</optgroup>					
	<!--************************************************************************************-->						 
				<?php		}elseif($data_studentrow["ds_OriginalClass"]==31){ ?>
	<!--************************************************************************************-->	
											
											<optgroup label="อนุบาล">
												
												
												<option value="2">อนุบาล 2</option>
												<option value="3">อนุบาล 3</option>
											</optgroup>
											<optgroup label="ประถมศึกษา">
													<option value="11">ประถมศึกษาปีที่ 1</option>
													<option value="12">ประถมศึกษาปีที่ 2</option>
													<option value="13">ประถมศึกษาปีที่ 3</option>
													<option value="21">ประถมศึกษาปีที่ 4</option>
													<option value="22">ประถมศึกษาปีที่ 5</option>
													<option value="23">ประถมศึกษาปีที่ 6</option>
											</optgroup>
											<optgroup label="มัธยมศึกษาตอนต้น">
													<option value="31" selected>มัธยมศึกษาปีที่ 1</option>
													<option value="32">มัธยมศึกษาปีที่ 2</option>
													<option value="33">มัธยมศึกษาปีที่ 3</option>
											</optgroup>											
											<optgroup label="มัธยมศึกษาปลาย">
													<option value="41">มัธยมศึกษาปีที่ 4</option>
													<option value="42">มัธยมศึกษาปีที่ 5</option>
													<option value="43">มัธยมศึกษาปีที่ 6</option>
											</optgroup>					
	<!--************************************************************************************-->						
				<?php		}elseif($data_studentrow["ds_OriginalClass"]==32){ ?>
	<!--************************************************************************************-->	
											
											<optgroup label="อนุบาล">
												
												
												<option value="2">อนุบาล 2</option>
												<option value="3">อนุบาล 3</option>
											</optgroup>
											<optgroup label="ประถมศึกษา">
													<option value="11">ประถมศึกษาปีที่ 1</option>
													<option value="12">ประถมศึกษาปีที่ 2</option>
													<option value="13">ประถมศึกษาปีที่ 3</option>
													<option value="21">ประถมศึกษาปีที่ 4</option>
													<option value="22">ประถมศึกษาปีที่ 5</option>
													<option value="23">ประถมศึกษาปีที่ 6</option>
											</optgroup>
											<optgroup label="มัธยมศึกษาตอนต้น">
													<option value="31">มัธยมศึกษาปีที่ 1</option>
													<option value="32" selected>มัธยมศึกษาปีที่ 2</option>
													<option value="33">มัธยมศึกษาปีที่ 3</option>
											</optgroup>											
											<optgroup label="มัธยมศึกษาปลาย">
													<option value="41">มัธยมศึกษาปีที่ 4</option>
													<option value="42">มัธยมศึกษาปีที่ 5</option>
													<option value="43">มัธยมศึกษาปีที่ 6</option>
											</optgroup>					
	<!--************************************************************************************-->						
				<?php		}elseif($data_studentrow["ds_OriginalClass"]==33){ ?>
	<!--************************************************************************************-->	
											
											<optgroup label="อนุบาล">
												
												
												<option value="2">อนุบาล 2</option>
												<option value="3">อนุบาล 3</option>
											</optgroup>
											<optgroup label="ประถมศึกษา">
													<option value="11">ประถมศึกษาปีที่ 1</option>
													<option value="12">ประถมศึกษาปีที่ 2</option>
													<option value="13">ประถมศึกษาปีที่ 3</option>
													<option value="21">ประถมศึกษาปีที่ 4</option>
													<option value="22">ประถมศึกษาปีที่ 5</option>
													<option value="23">ประถมศึกษาปีที่ 6</option>
											</optgroup>
											<optgroup label="มัธยมศึกษาตอนต้น">
													<option value="31">มัธยมศึกษาปีที่ 1</option>
													<option value="32">มัธยมศึกษาปีที่ 2</option>
													<option value="33" selected>มัธยมศึกษาปีที่ 3</option>
											</optgroup>											
											<optgroup label="มัธยมศึกษาปลาย">
													<option value="41">มัธยมศึกษาปีที่ 4</option>
													<option value="42">มัธยมศึกษาปีที่ 5</option>
													<option value="43">มัธยมศึกษาปีที่ 6</option>
											</optgroup>					
	<!--************************************************************************************-->						
				<?php		}elseif($data_studentrow["ds_OriginalClass"]==41){ ?>
	<!--************************************************************************************-->
											
											<optgroup label="อนุบาล">
												
												
												<option value="2">อนุบาล 2</option>
												<option value="3">อนุบาล 3</option>
											</optgroup>
											<optgroup label="ประถมศึกษา">
													<option value="11">ประถมศึกษาปีที่ 1</option>
													<option value="12">ประถมศึกษาปีที่ 2</option>
													<option value="13">ประถมศึกษาปีที่ 3</option>
													<option value="21">ประถมศึกษาปีที่ 4</option>
													<option value="22">ประถมศึกษาปีที่ 5</option>
													<option value="23">ประถมศึกษาปีที่ 6</option>
											</optgroup>
											<optgroup label="มัธยมศึกษาตอนต้น">
													<option value="31">มัธยมศึกษาปีที่ 1</option>
													<option value="32">มัธยมศึกษาปีที่ 2</option>

													<option value="33">มัธยมศึกษาปีที่ 3</option>
											</optgroup>											
											<optgroup label="มัธยมศึกษาปลาย">
													<option value="41" selected>มัธยมศึกษาปีที่ 4</option>
													<option value="42">มัธยมศึกษาปีที่ 5</option>
													<option value="43">มัธยมศึกษาปีที่ 6</option>
											</optgroup>					
	<!--************************************************************************************-->						
				<?php		}elseif($data_studentrow["ds_OriginalClass"]==42){ ?>
	<!--************************************************************************************-->	
											
											<optgroup label="อนุบาล">
												
												
												<option value="2">อนุบาล 2</option>
												<option value="3">อนุบาล 3</option>
											</optgroup>
											<optgroup label="ประถมศึกษา">
													<option value="11">ประถมศึกษาปีที่ 1</option>
													<option value="12">ประถมศึกษาปีที่ 2</option>
													<option value="13">ประถมศึกษาปีที่ 3</option>
													<option value="21">ประถมศึกษาปีที่ 4</option>
													<option value="22">ประถมศึกษาปีที่ 5</option>
													<option value="23">ประถมศึกษาปีที่ 6</option>
											</optgroup>
											<optgroup label="มัธยมศึกษาตอนต้น">
													<option value="31">มัธยมศึกษาปีที่ 1</option>
													<option value="32">มัธยมศึกษาปีที่ 2</option>
													<option value="33">มัธยมศึกษาปีที่ 3</option>
											</optgroup>											
											<optgroup label="มัธยมศึกษาปลาย">
													<option value="41">มัธยมศึกษาปีที่ 4</option>
													<option value="42" selected>มัธยมศึกษาปีที่ 5</option>
													<option value="43">มัธยมศึกษาปีที่ 6</option>
											</optgroup>					
	<!--************************************************************************************-->						
				<?php		}elseif($data_studentrow["ds_OriginalClass"]==43){ ?>
	<!--************************************************************************************-->
											
											<optgroup label="อนุบาล">
												
												
												<option value="2">อนุบาล 2</option>
												<option value="3">อนุบาล 3</option>
											</optgroup>
											<optgroup label="ประถมศึกษา">
													<option value="11">ประถมศึกษาปีที่ 1</option>
													<option value="12">ประถมศึกษาปีที่ 2</option>
													<option value="13">ประถมศึกษาปีที่ 3</option>
													<option value="21">ประถมศึกษาปีที่ 4</option>
													<option value="22">ประถมศึกษาปีที่ 5</option>
													<option value="23">ประถมศึกษาปีที่ 6</option>
											</optgroup>
											<optgroup label="มัธยมศึกษาตอนต้น">
													<option value="31">มัธยมศึกษาปีที่ 1</option>
													<option value="32">มัธยมศึกษาปีที่ 2</option>
													<option value="33">มัธยมศึกษาปีที่ 3</option>
											</optgroup>											
											<optgroup label="มัธยมศึกษาปลาย">
													<option value="41">มัธยมศึกษาปีที่ 4</option>
													<option value="42">มัธยมศึกษาปีที่ 5</option>
													<option value="43" selected>มัธยมศึกษาปีที่ 6</option>
											</optgroup>					
	<!--************************************************************************************-->						
				<?php		}else{ ?>
	<!--************************************************************************************-->	
											<optgroup label="อนุบาล">
												
												
												<option value="2">อนุบาล 2</option>
												<option value="3">อนุบาล 3</option>
											</optgroup>
											<optgroup label="ประถมศึกษา">
													<option value="11">ประถมศึกษาปีที่ 1</option>
													<option value="12">ประถมศึกษาปีที่ 2</option>
													<option value="13">ประถมศึกษาปีที่ 3</option>
													<option value="21">ประถมศึกษาปีที่ 4</option>
													<option value="22">ประถมศึกษาปีที่ 5</option>
													<option value="23">ประถมศึกษาปีที่ 6</option>
											</optgroup>
											<optgroup label="มัธยมศึกษาตอนต้น">
													<option value="31">มัธยมศึกษาปีที่ 1</option>
													<option value="32">มัธยมศึกษาปีที่ 2</option>
													<option value="33">มัธยมศึกษาปีที่ 3</option>
											</optgroup>											
											<optgroup label="มัธยมศึกษาปลาย">
													<option value="41">มัธยมศึกษาปีที่ 4</option>
													<option value="42">มัธยมศึกษาปีที่ 5</option>
													<option value="43">มัธยมศึกษาปีที่ 6</option>
											</optgroup>					
	<!--************************************************************************************-->						
				<?php	}      ?>					

									</select>

								</div>
							</div>
                        </fieldset>						

					</div>				
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-5"><b style="color: #00008B">ชื่อโรงเรียนเดิมที่จบการศึกษา</b></label>
									<div class="col-<?php echo $grid;?>-7">
										<div class="input-group">
											<input type="text" name="ds_SameSchool" id="ds_SameSchool" class="form-control" placeholder="ชื่อโรงเรียนเดิมที่จบการศึกษา" size="100" maxlength="100" value="<?php echo $data_studentrow["ds_SameSchool"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
										</div>
									</div>
							</div>
						</fieldset>						
					</div>	
				</div>
				
				<div class="row">
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-5"><b style="color: #00008B">จังหวัดโรงเรียนเดิมที่จบการศึกษา</b></label>
								<div class="col-<?php echo $grid;?>-7">
										<select data-placeholder="จังหวัดโรงเรียนเดิมที่จบการศึกษา..." class="select-size-<?php echo $grid;?>" name="ds_ProvinceSchool" id="ds_ProvinceSchool">
											<option></option>
											<optgroup label="จังหวัดโรงเรียนเดิมที่จบการศึกษา">
											
								<?php
									$data_provinces="SELECT `PROVINCE_ID`,`PROVINCE_NAME`,`PROVINCE_NAME_ENG` FROM `provinces` order by convert ( `PROVINCE_NAME` using tis620) asc";
									$txt_provinces=new row_datastu($data_provinces);
									foreach($txt_provinces->datastu_array as $rc_key=>$provincesRow){
										if($data_studentrow["ds_ProvinceSchool"]==$provincesRow["PROVINCE_ID"]){
											$srp_selected="selected";
										}else{
											$srp_selected="";
										}
										?>
									
												<option value="<?php echo $provincesRow["PROVINCE_ID"];?>" <?php echo $srp_selected;?>><?php echo $provincesRow["PROVINCE_NAME"]." / ".$provincesRow["PROVINCE_NAME_ENG"];?></option>
								<?php	} ?>
												
												
											</optgroup>
										</select>
								</div>
							</div>
                        </fieldset>	
					</div>	
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-7"><b style="color: #00008B">หน่วยกิตเฉลี่ยสะสมจากโรงเรียนเดิมที่จบการศึกษา</b></label>
									<div class="col-<?php echo $grid;?>-5">
										<div class="input-group">
											<input type="text" name="ds_gradeSchool" id="ds_gradeSchool" class="form-control" placeholder="x.xx" size="100"  value="<?php echo $data_studentrow["ds_gradeSchool"];?>" data-masked-input="9.99" maxlength="4" style="font-family: surafont_sanukchang; font-size: 18px">
										</div>
									</div>
							</div>
						</fieldset>	
					</div>
				</div>
				

				
				
				<!--<div class="row">
					<div class="col-<?php //echo $grid;?>-12">
						<center><button type="submit" class="btn btn-info">แก้ไข...ข้อมูลนักเรียน</button></center>
					</div>
				</div>-->
				<div class="row">
					<div class="col-<?php echo $grid;?>-12">
						<center><button type="button" id="submit_button" class="btn btn-info" style="font-family: surafont_sanukchang; font-size: 18px">บันทึก..ข้อมูลนักเรียน</button></center>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>
<input type="hidden" name="stu_id" value="<?php echo $user_login;?>" id="stu_id">
<input type="hidden" name="enter" value="up_stu" id="enter" >
<input type="hidden" name="myname" value="<?php echo $myname;?>" id="myname" >
<input type="hidden" name="group" value="S" id="group" >
</form>
<!--**********************************************************-->
<div id="print_data_stu"></div>
<!--**********************************************************-->
<?php
	$stu_depend_stuSql="SELECT * FROM `depend_stu` WHERE `ds_stuid`='{$user_login}'";
	$stu_depend_stu=new notrow_datastu_sw($stu_depend_stuSql);
	foreach($stu_depend_stu->datastu_array as $rc_key=>$stu_depend_stuRow){}

?>

<form class="form-horizontal" name="data_addstu" method="post" action="view/mod/student/code/profile/profile_modify.php">
<div class="row">
	<div class="col-<?php echo $grid;?>-12">
		<div class="panel panel-success">
			<div class="panel-heading" style="color: #000000"><h4 style="font-family: surafont_sanukchang; font-size: 18px">ข้อมูลเพิ่มเติม นักเรียน</h4></div>
			
			<div class="panel-body">
				<div class="row">
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">โรคประจำตัว</b></label>
								<div class="col-<?php echo $grid;?>-9">
									<div class="input-group">
										<input type="text" name="ds_CongenitalDisease" id="ds_CongenitalDisease" class="form-control"  placeholder="โรคประจำตัว" size="100" maxlength="100" value="<?php echo $stu_depend_stuRow["ds_CongenitalDisease"]?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>	
					</div>				
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">การแพ้อาหาร</b></label>
								<div class="col-<?php echo $grid;?>-9">
									<div class="input-group">
										<input type="text" name="ds_FoodAllergies" id="ds_FoodAllergies" class="form-control"  placeholder="การแพ้อาหาร" size="100" maxlength="100" value="<?php echo $stu_depend_stuRow["ds_FoodAllergies"]?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>	
					</div>				
				</div>
			    <div class="row">
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">การแพ้ยา</b></label>
								<div class="col-<?php echo $grid;?>-9">
									<div class="input-group">
										<input type="text" name="ds_DrugAllergy" id="ds_DrugAllergy"  class="form-control"  placeholder="การแพ้ยา" size="100" maxlength="100" value="<?php echo $stu_depend_stuRow["ds_DrugAllergy"]?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>	
					</div>
					<div class="col-<?php echo $grid;?>-6">
								<fieldset class="content-group">
									<div class="form-group">
									<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">การแพ้พิษ</b></label>
										<div class="col-<?php echo $grid;?>-9">
											<div class="input-group">
												<input type="text" name="ds_allergic" id="ds_allergic" class="form-control" placeholder="การแพ้พิษ" size="100" maxlength="100" value="<?php echo $stu_depend_stuRow["ds_allergic"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
												<small>อาการแพ้พิษจากแมลง เช่น แพ้พิษมด ผึ้ง เป็นต้น</small>
											</div>
										</div>
									</div>
								</fieldset>	
					</div>
					
				</div>
			
			
				<div class="row">

					
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">สถานภาพบิดา-มารดา</b></label>
								<div class="col-<?php echo $grid;?>-8">
										<select data-placeholder="สถานภาพบิดา-มารดา..."  name="ds_FMstatus" id="ds_FMstatus" class="select-size-<?php echo $grid;?>">
											<option></option>
						<?php
							$data_familySql="SELECT `family_key`,`family_txt` FROM `data_family`";
							$data_familyRs=new row_datastu($data_familySql);
							foreach($data_familyRs->datastu_array as $rc_key=>$data_familyRow){ 
								if($stu_depend_stuRow["ds_FMstatus"]==$data_familyRow["family_key"]){
									$dsm_selected="selected";
								}else{
									$dsm_selected="";
								}
							?>
								
												<option value="<?php echo $data_familyRow["family_key"];?>" <?php echo $dsm_selected;?>><?php echo $data_familyRow["family_txt"];?></option>
					<?php	} ?>					
										</select>
								</div>
							</div>
                        </fieldset>						
					
					
					</div>					
					
	
					
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">นักเรียนอาศัยอยู่กับ</b></label>
								<div class="col-<?php echo $grid;?>-8">
										<select name="ds_status" id="ds_status" data-placeholder="นักเรียนอาศัยอยู่กับ..." class="select-size-<?php echo $grid;?>">
											<option></option>
								<?php
									$data_relySql="SELECT `dr_key`,`dr_txt`FROM `data_rely`";
									$data_relyRs=new row_datastu($data_relySql);
									foreach($data_relyRs->datastu_array as $rc_key=>$data_relyRow){
										if($stu_depend_stuRow["ds_status"]==$data_relyRow["dr_key"]){
											$dst_selected="selected";
										}else{
											$dst_selected="";
										}
										?>
												<option value="<?php echo $data_relyRow["dr_key"];?>"<?php echo $dst_selected;?>><?php echo $data_relyRow["dr_txt"];?></option>
							<?php	}   ?>		
							
										</select>

								</div>
							</div>
                        </fieldset>						
								
					</div>

				</div>	
<!--**********************************************************-->
		<div id="print_ds"><?php
			if($stu_depend_stuRow["ds_status"]==5){ ?>
<!--**********************************************************-->
<!--++++++++++++++++++++++++++++++++++++++++++++++++++-->		
	<div class="row">
		<div class="col-<?php echo $grid;?>-6">
			<fieldset class="content-group">
				<div class="form-group">
					<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">ชื่อหอพัก</b></label>
					<div class="col-<?php echo $grid;?>-10">
						<div class="input-group">
							<input type="text" name="ds_dormitoryName" id="ds_dormitoryName" class="form-control"  placeholder="ชื่อ หอพัก" size="100" maxlength="100" value="<?php echo $stu_depend_stuRow["ds_dormitoryName"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
						</div>
					</div>
				</div>
            </fieldset>	
		</div>
		<div class="col-<?php echo $grid;?>-3">
			<fieldset class="content-group">
				<div class="form-group">
					<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">เลขที่</b></label>
						<div class="col-<?php echo $grid;?>-9">
							<div class="input-group">
								<input type="text" name="ds_dormitoryHno" id="ds_dormitoryHno" class="form-control" placeholder="เลขที่ หอพัก" size="100" maxlength="30" value="<?php echo $stu_depend_stuRow["ds_dormitoryHno"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
							</div>
						</div>
				</div>
            </fieldset>						
		</div>
		<div class="col-<?php echo $grid;?>-3">
			<fieldset class="content-group">
				<div class="form-group">
					<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">หมู่ที่</b></label>
						<div class="col-<?php echo $grid;?>-10">
							<div class="input-group">
								<input type="text" name="ds_dormitoryMoo" id="ds_dormitoryMoo" class="form-control" placeholder="หมู่ที่ หอพัก" size="100" maxlength="3" value="<?php echo $stu_depend_stuRow["ds_dormitoryMoo"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
							</div>
						</div>
				</div>
            </fieldset>						
		</div>
	</div>
	
	<div class="row">
        <div class="col-<?php echo $grid;?>-4">
			<fieldset class="content-group">
				<div class="form-group">
					<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">ชื่อหมู่บ้าน</b></label>
						<div class="col-<?php echo $grid;?>-9">
							<div class="input-group">
								<input type="text" name="ds_dormitoryMooName" id="ds_dormitoryMooName" class="form-control" placeholder="ชื่อหมู่บ้าน" size="100" maxlength="100" value="<?php echo $stu_depend_stuRow["ds_dormitoryMooName"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
							</div>
						</div>
				</div>
            </fieldset>	        
        </div>
		<div class="col-<?php echo $grid;?>-4">
			<fieldset class="content-group">
				<div class="form-group">
					<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">ซอย </b></label>
						<div class="col-<?php echo $grid;?>-10">
							<div class="input-group">
								<input type="text" name="ds_dormitorySoi" id="ds_dormitorySoi" class="form-control" placeholder="ซอย หอพัก" size="100" maxlength="100" value="<?php echo $stu_depend_stuRow["ds_dormitorySoi"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
							</div>
						</div>
				</div>
            </fieldset>						
		</div>
		<div class="col-<?php echo $grid;?>-4">
			<fieldset class="content-group">
				<div class="form-group">
					<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">ชื่อเจ้าของหรือผู้ปกครอง </b></label>
						<div class="col-<?php echo $grid;?>-9">
							<div class="input-group">
								<input type="text" name="ds_dormitoryMyName" id="ds_dormitoryMyName" class="form-control" placeholder="ชื่อเจ้าของหรือผู้ปกครอง" size="100" maxlength="100" value="<?php echo $stu_depend_stuRow["ds_dormitoryMyName"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
							</div>
						</div>
				</div>
            </fieldset>			
		</div>
	</div>	
	
	
	<div class="row">
		<div class="col-<?php echo $grid;?>-4">
			<fieldset class="content-group">
				<div class="form-group">
					<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">โทรศัพท์ </b></label>
						<div class="col-<?php echo $grid;?>-10">
							<div class="input-group">
								<input type="text" name="ds_dormitoryPhone" id="ds_dormitoryPhone" class="form-control" placeholder="โทรศัพท์" size="100" maxlength="15" value="<?php echo $stu_depend_stuRow["ds_dormitoryPhone"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
							</div>
						</div>
				</div>
            </fieldset>			
		</div>	
		<div class="col-<?php echo $grid;?>-4">
			<fieldset class="content-group">
				<div class="form-group">
					<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">ถนน </b></label>
						<div class="col-<?php echo $grid;?>-10">
							<div class="input-group">
								<input type="text" name="ds_dormitoryRoad" id="ds_dormitoryRoad" class="form-control" placeholder="ถนน หอพัก" size="100" maxlength="100" value="<?php echo $stu_depend_stuRow["ds_dormitoryPhone"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
							</div>
						</div>
				</div>
            </fieldset>						
		</div>	
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">จังหวัด</b></label>
								<div class="col-<?php echo $grid;?>-9">
										<select  name="ds_dormitoryProvince" id="ds_dormitoryProvince" data-placeholder="จังหวัด..." class="select-size-<?php echo $grid;?>">
											<option></option>
											<optgroup label="จังหวัด">
											
								<?php
									$data_provinces="SELECT `PROVINCE_ID`,`PROVINCE_NAME`,`PROVINCE_NAME_ENG` FROM `provinces` order by convert ( `PROVINCE_NAME` using tis620) asc";
									$txt_provinces=new row_datastu($data_provinces);
									foreach($txt_provinces->datastu_array as $rc_key=>$provincesRow){
										if($stu_depend_stuRow["ds_dormitoryProvince"]==$provincesRow["PROVINCE_ID"]){
											$srp_selected="selected";
										}else{
											$srp_selected="";
										}
										?>
									
												<option value="<?php echo $provincesRow["PROVINCE_ID"];?>" <?php echo $srp_selected;?>><?php echo $provincesRow["PROVINCE_NAME"]." / ".$provincesRow["PROVINCE_NAME_ENG"];?></option>
								<?php	} ?>											
			 
											</optgroup>
										</select>
								</div>
							</div>
                        </fieldset>					
				
					</div>		
		
	</div>	
	
	<div class="row">



					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">อำเภอ</b></label>
								<div class="col-<?php echo $grid;?>-9">
										<select name="ds_dormitoryAmphur" id="ds_dormitoryAmphur" data-placeholder="อำเภอ..." class="select-size-<?php echo $grid;?>">
											<option></option>
											<optgroup label="อำเภอ">
											
							<?php
								$amphuresSql="SELECT `AMPHUR_ID`,`AMPHUR_NAME`,`AMPHUR_NAME_ENG` FROM `amphures` WHERE `PROVINCE_ID`='{$stu_depend_stuRow["ds_dormitoryProvince"]}'";
								$amphuresRs=new row_datastu($amphuresSql);
								foreach($amphuresRs->datastu_array as $rc_key=>$amphuresRow){ 
								if($stu_depend_stuRow["ds_dormitoryAmphur"]==$amphuresRow["AMPHUR_ID"]){
									$sa_selected="selected";
								}else{
									$sa_selected="";
								}
								?>
												<option value="<?php echo $amphuresRow["AMPHUR_ID"];?>" <?php echo $sa_selected;?>><?php echo $amphuresRow["AMPHUR_NAME"]." / ".$amphuresRow["AMPHUR_NAME_ENG"];?></option>
						<?php	}   ?>				
											</optgroup>

										</select>
								</div>
							</div>
                        </fieldset>					
				
					</div>
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">ตำบล</b></label>
								<div class="col-<?php echo $grid;?>-9">
										<select name="ds_dormitoryTumbon" id="ds_dormitoryTumbon" data-placeholder="ตำบล..." class="select-size-<?php echo $grid;?>">
											<option></option>
											<optgroup label="ตำบล">
								<?php
									$districtsSql="SELECT `DISTRICT_ID`,`DISTRICT_NAME`,`DISTRICT_NAME_ENG` FROM `districts` WHERE `AMPHUR_ID`='{$stu_depend_stuRow["ds_dormitoryAmphur"]}';";
									$districts=new row_datastu($districtsSql);
									foreach($districts->datastu_array as $rc_key=>$districts_print){ 
										if($stu_depend_stuRow["ds_dormitoryTumbon"]==$districts_print["DISTRICT_ID"]){
											$stum_selected="selected";
										}else{
											$stum_selected="";
										}
									
									?>
											<option value="<?php echo $districts_print["DISTRICT_ID"];?>" <?php echo $stum_selected;?>><?php echo $districts_print["DISTRICT_NAME"]." / ".$districts_print["DISTRICT_NAME_ENG"];?></option>
							<?php	} ?>

											</optgroup>	
										</select>
								</div>
							</div>
                        </fieldset>					
						
					</div>
					<div class="col-<?php echo $grid;?>-4"> 
				
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">รหัสไปรษณีย์ </b></label>
								<div class="col-<?php echo $grid;?>-8">
									<div class="input-group">
										<div id="ds_dormitoryZipcode"><input type="text" name="ds_dormitoryZipcode" id="ds_dormitoryZipcodecopy" class="form-control" readonly="readonly" placeholder="รหัสไปรษณีย์" size="100" maxlength="6" value="<?php echo $stu_depend_stuRow["ds_dormitoryZipcode"];?>" style="font-family: surafont_sanukchang; font-size: 18px"></div>
									</div>
								</div>
							</div>
                        </fieldset>					
					</div>		
		
	</div>	
	
<!--++++++++++++++++++++++++++++++++++++++++++++++++++-->		
<!--**********************************************************-->				
	<?php	}else{
				//************************************	
			}
		?></div>
<!--**********************************************************-->
				<div class="row">
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">การเดินทางมาโรงเรียน</b></label>
								<div class="col-<?php echo $grid;?>-8">
										<select name="ds_trip" id="ds_trip" data-placeholder="การเดินทางมาโรงเรียน..." class="select-size-<?php echo $grid;?>">
											<option></option>
							<?php
								$data_gohomeSql="SELECT `dgh_id`,`dgh_txt` FROM `data_gohome`";
								$data_gohomeRs=new row_datastu($data_gohomeSql);
								foreach($data_gohomeRs->datastu_array as $rc_key=>$data_gohomeRow){ 
									if($stu_depend_stuRow["ds_trip"]==$data_gohomeRow["dgh_id"]){
										$trip_selected="selected";
									}else{
										$trip_selected="";
									}
								?>
												<option value="<?php echo $data_gohomeRow["dgh_id"];?>" <?php echo $trip_selected;?>><?php echo $data_gohomeRow["dgh_txt"];?></option>
						<?php	} ?>				
										</select>
								</div>
							</div>
                        </fieldset>						
									
					</div>
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">อื่น ๆ </b></label>
								<div class="col-<?php echo $grid;?>-10">
									<div class="input-group">
										<?php
											if($stu_depend_stuRow["ds_triptxt"]==""){ ?>
<!--**********************************************************************************************************-->	
											<div id="ds_triptxt"><input type="text" name="ds_triptxt" id="ds_triptxtcopy"   class="form-control"  placeholder="อื่น ๆ" size="100" maxlength="100" value="<?php echo $stu_depend_stuRow["ds_triptxt"];?>" readonly="readonly" style="font-family: surafont_sanukchang; font-size: 18px"></div>
<!--**********************************************************************************************************-->												
									<?php	}else{ ?>
<!--**********************************************************************************************************-->	
											<div id="ds_triptxt"><input type="text" name="ds_triptxt" id="ds_triptxtcopy"  class="form-control"  placeholder="อื่น ๆ" size="100" maxlength="100" value="<?php echo $stu_depend_stuRow["ds_triptxt"];?>" style="font-family: surafont_sanukchang; font-size: 18px"></div>
<!--**********************************************************************************************************-->												
									<?php	}      ?>
										
									</div>
								</div>
							</div>
                        </fieldset>
					</div>
				</div>


				<!--<div class="row">
					<div class="col-<?php //echo $grid;?>-12">
						<center><button type="submit" class="btn btn-info">แก้ไข...ข้อมูลเพิ่มเติม นักเรียน</button></center>
					</div>
				</div>-->
				<div class="row">
					<div class="col-<?php echo $grid;?>-12">
						<center><button type="button" class="btn btn-info" id="data_addstu" style="font-family: surafont_sanukchang; font-size: 18px">บันทึก...ข้อมูลเพิ่มเติม นักเรียน</button></center>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>
<input type="hidden" name="stu_id"  value="<?php echo $user_login;?>" id="stu_id_pda">
<input type="hidden" name="enter" value="up_stuadd" id="enter_pda">
<input type="hidden" name="myname" value="<?php echo $myname;?>" id="myname">
<input type="hidden" name="group" value="S" id="group" >

</form>

<div id="print_data_addstu"></div>

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<div id="call_showon"></div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<?php

	$stu_guardianSql="SELECT * FROM `stu_guardian` WHERE `stu_id`='{$user_login}';";
	$stu_guardian=new notrow_datastu_sw($stu_guardianSql);
	foreach($stu_guardian->datastu_array as $rc_key=>$stu_guardianRow){}
	
	$stu_guardian_addressSql="SELECT * FROM `stu_guardian_address` WHERE `stu_id`='{$user_login}'";
	$stu_guardian_address=new notrow_datastu_sw($stu_guardian_addressSql);
	foreach($stu_guardian_address->datastu_array as $rc_key=>$stu_guardian_addressRow){}
	
	$stu_guardian_addwordSql="SELECT * FROM `stu_guardian_addword` WHERE `stu_id`='{$user_login}'";
	$stu_guardian_addword=new notrow_datastu_sw($stu_guardian_addwordSql);
	foreach($stu_guardian_addword->datastu_array as $rc_key=>$stu_guardian_addwordRow){}
	
?>

<form class="form-horizontal" name="parent_modify" method="post" action="view/mod/student/code/profile/profile_modify.php">
<div class="row">
	<div class="col-<?php echo $grid;?>-12">
		<div class="panel panel-success">
			<div class="panel-heading" style="color: #000000"><h4 style="font-family: surafont_sanukchang; font-size: 18px">ข้อมูลผู้ปกครอง นักเรียน</h4></div>
			<div class="panel-body">

				
		<?php
				if($stu_guardianRow["parent_status"]==2){ ?>


				<div class="row">
					<div class="col-<?php echo $grid;?>-2">
						<div class="radio icheck-greensea">
							<input type="radio" name="parent_statusA" id="parent_statusA" checked="checked" value="2">
						    <label for="parent_statusA">บิดา</label>							
						</div>					
					</div>	
					<div class="col-<?php echo $grid;?>-2">
						<div class="radio icheck-greensea">
							<input type="radio" name="parent_statusA" id="parent_statusB" value="3">
						    <label for="parent_statusB">มารดา</label>							
						</div>						
					</div>	
					<div class="col-<?php echo $grid;?>-2">
						<div class="radio icheck-greensea">
							<input type="radio" name="parent_statusA" id="parent_statusC" value="5">
						    <label for="parent_statusC">เจ้าของหอพัก</label>							
						</div>						
					</div>	
					<div class="col-<?php echo $grid;?>-2">
						<div class="radio icheck-greensea">
							<input type="radio" name="parent_statusA" id="parent_statusD" value="0">
						    <label for="parent_statusD">อื่น ๆ</label>							
						</div>	
					</div>	

					<div id="show_p">
						<input type="hidden" value="2" id="parent_status">
					</div>					

					
				</div>
<!--********************************************************************************************-->		
			<div id="print_parent"></div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->					

		<?php	}elseif($stu_guardianRow["parent_status"]==3){ ?>

				<div class="row">
					<div class="col-<?php echo $grid;?>-2">
						<div class="radio icheck-greensea">
							<input type="radio" name="parent_statusA" id="parent_statusA" value="2">
						    <label for="parent_statusA">บิดา</label>							
						</div>					
					</div>	
					<div class="col-<?php echo $grid;?>-2">
						<div class="radio icheck-greensea">
							<input type="radio" name="parent_statusA" id="parent_statusB" checked="checked" value="3">
						    <label for="parent_statusB">มารดา</label>							
						</div>						
					</div>	
					<div class="col-<?php echo $grid;?>-2">
						<div class="radio icheck-greensea">
							<input type="radio" name="parent_statusA" id="parent_statusC" value="5">
						    <label for="parent_statusC">เจ้าของหอพัก</label>							
						</div>						
					</div>	
					<div class="col-<?php echo $grid;?>-2">
						<div class="radio icheck-greensea">
							<input type="radio" name="parent_statusA" id="parent_statusD" value="0">
						    <label for="parent_statusD">อื่น ๆ</label>							
						</div>	
					</div>	

					<div id="show_p">
						<input type="hidden" value="3" id="parent_status">
					</div>					

					
				</div>
<!--********************************************************************************************-->		
			<div id="print_parent"></div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->					

		<?php	}elseif($stu_guardianRow["parent_status"]==5){ ?>

				<div class="row">
					<div class="col-<?php echo $grid;?>-2">
						<div class="radio icheck-greensea">
							<input type="radio" name="parent_statusA" id="parent_statusA" value="2">
						    <label for="parent_statusA">บิดา</label>							
						</div>					
					</div>	
					<div class="col-<?php echo $grid;?>-2">
						<div class="radio icheck-greensea">
							<input type="radio" name="parent_statusA" id="parent_statusB" value="3">
						    <label for="parent_statusB">มารดา</label>							
						</div>						
					</div>	
					<div class="col-<?php echo $grid;?>-2">
						<div class="radio icheck-greensea">
							<input type="radio" name="parent_statusA" id="parent_statusC" checked="checked" value="5">
						    <label for="parent_statusC">เจ้าของหอพัก</label>							
						</div>						
					</div>	
					<div class="col-<?php echo $grid;?>-2">
						<div class="radio icheck-greensea">
							<input type="radio" name="parent_statusA" id="parent_statusD" value="0">
						    <label for="parent_statusD">อื่น ๆ</label>							
						</div>	
					</div>	

					<div id="show_p">
						<input type="hidden" value="5" id="parent_status">
					</div>					

					
				</div>	
<!--********************************************************************************************-->		
			<div id="print_parent"></div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->					
	
		<?php	}elseif($stu_guardianRow["parent_status"]=="" or $stu_guardianRow["parent_status"]==0){ ?>
		
				<div class="row">
					<div class="col-<?php echo $grid;?>-2">
						<div class="radio icheck-greensea">
							<input type="radio" name="parent_statusA" id="parent_statusA" value="2">
						    <label for="parent_statusA">บิดา</label>							
						</div>					
					</div>	
					<div class="col-<?php echo $grid;?>-2">
						<div class="radio icheck-greensea">
							<input type="radio" name="parent_statusA" id="parent_statusB" value="3">
						    <label for="parent_statusB">มารดา</label>							
						</div>						
					</div>	
					<div class="col-<?php echo $grid;?>-2">
						<div class="radio icheck-greensea">
							<input type="radio" name="parent_statusA" id="parent_statusC" value="5">
						    <label for="parent_statusC">เจ้าของหอพัก</label>							
						</div>						
					</div>	
					<div class="col-<?php echo $grid;?>-2">
						<div class="radio icheck-greensea">
							<input type="radio" name="parent_statusA" id="parent_statusD" value="0">
						    <label for="parent_statusD">อื่น ๆ</label>							
						</div>	
					</div>	

					<div id="show_p">
						<input type="hidden" value="" id="parent_status">
					</div>					

					
				</div>		
				
<!--********************************************************************************************-->		
			<div id="print_parent"></div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->					
				
				
	<?php		}else{ ?>
	
				<div class="row">
					<div class="col-<?php echo $grid;?>-2">
						<div class="radio icheck-greensea">
							<input type="radio" name="parent_statusA" id="parent_statusA" value="2">
						    <label for="parent_statusA">บิดา</label>							
						</div>					
					</div>	
					<div class="col-<?php echo $grid;?>-2">
						<div class="radio icheck-greensea">
							<input type="radio" name="parent_statusA" id="parent_statusB" value="3">
						    <label for="parent_statusB">มารดา</label>							
						</div>						
					</div>	
					<div class="col-<?php echo $grid;?>-2">
						<div class="radio icheck-greensea">
							<input type="radio" name="parent_statusA" id="parent_statusC" value="5">
						    <label for="parent_statusC">เจ้าของหอพัก</label>							
						</div>						
					</div>	
					<div class="col-<?php echo $grid;?>-2">
						<div class="radio icheck-greensea">
							<input type="radio" name="parent_statusA" id="parent_statusD" checked="checked" value="0">
						    <label for="parent_statusD">อื่น ๆ</label>							
						</div>	
					</div>	

				<div id="show_p">
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">โปรดระบุ....</b></label>
								<div class="col-<?php echo $grid;?>-9">
										<select data-placeholder="ผู้ปกครอง..." name="parent_status" id="parent_status" class="select-size-<?php echo $grid;?>"  required="required">
											<option></option>
								<?php
									$data_relySql="SELECT `dr_key`,`dr_txt`FROM `data_rely` WHERE `dr_key` !='1' and `dr_key` !='2' and `dr_key` !='3' and `dr_key` !='5'";
									$data_relyRs=new row_datastu($data_relySql);
									foreach($data_relyRs->datastu_array as $rc_key=>$data_relyRow){
										if($stu_guardianRow["parent_status"]==$data_relyRow["dr_key"]){
											$parent_selected="selected";
										}else{
											$parent_selected="";
										}
										?>
												<option value="<?php echo $data_relyRow["dr_key"];?>"<?php echo $parent_selected;?>><?php echo $data_relyRow["dr_txt"];?></option>
							<?php	}   ?>		


										</select>
								</div>
							</div>
                        </fieldset>						
					</div>							
				</div>	
								

					
				</div>
	
<!--********************************************************************************************-->		
			<div id="print_parent">
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->		
			<?php
				if($stu_guardianRow["parent_status"]==1){
					//-----------------------------------------------------------------------------
				}elseif($stu_guardianRow["parent_status"]==2){
					//-----------------------------------------------------------------------------
				}elseif($stu_guardianRow["parent_status"]==3){
					//-----------------------------------------------------------------------------
				}elseif($stu_guardianRow["parent_status"]==5){
					//-----------------------------------------------------------------------------
				}elseif($stu_guardianRow["parent_status"]==""){
					//-----------------------------------------------------------------------------
				}else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--********************************************************************************************-->		
				<div class="row">
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">คำนำหน้า (ภาษาไทย)</b></label>
								<div class="col-<?php echo $grid;?>-9">
							<select name="parent_prefix" id="parent_prefix" data-placeholder="คำนำหน้าภาษาไทย.." class="select-size-<?php echo $grid;?>">
								<option></option>
								<optgroup label="คำนำหน้า..">
					<?php
						$npthailSql="SELECT `IDPrefix`,`prefixname`,`prefix_SName` 
						             FROM `rc_prefix` 
									 WHERE `IDPrefix`!='1' and `IDPrefix`!='2'  and `IDPrefix`!='7' and `IDPrefix`!='8'and `IDPrefix`!='9'";
						$npthail=new row_datastu($npthailSql);
						foreach($npthail->datastu_array as $rc_key=>$npthailRow){ 
							if($stu_guardianRow["parent_prefix"]==$npthailRow["IDPrefix"]){
								$pprefix_selected="selected";
							}else{
								$pprefix_selected="";
							}
						
						?>
									<option value="<?php echo $npthailRow["IDPrefix"];?>" <?php echo $pprefix_selected;?>><?php echo $npthailRow["prefixname"]?></option>
									
				<?php	}?>					
			
								</optgroup>
							</select>
								</div>
							</div>
                        </fieldset>						
			
					</div>
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">ชื่อ (ภาษาไทย)</b></label>							
								<div class="col-<?php echo $grid;?>-10">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="ชื่อ ไทย" size="100" name="parent_fname" id="parent_fname" value="<?php echo $stu_guardianRow["parent_fname"];?>" maxlength="100" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>
					</div>
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">นามสกุล (ภาษาไทย)</b></label>
								<div class="col-<?php echo $grid;?>-9">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="นามสกุล ไทย" size="100" name="parent_sname" id="parent_sname" value="<?php echo $stu_guardianRow["parent_sname"];?>" maxlength="100" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>					
					</div>
				</div>				
		
				<div class="row">
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">คำนำหน้า (ภาษาอังกฤษ)</b></label>
								<div class="col-<?php echo $grid;?>-9">
									<select name="parent_prefix_en" id="" data-placeholder="คำนำหน้าภาษา (ภาษาอังกฤษ).." class="select-size-<?php echo $grid;?>">
										<option></option>
										<optgroup label="คำนำหน้าภาษา (ภาษาอังกฤษ)...">
							<?php
								$npthailSql="SELECT `IDPrefix`,`prefixname`,`prefix_SName` 
											 FROM `rc_prefix` 
											 WHERE  `IDPrefix`='7' or `IDPrefix`='8' or `IDPrefix`='9'";
								$npthail=new row_datastu($npthailSql);
								foreach($npthail->datastu_array as $rc_key=>$npthailRow){ 
									if($stu_guardianRow["parent_prefix_en"]==$npthailRow["IDPrefix"]){
										$ppe_selected="selected";
									}else{
										$ppe_selected="";
									}
								?>
											<option value="<?php echo $npthailRow["IDPrefix"]?>" <?php echo $ppe_selected;?>><?php echo $npthailRow["prefixname"]?></option>
											
						<?php	}?>					
					
										</optgroup>
									</select>
								</div>
							</div>
                        </fieldset>						
								
					</div>				
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">ชื่อ (ภาษาอังกฤษ)</b></label>							
								<div class="col-<?php echo $grid;?>-10">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="ชื่อ  (ภาษาอังกฤษ)" size="100" name="parent_fname_en" id="parent_fname_en" value="<?php echo $stu_guardianRow["parent_fname_en"];?>" maxlength="100" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>
					</div>
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">นามสกุล (ภาษาอังกฤษ)</b></label>
								<div class="col-<?php echo $grid;?>-9">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="นามสกุล  (ภาษาอังกฤษ)" size="100" name="parent_sname_en" id="parent_sname_en" value="<?php echo $stu_guardianRow["parent_sname_en"];?>" maxlength="100" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>					
					</div>
				</div>
				<div class="row">
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-5"><b style="color: #00008B">เลขประจำตัวชาชน </b></label>							
								<div class="col-<?php echo $grid;?>-7">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="เลขประจำตัวชาชน" size="100" name="parent_code" id="parent_code" value="<?php echo $stu_guardianRow["parent_code"];?>" maxlength="13" style="font-family: surafont_sanukchang; font-size: 18px"> 
									</div>
								</div>
							</div>
                        </fieldset>
					</div>
					<div class="col-<?php echo $grid;?>-5">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-5"><b style="color: #00008B">วัน/เดือน/ปี เกิด ค.ศ.</b></label>
								<div class="col-<?php echo $grid;?>-7">
									<div class="input-group">
										<input type="text" class="form-control pickadate-accessibility" placeholder="คลิกเลือก วัน/เดือน/ปี เกิด" size="100" name="guardian_birthday" id="guardian_birthday" value="<?php echo $stu_guardianRow["guardian_birthday"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>					
					</div>
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">กรุ๊ปเลือด</b></label>
								<div class="col-<?php echo $grid;?>-8">
										<select data-placeholder="กรุ๊ปเลือด..." class="select-size-<?php echo $grid;?>" name="parent_blood" id="parent_blood">
											<option></option>
						<?php
							if($stu_guardianRow["parent_blood"]=="A"){ ?>
											<option></option>
											<optgroup label="กรุ๊ปเลือด">
												<option value="A" selected="selected">กรุ๊ปเลือด A</option>
												<option value="B">กรุ๊ปเลือด B</option>
												<option value="O">กรุ๊ปเลือด O</option>
												<option value="AB">กรุ๊ปเลือด AB</option>
											</optgroup>								
					<?php		}elseif($stu_guardianRow["parent_blood"]=="B"){ ?>
											<option></option>
											<optgroup label="กรุ๊ปเลือด">
												<option value="A">กรุ๊ปเลือด A</option>
												<option value="B" selected="selected">กรุ๊ปเลือด B</option>
												<option value="O">กรุ๊ปเลือด O</option>
												<option value="AB">กรุ๊ปเลือด AB</option>
											</optgroup>								
					<?php		}elseif($stu_guardianRow["parent_blood"]=="O"){ ?>
											<option></option>
											<optgroup label="กรุ๊ปเลือด">
												<option value="A">กรุ๊ปเลือด A</option>
												<option value="B">กรุ๊ปเลือด B</option>
												<option value="O" selected="selected">กรุ๊ปเลือด O</option>
												<option value="AB">กรุ๊ปเลือด AB</option>
											</optgroup>								
					<?php		}elseif($stu_guardianRow["parent_blood"]=="AB"){ ?>
											<option></option>
											<optgroup label="กรุ๊ปเลือด">
												<option value="A">กรุ๊ปเลือด A</option>
												<option value="B">กรุ๊ปเลือด B</option>
												<option value="O">กรุ๊ปเลือด O</option>
												<option value="AB" selected="selected">กรุ๊ปเลือด AB</option>
											</optgroup>								
					<?php		}else{ ?>
											<option></option>
											<optgroup label="กรุ๊ปเลือด">
												<option value="A">กรุ๊ปเลือด A</option>
												<option value="B">กรุ๊ปเลือด B</option>
												<option value="O">กรุ๊ปเลือด O</option>
												<option value="AB">กรุ๊ปเลือด AB</option>
											</optgroup>								
					<?php		}   ?>
										</select>
								</div>
							</div>
                        </fieldset>						
						
					</div>					
				</div>				
				<div class="row">
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">เชื้อชาติ</b></label>
								<div class="col-<?php echo $grid;?>-9">
										<select data-placeholder="เชื้อชาติ..." class="select-size-<?php echo $grid;?>" name="parent_nation" id="parent_nation">
											<option></option>
											<optgroup label="เชื้อชาติ">
						<?php
								if($stu_guardianRow["parent_nation"]=="188"){ ?>
												<option value="188" selected="selected">ไทย / Thailand</option>
						<?php	}else{ ?>
												<option value="188">ไทย / Thailand</option>
						<?php	}      ?>				
						
							<?php
								$stusun_stu="SELECT `id`,`country_name_th`,`country_name_en` FROM `db_country`where `id`!='188' order by convert ( `country_name_th` using tis620) asc";
								$stusun_sturs=new row_datastu($stusun_stu);
								foreach($stusun_sturs->datastu_array as $rc_key=>$stusun_sturow){ 
									if($stu_guardianRow["parent_nation"]==$stusun_sturow["id"]){
										$stu_selected="selected";
									}else{
										$stu_selected="";
									}
								?>
											<option value="<?php echo $stusun_sturow["id"] ;?>" <?php echo $stu_selected;?>><?php echo $stusun_sturow["country_name_th"]." / ".$stusun_sturow["country_name_en"];?></option>
							<?php		 } ?>						
						
											</optgroup>
										</select>
								</div>
							</div>
                        </fieldset>						
					
					</div>
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">สัญชาติ</b></label>
								<div class="col-<?php echo $grid;?>-9">
										<select data-placeholder="สัญชาติ..." class="select-size-<?php echo $grid;?>" name="parent_sun" id="parent_sun">
											<option></option>
											<optgroup label="สัญชาติ">

						<?php
								if($stu_guardianRow["parent_sun"]=="188"){ ?>
												<option value="188" selected="selected">ไทย / Thailand</option>
						<?php	}else{ ?>
												<option value="188">ไทย / Thailand</option>
						<?php	}      ?>				
						
							<?php
								$stusun_stu="SELECT `id`,`country_name_th`,`country_name_en` FROM `db_country`where `id`!='188' order by convert ( `country_name_th` using tis620) asc";
								$stusun_sturs=new row_datastu($stusun_stu);
								foreach($stusun_sturs->datastu_array as $rc_key=>$stusun_sturow){ 
									if($stu_guardianRow["parent_sun"]==$stusun_sturow["id"]){
										$stu_selected="selected";
									}else{
										$stu_selected="";
									}
								?>
											<option value="<?php echo $stusun_sturow["id"] ;?>" <?php echo $stu_selected;?>><?php echo $stusun_sturow["country_name_th"]." / ".$stusun_sturow["country_name_en"];?></option>
							<?php		 } ?>

											</optgroup>	
										</select>
								</div>
							</div>
                        </fieldset>						
					
												
					</div>
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">ศาสนา</b></label>
								<div class="col-<?php echo $grid;?>-9">
										<select data-placeholder="ศาสนา..." class="select-size-<?php echo $grid;?>" name="parent_IDReligion" id="parent_IDReligion">
											<option></option>
											<optgroup label="ศาสนา">
							<?php
								$ReligionSql="SELECT `IDReligion`,`Religion` FROM `rc_religion`";
								$Religion=new row_datastu($ReligionSql);
								foreach($Religion->datastu_array as $rc_key=>$Religion_print){ 
								if($stu_guardianRow["parent_IDReligion"]==$Religion_print["IDReligion"]){
									$stu_Religion="selected";
								}else{
									$stu_Religion="";
								}
								?>
											<option value="<?php echo $Religion_print["IDReligion"];?>" <?php echo $stu_Religion;?>><?php echo $Religion_print["Religion"];?></option>
							<?php	} ?>					

											</optgroup>	
										</select>
								</div>
							</div>
                        </fieldset>						
			
					</div>
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-5"><b style="color: #00008B">เบอร์โทรศัทพ์ </b></label>							
								<div class="col-<?php echo $grid;?>-6">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="เบอร์โทรศัทพ์" size="100" name="parent_phone" id="parent_phone" value="<?php echo $stu_guardianRow["parent_phone"];?>" data-masked-input="9999999999" maxlength="10" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>					
					</div>
				</div>
				

				
				<div class="row">
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">อาชีพ</b></label>
								<div class="col-<?php echo $grid;?>-9">
										<select data-placeholder="อาชีพ..." class="select-size-<?php echo $grid;?>" name="parent_career" id="parent_career">
											<option></option>
					<?php
						$data_careerSql="SELECT `dc_key`, `dc_txt` FROM `data_career` ORDER BY `data_career`.`dc_key` ASC";
						$data_career=new row_datastu($data_careerSql);
						foreach($data_career->datastu_array as $rc_key=>$data_careerRow){
								if($stu_guardianRow["parent_career"]==$data_careerRow["dc_key"]){
									$pc_selected="selected";
								}else{
									$pc_selected="";
								}
							?>
												<option value="<?php echo $data_careerRow["dc_key"];?>" <?php echo $pc_selected;?>><?php echo $data_careerRow["dc_txt"];?></option>
					<?php	}   ?>	
										</select>
								</div>
							</div>
                        </fieldset>						
					
												
					</div>
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">ช่วงรายได้ / เดือน</b></label>
								<div class="col-<?php echo $grid;?>-8">
										<select data-placeholder="ช่วงรายได้..." class="select-size-<?php echo $grid;?>" name="parent_salary" id="parent_salary">
											<option></option>
					<?php
						$data_incomSql="SELECT `di_key`, `di_txt` FROM `data_incom` ORDER BY `data_incom`.`di_key` ASC";
						$data_incom=new row_datastu($data_incomSql);
						foreach($data_incom->datastu_array as $rc_key=>$data_incomRow){ 
							if($stu_guardianRow["parent_salary"]==$data_incomRow["di_key"]){
								$ps_selected="selected";
							}else{
								$ps_selected="";
							}
						?>
												<option value="<?php echo $data_incomRow["di_key"];?>" <?php echo $ps_selected;?>><?php echo $data_incomRow["di_txt"];?></option>
					<?php	}   ?>
										</select>
								</div>
							</div>
                        </fieldset>						
									<div class="form-group">
										<label></label>

									</div>					
					</div>
					<!--<div class="col-<?php //echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php //echo $grid;?>-4">รายได้/เดือน</label>							
								<div class="col-<?php //echo $grid;?>-7">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Left addon" size="100">
									</div>
								</div>
							</div>
                        </fieldset>					
					</div>-->
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">วุฒิการศึกษา</b></label>
								<div class="col-<?php echo $grid;?>-8">
										<select data-placeholder="วุฒิการศึกษา..." class="select-size-<?php echo $grid;?>" name="parent_study" id="parent_study">
											<option></option>
										<?php
						$data_studySql="SELECT `study_id`, `study_txt` FROM `data_study` ORDER BY `data_study`.`study_id` ASC";
						$data_study=new row_datastu($data_studySql);
						foreach($data_study->datastu_array as $rc_key=>$data_studyRow){ 
							if($stu_guardianRow["parent_study"]==$data_studyRow["study_id"]){
								$study_selected="selected";
							}else{
								$study_selected="";
							}
						?>
												<option value="<?php echo $data_studyRow["study_id"];?>" <?php echo $study_selected;?>><?php echo $data_studyRow["study_txt"];?></option>
					<?php	}   ?>	
										</select>
								</div>
							</div>
                        </fieldset>						
													
					</div>
				</div>

				<div class="row">
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">สถานที่ทำงาน </b></label>
								<div class="col-<?php echo $grid;?>-9">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="สถานที่ทำงาน" size="100" maxlength="100" name="parent_workplace" id="parent_workplace" value="<?php echo $stu_guardianRow["parent_workplace"];?>" style="font-family: surafont_sanukchang; font-size: 18px"> 
									</div>
								</div>
							</div>
                        </fieldset>					
					</div>
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">ตำแหน่ง </b></label>
								<div class="col-<?php echo $grid;?>-8">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="ตำแหน่ง" size="100" maxlength="100" name="parent_wp_pro" id="parent_wp_pro" value="<?php echo $stu_guardianRow["parent_wp_pro"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>					
					</div>
				</div>				
				
				<hr><p><h4><u><b style="color: #336600">ที่อยู่ที่ทำงาน</b></u></h4></p><hr>				
				<div class="row">
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">เลขที่ </b></label>
								<div class="col-<?php echo $grid;?>-8">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="เลขที่" size="100" maxlength="10" name="parent_addwordhno" id="parent_addwordhno" value="<?php echo $stu_guardian_addwordRow["parent_addwordhno"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>						
					</div>
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">หมู่ที่ </b></label>
								<div class="col-<?php echo $grid;?>-10">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="หมู่ที่" size="100" maxlength="20" name="parent_addwordmoo" id="parent_addwordmoo" value="<?php echo $stu_guardian_addwordRow["parent_addwordmoo"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>						
					</div>
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">ซอย </b></label>
								<div class="col-<?php echo $grid;?>-10">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="ซอย" size="100" maxlength="50" name="parent_addwordsoi" id="parent_addwordsoi" value="<?php echo $stu_guardian_addwordRow["parent_addwordsoi"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>						
					</div>
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">ถนน </b></label>
								<div class="col-<?php echo $grid;?>-10">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="ถนน" size="100" maxlength="100" name="parent_addwordroad" id="parent_addwordroad" value="<?php echo $stu_guardian_addwordRow["parent_addwordroad"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>						
					</div>
				</div>				
				<div class="row">
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">จังหวัด</b></label>
								<div class="col-<?php echo $grid;?>-9">
										<select data-placeholder="จังหวัด..." class="select-size-<?php echo $grid;?>" name="parent_addwordprovince" id="parent_addwordprovince">
											<option></option>
											<optgroup label="จังหวัด">
											
								<?php
									$data_provinces="SELECT `PROVINCE_ID`,`PROVINCE_NAME`,`PROVINCE_NAME_ENG` FROM `provinces` order by convert ( `PROVINCE_NAME` using tis620) asc";
									$txt_provinces=new row_datastu($data_provinces);
									foreach($txt_provinces->datastu_array as $rc_key=>$provincesRow){
										if($stu_guardian_addwordRow["parent_addwordprovince"]==$provincesRow["PROVINCE_ID"]){
											$pap_selected="selected";
										}else{
											$pap_selected="";
										}
										?>
									
												<option value="<?php echo $provincesRow["PROVINCE_ID"];?>" <?php echo $pap_selected;?>><?php echo $provincesRow["PROVINCE_NAME"]." / ".$provincesRow["PROVINCE_NAME_ENG"];?></option>
								<?php	} ?>			 
											</optgroup>
										</select>	
								</div>
							</div>
                        </fieldset>						
												
					</div>
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">อำเภอ</b></label>
								<div class="col-<?php echo $grid;?>-9">
										<select data-placeholder="อำเภอ..." class="select-size-<?php echo $grid;?>" name="parent_addwordamphur" id="parent_addwordamphur">
											<option></option>
											<optgroup label="อำเภอ">
											
							<?php
								$amphuresSql="SELECT `AMPHUR_ID`,`AMPHUR_NAME`,`AMPHUR_NAME_ENG` FROM `amphures` WHERE `PROVINCE_ID`='{$stu_guardian_addwordRow["parent_addwordprovince"]}'";
								$amphuresRs=new row_datastu($amphuresSql);
								foreach($amphuresRs->datastu_array as $rc_key=>$amphuresRow){ 
								if($stu_guardian_addwordRow["parent_addwordamphur"]==$amphuresRow["AMPHUR_ID"]){
									$pad_selected="selected";
								}else{
									$pad_selected="";
								}
								?>
												<option value="<?php echo $amphuresRow["AMPHUR_ID"];?>" <?php echo $pad_selected;?>><?php echo $amphuresRow["AMPHUR_NAME"]." / ".$amphuresRow["AMPHUR_NAME_ENG"];?></option>
						<?php	}   ?>				
											</optgroup>
										</select>
								</div>
							</div>
                        </fieldset>						
													
					</div>
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">ตำบล</b></label>
								<div class="col-<?php echo $grid;?>-9">
										<select data-placeholder="ตำบล..." class="select-size-<?php echo $grid;?>" name="parent_addwordtumbon" id="parent_addwordtumbon">
											<option></option>
											<optgroup label="ตำบล">
								<?php
									$districtsSql="SELECT `DISTRICT_ID`,`DISTRICT_NAME`,`DISTRICT_NAME_ENG` FROM `districts` WHERE `AMPHUR_ID`='{$stu_guardian_addwordRow["parent_addwordamphur"]}';";
									$districts=new row_datastu($districtsSql);
									foreach($districts->datastu_array as $rc_key=>$districts_print){ 
										if($stu_guardian_addwordRow["parent_addwordtumbon"]==$districts_print["DISTRICT_ID"]){
											$pat_selected="selected";
										}else{
											$pat_selected="";
										}
									
									?>
											<option value="<?php echo $districts_print["DISTRICT_ID"];?>" <?php echo $pat_selected;?>><?php echo $districts_print["DISTRICT_NAME"]." / ".$districts_print["DISTRICT_NAME_ENG"];?></option>
							<?php	} ?>

											</optgroup>
										</select>
								</div>
							</div>
                        </fieldset>						
														
					</div>

					
				</div>
				
				<div class="row">
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">รหัสไปรษณีย์ </b></label>
								<div class="col-<?php echo $grid;?>-9">
									<div class="input-group">
										<div id="parent_addwordzipcode"><input type="text" name="parent_addwordzipcode" id="parent_addwordzipcodecopy" class="form-control" readonly="readonly" placeholder="รหัสไปรษณีย์" size="100" maxlength="6" value="<?php echo $stu_guardian_addwordRow["parent_addwordzipcode"];?>" style="font-family: surafont_sanukchang; font-size: 18px"></div>
									</div>
								</div>
							</div>
                        </fieldset>						
					</div>				
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">เบอร์โทรศัทพ์ที่ทำงาน </b></label>							
								<div class="col-<?php echo $grid;?>-8">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="เบอร์โทรศัทพ์ที่ทำงาน" size="100" name="parent_wp_tel" id="parent_wp_tel" value="<?php echo $stu_guardianRow["parent_wp_tel"];?>" data-masked-input="999999999999999" maxlength="15" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>					
					</div>
				</div>				
				<hr><p><h4><u><b style="color: #336600">ที่อยู่ ผู้ปกครอง</b></u></h4></p><hr>
				<div class="row">
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">บ้านเลขที่ </b></label>
								<div class="col-<?php echo $grid;?>-8">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="บ้านเลขที่" size="100" maxlength="10" name="parent_hno" id="parent_hno" value="<?php echo $stu_guardian_addressRow["parent_hno"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>						
					</div>
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">หมู่ที่ </b></label>
								<div class="col-<?php echo $grid;?>-10">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="หมู่ที่" size="100" maxlength="20"  name="parent_moo" id="parent_moo" value="<?php echo $stu_guardian_addressRow["parent_moo"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>						
					</div>
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">ซอย </b></label>
								<div class="col-<?php echo $grid;?>-10">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="ซอย" size="100" maxlength="50"  name="parent_soi" id="parent_soi" value="<?php echo $stu_guardian_addressRow["parent_soi"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>						
					</div>
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">ถนน </b></label>
								<div class="col-<?php echo $grid;?>-10">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="ถนน" size="100" maxlength="100"  name="parent_road" id="parent_road" value="<?php echo $stu_guardian_addressRow["parent_road"];?>" style="font-family: surafont_sanukchang; font-size: 18px">
									</div>
								</div>
							</div>
                        </fieldset>						
					</div>
				</div>

				<div class="row">
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">จังหวัด</b></label>
								<div class="col-<?php echo $grid;?>-9">
										<select data-placeholder="จังหวัด..." class="select-size-<?php echo $grid;?>" name="parent_province" id="parent_province">
											<option></option>
											<optgroup label="จังหวัด">
											
								<?php
									$data_provinces="SELECT `PROVINCE_ID`,`PROVINCE_NAME`,`PROVINCE_NAME_ENG` FROM `provinces` order by convert ( `PROVINCE_NAME` using tis620) asc";
									$txt_provinces=new row_datastu($data_provinces);
									foreach($txt_provinces->datastu_array as $rc_key=>$provincesRow){
										if($stu_guardian_addressRow["parent_province"]==$provincesRow["PROVINCE_ID"]){
											$pp_selected="selected";
										}else{
											$pp_selected="";
										}
										?>
									
												<option value="<?php echo $provincesRow["PROVINCE_ID"];?>" <?php echo $pp_selected;?>><?php echo $provincesRow["PROVINCE_NAME"]." / ".$provincesRow["PROVINCE_NAME_ENG"];?></option>
								<?php	} ?>			 
											</optgroup>
										</select>

								</div>
							</div>
                        </fieldset>					
					
													
					</div>
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">อำเภอ</b></label>
								<div class="col-<?php echo $grid;?>-9">
										<select data-placeholder="อำเภอ..." class="select-size-<?php echo $grid;?>" name="parent_amphur" id="parent_amphur">
											<option></option>
											<optgroup label="อำเภอ">
											
							<?php
								$amphuresSql="SELECT `AMPHUR_ID`,`AMPHUR_NAME`,`AMPHUR_NAME_ENG` FROM `amphures` WHERE `PROVINCE_ID`='{$stu_guardian_addressRow["parent_province"]}'";
								$amphuresRs=new row_datastu($amphuresSql);
								foreach($amphuresRs->datastu_array as $rc_key=>$amphuresRow){ 
								if($stu_guardian_addressRow["parent_amphur"]==$amphuresRow["AMPHUR_ID"]){
									$pa_selected="selected";
								}else{
									$pa_selected="";
								}
								?>
												<option value="<?php echo $amphuresRow["AMPHUR_ID"];?>" <?php echo $pa_selected;?>><?php echo $amphuresRow["AMPHUR_NAME"]." / ".$amphuresRow["AMPHUR_NAME_ENG"];?></option>
						<?php	}   ?>				
											</optgroup>
										</select>
								</div>
							</div>
                        </fieldset>					
														
					</div>
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">ตำบล</b></label>
								<div class="col-<?php echo $grid;?>-9">
										<select data-placeholder="ตำบล..." class="select-size-<?php echo $grid;?>" name="parent_tumbon" id="parent_tumbon">
											<option></option>
											<optgroup label="ตำบล">
								<?php
									$districtsSql="SELECT `DISTRICT_ID`,`DISTRICT_NAME`,`DISTRICT_NAME_ENG` FROM `districts` WHERE `AMPHUR_ID`='{$stu_guardian_addressRow["parent_amphur"]}';";
									$districts=new row_datastu($districtsSql);
									foreach($districts->datastu_array as $rc_key=>$districts_print){ 
										if($stu_guardian_addressRow["parent_tumbon"]==$districts_print["DISTRICT_ID"]){
											$pt_selected="selected";
										}else{
											$pt_selected="";
										}
									
									?>
											<option value="<?php echo $districts_print["DISTRICT_ID"];?>" <?php echo $pt_selected;?>><?php echo $districts_print["DISTRICT_NAME"]." / ".$districts_print["DISTRICT_NAME_ENG"];?></option>
							<?php	} ?>

											</optgroup>
										</select>
								</div>
							</div>
                        </fieldset>					
													
					</div>
					<div class="col-<?php echo $grid;?>-3">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-5"><b style="color: #00008B">รหัสไปรษณีย์ </b></label>
								<div class="col-<?php echo $grid;?>-7">
									<div class="input-group">
										<div id="parent_zipcode"><input type="text" name="parent_zipcode" id="parent_zipcodecopy"  class="form-control" readonly="readonly" placeholder="รหัสไปรษณีย์" size="100" maxlength="6" value="<?php echo $stu_guardian_addressRow["parent_zipcode"];?>" style="font-family: surafont_sanukchang; font-size: 18px"></div>
									</div>
								</div>
							</div>
                        </fieldset>						
					</div>
					
				</div><hr>		
<!--********************************************************************************************-->	
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->						
		<?php	}      ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->				
			</div>
<!--********************************************************************************************-->		
				
	<?php		}	?>

			

			
			


			
			
			
		
			
				<!--<div class="row">
					<div class="col-<?php //echo $grid;?>-12">
						<center><button type="submit" class="btn btn-info">บันทึกข้อมูล..ผู้ปกครอง</button></center>
					</div>
				</div>-->
<hr>				
				<div class="row">
					<div class="col-<?php  echo $grid;?>-12">
						<center><button type="button" id="parent_modify" class="btn btn-info" style="font-family: surafont_sanukchang; font-size: 18px">บันทึกข้อมูล..ผู้ปกครอง</button></center>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>
<input type="hidden" name="stu_id" value="<?php echo $user_login;?>" id="stu_id_pm">
<input type="hidden" name="enter" value="up_guardian" id="enter_pm">
<input type="hidden" name="myname" value="<?php echo $myname;?>" id="myname" >
<input type="hidden" name="group" value="S" id="group" >
</form>
<div id="print_parent_modify"></div>

	
<div class="row">
	<div class="col-<?php echo $grid;?>-12">
		<div class="alert alert-warning">
		  <strong><center><a href="admission_rc.php?user_login=<?php echo $user_login;?>&user_card=<?php echo $regina_stu_datarow["IDCard"];?>&user_level=<?php echo $regina_stu_datarow["stu_level"];?>&user_plan=<?php echo $regina_stu_datarow["stu_plan"];?>">คลิกที่นี่</a></strong> เพื่อดำเนินการมอบตัว...</center>
		</div>
	</div>
</div>	






		
		
		
	
		
				

<!-- Footer -->
	<div class="footer text-muted">
		&copy; Copyright © 2020 Regina Coeli Collage. All Rights Reserved.
	</div>
<!-- /footer -->	
<hr>					
		</div>
	</div>



</body>
</html>
