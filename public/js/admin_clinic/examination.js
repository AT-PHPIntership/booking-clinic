$(document).ready(function() {

    $("#create-examination").click(function(e) {
        ele = $(this);
        var slug = $("#slug").val();
        select = $('.status-select')
        userName = $("#user-name").val()
        appointmentId = select.attr('id').substring(12);
        $.confirm({
            columnClass: 'col-md-8',
            icon: 'fa fa-spinner fa-spin',
            title: '<div class="h4 mb-0">Examination patient ' + userName + '</div>',
            content: formCreateExamination,
            buttons: {
                formSubmit: {
                    text: 'Submit',
                    btnClass: 'btn-blue',
                    action: function () {
                        var diagnostic = this.$content.find('input[name="diagnostic"]').val();
                        var result = this.$content.find('textarea[name="result"]').val();
                    if(!diagnostic.trim()) {
                        $.alert('provide a valid name');
                        return false;
                    }
                    data = {diagnostic: diagnostic, result: result, appointmentId: appointmentId};
                    //   Call Ajax create examination
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                        }
                    });

                    function doneStatus(res) {
                        console.log(JSON.stringify(res));
                        select.css("background-color", STATUS_COLOR[STATUS_COMPLETED]);
                        select.children().remove();
                        select.append('<option value="2" selected>' +  STATUS_LABELS.STATUS_COMPLETED + '</option>')
                        var data = {userName: userName, res: res};
                        ele.after(showExamination(data, formShowExamination));
                        ele.remove();
                      };
                      createExamination(slug, data, doneStatus);
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
