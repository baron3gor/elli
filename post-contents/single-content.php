<?php if(has_post_thumbnail()) : ?>
	<figure class="ale-post-thumb-wrapper fade-image">
 		<?php the_post_thumbnail();?>
	</figure>
<?php endif; ?>
<div class="story cf">
	<div class="ale-single-title-wrapper fade-animation">
		<span class="blog-cats"><?php echo the_category(', ');?></span>
    	<h2 class="ale-single-post-title"><?php the_title(); ?></h2>
		<span class="separate_dots">
            <i class="fa fa-circle" aria-hidden="true"></i>
            <i class="fa fa-circle" aria-hidden="true"></i>
            <i class="fa fa-circle" aria-hidden="true"></i>
        </span>
    </div>
    <div class="ale-single-content-wrapper fade-animation">
    	<?php the_content(); ?>
    </div>
</div>