<?php
namespace Elementor;

use Elementor\Modules\DynamicTags\Module as TagsModule;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor video widget.
 *
 * Elementor widget that displays a video player.
 *
 * @since 1.0.0
 */
class ale_Widget_Video extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve video widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'ale-video';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve video widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Elli Video', 'elli' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve video widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-youtube';
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the video widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since 2.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'elli-elements' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 2.1.0
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'video', 'player', 'embed', 'youtube', 'vimeo', 'dailymotion' ];
	}

	/**
	 * Register video widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_video',
			[
				'label' => __( 'Video', 'elli' ),
			]
		);

		$this->add_control(
			'video_type',
			[
				'label' => __( 'Source', 'elli' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'youtube',
				'options' => [
					'youtube' => __( 'YouTube', 'elli' ),
					'vimeo' => __( 'Vimeo', 'elli' ),
					'dailymotion' => __( 'Dailymotion', 'elli' ),
					'hosted' => __( 'Self Hosted', 'elli' ),
				],
			]
		);

		$this->add_control(
			'youtube_url',
			[
				'label' => __( 'Link', 'elli' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
					'categories' => [
						TagsModule::POST_META_CATEGORY,
						TagsModule::URL_CATEGORY,
					],
				],
				'placeholder' => __( 'Enter your URL', 'elli' ) . ' (YouTube)',
				'default' => 'https://www.youtube.com/watch?v=XHOmBV4js_E',
				'label_block' => true,
				'condition' => [
					'video_type' => 'youtube',
				],
			]
		);

		$this->add_control(
			'vimeo_url',
			[
				'label' => __( 'Link', 'elli' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
					'categories' => [
						TagsModule::POST_META_CATEGORY,
						TagsModule::URL_CATEGORY,
					],
				],
				'placeholder' => __( 'Enter your URL', 'elli' ) . ' (Vimeo)',
				'default' => 'https://vimeo.com/235215203',
				'label_block' => true,
				'condition' => [
					'video_type' => 'vimeo',
				],
			]
		);

		$this->add_control(
			'dailymotion_url',
			[
				'label' => __( 'Link', 'elli' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
					'categories' => [
						TagsModule::POST_META_CATEGORY,
						TagsModule::URL_CATEGORY,
					],
				],
				'placeholder' => __( 'Enter your URL', 'elli' ) . ' (Dailymotion)',
				'default' => 'https://www.dailymotion.com/video/x6tqhqb',
				'label_block' => true,
				'condition' => [
					'video_type' => 'dailymotion',
				],
			]
		);

		$this->add_control(
			'insert_url',
			[
				'label' => __( 'External URL', 'elli' ),
				'type' => Controls_Manager::SWITCHER,
				'condition' => [
					'video_type' => 'hosted',
				],
			]
		);

		$this->add_control(
			'hosted_url',
			[
				'label' => __( 'Choose File', 'elli' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
					'categories' => [
						TagsModule::MEDIA_CATEGORY,
					],
				],
				'media_type' => 'video',
				'condition' => [
					'video_type' => 'hosted',
					'insert_url' => '',
				],
			]
		);

		$this->add_control(
			'external_url',
			[
				'label' => __( 'URL', 'elli' ),
				'type' => Controls_Manager::URL,
				'autocomplete' => false,
				'show_external' => false,
				'label_block' => true,
				'show_label' => false,
				'dynamic' => [
					'active' => true,
					'categories' => [
						TagsModule::POST_META_CATEGORY,
						TagsModule::URL_CATEGORY,
					],
				],
				'media_type' => 'video',
				'placeholder' => __( 'Enter your URL', 'elli' ),
				'condition' => [
					'video_type' => 'hosted',
					'insert_url' => 'yes',
				],
			]
		);

		$this->add_control(
			'start',
			[
				'label' => __( 'Start Time', 'elli' ),
				'type' => Controls_Manager::NUMBER,
				'description' => __( 'Specify a start time (in seconds)', 'elli' ),
				'condition' => [
					'loop' => '',
				],
			]
		);

		$this->add_control(
			'end',
			[
				'label' => __( 'End Time', 'elli' ),
				'type' => Controls_Manager::NUMBER,
				'description' => __( 'Specify an end time (in seconds)', 'elli' ),
				'condition' => [
					'loop' => '',
					'video_type' => [ 'youtube', 'hosted' ],
				],
			]
		);

		$this->add_control(
			'video_options',
			[
				'label' => __( 'Video Options', 'elli' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label' => __( 'Autoplay', 'elli' ),
				'type' => Controls_Manager::SWITCHER,
			]
		);

		$this->add_control(
			'mute',
			[
				'label' => __( 'Mute', 'elli' ),
				'type' => Controls_Manager::SWITCHER,
			]
		);

		$this->add_control(
			'loop',
			[
				'label' => __( 'Loop', 'elli' ),
				'type' => Controls_Manager::SWITCHER,
				'condition' => [
					'video_type!' => 'dailymotion',
				],
			]
		);

		$this->add_control(
			'controls',
			[
				'label' => __( 'Player Controls', 'elli' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'Hide', 'elli' ),
				'label_on' => __( 'Show', 'elli' ),
				'default' => 'yes',
				'condition' => [
					'video_type!' => 'vimeo',
				],
			]
		);

		$this->add_control(
			'showinfo',
			[
				'label' => __( 'Video Info', 'elli' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'Hide', 'elli' ),
				'label_on' => __( 'Show', 'elli' ),
				'default' => 'yes',
				'condition' => [
					'video_type' => [ 'dailymotion' ],
				],
			]
		);

		$this->add_control(
			'modestbranding',
			[
				'label' => __( 'Modest Branding', 'elli' ),
				'type' => Controls_Manager::SWITCHER,
				'condition' => [
					'video_type' => [ 'youtube' ],
					'controls' => 'yes',
				],
			]
		);

		$this->add_control(
			'logo',
			[
				'label' => __( 'Logo', 'elli' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'Hide', 'elli' ),
				'label_on' => __( 'Show', 'elli' ),
				'default' => 'yes',
				'condition' => [
					'video_type' => [ 'dailymotion' ],
				],
			]
		);

		$this->add_control(
			'color',
			[
				'label' => __( 'Controls Color', 'elli' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'video_type' => [ 'vimeo', 'dailymotion' ],
				],
			]
		);

		// YouTube.
		$this->add_control(
			'yt_privacy',
			[
				'label' => __( 'Privacy Mode', 'elli' ),
				'type' => Controls_Manager::SWITCHER,
				'description' => __( 'When you turn on privacy mode, YouTube won\'t store information about visitors on your website unless they play the video.', 'elli' ),
				'condition' => [
					'video_type' => 'youtube',
				],
			]
		);

		$this->add_control(
			'rel',
			[
				'label' => __( 'Suggested Videos', 'elli' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => __( 'Current Video Channel', 'elli' ),
					'yes' => __( 'Any Video', 'elli' ),
				],
				'condition' => [
					'video_type' => 'youtube',
				],
			]
		);

		// Vimeo.
		$this->add_control(
			'vimeo_title',
			[
				'label' => __( 'Intro Title', 'elli' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'Hide', 'elli' ),
				'label_on' => __( 'Show', 'elli' ),
				'default' => 'yes',
				'condition' => [
					'video_type' => 'vimeo',
				],
			]
		);

		$this->add_control(
			'vimeo_portrait',
			[
				'label' => __( 'Intro Portrait', 'elli' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'Hide', 'elli' ),
				'label_on' => __( 'Show', 'elli' ),
				'default' => 'yes',
				'condition' => [
					'video_type' => 'vimeo',
				],
			]
		);

		$this->add_control(
			'vimeo_byline',
			[
				'label' => __( 'Intro Byline', 'elli' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'Hide', 'elli' ),
				'label_on' => __( 'Show', 'elli' ),
				'default' => 'yes',
				'condition' => [
					'video_type' => 'vimeo',
				],
			]
		);

		$this->add_control(
			'download_button',
			[
				'label' => __( 'Download Button', 'elli' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'Hide', 'elli' ),
				'label_on' => __( 'Show', 'elli' ),
				'condition' => [
					'video_type' => 'hosted',
				],
			]
		);


		$this->add_control(
			'view',
			[
				'label' => __( 'View', 'elli' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'youtube',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_video_colors',
			[
				'label' => __( 'Color Style', 'elli' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'ellivideo_linecolor', [
				'label'		 => esc_html__( 'Icon and Title Color', 'elli' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .ale-playvideo-button' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ale-video-svg path'   => 'fill: {{VALUE}}',
					'{{WRAPPER}} .ale-video-svg path.st0'   => 'fill: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'ellivideo_color', [
				'label'		 => esc_html__( 'Bottom Line Color', 'elli' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .ale-playvideo-icon>span.ale-playvideo-button:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .ale-playvideo-icon>span.ale-playvideo-button:after'  => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'ellivideo_color_hover', [
				'label'		 => esc_html__( 'Icon and Title Hover Color', 'elli' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .ale-playvideo-icon:hover .ale-playvideo-button' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ale-playvideo-icon:hover .ale-video-svg path'   => 'fill: {{VALUE}}',
					'{{WRAPPER}} .ale-playvideo-icon:hover .ale-video-svg path.st0'   => 'fill: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_video_style',
			[
				'label' => __( 'Video', 'elli' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'aspect_ratio',
			[
				'label' => __( 'Aspect Ratio', 'elli' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'169' => '16:9',
					'219' => '21:9',
					'43' => '4:3',
					'32' => '3:2',
					'11' => '1:1',
				],
				'default' => '169',
				'prefix_class' => 'elementor-aspect-ratio-',
				'frontend_available' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_lightbox_style',
			[
				'label' => __( 'Lightbox', 'elli' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'lightbox_color',
			[
				'label' => __( 'Background Color', 'elli' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'#elementor-lightbox-{{ID}}' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'lightbox_ui_color',
			[
				'label' => __( 'UI Color', 'elli' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'#elementor-lightbox-{{ID}} .dialog-lightbox-close-button' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'lightbox_ui_color_hover',
			[
				'label' => __( 'UI Hover Color', 'elli' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'#elementor-lightbox-{{ID}} .dialog-lightbox-close-button:hover' => 'color: {{VALUE}}',
				],
				'separator' => 'after',
			]
		);

		$this->add_control(
			'lightbox_video_width',
			[
				'label' => __( 'Content Width', 'elli' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
				],
				'range' => [
					'%' => [
						'min' => 50,
					],
				],
				'selectors' => [
					'(desktop+)#elementor-lightbox-{{ID}} .elementor-video-container' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'lightbox_content_position',
			[
				'label' => __( 'Content Position', 'elli' ),
				'type' => Controls_Manager::SELECT,
				'frontend_available' => true,
				'options' => [
					'' => __( 'Center', 'elli' ),
					'top' => __( 'Top', 'elli' ),
				],
				'selectors' => [
					'#elementor-lightbox-{{ID}} .elementor-video-container' => '{{VALUE}}; transform: translateX(-50%);',
				],
				'selectors_dictionary' => [
					'top' => 'top: 60px',
				],
			]
		);

		$this->add_responsive_control(
			'lightbox_content_animation',
			[
				'label' => __( 'Entrance Animation', 'elli' ),
				'type' => Controls_Manager::ANIMATION,
				'frontend_available' => true,
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render video widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		$video_url = $settings[ $settings['video_type'] . '_url' ];

		if ( 'hosted' === $settings['video_type'] ) {
			$video_url = $this->get_hosted_video_url();
		}

		if ( empty( $video_url ) ) {
			return;
		}

		if ( 'hosted' === $settings['video_type'] ) {
			ob_start();

			$this->render_hosted_video();

			$video_html = ob_get_clean();
		} else {
			$embed_params = $this->get_embed_params();

			$embed_options = $this->get_embed_options();

		}


		$ale_videoAttr = 'inline';
		$this->add_render_attribute( 'video-wrapper', 'class', 'elementor-open-' . ( $ale_videoAttr ) );
		?>
		<div <?php echo ale_wp_kses($this->get_render_attribute_string( 'video-wrapper' ), 'elli'); ?>>
			<?php
				$this->add_render_attribute( 'image-overlay', 'class', 'elementor-custom-embed-image-overlay fade-animation ale-video-play-wrapper' );

					if ( 'hosted' === $settings['video_type'] ) {
						$lightbox_url = $video_url;
					} else {
						$lightbox_url = Embed::get_embed_url( $video_url, $embed_params, $embed_options );
					}

					$lightbox_options = [
						'type' => 'video',
						'videoType' => $settings['video_type'],
						'url' => $lightbox_url,
						'modalOptions' => [
							'id' => 'elementor-lightbox-' . $this->get_id(),
							'entranceAnimation' => $settings['lightbox_content_animation'],
							'entranceAnimation_tablet' => $settings['lightbox_content_animation_tablet'],
							'entranceAnimation_mobile' => $settings['lightbox_content_animation_mobile'],
							'videoAspectRatio' => $settings['aspect_ratio'],
						],
					];

					if ( 'hosted' === $settings['video_type'] ) {
						$lightbox_options['videoParams'] = $this->get_hosted_params();
					}

					$this->add_render_attribute( 'image-overlay', [
						'data-elementor-open-lightbox' => 'yes',
						'data-elementor-lightbox' => wp_json_encode( $lightbox_options ),
					] );

					if ( Plugin::$instance->editor->is_edit_mode() ) {
						$this->add_render_attribute( 'image-overlay', [
							'class' => 'elementor-clickable',
						] );
					}
				?>
				<div <?php echo ale_wp_kses($this->get_render_attribute_string( 'image-overlay' ), 'elli'); ?>>
					<div class="ale-playvideo-icon">
						<div class="ale-playvideoicon-wrapper"><svg version="1.1" class="ale-video-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="76px" width="76px" viewBox="0 0 106 106" xml:space="preserve">
						<path d="M53,12c-22.6,0-41,18.4-41,41s18.4,41,41,41c22.6,0,41-18.4,41-41S75.6,12,53,12z M43.3,70.5v-35L70.6,53L43.3,70.5z"/>
						<path class="st0" d="M53,0C23.7,0,0,23.7,0,53s23.7,53,53,53s53-23.7,53-53S82.3,0,53,0z M53,93.5c-22.3,0-40.5-18.1-40.5-40.5
							S30.7,12.5,53,12.5S93.5,30.7,93.5,53S75.3,93.5,53,93.5z"/>
						</svg>
						</div><span class="ale-playvideo-button">Watch video</span>
					</div>
				</div>
			</div>
		<?php
	}

	/**
	 * Render video widget as plain content.
	 *
	 * Override the default behavior, by printing the video URL insted of rendering it.
	 *
	 * @since 1.4.5
	 * @access public
	 */
	public function render_plain_content() {
		$settings = $this->get_settings_for_display();

		if ( 'hosted' !== $settings['video_type'] ) {
			$url = $settings[ $settings['video_type'] . '_url' ];
		} else {
			$url = $this->get_hosted_video_url();
		}

		echo esc_url( $url );
	}

	/**
	 * Get embed params.
	 *
	 * Retrieve video widget embed parameters.
	 *
	 * @since 1.5.0
	 * @access public
	 *
	 * @return array Video embed parameters.
	 */
	public function get_embed_params() {
		$settings = $this->get_settings_for_display();

		$params = [];

		if ( $settings['autoplay'] && ! $this->has_image_overlay() ) {
			$params['autoplay'] = '1';
		}

		$params_dictionary = [];

		if ( 'youtube' === $settings['video_type'] ) {
			$params_dictionary = [
				'loop',
				'controls',
				'mute',
				'rel',
				'modestbranding',
			];

			if ( $settings['loop'] ) {
				$video_properties = Embed::get_video_properties( $settings['youtube_url'] );

				$params['playlist'] = $video_properties['video_id'];
			}

			$params['start'] = $settings['start'];

			$params['end'] = $settings['end'];

			$params['wmode'] = 'opaque';
		} elseif ( 'vimeo' === $settings['video_type'] ) {
			$params_dictionary = [
				'loop',
				'mute' => 'muted',
				'vimeo_title' => 'title',
				'vimeo_portrait' => 'portrait',
				'vimeo_byline' => 'byline',
			];

			$params['color'] = str_replace( '#', '', $settings['color'] );

			$params['autopause'] = '0';
		} elseif ( 'dailymotion' === $settings['video_type'] ) {
			$params_dictionary = [
				'controls',
				'mute',
				'showinfo' => 'ui-start-screen-info',
				'logo' => 'ui-logo',
			];

			$params['ui-highlight'] = str_replace( '#', '', $settings['color'] );

			$params['start'] = $settings['start'];

			$params['endscreen-enable'] = '0';
		}

		foreach ( $params_dictionary as $key => $param_name ) {
			$setting_name = $param_name;

			if ( is_string( $key ) ) {
				$setting_name = $key;
			}

			$setting_value = $settings[ $setting_name ] ? '1' : '0';

			$params[ $param_name ] = $setting_value;
		}

		return $params;
	}


	/**
	 * @since 2.1.0
	 * @access private
	 */
	private function get_embed_options() {
		$settings = $this->get_settings_for_display();

		$embed_options = [];

		if ( 'youtube' === $settings['video_type'] ) {
			$embed_options['privacy'] = $settings['yt_privacy'];
		} elseif ( 'vimeo' === $settings['video_type'] ) {
			$embed_options['start'] = $settings['start'];
		}

		return $embed_options;
	}

	/**
	 * @since 2.1.0
	 * @access private
	 */
	private function get_hosted_params() {
		$settings = $this->get_settings_for_display();

		$video_params = [];

		foreach ( [ 'autoplay', 'loop', 'controls' ] as $option_name ) {
			if ( $settings[ $option_name ] ) {
				$video_params[ $option_name ] = '';
			}
		}

		if ( $settings['mute'] ) {
			$video_params['muted'] = 'muted';
		}

		if ( ! $settings['download_button'] ) {
			$video_params['controlsList'] = 'nodownload';
		}

		return $video_params;
	}

	/**
	 * @param bool $from_media
	 *
	 * @return string
	 * @since 2.1.0
	 * @access private
	 */
	private function get_hosted_video_url() {
		$settings = $this->get_settings_for_display();

		if ( ! empty( $settings['insert_url'] ) ) {
			$video_url = $settings['external_url']['url'];
		} else {
			$video_url = $settings['hosted_url']['url'];
		}

		if ( empty( $video_url ) ) {
			return '';
		}

		if ( $settings['start'] || $settings['end'] ) {
			$video_url .= '#t=';
		}

		if ( $settings['start'] ) {
			$video_url .= $settings['start'];
		}

		if ( $settings['end'] ) {
			$video_url .= ',' . $settings['end'];
		}

		return $video_url;
	}
}
