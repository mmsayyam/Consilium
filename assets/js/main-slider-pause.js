$('.carousel').carousel({
   pause: "false"
});
$('.carousel-indicators').mouseenter(function() {
   $('#main-slider').carousel('pause');
});
$('.carousel-indicators').mouseleave(function() {
   $('#main-slider').carousel('cycle');
});
$('#video-carousel video').click(function() {
   $('#video-carousel').carousel('pause');
});
