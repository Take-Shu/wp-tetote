<?php get_header(); ?>

  <main class="l-lower-thanks-main">
    <div class="c-lower-location">
      <div class="c-lower-location__container">
        <?php if (function_exists('bcn_display')) {
          bcn_display();
        }
        ?>
      </div>
    </div>

    <div class="p-lower-thanks">
      <div class="p-lower-thanks-container">
        <p class="p-lower-thanks-container__text-large">送信ありがとうございました。</p>
        <p class="p-lower-thanks-container__text">3営業日以内に人事担当者より連絡させていただきます。</p>
      </div>
    </div>

    <?php get_footer(); ?>