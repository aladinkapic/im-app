$(document).ready(function () {
    let menu_indexes = {}; let counter = 0;


    $(".s-lm-wrapper").click(function () {
        $(".inside-links").each(function () {
            $(this).css('height', '0px');
        });
        $(".fa-angle-right").each(function () {
            $(this).css('transform', 'rotate(0deg)');
        });

        let height = $(this).find(".inside-lm-link").length;



        if(!$(this).hasClass('active')){
            $(this).find(".inside-links").css('height', (height * 34) + 'px');
            $(this).find(".fa-angle-right").css('transform', 'rotate(90deg)');
            $(this).addClass('active');
        }else{
            $(this).removeClass('active');
        }

        $(".s-lm-wrapper").not($(this)).removeClass('active');
    });


    // ** Notifications -- show hide elements ** //
    require('./menu-includes/menu-popups');


    // ** Main search -- all actions ** //
    require('./menu-includes/main-search');
});
