<?php $ale_external_link = ale_get_meta('ext_link');
if(has_post_thumbnail()) : ?>
	<figure class="ale-post-thumb-wrapper fade-image">
 		<a href="<?php echo esc_url($ale_external_link, 'elli'); ?>">                  
	        <?php the_post_thumbnail();?>
	    </a>
	</figure>
<?php endif; ?>
<div class="ale-singlepost-link-wrapper fade-animation">
	<div class="ale-iconstyle-wrapper">
	    <svg version="1.1" class="ale-link-svg" id="ale-link" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="66px" height="66px" viewBox="0 0 82 82" overflow="scroll" xml:space="preserve">
	        <path fill="#ff6d24" d="M41,0C18.4,0,0,18.4,0,41s18.4,41,41,41s41-18.4,41-41S63.6,0,41,0z M40.8,49.5l-6.4,6.4
	            c-0.8,0.8-1.9,1.2-3.2,1.2c-1.6,0-3.3-0.7-4.4-1.8c-1.9-1.9-2.6-5.7-0.7-7.7l6.4-6.4c0.9-0.9,2.2-1.4,3.5-1.4c0.5,0,1,0.1,1.4,0.2
	            l-9.5,9.5c-1,1-0.1,3.2,0.7,4c0.6,0.6,1.7,1.1,2.6,1.1c0.5,0,1-0.2,1.3-0.5l9.5-9.5C42.5,46.3,42,48.2,40.8,49.5z M46,34.1
	            c0.3-0.3,0.6-0.4,1-0.4c0.4,0,0.7,0.1,1,0.4c0.5,0.5,0.5,1.4,0,1.9L36,47.9c-0.3,0.3-0.6,0.4-1,0.4c-0.4,0-0.7-0.1-1-0.4
	            c-0.5-0.5-0.5-1.4,0-1.9L46,34.1z M55.9,34.3l-6.4,6.4c-0.9,0.9-2.2,1.4-3.5,1.4c-0.5,0-1-0.1-1.4-0.2l9.5-9.5c1-1,0.1-3.2-0.7-4
	            c-0.6-0.6-1.7-1.1-2.6-1.1c-0.5,0-1,0.2-1.3,0.5L40,37.4c-0.5-1.7-0.1-3.6,1.2-4.9l6.4-6.4c0.8-0.8,1.9-1.2,3.2-1.2
	            c1.6,0,3.3,0.7,4.4,1.8C57.1,28.6,57.9,32.4,55.9,34.3z"/>
	    </svg>
	</div>
	<div class="post-list-body">
	    <div class="post-list-info">
	        <div class="post-list-top">
	            <div class="post-list-title">
	                <h3 class="post-list-name"><?php the_title(); ?></h3>
	            </div>
	        </div>
	        <div class="post-list-bottom">
	            <h6 class="ale-link-title"><?php echo esc_html($ale_external_link, 'elli'); ?></h6>
	        </div>
	    </div>
	</div>
</div>
<div class="story cf">
	<div class="ale-single-content-wrapper fade-animation">
		<?php the_content(); ?>
	</div>
</div>