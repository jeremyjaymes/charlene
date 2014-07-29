/**
 * Async loading for theme customizer
 */
( function( $ ) {

    // Update the site title
    wp.customize( 'blogname', function( value ) {
        value.bind( function( newval ) {
            $( '.site-title a' ).html( newval );
        } );
    } );
    
    // Update the site description
    wp.customize( 'blogdescription', function( value ) {
        value.bind( function( newval ) {
            $( '.site-description' ).html( newval );
        } );
    } );


    //Update background color
    wp.customize( 'background_color', function( value ) {
        value.bind( function( newval ) {
            $('body').css('background-color', newval );
        } );
    } );
    
    //Update colors based on link color
    wp.customize( 'link_color', function( value ) {
        value.bind( function( newval ) {
            $('.entry-content a').css('color', newval );
            $('.entry-meta a').css('color', newval );
            $('.entry-footer a').css('color', newval );
            $('input[type=button], input[type=reset], input[type=submit] ').css({"background-color": newval, "border-color": newval});
            $('button').css({'background-color': newval, 'border-color': newval });
        } );
    } );
    
} )( jQuery );