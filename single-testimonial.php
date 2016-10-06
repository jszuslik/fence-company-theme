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
				<?php get_sidebar(); ?>
			</div><!-- /col-md-3 -->
			<div class="col-md-9 col-lg-9">
				<div class="page-mainbar post">
					<h3><?php the_title(); ?></h3>
					<div class="post-content">
						<div class="entry animation fadeIn">
							<?php
								// Start the loop.
								while ( have_posts() ) : the_post(); ?>

								<div class="row">
				                   	<div class="testimonial">
				                   		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				                   			<p><?php the_content(); ?></p>
										</div>
									</div>
								</div><hr>
                        		<?php 
								the_post_navigation( array(
								'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'centuryfence' ) . '</span> ' . '<span class="screen-reader-text">' . __( 'Next post:', 'centuryfence' ) . '</span> ' . '<span class="post-title">%title</span>',
								'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'centuryfence' ) . '</span> ' . '<span class="screen-reader-text">' . __( 'Previous post:', 'centuryfence' ) . '</span> ' . '<span class="post-title">%title</span>',
								) );
							
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