<?php

/**
 * EIASiteVisit
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class EIASiteVisit extends BaseEIASiteVisit
{
	 public function save(Doctrine_Connection $conn = null)
	  {
	   $conn = $conn ? $conn : $this->getTable()->getConnection();
	   $conn->beginTransaction();
		try
		{
		 
		 ///
		if (!$this->getToken())
		{
			$this->setToken(sha1(date().rand(11111, 99999)));
		}
		
		$ret = parent::save($conn);
		$conn->commit();
		return $ret ;
	   
		}
		catch(Exception $e)
		{
		$conn->rollBack();
		throw $e;
		}
	  }
}