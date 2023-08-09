<?php	
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
	$RsKey=filter_input(INPUT_POST,'RsKey');
		if(isset($RsKey)){
			$DeleteStore=new DeleteStore($RsKey);
		}else{
			
		}
?>