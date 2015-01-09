//Capabilities Hover
$('#responsive-overlay').hover(function() {
  jQuery.fx.off = true;
	$('#responsive-overlay').hide(function(){
		$('#responsive-reveal').show();
	});
});

$('#responsive-reveal').mouseleave(function() {
  jQuery.fx.off = true;
	$('#responsive-reveal').hide(function() {
		$('#responsive-overlay').show();
	});
});



$('#media-overlay').hover(function() {
	jQuery.fx.off = true;
	$('#media-overlay').hide(function(){
		$('#media-reveal').show();
	});
});

$('#media-reveal').mouseleave(function() {
	jQuery.fx.off = true;
	$('#media-reveal').hide(function() {
		$('#media-overlay').show();
	});
});


$('#identity-overlay').hover(function() {
	jQuery.fx.off = true;
	$('#identity-overlay').hide(function(){
		$('#identity-reveal').show();
	});
});

$('#identity-reveal').mouseleave(function() {
  jQuery.fx.off = true;
	$('#identity-reveal').hide(function() {
		$('#identity-overlay').show();
	});
});



$('#email-overlay').hover(function() {
	jQuery.fx.off = true;
	$('#email-overlay').hide(function(){
		$('#email-reveal').show();
	});
});

$('#email-reveal').mouseleave(function() {
	jQuery.fx.off = true;
	$('#email-reveal').hide(function() {
		$('#email-overlay').show();
	});
});





//Slick Slider


$(document).ready(function(){
	$('.port-slider').slick({
		//slidesToShow: 2,
		autoplay: true,
		arrows: false,
		dots: true
  	});
});