<?php
	class manage_treasurer{
		public $mt_manage,$mt_tre_id,$mt_tre_name,$mt_tre_status;
		public $manage_array,$manage_error;
		function __construct($mt_manage,$mt_tre_id,$mt_tre_name,$mt_tre_status){
//------------------------------------------------------------------------------			
			$this->mt_manage=$mt_manage;
			$this->mt_tre_id=$mt_tre_id;
			$this->mt_tre_name=$mt_tre_name;
			$this->mt_tre_status=$mt_tre_status;
//------------------------------------------------------------------------------
			$IdAdder=$_SERVER["REMOTE_ADDR"];
			$ConnectStore=new ConnectStore($IdAdder);
			$pdo_store=$ConnectStore->CallConnectStore();
//------------------------------------------------------------------------------
			$manage_array=array();
			$manage_error="error";
//------------------------------------------------------------------------------			
				if(($this->mt_manage=="read_id")){

					if(($this->mt_tre_id!=null or $this->mt_tre_id!="-")){

						$treasurerSql="SELECT * 
									   FROM `treasurer` 
									   WHERE `tre_id`='{$this->mt_tre_id}'";
							if(($treasurerRs=$pdo_store->query($treasurerSql))){
								while($treasurerRow=$treasurerRs->Fetch(PDO::FETCH_ASSOC)){
									if((is_array($treasurerRow) && count($treasurerRow))){
										$manage_array[]=$treasurerRow;
										$manage_error="no_error";
									}else{
										$manage_array="-";
										$manage_error="error";
									}
								}
							}else{
								$manage_array="-";
								$manage_error="error";
							}

					}else{
						$manage_array="-";
						$manage_error="error";
					}

				}elseif(($this->mt_manage=="read")){

					if(($this->mt_tre_status!=null or $this->mt_tre_status!="-")){

						$treasurerSql="SELECT * 
									   FROM `treasurer` 
									   WHERE `tre_status`='{$this->mt_tre_status}'";
							if(($treasurerRs=$pdo_store->query($treasurerSql))){
								while($treasurerRow=$treasurerRs->Fetch(PDO::FETCH_ASSOC)){
									if((is_array($treasurerRow) && count($treasurerRow))){
										$manage_array[]=$treasurerRow;
										$manage_error="no_error";
									}else{
										$manage_array="-";
										$manage_error="error";
									}
								}
							}else{
								$manage_array="-";
								$manage_error="error";
							}

					}else{

						$treasurerSql="SELECT * 
									   FROM `treasurer`";
							if(($treasurerRs=$pdo_store->query($treasurerSql))){
								while($treasurerRow=$treasurerRs->Fetch(PDO::FETCH_ASSOC)){
									if((is_array($treasurerRow) && count($treasurerRow))){
										$manage_array[]=$treasurerRow;
										$manage_error="no_error";
									}else{
										$manage_array="-";
										$manage_error="error";
									}
								}
							}else{
								$manage_array="-";
								$manage_error="error";
							}
							
					}
					
				}else{
					$manage_array="-";
					$manage_error="error";
				}

				$this->manage_array=$manage_array;
				$this->manage_error=$manage_error;

				$pdo_store=null;

		}function Run_Manage_Row(){
			return $this->manage_array;
		}function Run_Manage_Error(){
			return $this->manage_error;
		}
	}
?>

<?php
	class ShowDataIncreaseDecrease{
		public $SDID_Status,$SDID_Txt;
		public $SDID_Array,$SDID_Error;
		function __construct($SDID_Status,$SDID_Txt){

//------------------------------------------------------------------			
		$IdAdder=$_SERVER["REMOTE_ADDR"];
		$ConnectStore=new ConnectStore($IdAdder);
		$pdo_store=$ConnectStore->CallConnectStore();
//------------------------------------------------------------------
		$this->SDID_Status=$SDID_Status;
		$this->SDID_Txt=$SDID_Txt;
//------------------------------------------------------------------
		$SDID_Array=array();
		$SDID_Error="Error";
//------------------------------------------------------------------
			
			if(($this->SDID_Status=="Row")){
				$SDID_Sql="SELECT * 
						   FROM `store_inc_dec` 
						   LEFT JOIN `status_inc_dec` on (`store_inc_dec`.`status_id`=`status_inc_dec`.`status_id`) 
						   WHERE `store_inc_dec`.`sid_id`='{$this->SDID_Txt}';";
					if(($SDID_Rs=$pdo_store->query($SDID_Sql))){
						$SDID_Row=$SDID_Rs->Fetch(PDO::FETCH_ASSOC);
							if((is_array($SDID_Row) && count($SDID_Row))){
								$SDID_Array[]=$SDID_Row;
								$SDID_Error="NoError";
							}else{
								$SDID_Array="-";
								$SDID_Error="Error";
							}
					}else{
						$SDID_Array="-";
						$SDID_Error="Error";
					}
			}elseif(($this->SDID_Status=="Loop")){
				$SDID_Sql="SELECT * 
						   FROM `store_inc_dec` 
						   JOIN `status_inc_dec` 
						   on (`store_inc_dec`.`status_id`=`status_inc_dec`.`status_id`)";
					if(($SDID_Rs=$pdo_store->query($SDID_Sql))){
						while($SDID_Row=$SDID_Rs->Fetch(PDO::FETCH_ASSOC)){
							if((is_array($SDID_Row) && count($SDID_Row))){
								$SDID_Array[]=$SDID_Row;
								$SDID_Error="NoError";
							}else{
								$SDID_Array="-";
								$SDID_Error="Error";
							}
						}
					}else{
						$SDID_Array="-";
						$SDID_Error="Error";
					}
			}else{
				$SDID_Error="Error";
			}

			$this->SDID_Array=$SDID_Array;
			$this->SDID_Error=$SDID_Error;

			$pdo_store=null;

		}function RunDataSDIDLoop(){
			return  $this->SDID_Array;
		}function RunDataSDIDError(){
			return  $this->SDID_Error;
		}
	}

