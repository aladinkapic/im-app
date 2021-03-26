$(document).ready(function () {
    let left_open = 0; let currently_open = -2;

    $(".exit_menu").click(function () {
        let left_m = document.getElementById("left_menu");
        let window_w = window.innerWidth;

        if(!left_open){
            left_open++;
            left_m.style.right = '-50px';
        }else{
            left_open = 0;
            left_m.style.right = -(left_m.clientWidth + 50) + 'px';
        }
    });

    $(document).on('click', '.left_with_sublinks', function() {
        let index = $(this).attr('index');
        var sublinks = document.getElementById("left_menu").getElementsByClassName("menu_sublinks");
        //var arrow = document.getElementById("left_menu").getElementsByClassName("fa-icon");

        console.log(index, sublinks);

        if(index === currently_open){
            index = -1;
            currently_open = -2;
        }

        for(var i=0; i<sublinks.length; i++){
            if(i === index){
                var all_sublinks = sublinks[i].getElementsByClassName("menu_sublink");
                currently_open = index;
                //arrow[i].className = "fas fa-icon fa-angle-up";
                sublinks[i].style.height = (all_sublinks.length * 40) + 'px';
            }else{
                sublinks[i].style.height = '0px';
                //arrow[i].className = "fas fa-icon fa-angle-down";
            }
        }
    });

    $(".left_with_sublinks").click(function () {

    });
});
