//Capabilities Hover
$('#responsive').hover(function() {
  jQuery.fx.off = true;
	$('#responsive').hide(function(){
		$('#h-responsive').show();
	});
});

$('#h-responsive').mouseleave(function() {
  jQuery.fx.off = true;
	$('#h-responsive').hide(function() {
		$('#responsive').show();
	});
});



$('#logo').hover(function() {
	jQuery.fx.off = true;
	$('#logo').hide(function(){
		$('#h-logo').show();
	});
});

$('#h-logo').mouseleave(function() {
	jQuery.fx.off = true;
	$('#h-logo').hide(function() {
		$('#logo').show();
	});
});


$('#social').hover(function() {
	jQuery.fx.off = true;
	$('#social').hide(function(){
		$('#h-social').show();
	});
});

$('#h-social').mouseleave(function() {
  jQuery.fx.off = true;
	$('#h-social').hide(function() {
		$('#social').show();
	});
});



$('#email').hover(function() {
	jQuery.fx.off = true;
	$('#email').hide(function(){
		$('#h-email').show();
	});
});

$('#h-email').mouseleave(function() {
	jQuery.fx.off = true;
	$('#h-email').hide(function() {
		$('#email').show();
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