?>





<?php
	class SudStoreData{
		public $SSD_Key,$SSD_Year;
		public $SudStoreDataArray;
		function __construct($SSD_Key,$SSD_Year){
//------------------------------------------------------------------------			
			$IdAdder=$_SERVER["REMOTE_ADDR"];
			$ConnectStore=new ConnectStore($IdAdder);
			$pdo_store=$ConnectStore->CallConnectStore();
//------------------------------------------------------------------------
			$this->SSD_Key=$SSD_Key;
			$this->SSD_Year=$SSD_Year;
//------------------------------------------------------------------------			
			$SudStoreDataArray=array();
			$SudStoreDataSql="select `rcstore_receipt`.`RSR_NO`,`rcstore_receipt`.`RSR_Sud`,`rcstore_receipt`.`RSR_DateTime` ,`rcstore_receipt`.`RSR_Officer`,`rcstore_receipt`.`RSR_Pay`,`rcstore_list`.`RSR_NO`,`rcstore_list`.`RL_Price` 
							  from `rcstore_receipt` left join `rcstore_list` on(`rcstore_receipt`.`RSR_NO`=`rcstore_list`.`RSD_No`) 
							  where `rcstore_receipt`.`RSR_NO`='{$this->SSD_Key}' 
							  and `rcstore_receipt`.`RSR_Year`='{$this->SSD_Year}' 
							  ORDER BY `rcstore_list`.`RSR_NO` ASC;";
				if($SudStoreDataRs=$pdo_store->query($SudStoreDataSql)){
					while($SudStoreDataRow=$SudStoreDataRs->Fetch(PDO::FETCH_ASSOC)){
						if(is_array($SudStoreDataRow) && count($SudStoreDataRow)){
							$SudStoreDataArray[]=$SudStoreDataRow;
						}else{
							$SudStoreDataArray=null;
						}
					}
				}else{
					$SudStoreDataArray=null;
				}
				
				if(isset($SudStoreDataArray)){
					$this->SudStoreDataArray=$SudStoreDataArray;
					$pdo_store=null;
				}else{
					$pdo_store=null;
				}
			
		}function RunSudStoreData(){
			if(isset($this->SudStoreDataArray)){
				return $this->SudStoreDataArray;
			}else{}
		}
	}
?>

	


<?php
	class RcStoreData{
		public $RSD;
		public $RcStoreDataArray;
		function __construct($RSD){
//------------------------------------------------------------------------			
			$IdAdder=$_SERVER["REMOTE_ADDR"];
			$ConnectStore=new ConnectStore($IdAdder);
			$pdo_store=$ConnectStore->CallConnectStore();
//------------------------------------------------------------------------
			$this->RSD=$RSD;
//------------------------------------------------------------------------
			$RcStoreDataArray=array();
			$RcStoreDataSql="SELECT * FROM `rcstore_data` 
							 WHERE `RSD_OFFON`='{$this->RSD}' ORDER BY `rcstore_data`.`RSD_No` ASC;";
				if($RcStoreDataRs=$pdo_store->query($RcStoreDataSql)){
					while($RcStoreDataRow=$RcStoreDataRs->Fetch(PDO::FETCH_ASSOC)){
						if(is_array($RcStoreDataRow) && count($RcStoreDataRow)){
							$RcStoreDataArray[]=$RcStoreDataRow;
						}else{
							$RcStoreDataArray=null;
						}
					}
				}else{
					$RcStoreDataArray=null;
				}
			
			if(isset($RcStoreDataArray)){
				$this->RcStoreDataArray=$RcStoreDataArray;
				$pdo_store=null;
			}else{
				$pdo_store=null;
			}
			
		}function RunRcStoreData(){
			if(isset($this->RcStoreDataArray)){
				return $this->RcStoreDataArray;
			}else{}
		}
	}

?>

