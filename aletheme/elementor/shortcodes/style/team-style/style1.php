<?php if(!empty($ale_member_position) || !empty($ale_member_name) || !empty($ale_member_show_social) || !empty($ale_image['url'])) : ?>
	<div class="elli-team-wrapper fade-animation">
		<?php if( ! empty($ale_image['url'])) : ?>
	        <div class="icon-wrapper team-photo-wrapper fade-image">
	            <?php echo wp_get_attachment_image($ale_image['id'], 'team-single') ?>
	        </div>
	    <?php endif; ?>
	    <?php if(!empty($ale_member_position) || !empty($ale_member_name) || !empty($ale_member_show_social)) : ?>
			<div class="team-info">
				<?php if ( !empty( $ale_member_position ) ) : ?>
					<h6 class="team-designation ale-team-position-styles"><?php echo esc_html( $ale_member_position ); ?></h6>
				<?php endif; ?>
				<?php if ( !empty( $ale_member_name ) ) : ?>
					<h5 class="team-name ale-team-name-styles"><?php echo esc_html( $ale_member_name ); ?></h5>
				<?php endif; ?>
				<?php if ( !empty( $ale_member_descr ) ) : ?>
					<p class="team-descr"><?php echo esc_html( $ale_member_descr ); ?></p>
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
		<?php endif; ?>
	</div>
<?php endif; ?>