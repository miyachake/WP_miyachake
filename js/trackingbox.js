$(function(){
    var target = $(".fix-box");
    var footer = $("footer")
    var targetHeight = target.outerHeight(true);
    var targetTop = target.offset().top;
 
    $(window).scroll(function(){
        var scrollTop = $(this).scrollTop();
        if(scrollTop > targetTop){
            // 動的にコンテンツが追加されてもいいように、常に計算する
            var footerTop = footer.offset().top;
             
            if(scrollTop + targetHeight > footerTop){
                customTopPosition = footerTop - (scrollTop + targetHeight)
                target.css({position: "fixed", top:  customTopPosition + "px"});
            }else{
                target.css({position: "fixed", top: "10px"});
            }
        }else{
            target.css({position: "static", top: "auto"});
        }
    });
});
