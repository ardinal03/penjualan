$(document).ready(function() {
	$('#btn-search').on('click', function() {
		$('.search-tab').slideDown(300);
	});
	$('#close-search').on('click', function() {
		$('.search-tab').slideUp(300);
	});
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
		useCss: true,
		pager: false
	});
	$('.btn-tambah').on('click', function() {
		$('.form-tambah').slideDown(300);
	});
	$('.btn-batal').on('click', function() {
		$('.form-tambah').slideUp(300);
	});
});