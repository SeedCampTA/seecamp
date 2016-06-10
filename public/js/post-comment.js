function postComment(form)
{
    console.log(form);
    console.log(form.elements[0]);
    event.preventDefault();
    $.ajax({
        url: '/posts/{id}/comments',
        data: {
            comment: '',
        },
        method: 'POST',
    });
};