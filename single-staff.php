<?php get_header(); ?>

<main class="l-lower-staff-detail-main">
  <article class="p-lower-staff-detail__article js-observer-target" aria-labelledby="<?php the_field('aria_labelledby'); ?>">
    <div class="p-lower-staff-detail__container">
      <div class="p-lower-staff-detail__contents">
        <div class="p-lower-staff-detail__text-wrap">
          <h1 id="<?php the_field('aria_labelledby'); ?>" class="p-lower-staff-detail__title">
            <div><span class="p-lower-staff-detail__title_large"><?php the_field('staff_message_first'); ?></span></div>
            <div><span class="p-lower-staff-detail__title_small"><?php the_field('staff_message_second'); ?></span></div>
          </h1>
          <div class="p-lower-staff-detail__occupation"><?php the_field('job_title'); ?></div>
          <div class="p-lower-staff-detail__name-date-wrap">
            <span class="p-lower-staff-detail__name"><?php the_field('name'); ?></span>
            <span class="p-lower-staff-detail__date"><time datetime="<?php the_field('year_of_entry'); ?>"
                class="p-lower-staff-detail__date-time"><?php the_field('year_of_entry'); ?></time>年入社
            </span>
          </div>
          <p class="p-lower-staff-detail__description">
            <?php the_field('profile'); ?>
          </p>
        </div>
        <?php if (has_post_thumbnail()) {
          the_post_thumbnail(array(286, 368));
        } else {
          echo '<img src="' . get_template_directory_uri() . '/assets/img/common/no-image.png" width="286" height="368" alt="No Image">';
        } ?>
      </div>
    </div>
  </article>

  <?php get_template_part('parts', 'location'); ?>

  <div class="p-lower-staff-detail__about-aside-wrap">
    <article class="p-lower-staff-detail__about">
      <?php
      if (have_posts()):
        while (have_posts()) : the_post();
      ?>
          <?php the_content(); ?>
      <?php
        endwhile;
      endif;
      ?>
    </article>

    <?php get_template_part('parts', 'sidebar'); ?>
  </div>

  <?php
  $args = array(
    'post_type' => 'staff',
    'orderby' => 'rand',
    'posts_per_page' => 3,
  );
  $staff_query = new WP_Query($args);
  ?>
  <section class="p-lower-staff-detail__other">
    <h2 class="p-lower-staff-detail__other-title">その他のメンバー</h2>
    <ul class="p-lower-staff-detail__other-list">
      <?php
      if ($staff_query->have_posts()) :
        while ($staff_query->have_posts()) :
          $staff_query->the_post();
      ?>
          <li class="p-lower-staff-detail__other-item">
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