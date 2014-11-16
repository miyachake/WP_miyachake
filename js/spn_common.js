$(function(){
    $(".menu-gnav-container").css("display","none");
    $(".spn-btn-toggle").on("click", function() {
        $(".menu-gnav-container").slideToggle();
    });
});
