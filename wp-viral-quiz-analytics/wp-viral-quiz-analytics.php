<?php

/*
	Plugin Name: WP Viral Quiz - Analytics
	Plugin URI: https://www.institut-pandore.com/wp-viral-quiz/
	Description: Track players on your site like a boss with Google Analytics ®.
	Author: Institut Pandore
	Version: 1.2
	Author URI: http://www.institut-pandore.com/wp-viral-quiz/
	Text Domain: wpvq-analytics
	Domain Path: wpvq-analytics
*/

require_once 'controller/WPVQInitController_Analytics.php';
require_once 'includes/plugin-updates/plugin-update-checker.php';

class WPViralQuizTrackAnalytics {

	/**
	 * Init the plugin
	 */
	function __construct() 
	{
		// Add JS
		add_action( 'init', array($this, 'load_custom_wpviral_script_track_analytics'));
		add_action( 'wp_footer', array($this, 'print_custom_wpviral_script_track_analytics'));

		// i18n support
    	add_action( 'plugins_loaded', array($this, 'wpvq_load_textdomain') );

    	// Update mechanism
		$updateChecker = PucFactory::buildUpdateChecker(
			'http://wpvq.institut-pandore.com/update-analytics.php',
			__FILE__,
			'wp-viral-quiz-analytics',
			24);
		$updateChecker->addQueryArgFilter(array($this, 'addSecretKeyForUpdate'));

		// Manage controller (hidden from nav menu)
		add_action( 'wpvq_custom_page', array($this, 'wpvq_load_pages') );
	}
	
	/**
	 * Enqueue script and CSS
	 * look at js/main.js
	 */
	function load_custom_wpviral_script_track_analytics() 
	{	
		wp_register_script( 'wpvq_global_script_track_analytics', plugin_dir_url(__FILE__) . 'js/main.js', array(), '1.0.0', true );
	}

	function print_custom_wpviral_script_track_analytics() 
	{
		if (WPVQShortcode::$isShortcodeLoaded) 
		{
			$data = array(
			    'wpvq_labelGame' 			=> __("WP Viral Quiz - Game", 'wpvq-analytics'),
			    'wpvq_labelShare' 			=> __("WP Viral Quiz - Share", 'wpvq-analytics'),
			    'wpvq_labelFinished' 		=> __("Finished games", 'wpvq-analytics'),
			    'wpvq_labelStarted' 		=> __("Started games", 'wpvq-analytics'),
			    'wpvq_labelSharedOn' 		=> __("Shared on", 'wpvq-analytics'),
			);
			wp_localize_script( 'wpvq_global_script_track_analytics', 'wpvq_analytics_vars', $data );
			wp_enqueue_script( 'wpvq_global_script_track_analytics' );
		}
	}

	/**
	 * Create hidden page (doc, settings, etc...)
	 * @return [type] [description]
	 */
	function wpvq_load_pages()
	{
		// Main page
		WPVQInitController_Analytics::init_page_admin();
	}

	/**
	 * Load plugin textdomain.
	 */
	function wpvq_load_textdomain() 
	{
		$domain = 'wpvq-analytics';
    	$locale = apply_filters('plugin_locale', get_locale(), $domain);

    	load_textdomain($domain, WP_LANG_DIR.'/wp-viral-quiz/'.$domain.'-'.$locale.'.mo');
    	load_plugin_textdomain( $domain, false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
	}

	/**
	 * Param for update
	 */
	function addSecretKeyForUpdate($query) 
	{
		$options 	=  get_option( 'wpvq_settings' );
		$code 		=  (isset($options['wpvq_text_field_envato_code'])) ? $options['wpvq_text_field_envato_code']:'';
		
		$query['secret'] 	= $code;
		$query['url'] 		= get_site_url();

		return $query;
	}



}

$wpViralQuizTrackAnalytics = new WPViralQuizTrackAnalytics();
