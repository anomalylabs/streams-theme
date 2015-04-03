$(function () {

    // Tabs
    $('[data-toggle="tab"]').click(function (e) {

        e.preventDefault();

        $(this).tab('show');
    });
});
