<?php

//require_once 'C://xampp//htdocs//newsymfony//lib/autoload/sfCoreAutoload.class.php';
require_once dirname(__FILE__).'/../lib/vendor/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  
  //registering zend framework
  static protected $zendLoaded = false;
 
  static public function registerZend()
  {
    if (self::$zendLoaded)
    {
      return;
    }
 
    set_include_path(sfConfig::get('sf_lib_dir').'/vendor'.PATH_SEPARATOR.get_include_path());
    require_once sfConfig::get('sf_lib_dir').'/vendor/Zend/Loader/Autoloader.php';
    Zend_Loader_Autoloader::getInstance();
    self::$zendLoaded = true;
  }
  ///
  public function setup()
  {
	
	//
	$this->enablePlugins(array('sfDoctrinePlugin','sfDoctrineGuardPlugin', 'sfForkedDoctrineApplyPlugin' ,'sfFormExtraPlugin' ,
	'sfDoctrineActAsSignablePlugin', 'sfThemeGeneratorPlugin', 'sfTCPDFPlugin', 'sfKoreroPlugin'
	)) ;
	
	
  }
}
