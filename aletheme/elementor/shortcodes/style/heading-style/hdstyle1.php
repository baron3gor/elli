<div class="elli-heading-title fade-animation elli-header-style-h1">
    <?php if(!empty($ale_title) || !empty($ale_sub_title)): ?>
    	<h6><?php echo esc_html( $ale_sub_title ); ?></h6>
        <h1 class="elli-title-style"><?php echo esc_html( $ale_title ); ?></h1>
        <span class="separate_dots">
            <i class="fa fa-circle" aria-hidden="true"></i>
            <i class="fa fa-circle" aria-hidden="true"></i>
            <i class="fa fa-circle" aria-hidden="true"></i>
        </span>
    <?php endif; ?>
</div>