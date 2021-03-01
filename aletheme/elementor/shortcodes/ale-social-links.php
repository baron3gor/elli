<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
	exit;

class Ale_Social_Links_Widget extends Widget_Base {

	public function get_name() {
		return 'ale-social-links';
	}

	public function get_title() {
		return esc_html__( 'Elli Social Links', 'elli' );
	}

	public function get_icon() {
		return 'eicon-social-icons';
	}

	public function get_categories() {
		return [ 'elli-elements' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_tab', [
				'label' => esc_html__( 'Elli Social Links', 'elli' ),
			]
		);

		$this->add_control(
			'sc_style',
			[
				'label' => __( 'Social Links Style', 'elli' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1'  => __( 'Style 1', 'elli' ),
					'style2'  => __( 'Style 2', 'elli' ),
				],
			]
		);

		$this->add_control(
			'sc_position',
			[
				'label' => __( 'Social Links Position', 'elli' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'hor',
				'options' => [
					'vert'  => __( 'Vertical', 'elli' ),
					'hor'  => __( 'Horizontal', 'elli' ),
				],
			]
		);

		$this->add_control(
			'fb',
			[
				'label' => __( 'Facebook', 'elli' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'https://www.facebook.com/', 'elli' ),
			]
		);

		$this->add_control(
			'tw',
			[
				'label' => __( 'Twitter', 'elli' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'https://www.twitter.com/', 'elli' ),
			]
		);

		$this->add_control(
			'pint',
			[
				'label' => __( 'Pinterest', 'elli' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'https://www.pinterest.com/', 'elli' ),
			]
		);

		$this->add_control(
			'utb',
			[
				'label' => __( 'Youtube', 'elli' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'https://www.youtube.com/', 'elli' ),
			]
		);

		$this->add_control(
			'lnkin',
			[
				'label' => __( 'Linkedin', 'elli' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'https://www.linkedin.com/', 'elli' ),
			]
		);

		$this->add_control(
			'bh',
			[
				'label' => __( 'Behance', 'elli' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'https://www.behance.net/', 'elli' ),
			]
		);

		$this->add_control(
			'flkr',
			[
				'label' => __( 'Flickr', 'elli' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'https://www.flickr.com/', 'elli' ),
			]
		);

		$this->add_control(
			'git',
			[
				'label' => __( 'Github', 'elli' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'https://github.com/', 'elli' ),
			]
		);

		$this->add_control(
			'tmb',
			[
				'label' => __( 'Tumblr', 'elli' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'https://www.tumblr.com/', 'elli' ),
			]
		);

		$this->add_control(
			'stmb',
			[
				'label' => __( 'Stumbleupon', 'elli' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'https://www.stumbleupon.com/', 'elli' ),
			]
		);

		$this->add_control(
			'vmo',
			[
				'label' => __( 'Vimeo', 'elli' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'https://vimeo.com/', 'elli' ),
			]
		);

		$this->add_control(
			'vk',
			[
				'label' => __( 'VK', 'elli' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'https://vk.com/', 'elli' ),
			]
		);

		$this->add_control(
			'yelp',
			[
				'label' => __( 'Yelp', 'elli' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'https://www.yelp.com/', 'elli' ),
			]
		);

		$this->add_control(
			'insta',
			[
				'label' => __( 'Instagram', 'elli' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'http://instagram.com/', 'elli' ),
			]
		);                         

		$this->add_responsive_control(
			'title_align', [
				'label'			 => esc_html__( 'Alignment', 'elli' ),
				'type'			 => Controls_Manager::CHOOSE,
				'options'		 => [

					'left'		 => [
						'title'	 => esc_html__( 'Left', 'elli' ),
						'icon'	 => 'fa fa-align-left',
					],
					'center'	 => [
						'title'	 => esc_html__( 'Center', 'elli' ),
						'icon'	 => 'fa fa-align-center',
					],
					'right'		 => [
						'title'	 => esc_html__( 'Right', 'elli' ),
						'icon'	 => 'fa fa-align-right',
					],
				],
				'default'		 => 'left',
				'prefix_class'   => 'ale-head-text elementor%s-align-',
			]
		);
		$this->end_controls_section();

	}

