<?php
/*
Template Name: Testimonials
*/
?>
<?php get_header(); ?>

<!-- Place html body content here -->
<section id="singlepost">
  <div class="container">
    <div class="row" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="col-md-3 col-lg-3">
        <?php get_sidebar(); ?>
      </div><!-- /col-md-3 -->
      <div class="col-md-9 col-lg-9">
        <div class="page-mainbar post">
          <h3><?php the_title(); ?></h3>
          <div class="post-content">
            <div class="entry animation fadeIn">
              

                <?php
                  $loop_args= array('post_type' => array( 'testimonial' ),
                        'orderby'=>'menu_order',
                        'order'   => 'ASC',
                        'posts_per_page' => 3
                        );
                  $loop_args['paged'] = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                
                        $loop = new WP_Query($loop_args);
                        
                      // Pagination fix
                      global $wp_query;
                  $temp_query = $wp_query;
                  $wp_query   = NULL;
                  $wp_query   = $loop;
                            if ( $loop->have_posts() ) :
                              while ( $loop->have_posts() ) : $loop->the_post(); 

                                  get_template_part( 'content-testimonial', get_post_format() );

                                 endwhile;
                                 ?>

                    <!-- // Custom query loop pagination -->
                    <div class="next_post">
                      <?php next_posts_link( 'Newer Posts  &raquo;', $loop->max_num_pages ); ?>
                    </div>
                    <div class="prev_post">
                      <?php previous_posts_link( '&laquo;  Older Posts' ); ?>
                    </div>
                    <?php
                      // Reset postdata
                    wp_reset_postdata();
                    endif;
                    // Reset main query object
                    $wp_query = NULL;
                    $wp_query = $temp_query;
                    ?>
                
            </div><!-- /entry -->
          </div><!-- /post-content -->
        </div><!-- /page-mainbar -->
      </div>
    </div><!-- /row -->
  </div><!-- /container -->
</section><!-- /singlepost -->




<?php get_footer(); ?>