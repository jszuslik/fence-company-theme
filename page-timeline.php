<?php
/*
Template Name: Timeline
*/
?>
<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<section id="timeline">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<?php the_content(); ?>
			</div><!-- .col -->
		</div><!-- .row -->
	</div><!-- .container -->
</section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>