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
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<script>
	$(document).ready(function(){
		$("#GoRcStore").click(function(){
			document.location="<?php echo $goinglink;?>/admission/admin?admission_mod=rc_store";
		})
	}) 
</script>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<div class="row">
	<div class="col-<?php echo $grid;?>-12">
		<div class="text">
			<h3 class="no-margin text-semibold">ชำระเงินค่าบำรุงสมาคมสถานศึกษาเอกชนจังหวัดเชียงใหม่</h3>		
		</div>
	</div>
</div><hr>

<?php 
	$count_rs=filter_input(INPUT_POST,'count_rs');
	$store_key=filter_input(INPUT_POST,'store_key');
	$RSR_Pay=filter_input(INPUT_POST,'RSR_Pay');
	$sid_id=filter_input(INPUT_POST,'sid_id');

	//echo $sid_id."+++++++++";


		if(isset($count_rs,$store_key)){
			$AgainStore=new AgainStore($store_key,$est_year);
			//$CopyAgainStore=$AgainStore->RunAgainStore();
			$CopyAgainStore=0;
				if(($CopyAgainStore>=1)){ ?>
<div class="row">
	<div class="col-<?php echo $grid;?>-12">
		<div class="content-group-lg">
			<div class="alert alert-danger alert-styled-left">
				รายการใบชำระค่าบำรุงสมาคมสถานศึกษาเอกชนจังหวัดเชียงใหม่&nbsp;ซ้ำ&nbsp;ไม่สามารถดำเนินการได้		
			</div>
		</div>
	</div>
</div>	
<hr>	
<div class="row">
	<div class="col-<?php echo $grid;?>-12">
	
	</div>
</div>	

				
<?php			}else{
					$AddDataStore=new AddDataStore($store_key,$est_year,$ls_key,$RSR_Pay,$sid_id);
						if($AddDataStore->RunADS_Error()=="ON"){
							$count_rsc=0;
							while($count_rsc<$count_rs){
								$RSC_Sum=filter_input(INPUT_POST,'incom'.$count_rsc.'');
								$RSR_Key=filter_input(INPUT_POST,'RSR_Key'.$count_rsc.'');
								$AddStore_List=new AddStore_List($AddDataStore->RunCountOn(),$RSR_Key,$RSC_Sum);
									if($AddStore_List->RunAddStore_List()=="ON"){
										$RSC_Error="ON";
									}elseif($AddStore_List->RunAddStore_List()=="YES"){
										$RSC_Error="YES";
									}else{
										$RSC_Error="YES";
									}
								$count_rsc=$count_rsc+1;
							}
								if($RSC_Error=="ON"){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php
	$Call_Rcstore_Receipt=new DataRcstoreReceipt($store_key,$est_year,"A");
		foreach($Call_Rcstore_Receipt->RunDataRcstoreReceipt() as $rc=>$CRR_Row){
			$CRR_RSR_NO=$CRR_Row["RSR_NO"];
			$CRR_RSR_Sud=$CRR_Row["RSR_Sud"];
			$CRR_RSR_Year=$CRR_Row["RSR_Year"];
			$CRR_RSR_DateTime=$CRR_Row["RSR_DateTime"];
			$CRR_RSR_Officer=$CRR_Row["RSR_Officer"];
		}
	$StorePRC=new PrintReginaClass($store_key,$est_year);
?>								
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->								
<div class="row">
	<div class="col-<?php echo $grid;?>-12">
		<div class="content-group-<?php echo $grid;?>">
			<div class="alert alert-success alert-styled-left">
				รายการใบชำระค่าบำรุงสมาคมสถานศึกษาเอกชนจังหวัดเชียงใหม่ สำเร็จ								
			</div>
		</div>								
	</div>
</div>
<hr>	
<div class="row">
	<div class="col-<?php echo $grid;?>-12">
	    <a href="<?php echo $goinglink;?>/print_admission/store_pay/<?php echo $CRR_RSR_NO;?>/<?php echo $CRR_RSR_Sud;?>/<?php echo $est_year;?>" target="_blank"><button type="button" class="btn btn-success" class="btn btn-info btn-lg">พิมพ์</button></a>
		<button type="button" id="GoRcStore" class="btn btn-info">กลับไปทำรายการใหม่</button>
	</div>
</div>							
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->	
<?php							}elseif($RSC_Error=="YES"){ 
									$DeleteStore=new DeleteStore($AddDataStore->RunCountOn());
								?>
<div class="row">
	<div class="col-<?php echo $grid;?>-12">
		<div class="content-group-<?php echo $grid;?>">
			<div class="alert alert-danger alert-styled-left">
				รายการใบชำระค่าบำรุงสมาคมสถานศึกษาเอกชนจังหวัดเชียงใหม่ ไม่ถูกต้อง กรุณาจำทำรายการใหม่		
			</div>
		</div>
	</div>
</div>
<hr>	
<div class="row">
	<div class="col-<?php echo $grid;?>-12">
		<button type="button" id="GoRcStore" class="btn btn-info">กลับไปทำรายการใหม่</button>
	</div>
</div>								
<?php							}else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<div class="row">
	<div class="col-<?php echo $grid;?>-12">
		<div class="content-group-<?php echo $grid;?>">
			<div class="alert alert-danger alert-styled-left">
				รายการใบชำระค่าบำรุงสมาคมสถานศึกษาเอกชนจังหวัดเชียงใหม่ เกิดข้อผิดพลาดไม่สามารถดำเนินการได้		
			</div>
		</div>
	</div>
</div>
<hr>	
<div class="row">
	<div class="col-<?php echo $grid;?>-12">
		<button type="button" id="GoRcStore" class="btn btn-info">กลับไปทำรายการใหม่</button>
	</div>
</div>					
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->				
<?php							}
						}elseif($AddDataStore->RunADS_Error()=="YES"){	?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<div class="row">
	<div class="col-<?php echo $grid;?>-12">
		<div class="content-group-<?php echo $grid;?>">
			<div class="alert alert-danger alert-styled-left">
				รายการใบชำระค่าบำรุงสมาคมสถานศึกษาเอกชนจังหวัดเชียงใหม่ เกิดข้อผิดพลาดไม่สามารถดำเนินการได้
			</div>
		</div>
	</div>
</div>
<hr>	
<div class="row">
	<div class="col-<?php echo $grid;?>-12">
		<button type="button" id="GoRcStore" class="btn btn-info">กลับไปทำรายการใหม่</button>
	</div>
</div>				
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->			
<?php					}else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<div class="row">
	<div class="col-<?php echo $grid;?>-12">
		<div class="content-group-<?php echo $grid;?>">
			<div class="alert alert-danger alert-styled-left">
				รายการใบชำระค่าบำรุงสมาคมสถานศึกษาเอกชนจังหวัดเชียงใหม่ เกิดข้อผิดพลาดไม่สามารถดำเนินการได้		
			</div>
		</div>
	</div>
</div>
<hr>	
<div class="row">
	<div class="col-<?php echo $grid;?>-12">
		<button type="button" id="GoRcStore" class="btn btn-info">กลับไปทำรายการใหม่</button>
	</div>
</div>		
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php					}						
				}
		}else{	?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<div class="row">
	<div class="col-<?php echo $grid;?>-12">
		<div class="content-group-<?php echo $grid;?>">
			<div class="alert alert-danger alert-styled-left">
				รายการใบชำระค่าบำรุงสมาคมสถานศึกษาเอกชนจังหวัดเชียงใหม่ เกิดข้อผิดพลาดไม่สามารถดำเนินการได้		
			</div>
		</div>
	</div>
</div>
<hr>		
<div class="row">
	<div class="col-<?php echo $grid;?>-12">
		<button type="button" id="GoRcStore" class="btn btn-info">กลับไปทำรายการใหม่</button>
	</div>
</div>	
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->			
<?php	} ?>