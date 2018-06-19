<?php
// 親テーマと子テーマのCSSを読み込み
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
    get_stylesheet_directory_uri() . '/style.css',
    array('parent-style')
    );
}

///////////////////////////////////////////////////
// カスタム処理
// ショートコードでphpファイルを呼び出す
/*
function my_php_Include($params = array()) {
  extract(shortcode_atts(array('file' => 'default'), $params));
  ob_start();
  include(STYLESHEETPATH . "/$file.php");
  return ob_get_clean();
}
add_shortcode('myphp', 'my_php_Include');

// トップページにeventのみを表示させる
function my_search_filter($query) {
  if (is_home() && $query->is_main_query() ) {
    // イベントのみ
    $query->set( 'post_type', 'event' );

    // 本日日付を取得
    $currnet_date = date_i18n( 'y/m/d' );
    // 1週間後の日付を取得
    $aweeklater = date( 'y/m/d', strtotime( '+7 days', current_time('timestamp') ) );

     $query->set( 'orderby', 'meta_value' );
     $query->set( 'meta_key', '_eventorganiser_schedule_start_start' );
     $query->set( 'order', 'ASC' );

     $query->set('meta_query',
                      array(
                          array(
                            'key' => '_eventorganiser_schedule_start_start', //カスタムフィールドを指定
                            'value' => array($currnet_date, $aweeklater), //本日日付と1週間後を設定
                            'compare' => 'BETWEEN', //本日日付と1週間後の間
                            'type' => 'DATE' //フォーマットは日付
         )
       )
    );
  }
}
add_action( 'pre_get_posts', 'my_search_filter' );
*/
?>
