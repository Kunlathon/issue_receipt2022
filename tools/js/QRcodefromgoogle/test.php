<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<p>
  <?php
include("arohamQR.php");
$arohamQR = new arohamQR();
$txt="NTC IC B38020-12-0008";	
?>
/////////////////////</p>
<p>		<?php
			$arohamQR->text("$txt"); // ( TEXT )
			echo "<img src='".$arohamQR->get_link()."' border='0' width='120'/>";
		?></p>
</body>
</html>