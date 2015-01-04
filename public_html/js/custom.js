//Capabilities Hover
$('#responsive').hover(function() {
	$('#responsive').hide(0,'', function(){
		$('#h-responsive').show(0, '');
	});
});

$('#h-responsive').mouseleave(function() {
	$('#h-responsive').hide(0,'', function() {
		$('#responsive').show(0, '');
	});
});



$('#logo').hover(function() {
	$('#logo').hide(0,'', function(){
		$('#h-logo').show(0, '');
	});
});

$('#h-logo').mouseleave(function() {
	$('#h-logo').hide(0,'', function() {
		$('#logo').show(0, '');
	});
});


$('#social').hover(function() {
	$('#social').hide(0,'', function(){
		$('#h-social').show(0, '');
	});
});

$('#h-social').mouseleave(function() {
	$('#h-social').hide(0,'', function() {
		$('#social').show(0, '');
	});
});



$('#email').hover(function() {
	$('#email').hide(0,'', function(){
		$('#h-email').show(0, '');
	});
});

$('#h-email').mouseleave(function() {
	$('#h-email').hide(0,'', function() {
		$('#email').show(0, '');
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