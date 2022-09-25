$(document).ready(function() {
    $(document).on('click','.login_button',function(event) {
        // show loader container
        $("#loader-container").show();

        // show loader
        $("#loader").show();

        // prevent default action
        event.preventDefault();

        var processFile = $('form').attr('action');

        console.log(processFile);

        let formElem = document.getElementById("commentForm");
        let formData = new FormData(formElem);
        formData.append('method','ajax'); // to check in backend 

        $.ajax({
            url: processFile,
            type: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function( response ) {
                $('.content').html(response);
                
                //get header title content
                var title = $("h1").text();

				//if title content is Login,works the code below
                if(title == 'Login') {
                    $.changeUrl("Cooking Guide", "../login/index.php"); // change URL
                } else {
                    $.changeUrl("Cooking Guide", "../vegetables/list.php"); // change URL
                }
            },
            error: function ( error ) {
                console.log('the page was NOT load', error);
            },
            complete: function( xhr, status ) {
                // remove loader effect
                $("#loader").fadeOut(1000);
                $("#loader-container").fadeOut(1000);
            }
        });
    });
});