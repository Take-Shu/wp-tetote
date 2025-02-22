<?php get_header(); ?>

<?php
$page_for_posts = get_option('page_for_posts');
if ($page_for_posts) {
  $title = get_the_title($page_for_posts);
} else {
  $title = 'No Title';
}
?>
<main class="l-lower-blog-main">
  <div class="p-lower-blog-fv c-lower-fv js-observer-target">
    <div class="c-lower-fv__container">
      <hgroup class="c-lower-fv__title">
        <h1 lang="en" translate="no" class="c-lower-fv__title-en"><?php echo $title; ?></h1>
        <p class="c-lower-fv__title-ja">
          採用ブログ</p>
      </hgroup>
      <p class="c-lower-fv__text">採用情報やイベント情報などをご紹介します</p>
    </div>
  </div>

  <?php get_template_part('parts', 'location'); ?>

  <div class="p-lower-blog">
    <div class="p-lower-blog__list">
      <?php
      global $wp_query;
      if (have_posts()):
        while (have_posts()) : the_post();
        $post_index = $wp_query -> current_post + 1;
      ?>
          <?php
          $cats = get_the_category();
          if ($cats) {
            foreach ($cats as $cat) {
              $cat_name = $cat->name;
            }
          }
          ?>
          <article class="c-blog__article" aria-labelledby="blog-<?php echo $post_index; ?>">
            <a href="<?php the_permalink(); ?>" class="c-blog__article-link">
              <div class="c-blog__article-contents p-lower-blog__article-contents">
                <h2 id="blog-<?php echo $post_index; ?>" class="c-blog__article-title"><?php the_title(); ?></h2>
                <dl>
                  <div class="c-blog__article-category">
                    <dt><span class="visually-hidden">カテゴリ</span></dt>
                    <dd><?php echo $cat_name; ?></dd>
                  </div>
                  <div class="c-blog__article-date">
                    <dt class="visually-hidden">投稿日</dt>
                    <dd><time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time(get_option('date_format')); ?></time></dd>
                  </div>
                </dl>
              </div>
              <?php if (has_post_thumbnail()) {
                the_post_thumbnail(array(156, 180));
              } else {
                echo '<img src="' . get_template_directory_uri() . '/assets/img/common/no-image_grey.png" width="156" height="180" alt="No Image">';
              } ?>
            </a>
          </article>
        <?php endwhile; ?>
      <?php else : ?>
        <p class=p-lower-blog__no-list-text>記事はありません。</p>
      <?php endif; ?>
    </div>
    <?php the_posts_pagination(); ?>
  </div>

  <?php get_footer(); ?>