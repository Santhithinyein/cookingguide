$(document).ready(function() {
    $(document).on('click','.submit_button_special input[type="submit"]', function (event) {
        // prevent default action
        event.preventDefault();

        // hide previous warning messages (validation)
        $('.warning').hide();

        // get total error warnings
        var error_warnings = 0;

        // validate value
        function validate(value,name) {
            if(value == '') {
                $('#warning-'+name).show(); // show validation warning
                error_warnings = error_warnings+1; // count errors
            }    
        }

        var name = $("#name").val(); // get value
        validate(name,"name"); // validate

        var name_eng = $("#name_eng").val(); // get value
        validate(name_eng,"name_eng"); // validate

        var name_mm = $("#name_mm").val(); // get value
        validate(name_mm,"name_mm"); // validate

        var ingredients_eng = $("#ingredients_eng").val(); // get value
        validate(ingredients_eng,"ingredients_eng") // validate

        var ingredients_mm = $("#ingredients_mm").val(); // get value
        validate(ingredients_mm,"ingredients_mm"); // validate

        var about = $("#about_eng").val(); // get value
        validate(about,"about_eng"); // validate

        var about = $("#about_mm").val(); // get value
        validate(about,"about_mm"); // validate

        var photo = $("#photo").val(); // get value
        validate(photo,'photo'); // validate

        var email = $("#email").val(); // get value
        validate(email,'email'); // validate

        // if errors warnings are existed (validation)
        if(error_warnings > 0) {
            return false; // exit the script
        }
        
        // show loader container
        $("#loader-container").show();

        // show loader
        $("#loader").show();

        // get url from action and add it to a variable(processFile)
        let processFile = $('form').attr('action');

        // make an ajax call
        let formElem = document.getElementById('commentForm');
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
            },
            error: function ( error ) {
                console.log('the page was NOT loaded', error);
            },
            complete: function ( xhr, status ) {
                // remove loader effect
                $("#loader").fadeOut(1000);
                $("#loader-container").fadeOut(1000);

                // hide modal
                $("#myModal").fadeOut(1000);
                // remove the child element from content
                // if not remove,you will get bug when 
                // you try to log in after you have change 
                // your password from info section,
                // (getting the form action value of faded form)
                // empty modal 0.5s later
                setTimeout(function() {
                    $('.modal-content div').empty();
                },1000);
            }
        });

        // cookingguide must be removed from url in production mood (on server)
        $.changeUrl('Cooking Guide',"/cookingguide/authorization/sub-category/list.php"); // change url
    });
});