$(function () {

    // CSRF ajax requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Radios and checkboxes
    $(':checkbox').radiocheck();
    $(':radio').radiocheck();

    // Tabs
    $('[data-toggle="tab"]').click(function (e) {

        e.preventDefault();

        $(this).tab('show');
    });

    // Nano sliders
    $('.nano').nanoScroller();

    // When hiding modals destroy them.
    $('.modal').on('hidden.bs.modal', function () {
        $(this).removeData('bs.modal');
    });

    /*// Toggle modals.
    $('[data-modal]').click(function (e) {

        e.preventDefault();

        $.ajax({
            url: $(e.target).attr('href'),
            success: function (html) {
                $('.ui.' + $(e.target).data('modal') + '.modal').html(html).modal('show');
            },
            error: function () {
                alert('There was an error loading the modal content [' + $(e.target).attr('href') + ']');
            }
        });
    });*/
});
