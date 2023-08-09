<?php
	//$CC_txt ข้อความที่ต้องการเข้ารหัส CRC_CCITT
	//$CC_crc ชนิด CRC_CCITT เรียกใช้ห้ามใส่ "" /XModem/ /0xFFFF/ /0x1D0F/ /Kermit/
	class CRC_CCITT{
		public $CC_txt,$CC_crc;
		function __construct($CC_txt,$CC_crc){
			$this->CC_txt=$CC_txt;
			$this->CC_crc=$CC_crc;
				if(isset($this->CC_txt,$this->CC_crc)){
					$strlen = strlen($this->CC_txt);
						for($c = 0; $c < $strlen; $c++) {
							$this->CC_crc ^=  ord(substr($this->CC_txt, $c,1)) << 8;
							for($i = 0; $i < 8; $i++) {
								if($this->CC_crc & 0x8000) {
									$this->CC_crc = ($this->CC_crc << 1) ^ 0x1021;
								} else {
									$this->CC_crc = $this->CC_crc << 1;
								}
							}
						}	
					$hex = $this->CC_crc & 0xFFFF;
					$hex = dechex($hex);
					$hex = strtoupper($hex);					
				}else{
					$hex = "Not CRC_CCITT";
				}
				if(isset($hex)){
					$this->hex=$hex;
				}else{
					//--------------------
				}
		}function Run_CRC_CCITT(){
			if(isset($this->hex)){
				return $this->hex;
			}else{
				//------------------------
			}
		}
	}
?>


<?php
	class TqRcTag{
		public $billerid,$ref1,$ref2,$teminalid,$amount;
		function __construct($billerid,$ref1,$ref2,$teminalid,$amount){
//----------------------------------------------------------------			
			$this->billerid=$billerid;
			$this->ref1=$ref1;
			$this->ref2=$ref2;
			$this->teminalid=$teminalid;//************************
			$this->amount=$amount;
//----------------------------------------------------------------			
			$int_billerid=strlen($this->billerid);
			$int_ref1=strlen($this->ref1);
				if($int_ref1<=9){
					$int_ref1="0".$int_ref1;
				}else{
					$int_ref1;
				}
			$int_ref2=strlen($this->ref2);
				if($int_ref2<=9){
					$int_ref2="0".$int_ref2;
				}else{
					$int_ref2;
				}
			$int_teminalid=strlen($this->teminalid);
				if($int_teminalid<=9){
					$int_teminalid="0".$int_teminalid;
				}else{
					$int_teminalid;
				}			
			$int_amount=strlen($this->amount);
				if($int_amount<=9){
					$int_amount="0".$int_amount;
				}else{
					$int_amount;
				}			
//----------------------------------------------------------------
			$txt01="000201";
			$txt02="010212"; //11->จ่ายหลายครั้ง 12 จ่ายครั้งเดี่ยว
			
			//0016A000000677010112
			
			//0115010753700088201
//----------------------------------------------------------------			
			$txt04="0016A000000677010112";
			$txt05="01".$int_billerid.$this->billerid;
			$txt06="02".$int_ref1.$this->ref1;
			$txt07="03".$int_ref2.$this->ref2;
			
			$int_txt03=strlen($txt04.$txt05.$txt06.$txt07);
				if($int_txt03<=9){
					$int_txt03="0".$int_txt03;
				}else{
					$int_txt03;
				}
			
			$txt03="30".$int_txt03;//30
			
			
			$txt08="5303764";
			
			$txt09="54".$int_amount.$this->amount;
			$txt10="5802TH";
			
			if(isset($this->teminalid)){
				$txt12="07".$int_teminalid.$this->teminalid;
				
				$int_txt12=strlen($txt12);
					if($int_txt12<=9){
						$int_txt12="0".$int_txt12;
					}else{
						$int_txt12;
					}
				$txt11="62".$int_txt12;
				
				$txt13="6304";
				$textcode=$txt01.$txt02.$txt03.$txt04.$txt05.$txt06.$txt07.$txt08.$txt09.$txt10.$txt11.$txt12.$txt13;
			}else{
				$txt13="6304";
				$textcode=$txt01.$txt02.$txt03.$txt04.$txt05.$txt06.$txt07.$txt08.$txt09.$txt10.$txt13;
			}
			$CRC_CCITT=new CRC_CCITT($textcode,0xFFFF);
			$tagKey=$textcode.$CRC_CCITT->Run_CRC_CCITT();
			if(isset($tagKey)){
				$this->tagKey=$tagKey;
			}else{
				//--------------------
			}
		}function RunTqRcTag(){
			if(isset($this->tagKey)){
				return $this->tagKey;
			}else{
				//---------------------
			}
		}
	}

?>


<?php
	class TqRcTagP{
		public $billerid,$amount;
		function __construct($billerid,$amount){
//----------------------------------------------------------------			
			$this->billerid=$billerid;
			$this->amount=$amount;
//----------------------------------------------------------------			
			$int_billerid=strlen($this->billerid);
				if($int_billerid<=9){
					$int_billerid="0".$int_billerid;
				}else{
					$int_billerid;
				}
			$int_amount=strlen($this->amount);
				if($int_amount<=9){
					$int_amount="0".$int_amount;
				}else{
					$int_amount;
				}			
//----------------------------------------------------------------
			$txt01="000201";
			$txt02="010211";
			
//----------------------------------------------------------------			
			$txt04="0016A000000677010111";
			$txt05="03".$int_billerid.$this->billerid;

			
			$int_txt03=strlen($txt04.$txt05);
				if($int_txt03<=9){
					$int_txt03="0".$int_txt03;
				}else{
					$int_txt03;
				}
			
			$txt03="29".$int_txt03;
			
			
			$txt08="5303764";
			
			$txt09="54".$int_amount.$this->amount;
			$txt10="5802TH";
			

				$txt13="6304";
				$textcode=$txt01.$txt02.$txt03.$txt04.$txt05.$txt08.$txt09.$txt10.$txt13;
			
			$CRC_CCITT=new CRC_CCITT($textcode,0xFFFF);
			$tagKey=$textcode.$CRC_CCITT->Run_CRC_CCITT();
			if(isset($tagKey)){
				$this->tagKey=$tagKey;
			}else{
				//--------------------
			}
		}function RunTqRcTag(){
			if(isset($this->tagKey)){
				return $this->tagKey;
			}else{
				//---------------------
			}
		}
	}

?>



<?php
	/*$t01="010753700088201";
	$t02="BEER";
	$t03="TEST001";
	$t04="";
	$t05="7.16";
	$TqRcTag=new TqRcTag($t01,$t02,$t03,$t04,$t05);
	echo $TqRcTag->RunTqRcTag();*/
    
   /* $t01="006990215227563";
	$t05="150.00";
	$TqRcTag=new TqRcTagP($t01,$t05);
	echo $TqRcTag->RunTqRcTag();*/
?>