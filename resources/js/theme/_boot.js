var Streams = {};

// Initialize Ui namespace
Streams.Ui = {};
Streams.Ui.Form = {};
Streams.Ui.Table = {};

// Initialize Cp namespace
Streams.Cp = {};
Streams.Cp.Shortcuts = {};


/**
 * GO!
 */
$(function () {

    // Boot
    Streams.boot();
});


/**
 * Boot Streams components.
 * @constructor
 */
Streams.boot = function () {

    // Boot Cp
    Streams.Cp.boot();
    Streams.Cp.Shortcuts.boot();

    // Boot Ui
    Streams.Ui.Form.boot();
    Streams.Ui.Table.boot();
}
