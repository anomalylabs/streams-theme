$(function () {

    $(document).ready(function () {
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

    });

});
