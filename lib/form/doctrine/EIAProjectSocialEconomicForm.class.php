<?php

/**
 * EIAProjectSocialEconomic form.
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EIAProjectSocialEconomicForm extends BaseEIAProjectSocialEconomicForm
{
  public function configure()
  {
   unset($this['created_at'],$this['updated_at'], $this['created_by'], $this['updated_by'] , $this['token']);
	$this->setDefault('created_at',date('Y-m-d 00:00:00'));
	//
	$this->widgetSchema['existing_settlements'] = new sfWidgetFormChoice(array(
	  'label' => 'Any Existing Settlements in the Project Area?',
	  'choices'  => Doctrine_Core::getTable('EIAProjectDescription')->getQuestionValues(),
	  'expanded' => false,
    ));
	//
	$this->widgetSchema->setLabels(array(
	'average_family_size' => 'Average Family Size:',
	));
	///
	$this->widgetSchema['local_organization'] = new sfWidgetFormChoice(array(
	 # 'label' => 'Category',
	  'choices'  => Doctrine_Core::getTable('EIAProjectDescription')->getQuestionValues(),
	  'expanded' => false,
    ));
	$this->widgetSchema['social_infrastructures'] = new sfWidgetFormChoice(array(
	 # 'label' => 'Category',
	  'choices'  => Doctrine_Core::getTable('EIAProjectDescription')->getQuestionValues(),
	  'expanded' => false,
    ));
  }
}
