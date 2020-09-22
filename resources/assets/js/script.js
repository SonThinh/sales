$(document).ready(function () {
    let url_user = $('meta[name=list-user]').attr("content");
    let url_post = $('meta[name=list-post]').attr("content");
    let url_cate = $('meta[name=list-cate]').attr("content");
    let role = $('meta[name=role]').attr("content");
    let id = $('meta[name=id]').attr("content");
    let locale = $('html')[0].lang;

    $.ajax({
        url: url_user,
        dataType: 'json',
        async: false,
        type: 'GET',
        success: function (response) {
            $.each(response.data, function (key, value) {
                let action;
                let class_hidden;

                action = `<td><a href="/${locale}/users/${value.id}/edit" class="btn btn-block btn-success"><i class="fal fa-pen"></i></a>
                    <a href="/${locale}/users/${value.id}/delete" class="btn btn-block btn-danger"><i class="fal fa-trash"></i></a></td>`;

                if (value.id === 1 || value.id === parseInt(id)) {
                    class_hidden = 'class="hidden-user"';
                } else {
                    class_hidden = '';
                }

                $('#user-list').append(
                    `<tr ${class_hidden}>
                    <td><a href="/api/users/${value.id}">${value.name}</a></td>
                    <td>${value.email}</td>
                    ${action}
                    </tr>`
                );
            });
        }
    });
    $('.hidden-user').remove();
    $.ajax({
        url: url_post,
        dataType: 'json',
        async: false,
        type: 'GET',
        data: {curLocale: locale},
        success: function (response) {
            $.each(response.data, function (key, value) {
                $('#list-post').append(
                    `<div class="post mb-3">
                        <div class="post-user"><a href="#">${value.user_name}</a>
                            <span class="font-weight-light pl-2">${value.created_at}</span>
                        </div>
                        <div class="post-content mb-1">${value.description}</div>
                        <div class="post-interact">
                            <div class="like pr-2">
                                <a href="#">
                                    <i class="fal fa-thumbs-up"></i>
                                </a><span>0</span>
                            </div>
                            <div class="dislike">
                                <a href="#">
                                    <i class="fal fa-thumbs-down"></i>
                                </a><span>0</span>
                            </div>
                        </div>
                    </div>`
                );
            });
        }
    });
    $.ajax({
        url: url_cate,
        dataType: 'json',
        async: false,
        type: 'GET',
        success: function (response) {
            $.each(response.data, function (key, value) {
                let action;
                if (role !== 'undefined')
                    action = `<td><a href="/${locale}/categories/${value.id}/edit" class="btn btn-block btn-success"><i class="fal fa-pen"></i></a>
                    <a href="/${locale}/categories/${value.id}/delete" class="btn btn-block btn-danger"><i class="fal fa-trash"></i></a></td>`;
                else {
                    action = '';
                }
                $('#cate-list').append(
                    `<tr>
                    <td><a href="/api/categories/${value.id}">${value.name}</a></td>
                    ${action}
                    </tr>`
                );
            });
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

