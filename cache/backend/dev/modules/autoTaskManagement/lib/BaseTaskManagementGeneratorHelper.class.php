<?php

/**
 * taskManagement module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage taskManagement
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTaskManagementGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'task_assignment_taskManagement' : 'task_assignment_taskManagement_'.$action;
  }
}
