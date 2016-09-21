(function($) {
// Smooth scrolling for one page navigation links
	jQuery('#scroll-icon').on('click', function (e) {
		e.stopPropagation();
		e.preventDefault();

		var targetLink = this.hash;

		jQuery('html, body').stop().animate({
			// that 15 px tall body::before pseudo element
			'scrollTop': jQuery(targetLink).offset().top - 15
		}, 900, 'swing'/*, function() {
			window.location.hash = targetLink;
		}*/);

	});
})(jQuery);