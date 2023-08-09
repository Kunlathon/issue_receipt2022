<?php
	date_default_timezone_set('Asia/Bangkok');
	include("database/pdo_data.php");
	include("database/class_pdo.php");
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++	
	include("database/pdo_conndatastu.php");
	include("database/class_pdodatastu.php");
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++	
	include("database/pdo_admission.php");
	include("database/class_admission.php");
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++	
	$copy_Identification=filter_input(INPUT_POST,'copy_Identification');;
	$copy_level=filter_input(INPUT_POST,'copy_level');;
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++	
		if($copy_Identification=="" and $copy_level==""){ 
			exit("<script>window.location='index.html';</script>");
		}elseif($copy_Identification=="" or $copy_level==""){  
			exit("<script>window.location='index.html';</script>");
		}else{
//--------------------------------------------------------------------------------------------------			
			switch($copy_level){
				case 3:
					$txt_plan="อนุบาล";
					$txt_level="อนุบาล 3";
					$plan_idA="0";
					$plan_idB="99";
					break;
				case 11:
					$txt_plan="ประถมศึกษา";
					$txt_level="ประถมศึกษาปีที่ 1";
					$plan_idA="1";
					$plan_idB="99";
					break;				
				case 31:
					$txt_plan="มัธยมศึกษาตอนต้น";
					$txt_level="มัธยมศึกษาปีที่ 1";
					$plan_idA="2";
					$plan_idB="99";
					break;	
				default:
					$txt_plan="";
					$txt_level="มัธยมศึกษาปีที่ 4";
					$plan_idA="";
					$plan_idB="";
			}	
//--------------------------------------------------------------------------------------------------		
		function datethai2($strDate){
			
				if($strDate==""){
					$datadmy="";
				}else{
					$strYear=substr($strDate,0,4);
					$strMonth=substr($strDate,5,2);
					$strDay=substr($strDate,8,2);
					$datadmy=$strDay."-".$strMonth."-".$strYear;					
				}
	        return $datadmy;
	    }
			?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->		
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
        @font-face{
            font-family: 'surafont_sanukchang';
            src: url('../font/surafont_sanukchang-webfont.eot');
            src: url('../font/surafont_sanukchang-webfont.eot?#iefix') format('embedded-opentype'),
            url('../font/surafont_sanukchang-webfont.woff') format('woff'),
            url('../font/surafont_sanukchang.ttf') format('truetype');
        }
            
        body{
            background-color: #add8e6;
            font-family: "surafont_sanukchang";
            font-size: 16px;			
        }
            
        #fontA{
            font-family: "surafont_sanukchang";
            font-size:18px;
        }
            
        #fontB{
            font-family: "surafont_sanukchang";
            font-size: 20px;
        }
            
        .form-control{
            font-family: "surafont_sanukchang";
            font-size: 16px;
        }        
            
    </style>
	


	<!-- Core JS files -->
	<script src="Bootstrap 3/Template/global_assets/js/plugins/loaders/pace.min.js"></script>
	<script src="Bootstrap 3/Template/global_assets/js/core/libraries/jquery.min.js"></script>
	<script src="Bootstrap 3/Template/global_assets/js/core/libraries/bootstrap.min.js"></script>
	<script src="Bootstrap 3/Template/global_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->


	
	<!-- Theme JS files -->
	<script src="Bootstrap 3/Template/global_assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script src="Bootstrap 3/Template/global_assets/js/plugins/forms/selects/select2.min.js"></script>


	<!-- /theme JS files -->
	
	<script src="Bootstrap 3/Template/global_assets/js/plugins/pickers/pickadate/picker.js"></script>
	<script src="Bootstrap 3/Template/global_assets/js/plugins/pickers/pickadate/picker.date.js"></script>
	

	
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

	<script>
		$(document).ready(function () {
		// Accessibility labels
			$('.pickadate-accessibility').pickadate({
				labelMonthNext: 'ไปที่เดือนถัดไป',
				labelMonthPrev: 'ไปที่เดือนก่อนหน้า',
				labelMonthSelect: 'เลือกเดือนจากรายการแบบเลื่อนลง',
				labelYearSelect: 'เลือกหนึ่งปีจากรายการแบบเลื่อนลง',
				selectMonths: true,
				selectYears: '100',
				//yearSuffix: year+543, 
				formatSubmit: 'dd-mm-yyyy',
				format:'dd-mm-yyyy',
				today:"วันนี้",
				clear:"ลบ",
				close:"ออก",
				monthsFull: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
                weekdaysShort: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤ', 'ศุกร์', 'เสาร์'],
			
			});
		})
	</script>

	<script>
		$(document).ready(function(){
			$('.select-size-<?php echo $grid;?>').select2({
				containerCssClass: 'select-<?php echo $grid;?>'
			});
			
			$('.select').select2({
			minimumResultsForSearch: Infinity
    });

		})
	</script>
	<style>			
		.select-size-<?php echo $grid;?>{
			font-family: "surafont_sanukchang";
			font-size: 22px;
		}
		.select{
			font-family: "surafont_sanukchang";
			font-size: 22px;
		}
	</style>
	
	

	<script>
		$(document).ready(function () {
			$("#stu_amphur").change(function () {
				var city=$("#stu_amphur").val();
				
				if(city!=""){
					$.post("js/addstu_amphures.php",{
						txt_city:city
					},function(datacity){
						if(datacity!=""){
							$("#stu_tumbon").html(datacity);
						}
					})
				}
				
			})
		})
	</script>
	<script>
		$(document).ready(function () {
			$("#stu_province").change(function () {
				var province=$("#stu_province").val();
				
				if(province!=""){
					$.post("js/addstu_city.php",{
						txt_province:province
					},function(dataprovince){
						if(dataprovince!=""){
							$("#stu_amphur").html(dataprovince);
						}
					})
				}
				
			})
		})
	</script>
	<script>
		$(document).ready(function () {
			$("#stu_tumbon").change(function () {
				var zip=$("#stu_tumbon").val();
				
				if(zip!=""){
					$.post("js/addstu_zip.php",{
						txt_zip:zip
					},function(datacity){
						if(datacity!=""){
							$("#stu_zipcode").html(datacity);
						}
					})
				}
				
			})
		})
	</script>

