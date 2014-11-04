$(document).ready(function() {
	$('.carousel-control-extra').click(function() {
		$('.carousel-control-extra').toggle();
		$('#carousel').carousel($(this).index() === 0 ? 'pause' : 'cycle');
	});
	$('#cart-item-amount').bind('focus change click', function() {
		$('.carousel-control-extra:eq(0)').hide();
		$('.carousel-control-extra:eq(1)').show();
		$('#carousel').carousel('pause');
	});
	$('#cart-item-size').click(function() {
		$('.carousel-control-extra:eq(0)').hide();
		$('.carousel-control-extra:eq(1)').show();
		$('#carousel').carousel('pause');
	});
	$('#carousel').on('slid.bs.carousel', function (e) {
		// e.target.id // carousel ID 
		var index = $(".active", e.target).index(); // active slide index
		$('#item_id').val(index + 1);
		$('#item_id').text(index + 1);
		$('#item_name').text($('.item:eq(' + index + ') .carousel-caption h4:first', this).text());
	});
	$('h3 span[class*="chevron-"]').click(function() {
		$('#carousel').carousel($(this).index() === 0 ? 'prev' : 'next');
	});
	$('.btn-cart').on('click', function() {
		window.location.href = 'cart';
	});
	$('.btn-order').on('click', function() {
		window.location.href = 'order';
	});
	if($('#inscription').prop('checked')) {
		$('#inscription-text-wrapper').show();
	}
	else {
		$('#inscription-text-wrapper').hide();
	}
	$('#inscription').click(function() {
		if($(this).prop('checked')) {
			$('#inscription-text-wrapper').show();
		}
		else {
			$('#inscription-text-wrapper').hide();
		}
	});
	if($('#promo-code').prop('checked')) {
		$('#promo-code-wrapper').show();
	}
	else {
		$('#promo-code-wrapper').hide();
	}
	$('#promo-code').click(function() {
		if($(this).prop('checked')) {
			$('#promo-code-wrapper').show();
		}
		else {
			$('#promo-code-wrapper').hide();
		}
	});
	$('#promo-code-link').click(function(event) {
		event.preventDefault();
	}).popover({
		"placement": "top",
		"html": true
	});
	$('#help').click(function(event) {
		event.preventDefault();
	}).popover({
		"placement": "right",
		"html": true
	});
	$('#details-block').collapse('hide').on('show.bs.collapse', function () {
		$(this).prev().removeClass().addClass('dropdown');
	}).on('hide.bs.collapse', function () {
		$(this).prev().removeClass().addClass('dropup');
	});
	$('.item-image').colorbox();
	$('.how-to-buy-video').click(function(event) {
		event.preventDefault();
		$('#modalScreencast').modal();
	});
	$('.how-to-buy-gallery').click(function(event) {
		event.preventDefault();
		$('#links a:first').click();
	});
	$('a[href="#top"]').click(function(event) {
		event.preventDefault();
		$('html, body').animate({
			scrollTop: 0
		}, 750, 'swing');
	});
	$('a[href$="#bestsellers"]').click(function(event) {
		if(document.getElementById('bestsellers')) {
			event.preventDefault();
			$('html, body').animate({
				scrollTop: ($('#bestsellers').offset().top)
			}, 750, 'swing');
		}
	});
	$('a[href$="#shop"]').click(function(event) {
		if(document.getElementById('shop')) {
			event.preventDefault();
			$('html, body').animate({
				scrollTop: ($('#shop').offset().top)
			}, 750, 'swing');
		}
	});
});
