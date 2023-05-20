<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 */
$permalink = esc_url(get_permalink());
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php aveo_theme_post_thumbnail(); ?>

	<div class="post-content">
		<header class="entry-header">
			<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && aveo_theme_categorized_blog() ) : ?>
			<?php
				endif;

				if ( is_single() ) :
					the_title( '<h2 class="entry-title">', '</h2>' );
				else :
					the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
				endif;
			?>

			<div class="entry-meta">
				<?php
					if ( 'post' == get_post_type() ):
						aveo_theme_posted_on();
					endif;
				?>
				<?php
					if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
				?>

				<?php
					endif;

					edit_post_link( esc_html__( 'Edit', 'aveo' ), '<span class="divider">|</span> <span class="edit-link">', '</span>' );
				?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<?php if ( is_category() || is_search() || is_archive() ) : ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php
			$theme_excerpt = get_option( 'theme_excerpt', 'No' );
											
			if ( $theme_excerpt == 'Yes' ):
				the_excerpt();
			elseif ( $theme_excerpt == 'standard' ):
				the_excerpt();
			else:
				the_content( esc_html__( 'Continue reading...', 'aveo' ) );
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'aveo' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
			endif; ?>
		</div><!-- .entry-content -->

		<div class="entry-meta entry-tags-share">
			<?php the_tags( '<span class="tags">', '', '</span>' ); ?>

			<!-- Share Buttons -->
			<?php if ( function_exists( 'aveo_theme_share_buttons' ) ) : ?>
				<div class="entry-share btn-group share-buttons">
					<?php aveo_theme_share_buttons($permalink); ?>
				</div>
			<?php endif; ?>
			<!-- /Share Buttons -->
		</div>
		<?php endif; ?>
	</div>
</article><!-- #post-## -->
