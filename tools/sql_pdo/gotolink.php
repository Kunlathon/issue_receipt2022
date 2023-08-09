<?php
    class goingtolink{
        public $gotolink;
        function __construct($gotolink){
            $this->gotolink=$gotolink;
            if($this->gotolink=="127.0.0.1" or $this->gotolink=="localhost" or $this->gotolink=="::1"){
                $gotolink="http://rc.regina.ac.th/Application/recruit_new_students";
            }else{
                $gotolink="http://rc.regina.ac.th/test/issue_receipt";
            }
            if(isset($gotolink)){
                $this->gotolink=$gotolink;
            }else{
                //------------------------
            }
        }function Rungotolink(){
            if(isset($this->gotolink)){
                return $this->gotolink;
            }else{
                //------------------------
            }
        }
    }
?>

<?php
 /*   class name_prefix{
        public $birthday;
        function __construct($birthay){
            $this->birthay=$birthay;
            if($this->birthay==null){
                    
            }else{
                
                
            }
            
        
        }
    }
*/
?>