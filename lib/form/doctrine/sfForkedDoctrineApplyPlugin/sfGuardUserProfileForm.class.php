<?php

/**
 * sfGuardUserProfile form.
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserProfileForm extends PluginsfGuardUserProfileForm
{
  public function configure()
  {
     $this->widgetSchema['salutation'] = new sfWidgetFormChoice(array(
	  'label' => 'Salutation',
	  'choices'  => Doctrine_Core::getTable('sfGuardUserProfile')->getSaluations(),
	  'expanded' => false,
    ));
	///
	 $this->widgetSchema['citizenship'] = new sfWidgetFormChoice(array(
	  'label' => 'Countries',
	  'choices'  => Doctrine_Core::getTable('sfGuardUserProfile')->getCountries(),
	  'expanded' => false,
    ));
	///change field to file upload field
	$this->widgetSchema['id_passport'] = new sfWidgetFormInputFileEditable(array(
   'label'=>'Identity Card or Passport',
   'file_src' =>'/uploads/logos'.$this->getObject()->getIdPassport(),
   #'is_image' => true,
   'edit_mode' => !$this->isNew(),
   'template' => '<div>%file%<br/>%input%<br/>%delete% %delete_label%</div>',
   ),array('class' => 'default'));
   $this->validatorSchema['logo_delete'] = new sfValidatorPass();
   //also change the default validator
   $this->validatorSchema['id_passport'] = new sfValidatorFile(array(
   'required' => false,
   'path' =>sfConfig::get('sf_upload_dir').'/logos',
   'mime_types'=> 'web_images',
   ));
	
  }
}
