$(document).ready(function() {
    $("ul#nav ul").hide();
    $('ul#nav li:has(ul)').each(function(i) {
        $(this).children().slideUp(400);
    });
    $('li.p1:has(ul)').click(function(event){
        if (this == event.target) {
            current = this;
            $('ul#nav li:has(ul)').each(function(i) {
                if (this != current) {
                    $(this).children().slideUp(400); 
                    $(this).removeClass("selected");
                }else{
                    $(this).children("ul:eq(0)").slideToggle(400);
                    $(this).addClass("selected");
                }
            });
            
        }
    });
});
