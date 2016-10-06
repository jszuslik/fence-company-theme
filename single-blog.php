<?php
/**
 * The template for displaying all testimonials
 *
 * @package WordPress
 * @subpackage Century_Fence
 * @since Century Fence 1.0
 */
?>
<?php get_header(); ?>

<!-- Place html body content here -->
<section id="singlepost">
	<div class="container">
		<div class="row" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="col-md-3 col-lg-3">
				<?php
						$cat_name = get_field('category-label');
						if($cat_name == 'fence'){
							$cat_name = 'Fence';
						} else {
							$cat_name = 'Pavement Marking';
						}
				?>
				<div class="page-sidebar">
									<div class="page-title <?php the_field('category-label'); ?>">
										<h2><?php
						  						echo $cat_name;
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
						<div class="entry animation fadeIn">
							<?php
								// Start the loop.
								while ( have_posts() ) : the_post();

								get_template_part( 'content-blog', get_post_format() );
								?>

								<!-- // Custom query loop pagination -->
			                    <div class="next_post">
			                      <?php next_post_link( '%link', 'Next Post  &raquo' ); ?>
			                    </div>
			                    <div class="prev_post">
			                      <?php previous_post_link( '%link', '&laquo Prev Post' ); ?>
			                    </div>
			                    <?php

							// End the loop.
							endwhile;
							?>

						</div><!-- /entry -->
					</div><!-- /post-content -->
				</div><!-- /page-mainbar -->
			</div>
		</div><!-- /row -->
			</div><!-- /container -->
</section><!-- /singlepost -->



<?php get_footer(); ?>