<?php
	class ReportPay{
		public $RP_year;
		public $ReportPayArra;
			function __construct($RP_year){
				$this->RP_year=$RP_year;
				//$this->RP_date=$RP_date;
//------------------------------------------------------------------------			
				$IdAdder=$_SERVER["REMOTE_ADDR"];
				$ConnectStore=new ConnectStore($IdAdder);
				$pdo_store=$ConnectStore->CallConnectStore();
//------------------------------------------------------------------------	
				$ReportPayArra=array();
				$ReportPaySql="SELECT * FROM `rcstore_receipt` 
							   WHERE `RSR_Year` LIKE '%{$this->RP_year}%';";
					if($ReportPayRs=$pdo_store->query($ReportPaySql)){
						while($ReportPayRow=$ReportPayRs->Fetch(PDO::FETCH_ASSOC)){
							if(is_array($ReportPayRow) && count($ReportPayRow)){
								$ReportPayArra[]=$ReportPayRow;
							}else{
								$ReportPayArra=null;
							}
						}
					}else{
						$ReportPayArra=null;
					}
					
					if(isset($ReportPayArra)){
						$this->ReportPayArra=$ReportPayArra;
						$pdo_store=null;
					}else{
						$pdo_store=null;
					}
					
			}function RunReportPay(){
				if(isset($this->ReportPayArra)){
					return $this->ReportPayArra;
				}else{}
			}
	}

?>


