// function postComment(form)
// {
//     console.log(form);
//     event.preventDefault();
// };

$( document ).ready(function() {
    $('.post-comment').submit(function(form) {
        console.log(form);
        event.preventDefault();
    });
});