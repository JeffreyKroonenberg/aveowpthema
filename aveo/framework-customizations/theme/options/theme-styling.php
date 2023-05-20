<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'theme_customization' => array(
		'title'   => esc_html__( 'Theme Design', 'aveo' ),
		'type'    => 'tab',
		'options' => array(
			'theme_style_options' => array(
				'title'   => esc_html__( 'Theme Design', 'aveo' ),
				'type'    => 'box',
				'options' => array(
					'content_max_width' => array(
						'label' => esc_html__( 'Content Area Max Width', 'aveo' ),
			            'type' => 'short-text',
			            'value' => '1032',
			            'desc'  => esc_html__( 'Maximum width of the area with content. In pixels.', 'aveo' ),
					),
					'main_color' => array(
						'label' => esc_html__( 'Main Theme Color', 'aveo' ),
						'type'  => 'color-picker',
						'value' => '#2eca7f',
						'palettes' => array( '#2eca7f', '#7e6df6', '#F44336', '#2196F3', '#FF5722', '#29B6F6', '#E91E63', '#AA00FF', '#FF9800', '#FBC02D', '#9dd100', '#26d9ac' ),
						'desc'  => esc_html__( 'Select main color.', 'aveo' ),
					),
					'main_bg_color' => array(
						'label' => esc_html__( 'Body Background Color', 'aveo' ),
						'type'  => 'color-picker',
						'value' => '#f5f5f5',
						'desc'  => esc_html__( 'Select body background color.', 'aveo' ),
					),
					'sidebar_bg_color' => array(
						'label' => esc_html__( 'Blog Sidebar Background Color', 'aveo' ),
						'type'  => 'color-picker',
						'value' => '#fbfbfb',
						'desc'  => esc_html__( 'Select blog pages sidebar background color.', 'aveo' ),
					),
					'start_page_title_color' => array(
						'label' => esc_html__( 'Start Page Title Color', 'aveo' ),
						'type'  => 'color-picker',
						'value' => '#ffffff',
						'desc'  => esc_html__( 'Select start page title color.', 'aveo' ),
					),
					'start_page_subtitle_color' => array(
						'label' => esc_html__( 'Start Page Subtitle Color', 'aveo' ),
						'type'  => 'color-picker',
						'value' => '#ffffff',
						'desc'  => esc_html__( 'Select start page subtitle color.', 'aveo' ),
					),
					'links_color' => array(
						'label' => esc_html__( 'Links Color', 'aveo' ),
						'type'  => 'color-picker',
						'value' => '#2eca7f',
						'palettes' => array( '#2eca7f', '#7e6df6', '#F44336', '#2196F3', '#FF5722', '#29B6F6', '#E91E63', '#AA00FF', '#FF9800', '#FBC02D', '#9dd100', '#26d9ac' ),
						'desc'  => esc_html__( 'Select links color.', 'aveo' ),
					),
					'links_hover_color' => array(
						'label' => esc_html__( 'Links Hover Color', 'aveo' ),
						'type'  => 'color-picker',
						'value' => '#FF9800',
						'palettes' => array( '#2eca7f', '#7e6df6', '#F44336', '#2196F3', '#FF5722', '#29B6F6', '#E91E63', '#AA00FF', '#FF9800', '#FBC02D', '#9dd100', '#26d9ac' ),
						'desc'  => esc_html__( 'Select links hover color.', 'aveo' ),
					),
					'main_header_bg_color' => array(
						'label' => esc_html__( 'Main Header Sticked Background Color', 'aveo' ),
						'type'  => 'color-picker',
						'value' => '#ffffff',
						'palettes' => array( '#ffffff', '#2eca7f', '#7e6df6', '#F44336', '#2196F3', '#FF5722', '#29B6F6', '#E91E63', '#AA00FF', '#FF9800', '#FBC02D', '#9dd100', '#26d9ac' ),
						'desc'  => esc_html__( 'Select the main header background color.', 'aveo' ),
					),
					'main_header_text_logo_color' => array(
						'label' => esc_html__( 'Main Header Text Logo Color', 'aveo' ),
						'type'  => 'color-picker',
						'value' => '#49515d',
						'palettes' => array( '#49515d', '#ffffff', '#111111', '#333333', '#666666', '#888888' ),
						'desc'  => esc_html__( 'Select the main header background color.', 'aveo' ),
					),
					'main_header_sticked_text_logo_color' => array(
						'label' => esc_html__( 'Main Header Sticked Text Logo Color', 'aveo' ),
						'type'  => 'color-picker',
						'value' => '#49515d',
						'palettes' => array( '#49515d', '#ffffff', '#111111', '#333333', '#666666', '#888888' ),
						'desc'  => esc_html__( 'Select the main header background color.', 'aveo' ),
					),
					'main_menu_links_color' => array(
						'label' => esc_html__( 'Main Menu Links Color', 'aveo' ),
						'type'  => 'color-picker',
						'value' => '#49515d',
						'palettes' => array( '#49515d', '#ffffff', '#111111', '#333333', '#666666', '#888888' ),
						'desc'  => esc_html__( 'Select the main menu links color.', 'aveo' ),
					),
					'main_menu_links_color_sticked' => array(
						'label' => esc_html__( 'Main Menu Links Color on the Sticked Header', 'aveo' ),
						'type'  => 'color-picker',
						'value' => '#49515d',
						'palettes' => array( '#49515d', '#ffffff', '#111111', '#333333', '#666666', '#888888' ),
						'desc'  => esc_html__( 'Select the main menu links color on the sticked header.', 'aveo' ),
					),
					'blog_sidebar'                    => array(
						'label'        => esc_html__( 'Show Blog Sidebar', 'aveo' ),
						'type'         => 'switch',
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'aveo' )
						),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'aveo' )
						),
						'value'        => 'yes',
						'desc'         => false,
						'help'         => false,
					),
					'header_search'                    => array(
						'label'        => esc_html__( 'Display the Search Field in the Header', 'aveo' ),
						'type'         => 'switch',
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'aveo' )
						),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'aveo' )
						),
						'value'        => 'yes',
						'desc'         => false,
						'help'         => false,
					),
					'subpages_animations' => array(
						'type'         => 'multi-picker',
						'label'        => false,
						'desc'         => false,
						'picker'       => array(
							'subpages_animations_switcher' => array(
								'label'        => esc_html__( 'Random Animation of Subpages', 'aveo' ),
								'type'         => 'switch',
								'right-choice' => array(
									'value' => 'on',
									'label' => esc_html__( 'On', 'aveo' )
								),
								'left-choice'  => array(
									'value' => 'off',
									'label' => esc_html__( 'Off', 'aveo' )
								),
								'value'        => 'on',
							)
						),
						'choices'      => array(
							'off' => array(
								'animation_number'	=> array(
								    'type'  => 'select',
								    'value' => '1',
								    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
								    'label' => __('Animation Type', 'aveo'),
								    'desc'  => __('Choose the type of animation.', 'aveo'),
								    'choices' => array(
								        '1' => __('1. out: move to Left | in: move from Right', 'aveo'),
								        '2' => __('2. out: move to Right | in: move from Left', 'aveo'),
								        '3' => __('3. out: move to Top | in: move from Bottom', 'aveo'),
								        '4' => __('4. out: move to Bottom | in: move from Top', 'aveo'),
								        '5' => __('5. out: fade | in: move from Right on top', 'aveo'),
								        '6' => __('6. out: fade | in: move from Left on top', 'aveo'),
								        '7' => __('7. out: fade | in: move from Bottom on top', 'aveo'),
								        '8' => __('8. out: fade | in: move from Top on top', 'aveo'),
								        '9' => __('9. out: move to Left Fade | in: move from Right Fade', 'aveo'),
								        '10' => __('10. out: move to Right Fade | in: move from Left Fade', 'aveo'),
								        '11' => __('11. out: move to Top Fade | in: move from Bottom Fade', 'aveo'),
								        '12' => __('12. out: move to Bottom Fade | in: move from Top Fade', 'aveo'),
								        '13' => __('13. out: move to Left Easing on top | in: move from Right', 'aveo'),
								        '14' => __('14. out: move to Right Easing on top | in: move from Left', 'aveo'),
								        '15' => __('15. out: move to Top Easing on top | in: move from Bottom', 'aveo'),
								        '16' => __('16. out: move to Bottom Easing on top | in: move from Top', 'aveo'),
								        '17' => __('17. out: scale Down | in: move from Right on top', 'aveo'),
								        '18' => __('18. out: scale Down | in: move from Left on top', 'aveo'),
								        '19' => __('19. out: scale Down | in: move from Bottom on top', 'aveo'),
								        '20' => __('20. out: scale Down | in: move from Top on top', 'aveo'),
								        '21' => __('21. out: scale Down | in: scale Up Down delay300', 'aveo'),
								        '22' => __('22. out: scale Down Up | in: scale Up delay300', 'aveo'),
								        '23' => __('23. out: move to Left on top | in: scale Up', 'aveo'),
								        '24' => __('24. out: move to Right on top | in: scale Up', 'aveo'),
								        '25' => __('25. out: move to Top on top | in: scale Up', 'aveo'),
								        '26' => __('26. out: move to Bottom on top | in: scale Up', 'aveo'),
								        '27' => __('27. out: scale Down Center | in: scale Up Center delay400', 'aveo'),
								        '28' => __('28. out: rotate Right Side First | in: move from Right delay200 on top', 'aveo'),
								        '29' => __('29. out: rotate Left Side First | in: move from Left delay200 on top', 'aveo'),
								        '30' => __('30. out: rotate Top Side First | in: move from Top delay200 on top', 'aveo'),
								        '31' => __('31. out: rotate Bottom Side First | in: move from Bottom delay200 on top', 'aveo'),
								        '32' => __('32. out: flip Out Right | in: flip In Left delay500', 'aveo'),
								        '33' => __('33. out: flip Out Left | in: flip In Right delay500', 'aveo'),
								        '34' => __('34. out: flip Out Top | in: flip In Bottom delay500', 'aveo'),
								        '35' => __('35. out: flip Out Bottom | in: flip In Top delay500', 'aveo'),
								        '36' => __('36. out: rotate Fall on top | in: scale Up', 'aveo'),
								        '37' => __('37. out: rotate Out Newspaper | in: rotate In Newspaper delay500', 'aveo'),
								        '38' => __('38. out: rotate Push Left | in: move from Right', 'aveo'),
								        '39' => __('39. out: rotate Push Right | in: move from Left', 'aveo'),
								        '40' => __('40. out: rotate Push Top | in: move from Bottom', 'aveo'),
								        '41' => __('41. out: rotate Push Bottom | in: ', 'aveo'),
								        '42' => __('42. out: rotate Push Left | in: rotate Pull Right delay180', 'aveo'),
								        '43' => __('43. out: rotate Push Right | in: rotate Pull Left delay180', 'aveo'),
								        '44' => __('44. out: rotate Push Top | in: rotate Pull Bottom delay180', 'aveo'),
								        '45' => __('45. out: rotate Push Bottom | in: rotate Pull Top delay180', 'aveo'),
								        '46' => __('46. out: rotate Fold Left | in: move from Right Fade', 'aveo'),
								        '47' => __('47. out: rotate Fold Right | in: move from Left Fade', 'aveo'),
								        '48' => __('48. out: rotate Fold Top | in: move from Bottom Fade', 'aveo'),
								        '49' => __('49. out: rotate Fold Bottom | in: move from Top Fade', 'aveo'),
								        '50' => __('50. out: move to Right Fade | in: rotate Unfold Left', 'aveo'),
								        '51' => __('51. out: move to Left Fade | in: rotate Unfold Right', 'aveo'),
								        '52' => __('52. out: move to Bottom Fade | in: rotate Unfold Top', 'aveo'),
								        '53' => __('53. out: move to Top Fade | in: rotate Unfold Bottom', 'aveo'),
								        '54' => __('54. out: rotate Room Left Out on top | in: rotate Room Left In', 'aveo'),
								        '55' => __('55. out: rotate Room Right Out on top | in: rotate Room Right In', 'aveo'),
								        '56' => __('56. out: rotate Room Top Out on top | in: rotate Room Top In', 'aveo'),
								        '57' => __('57. out: rotate Room Bottom Out on top | in: rotate Room Bottom In', 'aveo'),
								        '58' => __('58. out: rotate Cube Left Out on top | in: rotate Cube Left In', 'aveo'),
								        '59' => __('59. out: rotate Cube Right Out on top | in: rotate Cube Right In', 'aveo'),
								        '60' => __('60. out: rotate Cube Top Out on top | in: rotate Cube Top In', 'aveo'),
								        '61' => __('61. out: rotate Cube Bottom Out on top | in: rotate Cube Bottom In', 'aveo'),
								        '62' => __('62. out: rotate Carousel Left Out on top | in: rotate Carousel Left In', 'aveo'),
								        '63' => __('63. out: rotate Carousel Right Out on top | in: rotate Carousel Right In', 'aveo'),
								        '64' => __('64. out: rotate Carousel Top Out on top | in:  rotate Carousel Top In', 'aveo'),
								        '65' => __('65. out: rotate Carousel Bottom Out on top | in: rotate Carousel Bottom In', 'aveo'),
								        '66' => __('66. out: rotate Sides Out | in: rotate Sides In delay200', 'aveo'),
								        '67' => __('67. out: rotate Slide Out | in: rotate Slide In', 'aveo'),
								    ),
								    'no-validate' => false,
								)
							),
						),
						'show_borders' => false,
					),
					'arrows_nav'                    => array(
						'label'        => esc_html__( 'Display Arrow Navigation for Subpage Animations', 'aveo' ),
						'type'         => 'switch',
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'aveo' )
						),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'aveo' )
						),
						'value'        => 'yes',
						'desc'         => false,
						'help'         => false,
					),
				)
			),
			'page_titles' => array(
				'title'   => esc_html__( 'Page Titles', 'aveo' ),
				'type'    => 'box',
				'attr'    => array('class' => 'initialized'),
				'options' => array(
					'cp_title_general_bg_color' => array(
						'label' => __( 'Background Color', 'aveo' ),
						'type'  => 'rgba-color-picker',
						'value' => 'rgba(46, 202, 127, 1)',
						'palettes' => array( '#2eca7f', '#7e6df6', '#F44336', '#2196F3', '#FF5722', '#29B6F6', '#E91E63', '#AA00FF', '#FF9800', '#FBC02D', '#9dd100', '#26d9ac' ),
						'desc'  => __( 'Select the background color of the title.',
							'aveo' ),
					),
					'cp_title_general_bg_img'        => array(
						'label' => __( 'Background Image', 'aveo' ),
						'desc'  => __( 'Select a background image.', 'aveo' ),
						'type'  => 'upload',
					),
					'cp_title_general_title_font' => array(
					    'type' => 'typography-v2',
					    'value' => array(
					        'family' => 'Montserrat',
					        // For standard fonts, instead of subset and variation you should set 'style' and 'weight'.
					        'style' => 'normal',
					        'weight' => 600,
					        'subset' => 'latin-ext',
					        'variation' => '600',
					        'size' => 44,
					        'line-height' => 44,
					        'letter-spacing' => 0,
					        'color' => '#ffffff'
					    ),
					    'components' => array(
					        'family'         => true,
					        // 'style', 'weight', 'subset', 'variation' will appear and disappear along with 'family'
					        'size'           => true,
					        'line-height'    => false,
					        'letter-spacing' => true
					    ),
					    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
					    'label' => esc_html__('Title Font', 'aveo'),
					    'desc'  => false,
					    'help'  => false,
					),
					'cp_title_general_align' => array(
						'label'   => __( 'Title Alignment', 'aveo' ),
						'type'    => 'radio',
						'value'   => 'center',
						'choices' => array(
							'left' => __( 'Left', 'aveo' ),
							'center' => __( 'Center', 'aveo' ),
							'right' => __( 'Right', 'aveo' ),
						),
					),
				)
			),
			'page_content_area' => array(
				'title'   => esc_html__( 'Background Color of the Area with the Content of the Page', 'aveo' ),
				'type'    => 'box',
				'attr'    => array('class' => 'initialized'),
				'options' => array(
					'cp_content_bg_color' => array(
						'label' => __( 'Background Color', 'aveo' ),
						'type'  => 'rgba-color-picker',
						'value' => 'rgba(255, 255, 255, 1)',
						'desc'  => __( 'Select the background color.',
							'aveo' ),
					),
					'cp_content_shadow'                    => array(
						'label'        => esc_html__( 'Shadow', 'aveo' ),
						'type'         => 'switch',
						'right-choice' => array(
							'value' => 'on',
							'label' => esc_html__( 'On', 'aveo' )
						),
						'left-choice'  => array(
							'value' => 'off',
							'label' => esc_html__( 'Off', 'aveo' )
						),
						'value'        => 'on',
						'desc'         => false,
						'help'         => false,
					),
					'cp_content_border_radius'                    => array(
						'label'        => esc_html__( 'Border Radius', 'aveo' ),
						'type' => 'short-text',
			            'value' => '15',
			            'desc'  => esc_html__( 'Border radius of the area with content. In pixels.', 'aveo' ),
					),
				)
			),
			'portfolio_colors' => array(
				'title'   => esc_html__( 'The Background Color of the Portfolio Items', 'aveo' ),
				'type'    => 'box',
				'attr'    => array('class' => 'initialized'),
				'options' => array(
					'portfolio_odd_elements' => array(
						'label' => __( 'Odd elements on hover', 'aveo' ),
						'type'  => 'rgba-color-picker',
						'value' => 'rgba(46, 202, 127, 1)',
						'palettes' => array( '#2eca7f', '#7e6df6', '#F44336', '#2196F3', '#FF5722', '#29B6F6', '#E91E63', '#AA00FF', '#FF9800', '#FBC02D', '#9dd100', '#26d9ac' ),
						'desc'  => __( 'Select the background color.',
							'aveo' ),
					),
					'portfolio_even_elements' => array(
						'label' => __( 'Even elements on hover', 'aveo' ),
						'type'  => 'rgba-color-picker',
						'value' => 'rgba(158, 81, 243, 1)',
						'palettes' => array( '#2eca7f', '#7e6df6', '#F44336', '#2196F3', '#FF5722', '#29B6F6', '#E91E63', '#AA00FF', '#FF9800', '#FBC02D', '#9dd100', '#26d9ac' ),
						'desc'  => __( 'Select the background color.',
							'aveo' ),
					)
				)
			)
		)
	)
);