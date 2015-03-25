$(function () {

    // Initialize popups.
    $('.popup').popup();

    // Initialize dropdown.
    $('.dropdown').dropdown({
        transition: 'drop'
    });

    // Initialize checkboxes.
    $('.checkbox').checkbox();

    // Initialize progress.
    $('.progress').progress();

    // Initialize tabs.
    $('.ui.attached.tabular.menu .item').tab();

    // Clear loading.
    $('.ui.active.dimmer').removeClass('active');

    // Loading buttons.
    $('.button[data-toggle="loading"]').click(function () {
        $(this).addClass('loading');
    });

    // Dimmer buttons.
    $('.button[data-toggle="dimmer"]').click(function () {
        $($(this).data('target')).dimmer('show');
    });

    // Toggle navigation.
    $('a.launch').click(function (e) {

        e.preventDefault();

        $('.sidebar.navigation').sidebar('toggle');
    });

    // Toggle search.
    $('a.search').click(function (e) {

        e.preventDefault();

        $('.sidebar.search').sidebar('toggle');
    });

    // Close sidebars on outside click.
    $('.pusher').click(function () {
        $('.sidebar').sidebar('hide');
    });

    // Toggle modals.
    $('[data-modal]').click(function (e) {

        e.preventDefault();

        $.ajax({
            url: $(e.target).attr('href'),
            success: function (html) {
                $('.ui.' + $(e.target).data('modal') + '.modal').html(html).modal('show');
            },
            error: function () {
                alert('There was an error loading the modal content [' + $(e.target).attr('href') + ']');
            }
        });
    });

    // Confirmation buttons.
    $('[data-confirm]').click(function () {
        if (!confirm($(this).data('confirm'))) {
            return false;
        }
    });

    // Prompt for matching input before continuing.
    $('[data-prompt]').click(function () {

        var input = prompt($(this).data('prompt'));

        if ($(this).data('match').toLowerCase() != input.toLowerCase()) {

            alert('Validation failed!');

            return false;
        }
    });
});
