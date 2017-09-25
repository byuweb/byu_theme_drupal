# BYU Drupal 7 Theme

## Getting Started:
--------------------

This theme requires PHP version 5.4 or higher. It is highly encouraged that you have the jQuery Update module 
so you can have a recent version of jQuery.

Please see our full documentation here: https://theme-dev.byu.edu/templates/drupal-components
- Downloading: Theme, SCSS Modules (Prepro & Sassy), and Library (PHPSass)
- Installing
- Theme Settings: Over a dozen theme options including:
    * What fonts to use and where
    * What version of BYU Components to load
    * Header options: Actions, Sign In, Search, etc.
    * Full width vs. a custom page width
    * Menu Styling
    * Hero image options
 See a walk through of the settings: https://theme-dev.byu.edu/drupal-components/theme-settings
 
 Suggest new options on slack! BYUWeb team and #drupal-users channel


## BUILD A THEME WITH ZURB FOUNDATION:
----------------------------------
This BYU Theme is a sub-theme of Zurb Foundation. Please download the current Zurb Foundation 7.x-4.x version.
https://drupal.org/project/zurb-foundation

The base Zurb Foundation theme is designed to be easily extended by its sub-themes.
You shouldn't modify any of the CSS or PHP files in the zurb_foundation/ folder;
if you intend to modify this theme, you should make your changes inside the BYU2017_D7 theme.


## Styling Changes & Sub Theming:
----------------------------------------

### Advanced (Recommended)
A. IF you will be styling extensively or adding templates to the theme, you should use a sub theme.
Inside this theme is a folder 'subtheme'.
1. Copy the subtheme folder outside of the byu2017_d7 folder into sites/all/themes.
2. Change the "subtheme.info.txt" file to be "subtheme.info".
3. Rename every instance of "subtheme" to the new name of your theme.
    i.e. the folder name, info file, and information inside the info file.

4. You can also further customize your theme by copying any template, js or scss file from the parent theme (byu2017_d7) into this
theme in it's appropriate place. 
    i.e. if you copy page.tpl.php from byu2017_d7/templates/page.tpl.php into sites/all/themes/subtheme/templates/page.tpl.php then 
    your changes made there will be reflected. It will use this page template instead of the one in byu2017_d7.

For more questions about sub theming, you can read the instructions online here:
https://www.drupal.org/docs/7/theming/creating-a-sub-theme

## Simple - (If you will not be changing the styling or js)
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



## Full-Width Option (rather than constrained-width content pages)
------------------------------------
1. Make sure you have sub-themed the BYU theme
2. Create your custom.scss if you haven't already and add:
    main.row {
        max-width: 100%;
    }

## MENU FORMATTING
-----------------------------------

In the demo file about byu-menu, it mentions the options to add several classes to specific menu links, to improve the formatting.
http://2017-components-demo.cdn.byu.edu/byu-menu.html

It demonstrates adding the class 'long-link' to a link with extra long text.
This is the preferred method for adding classes to certain links:

1. Download and enable this module:
https://www.drupal.org/project/menu_attributes
2. Go to your menu, edit a link, and in the Menu Attributes section, specify the class you'd like.


## Search Options
The search in the byu header can be disabled in the header settings.
You can also customize how it works. It is using the byu-search component. 

If you use the default core search module, it will work out of the box.
### Using Different Search Modules
You are able to use different search modules (i.e. Custom Search or Google Custom Search). If the search
component gets confused finding your search/text input and your button/submit input, the theme has
settings provided to tell it specifically which elements to target.

For example, if you use the Custom Search module, you will want to specify:
`input[data-drupal-selector="edit-keys"]` for the Search Box element
and 
`input[data-drupal-selector="edit-submit"]` for the Search Button element.
These fields take simple css selectors, so if your search module isn't working, make sure you are using a css selector that will not target multiple divs, and that will not change. (i.e. id's of these search elements often change once you start searching or reloading the page.)

## HELP & SUPPORT
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


## Notes from Zurb Foundation:
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

## BUILD A THEME WITH DRUSH
----------------------------------
If you have drush and the zurb foundation theme enabled you can create a
subtheme easily with a drush.

The command to do this is simply:
  drush fst [THEMENAME] [Description !Optional]

## MANUALLY BUILD A THEME
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


### Optional steps:

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

## CHANGING FOUNDATION DEFAULT SETTINGS
------------------------------------
In order to avoid overwriting your customizations in _settings.scss when
updating Zurb Foundation, subthemes default to placing the standard Foundation
settings in [subtheme-name]/scss/_variables.scss.

If you prefer to do it the standard Foundation way (at your own risk), you can
rename _variables.scss to _settings.scss in your subtheme and then load
"settings" instead of "variables" in [subtheme-name]/scss/base/_init.scss.


## Requesting Features and Options
If you would like to request other settings or options, please contact Katria Lesser or post in the #drupal-users group on the BYUWeb slack team.
Enhancement requests and settings for the theme should be posted in the #Drupal-users channel. 
Or in github: https://github.com/byuweb/byu2017_d7/issues
Enhancement requests for the header and footer specifically should be posted in the #engineering-group channel. 
Or in github: https://github.com/byuweb/byu-theme-components/issues

### Reporting Bugs & Issues

For the Drupal 7 theme: https://github.com/byuweb/byu2017_d7/issues
For the header or footer not working (if you think this is related to the components, and not Drupal):
https://github.com/byuweb/byu-theme-components/issues
If you aren't sure if it's a component or drupal issue, assume it is Drupal and it will be redirected if it
is for the components group instead.

## Understanding Header/Footer Components
You can read the full documentation for the BYU Header & Footer components on these pages:
http://2017-components-demo.cdn.byu.edu/
and 
http://webcommunity.byu.edu/html-5

### Questions? Ask the Group
The Engineering team of web developers around campus that supports the components is on slack.
Join the byuweb team (see http://webcommunity.byu.edu/) and go to the #engineering-group channel.
