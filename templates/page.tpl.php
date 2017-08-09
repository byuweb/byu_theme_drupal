<!--.page -->
<div role="document" class="page <?php if ($footer_sticky == TRUE){print 'sticky-footer';}?>">
  <byu-header <?php if ($full_width == TRUE){ print 'full-width'; } ?>>
    <!--    <span slot="title">-->
    <?php if ($site_name): ?>

      <?php if ($subtitle_use == TRUE): ?>
        <?php if ($subtitle_above == TRUE): ?>
          <div slot="site-title" class="subtitle <?php print $subtitle_classes; ?>"><?php print $subtitle; ?></div>
        <?php endif; ?>
      <?php endif; ?>

      <a slot="site-title" id="site-name" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name; ?></a>

      <?php if ($subtitle_use == TRUE): ?>
        <?php if ($subtitle_above !== TRUE): ?>
          <div slot="site-title" class="subtitle <?php print $subtitle_classes; ?>"><?php print $subtitle; ?></div>
        <?php endif; ?>
      <?php endif; ?>


      <!--         --><?php //endif; ?>
    <?php endif; ?>

    <!-- header actions -->
    <?php if (!empty($page['header_actions'])): ?>
      <?php
      // get array of blocks
      $blocks = $page['header_actions'];
      $i = 0;
      $len = count($blocks);
      foreach($blocks as $block) {
        if($i == 0){
          // if we need to do anything differently for the first one
        } else if ($i == $len - 1) {
          // is the last, skip
          break;
        }
        if(is_array($block)) {
          if ($block['#markup'] !== null) {  // print the block's body content
            $content = $block['#markup'];
            print '<div slot="actions">';
            print $content;
            print '</div>';
          }
          $i++;
        } else { // isn't an array, is the final string at the end of lists of blocks
          $i++;
          break;
        }
      }
      ?>
    <?php endif; ?>
    <?php if ($login_use == TRUE): ?>
      <byu-user-info slot="user">
        <a slot="login" href="<?php print $login_url; ?>">Sign In</a>
        <!-- if you are using CAS, use the CAS sign out link instead: -->
        <!--      <a slot="logout" href="/caslogout">Sign Out</a>-->
        <a slot="logout" href="<?php print $logout_url; ?>">Sign Out</a>
        <?php if($logged_in): ?>

          <?php if ($user->uid) {
            if ($myaccount_use == TRUE) {
              // if you want a my account link, using the default user page
              print '<a slot="user-name" href="' . $myaccount_url . '">' . $user->name . '</a>';
            } else { // if you don't want a my account link
              print '<span slot="user-name">' . $user->name . '</span>';
            }

          }
          ?>

        <?php endif; ?>
      </byu-user-info>
    <?php endif; ?>
    <?php if ($search_use == TRUE): ?>
      <byu-search slot="search" onsearch="d7Search">
        <?php
        $search = drupal_get_form('search_block_form');
        print render($search);

        ?>
      </byu-search>
    <?php endif; ?>
    <!--    </span>-->
    <?php if ($menu_use == TRUE): ?>
      <!--      --><?php //if ($alt_main_menu): ?>
      <byu-menu slot="nav" collapsed id="main-menu" class="navigation <?php if ($transparent == TRUE){ print 'transparent'; } ?>" role="navigation">
        <?php
        // $alt_,ain_menu returns an big long string of  of li's with a tags,
        // change to a string of a tags, then print that
        $linksList = preg_replace("/<h2.*\/h2>/", "", $alt_main_menu);
        $linksList = preg_replace("/<ul.*<li/", "<li", $linksList);
        $linksList = preg_replace("/<li.*<a/", "<a", $linksList);
        $linksList = preg_replace("/<\/li>/", "", $linksList);

        // need to remove anything that is a sub level of menu... in case people did do that?
        $linksList = preg_replace("/<\/ul>/", "", $linksList);
        // split into array of a tag links
        print ($linksList);

        ?>
        <!-- /#main-menu -->
        <!--            --><?php //endif; ?>

      </byu-menu>
    <?php endif; ?>
  </byu-header>


