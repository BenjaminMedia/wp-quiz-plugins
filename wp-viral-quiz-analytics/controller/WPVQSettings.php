<?php 


global $vqData;

// Admin & editor can see all quizzes
if (!current_user_can('manage_options')) {
	die(__('Not authorized to access this page.'));
}

// VIEW
include dirname(__FILE__) . '/../views/WPVQSettings.php';