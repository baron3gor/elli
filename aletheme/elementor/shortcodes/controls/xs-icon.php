<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * A Font Icon select box.
 *
 * @property array $icons   A list of font-icon classes. [ 'class-name' => 'nicename', ... ]
 *                          Default Font Awesome icons. @see Control_Icon::get_icons().
 * @property array $include list of classes to include form the $icons property
 * @property array $exclude list of classes to exclude form the $icons property
 *
 * @since 1.0.0
 */
class ale_Icon_Controler extends Elementor\Base_Data_Control {

	public function get_type() {
		return 'icon';
	}

	/**
	 * Get icons list
	 *
	 * @return array
	 */

	public static function get_icons() {

		$icons = array(
		    'fa fa-adjust' =>  'fa fa-adjust',
		    'fa fa-anchor' =>  'fa fa-anchor',
		    'fa fa-archive' =>  'fa fa-archive',
		    'fa fa-area-chart' =>  'fa fa-area-chart',
		    'fa fa-arrows' =>  'fa fa-arrows',
		    'fa fa-arrows-h' =>  'fa fa-arrows-h',
		    'fa fa-arrows-h' =>  'fa fa-arrows-h',
		    'fa fa-check'	=>	'fa fa-check',
		    'fa fa-map-marker'	=>	'fa fa-map-marker',
		    'fa fa-envelope-o'	=>	'fa fa-envelope-o',
		    'fa fa-phone'	=>	'fa fa-phone',
		    'fa fa-facebook'	=>	'fa fa-facebook',
		    'fa fa-bell-o'	=>	'fa fa-bell-o'
		);

		return $icons;
	}

	/**
	 * Retrieve icons control default settings.
	 *
	 * Get the default settings of the icons control. Used to return the default
	 * settings while initializing the icons control.
	 *
	 * @since 1.0.0
	 * @access protected
	 *
	 * @return array Control default settings.
	 */

	protected function get_default_settings() {
		return [
			'options' => self::get_icons(),
		];
	}

	/**
	 * Render icons control output in the editor.
	 *
	 * Used to generate the control HTML in the editor using Underscore JS
	 * template. The variables for the class are available using `data` JS
	 * object.
	 *
	 * @since 1.0.0
	 * @access public
	 */

	public function content_template() {
		?>
		<div class="elementor-control-field">
			<label class="elementor-control-title">{{{ data.label }}}</label>
			<div class="elementor-control-input-wrapper">
				<select class="elementor-control-icon" data-setting="{{ data.name }}" data-placeholder="<?php esc_attr_e( 'Select Icon', 'elli' ); ?>">
					<option value=""><?php esc_attr_e( 'Select Icon', 'elli' ); ?></option>
					<# _.each( data.options, function( option_title, option_value ) { #>
					<option value="{{ option_value }}">{{{ option_title }}}</option>
					<# } ); #>
				</select>
			</div>
		</div>
		<# if ( data.description ) { #>
		<div class="elementor-control-field-description">{{ data.description }}</div>
		<# } #>
		<?php
	}

}
