<?php 
# main event page 
 get_header(); ?>
 <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title">All Events</h1>
      <div class="page-banner__intro">
      </div>
    </div>  
  </div>
  <div class="container container--narrow page-section">
  <?php 
   $today =date('Ymd');
   $homepageEvents =new WP_Query(array(
     'posts_per_page' => -1 ,
     'post_type'  => 'event',
     'orderby'   => 'meta_value_num', //probably you will need this because the value is date
     'meta_key'  => 'event_date',
     'order' => 'ASC',
     'meta_query'=>array(array(
       'key'=>'event_date',
       'compare'=> '>=',
       'value'=>$today,
       'type'=>'numeric',
     )
   )
) );
 ?>
 <div class="container container--narrow page-section">
  
  <div class="generic-content"> 
  <h4 class="headline headline--small t-left" >To access past events click on this link <a href = "<?php echo site_url("/past-events");?>"><?php echo "Past Events "?></a></h4>

</div>
 
 <hr>
 <?php
   while($homepageEvents-> have_posts()){
     $homepageEvents-> the_post(); ?>
      <div class="event-summary">
    <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
      <span class="event-summary__month"><?php 
      $eventDate = new DateTime(get_field('event_date', false, false));
      echo $eventDate->format('M');
      ?></span>
      <span class="event-summary__day"><?php echo $eventDate->format('d'); ?></span>  
    </a>
    <div class="event-summary__content">
      <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h5>
     
      <p><?php if(has_excerpt()){
        echo get_the_excerpt();
      }
      else {
        echo wp_trim_words(get_the_content(),18);
      }?>
      
       <a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a></p>
       <hr>
    </div>
    
  </div>

      <?php }  wp_reset_postdata();
  ?>
    
    <?php
  
get_footer();
?>

