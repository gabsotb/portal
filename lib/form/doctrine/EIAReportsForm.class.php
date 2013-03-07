<?php

/**
 * EIAReports form.
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EIAReportsForm extends BaseEIAReportsForm
{
  public function configure()
  {
		unset(
				$this['updated_by'], $this['updated_at'],
				$this['created_at'], $this['created_by']
			);
		$this->widgetSchema['module'] = new sfWidgetFormChoice(array(
		  'choices'  => Doctrine_Core::getTable('EIAReports')->getModules(),
		  'expanded' => false,
		  'multiple' => false,
		));
		$this->validatorSchema['module'] = new sfValidatorChoice(array(
		  'choices' => array_keys(Doctrine_Core::getTable('EIAReports')->getModules()),
		));	
		$this->widgetSchema->setLabels(array(
		  'module'    => 'Application Type',
		));
		$this->validatorSchema['module_id']->setDefault('required', false);
	}
	
}

