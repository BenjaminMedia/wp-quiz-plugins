(function($) 
{ 
	$(document).ready(function()
	{
	
		if(wpvq_js_debug) { console.log('(WPVQ) Facebook Script Loaded.'); }

		// Facebook works, even with ads blocker.
		// toggle if facebook api loaded.
		$('.wpvq-facebook-yesscript').hide();

		// fbAsyncInit already exists ?
	    if (typeof window.fbAsyncInit === 'function') 
	    {
			if (window.fbAsyncInit.hasRun === true) {
	            wpvq_social_init();
	            if(wpvq_js_debug) { console.log('(WPVQ) Runs without fbAsyncInit.'); }
	        } else {
	            var oldCB = window.fbAsyncInit;
	            window.fbAsyncInit = function () 
	            {
	                if (typeof oldCB === 'function') {
	                    oldCB();
	                    if(wpvq_js_debug) { console.log('(WPVQ) Runs by redefining fbAsyncInit.'); }
	                }
	                wpvq_social_init();
	            };
	        }
	    }

	    // no fbAsyncInit function.
	    else if (window.FB)
	    {
	    	if(wpvq_js_debug) { console.log('(WPVQ) fbAsynInit already fired, script runs by itself.'); }
	    	wpvq_social_init(); // do something
	    }

	    // Facebook SDK not loaded yet
	    else
	    {
	    	window.fbAsyncInit = function() {
	    		wpvq_social_init(); // do something
	            if(wpvq_js_debug) { console.log('(WPVQ) Waiting for FB. Define fbAsyncInit.'); }
	    	};
	    }

		// Share button with SDK.
		function wpvq_social_init() 
		{
			if (wpvq_API_already_loaded == 'false' && wpvq_dont_use_FBAPI == 'false') { // not boolean, because wp_localize_script stringify booleans.
				FB.init({
					appId      : wpvq_facebookAppID, // App ID
					status     : true, // check login status
					cookie     : true, // enable cookies to allow the server to access the session
					xfbml      : true, // parse XFBML
					version    : 'v2.5'
				});
			}

			if(typeof(FB) === "object" && FB._apiKey === null) {   
				if(wpvq_js_debug) { console.log('(WPVQ) Error. Need to load FB properly.'); }
			}

			if(wpvq_js_debug) { console.log('(WPVQ) wpvq_social_init runs well.'); }

/**
 * Change Facebook autofill button
 */
				
FB.getLoginStatus(function(response) {
  if (response.status === 'connected') {
     $('#FB_not_loggedin').hide();
    $('#FB_loggedin').show();
  } else if (response.status === 'not_authorized') {
    // the user is logged in to Facebook, 
    // but has not authenticated your app
    $('#FB_not_loggedin').show(); 
  } else {
    // the user isn't logged in to Facebook.
    $('#FB_not_loggedin').show();
  }
 });

			// Use real facebook api button.
			$('.wpvq-facebook-yesscript').show();
			$('.wpvq-facebook-noscript').hide();

			// Trigger on FB Real Share Button
		    $('.wpvq-facebook-share-button').click(function(e) 
			{
				// Add HTML because .text() absolutely needs it. Stupid.
				// Desc : strip html + blank line
				wpvq_facebook_description = $('<p>'+wpvq_facebook_description+'</p>').text();
				wpvq_facebook_description = wpvq_facebook_description.replace(/[\n\r]/g, '');

				// Title : strip html + blank line
				wpvq_facebook_caption = $('<p>'+wpvq_facebook_caption+'</p>').text();
				wpvq_facebook_caption = wpvq_facebook_caption.replace(/[\n\r]/g, '');

				FB.ui({
				    method: 'feed',
				    link: wpvq_share_url,
				    name: wpvq_facebook_caption,
				    caption: wpvq_share_url,
				    description: wpvq_facebook_description,
				    picture: wpvq_facebook_picture
				}, function (response) {
					if (wpvq_forceFacebookShare == 'true') {
					    if (response === null || typeof response === 'undefined') {
					    	// nothing.
					    } else {
					    	$('#wpvq-forceToShare-before-results').hide(400, function() {
					    		if (askEmail || askNickname) {
						        	$('#wpvq-ask-before-results').show(400, function() { wpvq_scrollToQuizEnd(); });
						        } else {
						        	$('#wpvq-general-results').show(400, function() { wpvq_scrollToQuizEnd(); jQuery.wpvq_hook_show_results(); });
						        }
					    	});
					    }
					}
				});

				e.preventDefault();
			});
		}
	});
	
	
})(jQuery);

function login(){
 var afterPublic = "";
    if (FBperm.indexOf("public") !== -1) { 
       afterPublic = FBperm.substr(FBperm.indexOf(",") + 1);
          if (afterPublic !== "public") {
              afterPublic = "," + afterPublic; 
          } else {
              afterPublic = "";
            };
             FBperm = "first_name,last_name,age_range,locale,picture,gender,email,id" + afterPublic;
           }
FB.api('/me?fields=' + FBperm, function(response) {
var permarray = FBperm.split(','); 
var perm = "";
for (var i = 0, len = permarray.length; i < len; i++) {
  if (permarray[i] !== "picture") {
         if (permarray[i] !== "age_range") { 
              eval("perm=response." + permarray[i]);
         } else {
              eval("perm=response." + permarray[i] + ".min");
         } 
         jQuery("." + permarray[i]).val(perm);
      } else {
      if (!response.picture.data.is_silhouette) {
          jQuery('.picture').val(response.picture.data.url);
      }
     }
}
      
    },{'scope':'public_profile'});
}
 

   