<?php 

class WPVQGR_Shortcode {

	public static $isShortcodeLoaded = false;
	public static $quiz = NULL;

	/** 
	 * Shortcode display Quiz in front 
	 *
	 * @var 
	 * (int) id : quiz's id
	 *
	 * (int) columns : number of columns
	 *  
	*/
	public static function print_shortcode($param) 
	{
		// Our Global Variable for the view
		global $wpvqgr_quiz;
		global $wpvqgr_quiz_columns;
		global $wpvqgr_resources_dir_url;
		global $wpvqgr_skin_dir_url;
		global $wpvqgr_resultsOnly;

		// Is result-only-mode?
		if (isset($param['resultsonly']) && isset($_GET['wpvqgr_id']) && is_numeric($_GET['wpvqgr_id'])) {
			$wpvqgr_resultsOnly = true;
		}

		// [Classic Shortocde] Bad ID | [ResultShortocde] Bad configuration
		if (!(is_numeric($param['id']) || $wpvqgr_resultsOnly)) {
			return;
		}

		// Show wpvqgr_quiz only when on page
		if (!is_page() && !is_single()) {
			return;
		}

		// Load wpvqgr_quizz
		$id = intval( $wpvqgr_resultsOnly ? $_GET['wpvqgr_id'] : $param['id'] );
		try {
			$wpvqgr_quiz = new WPVQGR_Quiz();
			$wpvqgr_quiz->load($id);
			self::$quiz = $wpvqgr_quiz;
		} catch (Exception $e) {
			echo "ERROR : Quiz #{$id} doesn't exist.";
			die();
		}

		// Useful to load JS script
		self::$isShortcodeLoaded = true;

		// Columns
		$wpvqgr_quiz_columns = NULL;
		if(isset($param['columns']) && is_numeric($param['columns'])) {
			$wpvqgr_quiz_columns = $param['columns'];
		}

		// Resources URL
		$wpvqgr_resources_dir_url	=  WPVQGR_PLUGIN_URL . 'resources/';
		$wpvqgr_skin_dir_url 		=  $wpvqgr_resources_dir_url . 'css/skins/' . $wpvqgr_quiz->getSetting('skin') . '/' ;

		// View
		$shortCode = ob_start();
		include dirname(__FILE__) . '/../views/WPVQGR_Shortcode.php';
		$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}

	/**
	 * Quiz main scripts
	 */
	public static function register_scripts() 
	{
		// Libs
		wp_register_script( 'wpvqgr-fo-ga-analytics', WPVQGR_PLUGIN_URL . 'resources/js/fo/ga-analytics.js', array('jquery'), '1.0', true );
		wp_register_script( 'wpvqgr-fo-social-media', WPVQGR_PLUGIN_URL . 'resources/js/fo/social-media.js', array('jquery'), '1.0', true );
		wp_register_script( 'wpvqgr-store2', WPVQGR_PLUGIN_URL . 'resources/components/store2/dist/store2.min.js', array('jquery'), '1.0', true );
		wp_register_script( 'wpvqgr-lodash', WPVQGR_PLUGIN_URL . 'resources/components/lodash/dist/lodash.min.js', array('jquery'), '1.0', true );
		
		// Quiz types
		wp_register_script( 'wpvqgr_quiz_trivia-script', WPVQGR_PLUGIN_URL . 'resources/js/fo/quiz-trivia.js', array('jquery'), '1.0', true );
		wp_register_script( 'wpvqgr_quiz_perso-script', WPVQGR_PLUGIN_URL . 'resources/js/fo/quiz-perso.js', array('jquery'), '1.0', true );
		
		// The same global.js file, waiting for each quiz type
		wp_register_script( 'wpvqgr_quiz_trivia-script-global', WPVQGR_PLUGIN_URL . 'resources/js/fo/global.js', array('jquery', 'wpvqgr-store2', 'wpvqgr_quiz_trivia-script', 'wpvqgr-fo-social-media'), '1.0', true );
		wp_register_script( 'wpvqgr_quiz_perso-script-global', WPVQGR_PLUGIN_URL . 'resources/js/fo/global.js', array('jquery', 'wpvqgr-store2', 'wpvqgr_quiz_perso-script', 'wpvqgr-fo-social-media'), '1.0', true );
	}

	/**
	 * Print script into the footer (if needed)
	 * @return [type] [description]
	 */
	public static function print_scripts()
	{
		if (self::$isShortcodeLoaded) 
		{	
			global $wpvqgr_resultsOnly;
			$type = self::$quiz->getType();

			// JS Storage API
			wp_enqueue_script( 'wpvqgr-store2');
			wp_enqueue_script( 'wpvqgr-lodash');

			// Social Media
			wp_enqueue_script( 'wpvqgr-fo-social-media' );

			// Global JS var
			wp_localize_script( $type . '-script-global', 'wpvqgr_log', isset($_GET['wpvqgr_debug']) ? 'on':'off' );
			wp_localize_script( $type . '-script-global', 'wpvqgr_ajaxurl', admin_url( 'admin-ajax.php' ) );
			wp_localize_script( $type . '-script-global', 'wpvqgr_quiz', self::$quiz->getAllParameters() );
			wp_localize_script( $type . '-script-global', 'wpvqgr_nounce', wp_create_nonce( 'wpvqgr_nounce' ) );
			@wp_localize_script( $type . '-script-global', 'wpvqgr_page', Self::getPage() ); // int, then @ to disable notice
			wp_localize_script( $type . '-script-global', 'wpvqgr_quiz_url', get_permalink() );
			wp_localize_script( $type . '-script-global', 'wpvqgr_next_page_url', Self::getNextPageURL() );
			wp_localize_script( $type . '-script-global', 'wpvqgr_results_only', $wpvqgr_resultsOnly ? 'true' : 'false' );
			wp_localize_script( $type . '-script-global', 'wpvqgr_results_url', Self::getResultsPageURL() );

			// Enqueue main scripts
			wp_enqueue_script( $type . '-script-global' );
			wp_enqueue_script( $type . '-script' );

			// GAnalytics Tracking
			if (self::$quiz->getSetting('global_ganalytics')) {
				wp_enqueue_script( 'wpvqgr-fo-ga-analytics' );
			}
		}
	}

	/**
	 * Get the page number using Wordpress /content/page-X mechanism
	 * @return [type] [description]
	 */
	public static function getPage()
	{
		$nextPage = (int) get_query_var('page', 1);

		if ($nextPage == 0) {
			return 1;
		} else {
			return $nextPage;
		}
	}

	/**
	 * Return the next page URl (for refresh feature)
	 * @return [type] [description]
	 */
	private static function getNextPageURL()
	{
		$autoScrollAnchor = (self::$quiz->getSetting('autoscroll')) ? '#wpvqgrquestion' : '';
		return add_query_arg( array('page' => (Self::getPage() + 1)) ) . $autoScrollAnchor;
	}

	/**
	 * Return the URL of the result page (with right parameters)
	 * @return [type] [description]
	 */
	private static function getResultsPageURL()
	{
		if (self::$quiz->getSetting('redirect')) {
			$url = add_query_arg( array('wpvqgr_id' => self::$quiz->getId()), self::$quiz->getSetting('redirecturl') );	
		} else {
			$url = '';
		}		

		return $url;
	}

}