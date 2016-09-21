(function($) {
	$(window).scroll(function() {
		var masthead = $('#masthead-inner');

		if ($(this).scrollTop() > 100 && masthead.attr('data-scrolled', 'false')) {
			masthead.attr('data-scrolled', 'true');
		} else if ($(this).scrollTop() < 100 && masthead.attr('data-scrolled', 'true')) {
			masthead.attr('data-scrolled', 'false');
		}

	});
})(jQuery);


// poista kokonaan mutta tallenna jonnekin...


