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
	$ss_count=0;
	$ss_sum=0;
		while($ss_count<$Setint){
			
			if(filter_input(INPUT_POST,'StoreInt'.$ss_count.'')==!null){
				$StoreInt=filter_input(INPUT_POST,'StoreInt'.$ss_count.'');	
			}else{
				$StoreInt=0;					
			}
			
			$ss_sum=$ss_sum+$StoreInt;	
			$ss_count=$ss_count+1;
		}
		
		
?>

<div class="row">
	<div class="col-<?php echo $grid;?>-12" style="font-size: 50px; background-color:#00FFFF; color:#CC00FF;">
		<center><?php echo number_format($ss_sum, 2, '.', ',');?></center>
	</div>
</div><br>

