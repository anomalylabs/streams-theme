$(function () {

    // Radios and checkboxes
    $(':checkbox').radiocheck();
    $(':radio').radiocheck();

    // Tabs
    $('[data-toggle="tab"]').click(function (e) {

        e.preventDefault();

        $(this).tab('show');
    });
});
