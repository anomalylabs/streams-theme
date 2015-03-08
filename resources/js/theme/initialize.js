$(function () {

    // Initialize popups.
    $('.popup').popup();

    // Initialize dropdown.
    $('.dropdown').dropdown({
        transition: 'drop'
    });

    // Toggle navigation.
    $('a.launch').click(function (e) {
        e.preventDefault();
        $('.sidebar.navigation').toggleClass('visible');
    });
});
