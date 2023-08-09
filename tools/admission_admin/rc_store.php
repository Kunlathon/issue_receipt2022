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
			<h3 class="no-margin text-semibold">ใบแทนใบเสร็จรับเงิน ค่าเครื่องแบบนักเรียน</h3>		
		</div>
	</div>
</div><hr>
<form name="rc_store" action="<?php echo base_url();?>admission/admin?admission_mod=rc_store_code" method="post" accept-charset="utf-8">
<div class="row">
	<div class="col-<?php echo $grid;?>-12">
		<div class="panel panel-body border-top-primary">
			<div class="row">
				<fieldset class="content-group">
					<div class="col-<?php echo $grid;?>-9">
						<div class="form-group">
							<label class="control-label col-<?php echo $grid;?>-3">ค้นหารายชื่อโรงเรียนเอกชน</label>
							<div class="col-<?php echo $grid;?>-9">
								<select data-placeholder="ค้นหารายชื่อโรงเรียนเอกชน..." name="store_key" id="store_key" class="select-search" title="ค้นหารายชื่อโรงเรียนเอกชน">
									<option></option>
									<optgroup label="รายชื่อโรงเรียนเอกชน">
									
							<?php
								$DataAdmission=new RowReginaClass($est_year);
									foreach($DataAdmission->RunRowReginaClass() as $rc=>$DataAdmissionRow){
										$myname_admission=new PrintStudentAdmission($DataAdmissionRow["rc_IDReg"]);
										?>
										<option value="<?php echo $DataAdmissionRow["rc_IDReg"];?>"><?php echo $myname_admission->fnameTh;?></option>
							<?php	} ?>		
									
									</optgroup>
								</select>	
							</div>
						</div>					
					</div>
					<div class="col-<?php echo $grid;?>-3">
						<button type="button" name="store_button" id="store_button" class="btn bg-purple-400 btn-ladda btn-ladda-progress" data-style="slide-left"><span class="ladda-label">ค้นหา...</span></button>
					</div>				
				</fieldset>
			</div>

		</div>
	</div>
</div>

<div id="RunRcData"></div>

</form>