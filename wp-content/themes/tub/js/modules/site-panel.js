//
// Site Panel Function
(function() {

	$('#sitePanelButton').click(function() {
		$(this).toggleClass('active');

		$('#sitePanel').toggleClass('open');
	});

})();