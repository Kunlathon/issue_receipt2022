	<!-- Theme JS files form_select2.html-->
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/forms/selects/select2.min.js"></script>
	
	<script>
		$(document).ready(function (){	
			$('.select-search').select2();	
		})
	</script>
	<!-- /theme JS files -->
	
	<!-- Theme JS files -->
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/velocity/velocity.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/velocity/velocity.ui.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/buttons/spin.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/buttons/ladda.min.js"></script>

	<script>
		$(document).ready(function (){	
			Ladda.bind('.btn-ladda-progress', {
				callback: function(instance) {
				var progress = 0;
					var interval = setInterval(function() {
					progress = Math.min(progress + Math.random() * 0.1, 1);
					instance.setProgress(progress);

						if(progress === 1) {
							instance.stop();
							clearInterval(interval);
						}else{}
					}, 200);
				}
			});
		})	
	</script>
	<!-- /theme JS files -->
	
	<!-- Theme JS files colors_purple-->
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/core/libraries/jquery_ui/core.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/forms/styling/switchery.min.js"></script>

	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/notifications/pnotify.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/notifications/noty.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/notifications/jgrowl.min.js"></script>
	<!-- /theme JS files -->	
	
	<!-- Theme JS files components_modals-->
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/notifications/bootbox.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/notifications/sweet_alert.min.js"></script>
	<!-- /theme JS files -->
	
	
	<script>
		$(document).ready(function (){
			$("#store_button").click(function (){
				var store_key=$("#store_key").val();
					if(store_key !=""){
						$.post("<?php echo base_url();?>/tools/admission_admin/mod/rc_store/run_store.php",{
							StoreKey:store_key
						},function (RcData){
							if(RcData !=""){
								$("#RunRcData").html(RcData)
							}else{}
						})
					}else{}
			})
		})
	</script>