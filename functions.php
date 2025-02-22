<?php
/* ------------------------------------------------------
// js,cssファイルの読み込み
*/
function my_enqueue_scripts() {
    $uri = esc_url(get_template_directory_uri());

    // 共通
    wp_enqueue_style('my_reset' , $uri . '/assets/css/reset.css', array(), '1.0');

    // front-pageのみ
    if (is_front_page()) {
        wp_enqueue_script('my_main' , $uri . '/assets/js/main.js' , array(), '1.0', true);
        wp_enqueue_script('swiper_bundle' , $uri . '/assets/js/swiper-bundle.min.js' , array(), '11.2.4', true);
        wp_enqueue_script('my_swiper' , $uri . '/assets/js/swiper.js' , array('swiper_bundle'), '1.0', true);
        wp_enqueue_style('swiper_style' , $uri . '/assets/css/swiper-bundle.css', array('my_reset'), '11.2.4');
        wp_enqueue_style('my_style' , $uri . '/assets/css/style.css', array('my_reset', 'swiper_style'), '1.0');
    } else {
        wp_enqueue_script('my_lower_js' , $uri . '/assets/js/lower.js' , array(), '1.0', true);
        wp_enqueue_style('my_style' , $uri . '/assets/css/style.css', array('my_reset'), '1.0');
    }
}
add_action('wp_enqueue_scripts', 'my_enqueue_scripts');


/* ------------------------------------------------------
// 編集画面でアイキャッチ画像を選択可にする
*/
add_theme_support('post-thumbnails');


/* ------------------------------------------------------
// Contact Form7のp,brタグを消す
*/
add_filter('wpcf7_autop_or_not', 'customize_wpcf7_autop');
function customize_wpcf7_autop() {
    return false;
}

/* ------------------------------------------------------
// Contact Form7のラジオボタンの選択を必須にする
*/
function wpcf7_add_shortcode_radio_required() {
    wpcf7_add_shortcode(array('radio*'), 'wpcf7_checkbox_form_tag_handler', true);
}
add_action('wpcf7_init', 'wpcf7_add_shortcode_radio_required');
add_filter('wpcf7_validate_radio*', 'wpcf7_checkbox_validation_filter', 10, 2);


/* ------------------------------------------------------
// エントリー完了ページ
*/
add_action('wp_footer', 'redirect_to_thanks_page');
function redirect_to_thanks_page() {
    $homeUrl = home_url();
    echo <<< EOD
        <script>
            document.addEventListener('wpcf7mailsent', () => {
                location = '{$homeUrl}/entry-thanks/';
            }, false);
        </script>
    EOD;
}