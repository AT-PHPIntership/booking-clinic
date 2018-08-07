$(document).ready(function() {

<<<<<<< HEAD
=======
  $(".status-select").each(function() {
    $(this).css("background-color", statusColor[$(this).val()]);
  });
>>>>>>> admin show dashboard
  $(".status-select").change(function(e) {
    e.preventDefault();
    var ele = $(this);
    var appointmentId = ele.attr('id').substring(12);
    var status = ele.val();
    var slug = $("#slug").val();
    ele.css("background-color", "#dc3545");
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
      }
    });
    $.confirm({
      title: 'Appointments!',
      theme: 'dark',
      content: 'Do you want cancel this appointment!',
      buttons: {
        confirm: function () {
          ele.after('<svg width="20" height="20" aria-hidden="true" data-prefix="far" data-icon="sync" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="ml-2 svg-inline--fa fa-sync fa-w-16 fa-spin fa-lg"><path fill="currentColor" d="M500 8h-27.711c-6.739 0-12.157 5.548-11.997 12.286l2.347 98.575C418.212 52.043 342.256 8 256 8 134.813 8 33.933 94.924 12.296 209.824 10.908 217.193 16.604 224 24.103 224h28.576c5.674 0 10.542-3.982 11.737-9.529C83.441 126.128 161.917 60 256 60c79.545 0 147.942 47.282 178.676 115.302l-126.39-3.009c-6.737-.16-12.286 5.257-12.286 11.997V212c0 6.627 5.373 12 12 12h192c6.627 0 12-5.373 12-12V20c0-6.627-5.373-12-12-12zm-12.103 280h-28.576c-5.674 0-10.542 3.982-11.737 9.529C428.559 385.872 350.083 452 256 452c-79.546 0-147.942-47.282-178.676-115.302l126.39 3.009c6.737.16 12.286-5.257 12.286-11.997V300c0-6.627-5.373-12-12-12H12c-6.627 0-12 5.373-12 12v192c0 6.627 5.373 12 12 12h27.711c6.739 0 12.157-5.548 11.997-12.286l-2.347-98.575C93.788 459.957 169.744 504 256 504c121.187 0 222.067-86.924 243.704-201.824 1.388-7.369-4.308-14.176-11.807-14.176z" class=""></path></svg>')
          $.ajax({
              url: '/admin/' + slug + '/appointments/' + appointmentId,
              type: 'PATCH',
              cache: false,
              data: {status: status},
            })
            .done(function (res) {

              // delete sync icon and show success message in 2 seconds, remove option Confirmed when chose option Cancel
              ele.next().remove();
              ele.after('<div class="pr-5 pl-5 d-inline alert alert-success status-flash">The status is updated</div>');
              ele.next().slideUp(2000);
              setTimeout(function() {
                ele.next().remove();
              }, 2000);
              ele.children("option:nth-child(1)").remove();
            });
        },
        cancel: function () {

          // set right color and value for option Confirmed when cancel select
          ele.css("background-color", "#007bff");
          ele.val("1");
        },
      }
    });
  });
});
