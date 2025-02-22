<?php get_header(); ?>

<main class="l-lower-staff-main">
  <div class="p-lower-staff-fv c-lower-fv js-observer-target">
    <div class="c-lower-fv__container">
      <hgroup class="p-lower-staff-fv__title c-lower-fv__title">
        <h1 lang="en" translate="no" class="p-lower-staff-fv__title-en c-lower-fv__title-en">STAFF</h1>
        <p class="p-lower-staff-fv__title-ja c-lower-fv__title-ja">
          社員について</p>
      </hgroup>
      <p class="p-lower-staff-fv__text c-lower-fv__text">弊社社員のリアルな声を紹介しています。</p>
    </div>
  </div>

  <?php get_template_part('parts', 'location'); ?>

  <?php
  $args = array(
    'post_type' => 'staff',
    'orderby' => 'ASC',
    'posts_per_page' => 8,
  );
  $staff_query = new WP_Query($args);
  ?>
  <section class="p-lower-staff">
    <ul class="p-lower-staff__list">
      <?php
      if ($staff_query->have_posts()) :
        while ($staff_query->have_posts()) :
          $staff_query->the_post();
      ?>
          <li class="p-lower-staff__item">
            <?php get_template_part('parts', 'staff'); ?>
          </li>
      <?php
        endwhile;
      endif;
      wp_reset_postdata();
      ?>
    </ul>
  </section>

  <?php get_footer(); ?>