<?php
	class ShowSumStore{
		public $SSS_year;
		public $PayingStoreArray,$CountStore,$StoreSumAll,$SUM_M,$SUM_C;
		function __construct($SSS_year){
			$this->SSS_year=$SSS_year;
//------------------------------------------------------------------------			
			$IdAdder=$_SERVER["REMOTE_ADDR"];
			$ConnectStore=new ConnectStore($IdAdder);
			$pdo_store=$ConnectStore->CallConnectStore();
//------------------------------------------------------------------------			


//แสดงใบรายการ
			$StoreSumAll=0;
			$SUM_C=0;
			$SUM_M=0;
			$PrintShowSql="SELECT `RSR_sid_id`,`RSR_NO`
					       FROM `rcstore_receipt` 
						   WHERE `RSR_Year`='{$this->SSS_year}'";
				if(($PrintShowRs=$pdo_store->query($PrintShowSql))){
					while($PrintShowRow=$PrintShowRs->Fetch(PDO::FETCH_ASSOC)){

//ยอดรวมทั้งหมด
						$StoreSumAllSql="SELECT SUM(`RL_Price`) AS `SUM_Price` 
										FROM `rcstore_list` 
										WHERE `RSD_No`='{$PrintShowRow['RSR_NO']}';";
							if($StoreSumAllRs=$pdo_store->query($StoreSumAllSql)){
								$StoreSumAllRow=$StoreSumAllRs->Fetch(PDO::FETCH_ASSOC);
									if(is_array($StoreSumAllRow) && count($StoreSumAllRow)){
										$SUM_Price=$StoreSumAllRow["SUM_Price"];
									}else{
										$SUM_Price="0";
									}
							}else{
								$SUM_Price="0";
							}
//ยอดรวมทั้งหมด จบ	

							if(($SUM_Price!=null)){

								$PrintData_IncreaseDecrease=new ShowDataIncreaseDecrease("Row",$PrintShowRow['RSR_sid_id']);
								foreach($PrintData_IncreaseDecrease->RunDataSDIDLoop() as $pay=>$PrintData_IncreaseDecreaseRow){
									$sid_int=$PrintData_IncreaseDecreaseRow["sid_int"];
									$status_maths=$PrintData_IncreaseDecreaseRow["status_maths"];
								}
						
									if(($PrintData_IncreaseDecrease->RunDataSDIDError()=="NoError")){
										
										if(($status_maths=="+")){
											$SUM_Price=($SUM_Price+$sid_int);
										}elseif(($status_maths=="-")){
											$SUM_Price=($SUM_Price-$sid_int);
										}elseif(($status_maths=="*")){
											$SUM_Price=($SUM_Price*$sid_int);
										}elseif(($status_maths=="/")){
											$SUM_Price=($SUM_Price/$sid_int);
										}else{
											$SUM_Price=($SUM_Price+0);
										}
						
									}else{
										$SUM_Price=($SUM_Price+0);
									}




							}else{}


						$StoreSumAll=$StoreSumAll+$SUM_Price;





						
//แยก ยอด เงินสด เงินโอน 			
			//$StorePayTypeArray=array();
			$StorePayTypeSql="select sum(`rcstore_list`.`RL_Price`) as `SumStore`,`rcstore_receipt`.`RSR_Pay` 
							  from `rcstore_receipt` left join `rcstore_list` on (`rcstore_receipt`.`RSR_NO`=`rcstore_list`.`RSD_No`) 
							  where `rcstore_receipt`.`RSR_NO` = '{$PrintShowRow['RSR_NO']}' 
							  group by `rcstore_receipt`.`RSR_Pay`;";
				if($StorePayTypeRs=$pdo_store->query($StorePayTypeSql)){
					$StorePayTypeRow=$StorePayTypeRs->Fetch(PDO::FETCH_ASSOC);
						if(is_array($StorePayTypeRow) && count($StorePayTypeRow)){
							
							$SumStore=$StorePayTypeRow['SumStore'];

							$Data_IncreaseDecrease=new ShowDataIncreaseDecrease("Row",$PrintShowRow['RSR_sid_id']);
							foreach($Data_IncreaseDecrease->RunDataSDIDLoop() as $pay=>$Data_IncreaseDecreaseRow){
								$sid_int=$Data_IncreaseDecreaseRow["sid_int"];
								$status_maths=$Data_IncreaseDecreaseRow["status_maths"];
							}
					
								if(($Data_IncreaseDecrease->RunDataSDIDError()=="NoError")){
									
									if(($status_maths=="+")){
										$SumStore=($SumStore+$sid_int);
									}elseif(($status_maths=="-")){
										$SumStore=($SumStore-$sid_int);
									}elseif(($status_maths=="*")){
										$SumStore=($SumStore*$sid_int);
									}elseif(($status_maths=="/")){
										$SumStore=($SumStore/$sid_int);
									}else{
										$SumStore=($SumStore+0);
									}
					
								}else{
									$SumStore=($SumStore+0);
								}
					
						}else{
							
						}
					
				}else{
					
				}
//แยก ยอด เงินสด เงินโอน  จบ	


				if(($StorePayTypeRow["RSR_Pay"]=="C")){
					$SUM_C=$SUM_C+$SumStore;
				}elseif(($StorePayTypeRow["RSR_Pay"]=="M")){
					$SUM_M=$SUM_M+$SumStore;
				}else{}

						
					}

					
				}

				
//แสดงใบรายการ จบ

//ยอด รวมแต่ละ ร้าน
				$PayingStoreArray=array();
				$PayingStoreSql="select sum(`rcstore_list`.`RL_Price`) as `SumStore`,`rcstore_list`.`RSR_NO`,`rcstore_data`.`RSD_Txt` 
								 from `rcstore_receipt` 
								 left join `rcstore_list` 
								 on (`rcstore_receipt`.`RSR_NO`=`rcstore_list`.`RSD_No`) 
								 join `rcstore_data` 
								 on (`rcstore_list`.`RSR_NO`=`rcstore_data`.`RSD_No`) 
								 where `rcstore_receipt`.`RSR_NO` like '%{$this->SSS_year}%' 
								 group by `rcstore_list`.`RSR_NO`;";
					if($PayingStoreRs=$pdo_store->query($PayingStoreSql)){
						while($PayingStoreRow=$PayingStoreRs->Fetch(PDO::FETCH_ASSOC)){
							if(is_array($PayingStoreRow) && count($PayingStoreRow)){
								$PayingStoreArray[]=$PayingStoreRow;
							}else{
								$PayingStoreArray=null;
							}
						}
					}else{
						$PayingStoreArray=null;
					}
//ยอด รวมแต่ละ ร้าน จบ			
//จำนวนใบ
				$CountStoreSql="SELECT COUNT(`RSR_NO`) `CountStore` 
								FROM `rcstore_receipt` 
								WHERE `RSR_NO` LIKE '%{$this->SSS_year}%';";
					if($CountStoreRs=$pdo_store->query($CountStoreSql)){
						$CountStoreRow=$CountStoreRs->Fetch(PDO::FETCH_ASSOC);
							if(is_array($CountStoreRow) && count($CountStoreRow)){
								$CountStore=$CountStoreRow["CountStore"];
							}else{
								$CountStore=0;
							}
					}else{
						$CountStore=0;
					}
//จำนวนใบ จบ			
				if(isset($StoreSumAll)){
					$this->StoreSumAll=$StoreSumAll;
				}else{}
				
				/*if(isset($StorePayTypeArray)){
					$this->StorePayTypeArray=$StorePayTypeArray;
				}else{}*/
				

				if(isset($SUM_C)){
					$this->SUM_C=$SUM_C;
				}else{}

				if(isset($SUM_M)){
					$this->SUM_M=$SUM_M;
				}else{}


				if(isset($PayingStoreArray)){
					$this->PayingStoreArray=$PayingStoreArray;
				}else{}
				
				if(isset($CountStore)){
					$this->CountStore=$CountStore;
				}else{}
		}function RunStoreSumAll(){
			if(isset($this->StoreSumAll)){
				return $this->StoreSumAll;
			}else{}
		}function SUM_C(){
			if(isset($this->SUM_C)){
				return $this->SUM_C;
			}else{}
		}function SUM_M(){
			if(isset($this->SUM_M)){
				return $this->SUM_M;
			}else{}
		}
		
		
		
		function RunPayingStoreArray(){
			if(isset($this->PayingStoreArray)){
				return $this->PayingStoreArray;
			}else{}			
		}function RunCountStore(){
			if(isset($this->CountStore)){
				return $this->CountStore;
			}else{}
		}
	}

