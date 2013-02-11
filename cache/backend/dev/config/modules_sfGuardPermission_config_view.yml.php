<?php
// auto-generated by sfViewConfigHandler
// date: 2013/02/11 15:30:57
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('assets/bootstrap/css/bootstrap.min.css', '', array ());
  $response->addStylesheet('assets/bootstrap/css/bootstrap-responsive.min.css', '', array ());
  $response->addStylesheet('assets/font-awesome/css/font-awesome.css', '', array ());
  $response->addStylesheet('assets/css/style.css', '', array ());
  $response->addStylesheet('assets/css/style_responsive.css', '', array ());
  $response->addStylesheet('assets/css/style_default.css', '', array ());
  $response->addStylesheet('assets/fancybox/source/jquery.fancybox.css', '', array ());
  $response->addStylesheet('assets/gritter/css/jquery.gritter.css', '', array ());
  $response->addStylesheet('assets/uniform/css/uniform.default.css', '', array ());
  $response->addStylesheet('assets/bootstrap-daterangepicker/daterangepicker.css', '', array ());
  $response->addStylesheet('assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css', '', array ());
  $response->addStylesheet('assets/jqvmap/jqvmap/jqvmap.css', '', array ());
  $response->addJavascript('assets/js/jquery-1.8.2.min.js', '', array ());
  $response->addJavascript('assets/bootstrap/js/bootstrap.min.js', '', array ());
  $response->addJavascript('assets/js/jquery.blockui.js', '', array ());
  $response->addJavascript('assets/uniform/jquery.uniform.min.js', '', array ());
  $response->addJavascript('assets/fancybox/source/jquery.fancybox.pack.js', '', array ());
  $response->addJavascript('assets/js/app.js', '', array ());
  $response->addJavascript('http://code.highcharts.com/highcharts.js', '', array ());
  $response->addJavascript('http://code.highcharts.com/modules/exporting.js', '', array ());


