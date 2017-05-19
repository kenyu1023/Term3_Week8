$(function(){

/////// open nav and close nav//////
    var openNav = 0;
    
    $("#openNav").click(function(){
        if(openNav == 0){
            $(this).animate({"opacity":"0"},100);
            $("#page-nav-ul").animate({"height":"100%"},300);
            $("body").css('overflow','hidden');
            openNav = 1;
            }
        });
    
    $("#closeNav").click(function(){
        $("#openNav").animate({"opacity":"1"},100);
        $("#page-nav-ul").animate({"height":"0"},300);
        $("body").css('overflow','auto');
        openNav = 0;
    });
    
    var doAnimation = function () {

        var offset = $(window).scrollTop() + $(window).height();
        $animatables = $('.animatable');

        if ($animatables.size() === 0) {
            $(window).off('scroll', doAnimation);
        }else{
            $animatables.each(function (i) {
            var $animatable = $(this);
            if (($animatable.offset().top + $animatable.height()) < offset + 400) {
                $animatable.css({"opacity":"1","transform":"translate(0,0)"});
                $animatable.removeClass('animatable');
            }
            });
        }
        console.log($animatables.size());

    };

    $(window).on('scroll', doAnimation);
    $(window).trigger('scroll');
    
    /////////////////////////////////////////

    //////////// shrink down nav /////////////

    $(window).scroll(function(){
        var currentHeight = $("body","html").scrollTop() || document.body.scrollTop;
//        
//        if(currentHeight > 20){
//            $("#openNav").stop();
//            $("#openNav").animate({"font-size":"1em","padding":"10px"},500);
//        }
//        if(currentHeight == 0){
//            $("#openNav").stop();
//            $("#openNav").animate({"font-size":"2em","padding":"20px"},500);
//        }
        if(currentHeight > 20){
            $("#openNav").addClass("shrink");
        }
        if(currentHeight == 0){
            $("#openNav").removeClass("shrink");
        }
    });
    
    
    //// click thumbnail, modalbox will come out ////
    $('.monsters').click(function(){
        
        $('#nameMonsterInfo').text($('#nameMonster'+$(this).data('id')).text());
        $('#imageMonsterInfo').attr('src',$('#imageMonster'+$(this).data('id')).data('big'));
        $('#descMonsterInfo').text($('#descMonster'+$(this).data('id')).val());
        $('#skillMonsterInfo').text($('#skillMonster'+$(this).data('id')).val());
        $('#habitMonsterInfo').text($('#skillMonster'+$(this).data('id')).val());
        
        $('#modalBoxMonsterInfo').fadeIn(400);
    });
    ///////////////////////////////////////////////////
    
    //// click x, modalbox will fade out ////
    
    $("#closeModal").click(function(){
        $('#modalBoxMonsterInfo').fadeOut(400);
    });
    ////////////////////////////////////////
});


