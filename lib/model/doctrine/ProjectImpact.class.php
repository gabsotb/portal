<?php

/**
 * ProjectImpact
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class ProjectImpact extends BaseProjectImpact
{
		public function save(Doctrine_Connection $conn = null)
		{
			$conn = $conn ? $conn : $this->getTable()->getConnection();
			$conn->beginTransaction();
				try
				{
					$ret = parent::save($conn);
					$conn->commit();
					Doctrine_Core::getTable('EIApplicationStatus')->updateApplicationStatus("Processed",	$this->getCompanyId());
					if($this->getImpactLevel()==0)
					{
						$level="Rejected";
					}elseif($this->getImpactLevel()==1)
					{
						$level="Impact Level 1";
					}elseif($this->getImpactLevel()==2)
					{
						$level="Impact Level 2";
					}elseif($this->getImpactLevel()==3)
					{
						$level="Impact Level 3";
					}
					Doctrine_Core::getTable('EIApplicationStatus')->updateComment("Your Document has been processed.{$level} ",	$this->getCompanyId());
					Doctrine_Core::getTable('EIApplicationStatus')->updatePercentage("50",	$this->getCompanyId());
						
					return $ret ;
					
				}
				catch(Exception $e)
				{
					$conn->rollBack();
					throw $e;
				}
	  }
}