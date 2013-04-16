<?php

/**
 * ProjectImpact form.
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProjectImpactForm extends BaseProjectImpactForm
{
  public function configure()
  {
	unset(
		$this['created_at'], $this['created_by'], $this['updated_by'], $this['updated_at'],
		$this['eiaproject_id'], $this['token']
	);
	
	$this->widgetSchema['impact_level'] = new sfWidgetFormChoice(array(
		'choices' => Doctrine_Core::getTable('Projectimpact')->getImpactLevels(),
		'multiple' => false,
		'expanded' => false,
	));	
	
	$this->ValidatorSchema['impact_level'] = new sfValidatorChoice(array(
		'choices' => array_keys(Doctrine_Core::getTable('Projectimpact')->getImpactLevels()),
	));

	
  }
}
