<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Ale_Gallery_Widget_Two extends Widget_Base {

    public $base;

    public function get_name() {
        return 'ale-gallery';
    }

    public function get_title() {
        return esc_html__( 'Elli Gallery', 'elli' );
    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }

    public function get_categories() {
        return [ 'elli-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Gallery', 'elli'),
            ]
        );

        $this->add_control(
            'style', [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Choose Style', 'elli'),
                'options' => [
                    '1' => esc_html__('Two Columns 1.', 'elli'),
                    '2' => esc_html__('Two Columns 2.', 'elli'),
                    '3' => esc_html__('Two Columns 3.', 'elli'),
                    '4' => esc_html__('Two Columns 4.', 'elli'),
                    '5' => esc_html__('Three Columns 1.', 'elli'),
                    '6' => esc_html__('Three Columns 2.', 'elli'),
                    '7' => esc_html__('Three Columns 3.', 'elli'),
                    '8' => esc_html__('Three Columns 4.', 'elli'),
                ],
            ]
        );

        $this->add_control(
            'post_count',
            [
                'label'         => esc_html__( 'Post count', 'elli' ),
                'type'          => Controls_Manager::NUMBER,
                'default'       => esc_html__( '6', 'elli' ),

            ]
        );

        $this->end_controls_section();
    }

    protected function render( ) {
        $settings          = $this->get_settings();
        $ale_style_gallery = $settings['style']; 
        $ale_post_count    = $settings['post_count'];
     
        wp_enqueue_script('jquery-masonry');?>

        <div class="projects-gallery-wrapper">
            <div class="project-cats">
                <div>
                    <?php if($ale_style_gallery != '7' && $ale_style_gallery != '8' && $ale_style_gallery != '3' && $ale_style_gallery != '4') : ?>
                    <div class="categories-wrapper-list">
                        <?php 
                        $categories = get_terms( array(
                            'taxonomy'   => 'project-category',
                            'hide_empty' => true,
                            'orderby'    => 'name',
                            'order'      => 'ASC'
                        )); ?>

                        <div class="gallery-tab-item current_gallery fade-animation" data-id="0"><h6><?php echo esc_html_e('All','elli'); ?></h6></div><?php foreach( $categories as $category ) {


                            if(isset($category->term_id)) :
                                $ale_curid = $category->term_id;
                                $ale_curname = $category->name;?><div class='gallery-tab-item fade-animation' data-id='<?php echo esc_html($ale_curid); ?>'><h6><?php echo esc_html($ale_curname, 'elli') ?></h6></div><?php endif; } ?>
                    </div>
                <?php endif; 
                    $args = array(
                        'post_type'      => 'projects',
                        'post_status'    => 'publish',
                        'posts_per_page' => $ale_post_count,
                    );

                    $ale_gallery  = new \WP_Query($args);
                    $ale_max_page = $ale_gallery->max_num_pages;

                    ?>
                    <div class="projects-content-wrapper-container">
                    <div class="content-wrapper-gallery" data-perpage="<?php echo esc_attr($ale_post_count, 'elli'); ?>" data-maxpage="<?php echo esc_attr($ale_max_page, 'elli') ?>" data-btn="<?php echo esc_attr($ale_style_gallery, 'elli') ?>">
                        <?php if ($ale_gallery->have_posts()) : while ($ale_gallery->have_posts()) : $ale_gallery->the_post();
                            $ale_img_id = get_post_thumbnail_id();
                            $ale_term_list = get_the_term_list(get_the_ID(), 'project-category', '', ' / ', ''); ?>
                                <?php switch ($ale_style_gallery) {
                                    case '1':
                                        require ALETHEME_PATH. '/elementor/shortcodes/style/gallery-style/style1.php';
                                        break;

                                    case '2':
                                        require ALETHEME_PATH. '/elementor/shortcodes/style/gallery-style/style2.php';
                                        break;

                                    case '3':
                                        require ALETHEME_PATH. '/elementor/shortcodes/style/gallery-style/style3.php';
                                        break;

                                    case '4':
                                        require ALETHEME_PATH. '/elementor/shortcodes/style/gallery-style/style4.php';
                                        break;

                                    case '5':
                                        require ALETHEME_PATH. '/elementor/shortcodes/style/gallery-style/style5.php';
                                        break;
                                    case '6':
                                        require ALETHEME_PATH. '/elementor/shortcodes/style/gallery-style/style6.php';
                                        break;
                                    case '7':
                                        require ALETHEME_PATH. '/elementor/shortcodes/style/gallery-style/style7.php';
                                        break;
                                    case '8':
                                        require ALETHEME_PATH. '/elementor/shortcodes/style/gallery-style/style8.php';
                                        break;
                                } ?>
                    <?php endwhile;
                        else: ?>
                            <?php get_template_part('partials/notfound')?>
                        <?php endif; wp_reset_postdata();?>
                    </div>
                    </div>
                </div>
            </div>
        </div>

       <?php }

    protected function _content_template() { }
}