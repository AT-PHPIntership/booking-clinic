
$(document).ready(function() {

  $('a[data-toggle="collapse"]').click(function() {
    $("html, body").animate({ scrollTop: $(document).height() }, 1000); //auto scolldown when click button show examiantion
  });
  $("#create-examination").click(function(e) {
    let slug = $("#slug").val();
    appointmentId = $('.status-select').attr('id').substring(12);

    // show a modal confirm to adminc clinic can type examination result of confirmed appointment
    $.confirm({
      columnClass: 'col-md-8',
      icon: 'fa fa-spinner fa-spin',
      title: `<div class="h4 mb-0">${Lang.get('admin_clinic/examination.title')}</div>`,
      content: showFormCreateExamination, //modal admin create examination from confirmed appointment.
      buttons: {
        formSubmit: {
          text: Lang.get('admin_clinic/examination.submit'),
          btnClass: 'btn-blue',
          action: function () {
            let diagnostic = this.$content.find('input[name="diagnostic"]').val();
            let result = this.$content.find('textarea[name="result"]').val();
            if(!diagnostic.trim()) {
              $.alert(Lang.get('admin_clinic/examination.valid_name'));
              return false;
            }
            data = {diagnostic: diagnostic, result: result, appointmentId: appointmentId};
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
              }
            });
            createExamination(slug, data); // call ajax to create examination
          }
        },
        cancel:function() {},
      },
      onContentReady: function () {
        // bind to events
        let jc = this;
        this.$content.find('form').on('submit', function (e) {
          // if the user submits the form by pressing enter in the field.
          e.preventDefault();
          jc.$$formSubmit.trigger('click'); // reference the button and click it
      });
      }
    });
  });
});
