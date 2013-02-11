<?php

/**
 * taskManagement module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage taskManagement
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTaskManagementGeneratorConfiguration extends sfModelGeneratorConfiguration
{
  public function getActionsDefault()
  {
    return array();
  }

  public function getFormActions()
  {
    return array(  '_delete' => NULL,  '_list' => NULL,  '_save' => NULL,  '_save_and_add' => NULL,);
  }

  public function getNewActions()
  {
    return array();
  }

  public function getEditActions()
  {
    return array();
  }

  public function getListObjectActions()
  {
    return array(  '_edit' => NULL,  '_delete' => NULL,);
  }

  public function getListActions()
  {
    return array(  '_new' => NULL,);
  }

  public function getListBatchActions()
  {
    return array(  '_delete' => NULL,);
  }

  public function getListParams()
  {
    return '%%=sfGuard_user%% - %%investment_application%% - %%instructions%% - %%duedate%% - %%work_status%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Data admin Jobs Management';
  }

  public function getEditTitle()
  {
    return 'Edit Job Assigned To %%sfGuard_user%%';
  }

  public function getNewTitle()
  {
    return 'Assign A New Task To a Data Admin';
  }

  public function getFilterDisplay()
  {
    return array(  0 => 'user_assigned',);
  }

  public function getFormDisplay()
  {
    return array();
  }

  public function getEditDisplay()
  {
    return array();
  }

  public function getNewDisplay()
  {
    return array();
  }

  public function getListDisplay()
  {
    return array(  0 => '=sfGuard_user',  1 => 'investment_application',  2 => 'instructions',  3 => 'duedate',  4 => 'work_status',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'user_assigned' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',  0 =>   array(    'label' => 'User Assigned',  ),  1 =>   array(    'help' => 'The User who is responsible for processing this record',  ),),
      'investmentapp_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'instructions' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'duedate' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'work_status' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'created_by' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'updated_by' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'user_assigned' => array(),
      'investmentapp_id' => array(),
      'instructions' => array(),
      'duedate' => array(),
      'work_status' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'created_by' => array(),
      'updated_by' => array(),
      'sfGuard_user' => array(  'label' => 'User Assigned',),
      'investment_application' => array(  'label' => 'For Business',),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'user_assigned' => array(),
      'investmentapp_id' => array(),
      'instructions' => array(),
      'duedate' => array(),
      'work_status' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'created_by' => array(),
      'updated_by' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'user_assigned' => array(),
      'investmentapp_id' => array(),
      'instructions' => array(),
      'duedate' => array(),
      'work_status' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'created_by' => array(),
      'updated_by' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'user_assigned' => array(),
      'investmentapp_id' => array(),
      'instructions' => array(),
      'duedate' => array(),
      'work_status' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'created_by' => array(),
      'updated_by' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'user_assigned' => array(),
      'investmentapp_id' => array(),
      'instructions' => array(),
      'duedate' => array(),
      'work_status' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'created_by' => array(),
      'updated_by' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'TaskAssignmentForm';
  }

  public function hasFilterForm()
  {
    return true;
  }

  /**
   * Gets the filter form class name
   *
   * @return string The filter form class name associated with this generator
   */
  public function getFilterFormClass()
  {
    return 'TaskAssignmentFormFilter';
  }

  public function getPagerClass()
  {
    return 'sfDoctrinePager';
  }

  public function getPagerMaxPerPage()
  {
    return 10;
  }

  public function getDefaultSort()
  {
    return array(null, null);
  }

  public function getTableMethod()
  {
    return '';
  }

  public function getTableCountMethod()
  {
    return '';
  }
}
