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



/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	var container, button, menu, page,  links, subMenus, i, len;

	container = document.getElementById( 'mobile-nav-container' );
	if ( ! container ) {
		return;
	}

	button = document.getElementById( 'menu-button' );
	if ( 'undefined' === typeof button ) {
		return;
	}

	menu = document.getElementById( 'mobile-menu' );

	page = document.getElementById('page');

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );
	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			container.className = container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
			if ( -1 !== page.className.indexOf( 'open' ) ) {
				page.className = page.className.replace(' open', '');
			}
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
			if ( -1 === page.className.indexOf( 'open' )) {
				page.className += ' open';
			}
			
		}
	};

	// Get all the link elements within the menu.
	links    = menu.getElementsByTagName( 'a' );
	subMenus = menu.getElementsByTagName( 'ul' );

	// Set menu items with submenus to aria-haspopup="true".
	for ( i = 0, len = subMenus.length; i < len; i++ ) {
		subMenus[i].parentNode.setAttribute( 'aria-haspopup', 'true' );
	}

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
		links[i].addEventListener( 'focus', toggleFocus, true );
		links[i].addEventListener( 'blur', toggleFocus, true );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		var self = this;

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {
				if ( -1 !== self.className.indexOf( 'focus' ) ) {
					self.className = self.className.replace( ' focus', '' );
				} else {
					self.className += ' focus';
				}
			}

			self = self.parentElement;
		}
	}

	/**
	 * Toggles `focus` class to allow submenu access on tablets.
	 */
	( function( container ) {
		var touchStartFn, i,
			parentLink = container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

		if ( 'ontouchstart' in window ) {
			touchStartFn = function( e ) {
				var menuItem = this.parentNode, i;

				if ( ! menuItem.classList.contains( 'focus' ) ) {
					e.preventDefault();
					for ( i = 0; i < menuItem.parentNode.children.length; ++i ) {
						if ( menuItem === menuItem.parentNode.children[i] ) {
							continue;
						}
						menuItem.parentNode.children[i].classList.remove( 'focus' );
					}
					menuItem.classList.add( 'focus' );
				} else {
					menuItem.classList.remove( 'focus' );
				}
			};

			for ( i = 0; i < parentLink.length; ++i ) {
				parentLink[i].addEventListener( 'touchstart', touchStartFn, false );
			}
		}
	}( container ) );
} )();

( function( $ ) {
	var searchContainer = $('#search-container');

	searchContainer.css('visibility', 'hidden');	

	searchContainer.on('click', function(event){
		// prevent hiding the searchform when clicked (don't bubble up to document)
		event.stopPropagation();
	});

	$(document).on('click', function(event) {
		// hide searchform when something outside of it is clicked
		if (searchContainer.attr('aria-hidden') == 'false') {
			exitSearch();
		}
	});
	
	$('#search-toggle').on('click', function(event) {
		event.stopPropagation();
		if (searchContainer.attr('aria-hidden') == 'true') {
			searchContainer.css('visibility', 'visible');	
			searchContainer.attr('aria-hidden', 'false');
			searchContainer.attr('data-visible', 'true');
			searchContainer.find('.search-field').first().focus();
		} else {
			exitSearch();
		}
	});

	$('#search-container .search-field').on('keydown', function(event) {
		event.stopPropagation();
		if (event.keyCode == 27) {
			exitSearch();
		}
	});

function exitSearch() {
	// wait for the css animation to complete
	setTimeout((function(){searchContainer.attr('aria-hidden', 'true'); searchContainer.css('visibility', 'hidden');}), 500);
	searchContainer.attr('data-visible', 'false');
}

} )( jQuery );
/**
 * File skip-link-focus-fix.js.
 *
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://git.io/vWdr2
 */
( function() {
	var isWebkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
	    isOpera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
	    isIe     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

	if ( ( isWebkit || isOpera || isIe ) && document.getElementById && window.addEventListener ) {
		window.addEventListener( 'hashchange', function() {
			var id = location.hash.substring( 1 ),
				element;

			if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
				return;
			}

			element = document.getElementById( id );

			if ( element ) {
				if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
					element.tabIndex = -1;
				}

				element.focus();
			}
		}, false );
	}
})();

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