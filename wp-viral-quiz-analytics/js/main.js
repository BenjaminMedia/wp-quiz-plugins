var wpvq_hook_beforeResults;
(function($) 
{ 

	if(wpvq_js_debug) { console.log('(WPVQ) Analytics Script Loaded.') }

	if (typeof wpvq_hook_beforeResults == 'function') {
		var wpvq_hook_beforeResults_bis = wpvq_hook_beforeResults;
	}

	// JS Hook, on wpvq-front.js:200
	wpvq_hook_beforeResults = function (data)
	{
		if(wpvq_js_debug) { console.log('(WPVQ) Analytics Script Triggered.') }
		if (typeof wpvq_hook_beforeResults_bis == 'function') { wpvq_hook_beforeResults_bis(data); }

		if (wpvq_test_ga()) {
			ga('send', 'event', wpvq_analytics_vars.wpvq_labelGame, quizName, wpvq_analytics_vars.wpvq_labelFinished);
			// ga('set', 'dimension1', 'Player of ' + quizName);
		}

		if (wpvq_test_gaq()) {
			_gaq.push(['_trackEvent', wpvq_analytics_vars.wpvq_labelGame, quizName, wpvq_analytics_vars.wpvq_labelFinished]);
			// _gaq.push(['_setCustomVar', 1, 'Quiz Player', quizName, 1])
		}
	};

	if (wpvq_test_ga()) 
	{
		$('.wpvq-facebook-yesscript, .wpvq-facebook-noscript').click(function() {
			ga('send', 'event', wpvq_analytics_vars.wpvq_labelShare, quizName, wpvq_analytics_vars.wpvq_labelSharedOn + ' Facebook');
		});

		$('.wpvq-twitter-share-popup').click(function(){
			ga('send', 'event', wpvq_analytics_vars.wpvq_labelShare, quizName, wpvq_analytics_vars.wpvq_labelSharedOn + ' Twitter');
		});

		$('.wpvq-gplus-share-popup').click(function(){
			ga('send', 'event', wpvq_analytics_vars.wpvq_labelShare, quizName, wpvq_analytics_vars.wpvq_labelSharedOn + ' Google+');
		});

		$('.wpvq-vk-share-content').click(function(){
			ga('send', 'event', wpvq_analytics_vars.wpvq_labelShare, quizName, wpvq_analytics_vars.wpvq_labelSharedOn + ' VK.com');
		});

		// Started a new game!
		$('#wpvq-page-0 .wpvq-answer').click(function(){
			ga('send', 'event', wpvq_analytics_vars.wpvq_labelGame, quizName, wpvq_analytics_vars.wpvq_labelStarted);
		});
	}
	
	if (wpvq_test_gaq()) 
	{
		$('.wpvq-facebook-yesscript, .wpvq-facebook-noscript').click(function() {
			_gaq.push(['_trackEvent', wpvq_analytics_vars.wpvq_labelShare, quizName, wpvq_analytics_vars.wpvq_labelSharedOn + ' Facebook']);
		});

		$('.wpvq-twitter-share-popup').click(function(){
			_gaq.push(['_trackEvent', wpvq_analytics_vars.wpvq_labelShare, quizName, wpvq_analytics_vars.wpvq_labelSharedOn + ' Twitter']);
		});

		$('.wpvq-gplus-share-popup').click(function(){
			_gaq.push(['_trackEvent', wpvq_analytics_vars.wpvq_labelShare, quizName, wpvq_analytics_vars.wpvq_labelSharedOn + ' Google+']);
		});

		$('.wpvq-vk-share-content').click(function(){
			_gaq.push(['_trackEvent', wpvq_analytics_vars.wpvq_labelShare, quizName, wpvq_analytics_vars.wpvq_labelSharedOn + ' VK.com']);
		});

		// Started a new game!
		$('#wpvq-page-0 .wpvq-answer').click(function(){
			_gaq.push(['_trackEvent', wpvq_analytics_vars.wpvq_labelGame, quizName, wpvq_analytics_vars.wpvq_labelStarted]);
		});
	}

})(jQuery);

/**
 * Check if analytics.js is available and loaded (universal analytics)
 * @return {[type]} [description]
 */
function wpvq_test_ga() {
	return (typeof ga !== 'undefined');
}

/**
 * Check if ga.js is available and loaded (old analytics)
 * @return {[type]} [description]
 */
function wpvq_test_gaq() {
	return (typeof _gaq !== 'undefined');
}