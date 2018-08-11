$('.carousel').carousel({
    interval: false,
    pause: "false"
});

function toCarousel(img) {
    console.log(img.src);
    $('.active').removeClass('active');
    $('#'+img.id+'_carousel').closest('div').addClass('active');
    window.scrollTo(0, 0);
}