(function() {

	var heroElement = $('.js-heroImage');
	var imageSrc = heroElement.children('img').attr('src');

	heroElement.attr("style", "background-image: url('" + imageSrc + "');");

	heroElement.children('img').hide();
})();