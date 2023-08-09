<?php
//+++++++++++++++++++++++++++++++++++++++++++****************

	include("../database/pdo_data.php");
	include("../database/class_pdo.php");	
	
	include("../database/pdo_conndatastu.php");
	include("../database/class_pdodatastu.php");

	include("../database/database_swip/pdo_data_sw.php");
	include("../database/database_swip/class_pdo_sw.php");	
	
	include("../database/database_swip/pdo_conndatastu_sw.php");
	include("../database/database_swip/class_pdodatastu_sw.php");
	
	include("../database/pdo_admission.php");	
	include("../database/class_admission.php");
    
    include("../js/pay.php");
    include("../js/CRC_CCITT.php");
    
    include("../js/QRcodefromgoogle/arohamQR.php");
//+++++++++++++++++++++++++++++++++++++++++++****************


	error_reporting(error_reporting() & ~E_NOTICE); 
	$next_year=2565;
	$txt_year=2564; 
	$date_time=date("Y-m-d H:i:s");
//---------------------------------------------------	
		$user_login=filter_input(INPUT_GET,'user_login');
		$user_card=filter_input(INPUT_GET,'user_card');
		$user_level=filter_input(INPUT_GET,'user_level');
		$user_plan=filter_input(INPUT_GET,'user_plan');
		
		$stuID=$user_login;
//---------------------------------------------------	
	//ระดับชั้น
	//$call_stu=new stu_levelpdo($stuID,$txt_year,"1");
		switch ($user_level){
				case "3":
					$leve_name="อนุบาล 3";
					$leve_ID="3";				
				break;				
				case "11":
					$leve_name="ประถมศึกษาปีที่ 1";
					$leve_ID="11";				
				break;				
				case "31":
					$leve_name="มัธยมศึกษาปีที่ 1";
					$leve_ID="31";
				break;
				
				case "41":
					$leve_name="มัธยมศึกษาปีที่ 4";
					$leve_ID="41";
				break;
					$leve_name="";
					$leve_ID="";
				default:
					
		}

//ระดับชั้น
//-------------------------------------------------------
		function datethai($strDate){
	        $strYear = date("Y",strtotime($strDate))+543;
	        $strMonth= date("n",strtotime($strDate));
	        $strDay= date("j",strtotime($strDate));
	        $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
	        $strMonthThai=$strMonthCut[$strMonth];
	        return "$strDay $strMonthThai $strYear";
	    }
//--------------------------------------------------------
	/*$qce_key=filter_input(INPUT_POST,'qce_key');
	$qr_plan=filter_input(INPUT_POST,'qr_plan');
	$stuID=filter_input(INPUT_POST,'request_stuid');*/
	
	
//ระดับชั้น
	/*$call_stu=new stu_levelpdo($stuID,$txt_year,"1");
		switch ($call_stu->IDLevel){
				case "23":
					$leve_name="มัธยมศึกษาปีที่ 1";
					$leve_ID="31";
				break;
				
				case "33":
					$leve_name="มัธยมศึกษาปีที่ 4";
					$leve_ID="41";
				break;
					$leve_name="";
					$leve_ID="";
				default:	
		}*/
//ระดับชั้น	
//*********************************************






	/*$count_quota_requesSql="SELECT count(`request_stuid`) as `count_rs` 
						    FROM `quota_request` 
							WHERE `request_stuid`='{$stuID}' 
							and `request_year`='{$next_year}'
							and `request_level`='{$leve_ID}'";
	$count_quota_reques=new row_quotanotarray($count_quota_requesSql);
	foreach($count_quota_reques->print_quotanotarray() as $quot_key=>$count_quota_requesRow){
		$count_rs=$count_quota_requesRow["count_rs"];
		if($count_rs>=1){
			$up_quota_requesSql="UPDATE `quota_request` SET `qr_stuid`='{$qr_plan}',`qce_key`='{$key_key}' 
								WHERE `request_stuid`='{$stuID}' and `request_year`='{$next_year}' and `request_level`='{$leve_ID}'";
			$up_quota_reques=new insert_quota($up_quota_requesSql);
			if($up_quota_reques->print_insertQuota()=="yes"){
				//*************************************************
			}else{
				//*************************************************				
			}
		}else{
			$in_quota_requesSql="INSERT INTO `quota_request` (`request_stuid`, `request_year`, `request_level`, `requset_datetime`, `qr_stuid`, `qce_key`)
                     			 VALUES ('{$stuID}', '{$next_year}', '{$leve_ID}', '{$date_time}', '{$qr_plan}', '{$key_key}');";
			$in_quota_reques=new insert_quota($in_quota_requesSql);
			if($in_quota_reques->print_insertQuota()=="yes"){
				//*************************************************				
			}else{
				//*************************************************				
			}
		}
	}*/
//--------------------------------------------------------
	//$next_year=2565;
	//$txt_year=2563;
	//$stuID="16616";



	/*$regina_stu_dataSql="SELECT * FROM `regina_stu_data` WHERE `rsd_studentid`='{$stuID}'";
	$regina_stu_data=new notrow_evaluation($regina_stu_dataSql);
	foreach($regina_stu_data->evaluation_array as $rc_key=>$regina_stu_datarow){}
//home
	switch($regina_stu_datarow["rse_home"]){
		case "1":
			$txt_home="ฟ้า";
		break;
		
		case "2":
			$txt_home="แดง";
		break;	
		
		case "3":
			$txt_home="เหลือง";
		break;	
		
		case "4":
			$txt_home="เขียว";
		break;	
		
		default:
			$txt_home=".........................";
	}*/

//home end

//img

	$txt_home;
	$user_img="../img/images/กรอกรูป.JPG";
	/*if(file_exists("../../../../all/$stuID.JPG")){
		$user_img="../../../../all/$stuID.JPG";
	}else{
		$user_img="../../../../all/newimg_rc.jpg";
	}	*/

//img



?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ใบมอบตัวนักเรียนโควตาภายใน</title>

<!-- Global stylesheets -->
    <link href="../Bootstrap 3/Template/layout_3/LTR/material/full/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<!-- /global stylesheets -->		
<!--Code Print css-->
	<link rel="stylesheet" href="../js/print_css_js/css/normalize.css">
	<link rel="stylesheet" href="../js/print_css_js/css/paper.css"> 	
<!--Code Print css End-->

<style>
.psrA{
	margin: auto;
	border: 2px solid #73AD21;
}
</style>

		<style>
			@font-face {
                font-family: 'THSarabunNew';
                src: url('../font/thsarabunnew-webfont.eot');
                src: url('../font/thsarabunnew-webfont.eot?#iefix') format('embedded-opentype'),
                url('../font/thsarabunnew-webfont.woff') format('woff'),
                url('../font/THSarabunNew.ttf') format('truetype');
			}
			body{
				font-family: "THSarabunNew";
				font-size: 20px;
				color: #032E3B;
			}
            

		</style>
	
		<style>
			@media print {
				
				@page{
					size: A4;
					margin: 1 cm;
				}
				
				button {
					display:none;
				}
				
				#p_echo{
					display:none;
				}
				
				body{
					font-family: "THSarabunNew";
					font-size: 14pt; 
							
				}
			}
			
			body{
				width: 210mm; height: 296mm;
			}
			.printA{
				width: 210mm; height: 296mm;
			}
		</style>
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
	<script src="../Bootstrap 3/Template/global_assets/js/core/libraries/jquery.min.js"></script>
	<script src="../Bootstrap 3/Template/global_assets/js/core/libraries/bootstrap.min.js"></script>
<!-- /core JS files -->	
<!--Code Print js-->
	<script src="../js/print_css_js/js/html2canvas.js"></script>	
<!--Code Print js End-->	
</head>

