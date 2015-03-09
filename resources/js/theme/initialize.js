$(function () {

    // Initialize popups.
    $('.popup').popup();

    // Initialize dropdown.
    $('.dropdown').dropdown({
        transition: 'drop'
    });

    // Initialize checkboxes.
    $('.checkbox').checkbox();

    // Initialize tabs.
    $('.ui.attached.tabular.menu .item').tab();

    // Clear loading.
    $('.ui.active.dimmer').removeClass('active');

    // Toggle navigation.
    $('a.launch').click(function (e) {

        e.preventDefault();

        $('.sidebar.navigation').sidebar('toggle');
    });

    // Close sidebars on outside click.
    $('.pusher').click(function () {
        $('.sidebar').sidebar('hide');
    });
});
