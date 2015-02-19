$(function () {

    // Select 2
    $('select.select2').select2();

    // Confirm
    $('[data-confirm]').click(function () {
        if (!confirm($(this).data('confirm'))) {
            return false;
        }
    });

    // Prompt
    $('[data-prompt]').click(function () {

        var input = prompt($(this).data('prompt'));

        if ($(this).data('match').toLowerCase() != input.toLowerCase()) {

            alert('Validation failed!');

            return false;
        }
    });

    // When hiding modals destroy them.
    $('.modal').on('hidden.bs.modal', function () {
        $(this).removeData('bs.modal');
    });
});
