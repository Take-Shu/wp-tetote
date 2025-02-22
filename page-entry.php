<?php get_header(); ?>

  <main class="l-lower-entry-main">
    <?php get_template_part('parts', 'location'); ?>

    <div class="p-lower-entry">
      <div class="p-lower-entry-container">
        <div class="p-lower-entry-container__text-wrap">
          <hgroup class="p-lower-entry-container__title">
            <h1 lang="en" translate="no" class="p-lower-entry-container__title_en">ENTRY FORM</h1>
            <p class="p-lower-entry-container__title_ja">
              <span class="u-color-main">新卒・中途採用</span>エントリーフォーム
            </p>
          </hgroup>
          <p class="p-lower-entry-container__text">当社へ入社ご希望の方は、下記の送信フォームより送信して下さい。<br><span
              class="u-color-main">※</span>は必須項目になります。
          </p>
        </div>
        <div class="p-lower-entry-container__form-wrap">
        <?php echo apply_shortcodes( '[contact-form-7 id="f3e338f" title="entry-form"]' ); ?>
        </div>
      </div>
    </div>

    <?php get_footer(); ?>