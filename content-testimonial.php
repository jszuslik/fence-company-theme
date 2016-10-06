<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Century_Fence
 * @since Century Fence 1.0
 */
?>


	<div class="row">
       	<div class="testimonial">
       		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
       			<p><?php the_content(); ?></p>
						<p><?php the_field('customer_name'); ?></p>
			</div>
		</div>
	</div><hr>
