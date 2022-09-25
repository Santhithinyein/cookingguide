$(document).ready(function() {
    $(document).on('click','.delete',function (event) {
        if (confirmAction) {
            // show loader container
            $("#loader-container").show();

            // show loader
            $("#loder").show();

            // prevent default action
            event.preventDefault();

            // get url from form's action and add it to a variable(processFile)
            let processFile = $(this).attr('href');
            processFile = processFile+"&&method=ajax"; // modify it for ajax purpose

            $.ajax({
                url: processFile,
                type: "GET",
                dataType: 'text',
                success: function ( response ) {
                    $('.content').html(response);
                },
                error: function ( error ) {
                    console.log('the page was NOT loaded', error);
                },
                complete: function ( xhr, status ) {
                    // remove loader effect
                    $("#laoder").fadeOut(1000);
                    $("#loader-container").fadeOut(1000);
                }
            })
        }     
    })
});