<?php 

//---------------------------------------------------------------------------------
//  // 投稿の名前をお知らせに変更
//---------------------------------------------------------------------------------
function Change_menulabel() {
  global $menu;
  global $submenu;
  $name = 'お知らせ';
  $menu[5][0] = $name;
  $submenu['edit.php'][5][0] = $name.'一覧';
  $submenu['edit.php'][10][0] = '新しい'.$name;
  }
  function Change_objectlabel() {
  global $wp_post_types;
  $name = 'お知らせ';
  $labels = &$wp_post_types['post']->labels;
  $labels->name = $name;
  $labels->singular_name = $name;
  $labels->add_new = _x('追加', $name);
  $labels->add_new_item = $name.'の新規追加';
  $labels->edit_item = $name.'の編集';
  $labels->new_item = '新規'.$name;
  $labels->view_item = $name.'を表示';
  $labels->search_items = $name.'を検索';
  $labels->not_found = $name.'が見つかりませんでした';
  $labels->not_found_in_trash = 'ゴミ箱に'.$name.'は見つかりませんでした';
}
add_action( 'init', 'Change_objectlabel' );
add_action( 'admin_menu', 'Change_menulabel' );

//---------------------------------------------------------------------------------
//  使用しないメニューを非表示にする
//---------------------------------------------------------------------------------

function remove_admin_menus() {
  global $menu;
  // unsetで非表示にするメニューを指定
  //unset($menu[2]);      // ダッシュボード
//    unset($menu[5]);        // 投稿
  //unset($menu[10]);     // メディア
  //unset($menu[20]);     // 固定ページ
  unset($menu[25]);  // コメント
  //unset($menu[60]);     // 外観
  //unset($menu[65]);     // プラグイン
  //unset($menu[70]);     // ユーザー
  //unset($menu[75]);     // ツール
  //unset($menu[80]);     // 設定
}

add_action('admin_menu', 'remove_admin_menus');

//---------------------------------------------------------------------------------
//  head内の不要な要素を削除
//---------------------------------------------------------------------------------

remove_action( 'wp_head', 'feed_links', 2 ); //RSSフィード
remove_action( 'wp_head', 'feed_links_extra', 3 ); //RSSフィード
remove_action( 'wp_head', 'rsd_link' ); //Really Simple Discovery
remove_action( 'wp_head', 'wlwmanifest_link' ); //Windows Live Writer
remove_action( 'wp_head', 'index_rel_link' ); //indexへのリンク
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); //分割ページへのリンク
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); //分割ページへのリンク
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); //前後のページへのリンク
remove_action( 'wp_head', 'wp_generator' ); //WordPressのバージョン
remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); //絵文字対応
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); //絵文字対応
remove_action( 'wp_print_styles', 'print_emoji_styles' ); //絵文字対応
remove_action( 'admin_print_styles', 'print_emoji_styles' ); //絵文字対応
remove_action('wp_head','rest_output_link_wp_head'); //Embed対応
remove_filter('the_content', 'wpautop'); //投稿に<p>タグが自動的に挿入される機能
remove_filter('the_excerpt', 'wpautop');

// ウィジェット「最近のコメント」の表示
function remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'remove_recent_comments_style' );

//---------------------------------------------------------------------------------
//  ページに沿ったtitleタグを出力する
//---------------------------------------------------------------------------------
add_theme_support('title-tag');

//---------------------------------------------------------------------------------
//  アイキャッチ画像を設定可能にする
//---------------------------------------------------------------------------------
add_theme_support('post-thumbnails');

//---------------------------------------------------------------------------------
//  カスタムメニュー機能を設定可能にする
//---------------------------------------------------------------------------------

add_theme_support('menus');

//---------------------------------------------------------------------------------
//  カスタムメニューの<li>にクラスを付与する
//---------------------------------------------------------------------------------
function add_nav_class($class) {
  return $class = array('gnav_item');
}
add_filter("nav_menu_css_class", "add_nav_class");