?>





<?php
	class Upyear{
		public $y;
		public $YearError;
		function __construct($y){
			$this->y=$y;
			$IdAdder=$_SERVER["REMOTE_ADDR"];
			$ConnectStore=new ConnectStore($IdAdder);
			$pdo_store=$ConnectStore->CallConnectStore();
				
				try{
					$UpyearSql="UPDATE `store_set_year` SET `ssy_year`='{$this->y}' WHERE 1";
					$pdo_store->exec($UpyearSql);
					$YearError="Y";
				}catch(PDOException $e){
					$YearError="N";
				}
				
				if($YearError=="N"){
					$AddyearSql="INSERT INTO `store_set_year`(`ssy_year`) VALUES ('{$this->y}')";
					$pdo_store->exec($AddyearSql);
					$YearError="Y";
				}else{
					$YearError="N";
				}
				
			if(isset($YearError)){
				$this->YearError=$YearError;
				$pdo_store=null;
			}else{
				$pdo_store=null;
			}
		}function RunUpyear(){
			if(isset($this->YearError)){
				return $this->YearError;
			}else{}
		}
	}

?>

<?php
	class RowRcStoreList{
		public $RRSL_RSD;
		public $RowRcStoreListArray,$SumRcStoreList,$RSR_sid_id;
		function __construct($RRSL_RSD){
			$this->RRSL_RSD=$RRSL_RSD;
			$IdAdder=$_SERVER["REMOTE_ADDR"];
			$ConnectStore=new ConnectStore($IdAdder);
			$pdo_store=$ConnectStore->CallConnectStore();
			$RowRcStoreListArray=array();
			$SumRcStoreList=0;
				$RowRcStoreListSql="select `rcstore_data`.`RSD_No`,`rcstore_data`.`RSD_Txt`,`rcstore_list`.`RSD_No`,
								   `rcstore_list`.`RSR_NO`,`rcstore_list`.`RL_Price`
									from `rcstore_list` left join `rcstore_data`
									on (`rcstore_list`.`RSR_NO`=`rcstore_data`.`RSD_No`)									
									where `rcstore_list`.`RSD_No`='{$this->RRSL_RSD}';";
					if($RowRcStoreListRs=$pdo_store->query($RowRcStoreListSql)){
						while($RowRcStoreListRow=$RowRcStoreListRs->Fetch(PDO::FETCH_ASSOC)){
							if(is_array($RowRcStoreListRow) && count($RowRcStoreListRow)){
								$RowRcStoreListArray[]=$RowRcStoreListRow;
								$RRSL_RL_Price=$RowRcStoreListRow["RL_Price"];
								$SumRcStoreList=$SumRcStoreList+$RRSL_RL_Price;
							}else{
						        $RowRcStoreListArray=null;
								$SumRcStoreList=0.00;
							}
						}
					}else{
						$RowRcStoreListArray=null;
						$SumRcStoreList=0.00;						
					}

						if(($SumRcStoreList!="0.00")){

							$rcstore_receipt_sql="SELECT `RSR_sid_id` 
												  FROM `rcstore_receipt` 
												  WHERE `RSR_NO`='{$this->RRSL_RSD}'";
								if(($rcstore_receipt_rs=$pdo_store->query($rcstore_receipt_sql))){
									$rcstore_receipt_row=$rcstore_receipt_rs->Fetch(PDO::FETCH_ASSOC);
										if((is_array($rcstore_receipt_row) && count($rcstore_receipt_row))){
											$RSR_sid_id=$rcstore_receipt_row["RSR_sid_id"];
											$PrintData_IncreaseDecrease=new ShowDataIncreaseDecrease("Row",$rcstore_receipt_row["RSR_sid_id"]);
											foreach($PrintData_IncreaseDecrease->RunDataSDIDLoop() as $pay=>$PrintData_IncreaseDecreaseRow){
												$sid_int=$PrintData_IncreaseDecreaseRow["sid_int"];
												$status_maths=$PrintData_IncreaseDecreaseRow["status_maths"];
											}
									
												if(($PrintData_IncreaseDecrease->RunDataSDIDError()=="NoError")){
													
													if(($status_maths=="+")){
														$SumRcStoreList=($SumRcStoreList+$sid_int);
													}elseif(($status_maths=="-")){
														$SumRcStoreList=($SumRcStoreList-$sid_int);
													}elseif(($status_maths=="*")){
														$SumRcStoreList=($SumRcStoreList*$sid_int);
													}elseif(($status_maths=="/")){
														$SumRcStoreList=($SumRcStoreList/$sid_int);
													}else{
														$SumRcStoreList=($SumRcStoreList+0);
													}
									
												}else{
													$SumRcStoreList=($SumRcStoreList+0);
												}

										}else{}
								}else{}


						}else{}


			if(isset($RowRcStoreListArray)){
				$this->RowRcStoreListArray=$RowRcStoreListArray;
				$this->SumRcStoreList=$SumRcStoreList;
				$this->RSR_sid_id=$RSR_sid_id;
				$pdo_store=null;
			}else{
				$pdo_store=null;
			}
		}function PrintRowRcStoreList(){
			if(isset($this->RowRcStoreListArray)){
				return $this->RowRcStoreListArray;
			}else{}
		}function PrintSumRcStoreList(){
			if(isset($this->SumRcStoreList)){
				return $this->SumRcStoreList;
			}else{}
		}function PrintRSR_sid_id(){
			if(isset($this->RSR_sid_id)){
				return $this->RSR_sid_id;
			}else{}
		}
	}