<?php if (!empty($page['hero'])): ?>
    <!-- Hero Space -->
    <div class= "<?php print $hero_vs_menu . ' '; print $hero_space_width; ?> <?php
        if ($hero_full_image_width == TRUE){
            print 'full-width-images"';
            if ($hero_space_width == 'custom-width-hero') {
                print 'style="width:' . $page_width . 'px"';
            }
        }
        else {
            print '"';
        }
    ?>
    <?php print render($page['hero']); ?>
</div>
<?php endif; ?>

  <?php if (!empty($page['featured'])): ?>
    <!--/.featured -->
    <section class="l-featured row  <?php if ($full_width == TRUE){ print 'full-width'; } ?>" <?php if (!empty($page_width)){ print 'style="max-width: ' . $page_width . 'px;"'; } ?>>
      <div class="large-12 columns">
        <?php print render($page['featured']); ?>
      </div>
    </section>
    <!--/.l-featured -->
  <?php endif; ?>

  <?php if ($messages && !$zurb_foundation_messages_modal): ?>
    <!--/.l-messages -->
    <section class="l-messages row <?php if ($full_width == TRUE){ print 'full-width'; } ?>" <?php if (!empty($page_width)){ print 'style="max-width: ' . $page_width . 'px;"'; } ?>>
      <div class="large-12 columns">
        <?php if ($messages): print $messages; endif; ?>
      </div>
    </section>
    <!--/.l-messages -->
  <?php endif; ?>

  <?php if (!empty($page['help'])): ?>
    <!--/.l-help -->
    <section class="l-help row  <?php if ($full_width == TRUE){ print 'full-width'; } ?>" <?php if (!empty($page_width)){ print 'style="max-width: ' . $page_width . 'px;"'; } ?>>
      <div class="large-12 columns">
        <?php print render($page['help']); ?>
      </div>
    </section>
    <!--/.l-help -->
  <?php endif; ?>

    <div id="page-container" <?php if ($footer_sticky == TRUE){print 'class="sticky-footer"';}?> <?php if (!empty($min_page_height)){ print 'style="min-height: ' . $min_page_height . 'px;"'; } ?>>

    <main role="main" class="row l-main <?php if ($full_width == TRUE){ print 'full-width'; } ?>" <?php if (!empty($page_width)){ print 'style="max-width: ' . $page_width . 'px;"'; } ?>>

      <div id="main-content-section" class="<?php print $main_grid; ?> main columns">
        <?php if (!empty($page['highlighted'])): ?>
          <div class="highlight panel callout">
            <?php print render($page['highlighted']); ?>
          </div>
        <?php endif; ?>

        <a id="main-content"></a>
        <!-- commented out breadcrumb -->
        <!--        --><?php //if ($breadcrumb): print $breadcrumb; endif; ?>

        <?php if ($title && !$is_front): ?>
          <?php print render($title_prefix); ?>
          <h1 id="page-title" class="title"><?php print $title; ?></h1>
          <?php print render($title_suffix); ?>
        <?php endif; ?>

        <?php if (!empty($tabs)): ?>
          <?php print render($tabs); ?>
          <?php if (!empty($tabs2)): print render($tabs2); endif; ?>
        <?php endif; ?>

        <?php if ($action_links): ?>
          <ul class="action-links">
            <?php print render($action_links); ?>
          </ul>
        <?php endif; ?>

        <?php print render($page['content']); ?>
      </div>
      <!--/.main region -->

      <?php if (!empty($page['sidebar_first'])): ?>
        <div id="sidebar-first-container">
          <aside role="complementary" class="<?php print $sidebar_first_grid; ?> sidebar-first columns sidebar">
            <?php print render($page['sidebar_first']); ?>
          </aside>
        </div>
      <?php endif; ?>

      <?php if (!empty($page['sidebar_second'])): ?>
        <aside role="complementary" class="<?php print $sidebar_sec_grid; ?> sidebar-second columns sidebar">
          <?php print render($page['sidebar_second']); ?>
        </aside>
      <?php endif; ?>
    </main>
    <!--/.main-->
  </div>

  <?php if (!empty($page['triptych_first']) || !empty($page['triptych_middle']) || !empty($page['triptych_last'])): ?>
    <!--.triptych-->
    <section class="l-triptych row">
      <div class="triptych-first large-4 columns">
        <?php print render($page['triptych_first']); ?>
      </div>
      <div class="triptych-middle large-4 columns">
        <?php print render($page['triptych_middle']); ?>
      </div>
      <div class="triptych-last large-4 columns">
        <?php print render($page['triptych_last']); ?>
      </div>
    </section>
    <!--/.triptych -->
  <?php endif; ?>

  <byu-footer>
    <?php if (!empty($page['footer_firstcolumn']) || !empty($page['footer_secondcolumn']) || !empty($page['footer_thirdcolumn']) || !empty($page['footer_fourthcolumn'])): ?>
      <!--.footer-columns -->
      <byu-footer-column>
        <?php if (!empty($page['footer_firstcolumn'])): ?>
          <?php
          // get array of blocks
          $blocks = $page['footer_firstcolumn'];
          $i = 0;
          $len = count($blocks);
          foreach($blocks as $block) {
            if($i == 0){  // print only the title of the first block per footer column
              $blockOb = $block['#block'];
              $blockTitle = $blockOb->title;
              print '<span slot="header">' . $blockTitle . '</span>';
            } else if ($i == $len - 1) {
              // is the last, skip
              break;
            }
            if(is_array($block)) {
              if ($block['#markup'] !== null) {  // print the block's body content
                $content = $block['#markup'];
                print $content;
              }
              $i++;
            } else { // isn't an array, is the final string at the end of lists of blocks
              $i++;
              break;
            }
          }
          ?>
        <?php endif; ?>
      </byu-footer-column>
      <byu-footer-column>
        <?php if (!empty($page['footer_secondcolumn'])): ?>
          <?php // get block title
          // get array of blocks
          $blocks = $page['footer_secondcolumn'];
          $i = 0;
          $len = count($blocks);
          foreach($blocks as $block) {
            if($i == 0){
              $blockOb = $block['#block'];
              $blockTitle = $blockOb->title;
              print '<span slot="header">' . $blockTitle . '</span>';
            } else if ($i == $len - 1) {
              // is the last, skip
              break;
            }
            if(is_array($block)) {
              if ($block['#markup'] !== null) {
                $content = $block['#markup'];
                print $content;
              }
              $i++;
            } else { // isn't an array, is the final string at the end of lists of blocks
              $i++;
              break;
            }
          }
          ?>
        <?php endif; ?>
      </byu-footer-column>
      <byu-footer-column>
        <?php if (!empty($page['footer_thirdcolumn'])): ?>
          <?php // get block title
          // get array of blocks
          $blocks = $page['footer_thirdcolumn'];
          $i = 0;
          $len = count($blocks);
          foreach($blocks as $block) {
            if($i == 0){
              $blockOb = $block['#block'];
              $blockTitle = $blockOb->title;
              print '<span slot="header">' . $blockTitle . '</span>';
            } else if ($i == $len - 1) {
              // is the last, skip
              break;
            }
            if(is_array($block)) {
              if ($block['#markup'] !== null) {
                $content = $block['#markup'];
                print $content;
              }
              $i++;
            } else { // isn't an array, is the final string at the end of lists of blocks
              $i++;
              break;
            }
          }
          ?>
        <?php endif; ?>
      </byu-footer-column>
      <byu-footer-column>
        <?php if (!empty($page['footer_fourthcolumn'])): ?>
          <?php // get block title
          // get array of blocks
          $blocks = $page['footer_fourthcolumn'];
          $i = 0;
          $len = count($blocks);
          foreach($blocks as $block) {
            if($i == 0){
              $blockOb = $block['#block'];
              $blockTitle = $blockOb->title;
              print '<span slot="header">' . $blockTitle . '</span>';
            } else if ($i == $len - 1) {
              // is the last, skip
              break;
            }
            if(is_array($block)) {
              if ($block['#markup'] !== null) {
                $content = $block['#markup'];
                print $content;
              }
              $i++;
            } else { // isn't an array, is the final string at the end of lists of blocks
              $i++;
              break;
            }
          }
          ?>
        <?php endif; ?>
      </byu-footer-column>
      <!--/.footer-columns-->
    <?php endif; ?>
  </byu-footer>

  <?php if ($messages && $zurb_foundation_messages_modal): print $messages; endif; ?>
</div>
<!--/.page -->
