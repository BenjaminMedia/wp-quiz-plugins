<?php
	
class WPVQInitController_Analytics {

	function __construct() {

	}

	public static function init_page_admin() {

		global $wp_query, $vqData;
		
		// Quizzes list
		if (isset($_GET['element']) && $_GET['element'] == 'analytics')
		{
			$action = (isset($_GET['action'])) ? $_GET['action']:'';
			switch ($action) 
			{
				case 'show':
				default:
					include dirname(__FILE__) . '/WPVQSettings.php';
				break;
			}

		}
	}
}