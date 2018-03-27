# DEPRECATED BYU Drupal 8 Theme

## DEPRECATED
**This theme has been replaced by the [BYU Theme](https://drupal.org/projects/byu_theme) on Drupal.org and this repository will be deleted on 08/13/2018** Follow these instructions to upgrade to the new theme.

1.	Download byu_theme and bootstrap from Drupal.org. If using composer, you’ll only need to download byu_theme (it will automatically download bootstrap as a dependency).
2.	Make note of your current theme settings. It could be by saving the byu_d8.settings config file, screenshot of the UI, or any other way you’d like.
3.	Install and set as default byu_theme.
4.	If using a subtheme: change the base theme of your subtheme to byu_theme.
5.	Edit the byu_theme settings to your liking. If it is a subtheme, you settings should not have been affected.
6.	Clear caches. Minor changes and bug fixes have been applied to the theme during this migration and the base theme has been changed, so check to be sure everything still displays correctly and make necessary fixes.
7.	Uninstall and remove the old byu_d8 theme and porto. 


## INSTALLATION
1. Git clone (or download) and Enable the porto, locatat: https://github.com/byuweb/porto
  Current bug: sometimes when you try to enable, it will say `The website encountered an unexpected error.` If you hit back and try to enable it again, it usually works with another try.
2. Git clone (or download) the byu_d8 theme, and enable it. 
  Current bug: sometimes when you try to enable, it will say `The website encountered an unexpected error.` If you hit back and try to enable it again, it usually works with another try.

3. There is a strong dependency for the BYU footer: Download the module Block Class https://www.drupal.org/project/block_class
And enable it. (You will need to add the class `byu-footer` to each block inside the BYU Footer.)

4. Go to Appearance > Settings > BYU_D8. You will see settings similar to the byu2017_d7 theme.

These sections each have several options.
BYU FONTS
BYU HEADER
BYU GENERAL PAGE
BYU FOOTER

## BYU Footer
As mentioned above, due to Twig limitations, the block can't identify if it is inside byu-footer and know to work well with components. Because of this, we need the block class module to allow us to quickly bridge that gap.

Therefore, there is a strong dependency for the BYU footer: 
1. Download the module Block Class from https://www.drupal.org/project/block_class (or use composer) and enable it. 
2. Configure each block(s) that is in the byu footer. You will see a class textfield option. Add the class `byu-footer` to each block inside the BYU Footer.

## Requesting Features and Options
If you would like to request other settings or options, please contact Katria Lesser or post in the #drupal-users group on the BYUWeb slack team.
Enhancement requests and settings for the theme should be posted in the #Drupal-users channel. 
Or in github:https://github.com/byuweb/byu_d8/issues
Enhancement requests for the header and footer specifically should be posted in the #engineering-group channel.
Or in github: https://github.com/byuweb/byu-theme-components/issues

### Reporting Bugs & Issues

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
