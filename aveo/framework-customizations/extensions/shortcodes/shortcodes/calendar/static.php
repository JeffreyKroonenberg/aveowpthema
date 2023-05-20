<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$shortcodes_extension = fw_ext( 'shortcodes' );

wp_enqueue_style(
	'fw-shortcode-calendar-bootstrap3',
	$shortcodes_extension->get_declared_URI( '/shortcodes/calendar/static/libs/bootstrap3/css/bootstrap-grid.css' )
);
wp_enqueue_style(
	'fw-shortcode-calendar-calendar',
	fw_get_template_customizations_directory_uri(
        '/extensions/shortcodes/shortcodes/calendar/static/css/calendar.css'
    )
);

wp_enqueue_style(
	'fw-shortcode-calendar',
	fw_get_template_customizations_directory_uri(
        '/extensions/shortcodes/shortcodes/calendar/static/css/styles.css'
    )
);


wp_enqueue_script(
	'fw-shortcode-calendar-bootstrap3',
	$shortcodes_extension->get_declared_URI( '/shortcodes/calendar/static/libs/bootstrap3/js/bootstrap.min.js' ),
	array( 'jquery', 'underscore' ),
	fw()->manifest->get_version(),
	true
);
wp_enqueue_script(
	'fw-shortcode-calendar-timezone',
	$shortcodes_extension->get_declared_URI( '/shortcodes/calendar/static/libs/jstimezonedetect/jstz.min.js' ),
	array( 'jquery', 'underscore' ),
	fw()->manifest->get_version(),
	true
);
wp_enqueue_script(
	'fw-shortcode-calendar-calendar',
	$shortcodes_extension->get_declared_URI( '/shortcodes/calendar/static/js/calendar.js' ),
	array( 'jquery', 'underscore', 'fw-shortcode-calendar-bootstrap3', 'fw-shortcode-calendar-timezone' ),
	fw()->manifest->get_version(),
	true
);
wp_enqueue_script(
	'fw-shortcode-calendar',
	$shortcodes_extension->get_declared_URI( '/shortcodes/calendar/static/js/scripts.js' ),
	array( 'jquery', 'underscore', 'fw-shortcode-calendar-calendar' ),
	fw()->manifest->get_version(),
	true
);

$locale = get_locale();
wp_localize_script(
	'fw-shortcode-calendar',
	'fwShortcodeCalendarLocalize',
	array(
		'event'  => __( 'Event', 'aveo' ),
		'events' => __( 'Events', 'aveo' ),
		'today'  => __( 'Today', 'aveo' ),
		'locale' => $locale
	)
);
wp_localize_script(
	'fw-shortcode-calendar',
	'calendar_languages',
	array(
		$locale => array(
			'error_noview'     => sprintf( __( 'Calendar: View %s not found', 'aveo' ), '{0}' ),
			'error_dateformat' => sprintf( __( 'Calendar: Wrong date format %s. Should be either "now" or "yyyy-mm-dd"',
					'aveo' ), '{0}' ),
			'error_loadurl'    => __( 'Calendar: Event URL is not set', 'aveo' ),
			'error_where'      => sprintf( __( 'Calendar: Wrong navigation direction %s. Can be only "next" or "prev" or "today"',
					'aveo' ), '{0}' ),
			'error_timedevide' => __( 'Calendar: Time split parameter should divide 60 without decimals. Something like 10, 15, 30',
				'aveo' ),
			'no_events_in_day' => __( 'No events in this day.', 'aveo' ),
			'title_year'       => '{0}',
			'title_month'      => '{0} {1}',
			'title_week'       => sprintf( __( 'week %s of %s', 'aveo' ), '{0}', '{1}' ),
			'title_day'        => '{0} {1} {2}, {3}',
			'week'             => __( 'Week ', 'aveo' ) . '{0}',
			'all_day'          => __( 'All day', 'aveo' ),
			'time'             => __( 'Time', 'aveo' ),
			'events'           => __( 'Events', 'aveo' ),
			'before_time'      => __( 'Ends before timeline', 'aveo' ),
			'after_time'       => __( 'Starts after timeline', 'aveo' ),
			'm0'               => __( 'January', 'aveo' ),
			'm1'               => __( 'February', 'aveo' ),
			'm2'               => __( 'March', 'aveo' ),
			'm3'               => __( 'April', 'aveo' ),
			'm4'               => __( 'May', 'aveo' ),
			'm5'               => __( 'June', 'aveo' ),
			'm6'               => __( 'July', 'aveo' ),
			'm7'               => __( 'August', 'aveo' ),
			'm8'               => __( 'September', 'aveo' ),
			'm9'               => __( 'October', 'aveo' ),
			'm10'              => __( 'November', 'aveo' ),
			'm11'              => __( 'December', 'aveo' ),
			'ms0'              => __( 'Jan', 'aveo' ),
			'ms1'              => __( 'Feb', 'aveo' ),
			'ms2'              => __( 'Mar', 'aveo' ),
			'ms3'              => __( 'Apr', 'aveo' ),
			'ms4'              => __( 'May', 'aveo' ),
			'ms5'              => __( 'Jun', 'aveo' ),
			'ms6'              => __( 'Jul', 'aveo' ),
			'ms7'              => __( 'Aug', 'aveo' ),
			'ms8'              => __( 'Sep', 'aveo' ),
			'ms9'              => __( 'Oct', 'aveo' ),
			'ms10'             => __( 'Nov', 'aveo' ),
			'ms11'             => __( 'Dec', 'aveo' ),
			'd0'               => __( 'Sunday', 'aveo' ),
			'd1'               => __( 'Monday', 'aveo' ),
			'd2'               => __( 'Tuesday', 'aveo' ),
			'd3'               => __( 'Wednesday', 'aveo' ),
			'd4'               => __( 'Thursday', 'aveo' ),
			'd5'               => __( 'Friday', 'aveo' ),
			'd6'               => __( 'Saturday', 'aveo' ),
		)
	)
);
