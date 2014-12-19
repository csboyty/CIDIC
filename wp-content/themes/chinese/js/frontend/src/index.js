var index=(function(){
    var totalCount=0;
    var currentPostIndex=0;
    var interval=null;
    function setHotInfo(targetLi){
        var title=targetLi.find(".info .title").text();
        var excerpt=targetLi.find(".info .excerpt").text();
        $("#hotPostInfo .title").text(title).attr("title",title);
        $("#hotPostInfo .excerpt").text(excerpt).attr("title",excerpt);
        setHotEllipse();
    }
    function animation(){
        $("#hotPostList").animate({
            "left":"-"+currentPostIndex*100+"%"
        },1000,function(){
            var targetLi=$("#hotPost"+(currentPostIndex+1)),
                prevBtn=$("#hotPostListContainer .prevBtn"),
                nextBtn=$("#hotPostListContainer .nextBtn");

            setHotInfo(targetLi);

            if(currentPostIndex==(totalCount-1)){
                nextBtn.addClass("disable");
            }else{
                nextBtn.removeClass("disable");
            }

            if(currentPostIndex==0){
                prevBtn.addClass("disable");
            }else{
                prevBtn.removeClass("disable");
            }

            if(interval==null){
                intervalRoll();
            }
        });
    }
    function toNext(){
        if(currentPostIndex<(totalCount-1)){
            clearInterval(interval);
            interval=null;
            ++currentPostIndex;
            animation();
        }
    }
    function toPrev(){
        if(currentPostIndex>0){
            clearInterval(interval);
            interval=null;
            --currentPostIndex;
            animation();
        }
    }

    function setHotEllipse(){
        $("#hotPostInfo .title").ellipsis({
            row: 3
        });
        $("#hotPostInfo .excerpt").ellipsis({
            row: 2
        });
    }
    function intervalRoll(){
        interval=setInterval(function(){
            if(currentPostIndex==(totalCount-1)){
                currentPostIndex=-1;
            }
            ++currentPostIndex;
            animation();
        },6000);
    }
    return {
        initTotalCount:function(count){
            totalCount=count;
        },
        intervalRoll:intervalRoll,
        setHotInfo:setHotInfo,
        prev:toPrev,
        next:toNext
    }
})();
$(document).ready(function(){
    index.setHotInfo($("#hotPostList li:eq(0)"));
    index.initTotalCount($("#hotPostList li").length);
    index.intervalRoll();

    $("#categoryList .excerpt").ellipsis({
        row:3
    });

    $(".postList .title").ellipsis({
        row:2
    });
    $(".postList .excerpt").ellipsis({
        row:4
    });

    $("#hotPostListContainer").hover(function(){
        $(".navBtn").removeClass("hidden");
    },function(){
        $(".navBtn").addClass("hidden");
    });

    $("#goToTop").click(function(){
        $("html,body").animate({
            "scrollTop":0
        },1000,function(){
            $(".categorySection").addClass("hidden");
        });
        $("#goToTop").addClass("hidden");
    });

    $("#categoryList a").click(function(){
        var target=$($(this).attr("href")),
            top;

        $(".categorySection").addClass("hidden");

        target.removeClass("hidden");
        top=target.offset().top;
        $("html,body").animate({
            "scrollTop":top
        },1000,function(){
            $("#goToTop").removeClass("hidden");
        });

        return false;
    });

    $("#hotPostListContainer .nextBtn").click(function(){
        index.next();
        return false;
    });
    $("#hotPostListContainer .prevBtn").click(function(){
        index.prev();
        return false;
    });


    $(".menu-item a").click(function(){
        var subMenu=$(this).parent(".menu-item").find(".sub-menu");
        if(subMenu.length!=0){
            return false;
        }
    });
    $(".menu-item").hover(function(){
        var subMenu=$(this).find(".sub-menu");
        if(subMenu.length!=0){
            $(".sub-menu").not(subMenu).hide();
            subMenu.show();
        }
    },function(){
        var subMenu=$(this).find(".sub-menu");
        if(subMenu.length!=0){
            $(".sub-menu").hide();
        }
    });

    $(".main").css("minHeight",$("body").height()-215);
});