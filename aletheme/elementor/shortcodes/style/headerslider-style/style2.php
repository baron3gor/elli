<?php if(!empty($ale_header_slider)) : ?>
	<div class="ale-bg-section-color"></div>
	<div class="ale-header-slider-image-wrapper">
		<div class="ale-header-slider-container-st2">
			<div class="ale-header-slider">
				<div class="swiper-container ale-header-slider-descr ale-header-slider-style">					
					<div class="swiper-wrapper">	
						<?php foreach ($ale_header_slider as $ale_slider_item) : 
							$ale_sub_title     = !empty($ale_slider_item['list_subtitle']) ? $ale_slider_item['list_subtitle'] : '';
							$ale_title     	   = !empty($ale_slider_item['list_title']) ? $ale_slider_item['list_title'] : '';
							$ale_descr     	   = !empty($ale_slider_item['list_descr']) ? $ale_slider_item['list_descr'] : '';
							$ale_btn     	   = !empty($ale_slider_item['btn_text']) ? $ale_slider_item['btn_text'] : '';
							$btn_link 		   = (! empty( $ale_slider_item['btn_link']['url'])) ? $ale_slider_item['btn_link']['url'] : '';
							$btn_target 	   = ( $ale_slider_item['btn_link']['is_external']) ? '_blank' : '_self'; ?>
							<?php if(!empty($ale_title) || !empty($ale_subtitle) || !empty($ale_descr)) : ?>
								<div class="swiper-slide ale-header-slide-animation ale-header-slide-bg">	
									<div class="fade-animation">
										<div class="ale-header-slide-description">
											<?php if(!empty($ale_subtitle) || !empty($ale_title)) : ?>
												<div class="ale-header-descr-title-wrapper">
													<h6><?php echo esc_html($ale_sub_title, 'elli'); ?></h6>
													<h2><?php echo esc_html($ale_title, 'elli'); ?></h2>
														<span class="separate_dots">
												            <i class="fa fa-circle" aria-hidden="true"></i>
												            <i class="fa fa-circle" aria-hidden="true"></i>
												            <i class="fa fa-circle" aria-hidden="true"></i>
												        </span>
												</div>
											<?php endif; ?>
											<?php if(!empty($ale_descr)) : ?>
												<div class="ale-header-descr-wrapper">
													<?php echo ale_wp_kses($ale_descr, 'elli'); ?>
												</div>
											<?php endif; ?>
											<?php if(!empty($ale_btn)) : ?>
												<div class="ale-header-slider-btn btn-wrapper">
										            <a class="ale-btn ale-header-btn" href="<?php echo esc_url( $btn_link ); ?>" target="<?php echo esc_attr( $btn_target ); ?>">
										                <span class="ale-btn-text"><?php echo esc_html( $ale_btn ); ?></span>
										                <div class="overlay"></div>
										            </a>
										        </div>  
											<?php endif; ?>
										</div>
									</div>									
								</div>
							<?php endif; ?>
						<?php endforeach;?>
					</div>							
				</div>
				<div class="ale-header-slider-wrapper">
					<div class="swiper-container ale-header-slider-st2 fade-image-header-slide">
						<div class="swiper-wrapper">
							<?php foreach ($ale_header_slider as $ale_slider_item) : ?>
								<?php if(($ale_slider_item['image2']['url']) != '') : ?>
										<div class="swiper-slide">
											<div class="swiper-image" data-swiper-parallax-x="35%">
												<?php ale_header_slider_bg_parallax($ale_slider_item['image2']['url']); ?>

											</div>
										</div>
									<?php endif; ?>
							<?php endforeach; ?>
						</div>
					</div>		
					<?php if($settings['show_dots_right'] == 'yes') : ?>
						<div class="ale-dott-right-background ale-header-bottom-dots"></div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="ale-header-scroll-container onload-fade-animation">
			<div class="ale-header-mouse-wrapper">
				<svg class="ale-mouse-svg" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 750 1150" xml:space="preserve">
					<g>
						<path d="M375,38c45.5,0,89.6,8.9,131.2,26.5c40.1,17,76.2,41.3,107.1,72.2c31,31,55.3,67,72.2,107.1C703.1,285.4,712,329.5,712,375
							v400c0,45.5-8.9,89.6-26.5,131.2c-17,40.1-41.3,76.2-72.2,107.1c-31,31-67,55.3-107.1,72.2c-41.5,17.6-85.7,26.5-131.2,26.5
							c-45.5,0-89.6-8.9-131.2-26.5c-40.1-17-76.2-41.3-107.1-72.2c-31-31-55.3-67-72.2-107.1C46.9,864.6,38,820.5,38,775V375
							c0-45.5,8.9-89.6,26.5-131.2c17-40.1,41.3-76.2,72.2-107.1c31-31,67-55.3,107.1-72.2C285.4,46.9,329.5,38,375,38 M375,0L375,0
							C167.9,0,0,167.9,0,375v400c0,207.1,167.9,375,375,375h0c207.1,0,375-167.9,375-375V375C750,167.9,582.1,0,375,0L375,0z"/>
					</g>
					<g>
						<path d="M375,458c-11.9,0-21.5-9.6-21.5-21.5v-43.2c0-11.9,9.6-21.5,21.5-21.5c11.9,0,21.5,9.6,21.5,21.5v43.2
							C396.5,448.4,386.9,458,375,458z"/>
						<path d="M375,390.8c1.4,0,2.5,1.1,2.5,2.5v43.2c0,1.4-1.1,2.5-2.5,2.5c-1.4,0-2.5-1.1-2.5-2.5v-43.2
							C372.5,391.9,373.6,390.8,375,390.8 M375,352.8L375,352.8c-22.4,0-40.5,18.1-40.5,40.5v43.2c0,22.4,18.1,40.5,40.5,40.5h0
							c22.4,0,40.5-18.1,40.5-40.5v-43.2C415.5,370.9,397.4,352.8,375,352.8L375,352.8z"/>
					</g>
				</svg>
				<span class="scroll-down-button">Scroll</span>
			</div>
		</div>
		<div class="header-swiper-pagination onload-fade-animation"></div>
	</div>
<?php endif; ?>
<?php if($settings['show_dots'] == 'yes') : ?>
	<div class="ale-dott-left-background"></div>
<?php endif; ?>
