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

<!-- Place html body content here -->
			<div class="col-md-9 col-lg-9">
				<div class="page-mainbar post">
					<h1 class="<?php echo $class ?>"><?php the_title(); ?></h1>
					<div class="post-content">
						<div class="entry animation fadeIn">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="category-content">
										<?php if( get_field('second_image') ): ?>
										<div class="cat-image-box">
											<a href="#" data-toggle="modal" data-target="#myModal_<?php the_ID(); ?>">
												<img src="<?php the_field('second_image'); ?>" class="img-responsive" alt="" />
											</a>
										</div>
										<?php endif; ?>
										<?php the_field('content'); ?>
										<h4 class="pull-right"><a href="#" data-toggle="modal" data-target="#myModal_<?php the_ID(); ?>">View <?php the_title(); ?> Gallery</a></h4>
									</div>
								</div>
												<div class="modal fade" id="myModal_<?php the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
													<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
													  <div class="modal-dialog">
													    <div class="modal-content">
													    	<div class="gallery-modal">
													        <?php $gallery = get_post_gallery(get_the_ID(), false); ?>
																	<div class="close-modal-btn">
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Close &times;</span></button>
																	</div>
													        <?php // echo $gallery[$x]; ?>
																	<?php // echo '<pre>'; var_dump($gallery[$x]); echo '</pre>' ?>
																	<?php
																		$gallery_ids = $gallery['ids'];
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

							</div>
						</div>
					</div><!-- /post-content -->
				</div><!-- /page-mainbar -->
			</div>
