<article class="c-staff__article" aria-labelledby="<?php the_field('aria_labelledby'); ?>">
  <a href="<?php the_permalink(); ?>" class="c-staff__link">
    <h3 id="<?php the_field('aria_labelledby'); ?>" class="c-staff__name"><?php the_field('name'); ?></h3>
    <div class="c-staff__data">
      <span class="c-staff__occupation"><?php the_field('job_title'); ?></span>
      <span class="c-staff__date"><time datetime="<?php the_field('year_of_entry'); ?>"
          class="c-staff__date-time"><?php the_field('year_of_entry'); ?></time>年入社
      </span>
    </div>
    <div class="c-staff__message-img-wrap">
      <div class="c-staff__message">
        <div><span><?php the_field('staff_message_first'); ?></span></div>
        <div><span><?php the_field('staff_message_second'); ?></span></div>
      </div>
      <div class="c-staff__img-wrap">
        <?php if (has_post_thumbnail()) {
          the_post_thumbnail(array(300, 379));
        } else {
          echo '<img src="' . get_template_directory_uri() . '/assets/img/common/no-image.png" width="300" height="379" alt="No Image">';
        } ?>
      </div>
    </div>
  </a>
</article>