//---------------------------------------------------------------------------------
//  メインループの表示数を制御する
//---------------------------------------------------------------------------------
function newPrePosts($query) {
  if (is_admin() || !$query->is_main_query()){
    return;
  }
  if ($query->is_home()) {
    $query->set('post_type', 'post');
    $query->set('posts_per_page', '4');
  }
}
add_action('pre_get_posts', 'newPrePosts');

//---------------------------------------------------------------------------------
//  アイキャッチデフォルト設定
//---------------------------------------------------------------------------------
function save_default_thumbnail( $post_id ) {
  $post_thumbnail = get_post_meta( $post_id, $key = '_thumbnail_id', $single = true );
  if ( !wp_is_post_revision( $post_id ) ) {
    if ( empty( $post_thumbnail ) ) {
      update_post_meta( $post_id, $meta_key = '_thumbnail_id', $meta_value = '15' );
    }
  }
}
add_action( 'save_post', 'save_default_thumbnail' );

//---------------------------------------------------------------------------------
//  管理バーの非表示
//---------------------------------------------------------------------------------
add_filter('show_admin_bar', '__return_false');

//---------------------------------------------------------------------------------
//  ぱんくずリスト
//---------------------------------------------------------------------------------
// function output_breadcrumb(){
//   $home = '<li><a href="'.get_bloginfo('url').'">ホーム</a></li>';
//   echo '<ul class="breadcrumb">';

//   // トップページの場合
//   if ( is_front_page() ) {

//   // カテゴリーページの場合
//   } else if ( is_category() ) {
//   $cat = get_queried_object();
//   $cat_id = $cat->parent;
//   $cat_list = array();
//   while($cat_id != 0) {
//     $cat = get_category( $cat_id );
//     $cat_link = get_category_link( $cat_id );
//     array_unshift( $cat_list, '<li><a href="'.$cat_link.'">'.$cat->name.'</a></li>' );
//     $cat_id = $cat->parent;
//   }
//   echo $home;
//   foreach ($cat_list as $value) {
//     echo $value;
//   }
//   the_archive_title('<li>', '</li>');

//   // アーカイブページの場合
//   } else if ( is_archive() ) {
//   echo $home;
//   the_archive_title('<li>', '</li>');

//   // 投稿ページの場合
//   } else if ( is_single() ) {
//   $cat = get_the_category();
//   if( isset( $cat[0]->cat_ID ) ) $cat_id = $cat[0]->cat_ID;
//   $cat_list = array();
//   while( $cat_id != 0 ) {
//     $cat = get_category( $cat_id );
//     $cat_link = get_category_link( $cat_id );
//     array_unshift( $cat_list, '<li><a href="'.$cat_link.'">'.$cat->name.'</a></li>' );
//     $cat_id = $cat->parent;
//   }
//   echo $home;
//   foreach($cat_list as $value) {
//     echo $value;
//   }
//   the_title('<li>', '</li>');

//   // 固定ページの場合
//   } else if ( is_page() ) {
//   echo $home;
//   the_title('<li>', '</li>');

//   // 検索結果の場合
//   } else if ( is_search() ) {
//   echo $home;
//   echo '<li>「'.get_search_query().'」の検索結果</li>';

//   // 404ページの場合
//   } else if ( is_404() ) {
//   echo $home;
//   echo '<li>ページが見つかりません</li>';
//   }
//   echo '</ul>';
// }

