
$(document).ready(function() {
  $('#remove-photo').click(function() {
    if ($('.photo-form').length > 1) {
      $(this).closest('.photo-form').remove();
    } else {
      alert('Debe haber al menos una foto.');
    }
  });
});