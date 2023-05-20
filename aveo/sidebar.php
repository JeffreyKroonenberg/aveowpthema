<?php
/**
 * The Sidebar
 */
?>

<?php if (is_active_sidebar( 'aveo-blog-sidebar' )): ?>
	<div id="blog-sidebar" class="blog-sidebar">
		<div class="blog-sidebar-content clearfix">
			<?php if ( !dynamic_sidebar( 'aveo-blog-sidebar' ) ) : ?>

				<div class="sidebar-item">
					<?php get_search_form(); ?>
				</div>

				<div class="sidebar-item">
					<div class="sidebar-title">
						<h4><?php esc_html_e( 'Archives', 'aveo' ); ?></h4>
					</div>
					<ul>
						<?php wp_get_archives(array( 
						'type' => 'monthly'
						)); ?>
					</ul>
				</div>

			<?php endif; // end sidebar widget area ?>
		</div>
	</div>
<?php endif; ?>
