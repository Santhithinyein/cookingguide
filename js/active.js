$(document).ready(function() {
    $(document).on('click','.category-detail', function(event) {
        //remove previous active effect
        $('.active').removeClass('active');       

        //get the currently clicked url
        var processFile = $(this).attr('href');

        //add active effect to currently clicked anchor tag
        $('a[href="'+processFile+'"]').addClass('active');
    });
});