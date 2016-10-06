<?php
/*
Template Name: Pavement Landing page
*/
?>
<?php get_header(); ?>

<!-- Place html body content here -->
<section id="carousel-content">
    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner">
        <?php $args = array(  //Set the arguments to the query, i.e. what posts are you looking for, how many, etc.
      'post_type' => 'pavement-carousel',
      'orderby'=>'menu_order',
      'order'   => 'ASC',
      'post_count' => -1 //Set to -1 for unlimited
          );

          $carousel_loop = null;
          $carousel_loop = new WP_Query($args);   //Create a new query, passing it the arguments you specified above

        while ( $carousel_loop->have_posts() ) : $carousel_loop->the_post();
          get_field('test_field'); ?>
        <div class="item <?php the_field('is_active') ?>">
          <?php
            $image = get_field('image');
            $thumb = $thumb = $image['sizes']['slider-thumb'];
          ?>
          <img src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>">
          <div class="container">
            <div class="carousel-caption <?php the_field('slide_alignment') ?>">
              <h1><?php the_title() ?></h1>
              <p class="slide-caption"><?php the_field('slide_caption')?></p>
              <p><a class="btn <?php the_field('button_color') ?>" href="<?php the_field('link_to_page') ?>"><?php the_field('button_text') ?></a></p>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
      </div>

      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="icon-prev"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="icon-next"></span></a>
    </div><!-- /.carousel -->
</section>
<section id="fencepage">
  <div class="container">
    <div class="row">
      <?php $args = array(  //Set the arguments to the query, i.e. what posts are you looking for, how many, etc.
      'post_type' => 'pavement-category',
      'order'   => 'ASC',
      'post_count' => -1 //Set to -1 for unlimited
          );

          $pavement_category_loop = null;
          $pavement_category_loop = new WP_Query($args);   //Create a new query, passing it the arguments you specified above

        while ( $pavement_category_loop->have_posts() ) : $pavement_category_loop->the_post();
          $custom = get_field('excerpt');
          get_field('test_field'); ?>
            <div class="col-xs-12 col-sm-12 col-md-15 col-lg-15">
              <div class="panel panel-default">
                <div class="circular">
                  <a href="<?php the_field('link_to_post')?>"><img src="<?php the_field('main_image')?>" alt="" /></a>
                </div>
                <div class="panel-heading pavement"><h3><a href="<?php the_field('link_to_post')?>"><?php the_title() ?></a></h3></div>
                <div class="panel-body">
                  <p><?php the_field('excerpt') ?></p>
                  <h4 class="pull-right btn-funnel pave"><a href="<?php the_field('link_to_post')?>">Read More <i class="fa fa-long-arrow-right"></i></a></h4>
                </div>
              </div>
            </div>
            <?php endwhile; ?>
            <?php wp_reset_query(); ?>
    </div><hr>
  </div><!-- /container -->
</section><!-- /landingpage -->
<section id="content">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <blockquote class="left">
            <?php the_field('content_block_1') ?>
        </blockquote>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="featured featuredpavement">
        	<h2><?php the_field('custom_button_1_text'); ?></h2>
        	<a href="<?php the_field('custom_button_1'); ?>"><h2>Click Here <i class="fa fa-arrow-circle-right"></i></h2></a>
        </div>
      </div>
    </div><hr>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <a href="#" data-toggle="modal" data-target="#imageModal">
        <div class="featured featuredpavement big">
        	<h2>See Our Work!</h2>
        	<h2>Enter Gallery <i class="fa fa-arrow-circle-right"></i></h2>
        </div></a>
      </div>
      <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		  <div class="modal-content">
		     <div class="gallery-modal">
		        <?php echo get_post_gallery(); ?>
		    </div>
		  </div>
		</div>
	  </div>
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="featured featuredpavement big">
        	<h2><?php the_field('custom_button_2_text'); ?></h2>
        	<a href="<?php the_field('custom_button_2'); ?>"><h2>GO! <i class="fa fa-arrow-circle-right"></i></h2></a>
        </div>
      </div>
    </div><hr>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

          <?php the_field('content_block_2') ?>

      </div>
    </div><hr>
    <div class="row">
    	<div id="vendorOwl" class="owl-carousel owl-theme">
    	<?php
      $postid = get_the_ID();
                    $category = get_the_category( $postid );
                    if ($category[0]) {
                      $parentID = $category[0]->cat_ID;
                  }

      $args = array(  //Set the arguments to the query, i.e. what posts are you looking for, how many, etc.
      'post_type' => 'vendors',
      'order'   => 'ASC',
      'post_count' => -1, //Set to -1 for unlimited
      'tax_query' => array(
                      array(
                          'taxonomy' => 'category',
                          'field' => 'id',
                          'terms' => $parentID
                      ))
          );

          $pavement_category_loop = null;
          $pavement_category_loop = new WP_Query($args);   //Create a new query, passing it the arguments you specified above

        while ( $pavement_category_loop->have_posts() ) : $pavement_category_loop->the_post(); ?>
		        <div class="item">
		        	<a href="<?php the_field('vendor-website'); ?>" target="_blank">
		        		<img src="<?php the_field('vendor-logo'); ?>" class="img-responsive" alt="" />
		        	</a>
		        </div>
		      <?php endwhile; ?>
            <?php wp_reset_query(); ?>

    	</div>
  	</div>
</section>


<?php get_footer(); ?>
