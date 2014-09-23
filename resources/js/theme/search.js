Streams.Navigation = {};

Streams.Navigation.doubleTapDelta = 300;
Streams.Navigation.lastKeypressTime = 0;

$(function () {

    var toggle = $('#toggle-search');
    var search = $('#search');

    // When the show / hide is clicked
    // toggle the search panel.
    toggle.bind('click', function (e) {
        e.preventDefault();

        if (toggle.text().toLowerCase() == 'search') {
            toggle.text('ESC or Hide');
            search.toggleClass('closed').toggleClass('open');
        } else {
            toggle.text('Search');
            search.toggleClass('closed').toggleClass('open');
        }
    });

    // If the search is open and the user
    // presses ESC, close it.
    $(document).bind('keydown', function (e) {
        if (search.hasClass('open') && e.keyCode == 27) {
            toggle.trigger('click');
        }
    });

    // When double SHIFT occurs - open the search
    // if it is not already open.
    $(document).on('keyup', function (e) {
        if (new Date() - Streams.Navigation.lastKeypressTime <= Streams.Navigation.doubleTapDelta) {
            if (e.keyCode == 16 && Streams.Navigation.lastKeypress.keyCode == 16) {
                if (search.hasClass('closed')) {
                    toggle.trigger('click');
                }
            }
        }

        Streams.Navigation.lastKeypressTime = new Date();
        Streams.Navigation.lastKeypress = e;
    });
});