<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Table', 'aveo' ),
	'description' => esc_html__( 'Add a Table', 'aveo' ),
	'tab'         => esc_html__( 'AVEO Elements', 'aveo' ),
	'popup_size'  => 'large'
);