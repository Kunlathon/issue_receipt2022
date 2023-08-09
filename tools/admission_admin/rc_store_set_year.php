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
			<h3 class="no-margin text-semibold">ตั้งค่าปีการศึกษาใบแทนใบเสร็จรับเงิน ค่าเครื่องแบบนักเรียน</h3>		
		</div>
	</div>
</div><hr>


	<script>
		$(document).ready(function (){
			$('#sweet_combine').on('click', function() {
				swal({
					title: "คุณแน่ใจใช้ไหม",
					text:  "ต้องการบันทึกผลการเปลียนแปลง",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#EF5350",
					confirmButtonText: "ต้องการบันทึก",
					cancelButtonText: "ไม่ต้องการบันทึก",
					closeOnConfirm: false,
					closeOnCancel: false
				},
				function(isConfirm){
					if (isConfirm) {
						swal({
							title: "บันทึก",
							text: "คุณต้องการบันทึกใช้หรือไหม",
							confirmButtonColor: "#66BB6A",
							type: "success"
						},function(){
							var ssy_year=$("#ssy_year").val();
							$.post("<?php echo base_url();?>tools/admission_admin/mod/rc_store_set_year/ssy_year.php",{
								SsyYear:ssy_year
							},function(SSYYear){
								if(SSYYear){
									document.location="<?php echo base_url();?>admission/admin?admission_mod=rc_store_set_year";
								}else{}
							})
						});
					}
					else {
						swal({
							title: "เกิดข้อผิดพลาด",
							text: "คุณบันทึกข้อมูลไม่สำเร็จ",
							confirmButtonColor: "#2196F3",
							type: "error"
						});
					}
				});
			});
		})
	</script>


<div class="row">
	<div class="col-<?php echo $grid;?>-12">
		<div class="panel panel-body border-top-pink">
			
			<fieldset class="content-group">			
				<div class="row">
					<div class="col-<?php echo $grid;?>-6">
						<div class="form-group">
							<label class="control-label col-<?php echo $grid;?>-3">ตั้งค่าปีการศึกษา</label>
							<div class="col-<?php echo $grid;?>-9">
								<input type="text" name="ssy_year" id="ssy_year" class="form-control text-pink text-uppercase text-semibold text-size-small" value="<?php echo $est_year;?>">
							</div>
						</div>					
					</div>
					<div class="col-<?php echo $grid;?>-6">
						<div class="form-group">
							<div class="col-<?php echo $grid;?>-12">
								<button type="button" id="sweet_combine" class="btn btn-success">ตั้งค่า</button>
							</div>
						</div>					
					</div>
				</div>
			</fieldset>			




							
		</div>	
	
	</div>
</div>
