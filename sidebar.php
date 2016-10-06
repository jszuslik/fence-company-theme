<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Century_Fence
 * @since Century Fence 1.0
 */
?>
<?php
		foreach((get_the_category()) as $childcat) {
			$parentcat = $childcat->category_parent;
		}
		if ($parentcat == 5){
			$class = 'pavement';
		}
		else {
			$class = 'fence';
		}
?>
<div class="page-sidebar">
					<div class="page-title <?php echo $class ?>">
						<h2><?php
									if (get_cat_name($parentcat)){
		  							echo get_cat_name($parentcat);
									} else {
										the_title();
									}
							?>
						</h2>
						<p class="tagline"><?php bloginfo( 'description' ); ?></p>
					</div><!-- /page-title -->
					<div class="sidebar-link col-disable">
						<?php
				            wp_nav_menu( array(
				                'menu'              => 'sidebar-left',
				                'theme_location'    => 'sidebar-left',
				                'depth'             => 2,
				                'container'         => 'ul',
				                'container_class'   => 'nav nav-pills nav-stacked',
				        		'container_id'      => '',
				                'menu_class'        => 'nav nav-pills nav-stacked',
				                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
				                'walker'            => new wp_bootstrap_navwalker())
				            );
				        ?>
						<hr />
					</div><!-- /sidebar-link -->
				</div><!-- /page-sidebar -->
