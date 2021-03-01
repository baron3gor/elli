<?php if(!empty($ale_header_slider)) : ?>
	<div class="ale-bg-section-color"></div>	
	<div class="ale-header-slider-image-wrapper">
		<div class="ale-header-slider-container ale-header-slider-img">
			<div class="ale-header-slider">
				<div class="swiper-container ale-header-swiper-slider">							
					<div class="swiper-wrapper">	
						<?php foreach ($ale_header_slider as $ale_slider_item) : 
							if(($ale_slider_item['image2']['url']) != '') : ?>
								<div class="swiper-slide">
									<div class="swiper-image fade-image ale-swiper-img-wrap" data-swiper-parallax-x="35%">
										<?php ale_header_slider_bg_parallax($ale_slider_item['image2']['url']); ?>
									</div>
								</div>
							<?php endif; ?>
						<?php endforeach;?>
					</div>							
				</div>				
			</div>
			<div class="ale-header-slider-nav onload-fade-animation">
				<div class="ale-head-pagination-container">
					<div class="ale-header-pagination"></div>
					<div class="ale-head-navigation">
						<div class="ti-angle-left header-nav"></div>
						<div class="ti-angle-right header-nav"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
<?php if($settings['show_dots'] == 'yes') : ?>
	<div class="ale-dott-left-background"></div>
<?php endif; ?>
<?php if($settings['show_dots_right'] == 'yes') : ?>
	<div class="ale-dott-right-background"></div>
<?php endif; ?>