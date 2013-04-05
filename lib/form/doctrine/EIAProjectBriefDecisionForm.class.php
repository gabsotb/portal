<?php

/**
 * EIAProjectBriefDecision form.
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EIAProjectBriefDecisionForm extends BaseEIAProjectBriefDecisionForm
{
  public function configure()
  {
    unset( $this['created_at'],$this['updated_at'],$this['created_by'], $this['updated_by'] , 
			$this['token'], $this['processed_by'], $this['eiaproject_id'], $this['decision'] );
			
	$this->widgetSchema['comments']=new sfWidgetFormTextarea();
  }
}