function output_breadcrumb($include_category = 1, $include_tag = 1, $include_taxonomy = 1)
{
// ベースパンくず(サイト名など)
$base_breadcrumb = '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'.get_home_url().'" itemprop="url"><span itemprop="title">HOME</span></a></li>';
$top_url = get_home_url(null,'/');
// ループ外対応
global $query_string;
global $post;
query_posts($query_string);
if (have_posts()) : while(have_posts()) : the_post();
endwhile; endif;
// クエリリセットする
wp_reset_query();
// ページ数を取得(ページ数(0の場合は1ページ目なので1に変更する))
if(get_query_var('paged') == 0): $page = 1; else: $page = get_query_var('paged') ; endif;

// 投稿・固定ページかつアタッチメントページ以外の場合
if(is_singular() && !is_attachment())
{
// 記事についているカテゴリを全て取得する
$categories = get_the_category();
// カテゴリがある場合に実行する
if(!empty($categories))
{
$category_count = count($categories);
$loop = 1;
$category_list = '';
foreach($categories as $category)
{
// 値が1だったら、URLにカテゴリーのタクソノミーを含めて変数に格納する。
if($include_category === 1)
{
$category_list .= '<a href="'.$top_url.esc_html($category->taxonomy).'/'.esc_html($category->slug).'/" itemprop="url"><span itemprop="title">'.esc_html($category->name).'</span></a>';
}
// 値が指定されていないか1以外だったら、URLにカテゴリーのタクソノミーを含めないで変数に格納する。
else
{
$category_list .= '<a href="'.$top_url.esc_html($category->slug).'/" itemprop="url"><span itemprop="title">'.esc_html($category->name).'</span></a>';
}
// ループの最後でない場合のみスラッシュ追加（複数カテゴリ対応）
if($loop != $category_count)
{
$category_list .= ' / ';
}
++$loop;
}
}
// カテゴリがない場合はNULLを格納する
else
{
$category_list = null;
}
// 記事についているタグを全て取得する
$tags = get_the_tags();
// タグがあれば実行する
if(!empty($tags))
{
$tags_count = count($tags);
$loop=1;
$tag_list = '';
foreach($tags as $tag)
{
// 値が1だったら、URLにタグのタクソノミーを含めて変数に格納する。
if($include_tag === 1)
{
$tag_list .= '<a href="'.$top_url.esc_html($tag->taxonomy).'/'.esc_html($tag->slug).'/" itemprop="url"><span itemprop="title">'.esc_html($tag->name).'</span></a>';
}
// 値が指定されていないか1以外だったら、URLにタグのタクソノミーを含めないで変数に格納する。
else
{
$tag_list .= '<a href="'.$top_url.esc_html($tag->slug).'/" itemprop="url"><span itemprop="title">'.esc_html($tag->name).'</span></a>';
}
// ループの最後でない場合のみスラッシュ追加（複数タグ対応）
if($loop !== $tags_count)
{
$tag_list .= ' / ';
}
++$loop;
}
}
// タグがない場合はNULLを格納する
else
{
$tag_list = null;
}
// タクソノミーを全て取得する
$taxonomies = get_the_taxonomies();
// タクソノミーがある場合に実行する
if(!empty($taxonomies))
{
$term_list = '';
$taxonomies_count = count($taxonomies);
$taxonomies_loop = 1;
foreach(array_keys($taxonomies) as $key)
{
// タームを取得
$terms = get_the_terms($post->ID, $key);
$terms_count = count($terms);
$loop = 1;
foreach($terms as $term)
{
// 値が1だったら、URLにタクソノミーを含めて変数に格納する。
if($include_taxonomy === 1)
{
$term_list .= '<a href="'.$top_url.esc_html($term->taxonomy).'/'.esc_html($term->slug).'/" itemprop="url"><span itemprop="title">'.esc_html($term->name).'</span></a>';
}
// 値が指定されていないか1以外だったらURLにタクソノミーを含めないで変数に格納する。
else
{
$term_list .= '<a href="'.$top_url.esc_html($term->slug).'/" itemprop="url"><span itemprop="title">'.esc_html($term->name).'</span></a>';
}
// ループの最後でない場合のみスラッシュ追加（複数ターム対応）
if($loop != $terms_count)
{
$term_list .= ' / ';
}
++$loop;
}
// ループの最後でない場合のみスラッシュ追加（複数タクソノミー対応）
if($taxonomies_loop != $taxonomies_count)
{
$term_list .= ' / ';
}
++$taxonomies_loop;
}
}
// タクソノミーがない場合はNULLを格納する
else
{
$term_list = null;
}
}
// 基本パンくずリストを変数に格納する。
$breadcrumb_lists = $base_breadcrumb;
// ホームの場合
if(is_home())
{
}
// カスタム投稿タイプアーカイブの場合
elseif(is_post_type_archive())
{
// ページ数が1より大きい場合(○ページ目)を追加して格納する
if($page > 1)
{
$breadcrumb_lists .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">'.esc_html(get_post_type_object( get_post_type() )->label).'の記事一覧('.$page.'ページ目)</li>';
}
// ページ数が1の場合は(○ページ目)はなしで格納する
else
{
$breadcrumb_lists .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">'.esc_html(get_post_type_object( get_post_type() )->label).'の記事一覧</li>';
}
}
// カスタム投稿タイプ以外のアーカイブの場合
elseif(is_archive())
{
// 年アーカイブの場合
if(is_year())
{
// ページ数が1より大きい場合(○ページ目)を追加して格納する
if($page > 1)
{
$breadcrumb_lists .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">'.esc_html(get_the_time("Y年")).'の記事一覧('.$page.'ページ目)</li>';
}
// ページ数が1の場合は(○ページ目)はなしで格納する
else
{
$breadcrumb_lists .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">'.esc_html(get_the_time("Y年")).'の記事一覧</li>';
}
}
// 月アーカイブの場合
elseif(is_month())
{
// ページ数が1より大きい場合(○ページ目)を追加して格納する
if($page > 1)
{
$breadcrumb_lists .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">'.esc_html(get_the_time("Y年m月")).'の記事一覧('.$page.'ページ目)</li>';
}
// ページ数が1の場合は(○ページ目)はなしで格納する
else
{
$breadcrumb_lists .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">'.esc_html(get_the_time("Y年m月")).'の記事一覧</li>';
}
}
// 日アーカイブの場合
elseif(is_day())
{
// ページ数が1より大きい場合(○ページ目)を追加して格納する
if($page > 1)
{
$breadcrumb_lists .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">'.esc_html(get_the_time("Y年m月d日")).'の記事一覧('.$page.'ページ目)</li>';
}
// ページ数が1の場合は(○ページ目)はなしで格納する
else
{
$breadcrumb_lists .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">'.esc_html(get_the_time("Y年m月d日")).'の記事一覧</li>';
}
}
// カテゴリの場合
elseif(is_category())
{
// ページ数が1より大きい場合(○ページ目)を追加して格納する
if($page > 1)
{
$breadcrumb_lists .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">'.esc_html(single_cat_title('',false)).'の記事一覧('.$page.'ページ目)</li>';
}
// ページ数が1の場合は(○ページ目)はなしで格納する
else
{
$breadcrumb_lists .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">'.esc_html(single_cat_title('',false)).'の記事一覧</li>';
}
}
// タグの場合
elseif(is_tag())
{
// ページ数が1より大きい場合(○ページ目)を追加して格納する
if($page > 1)
{
$breadcrumb_lists .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">'.esc_html(single_tag_title('',false)).'の記事一覧('.$page.'ページ目)</li>';
}
// ページ数が1の場合は(○ページ目)はなしで格納する
else
{
$breadcrumb_lists .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">'.esc_html(single_tag_title('',false)).'の記事一覧</li>';
}
}
// タクソノミー(カスタム分類)の場合
elseif(is_tax())
{
// ページ数が1より大きい場合(○ページ目)を追加して格納する
if($page > 1)
{
$breadcrumb_lists .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">'.esc_html(single_term_title('',false)).'の記事一覧('.$page.'ページ目)</li>';
}
// ページ数が1の場合は(○ページ目)はなしで格納する
else
{
$breadcrumb_lists .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">'.esc_html(single_term_title('',false)).'の記事一覧</li>';
}
}
}
// 投稿ページ
elseif(is_single())
{
// ページ数を取得(ページ数(0の場合は1ページ目なので1に変更する))
if(get_query_var('page') == 0): $page = 1; else: $page = get_query_var('page') ; endif;
// 通常投稿の場合
if(get_post_type() === 'post')
{
// カスタムフィールドの値を取得
$seo_title = esc_html(get_post_meta($post->ID, 'seo_title', true));

// カテゴリがある場合のみ追加
if(!empty($category_list))
{
$breadcrumb_lists .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">'.$category_list.'</li>';
}

// 2ページ目以降の場合
if($page > 1)
{
// カスタムフィールドに値があったらその値を格納する
if(!empty($seo_title))
{
$breadcrumb_lists .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">'.$seo_title.'</li>';
}
// カスタムフィールドに値がなかった場合
else
{
// ページが分割されている場合のタイトル取得
if(function_exists('get_current_split_string'))
{
$split_title = esc_html(get_current_split_string($page));
}
else
{
$split_title = null;
}
// ページが分割されている場合のタイトルがあった場合はそれを加える
if(!empty($split_title))
{
$breadcrumb_lists .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">'.esc_html(get_the_title()).'【'.$split_title.'】</li>';
}
// それ以外は(○ページ目)を加える
else
{
$breadcrumb_lists .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">'.esc_html(get_the_title()).'('.$page.'ページ目)</li>';
}
}
}
// 1ページ目の場合
else
{
// カスタムフィールドに値があったらその値を格納する
if(!empty($seo_title))
{
$breadcrumb_lists .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">'.$seo_title.'</li>';
}
// カスタムフィールドに値がなかった場合
else
{
$breadcrumb_lists .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">'.esc_html(get_the_title()).'</li>';
}
}
}
// カスタム投稿の場合
else
{
// カスタム投稿名を取得
$custom_title = esc_html(get_post_type_object(get_post_type())->label );
// カスタム投稿のスラッグ名を取得
$custom_name = esc_html(get_post_type_object(get_post_type())->name);
// タームがある場合のみ追加
if(!empty($term_list))
{
$breadcrumb_lists .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">'.$term_list.'</li>';
}
$breadcrumb_lists .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'.get_home_url().'/'.$custom_name.'" itemprop="url">'.$custom_title.'</a></li><li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">'.esc_html(get_the_title()).'</li>';
}
}
// 固定ページ
elseif(is_page())
{
$breadcrumb_lists .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">'.esc_html(get_the_title()).'</li>';
}
// 検索結果
elseif(is_search())
{
// ページ数が1より大きい場合(○ページ目)を追加して格納する
if($page > 1)
{
$breadcrumb_lists .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">「'.esc_html(get_search_query()).'」で検索した結果('.$page.'ページ目)</li>';
}
// ページ数が1の場合は(○ページ目)はなしで格納する
else
{
$breadcrumb_lists .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">「'.esc_html(get_search_query()).'」で検索した結果</li>';
}
}
// 404ページの場合
elseif(is_404())
{
$breadcrumb_lists .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">お探しのページは見つかりませんでした</li>';
}
else
{
$breadcrumb_lists = $base_breadcrumb;
}
// パンくずリスト成形
if(!empty($breadcrumb_lists))
{
$breadcrumb_lists = '<ul>'.$breadcrumb_lists.'</ul>';
}
return $breadcrumb_lists;
}

