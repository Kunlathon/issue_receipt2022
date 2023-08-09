<?php
	include("../database/pdo_conndatastu.php");
	include("../database/class_pdodatastu.php");
	
	$txt_zip=filter_input(INPUT_POST,'txt_zip');


	$districtsSql="SELECT `DISTRICT_CODE` FROM `districts` WHERE `DISTRICT_ID`='{$txt_zip}'";
	$districtsRs=new notrow_datastu($districtsSql);
	foreach($districtsRs->datastu_array as $rc_key=>$districtsRow){
		$DISTRICT_CODE=$districtsRow["DISTRICT_CODE"];
			$zipSql="SELECT `id`,`district_code`,`zipcode` FROM `zipcodes` WHERE `district_code`='{$DISTRICT_CODE}';";
			$zipRs=new notrow_datastu($zipSql);
			foreach($zipRs->datastu_array as $rc_key=>$zipRow){
			$zipcode=$zipRow["zipcode"]; ?>
				<input type="text" name="stu_zipcode" id="stu_zipcodecopy" class="form-control" placeholder="รหัสไปรษณีย์" readonly="readonly" value="<?php echo $zipcode;?>" size="100" maxlength="6" >
<?php	}		
		
	} ?>



