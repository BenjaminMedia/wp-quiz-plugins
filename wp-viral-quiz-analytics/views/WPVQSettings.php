<div class="wrap">
	<h2>
		WP Viral Quiz - 
		<strong><?php _e("Google Analytics", 'wpvq-analytics'); ?></strong>
		<p style="margin:5px 0;">
			<?php $url = esc_url(remove_query_arg(array('element'), add_query_arg(array('page' => 'wp-viral-quiz-addons')))); ?>
			<a href="<?php echo $url; ?>"><?php _e("<< Back to the Awesome Addons list", 'wpvq-analytics'); ?></a>
		</p>
	</h2>

	<hr />

	<div class="vq-medium">
		<div class="vq-bloc">
			<div class="vq-content">
				<h3><?php _e("Step 1 : install Google Analytics on your site", 'wpvq-analytics'); ?></h3>
				<p>
					<?php _e("<b>You have to use Google Analytics on your blog</b> in order that the plugin works.", 'wpvq-analytics'); ?>
					<?php _e("If you need help to add your Google Analytic tracking code, <a href=\"http://premium.wpmudev.org/blog/add-google-analytics-wordpress/\" target=\"_blank\">read this nice tutorial</a>.", 'wpvq-analytics'); ?>
				</p>
				<p>
					<?php _e("<b>If you have already installed the Google Analytics code</b>, you have nothing else to do !", 'wpvq-analytics'); ?> :-)
				</p>

				<h3><?php _e("Step 2 : wait 4 or 5 hours", 'wpvq-analytics'); ?></h3>
				<p>
					<?php _e("Once the plugin is installed and enabled, you have to wait 4 or 5 hours before the data related to your quizzes come to your Google Analytic account.", 'wpvq-analytics'); ?>
				</p>
				<h3><?php _e("Step 3 : check out the \"Events\" menu on Google Analytics", 'wpvq-analytics'); ?></h3>
				<p style="text-align: center;padding:10px 0;">
					<a href="<?php echo plugins_url( 'img/events-tab.png', __FILE__ ); ?>" target="_blank">
						<img src="<?php echo plugins_url( 'img/events-tab-small.png', __FILE__ ); ?>" alt="Events tab on Google Analytic" />
						<br/><i><?php _e("Click to zoom", 'wpvq-analytics'); ?></i>
					</a>
				</p>
				<p>
					<?php _e("You will find 2 custom events :", 'wpvq-analytics'); ?>
				</p>
				<ol>
					<li>WP Viral Quiz - Game</li>
					<li>WP Viral Quiz - Share</li>
				</ol>
				<p>
					<?php _e("The first one tracks peope who play your quizzes. The second one tracks people who share your quizzes.", 'wpvq-analytics'); ?>
					<?php _e("Take the tour ! Click on <b>\"WP Viral Quiz - Game\"</b> then click on <strong>\"Event Action\"</strong>", 'wpvq-analytics'); ?>
				</p>
				<p style="text-align: center;padding:10px 0;">
					<a href="<?php echo plugins_url( 'img/label-action.png', __FILE__ ); ?>" target="_blank">
						<img src="<?php echo plugins_url( 'img/label-action-small.png', __FILE__ ); ?>" alt="Events Action" />
						<br/><i><?php _e("Click to zoom", 'wpvq-analytics'); ?></i>
					</a>
				</p>
				<p>
					<?php _e("Look, you can seen how many people play each of your quizzes. But the best is coming. Click on a quiz name, then choose a \"Secondary dimension\".", 'wpvq-analytics'); ?>
				</p>
				<p style="text-align: center;padding:10px 0;">
					<a href="<?php echo plugins_url( 'img/secondary-dimension.png', __FILE__ ); ?>" target="_blank">
						<img src="<?php echo plugins_url( 'img/secondary-dimension-small.png', __FILE__ ); ?>" alt="Events Action" />
						<br/><i><?php _e("Click to zoom", 'wpvq-analytics'); ?></i>
					</a>
				</p>
				<p>
					<?php _e("You'll get a ton of informations about your players (for instance \"Source/Medium\", which is very intersting).", 'wpvq-analytics'); ?> 
					<?php _e("If you want to track shares, select the event <strong>\"WP Viral Quiz - Share\"</strong>.", 'wpvq-analytics'); ?>
				</p>
			</div>
		</div>
	</div>
</div>