?>


<?php
	class DataRcstoreReceipt{
		public $DRR_Sud,$DRR_Year,$DDR_Run;
		public $RcstoreReceiptArray;
		function __construct($DRR_Sud,$DRR_Year,$DDR_Run){
			
			$this->DRR_Sud=$DRR_Sud;
			$this->DRR_Year=$DRR_Year;
			$this->DDR_Run=$DDR_Run;
			
			$IdAdder=$_SERVER["REMOTE_ADDR"];
			$ConnectStore=new ConnectStore($IdAdder);
			$pdo_store=$ConnectStore->CallConnectStore();
			
			$RcstoreReceiptArray=array();
				if($DDR_Run=="A"){
					$DataRcstoreReceiptSql="SELECT * 
									    FROM `rcstore_receipt` 
										WHERE `RSR_Sud`='{$this->DRR_Sud}' 
										AND `RSR_Year`='{$this->DRR_Year}'";
						if($DataRcstoreReceiptRs=$pdo_store->query($DataRcstoreReceiptSql)){
							while($DataRcstoreReceiptRow=$DataRcstoreReceiptRs->Fetch(PDO::FETCH_ASSOC)){
								if(is_array($DataRcstoreReceiptRow) && count($DataRcstoreReceiptRow)){
									$RcstoreReceiptArray[]=$DataRcstoreReceiptRow;
								}else{
									$RcstoreReceiptArray=null;
								}								
							}
						}else{
							$RcstoreReceiptArray=null;
						}					
				}elseif($DDR_Run=="W"){
					$DataRcstoreReceiptSql="SELECT * 
									    FROM `rcstore_receipt` 
										WHERE `RSR_Year`='{$this->DRR_Year}'";
						if($DataRcstoreReceiptRs=$pdo_store->query($DataRcstoreReceiptSql)){
							while($DataRcstoreReceiptRow=$DataRcstoreReceiptRs->Fetch(PDO::FETCH_ASSOC)){
								if(is_array($DataRcstoreReceiptRow) && count($DataRcstoreReceiptRow)){
									$RcstoreReceiptArray[]=$DataRcstoreReceiptRow;
								}else{
									$RcstoreReceiptArray=null;
								}								
							}
						}else{
							$RcstoreReceiptArray=null;
						}					
				}elseif(($DDR_Run=="B")){
					$DataRcstoreReceiptSql="SELECT * 
											FROM `rcstore_receipt` 
											WHERE `RSR_Sud`='{$this->DRR_Sud}' 
											AND `RSR_Year`='{$this->DRR_Year}' 
											ORDER BY `RSR_NO` DESC";
						if($DataRcstoreReceiptRs=$pdo_store->query($DataRcstoreReceiptSql)){
							$DataRcstoreReceiptRow=$DataRcstoreReceiptRs->Fetch(PDO::FETCH_ASSOC);
								if(is_array($DataRcstoreReceiptRow) && count($DataRcstoreReceiptRow)){
									$RcstoreReceiptArray[]=$DataRcstoreReceiptRow;
								}else{
									$RcstoreReceiptArray=null;
								}								
							
						}else{
							$RcstoreReceiptArray=null;
						}	
				}else{
					$RcstoreReceiptArray=null;
				}
				
			if(isset($RcstoreReceiptArray)){
				$this->RcstoreReceiptArray=$RcstoreReceiptArray;
				$pdo_store=null;
			}else{
				$pdo_store=null;
			}
		}function RunDataRcstoreReceipt(){
			if(isset($this->RcstoreReceiptArray)){
				return $this->RcstoreReceiptArray;
			}else{}
		}
	}

?>


