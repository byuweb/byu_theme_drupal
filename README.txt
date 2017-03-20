DOCUMENTATION
----------------------------------
Please refer also to the community documentation:
  http://drupal.org/node/1948260

BUILD A THEME WITH ZURB FOUNDATION
----------------------------------
This BYU Theme is a sub-theme of Zurb Foundation. Please download the current Zurb Foundation 7.x-4.x version.


The base Zurb Foundation theme is designed to be easily extended by its sub-themes.
You shouldn't modify any of the CSS or PHP files in the zurb_foundation/ folder;
if you intend to modify this theme, you should make your changes inside the BYU2017_D7 theme.

Styling Changes:
----------------------------------------

A. IF you will be styling extensively or adding templates to the theme, you should follow instructions online to sub-theme
this byu theme. Please note that this BYU theme is a child theme of Zurb. Your child theme should be a child of the BYU
theme, not Zurb foundation.

https://www.drupal.org/docs/7/theming/creating-a-sub-theme

B. If you will be making minimal css changes, follow these instructions.

Do NOT make custom changes in byu_default.scss
If you do they will be overridden when you update the theme.

1. Create a custom.scss file in this scss directory.
2. Edit byu2017_d7.info and find the lines where scss/byu_default.scss is included. You will see a commented out line
that will tell the theme to look for your custom.scss file.
3. Add your css
4. Clear your caches.

/* ---- It is good practice to have sections in your styling, like this:  --- */

/* ------- Front ------ */

/* -- front feature custom -- */

/* ------- Misc. ------ */

Under scss you will see custom.scss. At the end of that file is where you should make your changes.
NOTE: If you are using scss, as we rcommend, you need to download and install the module SASSY to
precompile your scss into css.
https://www.drupal.org/project/sassy

You will also need the PHPSass library:
Please download the PHPSass library from
https://github.com/richthegeek/phpsass/zipball/master and extract it into sites/all/libraries/phpsass

Javascript Changes:
Similarly, you should create a custom.js file under js. Or choose to subtheme.
You will also have to uncomment the line for declaring the js file in byu2017_d7.info

HELP & SUPPORT
------------------------------------------
This theme was created by the BYU Web Community.
For questions involving adopting and using this theme, consult the BYU-Web slack group. See the
#Byu-theme-help channel for questions and support.

Want to get involved? Join the #engineering-group channel and ask how you can help. You can also
browse our projects on https://github.com/byuweb

In particular, see the web components that are the building blocks of the BYU components
in THIS theme: https://github.com/byuweb/2017-components

Drupal 7 Modules created by the BYU Web Community:
https://github.com/byuweb/calendar_widget/releases/tag/drupal7_module


Notes from Zurb Foundation:
------------------------------------------
This theme does not support IE7. If you need it downgrade to Foundation 2 see
http://foundation.zurb.com/docs/faq.php or use the script in the starter
template.php THEMENAME_preprocess_html function.

*** IMPORTANT NOTE ***
*
* In Drupal 7, the theme system caches which template files and which theme
* functions should be called. This means that if you add a new theme,
* preprocess or process function to your template.php file or add a new template
* (.tpl.php) file to your sub-theme, you will need to rebuild the "theme
* registry." See http://drupal.org/node/173880#theme-registry
*
* Drupal 7 also stores a cache of the data in .info files. If you modify any
* lines in your sub-theme's .info file, you MUST refresh Drupal 7's cache by
* simply visiting the Appearance page at admin/appearance or at
  admin/config/development/performance.

BUILD A THEME WITH DRUSH
----------------------------------
If you have drush and the zurb foundation theme enabled you can create a
subtheme easily with a drush.

The command to do this is simply:
  drush fst [THEMENAME] [Description !Optional]

MANUALLY BUILD A THEME
----------------------------------
 1. Setup the location for your new sub-theme.

    Copy the STARTER folder out of the zurb_foundation/ folder and rename it to
    be your new sub-theme. IMPORTANT: The name of your sub-theme must start with
    an alphabetic character and can only contain lowercase letters, numbers and
    underscores.

    For example, copy the sites/all/themes/zurb_foundation/STARTER folder and
    rename it as sites/all/themes/foo.

      Why? Each theme should reside in its own folder. To make it easier to
      upgrade Foundation, sub-themes should reside in a folder separate from the
      base theme.

 2. Setup the basic information for your sub-theme.

    In your new sub-theme folder, rename the STARTERKIT.info.txt file to include
    the name of your new sub-theme and remove the ".txt" extension. Then edit
    the .info file by editing the name and description field.

    For example, rename the foo/STARTER.info.txt file to foo/foo.info. Edit the
    foo.info file and change "name = Foundation Sub-theme Starter" to
    "name = Foo" and "description = Read..." to "description = A sub-theme".

      Why? The .info file describes the basic things about your theme: its
      name, description, features, template regions, CSS files, and JavaScript
      files. See the Drupal 7 Theme Guide for more info:
      http://drupal.org/node/171205

    Then, visit your site's Appearance page at admin/appearance to refresh
    Drupal 7's cache of .info file data.

 3. Edit your sub-theme to use the proper function names.

    Edit the template.php and theme-settings.php files in your sub-theme's
    folder; replace ALL occurrences of "STARTER" with the name of your
    sub-theme.

    For example, edit foo/template.php and foo/theme-settings.php and replace
    every occurrence of "STARTER" with "foo".

    It is recommended to use a text editing application with search and
    "replace all" functionality.

 5. Set your website's default theme.

    Log in as an administrator on your Drupal site, go to the Appearance page at
    admin/appearance and click the "Enable and set default" link next to your
    new sub-theme.


Optional steps:

 6. Modify the markup in Foundation core's template files.

    If you decide you want to modify any of the .tpl.php template files in the
    zurb_foundation folder, copy them to your sub-theme's folder before
    making any changes.And then rebuild the theme registry.

    For example, copy zurb_foundation/templates/page.tpl.php to
    THEMENAME/templates/page.tpl.php.

 7. Modify the markup in Drupal's search form.

    Copy the search-block-form.tpl.php template file from the modules/search/
    folder and place it in your sub-theme's template folder. And then rebuild
    the theme registry.

    You can find a full list of Drupal templates that you can override in the
    templates/README.txt file or http://drupal.org/node/190815

      Why? In Drupal 7 theming, if you want to modify a template included by a
      module, you should copy the template file from the module's directory to
      your sub-theme's template directory and then rebuild the theme registry.
      See the Drupal 7 Theme Guide for more info: http://drupal.org/node/173880

 8. Further extend your sub-theme.

    Discover further ways to extend your sub-theme by reading
    Drupal 7's Theme Guide online at: http://drupal.org/theme-guide

CHANGING FOUNDATION DEFAULT SETTINGS
------------------------------------
In order to avoid overwriting your customizations in _settings.scss when
updating Zurb Foundation, subthemes default to placing the standard Foundation
settings in [subtheme-name]/scss/_variables.scss.

If you prefer to do it the standard Foundation way (at your own risk), you can
rename _variables.scss to _settings.scss in your subtheme and then load
"settings" instead of "variables" in [subtheme-name]/scss/base/_init.scss.