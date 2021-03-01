<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Ale_Sidebar extends Widget_Base {

    public function get_name() {
        return 'ale-sidebar';
    }

    public function get_title() {
        return esc_html__( 'Elli Side Bar', 'elli' );
    }

    public function get_icon() {
        return 'eicon-sidebar';
    }

    public function get_categories() {
        return [ 'elli-elements' ];
    }


	protected function _register_controls() {
		global $wp_registered_sidebars;

		$options = [];

		if ( ! $wp_registered_sidebars ) {
			$options[''] = __( 'No sidebars were found', 'elli' );
		} else {
			$options[''] = __( 'Choose Sidebar', 'elli' );

			foreach ( $wp_registered_sidebars as $sidebar_id => $sidebar ) {
				$options[ $sidebar_id ] = $sidebar['name'];
			}
		}

		$default_key = array_keys( $options );
		$default_key = array_shift( $default_key );

		$this->start_controls_section(
			'section_sidebar',
			[
				'label' => __( 'Sidebar', 'elli' ),
			]
		);

		$this->add_control( 'sidebar', [
			'label' => __( 'Choose Sidebar', 'elli' ),
			'type' => Controls_Manager::SELECT,
			'default' => $default_key,
			'options' => $options,
		] );

		$this->add_responsive_control(
            'title_align', [
                'label'          => esc_html__( 'elli', 'elli' ),
                'type'           => Controls_Manager::CHOOSE,
                'options'        => [

                    'left'       => [
                        'title'  => esc_html__( 'Left', 'elli' ),
                        'icon'   => 'fa fa-align-left',
                    ],
                    'center'     => [
                        'title'  => esc_html__( 'Center', 'elli' ),
                        'icon'   => 'fa fa-align-center',
                    ],
                    'right'      => [
                        'title'  => esc_html__( 'Right', 'elli' ),
                        'icon'   => 'fa fa-align-right',
                    ],
                    'justify'    => [
                        'title'  => esc_html__( 'Justified', 'elli' ),
                        'icon'   => 'fa fa-align-justify',
                    ],
                ],
                'default'        => 'left',
                'prefix_class'   => 'ale-head-text elementor%s-align-',
            ]
        );

		$this->end_controls_section();
	}

	/**
	 * Render sidebar widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$sidebar = $this->get_settings_for_display( 'sidebar' );

		if ( empty( $sidebar ) ) {
			return;
		}?>

		<aside class="<?php echo esc_attr($sidebar) . '-wrapper' ;?> fade-animation">
	        <div class="sidebar_container">
				<?php dynamic_sidebar( $sidebar ); ?>
			</div>
	    </aside>

	    <?php 
	}

	/**
	 * Render sidebar widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _content_template() {}

	/**
	 * Render sidebar widget as plain content.
	 *
	 * Override the default render behavior, don't render sidebar content.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function render_plain_content() {}
}
