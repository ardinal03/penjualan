var url = window.location;
var uri = $(location).attr('href').split('/').splice(0, 6).join("/") + '/';

$(document).ready(function() {

	$('.catlink').on('click', function() {
		var kode = '.'+ $(this).attr('id');
		var series = '.mega-content '+kode;

		$(this).siblings().removeClass('active');
		if ($(this).hasClass('active')) {
			$(this).removeClass('active');
			$(series).fadeOut();
			$(series).siblings().hide();
		}
		else {
			$(this).addClass('active');
			$(series).fadeIn();
			$(series).siblings().hide();
		}

	});

	$('.mg-close').on('click', function() {
		$('#mega-menu').slideUp(300);
	});

	$('.mg-open').on('click', function() {
		$('#mega-menu').slideDown(300);
	});

	$('.produk-link').first().addClass('active');
	if($('.produk-link').hasClass('active')) {
		var id 		= '.' + $('.produk-link').children().attr('id');
		var select 	= $(id).parents('.spec-content');
		select.fadeIn(300);
	}
	
	$('.produk-link .nav-link').on('click', function() {
		var selected = $(this).attr('id');
		var prevLi = $(this).parent();

		prevLi.siblings().removeClass('active');
		prevLi.addClass('active');

		if (prevLi.hasClass('active')) {
			var select = '.' + $(this).attr('id');
			var target = $(select).parents('.spec-content');
			target.fadeIn(300);
			target.siblings().hide();
		}
	});

	// $('#btn-search').on('click', function() {
	// 	$('.search-tab').slideDown(300);
	// });

	// $('#close-search').on('click', function() {
	// 	$('.search-tab').slideUp(300);
	// });

	$('#slideGallery').lightSlider({
		gallery: false,
		item: 1,
		loop: true,
		slideMargin: 0,
		enableDrag: true,
		easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
		auto: true,
		mode: 'fade',
		pause: 5000,
		responsive: [ { breakpoint: 576 }, { breakpoint: 768 }],
		pager: false
	});

	$('#produkSlide').lightSlider({
		gallery:true,
		item:1,
		loop: true,
		enableDrag: true,
		easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
		auto: true,
		pause: 3000,
		vertical:true,
		thumbItem: 5,
		thumbMargin:0,
		slideMargin:0,
		verticalHeight:550,
		adaptiveHeight: true,
		responsive: [ { breakpoint: 576 }, { breakpoint: 768 }]
	});

	$('#spareGallery').lightSlider({
		gallery:true,
		item:1,
		loop: true,
		enableDrag: true,
		easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
		auto: true,
		pause: 3000,
		vertical:true,
		thumbItem: 3,
		thumbMargin:0,
		slideMargin:0,
		verticalHeight:350,
		adaptiveHeight: true,
		responsive: [ { breakpoint: 576 }, { breakpoint: 768 }]
	});

	$('.btn-tambah').on('click', function() {
		$('#canvas').queue(function() {
			$(this).removeClass('col-lg-12').dequeue();
			$(this).addClass('col-lg-7').dequeue();
			$('.card-item').removeClass('col-lg-4').dequeue();
		});
		$('.right-tab').delay(400).fadeIn('fast');
	});

	$('.btn-batal').on('click', function() {
		$('.right-tab').fadeOut('fast');
		$('#canvas').delay(400).queue(function() {
			$(this).removeClass('col-lg-7').dequeue();
			$(this).addClass('col-lg-12').dequeue();
			$('.card-item').addClass('col-lg-4').dequeue();
		});
	});

	$('#header a[href="'+ uri +'"]').addClass( 'active' );

	$('#toggle-password').on('click', function() {
		$(this).hide();
		$('#data-password').show();
	});

	$('#data-password').on('click', function() {
		$(this).hide();
		$('#toggle-password').show();
	});
});