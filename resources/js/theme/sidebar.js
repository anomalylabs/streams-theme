$(function () {

    var body = $('body');
    var sidebar = $('#navigation');

    // Open sidebar when mouseenter.
    sidebar.on('mouseenter', function () {
        body.addClass('sidebar-open');
    });

    // Close sidebar when mouseleave.
    sidebar.on('mouseleave', function () {
        body.removeClass('sidebar-open');
    });
});
