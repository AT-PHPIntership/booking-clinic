$(document).ready(function() {

    $("#create-examination").click(function(e) {
        var slug = $("#slug").val();
        appointmentId = $('.status-select').attr('id').substring(12);
        $.confirm({
            columnClass: 'col-md-8',
            icon: 'fa fa-spinner fa-spin',
            title: '<div class="h4 mb-0">Examination patient ' + $("#user-name").val() + '</div>',
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
                        // delete sync icon and show success message in 2 seconds, remove option Confirmed when chose option Cancel
                        // ele.next().remove();
                        // ele.after('<div class="pr-5 pl-5 d-inline alert alert-success status-flash">The status is updated</div>');
                        // ele.next().slideUp(2000);
                        // setTimeout(function() {
                        // ele.next().remove();
                        // }, 2000);
                        // ele.children("option:nth-child(1)").remove();
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
