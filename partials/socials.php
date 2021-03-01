<?php global $ale_red_option;

	if ( isset( $ale_red_option['fb'] ) ) {
		$facebook = $ale_red_option['fb'];
	}

	if ( isset( $ale_red_option['twi'] ) ) {
		$twitter = $ale_red_option['twi'];
	}

	if ( isset( $ale_red_option['pin'] ) ) {
		$pinterest = $ale_red_option['pin'];
	}

	if ( isset( $ale_red_option['utb'] ) ) {
		$youtube = $ale_red_option['utb'];
	}

	if ( isset( $ale_red_option['lnkin'] ) ) {
		$linkedin = $ale_red_option['lnkin'];
	}

	if ( isset( $ale_red_option['bhnc'] ) ) {
		$behance = $ale_red_option['bhnc'];
	}

	if ( isset( $ale_red_option['flkr'] ) ) {
		$flickr = $ale_red_option['flkr'];
	}

	if ( isset( $ale_red_option['git'] ) ) {
		$github = $ale_red_option['git'];
	}

	if ( isset( $ale_red_option['stmb'] ) ) {
		$stumbleupon = $ale_red_option['stmb'];
	}

	if ( isset( $ale_red_option['tmb'] ) ) {
		$tumblr = $ale_red_option['tmb'];
	}

	if ( isset( $ale_red_option['vmo'] ) ) {
		$vimeo = $ale_red_option['vmo'];
	}

	if ( isset( $ale_red_option['vk'] ) ) {
		$vk = $ale_red_option['vk'];
	}

	if ( isset( $ale_red_option['yelp'] ) ) {
		$yelp = $ale_red_option['yelp'];
	}

	if ( isset( $ale_red_option['insta'] ) ) {
		$instagram = $ale_red_option['insta'];
	}

 ;?>


<div class="socials_wrapper">
	
	<ul>
		<?php if ($facebook) : ?>
			<li><a href="<?php echo esc_url($facebook) ;?> " target="_blank"><i class="social_facebook"></i></a></li>
		<?php endif; ?>

		<?php if ($twitter) : ?>
			<li><a href="<?php echo esc_url($twitter) ;?> " target="_blank"><i class="social_twitter"></i></a></li>
		<?php endif; ?>

		<?php if ($pinterest) : ?>
			<li><a href="<?php echo esc_url($pinterest) ;?> " target="_blank"><i class="social_pinterest"></i></a></li>
		<?php endif; ?>

		<?php if ($youtube) : ?>
			<li><a href="<?php echo esc_url($youtube) ;?> " target="_blank"><i class="social_youtube"></i></a></li>
		<?php endif; ?>

		<?php if ($linkedin) : ?>
			<li><a href="<?php echo esc_url($linkedin) ;?> " target="_blank"><i class="social_linkedin"></i></a></li>
		<?php endif; ?>

		<?php if ($behance) : ?>
			<li><a href="<?php echo esc_url($behance) ;?> " target="_blank"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
		<?php endif; ?>

		<?php if ($flickr) : ?>
			<li><a href="<?php echo esc_url($flickr) ;?> " target="_blank"><i class="social_flickr"></i></a></li>
		<?php endif; ?>

		<?php if ($github) : ?>
			<li><a href="<?php echo esc_url($github) ;?> " target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a></li>
		<?php endif; ?>

		<?php if ($stumbleupon) : ?>
			<li><a href="<?php echo esc_url($stumbleupon) ;?> " target="_blank"><i class="fa fa-stumbleupon" aria-hidden="true"></i></a></li>
		<?php endif; ?>

		<?php if ($tumblr) : ?>
			<li><a href="<?php echo esc_url($tumblr) ;?> " target="_blank"><i class="social_tumblr"></i></a></li>
		<?php endif; ?>

		<?php if ($vimeo) : ?>
			<li><a href="<?php echo esc_url($vimeo) ;?> " target="_blank"><i class="social_vimeo"></i></a></li>
		<?php endif; ?>

		<?php if ($vk) : ?>
			<li><a href="<?php echo esc_url($vk) ;?> " target="_blank"><i class="fa fa-vk" aria-hidden="true"></i></a></li>
		<?php endif; ?>

		<?php if ($yelp) : ?>
			<li><a href="<?php echo esc_url($yelp) ;?> " target="_blank"><i class="fa fa-yelp" aria-hidden="true"></i></a></li>
		<?php endif; ?>

		<?php if ($instagram) : ?>
			<li><a href="<?php echo esc_url($instagram) ;?> " target="_blank"><i class="social_instagram"></i></a></li>
		<?php endif; ?>
	</ul>
</div>