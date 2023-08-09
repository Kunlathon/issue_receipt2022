<?php
	include("../../../../tools/database/pdo_admission_rc.php");
	include("../../../../tools/database/class_admission_rc.php");
//----------------------------------------------------------------------------	
	include("../../../../tools/database/pdo_rc_store.php");
	include("../../../../tools/database/class_rc_store.php");
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------	
	include("../../../../tools/sql_pdo/gotolink.php");
	$ip_admission=$_SERVER["REMOTE_ADDR"];
	$golink=new goingtolink($ip_admission);
	$goinglink=$golink->Rungotolink(); 
//---------------------------------------------------------------------------
	$SetYear=new SetYear();
	$est_year=$SetYear->RunSetYear();
//---------------------------------------------------------------------------	
?>
<?php
	$StoreKey=filter_input(INPUT_POST,'StoreKey');
		if(isset($StoreKey)){ 
			$StorePRC=new PrintReginaClass($StoreKey,$est_year);
?>		
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<script>
	$(document).ready(function(){
		$("#RSBtn").click(function(){
			$("#RSModal").modal({backdrop: false});
		});
	});
</script>
<!--****************************************************************************-->	
<!--****************************************************************************-->	
<script>
	$(document).ready(function(){
		// Checkboxes and radios
		$(".styled").uniform({
			wrapperClass: "border-purple text-purple-600"
		});
		// File input
		$(".file-styled").uniform({
			fileButtonClass: 'action btn bg-purple'
		});		
	})
</script>		
<!--****************************************************************************-->			
    <script type="text/javascript">
        function setScreenHWCookie() {
            $.cookie('sw',screen.width);
                //$.cookie('sh',screen.height);
            return true;
        }
            setScreenHWCookie();
    </script>
<!--****************************************************************************-->
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
<script>
	$(document).ready(function(){
		$("#GoRcStore").click(function(){
			document.location="<?php echo $goinglink;?>/admission/admin?admission_mod=rc_store";
		})
	}) 
</script>		
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->			
	<?php
		$AgainStore=new AgainStore($StoreKey,$est_year);
		//$Copy_AgainStore=$AgainStore->RunAgainStore();
		  $copy_AgainStroe=0;
			if(($Copy_AgainStore>=1)){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php
	$Call_Rcstore_Receipt=new DataRcstoreReceipt($StoreKey,$est_year,"A");
		foreach($Call_Rcstore_Receipt->RunDataRcstoreReceipt() as $rc=>$CRR_Row){
			$CRR_RSR_NO=$CRR_Row["RSR_NO"];
			$CRR_RSR_Sud=$CRR_Row["RSR_Sud"];
			$CRR_RSR_Year=$CRR_Row["RSR_Year"];
			$CRR_RSR_DateTime=$CRR_Row["RSR_DateTime"];
			$CRR_RSR_Officer=$CRR_Row["RSR_Officer"];
		}
?>

<!--****************************************************************************-->	
<script>
	$(document).ready(function(){
		$('#sweet_loader').on('click', function() {
			swal({
				title: "ยกเลิกใบแทนใบเสร็จรับเงิน",
				text: "ต้องการยกเลิกใบแทนใบเสร็จรับเงิน เลขที่ <?php echo $CRR_RSR_NO;?> ใช้ไหม",
				type: "info",
				showCancelButton: true,
				closeOnConfirm: false,
				confirmButtonColor: "#2196F3",
				showLoaderOnConfirm: true
			},
			function() {
				setTimeout(function() {
					swal({
						title: "ยกเลิกใบแทนใบเสร็จรับเงินสำเร็จ",
						confirmButtonColor: "#2196F3"
					},function(){
						var rs_key="<?php echo $CRR_RSR_NO;?>";
						$.post("<?php echo $goinglink;?>/tools/admission_admin/mod/rc_store/belete_store.php",{
							RsKey:rs_key
						},function(run){
							if(run!=""){
								document.location="<?php echo $goinglink;?>/admission/admin?admission_mod=rc_store";
							}else{}
						})
					});
				}, 2000);
			});
		});	
	}) 
</script>		
<!--****************************************************************************-->
<!--****************************************************************************-->

<div class="row">
	<div class="col-<?php echo $grid;?>-12">
		<div class="panel panel-info">
			<div class="panel-heading">เลขที่ใบสั่งชื้อค่ามอบตัวตัดชุด <?php echo $CRR_RSR_NO;?> รหัสเจ้าหน้าที่ : <?php echo $CRR_RSR_Officer;?></div>
			<div class="panel-body">
				<div class="row">
					<div class="col-<?php echo $grid;?>-12">
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<th><div>#</div></th>
										<th><div>ร้านค้า</div></th>
										<th><div>จำนวนเงิน</div></th>
										<th><div>หน่วย</div></th>
									</tr>
								</thead>
								<tbody>
						<?php
								$StoreListRun=new RowRcStoreList($CRR_RSR_NO);
						?>				
						<?php   $rs_count=1; 
								foreach($StoreListRun->PrintRowRcStoreList() as $rc=>$StoreListRow){ ?>
									
									<tr>
										<td><div><?php echo $rs_count;?></div></td>
										<td><div><?php echo $StoreListRow["RSD_Txt"];?></div></td>
										<td><div><?php echo number_format($StoreListRow["RL_Price"], 2, '.', ',');?></div></td>
										<td><div>บาท</div></td>
									</tr>							
					
						<?php	$rs_count=$rs_count+1;
								} ?>
			
									<tr>
										<td><div></div></td>
										<td><div>รวม</div></td>
										<td><div><?php echo number_format($StoreListRun->PrintSumRcStoreList(), 2, '.', ',');?></div></td>
										<td><div>บาท</div></td>
									</tr>
							
								</tbody>
							</table>
						</div>					
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-<?php echo $grid;?>-12">
						<a href="<?php echo $goinglink;?>/print_admission/store_pay/<?php echo $CRR_RSR_NO;?>/<?php echo $StorePRC->PRC_IDReg;?>/<?php echo $est_year;?>" target="_blank"><button type="button" class="btn btn-success" class="btn btn-info btn-lg">พิมพ์</button></a>
						<button type="button" class="btn btn-info" id="sweet_loader">ยกเลิก</button>
						<button type="button" id="GoRcStore" class="btn btn-warning">ใบแทนใบเสร็จรับเงิน ค่าบำรุงสมาคมสถานศึกษาเอกชนจังหวัดเชียงใหม่</button>
					</div>
				</div>
				
			</div>
		</div>	
	</div>
</div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->				
	<?php	}else{	?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<div class="row">
		<div class="col-<?php echo $grid;?>-12">
			<div class="panel panel-body border-top-pink">
				
				<div class="row">
					<div class="col-<?php echo $grid;?>-12">
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<th><div>#</div></th>
										<th><div>ร้านค้า</div></th>
										<th><div>จำนวนเงิน</div></th>
										<th><div>หน่วย</div></th>
									</tr>
								</thead>
								<tbody>
					<?php
						$rs_count=1;
						$count_rs=0;
						$PrintDataStore=new RowStore();
						foreach($PrintDataStore->PrintRowStore() as $rc=>$PrintDataStoreRow){ ?>
									<tr>
										<td><div><?php echo $rs_count;?><input type="hidden" name="RSR_Key<?php echo $count_rs;?>" id="RSR_Key<?php echo $count_rs;?>" value="<?php echo $PrintDataStoreRow["RSD_No"];?>"></div></td>
										<td><div><?php echo $PrintDataStoreRow["RSD_Txt"];?></div></td>
										<td><div><input type="number" name="incom<?php echo $count_rs;?>" id="incom<?php echo $count_rs;?>" class="form-control" value="0"></div></td>
										<td><div>บาท</div></td>
									</tr>					
				<?php	$rs_count=$rs_count+1;
						$count_rs=$count_rs+1;
						} ?>		
							


								</tbody>
							</table>
						</div>					
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-<?php echo $grid;?>-12">
			    		<div class="panel panel-body border-top-purple">
							<h6 class="no-margin text-semibold">ช่องทางการชำระ</h6>
							<label class="radio-inline">
								<input type="radio" class="styled" name="RSR_Pay" required="required" value="C">
								เงินสด
							</label>

							<label class="radio-inline">
								<input type="radio" class="styled" name="RSR_Pay" required="required" value="M">
								เงินโอน
							</label>
						</div>					
					</div>
				</div>

							
			</div>
		</div>
	</div>	
		
<script>
	$(document).ready(function(){
		$("#RSBtn").click(function(){

<?php
		$countRS=0;
		while($countRS<$count_rs){ ?>
				var store_int<?php echo $countRS;?>=$("#incom<?php echo $countRS;?>").val();
<?php	$countRS=$countRS+1;} ?>			
				var set_int='<?php echo $count_rs;?>';
					
						$.post("<?php echo $goinglink;?>/tools/admission_admin/mod/rc_store/store_sum.php",{
						
<?php
		$countRS=0;
		while($countRS<$count_rs){ ?>
							StoreInt<?php echo $countRS;?>:store_int<?php echo $countRS;?>,
<?php	$countRS=$countRS+1;} ?>						
							Setint:set_int
							
						},function (store_sum){
							if(store_sum !=""){
								$("#StoreSum").html(store_sum)
							}else{}
						})
					
		});
	});
</script>		
		
		
	<!-- Modal -->	
	<div class="modal fade" id="RSModal" role="dialog">
		<div class="modal-dialog">
      <!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">รวมจำนวนเงินทั้งหมด</h4>
				</div>
				<div class="modal-body">
					<div id="StoreSum"></div>
					<div class="row">
						<div class="col-<?php echo $grid;?>-12">
							<center>
								<button type="submit" name="but_store" id="but_store" class="btn btn-primary">ดำเนินรายการ</button>
								<button type="button" name="back_store" data-dismiss="modal" class="btn btn-success">ยกเลิกรายการ</button>
							</center>
						</div>
					</div>
				</div>
			</div>
      <!-- Modal content-->
		</div>
	</div>		
	<!-- Modal -->	

	<input type="hidden" name="count_rs" value="<?php echo $count_rs;?>">
	<hr>
	<div class="row">
		<div class="col-<?php echo $grid;?>-12">
			<button type="button" class="btn btn-success" class="btn btn-info btn-lg" id="RSBtn">คำนวณเงิน</button>
			<button type="button" id="GoRcStore" class="btn btn-info">ยกเลิก</button>
		</div>
	</div>	
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->				
	<?php	}?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->			
<?php	}else{	?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->			
<?php	}	?>