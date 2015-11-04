$('.imagePopupLink').magnificPopup({
	type: 'image',
	cursor: 'mfp-zoom-out-cur',
	verticalFit: true,
	tError: '<a href="%url%">The image</a> could not be loaded.',

	zoom: {
		enabled: true,

		duration: 300,
		easing: 'ease-in-out',

		opener: function(openerElement) {
			return openerElement.is('img') ? openerElement : openerElement.find('img');
		}
	}
});