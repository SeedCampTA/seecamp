function commentPost(button, id)
{
    comment_message = $('#comment-message-' + id).val();
    csrf = $('meta[name="csrf-param"]').attr('content');

    if (comment_message != '') {

        $(button).button('loading');

        $.ajax({
            url: '/posts/' + id + '/comments/',
            headers: {
                'X-CSRF-TOKEN': csrf,
            },
            data: {
                'comment': comment_message,
            },
            method: 'POST',
            success: function(data) {
                profile_pic = data.user.image;
                user = data.user.firstname + ' ' + data.user.lastname;
                $('#comment-section-' +id).prepend(
                    '<li class="list-group-item">' +
                        '<img class="user-profile-pic-comment pull-left img-circle" src="' +
                        profile_pic +
                        '" height="35" width="35">' +
                        '<p class="post-owner">' +
                            user +
                            '<small class="date">' +
                                ' just now' +
                            '</small>' +
                        '</p>' +
                        '<div class="comment container-fluid">' +
                            comment_message +
                        '</div>' +
                    '</li>'
                );

                $('#comment-message-' + id).val('');
                $(button).button('reset');
            }
        });
    }
};

function commentPostEnter(id) {
    if (event.keyCode == 13) {
        commentPost($('#btn_comment_' + id), id);
    }
}

function unlikePost(post_id)
{
    csrf = $('meta[name="csrf-param"]').attr('content');

    $.ajax({
        url: '/posts/' + post_id + '/unlike/',
        headers: {
            'X-CSRF-TOKEN': csrf,
        },
        method: 'PUT',
        success: function(jsonData) {
            $('#post_' + post_id + ' .btn-like').text('+1');
            $('#post_' + post_id + ' .btn-like').toggleClass('btn-seedcamp');
            $('#like_' + post_id).html(jsonData);
            $('#post_' + post_id + ' .btn-like').attr('onClick', 'likePost(' + post_id + ')');
        },
        error: function(jsonData) {
            alert(jsonData);
        }
    });
};

function likePost(post_id)
{
    csrf = $('meta[name="csrf-param"]').attr('content');

    $.ajax({
        url: '/posts/' + post_id + '/like/',
        headers: {
            'X-CSRF-TOKEN': csrf,
        },
        method: 'PUT',
        success: function(jsonData) {
            $('#post_' + post_id + ' .btn-like').text('-1');
            $('#post_' + post_id + ' .btn-like').toggleClass('btn-seedcamp');
            $('#like_' + post_id).html(jsonData);
            $('#post_' + post_id + ' .btn-like').attr('onClick', 'unlikePost(' + post_id + ')');
        },
        error: function(jsonData) {
            alert(jsonData);
        }
    });
};

var uploadPhoto = function(element) {
    var fullPath = element.value;
    var label = $("#upload-label");

    if (fullPath) {
        var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
        var filename = fullPath.substring(startIndex);
        if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
            filename = filename.substring(1);
        }

        label.html(filename);
        if (!label.hasClass('label label-primary')){
            label.toggleClass('label label-primary');
        }
    }
};
