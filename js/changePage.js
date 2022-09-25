$(document).ready(function() {
    $(document).on('click','.category-detail', function(event) {
        // prevent default action
        event.preventDefault();

        // show loader effect
        $("#loader-container").show();
        $("#loader").show();

        // get process file from anchor tag's href
        var processFile = $(this).attr('href');

        var url_name = processFile;

        var pairs = processFile.split('.p');
        processFile = pairs[0]+"_data.php";

        $.ajax({
            url: processFile,
            type: "GET",
            dataType: 'text',
            success: function(response) {
                $('.content').html(response);
            },
            error: function ( error ) {
                console.log('the page was NOT loaded',error);
            },
            complete: function ( xhr, status ) {
                // remove loader effect
                $("#loader").fadeOut(1000);
                $("#loader-container").fadeOut(1000);

                // to fadeout menu pop up box in mobile view
                $("#myModal").fadeOut(1000);

                console.log('success');
            }
        });

        $.changeUrl('Cooking Guide',url_name);
    });
});