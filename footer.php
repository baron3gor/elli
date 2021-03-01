</div>
</div>
</div> <!-- Main Container End -->
</div><!-- Wrapper End -->
	<?php global $ale_red_option;

	if(!is_page_template('template-left-sidebar.php') && (is_active_sidebar( 'footer1' ) || is_active_sidebar( 'footer2' ) || is_active_sidebar( 'footer3' ) || is_active_sidebar( 'footer4' ))) : ?>  
		<footer class="elli-main-footer" <?php if(!empty(ale_get_meta('color_footer'))) : echo ale_wp_kses('data-color="' . ale_get_meta('color_footer') . '"', 'elli'); endif; ?>>
			<div class="footer-bg-wrapper">
				<div class="footer-container">
					<div class="footer-wrapper">
						<?php if ( is_active_sidebar( 'footer1' ) ) { ?>
						    <aside class="ale-footersb sidebarfooter1">
						        <div class="sidebar_container">
						            <?php dynamic_sidebar( 'footer1' ); ?>
						        </div>
						    </aside>
						<?php } ?>
						<?php if ( is_active_sidebar( 'footer2' ) ) { ?>
						    <aside class="ale-footersb sidebarfooter2">
						        <div class="sidebar_container">
						            <?php dynamic_sidebar( 'footer2' ); ?>
						        </div>
						    </aside>
						<?php } ?>
						<?php if ( is_active_sidebar( 'footer3' ) ) { ?>
						    <aside class="ale-footersb sidebarfooter3">
						        <div class="sidebar_container">
						            <?php dynamic_sidebar( 'footer3' ); ?>
						        </div>
						    </aside>
						<?php } ?>
						<?php if ( is_active_sidebar( 'footer4' ) ) { ?>
						    <aside class="ale-footersb sidebarfooter4">
						        <div class="sidebar_container">
						            <?php dynamic_sidebar( 'footer4' ); ?>
						        </div>
						    </aside>
						<?php } ?>
					</div>
				</div>
				<div class="ale-footer-dott-background"></div>
				<div class="ale-footer-dott-background2"></div>
			</div>
		</footer>
	<?php endif; ?>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>