//---------------------------------------------------------------------------------
//  余計な先頭文字を削除
//---------------------------------------------------------------------------------

add_filter( 'get_the_archive_title', function ($title) {
  if (is_category()) {
      $title = single_cat_title('',false);
  } elseif (is_tag()) {
      $title = single_tag_title('',false);
} elseif (is_tax()) {
    $title = single_term_title('',false);
} elseif (is_post_type_archive() ){
  $title = post_type_archive_title('',false);
} elseif (is_date()) {
    $title = get_the_time('Y年n月');
} elseif (is_search()) {
    $title = '検索結果：'.esc_html( get_search_query(false) );
} elseif (is_404()) {
    $title = '「404」ページが見つかりません';
} else {

}
  return $title;
});


//---------------------------------------------------------------------------------
//  人気記事のPV取得
//---------------------------------------------------------------------------------

function getPostViews($postID) {
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if ($count=='') {
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
    return "0 View";
  }
  return $count.' Views';
}

//---------------------------------------------------------------------------------
//  人気記事のPVをカウント
//---------------------------------------------------------------------------------
function setPostViews($postID) {
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if ($count=='') {
    $count = 0;
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
  } else {
    $count++;
    update_post_meta($postID, $count_key, $count);
  }

  // デバッグ start
  // echo '';
  // echo 'console.log("postID: ' . $postID .'");';
  // echo 'console.log("カウント: ' . $count .'");';
  // echo '';
  // デバッグ end
}