<body onload="window.print()">
	<div id="p_echo">
		<div class="container psrA">
			<div class="row">
				<div class="col-<?php echo $grid;?>-12">
					<div class="table-responsive">
						<table class="table" align="center">
							<thead>
								<tr>
									<th style="width: 20%">
										<div><button type="button"  class="btn btn-default" onclick="window.print()"><b>พิมพ์ เอกสารประกอบการมอบตัว</b></button></div>
									</th>
								</tr>
								<tr>
									<th style="width: 20%">
										<div><font color="#F70105"><b>ระบบการพิมพ์  รองรับ เว็บเบราว์เซอร์  Google Chrome และ  Microsoft Edge เท่านั้น<b></font></div>
									</th>								
								</tr>
							</thead>						
						</table>
						<table class="table" align="center">
							<thead>
								<tr>
									<th style="width: 20%"><div>ขนาดกระดาษ</div></th>
									<th style="width: 20%"><div>แนวกระดาษ</div></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><div>A4&nbsp;:&nbsp;210mm&nbsp;X&nbsp;296mm</div></td>
									<td><div>แนวตั้ง</div></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>		
			</div>		
		</div>
	</div>

    <section class="sheet padding-10mm printA">
    
		<table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td style="width: 246px;" cellpadding="0" cellspacing="0">
                        <div>
                            <center><div><img src="../img/images/logo_rc.jpg" alt="โรงเรียนเรยีนาเชลีวิทยาลัย จังหวัดเชียงใหม่"   style="width: 85px; height: 89px;"/></div></center>
                        </div>
                        <div>
                            <table width="149px" border="1" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div>&nbsp;เลขประจำตัว.....................</div>
                                            <div>&nbsp;สีบ้าน................................</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                    <td style="width: 246px;">
                    
		<center>
			<div><b>ใบมอบตัวนักเรียน <?php echo $leve_name;?> ปีการศึกษา <?php echo $next_year;?></b></div>  
			<div><b>โรงเรียนเรยีนาเชลีวิทยาลัย จังหวัดเชียงใหม่</b></div>  
			<div><b>รอบนักเรียนทั่วไปโรงเรียนเรยีนาเชลีวิทยาลัย</b></div> 
			<div>
			
				<?php
					$admission_sturcSql="SELECT `rat_IDReg`,`rat_year`,`rat_level`,`rat_plan` 
									     FROM `rc_admission_test` 
										 WHERE `rat_IDReg`='{$stuID}'";
					$admission_sturc=new notrow_admission($admission_sturcSql);
					foreach($admission_sturc->notrow_admission_print() as $rc_key=>$admission_sturcRow){
						
						$qr_stuid=$admission_sturcRow["rat_IDReg"];
						$qr_year=$admission_sturcRow["rat_year"];
						$qr_level=$admission_sturcRow["rat_level"];
						$qr_plan=$admission_sturcRow["rat_plan"];
						
						if($qr_stuid!=""){ 
								$call_quota=new print_plan($qr_plan); ?>
				<table width="350" border="1" cellpadding="0" cellspacing="0">
 					 <tbody>
    					<tr>
				<?php
					if($leve_ID=="31"){ ?>
      						<td><center><div><font  color="#F50206"><b>ห้องเรียน <?php echo $call_quota->plan_LName;?></b></font></div></center></td>					
			<?php   }
					if($leve_ID=="41"){ ?>
      						<td><center><div><font  color="#F50206"><b> แผนการเรียน <?php echo $call_quota->plan_LName;?></b></font></div></center></td>						
			<?php	}  ?>
    					</tr>
  					</tbody>
				</table>
			   <?php 		}else{
								
							}
						
						
						
						
					}
				
				?>
			</div>
		</center>                  
                    
                    </td>
                    <td style="width: 246px;">
                        <div align="right"><img src="../img/images/กรอกรูป.JPG" style="width: 3.00cm; height: 4.00cm" alt="กรอกรูป"/></div>
                    </td>
				</tr>
			</tbody>
		</table>
        
        
<?php
//*************************************************************************************************	
	$stu_motherSql="SELECT * FROM `stu_mother` WHERE`stu_id`='{$stuID}';";
	$stu_mother=new notrow_datastu_sw($stu_motherSql);
	foreach($stu_mother->datastu_array as $rc_key=>$stu_motherRow){}



	$stu_mother_addressSql="SELECT * FROM `stu_mother_address` WHERE `stu_id`='{$stuID}'";
	$stu_mother_address=new notrow_datastu_sw($stu_mother_addressSql);
	foreach($stu_mother_address->datastu_array as $rc_key=>$stu_mother_addressRow){}	
	
	

	$stu_mother_addwordSql="SELECT * FROM `stu_mother_addword` WHERE `stu_id`='{$stuID}';";
	$stu_mother_addword=new notrow_datastu_sw($stu_mother_addwordSql);
	foreach($stu_mother_addword->datastu_array as $rc_key=>$stu_mother_addwordRow){}	
	
	$mother_wordprovince=new data_Province($stu_mother_addwordRow["mother_wordprovince"]);
	
	$m_np=new stu_prefix($stu_motherRow["mother_prefix"]);
	$myname_m=$m_np->prefix_prefixname." ".$stu_motherRow["mother_fname"]." ".$stu_motherRow["mother_sname"];
	
	$mother_tumbon=new data_Subdistrict($stu_mother_addressRow["mother_tumbon"]);//ตำบล
	$mother_amphur=new data_District($stu_mother_addressRow["mother_amphur"]);///อำเภอ
	$mother_province=new data_Province($stu_mother_addressRow["mother_province"]);///จังหวัด
	
	$data_McareerSql="SELECT `dc_key`, `dc_txt2` FROM `data_career` WHERE `dc_key`='{$stu_motherRow["mother_career"]}'";
	$data_McareerRs=new notrow_datastu_sw($data_McareerSql);
	foreach($data_McareerRs->datastu_array as $rc_key=>$data_McareerRow){
		$Mcareer=$data_McareerRow["dc_txt2"];
	}
	
//*************************************************************************************************	
	$stu_fatherSql="SELECT * FROM `stu_father` WHERE `stu_id`='{$stuID}'";
	$stu_father=new notrow_datastu_sw($stu_fatherSql);
	foreach($stu_father->datastu_array as $rc_key=>$stu_fatherRow){}
	
	$stu_father_addwordSql="SELECT * FROM `stu_father_addword` WHERE `stu_id`='{$stuID}'";
	$stu_father_addword=new notrow_datastu_sw($stu_father_addwordSql);
	foreach($stu_father_addword->datastu_array as $rc_key=>$stu_father_addwordRow){}
	
	
	
	$father_addwordprovince=new data_Province($stu_father_addwordRow["father_addwordprovince"]);
	
	
	
	$stu_father_addressSql="SELECT * FROM `stu_father_address` WHERE `stu_id`='{$stuID}';";
	$stu_father_address=new notrow_datastu_sw($stu_father_addressSql);
	foreach($stu_father_address->datastu_array as $rc_key=>$stu_father_addressRow){}
	
	$f_np=new stu_prefix($stu_fatherRow["father_prefix"]);
	$myname_f=$f_np->prefix_prefixname." ".$stu_fatherRow["father_fname"]." ".$stu_fatherRow["father_sname"];
	
	$father_tumbon=new data_Subdistrict($stu_father_addressRow["father_tumbon"]); // ตำบล
	$father_amphur=new data_District($stu_father_addressRow["father_amphur"]); //อำเภอ
	$father_province=new data_Province($stu_father_addressRow["father_province"]); //จังหวัด	
	
	$data_FcareerSql="SELECT `dc_key`, `dc_txt2` FROM `data_career` WHERE `dc_key`='{$stu_fatherRow["father_career"]}'";
	$data_FcareerRs=new notrow_datastu_sw($data_FcareerSql);
	foreach($data_FcareerRs->datastu_array as $rc_key=>$data_FcareerRow){
		$Fcareer=$data_FcareerRow["dc_txt2"];
	}
	
	
	
//*************************************************************************************************	

	$stu_guardianSql="SELECT * FROM `stu_guardian` WHERE `stu_id`='{$stuID}';";
	$stu_guardian=new notrow_datastu_sw($stu_guardianSql);
	foreach($stu_guardian->datastu_array as $rc_key=>$stu_guardianRow){}
	
	$stu_guardian_addressSql="SELECT * FROM `stu_guardian_address` WHERE `stu_id`='{$stuID}'";
	$stu_guardian_address=new notrow_datastu_sw($stu_guardian_addressSql);
	foreach($stu_guardian_address->datastu_array as $rc_key=>$stu_guardian_addressRow){}
	
	$stu_guardian_addwordSql="SELECT * FROM `stu_guardian_addword` WHERE `stu_id`='{$stuID}'";
	$stu_guardian_addword=new notrow_datastu_sw($stu_guardian_addwordSql);
	foreach($stu_guardian_addword->datastu_array as $rc_key=>$stu_guardian_addwordRow){}
	
	$print_parent_status=new data_rely ($stu_guardianRow["parent_status"]);
	
	$g_np=new stu_prefix($stu_guardianRow["parent_prefix"]);
	$myname_g=$g_np->prefix_prefixname." ".$stu_guardianRow["parent_fname"]." ".$stu_guardianRow["parent_sname"];
	
	$parent_tumbon=new data_Subdistrict($stu_guardian_addressRow["parent_tumbon"]);
	$parent_amphur=new data_District($stu_guardian_addressRow["parent_amphur"]);
	$parent_province=new data_Province($stu_guardian_addressRow["parent_province"]);
	
	/*$parent_tumbon=new data_Subdistrict($stu_guardian_addressRow["parent_tumbon"]);// ตำบล
	$parent_amphur=new data_District($stu_guardian_addressRow["parent_amphur"]);//อำเภอ
	$parent_province=new data_Province($stu_guardian_addressRow["parent_province"]);//จังหวัด*/
//*************************************************************************************************	
	$stu_depend_stuSql="SELECT * FROM `depend_stu` WHERE `ds_stuid`='{$stuID}'";
	$stu_depend_stu=new notrow_datastu_sw($stu_depend_stuSql);
	foreach($stu_depend_stu->datastu_array as $rc_key=>$stu_depend_stuRow){}

	$ds_dormitoryTumbon=new data_Subdistrict ($stu_depend_stuRow["ds_dormitoryTumbon"]);
	$ds_dormitoryAmphur=new data_District ($stu_depend_stuRow["ds_dormitoryAmphur"]);
	$ds_dormitoryProvince=new data_Province ($stu_depend_stuRow["ds_dormitoryProvince"]);

