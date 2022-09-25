$(document).ready(function() {
    $(document).on('click','.show', function(event) {
        //prevent default action
        event.preventDefault();
    
        //Get the modal
        var modal = document.getElementById("myModal");

        // show loader container
        $("#loader-container").show();

        // show loader
        $("#loader").show();

        //Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        //Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        //When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            $("#myModal").fadeOut(1000);
        }

        //When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if(event.target == modal) {
                $("#myModal").fadeOut(1000);
            }
        }

        // get href value
        var processFile = $(this).attr('href');

        var pairs = processFile.split('.'); // split it for modifying purposes

        processFile = pairs[0]+"_data."; // 1st modifying

        processFile = processFile+pairs[1]; // 2nd modifying

        $.ajax({
            url: processFile,
            type: "GET",
            dataType: 'text',
            success: function(response) {
                $('.modal-content div').html(response);

                // show modal 0.5s later
                setTimeout(function() {
                    $('.modal').fadeIn();
                },500);
            },
            error: function (error) {
                console.log('the page was NOT loaded', error); // show error message
            },
            complete: function( xhr, status) {
                // remove loader effect
                $("#loader-container").fadeOut(1000);
                $("#loader").fadeOut(1000);
            }
        });
    });
});