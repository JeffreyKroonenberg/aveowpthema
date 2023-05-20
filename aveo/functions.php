<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

/**
 * Theme Includes
 */
require_once get_template_directory() .'/inc/init.php';



/**
 * TGM Plugin Activation
 */
{
	require_once  get_template_directory() . '/TGM-Plugin-Activation/class-tgm-plugin-activation.php';

	add_action( 'tgmpa_register', 'aveo_register_required_plugins' );

	/** @internal */
	function aveo_register_required_plugins() {
		tgmpa( array(
			array(
				'name'      => 'Unyson',
				'slug'      => 'unyson',
				'required'  => true,
			),
			array(
				'name'               => 'Aveo Shortcodes', // The plugin name.
				'slug'               => 'aveo-shortcodes', // The plugin slug (typically the folder name).
				'source'             => get_template_directory_uri() . '/admin/plugins/aveo-shortcodes.zip', // The plugin source.
				'required'           => true,
				'version'            => '1.1.0',
			),
			array(
				'name'               => 'Aveo Portfolio', // The plugin name.
				'slug'               => 'aveo-portfolio', // The plugin slug (typically the folder name).
				'source'             => get_template_directory_uri() . '/admin/plugins/aveo-portfolio.zip', // The plugin source.
				'required'           => true,
				'version'            => '1.0.8',
			),
			array(
				'name'               => 'Aveo Share Buttons', // The plugin name.
				'slug'               => 'aveo-share-buttons', // The plugin slug (typically the folder name).
				'source'             => get_template_directory_uri() . '/admin/plugins/aveo-share-buttons.zip', // The plugin source.
				'required'           => true,
				'version'            => '1.0.0',
			),
			array(
				'name'               => 'Aveo Tracking, External CSS and JS', // The plugin name.
				'slug'               => 'aveo-tracking-and-external-css', // The plugin slug (typically the folder name).
				'source'             => get_template_directory_uri() . '/admin/plugins/aveo-tracking-and-external-css.zip', // The plugin source.
				'required'           => true,
				'version'            => '1.0.0',
			),
			array(
				'name'               => 'Aveo Contact Form', // The plugin name.
				'slug'               => 'aveo-contact-form', // The plugin slug (typically the folder name).
				'source'             => get_template_directory_uri() . '/admin/plugins/aveo-contact-form.zip', // The plugin source.
				'required'           => true,
				'version'            => '1.0.3',
			),
			array(
				'name'               => 'Envato Market', // The plugin name.
				'slug'               => 'envato-market', // The plugin slug (typically the folder name).
				'source'             => get_template_directory_uri() . '/admin/plugins/envato-market.zip', // The plugin source.
				'required'           => false,
				'version'            => '2.0.1',
			),
		) );

	}
}

/* ================================================================================================ */



/**
 * LMPixels ajax url
 */

if( ! function_exists( 'aveo_ajaxurl' ) ){
  function aveo_ajaxurl() {
  	$inline_ajax_script = 'var ajaxurl = ' . '"' . admin_url('admin-ajax.php') . '"' . ';';
  	wp_add_inline_script( 'aveo-jquery-main', $inline_ajax_script);
  }
}
add_action('wp_head','aveo_ajaxurl');

/* ================================================================================================ */



/**
 * Content Width
 */
if ( ! isset( $content_width ) ) $content_width = 1032;
/* ================================================================================================ */



/**
 * LMPixels Start page widget
 */
class AVEO_Start_Page_Widget extends WP_Widget
{
	private $options;
    private $prefix;

