$(function () {

    // Initialize popups.
    $('.ui.popup').popup();

    // Initialize dropdown.
    $('.ui.dropdown').dropdown({
        transition: 'drop'
    });

    // Initialize checkboxes.
    $('.ui.checkbox').checkbox();

    // Initialize tabs.
    $('.ui.attached.tabular.menu .item').tab();

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
