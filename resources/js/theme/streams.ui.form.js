/**
 * Boot the Ui Form class.
 */
Streams.Ui.Form.boot = function () {

    //Bind Ui Form behaviors.
    this.bindTranslations();

    // Keyboard shortcuts.
    this.registerShortcuts()
}


/**
 * Bind form translation controls.
 *
 * @constructor
 */
Streams.Ui.Form.bindTranslations = function () {
    /*$('[data-locale]').on('click', function (e) {

        e.preventDefault();

        // Hide all form locale and show the selected
        $(this).closest('form').find('[class*="locale-"]').addClass('hidden');
        $(this).closest('form').find('.locale-' + $(this).data('locale')).removeClass('hidden');

        // Mark active locale
        $(this).closest('.toolbar').find('.flag-icon.active').removeClass('active animated-fast pulse');
        $(this).addClass('active animated-fast pulse');
    });*/
}


/**
 * Register keyboard shortcuts.
 */
Streams.Ui.Form.registerShortcuts = function () {

    // Alt + L = Cycle languages
    Streams.Cp.Shortcuts.registered.push(function () {
        if (!Streams.Cp.Shortcuts.inputFocus() && Streams.Cp.Shortcuts.altAnd(76)) {
            if ($('[data-locale].active').next('[data-locale]').length != 0) {
                $('[data-locale].active').next().trigger('click');
            } else {
                $('[data-locale]').first().trigger('click');
            }
        }
    });
}