//---------------------------------------------------------------------------------
//  カスタム投稿タイプを追加
//---------------------------------------------------------------------------------

add_action( 'init', 'custom_post_type' );
function custom_post_type() {
  register_post_type( 'review', // カスタム投稿タイプのスラッグの指定
    array(
      'labels' => array(
        'name' => __( 'お客様の声' ),          // メニューに表示されるアサル（ASAL）
        'singular_name' => __( 'お客様の声' ), // 単体系のアサル（ASAL）
        'add_new' => _x('新規追加', 'blog'),        // 新規追加のアサル（ASAL）
        'add_new_item' => __('新規追加')            // 新規追加のアサル（ASAL）
      ),
      'public' => true,                 // 投稿タイプをパブリックにする
      'has_archive' => true,            // アーカイブを有効にする
      'hierarchical' => false,          // ページ階層の指定
      'menu_position' =>5,              // 管理画面上の配置指定
      'menu_icon' => 'dashicons-edit',  // アイコン
      'supports' => array('title','editor','thumbnail','revisions') // サポート指定
      // 全てのサポートを使う場合は下記参照
      //'supports' => array('title','editor','thumbnail','custom-fields','excerpt','author','trackbacks','comments','revisions','page-attributes')
    )
  );
}

//---------------------------------------------------------------------------------
//  タクソノミーを追加
//---------------------------------------------------------------------------------

