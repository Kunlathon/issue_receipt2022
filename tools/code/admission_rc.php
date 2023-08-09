<?php
	include("../database/pdo_admission.php");	
	include("../database/class_admission.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>รับสมัครนักเรียนออนไลน์ รอบทั่วไป ปีการศึกษา 2565</title>
	<link href="img/logoserviam.png" rel="shortcut icon" type="image/png">
	<link href="img/logoserviam.png" rel="apple-touch-icon">
	<link href="img/logoserviam.png" rel="apple-touch-icon" sizes="72x72">
	<link href="img/logoserviam.png" rel="apple-touch-icon" sizes="114x114">
	<link href="img/logoserviam.png" rel="apple-touch-icon" sizes="144x144">
	
	
	
	
	<!-- Global stylesheets -->

	<link href="../Bootstrap 3/Template/global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="../Bootstrap 3/Template/layout_3/LTR/default/full/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../Bootstrap 3/Template/layout_3/LTR/default/full/assets/css/core.min.css" rel="stylesheet" type="text/css">
	<link href="../Bootstrap 3/Template/layout_3/LTR/default/full/assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="../Bootstrap 3/Template/layout_3/LTR/default/full/assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->
	<!--css code-->
	
<style>
	@font-face{
		font-family: 'surafont_sanukchang';
		src: url('../font/surafont_sanukchang-webfont.eot');
		src: url('../font/surafont_sanukchang-webfont.eot?#iefix') format('embedded-opentype'),
		url('../font/surafont_sanukchang-webfont.woff') format('woff'),
		url('../font/surafont_sanukchang.ttf') format('truetype');
	}
		
    body{
		background-color: #add8e6;
		font-family: "surafont_sanukchang";
		font-size: 16px;			
	}
		
	#fontA{
		font-family: "surafont_sanukchang";
		font-size:18px;
	}
		
	#fontB{
		font-family: "surafont_sanukchang";
		font-size: 20px;
	}
		
	.form-control{
		font-family: "surafont_sanukchang";
		font-size: 16px;
	}        
        
</style>    
    


<!--****************************************************************************-->			
    <script type="text/javascript">
        function setScreenHWCookie() {
            $.cookie('sw',screen.width);
                //$.cookie('sh',screen.height);
            return true;
        }
            setScreenHWCookie();
    </script>

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



	<!-- Core JS files -->
	<script src="../Bootstrap 3/Template/global_assets/js/plugins/loaders/pace.min.js"></script>
	<script src="../Bootstrap 3/Template/global_assets/js/core/libraries/jquery.min.js"></script>
	<script src="../Bootstrap 3/Template/global_assets/js/core/libraries/bootstrap.min.js"></script>
	<script src="../Bootstrap 3/Template/global_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->
</head>

