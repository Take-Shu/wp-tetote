<?php get_header(); ?>

<main class="l-main">
  <div class="p-fv">
    <div class="swiper p-fv__slide" aria-hidden="true">
      <div class="swiper-wrapper p-fv__slide-wrap">
        <div class="swiper-slide p-fv__slide-item">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/fv_01.jpg" width="1440" height="823" fetchPriority="high" alt="男性がスーツ姿で歩いている様子" class="p-fv__slide-img u-position-left">
        </div>
        <div class="swiper-slide p-fv__slide-item">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/fv_02.jpg" width="1440" height="823" fetchPriority="high" alt="従業員の二人(男女)がオフィスで会話している様子" class="p-fv__slide-img">
        </div>
      </div>
    </div>
    <p lang="en" translate="no" class="p-fv__message-large">BECOME A<br aria-hidden="true">CHALLENGER.</p>
    <p class="p-fv__message-small">君の挑戦が、意思が、未来を変える</p>
    <article class="p-fv__news" aria-labelledby="news">
      <?php
      $args = array(
        'post_type' => 'post',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 1,
      );
      $latest_query = new WP_Query($args);
      ?>
      <?php
      if ($latest_query->have_posts()) :
        while ($latest_query->have_posts()) :
          $latest_query->the_post();
      ?>
          <a href="<?php the_permalink(); ?>" class="p-fv__news-link" aria-labelledby="news">
            <h2 id="news" lang="en" translate="no" class="p-fv__news-title">NEWS</h2>
            <div class="p-fv__news-post">
              <span class="p-fv__news-text">
                <?php 
                if (mb_strlen($post->post_title) > 40) {
                  $title = mb_substr($post->post_title, 0, 40);
                    echo $title . '...';
                } else {
                  echo $post->post_title;
                }
                ; ?>
              </span>
              <span class="p-fv__news-view-more">VIEW MORE</span>
            </div class="">
          </a>
      <?php
        endwhile;
      endif;
      wp_reset_postdata();
      ?>
    </article>

  </div>

  <section class="p-career">
    <div class="p-career__container">
      <div class="p-career__slide-wrap">
        <div class="swiper p-career__slide" aria-hidden="true">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/slide_01.png" width="506" height="393" alt="従業員のスライド画像" class="p-career__slide-img">
            </div>
            <div class="swiper-slide p-career__slide-item_down">
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/slide_02.png" width="506" height="393" alt="従業員のスライド画像" class="p-career__slide-img">
            </div>
            <div class="swiper-slide">
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/slide_03.png" width="506" height="393" alt="従業員のスライド画像" class="p-career__slide-img">
            </div>
            <div class="swiper-slide p-career__slide-item_down">
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/slide_01.png" width="506" height="393" alt="従業員のスライド画像" class="p-career__slide-img">
            </div>
            <div class="swiper-slide">
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/slide_02.png" width="506" height="393" alt="従業員のスライド画像" class="p-career__slide-img">
            </div>
            <div class="swiper-slide p-career__slide-item_down">
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/slide_03.png" width="506" height="393" alt="従業員のスライド画像" class="p-career__slide-img">
            </div>
          </div>
        </div>
        <h2 id="career" class="p-career__title">
          <div class="p-career__title-text">後悔しないキャリアを作る、</div>
          <div class="p-career__title-text">それこそが、我々の使命だ</div>
        </h2>
      </div>
      <div class="p-career__objective">
        <div class="p-career__map">
          <p class="p-career__objective-top">
            「人手不足」<br aria-hidden="true">今の日本が抱えるこの社会課題に挑み、<br aria-hidden="true">企業と個人の可能性を最大限に引き出す。<br aria-hidden="true">それが私達の役目。
          </p>
          <p class="p-career__objective-bottom">
            単につなぐだけじゃない。<br aria-hidden="true">「手と手」を取り合っていけるような、<br aria-hidden="true">持続可能な社会を、一緒に作りませんか？
          </p>
        </div>
      </div>
      <div class="p-career__view-more">
        <a href="<?php echo esc_url(home_url()); ?>/career" lang="en" class="p-career__view-more-link c-button__view-more" aria-labelledby="career">VIEW MORE</a>
      </div>
    </div>
  </section>

  <section class="p-employee">
    <div class="p-employee__container">
      <hgroup id="staff" class="p-employee__title">
        <h2 id="member" lang="en" translate="no" class="p-employee__title-en c-section-title-en">MEMBER</h2>
        <p class="p-employee__title-ja c-section-title-ja"><span class="u-border-bottom">人</span>を知る</p>
      </hgroup>
      <p class="p-employee__description">
        TETOTEの社員がどういった信念を持って働いているのか、<br aria-hidden="true">一日のスケジュールや仕事内容などを紹介します。
      </p>
      <div class="p-employee__article">
        <?php
        $args = array(
          'post_type' => 'staff',
          'orderby' => 'date',
          'order' => 'ASC',
          'posts_per_page' => -1,
        );
        $staff_query = new WP_Query($args);
        ?>
        <div class="swiper p-employee__slide">
          <ul class="swiper-wrapper p-employee__slide-wrap">
            <?php
            if ($staff_query->have_posts()) :
              while ($staff_query->have_posts()) :
                $staff_query->the_post();
                $slide_class = ($staff_query->current_post % 2) ? 'swiper-slide p-employee__slide_down' : 'swiper-slide';
            ?>
                <li class="<?php echo $slide_class; ?>">
                  <article class="p-employee__article-item" aria-labelledby="<?php the_field('aria_labelledby'); ?>">
                    <a href="<?php the_permalink(); ?>" class="p-employee__article-link c-staff__link">
                      <h3 id="<?php the_field('aria_labelledby'); ?>" class="p-employee__article-name c-staff__name"><?php the_field('name'); ?></h3>
                      <div class="p-employee__article-data c-staff__data">
                        <span class="p-employee__article-occupation c-staff__occupation"><?php the_field('job_title'); ?></span>
                        <span class="p-employee__article-date c-staff__date">
                          <time datetime="<?php the_field('year_of_entry'); ?>"><?php the_field('year_of_entry'); ?></time>年入社
                        </span>
                      </div>
                      <div class="p-employee__article-img-message-wrap c-staff__message-img-wrap">
                        <div class="p-employee__article-message c-staff__message">
                          <div><span><?php the_field('staff_message_first'); ?></span></div>
                          <div><span><?php the_field('staff_message_second'); ?></span></div>
                        </div>
                        <div class="p-employee__article-img-wrap c-staff__img-wrap">
                          <?php if (has_post_thumbnail()) {
                            the_post_thumbnail(array(300, 379));
                          } else {
                            echo '<img src="' . get_template_directory_uri() . '/assets/img/common/no-image.png" width="300" height="379" alt="No Image">';
                          } ?>
                        </div>
                      </div>
                    </a>
                  </article>
                </li>
            <?php
              endwhile;
            endif;
            wp_reset_postdata();
            ?>
          </ul>
        </div>
      </div>
      <div class="p-employee__button-wrap js-employee-btn">
        <div class="p-employee__view-more">
          <a href="<?php echo esc_url(home_url()); ?>/staff" lang="en" class="p-employee__view-more-link c-button__view-more" aria-labelledby="member">VIEW MORE</a>
        </div>
        <div class="p-employee__slide-button-wrap">
          <span class="p-employee__slide-button_prev c-button__circle"></span>
          <span class="p-employee__slide-button_next c-button__circle c-button__circle-right"></span>
        </div>
      </div>
    </div>
  </section>

  <section class="p-benefits">
    <div class="p-benefits__container">
      <hgroup class="p-benefits__title">
        <h2 lang="en" translate="no" class="p-benefits__title-en c-section-title-en">BENEFITS</h2>
        <p class="p-benefits__title-ja c-section-title-ja"><span class="u-border-bottom">制度・環境</span>を知る</p>
      </hgroup>
      <p class="p-benefits__description">
        当社では働く従業員とそのご家族が健やかに過ごせるよう、多様な研修、福利厚生を提供しています。
      </p>
      <div class="p-benefits__detail-wrap">
        <div class="p-benefits__detail">
          <a href="<?php echo esc_url(home_url()); ?>/career" class="p-benefits__detail-link" aria-labelledby="career">
            <figure class="p-benefits__detail-figure">
              <div class="p-benefits__detail-img-wrap">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/system_01.svg" width="327" height="277" loading="lazy" alt="詳細は以下" class="p-benefits__detail-img">
              </div>
              <figcaption class="p-benefits__detail-caption">研修制度とキャリアパス</figcaption>
            </figure>
            <p class="p-benefits__detail-text-vertical">Training And Career</p>
            <span
              class="p-benefits__detail-button c-button__circle c-button__circle-right c-button__circle_black c-button__circle_sm" aria-hidden="true">
            </span>
            <p class="p-benefits__detail-text">
              個々の目標に合わせたキャリアパスを支える、豊富な研修メニューで、あなた自身の成長を強力にサポートします。
            </p>
          </a>
        </div>
        <div class="p-benefits__detail">
          <a href="<?php echo esc_url(home_url()); ?>/benefits" class="p-benefits__detail-link" aria-labelledby="benefits">
            <figure class="p-benefits__detail-figure">
              <div class="p-benefits__detail-img-wrap">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/system_02.svg" width="344" height="230" loading="lazy" alt="詳細は以下" class="p-benefits__detail-img">
              </div>
              <figcaption id="benefits" class="p-benefits__detail-caption">福利厚生</figcaption>
            </figure>
            <p class="p-benefits__detail-text-vertical">employee benefits</p>
            <span
              class="p-benefits__detail-button c-button__circle c-button__circle-right c-button__circle_black c-button__circle_sm" aria-hidden="true">
            </span>
            <p class="p-benefits__detail-text">
              TETOTEの福利厚生制度は、従業員の健康と幸福を重視し、働きやすい環境を提供することを目的としています。
            </p>
          </a>
        </div>
      </div>
    </div>
  </section>

  <section class="p-blog">
    <div class="p-blog__container">
      <div class="p-blog__title-wrap">
        <hgroup class="p-blog__title">
          <h2 id="blog" lang="en" translate="no" class="p-blog__title-en c-section-title-en">BLOG</h2>
          <p class="p-blog__title-ja c-section-title-ja">採用ブログ</p>
        </hgroup>
        <div class="p-blog__view-more p-blog__view-more_pc">
          <a href="<?php echo esc_url(home_url()); ?>/blog" class="p-blog__view-more-link" aria-labelledby="blog">
            <span class="p-blog__view-more-button c-button__circle c-button__circle-right"></span>
            <span class="p-blog__view-more-text u-border-bottom">VIEW MORE</span>
          </a>
        </div>
      </div>
      <p class="p-blog__description">
        採用情報やイベント情報、社員の紹介など、<br class="u-blog__description_pc-only">日々の現場の様子をご紹介します。
      </p>
      <div class="p-blog__article">
        <?php
        $args = array(
          'post_type' => 'post',
          'orderby' => 'date',
          'order' => 'DESC',
          'posts_per_page' => 4,
        );
        $post_query = new WP_Query($args);
        ?>
        <?php
        if ($post_query->have_posts()) :
          while ($post_query->have_posts()) :
            $post_query->the_post();
            $post_index = $post_query->current_post + 1; // 記事のインデックスを取得
            $cats = get_the_category();
            if ($cats) {
              foreach ($cats as $cat) {
                $cat_name = $cat->name; // カテゴリ名を取得
              }
            }
        ?>
            <article class="c-blog__article" aria-labelledby="blog-<?php echo $post_index; ?>">
              <a href="<?php the_permalink(); ?>" class="c-blog__article-link">
                <div class="c-blog__article-contents p-blog__article-contents">
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
                  echo '<img src="' . get_template_directory_uri() . '/assets/img/common/no-image.png" width="156" height="180" loading="lazy" alt="No Image">';
                } ?>
              </a>
            </article>
        <?php
          endwhile;
        endif;
        wp_reset_postdata();
        ?>
      </div>
      <div class="p-blog__view-more p-blog__view-more_sp">
        <a href="<?php echo esc_url(home_url()); ?>/blog" class="p-blog__view-more-link" aria-labelledby="blog">
          <span class="p-blog__view-more-button c-button__circle c-button__circle-right"></span>
          <span class="p-blog__view-more-text u-border-bottom">VIEW MORE</span>
        </a>
      </div>
    </div>
  </section>

  <section class="p-recruitment">
    <div class="p-recruitment__container">
      <hgroup class="p-recruitment__title">
        <h2 lang="en" translate="no" class="p-recruitment__title-en c-section-title-en">RECRUITMENT</h2>
        <p class="p-recruitment__title-ja c-section-title-ja"><span class="u-border-bottom">採用情報</p>
      </hgroup>
      <p class="p-recruitment__description">
        募集要項（職種、業務内容、応募条件、選考フロー）とよくある質問・会社概要などをまとめています。
      </p>
      <ul class="p-recruitment__list">
        <li class="p-recruitment__item">
          <a href="<?php echo esc_url(home_url()); ?>/details" class="p-recruitment__link">募集要項</a>
        </li>
        <li class="p-recruitment__item">
          <a href="<?php echo esc_url(home_url()); ?>/faq" class="p-recruitment__link">よくある質問</a>
        </li>
        <li class="p-recruitment__item">
          <a href="<?php echo esc_url(home_url()); ?>/about-us" class="p-recruitment__link">会社概要</a>
        </li>
      </ul>
    </div>
  </section>

  <?php get_footer(); ?>