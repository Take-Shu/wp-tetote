<?php get_header(); ?>

  <main class="l-lower-benefits-main">
    <div class="p-lower-benefits-fv c-lower-fv js-observer-target">
      <div class="c-lower-fv__container">
        <hgroup class="c-lower-fv__title">
          <h1 lang="en" translate="no" class="c-lower-fv__title-en"><?php the_title(); ?></h1>
          <p class="c-lower-fv__title-ja">
            福利厚生について</p>
        </hgroup>
        <p class="c-lower-fv__text">充実した福利厚生制度を設けています</p>
      </div>
    </div>

<?php get_template_part('parts', 'location'); ?>

    <div class="p-lower-benefits">
      <section class="p-lower-benefits-systems">
        <h2 class="p-lower-benefits-systems__title c-lower-benefits__section-title">各種制度</h2>
        <table class="p-lower-benefits-systems__table">
          <tbody>
            <tr>
              <th>手当</th>
              <td>
                <ul>
                  <li>通勤手当（上限月5万円）</li>
                  <li>時間外割増手当</li>
                  <li>役職手当</li>
                  <li>退職金</li>
                </ul>
              </td>
            </tr>
            <tr>
              <th>制度</th>
              <td>財形貯蓄</td>
            </tr>
            <tr>
              <th>保険</th>
              <td>社会保険完備</td>
            </tr>
            <tr>
              <th>施設</th>
              <td>
                <ul>
                  <li>社員向けジム</li>
                  <li>社内託児所</li>
                </ul>
              </td>
            </tr>
            <tr>
              <th>休暇・休日</th>
              <td>
                <ul>
                  <li>完全週休2日制</li>
                  <li>年次有給休暇（初年度10日／年度途中入社は比例付与）</li>
                  <li>年末年始休暇（12月29日～1月3日：6日間）</li>
                  <li>夏季休暇（6月～9月中：5日間）</li>
                  <li>慶弔休暇</li>
                  <li>産前産後休暇</li>
                  <li>リフレッシュ休暇（3年勤続で5日／以降5年勤続ごとに5日支給）</li>
                </ul>
              </td>
            </tr>
          </tbody>
        </table>
      </section>
  
      <section class="p-lower-benefits-user">
        <h2 class="p-lower-benefits-user__title c-lower-benefits__section-title">制度利用者の声</h2>
        <div class="p-lower-benefits-user__contents">
          <div class="p-lower-benefits-user__wrap">
            <div class="p-lower-benefits-user__date"><time datetime="2013" class="visually-hidden">2013</time>2013年入社</div>
            <div class="p-lower-benefits-user__name">堀内 優</div>
            <p class="p-lower-benefits-user__comment">資格取得のための費用を会社が負担してくれる制度を利用して、念願の応用技術者資格を取得できました。<br>
            この制度は、自己啓発を支援してくれるので、とても助かります。今後は、さらにスキルアップを目指して、他の資格も取得していきたいと思っています。<br>会社が成長を支援してくれるので、安心して仕事に取り組むことができます。</p>
          </div>
          <div class="p-lower-benefits-user__wrap">
            <div class="p-lower-benefits-user__date"><time class="visually-hidden" datetime="2015">2015</time>2015年入社</div>
            <div class="p-lower-benefits-user__name">神凪 理沙</div>
            <p class="p-lower-benefits-user__comment">出産後、育休を取得して、現在は短時間勤務で働いています。会社が育児に理解があるので、安心して仕事に集中できます。<br>特に、社内託児所があるので、子供を預けながら安心して働けるのは助かります。また、短時間勤務制度も充実しているので、自分のペースで仕事復帰することができました。<br>今後は、子供の成長に合わせて、勤務時間を調整しながら、長く働き続けたいと思っています。</p>
          </div>
        </div>
        <div class="p-lower-benefits-user__img-wrap">
        <?php if (has_post_thumbnail()) {
          the_post_thumbnail(array(980, 560));
          } else {
            echo '<img src="' . get_template_directory_uri() . '/assets/img/common/no-image.png" width="980" height="560" alt="No Image">';
        } ?>
        </div>
      </section>
    </div>

<?php get_footer(); ?>