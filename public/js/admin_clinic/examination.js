const COMPLETED = 'Completed'
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
            content: '<form action="" class="formName">\
                        <div class="form-group">\
                            <label>Diagnostic</label>\
                            <input type="text" placeholder="Diagnostic" name="diagnostic" class="name form-control" required />\
                        </div>\
                        <div class="form-group">\
                            <label>Result</label>\
                            <textarea class="form-control" name="result" required></textarea>\
                        </div>\
                    </form>',
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

                    //   Call Ajax create examination
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                        }
                    });
                    $.ajax({
                        url: '/admin/' + slug + '/examinations',
                        type: 'POST',
                        cache: false,
                        data: {diagnostic: diagnostic, result: result, appointmentId: appointmentId},
                    })
                    .done(function (res) {
                        console.log(JSON.stringify(res));
                        select.css("background-color", "#28a745");
                        select.children().remove();
                        select.append('<option value="2" selected>' + COMPLETED + '</option>')
                        ele.after('<a class="btn btn-success col-md-3 text-body font-weight-bold" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">\
                                        Show examination\
                                </a>\
                                <div class="collapse" id="collapseExample">\
                                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">\
                                        <h2 class="h2">Examination ' + userName + '</h2>\
                                    </div>\
                                    <div class="form-group">\
                                        <label>Diagnostic</label>\
                                        <input type="text" name="diagnostic" class="name form-control" value="' + res.diagnostic + '" readonly />\
                                    </div>\
                                    <div class="form-group">\
                                        <label>Result</label>\
                                        <textarea class="form-control" name="result" readonly>' + res.result + '</textarea>\
                                    </div>\
                                    <div class="form-group">\
                                        <label>Created at</label>\
                                        <textarea class="form-control" name="created_at" readonly>' + res.created_at + '</textarea>\
                                    </div>\
                                </div>');
                        ele.remove();
                    });
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
