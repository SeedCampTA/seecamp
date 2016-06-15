function commentPost(id)
{
    comment_message = $('#post-comment-' + id).val();
    csrf = $('meta[name="csrf-param"]').attr('content');

    $.ajax({
        url: '/posts/' + id + '/comments/',
        headers: {
        	'X-CSRF-TOKEN': csrf,
        },
        data: {
            'comment': comment_message,
        },
        method: 'POST',
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
        error: function() {
            alert('Error : ' + post_id);
        }
    });
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
            alert(jsonData);
        },
        error: function() {
            alert('Error : ' + post_id);
        }
    });
}