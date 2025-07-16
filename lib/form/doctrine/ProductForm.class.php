<?php

/**
 * Product form.
 *
 * @package    advanced_form
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProductForm extends BaseProductForm
{
  public function configure()
  {
    $form = new ProductPhotoCollectionForm(null, array(
      'product' => $this->getObject(),
      'size' => $this->getDynamicSize(),
    ));
    $this->embedForm('newPhotos', $form);
    $this->embedRelation('Photos');
  }

  public function getDynamicSize(){
    $request = sfContext::getInstance()->getRequest();
    $params = $request->getParameter('product');

    if(isset($params['newPhotos']) && is_array($params['newPhotos']))
    {
      return count($params['newPhotos']);
    }
  }

  public function saveEmbeddedForms($con = null, $forms = null)
  {
    if (null === $forms) {
      $photos = $this->getValue('newPhotos');
      $forms = $this->embeddedForms;

      foreach ($this->embeddedForms['newPhotos'] as $name => $form) {
        if (!isset($photos[$name])) {
          unset($forms['newPhotos'][$name]);
        }
      }
    }
    return parent::saveEmbeddedForms($con, $forms);

  }
}
