<?php

/**
 * TorDecisions form.
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TorDecisionsForm extends BaseTorDecisionsForm
{
  public function configure()
  {
		unset(
			$this['created_at'], $this['created_by'],
			$this['updated_by'], $this['updated_at']
		);
		
		$this->widgetSchema['status'] = new sfWidgetFormChoice(array(
		'choices' => Doctrine_Core::getTable('TorDecisions')->getDecisions(),
		'multiple' => false, 
		'expanded' => false,
		));	
		
		$this->validatorSchema['status'] = new sfValidatorChoice(array(
		'choices' => array_keys(Doctrine_Core::getTable('TorDecisions')->getDecisions()),
		));
  }
}
