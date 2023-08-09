<?php
	include("../database/pdo_conndatastu.php");
	include("../database/class_pdodatastu.php");

	$txt_province=filter_input(INPUT_POST,'txt_province');
?>

										<select name="stu_amphur" id="stu_amphur" data-placeholder="อำเภอ..." class="select-size-lg">
											<option></option>
											<optgroup label="อำเภอ">
											
							<?php
								$amphuresSql="SELECT `AMPHUR_ID`,`AMPHUR_NAME`,`AMPHUR_NAME_ENG` FROM `amphures` WHERE `PROVINCE_ID`='{$txt_province}'";
								$amphuresRs=new row_datastu($amphuresSql);
								foreach($amphuresRs->datastu_array as $rc_key=>$amphuresRow){ ?>
												<option value="<?php echo $amphuresRow["AMPHUR_ID"];?>"><?php echo $amphuresRow["AMPHUR_NAME"]." / ".$amphuresRow["AMPHUR_NAME_ENG"];?></option>
						<?php	}   ?>				
											</optgroup>
										</select>