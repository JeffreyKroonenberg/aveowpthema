<?php if (!defined('FW')) die('Forbidden');

$img = $atts['img_upload']['url'];
$open_img = $atts['open_img'];
$video = $open_img['popup']['image_popup']['fw-single-image-icon']['upload_video'];
$class = esc_attr($atts['class']);
?>
<?php if (!empty($img)): ?>

    <?php if ($open_img['icon-box-img'] == 'nothing'): ?>

        <div id="#single_image_<?php echo esc_attr($atts['id']); ?>" class="single-image <?php echo esc_attr($class); ?>">
            <span class="single-image-wrap" >
                <img src="<?php echo esc_url($img); ?>" alt="<?php esc_attr_e('image', 'aveo'); ?>">
            </span>
        </div>

    <?php elseif ($open_img['icon-box-img'] == 'popup'): ?>
        <div id="#single_image_<?php echo esc_attr($atts['id']); ?>"  class="single-image <?php echo esc_attr($class); ?>">
            <?php if ($open_img['popup']['image_popup']['icon-box-img'] == 'fw-single-image-icon'): ?>
                <a href="<?php echo esc_url($video); ?>" class="lightbox mfp-iframe">
                    <img src="<?php echo esc_url($img); ?>" alt="<?php esc_attr_e('image', 'aveo'); ?>">
                </a>
            <?php elseif ($open_img['popup']['image_popup']['icon-box-img'] == 'img'): ?>
                <a href="<?php echo esc_url($img); ?>" class="lightbox">
                    <img src="<?php echo esc_url($img); ?>" alt="<?php esc_attr_e('image', 'aveo'); ?>">
                </a>
            <?php endif; ?>
        </div>

    <?php else: ?>
        <?php $open_link = ($open_img['link']['open'] == 'yes') ? "target='_blank'" : ''; ?>

        <div id="#single_image_<?php echo esc_attr($atts['id']); ?>" class="single-image <?php echo esc_attr($class); ?>" <?php esc_html($open_link) ?>>
            <a class="single-image-wrap" href="<?php echo esc_url($open_img['link']['custom_link']); ?>">
                <img src="<?php echo esc_url($img); ?>" alt="<?php esc_attr_e('image', 'aveo'); ?>">
            </a>
        </div>

    <?php endif; ?>

<?php endif; ?>