<?php
	class RowStore{
		public $RowStoreArray;
		function __construct(){
			$IdAdder=$_SERVER["REMOTE_ADDR"];
			$ConnectStore=new ConnectStore($IdAdder);
			$pdo_store=$ConnectStore->CallConnectStore();
			$RowStoreArray=array();
			$RowStoreSql="SELECT * FROM `rcstore_data` 
						  WHERE `RSD_OFFON`='ON'";
				if($RowStoreRs=$pdo_store->query($RowStoreSql)){
					while($RowStoreRow=$RowStoreRs->Fetch(PDO::FETCH_ASSOC)){
						if(is_array($RowStoreRow) && count($RowStoreRow)){
							$RowStoreArray[]=$RowStoreRow;
						}else{
							$RowStoreArray=null;
						}
					}
				}else{
					$RowStoreArray=null;
				}
				
			if(isset($RowStoreArray)){
				$this->RowStoreArray=$RowStoreArray;
				$pdo_store=null;
			}else{
				$pdo_store=null;
			}

		}function PrintRowStore(){
			if(isset($this->RowStoreArray)){
				return $this->RowStoreArray;
			}else{}
		}
	}
?>

<?php	
	class AgainStore{
		public $AS_key,$AS_year;
		public $RSR_Count;
		function __construct($AS_key,$AS_year){
			
			$this->AS_key=$AS_key;
			$this->AS_year=$AS_year;
			
			$IdAdder=$_SERVER["REMOTE_ADDR"];
			$ConnectStore=new ConnectStore($IdAdder);
			$pdo_store=$ConnectStore->CallConnectStore();
			
			$AginStoreSql="SELECT COUNT(`RSR_NO`) AS `RSR_Count`
						   FROM `rcstore_receipt` 
						   WHERE `RSR_Sud`='{$this->AS_key}' 
						   AND `RSR_Year`='{$this->AS_year}'";
				if($AginStoreRs=$pdo_store->query($AginStoreSql)){
					$AginStoreRow=$AginStoreRs->Fetch(PDO::FETCH_ASSOC);
						if(is_array($AginStoreRow) && count($AginStoreRow)){
							$RSR_Count=$AginStoreRow["RSR_Count"];
						}else{
							$RSR_Count=0;
						}
				}else{
					$RSR_Count=0;
				}
				
				if(isset($RSR_Count)){
					$this->RSR_Count=$RSR_Count;
					$pdo_store=null;
				}else{
					$pdo_store=null;
				}
		}function RunAgainStore(){
			if(isset($this->RSR_Count)){
				return $this->RSR_Count;
			}else{}
		}
	}
?>


<?php
	class DeleteStore{
		public $DRkey;
		public $DeleteStoreError;
		function __construct($DRkey){
			$this->DRkey=$DRkey;
			
			$IdAdder=$_SERVER["REMOTE_ADDR"];
			$ConnectStore=new ConnectStore($IdAdder);
			$pdo_store=$ConnectStore->CallConnectStore();
			
//rcstore_receipt			
			try{
				$DeleteReceiptSql="DELETE FROM `rcstore_receipt` WHERE `RSR_NO`='{$this->DRkey}'";	
				$pdo_store->exec($DeleteReceiptSql);
				$DeleteStoreError="YES";
			}catch(PDOException $e){
				$DeleteStoreError="ON";
			}
//rcstore_receipt end

//rcstore_list			
			try{
				$DeleteListSql="DELETE FROM `rcstore_list` WHERE `RSD_No`='{$this->DRkey}'";
				$pdo_store->exec($DeleteListSql);
				$DeleteStoreError="YES";
			}catch(PDOException $e){
				$DeleteStoreError="ON";
			}
//rcstore_list end			
			if(isset($DeleteStoreError)){
				$this->DeleteStoreError=$DeleteStoreError;
				$pdo_store=null;
			}else{
				$pdo_store=null;
			}
		}function RunDeleteStore(){
			if(isset($this->DeleteStoreError)){
				return $this->DeleteStoreError;
			}else{}
		}	
	}
?>


<?php
	class AddStore_List{
		public $ASL_RSD,$ALS_RSR,$ALS_Price;
		public $AddStoreListError;
		function __construct($ASL_RSD,$ALS_RSR,$ALS_Price){
			$this->ASL_RSD=$ASL_RSD;
			$this->ALS_RSR=$ALS_RSR;
			$this->ALS_Price=$ALS_Price;
			
				if($this->ALS_Price==null){
					$ALS_Price=0;
				}else{
					$ALS_Price=$this->ALS_Price;
				}
			
			$IdAdder=$_SERVER["REMOTE_ADDR"];
			$ConnectStore=new ConnectStore($IdAdder);
			$pdo_store=$ConnectStore->CallConnectStore();
			
			try{
				$AddStoreListSql="INSERT INTO `rcstore_list`(`RSD_No`, `RSR_NO`, `RL_Price`) 
								  VALUES ('{$this->ASL_RSD}','{$this->ALS_RSR}','{$ALS_Price}')";
				$pdo_store->exec($AddStoreListSql);
				$AddStoreListError="ON";
			}catch(PDOException $e){
				$AddStoreListError="YES";
			}
				if(isset($AddStoreListError)){
					$this->AddStoreListError=$AddStoreListError;
					$pdo_store=null;
				}else{
					$pdo_store=null;
				}	
		}function RunAddStore_List(){
			if(isset($this->AddStoreListError)){
				return $this->AddStoreListError;
			}else{}
		}
	}

