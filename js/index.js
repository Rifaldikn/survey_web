jQuery(function($) {
  var $modal = $('#myModal');
  $modal.on('shown.bs.modal', function(e) {
    var $body = $('.modal-body', $modal).empty(),
      options = {
        dataType: 'json',
        showActionButtons: false
      };

    var formBuilder = $body.formBuilder(options).data('formBuilder');

    $('#clearAll').on('click', function(e) {
      formBuilder.actions.clearFields();
    });

    $('#saveChanges').on('click', function(e) {
      formBuilder.actions.save();
    });

  });
});