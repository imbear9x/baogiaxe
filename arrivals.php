<div class="hideOnSearch">
		<div class="product-list-wrapper">
			<div class="tricol-product-list">
			
					<div class="col-sm-12">
						<h2 class="visible-xs"><?php _e('New Arrivals','language');?></h2>
					</div>
				<?php $query = new WP_Query(array(
					'post_type' => array('gtcd','user_listing'),
					'posts_per_page' => '12'
					));
						if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); global $post; $fields = get_post_meta($post->ID, 'mod1', true); $fields3 = get_post_meta($post->ID, 'mod3', true); $fields2 = get_post_meta($post->ID, 'mod2', true);  $options = my_get_theme_options();?>				  		
						<div class="col-sm-4">
						<div class="item-container">
							<a class="arrivals-link" href="<?php the_permalink();?>">
						<div class="image-container">				 
							<div class="status-tag <?php echo $fields['statustag'];?>"><?php echo $fields['statustag'];?></div>					
								<?php if ( 'user_listing' == get_post_type($post->ID) ) {
										$args = array(
										'order'          => 'ASC',
										'orderby'        => 'menu_order',
										'post_type'      => 'attachment',
										'post_parent'    => $post->ID,
										'post_mime_type' => 'image',
										'post_status'    => null,
										'numberposts'    => 1,
										);
										$attachments = get_posts($args);										
										if ($attachments) {
											foreach ($attachments as $attachment) {
												arrivals_img ($post->ID,'medium');
												}
											} 
										} elseif ( 'gtcd' == get_post_type($post->ID) ) {
												gorilla_img ($post->ID,'medium');
								}?> 						
								</div>
								<div class="arrivals-details">
								<p class="vehicle-name"><span class="mini-hide"><?php echo $post->post_title;?></p>
								<div class="price-style">
									<?php  if (is_numeric( $fields['price'])){ echo number_format($fields['price']).' '.$options['currency_text'];} else {  echo $fields['price']; } ?>
								</div>
								<div class="meta-style">
									<?php if ( $fields['miles']){ echo '<span class="luot-mua">'.number_format($fields['miles']).'</span> '.$options['miles_text'];} elseif ($fields['miles'] == '0' ){ echo _e('0','language').' '.$options['miles_text'];} else {echo '';}  ?>
								</div>
								<div class="meta-style">
									<?php echo '<span class="khuyen-mai">Khuyến mãi: </span>';
										$resultContent = '';
										if(strlen($fields['CityMPG'])<=100)
											{
												$resultContent = $fields['CityMPG'];
											}
										else
											{
												$resultContent=substr($fields['CityMPG'],0,100);
											}
									echo $resultContent;?>
								</div>
								<div style="clear: both"></div><a class="detail-btn" href="<?php the_permalink();?>"><?php _e('Xem chi tiết','language');?></a>
								</div>
									</a>
								</div>
							</div>
						<?php endwhile;?>
					<?php wp_reset_query(); ?>
				<?php else: ?>
				<?php require_once(AUTODEALER_INCLUDES.'/init/arrivals.php'); ?>	 
			<?php endif; ?>      
		</div>
	</div>
</div>
