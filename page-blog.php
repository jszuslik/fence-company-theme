<?php
/*
Template Name: Blog
*/
get_header(); ?>

<!-- Place html body content here -->
<section id="singlepost">
  <div class="container">
    <div class="row" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="col-md-3 col-lg-3">
        <?php
        $categories = get_the_category();
        $number = rand(1,30);
        if($number % 2 == 0){
          $class='fence';
        } else {
          $class='pavement';
        }
          if ( ! empty( $categories ) ) {
            $parentcat = esc_html( $categories[0]->name );
          }
        ?>
        <div class="page-sidebar">
        					<div class="page-title <?php echo $class; ?>">
        						<h2><?php
        		  						echo $parentcat;
        							?>
        						</h2>
        						<p class="tagline"><?php bloginfo( 'description' ); ?></p>
        					</div><!-- /page-title -->
        					<div class="sidebar-link col-disable">
        						<?php
        				            wp_nav_menu( array(
        				                'menu'              => 'sidebar-left',
        				                'theme_location'    => 'sidebar-left',
        				                'depth'             => 2,
        				                'container'         => 'ul',
        				                'container_class'   => 'nav nav-pills nav-stacked',
        				        		'container_id'      => '',
        				                'menu_class'        => 'nav nav-pills nav-stacked',
        				                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
        				                'walker'            => new wp_bootstrap_navwalker())
        				            );
        				        ?>
        						<hr />
        					</div><!-- /sidebar-link -->
        				</div><!-- /page-sidebar -->
      </div><!-- /col-md-3 -->
      <div class="col-md-9 col-lg-9">
        <div class="page-mainbar post">
          <div class="post-content">
                <?php
                  $loop_args= array('post_type' => array( 'blog' ),
                        'orderby'=>'post_date',
                        'order'   => 'DESC',
                        'posts_per_page' => -1
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

                                  get_template_part( 'content-blog', get_post_format() );

                                 endwhile;
                                 ?>

                    <!-- // Custom query loop pagination -->
                    <div class="next_post">
                      <?php next_posts_link( 'Older Posts  &raquo;', $loop->max_num_pages ); ?>
                    </div>
                    <div class="prev_post">
                      <?php previous_posts_link( '&laquo;  Newest Posts' ); ?>
                    </div>
                    <?php
                      // Reset postdata
                    wp_reset_postdata();
                    endif;
                    // Reset main query object
                    $wp_query = NULL;
                    $wp_query = $temp_query;
                    ?>


          </div><!-- /post-content -->
        </div><!-- /page-mainbar -->
      </div>
    </div><!-- /row -->
  </div><!-- /container -->
</section><!-- /singlepost -->




<?php get_footer(); ?>
