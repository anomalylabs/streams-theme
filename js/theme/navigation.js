Streams.Navigation = {};

$(function () {

    var toggle = $('#toggle-navigation');

    // When the show / hide is clicked
    // toggle the navigation panel.
    toggle.bind('click', function (e) {
        e.preventDefault();

        ;

        if (toggle.text().toLowerCase() == 'show') {
            toggle.text('Hide');
        } else {
            toggle.text('Show');
        }
    });

    // If the navigation is open and the user
    // presses ESC, close it.
    $(document).bind('keydown', function (e) {

    });
});