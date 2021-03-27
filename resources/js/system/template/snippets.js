$(document).ready(function(){
    // ** Home elements -- Trigger onclick ** //
    $(".home-icon").click(function () {
        if($(this).attr('link') !== '') window.location = $(this).attr('link');
    });
});
