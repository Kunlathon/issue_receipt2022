<?php
	header('Content-Type: text/html; charset=UTF-8');
//----------------------------------------------------------------------------	
	include("../../../../tools/database/pdo_rc_store.php");
	include("../../../../tools/database/class_rc_store.php");
//----------------------------------------------------------------------------
?>
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

<?php
	$Setint=filter_input(INPUT_POST,'Setint');
	$sid_id=filter_input(INPUT_POST,'sid_id');
	$ss_count=0;
	$ss_sum=0;

//--Loop	
		while($ss_count<$Setint){
			
			if(filter_input(INPUT_POST,'StoreInt'.$ss_count.'')==!null){
				$StoreInt=filter_input(INPUT_POST,'StoreInt'.$ss_count.'');	
			}else{
				$StoreInt=0;					
			}
			
			$ss_sum=$ss_sum+$StoreInt;	
			$ss_count=$ss_count+1;
		}
		
		
		$PrintData_IncreaseDecrease=new ShowDataIncreaseDecrease("Row",$sid_id);
		foreach($PrintData_IncreaseDecrease->RunDataSDIDLoop() as $pay=>$PrintData_IncreaseDecreaseRow){
			$sid_int=$PrintData_IncreaseDecreaseRow["sid_int"];
			$status_maths=$PrintData_IncreaseDecreaseRow["status_maths"];
		}

			if(($PrintData_IncreaseDecrease->RunDataSDIDError()=="NoError")){
				
				if(($status_maths=="+")){
					$ss_sum=($ss_sum+$sid_int);
				}elseif(($status_maths=="-")){
					$ss_sum=($ss_sum-$sid_int);
				}elseif(($status_maths=="*")){
					$ss_sum=($ss_sum*$sid_int);
				}elseif(($status_maths=="/")){
					$ss_sum=($ss_sum/$sid_int);
				}else{
					$ss_sum=($ss_sum+0);
				}

			}else{
				$ss_sum=($ss_sum+0);
			}

//Loop End

		
?>

<div class="row">
	<div class="col-<?php echo $grid;?>-12" style="font-size: 50px; background-color:#00FFFF; color:#CC00FF;">
		<center><?php echo number_format($ss_sum, 2, '.', ',');?></center>
	</div>
</div><br>

