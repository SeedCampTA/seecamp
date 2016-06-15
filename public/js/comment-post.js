function commentPost(id)
{
    comment_message = $('#comment-message-' + id).val();
    csrf = $('meta[name="csrf-param"]').attr('content');
    if (comment_message != '') {
        $.ajax({
            url: '/posts/' + id + '/comments/',
            headers: {
                'X-CSRF-TOKEN': csrf,
            },
            data: {
                'comment': comment_message,
            },
            method: 'POST',
            success: function(comment) {
                window.alert('comment success');
            }
        });
    }
};

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
            alert(jsonData);
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
            alert(jsonData);
        },
        error: function(jsonData) {
            alert(jsonData);
        }
    });
};
