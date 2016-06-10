function postComment(form)
{
    console.log(form);
    $.ajax({
        url: '/posts/{id}/comments',
        data: {
            coment: '',
        },
        method: 'POST',
    });
};