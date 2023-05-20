<?php if (!defined('FW')) die('Forbidden');

wp_enqueue_style(
    'fw-shortcode-tabs-customizations',
    fw_get_template_customizations_directory_uri(
        '/extensions/shortcodes/shortcodes/tabs/static/css/styles.css'
    )
);
wp_enqueue_script(
	'fw-shortcode-tabs-customizations',
    fw_get_template_customizations_directory_uri(
        '/extensions/shortcodes/shortcodes/tabs/static/js/scripts.js'
    ),
	array('jquery-ui-tabs'),
	false,
	true
);