//*************************************************************************************************	
	
?>	

<?php
	if($stu_guardianRow["parent_status"]==2){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td>
            <div>
                <b>ข้าพเจ้า(ผู้ปกครอง)</b><input type="text" size="30" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $myname_f; ?>" readonly="readonly" required="required">
                <b>เลขบัตรประชาชน</b><input type="text" size="13" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_fatherRow["father_code"];?>" readonly="readonly" required="required">
                <b>ที่อยู่ปัจจุบัน เลขที่</b><input type="text" size="5" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_father_addressRow["father_hno"]; ?>" readonly="readonly" required="required">
            </div>
            <div>
                <b>ชื่อหมู่บ้าน</b><input type="text" size="20" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_father_addressRow["father_moo_name"];?>" readonly="readonly" required="required">
                <b>หมู่ที่</b><input type="text" size="5" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_father_addressRow["father_moo"];?>" readonly="readonly" required="required">
                <b>ถนน</b><input type="text" size="20" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_father_addressRow["father_road"];?>" readonly="readonly" required="required">               
                <b>ซอย</b><input type="text" size="5" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_father_addressRow["father_soi"]?>" readonly="readonly" required="required">
            </div>
            <div>
                <b>ตำบล</b><input type="text" size="15" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $father_tumbon->DISTRICT_NAME; ?>" readonly="readonly" required="required">
                <b>อำเภอ</b><input type="text" size="15" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $father_amphur->AMPHUR_NAME;?>" readonly="readonly" required="required">
                <b>จังหวัด</b><input type="text" size="15" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $father_province->PROVINCE_NAME; ?>" readonly="readonly" required="required">
                <b>รหัสไปรษณีย์</b><input type="text" size="10" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_father_addressRow["father_zipcode"];?>" readonly="readonly" required="required">               
            </div>
            <div>
                <b>โทรศัพท์</b><input type="text" size="10" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_fatherRow["father_phone"];?>" readonly="readonly" required="required">
            </div>
            <div>
                <b>เกี่ยวข้องกับนักเรียนเป็น</b><input type="text" size="30" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $print_parent_status->dr_txt;?>" readonly="readonly" required="required">&nbsp;ขอมอบตัวนักเรียนไว้กับผู้บริหารโรงเรียนเรยีนาเชลีวิทยาลัย
            </div>
	  </td>
    </tr>
  </tbody>
</table>		
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->		
<?php	}elseif($stu_guardianRow["parent_status"]==3){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->	
<table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td>
            <div>
                <b>ข้าพเจ้า(ผู้ปกครอง)</b><input type="text" size="30" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $myname_m; ?>" readonly="readonly" required="required">
                <b>เลขบัตรประชาชน</b><input type="text" size="13" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_motherRow["mother_code"];?>" readonly="readonly" required="required">
                <b>ที่อยู่ปัจจุบัน เลขที่</b><input type="text" size="5" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_mother_addressRow["mother_hno"]; ?>" readonly="readonly" required="required">
            </div>
            <div>
                <b>ชื่อหมู่บ้าน</b><input type="text" size="20" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_mother_addressRow["mother_moo_name"];?>" readonly="readonly" required="required">
                <b>หมู่ที่</b><input type="text" size="5" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_mother_addressRow["mother_moo"];?>" readonly="readonly" required="required">
                <b>ถนน</b><input type="text" size="20" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_mother_addressRow["mother_road"];?>" readonly="readonly" required="required">               
                <b>ซอย</b><input type="text" size="5" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_mother_addressRow["mother_soi"]?>" readonly="readonly" required="required">
            </div>
            <div>
                <b>ตำบล</b><input type="text" size="15" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $mother_tumbon->DISTRICT_NAME; ?>" readonly="readonly" required="required">
                <b>อำเภอ</b><input type="text" size="15" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $mother_amphur->AMPHUR_NAME;?>" readonly="readonly" required="required">
                <b>จังหวัด</b><input type="text" size="15" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $mother_province->PROVINCE_NAME; ?>" readonly="readonly" required="required">
                <b>รหัสไปรษณีย์</b><input type="text" size="10" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_depend_stuRow['ds_dormitoryZipcode'];?>" readonly="readonly" required="required">               
            </div>
            <div>
                <b>โทรศัพท์</b><input type="text" size="10" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_motherRow['mother_phone'];?>" readonly="readonly" required="required">
            </div>
            <div>
                <b>เกี่ยวข้องกับนักเรียนเป็น</b><input type="text" size="30" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $print_parent_status->dr_txt;?>" readonly="readonly" required="required">&nbsp;ขอมอบตัวนักเรียนไว้กับผู้บริหารโรงเรียนเรยีนาเชลีวิทยาลัย
            </div>
	  </td>
    </tr>
  </tbody>
</table>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->			
<?php	}elseif($stu_guardianRow["parent_status"]==5){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td>
            <div>
                <b>ข้าพเจ้า(ผู้ปกครอง)</b><input type="text" size="30" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_depend_stuRow["ds_dormitoryMyName"]; ?>" readonly="readonly" required="required">
                <b>เลขบัตรประชาชน</b><input type="text" size="13" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_guardianRow ['parent_code'];?>" readonly="readonly" required="required">
                <b>ที่อยู่ปัจจุบัน เลขที่</b><input type="text" size="5" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_depend_stuRow['ds_dormitoryHno']; ?>" readonly="readonly" required="required">
            </div>
            <div>
                <b>ชื่อหมู่บ้าน</b><input type="text" size="20" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_depend_stuRow['ds_dormitoryMoo_name'];?>" readonly="readonly" required="required">
                <b>หมู่ที่</b><input type="text" size="5" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_depend_stuRow['ds_dormitoryMoo'];?>" readonly="readonly" required="required">
                <b>ถนน</b><input type="text" size="20" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_depend_stuRow["ds_dormitoryRoad"];?>" readonly="readonly" required="required">               
                <b>ซอย</b><input type="text" size="5" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_depend_stuRow['ds_dormitorySoi'];?>" readonly="readonly" required="required">
            </div>
            <div>
                <b>ตำบล</b><input type="text" size="15" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $ds_dormitoryTumbon->DISTRICT_NAME; ?>" readonly="readonly" required="required">
                <b>อำเภอ</b><input type="text" size="15" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $ds_dormitoryAmphur->AMPHUR_NAME;?>" readonly="readonly" required="required">
                <b>จังหวัด</b><input type="text" size="15" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $ds_dormitoryProvince->PROVINCE_NAME; ?>" readonly="readonly" required="required">
                <b>รหัสไปรษณีย์</b><input type="text" size="10" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_depend_stuRow['ds_dormitoryZipcode'];?>" readonly="readonly" required="required">               
            </div>
            <div>
                <b>โทรศัพท์</b><input type="text" size="10" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_depend_stuRow['ds_dormitoryPhone'];?>" readonly="readonly" required="required">
            </div>
            <div>
                <b>เกี่ยวข้องกับนักเรียนเป็น</b><input type="text" size="30" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $print_parent_status->dr_txt;?>" readonly="readonly" required="required">&nbsp;ขอมอบตัวนักเรียนไว้กับผู้บริหารโรงเรียนเรยีนาเชลีวิทยาลัย
            </div>
	  </td>
    </tr>
  </tbody>
</table>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->			
<?php	}else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td>
            <div>
                <b>ข้าพเจ้า(ผู้ปกครอง)</b><input type="text" size="30" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $myname_g; ?>" readonly="readonly" required="required">
                <b>เลขบัตรประชาชน</b><input type="text" size="13" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_guardianRow ['parent_code'];?>" readonly="readonly" required="required">
                <b>ที่อยู่ปัจจุบัน เลขที่</b><input type="text" size="5" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_guardian_addressRow ['parent_hno']; ?>" readonly="readonly" required="required">
            </div>
            <div>
                <b>ชื่อหมู่บ้าน</b><input type="text" size="20" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_guardian_addressRow["parent_moo_name"];?>" readonly="readonly" required="required">
                <b>หมู่ที่</b><input type="text" size="5" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_guardian_addressRow['parent_moo'];?>" readonly="readonly" required="required">
                <b>ถนน</b><input type="text" size="20" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_guardian_addressRow["parent_road"];?>" readonly="readonly" required="required">               
                <b>ซอย</b><input type="text" size="5" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_guardian_addressRow['parent_soi'];?>" readonly="readonly" required="required">
            </div>
            <div>
                <b>ตำบล</b><input type="text" size="15" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $parent_tumbon->DISTRICT_NAME; ?>" readonly="readonly" required="required">
                <b>อำเภอ</b><input type="text" size="15" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $parent_amphur->AMPHUR_NAME;?>" readonly="readonly" required="required">
                <b>จังหวัด</b><input type="text" size="15" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $parent_province->PROVINCE_NAME;?>" readonly="readonly" required="required">
                <b>รหัสไปรษณีย์</b><input type="text" size="10" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_guardian_addressRow['parent_zipcode'];?>" readonly="readonly" required="required">               
            </div>
            <div>
                <b>โทรศัพท์</b><input type="text" size="10" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_guardianRow['parent_phone'];?>" readonly="readonly" required="required">
            </div>
            <div>
                <b>เกี่ยวข้องกับนักเรียนเป็น</b><input type="text" size="30" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $print_parent_status->dr_txt;?>" readonly="readonly" required="required">&nbsp;ขอมอบตัวนักเรียนไว้กับผู้บริหารโรงเรียนเรยีนาเชลีวิทยาลัย
            </div>
	  </td>
    </tr>
  </tbody>
