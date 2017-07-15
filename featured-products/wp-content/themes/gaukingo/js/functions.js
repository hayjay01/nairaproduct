/**
 * Functionality specific to Gaukingo.
 *
 * Provides helper functions to enhance the theme experience.
 */

(function($) {
	
	menuToggle = $('.menu-toggle');
    siteNavigation = $('#masthead');
    _window = $(window);

    /**
     * In small screens the dropdownToggle is a button with an icon inside and it is after the 'a' 
     * that is the child of a 'li' with submenues. (The button and the 'a' are siblings of the submenu).
     * In big screens the dropdownToggle is only an icon and it is inside the 'a' that is the child of a 'li' with submenues.
     **/

if (881 > _window.width()) {
    var dropdownToggle = $('<button />', {'class': 'dropdown-toggle'})         
        .append( $( '<span />', {'class': 'genericon genericon-expand', 'aria-hidden': 'true'} ),
                 $( '<span />',{'class': 'screen-reader-text', text : gaukingoScreenReaderText.expand } ) );                       
                       
    siteNavigation.find( 'li:has(ul) > a' ).after(dropdownToggle);                     
}

else {
    var dropdownToggle = $('<span />', {'class': 'genericon', 'aria-hidden': 'true'});  
    siteNavigation.find( 'li:has(ul) > a' ).append(dropdownToggle);                     
}

function switchClass (a, b, c) {
    if ( a.hasClass(b) ) {
        a.removeClass(b);
        a.addClass(c);
    } else {
        a.removeClass(c);
        a.addClass(b);
    }
}

function switchScreenReaderText (a, b, c) {
    if( a.text() === b) {
        a.text(c);
    } else {
        a.text(b)
    }
}

function onResizeARIA() {
        if ( 881 > _window.width() ) {
            menuToggle.attr( 'aria-expanded', 'false' );
            siteNavigation.attr( 'aria-expanded', 'false' );
            menuToggle.attr( 'aria-controls', 'nav-menu' );
        } else {
            menuToggle.removeAttr( 'aria-expanded' );
            siteNavigation.removeAttr( 'aria-expanded' );
            menuToggle.removeAttr( 'aria-controls' );
        }
    }

_window.on('load', onResizeARIA());

menuToggle.click(function(){
    switchClass($(this).children('#nav-icon'), 'genericon-menu', 'genericon-close-alt');
    $(this).toggleClass('toggled-on');
    siteNavigation.toggleClass('toggled-on');

    if($(this).hasClass('toggled-on')) {
        $(this).attr('aria-expanded', 'true');
        siteNavigation.attr('aria-expanded', 'true');        
    }
    else {
        $(this).attr('aria-expanded', 'false');
        siteNavigation.attr('aria-expanded', 'false');
    }
});

siteNavigation.find( '.dropdown-toggle' ).click( function(e) {
    var _this = $( this );
    var _i = _this.children('span:first-child');
    var screenReaderSpan = _this.find( '.screen-reader-text' );
    switchClass( _i, 'genericon-expand', 'genericon-collapse');
    switchScreenReaderText(screenReaderSpan, gaukingoScreenReaderText.expand, gaukingoScreenReaderText.collapse );
    e.preventDefault();
    _this.toggleClass( 'toggle-on' );
    _this.next( '.sub-menu' ).toggleClass( 'toggled-on' );
} );

siteNavigation.find( 'a' ).on( 'focus blur', function() {
            $( this ).parents( '.menu-item' ).toggleClass( 'focus' );
        } );

/* Here starts the implementation of the third party jQuery Plugins */

_window.load(function(){
    $('.blog-inner').masonry({
    // options
    itemSelector: '.post-box',
    });
});

	
})( jQuery );

