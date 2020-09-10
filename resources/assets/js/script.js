$(document).ready(function () {
    let url = $('meta[name=list-user]').attr("content");
    $.ajax({
        url: url,
        dataType: 'json',
        async: false,
        type: 'GET',
        success: function (response) {
            $.each(response.data, function (key, value) {
                $('#user-list').append(
                    `<tr>
                    <td>${value.id}</td>
                    <td><a href="/api/users/${value.id}">${value.name}</a></td>
                    <td>${value.email}</td>
                    <td><a href="/view/${value.id}/edit-user" class="btn btn-block btn-success">Edit</a>
                    <a href="/view/${value.id}/delete-user" class="btn btn-block btn-danger">Delete</a></td>
                    </tr>`
                );
            })
        }
    });
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
            console.log(data)
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