</table>	
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->			
<?php	} ?>        
        
<?php



	$regina_stu_dataSql="SELECT `stu_prefix`,`stu_fname`,`stu_sname`,`stu_fname_e`,`stu_sname_e`,`nickTh`,`nickEn`,`IDCard`,`stu_level`,`stu_plan` 
					     FROM `rc_student_admission` WHERE `IDReg`='{$user_login}';'";
	$regina_stu_data=new notrow_admission($regina_stu_dataSql);
	foreach($regina_stu_data->notrow_admission_print() as $rc_key=>$regina_stu_datarow){
		if($regina_stu_datarow["stu_prefix"]==2){
			$mynameTh="เด็กหญิง ".$regina_stu_datarow["stu_fname"]." ".$regina_stu_datarow["stu_sname"];			
		}elseif($regina_stu_datarow["stu_prefix"]==4){
			$mynameTh="นางสาว ".$regina_stu_datarow["stu_fname"]." ".$regina_stu_datarow["stu_sname"];			
		}else{
			$mynameTh=$regina_stu_datarow["stu_fname"]." ".$regina_stu_datarow["stu_sname"];			
		}
		$mynameEn="Miss ".$regina_stu_datarow["stu_fname_e"]." ".$regina_stu_datarow["stu_sname_e"];
	}





	$data_studentSql="SELECT * FROM `data_student` WHERE `stu_id`='{$stuID}'";
	$data_student=new notrow_datastu_sw($data_studentSql);
	foreach($data_student->datastu_array as $rc_key=>$data_studentrow){}
	
	$stu_addressSql="SELECT * FROM `stu_address` WHERE `stu_id`='{$stuID}'";
	$stu_address=new notrow_datastu_sw($stu_addressSql);
	foreach($stu_address->datastu_array as $rc_key=>$stu_addressRow){}
	
	$stu_nation=new db_country($data_studentrow["stu_nation"]);
	$stu_sun=new  db_country($data_studentrow["stu_sun"]);


	$rc_religionSql="SELECT `Religion` FROM `rc_religion` WHERE `IDReligion`='{$data_studentrow["IDReligion"]}';";
	$rc_religion=new notrow_datastu_sw($rc_religionSql);
	foreach($rc_religion->datastu_array as $rc_key=>$rc_religionRow){
		$Religion=$rc_religionRow["Religion"];
	}

	$stu_tumbon=new data_Subdistrict ($stu_addressRow["stu_tumbon"]); // ตำบล
	$stu_amphur=new data_District ($stu_addressRow["stu_amphur"]); //อำเภอ
	$stu_province=new data_Province($stu_addressRow["stu_province"]); //จังหวัด

	$stu_depend_stuSql="SELECT * FROM `depend_stu` WHERE `ds_stuid`='{$stuID}'";
	$stu_depend_stu=new notrow_datastu_sw($stu_depend_stuSql);
	foreach($stu_depend_stu->datastu_array as $rc_key=>$stu_depend_stuRow){}



?>

<table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<td>
                <div>
                    <b>ชื่อนักเรียนภาษาไทย</b><input type="text" size="30" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $mynameTh;?>" readonly="readonly" required="required">
                    <b>เลขบัตรประชาชน</b><input type="text" size="13" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $regina_stu_datarow['IDCard'];?>" readonly="readonly" required="required"> 
                </div>   
                <div>
                    <b>ชื่อนักเรียนภาษาอังกฤษ</b><input type="text" size="30" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $mynameEn;?>" readonly="readonly" required="required">
                    <b>วัน/เดือน/ปี เกิด</b><input type="text" size="10" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo datethai($data_studentrow['stu_birth']);?>" readonly="readonly" required="required">   
                    <b>หมู่เลือด</b><input type="text" size="5" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $data_studentrow['stu_blood'];?>" readonly="readonly" required="required">                   
                </div>
                <div>

                    <b>เชื่อชาติ</b><input type="text" size="12" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_nation->nation_name_th;?>" readonly="readonly" required="required">
                    <b>สัญชาติ</b><input type="text" size="12" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_sun->nation_name_th;?>" readonly="readonly" required="required">
                    <b>ศาสนา</b><input type="text" size="10" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $Religion;?>" readonly="readonly" required="required">
                    <b>ที่อยู่ปัจจุบัน เลขที่</b><input type="text" size="10" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_addressRow['stu_hno'];?>" readonly="readonly" required="required">                   
                </div>
                <div>

                    <b>ชื่อหมู่บ้าน</b><input type="text" size="20" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_addressRow['stu_moo_name'];?>" readonly="readonly" required="required">
                    <b>หมู่ที่</b><input type="text" size="5" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_addressRow['stu_moo'];?>" readonly="readonly" required="required">
                    <b>ซอย</b><input type="text" size="5" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_addressRow['stu_soi'];?>" readonly="readonly" required="required">   
                    <b>ตำบล</b><input type="text" size="20" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_tumbon->DISTRICT_NAME;?>" readonly="readonly" required="required">
                </div>
                <div>
                    <b>อำเภอ</b><input type="text" size="20" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_amphur->AMPHUR_NAME;?>" readonly="readonly" required="required">      
                    <b>จังหวัด</b><input type="text" size="20" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_province->PROVINCE_NAME;?>" readonly="readonly" required="required">
                    <b>รหัสไปรษณีย์</b><input type="text" size="5" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_addressRow['stu_zipcode'];?>" readonly="readonly" required="required">
                    <b>โทรศัพท์</b><input type="text" size="10" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $data_studentrow["stu_phone"];?>" readonly="readonly" required="required">                    
                </div>

                   
            </td>
		</tr>
	</tbody>
</table> 
            

<table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<td>
                <div>
                    <b>ชื่อบิดา</b><input type="text" size="30" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $myname_f;?>" readonly="readonly" required="required">
                    <b>เลขบัตรประชาชน</b><input type="text" size="13" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_fatherRow['father_code'];?>" readonly="readonly" required="required">
                    <b>อาชีพ</b><input type="text" size="20" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $Fcareer;?>" readonly="readonly" required="required">
                </div>
                <div>
                    <b>สถานที่ทำงาน</b><input type="text" size="20" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_fatherRow['father_workplace'];?>" readonly="readonly" required="required">       
                    <b>จังหวัด</b><input type="text" size="20" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $father_addwordprovince->PROVINCE_NAME;?>" readonly="readonly" required="required">    
                    <b>โทรศัพท์ที่ทำงาน</b><input type="text" size="15" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_fatherRow['father_wp_tel'];?>" readonly="readonly" required="required">
                    
                </div>
                <div>
                    <b>โทรศัพท์</b><input type="text" size="10" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_fatherRow['father_phone'];?>" readonly="readonly" required="required">
                    <b>ที่อยู่ปัจจุบัน เลขที่</b><input type="text" size="5" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_father_addressRow['father_hno'];?>" readonly="readonly" required="required">
                    <b>ชื่อหมู่บ้าน</b><input type="text" size="20" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_father_addressRow['father_moo_name'];?>" readonly="readonly" required="required">                    
                    <b>หมู่ที่</b><input type="text" size="10" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_father_addressRow['father_moo'];?>" readonly="readonly" required="required">
                </div>
                <div>
                    <b>ถนน</b><input type="text" size="20" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_father_addressRow["father_road"];?>" readonly="readonly" required="required">
                    <b>ซอย</b><input type="text" size="5" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_father_addressRow['father_soi'];?>" readonly="readonly" required="required">
                    <b>ตำบล</b><input type="text" size="17" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $father_tumbon->DISTRICT_NAME;?>" readonly="readonly" required="required">
                    <b>อำเภอ</b><input type="text" size="20" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $father_amphur->AMPHUR_NAME;?>" readonly="readonly" required="required">                    
                </div>
                <div>
                    <b>จังหวัด</b><input type="text" size="20" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $father_province->PROVINCE_NAME;?>" readonly="readonly" required="required">
                    <b>รหัสไปรษณีย์</b><input type="text" size="5" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_father_addressRow['father_zipcode'];?>" readonly="readonly" required="required">
                </div>
            </td>
		</tr>
	</tbody>
</table>        
        
