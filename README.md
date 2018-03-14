# BYU Drupal 7 Theme

## Getting Started:

This theme requires PHP version 5.4 or higher. It is highly encouraged that you 
have the jQuery Update module so you can have a recent version of jQuery.

Please see our full documentation here: 
https://theme-dev.byu.edu/templates/drupal-components
- Downloading: Theme, SCSS Modules (Prepro & Sassy), and Library (PHPSass)
- Installing
- Theme Settings: Over a dozen theme options including:
    * What fonts to use and where
    * What version of BYU Components to load
    * Header options: Actions, Sign In, Search, etc.
    * Full width vs. a custom page width
    * Menu Styling
    * Hero image options
See a walk through of the settings:
https://theme-dev.byu.edu/drupal-components/theme-settings
 
## BUILD A THEME WITH ZURB FOUNDATION:

This BYU Theme is a sub-theme of Zurb Foundation. Please download the current 
Zurb Foundation 7.x-4.x version. https://drupal.org/project/zurb-foundation

The base Zurb Foundation theme is designed to be easily extended by its 
sub-themes. You shouldn't modify any of the CSS or PHP files in the 
zurb_foundation/ folder; if you intend to modify this theme, you should make 
your changes inside the byu_theme theme.


## Styling Changes & Sub Theming:
### Advanced (Recommended)
A. IF you will be styling extensively or adding templates to the theme, you 
should use a sub theme. 

Inside this theme is a folder 'subtheme'.
1. Copy the subtheme folder outside of the byu_theme folder into 
   sites/all/themes.
2. Change the "subtheme.info.txt" file to be "subtheme.info".
3. Rename every instance of "subtheme" to the new name of your theme.
    i.e. the folder name, info file, and information inside the info file.

4. You can also further customize your theme by copying any template, js or scss
file from the parent theme (byu_theme) into this theme in it's appropriate 
place. 
    i.e. if you copy page.tpl.php from byu_theme/templates/page.tpl.php into 
    sites/all/themes/subtheme/templates/page.tpl.php then your changes made 
    there will be reflected. It will use this page template instead of the one 
    in byu_theme.

For more questions about sub theming, you can read the instructions online here:
https://www.drupal.org/docs/7/theming/creating-a-sub-theme

## Simple - (If you will not be changing the styling or js)
B. If you will be making minimal css changes, follow these instructions.

Do NOT make custom changes in byu_default.scss
If you do they will be overridden when you update the theme.

1. Create a custom.scss file in this scss directory.
2. Edit byu_theme.info and find the lines where scss/byu_default.scss is 
   included. You will see a commented out line that will tell the theme to look 
   for your custom.scss file.
3. Add your css
4. Clear your caches.

/* ---- It is good practice to have sections in your styling, like this:  --- */

/* ------- Front ------ */

/* -- front feature custom -- */

/* ------- Misc. ------ */

Under scss you will see custom.scss. At the end of that file is where you should
make your changes. NOTE: If you are using scss, as we recommend, you need to 
download and install the module SASSY to precompile your scss into css.
https://www.drupal.org/project/sassy

You will also need the PHPSass library:
Please download the PHPSass library from
https://github.com/richthegeek/phpsass/zipball/master and extract it into 
sites/all/libraries/phpsass

Javascript Changes:
Similarly, you should create a custom.js file under js. Or choose to subtheme.
You will also have to uncomment the line for declaring the js file in 
byu_theme.info



## Full-Width Option (rather than constrained-width content pages)
1. Make sure you have sub-themed the BYU theme
2. Create your custom.scss if you haven't already and add:
    main.row {
        max-width: 100%;
    }

## MENU FORMATTING

In the demo file about byu-menu, it mentions the options to add several classes 
to specific menu links, to improve the formatting.
http://2017-components-demo.cdn.byu.edu/byu-menu.html

It demonstrates adding the class 'long-link' to a link with extra long text.
This is the preferred method for adding classes to certain links:

1. Download and enable this module:
https://www.drupal.org/project/menu_attributes
2. Go to your menu, edit a link, and in the Menu Attributes section, specify the
class you'd like.


## Search Options
The search in the byu header can be disabled in the header settings.
You can also customize how it works. It is using the byu-search component. 

If you use the default core search module, it will work out of the box.

### Using Different Search Modules
You are able to use different search modules (i.e. Custom Search or Google 
Custom Search). If the search component gets confused finding your search/text 
input and your button/submit input, the theme has settings provided to tell it 
specifically which elements to target.

For example, if you use the Custom Search module, you will want to specify:
`input[data-drupal-selector="edit-keys"]` for the Search Box element
and 
`input[data-drupal-selector="edit-submit"]` for the Search Button element.
These fields take simple css selectors, so if your search module isn't working, 
make sure you are using a css selector that will not target multiple divs, and 
that will not change. (i.e. id's of these search elements often change once you 
start searching or reloading the page.)
