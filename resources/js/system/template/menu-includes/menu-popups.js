// ** Show && hide box with elements ** //

$(".m-show-notifications").click(function () {
    $(this).find('.c-box').toggle();
});

$(".close-cb").click(function (e) {
    $(this).parent().parent().fadeOut();
});
