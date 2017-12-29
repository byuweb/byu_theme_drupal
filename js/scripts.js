
  // from byu-theme-components documentation for default drupal 7 search form:
function d7Search(value) 
{
    jQuery('#search-block-form button').click();
}

(function ($, Drupal) {

    Drupal.behaviors.byu_theme = {
        attach: function (context, settings) {

        }
    };

})(jQuery, Drupal);

jQuery(document).ready(
    function ( $ ) {

        if (document.querySelector("#admin-menu") != null) {
            $("body").addClass("adminimal-menu");
        }

        else if (document.querySelector("#toolbar") != null) {
            $("body").addClass("normal-admin-menu");
        }
    }
);