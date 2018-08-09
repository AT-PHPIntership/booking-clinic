$(document).ready(function() {

    $("#create-examination").click(function(e) {
      $.confirm({
        columnClass: 'col-md-8',
        title: '<div class="h2">Examination patient ' + $("#user-name").val() + '</div>',
        content: '<form action="" class="formName">' +
          '<div class="form-group">' +
            '<label>Diagnostic</label>' +
            '<input type="text" placeholder="Diagnostic" name="diagnostic" class="name form-control" required />' +
          '</div>' +
          '<div class="form-group">' +
            '<label>Result</label>' +
            '<textarea class="form-control" name="result" required></textarea>' +
          '</div>' +
        '</form>',
        buttons: {
          formSubmit: {
            text: 'Submit',
            btnClass: 'btn-blue',
            action: function () {
              var diagnostic = this.$content.find('input[name="diagnostic"]').val();
              var result = this.$content.find('textarea[name="result"]').val();
            //   if(!name){
            //     $.alert('provide a valid name');
            //     return false;
            //   }
              console.log(result);
            }
          },
          cancel: function () {
              //close
          },
        },
        onContentReady: function () {
          // bind to events
          var jc = this;
          this.$content.find('form').on('submit', function (e) {
              // if the user submits the form by pressing enter in the field.
              e.preventDefault();
              jc.$$formSubmit.trigger('click'); // reference the button and click it
          });
        }
    });
    });
  });
