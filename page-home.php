<?php
/*
Template Name: Homepage
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
      	<?php $args = array(	//Set the arguments to the query, i.e. what posts are you looking for, how many, etc.
			'post_type' => 'home-carousel',
      'orderby'=>'menu_order',
			'order'   => 'ASC',
			'post_count' => -1 //Set to -1 for unlimited
					);

					$carousel_loop = null;
					$carousel_loop = new WP_Query($args);		//Create a new query, passing it the arguments you specified above

				while ( $carousel_loop->have_posts() ) : $carousel_loop->the_post();
					get_field('test_field'); ?>
				<div class="item <?php the_field('is_active') ?>">
          <?php
            $image = get_field('image');
            $thumb = $image['sizes']['slider-thumb'];
          ?>
					<img src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>">
						<div class="carousel-caption <?php the_field('slide_alignment') ?>">
							<h2><?php the_title() ?></h2>
							<p class="slide-caption"><?php the_field('slide_caption')?></p><a class="btn <?php the_field('button_color') ?>" href="<?php the_field('link_to_page') ?>"><?php the_field('button_text') ?></a>
					</div>
				</div>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
      </div>

      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="icon-prev"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="icon-next"></span></a>
    </div><!-- /.carousel -->
</section>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <?php bloginfo( 'description' ); ?>
      </div>
    </div>
  </div>
</div>
<section id="content" class="funnels">
  <div class="container">
    <div class="row">
    	<?php $args = array(	//Set the arguments to the query, i.e. what posts are you looking for, how many, etc.
			'post_type' => 'home-content',
			'order'   => 'ASC',
			'post_count' => -1 //Set to -1 for unlimited
					);

					$home_content_loop = null;
					$home_content_loop = new WP_Query($args);		//Create a new query, passing it the arguments you specified above

				while ( $home_content_loop->have_posts() ) : $home_content_loop->the_post();
					$custom = get_field('excerpt');
					get_field('test_field'); ?>
      					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 single-funnel">
        					<div class="panel panel-default">
          						<h2 class="panel-heading <?php the_field('category')?>"><a href="<?php the_field('link_to_page')?>"><?php the_title() ?></a></h2>
          							<div class="panel-body">
          								<a href="<?php the_field('link_to_page')?>">
            							<img src="<?php the_field('main_image')?>" class="img-responsive" alt="" /></a>
            							<img src="<?php the_field('icon_image')?>" class="img-responsive contenticon" alt="" />
            							<p><?php the_field('home_excerpt', $custom) ?><br><br></p>
            							<div class="pull-right btn-funnel">
            								<a href="<?php the_field('link_to_page')?>">Read More <i class="fa fa-long-arrow-right"></i></a>
            							</div>
          							</div>
        						</div>
      						</div>
      						<?php endwhile; ?>
							<?php wp_reset_query(); ?>
    </div>
  </div>
</section> <!-- /content -->
<section id="locations">
  <div class="container">
    <div class="row">
      <?php get_template_part( 'content', 'contacts' ); ?>
    </div><!-- /row -->
  </div> <!-- /container -->
</section> <!-- /locations -->
<section id="recent_posts">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading locations">
            Recent Posts
          </div>
        </div>
      </div>
      <?php
        $args = array(
          'post_type' => 'blog',
          'posts_per_page' => 3
        );
        $blog_loop = null;
        $blog_loop = new WP_Query($args);

        while ($blog_loop->have_posts()) : $blog_loop->the_post() ;
      ?>
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 recent_blog">
        <?php
          $image = get_field('featured-image');
          $thumb = $image['sizes']['blog-home-thumb'];
          $cat = get_field('category-label');
        ?>
        <div class="blog_image_wrapper <?php echo $cat; ?>" style="background-image: url('<?php echo $thumb; ?>'); background-size: contain">
          <div class="blog_image_container">
            <a href="<?php the_permalink(); ?>">
              <i class="fa fa-angle-right custom-icon"></i>
            </a>
          </div>
        </div>
        <div class="blog_content_container">
          <a href="<?php the_permalink(); ?>"><h2><?php echo get_the_title(); ?></h2></a>
          <a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
        </div>
      </div>
    <?php endwhile; wp_reset_query(); ?>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="pull-right btn-funnel">
          <a href="/who-are-we/blog">Read More Posts <i class="fa fa-long-arrow-right"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="vendors-home">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div id="vendorOwl" class="owl-carousel owl-theme">
        <?php
        $args = array(
          'post_type' => 'vendors',
          'orderby'   => 'rand',
          'post_count' => -1
        );
        $vendor_loop = null;
        $vendor_loop = new WP_Query($args);   //Create a new query, passing it the arguments you specified above
        while ( $vendor_loop->have_posts() ) : $vendor_loop->the_post(); ?>
          <div class="item">
            <a href="<?php the_field('vendor-website'); ?>" target="_blank">
              <img src="<?php the_field('vendor-logo'); ?>" class="img-responsive" alt="" />
            </a>
          </div>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
