<?php
include("arohamQR.php");
$arohamQR = new arohamQR();
?>
<table cellspacing="10" cellpadding="10" align="left" border="0" width="50%">
 
<!--  ############################### FOR URL ############################### -->
<tr>
	<td align="left" valign="top"><strong>Link:</strong></td>
	<td></td>
	<td align="left">
		<?php
			$arohamQR->link("http://www.aroham.com"); // (URL)
			echo "<img src='".$arohamQR->get_link()."' border='0' width='120'/>";
		?>
	</td>
</tr>

<!--  ############################### FOR BOOKMARK ############################### -->
<tr>
	<td align="left" valign="top"><strong>Bookmark:</strong></td>
	<td></td>
	<td align="left">
		<?php
			$arohamQR->bookmark("Aroham Technologies (P) Ltd.", "http://www.aroham.com"); // (BOOKMARK TITLE, URL)
			echo "<img src='".$arohamQR->get_link()."' border='0' width='120'/>";
		?>
	</td>
</tr>


<!--  ############################### FOR TEXT ############################### -->
<tr>
	<td align="left" valign="top"><strong>Text:</strong></td>
	<td></td>
	<td align="left">
		<?php
			$arohamQR->text("Welcome to Aroham Technologies (P) Ltd."); // ( TEXT )
			echo "<img src='".$arohamQR->get_link()."' border='0' width='120'/>";
		?>
	</td>
</tr>


<!--  ############################### FOR CONTACT ############################### -->
<tr>
	<td align="left" valign="top"><strong>Contact:</strong></td>
	<td></td>
	<td align="left">
		<?php
			$arohamQR->contact_info('Raj', 'D II 8, Shyam Park Ext., India', '9999009308', 'info@atechmaster.com'); // ( NAME, ADDRESS, PHONE, EMAIL)
			echo "<img src='".$arohamQR->get_link()."' border='0' width='120'/>";
		?>
	</td>
</tr>



<!--  ############################### FOR SMS ############################### -->
<tr>
	<td align="left" valign="top"><strong>SMS:</strong></td>
	<td></td>
	<td align="left">
		<?php
			$arohamQR->sms("9999009308", "Welcome to Aroham Technologies (P) Ltd."); // ( PHONE NO., MESSAGE)
			echo "<img src='".$arohamQR->get_link()."' border='0' width='120'/>";
		?>
	</td>
</tr>

<!--  ############################### FOR PHONE NUMBER ############################### -->
<tr>
	<td align="left" valign="top"><strong>Phone Number:</strong></td>
	<td></td>
	<td align="left">
		<?php
			$arohamQR->phone_number("9999009308"); // ( PHONE NO.)
			echo "<img src='".$arohamQR->get_link()."' border='0' width='120'/>";
		?>
	</td>
</tr>

<!--  ############################### FOR EMAIL ############################### -->
<tr>
	<td align="left" valign="top"><strong>Email:</strong></td>
	<td></td>
	<td align="left">
		<?php
			$arohamQR->email("info@atechmaster.com", "Hi", "I Love you!!!"); // ( EMAIL, Subject, Message)
			echo "<img src='".$arohamQR->get_link(250)."' border='0' width='120'/>";
		?>
	</td>
</tr>

<!--  ############################### FOR GEOGRAPHICAL LOCATION ############################### -->
<tr>
	<td align="left" valign="top"><strong>Geographical location:</strong></td>
	<td></td>
	<td align="left">
		<?php
			$arohamQR->geo("26.4593261", "80.330269", "100"); // (LATITUDE, LONGITUDE, ZOOM)
			echo "<img src='".$arohamQR->get_link()."' border='0' width='120'/>";
		?>
	</td>
</tr>

<!--  ############################### FOR WIFI NETWORK CONFIGURATION WORKS ON ANDROID DEVICES ############################### -->
<tr>
	<td align="left" valign="top"><strong>Wifi Network Configuration Works On Android Devices:</strong></td>
	<td></td>
	<td align="left">
		<?php
			$arohamQR->wifi("WEP", "wifi_name", "password"); // ( AUTHENTICATION TYPE WPA OR WEP, NETWORK SSID, PASSWORD)
			echo "<img src='".$arohamQR->get_link()."' border='0' width='120'/>";
		?>
	</td>
</tr>
</table>
<div>