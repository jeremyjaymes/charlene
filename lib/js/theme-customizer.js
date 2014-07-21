/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ) {

    // Update the site title in real time...
    wp.customize( 'blogname', function( value ) {
        value.bind( function( newval ) {
            $( '.site-title a' ).html( newval );
        } );
    } );
    
    //Update the site description in real time...
    wp.customize( 'blogdescription', function( value ) {
        value.bind( function( newval ) {
            $( '.site-description' ).html( newval );
        } );
    } );


    //Update site background color...
    wp.customize( 'background_color', function( value ) {
        value.bind( function( newval ) {
            $('body').css('background-color', newval );
        } );
    } );
    
    //Update site link color in real time...
    wp.customize( 'link_color', function( value ) {
        value.bind( function( newval ) {
            $('.entry-content a').css('color', newval );
            $('.entry-meta a').css('color', newval );
            $('.entry-footer a').css('color', newval );
            $('input[type="button"]').css('background-color', newval );
            $('input[type="reset"]').css('background-color', newval );
            $('input[type="submit"]').css('background-color', newval );
            $('button').css('background-color', newval );
        } );
    } );
    
} )( jQuery );