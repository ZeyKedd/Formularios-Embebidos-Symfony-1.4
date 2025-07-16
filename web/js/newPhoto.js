$(document).ready(function() {
  $('#add-photo').click(function() {
    var index = $('.photo-form').length;
    var $newForm = $('.photo-form:last').clone();

    $newForm.find('input, textarea, select, label').each(function() {
      // Actualizar name
      var name = $(this).attr('name');
      if (name) {
        $(this).attr('name', name.replace(/\[\d+\]/, '[' + index + ']')).val('');
      }

      // Actualizar id
      var id = $(this).attr('id');
      if (id) {
        $(this).attr('id', id.replace(/\d+/, index));
      }

      // También actualizar atributo "for" en <label>
      var htmlFor = $(this).attr('for');
      if (htmlFor) {
        $(this).attr('for', htmlFor.replace(/\d+/, index));
      }
    });

    $newForm.find('.error_list').remove();

    $('#photo-form-container').append($newForm);
  });
});
