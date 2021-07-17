<?php

function pageHeaderImage($args=NULL){
  error_reporting(E_ERROR | E_PARSE);
  if(!$args['title']){
    $args['title']=get_the_title();
  }
  if(!$args['subtitle']){
    if(get_field('page_banner_subtitle')) {
    $args['subtitle'] = get_field('page_banner_subtitle');
    }
    else{
      $args['subtitle']=str_repeat('&nbsp;', 1);
    }
  }
  if(!$args['photo']){
    if(get_field('page_banner_background_')){
      $args['photo']=get_field('page_banner_background_')['sizes'] ['pageBanner2.0'];
    }
    else{
      $args['photo']=get_theme_file_uri('/images/ocean.jpg');
    }
  }
  
  ?>
  <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo'] ; ?>);"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php echo $args['title']; ?></h1>
      
      <div class="page-banner__intro">
      <h3  class="headline headline--small"><?php echo $args['subtitle']; ?></h3>
      </div>
    </div>  
  </div>
<?php
}


function university_files() {
  wp_enqueue_script('main-university-js', get_theme_file_uri('/scripts.js'), NULL, '1.0', true);
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('university_main_styles', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'university_files');

function university_features() {
  register_nav_menu('Menu_Header', 'Header Menu Location' );
  register_nav_menu('Menu_Footer', 'Footers Menu Location' );
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_image_size('image_landscape',400,260);
  add_image_size('image_portrait',408,660,false);
}

add_action('after_setup_theme', 'university_features');
function university_post_types(){

}

add_action('init','university_post_types');
function custom_queries($query){
  if(!is_admin() AND is_post_type_archive('program') AND $query->is_main_query()){
    $query->set('orderby','title');
    $query->set('order','ASC');
    $query->set('posts_per_page',-1);
  }
}
add_action('pre_get_posts' ,'custom_queries');

add_filter(
  'page_template',
  function ($template) {
      global $post;

      if ($post->post_parent) {

          // get top level parent page
          $parent = get_post(
             reset(array_reverse(get_post_ancestors($post->ID)))
          );

          // or ...
          // when you need closest parent post instead
          // $parent = get_post($post->post_parent);

          $child_template = locate_template(
              [
                  $parent->post_name . '/page-' . $post->post_name . '.php',
                  $parent->post_name . '/page-' . $post->ID . '.php',
                  $parent->post_name . '/page.php',
              ]
          );

          if ($child_template) return $child_template;
      }
      return $template;
  }
);

