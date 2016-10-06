<?php
/**
 * The template for displaying categories
 *
 * @package WordPress
 * @subpackage Century_Fence
 * @since Century Fence 1.0
 */
?>
<?php

		foreach((get_the_category()) as $childcat) {
			$parentcat = $childcat->category_parent;
			if ($parentcat == 5){
				$class = 'pavement';
			}
			else {
				$class = 'fence';
			}
		}
	?>

			<div class="col-md-9 col-lg-9">
				<div class="page-mainbar post">
					<h1 class="<?php echo $class ?>"><?php the_title(); ?></h1>
					<div class="post-content">
						<div class="entry animation fadeIn">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="category-content">
										<?php the_content(); ?>
									</div>
								</div>
							<div class="row">
									<?php
										$postid = get_the_ID();

										foreach((get_the_category( $postid )) as $childcat ){
											$category = $childcat->cat_ID;
										}
										$args1 = array(  //Set the arguments to the query, i.e. what posts are you looking for, how many, etc.
				                        'post_type' => array( 'fence-sub', 'pavement-sub' ),
				                        'orderby'=>'menu_order',
				                        'order'   => 'ASC',
				                        'post_count' => -1, //Set to -1 for unlimited
				                        'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'category',
                                                    'field' => 'id',
                                                    'terms' => $category
                                                ))
				                            );

				                            $fence_sub_loop = null;
				                            $fence_sub_loop = new WP_Query($args1);   //Create a new query, passing it the arguments you specified above


				                          while ( $fence_sub_loop->have_posts() ) : $fence_sub_loop->the_post();
																	$ID[] = get_the_ID();
																	$title[] = get_the_title();
																	$content[] = get_field('sub_content');
																	$image[] = get_field('sub_image');
																	$gallery[] = get_post_gallery(get_the_ID(), false);
																	endwhile;wp_reset_query();
																	$arrlength = count($ID);
													for ($x = 0; $x < $arrlength; $x++ ) {?>
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
													<div class="panel panel-default">
														<div class="sub-cat-image-box">
															<a href="#" data-toggle="modal" data-target="#myModal_<?php echo $ID[$x] ?>">
																<img src="<?php echo $image[$x] ?>" class="img-responsive" alt="" />
															</a>
														</div>

										                <div class="panel-heading <?php echo $class ?>">
															<h2><?php echo $title[$x] ?></h2>
														</div>

										                <div class="panel-body techlink">
										                  <?php echo $content[$x] ?>
										                  <h4 class="pull-right"><a href="#" data-toggle="modal" data-target="#myModal_<?php echo $ID[$x] ?>">View <?php echo $title[$x] ?> Gallery</a></h4>
										                </div>
										            </div><hr>
												</div>
													<?php }
													for ($x = 0; $x < $arrlength; $x++ ) { ?>

												<div class="modal fade" id="myModal_<?php echo $ID[$x] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
													<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
													  <div class="modal-dialog">
													    <div class="modal-content">

													    	<div class="gallery-modal">
																	<div class="close-modal-btn">
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Close &times;</span></button>
																	</div>
													        <?php // echo $gallery[$x]; ?>
																	<?php // echo '<pre>'; var_dump($gallery[$x]); echo '</pre>' ?>
																	<?php
																		$gallery_ids = $gallery[$x]['ids'];
																		$gallery_id_array = explode(",",$gallery_ids); ?>

																	<div id="sync1_<?php echo $ID[$x]; ?>" class="owl-carousel sync1">
																	<?php
																		foreach ($gallery_id_array as $ids) {
																			$gallery_thumb = wp_get_attachment_image_src($ids,'gallery-thumb', true); ?>
																			<div class="item">
																				<img src="<?php echo $gallery_thumb[0]; ?>" alt="" >
																			</div>
																	<?php	} ?>
																	</div> <!-- end of sync1 -->
																	<div id="sync2_<?php echo $ID[$x]; ?>" class="owl-carousel sync2">
																		<?php
																			foreach ($gallery_id_array as $ids) {
																				$gallery_thumb = wp_get_attachment_image_src($ids,'thumbnail', true); ?>
																				<div class="item">
																					<img src="<?php echo $gallery_thumb[0]; ?>" alt="" >
																				</div>
																		<?php	} ?>
																	</div> <!-- end of sync2 -->
													      </div>
													    </div>
													  </div>
													</div>
												</div>
											<?php } ?>

					</div><!-- .row -->
				</div><!-- .row -->
			</div><!-- .entry -->
		</div><!-- .post-content -->
	</div><!-- .page-mainbar -->
</div><!-- .col -->
