/**
 * Created by sh14ru on 10.01.17.
 */

function cl( some ) {
	//console.log(some);
}

jQuery( '.start, article' ).matchHeight( {
	//target: jQuery('.row')
} );

function article_plugin__header_height() {
	jQuery( '.article-plugin__header' ).each( function () {
		cl( this );
		var parent = jQuery( this ).closest( '.article-plugin' );
		jQuery( this ).height( parent.height() );
	} );
}

jQuery( window ).resize( function () {
	cl( jQuery( this ).width() );
	article_plugin__header_height();
} );

article_plugin__header_height();

/**
 * Функция скрола к элементу, вызывается так: jQuery('.element_selector').goTo();
 *
 * @returns {jQuery}
 */
jQuery.fn.goTo = function () {
	jQuery( 'html, body' ).animate( {
		scrollTop : jQuery( this ).offset().top + 'px'
	}, 'fast' );
	return this;
};

jQuery( '[data-goto]' ).on( 'click', function ( event ) {
	event.preventDefault();
	jQuery( jQuery( this ).attr( 'data-goto' ) ).goTo();
} );