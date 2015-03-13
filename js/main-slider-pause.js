$('.carousel').carousel({
   pause: "false"
});
$('.carousel-indicators').mouseenter(function() {
   $('.carousel').carousel('pause');
});
$('.carousel-indicators').mouseleave(function() {
   $('.carousel').carousel('cycle');
});