	protected function render() {
		$settings 	  = $this->get_settings();
		$ale_sc_style = $settings['sc_style'];
		$ale_position = $settings['sc_position'];
		$ale_fb 	  = $settings[ 'fb' ];
		$ale_twi 	  = $settings[ 'tw' ];
		$ale_pint 	  = $settings[ 'pint' ];
		$ale_utb 	  = $settings[ 'utb' ];
		$ale_lnkin 	  = $settings[ 'lnkin' ];
		$ale_bh 	  = $settings[ 'bh' ];
		$ale_flkr 	  = $settings[ 'flkr' ];
		$ale_git 	  = $settings[ 'git' ];
		$ale_tmb 	  = $settings[ 'tmb' ];
		$ale_stmb 	  = $settings[ 'stmb' ];
		$ale_vmo 	  = $settings[ 'vmo' ];
		$ale_vk 	  = $settings[ 'vk' ];
		$ale_yelp 	  = $settings[ 'yelp' ];
		$ale_insta	  = $settings[ 'insta' ];  ?>
			<?php if($ale_sc_style == 'style1') : ?>
				<div class="elli-social-wrapper fade-animation<?php if($ale_position == 'vert') : echo esc_attr(' ale-vertical-social', 'elli'); endif; ?>">
				<ul>

					<?php if ( $ale_fb != '' ): ?><li><a href="<?php echo esc_url( $ale_fb ); ?>"><i class="social_facebook"></i></a></li><?php endif; ?><?php if ( $ale_twi != '' ): ?><li><a href="<?php echo esc_url( $ale_twi ); ?>"><i class="social_twitter"></i></a></li><?php endif; ?><?php if ( $ale_pint != '' ): ?><li><a href="<?php echo esc_url( $ale_pint ); ?>"><i class="social_pinterest"></i></a></li><?php endif; ?><?php if ( $ale_utb != '' ): ?><li><a href="<?php echo esc_url( $ale_utb ); ?>"><i class="social_youtube"></i></a></li><?php endif; ?><?php if ( $ale_lnkin != '' ): ?><li><a href="<?php echo esc_url( $ale_lnkin ); ?>"><i class="social_linkedin"></i></a></li><?php endif; ?><?php if ( $ale_bh != '' ): ?><li><a href="<?php echo esc_url( $ale_bh ); ?>"><i class="fa fa-behance" aria-hidden="true"></i></a></li><?php endif; ?><?php if ( $ale_flkr != '' ): ?><li><a href="<?php echo esc_url( $ale_flkr ); ?>"><i class="social_flickr"></i></a></li><?php endif; ?><?php if ( $ale_git != '' ): ?><li><a href="<?php echo esc_url( $ale_git ); ?>"><i class="fa fa-github" aria-hidden="true"></i></a></li><?php endif; ?><?php if ( $ale_stmb != '' ): ?><li><a href="<?php echo esc_url( $ale_stmb ); ?>"><i class="fa fa-stumbleupon" aria-hidden="true"></i></a></li><?php endif; ?><?php if ( $ale_tmb != '' ): ?><li><a href="<?php echo esc_url( $ale_tmb ); ?>"><i class="social_tumblr"></i></a></li><?php endif; ?><?php if ( $ale_vmo != '' ): ?><li><a href="<?php echo esc_url( $ale_vmo ); ?>"><i class="social_vimeo"></i></a></li><?php endif; ?><?php if ( $ale_vk != '' ): ?><li><a href="<?php echo esc_url( $ale_vk ); ?>"><i class="fa fa-vk" aria-hidden="true"></i></a></li><?php endif; ?><?php if ( $ale_yelp != '' ): ?><li><a href="<?php echo esc_url( $ale_yelp ); ?>"><i class="fa fa-yelp" aria-hidden="true"></i></a></li><?php endif; ?><?php if ( $ale_insta != '' ): ?><li><a href="<?php echo esc_url( $ale_insta ); ?>"><i class="social_instagram"></i></a></li>
					<?php endif; ?>
				</ul>
			</div><!-- Footer social end -->
		<?php elseif ($ale_sc_style == 'style2') : ?>
			<div class="elli-social-wrapper onload-fade-animation ale-soc-style2<?php if($ale_position == 'vert') : echo esc_attr(' ale-vertical-social', 'elli'); endif; ?>">
				<ul>

					<?php if ( $ale_fb != '' ): ?><li><a href="<?php echo esc_url( $ale_fb ); ?>"><i class="social_facebook"></i></a></li><?php endif; ?><?php if ( $ale_twi != '' ): ?><li><a href="<?php echo esc_url( $ale_twi ); ?>"><i class="social_twitter"></i></a></li><?php endif; ?><?php if ( $ale_pint != '' ): ?><li><a href="<?php echo esc_url( $ale_pint ); ?>"><i class="social_pinterest"></i></a></li><?php endif; ?><?php if ( $ale_utb != '' ): ?><li><a href="<?php echo esc_url( $ale_utb ); ?>"><i class="social_youtube"></i></a></li><?php endif; ?><?php if ( $ale_lnkin != '' ): ?><li><a href="<?php echo esc_url( $ale_lnkin ); ?>"><i class="social_linkedin"></i></a></li><?php endif; ?><?php if ( $ale_bh != '' ): ?><li><a href="<?php echo esc_url( $ale_bh ); ?>"><i class="fa fa-behance" aria-hidden="true"></i></a></li><?php endif; ?><?php if ( $ale_flkr != '' ): ?><li><a href="<?php echo esc_url( $ale_flkr ); ?>"><i class="social_flickr"></i></a></li><?php endif; ?><?php if ( $ale_git != '' ): ?><li><a href="<?php echo esc_url( $ale_git ); ?>"><i class="fa fa-github" aria-hidden="true"></i></a></li><?php endif; ?><?php if ( $ale_stmb != '' ): ?><li><a href="<?php echo esc_url( $ale_stmb ); ?>"><i class="fa fa-stumbleupon" aria-hidden="true"></i></a></li><?php endif; ?><?php if ( $ale_tmb != '' ): ?><li><a href="<?php echo esc_url( $ale_tmb ); ?>"><i class="social_tumblr"></i></a></li><?php endif; ?><?php if ( $ale_vmo != '' ): ?><li><a href="<?php echo esc_url( $ale_vmo ); ?>"><i class="social_vimeo"></i></a></li><?php endif; ?><?php if ( $ale_vk != '' ): ?><li><a href="<?php echo esc_url( $ale_vk ); ?>"><i class="fa fa-vk" aria-hidden="true"></i></a></li><?php endif; ?><?php if ( $ale_yelp != '' ): ?><li><a href="<?php echo esc_url( $ale_yelp ); ?>"><i class="fa fa-yelp" aria-hidden="true"></i></a></li><?php endif; ?><?php if ( $ale_insta != '' ): ?><li><a href="<?php echo esc_url( $ale_insta ); ?>"><i class="social_instagram"></i></a></li>
					<?php endif; ?>
				</ul>
			</div><!-- Footer social end -->
		<?php endif; ?>
        <?php
	}

	protected function _content_template() {}
}