<body>
	
	<?php
		$user_login=filter_input(INPUT_GET,'user_login');
		$user_card=filter_input(INPUT_GET,'user_card');
		$user_level=filter_input(INPUT_GET,'user_level');
		$user_plan=filter_input(INPUT_GET,'user_plan');
		
		
			if($user_login=="" and $user_card=="" and $user_level=="" and $user_plan==""){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->			
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->						
	<?php	}elseif($user_login=="" or $user_card=="" or $user_level=="" or $user_plan==""){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->			
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->						
	<?php	}else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
						<?php
							switch($user_level){
								case "3": ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->	
												<?php
													exit("<script>window.location='print_quota.php?user_login=$user_login&user_card=$user_card&user_level=$user_level&user_plan=$user_plan';</script>");
												?>							
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->								
						<?php	break;
								case "11": ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
												<?php
													exit("<script>window.location='print_quota.php?user_login=$user_login&user_card=$user_card&user_level=$user_level&user_plan=$user_plan';</script>");
												?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->								
						<?php	break;
								case "31": ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->		
						<?php
							$su_IPSTSql="SELECT count(`IDGifted`) as `count_g` FROM `rc_student_gifted` 
										WHERE `IDReg`='{$user_login}' 
										and `IDCard`='{$user_card}'";
							$su_IPST=new notrow_admission($su_IPSTSql);
							foreach($su_IPST->notrow_admission_print() as $rc_key=>$su_IPSTRow){
							$count_g=$su_IPSTRow["count_g"];
								if($count_g>=1){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
						<div class="row">
							<center><div class="col-<?php echo $grid;?>-12">
								<div class="panel panel-default">
									<form name="admission_rc" method="GET" action="print_quota.php" >
										<div class="panel-body">
											<div class="col-<?php echo $grid;?>-3">
												<div class="radio icheck-greensea">
													<input type="checkbox" name="key_key"  value="12" checked="checked">
													<label for="parent_statusA">ประสงค์ลงเรียน สสวท</label>							
												</div>					
											</div>	
											<div class="col-<?php echo $grid;?>-3">
												
													<button type="submit" class="btn btn-primary">ดำเนินการมอบตัว...</button>
													
													<input type="hidden" name="user_login" value="<?php echo $user_login;?>">
													<input type="hidden" name="user_card" value="<?php echo $user_card;?>">
													<input type="hidden" name="user_level" value="<?php echo $user_level;?>">
													<input type="hidden" name="user_plan" value="<?php echo $user_plan;?>">
												
											</div>										
										</div>
									</form>
								</div>
							</div></center>
						</div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->														
						<?php	}else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
						<div class="row">
							<center><div class="col-<?php echo $grid;?>-12">
								<div class="panel panel-default">
									<form name="admission_rc" method="GET" action="print_quota.php" >
										<div class="panel-body">
											<div class="col-<?php echo $grid;?>-3">
												<div class="radio icheck-greensea">
													<input type="checkbox" name="key_key"  value="12">
													<label for="parent_statusA">ประสงค์ลงเรียน สสวท</label>							
												</div>					
											</div>	
											<div class="col-<?php echo $grid;?>-3">
												
													<button type="submit" class="btn btn-primary">ดำเนินการมอบตัว...</button>
													
													<input type="hidden" name="user_login" value="<?php echo $user_login;?>">
													<input type="hidden" name="user_card" value="<?php echo $user_card;?>">
													<input type="hidden" name="user_level" value="<?php echo $user_level;?>">
													<input type="hidden" name="user_plan" value="<?php echo $user_plan;?>">
												
											</div>										
										</div>
									</form>
								</div>
							</div></center>
						</div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->																																										
						<?php	}	   ?>	 							
					<?php	}      ?>					
	
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->								
						<?php	break;
								case "41": ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->	
											<?php
													if($user_plan==3){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->	
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->		
						<?php
							$su_IPSTSql="SELECT count(`IDGifted`) as `count_g` FROM `rc_student_gifted` 
										WHERE `IDReg`='{$user_login}' 
										and `IDCard`='{$user_card}'";
							$su_IPST=new notrow_admission($su_IPSTSql);
							foreach($su_IPST->notrow_admission_print() as $rc_key=>$su_IPSTRow){
							$count_g=$su_IPSTRow["count_g"];
								if($count_g>=1){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
						<div class="row">
							<center><div class="col-<?php echo $grid;?>-12">
								<div class="panel panel-default">
									<form name="admission_rc" method="GET" action="print_quota.php" >
										<div class="panel-body">
											<div class="col-<?php echo $grid;?>-3">
												<div class="radio icheck-greensea">
													<input type="checkbox" name="key_key"  value="13" checked="checked">
													<label for="parent_statusA">ประสงค์ลงเรียน สสวท</label>							
												</div>					
											</div>	
											<div class="col-<?php echo $grid;?>-3">
												
													<button type="submit" class="btn btn-primary">ดำเนินการมอบตัว...</button>
													
													<input type="hidden" name="user_login" value="<?php echo $user_login;?>">
													<input type="hidden" name="user_card" value="<?php echo $user_card;?>">
													<input type="hidden" name="user_level" value="<?php echo $user_level;?>">
													<input type="hidden" name="user_plan" value="<?php echo $user_plan;?>">
												
											</div>										
										</div>
									</form>
								</div>
							</div></center>
						</div>	
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->														
						<?php	}else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
						<div class="row">
							<center><div class="col-<?php echo $grid;?>-12">
								<div class="panel panel-default">
									<form name="admission_rc" method="GET" action="print_quota.php" >
										<div class="panel-body">
											<div class="col-<?php echo $grid;?>-3">
												<div class="radio icheck-greensea">
													<input type="checkbox" name="key_key"  value="13">
													<label for="parent_statusA">ประสงค์ลงเรียน สสวท</label>							
												</div>					
											</div>	
											<div class="col-<?php echo $grid;?>-3">
												
													<button type="submit" class="btn btn-primary">ดำเนินการมอบตัว...</button>
													
													<input type="hidden" name="user_login" value="<?php echo $user_login;?>">
													<input type="hidden" name="user_card" value="<?php echo $user_card;?>">
													<input type="hidden" name="user_level" value="<?php echo $user_level;?>">
													<input type="hidden" name="user_plan" value="<?php echo $user_plan;?>">
												
											</div>										
										</div>
									</form>
								</div>
							</div></center>
						</div>	
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->																																										
						<?php	}	   ?>	 							
					<?php	}      ?>	
													
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->														
											<?php	}else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->		
												<?php
													exit("<script>window.location='print_quota.php?user_login=$user_login&user_card=$user_card&user_level=$user_level&user_plan=$user_plan';</script>");
												?>												
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->														
											<?php	}?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->								
						<?php	break;
								default:   ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
								
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->								
						<?php		
							}
					
						?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->						
	<?php	} ?>

</body>
</html>