/**
 * Boot the Ui Table class.
 */
Streams.Ui.Table.boot = function () {

    // Bind Ui Table behaviors.
    this.bindFilters();

    // Keyboard shortcuts.
    this.registerShortcuts()
}


/**
 * Bind filter toggle.
 */
Streams.Ui.Table.bindFilters = function () {
    $('[data-toggle="filters"]').on('click', function (e) {

        e.preventDefault();

        // Toggle filters display.
        $('[data-toggle="filters"]').toggleClass('active');
        $('.table-filters').toggleClass('active').find('input:first-child').focus();
    });
}


/**
 * Register keyboard shortcuts.
 */
Streams.Ui.Table.registerShortcuts = function () {

    // Ctrl + F = Toggle filters
    Streams.Cp.Shortcuts.registered.push(function () {
        if (!Streams.Cp.Shortcuts.inputFocus() && Streams.Cp.Shortcuts.ctrlAnd(70)) {
            $('[data-toggle="filters"]').trigger('click');
        }
    });

    // Ctrl Ctrl = Boom
    Streams.Cp.Shortcuts.registered.push(function () {
        if (Streams.Cp.Shortcuts.inputFocus() == false && Streams.Cp.Shortcuts.doubleTap('ctrlKey') == true) {
            alert('Boom!');
        }
    });
}
