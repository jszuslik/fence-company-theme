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


<div class="col-sm-12 col-md-12 col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading locations">
			Convenient Locations<br><small>TO SERVE YOU BETTER</small>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="hidden-xs col-sm-12 col-md-6 col-lg-6">
					<div class="states-img">
						<img src="<?php get_site_url(); ?>/wp-content/themes/centuryfence/images/states.png" class="states img-responsive" alt="Century Fence Locations" />
					</div>
							<div class="cities">
										<div class="forestlake">
											<h3><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Forest Lake, MN</a></h3>
											<h4><a href="tel:+18003289558">(800) 328-9558</a></h4>
										</div>
										<div class="greenbay">
											<h3><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Green Bay, WI</a></h3>
											<h4><a href="tel:+18002801551">(800) 280-1551</a></h4>
										</div>
										<div class="pewaukee">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><h3>Pewaukee, WI</h3></a>
											<a href="tel:+18005580507"><h4>(800) 558-0507</h4></a>
										</div>
							</div>
				</div><!-- /col-md-6 -->
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="row">
							<div class="panel-group" id="accordion">
								<?php $args1 = array(  //Set the arguments to the query, i.e. what posts are you looking for, how many, etc.
									'post_type' => 'location',
									'orderby'=>'menu_order',
									'order'   => 'ASC',
									'post_count' => -1 //Set to -1 for unlimited
											);

											$location_loop = null;
											$location_loop = new WP_Query($args1);   //Create a new query, passing it the arguments you specified above


										while ( $location_loop->have_posts() ) : $location_loop->the_post();
											$postid = get_the_ID();
											$categories = get_the_category( $postid );
											foreach($categories as $category) {
												$parent = $category->slug;
											}
											get_field('test_field'); ?>

											<div class="panel">
												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?php the_field('order_to_appear'); ?>">
													<div class="panel-heading">
														<h3 class="panel-title"><?php the_title(); ?></h3>
													</div>
												</a>
												<div id="<?php the_field('order_to_appear'); ?>" class="panel-collapse collapse">
													<div class="panel-body">
														<div class="row">
															<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
																<img src="<?php the_field('image'); ?>" class="img-responsive states" alt="Century Fence Locations" />
															</div>
															<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
																<p><?php the_field('street_address'); ?></p>
																<p><?php the_field('city_and_state'); ?></p>
																<p><strong>Phone:</strong>
																	<a href="tel:+1<?php the_field('phone_number') ?>">
																		<?php
																			$phone = get_field('phone_number');
																			$phone_number = "(".substr($phone, 0, 3).") ".substr($phone, 3, 3)."-".substr($phone,6);
																			echo $phone_number;
																		?>
																	</a>
																</p>
																<?php
																	if (get_field('fax_number')) {
																		$fax = get_field('fax_number');
																		$fax_number = "(".substr($fax, 0, 3).") ".substr($fax, 3, 3)."-".substr($fax,6);
																		?><p><strong>Fax:</strong> <?php echo $fax_number; ?> </p><?php
																	} ?>

																<br/><br />
															</div>
														</div>
														<div class="row">
															<div class="col-sm-12 col-md-12 col-lg-12 reps">
																<h4 style="margin-left: 45px; color:#002d85">Century Fence Representitives</h4>
																</br />
																	<?php

																		$args2 = array(  //Set the arguments to the query, i.e. what posts are you looking for, how many, etc.
																		'post_type' => 'contacts',
																		'orderby'=>'menu_order',
																		'order'   => 'ASC',
																		'post_count' => -1, //Set to -1 for unlimited
																		'tax_query' => array(
																					array(
																							'taxonomy' => 'category',
																							'field' => 'slug',
																							'terms' => $parent
																					))
																				);

																				$contact_loop = null;
																				$contact_loop = new WP_Query($args2);   //Create a new query, passing it the arguments you specified above

																			while ( $contact_loop->have_posts() ) : $contact_loop->the_post();
																				get_field('test_field');
																				$vendor_type = get_field('vendor_type');
																				if ($vendor_type == 'Fence') {
																					echo '<p><img class="contact-img" src="/wp-content/uploads/2015/05/fenceicon.png" alt="Fence Division"/>' . get_the_title() . ': <a href="mailto:' . get_field( 'email_address' ) . '">'. get_field( 'email_address' ) . '</a></p>';
																				} elseif ($vendor_type == 'Pavement'){
																					echo '<p><img class="contact-img" src="/wp-content/uploads/2015/05/pavementicon.png" alt="Pavement Division"/>' . get_the_title() . ': <a href="mailto:' . get_field( 'email_address' ) . '">'. get_field( 'email_address' ) . '</a></p>';
																				} elseif ($vendor_type == 'Both') {
																					echo '<p><img class="contact-img" src="/wp-content/uploads/2015/05/fenceicon.png" alt="Fence Division"/><img class="contact-img" src="/wp-content/uploads/2015/05/pavementicon.png" alt="Pavement Division"/>' . get_the_title() . ': <a href="mailto:' . get_field( 'email_address' ) . '">'. get_field( 'email_address' ) . '</a></p>';
																				} else {
																					echo '<p>' . get_the_title() . ': <a href="mailto:' . get_field( 'email_address' ) . '">'. get_field( 'email_address' ) . '</a></p>';
																				}
																				 ?>

																<?php endwhile; ?>
																<?php wp_reset_query(); ?>
															</div>
														</div>
													</div>
												</div>
											</div>
											<?php endwhile; ?>
											<?php wp_reset_query(); ?>

							</div>
					</div>
				</div><!-- /col-md-6 -->
			</div><!-- /row -->
		</div><!-- /panel-body -->
	</div>
</div>