	public function __construct()
	{
		parent::__construct('start_page_widget',
							__( '+ AVEO Theme &#151; Start Page', 'aveo' ),
							array( 'description' => esc_html__( 'About Me, Resume etc.', 'aveo' ) ) );
	}
	
	
	public function form( $instance )
	{
		if ( isset( $instance[ 'title' ] ) ) { $title = $instance[ 'title' ]; } else { $title = ""; }
		if ( isset( $instance[ 'start_page_slug' ] ) ) { $start_page_slug = $instance[ 'start_page_slug' ]; } else { $start_page_slug = ""; }
		
		?>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><strong><?php echo esc_html_e( 'Title', 'aveo' ); ?></strong></label>
				
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr( $title ); ?>">
			</p>
			
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'start_page_slug' )); ?>"><strong><?php echo esc_html_e( 'Select A Page', 'aveo' ); ?></strong></label>
				
				<select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'start_page_slug' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'start_page_slug' )); ?>">
				
					<option></option>
					
					<?php
						$pages = get_pages();
						
						foreach ( $pages as $page )
						{
							if ( $start_page_slug == $page->post_name )
							{
								$option = '<option selected="selected" value="' . $page->post_name . '">' . $page->post_title . '</option>';
								
								echo wp_kses($option, array('option' => array('selected' => array(), 'value' => array())));
							}
							else
							{
								$option = '<option value="' . $page->post_name . '">' . $page->post_title . '</option>';
								
								echo wp_kses($option, array('option' => array('value' => array())));
							}
						}
					?>
				</select>
			</p>
		<?php
	}
	

	public function update( $new_instance, $old_instance )
	{
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['start_page_slug'] = strip_tags( $new_instance['start_page_slug'] );
        return $instance;
	}
	
	
	public function widget( $args, $instance )
	{
		extract( $args );

		$title = apply_filters( 'widget_title', $instance['title'] );

		$start_page_slug = apply_filters( 'widget_start_page_slug', $instance['start_page_slug'] );
		
		echo wp_kses_post( $before_widget );
		
		?>
			<section data-id="<?php echo esc_attr($start_page_slug); ?>" data-title="<?php echo esc_attr($title); ?>" class="pt-page pt-page-<?php echo esc_attr($start_page_slug); ?>">
         		<div class="section-inner start-page-content">

					<div class="page-header">
						<div class="row">
							<?php
				            $photo = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option('hp_main_photo') : '';
				            if( !empty( $photo ) ) :
				            ?>
				        	<div class="col-sm-4 col-md-4 col-lg-4">
					            <div class="photo">
					                <a href="<?php echo esc_url(home_url('/')); ?>">
					                    <img src="<?php echo esc_url($photo['url']); ?>" alt="<?php esc_attr_e('image', 'aveo'); ?>">
					                </a>
					            </div>
					        </div>

				            <div class="col-sm-8 col-md-8 col-lg-8">
				            <?php else: ?>
							<div class="col-sm-12 col-md-12 col-lg-12">
							<?php endif ?>
								<div class="title-block">
									<?php
									$main_title = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('hp_main_title') :  get_bloginfo( 'name' );
						            if( !empty( $main_title ) ) :
						            ?>
									<h2><?php echo esc_html($main_title); ?></h2>
									<?php endif; ?>
									<?php if ( function_exists('fw_get_db_settings_option') ): ?>
									<div class="owl-carousel text-rotation">                                    
										<?php foreach (( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('hp_subtitles') : '' as $aveo_project_tags): ?>
											<div class="item">
												<div class="sp-subtitle"><?php echo esc_html($aveo_project_tags); ?></div>
											</div>
										<?php endforeach; ?>
									</div>
									<?php endif; ?>
								</div>

								<?php if ( function_exists('fw_get_db_settings_option') ): ?>
	                            <div class="social-links">
	                                <?php foreach (( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('hp_social') : '' as $aveo_hp_social): 
	                                    if( !empty( $aveo_hp_social['link'] ) ) {
	                                        if (!empty($aveo_hp_social['image']['url'])) { ?>
	                                            <a href="<?php echo esc_url($aveo_hp_social['link']); ?>" target="_blank" title="<?php echo esc_attr($aveo_hp_social['title']); ?>">
	                                                <img src="<?php echo esc_url($aveo_hp_social['image']['url']); ?>" alt="<?php echo esc_attr($aveo_hp_social['title']); ?>">
	                                            </a>
	                                        <?php } else { ?>
	                                            <a href="<?php echo esc_url($aveo_hp_social['link']); ?>" target="_blank" title="<?php echo esc_attr($aveo_hp_social['title']); ?>">
	                                                <i class="<?php echo esc_attr($aveo_hp_social['icon']); ?>"></i>
	                                            </a>
	                                        <?php
	                                        }
	                                    }
	                                endforeach; ?>
	                            </div>
	                            <?php endif; ?>
							</div>
						</div>
					</div>

					<?php
						$args_start_page = 'pagename=' . $start_page_slug;
						$loop_start_page = new WP_Query( $args_start_page );
						
						if ( $loop_start_page->have_posts() ) :
							while ( $loop_start_page->have_posts() ) : $loop_start_page->the_post();
								?>
								<div class="page-content">
								<?php
								the_content();
								?>
								</div>
								<?php
							endwhile;
						endif;
						wp_reset_postdata();
					?>
				</div>
			</section>
		<?php
		
		echo wp_kses_post( $after_widget );

	}
}

function aveo_register_start_page_widget() {
	register_widget( "aveo_start_page_widget" );
}

add_action( 'widgets_init', 'aveo_register_start_page_widget' );

/* ================================================================================================ */



/**
 * LMPixels custom page widget
 */
class AVEO_Custom_Page_Widget extends WP_Widget
{
	private $options;
    private $prefix;

	public function __construct()
	{
		parent::__construct('custom_page_widget',
							__( '+ AVEO Theme &#151; Custom Page', 'aveo' ),
							array( 'description' => esc_html__( 'About Me, Resume etc.', 'aveo' ) ) );
	}
	
	
	public function form( $instance )
	{
		if ( isset( $instance[ 'title' ] ) ) { $title = $instance[ 'title' ]; } else { $title = ""; }
		if ( isset( $instance[ 'custom_page_slug' ] ) ) { $custom_page_slug = $instance[ 'custom_page_slug' ]; } else { $custom_page_slug = ""; }
		
		?>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><strong><?php echo esc_html_e( 'Title', 'aveo' ); ?></strong></label>
				
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr( $title ); ?>">
			</p>
			
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'custom_page_slug' )); ?>"><strong><?php echo esc_html_e( 'Select A Page', 'aveo' ); ?></strong></label>
				
				<select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'custom_page_slug' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'custom_page_slug' )); ?>">
				
					<option></option>
					
					<?php
						$pages = get_pages();
						
						foreach ( $pages as $page )
						{
							if ( $custom_page_slug == $page->post_name )
							{
								$option = '<option selected="selected" value="' . $page->post_name . '">' . $page->post_title . '</option>';

								echo wp_kses($option, array('option' => array('selected' => array(), 'value' => array())));
							}
							else
							{
								$option = '<option value="' . $page->post_name . '">' . $page->post_title . '</option>';
								
								echo wp_kses($option, array('option' => array('value' => array())));
							}
						}
					?>
				</select>
			</p>

		<?php
	}
	

	public function update( $new_instance, $old_instance )
	{
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['custom_page_slug'] = strip_tags( $new_instance['custom_page_slug'] );

        return $instance;
	}
	
	
	public function widget( $args, $instance )
	{
		extract( $args );
		
		
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		$custom_page_slug = apply_filters( 'widget_custom_page_slug', $instance['custom_page_slug'] );
		
		echo wp_kses_post( $before_widget );
		
		?>
			<section data-id="<?php echo esc_attr($custom_page_slug); ?>" data-title="<?php echo esc_attr($title); ?>" class="pt-page pt-page-<?php echo esc_attr($custom_page_slug); ?>">
				<div class="section-inner custom-page-content">
					<div class="page-header">
						<h2 class="section-title"><?php echo esc_html($title); ?></h2>
					</div>
					<div class="page-content">
						<?php
							$args_custom_page = 'pagename=' . $custom_page_slug;
							$loop_custom_page = new WP_Query( $args_custom_page );
							
							if ( $loop_custom_page->have_posts() ) :
								while ( $loop_custom_page->have_posts() ) : $loop_custom_page->the_post();
								
									the_content();
								
								endwhile;
							endif;
							wp_reset_postdata();
						?>
					</div>
				</div>
			</section>
		<?php
		
		echo wp_kses_post( $after_widget );

	}
}

