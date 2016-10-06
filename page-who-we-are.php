<?php
/*
Template Name: Who We Are page
*/
?>
<?php get_header(); ?>

<!-- Place html body content here -->
<section id="whoweare">
  <div class="container">
    <div class="row">
      <?php
        $pageid = $post->ID;
        $category = get_the_category( $pageid );
          if ($category[0]) {
          $parentID = $category[0]->cat_ID;
          }
      $args = array(  //Set the arguments to the query, i.e. what posts are you looking for, how many, etc.
      'post_type' => 'who-we-are',
      'orderby'=>'menu_order',
      'order'   => 'ASC',
      'post_count' => -1, //Set to -1 for unlimited
      'tax_query' => array(
                      array(
                          'taxonomy' => 'category',
                          'field' => 'ID',
                          'terms' => $parentID
                      ))
          );

          $whoweare_loop = null;
          $whoweare_loop = new WP_Query($args);   //Create a new query, passing it the arguments you specified above

        while ( $whoweare_loop->have_posts() ) : $whoweare_loop->the_post();
          get_field('test_field'); ?>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
              <div class="panel panel-default">
                <a href="<?php the_field('link_to_post')?>">
                  <div class="icon">
                    <i class="<?php the_field('icon'); ?>"></i>
                  </div>
                  <div class="panel-heading fence"><h3><?php the_title() ?></h3></div>
                </a>
                <div class="panel-body">
                  <p><?php the_field( 'excerpt'); ?></p>
                  <h4 class="pull-right btn-funnel">
                    <a href="<?php the_field('link_to_post')?>">Read More <i class="fa fa-long-arrow-right"></i></a>
                  </h4>
                </div>
              </div>
            </div>
            <?php endwhile; ?>
            <?php wp_reset_query(); ?>
    </div><hr>
  </div><!-- /container -->
</section><!-- /landingpage -->



<?php get_footer(); ?>
