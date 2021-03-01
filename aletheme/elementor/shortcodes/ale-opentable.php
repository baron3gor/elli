<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Ale_Open_Table extends Widget_Base {

    public function get_name() {
        return 'ale-opentable';
    }

    public function get_title() {
        return esc_html__( 'Elli Open Table', 'elli' );
    }

    public function get_icon() {
        return 'eicon-form-vertical';
    }

    public function get_categories() {
        return [ 'elli-elements' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Elli Open Table', 'elli'),
            ]
        );

        $this->add_control(
            'ale_rid',
            [
                'label' => __( 'Open Table Restaurand ID', 'elli' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'description' => __('Need help finding your restaurant ID? - Read documentation.', 'elli'),
            ]
        );


        $this->end_controls_section();

    }

    protected function render( ) {
        $settings = $this->get_settings();
        $ale_rid  = $settings['ale_rid'];

        wp_enqueue_script( 'ale-datepickerjs', ALETHEME_THEME_URL . '/js/libs/opendatepicker.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true ); ?>
        <div class="elli-form-ot-wrapper fade-animation">
            <form method="get" class="form-ot-wrapper" action="//www.opentable.com/restaurant-search.aspx" target="_blank">
            <div class="form-ot">

                <div class="select-date-ot-wrapper">
                    <input name="startDate" class="select-date-ot" type="text" value="" autocomplete="off" readonly="readonly">
                </div>
                <div class="select-time-ot-wrapper">
                    <select id="time-<?php if(!empty($args["widget_id"])) : echo esc_attr($args["widget_id"], 'elli'); endif; ?>" name="ResTime" class="select-time-ot">
                        <?php
                        //Time Loop
                        //@SEE: http://stackoverflow.com/questions/6530836/php-time-loop-time-one-and-half-of-hour
                        $inc = 30 * 60;
                        $start = ( strtotime( '8AM' ) ); // 6  AM
                        $end = ( strtotime( '11:59PM' ) ); // 10 PM


                        for ( $i = $start; $i <= $end; $i += $inc ) {
                            // to the standart format
                            $time      = date( 'g:i a', $i );
                            $timeValue = date( 'g:ia', $i );
                            $default   = "7:00pm";
                            echo "<option value=\"$timeValue\" " . ( ( $timeValue == $default ) ? ' selected="selected" ' : "" ) . ">$time</option>" . PHP_EOL;
                        }

                        ?>
                    </select>

                </div>
                <div class="select-party-ot-wrapper">
                    <select id="party-<?php if(!empty($args["widget_id"])) : echo esc_attr($args["widget_id"], 'elli'); endif; ?>" name="partySize" class="select-party-ot">
                        <option value="1"><?php echo esc_html('1 Person', 'elli') ?></option>
                        <option value="2" selected="selected"><?php echo esc_html('2 People', 'elli') ?></option>
                        <option value="3"><?php echo esc_html('3 People', 'elli') ?></option>
                        <option value="4"><?php echo esc_html('4 People', 'elli') ?></option>
                        <option value="5"><?php echo esc_html('5 People', 'elli') ?></option>
                        <option value="6"><?php echo esc_html('6 People', 'elli') ?></option>
                        <option value="7"><?php echo esc_html('7 People', 'elli') ?></option>
                        <option value="8"><?php echo esc_html('8 People', 'elli') ?></option>
                        <option value="9"><?php echo esc_html('9 People', 'elli') ?></option>
                        <option value="10"><?php echo esc_html('10 People', 'elli') ?></option>
                    </select>

                </div>

                <div class="ale-btn-send">
                    <input type="submit" class="ale-btn-text" value="<?php _e( 'Book a Table', 'elli' ); ?>" />
                    <div class="overlay"></div>
                </div>
                <input type="hidden" name="RestaurantID" class="RestaurantID" value="<?php echo esc_attr($ale_rid); ?>">
                <input type="hidden" name="rid" class="rid" value="<?php echo esc_attr($ale_rid, 'elli'); ?>">
                <input type="hidden" name="GeoID" class="GeoID" value="15">
                <input type="hidden" name="txtDateFormat" class="txtDateFormat" value="MM/dd/yyyy">
                <input type="hidden" name="RestaurantReferralID" class="RestaurantReferralID" value="<?php echo esc_attr($ale_rid); ?>">
                <span class="ot-copy-right"><?php echo esc_html('Powered by OpenTable', 'elli') ?></span>
            </div>
        </form>
    </div>
    
        <?php
    }

    protected function _content_template() { }
}