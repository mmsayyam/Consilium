$(document).scroll(function() {
	if($(document).scrollTop() > 30) {
		$('nav').addClass('navbar-fixed-top');
	}
	else {
		$('nav').removeClass('navbar-fixed-top');
	}
})