$(document).ready(function() {
    $(document).on('click','.pagination', function(event) {
        // prevent default action
        event.preventDefault();

        // show loader effect
        $("#loader-container").show();
        $("#loader").show();

        var processFile = $(this).attr('href'); //get href value
        
        var pairs = processFile.split('?'); // split it to script name 

        var page_number = pairs[1].split('='); // split to get url name and page number

        var start = page_number[1]; // get page number

        var pairs_again = pairs[0].split('.'); // split url name to modify it

        var modified_processFile = pairs_again[0]+"_data.php"; // modifying

        $.ajax({
            url: modified_processFile+"?start="+start,
            success:function(data)
            {
                $('.content').html(data);
            },
            complete: function ( xhr, status ) {
                // remove loader effect
                $("#loader").fadeOut(1000);
                $("#loader-container").fadeOut(1000);
                console.log('success');
            }
        });
        
        // changing url
        $.changeUrl('Han Htet Htoo',processFile);     
    });
});