<?php
get_header();
while(have_posts()) {
    the_post();
if( $post->post_parent !== 0 ) {
    get_template_part('content', 'child');
} else {
    get_template_part('content');
}
}
get_footer();
?>