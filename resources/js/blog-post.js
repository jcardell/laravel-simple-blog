$('.js-delete-blog-post').on('click', function (event) {
    event.preventDefault();

    if (confirm('Are you sure you want to delete this post?')) {
        const postId = $(this).data('id');
        $(`#delete-blog-post-${postId}`).submit();
    }
});