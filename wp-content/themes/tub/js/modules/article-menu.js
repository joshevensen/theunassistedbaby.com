(function() {

	var hasChildren = $('.page_item_has_children');
	var iconToggle = $('.js-toggleChildren');

	if( !hasChildren.hasClass('current_page_item') ) {

		hasChildren.addClass('has_icon');

		hasChildren.click(function() {

			$(this).children('.children').slideToggle();

			$(this).children('i').toggleClass('fa-rotate-90');

		});

	}

})();