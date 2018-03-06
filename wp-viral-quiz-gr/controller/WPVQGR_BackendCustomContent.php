<?php

class WPVQGR_BackendCustomContent
{
	/**
	 * Main page of the plugin
	 * @return [type] [description]
	 */
	public static function printWelcomePage()
	{
		?>
	
		<div class="wpvqgr-wrapper">
			<div class="wpvqgr-welcome">

				<div class="container-fluid">
					<div class="header clearfix">
						<h3 class="text-muted">WP Viral Quiz</h3>
					</div>

					<div class="jumbotron">
						<h1 class="display-4">The Great Reboot.</h1>
						<p class="lead">
							After 2 years, we have decided to start over from the begining, <strong>and build the same awesome plugin but with fresh code</strong>, and new technologies.
							If you used a previous version, your quizzes won't be compatible.
						</p>
						<p><a class="btn btn-lg btn-success" href="https://www.ohmyquiz.io/2017/09/30/great-reboot-released/" target="_blank" role="button">Read more about the Great Reboot</a></p>
					</div>

					<div class="row">
						<div class="col-md-8">
							<h4>Why "Great Reboot" ?</h4>
							<p>Because I delete (almost) all my previous code, and start over from the begining. Unfortunately, quizzes created with previous versions of WPVQ are not compatible with this one. 
								<a href="https://www.ohmyquiz.io/2017/09/30/great-reboot-released/" target="_blank">More details here</a>.</p>

							<h4>Where is the documentation, and the support ?</h4>
							<p><a href="https://www.ohmyquiz.io/support/" target="_blank">Right here</a> :-)</p>

							<h4>How to create quizzes ?</h4>
							<p>Easy peasy! Find the "WP Viral Quiz" menu in the left bar of your Wordpress backoffice, and choose between "Trivia" or "Perso" quiz.</p>
						</div>
					</div>
				</div> 
			</div>
		</div>
		<?php
	}

	/**
	 * Print an information before quiz listing
	 * @param  [type] $views [description]
	 * @return [type]        [description]
	 */
	public static function printBannerAds($views)
	{
		$screen = get_current_screen();
		if ($screen->base == 'edit' && isset($_GET['post_type']) && in_array($_GET['post_type'], array('wpvqgr_quiz_trivia', 'wpvqgr_quiz_perso'))):
			?>
			<div class="notice wpvqgr-backend-iframe" style="border:0; background:none; box-shadow: none; margin-bottom:0px; padding-left:0px">
		        <iframe src="https://plugins.institut-pandore.com/iframe.php" style="border:0; width:100%; max-width:800px; max-height:120px; overflow: hidden;" scrolling="no"></iframe>
		    </div>
			<?php
		endif;
	}
}