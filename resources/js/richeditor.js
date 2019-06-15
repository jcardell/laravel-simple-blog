require('summernote/dist/summernote-bs4');

$('.js-summernote').each(function () {
    let options = {};

    if ($(this).data('toolbar') === 'reduced') {
        options = {
            toolbar: [
                ['font', ['bold', 'italic']]
            ]
        };
    }

    $(this).summernote(options);
});