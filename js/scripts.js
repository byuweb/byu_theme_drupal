
  // from byu-theme-components documentation for default drupal 7 search form:
  function d7Search(value) {
    jQuery('#search-block-form button').click();
  }

(function ($, Drupal) {

  Drupal.behaviors.byu2017_d7 = {
    attach: function(context, settings) {

    }
  };

})(jQuery, Drupal);
