(function ($, Drupal) {


    var userAgent = navigator.userAgent.toLowerCase();
    if (userAgent.indexOf("chrome") != -1){
      $('html').addClass('chrome');
    }



  Drupal.behaviors.byu2017_d7 = {
    attach: function(context, settings) {
      // Make your changes here



    }
  };

})(jQuery, Drupal);
