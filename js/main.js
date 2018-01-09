$(function () {
    $('#deleteField').live('click', function () {
            $(this).parents('.row').remove();
    });
});