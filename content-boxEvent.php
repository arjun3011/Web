<div class="card"> 
              <div class="box">
                <div class="content">
                  <?php 
                  $today =date('Ymd');
                  $homepagePosts =new WP_Query(array(
                    'posts_per_page' => 1,
                    'post_type'  => 'event',
                              ));
                  while($homepagePosts-> have_posts()){
                      $homepagePosts-> the_post(); ?>
                    <h2 href="<?php the_permalink(); ?>">
                      <h2><?php  the_time('M');?> </h2>
                      <h7><?php  the_time('d');?></h7>
                    </h2>
                      <h3 ><?php the_title();?></h3>
                      <p><?php if(has_excerpt()){
                        echo get_the_excerpt();
                      }
                      else {
                        echo wp_trim_words(get_the_content(),18);
                      }?></p>
                      <a href="<?php the_permalink(); ?>" >Read more</a>
                    
                      <?php } wp_reset_postdata();
                  ?>
       </div>
          </div>
          </div>