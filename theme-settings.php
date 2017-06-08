<?php
/**
 * Implements hook_form_FORM_ID_alter().
 *
 * @param $form
 *   The form.
 * @param $form_state
 *   The form state.
 */
function byu2017_d7_form_system_theme_settings_alter(&$form, &$form_state) {

    unset($form['theme_settings']);
    unset($form['logo']);
    $form['zurb_foundation']['general']['logo'] = FALSE;
    $form['zurb_foundation']['topbar'] = FALSE;


    $form['zurb_foundation']['general']['byu_settings'] = array(
        '#type' => 'fieldset',
        '#title' => t('BYU Theme Settings'),
    );
    $form['zurb_foundation']['general']['byu_settings']['byu_info'] = array(
        '#markup' => 'BYU Theme Settings: See the BYU tabs for specific settings.',
    );

// Fonts
    $form['zurb_foundation']['fonts'] = array(
        '#type' => 'fieldset',
        '#title' => t('BYU Fonts & Colors'),
    );
    $form['zurb_foundation']['fonts']['font_package'] = array(
        '#type' => 'select',
        '#title' => t('Which font package do you want to load?'),
        '#description' => t('If you select Sentinel below, then you need to use the FULL font package.'),
        '#options' => array(
            'fonts-basic' => t('Basic: Vitesse & Gotham'),
            'fonts-full' => t('Full: Vitesse, Gotham, Sentinel & a few others'),
        ),
        '#default_value' => theme_get_setting('font_package'),
    );
    $form['zurb_foundation']['fonts']['font_one'] = array(
        '#type' => 'select',
        '#title' => t('H1 Font'),
        '#options' => array(
            'h1-vitesse' => t('Vitesse'),
            'h1-gotham' => t('Gotham'),
            'h1-sentinel' => t('Sentinel'),
        ),
        '#default_value' => theme_get_setting('font_one'),
    );
    $form['zurb_foundation']['fonts']['font_one_color'] = array(
        '#type' => 'select',
        '#title' => t('H1 Color'),
        '#options' => array(
            'h1-navy' => t('Navy'),
            'h1-gray' => t('Gray'),
            'h1-black' => t('Black'),
        ),
        '#default_value' => theme_get_setting('font_one_color'),
    );
    $form['zurb_foundation']['fonts']['font_two'] = array(
        '#type' => 'select',
        '#title' => t('H2 Font'),
        '#options' => array(
            'h2-vitesse' => t('Vitesse'),
            'h2-gotham' => t('Gotham'),
            'h2-sentinel' => t('Sentinel'),
        ),
        '#default_value' => theme_get_setting('font_two'),
    );
    $form['zurb_foundation']['fonts']['font_two_color'] = array(
        '#type' => 'select',
        '#title' => t('H2 Color'),
        '#options' => array(
            'h2-navy' => t('Navy'),
            'h2-gray' => t('Gray'),
            'h2-black' => t('Black'),
        ),
        '#default_value' => theme_get_setting('font_two_color'),
    );
    $form['zurb_foundation']['fonts']['font_three'] = array(
        '#type' => 'select',
        '#title' => t('H3 Font'),
        '#options' => array(
            'h3-vitesse' => t('Vitesse'),
            'h3-gotham' => t('Gotham'),
            'h3-sentinel' => t('Sentinel'),
        ),
        '#default_value' => theme_get_setting('font_three'),
    );
    $form['zurb_foundation']['fonts']['font_three_color'] = array(
        '#type' => 'select',
        '#title' => t('H3 Color'),
        '#options' => array(
            'h3-navy' => t('Navy'),
            'h3-gray' => t('Gray'),
            'h3-black' => t('Black'),
        ),
        '#default_value' => theme_get_setting('font_three_color'),
    );

    $form['zurb_foundation']['fonts']['font_four'] = array(
        '#type' => 'select',
        '#title' => t('H4 Font'),
        '#options' => array(
            'h4-vitesse' => t('Vitesse'),
            'h4-gotham' => t('Gotham'),
            'h4-sentinel' => t('Sentinel'),
        ),
        '#default_value' => theme_get_setting('font_four'),
    );
    $form['zurb_foundation']['fonts']['font_four_color'] = array(
        '#type' => 'select',
        '#title' => t('H4 Color'),
        '#options' => array(
            'h4-navy' => t('Navy'),
            'h4-gray' => t('Gray'),
            'h4-black' => t('Black'),
        ),
        '#default_value' => theme_get_setting('font_four_color'),
    );
    $form['zurb_foundation']['fonts']['font_five'] = array(
        '#type' => 'select',
        '#title' => t('H5 Font'),
        '#options' => array(
            'h5-vitesse' => t('Vitesse'),
            'h5-gotham' => t('Gotham'),
            'h5-sentinel' => t('Sentinel'),
        ),
        '#default_value' => theme_get_setting('font_five'),
    );
    $form['zurb_foundation']['fonts']['font_five_color'] = array(
        '#type' => 'select',
        '#title' => t('H5 Color'),
        '#options' => array(
            'h5-navy' => t('Navy'),
            'h5-gray' => t('Gray'),
            'h5-black' => t('Black'),
        ),
        '#default_value' => theme_get_setting('font_five_color'),
    );
    $form['zurb_foundation']['fonts']['p_font'] = array(
        '#type' => 'select',
        '#title' => t('Paragraph Font'),
        '#options' => array(
            'p-default' => t('Default'),
            'p-gotham' => t('Gotham (san serif)'),
            'p-libreb' => t('Libre Baskerville (serif)'),
        ),
        '#default_value' => theme_get_setting('p_font'),
    );
    $form['zurb_foundation']['fonts']['a_color'] = array(
        '#type' => 'select',
        '#title' => t('Link Color'),
        '#options' => array(
            'a-royal' => t('Royal'),
            'a-navy' => t('Navy'),
        ),
        '#default_value' => theme_get_setting('a_color'),
    );


    // Header
    $form['zurb_foundation']['header'] = array(
        '#type' => 'fieldset',
        '#title' => t('BYU Header Settings'),
    );
    $jsonurl = "https://cdn.byu.edu/manifest.json";
    $json = file_get_contents($jsonurl);
    $json_ob = json_decode($json);
    $components = '2017-core-components';
    $aliases = $json_ob->libraries->$components->aliases;

    $array = get_object_vars($aliases);
    $labels = array_keys($array);

    $new = 'latest';
//appending $new in our array
    array_unshift($labels, $new);
//now make it unique.
    $options = array_unique($labels);

    $all_versions = $json_ob->libraries->$components->versions;

    foreach ($all_versions as $version) {
        if (!property_exists($version, 'experimental')){
//        echo $version->name . ", ";
            $options[] = $version->name;
        }
    }
    $option_labels = [];

    foreach ($options as $label) {
        // modify labels
        if($label == 'latest') {
            $label .= '  (default option)';

        } else if (strpos($label, 'x.x') !== false) {
            // subscribe to all changes until it's a major change
            $label .= '  (subscribe to all minor changes)';

        } else if (strpos($label, '.x') !== false) {
            // subscribe to all changes until it's a major change
            $label .= '  (bug fixes only)';
        } else if (strpos($label, 'unstable') !== false) {
            // subscribe to all changes until it's a major change
            $label = 'master branch';

        } else {
            // do nothing, normal specific version
            $label .= '  (no automatic updates)';
        }
        $option_labels[] = $label;
    }

    $option_list = array_combine($options, $option_labels);
    $form['zurb_foundation']['header']['version']= array(
        '#type' => 'select',
        '#title' => t('What components version do you want to use?'),
        '#description' => t('The CDN provides many options. \'Latest\' is the default option.'),
        '#options' => $option_list,
        '#default_value' => theme_get_setting('version'),
    );


    $form['zurb_foundation']['header']['subtitle'] = array(
        '#type' => 'fieldset',
        '#title' => 'Subtitle Settings',
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );
    $form['zurb_foundation']['header']['subtitle']['sub_title_use'] = array(
        '#type'          => 'checkbox',
        '#title'         => t('Use Subtitle'),
        '#default_value' => theme_get_setting('sub_title_use'),
        '#description'   => t("Add Sub Title to the site header."),
    );
    $form['zurb_foundation']['header']['subtitle']['sub_title_above'] = array(
        '#type'          => 'checkbox',
        '#title'         => t('Subtitle Above'),
        '#default_value' => theme_get_setting('sub_title_above'),
        '#description'   => t("Place the subtitle above the Main Title."),
    );
    $form['zurb_foundation']['header']['subtitle']['sub_title_italic'] = array(
        '#type'          => 'checkbox',
        '#title'         => t('Subtitle Italic'),
        '#default_value' => theme_get_setting('sub_title_italic'),
        '#description'   => t("Italicize the subtitle."),
    );
    $form['zurb_foundation']['header']['subtitle']['subtitle_text'] = array(
        '#type'          => 'textfield',
        '#title'         => t('Site Subtitle'),
        '#default_value' => theme_get_setting('subtitle_text'),
        '#description'   => t("The subtitle appears below (or above) the Main Title."),
    );


    $form['zurb_foundation']['header']['user_info'] = array(
        '#type' => 'fieldset',
        '#title' => 'User Information & SIgn In Settings',
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );
    $form['zurb_foundation']['header']['user_info']['login_use'] = array(
        '#type'          => 'checkbox',
        '#title'         => t('Display Sign In/Out block'),
        '#default_value' => theme_get_setting('login_use'),
        '#description'   => t("Choose to display a Sign In link."),
    );

    $form['zurb_foundation']['header']['user_info']['login_url'] = array(
        '#type'          => 'textfield',
        '#title'         => t('Login Url'),
        '#default_value' => theme_get_setting('login_url'),
        '#description'   => t("The subtitle appears below (or above) the Main Title. Default value if blank is '../user'. If you are using the CAS module, use '../cas'."),
    );
    $form['zurb_foundation']['header']['user_info']['logout_url'] = array(
        '#type'          => 'textfield',
        '#title'         => t('Logout Url'),
        '#default_value' => theme_get_setting('logout_url'),
        '#description'   => t("The subtitle appears below (or above) the Main Title.  Default value if blank is '../user/logout'. If you are using the CAS module, use '../caslogout'."),
    );
    $form['zurb_foundation']['header']['user_info']['myaccount_use'] = array(
        '#type'          => 'checkbox',
        '#title'         => t('My Account'),
        '#default_value' => theme_get_setting('myaccount_use'),
        '#description'   => t("Link the username / name display to a user account page."),
    );
    $form['zurb_foundation']['header']['user_info']['myaccount_url'] = array(
        '#type'          => 'textfield',
        '#title'         => t('My Account Url'),
        '#default_value' => theme_get_setting('myaccount_url'),
//        '#default_value' => variable_get('myaccount_url', '../user/'),
//        '#default_value' => '../user',
        '#description'   => t("Provide the relative url for my account. Default value if blank is '../user'."),
    );


// Search Settings

    $form['zurb_foundation']['header']['search'] = array(
        '#type' => 'fieldset',
        '#title' => 'Search Settings',
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );
    $form['zurb_foundation']['header']['search']['search_use'] = array(
        '#type'          => 'checkbox',
        '#title'         => t('Display a Search bar in the header'),
        '#default_value' => theme_get_setting('search_use'),
//        '#description'   => t("Choose to display a Sign In link."),
    );
    $form['zurb_foundation']['header']['search']['placeholder_text'] = array(
        '#type'          => 'textfield',
        '#title'         => t('Search Placeholder'),
        '#default_value' => theme_get_setting('placeholder_text'),
        '#description'   => t("This text displays as a placeholder inside the default Drupal search form."),
    );
//    $form['zurb_foundation']['header']['user_info']['logout_url'] = array(
//        '#type'          => 'textfield',
//        '#title'         => t('Custom Search Url'),
//        '#default_value' => theme_get_setting('logout_url'),
//        '#description'   => t("The subtitle appears below (or above) the Main Title.  Default value if blank is '../user/logout'. If you are using CAS, use '../caslogout'."),
//    );

//Header Actions Settings
    $form['zurb_foundation']['header']['header_actions'] = array(
        '#type' => 'fieldset',
        '#title' => t('Action Links'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );
    $form['zurb_foundation']['header']['header_actions']['actions_info'] = array(
        '#markup' => '<p>Action Links are very short links for a unique user action. For instance, this could be an "Apply" link or "Cart".
There should only ever be 2 one-word links or one 2-word link, as this space is minimal. To place these links, go to
the <a href="../admin/structure/block" target="_blank">blocks page</a> and place a block into the Header Actions region.</p><p>Action links
are placed at the bottom of the menu in mobile views. Please make sure your content fits at various breakpoints.</p>',
    );

//Menu Settings
    $form['zurb_foundation']['header']['menu'] = array(
        '#type' => 'fieldset',
        '#title' => t('Menu Settings'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );
    $form['zurb_foundation']['header']['menu']['menu_disable'] = array(
        '#type'          => 'checkbox',
        '#title'         => t('Disable the menu.'),
        '#default_value' => theme_get_setting('menu_disable'),
//        '#description'   => t("This allows part of the hero to show through behind the menu."),
    );
    $form['zurb_foundation']['header']['menu']['transparent'] = array(
        '#type'          => 'checkbox',
        '#title'         => t('Make menu background transparent'),
        '#default_value' => theme_get_setting('transparent'),
        '#description'   => t("This allows part of the hero to show through behind the menu."),
    );

// Hero
    $form['zurb_foundation']['header']['hero'] = array(
        '#type' => 'fieldset',
        '#title' => t('Hero Settings'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );
    $form['zurb_foundation']['header']['hero']['hero_show_behind_menu'] = array(
        '#type' => 'select',
        '#title' => t('How do you want the Hero space & Menu to be?'),
        '#description' => t('If enabled, the site name and main menu will appear in a bar along the top of the page. You will want to make sure that the menu background is set to transparent.'),
        '#options' => array(
            0 => t("Show normally below the menu, not behind the menu (constrained OR full)"),
            1 => t('Show Full Width Hero behind menu'),
            2 => t('Not Using Full Width Hero - Show constrained width hero behind the menu.'),
        ),
        '#default_value' => theme_get_setting('hero_show_behind_menu'),
    );
    $form['zurb_foundation']['header']['hero']['hero_full_image_width'] = array(
        '#type'          => 'checkbox',
        '#title'         => t('Full width Header: Make images stretch full width'),
        '#default_value' => theme_get_setting('hero_full_image_width'),
        '#description'   => t("If you are using full width region..."),
    );
    $form['zurb_foundation']['header']['hero']['hero_constrained_image_width'] = array(
        '#type'          => 'checkbox',
        '#title'         => t('Constrained width: Make images stretch to container width'),
        '#default_value' => theme_get_setting('hero_constrained_image_width'),
        '#description'   => t("If you are using constrained hero region..."),
    );
//
//    $form['zurb_foundation']['header']['menu']['full_hero_behind_menu'] = array(
//        '#type'          => 'checkbox',
//        '#title'         => t('Have full width hero image/video show behind transparent menu'),
//        '#default_value' => theme_get_setting('full_hero_behind_menu'),
//        '#description'   => t("This allows part of the full width hero to show through behind the menu."),
//    );
//    $form['zurb_foundation']['header']['menu']['hero_behind_menu'] = array(
//        '#type'          => 'checkbox',
//        '#title'         => t('Have hero image/video show behind transparent menu'),
//        '#default_value' => theme_get_setting('hero_behind_menu'),
//        '#description'   => t("This allows part of the hero to show through behind the menu."),
//    );


//Page Settings
    $form['zurb_foundation']['general_page'] = array(
        '#type' => 'fieldset',
        '#title' => t('BYU General Settings'),
        '#collapsible' => TRUE,
    );
    $form['zurb_foundation']['general_page']['full_width'] = array(
        '#type'          => 'checkbox',
        '#title'         => t('Full Width instead of Constrained Width'),
        '#default_value' => theme_get_setting('full_width'),
        '#description'   => t("Choose to have all pages extend full width. This applies to BYU Header, page content, and BYU Footer."),
    );
    $form['zurb_foundation']['general_page']['custom_width'] = array(
        '#type'          => 'textfield',
        '#title'         => t('Custom Page Width'),
        '#default_value' => theme_get_setting('custom_width'),
        '#description'   => t("Enter the number of pixels you would like. i.e. '1200' fof 1200px. Defaults to 1000px."),
    );
    $form['zurb_foundation']['general_page']['min_page_height'] = array(
        '#type'          => 'textfield',
        '#title'         => t('Minimum page Height'),
        '#default_value' => theme_get_setting('min_page_height'),
        '#description'   => t("Specify '500' if you want to set a min-height of 500px on your page content area. This is for pages with very minimal content, where you don't want the
        footer to come up too high. Use this if you'd rather have white space on extremely short-content pages."),
    );

//Footer Settings
    $form['zurb_foundation']['footer'] = array(
        '#type' => 'fieldset',
        '#title' => t('BYU Footer Settings'),
        '#collapsible' => TRUE,
    );
    $form['zurb_foundation']['footer']['footer_regions'] = array(
        '#markup' => '<p>To place content in the footer, go to the <a href="../admin/structure/block" target="_blank">blocks page</a> and place blocks into one of the footer regions. Footer 1, Footer 2, Footer 3, and Footer 4 correspond to the 4 footer columns.</p><p>The header for the footer column will be the block title of the first block in the region.</p>',
    );


}
