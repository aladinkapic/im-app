$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let signMeIn = function(){
        let email    = $("#email").val();
        let password = $("#password").val();
        let cookie   = $('#set-cookies').is(':checked');

        $.ajax({
            url: 'login/log-me-in',
            method: 'POST',
            data: {
                email: email,
                password: password,
                cookie  : cookie
            },
            success: function success(response) {
                response = JSON.parse(response);
                if(response['code'] === '0000'){
                    window.location = response['message'];
                }else{
                    alert(response['message']);
                }
                console.log(response);
            }
        });
    };

    $("#sign-me-in").click(function () {
        signMeIn();
    });
});
