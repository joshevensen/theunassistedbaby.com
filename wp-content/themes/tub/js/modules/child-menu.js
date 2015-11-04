(function() {

	var childmenu = $('.js-childMenu');
	var width = childmenu.outerWidth();

	childmenu.show();
	childmenu.parent().addClass('parent');
	childmenu.parent().next('.article--footer').hide();

})();