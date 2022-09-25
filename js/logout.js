$(document).ready(function() {
    $(document).on('click','.logout_button',function(event) {
        // prevent default action
        event.preventDefault();

        // show loader container
        $("#loader-container").show();

        // show loader
        $("#loader").show();

        // get url from currently clicked anchor tag and add it to a variable(processFile)
        var processFile = $(this).attr('href');
        processFile = processFile+"?method=ajax"; // modify it for ajax purpose

        // make an ajax call
        $.ajax({
            url: processFile,
            type: "GET",
            success: function( response ) {
                $('.content').html(response);
            },
            error: function ( error ) {
                console.log('the page was NOT load'); //add response within class named "content"
            },
            complete: function ( xhr, status ) {
                // remove laoder effect
                $("#loader").fadeOut(1000);
                $("#loader-container").fadeOut(1000);
            }
        });

        // change url
        $.changeUrl("Cooking Guide","../login/index.php");
    });
});