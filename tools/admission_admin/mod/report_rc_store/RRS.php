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
	$RRSYear=filter_input(INPUT_POST,'RRS_Year');
	$RRSData=filter_input(INPUT_POST,'RRS_Data');
		if(isset($RRSYear,$RRSData)){
			$RRSDataA=substr($RRSData,0,10);
			$RRSDataB=substr($RRSData,13); 
		
			$RRSDataAInt=strtotime($RRSDataA);	
			$RRSDataBInt=strtotime($RRSDataB);
			
			?>
<!--****************************************************************************-->	
	<script>
		$(document).ready(function (){
			// Setting datatable defaults
			$.extend( $.fn.dataTable.defaults, {
				autoWidth: false,
				dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
				language: {
					search: '<span>Filter:</span> _INPUT_',
					searchPlaceholder: 'ค้นหา...',
					lengthMenu: '<span>แสดง:</span> _MENU_',
					paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
				}
			});	
			
			$('.datatable-button-html5-columns').DataTable({
        buttons: {            
            buttons: [
                {
                    extend: 'copyHtml5',
                    className: 'btn btn-default',
                    exportOptions: {
                        columns: [ 0, ':visible' ]
                    }
                },
                {
                    extend: 'excelHtml5',
                    className: 'btn btn-default',
					filename: 'รายงาน ค่าบำรุงสมาคมสถานศึกษาเอกชนจังหวัดเชียงใหม่ <?php echo $RRSData;?> ปีการศึกษา <?php echo $RRSYear;?>',
					title: 'รายงาน ค่าบำรุงสมาคมสถานศึกษาเอกชนจังหวัดเชียงใหม่ <?php echo $RRSData;?> ปีการศึกษา <?php echo $RRSYear;?>',
                    exportOptions: {
                        columns: ':visible'
                    }
                },


                {
                    extend: 'colvis',
                    text: '<i class="icon-three-bars"></i> <span class="caret"></span>',
                    className: 'btn bg-blue btn-icon'
                }
            ]
        },
				"paging"       : false,
				"lengthChange" : false,
				"searching"    : true,
				"ordering"     : false,
				"info"         : false,
				"autoWidth"    : false,
				
							"language": {
							"sEmptyTable"      : "ไม่มีข้อมูลในตาราง",
							"sInfo"            : "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
							"sInfoEmpty"       : "แสดง 0 ถึง 0 จาก 0 แถว",
							"sInfoFiltered"    : "(กรองข้อมูล _MAX_ ทุกแถว)",
							"sInfoPostFix"     : "",
							"sInfoThousands"   : ",",
							"sLengthMenu"      : "แสดง _MENU_ แถว",
							"sLoadingRecords"  : "กำลังโหลดข้อมูล...",
							"sProcessing"      : "กำลังดำเนินการ...",
							"sSeainserth"          : "ค้นหา: ",
							"sZeroRecords"     : "ไม่พบข้อมูล",
							"oPaginate"        : {
							"sFirst"           : "หน้าแรก",
							"sPrevious"        : "ก่อนหน้า",
							"sNext"            : "ถัดไป",
							"sLast"            : "หน้าสุดท้าย"
										         }
							}
			});			
			
		})
	</script>		
<!--****************************************************************************-->			
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->	

	<div class="row">
		<div class="col-<?php echo $grid;?>-12">
			<div class="panel panel-default">
				<div class="panel-heading">รายงาน ค่าบำรุงสมาคมสถานศึกษาเอกชนจังหวัดเชียงใหม่ <?php echo $RRSData;?></div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table datatable-button-html5-columns">
							<thead>
								<tr>
									<th><div>ลำดับ</div></th>
									<th><div>วันที่ชำระ</div></th>
									<th><div>เลขที่ใบแทนใบเสร็จ</div></th>
									<th><div>เลขประจำตัว</div></th>
									<th><div>ชื่อ - นามสกุล</div></th>
									<th><div>ชั้น</div></th>
									<th><div>ชำระ</div></th>
		<?php
			$CallStoreData=new RcStoreData('ON');
				foreach($CallStoreData->RunRcStoreData() as $rc=>$CallStoreDataRow){ ?>
									<th><div><?php echo $CallStoreDataRow["RSD_Txt"];?></div></th>
	    <?php	} ?>								
									
									<th><div>รวมเงิน</div></th>
									<th><div>รหัสเจ้าหน้าที่</div></th>
								</tr>
							</thead>
							<tbody>
			
			<?php
				$CountPP=0;
				$PortPay=new ReportPay($RRSYear);			
					foreach($PortPay->RunReportPay() as $rc=>$PortPayRow){
						$RSD_Date=date("d-m-Y",strtotime($PortPayRow["RSR_DateTime"]));
						$RSD_DateInt=strtotime($RSD_Date);
							if(($RSD_DateInt>=$RRSDataAInt and $RSD_DateInt<=$RRSDataBInt)){
								$CountPP=$CountPP+1; ?>	
								
								<tr>
									<td><div><?php echo $CountPP;?></div></td>
									<td><div><?php echo date("d-m-Y",strtotime($PortPayRow["RSR_DateTime"]));?></div></td>
									<td><div><?php echo $PortPayRow["RSR_NO"];?></div></td>
									<td><div><?php echo $PortPayRow["RSR_Sud"];?></div></td>
					<?php
						$PrintRc=new PrintReginaClass($PortPayRow["RSR_Sud"],$RRSYear);						
						$StudentAdmission=new PrintStudentAdmission($PrintRc->PRC_IDReg);
							/*switch($StudentAdmission->level){
								case 3:
									$class_txt="อ.3";
								break;
								case 11:
									$class_txt="ป.1";
								break;
								case 12:
									$class_txt="ป.2";
								break;
								case 13:
									$class_txt="ป.3";
								break;
								case 21:
									$class_txt="ป.4";
								break;
								case 22:
									$class_txt="ป.5";
								break;
								case 23:
									$class_txt="ป.6";
								break;
								case 31:
									$class_txt="ม.1";
								break;
								case 32:
									$class_txt="ม.2";
								break;
								case 33:
									$class_txt="ม.3";
								break;
								case 41:
									$class_txt="ม.4";
								break;
								default:
									$class_txt=null;
							}*/		
							$class_txt="-";				
					?>				
									
									<td><div><?php echo $StudentAdmission->fnameTh."&nbsp;";?></div></td>
									<td><div><?php echo $class_txt;?></div></td>
									
									
					<?php
							if(($PortPayRow["RSR_Pay"]=="C")){ ?>
										<td><div>เงินสด</div></td>
					<?php	}elseif(($PortPayRow["RSR_Pay"]=="M")){ ?>
										<td><div>เงินโอน</div></td>
					<?php	}else{	?>
										<td><div></div></td>
					<?php	} ?>
									
									
						<?php
								$SumPrice=0;
								$SudStoreData=new SudStoreData($PortPayRow["RSR_NO"],$RRSYear);
								foreach($SudStoreData->RunSudStoreData() as $rc=>$SSD_Row){
									$SumPrice=$SumPrice+$SSD_Row["RL_Price"];
									?>
								
									<td><div><?php echo  number_format($SSD_Row["RL_Price"], 2, '.', ',');?></div></td>
						
						<?php	} ?>

									<td><div><?php echo  number_format($SumPrice, 2, '.', ',');?></div></td>
									
									<td><div><?php echo $PortPayRow["RSR_Officer"];?></div></td>
									
								</tr>								
	
			<?php			}else{
								
							}
					}	?>	



							</tbody>
						</table>
					</div>
				</div>
			</div>	
		</div>
	</div>
	
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->	
<?php	}else{} ?>


