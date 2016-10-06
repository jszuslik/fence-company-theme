<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Century_Fence
 * @since Century Fence 1.0
 */
?>

<!-- Place html body content here -->

			<div class="col-md-9 col-lg-9">
				<div class="page-mainbar post">
					<h1><?php the_title(); ?></h1>
					<div class="post-content">
						<div class="entry animation fadeIn">
							<?php the_content(); ?>
						</div><!-- /entry -->
					</div><!-- /post-content -->
				</div><!-- /page-mainbar -->
			</div>
		</div><!-- /row -->