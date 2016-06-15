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