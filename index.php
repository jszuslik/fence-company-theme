<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Century_Fence
 * @since Century Fence 1.0
 */

get_header(); ?>

<!-- Place html body content here -->
<section id="singlepost">
  <div class="container">
    <?php
    // Start the loop.
    while ( have_posts() ) : the_post();

      /*
       * Include the post format-specific template for the content. If you want to
       * use this in a child theme, then include a file called called content-___.php
       * (where ___ is the post format) and that will be used instead.
       */
      
        get_template_part( 'content', get_post_format() );
      

      // If comments are open or we have at least one comment, load up the comment template.
      if ( comments_open() || get_comments_number() ) :
        comments_template();
      endif;

      // Previous/next post navigation.
      /*the_post_navigation( array(
        'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'centuryfence' ) . '</span> ' .
          '<span class="screen-reader-text">' . __( 'Next post:', 'centuryfence' ) . '</span> ' .
          '<span class="post-title">%title</span>',
        'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'centuryfence' ) . '</span> ' .
          '<span class="screen-reader-text">' . __( 'Previous post:', 'centuryfence' ) . '</span> ' .
          '<span class="post-title">%title</span>',
      ) );*/

    // End the loop.
    endwhile;
    ?>
  </div><!-- /container -->
</section><!-- /singlepost -->



<?php get_footer(); ?>