<?php

//require_once 'C://xampp//htdocs//newsymfony//lib/autoload/sfCoreAutoload.class.php';
require_once dirname(__FILE__).'/../lib/vendor/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
	
	//
	$this->enablePlugins(array('sfDoctrinePlugin','sfDoctrineGuardPlugin', 'sfForkedDoctrineApplyPlugin' ,'sfFormExtraPlugin' ,
	'sfDoctrineActAsSignablePlugin', 'sfThemeGeneratorPlugin', 'sfTCPDFPlugin', 'sfKoreroPlugin'
	)) ;
	
	
  }
}
