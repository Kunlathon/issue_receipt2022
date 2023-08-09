<?php
    class qrcode_scb{
        public $BillerId,$Ref1,$Ref2,$Amount,$Width;
        //public $Height;
        function __construct($BillerId,$Ref1,$Ref2,$Amount,$Width){
            $this->BillerId=$BillerId;
            $this->Ref1=$Ref1;
            $this->Ref2=$Ref2;
            $this->Amount=$Amount;
            $this->Width=$Width;
            //$this->Height=$Height;
            $copy_amount=number_format($this->Amount=$Amount, 2, '.', '');
            $pay_amount=str_replace('.','',$copy_amount);
            $qrcode='https://chart.googleapis.com/chart?cht=qr&chl=%7C'.$this->BillerId.'%0D'.$this->Ref1.'%0D'.$this->Ref2.'%0D'.$pay_amount.'&chs='.$this->Width.'x'.$this->Width.'&choe=UTF-8&chld=L|2';
                if(isset($qrcode)){
                    $this->qrcode=$qrcode;
                }else{
                    //-------------------
                }
        }public function call_qrcode_scb(){
            if(isset($this->qrcode)){
                return $this->qrcode;
            }else{
                //-----------------------
            }
        }
    }
?>


<?php
   /* $txt01="099400043439110";
    $txt02="RC0468";
    $txt03="ICTTEST";
    $txt04="150";
    $txt05="180";
    
    $qrcode_scb=new qrcode_scb($txt01,$txt02,$txt03,$txt04,$txt05);*/
    
?>


<!--
นายกุลธร เสาวคนธ์
0932670639
---------------------------------------
Mr.Kunlathon Saowakhon
+66932670639
---------------------------------------
E-mail missing_yrc2014@hotmail.com
https://www.facebook.com/MaximusPC2016
--------------------------------------
ต้องการใช้งาน พัฒนาต่อ ขอคำแนะนำ กรุณาติดต่อ...................
-->
  
 
     