function aveo_register_custom_page_widget() {
	register_widget( "aveo_custom_page_widget" );
}

add_action( 'widgets_init', 'aveo_register_custom_page_widget' );

/* ================================================================================================ */




/**
 * LMPixels Blog page widget
 */

	class AVEO_Blog_Widget extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct('blog_widget',
								__( '+ AVEO Theme &#151; Blog Page', 'aveo' ),
								array( 'description' => esc_html__( 'Blog posts.', 'aveo' ) ) );
		}
		
		public function form( $instance )
		{
			if ( isset( $instance[ 'title' ] ) ) { $title = $instance[ 'title' ]; } else { $title = ""; }
			
			if ( isset( $instance[ 'blog_page_slug' ] ) ) { $blog_page_slug = $instance[ 'blog_page_slug' ]; } else { $blog_page_slug = ""; }
			
			if ( isset( $instance[ 'blog_number_of_posts' ] ) ) { $blog_number_of_posts = $instance[ 'blog_number_of_posts' ]; } else { $blog_number_of_posts = '8'; }
			
			if ( isset( $instance[ 'blog_editor_content' ] ) ) { $blog_editor_content = $instance[ 'blog_editor_content' ]; } else { $blog_editor_content = false; }
			
			if ( isset( $instance[ 'blog_top_content' ] ) ) { $blog_top_content = $instance[ 'blog_top_content' ]; } else { $blog_top_content = false; }
			
			if ( isset( $instance[ 'layout' ] ) ) { $layout = $instance[ 'layout' ]; } else { $layout = 'two-columns'; }
			
			if ( isset( $instance[ 'show_posts_with_feat_img' ] ) ) { $show_posts_with_feat_img = $instance[ 'show_posts_with_feat_img' ]; } else { $show_posts_with_feat_img = false; }
			
			?>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><strong><?php echo esc_html_e( 'Title', 'aveo' ); ?></strong></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr( $title ); ?>">
				</p>
				
				<p>
					<label for="<?php echo esc_attr($this->get_field_id( 'blog_page_slug' )); ?>"><strong><?php echo esc_html_e( 'Select A Page', 'aveo' ); ?></strong></label>
					
					<select id="<?php echo esc_attr($this->get_field_id( 'blog_page_slug' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'blog_page_slug' )); ?>" class="widefat">
					
						<option></option>
						
						<?php
							$pages = get_pages();
							
							foreach ( $pages as $page )
							{
								if ( $blog_page_slug == $page->post_name )
								{
									$option = '<option selected="selected" value="' . $page->post_name . '">' . $page->post_title . '</option>';
									echo wp_kses($option, array('option' => array('selected' => array(), 'value' => array())));
								}
								else
								{
									$option = '<option value="' . $page->post_name . '">' . $page->post_title . '</option>';
									echo wp_kses($option, array('option' => array('value' => array())));
								}
							}
						?>
					</select>
				</p>
				
				
				<h4><?php echo esc_html_e( 'Content Editor', 'aveo' ); ?></h4>
				
				<p>
					<label><input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'blog_editor_content' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'blog_editor_content' )); ?>" <?php if ( $blog_editor_content ) { echo 'checked="checked"'; } ?>> <?php echo esc_html_e( 'Enable content editor', 'aveo' ); ?></label>
				</p>
				
				
				<p>
					<label><input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'blog_top_content' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'blog_top_content' )); ?>" <?php if ( $blog_top_content ) { echo 'checked="checked"'; } ?>> <?php echo esc_html_e( 'Show content editor on the top', 'aveo' ); ?></label>
				</p>
				
				
				<h4><?php echo esc_html_e( 'Layout', 'aveo' ); ?></h4>
				
				<p>
					<select id="<?php echo esc_attr($this->get_field_id( 'layout' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'layout' )); ?>" class="widefat">
						<option <?php if ( $layout == 'one-column' ) { echo 'selected="selected"'; } ?> value="one-column"><?php echo esc_html_e( '1 Column', 'aveo' ); ?></option>
						
						<option <?php if ( $layout == 'two-columns' ) { echo 'selected="selected"'; } ?> value="two-columns"><?php echo esc_html_e( '2 Columns', 'aveo' ); ?></option>

						<option <?php if ( $layout == 'three-columns' ) { echo 'selected="selected"'; } ?> value="three-columns"><?php echo esc_html_e( '3 Columns', 'aveo' ); ?></option>
					</select>
				</p>


				<p>
					<label for="<?php echo esc_attr($this->get_field_id( 'blog_number_of_posts' )); ?>"><?php echo esc_html_e( 'Number of posts to show:', 'aveo' ); ?></label>
					
					<input type="text" id="<?php echo esc_attr($this->get_field_id( 'blog_number_of_posts' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'blog_number_of_posts' )); ?>" size="3" value="<?php echo esc_attr( $blog_number_of_posts ); ?>">
				</p>
				
				
				<p>
					<label><input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'show_posts_with_feat_img' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_posts_with_feat_img' )); ?>" <?php if ( $show_posts_with_feat_img ) { echo 'checked="checked"'; } ?>> <?php echo esc_html_e( 'Show only posts with featured image', 'aveo' ); ?></label>
				</p>
			<?php
		}
		
		
		public function update( $new_instance, $old_instance )
		{
			$instance = array();
			
			$instance['title'] = strip_tags( $new_instance['title'] );
			
			$instance['blog_page_slug'] = strip_tags( $new_instance['blog_page_slug'] );
			
			$instance['blog_number_of_posts'] = strip_tags( $new_instance['blog_number_of_posts'] );
			
			$instance['blog_editor_content'] = strip_tags( $new_instance['blog_editor_content'] );
			
			$instance['blog_top_content'] = strip_tags( $new_instance['blog_top_content'] );
			
			$instance['layout'] = strip_tags( $new_instance['layout'] );
			
			$instance['show_posts_with_feat_img'] = strip_tags( $new_instance['show_posts_with_feat_img'] );
			
			return $instance;
		}
		
		
		public function widget( $args, $instance )
		{
			extract( $args );

			$title = apply_filters( 'widget_title', $instance['title'] );
			$blog_page_slug = apply_filters( 'widget_blog_page_slug', $instance['blog_page_slug'] );
			$blog_number_of_posts = apply_filters( 'widget_blog_number_of_posts', $instance['blog_number_of_posts'] );
			$blog_editor_content = apply_filters( 'widget_blog_editor_content', $instance['blog_editor_content'] );
			$blog_top_content = apply_filters( 'widget_blog_top_content', $instance['blog_top_content'] );
			$layout = apply_filters( 'widget_layout', $instance['layout'] );
			$show_posts_with_feat_img = apply_filters( 'widget_layout', $instance['show_posts_with_feat_img'] );

			if ($layout === 'one-column'):
                $thumbnail_class = 'blog-masonry-image-one-c';
            elseif ($layout === 'two-columns'):
                 $thumbnail_class = 'blog-masonry-image-two-c';
            elseif ($layout === 'three-columns'):
                 $thumbnail_class = 'blog-masonry-image-three-c';
            endif;
			
			echo wp_kses_post( $before_widget );
			
			if ( ! empty( $title ) )
			{

			}
			
				?>
					<section data-id="<?php echo esc_attr($blog_page_slug); ?>" data-title="<?php echo esc_attr($title); ?>" class="pt-page pt-page-<?php echo esc_attr($blog_page_slug); ?>">
	         			<div class="section-inner custom-page-content">
							<div class="page-header">
								<h2 class="section-title"><?php echo esc_html($title); ?></h2>
							</div>

							<div class="page-content">
								<?php
									if ( $blog_editor_content )
									{
										if ( $blog_top_content )
										{
											?>
												<!-- Blog Page Content -->
												<div class="blog-page-content">
													<?php
														$args_blog_page_content = 'pagename=' . $blog_page_slug;
														$loop_blog_page_content = new WP_Query( $args_blog_page_content );
														
														if ( $loop_blog_page_content->have_posts() ) :
															while ( $loop_blog_page_content->have_posts() ) : $loop_blog_page_content->the_post();
															
																the_content();
															
															endwhile;
														endif;
														wp_reset_postdata();
													?>
												</div>
												<!-- /Blog Page Content -->
											<?php
										}
									}
								?>
								
								
								<div class="blog-masonry <?php echo esc_attr($layout); ?> clearfix">
									<?php
										$args_post = array( 'post_type' => 'post', 'posts_per_page' => -1 );
										$loop_post = new WP_Query( $args_post );
										
										if ( $loop_post->have_posts() ) :
											
											$i = 1;
											
											while ( ( $loop_post->have_posts() ) && ( $i <= $blog_number_of_posts ) ) : $loop_post->the_post();
												
												if ( $show_posts_with_feat_img )
												{
													if ( has_post_thumbnail() )
													{
														$i++;
														
														?>
															<!-- Blog Post <?php the_ID(); ?> -->
											                <div class="item post-<?php the_ID(); ?>">
											                  <div class="blog-card">
											                    <div class="media-block">
											                      <a href="<?php the_permalink(); ?>">
											                      	<?php if ( is_sticky() ): ?>
											                      		<span class="sticky-badge">Featured</span>
											                      	<?php endif; ?>

											                        <?php
																		the_post_thumbnail( esc_attr($thumbnail_class), array( 'alt' => get_the_title(), 'title' => "" ) );
																	?>
											                        <div class="mask"></div>
											                        <div class="post-date" title="<?php echo esc_attr(get_the_date( 'Y' )); ?>"><span class="day"><?php echo esc_html(get_the_date( 'd' )); ?></span><span class="month"><?php echo esc_html(get_the_date( 'M' )); ?></span></div>
											                      </a>
											                    </div>
											                    <div class="post-info">
											                      <ul class="category">
											                        <?php
												                        $categories = get_the_category();
																		$separator = ' ';
																		$output = '';
																		if ( ! empty( $categories ) ) {
																		    foreach( $categories as $category ) {
																		        $output .= '<li><a href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . esc_attr( sprintf( esc_html__( 'View all posts in %s', 'aveo' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a></li>' . $separator;
																		    }
																		    echo trim( $output, $separator );
																		}
																	?>
											                      </ul>
											                      <a href="<?php the_permalink(); ?>"><h4 class="blog-item-title"><?php the_title(); ?></h4></a>
											                    </div>
											                  </div>
											                </div>
											                <!-- End of Blog Post <?php the_ID(); ?> -->
														<?php
													}
												}
												else
												{
													$i++;
													
													?>
														<!-- Blog Post <?php the_ID(); ?> -->
										                <div class="item post-<?php the_ID(); ?>">
										                  <div class="blog-card">
										                    <div class="media-block">
										                      <a href="<?php the_permalink(); ?>">
										                      	<?php if ( is_sticky() ): ?>
										                      		<span class="sticky-badge">Featured</span>
										                      	<?php endif; ?>
										                      	<?php
																	if ( has_post_thumbnail() )
																	{
																		?>
													                        <?php
																				the_post_thumbnail( esc_attr($thumbnail_class), array( 'alt' => get_the_title(), 'title' => "" ) );
																			?>
																			<?php
																	}
																	else
																	{ 
																	?>
																		<div class="post-without-f-image"></div>
																	<?php
																	}
																?>
										                        <div class="mask"></div>
										                        <div class="post-date" title="<?php echo esc_attr(get_the_date( 'Y' )); ?>"><span class="day"><?php echo esc_html(get_the_date( 'd' )); ?></span><span class="month"><?php echo esc_html(get_the_date( 'M' )); ?></span></div>
										                      </a>
										                    </div>
										                    <div class="post-info">
										                      <ul class="category">
										                      	<?php
											                        $categories = get_the_category();
																	$separator = ' ';
																	$output = '';
																	if ( ! empty( $categories ) ) {
																	    foreach( $categories as $category ) {
																	        $output .= '<li><a href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . esc_attr( sprintf( esc_html__( 'View all posts in %s', 'aveo' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a></li>' . $separator;
																	    }
																	    echo trim( $output, $separator );
																	}
																?>
										                      </ul>
										                      <a href="<?php the_permalink(); ?>"><h4 class="blog-item-title"><?php the_title(); ?></h4></a>
										                    </div>
										                  </div>
										                </div>
										                <!-- End of Blog Post <?php the_ID(); ?> -->
													<?php
												}
												
											endwhile;
										endif;
										wp_reset_postdata();
									?>
								</div>
								<!-- end .latest-posts -->
								
								
								<?php
									if ( $blog_editor_content )
									{
										if ( ! $blog_top_content )
										{
											?>
												<!-- Blog Page Content -->
												<div class="blog-page-content">
													<?php
														$args_blog_page_content = 'pagename=' . $blog_page_slug;
														$loop_blog_page_content = new WP_Query( $args_blog_page_content );
														
														if ( $loop_blog_page_content->have_posts() ) :
															while ( $loop_blog_page_content->have_posts() ) : $loop_blog_page_content->the_post();
															
																the_content();
															
															endwhile;
														endif;
														wp_reset_postdata();
													?>
												</div>
												<!-- /Blog Page Content -->
											<?php
										}
									}
								?>
								
								<?php
									if ( get_option( 'show_on_front' ) == 'posts' )
									{
										?>
											<div class="center">
												<a class="btn btn-secondary" href="<?php echo esc_url(home_url()); ?>"><?php echo esc_html_e( 'See All Posts', 'aveo' ); ?></a>
											</div>
										<?php
									}
									else
									{
										$blog_page_url = get_page_link( get_option( 'page_for_posts' ) );
										
										?>
											<div class="center">
												<a class="btn btn-secondary" href="<?php echo esc_url($blog_page_url); ?>"><?php echo esc_html_e( 'See All Posts', 'aveo' ); ?></a>
											</div>
										<?php
									}
								?>
							</div>

							<!-- end .content -->
						</div>
					</section>
					<!-- end #blog -->
				<?php
			
			echo wp_kses_post( $after_widget );
		}
	}

	function aveo_register_blog_page_widget() {
		register_widget( "aveo_blog_widget" );
	}

	add_action( 'widgets_init', 'aveo_register_blog_page_widget' );

/* ================================================================================================ */

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function aveo_pingback_header() {
    if ( is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
add_action( 'wp_head', 'aveo_pingback_header' );


if (!function_exists('_disable_fw_use_sessions')) { add_filter('fw_use_sessions','_disable_fw_use_sessions'); function _disable_fw_use_sessions(){ return false; } }

// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
// Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );


if ( ! function_exists( '_lmpixels_fw_filter_github_api_url' ) ) :
    function _lmpixels_fw_filter_github_api_url( $url ) {
        return 'https://api.github.com';
    }
endif;

add_filter( 'fw_github_api_url', '_lmpixels_fw_filter_github_api_url', 999 );