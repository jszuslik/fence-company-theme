<?php
/**
 *
 * @package WordPress
 * @subpackage Century_Fence
 * @since Century Fence 1.0
 */
?>


	<div class="row">
		<!-- The new post done by user's all in the post block -->
		<div class="blog-post">
			<!-- Entry is the one post for each user -->
			<div class="entry">
				<!-- Meta for this block -->
				<?php
						$br_color = get_field('category-label');
						if($br_color == 'fence'){
							$br_color = 'br-blue';
						} else {
							$br_color = 'br-yellow';
						}
				?>
				<div class="meta <?php echo $br_color; ?>">
					<!-- Date -->
					<?php
						$archive_year  = get_the_time('Y');
						$archive_month = get_the_time('M');
						$archive_day   = get_the_time('d');
						?>
					<div class="post-date">
						<span><?php echo $archive_month; ?>  <?php echo $archive_day; ?></span><?php echo $archive_year; ?>
					</div>
				</div>
				<?php
				if ( is_single() ) : ?>
				<!-- Heading of the  post -->
				<h4><?php the_title() ?></h4>

					<?php the_content( );

				else : ?>
				<h4><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h4>
				<div class="featured-image">
					<a href="<?php the_permalink(); ?>">
						<?php
							$image = get_field('featured-image');
							$thumb = $image['sizes']['blog-archive-thumb'];
						?>
						<img src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>" />
					</a>
				</div>
				<a href="<?php the_permalink(); ?>">
				<?php
					the_excerpt( ); ?></a><?php
				endif;
				?>
				<div class="clearfix"></div>
			</div>
		</div>
	</div><hr>
