$(document).ready(function (){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document.body).on("change",".product-price-keywords",function(){
        let value = $(this).val();

        $.ajax({
            url: '/system/products/products-prices/get-keywords',
            method: 'POST',
            data: {
                value: value
            },
            success: function success(response) {
                response = JSON.parse(response);

                if(response['code'] === '0000'){
                    let keys = Object.keys( response['values'] );
                    $(".ppk-values").empty();

                    for(let i=0; i<keys.length; i++){
                        console.log(keys[i] + ' - ' + response['values'][keys[i]]);
                        $('.ppk-values').append($('<option>', {
                            value: keys[i],
                            text: response['values'][keys[i]]
                        }));
                    }
                }else{
                    $.notify(response['message'], "warn");
                }
            }
        });
    });

});
