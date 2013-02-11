<?php
// auto-generated by sfDefineEnvironmentConfigHandler
// date: 2013/02/11 15:20:27
sfConfig::add(array(
  'app_recaptcha_enabled' => false,
  'app_sfApplyPlugin_from' => array (
  'email' => 'noreply@chores.com',
  'fullname' => 'System Administrator',
),
  'app_sfForkedApply_applyForm' => 'sfApplyApplyForm',
  'app_sfForkedApply_resetForm' => 'sfApplyResetForm',
  'app_sfForkedApply_resetRequestForm' => 'sfApplyResetRequestForm',
  'app_sfForkedApply_settingsForm' => 'sfApplySettingsForm',
  'app_sfForkedApply_editEmailForm' => 'sfApplyEditEmailForm',
  'app_sfForkedApply_mail_editable' => false,
  'app_sfForkedApply_confirmation' => array (
  'reset' => true,
  'apply' => true,
  'email' => true,
  'reset_logged' => false,
),
  'app_sfForkedApply_routes' => array (
  'apply' => '/user/new',
  'reset' => '/user/password-reset',
  'resetRequest' => '/user/reset-request',
  'resetCancel' => '/user/reset-cancel',
  'validate' => '/user/confirm/:validate',
  'settings' => '/user/settings',
),
));
