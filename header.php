<!DOCTYPE html>
<html lang="ja">

<head prefix="og: https://ogp.me/ns#">
  <meta name="robots" content="noindex">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Noto+Sans+JP:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Viga&display=swap"
    rel="stylesheet">
  <?php wp_head(); ?>
</head>

<body>
  <?php if (is_single() && 'post' == get_post_type() || is_page('entry') || is_page('entry-thanks')): ?>
    <header class="l-header fixed js-header">
    <?php else : ?>
      <header class="l-header js-header">
      <?php endif; ?>
      <div class="l-header__container">
        <div class="l-header__logo">
          <a href="<?php echo esc_url(home_url()); ?>" class="l-header__top-link">
            <?php if (is_front_page()): ?>
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/common/logo_white.svg" data-white-logo="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/common/logo_white.svg" data-black-logo="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/common/logo_black.svg" width="251" height="66" fetchPriority="high" alt="採用特設サイト | 株式会社TETOTE"
                class="l-header__logo-img js-header__logo-img">
            <?php else : ?>
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/common/logo_black.svg" width="251" height="66" fetchPriority="high" alt="採用特設サイト | 株式会社TETOTE" class="l-header__logo-img">
            <?php endif; ?>
          </a>
        </div>
        <div class="l-header__contents">
          <div class="l-header__cta">
            <a href="/details" class="l-header__recruiting-link c-cta__button c-cta__button_recruiting">募集要項</a>
            <a href="/entry" class="l-header__entry-link c-cta__button c-cta__button_entry">ENTRY</a>
          </div>
          <?php if (is_front_page()): ?>
            <button type="button" class="l-header__menu-button js-modal-open-button" data-modal-open="drawer"
              aria-labelledby="menu-button" aria-haspopup="true"><span id="menu-button" style="display: none">メニューを開く</span>
              <span class="l-header__menu-icon"><span
                  class="l-header__menu-bar js-header__menu-bar"></span></span>MENU
            </button>
          <?php else : ?>
            <button type="button" class="l-header__menu-button lower js-modal-open-button" data-modal-open="drawer"
              aria-labelledby="menu-button" aria-haspopup="true"><span id="menu-button" style="display: none">メニューを開く</span>
              <span class="l-header__menu-icon"><span
                  class="l-header__menu-bar js-header__menu-bar"></span></span>MENU
            </button>
          <?php endif; ?>
        </div>
      </div>
      </header>