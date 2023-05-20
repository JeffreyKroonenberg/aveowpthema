<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$map_shortcode = fw_ext('shortcodes')->get_shortcode('map');
$options = array(
	'data_provider' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'picker' => array(
			'population_method' => array(
				'label'   => esc_html__('Population Method', 'aveo'),
				'desc'    => esc_html__( 'Select map population method (Ex: events, custom)', 'aveo' ),
				'type'    => 'select',
				'choices' => $map_shortcode->_get_picker_dropdown_choices(),
			)
		),
		'choices' => $map_shortcode->_get_picker_choices(),
		'show_borders' => false,
	),
	'gmap-key' => array_merge(
		array(
			'label' => esc_html__( 'Google Maps API Key', 'aveo' ),
			'desc' => sprintf(
				esc_html__( 'Create an application in %sGoogle Console%s and add the Key here.', 'aveo' ),
				'<a href="https://console.developers.google.com/flows/enableapi?apiid=places_backend,maps_backend,geocoding_backend,directions_backend,distance_matrix_backend,elevation_backend&keyType=CLIENT_SIDE&reusekey=true">',
				'</a>'
			),
		),
		version_compare(fw()->manifest->get_version(), '2.5.7', '>=')
		? array(
			'type' => 'gmap-key',
		)
		: array(
			'type' => 'text',
			'fw-storage' => array(
				'type'      => 'wp-option',
				'wp_option' => 'fw-option-types:gmap-key',
			),
		)
	),
	'map_type' => array(
		'type'  => 'select',
		'label' => esc_html__('Map Type', 'aveo'),
		'desc'  => esc_html__('Select map type', 'aveo'),
		'choices' => array(
			'roadmap'   => esc_html__('Roadmap', 'aveo'),
			'terrain' => esc_html__('Terrain', 'aveo'),
			'satellite' => esc_html__('Satellite', 'aveo'),
			'hybrid'    => esc_html__('Hybrid', 'aveo')
		)
	),
	'map_height' => array(
		'label' => esc_html__('Map Height', 'aveo'),
		'desc'  => esc_html__('Set map height (Ex: 300)', 'aveo'),
		'type'  => 'text'
	),
	'disable_scrolling' => array(
		'type'  => 'switch',
		'value' => false,
		'label' => esc_html__('Disable zoom on scroll', 'aveo'),
		'desc'  => esc_html__('Prevent the map from zooming when scrolling until clicking on the map', 'aveo'),
		'left-choice' => array(
			'value' => false,
			'label' => esc_html__('Yes', 'aveo'),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__('No', 'aveo'),
		),
	),
	'map_zoom' => array(
	    'label' => __( 'Map Zoom', 'aveo' ),
	    'desc'  => __( 'Set map zoom level', 'aveo' ),
	    'type'  => 'slider',
	    'properties' => array(
	        'min' => 1,
	        'max' => 32,
	    ),
	    'value' => 16,
	),
);