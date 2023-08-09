	
	<!-- Theme JS files picker_date.html-->
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/notifications/jgrowl.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/ui/moment/moment.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/pickers/daterangepicker.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/pickers/anytime.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/pickers/pickadate/picker.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/pickers/pickadate/picker.date.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/pickers/pickadate/picker.time.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/pickers/pickadate/legacy.js"></script>


	<script>
		$(document).ready(function (){
			$('.daterange-basic').daterangepicker({
				applyClass: 'bg-slate-600',
				cancelClass: 'btn-default',
				locale: {
					format: 'DD-MM-YYYY',
					applyLabel: 'ตกลง',
					cancelLabel: 'ออก',
					startLabel: 'วันที่เริ่มต้น',
					endLabel: 'วันที่สิ้นสุด',
					customRangeLabel: 'Выбрать дату',
					daysOfWeek: ['วันอาทิตย์', 'วันจันทร์', 'วันอังคาร', 'วันพุธ', 'วันพฤหัสบดี', 'วันศุกร์','วันเสาร์'],
					monthNames: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
					firstDay: 1					
				}
			});
		})
	</script>
	<!-- /theme JS files -->
	
	<!-- Theme JS files -->
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/forms/selects/select2.min.js"></script>

	<script>
		$(document).ready(function (){
			$('.select').select2({
				minimumResultsForSearch: Infinity
			});			
		})
	</script>
	<!-- /theme JS files -->
	
	<!-- Theme JS files datatable_extension_buttons_html5.html-->
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>

	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js"></script>
	<script src="<?php echo base_url();?>/tools/Bootstrap 3/Template/global_assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>


	<!-- /theme JS files -->	
	
	
	<script>
		$(document).ready(function (){
			$("#but_rrs").click(function (){
				var RRSYear=$("#RRSYear").val();
				var RRSData=$("#RRSData").val();
					if(RRSYear !="" && RRSData !=""){
						$.post("<?php echo base_url();?>/tools/admission_admin/mod/report_rc_store/RRS.php",{
							RRS_Year:RRSYear,
							RRS_Data:RRSData
						},function (RRS){
							if(RRS !=""){
								$("#RunRRS").html(RRS)
							}else{}
						})
					}else{}
			})		
		})
	</script>
	