$(document).ready(function() {
  $('#change_name').click(function(e) {
    var buttonElement = $(this);
    var nameInputElement = buttonElement.closest('.card-body').find('input[name="name"]');
    var invalidElement = nameInputElement.next('span.invalid-feedback');
    var messageElement = invalidElement.find('strong');

    var loaderElement = $('#loader-icon');
    var checkmarkElement = loaderElement.find('div');

    var name = nameInputElement.val();
    var slug = nameInputElement.data('slug');
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
      }
    });
    e.preventDefault();
    $.ajax({
      url: '/admin/' + slug + '/profile/admin',
      type: 'PATCH',
      cache: false,
      data: {name: name},
      beforeSend: function() {
        loaderElement.toggleClass('d-none');//show loader
        buttonElement.toggleClass('disabled');//disable button update

        invalidElement.addClass('d-none');//hidden error display message
        nameInputElement.removeClass('is-invalid');
      }
    }).
    done(function(data) {
      loaderElement.toggleClass('load-complete');
      checkmarkElement.toggle();
      buttonElement.toggleClass('disabled');
      setTimeout(function(){
        loaderElement.toggleClass('d-none');
        loaderElement.toggleClass('load-complete');
        checkmarkElement.toggle();
      }, 2000);
    }).
    fail(function (ajaxContext) {
      var message = ajaxContext.responseJSON;
      loaderElement.toggleClass('d-none');
      buttonElement.toggleClass('disabled');

      nameInputElement.toggleClass('is-invalid');
      messageElement.text(message.error.name[0]);
      invalidElement.toggleClass('d-none');//show error message

    });    
  });    
});    