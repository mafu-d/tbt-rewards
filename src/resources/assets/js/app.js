$(function() {
    $('.remove-upload-btn').click(function() {
        $('[name=removeUpload]').val($(this).attr('data-id'));
        $(this).closest('form').submit();
    });
});
