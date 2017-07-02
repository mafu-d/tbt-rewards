$(function() {
    $('.remove-upload-btn').click(function() {
        $('[name=removeAttachment]').val($(this).attr('data-id'));
        $(this).closest('form').submit();
    });
});
