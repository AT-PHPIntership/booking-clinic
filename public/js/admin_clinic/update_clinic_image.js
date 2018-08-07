$(document).ready(function(){
  tempImageIdsToDelete = [];
  $('.img-wrap .close').on('click', function() {
    if (confirm($(this).data('confirm'))) {
      var id = $(this).closest('.img-wrap').find('img').data('id');
      tempImageIdsToDelete.push( +id );
      $('input[name="image_deleted"]').val(tempImageIdsToDelete);
      $(this).closest('.img-wrap').remove();
    }  
  });
});
