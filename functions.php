<?php

function university_files()
{
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_script('main-university-javascript', 'http://localhost:3000/bundled.js', NULL, '1.0', true);
}

add_action('wp_enqueue_scripts', 'university_files');

function university_features()
{
  # Add support for the HTML title tag being controlled by the WP admin dashboard
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  # Enable menus in the WordPress dashboard
  register_nav_menu('headerMenuLocation', 'Header Menu Location');
  register_nav_menu('footerLocationOne', 'Footer Location One');
  register_nav_menu('footerLocationTwo', 'Footer Location Two');
}

# execute the university_features function after the theme is enabled
add_action('after_setup_theme', 'university_features');

# execute the function university_post_types after the init hook
add_action('init', 'university_post_types');

# pass in the WordPress query object as an argument
function university_adjust_queries($query)
{
  # trigger this function if we're NOT in the WP admin dashboard
  # trigger only on the post type 'event'
  # ensure that this only triggers if this is the main query
  if (!is_admin() and is_post_type_archive('event') and $query->is_main_query()) {
    $today = date('Ymd');
    $query->set('meta_key', 'event_date');
    $query->set('orderby', 'meta_value_num');
    $query->set('order', 'ASC');
    $query->set('meta_query', array(
      array(
        'key' => 'event_date',
        'compare' => '>=',
        'value' => $today,
        'type' => 'numeric'
      )
    ));
  }
  if (!is_admin() and is_post_type_archive('program') and $query->is_main_query()) {
    $query->set('orderby', 'title');
    $query->set('order', 'ASC');
    $query->set('posts_per_page', '-1');
  }
}
# execute the function university_adjust_queries when the pre_get_posts hook fires - before posts are pulled in
add_action('pre_get_posts', 'university_adjust_queries');
