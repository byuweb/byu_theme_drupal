<?php

/**
 * Implements template_preprocess_html().
 *
 */
function byu2017_d7_preprocess_html(&$variables) {
    /* --- BYU Fonts -- You must choose ONE font package to include. ---- */
    if (trim(theme_get_setting('font_package')) == 'fonts-full'){
        // Full Font Package - Vitesse, Gotham, Sentinel, and several others.
        drupal_add_css('//cloud.typography.com/75214/6517752/css/fonts.css', array('type' => 'external'));
    } else if (trim(theme_get_setting('font_package')) == 'fonts-basic'){
        // This is the Light Font Package - Vitesse and Gotham only.
        drupal_add_css('//cloud.typography.com/75214/7683772/css/fonts.css', array('type' => 'external'));
    }
    // if Libre Baskerville is needed
    if (trim(theme_get_setting('p_font')) == 'p-libreb') {
        drupal_add_css('https://fonts.googleapis.com/css?family=Libre Baskerville', array('type' => 'external'));
    }

    // To include the components and their styling:
    $version = trim(theme_get_setting('version'));
    if(empty($version)==FALSE) {
        drupal_add_css('//cdn.byu.edu/byu-theme-components/' . $version . '/byu-theme-components.min.css', array('type' => 'external'));
        drupal_add_js('//cdn.byu.edu/byu-theme-components/' . $version . '/byu-theme-components.min.js', 'external');
    } else {
        drupal_add_css('//cdn.byu.edu/byu-theme-components/latest/byu-theme-components.min.css', array('type' => 'external'));
        drupal_add_js('//cdn.byu.edu/byu-theme-components/latest/byu-theme-components.min.js', 'external');
    }
    /* -- if you are developing and wish to try your branch, comment out the section above and enable these lines with your branch name: */
    // drupal_add_css('//cdn.byu.edu/byu-theme-components/experimental/your-branch-name/byu-theme-components.min.css', array('type' => 'external'));
    // drupal_add_js('//cdn.byu.edu/byu-theme-components/experimental/your-branch-name/byu-theme-components.min.js', 'external');


//  // Add conditional CSS for IE. To use uncomment below and add IE css file
//  drupal_add_css(path_to_theme() . '/css/ie.css', array('weight' => CSS_THEME, 'browsers' => array('!IE' => FALSE), 'preprocess' => FALSE));
//
//  // Need legacy support for IE downgrade to Foundation 2 or use JS file below
//  // drupal_add_js('http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE7.js', 'external');
    
    $font_package = theme_get_setting('font_package');
    if (!empty($font_package)){
        $variables['classes_array'][] = trim(theme_get_setting('font_package'));
    }
    $font_one = theme_get_setting('font_one');
    if (!empty($font_one)){
        $variables['classes_array'][] = trim(theme_get_setting('font_one'));
    }
    $font_two = theme_get_setting('font_two');
    if (!empty($font_two)){
        $variables['classes_array'][] = trim(theme_get_setting('font_two'));
    }
    $font_three = theme_get_setting('font_three');
    if (!empty($font_three)){
        $variables['classes_array'][] = trim(theme_get_setting('font_three'));
    }
    $font_four = theme_get_setting('font_four');
    if (!empty($font_four)){
        $variables['classes_array'][] = trim(theme_get_setting('font_four'));
    }
    $font_five = theme_get_setting('font_five');
    if (!empty($font_five)){
        $variables['classes_array'][] = trim(theme_get_setting('font_five'));
    }
    $p_font = theme_get_setting('p_font');
    if (!empty($p_font)){
        $variables['classes_array'][] = trim(theme_get_setting('p_font'));
    }
    $a_color = theme_get_setting('a_color');
    if (!empty($a_color)){
        $variables['classes_array'][] = trim(theme_get_setting('a_color'));
    } 
    $font_one_color = theme_get_setting('font_one_color');
    if (!empty($font_one_color)){
        $variables['classes_array'][] = trim(theme_get_setting('font_one_color'));
    }
    $font_two_color = theme_get_setting('font_two_color');
    if (!empty($font_two_color)){
        $variables['classes_array'][] = trim(theme_get_setting('font_two_color'));
    }
    $font_three_color = theme_get_setting('font_three_color');
    if (!empty($font_three_color)){
        $variables['classes_array'][] = trim(theme_get_setting('font_three_color'));
    }
    $font_four_color = theme_get_setting('font_four_color');
    if (!empty($font_four_color)){
        $variables['classes_array'][] = trim(theme_get_setting('font_four_color'));
    }
    $font_five_color = theme_get_setting('font_five_color');
    if (!empty($font_five_color)){
        $variables['classes_array'][] = trim(theme_get_setting('font_five_color'));
    }
    // Populate the body classes.
    if ($suggestions = theme_get_suggestions(arg(), 'page', '-')) {
        foreach ($suggestions as $suggestion) {
            if ($suggestion != 'page-front') {
                // Add current suggestion to page classes to make it possible to theme
                // the page depending on the current page type (e.g. node, admin, user,
                // etc.) as well as more specific data like node-12 or node-edit.
                $variables['classes_array'][] = drupal_html_class($suggestion);
            }
        }
    }

    // If on an individual node page, add the node type to body classes.
    if ($node = menu_get_object()) {
        $variables['classes_array'][] = drupal_html_class('node-type-' . $node->type);
    }

    if ($variables['user']) {
        foreach($variables['user']->roles as $key => $role){
            $role_class = 'role-' . drupal_clean_css_identifier($role);
            $variables['classes_array'][] = $role_class;
        }
    }





}

