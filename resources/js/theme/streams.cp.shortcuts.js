Streams.Cp.Shortcuts.event = null;
Streams.Cp.Shortcuts.lastEvent = null;
Streams.Cp.Shortcuts.doubleTapDelta = 300;
Streams.Cp.Shortcuts.keysPressed = [];
Streams.Cp.Shortcuts.keyHistory = [];
Streams.Cp.Shortcuts.registered = [];

/**
 * Boot the Shortcuts class.
 */
Streams.Cp.Shortcuts.boot = function () {

    // Bind shortcuts behaviors.
    this.bindKeyboardShortcutsSelector();


    $(document).keydown(function (e) {

        Streams.Cp.Shortcuts.event = e;
        Streams.Cp.Shortcuts.keysPressed[Streams.Cp.Shortcuts.keyIdentifier()] = true;

        $.each(Streams.Cp.Shortcuts.registered, function (index, method) {
            method();
        });

        Streams.Cp.Shortcuts.lastEvent = e;
        Streams.Cp.Shortcuts.keyHistory[Streams.Cp.Shortcuts.keyIdentifier()] = e.timeStamp;
    });

    $(document).keyup(function (e) {
        delete Streams.Cp.Shortcuts.keysPressed[Streams.Cp.Shortcuts.keyIdentifier()];
    });
}


/**
 * Filter keyboard shortcuts.
 */
Streams.Cp.Shortcuts.bindKeyboardShortcutsSelector = function () {

    // Filter on search input change.
    $('[data-toggle="shortcuts"]').change(function () {
        $(this).closest('.modal').find('table').addClass('hidden');

        $(this).closest('.modal')
            .find('table[data-shortcuts="' + $(this).val() + '"]')
            .removeClass('hidden');
    });
}


/**
 * Return boolean if altKey + key are pressed.
 * @param key
 * @returns {boolean}
 */
Streams.Cp.Shortcuts.altAnd = function (key) {
    return (Streams.Cp.Shortcuts.keysPressed['altKey'] == true && Streams.Cp.Shortcuts.event.which == key);
}


/**
 * Return boolean if key has been double-tapped.
 * @param key
 * @returns {boolean}
 */
Streams.Cp.Shortcuts.doubleTap = function (key) {
    if (Streams.Cp.Shortcuts.lastEvent == null) {
        return false;
    }

    if (Streams.Cp.Shortcuts.keyIdentifier() != key) {
        return false;
    }

    var which = Streams.Cp.Shortcuts.keyIdentifier();
    var lastWhich = Streams.Cp.Shortcuts.lastKeyIdentifier();

    var timestamp = Streams.Cp.Shortcuts.event.timeStamp;
    var lastTimestamp = Streams.Cp.Shortcuts.keyHistory[key];

    var delta = timestamp - lastTimestamp;

    return (which == key && lastWhich == key && delta < Streams.Cp.Shortcuts.doubleTapDelta);
}


/**
 * Return the the identifier for
 * the most recent key pressed.
 * @returns {*}
 */
Streams.Cp.Shortcuts.keyIdentifier = function () {
    if (Streams.Cp.Shortcuts.event.which == 16) {
        return 'shiftKey';
    }

    if (Streams.Cp.Shortcuts.event.which == 17) {
        return 'altKey';
    }

    if (Streams.Cp.Shortcuts.event.which == 18) {
        return 'altKey';
    }

    return Streams.Cp.Shortcuts.event.which;
}


/**
 * Return the the identifier for
 * the last key pressed.
 * @returns {*}
 */
Streams.Cp.Shortcuts.lastKeyIdentifier = function () {
    if (Streams.Cp.Shortcuts.lastEvent.which == 16) {
        return 'shiftKey';
    }

    if (Streams.Cp.Shortcuts.lastEvent.which == 17) {
        return 'altKey';
    }

    if (Streams.Cp.Shortcuts.lastEvent.which == 18) {
        return 'altKey';
    }

    return Streams.Cp.Shortcuts.lastEvent.which;
}


/**
 * Return if document has any input focused.
 * @returns {*|jQuery}
 */
Streams.Cp.Shortcuts.inputFocus = function () {
    return $('input, textarea').is(':focus');
}
