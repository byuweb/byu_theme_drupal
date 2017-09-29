# subtheme
Drupal 8 Theme using Bootstrap &amp; Components
This is a sub theme of byu_d8. 


THIS IS NOT A FINAL RELEASE. THIS THEME IS STILL IN BETA MODE.

 Contact Katria Lesser on slack if you have questions about when this will be fully available. We are working out licensing issues and some bug fixes.

## Prior to Installation
Make sure that you have installed the byu_d8 theme properly and followed all instructions.

## INSTALLATION
1. Copy this subtheme directory to your themes/ folder. It should be NEXT to byu_d8 now. If you hit back and try to enable it again, it usually works with another try.
2. Rename this directory to be the MACHINE NAME of your theme. It should contain only lowercase letters and underscores.
3. Rename all files in your folder to yourthemename.extension, i.e. my_new_subtheme.libraries.yml 
4. Replace 'subtheme' everywhere it is in those files.
5. Read the documentation online about how these files work:
Note: Do not change anything inside the byu_d8/subtheme folder. Leave it there.

## Customization
1. Read this page about adding javascript and css to your theme. It will teach you how to use the subtheme.libraries.yml file.
https://www.drupal.org/docs/8/theming-drupal-8/adding-stylesheets-css-and-javascript-js-to-a-drupal-8-theme

2. Also note that you still have all of the options made available through byu_d8, the parent theme.
3. Go to Appearance > Settings > BYU_D8. You will see settings similar to the byu2017_d7 theme.

These sections each have several options.
BYU FONTS
BYU HEADER
BYU GENERAL PAGE
BYU FOOTER

## Requesting Features and Options
If you would like to request other settings or options, please contact Katria Lesser or post in the #drupal-users group on the BYUWeb slack team.
Enhancement requests and settings for the theme should be posted in the #Drupal-users channel. 
Or in github:https://github.com/byuweb/byu_d8/issues
Enhancement requests for the header and footer specifically should be posted in the #engineering-group channel.
Or in github: https://github.com/byuweb/byu-theme-components/issues

### Reporting Bugs & Issues
If there are bugs with your subtheme, you are responsible for those. If you think the bug exists in the parent theme
(meaning it is there even if you disable the sub theme and you think it is a theme-related bug, see below: )
For the Drupal 8 theme: https://github.com/byuweb/byu_d8/issues
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