</head>
<?php
	$rc_student_admissionSql="SELECT * FROM `rc_student_admission` 
						      WHERE `IDReg` LIKE '64%' and `IDCard`='{$copy_Identification}'";
	$rc_student_admissionRs=new notrow_admission($rc_student_admissionSql);
	foreach($rc_student_admissionRs->notrow_admission_print() as $admin=>$rc_student_admissionRow){}
	
	$rc_student_family_admissionSql="SELECT * FROM `rc_student_family_admission` WHERE `IDReg`='{$rc_student_admissionRow["IDReg"]}'";
	$rc_student_family_admissionRs=new notrow_admission($rc_student_family_admissionSql);
	foreach($rc_student_family_admissionRs->notrow_admission_print() as $admin=>$rc_student_family_admissionRow){}
	
	
	$rc_student_levelSql="SELECT * FROM `rc_student_level` WHERE `IDReg`='{$rc_student_admissionRow["IDReg"]}'";
	$rc_student_levelRs=new notrow_admission($rc_student_levelSql);
	foreach($rc_student_levelRs->notrow_admission_print() as $admin=>$rc_student_levelRow){}
	
	
	

?>
<body class="col-<?php echo $grid;?>-12">

	<div class="page-container">
		<div class="page-content">
			<div class="row">
				<div class="col-<?php echo $grid;?>-12">
					<center><h1><b>รับสมัครนักเรียน ประจำปีการศึกษา 2565 ระดับชั้น <?php echo $txt_level;?></b></h1></center>
				</div>
			</div>
