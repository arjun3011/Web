<?php get_header(); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1" /> 
  <div class="page-banner">
  <div class="page-banner__bg-image " style="background-image: url(<?php echo get_theme_file_uri('/images/library-hero.jpg') ?>);"></div>

    <div class="page-banner__content container t-center c-white">
      <h1 class="headline headline--large t-special_center">Welcome!!!</h1>
      <a href="<?php echo get_post_type_archive_link("program"); ?>" class="btn t-special_left btn--large  btn--blue ">Explored</a>
      <a href="http://prototype1.local/gallery-2/" class="btn t-special_right btn--large btn--white">Gallery</a>
    </div>
  </div>













  <!-- Box -->
<meta charset ="utf-8">
<link rel="stylesheet" herf="style.css">
  <div class="container_box">
    <?php                  
      get_template_part('content', 'boxBlog');
    ?>
    <?php 
       get_template_part('content', 'boxEvent');
    ?>
                                
    <div class="card"> 
    <div class="box">
    <div class="content">
        <h2>2 </h2>
      </div>
          </div>
          </div>
          

          

          </div>
     



          
         
          
          



















<?php
echo do_shortcode('[smartslider3 slider="2"]'); 
?> 

  <?php get_footer();

?>