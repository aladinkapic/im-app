$( document ).ready(function() {
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
                    $.notify(response['message'], "warn");
                }
                console.log(response);
            }
        });
    };

    $("#sign-me-in").click(function () {
        signMeIn();
    });

    $(document).on('keypress',function(e) {
        if(e.which === 13) {
            if($("#email").length) signMeIn(); // TODO - change this email id
        }
    });


});
$(function () {
    $("#change_pass").click(function () {
        let password = $("#password_new").val();
        let confirmPassword = $("#password_new_again").val();
        if (password.length === 0){
            $.notify("Unesite novu šifru", "warn");
            return false;
        }
        console.log(password,confirmPassword);
        if (password !== confirmPassword) {
            $.notify("Šifre se ne podudaraju", "warn");
            return false;
        }
        return true;
    });
});
