(function ($) {
    'use strict';

    //  Mailchimp ajax
    $('#mc_embed_signup').find('form').ajaxChimp();

    // Exibition widget owlCarousel
    var reviewCarusel = $('.active-review-carusel');
    
    if( reviewCarusel.length ) {
        reviewCarusel.owlCarousel({
            items:1,
            loop:true,
            margin:30,
            dots: true
        });
    }
    // Datepicker
    $( function() {
        $( "#datepicker" ).datepicker();
        $( "#datepicker2" ).datepicker();
     });


    if( document.getElementById("default-select") ) {
          $('select').niceSelect();
    };
    if( document.getElementById("service-select") ) {
          $('select').niceSelect();
    };  

    //  Gallery
    var gallery = $('.active-gallery');
    
    if( gallery.length ) {
        gallery.owlCarousel({
            items:6,
            loop:true,
            dots: true,
            autoplay:true,    
                responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                900: {
                    items: 6,
                }

            }
        });
    }

    //  Counter Js 
    if( $('.faq-area').length ) {
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    }
    //
    $('.play-btn').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });



    // Appointment form ajax

    $( '#form-wrap' ).on( 'submit', function() {

        var uname = $( "[name='uname']" ).val(),
            uemail = $( "[name='uemail']" ).val(),
            uphone = $( "[name='uphone']" ).val(),
            uservice = $( "[name='uservice']" ).val(),
            nonce = $( "#request_submit_nonce_check" ).val(),
            umessage = $( "[name='umessage']" ).val();


        $.ajax({
            type: 'post',
            url: ajax_object.ajax_url,
            data: {
                action: 'industry_booking_form_data',
                uname: uname,
                uemail: uemail,
                uphone: uphone,
                uservice: uservice,
                request_submit_nonce_check: nonce,
                umessage: umessage

            },
            success: function( res ){
                $('.submit-info').html( res );
            }

        }); 

        return false;

    } );



})(jQuery);