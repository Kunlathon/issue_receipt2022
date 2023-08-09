<?php
	date_default_timezone_set('Asia/Bangkok');
	include("database/pdo_data.php");
	include("database/class_pdo.php");
	
	include("database/pdo_conndatastu.php");
	include("database/class_pdodatastu.php");
	
	include("database/pdo_admission.php");
	include("database/class_admission.php");
	
	
	$call_Identification=filter_input(INPUT_POST,'call_Identification');
	
	
		function datatimeA($strDate){
	        $strYear = date("Y",strtotime($strDate))+543;
	        $strMonth= date("n",strtotime($strDate));
	        $strDay= date("j",strtotime($strDate));
	        $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
	        $strMonthThai=$strMonthCut[$strMonth];
	        return "$strDay $strMonthThai $strYear";
	    }
		
		function datatimeB($strDate){
			
				if($strDate==""){//y-m-d
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

<?php
	if($call_Identification==""){
		
	}else{ 
		$call_Identification=filter_input(INPUT_POST,'call_Identification');
		$call_y=65;
		$call_year=2565;
?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->		
<!doctype html>
<html>
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
<style>
@font-face {
	font-family: 'THSarabunNew';
	src: url('font/thsarabunnew-webfont.eot');
	src: url('font/thsarabunnew-webfont.eot?#iefix') format('embedded-opentype'),
	url('font/thsarabunnew-webfont.woff') format('woff'),
	url('font/THSarabunNew.ttf') format('truetype');
}	
	
body{
	font-family: "THSarabunNew";
	font-size: 18px;
	color: #060606;
}
</style>	

<style type="text/css" >

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
		font-size: 19pt; 

		background: white;
		
	}
	
	#fontA{
		font-family: "THSarabunNew";
		font-size: 16pt; 

		background: white;		
	}

  
}


@page 
    {
        size: auto;   /* กำหนดขนาดของหน้าเอกสารเป็นออโต้ครับ */
        margin: 8mm;  /* กำหนดขอบกระดาษเป็น 0 มม. */
    }

    body 
    {
        margin: 8px;  /* เป็นการกำหนดขอบกระดาษของเนื้อหาที่จะพิมพ์ก่อนที่จะส่งไปให้เครื่องพิมพ์ครับ */
    }
	
@media(max-width: 450px) {
		#rotate-right {
		display: none;
		}	
	}

@media(max-width: 400px) {
		#buttons, #pageselector-container {
		display: none;
		}

	}	
	
</style>	
	
</head>

