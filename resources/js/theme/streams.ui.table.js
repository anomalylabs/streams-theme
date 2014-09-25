/**
 * Boot the Ui Table class.
 */
Streams.Ui.Table.boot = function () {

    // Bind Ui Table behaviors.
    this.bindFilters();
    this.bindPagination();

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
        $('.table-filters').toggleClass('active').find('input:first-child').focus().val('');
    });
}


/**
 * Bind pagination navigation so
 * we can trigger click on it.
 */
Streams.Ui.Table.bindPagination = function () {
    $('ul.pagination li a').on('click', function (e) {
        e.preventDefault();
        window.location = $(this).attr('href');
    });
}


/**
 * Register keyboard shortcuts.
 */
Streams.Ui.Table.registerShortcuts = function () {

    // Alt + F = Toggle filters
    Streams.Cp.Shortcuts.registered.push(function () {
        if (!Streams.Cp.Shortcuts.inputFocus() && Streams.Cp.Shortcuts.altAnd(70)) {
            $('[data-toggle="filters"]').trigger('click');
        }
    });

    // Left arrow = previous page
    Streams.Cp.Shortcuts.registered.push(function () {
        if (Streams.Cp.Shortcuts.inputFocus() == false && Streams.Cp.Shortcuts.event.which == 37) {
            $('.pagination li.active').prev('li:not(.disabled)').find('a').trigger('click');
        }
    });

    // Right arrow = next page
    Streams.Cp.Shortcuts.registered.push(function () {
        if (Streams.Cp.Shortcuts.inputFocus() == false && Streams.Cp.Shortcuts.event.which == 39) {
            $('.pagination li.active').next('li:not(.disabled)').find('a').trigger('click');
        }
    });
}
