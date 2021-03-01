<?php if(ale_show_posts_nav()){ ?>
    <div class="pagination default_pagination font_two cf">
        <div class="wrapper pag_links">
        <div class="left_arrow">
            <span class="prev_page">
                 <?php if(get_previous_posts_link()) { echo get_previous_posts_link('<i class="fa fa-arrow-left" aria-hidden="true"></i> '.esc_html__('Previous','elli')); }
                 else { echo "<i class=\"fa fa-arrow-left\" aria-hidden=\"true\"></i> ". esc_html__("Previous","elli"); } ?>
            </span>
        </div>
        <div class="center_buttons">
            <?php ale_page_links(); ?>
        </div>
        <div class="right_arrow">
            <span class="next_page">
                <?php if(get_next_posts_link()){echo  get_next_posts_link(esc_html__('Next','elli'). ' <i class="fa fa-arrow-right" aria-hidden="true"></i>');}
                else { echo esc_html__("Next","elli"). " <i class=\"fa fa-arrow-right\" aria-hidden=\"true\"></i>"; } ?>
            </span>
        </div>
        </div>
    </div>
<?php } ?>