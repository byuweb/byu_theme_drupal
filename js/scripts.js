(function ($, Drupal) {
  // from byu-theme-components documentation for default drupal 7 search form:
  function d7SearchComplex(value) {
    document.getElementById('edit-submit--2').click();
  }

  Drupal.behaviors.byu2017_d7 = {
    attach: function(context, settings) {

    }
  };

})(jQuery, Drupal);
