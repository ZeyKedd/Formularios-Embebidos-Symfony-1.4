<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php use_javascript('jquery-1.3.2.min.js') ?>
<?php use_javascript('newPhoto.js') ?>
<?php use_javascript('removePhoto.js') ?>
<form action="<?php echo url_for('product/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?id=' . $form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
  <?php endif; ?>

  <fieldset class="form-section">
    <legend>Product information</legend>

    <?php echo $form['name']->renderRow() ?>
    <?php echo $form['price']->renderRow() ?>
  </fieldset>

  <fieldset class="form-section">
    <legend>Upload More Photos</legend>
    <div id="photo-form-container">
      <?php foreach ($form['newPhotos'] as $photo): ?>
        <div class="photo-form">
          <?php echo $photo['caption']->renderRow() ?>
          <div class="form-row">
            <?php echo $photo['filename']->render() ?>
            <?php echo $photo['filename']->renderError() ?>
          </div>
          <!-- <button id="remove-photo" type="button">Eliminar</button> -->
        </div>
      <?php endforeach; ?>
    </div>
    <button class="form-submit" id="add-photo" type="button">Agregar otra foto</button>
  </fieldset>

  <?php if (!$form->getObject()->isNew()): ?>
    <fieldset class="form-section">
      <legend>Current Photos</legend>

      <?php foreach ($form['Photos'] as $photo): ?>
        <?php echo $photo['caption']->renderRow() ?>
        <div class="form-row">
          <?php echo $photo['filename']->renderRow(array('width' => 500)) ?>
          <?php echo $photo['filename']->renderError() ?>
        </div>
      <?php endforeach; ?>
    </fieldset>
  <?php endif; ?>

  <div>
    <?php echo $form->renderHiddenFields() ?>
  </div>

  <input type="submit" class="form-submit" value="Save" />
  <a href="<?php echo url_for('product/index') ?>">Back to list</a>
</form>
