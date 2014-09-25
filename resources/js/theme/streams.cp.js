/**
 * Boot the Cp class.
 */
Streams.Cp.boot = function () {

    // Initialize things.
    this.markThirdFlag();

    //Bind Cp behaviors.
    this.bindTooltips();
    this.bindModalShown();
    this.bindLogoutAnimation();
    this.bindMessageDismissal();
    this.bindChooseLanguage();

    // Keyboard shortcuts.
    this.registerShortcuts()
}


/**
 * Bind tooltips.
 */
Streams.Cp.bindTooltips = function () {
    $('[data-toggle="tooltip"]').tooltip();
}


/**
 * When a modal is shown focus on
 * the fist input by default.
 */
Streams.Cp.bindModalShown = function () {
    $('.modal').on('shown.bs.modal', function () {
        $(this).find('input').first().focus();
    });
}


/**
 * When a message is dismissed, animate it.
 */
Streams.Cp.bindMessageDismissal = function () {
    $('[data-dismiss="alert"]').click(function () {
        $alert = $(this).closest('.alert');

        $alert.removeClass('animated fadeInUp').addClass('animated fadeOutUp');

        setTimeout(function () {
            $alert.remove();
        }, 500);

        return false;
    });
}


/**
 * When a user logs out, animate it.
 */
Streams.Cp.bindLogoutAnimation = function () {
    $('[data-action="logout"]').click(function () {
        $('body header, body section, body footer').addClass('animated fadeOut');
    });
}


/**
 * Bind filter for "choose language" modal.
 */
Streams.Cp.bindChooseLanguage = function () {

    // Filter on search input change.
    $('#choose-language input[type="search"]').keyup(function () {

        // Grab the search term.
        var search = $(this).val().toLowerCase();

        // Hide links that do that contain the term.
        $('#choose-language a.flag-icon').each(function () {
            if ($(this).attr('title').toLowerCase().indexOf(search) == -1) {
                $(this).addClass('hidden');
            } else {
                $(this).removeClass('hidden');
            }
        });

        Streams.Cp.markThirdFlag();
    });
}

/**
 * Mark the third flag in the
 * "choose language" modal.
 */
Streams.Cp.markThirdFlag = function () {
    $('#choose-language a.flag-icon').removeClass('third');
    $('#choose-language a.flag-icon:not(.hidden):nth-child(3n)').each(function (k, v) {
        $(this).addClass('third');
    });
}

/**
 * Register keyboard shortcuts.
 */
Streams.Cp.registerShortcuts = function () {

    // Ctrl Ctrl = Show keyboard shortcuts
    Streams.Cp.Shortcuts.registered.push(function () {
        if (!Streams.Cp.Shortcuts.inputFocus() && Streams.Cp.Shortcuts.doubleTap('altKey')) {
            $('#keyboard-shortcuts').modal('show');
        }
    });
}
