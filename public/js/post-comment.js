$.ready(function() {
    $('#comment').submit(function() {
        $.ajax({
            url: '/posts/{id}/comments',
            data: {
                comment: 'comment_message',
            },
            method: 'POST',
        });
    });
});