$(document).ready(function () {
    let url = $('meta[name=list-user]').attr("content");
    let locale = $('meta[name=locale]').attr("content");
    let role = $('meta[name=role]').attr("content");
    let id = $('meta[name=id]').attr("content");

    $.ajax({
        url: url,
        dataType: 'json',
        async: false,
        type: 'GET',
        success: function (response) {
            $.each(response.data, function (key, value) {
                let a;
                let b;
                if (role === 'admin') {
                    a = `<td><a href="/${locale}/users/${value.id}/edit" class="btn btn-block btn-success"><i class="fal fa-pen"></i></a>
                    <a href="/${locale}/users/${value.id}/delete" class="btn btn-block btn-danger"><i class="fal fa-trash"></i></a></td>`;
                } else {
                    a = ``;
                }

                if (value.id === 1 || value.id === parseInt(id)) {
                    b = 'class="hidden-user"';
                } else {
                    b = '';
                }

                $('#user-list').append(
                    `<tr ${b}>
                    <td><a href="/api/users/${value.id}">${value.name}</a></td>
                    <td>${value.email}</td>
                    ${a}
                    </tr>`
                );
            });
        }
    });
    $('.hidden-user').remove();
})

toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "200",
    "hideDuration": "2000",
    "timeOut": "1000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};
$('#login-form').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
        type: 'POST',
        cache: false,
        processData: false,
        dataType: 'json',
        contentType: false,
        url: $(this).attr('action'),
        data: new FormData(this),
        success: function (data) {
            if (data.errors) {
                $.each(data.errors, function (key, value) {
                    toastr.error(value);
                });
            } else {
                if (data.status === 'true') {
                    toastr.success(data.message);
                    window.location.replace(data.url);
                } else {
                    toastr.error(data.message);
                    window.location.replace(data.url);
                }
            }
        }
    });
});
$('#register-form').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
        type: 'POST',
        cache: false,
        processData: false,
        dataType: 'json',
        contentType: false,
        url: $(this).attr('action'),
        data: new FormData(this),
        success: function (data) {
            if (data.errors) {
                $.each(data.errors, function (key, value) {
                    toastr.error(value);
                });
            }
        }
    });
});
$('#update-user').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
        type: 'POST',
        cache: false,
        processData: false,
        dataType: 'json',
        contentType: false,
        url: $(this).attr('action'),
        data: new FormData(this),
        success: function (data) {
            if (data.errors) {
                $.each(data.errors, function (key, value) {
                    toastr.error(value);
                });
            }
        }
    });
});

