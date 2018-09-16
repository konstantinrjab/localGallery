$(document).ready(function () {

	$('.carousel').carousel({
	    interval: false,
	    pause: "false"
	});

	$('.gallery img').click(function () {
	    $('.active').removeClass('active');
	    $('#'+this.id+'_carousel').closest('div').addClass('active');
	    window.scrollTo(0, 0);
	})
});