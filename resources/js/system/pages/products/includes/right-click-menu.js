$(document).ready(function() {
    let product_id = 0;

    $(".product-wrapper" ).contextmenu(function(e) {
        // ** Set id for route ** //
        product_id = $(this).attr('product-id');

        if(product_id !== 'empty'){
            $(".right-click-menu").offset({ top: e.pageY, left: e.pageX }).fadeIn();
            // $("#options-title").text($(this).attr('product-title'));
        }

        // console.log("pageX: " + e.pageX + ", pageY: " + e.pageY);
        e.preventDefault();
    });

    $(".close-right-menu").click(function () {
        $(".right-click-menu").fadeOut(0).offset({ top: 0, left: 0 });
    });

    $('.rm-href').hover(function () {
        let route = $(this).attr('route');
        // let url = '{{ route("v2.patients.edit", ":id") }}';
        route = route.replace('-u', product_id);

        $(this).attr("href", route);
    });
});