<table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<td>        
                <div>
                    <b>ชื่อมารดา</b><input type="text" size="30" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $myname_m;?>" readonly="readonly" required="required">
                    <b>เลขบัตรประชาชน</b><input type="text" size="13" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_motherRow['mother_code'];?>" readonly="readonly" required="required">
                    <b>อาชีพ</b><input type="text" size="20" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $Mcareer;?>" readonly="readonly" required="required">                    
                </div>
                <div>
                    <b>สถานที่ทำงาน</b><input type="text" size="20" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_motherRow['mother_workplace'];?>" readonly="readonly" required="required">    
                    <b>จังหวัด</b><input type="text" size="20" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $mother_wordprovince->PROVINCE_NAME;?>" readonly="readonly" required="required">
                    <b>โทรศัพท์ที่ทำงาน</b><input type="text" size="15" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_motherRow['mother_wp_tel'];?>" readonly="readonly" required="required">                    
                </div>
                <div>
                    <b>โทรศัพท์</b><input type="text" size="10" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_motherRow['mother_phone'];?>" readonly="readonly" required="required">
                    <b>ที่อยู่ปัจจุบัน เลขที่</b><input type="text" size="5" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_mother_addressRow['mother_hno'];?>" readonly="readonly" required="required">                    
                    <b>ชื่อหมู่บ้าน</b><input type="text" size="20" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_mother_addressRow['mother_moo_name'];?>" readonly="readonly" required="required">  
                    <b>หมู่ที่</b><input type="text" size="5" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_mother_addressRow['mother_moo'];?>" readonly="readonly" required="required">
                    
                </div>
                <div>
                    <b>ถนน</b><input type="text" size="20" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_mother_addressRow["mother_road"];?>" readonly="readonly" required="required">
                    <b>ซอย</b><input type="text" size="5" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_mother_addressRow['mother_soi'];?>" readonly="readonly" required="required">
                    <b>ตำบล</b><input type="text" size="16" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $mother_tumbon->DISTRICT_NAME;?>" readonly="readonly" required="required">
                    <b>อำเภอ</b><input type="text" size="20" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $mother_amphur->AMPHUR_NAME; ?>" readonly="readonly" required="required">                    
                    
                </div>
                <div>

                    <b>จังหวัด</b><input type="text" size="20" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $mother_province->PROVINCE_NAME; ?>" readonly="readonly" required="required">
                    <b>รหัสไปรษณีย์</b><input type="text" size="5" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stu_mother_addressRow['mother_zipcode']; ?>" readonly="readonly" required="required">
                </div>
       
            </td>
		</tr>
	</tbody>
</table>                      
<center>
<table width="500px" border="0" cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
      <td><div><center><b>สถานภาพบิดา-มารดา</b></center></div></td>
      
	<?php 	if ($stu_depend_stuRow['ds_FMstatus'] == '1') { ?>
		<td>
		<center><div>
		&nbsp;<font style="font-family: THSarabunNew; font-size: 22px"><img src="../img/images/f.JPG" width="11" height="11" alt=""/>&nbsp;อยู่ร่วมกัน&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 22px;"><img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;แยกกันอยู่&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 22px;"><img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;หย่าร้าง&nbsp;</font>  
		</div></center>
		<center><div>&nbsp;<font style="font-family: THSarabunNew; font-size: 22px;"><img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;บิดาถึงแก่กรรม&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 22px;"><img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;มารดาถึงแก่กรรม&nbsp;</font></div></center>
	  </td>
		
<?php		} else if ($stu_depend_stuRow['ds_FMstatus'] == '2') { ?>
		<td>
		<center><div>
		&nbsp;<font style="font-family: THSarabunNew; font-size: 22px"><img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;อยู่ร่วมกัน&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 22px;"><img src="../img/images/f.JPG" width="11" height="11" alt=""/>&nbsp;แยกกันอยู่&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 22px;"><img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;หย่าร้าง&nbsp;</font>  
		</div></center>
		<center><div>&nbsp;<font style="font-family: THSarabunNew; font-size: 22px;"><img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;บิดาถึงแก่กรรม&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 22px;"><img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;มารดาถึงแก่กรรม&nbsp;</font></div></center>
	  </td>			
<?php		} else if ($stu_depend_stuRow['ds_FMstatus'] == '3') { ?>
		<td>
		<center><div>
		&nbsp;<font style="font-family: THSarabunNew; font-size: 22px"><img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;อยู่ร่วมกัน&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 22px;"><img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;แยกกันอยู่&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 22px;"><img src="../img/images/f.JPG" width="11" height="11" alt=""/>&nbsp;หย่าร้าง&nbsp;</font>  
		</div></center>
		<center><div>&nbsp;<font style="font-family: THSarabunNew; font-size: 22px;"><img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;บิดาถึงแก่กรรม&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 22px;"><img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;มารดาถึงแก่กรรม&nbsp;</font></div></center>
	  </td>			
<?php		} else if ($stu_depend_stuRow['ds_FMstatus'] == '4') { ?>
		<td>
		<center><div>
		&nbsp;<font style="font-family: THSarabunNew; font-size: 22px"><img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;อยู่ร่วมกัน&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 22px;"><img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;แยกกันอยู่&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 22px;"><img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;หย่าร้าง&nbsp;</font>  
		</div></center>
		<center><div>&nbsp;<font style="font-family: THSarabunNew; font-size: 22px;"><img src="../img/images/f.JPG" width="11" height="11" alt=""/>&nbsp;บิดาถึงแก่กรรม&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 22px;"><img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;มารดาถึงแก่กรรม&nbsp;</font></div></center>
	  </td>			
<?php		} else if ($stu_depend_stuRow['ds_FMstatus'] == '5') { ?>
		<td>
		<center><div>
		&nbsp;<font style="font-family: THSarabunNew; font-size: 22px"><img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;อยู่ร่วมกัน&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 22px;"><img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;แยกกันอยู่&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 22px;"><img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;หย่าร้าง&nbsp;</font>  
		</div></center>
		<center><div>&nbsp;<font style="font-family: THSarabunNew; font-size: 22px;"><img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;บิดาถึงแก่กรรม&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 22px;"><img src="../img/images/f.JPG" width="11" height="11" alt=""/>&nbsp;มารดาถึงแก่กรรม&nbsp;</font></div></center>
	  </td>		
<?php		}else{ ?>
		<td>
		<center><div>
		&nbsp;<font style="font-family: THSarabunNew; font-size: 22px"><img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;อยู่ร่วมกัน&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 22px;"><img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;แยกกันอยู่&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 22px;"><img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;หย่าร้าง&nbsp;</font>  
		</div></center>
		<center><div>&nbsp;<font style="font-family: THSarabunNew; font-size: 22px;"><img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;บิดาถึงแก่กรรม&nbsp;</font>&nbsp;<font style="font-family: THSarabunNew; font-size: 22px;"><img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;มารดาถึงแก่กรรม&nbsp;</font></div></center>
	  </td>				
<?php		} ?>	
		</tr>
	</tbody>
</table>        
</center>        
<table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้ามีความประสงค์ที่จะให้บุตรสาวศึกษาต่อที่โรงเรียนเรยีนาเชลีวิทยาลัย และยินดีให้ความร่วมมือกับทางโรงเรียนในการส่งเสริม สนับสนุน ดูแลบุตรสาวทั้งด้านการเรียน ความประพฤติให้ปฏิบัติอยู่ในกฎระเบียบของโรงเรียน พร้อมกันนี้ข้าพเจ้าได้ชำระเงินยืนยันการมอบตัวนักเรียนเรียบร้อยแล้ว หากบุตรสาวของข้าพเจ้าสละสิทธิ์ไม่ว่ากรณีใดๆ ข้าพเจ้ายินดีมอบเงินทั้งหมดให้กับทางโรงเรียนเพื่อ สนับสนุนการศึกษาของโรงเรียนต่อไป</td>
        </tr>
        <tr>
            <td style="width: 370px;">
				<div id="fontA"><center><b>เอกสารประกอบการมอบตัวนักเรียน</b></center></div>
				<div id="fontA">&nbsp;<img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;รูปถ่าย ขนาด 1.5 นิ้ว จำนวน 1 ใบ</div>
				<div id="fontA">&nbsp;<img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;สำเนาบัตรประชาชนนักเรียน 1 ฉบับ (ยกเว้น อ3 และ ป1)</div>
				<div id="fontA">&nbsp;<img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;สำเนาบัตรประชาชนบิดา มารดา หรือ ผู้ปกครอง 1 ฉบับ</div>
				<div id="fontA">&nbsp;<img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;สำเนาทะเบียนบ้านบิดา 1 ฉบับ และมารดา 1 ฉบับ</div>
				<div id="fontA">&nbsp;<img src="../img/images/t.JPG" width="11" height="11" alt=""/>&nbsp;สำเนาการเปลี่ยนชื่อ-สกุล ของนักเรียน บิดา มารดา (ถ้ามี)</div>            
            </td>
            <td style="width: 370px;">
            	<p><center><div>ลงชื่อ.............................................ผู้ปกครอง</div>
                           <div>(....................................................)</div></center></p>
                <p><center><div>ลงชื่อ.............................................ผู้รับเอกสาร</div>
                           <div>(.....................................................)</div>
                           <div>วันที่...........เดือน.....................พ.ศ............</div>
                </center></p>
            </td>
        </tr>        
    </tbody>
