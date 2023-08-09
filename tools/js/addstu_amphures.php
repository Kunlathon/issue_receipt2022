<?php
	include("../database/pdo_conndatastu.php");
	include("../database/class_pdodatastu.php");

	$txt_city=filter_input(INPUT_POST,'txt_city');
?>

										<select name="stu_tumbon" id="stu_tumbon" data-placeholder="ตำบล..." class="select-size-lg">
											<option></option>
											<optgroup label="ตำบล">
								<?php
									$districtsSql="SELECT `DISTRICT_ID`,`DISTRICT_NAME`,`DISTRICT_NAME_ENG` FROM `districts` WHERE `AMPHUR_ID`='{$txt_city}';";
									$districts=new row_datastu($districtsSql);
									foreach($districts->datastu_array as $rc_key=>$districts_print){ ?>
											<option value="<?php echo $districts_print["DISTRICT_ID"];?>"><?php echo $districts_print["DISTRICT_NAME"]." / ".$districts_print["DISTRICT_NAME_ENG"];?></option>
							<?php	} ?>

											</optgroup>
										</select>