<body onload="window.print()" style="width:42em;margin:20px auto;">
<button type="button" class="btn btn-default" onclick="window.print()">พิมพ์เอกสารใบมอบตัว</button>
<div id="p_echo" ><font color="#F70105"><p><b>ระบบการพิมพ์เอกสารใบมอบตัว ระบบจะรองรับ เว็บเบราว์เซอร์  Google Chrome และ  Microsoft Edge<b></p></font></div>
	
	
<?php

	$rc_student_admissionSql="SELECT * FROM `rc_student_admission` 
						      WHERE `IDReg` LIKE '{$call_y}%' and `IDCard`='{$call_Identification}'";
	$rc_student_admissionRs=new notrow_admission($rc_student_admissionSql);
	foreach($rc_student_admissionRs->notrow_admission_print() as $admin=>$rc_student_admissionRow){
			
		$stu_prefix=$rc_student_admissionRow["stu_prefix"];
		$stu_txt=new printstu_prefix($stu_prefix);
	
		$stunameTh=$stu_txt->prefix_prefix_SName." ".$rc_student_admissionRow["stu_fname"]." ".$rc_student_admissionRow["stu_sname"];
		$stunameEn="Miss ".$rc_student_admissionRow["stu_fname_e"]." ".$rc_student_admissionRow["stu_sname_e"];

		$nickEn=strtolower($rc_student_admissionRow["nickEn"]);
		$nickEn=ucwords($rc_student_admissionRow["nickEn"]);

		$stu_birth=$rc_student_admissionRow["stu_birth"];
		$stu_birth=datatimeB($stu_birth);	
		$stu_birth=datatimeA($stu_birth);

		$stu_nation=new db_country($rc_student_admissionRow["stu_nation"]);
		$stu_sun=new db_country($rc_student_admissionRow["stu_sun"]);

		$call_IDReligion=new rc_religion($rc_student_admissionRow["IDReligion"]);
		 


	}
	
	$rc_student_family_admissionSql="SELECT * FROM `rc_student_family_admission` WHERE `IDReg`='{$rc_student_admissionRow["IDReg"]}'";
	$rc_student_family_admissionRs=new notrow_admission($rc_student_family_admissionSql);
	foreach($rc_student_family_admissionRs->notrow_admission_print() as $admin=>$rc_student_family_admissionRow){
		$father_prefix=new printstu_prefix($rc_student_family_admissionRow["father_prefix"]);   
		$mother_prefix=new printstu_prefix($rc_student_family_admissionRow["mother_prefix"]);  
		$parent_prefix=new printstu_prefix($rc_student_family_admissionRow["parent_prefix"]);  
		
		
	}
		
	
	$rc_student_levelSql="SELECT * FROM `rc_student_level` WHERE `IDReg`='{$rc_student_admissionRow["IDReg"]}'";
	$rc_student_levelRs=new notrow_admission($rc_student_levelSql);
	foreach($rc_student_levelRs->notrow_admission_print() as $admin=>$rc_student_levelRow){
		
		if($rc_student_levelRow["stu_level"]==2){
			$callto_level="อนุบาล 2";			
		}else{
			$data_class=new call_level($rc_student_levelRow["stu_level"]);			
			$callto_level=$data_class->Lname;
		}
		

		
		
	}
	
	
	switch($rc_student_admissionRow["stu_level"]){
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
	
	
?>
<!--//////////////////////////////////////////////////////////////////-->
<table width="1024" border="0" cellpadding="0" cellspacing="0">
	<tbody>
    	<tr>
      		<td width="182">
				<div><img src="img/logoserviam.png" alt="โรงเรียนเรยีนาเชลีวิทยาลัย จังหวัดเชียงใหม่"  style="width: 85px; height: 89px;"/></div>
				<div>
					<table width="181" border="1"  cellpadding="0" cellspacing="0">
  						<tbody>
    						<tr>
      							<td><div>&nbsp;เลขที่ใบสมัคร&nbsp;<?php echo $rc_student_admissionRow["IDReg"];?>&nbsp;<b></b></div></td>
    						</tr>
  						</tbody>
					</table>
			  </div>
				
			</td>
			
   		  <td width="670"><center>
				<div style="font-family: THSarabunNew; font-size: 30px;"><b>ใบสมัครเพื่อเข้าศึกษาต่อชั้น <?php echo $txt_level;?> ปีการศึกษา <?php echo $call_year;?></b></div> 
				<div style="font-family: THSarabunNew; font-size: 30px;"><b>โรงเรียนเรยีนาเชลีวิทยาลัย จังหวัดเชียงใหม่</b></div>
				<!--<div style="font-family: THSarabunNew; font-size: 30px;"><b></b></div>-->
			  	<div>
					<?php
						if ($rc_student_admissionRow["stu_level"] >= 41) {
							$row_p1=new print_planAdmission($rc_student_levelRow["stu_plan1"]);
							$row_p2=new print_planAdmission($rc_student_levelRow["stu_plan2"]);

						?>					
					<table width="500" border="1" cellpadding="0" cellspacing="0">
					  <tbody>
						<tr>
						  <td>
							<center>
							<div>1. <?php echo $row_p1->plan_LName;?></div>  
							<div>2. <?php echo $row_p2->plan_LName;?></div>  
							</center>
						  </td>
						</tr>
					  </tbody>
					</table>			
			
				<?php	}else{
							//**************************************************
						}
				?>
			  	</div>
			  </center>
		  </td>
      		<td width="158"><img src="img/กรอกรูป.JPG" style="width: 158px; height: 196px;" alt="กรอกรูป"/></td>
    	</tr>
	</tbody>
</table>

<table  style="width: 1024px" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr><div><b>1. ข้อมูลนักเรียน</b></div></tr>
  </tbody>
</table>

<table width="1024" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td>
		<div><b>ชื่อ-สกุล ภาษาไทย</b>&nbsp;<input type="text" size="40" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $stunameTh;?>" readonly="readonly" required="required">&nbsp;<b>ชื่อ-สกุล ภาษาอังกฤษ</b>&nbsp;<input type="text" size="40" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px;" value="<?php echo $stunameEn;?>" readonly="readonly" required="required"></div>
		<div><b>ชื่อเล่น (ภาษาไทย)</b>&nbsp;<input type="text" size="40" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px; text-align: center; border:0px;" value="<?php echo $rc_student_admissionRow["nickTh"];?>" readonly="readonly" required="required">&nbsp;<b>ชื่อเล่น (ภาษาอังกฤษ)</b>&nbsp;<input type="text" size="40" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px;" value="<?php echo $nickEn;?>" readonly="readonly" required="required"></div>
		<div><b>เลขบัตรประชาชน</b>&nbsp;<input type="text" size="15" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px;" value="<?php echo $rc_student_admissionRow["IDCard"];?>" readonly="readonly" required="required">&nbsp;<b>วัน/เดือน/ปี เกิด</b>&nbsp;<input type="text" size="10" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px;" value="<?php echo $stu_birth;?>" readonly="readonly" required="required">&nbsp;<b>เชื้อชาติ</b>&nbsp;<input type="text" size="20" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px;" value="<?php echo $stu_nation->nation_name_th;?>" readonly="readonly" required="required">&nbsp;<b>สัญชาติ</b>&nbsp;<input type="text" size="20" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px;" value="<?php echo $stu_sun->nation_name_th;?>" readonly="readonly" required="required"><b>ศาสนา</b>&nbsp;
		<input type="text" size="20" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px;" value="<?php echo $call_IDReligion->Religion;?>" readonly="readonly" required="required">&nbsp;<b>ที่อยู่ปัจจุบัน บ้านเลขที่</b>&nbsp;<input type="text" size="10" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px;" value="<?php echo $rc_student_admissionRow['stu_hno'];?>" readonly="readonly" required="required">&nbsp;<b>หมู่ที่</b>&nbsp;<input type="text" size="5" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px;" value="<?php echo $rc_student_admissionRow['stu_moo'];?>" readonly="readonly" required="required">&nbsp;<b>ซอย</b>&nbsp;<input type="text" size="20" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px;" value="<?php echo $rc_student_admissionRow['stu_soi'];?>" readonly="readonly" required="required">
		</div>	
		
		
		
		<div>
		
		<b>ถนน</b>&nbsp;<input type="text" size="20" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px;" value="<?php echo $rc_student_admissionRow["stu_road"];?>" readonly="readonly" required="required">
		
		
		
		
		<?php
			$District=new data_District($rc_student_admissionRow["stu_amphur"]);//อำเภอ
			$Province=new data_Province($rc_student_admissionRow["stu_province"]);//จังหวัด
			$Subdistrict=new data_Subdistrict($rc_student_admissionRow["stu_tumbon"]);//ตำบล
		
		?>
		
		
		<b>ตำบล</b>&nbsp;<input type="text" size="20" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px;" value="<?php echo $Subdistrict->DISTRICT_NAME;?>" readonly="readonly" required="required">
		<b>อำเภอ</b>&nbsp;<input type="text" size="20" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px;" value="<?php echo $District->AMPHUR_NAME;?>" readonly="readonly" required="required">
		<b>จังหวัด</b>&nbsp;<input type="text" size="20" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px;" value="<?php echo $Province->PROVINCE_NAME;?>" readonly="readonly" required="required">
		</div>
		<div>
		<b>รหัสไปรษณีย์</b>&nbsp;<input type="text" size="20" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px;" value="<?php echo $rc_student_admissionRow['stu_zipcode'];?>" readonly="readonly" required="required">
		</div>
			

		<p>
			<div>
				<b>ปัจจุบันกำลังศึกษาอยู่ในระดับชั้น</b>&nbsp;<input type="text" size="20" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px;" value="<?php echo $callto_level;?>" readonly="readonly" required="required">&nbsp;<b>โรงเรียน</b>&nbsp;<input type="text" size="60" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px;" value="<?php echo $rc_student_levelRow["stu_oldsch"];?>" readonly="readonly" required="required">
		  	</div>
		  	<div>
		  		<b>จังหวัด</b>&nbsp;<input type="text" size="40" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px;" value="<?php echo $rc_student_levelRow["stu_schprovince"];?>" readonly="readonly" required="required">&nbsp;<b>เกรดเฉลี่ยสะสม</b>&nbsp;<input type="text" size="10" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px;" value="<?php echo $rc_student_levelRow["stu_avg"];?>" readonly="readonly" required="required">
		  	</div>
		</p>
		  
	  </td>
    </tr>
  </tbody>
</table>
<table width="1024" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td><div><b>2. ข้อมูลบิดา-มารดา-ผู้ปกครอง</b></div></td>
    </tr>
  </tbody>
</table>

<table width="1024" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td>
  
		<div><b>ชื่อ-สกุลบิดา</b>&nbsp;<input type="text" size="50" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px;" value="<?php echo $father_prefix->prefix_prefix_SName.''.$rc_student_family_admissionRow['father_fname'].'  '.$rc_student_family_admissionRow['father_sname']?>" readonly="readonly" required="required">&nbsp;<b>เบอร์โทรศัพท์</b>&nbsp;<input type="text" size="20" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px;" value="<?php echo $rc_student_family_admissionRow['father_tel'];?>" readonly="readonly" required="required"></div>
		<div><b>เลขบัตรประชาชน</b>&nbsp;<input type="text" size="30" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px;" value="<?php echo $rc_student_family_admissionRow['father_code'];?>" readonly="readonly" required="required">&nbsp;<b>Email Address</b>&nbsp;<input type="text" size="50" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px;" value="<?php echo $rc_student_family_admissionRow["father_email"];?>" readonly="readonly" required="required"></div>
		 
		<p>
		
			
		<div><b>ชื่อ-สกุลมารดา</b>&nbsp;<input type="text" size="50" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px;" value="<?php echo $mother_prefix->prefix_prefix_SName.''.$rc_student_family_admissionRow['mother_fname'].'  '.$rc_student_family_admissionRow['mother_sname'];?>" readonly="readonly" required="required">&nbsp;<b>เบอร์โทรศัพท์</b>&nbsp;<input type="text" size="20" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px;" value="<?php echo $rc_student_family_admissionRow['mother_tel'];?>" readonly="readonly" required="required"></div>
		<div><b>เลขบัตรประชาชน</b>&nbsp;<input type="text" size="30" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px;" value="<?php echo $rc_student_family_admissionRow['mother_code'];?>" readonly="readonly" required="required">&nbsp;<b>Email Address</b>&nbsp;<input type="text" size="50" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px;" value="<?php echo $rc_student_family_admissionRow['mother_email'];?>" readonly="readonly" required="required"></div>
		</p>  
	  
	  	<p>
		<div><b>ชื่อ-สกุลผู้ปกครอง</b>&nbsp;<input type="text" size="50" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px;" value="<?php echo $parent_prefix->prefix_prefix_SName.''.$rc_student_family_admissionRow['parent_fname'].'  '.$rc_student_family_admissionRow['parent_sname'];?>" readonly="readonly" required="required">&nbsp;<b>ความสัมพันธ์</b>&nbsp;<input type="text" size="20" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px;" value="<?php echo $rc_student_family_admissionRow['parent_stu'];?>" readonly="readonly" required="required"></div>
		<div><b>เบอร์โทรศัพท์</b>&nbsp;<input type="text" size="20" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px;" value="<?php echo $rc_student_family_admissionRow['parent_phone'];?>" readonly="readonly" required="required">&nbsp;<b>เลขบัตรประชาชน</b>&nbsp;<input type="text" size="20" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px;" value="<?php echo $rc_student_family_admissionRow["parent_code"];?>" readonly="readonly" required="required">&nbsp;<b>Email Address</b>&nbsp;<input type="text" size="28" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px;" value="<?php echo $rc_student_family_admissionRow['parent_email'];?>" readonly="readonly" required="required"></div>
		</p>
	  
	  </td>
    </tr>
  </tbody>
</table>
<p><table width="1024" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td><div><b>3. ข้าพเจ้าจะปฏิบัติตามระเบียบการสมัครนักเรียนเพื่อเข้าศึกษาต่อชั้น <?php echo $txt_level;?> ประจำปีการศึกษา <?php echo $call_year;?> ของโรงเรียนเรยีนาเชลีวิทยาลัยทุกประการ และได้แนบเอกสารประกอบการสมัครมาพร้อมกับใบสมัครนี้โดยครบถ้วนแล้ว</b></div></td>
    </tr>
  </tbody>
</table></p>
<table width="1024" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td>
		<div>
			<table width="612" border="1" cellpadding="0" cellspacing="0">
			  <tbody>
				<tr>
				  <td>
					<div><p><center><b>กรุณาเตรียมเอกสารดังต่อไปนี้เพื่อใช้ประกอบการสมัคร</b></center></p></div>
					<div>&nbsp;<input type="checkbox" disabled="disabled" required="required" readonly="readonly">&nbsp;รูปถ่ายนักเรียน ขนาด 1.5 นิ้ว จำนวน 3 ใบ (ถ่ายไว้ไม่เกิน 6 เดือน)&nbsp;</div>
					<div>&nbsp;<input type="checkbox" disabled="disabled">&nbsp;สำเนาสูติบัตรนักเรียน จำนวน 1 ฉบับ&nbsp;</div>
					<div>&nbsp;<input type="checkbox" disabled="disabled">&nbsp;สำเนาทะเบียนบ้านนักเรียน จำนวน 1 ฉบับ&nbsp;</div>
					<div>&nbsp;<input type="checkbox" disabled="disabled">&nbsp;สำเนาใบเปลี่ยนชื่อ-สกุล (ถ้ามี)&nbsp;</div>
					<div>&nbsp;<input type="checkbox" disabled="disabled">&nbsp;หนังสือรับรองการเป็นนักเรียนจากสถานศึกษา หรือสำเนาเอกสารแสดงผลการเรียน &nbsp;</div>
					<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; หรือหนังสือรับรองผลการเรียน&nbsp;</div>
					<?php
						if($rc_student_admissionRow["stu_level"]==11){ ?>
					<div></div>		
					<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;กรณีโควตาภายนอก</div>	
					<div>&nbsp;<input type="checkbox" disabled="disabled">&nbsp;ใบรับรองนักเรียนโควตาโรงเรียนเรยีนาเชลีวิทยาลัย&nbsp;</div>							
					<?php	}else{ ?>
 					
					<?php	}      ?>
					
					<br>
					<br>
					<br>
				  </td>
				</tr>
			  </tbody>
			</table>
		</div>
	  </td>
      <td>
		<p><center><div>ลงชื่อ<input type="text" size="50" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px;" value="<?php echo $parent_prefix->prefix_prefix_SName.''.$rc_student_family_admissionRow['parent_fname'].'  '.$rc_student_family_admissionRow['parent_sname'];?>" readonly="readonly" required="required">ผู้ปกครอง</div>
		<div>วันที่<input type="text" size="20" style="font-family: THSarabunNew; font-size: 24px; text-align: center; border:0px;" value="" readonly="readonly" required="required"></div></center></p>
		  
		<p><center><div>ลงชื่อ.............................................ผู้ตรวจเอกสาร</div>
		<div>(.....................................................)</div></center></p>
		
	  
		  
	  </td>
    </tr>
  </tbody>
</table>	


<!--//////////////////////////////////////////////////////////////////-->		
</body>
</html>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->		

	<?php } ?>