?>


<?php
	class AddDataStore{
		public $ADS_sud,$ADS_year,$ADS_officer,$ADS_pay,$ADS_sid_id;
		public $CountOn,$ADS_Error;
		function __construct($ADS_sud,$ADS_year,$ADS_officer,$ADS_pay,$ADS_sid_id){
			$this->ADS_sud=$ADS_sud;
			$this->ADS_year=$ADS_year;
			$this->ADS_officer=$ADS_officer;
			$this->ADS_pay=$ADS_pay;
			$this->ADS_sid_id=$ADS_sid_id;
			
					
			$y=date("Y");
			$y=$y+543;
			
			$day=date("Y-m-d H:i:s");
						
			$IdAdder=$_SERVER["REMOTE_ADDR"];
			$ConnectStore=new ConnectStore($IdAdder);
			$pdo_store=$ConnectStore->CallConnectStore();
			
			$CountDataStoreSql="SELECT `RSR_NO` AS `CountRSR` 
								FROM `rcstore_receipt` 
								WHERE `RSR_Year`='{$this->ADS_year}' 
								ORDER BY `CountRSR` DESC LIMIT 1;";
				if($CountDataStoreRs=$pdo_store->query($CountDataStoreSql)){
					$CountDataStoreRow=$CountDataStoreRs->Fetch(PDO::FETCH_ASSOC);
						if(is_array($CountDataStoreRow) && count($CountDataStoreRow)){
							$CountRSR=substr($CountDataStoreRow['CountRSR'],4);
							$CountRSR=$CountRSR+1;
								if($CountRSR<=9){
									$CountOn=$y."00".$CountRSR;
								}elseif($CountRSR<=99){
									$CountOn=$y."0".$CountRSR;
								}else{
									$CountOn=$y.$CountRSR;
								}
						}else{
							$CountOn=$y."001";
						}
				}else{
					$CountOn=null;
				}
			
			// data_treasurer class manage_treasurer
				$CopyDate_treasurer=new manage_treasurer('read','-','-','on');
					if(($CopyDate_treasurer->Run_Manage_Error()=="no_error")){
						foreach($CopyDate_treasurer->Run_Manage_Row() as $key=>$CopyDate_treasurerRow){
							$RSR_tre_id=$CopyDate_treasurerRow["tre_id"];
						} 
					}else{
						$RSR_tre_id=null;
					}
			// data_treasurer class manage_treasurer end

			//Add : rcstore_receipt
				try{
					$AddDataStoreSql="INSERT INTO `rcstore_receipt`(`RSR_NO`, `RSR_Sud`, `RSR_Year`, `RSR_DateTime`, `RSR_Officer`,`RSR_Pay`,`RSR_sid_id`,`RSR_tre_id`) 
									  VALUES ('{$CountOn}','{$this->ADS_sud}','{$this->ADS_year}','{$day}','{$this->ADS_officer}','{$this->ADS_pay}','{$this->ADS_sid_id}','{$RSR_tre_id}')";
					$pdo_store->exec($AddDataStoreSql);
					$ADS_Error="ON";
				}catch(PDOException $e){
					$ADS_Error="YES";
				}
			//Add : rcstore_receipt End
			
			if(isset($CountOn)){
				$this->CountOn=$CountOn;
			}else{}
			
			if(isset($ADS_Error)){
				$this->ADS_Error=$ADS_Error;
			}else{}
			$pdo_store=null;
		}function RunCountOn(){
			if(isset($this->CountOn)){
				return $this->CountOn;
			}else{}
		}function RunADS_Error(){
			if(isset($this->ADS_Error)){
				return $this->ADS_Error;
			}else{}
		}
	}

?>



<?php
	class SetYear{
		public $ssy_year;
		function __construct(){
			$IdAdder=$_SERVER["REMOTE_ADDR"];
			$ConnectStore=new ConnectStore($IdAdder);
			$pdo_store=$ConnectStore->CallConnectStore();
			
			$SetYearSql="SELECT `ssy_year` FROM `store_set_year` WHERE 1";
				
				if($SetYearRs=$pdo_store->query($SetYearSql)){
					$SetYearRow=$SetYearRs->Fetch(PDO::FETCH_ASSOC);
						if(is_array($SetYearRow) && count($SetYearRow)){
							$ssy_year=$SetYearRow["ssy_year"];
						}else{
							$ssy_year=null;
						}
				}else{
					$ssy_year=null;
				}
				
			if(isset($ssy_year)){
				$this->ssy_year=$ssy_year;
				$pdo_store=null;
			}else{
				$pdo_store=null;
			}
		}function RunSetYear(){
			if(isset($this->ssy_year)){
				return $this->ssy_year;
			}else{}
		}
	}
?>