<hr>			
<form name="apply" method="post" action="apply_data.php">		
		<div class="row">
			<div class="col-<?php echo $grid;?>-12">
				<div class="panel panel-info">
				  <div class="panel-heading">ข้อมูลนักเรียน</div>
				  <div class="panel-body">
				<div class="row">
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">ชื่อ (ภาษาไทย)</b></label>							
								<div class="col-<?php echo $grid;?>-9">
									<div class="input-group">
										<input type="text"  name="stu_fname" class="form-control" placeholder="ชื่อ (ภาษาไทย)" size="100" required="required" maxlength="100" value="<?php echo $rc_student_admissionRow["stu_fname"];?>">
									</div>
								</div>
							</div>
                        </fieldset>
					</div>
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">นามสกุล (ภาษาไทย)</b></label>
								<div class="col-<?php echo $grid;?>-8">
									<div class="input-group">
										<input type="text" name="stu_sname"  class="form-control" placeholder="นามสกุล (ภาษาไทย)" size="100" required="required" maxlength="100" value="<?php echo $rc_student_admissionRow["stu_sname"];?>">
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
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">ชื่อเล่น (ภาษาไทย)</b></label>							
								<div class="col-<?php echo $grid;?>-9">
									<div class="input-group">
										<input type="text" name="nickTh"  class="form-control" placeholder="ชื่อเล่น (ภาษาไทย)" size="100" maxlength="20" required="required" value="<?php echo $rc_student_admissionRow["nickTh"];?>">
									</div>
								</div>
							</div>
                        </fieldset>
					</div>
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">ชื่อเล่น (ภาษาอังกฤษ)</b></label>
								<div class="col-<?php echo $grid;?>-8">
									<div class="input-group">
										<input type="text"  name="nickEn"  class="form-control" placeholder="ชื่อเล่น (ภาษาอังกฤษ)" size="100"  maxlength="20" required="required" value="<?php echo $rc_student_admissionRow["nickEn"];?>">
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
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">ชื่อ (ภาษาอังกฤษ)</b></label>							
								<div class="col-<?php echo $grid;?>-9">
									<div class="input-group">
										<input type="text" name="stu_fname_e"  class="form-control" placeholder="ชื่อ (ภาษาอังกฤษ)" size="100"  maxlength="100" required="required" value="<?php echo $rc_student_admissionRow["stu_fname_e"];?>">
									</div>
								</div>
							</div>
                        </fieldset>
					</div>
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">นามสกุล (ภาษาอังกฤษ)</b></label>
								<div class="col-<?php echo $grid;?>-8">
									<div class="input-group">
										<input type="text" name="stu_sname_e"  class="form-control" placeholder="นามสกุล (ภาษาอังกฤษ)" size="100"  maxlength="100" required="required" value="<?php echo $rc_student_admissionRow["stu_sname_e"];?>">
									</div>
								</div>
							</div>
                        </fieldset>					
					</div>
				</div>
				<div class="row">
					<div class="col-<?php echo $grid;?>-5">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-6"><b style="color: #00008B">เลขประจำตัวประชาชน / เลขหนังสือเดินทาง</b></label>							
								<div class="col-<?php echo $grid;?>-6">
									<div class="input-group">
										<input type="text" name="IDCard"  class="form-control" placeholder="เลขประจำตัวประชาชน/เลขหนังสือเดินทาง" size="100"  maxlength="13"  readonly="readonly" required="required" value="<?php echo $copy_Identification;?>">
									</div>
								</div>
							</div>
                        </fieldset>
					</div>
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-5"><b style="color: #00008B">วัน/เดือน/ปี เกิด ค.ศ.</b></label>
								<div class="col-<?php echo $grid;?>-7">
									<div class="input-group">
										<input type="text"  name="stu_birth"  class="pickadate-accessibility form-control" placeholder="คลิกเลือก วัน/เดือน/ปี เกิด" size="30"  readonly="readonly" required="required" value="<?php echo datethai2($rc_student_admissionRow["stu_birth"]);?>">
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
										<select name="stu_blood"  data-placeholder="กรุ๊ปเลือด..." class="select" required="required">
						<?php
							if($rc_student_admissionRow["stu_blood"]=="A"){ ?>
											<option></option>
											<optgroup label="กรุ๊ปเลือด">
												<option value="A" selected="selected">กรุ๊ปเลือด A</option>
												<option value="B">กรุ๊ปเลือด B</option>
												<option value="O">กรุ๊ปเลือด O</option>
												<option value="AB">กรุ๊ปเลือด AB</option>
											</optgroup>								
					<?php		}elseif($rc_student_admissionRow["stu_blood"]=="B"){ ?>
											<option></option>
											<optgroup label="กรุ๊ปเลือด">
												<option value="A">กรุ๊ปเลือด A</option>
												<option value="B" selected="selected">กรุ๊ปเลือด B</option>
												<option value="O">กรุ๊ปเลือด O</option>
												<option value="AB">กรุ๊ปเลือด AB</option>
											</optgroup>								
					<?php		}elseif($rc_student_admissionRow["stu_blood"]=="O"){ ?>
											<option></option>
											<optgroup label="กรุ๊ปเลือด">
												<option value="A">กรุ๊ปเลือด A</option>
												<option value="B">กรุ๊ปเลือด B</option>
												<option value="O" selected="selected">กรุ๊ปเลือด O</option>
												<option value="AB">กรุ๊ปเลือด AB</option>
											</optgroup>								
					<?php		}elseif($rc_student_admissionRow["stu_blood"]=="AB"){ ?>
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
								<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">เชื้อชาติ</b></label>
								<div class="col-<?php echo $grid;?>-8">
									<div class="form-group">
										<select name="stu_nation"  data-placeholder="เชื้อชาติ..." class="select-size-<?php echo $grid;?>" required="required">
											<option></option>
											<optgroup label="เชื้อชาติ">
						<?php
								if($rc_student_admissionRow["stu_nation"]=="188"){ ?>
												<option value="188" selected="selected">ไทย / Thailand</option>
						<?php	}else{ ?>
												<option value="188">ไทย / Thailand</option>
						<?php	}      ?>				
						
							<?php
								$stusun_stu="SELECT `id`,`country_name_th`,`country_name_en` FROM `db_country`where `id`!='188' order by convert ( `country_name_th` using tis620) asc";
								$stusun_sturs=new row_datastu($stusun_stu);
								foreach($stusun_sturs->datastu_array as $rc_key=>$stusun_sturow){ 
									if($rc_student_admissionRow["stu_nation"]==$stusun_sturow["id"]){
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
										<select name="stu_sun"  data-placeholder="สัญชาติ..." class="select-size-<?php echo $grid;?>" required="required">
											<option></option>
											<optgroup label="สัญชาติ">

						<?php
								if($rc_student_admissionRow["stu_sun"]=="188"){ ?>
												<option value="188" selected="selected">ไทย / Thailand</option>
						<?php	}else{ ?>
												<option value="188">ไทย / Thailand</option>
						<?php	}      ?>				
						
							<?php
								$stusun_stu="SELECT `id`,`country_name_th`,`country_name_en` FROM `db_country`where `id`!='188' order by convert ( `country_name_th` using tis620) asc";
								$stusun_sturs=new row_datastu($stusun_stu);
								foreach($stusun_sturs->datastu_array as $rc_key=>$stusun_sturow){ 
									if($rc_student_admissionRow["stu_sun"]==$stusun_sturow["id"]){
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
										<select name="IDReligion"  data-placeholder="ศาสนา..." class="select" required="required">
											<option></option>
											<optgroup label="ศาสนา">
							<?php
								$ReligionSql="SELECT `IDReligion`,`Religion` FROM `rc_religion`";
								$Religion=new row_datastu($ReligionSql);
								foreach($Religion->datastu_array as $rc_key=>$Religion_print){ 
								if($rc_student_admissionRow["IDReligion"]==$Religion_print["IDReligion"]){
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
										<input type="text" name="stu_tel"  class="form-control" placeholder="เบอร์โทรศัทพ์..." size="100" value="<?php echo $rc_student_admissionRow["stu_tel"]?>" maxlength="10" >
									</div>
								</div>
							</div>
                        </fieldset>					
					</div>
				</div>				  
				  
				  </div>
				</div>				
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading">ข้อมูลที่อยู่ ที่สามารถติดต่อได้</div>
					<div class="panel-body">
				  
						<div class="row">
							<div class="col-<?php echo $grid;?>-3">
								<fieldset class="content-group">
									<div class="form-group">
										<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">บ้านเลขที่</b></label>
										<div class="col-<?php echo $grid;?>-8">
											<div class="input-group">
												<input type="text" name="stu_hno" id="stu_hno" class="form-control" placeholder="บ้านเลขที่" size="100" maxlength="100" value="<?php echo $rc_student_admissionRow["stu_hno"];?>">
											</div>
										</div>
									</div>
								</fieldset>						
							</div>
							<div class="col-<?php echo $grid;?>-3">
								<fieldset class="content-group">
									<div class="form-group">
										<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">หมู่ที่</b></label>
										<div class="col-<?php echo $grid;?>-9">
											<div class="input-group">
												<input type="text" class="form-control" name="stu_moo" id="stu_moo" placeholder="หมู่ที่" size="100" maxlength="100" value="<?php echo $rc_student_admissionRow["stu_moo"];?>">
											</div>
										</div>
									</div>
								</fieldset>						
							</div>
							<div class="col-<?php echo $grid;?>-3">
								<fieldset class="content-group">
									<div class="form-group">
										<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">ซอย</b></label>
										<div class="col-<?php echo $grid;?>-9">
											<div class="input-group">
												<input type="text" class="form-control" name="stu_soi" id="stu_soi" placeholder="ซอย" size="100" maxlength="100" value="<?php echo $rc_student_admissionRow["stu_soi"];?>">
											</div>
										</div>
									</div>
								</fieldset>						
							</div>
							<div class="col-<?php echo $grid;?>-3">
								<fieldset class="content-group">
									<div class="form-group">
										<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">ถนน</b></label>
										<div class="col-<?php echo $grid;?>-10">
											<div class="input-group">
												<input type="text" class="form-control" name="stu_road" id="stu_road" placeholder="ถนน" size="100" maxlength="100" value="<?php echo $rc_student_admissionRow["stu_road"];?>">
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
												if($rc_student_admissionRow["stu_province"]==$provincesRow["PROVINCE_ID"]){
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
										$amphuresSql="SELECT `AMPHUR_ID`,`AMPHUR_NAME`,`AMPHUR_NAME_ENG` FROM `amphures` WHERE `PROVINCE_ID`='{$rc_student_admissionRow["stu_province"]}'";
										$amphuresRs=new row_datastu($amphuresSql);
										foreach($amphuresRs->datastu_array as $rc_key=>$amphuresRow){ 
										if($rc_student_admissionRow["stu_amphur"]==$amphuresRow["AMPHUR_ID"]){
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
											$districtsSql="SELECT `DISTRICT_ID`,`DISTRICT_NAME`,`DISTRICT_NAME_ENG` FROM `districts` WHERE `AMPHUR_ID`='{$rc_student_admissionRow["stu_amphur"]}';";
											$districts=new row_datastu($districtsSql);
											foreach($districts->datastu_array as $rc_key=>$districts_print){ 
												if($rc_student_admissionRow["stu_tumbon"]==$districts_print["DISTRICT_ID"]){
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
												<div id="stu_zipcode"><input type="text" name="stu_zipcode" id="stu_zipcodecopy" class="form-control" readonly="readonly" placeholder="รหัสไปรษณีย์" size="100" maxlength="6" value="<?php echo $rc_student_admissionRow["stu_zipcode"];?>"></div>
											</div>
										</div>
									</div>
								</fieldset>						
							</div>
						</div>							  
				  
				  
					</div>
				</div>				
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-info">
				  <div class="panel-heading">ข้อมูลบิดา</div>
				  <div class="panel-body">
					<div class="row">
						<div class="col-<?php echo $grid;?>-4">
							<fieldset class="content-group">
								<div class="form-group">
									<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">คำนำหน้า</b></label>
									<div class="col-<?php echo $grid;?>-9">
								<select name="father_prefix" id="father_prefix" data-placeholder="คำนำหน้าภาษาไทย.." class="select-size-<?php echo $grid;?>">
									<option></option>
									<optgroup label="คำนำหน้า..">
						<?php
							$npthailSql="SELECT `IDPrefix`,`prefixname`,`prefix_SName` 
										 FROM `rc_prefix` 
										 WHERE `IDPrefix`!='1' and `IDPrefix`!='2' and `IDPrefix`!='4' and `IDPrefix`!='5' and `IDPrefix`!='7'and `IDPrefix`!='8'and `IDPrefix`!='9'";
							$npthail=new row_datastu($npthailSql);
							foreach($npthail->datastu_array as $rc_key=>$npthailRow){
								if($rc_student_family_admissionRow["father_prefix"]==$npthailRow["IDPrefix"]){
									$fp_selected="selected";
								}else{
									$fp_selected="";
								}

								?>
										<option value="<?php echo $npthailRow["IDPrefix"]?>" <?php echo $fp_selected;?>><?php echo $npthailRow["prefixname"]?></option>
										
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
									<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">ชื่อ </b></label>							
									<div class="col-<?php echo $grid;?>-10">
										<div class="input-group">
											<input type="text" class="form-control" name="father_fname" id="father_fname" value="<?php echo $rc_student_family_admissionRow["father_fname"]?>" placeholder="ชื่อ (ภาษาไทย)" size="100" maxlength="100">
										</div>
									</div>
								</div>
							</fieldset>
						</div>
						<div class="col-<?php echo $grid;?>-4">
							<fieldset class="content-group">
								<div class="form-group">
									<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">นามสกุล </b></label>
									<div class="col-<?php echo $grid;?>-9">
										<div class="input-group">
											<input type="text" class="form-control" placeholder="นามสกุล (ภาษาไทย)" size="100" name="father_sname"   value="<?php echo $rc_student_family_admissionRow["father_sname"]?>" maxlength="100">
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
								<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">คำนำหน้า</b></label>
								<div class="col-<?php echo $grid;?>-9">
									<select name="father_prefix_en" id="father_prefix_en"  data-placeholder="คำนำหน้า (ภาษาอังกฤษ)" class="select-size-<?php echo $grid;?>">
										<option></option>
										<optgroup label="คำนำหน้า (ภาษาไทย)">
													
							<?php
								$npenSql="SELECT `IDPrefix`,`prefixname`,`prefix_SName` 
											 FROM `rc_prefix` 
											 WHERE `IDPrefix`='7'";
								$npen=new row_datastu($npenSql);
								foreach($npen->datastu_array as $rc_key=>$npenRow){
									if($rc_student_family_admissionRow["father_prefix_en"]==$npenRow["IDPrefix"]){
										$fpe_selected="selected";
									}else{
										$fpe_selected="";
									}
									?>
											<option value="<?php echo $npenRow["IDPrefix"]?>"<?php echo $fpe_selected;?>><?php echo $npenRow["prefixname"]?></option>
											
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
								<label class="control-label col-<?php echo $grid;?>-5"><b style="color: #00008B">ชื่อ (ภาษาอังกฤษ)</b></label>							
								<div class="col-<?php echo $grid;?>-7">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="ชื่อ  (ภาษาอังกฤษ)" size="100" name="father_fname_en" id="father_fname_en" value="<?php echo $rc_student_family_admissionRow["father_fname_en"];?>" maxlength="100">
									</div>
								</div>
							</div>
                        </fieldset>
					</div>
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-6"><b style="color: #00008B">นามสกุล (ภาษาอังกฤษ)</b></label>
								<div class="col-<?php echo $grid;?>-6">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="นามสกุล  (ภาษาอังกฤษ)" size="100" name="father_sname_en" id="father_sname_en" value="<?php echo $rc_student_family_admissionRow["father_sname_en"];?>" maxlength="100">
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
								<label class="control-label col-<?php echo $grid;?>-5"><b style="color: #00008B">เลขประจำตัวประชาชน / เลขหนังสือเดินทาง </b></label>							
								<div class="col-<?php echo $grid;?>-7">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="เลขประจำตัวประชาชน / เลขหนังสือเดินทาง" size="100" name="father_code"  value="<?php echo $rc_student_family_admissionRow["father_code"];?>" maxlength="13">
									</div>
								</div>
							</div>
                        </fieldset>
					</div>
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">เบอร์โทรศัทพ์ </b></label>							
								<div class="col-<?php echo $grid;?>-8">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="เบอร์โทรศัทพ์" size="100" name="father_tel" value="<?php echo $rc_student_family_admissionRow["father_tel"];?>"  maxlength="10" >
									</div>
								</div>
							</div>
                        </fieldset>					
					</div>
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">อีเมล </b></label>							
								<div class="col-<?php echo $grid;?>-10">
									<div class="input-group">
										<input type="email" class="form-control" placeholder="อีเมล" size="100" name="father_email" value="<?php echo $rc_student_family_admissionRow["father_email"];?>" maxlength="100" >
									</div>
								</div>
							</div>
                        </fieldset>					
					</div>					
				</div>
					
					
				  </div>
				</div>				
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-info">
				  <div class="panel-heading">ข้อมูลมารดา</div>
				  <div class="panel-body">
						<div class="row">
							<div class="col-<?php echo $grid;?>-4">
								<fieldset class="content-group">
									<div class="form-group">
										<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">คำนำหน้า</b></label>
										<div class="col-<?php echo $grid;?>-9">
									<select name="mother_prefix" id="father_prefix" data-placeholder="คำนำหน้าภาษาไทย.." class="select-size-<?php echo $grid;?>">
										<option></option>
										<optgroup label="คำนำหน้า..">
							<?php
								$npthailSql="SELECT `IDPrefix`,`prefixname`,`prefix_SName` 
											 FROM `rc_prefix` 
											 WHERE `IDPrefix`!='1' and `IDPrefix`!='2' and `IDPrefix`!='3' and `IDPrefix`!='7' and `IDPrefix`!='8'and `IDPrefix`!='9'";
								$npthail=new row_datastu($npthailSql);
								foreach($npthail->datastu_array as $rc_key=>$npthailRow){
										if($rc_student_family_admissionRow["mother_prefix"]==$npthailRow["IDPrefix"]){
											$mp_selected="selected";
										}else{
											$mp_selected="";
										}
								?>
											<option value="<?php echo $npthailRow["IDPrefix"]?>" <?php echo $mp_selected;?>><?php echo $npthailRow["prefixname"]?></option>
											
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
										<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">ชื่อ </b></label>							
										<div class="col-<?php echo $grid;?>-10">
											<div class="input-group">
												<input type="text" class="form-control" name="mother_fname" id="father_fname" value="<?php echo $rc_student_family_admissionRow["mother_fname"]?>" placeholder="ชื่อ (ภาษาไทย)" size="100" maxlength="100">
											</div>
										</div>
									</div>
								</fieldset>
							</div>
							<div class="col-<?php echo $grid;?>-4">
								<fieldset class="content-group">
									<div class="form-group">
										<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">นามสกุล </b></label>
										<div class="col-<?php echo $grid;?>-9">
											<div class="input-group">
												<input type="text" class="form-control" placeholder="นามสกุล (ภาษาไทย)" size="100" name="mother_sname"  id="father_sname" value="<?php echo $rc_student_family_admissionRow["mother_sname"]?>" maxlength="100">
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
									<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">คำนำหน้า</b></label>
									<div class="col-<?php echo $grid;?>-9">
										<select name="mother_prefix_en" id="father_prefix_en"  data-placeholder="คำนำหน้า (ภาษาอังกฤษ)" class="select-size-<?php echo $grid;?>">
											<option></option>
											<optgroup label="คำนำหน้า (ภาษาไทย)">
														
							<?php
								$npenSql="SELECT `IDPrefix`,`prefixname`,`prefix_SName` 
											 FROM `rc_prefix` 
											 WHERE `IDPrefix`='8' or `IDPrefix`='9'";
								$npen=new row_datastu($npenSql);
								foreach($npen->datastu_array as $rc_key=>$npenRow){
										if($rc_student_family_admissionRow["mother_prefix_en"]==$npenRow["IDPrefix"]){
											$mpe_selected="selected";
										}else{
											$mpe_selected="";
										}
									?>
											<option value="<?php echo $npenRow["IDPrefix"]?>"<?php echo $mpe_selected;?>><?php echo $npenRow["prefixname"]?></option>
											
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
									<label class="control-label col-<?php echo $grid;?>-5"><b style="color: #00008B">ชื่อ (ภาษาอังกฤษ)</b></label>							
									<div class="col-<?php echo $grid;?>-7">
										<div class="input-group">
											<input type="text" class="form-control" placeholder="ชื่อ  (ภาษาอังกฤษ)" size="100" name="mother_fname_en" id="father_fname_en" value="<?php echo $rc_student_family_admissionRow["mother_fname_en"];?>" maxlength="100">
										</div>
									</div>
								</div>
							</fieldset>
						</div>
						<div class="col-<?php echo $grid;?>-4">
							<fieldset class="content-group">
								<div class="form-group">
									<label class="control-label col-<?php echo $grid;?>-6"><b style="color: #00008B">นามสกุล (ภาษาอังกฤษ)</b></label>
									<div class="col-<?php echo $grid;?>-6">
										<div class="input-group">
											<input type="text" class="form-control" placeholder="นามสกุล  (ภาษาอังกฤษ)" size="100" name="mother_sname_en" id="father_sname_en" value="<?php echo $rc_student_family_admissionRow["mother_sname_en"];?>" maxlength="100">
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
									<label class="control-label col-<?php echo $grid;?>-5"><b style="color: #00008B">เลขประจำตัวประชาชน / เลขหนังสือเดินทาง </b></label>							
									<div class="col-<?php echo $grid;?>-7">
										<div class="input-group">
											<input type="text" class="form-control" placeholder="เลขประจำตัวประชาชน / เลขหนังสือเดินทาง" size="100" name="mother_code" value="<?php echo $rc_student_family_admissionRow["mother_code"];?>" maxlength="13">
										</div>
									</div>
								</div>
							</fieldset>
						</div>
						<div class="col-<?php echo $grid;?>-4">
							<fieldset class="content-group">
								<div class="form-group">
									<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">เบอร์โทรศัทพ์ </b></label>							
									<div class="col-<?php echo $grid;?>-8">
										<div class="input-group">
											<input type="text" class="form-control" placeholder="เบอร์โทรศัทพ์" size="100" name="mother_tel"  value="<?php echo $rc_student_family_admissionRow["mother_tel"];?>" maxlength="10" >
										</div>
									</div>
								</div>
							</fieldset>					
						</div>
						<div class="col-<?php echo $grid;?>-4">
							<fieldset class="content-group">
								<div class="form-group">
									<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">อีเมล </b></label>							
									<div class="col-<?php echo $grid;?>-10">
										<div class="input-group">
											<input type="email" class="form-control" placeholder="อีเมล" size="100" name="mother_email" value="<?php echo $rc_student_family_admissionRow["mother_email"];?>" maxlength="100" >
										</div>
									</div>
								</div>
							</fieldset>					
						</div>					
					</div>				  
				  </div>
				</div>				
			</div>
		</div>		
		
		<div class="row">
			<div class="col-md-12">		
				<div class="panel panel-info">
					<div class="panel-heading">ข้อมูลผู้ปกครอง</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-<?php echo $grid;?>-4">
								<fieldset class="content-group">
									<div class="form-group">
										<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">คำนำหน้า</b></label>
										<div class="col-<?php echo $grid;?>-9">
									<select name="parent_prefix" id="father_prefix" data-placeholder="คำนำหน้าภาษาไทย.." class="select-size-<?php echo $grid;?>">
										<option></option>
										<optgroup label="คำนำหน้า..">
							<?php
								$npthailSql="SELECT `IDPrefix`,`prefixname`,`prefix_SName` 
											 FROM `rc_prefix` 
											 WHERE `IDPrefix`!='1' and `IDPrefix`!='2' and `IDPrefix`!='7' and `IDPrefix`!='8' and `IDPrefix`!='9' and `IDPrefix`!='10' ";
								$npthail=new row_datastu($npthailSql);
								foreach($npthail->datastu_array as $rc_key=>$npthailRow){
										if($rc_student_family_admissionRow["parent_prefix"]==$npthailRow["IDPrefix"]){
											$mp_selected="selected";
										}else{
											$mp_selected="";
										}
								?>
											<option value="<?php echo $npthailRow["IDPrefix"]?>" <?php echo $mp_selected;?>><?php echo $npthailRow["prefixname"]?></option>
											
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
										<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">ชื่อ </b></label>							
										<div class="col-<?php echo $grid;?>-10">
											<div class="input-group">
												<input type="text" class="form-control" name="parent_fname" id="father_fname" value="<?php echo $rc_student_family_admissionRow["parent_fname"]?>" placeholder="ชื่อ (ภาษาไทย)" size="100" maxlength="100">
											</div>
										</div>
									</div>
								</fieldset>
							</div>
							<div class="col-<?php echo $grid;?>-4">
								<fieldset class="content-group">
									<div class="form-group">
										<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">นามสกุล </b></label>
										<div class="col-<?php echo $grid;?>-9">
											<div class="input-group">
												<input type="text" class="form-control" placeholder="นามสกุล (ภาษาไทย)" size="100" name="parent_sname"  id="father_sname" value="<?php echo $rc_student_family_admissionRow["parent_sname"]?>" maxlength="100">
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
									<label class="control-label col-<?php echo $grid;?>-3"><b style="color: #00008B">คำนำหน้า</b></label>
									<div class="col-<?php echo $grid;?>-9">
										<select name="parent_prefix_en" id="father_prefix_en"  data-placeholder="คำนำหน้า (ภาษาอังกฤษ)" class="select-size-<?php echo $grid;?>">
											<option></option>
											<optgroup label="คำนำหน้า (ภาษาไทย)">
														
							<?php
								$npenSql="SELECT `IDPrefix`,`prefixname`,`prefix_SName` 
											 FROM `rc_prefix` 
											 WHERE `IDPrefix`='7' or `IDPrefix`='8' or `IDPrefix`='9' or `IDPrefix`='10'";
								$npen=new row_datastu($npenSql);
								foreach($npen->datastu_array as $rc_key=>$npenRow){
										if($rc_student_family_admissionRow["parent_prefix_en"]==$npenRow["IDPrefix"]){
											$mpe_selected="selected";
										}else{
											$mpe_selected="";
										}
									?>
											<option value="<?php echo $npenRow["IDPrefix"]?>"<?php echo $mpe_selected;?>><?php echo $npenRow["prefixname"]?></option>
											
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
									<label class="control-label col-<?php echo $grid;?>-5"><b style="color: #00008B">ชื่อ (ภาษาอังกฤษ)</b></label>							
									<div class="col-<?php echo $grid;?>-7">
										<div class="input-group">
											<input type="text" class="form-control" placeholder="ชื่อ  (ภาษาอังกฤษ)" size="100" name="parent_fname_en" id="father_fname_en" value="<?php echo $rc_student_family_admissionRow["mother_fname_en"];?>" maxlength="100">
										</div>
									</div>
								</div>
							</fieldset>
						</div>
						<div class="col-<?php echo $grid;?>-4">
							<fieldset class="content-group">
								<div class="form-group">
									<label class="control-label col-<?php echo $grid;?>-6"><b style="color: #00008B">นามสกุล (ภาษาอังกฤษ)</b></label>
									<div class="col-<?php echo $grid;?>-6">
										<div class="input-group">
											<input type="text" class="form-control" placeholder="นามสกุล  (ภาษาอังกฤษ)" size="100" name="parent_sname_en" id="father_sname_en" value="<?php echo $rc_student_family_admissionRow["mother_sname_en"];?>" maxlength="100">
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
									<label class="control-label col-<?php echo $grid;?>-5"><b style="color: #00008B">เลขประจำตัวประชาชน / เลขหนังสือเดินทาง </b></label>							
									<div class="col-<?php echo $grid;?>-7">
										<div class="input-group">
											<input type="text" class="form-control" placeholder="เลขประจำตัวประชาชน / เลขหนังสือเดินทาง" size="100" name="parent_code" value="<?php echo $rc_student_family_admissionRow["parent_code"];?>" maxlength="13">
										</div>
									</div>
								</div>
							</fieldset>
						</div>
						<div class="col-<?php echo $grid;?>-4">
							<fieldset class="content-group">
								<div class="form-group">
									<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">เบอร์โทรศัทพ์ </b></label>							
									<div class="col-<?php echo $grid;?>-8">
										<div class="input-group">
											<input type="text" class="form-control" placeholder="เบอร์โทรศัทพ์" size="100" name="parent_phone"  value="<?php echo $rc_student_family_admissionRow["parent_phone"];?>" maxlength="10" >
										</div>
									</div>
								</div>
							</fieldset>					
						</div>
						<div class="col-<?php echo $grid;?>-4">
							<fieldset class="content-group">
								<div class="form-group">
									<label class="control-label col-<?php echo $grid;?>-2"><b style="color: #00008B">อีเมล </b></label>							
									<div class="col-<?php echo $grid;?>-10">
										<div class="input-group">
											<input type="email" class="form-control" placeholder="อีเมล" size="100" name="parent_email" value="<?php echo $rc_student_family_admissionRow["parent_email"];?>" maxlength="100" >
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
									<label class="control-label col-<?php echo $grid;?>-4"><b style="color: #00008B">ความสัมพันธ์</b></label>							
									<div class="col-<?php echo $grid;?>-8">
									<select name="parent_stu" id="parent_stu" data-placeholder="ความสัมพันธ์.." class="select-size-<?php echo $grid;?>">
										<option></option>
										<optgroup label="ความสัมพันธ์..">
							<?php
								$data_relySql="SELECT `dr_key`,`dr_txt`FROM `data_rely` WHERE `dr_key` !=1 and `dr_key` !=5";
								$data_relyRs=new row_datastu($data_relySql);
								foreach($data_relyRs->datastu_array as $admin=>$data_relyRow){ 
									if($rc_student_family_admissionRow["parent_stu"]==$data_relyRow["dr_txt"]){
										$parent_selected="selected";
									}else{
										$parent_selected="";
									}
								?>
									
								<option value="<?php echo $data_relyRow["dr_txt"]?>" <?php echo $parent_selected;?>><?php echo $data_relyRow["dr_txt"]?></option>
									
							<?php	}  ?>
					
										</optgroup>
									</select>
									</div>
								</div>
							</fieldset>					
						</div>					
					</div>
					
					</div>
				</div>
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading">ข้อมูลการศึกษา</div>
					<div class="panel-body">
				  
				<div class="row">
				
				
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-5"><b style="color: #00008B">ชั้นเรียนสุดท้ายก่อนสมัครเรียน โรงเรียนเรยีนา</b>
								<p style="color: #ff6600">(ตัวอย่าง เข้าเรียนชั้น อ.3 ชั้นเรียนสุดท้ายก่อนโรงเรียน คือ ชั้น อ.2 )</p>								
								</label>

								<div class="col-<?php echo $grid;?>-7">
									<select  data-placeholder="ระดับชั้น..." class="select-size-<?php echo $grid;?>" name="ds_OriginalClass" >
											<option></option>
					<?php
							if($$rc_student_levelRow["ds_OriginalClass"]==2 or $copy_level==3){ ?>
	<!--************************************************************************************-->	
											<optgroup label="อนุบาล">
												<option value="2"  selected>อนุบาล 2</option>
												<option value="3">อนุบาล 3</option>
											</optgroup>
											<optgroup label="ประถมศึกษา">
													<option value="23">ประถมศึกษาปีที่ 6</option>
											</optgroup>
											<optgroup label="มัธยมศึกษาตอนต้น">
													<option value="33">มัธยมศึกษาปีที่ 3</option>
											</optgroup>															
	<!--************************************************************************************-->						
				<?php		}elseif($$rc_student_levelRow["ds_OriginalClass"]==3 or $copy_level==11){ ?>
	<!--************************************************************************************-->	
											<optgroup label="อนุบาล">
												<option value="2">อนุบาล 2</option>
												<option value="3"  selected>อนุบาล 3</option>
											</optgroup>
											<optgroup label="ประถมศึกษา">
													<option value="23">ประถมศึกษาปีที่ 6</option>
											</optgroup>
											<optgroup label="มัธยมศึกษาตอนต้น">
													<option value="33">มัธยมศึกษาปีที่ 3</option>
											</optgroup>															
	<!--************************************************************************************-->						
				<?php		}elseif($$rc_student_levelRow["ds_OriginalClass"]==23 or $copy_level==31){ ?>
	<!--************************************************************************************-->	
											<optgroup label="อนุบาล">
												<option value="2">อนุบาล 2</option>
												<option value="3">อนุบาล 3</option>
											</optgroup>
											<optgroup label="ประถมศึกษา">
													<option value="23"  selected>ประถมศึกษาปีที่ 6</option>
											</optgroup>
											<optgroup label="มัธยมศึกษาตอนต้น">
													<option value="33">มัธยมศึกษาปีที่ 3</option>
											</optgroup>															
	<!--************************************************************************************-->							 
				<?php		}elseif($$rc_student_levelRow["ds_OriginalClass"]==31 or $copy_level==41){ ?>
	<!--************************************************************************************-->	
											<optgroup label="อนุบาล">
												<option value="2">อนุบาล 2</option>
												<option value="3">อนุบาล 3</option>
											</optgroup>
											<optgroup label="ประถมศึกษา">
													<option value="23">ประถมศึกษาปีที่ 6</option>
											</optgroup>
											<optgroup label="มัธยมศึกษาตอนต้น">
													<option value="33" selected>มัธยมศึกษาปีที่ 3</option>
											</optgroup>															
	<!--************************************************************************************-->							
				<?php		}else{ ?>
	<!--************************************************************************************-->	
											<optgroup label="อนุบาล">
												<option value="2">อนุบาล 2</option>
												<option value="3">อนุบาล 3</option>
											</optgroup>
											<optgroup label="ประถมศึกษา">
													<option value="23">ประถมศึกษาปีที่ 6</option>
											</optgroup>
											<optgroup label="มัธยมศึกษาตอนต้น">
													<option value="33">มัธยมศึกษาปีที่ 3</option>
											</optgroup>															
	<!--************************************************************************************-->						
				<?php	}      ?>					
					

									</select>

								</div>
							</div>
                        </fieldset>						

					</div>				
					<div class="col-<?php echo $grid;?>-4">
						<fieldset class="content-group">
							<div class="form-group">
								<label class="control-label col-<?php echo $grid;?>-5"><b style="color: #00008B">ชื่อโรงเรียนเดิมที่จบการศึกษา</b></label>
									<div class="col-<?php echo $grid;?>-7">
										<div class="input-group">
											<input type="text" name="stu_oldsch"  class="form-control" placeholder="ชื่อโรงเรียนเดิมที่จบการศึกษา" size="100" maxlength="100" value="<?php echo $rc_student_levelRow["stu_oldsch"];?>">
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
												<select data-placeholder="จังหวัด..." class="select-size-<?php echo $grid;?>"   name="stu_schprovince">
													<option></option>
													<optgroup label="จังหวัด">
													
										<?php
											$data_provinces="SELECT `PROVINCE_ID`,`PROVINCE_NAME`,`PROVINCE_NAME_ENG` FROM `provinces` order by convert ( `PROVINCE_NAME` using tis620) asc";
											$txt_provinces=new row_datastu($data_provinces);
											foreach($txt_provinces->datastu_array as $rc_key=>$provincesRow){
												if($rc_student_levelRow["stu_schprovince"]==$provincesRow["PROVINCE_NAME"]){
													$pr_selected="selected";
												}else{
													$pr_selected="";
												}
												?>
											
														<option value="<?php echo $provincesRow["PROVINCE_NAME"];?>" <?php echo $pr_selected;?>><?php echo $provincesRow["PROVINCE_NAME"]." / ".$provincesRow["PROVINCE_NAME_ENG"];?></option>
										<?php	} ?>			 
													</optgroup>
												</select>
										</div>
									</div>
								</fieldset>						
					
					</div>	
				</div>				 
				  
	<?php
		if($copy_level==41){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->		
	<div class="row">
		<div class="col-<?php echo $grid;?>-4">
							<fieldset class="content-group">
								<div class="form-group">
									<label class="control-label col-<?php echo $grid;?>-6"><b style="color: #00008B">GPA (เกรดเฉลี่ยสะสม)</b></label>							
									<div class="col-<?php echo $grid;?>-6">
										<div class="input-group">
											<input type="text" class="form-control" name="stu_avg"  value="<?php echo $rc_student_levelRow["stu_avg"];?>" placeholder="x.xx" size="100" maxlength="4">
										</div>
									</div>
								</div>
							</fieldset>		
		</div>
		<div class="col-<?php echo $grid;?>-4">
							<fieldset class="content-group">
								<div class="form-group">
									<label class="control-label col-<?php echo $grid;?>-5"><b style="color: #00008B">แผนการเรียน  อันดับ 1</b></label>							
									<div class="col-<?php echo $grid;?>-7">
										<select name="plan_idA" class="select">
											<option value="">แผนการเรียน  อันดับ 1</option>
									<?php
										$stu_plan1Sql="SELECT `IDPlan`,`Name`,`LName` FROM `rc_plan` WHERE `IDPlan`!='1' and `IDPlan`!='2' and `IDPlan`!='0'";
										$stu_plan1Rs=new row_admission($stu_plan1Sql);
										foreach($stu_plan1Rs->row_admission_print() as $admission_key=>$stu_plan1Row){

											if($rc_student_levelRow["stu_plan1"]==$stu_plan1Row["IDPlan"]){
												$selected_plan1="selected";
											}else{
												$selected_plan1="";
											}

											?>
											<option value="<?php echo $stu_plan1Row["IDPlan"];?>" <?php echo $selected_plan1;?>><?php echo $stu_plan1Row["LName"];?></option>
									<?php	}?>
											
											
											
											
											
											
										</select>
									</div>
								</div>
							</fieldset>		
		</div>
		<div class="col-<?php echo $grid;?>-4">
							<fieldset class="content-group">
								<div class="form-group">
									<label class="control-label col-<?php echo $grid;?>-5"><b style="color: #00008B">แผนการเรียน  อันดับ 2</b></label>							
									<div class="col-<?php echo $grid;?>-7">
										<select name="plan_idB" class="select">
											<option value="">แผนการเรียน  อันดับ 2</option>
									<?php
										$stu_plan2Sql="SELECT `IDPlan`,`Name`,`LName` FROM `rc_plan` WHERE `IDPlan`!='1' and `IDPlan`!='2' and `IDPlan`!='0'";
										$stu_plan2Rs=new row_admission($stu_plan1Sql);
										foreach($stu_plan2Rs->row_admission_print() as $admission_key=>$stu_plan2Row){ 
										
											if($rc_student_levelRow["stu_plan2"]==$stu_plan2Row["IDPlan"]){
												$selected_plan2="selected";
											}else{
												$selected_plan2="";
											}
										
										
										?>
											<option value="<?php echo $stu_plan2Row["IDPlan"];?>" <?php echo $selected_plan2;?>><?php echo $stu_plan2Row["LName"];?></option>
									<?php	} ?>
										</select>
									</div>
								</div>
							</fieldset>			
		
		</div>
	</div>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->		
	<?php	}else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->		
				<div class="row">

					<div class="col-<?php echo $grid;?>-3">
							<fieldset class="content-group">
								<div class="form-group">
									<label class="control-label col-<?php echo $grid;?>-6"><b style="color: #00008B">GPA (เกรดเฉลี่ยสะสม)</b></label>							
									<div class="col-<?php echo $grid;?>-6">
										<div class="input-group">
											<input type="text" class="form-control" name="stu_avg" value="<?php echo $rc_student_levelRow["stu_avg"];?>" placeholder="x.xx" size="100" maxlength="4">
										</div>
									</div>
								</div>
							</fieldset>
					</div>
					<div class="col-<?php echo $grid;?>-6">
							<fieldset class="content-group">
								<div class="form-group">
									<label class="control-label col-<?php echo $grid;?>-5"><b style="color: #00008B">ห้องเรียน / แผนการเรียน ประสงค์สมัครเรียน </b></label>							
									<div class="col-<?php echo $grid;?>-7">
										<div class="input-group">
											<input type="text" class="form-control"   value="<?php echo $txt_plan;?>" placeholder="ห้องเรียน / แผนการเรียน ประสงค์สมัครเรียน" size="100" maxlength="100" readonly="readonly" required="required">
										</div>
									</div>
								</div>
							</fieldset>					
					</div>
					
					
				</div>
<input type="hidden" name="txt_plan" value="<?php echo $txt_plan;?>">				
<input type="hidden" name="txt_level" value="<?php echo $txt_level;?>">
<input type="hidden" name="plan_idA" value="<?php echo $plan_idA;?>">				
<input type="hidden" name="plan_idB" value="<?php echo $plan_idB;?>">				
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->			
	<?php	}      ?>			  
				  
				  
				  
  
				  
				  
					</div>
				</div>				
			</div>
		</div>		
		
		<div class="row">
			<div class="col-<?php echo $grid;?>-12">
				<center><button type="submit" id="fontA" class="btn btn-success">ดำเนินการสมัคร</button></center>
			</div>
		</div>
<input type="hidden" name="copy_Identification" value="<?php echo $copy_Identification;?>">
<input type="hidden" name="copy_level" value="<?php echo $copy_level;?>">
</form>
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



<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->		
<?php	 }?>


