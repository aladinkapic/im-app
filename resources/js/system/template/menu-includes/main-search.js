$("#main-search-icon, .main-search-w").click(function () { // Set focus on searchable area
    $("#main-search").focus();
});

$(".main-search-t").click(function () {
    $(".main-search").fadeIn();
    $("#main-search").focus();
});

let closeSearch = function(){
    $(".main-search").fadeOut();
    $("#main-search").val('');
    $(".results-wrapper").empty();
};

document.onkeydown = function keyPress (e) {
    if(e.key === "Escape") {
        closeSearch();
    }
};

$("#main-search-exit").click(function () {
    closeSearch();
});

$('#main-search').keypress(function(event) {
    if (event.keyCode === 13) {
        let value = $(this).val();

        if(value === 'close' || value === 'zatvori' || value === 'exit') closeSearch();
        else{
            // ** Do the rest of search procedure ** /
        }
    }
});
