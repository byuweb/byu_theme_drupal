<?php

/**
 * @file
 */

/**
 * Implements template_preprocess_html().
 */
function byu_theme_preprocess_html(&$variables) {
  /* --- BYU Fonts ---- */
  drupal_add_css('https://cdn.byu.edu/theme-fonts/1.x.x/ringside/fonts.css', array('type' => 'external'));
  $librebaskerville_use = trim(theme_get_setting('librebaskerville_use'));
  if ($librebaskerville_use == TRUE) {
    drupal_add_css('https://fonts.googleapis.com/css?family=Libre+Baskerville', array('type' => 'external'));
  }
  $sourcesans_use = trim(theme_get_setting('sourcesans_use'));
  if ($sourcesans_use == TRUE) {
    drupal_add_css('https://fonts.googleapis.com/css?family=Source+Sans+Pro', array('type' => 'external'));
  }

  // To include the components and their styling:
  drupal_add_css(path_to_theme() . '/css/byu_default.css');
  $version = trim(theme_get_setting('version'));
  if (empty($version) == FALSE) {
    drupal_add_css('//cdn.byu.edu/byu-theme-components/' . $version . '/byu-theme-components.min.css', array('type' => 'external'));
    drupal_add_js('//cdn.byu.edu/byu-theme-components/' . $version . '/byu-theme-components.min.js', 'external');
  }
  else {
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
  // we need an intro class to initialize the array so the next pushes/additions go through correctly - don't remove!
  $variables['classes_array'][] = 'body';

  $font_package = theme_get_setting('font_package');
  if (!empty($font_package)) {
    $variables['classes_array'][] = trim(theme_get_setting('font_package'));
  }
  $font_one = theme_get_setting('font_one');
  if (!empty($font_one)) {
    $variables['classes_array'][] = "h1-" . theme_get_setting('font_one');
  }
  $font_two = theme_get_setting('font_two');
  if (!empty($font_two)) {
    $variables['classes_array'][] = "h2-" . theme_get_setting('font_two');
  }
  $font_three = theme_get_setting('font_three');
  if (!empty($font_three)) {
    $variables['classes_array'][] = "h3-" . theme_get_setting('font_three');
  }
  $font_four = theme_get_setting('font_four');
  if (!empty($font_four)) {
    $variables['classes_array'][] = "h4-" . theme_get_setting('font_four');
  }
  $font_five = theme_get_setting('font_five');
  if (!empty($font_five)) {
    $variables['classes_array'][] = "h5-" . theme_get_setting('font_five');
  }
  $p_font = theme_get_setting('p_font');
  if (!empty($p_font)) {
    $variables['classes_array'][] = "p-" . theme_get_setting('p_font');
  }
  $a_color = theme_get_setting('a_color');
  if (!empty($a_color)) {
    $variables['classes_array'][] = trim(theme_get_setting('a_color'));
  }
  $font_one_color = theme_get_setting('font_one_color');
  if (!empty($font_one_color)) {
    $variables['classes_array'][] = trim(theme_get_setting('font_one_color'));
  }
  $font_two_color = theme_get_setting('font_two_color');
  if (!empty($font_two_color)) {
    $variables['classes_array'][] = trim(theme_get_setting('font_two_color'));
  }
  $font_three_color = theme_get_setting('font_three_color');
  if (!empty($font_three_color)) {
    $variables['classes_array'][] = trim(theme_get_setting('font_three_color'));
  }
  $font_four_color = theme_get_setting('font_four_color');
  if (!empty($font_four_color)) {
    $variables['classes_array'][] = trim(theme_get_setting('font_four_color'));
  }
  $font_five_color = theme_get_setting('font_five_color');
  if (!empty($font_five_color)) {
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
    foreach ($variables['user']->roles as $role) {
      $role_class = 'role-' . drupal_clean_css_identifier($role);
      $variables['classes_array'][] = $role_class;
    }
  }

}

/**
 * Implements template_preprocess_page.
 */
function byu_theme_preprocess_page(&$variables) {

  /* --- Check for dependencies --- */
  $themes = list_themes();
  if (!isset($themes['zurb_foundation'])) {
    drupal_get_messages();
    drupal_set_message(t(drupal_set_message('Missing the required base theme: ZURB Foundation.', 'warning')));
  }
  if(!module_exists('sassy_foundation')) {
    drupal_set_message(t('BYU Theme requires that module <em>sassy</em> and <em>sassy_foundation</em> are installed.'), 'warning');
  }
  if(!module_exists('jquery_update')) {
    drupal_set_message(t('BYU Theme requires that module <em>jquery_update</em> is installed.'), 'warning');
  }
  if(!file_exists('sites/all/libraries/phpsass')) {
    drupal_set_message(t('BYU Theme requires that library <em>PHP Sass</em> is installed.'), 'warning');
  }

  /*--------- Header Settings ---------*/

  // Home URL Settings.
  if ($variables['header'] = theme_get_setting('home_url')) {
    $home_url = TRUE;
    $home_link = trim(theme_get_setting('home_url'));
    $variables['home_url'] = $home_url;
    $variables['home_link'] = $home_link;
  }
  else {
    $home_url = FALSE;
    $variables['home_url'] = $home_url;
  }

  // Subtitle Settings.
  if ($variables['subtitle'] = theme_get_setting('sub_title_use')) {
    $subtitle_use = TRUE;
    // $subtitle = $variables['header']['subtitle']['subtitle_text']['value'];.
    $subtitle = trim(theme_get_setting('subtitle_text'));
    // $subtitle = 'katria testing';.
    $subtitle_classes = array();

    if (theme_get_setting('sub_title_above')) {
      // $subtitle_classes[] = 'above';.
      $subtitle_above = TRUE;
    }
    else {
      $subtitle_above = FALSE;
    }

    if (theme_get_setting('sub_title_italic')) {
      $subtitle_classes[] = 'italic';
    }

    $variables['subtitle_classes'] = implode(' ', $subtitle_classes);
    $variables['subtitle_use'] = $subtitle_use;
    $variables['subtitle_above'] = $subtitle_above;
    $variables['subtitle'] = $subtitle;

  }
  else {
    $subtitle_use = FALSE;
    $variables['subtitle_use'] = $subtitle_use;
  }
  // User Info Settings.
  if ($variables['user_info'] = theme_get_setting('login_use')) {
    $login_use = TRUE;
    $login_url = trim(theme_get_setting('login_url'));
    if (empty($login_url)) {
      $login_url = "../user";
    }
    $logout_url = trim(theme_get_setting('logout_url'));
    if (empty($logout_url)) {
      $logout_url = "../user/logout";
    }
    $myaccount_url = trim(theme_get_setting('myaccount_url'));
    if (theme_get_setting('myaccount_use')) {
      $myaccount_use = TRUE;
      $myaccount_url = trim(theme_get_setting('myaccount_url'));
      if (empty($myaccount_url)) {
        $myaccount_url = "../user";
      }

    }
    else {
      $myaccount_use = FALSE;
    }

    $variables['login_use'] = $login_use;
    $variables['myaccount_use'] = $myaccount_use;
    $variables['myaccount_url'] = $myaccount_url;
    $variables['login_url'] = $login_url;
    $variables['logout_url'] = $logout_url;

  }
  else {
    $login_use = FALSE;
    $variables['login_use'] = $login_use;
  }

  // Search Settings.
  if ($variables['search'] = theme_get_setting('search_use')) {
    $search_use = TRUE;
  }
  else {
    $search_use = FALSE;
  }
  $variables['search_use'] = $search_use;

  /* Menu Settings */

  if ($variables['menu'] = theme_get_setting('menu_disable')) {
    // Menu is disabled.
    $menu_use = FALSE;
    $transparent = FALSE;
    $hero_vs_menu = 'menu_disable';
  }
  else {
    $menu_use = TRUE;
    if ($variables['menu'] = theme_get_setting('transparent')) {
      $transparent = TRUE;
      if ($variables['hero'] = theme_get_setting('hero_show_behind_menu') == '1') {
        $hero_vs_menu = 'hero_show_behind_menu';
        // 0  - below menu.
      }
      else {
        $hero_vs_menu = 'hero_below_menu';
      }
    }
    else {
      $transparent = FALSE;
      $hero_vs_menu = 'hero_below_menu';
    }
  }
  $variables['menu_use'] = $menu_use;
  $variables['transparent'] = $transparent;
  $variables['hero_vs_menu'] = $hero_vs_menu;

  // Hero.
  $hero_setting = theme_get_setting('hero_space_width');
  if ($hero_setting == '0') {
    $variables['hero_space_width'] = 'full-width-hero';
  }
  else {
    $variables['hero_space_width'] = 'custom-width-hero';
  }
  // $variables['hero_space_width'] = $hero_space_width;.
  if ($variables['hero'] = theme_get_setting('hero_full_image_width')) {
    $hero_full_image_width = TRUE;
  }
  else {
    $hero_full_image_width = FALSE;
  }
  $variables['hero_full_image_width'] = $hero_full_image_width;

  // General Settings.
  if ($variables['general_page'] = theme_get_setting('full_width')) {
    $full_width = TRUE;
  }
  else {
    $full_width = FALSE;
  }
  $variables['full_width'] = $full_width;
  $page_width = trim(theme_get_setting('custom_width'));
  $variables['page_width'] = $page_width;
  $min_page_height = trim(theme_get_setting('min_page_height'));
  $variables['min_page_height'] = $min_page_height;

  // Footer Settings.
  if ($variables['footer']['sticky_footer'] = theme_get_setting('footer_sticky')) {
    $footer_sticky = TRUE;
  }
  else {
    $footer_sticky = FALSE;
  }
  $variables['footer_sticky'] = $footer_sticky;

  return $variables;
}

/**
 *
 */
function byu_theme_form_search_block_form_alter(&$form, &$form_state, $form_id) {
  $placeholder_text = trim(theme_get_setting('placeholder_text'));
  $form['search_block_form']['#attributes']['placeholder'] = t($placeholder_text);
}

/**
 * Implements hook_html_head_alter().
 */
function byu_theme_html_head_alter(&$head_elements) {
  // HTML5 charset declaration.
  $head_elements['system_meta_content_type']['#attributes'] = array(
    'charset' => 'utf-8',
  );

  // Optimize mobile viewport.
  $head_elements['mobile_viewport'] = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'name' => 'viewport',
      'content' => 'width=device-width, initial-scale=1',
    ),
  );

  // Remove image toolbar in IE.
  $head_elements['ie_image_toolbar'] = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'http-equiv' => 'ImageToolbar',
      'content' => 'false',
    ),
  );
}