function add_taxonomy() {
  register_taxonomy(
    'service', // タクソノミースラッグ
    'review',          // 使用するカスタム投稿タイプを指定
    array(
      'hierarchical' => true,          // 階層を持たせるかを指定(trueでカテゴリー、falseでタグ)
      'label' => 'カテゴリー',          // メニューに表示されるアサル（ASAL）
      'singular_label' => 'カテゴリー', // 単体系のアサル（ASAL）
      'public' => true,                // 投稿タイプをパブリックにする
      'show_ui' => true                // 管理画面上に編集画面を表示するかを指定
    )
  );
}
add_action( 'init', 'add_taxonomy' );


//---------------------------------------------------------------------------------
//  検索結果から固定ページを除外
//---------------------------------------------------------------------------------
/**
* 検索結果から固定ページを除外する

* @param string $search SQLのWHERE句の検索条件文

* @param object $wp_query WP_Queryのオブジェクト

* @return string $search 条件追加後の検索条件文

*/

function my_posts_search( $search, $wp_query ){

  //検索結果ページ・メインクエリ・管理画面以外の3つの条件が揃った場合

if ( $wp_query->is_search() && $wp_query->is_main_query() && !is_admin() ){

    // 検索結果を投稿タイプに絞る

  $search .= " AND post_type = 'post' ";

  return $search;

}

  return $search;

}

add_filter('posts_search','my_posts_search', 10, 2);