/**
 * Implements template_preprocess_page
 *
 */
function byu2017_d7_preprocess_page(&$variables) {

    // Header Settings
    if ($variables['header']['subtitle'] = theme_get_setting('sub_title_use')) {
        $subtitle_use = TRUE;
//        $subtitle = $variables['header']['subtitle']['subtitle_text']['value'];
        $subtitle = trim(theme_get_setting('subtitle_text'));
//        $subtitle = 'katria testing';
        $subtitle_classes = array();

        if (theme_get_setting('sub_title_above')) {
//            $subtitle_classes[] = 'above';
            $subtitle_above = TRUE;
        } else {
            $subtitle_above = FALSE;
        }

        if (theme_get_setting('sub_title_italic')) {
            $subtitle_classes[] = 'italic';
        }

        $variables['subtitle_classes'] = implode(' ', $subtitle_classes);
        $variables['subtitle_use'] = $subtitle_use;
        $variables['subtitle_above'] = $subtitle_above;
        $variables['subtitle'] = $subtitle;

    } else {
        $subtitle_use = FALSE;
        $variables['subtitle_use'] = $subtitle_use;
    }
    // User Info Settings
    if ($variables['header']['user_info'] = theme_get_setting('login_use')) {
        $login_use = TRUE;
        $login_url = trim(theme_get_setting('login_url'));
        if(empty($login_url)) {
            $login_url="../user";
        }
        $logout_url = trim(theme_get_setting('logout_url'));
        if(empty($logout_url)) {
            $logout_url="../user/logout";
        }
        $myaccount_url = trim(theme_get_setting('myaccount_url'));
        if (theme_get_setting('myaccount_use')) {
            $myaccount_use = TRUE;
            $myaccount_url = trim(theme_get_setting('myaccount_url'));
            if(empty($myaccount_url)) {
                $myaccount_url="../user";
            }

        } else {
            $myaccount_use = FALSE;
        }

        $variables['login_use'] = $login_use;
        $variables['myaccount_use'] = $myaccount_use;
        $variables['myaccount_url'] = $myaccount_url;
        $variables['login_url'] = $login_url;
        $variables['logout_url'] = $logout_url;



    } else {
        $login_use = FALSE;
        $variables['login_use'] = $login_use;
    }

    // Search Settings
    if ($variables['header']['search'] = theme_get_setting('search_use')) {
        $search_use = TRUE;
    } else {
        $search_use = FALSE;
    }
    $variables['search_use'] = $search_use;


    // Menu Settings


    if ($variables['header']['menu'] = theme_get_setting('menu_disable')) {
        // menu is disabled
        $menu_use = FALSE;
        $transparent = FALSE;
        $hero_vs_menu = 'menu_disable';
    } else {
        $menu_use = TRUE;
        if ($variables['header']['menu'] = theme_get_setting('transparent')) {
            $transparent = TRUE;
            if ($variables['header']['hero'] = theme_get_setting('hero_show_behind_menu') == '1') {
                $hero_vs_menu = 'hero_show_behind_menu';
            } else { // 0  - below menu
                $hero_vs_menu = 'hero_below_menu';
            }
        } else {
            $transparent = FALSE;
            $hero_vs_menu = 'hero_below_menu';
        }
    }
    $variables['menu_use'] = $menu_use;
    $variables['transparent'] = $transparent;
    $variables['hero_vs_menu'] = $hero_vs_menu;


    // Hero
    $hero_setting = theme_get_setting('hero_space_width');
    if($hero_setting == '0') {
        $variables['hero_space_width'] = 'full-width-hero';
    } else {
        $variables['hero_space_width'] = 'custom-width-hero';
    }
//    $variables['hero_space_width'] = $hero_space_width;

    if ($variables['header']['hero'] = theme_get_setting('hero_full_image_width')) {
        $hero_full_image_width = TRUE;
    } else {
        $hero_full_image_width = FALSE;
    }
    $variables['hero_full_image_width'] = $hero_full_image_width;


    // General Settings
    if ($variables['general_page'] = theme_get_setting('full_width')) {
        $full_width = TRUE;
    } else {
        $full_width = FALSE;
    }
    $variables['full_width'] = $full_width;
    $page_width = trim(theme_get_setting('custom_width'));
    $variables['page_width'] = $page_width;
    $min_page_height = trim(theme_get_setting('min_page_height'));
    $variables['min_page_height'] = $min_page_height;


    // Footer Settings

    if ($variables['footer']['sticky_footer'] = theme_get_setting('footer_sticky')) {
        $footer_sticky = TRUE;
    } else {
        $footer_sticky = FALSE;
    }
    $variables['footer_sticky'] = $footer_sticky;


    return $variables;
}


