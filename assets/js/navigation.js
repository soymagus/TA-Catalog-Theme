( function () {
	'use strict';

	const button = document.querySelector( '.menu-toggle' );
	const nav = document.querySelector( '.main-navigation' );

	if ( ! button || ! nav ) {
		return;
	}

	button.addEventListener( 'click', function () {
		const isOpen = button.getAttribute( 'aria-expanded' ) === 'true';
		button.setAttribute( 'aria-expanded', String( ! isOpen ) );
		nav.classList.toggle( 'is-open', ! isOpen );
	} );

	nav.addEventListener( 'keyup', function ( event ) {
		if ( event.key === 'Escape' ) {
			button.setAttribute( 'aria-expanded', 'false' );
			nav.classList.remove( 'is-open' );
			button.focus();
		}
	} );
}() );

