(function( $ ) {
    "use strict";

    wp.customize( 'course_link_color', function( value ) {
        value.bind( function( to ) {
            $( 'a' ).css( 'color', to );
        } );
    });


    wp.customize( 'social-icon-1', function( value ) {
        value.bind( function( to ) {
            $( '.icon-1 img' ).attr( 'src', to );
        } );
    });

    wp.customize( 'social-icon-2', function( value ) {
        value.bind( function( to ) {
            $( '.icon-2 img' ).attr( 'src', to );
        } );
    });

    wp.customize( 'social-icon-3', function( value ) {
        value.bind( function( to ) {
            $( '.icon-3 img' ).attr( 'src', to );
        } );
    });

    wp.customize( 'social-icon-4', function( value ) {
        value.bind( function( to ) {
            $( '.icon-4 img' ).attr( 'src', to );
        } );
    });

    wp.customize( 'social-link-1', function( value ) {
        value.bind( function( to ) {
            $( '.icon-1 a' ).attr( 'href', to );
        } );
    });

    wp.customize( 'social-link-2', function( value ) {
        value.bind( function( to ) {
            $( '.icon-2 a' ).attr( 'href', to );
        } );
    });

    wp.customize( 'social-link-3', function( value ) {
        value.bind( function( to ) {
            $( '.icon-3 a' ).attr( 'href', to );
        } );
    });

    wp.customize( 'social-link-4', function( value ) {
        value.bind( function( to ) {
            $( '.icon-4 a' ).attr( 'href', to );
        } );
    });

})( jQuery );