function byu2017_d7_form_search_block_form_alter(&$form, &$form_state, $form_id) {
    $placeholder_text = trim(theme_get_setting('placeholder_text'));
    $form['search_block_form']['#attributes']['placeholder'] = t($placeholder_text);
}


/**
 * Implements template_preprocess_node
 *
 */
//function STARTER_preprocess_node(&$variables) {
//}

/**
 * Implements hook_preprocess_block()
 */
//function STARTER_preprocess_block(&$variables) {
//  // Add wrapping div with global class to all block content sections.
//  $variables['content_attributes_array']['class'][] = 'block-content';
//
//  // Convenience variable for classes based on block ID
//  $block_id = $variables['block']->module . '-' . $variables['block']->delta;
//
//  // Add classes based on a specific block
//  switch ($block_id) {
//    // System Navigation block
//    case 'system-navigation':
//      // Custom class for entire block
//      $variables['classes_array'][] = 'system-nav';
//      // Custom class for block title
//      $variables['title_attributes_array']['class'][] = 'system-nav-title';
//      // Wrapping div with custom class for block content
//      $variables['content_attributes_array']['class'] = 'system-nav-content';
//      break;
//
//    // User Login block
//    case 'user-login':
//      // Hide title
//      $variables['title_attributes_array']['class'][] = 'element-invisible';
//      break;
//
//    // Example of adding Foundation classes
//    case 'block-foo': // Target the block ID
//      // Set grid column or mobile classes or anything else you want.
//      $variables['classes_array'][] = 'six columns';
//      break;
//  }
//
//  // Add template suggestions for blocks from specific modules.
//  switch($variables['elements']['#block']->module) {
//    case 'menu':
//      $variables['theme_hook_suggestions'][] = 'block__nav';
//    break;
//  }
//}

