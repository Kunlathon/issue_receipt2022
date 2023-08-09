<?php 
	//defined('BASEPATH') OR exit('No direct script access allowed');
	//include("tools/js/pay.php");
	//include("tools/js/pay_scb.php");
//----------------------------------------------------------------------------
	include("database/pdo_admission_rc.php");
	include("database/class_admission_rc.php");
//----------------------------------------------------------------------------	
	include("database/pdo_rc_store.php");
	include("database/class_rc_store.php");
//----------------------------------------------------------------------------
	include("sql_pdo/gotolink.php");
	$ip_admission=$_SERVER["REMOTE_ADDR"];
	$golink=new goingtolink($ip_admission);
	$goinglink=$golink->Rungotolink(); 
//---------------------------------------------------------------------------
	$SetYear=new SetYear();
	$est_year=$SetYear->RunSetYear();
//---------------------------------------------------------------------------
		//$est_year="2565";
		if(isset($est_year)){ 
			$ShowSumStore=new ShowSumStore($est_year);	
		?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	    <head>
			<meta charset="utf-8">
			<title></title>
				<link href="<?php echo $goinglink;?>/tools/img/logoserviam.png" rel="shortcut icon" type="image/png">
				<link href="<?php echo $goinglink;?>/tools/img/logoserviam.png" rel="apple-touch-icon">
				<link href="<?php echo $goinglink;?>/tools/img/logoserviam.png" rel="apple-touch-icon" sizes="72x72">
				<link href="<?php echo $goinglink;?>/tools/img/logoserviam.png" rel="apple-touch-icon" sizes="114x114">
				<link href="<?php echo $goinglink;?>/tools/img/logoserviam.png" rel="apple-touch-icon" sizes="144x144">
				
				<!-- Global stylesheets -->


				<link href="<?php echo $goinglink;?>/tools/Bootstrap 3/Template/layout_3/LTR/default/full/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
				<link href="<?php echo $goinglink;?>/tools/Bootstrap 3/Template/layout_3/LTR/default/full/assets/css/core.min.css" rel="stylesheet" type="text/css">
				<link href="<?php echo $goinglink;?>/tools/Bootstrap 3/Template/layout_3/LTR/default/full/assets/css/colors.min.css" rel="stylesheet" type="text/css">
				<!-- /global stylesheets -->

				<style>
					@font-face {
							font-family: 'surafont_sanukchang';
							src: url('<?php echo $goinglink;?>/tools/font/surafont_sanukchang-webfont.eot');
							src: url('<?php echo $goinglink;?>/tools/font/surafont_sanukchang-webfont.eot?#iefix') format('embedded-opentype'),
							url('<?php echo $goinglink;?>/tools/font/surafont_sanukchang-webfont.woff') format('woff'),
							url('<?php echo $goinglink;?>/tools/font/surafont_sanukchang.ttf') format('truetype');
					}

					body{
							font-family: "surafont_sanukchang";
							font-size: 16px;
							color: #032E3B;
							position: relative;
						}
					
				</style>
				<!-- Core JS files -->
				<script src="<?php echo $goinglink;?>/tools/Bootstrap 3/Template/global_assets/js/core/libraries/jquery.min.js"></script>
				<script src="<?php echo $goinglink;?>/tools/Bootstrap 3/Template/global_assets/js/core/libraries/bootstrap.min.js"></script>
				<!-- /core JS files -->

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
					$(document).ready(function (){	
						const d = new Date();
						document.getElementById("demo").innerHTML = d;					
					})
				</script>
			<!--****************************************************************************-->				
	    </head>
		
		
		
		
	    <body class="navbar-bottom col-<?php echo $grid;?>-12">
			<div class="row">
				<div class="col-<?php echo $grid;?>-3">
					<div class="panel panel-body bg-blue-400 has-bg-image">
						<div class="media no-margin">
							<div class="media-body">
								
						<?php
								if($ShowSumStore->RunStoreSumAll()!=null){	?>
								<h3 class="no-margin"><?php echo number_format($ShowSumStore->RunStoreSumAll(), 2, '.', ',');?></h3>								
						<?php	}else{	?>
								<h3 class="no-margin">0.00</h3>								
						<?php	}		?>		
								
								<span class="text-uppercase text-size-mini">ยอดรวมทั้งหมด</span>
							</div>

							<div class="media-right media-middle">
								<i class="icon-bubbles4 icon-3x opacity-75"></i>
							</div>
						</div>
					</div>				
				</div>

					<?php
							foreach($ShowSumStore->RunStorePayTypeArray() as $rc=>$RunStorePayTypeRow){ ?>
						
				<div class="col-<?php echo $grid;?>-3">
					<div class="panel panel-body bg-blue-400 has-bg-image">
						<div class="media no-margin">
							<div class="media-body">
								<h3 class="no-margin"><?php echo number_format($RunStorePayTypeRow["SumStore"], 2, '.', ',');?></h3>
					<?php
						if($RunStorePayTypeRow["RSR_Pay"]=="C"){	?>
								<span class="text-uppercase text-size-mini">ยอดเงินสด</span>
				<?php	}elseif($RunStorePayTypeRow["RSR_Pay"]=="M"){ ?>
								<span class="text-uppercase text-size-mini">ยอดเงินโอน</span>
				<?php	}else{}?>			
				
							</div>

							<div class="media-right media-middle">
								<i class="icon-bubbles4 icon-3x opacity-75"></i>
							</div>
						</div>
					</div>				
				</div>				
				
					<?php	} ?>		
	
			</div>
			<div class="row">
			
					<?php	
							foreach($ShowSumStore->RunPayingStoreArray() as $rc=>$RunPayingStoreRow){	?>
							
				<div class="col-<?php echo $grid;?>-3">
					<div class="panel panel-body bg-indigo-400 has-bg-image">
						<div class="media no-margin">
							<div class="media-left media-middle">
								<i class="icon-enter6 icon-3x opacity-75"></i>
							</div>

							<div class="media-body text-right">
								<h3 class="no-margin"><?php echo number_format($RunPayingStoreRow["SumStore"], 2, '.', ',');?></h3>
								<span class="text-uppercase text-size-mini"><?php echo $RunPayingStoreRow["RSD_Txt"];?></span>
							</div>
						</div>
					</div>				
				</div>				
				
					<?php	} ?>
			
				<div class="col-<?php echo $grid;?>-3">
					<div class="panel panel-body bg-indigo-400 has-bg-image">
						<div class="media no-margin">
							<div class="media-left media-middle">
								<i class="icon-enter6 icon-3x opacity-75"></i>
							</div>

							<div class="media-body text-right">
								<h3 class="no-margin"><?php echo $ShowSumStore->RunCountStore();?></h3>
								<span class="text-uppercase text-size-mini">จำนวนใบแทนใบเสร็จรับเงิน ค่าเครื่องแบบนักเรียน</span>
							</div>
						</div>
					</div>				
				</div>
			</div>
			
			<div class="row">
				<div class="col-<?php echo $grid;?>-6">
					<p id="demo"></p>
				</div>
			</div>
	    </body>
</html>
<?php	}else{
	
	echo "5555";
}
//--------------------------------------------------------------------------
	
?>