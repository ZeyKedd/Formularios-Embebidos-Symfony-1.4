<?php

/**
 * ProductPhoto filter form base class.
 *
 * @package    advanced_form
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProductPhotoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'product_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Product'), 'add_empty' => true)),
      'filename'   => new sfWidgetFormFilterInput(),
      'caption'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'product_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Product'), 'column' => 'id')),
      'filename'   => new sfValidatorPass(array('required' => false)),
      'caption'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('product_photo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProductPhoto';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'product_id' => 'ForeignKey',
      'filename'   => 'Text',
      'caption'    => 'Text',
    );
  }
}