//function STARTER_preprocess_views_view(&$variables) {
//}

/**
 * Implements template_preprocess_panels_pane().
 *
 */
//function STARTER_preprocess_panels_pane(&$variables) {
//}

/**
 * Implements template_preprocess_views_views_fields().
 *
 */
//function STARTER_preprocess_views_view_fields(&$variables) {
//}

/**
 * Implements theme_form_element_label()
 * Use foundation tooltips
 */
//function STARTER_form_element_label($variables) {
//  if (!empty($variables['element']['#title'])) {
//    $variables['element']['#title'] = '<span class="secondary label">' . $variables['element']['#title'] . '</span>';
//  }
//  if (!empty($variables['element']['#description'])) {
//    $variables['element']['#description'] = ' <span data-tooltip="top" class="has-tip tip-top" data-width="250" title="' . $variables['element']['#description'] . '">' . t('More information?') . '</span>';
//  }
//  return theme_form_element_label($variables);
//}

/**
 * Implements hook_preprocess_button().
 */
//function STARTER_preprocess_button(&$variables) {
//  $variables['element']['#attributes']['class'][] = 'button';
//  if (isset($variables['element']['#parents'][0]) && $variables['element']['#parents'][0] == 'submit') {
//    $variables['element']['#attributes']['class'][] = 'secondary';
//  }
//}

/**
 * Implements hook_form_alter()
 * Example of using foundation sexy buttons
 */
//function STARTER_form_alter(&$form, &$form_state, $form_id) {
//  // Sexy submit buttons
//  if (!empty($form['actions']) && !empty($form['actions']['submit'])) {
//    $classes = (is_array($form['actions']['submit']['#attributes']['class']))
//      ? $form['actions']['submit']['#attributes']['class']
//      : array();
//    $classes = array_merge($classes, array('secondary', 'button', 'radius'));
//    $form['actions']['submit']['#attributes']['class'] = $classes;
//  }
//}

/**
 * Implements hook_form_FORM_ID_alter()
 * Example of using foundation sexy buttons on comment form
 */
//function STARTER_form_comment_form_alter(&$form, &$form_state) {
// Sexy preview buttons
//  $classes = (is_array($form['actions']['preview']['#attributes']['class']))
//    ? $form['actions']['preview']['#attributes']['class']
//    : array();
//  $classes = array_merge($classes, array('secondary', 'button', 'radius'));
//  $form['actions']['preview']['#attributes']['class'] = $classes;
//}


/**
 * Implements template_preprocess_panels_pane().
 */
// function zurb_foundation_preprocess_panels_pane(&$variables) {
// }

/**
 * Implements template_preprocess_views_views_fields().
 */
/* Delete me to enable
function THEMENAME_preprocess_views_view_fields(&$variables) {
 if ($variables['view']->name == 'nodequeue_1') {

   // Check if we have both an image and a summary
   if (isset($variables['fields']['field_image'])) {

     // If a combined field has been created, unset it and just show image
     if (isset($variables['fields']['nothing'])) {
       unset($variables['fields']['nothing']);
     }

   } elseif (isset($variables['fields']['title'])) {
     unset ($variables['fields']['title']);
   }

   // Always unset the separate summary if set
   if (isset($variables['fields']['field_summary'])) {
     unset($variables['fields']['field_summary']);
   }
 }
}

// */

/**
 * Implements hook_css_alter().
 */
//function STARTER_css_alter(&$css) {
//  // Always remove base theme CSS.
//  $theme_path = drupal_get_path('theme', 'zurb_foundation');
//
//  foreach($css as $path => $values) {
//    if(strpos($path, $theme_path) === 0) {
//      unset($css[$path]);
//    }
//  }
//}

/**
 * Implements hook_js_alter().
 */
//function STARTER_js_alter(&$js) {
//  // Always remove base theme JS.
//  $theme_path = drupal_get_path('theme', 'zurb_foundation');
//
//  foreach($js as $path => $values) {
//    if(strpos($path, $theme_path) === 0) {
//      unset($js[$path]);
//    }
//  }
//}
