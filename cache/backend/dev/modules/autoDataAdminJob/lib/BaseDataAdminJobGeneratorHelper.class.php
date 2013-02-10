<?php

/**
 * dataAdminJob module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage dataAdminJob
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseDataAdminJobGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'task_assignment' : 'task_assignment_'.$action;
  }
}
