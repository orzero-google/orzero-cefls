$(document).ready(function(){
    $(".header .header_nav_link li").hover(function(){
        $(this).addClass("hover");
    },
    function(){
           $(this).removeClass("hover");
        }
    );
});