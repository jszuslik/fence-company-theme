<?php ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 oldie"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 oldie"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 oldie"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?> class="no-js">  	<!--<![endif]-->
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" />
	<?php } ?>

	<?php
	$GLOBALS[ 'homepage' ] = is_front_page();
	$GLOBALS[ 'temp_uri' ] = get_template_directory_uri();
	?>

	<title>
		   <?php bloginfo('name'); ?> - <?php bloginfo( 'description' ); ?>
	</title>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Web Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic|Montserrat:400,700' rel='stylesheet' type='text/css'>
<?php wp_head(); ?>
</head>

<!-- Need to add page attributes for styling -->

<?php $body_id = ($GLOBALS[ 'homepage' ]) ? 'homePage' : 'contentPage'; ?>
<body id="<?php echo $body_id; ?>" <?php body_class(); ?>>

<header class="navbar-fixed-top">
  <div class="container">
    <div class="row">

      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3" class="logo">
        <a href="/"><img class="brand img-responsive" src="<?php echo of_get_option('logo_uploader'); ?>" alt="Century Fence Logo"></a>
      </div><!-- col logo -->

      <div class="col-xs-6 col-sm-12 col-md-8 col-lg-9" id="main-nav">

        <div class="row header-social">
          <div class="col-xs-12">
            <a href="<?php get_site_url(); ?>/request-a-quote" class="visible-md btn-blue pull-right">Request a Quote</a>
            <a href="https://www.linkedin.com/company/century-fence-company" target="_blank" title="" class="hidden-xs hidden-sm pull-right"><i class="fa fa-linkedin-square"></i></a>
          </div><!-- .col -->
        </div><!-- .row -->

        <div class="row">
          <div class="col-xs-12">
            <nav class="navbar navbar-custom">
              <div class="container-fluid">
                <div class="navbar-header visible-xs">
                  <button type="button" class="navbar-toggle collapsed">
                    <span class="sr-only">Toggle navigation</span>
                    <span><i class="fa fa-navicon"></i></span>
                  </button>
                </div><!-- .navbar-header -->

                <div id="navbar" class="navbar-collapse pull-right">
                  <ul class="nav navbar-nav navbar-right">
                    <?php wp_nav_menu( array('menu' => 'Primary', 'container' => '', 'container_class' => false, 'items_wrap' => '%3$s' )); ?>
                    <li class="visible-sm ln"><a href="https://www.linkedin.com/company/century-fence-company" target="_blank" title="" class="hidden-xs pull-right"><i class="fa fa-linkedin-square"></i></a></li>
                    <li class="visible-lg visible-sm"><a href="<?php get_site_url(); ?>/request-a-quote" class="btn-blue">Request a Quote</a></li>
                  </ul>
                </div><!-- #navbar -->

              </div><!-- container-fluid -->
            </nav>
          </div><!-- .col -->
        </div><!-- .row -->

      </div><!-- row #main-nav -->
    </div><!-- row -->
  </div><!-- container #main-nav-->
</header>
