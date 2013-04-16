<?php

/**
 * BankOfKigaliPaymentCheck actions.
 *
 * @package    rdbeportal
 * @subpackage BankOfKigaliPaymentCheck
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BankOfKigaliPaymentCheck
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  private $xml;
  public $Number;
  public $date;
  public $time;
  public $Amount;
  public $currency;
  public $purpose;
  public $payer;
  public $Idcode;
  
  //Initialize Transaction recordset for the day
  public function BankOfKigaliPaymentCheck() {
	$contents = file_get_contents('http://127.0.0.1/bk/my.xml');
	$contents = str_replace("&", '&amp;', $contents);
	$contents = str_ireplace("UTF-16", 'UTF-8', $contents);
	$this->xml = simplexml_load_string(strstr($contents, '<'));
//	file_put_contents("bank_of_kigali.xml", 'Edwin Seno');
  }

	//Get transaction details by transaction number *To be changed to reference number	
	public function getTransactionByNumber($transactionNumber){
		foreach($this->xml->row as $transaction){
			if($transactionNumber==$transaction->Number){
				$this->Number = $transaction->Number;
				$this->date = $transaction->date;
				$this->time = $transaction->time;
				$this->Amount = $transaction->Amount;
				$this->currency = $transaction->currency;
				$this->purpose = $transaction->purpose;
				$this->payer = $transaction->payer;
				$this->Idcode = $transaction->Idcode;
			}else{
				$exists = array(false, 0, null, null, 0, null, null, null, null);
			}
		}	
	}
	
	//Check whether transaction for transaction/reference number exists
	public function transaction_number_exists($transactionNumber){
		$exists = false;
		foreach($this->xml->row as $transaction){
			if($transactionNumber==$transaction->Number){
//				$exists = array(true, $transaction->Number, $transaction->date, $transaction->time, $transaction->Amount, $transaction->currency, $transaction->purpose, $transaction->payer, $transaction->Idcode);
				$exists = true;
				break;
			}else{
				$exists = false;
//				$exists = array(false, 0, null, null, 0, null, null, null, null);
			}
		}
		return $exists;
	}

  public function checkPayments()
  {
    /*
	We assume we have access to the Financial Payment system and we retrieve payment done by a particular individual using the transaction number. 
	*/
	//print $params; exit;
	//we get the parameter and confirm if the number exists
	$confirmation = Doctrine_Core::getTable('Payment')->getPendingPayments();
	$serial = null;
	$business;
	foreach($confirmation as $con)
	{
	 $serial = $this->transaction_number_exists($con['slip_number']);
	 $business=$con['business_id'];
	}
	   //if the returned serial is not equal to passed form variable
		if(!$serial)
		{
		 //not paid, so do nothing
//		file_put_contents("false.xml", $business.'Edwin Seno');
		}
		//else if equal, then payment has been made
		if($serial)
		{
			//since payment was successful, let informed the user that payment was successful.
			//we only have business name, since it is unique, we can use it to get the Taskid by joining TaskAssignment with InvestmentApplication
			$investment=Doctrine_Core::getTable('InvestmentApplication')->find(array($business));
			$result = Doctrine_Core::getTable('TaskAssignment')->updatingPaymentStatus($investment->getName());
			$taskId = null;
			foreach($result as $r)
			{
			 $taskId = $r['investmentapp_id'];
			}
			$update = Doctrine_Core::getTable('TaskAssignment')->updateUserTaskStatus3($taskId);
			//$this->scorpionPayment($taskId);
			
		}
	
  }
    
}
