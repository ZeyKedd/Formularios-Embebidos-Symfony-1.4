<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');

    $this->getEventDispatcher()->connect(
      'form.validation_error',
      array('BaseForm','listenToValidationError')
    );

    sfWidgetFormSchema::setDefaultFormFormatterName('ac2009');
  }
}
