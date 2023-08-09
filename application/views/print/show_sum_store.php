<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<script src="<?php echo base_url();?>tools/Bootstrap 3/Template/global_assets/js/core/libraries/jquery.min.js"></script>
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
<script type="text/javascript">
$(function(){
	setInterval(function(){ // เขียนฟังก์ชัน javascript ให้ทำงานทุก ๆ 30 วินาที
		// 1 วินาที่ เท่า 1000
		// คำสั่งที่ต้องการให้ทำงาน ทุก ๆ 3 วินาที
		var getData=$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล
				url:"<?php echo base_url();?>/tools/sum_real_time_store.php",
				data:"rev=1",
				async:false,
				success:function(getData){
					$("div#showData").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
				}
		}).responseText;
	},1000);	
});
</script>
<br>
<div class="col-<?php echo $grid;?>-12">
	<div id="showData"></div>
</div>
