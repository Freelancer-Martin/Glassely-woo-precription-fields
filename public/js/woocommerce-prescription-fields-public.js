jQuery(document).ready(function($) {

  $( '.woocommerce-cart-form__cart-item' ).remove( '#delete-object' );


  $( ".get-lense-price" ).each(function(index) {
    $(this).on("mouseenter", function(){
          var price = $( this ).data( 'price' );
          $( '.receive-lense-price' ).val( price )
        //console.log( $( this ).data( 'price' ) );
    });
  });

  $('#lense-type-digital').click(function(){
	    $('#lense-type').val( 'lense-type-digital' );
	});

	$('#lense-type-standard').click(function(){
	    $('#lense-type').val( 'lense-type-standard' );
	});


  $('#lense-style-distance').click(function(){
      $('#lense-style-new').val( 'lense-style-distance' );
  });

  $('#lense-style-reading').click(function(){
      $('#lense-style-new').val( 'lense-style-reading' );
  });
/*
  var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
  };
  var product_id = getUrlParameter('add-to-cart');
*/



 $('.save-this-options').on( "click", function() {


      var mydata = {

          action: "prescription_cool_options",
          right_od_sph: $('#right-od-sph option:selected').val(),
          right_od_cyl: $('#right-od-cyl option:selected').val(),
          right_od_axis: $('#right-od-axis option:selected').val(),
          right_od_add: $('#right-od-add option:selected').val(),
          right_od_pd: $('#right-od-pd option:selected').val(),
          left_os_sph: $('#left-os-sph option:selected').val(),
          left_os_cyl: $('#left-os-cyl option:selected').val(),
          left_os_axis: $('#left-os-axis option:selected').val(),
          left_os_add: $('#left-os-add option:selected').val(),
          left_os_pd: $('#left-os-pd option:selected').val(),
          quest_right_od_sph: $('#quest-right-od-sph option:selected').val(),
          quest_right_od_cyl: $('#quest-right-od-cyl option:selected').val(),
          quest_right_od_axis: $('#quest-right-od-axis option:selected').val(),
          quest_right_od_add: $('#quest-right-od-add option:selected').val(),
          quest_right_od_pd: $('#quest-right-od-pd option:selected').val(),
          quest_left_os_sph: $('#quest-left-os-sph option:selected').val(),
          quest_left_os_cyl: $('#quest-left-os-cyl option:selected').val(),
          quest_left_os_axis: $('#quest-left-os-axis option:selected').val(),
          quest_left_os_add: $('#quest-left-os-add option:selected').val(),
          quest_left_os_pd: $('#quest-left-os-pd option:selected').val(),
          lenses_type: $('#lense-type').val(),
          lense_style_new: $('#lense-style-new').val(),
          //lenses_final_name: $('#lenses-final-name').val(),
        //  product_id: product_id,
        //  lense_price: $('#lense-price').val(),
      };


      // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php

      $.ajax({
          type: "POST",
          url: ajaxurl,

          dataType: "json",
          data: mydata,

          success: function (data, textStatus, jqXHR) {
              if(data === true)
                  var tag = $('#display')
                  tag.fadeOut(1000).html('<p class="front-end-lenses-next" >Options Saved!</p>');
                  //tag.html('<p class="front-end-lenses-next"  >Options Saved!</p>');
          },

          error: function (errorMessage) {

              console.log(errorMessage);
          }

      });


  });


  $('.save-lense-type').on( "click", function() {


       var mydata = {

           action: "lenses_type_options",
           lenses_final_name: $('.lenses-final-name').val(),
           lense_price: $('.receive-lense-price').val(),

       };


       // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php

       $.ajax({
           type: "POST",
           url: ajaxurl,

           dataType: "json",
           data: mydata,

           success: function (data, textStatus, jqXHR) {
               if(data === true)
                   var tag = $('#display')
                   tag.fadeOut(1000).html('<p class="front-end-lenses-next" >Options Saved!</p>');
                   //tag.html('<p class="front-end-lenses-next"  >Options Saved!</p>');
           },

           error: function (errorMessage) {

               console.log(errorMessage);
           }

       });


   });


  $( '.quest-prescription-button' ).on( "click", function() {
      $( '.quest-front-end-prescription-container' ).css( 'display', 'none');
      $( '.front-end-prescription-container' ).css( 'display', '');

  });

  $( '.prescription-button' ).on( "click", function() {
      $( '.quest-front-end-prescription-container' ).css( 'display', '');
      $( '.front-end-prescription-container' ).css( 'display', 'none');

  });


  $( '.field-2pd-second' ).click(function()
  {

    $( '.field-2pd-second' ).css( 'display', 'none');
    $( '.field-1pd-second' ).css( 'display', '');
    $( '.left-field-show' ).css( 'display', '');
  });


  $( '.field-1pd-second' ).click(function()
  {
    $( '.field-2pd-second' ).css( 'display', '');
    $( '.field-1pd-second' ).css( 'display', 'none');
    $( '.left-field-show' ).css( 'display', 'none');
  });


  $( '.field-2pd' ).click(function()
  {

    $( '.field-2pd' ).css( 'display', 'none');
    $( '.field-1pd' ).css( 'display', 'inline-block');
    $( '.field-1pd' ).css( 'margin-top', '6em');
    $( '.field-1pd' ).css( 'position', 'absolute');
    $( '.field-1pd' ).css( 'right', '0');
    $( '.left-field-show' ).css( 'display', 'block');
  });


  $( '.field-1pd' ).click(function()
  {
    $( '.field-2pd' ).css( 'display', 'block');
    $( '.field-1pd' ).css( 'display', 'none');
    $( '.left-field-show' ).css( 'display', 'none');
  });

  $('.front-end-lenses-next').mousemove(function()
  {
     if( $('#right-od-add').val() > 0 || $('#left-os-add').val() > 0 ) {
        $( '.front-end-lenses-next' ).attr( 'href', '#one');
        $( '#lense-style' ).css( 'display', 'none');
      } else {
        $( '.front-end-lenses-next' ).attr( 'href', '#zero');
        $( '#lense-style' ).css( 'display', 'block');
      }
  });


  $('.lenses-type-standard').click(function()
  {
      if( $( '.lenses-type-standard' ).val( 'standard-lenses' ) ) {
        $( '.standard-lenses' ).css( 'display', 'block');
        $( '.digital-lenses' ).css( 'display', 'none');
      }

  });

  $('.lenses-type-digital').click(function()
  {
      if ($( '.lenses-type-digital' ).val( 'digital-lenses' )) {
        $( '.digital-lenses' ).css( 'display', 'block');
        $( '.standard-lenses' ).css( 'display', 'none');
      }
  });



  $('.owl-carousel').owlCarousel({
    loop:false,
    margin:10,
    nav:false,

    dots: true,
    dotsEach: true,
    singleItem: true, transitionStyle: "fade",
    autoplay:false,
    //autoplayTimeout:10000,
    autoplayHoverPause:false,
    touchDrag  : false,
    mouseDrag  : false,
    //autoheight: true,
    //navText: ["<span class='icon'>Eelmine k端simus</span>","<span class='front-end-lenses-next ' href='#zero' >Next step</span>"],
    //navElement: '.owl-next',
    //callbacks: true,
    URLhashListener: true,
    //autoplayHoverPause: true,
    startPosition: 'URLHash',
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
 });



});
