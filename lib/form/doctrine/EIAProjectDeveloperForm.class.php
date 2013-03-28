<?php

/**
 * EIAProjectDeveloper form.
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EIAProjectDeveloperForm extends BaseEIAProjectDeveloperForm
{
	public function configure()
	{
		unset( $this['created_by'], $this['updated_by'],
				$this['created_at'], $this['updated_at'],
				$this['token']
			);
		$this->widgetSchema['eiaproject_id'] = new sfWidgetFormInputHidden() ;
		$this->setDefault('eiaproject_id', Doctrine_Core::getTable('EIAProjectDetail')->getProjectId());
		
		$this->validatorSchema['email_address'] = new sfValidatorAnd(array(
		  $this->validatorSchema['email_address'],
		  new sfValidatorEmail(),
		));  
		
		$this->widgetSchema['communication_mode'] = new sfWidgetFormChoice(array(
		  'choices'  => Doctrine_Core::getTable('EIAProjectDeveloper')->getSocials(),
		  'multiple' => false,
		  'expanded' => false,
		));
		$this->validatorSchema['communication_mode'] = new sfValidatorChoice(array(
		  'choices' => array_keys(Doctrine_Core::getTable('EIAProjectDeveloper')->getSocials()),
		));

	}
}
