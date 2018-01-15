<?php // ==== CONFIGURATION (CUSTOM) ==== //

// Specify custom configuration values in this file; these will override values in `functions-config-defaults.php`
// The general idea here is to allow for themes to be customized for specific installations
define("THEME_DIR", get_template_directory_uri());
/*--- REMOVE GENERATOR META TAG ---*/
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'previous_post_rel_link', 10, 0);
remove_action('wp_head', '_ak_framework_meta_tags');
function remove_x_pingback($headers)
{
    unset($headers['X-Pingback']);
    return $headers;
}

add_filter('wp_headers', 'remove_x_pingback');


// Switch for WP AJAX Page Loader; true/false
defined( 'VOIDX_SCRIPTS_PAGELOAD' )       || define( 'VOIDX_SCRIPTS_PAGELOAD', true );



register_nav_menus(array(
  'maineMenu' => 'Главное меню',
));


//thumbnails
add_theme_support('post-thumbnails');
set_post_thumbnail_size(150, 150);

if (function_exists('add_image_size')) add_theme_support('post-thumbnails');

if (function_exists('add_image_size')) {
  add_image_size('cat-thumb', 389, 260, TRUE);
}
if (function_exists('add_image_size')) {
  add_image_size('cat-thumb-gallery', 619, 414, TRUE);
}
if (function_exists('add_image_size')) {
  add_image_size('inner-thumb', 337, 472, TRUE);
}
if (function_exists('add_image_size')) {
  add_image_size('inner-page-big-images', 1920, 1077, TRUE);
}

//word limit
function do_excerpt($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if (count($words) > $word_limit)
      array_pop($words);
  echo implode(' ', $words) . ' …';
}

//logo
function my_custom_login_logo()
{
  echo '<style type="text/css">
  #login h1 a {
  background-image:url(' . get_bloginfo('template_directory') . '../img/logo/LogoBP.svg);
  background-size: 115px auto;
  width: 115px;
  height: 87px;
}
</style>';
}

add_action('login_head', 'my_custom_login_logo');

// url for logo
function put_my_url()
{
  return ('/'); // 
}

add_filter('login_headerurl', 'put_my_url');


// Loads our  stylesheet/jquery
function add_ulr()
{
  // wp_deregister_script('jquery');
}

add_action('wp_enqueue_scripts', 'add_ulr');


// Remove Open Sans that WP adds from frontend
if (!function_exists('remove_wp_open_sans')) :
  function remove_wp_open_sans()
  {
      wp_deregister_style('open-sans');
      wp_register_style('open-sans', false);
  }
endif;

//add tag <noindex> [noindex] ... [/noindex]
function shortcode_noindex_add($atts, $content = null)
{
  return "<noindex>$content</noindex>";
}

add_shortcode('noindex', 'shortcode_noindex_add');

function rm_cyclic_nav($no_link){
  $gg_mk = '!<li(.*?)class="(.*?)current-menu-item(.*?)"><a(.*?)>(.*?)</a>!si';
  $dd_mk = '<li$1class="\\2 current-menu-item\\3">$5';
  return preg_replace($gg_mk, $dd_mk, $no_link );
}
add_filter('wp_nav_menu', 'rm_cyclic_nav');


// ACF functions

add_filter('wp_nav_menu_objects', 'navbar_icons', 10, 2);

function navbar_icons( $items, $args ) {
// loop
foreach( $items as &$item ) {
  // vars
  $icon = get_field('icon', $item);
  // append icon
  if( $icon ) {
    $item->title = '<span>'.$icon.'</span><br>'.$item->title;
      }
      
}
// return
return $items;
}

if (function_exists('acf_add_options_page')) {

  acf_add_options_page(array(
      'page_title' => 'Настройка главной страницы',
      'menu_title' => 'Главная стр.',
      'menu_slug' => 'theme-general-settings',
      'capability' => 'edit_posts',
      'redirect' => false
  ));

}

//  вывод постов родительской категории
function wph_only_parent_category($query) {
  if (!is_admin() && $query->is_main_query() && $query->is_category())
      $query->set('category__in', array(get_queried_object_id()));
}
add_action('pre_get_posts', 'wph_only_parent_category');



// обрезка описания рубрик/меток в админке
function wph_trim_cats() {
  add_filter('get_terms', 'wph_truncate_cats_description', 10, 2);
}
function wph_truncate_cats_description($terms, $taxonomies) {
  if('category' != $taxonomies[0] and 'post_tag' != $taxonomies[0])
      return $terms;
  foreach($terms as $key=>$term) {
      $terms[$key]->description = mb_substr($term->description, 0, 40);
      if($terms[$key]->description != '') {
          $terms[$key]->description .= '...';
      }
  }
  return $terms;
}
add_action('admin_head-edit-tags.php', 'wph_trim_cats');