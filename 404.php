<?php get_header(); ?>
    <div class="ale-page-wrapper404 wrapper">
        <!-- Content -->
        <div class="ale-page404-container">

            <div class="fade-animation">
                <div class="ale-page404-title">
                    <h2 class="sub-title errorh1"><?php esc_html_e('404','elli'); ?></h2>
                    <span class="separate_dots">
                        <i class="fa fa-circle" aria-hidden="true"></i>
                        <i class="fa fa-circle" aria-hidden="true"></i>
                        <i class="fa fa-circle" aria-hidden="true"></i>
                    </span>
                </div>
                <p class="errorp"><?php esc_html_e('Sorry, but the page you\'re looking for has not found. Try checking the URL for errors, then hit the refresh button on your browser.','elli'); ?></p>
                <div class="btn-wrapper">
                    <a href="<?php echo esc_js('javascript:history.go(-1)'); ?>" class="ale-button-404 ale-btn"><span class="ale-btn-text"><?php esc_html_e('Go Back','elli'); ?></span>
                    <div class="overlay"></div></a>
                </div>  
            </div>
            <div class="ale-dott-left-background"></div>
            <div class="ale-dott-right-background"></div>
        </div>        
    </div>
<?php get_footer(); ?>