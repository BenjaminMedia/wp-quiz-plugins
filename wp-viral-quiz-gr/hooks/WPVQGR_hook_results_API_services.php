<?php 

class WPVQGR_hook_results_API_services
{
	function __construct()
	{
		add_action('wpvqgr_end_quiz', array($this, 'syncUser'), 1000, 2);
	}

	public function syncUser($Quiz, $User)
	{
		if ($Quiz->getSetting('syncuser') == 'nosync') {
			return;
		}
		
		// Mail
		$email 	=  $User->detectEmails(true);

		// Service configuration
		$serviceName  =  $Quiz->getSetting('syncuser');
		if ($serviceName == 'mailchimp') 
		{
			$apiKey = $Quiz->getSetting('syncuser_mailchimp_apikey');
			$listId = $Quiz->getSetting('syncuser_mailchimp_listid');

			$api = new Pandore_API_Mailchimp($apiKey);
			$api->configure('doubleoptin', $Quiz->getSetting('syncuser_mailchimp_doubleoptin'));

			$mergeFields = array();
			$quizFields = $Quiz->getSetting('askinfo_fields');

			foreach($User->getMetas() as $key => $value)
			{
				$mergeName = $quizFields[$key]['wpvqgr_settings_askinfo_syncuser_mapfields'];
				if ($value['wpvqgr_user_meta_value'] == $email) {
					continue;
				}
				else if ($mergeName != '') 
				{
					// Specific mergeName for RESULT
					if ($value['wpvqgr_user_meta_key'] == 'Final Result' && $Quiz->getSetting('syncuser_thirdparty_saveresult')) {
						$mergeName = 'RESULT';
					}

					$mergeFields[$mergeName] = $value['wpvqgr_user_meta_value'];
				}
			}

			$api->configure('mergefields', $mergeFields);
		} 
		else if ($serviceName == 'activecampaign') 
		{
			$apiKey 		= $Quiz->getSetting('syncuser_activecampaign_apikey');
			$urlEndpoint 	= $Quiz->getSetting('syncuser_activecampaign_urlendpoint');
			$listId 		= $Quiz->getSetting('syncuser_activecampaign_listid');

			$api = new Pandore_API_Activecampaign($apiKey, $urlEndpoint);

			$mergeFields = array();
			$quizFields = $Quiz->getSetting('askinfo_fields');

			foreach($User->getMetas() as $key => $value)
			{
				$mergeName = $quizFields[$key]['wpvqgr_settings_askinfo_syncuser_mapfields'];

				if ($value['wpvqgr_user_meta_value'] == $email) {
					continue;
				}
				else if ($mergeName != '') 
				{
					// Specific name for RESULT field
					if ($value['wpvqgr_user_meta_key'] == 'Final Result' && $Quiz->getSetting('syncuser_thirdparty_saveresult')) {
						$mergeName = 'RESULT';
					}
					// Specific field on ActiveCampaign
					if (in_array($mergeName, array('FIRSTNAME', 'LASTNAME', 'PHONE'))) {
						$api->configure($mergeName, $value['wpvqgr_user_meta_value']);
					} 
					// User's fields
					else {
						$mergeFields["field[%{$mergeName}%,0]"] = $value['wpvqgr_user_meta_value'];
					}
				}
			}

			$api->configure('mergefields', $mergeFields);
			$api->configure('tags', $Quiz->getSetting('syncuser_activecampaign_tags'));
		} 
		else if ($serviceName == 'aweber') 
		{
			$apiKey = $Quiz->getSetting('syncuser_aweber_apikey');
			$listId = $Quiz->getSetting('syncuser_aweber_listid');
			
			$api = new Pandore_API_Aweber($apiKey);

			$mergeFields = array();
			$quizFields = $Quiz->getSetting('askinfo_fields');
			foreach($User->getMetas() as $key => $value)
			{
				$mergeName = $quizFields[$key]['wpvqgr_settings_askinfo_syncuser_mapfields'];
				if ($value['wpvqgr_user_meta_value'] == $email) {
					continue;
				}
				else if ($mergeName != '') 
				{
					// Specific name for RESULT field
					if ($value['wpvqgr_user_meta_key'] == 'Final Result' && $Quiz->getSetting('syncuser_thirdparty_saveresult')) {
						$mergeName = 'RESULT';
					}
					
					$mergeFields[$mergeName] = $value['wpvqgr_user_meta_value'];
				}
			}
			$api->configure('custom_fields', $mergeFields);
		}

		$status = $api->syncUser($email, $listId);
		die(json_encode($status));
	}
}

