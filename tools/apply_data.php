<?php
	date_default_timezone_set('Asia/Bangkok');
	include("database/pdo_data.php");
	include("database/class_pdo.php");
	
	include("database/pdo_conndatastu.php");
	include("database/class_pdodatastu.php");
	
	include("database/pdo_admission.php");
	include("database/class_admission.php");
	
	
		function datethai($strDate){
	        $strYear = date("Y",strtotime($strDate))+543;
	        $strMonth= date("n",strtotime($strDate));
	        $strDay= date("j",strtotime($strDate));
	        $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
	        $strMonthThai=$strMonthCut[$strMonth];
	        return "$strDay $strMonthThai $strYear";
	    }
		
		function datethai2($strDate){
	        $strYear = date("Y",strtotime($strDate));
	        $strMonth= date("n",strtotime($strDate));
	        $strDay= date("j",strtotime($strDate));
	        $strMonthCut = Array("","01","02","03","04","05","07","08","09","10","11","12");
	        $strMonthThai=$strMonthCut[$strMonth];
	        return "$strYear-$strMonth-$strDay";
	    }
	
	
?>

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

<body class="col-<?php echo $grid;?>-12">

	<div class="page-container">
		<div class="page-content">

	<?php
		$copy_Identification=filter_input(INPUT_POST,'copy_Identification');
		$copy_level=filter_input(INPUT_POST,'copy_level');
			if($copy_Identification=="" and $copy_level==""){
				exit("<script>window.location='index.html';</script>");				
			}elseif($copy_Identification=="" or $copy_level==""){
				exit("<script>window.location='index.html';</script>");
			}else{ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<?php
		if($copy_level==3){
			$reg="650301";
		}elseif($copy_level==11){
			$reg="651101";
		}elseif($copy_level==31){
			$reg="653101";
		}elseif($copy_level==41){
			$reg="654101";
		}else{
			$reg="650001";
		}
		$count_admissionSql="SELECT `IDReg`,`IDCard`
						     FROM `rc_student_admission` 
							 WHERE `IDReg` 
							 LIKE '%{$reg}%' 
							 ORDER BY `rc_student_admission`.`IDReg` DESC";
		$count_admissionRs=new notrow_admission($count_admissionSql);
		foreach($count_admissionRs->notrow_admission_print() as $apply_key=>$count_admissionRow){
			$IDReg=$count_admissionRow["IDReg"];
			if($IDReg==""){
				$IDRegCopy=$reg."001";
			}else{
				$IDRegCopy=$IDReg+1;
			}
		}
//-----------------------------------------------------------------------------------------------
//call_hidden
	$txt_plan=filter_input(INPUT_POST,'txt_plan');
	$txt_level=filter_input(INPUT_POST,'txt_level');
	$plan_idA=filter_input(INPUT_POST,'plan_idA');
	$plan_idB=filter_input(INPUT_POST,'plan_idB');
//call_hidden


//rc_student_admission
	$stu_fname=filter_input(INPUT_POST,'stu_fname');
	$stu_sname=filter_input(INPUT_POST,'stu_sname');
	$stu_fname_e=filter_input(INPUT_POST,'stu_fname_e');
	$stu_sname_e=filter_input(INPUT_POST,'stu_sname_e');
	$nickTh=filter_input(INPUT_POST,'nickTh');
	$nickEn=filter_input(INPUT_POST,'nickEn');
	$stu_birth=filter_input(INPUT_POST,'stu_birth');
	$stu_blood=filter_input(INPUT_POST,'stu_blood');
	$stu_nation=filter_input(INPUT_POST,'stu_nation');
	$stu_sun=filter_input(INPUT_POST,'stu_sun');
	$IDReligion=filter_input(INPUT_POST,'IDReligion');
	$stu_hno=filter_input(INPUT_POST,'stu_hno');
	$stu_moo=filter_input(INPUT_POST,'stu_moo');
	$stu_soi=filter_input(INPUT_POST,'stu_soi');
	$stu_road=filter_input(INPUT_POST,'stu_road');
	$stu_tumbon=filter_input(INPUT_POST,'stu_tumbon');
	$stu_amphur=filter_input(INPUT_POST,'stu_amphur');
	$stu_province=filter_input(INPUT_POST,'stu_province');
	$stu_zipcode=filter_input(INPUT_POST,'stu_zipcode');
	$stu_tel=filter_input(INPUT_POST,'stu_tel');
//-----------------------------------------------------------------------------------------------
	$call_stu_birth=new birth_txt($stu_birth);
//-----------------------------------------------------------------------------------------------	
	if($call_stu_birth->wyear>=15){
		$stu_prefix=4;
	}else{
		$stu_prefix=2;
	}
	$stu_birth=datethai2($stu_birth);
//-----------------------------------------------------------------------------------------------	
	$countstudent_admissionSql="SELECT count(`IDReg`) as `count_admission` 
							    FROM `rc_student_admission` 
								WHERE `IDReg` LIKE '65%' and `IDCard`='{$copy_Identification}'";
	$countstudent_admissionRs=new notrow_admission($countstudent_admissionSql);
	foreach($countstudent_admissionRs->notrow_admission_print() as $apply_key=>$countstudent_admissionRow){
		$count_admission=$countstudent_admissionRow["count_admission"];
		if($count_admission>=1){
//************************************************************************************************			
			$call_admissionSql="SELECT `IDReg` as`copy_IDReg`
							    FROM `rc_student_admission` 
								WHERE `IDReg` LIKE '65%' and `IDCard`='{$copy_Identification}'";
			$call_admissionRs=new notrow_admission($call_admissionSql);
			foreach($call_admissionRs->notrow_admission_print() as $apply_key=>$call_admissionRow){
				$copy_IDReg=$call_admissionRow["copy_IDReg"];	
			}
//--------------------------------------------------------------------------------------------------		
			$up_studentAdmissionSql="UPDATE `rc_student_admission` SET `stu_prefix`='{$stu_prefix}',`stu_fname`='{$stu_fname}' ,`stu_sname`='{$stu_sname}',`stu_fname_e`='{$stu_fname_e}',`stu_sname_e`='{$stu_sname_e}',`nickTh`='{$nickTh}'
								   ,`nickEn`='{$nickEn}',`stu_birth`='{$stu_birth}',`stu_blood`='{$stu_blood}',`stu_nation`='{$stu_nation}',`stu_sun`='{$stu_sun}',`IDReligion`='{$IDReligion}',`stu_hno`='{$stu_hno}',`stu_moo`='{$stu_moo}'
								   ,`stu_soi`='{$stu_soi}',`stu_road`='{$stu_road}',`stu_tumbon`='{$stu_tumbon}',`stu_amphur`='{$stu_amphur}',`stu_province`='{$stu_province}',`stu_zipcode`='{$stu_zipcode}',`stu_tel`='{$stu_tel}',`stu_level`='{$copy_level}',`stu_plan`='{$plan_idA}' WHERE `IDReg`='{$copy_IDReg}'";
			$up_studentAdmissionRs=new insert_admission($up_studentAdmissionSql);
			if($up_studentAdmissionRs->into_insert_admission()=="yes"){
				//*****************************************************				
			}else{
				//*****************************************************				
			}
		}else{
			
			$into_studentAdmissionSql="INSERT INTO `rc_student_admission` (`IDReg`, `IDCard`, `stu_prefix`, `stu_fname`, `stu_sname`, `stu_fname_e`, `stu_sname_e`, `nickTh`, `nickEn`, `stu_birth`, `stu_birth_tumbon`, `stu_blood`, `stu_nation`, `stu_sun`, `IDReligion`, `stu_hno`, `stu_moo`, `stu_soi`, `stu_road`, `stu_tumbon`, `stu_amphur`, `stu_province`, `stu_zipcode`, `stu_tel`, `stu_level`, `stu_plan`, `stu_type`, `payment_status`, `time_update`) 
									   VALUES ('{$IDRegCopy}', '{$copy_Identification}', '{$stu_prefix}', '{$stu_fname}', '{$stu_sname}', '{$stu_fname_e}', '{$stu_sname_e}', '{$nickTh}', '{$nickEn}', '{$stu_birth}', NULL, '{$stu_blood}', '{$stu_nation}', '{$stu_sun}', '{$IDReligion}', '{$stu_hno}', '{$stu_moo}', '{$stu_soi}', '{$stu_road}', '{$stu_tumbon}', '{$stu_amphur}', '{$stu_province}', '{$stu_zipcode}', '{$stu_tel}', '{$copy_level}', '{$plan_idA}', 'gen', 'U', CURRENT_TIMESTAMP);";
			$into_studentAdmissionRs=new insert_admission($into_studentAdmissionSql);
			if($into_studentAdmissionRs->into_insert_admission()=="yes"){
				//*****************************************************				
			}else{
				//*****************************************************				
			}
				
		}
	}
//************************************************************************************************	
//rc_student_admission End
//-----------------------------------------------------------------------------------------------	
//rc_student_family_admission
			$father_prefix=filter_input(INPUT_POST,'father_prefix');	
			$father_fname=filter_input(INPUT_POST,'father_fname');	
			$father_sname=filter_input(INPUT_POST,'father_sname');	
			$father_prefix_en=filter_input(INPUT_POST,'father_prefix_en');
			$father_fname_en=filter_input(INPUT_POST,'father_fname_en');
			$father_sname_en=filter_input(INPUT_POST,'father_sname_en');
			$father_code=filter_input(INPUT_POST,'father_code');
			$father_tel=filter_input(INPUT_POST,'father_tel');
			$father_email=filter_input(INPUT_POST,'father_email');
		
			$mother_prefix=filter_input(INPUT_POST,'mother_prefix');	
			$mother_fname=filter_input(INPUT_POST,'mother_fname');	
			$mother_sname=filter_input(INPUT_POST,'mother_sname');	
			$mother_prefix_en=filter_input(INPUT_POST,'mother_prefix_en');
			$mother_fname_en=filter_input(INPUT_POST,'mother_fname_en');
			$mother_sname_en=filter_input(INPUT_POST,'mother_sname_en');	
			$mother_code=filter_input(INPUT_POST,'mother_code');
			$mother_tel=filter_input(INPUT_POST,'mother_tel');
			$mother_email=filter_input(INPUT_POST,'mother_email');
			
			$parent_prefix=filter_input(INPUT_POST,'parent_prefix');
			$parent_fname=filter_input(INPUT_POST,'parent_fname');
			$parent_sname=filter_input(INPUT_POST,'parent_sname');
			$parent_prefix_en=filter_input(INPUT_POST,'parent_prefix_en');
			$parent_fname_en=filter_input(INPUT_POST,'parent_fname_en');
			$parent_sname_en=filter_input(INPUT_POST,'parent_sname_en');
			$parent_code=filter_input(INPUT_POST,'parent_code');
			$parent_phone=filter_input(INPUT_POST,'parent_phone');
			$parent_email=filter_input(INPUT_POST,'parent_email');
			$parent_stu=filter_input(INPUT_POST,'parent_stu');	

	$countfamily_admissionSql="SELECT COUNT(`IDReg`) as `count_family` FROM `rc_student_family_admission` WHERE `IDReg`='{$copy_IDReg}';";
	$countfamily_admissionRs=new notrow_admission($countfamily_admissionSql);
	foreach($countfamily_admissionRs->notrow_admission_print()as $apply_key=>$countfamily_admissionRow){
		$count_family=$countfamily_admissionRow["count_family"];
		if($count_family>=1){

			$up_familyAdmissionSql="UPDATE `rc_student_family_admission` SET `father_prefix`='{$father_prefix}',`father_fname`='{$father_fname}',`father_sname`='{$father_sname}',`father_prefix_en`='{$father_prefix_en}',`father_fname_en`='{$father_fname_en}',`father_sname_en`='{$father_sname_en}'
								  ,`father_code`='{$father_code}',`father_tel`='{$father_tel}',`father_email`='{$father_email}',`mother_prefix`='{$mother_prefix}',`mother_fname`='{$mother_fname}',`mother_sname`='{$mother_sname}',`mother_prefix_en`='{$mother_prefix_en}',`mother_fname_en`='{$mother_fname_en}'
								  ,`mother_sname_en`='{$mother_sname_en}',`mother_code`='{$mother_code}',`mother_tel`='{$mother_tel}',`mother_email`='{$mother_email}'
								  ,`parent_prefix`='{$parent_prefix}',`parent_fname`='{$parent_fname}',`parent_sname`='{$parent_sname}',`parent_prefix_en`='{$parent_prefix_en}',`parent_fname_en`='{$parent_fname_en}',`parent_sname_en`='{$parent_sname_en}',`parent_code`='{$parent_code}',`parent_phone`='{$parent_phone}',`parent_email`='{$parent_email}',`parent_stu`='{$parent_stu}' WHERE `IDReg`='{$copy_IDReg}';";
			$up_familyAdmissionRs=new insert_admission($up_familyAdmissionSql);
			if($up_familyAdmissionRs->into_insert_admission()=="yes"){
				//*****************************************************				
			}else{
				//*****************************************************				
			}
		}else{
			$into_familyAdmissionSql="INSERT INTO `rc_student_family_admission` (`IDReg`, `father_prefix`, `father_fname`, `father_sname`, `father_prefix_en`, `father_fname_en`, `father_sname_en`, `father_code`, `father_career`, `father_careerOther`, `father_salary`, `father_workplace`, `father_wp_pro`, `father_wp_tel`, `father_phone`, `father_hno`, `father_moo`, `father_road`, `father_soi`, `father_tumbon`, `father_amphur`, `father_province`, `father_zipcode`, `father_tel`, `father_email`, `mother_prefix`, `mother_fname`, `mother_sname`, `mother_prefix_en`, `mother_fname_en`, `mother_sname_en`, `mother_code`, `mother_career`, `mother_careerOther`, `mother_salary`, `mother_workplace`, `mother_wp_pro`, `mother_wp_tel`, `mother_phone`, `mother_hno`, `mother_moo`, `mother_soi`, `mother_road`, `mother_tumbon`, `mother_amphur`, `mother_province`, `mother_zipcode`, `mother_tel`, `mother_email`, `parent_prefix`, `parent_fname`, `parent_sname`, `parent_prefix_en`, `parent_fname_en`, `parent_sname_en`, `parent_code`, `parent_phone`, `parent_email`, `parent_hno`, `parent_moo`, `parent_soi`, `parent_road`, `parent_tumbon`, `parent_amphur`, `parent_province`, `parent_zipcode`, `parent_stu`, `status_fam`, `parent_career`, `parent_salary`, `parent_careerOther`) 
									  VALUES ('{$IDRegCopy}', '{$father_prefix}', '{$father_fname}', '{$father_sname}', '{$father_prefix_en}', '{$father_fname_en}', '{$father_sname_en}', '{$father_code}', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '{$father_tel}', '{$father_email}', '{$mother_prefix}', '{$mother_fname}', '{$mother_sname}', '{$mother_prefix_en}', '{$mother_fname_en}', '{$mother_sname_en}', '{$mother_code}', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '{$mother_tel}', '{$mother_email}', '{$parent_prefix}', '{$parent_fname}', '{$parent_sname}', '{$parent_prefix_en}', '{$parent_fname_en}', '{$parent_sname_en}', '{$parent_code}', '{$parent_phone}', '{$parent_email}', '0', '0', '0', '0', '0', '0', '0', '0', '{$parent_stu}', '0', '0', '0', '0');";
			$into_familyAdmissionRs=new insert_admission($into_familyAdmissionSql);
			if($into_familyAdmissionRs->into_insert_admission()=="yes"){
				//*****************************************************				
			}else{
				//*****************************************************				
			}
		}
	}
//rc_student_family_admission end
	
	$ds_OriginalClass=filter_input(INPUT_POST,'ds_OriginalClass');	
	$stu_oldsch=filter_input(INPUT_POST,'stu_oldsch');	
	$stu_schprovince=filter_input(INPUT_POST,'stu_schprovince');	
	$stu_avg=filter_input(INPUT_POST,'stu_avg');	
	$stu_plan1=$plan_idA;
	$stu_plan2=$plan_idB;

//rc_student_level
			$countstudent_levelSql="SELECT  count(`IDReg`) as `count_level`	FROM `rc_student_level` WHERE `IDReg`='{$copy_IDReg}';";
			$countstudent_levelRs=new notrow_admission($countstudent_levelSql);
	foreach($countstudent_levelRs->notrow_admission_print() as $apply_key=>$countstudent_levelRow){
				$count_level=$countstudent_levelRow["count_level"];
		if($count_level>=1){
			$up_student_levelSql="UPDATE `rc_student_level` SET `stu_level`='{$ds_OriginalClass}' ,`stu_oldsch`='{$stu_oldsch}',`stu_schprovince`='{$stu_schprovince}',`stu_avg`='{$stu_avg}',`stu_plan1`='{$stu_plan1}',`stu_plan2`='{$stu_plan2}'
			                      where `IDReg`='{$copy_IDReg}';";
			$up_student_levelRs=new insert_admission($up_student_levelSql);
			if($up_student_levelRs->into_insert_admission()=="yes"){
//***************************************************************************************	
			
//***************************************************************************************				
			}else{
//***************************************************************************************				
			}			
		}else{
			$into_student_levelSql="INSERT INTO `rc_student_level` (`IDReg`, `stu_level`, `stu_oldsch`, `stu_schprovince`, `stu_avg`, `stu_plan1`, `stu_plan2`) VALUES ('{$IDRegCopy}', '{$ds_OriginalClass}', '{$stu_oldsch}', '{$stu_schprovince}', '{$stu_avg}', '{$stu_plan1}', '{$stu_plan2}');";
			$into_student_levelRs=new insert_admission($into_student_levelSql);
			if($into_student_levelRs->into_insert_admission()=="yes"){
//***************************************************************************************	
			
//***************************************************************************************				
			}else{
//*****************************************************				
			}
		}
	}
//------------------------------------------------------------------------------------
$sd_send_documents=filter_input(INPUT_POST,'sd_send_documents');
$sd_student_photo=filter_input(INPUT_POST,'sd_student_photo');
$sd_student_birth=filter_input(INPUT_POST,'sd_student_birth');
$sd_student_house=filter_input(INPUT_POST,'sd_student_house');
$sd_name_change=filter_input(INPUT_POST,'sd_name_change');
$sd_educational_papers=filter_input(INPUT_POST,'sd_educational_papers');
$sd_quota=filter_input(INPUT_POST,'sd_quota');
//------------------------------------------------------------------------------------	
//send_documents
	$RowSendDocuments=new Data_Send_Documents($copy_IDReg);
	if(isset($RowSendDocuments->DSDsd_key)){
		$UpdataSendDocuments=new UpdataSendDocuments($copy_IDReg,$sd_send_documents,$sd_student_photo,$sd_student_birth,$sd_student_house,$sd_name_change,$sd_educational_papers,$sd_quota);
		if($UpdataSendDocuments->RunUpdataSendDocuments()=="Yes"){
//*****************************************************
		}else{
//*****************************************************
		}		
	}else{
		$IntoSendDocuments=new IntoSendDocuments($IDRegCopy,$sd_send_documents,$sd_student_photo,$sd_student_birth,$sd_student_house,$sd_name_change,$sd_educational_papers,$sd_quota);
		if($IntoSendDocuments->RunIntoSendDocuments()=="Yes"){
//*****************************************************
         // echo "AA/".$IDRegCopy;
//*****************************************************
		}else{
//*****************************************************
		//  echo "BB/".$IDRegCopy;
//*****************************************************
		}	
	}	
//send_documents End	
//------------------------------------------------------------------------------------	
	?>	



<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<div class="row">
	<div class="col-<?php echo $grid;?>-12">
		<div class="panel panel-default">
			<div class="panel-heading">สมัครสำเร็จ</div>
			<div class="panel-body">
				<form name="admission" action="export_reg_add.php" method="post" target="_blank">
					<center>
						<button type="submit" id="fontA" class="btn btn-success" name="call_Identification" value="<?php echo $copy_Identification;?>">พิมพ์ใบสมัคร</button>
						<a href="index.php"><button type="button" id="fontA" class="btn btn-Info">กลับสู่หน้าหลัก</button></a>
					</center>
				</form>
			</div>
		</div>	
	</div>
</div>		
	
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->			
	<?php	}      ?>
	

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