</table>

    </section>
    
 
    <section class="sheet padding-10mm printA">

        <table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td>
                        <div>
                            <center><div><img src="../img/images/logo_rc.jpg" alt="โรงเรียนเรยีนาเชลีวิทยาลัย จังหวัดเชียงใหม่"   style="width: 85px; height: 89px;"/></div></center>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <th>
                        <div align="center">รายการค่ามอบตัวนักเรียนใหม่ ปีการศึกษา <?php echo $next_year;?></div>
                        <div>ชื่อ - สกุล &nbsp;<?php echo $mynameTh;?>&nbsp;เลขประจำตัวผู้สมัคร <?php echo $user_login;?></div>
                    </th>                  
                </tr>
            </tbody>
        </table>
        
        <table style="width: 740px;" border="1" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <th style="width: 46px;"><div>ลำดับ</div></th>
                    <th style="width: 446px;"><div>รายการ</div></th>
                    <th style="width: 246px;"><div>ราคา</div></th>
                </tr>
                <tr>
                    
                        <td style="width: 46px;">
                        
            <?php
                $countA=0;
                $datapayASql="select `surrender_fee_list`.`sfl_no`,`surrender_fee_list`.`sfl_txt`,`surrender_fee_list`.`sfl_price`  
                              from `surrender_fee` 
                              right join `surrender_fee_list` on (`surrender_fee`.`sf_no`=`surrender_fee_list`.`sf_no`) 
                              where `surrender_fee`.`sf_year`='{$qr_year}' 
                              and `surrender_fee`.`sf_class`='{$qr_level}' 
                              and `surrender_fee`.`sf_plan`='{$qr_plan}' and `surrender_fee_list`.`sfl_price` != '0.00' ORDER BY `surrender_fee_list`.`sfl_no` ASC";
                $datapayA=new row_admission($datapayASql);
                foreach($datapayA->row_admission_print() as $rc=>$datapayARow){
                    $countA=$countA+1;?>
                    <?php
                            if($datapayBRow["sfl_price"]=="0.00"){ ?>
                            
                    <?php   }else{ ?>
                    
                            <div align="center"><?php echo $countA;?></div>
                            
                    <?php   }?>                       
                    
                            
            <?php    } ?>            
                        
                        
                        </td>
                        <td style="width: 656px;">
                        
            <?php
                $datapayBSql="select `surrender_fee_list`.`sfl_no`,`surrender_fee_list`.`sfl_txt`,`surrender_fee_list`.`sfl_price`  
                              from `surrender_fee` 
                              right join `surrender_fee_list` on (`surrender_fee`.`sf_no`=`surrender_fee_list`.`sf_no`) 
                              where `surrender_fee`.`sf_year`='{$qr_year}' 
                              and `surrender_fee`.`sf_class`='{$qr_level}' 
                              and `surrender_fee`.`sf_plan`='{$qr_plan}' and `surrender_fee_list`.`sfl_price` != '0.00' ORDER BY `surrender_fee_list`.`sfl_no` ASC";
                $datapayB=new row_admission($datapayBSql);
                foreach($datapayB->row_admission_print() as $rc=>$datapayBRow){ ?>
                    <?php
                            if($datapayBRow["sfl_price"]=="0.00"){ ?>
                            
                    <?php   }else{ ?>
                            <div>&nbsp;<?php echo $datapayBRow["sfl_txt"];?></div>
                    <?php   }?>        
                            
                            
            <?php    } ?>            
                        
                        </td>
                        <td style="width: 36px;">
            <?php
                $sumpay=0;
                $datapayCSql="select `surrender_fee_list`.`sfl_no`,`surrender_fee_list`.`sfl_txt`,`surrender_fee_list`.`sfl_price`  
                              from `surrender_fee` 
                              right join `surrender_fee_list` on (`surrender_fee`.`sf_no`=`surrender_fee_list`.`sf_no`) 
                              where `surrender_fee`.`sf_year`='{$qr_year}' 
                              and `surrender_fee`.`sf_class`='{$qr_level}' 
                              and `surrender_fee`.`sf_plan`='{$qr_plan}' and `surrender_fee_list`.`sfl_price` != '0.00' ORDER BY `surrender_fee_list`.`sfl_no` ASC";
                $datapayC=new row_admission($datapayCSql);
                foreach($datapayC->row_admission_print() as $rc=>$datapayCRow){ 
                    $sumpay=$sumpay+$datapayCRow["sfl_price"];
                ?>
                    <?php
                            if($datapayBRow["sfl_price"]=="0.00"){ ?>
                            
                    <?php   }else{ ?>
                            <div align="right"><?php echo number_format($datapayCRow["sfl_price"], 2, '.', ',');?>&nbsp;&nbsp;&nbsp;</div>                            
                    <?php   }?>                               
                            

                            
            <?php    } ?>                        
                        </td>
                    
                </tr> 
                 
                <tr>
                    <td></td>
                    <td>
						<?php $bathformat=new bathformat(number_format($sumpay, 2, '.', ','));?>
                        <div><center><?php echo $bathformat->run_pay();?> </center></div>
                    </td>
                    <td>
                        <div align="right"><?php echo number_format($sumpay, 2, '.', ',');?>&nbsp;&nbsp;&nbsp;</div>
                    </td>
                </tr>
                
            </tbody>
        </table>
        
        
        <?php
            $payqrcode01="099400043439110";
            $payqrcode02=$qr_stuid;
            $payqrcode03="ADMISSION".$qr_year.$qr_level.$qr_plan;
            $payqrcode04="ACADEMIC".$qr_year;
            $payqrcode05=number_format($sumpay, 2, '.', '');
            //$payqrcode05=number_format(1, 2, '.', '');
            
            //$TqRcTag=new TqRcTag($payqrcode01,$payqrcode02,$payqrcode03,$payqrcode04,$payqrcode05);
            
            // $TqRcTag="|09940004343911014875TUITIONFEES102564775000";
            
            /*$imgqrcode=new arohamQR();
            $imgqrcode_txt=$TqRcTag->RunTqRcTag();
            $imgqrcode_txt='|099400043439110%0D14875%0DTUITIONFEES102564%0D775000';
            $imgqrcode->text($imgqrcode_txt);*/
            
            $pay=str_replace('.','', $payqrcode05);
           
            
            
                        
        ?>
        <br><br>
        <table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td>
                        <div>
                            <img src="https://chart.googleapis.com/chart?cht=qr&chl=%7C<?php echo $payqrcode01;?>%0D<?php echo $payqrcode02;?>%0D<?php echo $payqrcode03;?>%0D<?php echo $pay;?>&chs=180x180&choe=UTF-8&chld=L|2" class="Qr code <?php echo $payqrcode01;?>" width="180">    
                        </div>
                        <div>Biller&nbsp;ID&nbsp;:&nbsp;<?php echo $payqrcode01;?></div>
                        <div>Ref.1&nbsp;:&nbsp;<?php echo $payqrcode02;?></div>
                        <div>Ref.2&nbsp;:&nbsp;<?php echo $payqrcode03;?></div>   
                    </td>
                    <td>
                        <div><b>วิธีการชำระ</b></div>
                        <div>1&nbsp;.&nbsp;ทำการสแกน QR Code ที่ปรากฏในเพจนี้ ด้วยแอปพลิเคชัน Mobile Banking ของท่าน</div>
                        <div>2&nbsp;.&nbsp;ตรวจสอบข้อมูลที่ปรากฏใน Mobile Banking ให้ถูกต้องก่อนชำระเงิน</div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;ตรวจสอบเลขประจำตัวผู้สมัครให้ถูกต้อง</div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;ตรวจสอบจำนวนเงินให้ถูกต้อง</div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;ตรวจสอบชื่อผู้รับเงินต้องเป็น โรงเรียนเรยีนาเชลีวิทยาลัย หรือ REGINA COELI COLLEGE SCHOOL เท่านั้น</div>
                        <div>3&nbsp;.&nbsp;สำหรับหลักฐานการชำระเงินให้ท่านเก็บไว้เป็นหลักฐาน</div>
                        <div>4&nbsp;.&nbsp;ทางโรงเรียนจะทำการตรวจสอบรายการและยืนยันการชำระเงินของท่าน </div>
                        <div>5&nbsp;.&nbsp;การชำระเงินจะเสร็จสมบูรณ์ เมื่อทางโรงเรียนได้ตรวจสอบการชำระเงินของท่านเรียบร้อยแล้ว</div>
                        <div>6&nbsp;.&nbsp;หากต้องการใบเสร็จรับเงิน ติดต่อขอรับได้ที่ห้องการเงินของโรงเรียน</div>
                        <div>7&nbsp;.&nbsp;วันที่ 5 ก.พ. 2565 กรุณานำใบมอบตัวพร้อมกับหลักฐานการชำระเงินนำมายื่นที่โรงเรียนพร้อมวัดตัวตัดชุดนักเรียน</div>
                        <div>8&nbsp;.&nbsp;กรณีต้องการสอบถามเพิ่มเติ่ม กรณาติดต่อ 053-282395 ต่อ 0</div>
                    </td>
                    
                <tr>
            <tbody>
        </table>
        
    </section>	
 
 
 
 
 


	<?php $key_key=filter_input(INPUT_GET,'key_key');
		
		switch ($key_key){
			case "12": ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++-->	  
						<?php
								$su_IPSTSql="SELECT count(`IDGifted`) as `count_g` FROM `rc_student_gifted` 
											 WHERE `IDReg`='{$stuID}' 
											 and `IDCard`='{$regina_stu_datarow['IDCard']}'";
								$su_IPST=new notrow_admission($su_IPSTSql);
								foreach($su_IPST->notrow_admission_print() as $rc_key=>$su_IPSTRow){
									$count_g=$su_IPSTRow["count_g"];
									if($count_g>=1){
										//echo"ff";
									}else{
										
										$count_IPSTSql="SELECT count(`IDGifted`) as `count_gifted` FROM `rc_student_gifted` WHERE `IDGifted` LIKE '%6412%'";
										$count_IPST=new notrow_admission($count_IPSTSql);
										foreach($count_IPST->notrow_admission_print() as $rc_key=>$count_IPSTRow){
											$count_gifted=$count_IPSTRow["count_gifted"];
											$count_gifted=$count_gifted+1;
											
												if($count_gifted<=9){
													$IDGifted="641200".$count_gifted;
												}elseif($count_gifted<=99){
													$IDGifted="64120".$count_gifted;
												}else{
													$IDGifted="6412".$count_gifted;
												}
												

													$cr_IPSTSql="SELECT count(`IDGifted`) as `cr_gifted` FROM `rc_student_gifted` WHERE `IDGifted` = '{$IDGifted}'";
													$cr_IPST=new notrow_admission($cr_IPSTSql);
													foreach($cr_IPST->notrow_admission_print() as $rc_key=>$cr_IPSTRow){
														$cr_gifted=$cr_IPSTRow["cr_gifted"];
													}
													
													while($cr_gifted>=1){
														
														$IDGifted=$IDGifted+1;
														$cr_IPSTSql="SELECT count(`IDGifted`) as `cr_gifted` FROM `rc_student_gifted` WHERE `IDGifted` = '{$IDGifted}'";
														$cr_IPST=new notrow_admission($cr_IPSTSql);
														foreach($cr_IPST->notrow_admission_print() as $rc_key=>$cr_IPSTRow){
															$cr_gifted=$cr_IPSTRow["cr_gifted"];
														}	
														
													}
												
												$IPST_intoSql="INSERT INTO `rc_student_gifted` (`IDGifted`, `IDReg`, `IDCard`) VALUES ('{$IDGifted}', '{$stuID}', '{$regina_stu_datarow['IDCard']}');";
												$IPST_into=new insert_admission($IPST_intoSql);
												if($IPST_into->into_insert_admission()=="yes"){
													//echo "A";  //*****************************************
												}else{
													//echo "B";//*****************************************
												}	
											
										}
										
										
									}
								
								}
						?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++-->		
<?php		break;				
			case "13": ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++-->	
						<?php
								if($user_plan==3){
									
									$su_IPSTSql="SELECT count(`IDGifted`) as `count_g` FROM `rc_student_gifted` 
												 WHERE `IDReg`='{$stuID}' 
												 and `IDCard`='{$regina_stu_datarow['IDCard']}'";
									$su_IPST=new notrow_admission($su_IPSTSql);
									foreach($su_IPST->notrow_admission_print() as $rc_key=>$su_IPSTRow){
										$count_g=$su_IPSTRow["count_g"];
										if($count_g>=1){
											//**********************************************************
										}else{
											
											$count_IPSTSql="SELECT count(`IDGifted`) as `count_gifted` FROM `rc_student_gifted` WHERE `IDGifted` LIKE '%6413%'";
											$count_IPST=new notrow_admission($count_IPSTSql);
											foreach($count_IPST->notrow_admission_print() as $rc_key=>$count_IPSTRow){
												$count_gifted=$count_IPSTRow["count_gifted"];
												$count_gifted=$count_gifted+1;
												
													if($count_gifted<=9){
														$IDGifted="641300".$count_gifted;
													}elseif($count_gifted<=99){
														$IDGifted="64130".$count_gifted;
													}else{
														$IDGifted="6413".$count_gifted;
													}
													
													
													$cr_IPSTSql="SELECT count(`IDGifted`) as `cr_gifted` FROM `rc_student_gifted` WHERE `IDGifted` = '{$IDGifted}'";
													$cr_IPST=new notrow_admission($cr_IPSTSql);
													foreach($cr_IPST->notrow_admission_print() as $rc_key=>$cr_IPSTRow){
														$cr_gifted=$cr_IPSTRow["cr_gifted"];
													}
													
													while($cr_gifted>=1){
														
														$IDGifted=$IDGifted+1;
														$cr_IPSTSql="SELECT count(`IDGifted`) as `cr_gifted` FROM `rc_student_gifted` WHERE `IDGifted` = '{$IDGifted}'";
														$cr_IPST=new notrow_admission($cr_IPSTSql);
														foreach($cr_IPST->notrow_admission_print() as $rc_key=>$cr_IPSTRow){
															$cr_gifted=$cr_IPSTRow["cr_gifted"];
														}	
														
													}
													
													
																
												$IPST_intoSql="INSERT INTO `rc_student_gifted` (`IDGifted`, `IDReg`, `IDCard`) VALUES ('{$IDGifted}', '{$stuID}', '{$regina_stu_datarow['IDCard']}');";
												$IPST_into=new insert_admission($IPST_intoSql);
												if($IPST_into->into_insert_admission()=="yes"){
													//*****************************************
												}else{
													//*****************************************
												}
												
											}					
											
										}
									}
									
								}else{
									
									
								}
						?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++-->		 					
<?php		break;				
			default:
				$IPST_intoSql="DELETE FROM `rc_student_gifted` WHERE `IDReg`='{$stuID}' and `IDCard`='{$regina_stu_datarow['IDCard']}';";
				$IPST_into=new insert_admission($IPST_intoSql);
				if($IPST_into->into_insert_admission()=="yes"){
					//*****************************************
				}else{
					//*****************************************
				}	
		}   ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php
		if($key_key==12 or $key_key==13){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->		
<section class="sheet padding-10mm printA">
<table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td>
		<table width="163" border="1" align="right" cellpadding="0" cellspacing="0">
  			<tbody>
    			<tr>
      				<td><center>สำหรับเจ้าหน้าที่</center></td>
    			</tr>
  			</tbody>
		</table>

	  </td>
    </tr>
  </tbody>
</table>
<table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td><center><div><img src="../img/images/logo_rc.jpg" alt="โรงเรียนเรยีนาเชลีวิทยาลัย จังหวัดเชียงใหม่" width="72" height="75"  style="width: 85px; height: 89px;"/></div></center></td>
      <td>
		<center><div><b>ใบสมัครสอบคัดเลือกนักเรียนห้องเรียน สสวท. ระดับชั้น<?php echo $leve_name;?> ปีการศึกษา <?php echo $next_year;?></b></div>
		<div><b>โรงเรียนเรยีนาเชลีวิทยาลัย  จังหวัดเชียงใหม่</b></div></center>
	  </td>
    </tr>
  </tbody>
</table>

<table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td>
		<div><b>ข้าพเจ้า<input type="text" size="60" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $mynameTh;?>" readonly="readonly" required="required"></b>&nbsp;<b>เลขที่นั่งสอบ</b>....................................................</div>
		<div><b>เลขประจำตัว <input type="text" size="30" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="" readonly="readonly" required="required"></b>&nbsp;<b>เลขประจำตัวประชาชน  <input type="text" size="30" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $regina_stu_datarow['IDCard'];?>" readonly="readonly" required="required"></b></div>  
	  </td>
    </tr>
  </tbody>
</table>
<br><table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td><center><div>ขอสมัครสอบคัดเลือกห้องเรียน สสวท. ระดับชั้นมัธยมศึกษาปีที่ 1  ปีการศึกษา 2565</div>
		  <div>และจะปฏิบัติตาม กฎระเบียบทุกประการของการสอบทุกประการ</div></center>
	 </td>
    </tr>
  </tbody>
</table>
<table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td><center>
		<div>ลงชื่อ................................................</div>
		<div>(...................................................)</div>
		<div>ผู้สมัคร</div></center>
	  </td>
      <td>
		<center>
		<div>ลงชื่อ................................................</div>
		<div>(...................................................)</div>
		<div>เจ้าหน้าที่รับสมัคร</div></center>		
	  </td>
    </tr>
  </tbody>
</table>
<table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td>...........................................................................................................................................................................................................................................................</td>
    </tr>
  </tbody>
</table>
<table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td>
		<table width="163" border="1" align="right" cellpadding="0" cellspacing="0">
  			<tbody>
    			<tr>
      				<td><center>สำหรับนักเรียน</center></td>
    			</tr>
  			</tbody>
		</table>

	  </td>
    </tr>
  </tbody>
</table>
<table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td><center><div><img src="../img/images/logo_rc.jpg" alt="โรงเรียนเรยีนาเชลีวิทยาลัย จังหวัดเชียงใหม่" width="99" height="103"  style="width: 85px; height: 89px;"/></div></center></td>
      <td>
		<center><div><b>ใบสมัครสอบคัดเลือกนักเรียนห้องเรียน สสวท. ระดับชั้น<?php echo $leve_name;?> ปีการศึกษา <?php echo $next_year;?></b></div>
		<div><b>โรงเรียนเรยีนาเชลีวิทยาลัย  จังหวัดเชียงใหม่</b></div></center>
	  </td>
    </tr>
  </tbody>
</table>
<table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td><table width="60" border="0" align="right">
  			<tbody>
   			 <tr>
      			<td><center>  
					<div><img src="../img/images/กรอกรูป.JPG" alt="กรอกรูป"  style="width: 3.00cm; height: 4.00cm"/></div>
					<div>...........................................</div>
					<div>ลายมือชื่อนักเรียน</div>
					</center>
				</td>
    		</tr>
  			</tbody>
		</table>
	 </td>
    </tr>
  </tbody>
</table>
<table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td>
		<div><b>ข้าพเจ้า<input type="text" size="60" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $mynameTh;?>" readonly="readonly" required="required"></b>&nbsp;<b>เลขที่นั่งสอบ</b>....................................................</div>
		<div><b>เลขประจำตัว <input type="text" size="30" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="" readonly="readonly" required="required"></b>&nbsp;<b>เลขประจำตัวประชาชน  <input type="text" size="30" style="font-family: THSarabunNew; font-size: 22px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $regina_stu_datarow['IDCard'];?>" readonly="readonly" required="required"></b></div>  
	  </td>
    </tr>
  </tbody>
</table>
<table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
		<center><div><b>ใบสมัครสอบคัดเลือกนักเรียนห้องเรียน สสวท. ระดับชั้น<?php echo $leve_name;?> ปีการศึกษา <?php echo $next_year;?></b></div>
		<div><b>โรงเรียนเรยีนาเชลีวิทยาลัย  จังหวัดเชียงใหม่</b></div></center>
    </tr>
  </tbody>
</table>
<?php
if($key_key==12){ ?>
<table style="width: 740px;" border="0">
  <tbody>
    <tr>
      <td><center><div>มีความประสงค์สมัครสอบคัดเลือกห้องเรียน วิทยาศาสตร์-คณิตศาสตร์ (สสวท.) ระดับชั้นมัธยมศึกษาปีที่ 1  ปีการศึกษา 2565</div>
		  <div>และจะปฏิบัติตามระเบียบและข้อปฎบัติในการสอบทุกประการ</div></center>
	 </td>
    </tr>
  </tbody>
</table>
<table style="width: 740px;" border="1" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="3"><div><b><u><center>กำหนดการรับสมัคร</center></u></b></div></td>
    </tr>
    <tr>
      <td><div><center><b>วัน/เดือน/ปี</b></center></div></td>
      <td><div><center><b>รายการ</b></center></div></td>
      <td><div><center><b>สถานที่</b></center></div></td>
    </tr>
    <tr>
      <td><div>20 ส.ค. - 3 ก.ย. 2564</div></td>
      <td><div>สมัครสอบคัดเลือกนักเรียนห้องเรียน วิทย์ - คณิต (สสวท.)</div></td>
      <td><div>www.regina.ac.th</div></td>
    </tr>
    <tr>
      <td><div>26 พ.ย. 2564</div></td>
      <td><div>ตรวจสอบรายชื่อ เลขที่นั่งสอบ และสถานที่
สอบคัดเลือกนักเรียนห้องเรียน วิทย์ - คณิต (สสวท.)
</div></td>
      <td><div>www.regina.ac.th</div></td>
    </tr>
    <tr>
      <td><div>27 พ.ย. 2564 </div>
		  <div>เวลา 13.00 - 16.00 น.</div>
	  </td>
      <td><div>สอบคัดเลือกนักเรียนห้องเรียน วิทย์ - คณิต (สสวท.)</div>
		  <div><u>เนื้อหาที่สอบ</u>&nbsp;ความรู้วิชาคณิตศาสตร์ วิทยาศาสตร์ ภาษาอังกฤษ และความถนัดทางการเรียน (มิติสัมพันธ์)
		  <div>ระดับชั้นประถมศึกษาปีที่ 4-5 และประถมศึกษาปีที่ 6 (เฉพาะภาคเรียนที่ 1)</div>
	  </td>
      <td><div>ตามประกาศ</div></td>
    </tr>
    <tr>
      <td><div>1 ธ.ค. 2564</div></td>
      <td><div>ประกาศผลสอบคัดเลือกนักเรียนห้องเรียน วิทย์ - คณิต (สสวท.)</div></td>
      <td><div>www.regina.ac.th</div></td>
    </tr>
    <!--<tr>
	  <td><div><b><u>เนื้อหาที่สอบ</u></b></div></td>
      <td colspan="2"><div>ความรู้วิชาคณิตศาสตร์ วิทยาศาสตร์ ภาษาอังกฤษ และความถนัดทางการเรียน (มิติสัมพันธ์)</div>
      				  <div>ระดับชั้นประถมศึกษาปีที่ 4-5 และประถมศึกษาปีที่ 6 (เฉพาะภาคเรียนที่ 1)</div></td>
    </tr>-->
  </tbody>
</table>
<?php }else{ ?>
<table style="width: 740px;" border="0">
  <tbody>
    <tr>
      <td><center><div>มีความประสงค์สมัครสอบคัดเลือกห้องเรียน วิทยาศาสตร์-คณิตศาสตร์ (สสวท.) ระดับชั้นมัธยมศึกษาปีที่ 4  ปีการศึกษา 2565</div>
		  <div>และจะปฏิบัติตามระเบียบและข้อปฎบัติในการสอบทุกประการ</div></center>
	 </td>
    </tr>
  </tbody>
</table>
<table style="width: 740px;" border="1" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="3"><div><b><u><center>กำหนดการรับสมัคร</center></u></b></div></td>
    </tr>
    <tr>
      <td><div><center><b>วัน/เดือน/ปี</b></center></div></td>
      <td><div><center><b>รายการ</b></center></div></td>
      <td><div><center><b>สถานที่</b></center></div></td>
    </tr>
    <tr>
      <td><div>20 ส.ค. - 3 ก.ย. 2564</div></td>
      <td><div>สมัครสอบคัดเลือกนักเรียนห้องเรียน วิทย์ - คณิต (สสวท.)</div></td>
      <td><div>www.regina.ac.th</div></td>
    </tr>
    <tr>
      <td><div>26 พ.ย. 2564</div></td>
      <td><div>ตรวจสอบรายชื่อ เลขที่นั่งสอบ และสถานที่
สอบคัดเลือกนักเรียนห้องเรียน วิทย์ - คณิต (สสวท.)
</div></td>
      <td><div>www.regina.ac.th</div></td>
    </tr>
    <tr>
      <td><div>27 พ.ย. 2564 </div>
		  <div>เวลา 13.00 - 16.00 น.</div>
	  </td>
      <td><div>สอบคัดเลือกนักเรียนห้องเรียน วิทย์ - คณิต (สสวท.)</div>
		  <div><u>เนื้อหาที่สอบ</u>&nbsp;ความรู้วิชาคณิตศาสตร์ วิทยาศาสตร์ และภาษาอังกฤษ
		  <div>เนื้อหาระดับชั้นมัธยมศึกษาปีที่ 1-2 และมัธยมศึกษาปีที่ 3 เฉพาะภาคเรียนที่ 1</div>
	  </td>
      <td><div>ตามประกาศ</div></td>
    </tr>
    <tr>
      <td><div>1 ธ.ค. 2564</div></td>
      <td><div>ประกาศผลสอบคัดเลือกนักเรียนห้องเรียน วิทย์ - คณิต (สสวท.)</div></td>
      <td><div>www.regina.ac.th</div></td>
    </tr>
    <!--<tr>
	  <td><div><b><u>เนื้อหาที่สอบ</u></b></div></td>
      <td colspan="2"><div>ความรู้วิชาคณิตศาสตร์ วิทยาศาสตร์ และภาษาอังกฤษ</div>
      				  <div>(เนื้อหาระดับชั้นมัธยมศึกษาปีที่ 1-2 และมัธยมศึกษาปีที่ 3 เฉพาะภาคเรียนที่ 1)</div></td>
    </tr>-->
  </tbody>
</table>	
<?php }      ?>
<table style="width: 740px;" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td><div><center><b>*** กรุณานำบัตรนี้มาแสดงต่อเจ้าหน้าที่ในวันสอบด้วย ***</b></center></div></td>
    </tr>
  </tbody>
</table>
</section>	
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->		
<?php	}else{
		
	}
?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
</body>
</html>





