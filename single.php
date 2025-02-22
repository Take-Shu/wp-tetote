<?php get_header(); ?>

<main class="l-lower-blog-post-main">
  <div class="c-lower-location">
    <div class="c-lower-location__container">
      <div class="breadcrumb">
        <!-- パンくずリスト -->
        <?php if (function_exists('bcn_display')) {
          bcn_display();
        }
        ?>
      </div>
    </div>
  </div>
  <?php
  if (have_posts()):
    while (have_posts()) : the_post();

      // カテゴリーの取得 
      $cat = get_the_category();
      $cat = $cat[0];
  ?>
      <div class="p-lower-blog-post">
        <article class="p-lower-blog-post__article">
          <dl class="p-lower-blog-post__article-category-date-wrap">
            <div class="p-lower-blog-post__article-category">
              <dt><span class="visually-hidden">カテゴリ</span></dt>
              <dd><?php echo $cat->cat_name; ?></dd>
            </div>
            <div class="p-lower-blog-post__article-date">
              <dt class="visually-hidden">投稿日</dt>
              <dd><time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time(get_option('date_format')); ?></time></dd>
            </div>
          </dl>
          <h1 class="p-lower-blog-post__article-title"><?php the_title(); ?></h1>
          <div class="eyecatch">
            <!-- アイキャッチ画像がなければ No Image画像を出力 -->
            <?php if (has_post_thumbnail()) {
              the_post_thumbnail(array(720, 411));
            } else {
              echo '<img src="' . get_template_directory_uri() . '/assets/img/common/no-image.png" width="720" height="411" alt="No Image">';
            } ?>
          </div>

          <!-- 本文の出力 -->
          <?php the_content(); ?>
        </article>

        <!-- 投稿ナビゲーション -->
        <?php
        $prev_post = get_previous_post();
        if ($prev_post) {
          $prev_post_date = date("Y.m.d", strtotime($prev_post->post_date));
        }
        $next_post = get_next_post();
        if ($next_post) {
          $next_post_date = date("Y.m.d", strtotime($next_post->post_date));
        }
        if ($prev_post || $next_post) :
        ?>
          <nav class="p-lower-blog-post__pagination" aria-labelledby="post-navigation">
            <h2 id="post-navigation" class="visually-hidden">投稿ナビゲーション</h2>
            <?php if ($prev_post) : ?>
              <a href="<?php echo get_permalink($prev_post->ID); ?>" class="p-lower-blog-post__pagination-link prev">
                <div class="p-lower-blog-post__pagination-icon-text-wrap">
                  <span class="p-lower-blog-post__pagination-icon"></span>
                  <div p-lower-blog-post__pagination-text>
                    <div>
                      <span>
                        <?php
                        if (mb_strlen(get_the_title($prev_post->ID)) > 20) {
                        $title = mb_substr(get_the_title($prev_post->ID), 0, 20);
                        echo $title . '...';
                        } else {
                        echo get_the_title($prev_post->ID);
                        }
                        ; ?>
                      </span>
                    </div>
                    <div><time datetime="<?php echo date("Y-m-d", strtotime($prev_post->post_date)); ?>"><?php echo $prev_post_date; ?></time></div>
                  </div>
                </div>
              </a>

            <?php else : ?>
              <!-- 前の記事がなかった場合 -->
              <div class="p-lower-blog-post__pagination-link prev">
                <p class="p-lower-blog-post__pagination-no-link-text prev">
                  記事がありません
                </p>
              </div>
            <?php endif; ?>
            <?php if ($next_post): ?>
              <a href="<?php echo get_permalink($next_post->ID); ?>" class="p-lower-blog-post__pagination-link next">
                <div class="p-lower-blog-post__pagination-icon-text-wrap">
                  <div class="p-lower-blog-post__pagination-text">
                  <div>
                      <span>
                        <?php
                        if (mb_strlen(get_the_title($next_post->ID)) > 20) {
                        $title = mb_substr(get_the_title($next_post->ID), 0, 20);
                        echo $title . '...';
                        } else {
                        echo get_the_title($next_post->ID);
                        }
                        ; ?>
                      </span>
                    </div>
                    <div><time datetime="<?php echo date("Y-m-d", strtotime($next_post->post_date)); ?>"><?php echo $next_post_date; ?></time></div>
                  </div>
                  <span class="p-lower-blog-post__pagination-icon"></span>
                </div>
              </a>

            <?php else : ?>
              <!-- 次の記事がなかった場合 -->
              <div class="p-lower-blog-post__pagination-link next">
                <p class="p-lower-blog-post__pagination-no-link-text next">
                    記事がありません
                </p>
              </div>
            <?php endif; ?>
          </nav>
        <?php endif; ?>
    <?php
    endwhile;
  endif;
    ?>
      </div>

      <?php get_footer(); ?>