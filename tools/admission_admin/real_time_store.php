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
			<h3 class="no-margin text-semibold">แสดงข้อมูล ยอดแต่ละรายการยอด ปี <?php echo $est_year;?></h3>		
		</div>
	</div>
</div><hr>


<div class="row">
	<div class="col-<?php echo $grid;?>-12">
		<iframe src="<?php echo base_url();?>/print_admission/show_sum_store" scrolling="auto" frameborder="1" width="100%" height="500"></iframe>
	</div>
</div><hr>

