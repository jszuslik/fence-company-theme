<?php



/**
*Add style sheets and scripts
*/
function custom_scripts() {
	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.css', array(), null);
	// wp_enqueue_style( 'b_css', get_template_directory_uri() . '/css/b.css', array(), null );
	wp_enqueue_style( 'animate_css', get_template_directory_uri() . '/css/animate.min.css', array(), null );
	wp_enqueue_style( 'font_awesome_css', get_template_directory_uri() . '/css/font-awesome.min.css', array(), null );
	wp_enqueue_style( 'custom_css', get_stylesheet_uri(), array(), null );
	wp_enqueue_style( 'carousel_css', get_template_directory_uri() . '/carousel.css', array(), null );
	wp_enqueue_style( 'owl_carousel_css', get_template_directory_uri() . '/css/owl.carousel.css', array(), null );
	wp_enqueue_style( 'owl_theme_css', get_template_directory_uri() . '/css/owl.theme.css', array(), null );

	wp_enqueue_script( 'modernizr_js', get_template_directory_uri() . '/js/modernizr.custom.02.03.15.js', array('jquery'), false, true );
	wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.js', array('modernizr_js'), false, true );
	wp_enqueue_script( 'waypoints_js', get_template_directory_uri() . '/js/waypoints.min.js', array('bootstrap_js'), false, true );
	wp_enqueue_script( 'owl_js', get_template_directory_uri() . '/js/owl.carousel.min.js', array('waypoints_js'), false, true );
	// wp_enqueue_script( 'masonry_js', get_template_directory_uri() . '/js/masonry.pkgd.min.js', array('owl_js'), false, true );
}
add_action( 'wp_enqueue_scripts', 'custom_scripts' );
// Add RSS links to <head> section
add_theme_support('automatic-feed-links');

function childtheme_favicon() { ?>
	<link rel="shortcut icon" href="<?php echo of_get_option('favicon_uploader'); ?>" />
<?php }
add_action('wp_head', 'childtheme_favicon');

// Clean up the <head>
function removeHeadLinks() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');

// Declare widgets
if (function_exists('register_sidebar')) {
	// used in default sidebar
	register_sidebar(array(
		'name' => 'Sidebar Widgets',
		'id'   => 'sidebar-widgets',
		'description'   => 'These are widgets for the sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>'
	));


	register_sidebar(array(
	    'name'          => __( 'Footer Address Section', 'Pinnacle' ),
		'id'            => 'footer-address',
		'description'   => 'Address Flag',
	        'class'         => 'footer-content',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	));
}

add_theme_support( 'post-thumbnails' );
add_image_size( 'blog-archive-thumb', 670, 194, array('center','center') );
add_image_size( 'blog-home-thumb', 370, 150, array('center','center') );
add_image_size( 'gallery-thumb', 800, 600, array('center','center') );
add_image_size( 'gallery-thumb-small', 100, 100, array('center','center') );
add_image_size( 'slider-thumb', 1920, 500, array('bottom','center') );

add_theme_support( 'woocommerce' );

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'centuryfence' ),
    'sidebar-left' => __( 'Left Sidebar Menu', 'centuryfence' ),
    'footer' => __( 'Footer Menu', 'centuryfence' ),
) );

add_theme_support( 'post-formats', array( 'gallery', 'quote', 'video', 'aside', 'image', 'link' ) );

ini_set( 'mysql.trace_mode', 0 );

add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="btn btn-default btn-blue"';
}

add_filter('next_post_link', 'post_link_attributes');
add_filter('previous_post_link', 'post_link_attributes');

function post_link_attributes($output) {
	$code = 'class="btn btn-default btn-blue"';
	return str_replace('<a href=', '<a '. $code . ' href=', $output);
}
?>
