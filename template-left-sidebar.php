<?php
/**
 *
 * Template Name: Left Sidebar
 */
session_start(); get_header(); ?>
<div class="template" role="main">
	<div class="elli-wrapper-template">
    <div class="builder-content">
		<?php while ( have_posts() ) : the_post(); ?>
		<!-- full-width-content -->
		<div id="post-<?php the_ID(); ?>" <?php post_class();?>>
			<?php the_content(); ?>
		</div> <!-- end full-width-content -->

		<?php endwhile; ?>

    </div> <!-- end main-content -->

</div> <!-- end main-content -->
<?php get_footer(); ?>