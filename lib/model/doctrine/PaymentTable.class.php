<?php

/**
 * PaymentTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PaymentTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object PaymentTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Payment');
    }
	
	/*
	This method recieves serial number as a parameter and checks if it exists in the database table for payment simulation
	*/
	public function getConfirmPayment($serial)
	{
	 $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT slip_number FROM payment
             WHERE slip_number = '$serial' ");
			 //
			 //print_r($query); exit;
	return $query;
	}

	/*
	This method returns reference numbers as a parameter and checks if it exists in the database table for payment simulation
	*/
	public function getPendingPayments()
	{
	 $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT slip_number,business_id FROM payment
             WHERE payment_status = 'notpaid' ");
			 //
			 //print_r($query); exit;
	return $query;
	}

	public function updatePaymentStatus($refno)
	{
	 $payment_status = "paid" ;
	  $q = Doctrine_Query::create()
	 ->UPDATE('Payment')
	 ->SET('payment_status', '?' , $payment_status)
	 ->WHERE('slip_number = ?', $refno);
	 $q->execute();
	}
}