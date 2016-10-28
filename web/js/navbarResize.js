$(function(){
    var offset = $('#content').css('padding-top');
    $(window).scroll(function(){
        if ($(document).scrollTop() > 125) {
            $('.navbar-brand img').addClass('resizeImg');
            $('.navbar-default').addClass('resizeBackground');
            $('.navbar-default .navbar-nav > li > a').addClass('resizeLink');
            $('.navbar-nav').addClass('resizeLinkBar');


        } else {
            $('.navbar-brand img').removeClass('resizeImg');
            $('.navbar-default').removeClass('resizeBackground');
            $('.navbar-default .navbar-nav > li > a').removeClass('resizeLink');
            $('.navbar-nav').removeClass('resizeLinkBar');
        }
    });
});
