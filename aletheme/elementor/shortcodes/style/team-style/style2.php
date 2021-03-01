<div class="elli-team-main-style">
	<div class="ale-dott-right-background"></div>
	<div class="ale-dott-left-background"></div>
	<div class="elli-team-main-wrapper fade-animation">
		<div>
			<div>
				<?php if(!empty($ale_image)) : ?>
					<div class="ale-team-photo-wrapper fade-image">
						<img src="<?php echo esc_url($ale_image['url'], 'elli'); ?>" alt="<?php echo esc_attr($ale_alt, 'elli'); ?>">
					</div>
				<?php endif; ?>
				<?php if(!empty($ale_member_position) || !empty($ale_member_name) || !empty($ale_member_descr)) : ?>
					<div class="ale-team-descrinfo-wrapper">
						<?php if(!empty($ale_member_position)) : ?>
							<div class="ale-team-posit-wrapper">
								<h6 class="ale-team-position-styles"><?php echo esc_html($ale_member_position, 'elli'); ?></h6>
							</div>
						<?php endif; ?>
						<?php if(!empty($ale_member_name)) : ?>
							<div class="ale-team-name-wrapper">
								<h5 class="ale-team-name-styles"><?php echo esc_html($ale_member_name, 'elli'); ?></h5>
							</div>
						<div class="line-item-separator"></div>
						<?php endif; ?>
						<?php if(!empty($ale_member_descr)) : ?>
							<div class="ale-team-descr-wrapper team-main-style">
								<p><?php echo esc_html($ale_member_descr, 'elli'); ?></p>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<?php if ( $ale_member_show_social ): ?>
					<div class="team-social-links">		
						<?php if ( !empty( $ale_fb ) ): ?>
							<a href="<?php echo esc_url( $ale_fb ); ?>"><i class="fa fa-facebook"></i></a>
						<?php endif; ?>
						<?php if ( !empty( $ale_tw ) ): ?>
							<a href="<?php echo esc_url( $ale_tw ); ?>"><i class="social_twitter"></i></a>
						<?php endif; ?>
						<?php if ( !empty( $ale_instagram ) ): ?>
							<a href="<?php echo esc_url( $ale_instagram ); ?>"><i class="social_instagram"></i></a>
						<?php endif; ?>
						<?php if ( !empty( $ale_linkedin ) ): ?>
							<a href="<?php echo esc_url( $ale_linkedin ); ?>"><i class="social_linkedin"></i></a>
						<?php endif; ?>
						<?php if ( !empty( $ale_youtube_url ) ): ?>
							<a href="<?php echo esc_url( $ale_youtube_url ); ?>"><i class="social_youtube"></i></a>
						<?php endif; ?>
						<?php if ( !empty( $ale_vk_url ) ): ?>
							<a href="<?php echo esc_url( $ale_vk_url ); ?>"><i class="fa fa-vk"></i></a>
						<?php endif; ?>
						<?php if ( !empty( $ale_pinterest_url ) ): ?>
							<a href="<?php echo esc_url( $ale_pinterest_url ); ?>"><i class="social_pinterest"></i></a>
								<?php endif; ?>
						<?php if ( !empty( $ale_tumblr_url ) ): ?>
							<a href="<?php echo esc_url( $ale_tumblr_url ); ?>"><i class="social_tumblr"></i></a>
						<?php endif; ?>
						<?php if ( !empty( $ale_behance_url ) ): ?>
							<a href="<?php echo esc_url( $ale_behance_url ); ?>"><i class="fa fa-behance"></i></a>
						<?php endif; ?>
						<?php if ( !empty( $ale_yelp_url ) ): ?>
							<a href="<?php echo esc_url( $ale_yelp_url ); ?>"><i class="fa fa-yelp" aria-hidden="true"></i></a>
						<?php endif; ?>				
					</div>
				<?php endif; ?>
			</div>
		</div>		
	</div>
</div>