<?php
	include("tools/database/pdo_admission_rc.php");
	include("tools/database/class_admission_rc.php");	
//------------------------------------------------------------
	include("tools/database/pdo_rc_store.php");
	include("tools/database/class_rc_store.php");
//------------------------------------------------------------
	$SetYear=new SetYear();
	$est_year=$SetYear->RunSetYear();
//------------------------------------------------------------
?>
<div class="row">
	<div class="col-<?php echo $grid;?>-12">
		<div class="text">
			<h3 class="no-margin text-semibold"></h3>		
		</div>
	</div>
</div><hr>

<div class="row">
	<div class="col-<?php echo $grid;?>-12">
		<div class="panel panel-info">
			<div class="panel-heading">รายงาน ค่าเครื่องแบบนักเรียนใหม่</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<label class="control-label col-<?php echo $grid;?>-3 text-semibold">ปีการศึกษา</label>
							<div class="col-<?php echo $grid;?>-9">
								<select data-placeholder="ปีการศึกษา..." name="RRSYear" id="RRSYear" class="select">
									<option></option>
									<optgroup label="ปีการศึกษา">
										<option value="2566">2566</option>
										<option value="2565">2565</option>
									</optgroup>
								</select>
							</div>						
						</fieldset>
					</div>
					<div class="col-<?php echo $grid;?>-6">
						<fieldset class="content-group">
							<label class="control-label col-<?php echo $grid;?>-2 text-semibold">วันที่</label>
							<div class="col-<?php echo $grid;?>-10">
								<input type="text" name="RRSData" id="RRSData" class="form-control daterange-basic">								
							</div>						
						</fieldset>									
					</div>
				</div>
				<div></div>
				<div class="row">
					<div class="col-<?php echo $grid;?>-12">
						<button type="button" id="but_rrs" name="but_rrs" class="btn btn-success">แสดง รายงาน</button>
					</div>				
				</div>
			</div>
		</div>		
	</div>
</div>

<div id="RunRRS"></div>