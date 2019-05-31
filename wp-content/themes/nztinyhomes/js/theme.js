jQuery(function($) {
    var $ = jQuery;
    gallerySlick = $(".gallery").slick({
        dots:false,
        speed: 300,
        slidesToShow: 1,
        arrows: false,
        adaptiveHeight: true,
        nextArrow: '<i class="fa fa-angle-right"></i>',
        prevArrow: '<i class="fa fa-angle-left"></i>',
        fade: true,
        asNavFor: '.thumb-nav'
    });
    galleryThumbnails = $(".thumb-nav").slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.gallery',
        dots: false,
        centerMode: true,
        focusOnSelect: true,
        nextArrow: '<i class="fa fa-angle-right"></i>',
        prevArrow: '<i class="fa fa-angle-left"></i>'
    });
});