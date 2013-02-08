<?php

/**
 * TaskAssignment form.
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TaskAssignmentForm extends BaseTaskAssignmentForm
{
  public function configure()
  {
    //Labels
   $this->widgetSchema->setLabel('created_at', 'Date');
   $this->widgetSchema->setLabel('user_assigned', 'Assign To ');
   $this->widgetSchema->setLabel('investmentapp_id', 'Application Documents  For ');
   //$this->widgetSchema = new sfWidgetFormSelect(array('choices' => date('Y-m-d H:i:s')));
   //set default date and time
   $this->setDefault('created_at',date('Y-m-d H:i:s')); 
  // unset($this['username_id']);
   //unset some fields
   unset($this['updated_at'], $this['created_by'], $this['updated_by']);
   ///changing input
   $this->widgetSchema['instructions'] = new sfWidgetFormTextarea() ;
   //when a user is creating a new assignment we echo default status as not started untill the user assigned accesses the
   //document and clicks start work button.
   $status = "notstarted";
   $this->setDefault('work_status',$status );
  }
}
