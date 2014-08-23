Streams.Navigation = {};

Streams.Navigation.doubleTapDelta = 300;
Streams.Navigation.lastKeypressTime = 0;

$(function () {

    var toggle = $('#toggle-navigation');
    var navigation = $('#navigation');

    // When the show / hide is clicked
    // toggle the navigation panel.
    toggle.bind('click', function (e) {
        e.preventDefault();

        if (toggle.text().toLowerCase() == 'show') {
            toggle.text('ESC or Hide');
            navigation.toggleClass('closed').toggleClass('open');
        } else {
            toggle.text('Show');
            navigation.toggleClass('closed').toggleClass('open');
        }
    });

    // If the navigation is open and the user
    // presses ESC, close it.
    $(document).bind('keydown', function (e) {
        if (navigation.hasClass('open') && e.keyCode == 27) {
            toggle.trigger('click');
        }
    });

    // When double SHIFT occurs - open the navigation
    // if it is not already open.
    $(document).on('keyup', function (e) {
        if (new Date() - Streams.Navigation.lastKeypressTime <= Streams.Navigation.doubleTapDelta) {
            if (e.keyCode == 16 && Streams.Navigation.lastKeypress.keyCode == 16) {
                if (navigation.hasClass('closed')) {
                    toggle.trigger('click');
                }
            }
        }

        Streams.Navigation.lastKeypressTime = new Date();
        Streams.Navigation.lastKeypress = e;
    });
});