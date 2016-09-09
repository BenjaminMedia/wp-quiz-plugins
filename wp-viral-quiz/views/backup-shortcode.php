<!-- <form id="wpvq-form-informations" action="" method="post">
			   
			<p class="wpvq-who-are-you">
				<?php echo apply_filters('wpvq_who_are_you_label', __("Just tell us who you are to view your results !", 'wpvq')); ?>
			    <div id="FB_not_loggedin" style="width:100%; text-align: center; display:none;"><div class="fb-login-button" scope="email" data-max-rows="1" data-size="large" data-show-faces="false" data-auto-logout-link="false" onlogin="login();">Udfyld med facebook</div></div>
	            <div id="FB_loggedin" style="width:100%; text-align: center; display:none;"><a class="FBbutton_fill" href="#!" onclick="login();"></a></div>
			</p>

			<?php do_action('wpvq_add_fields_before', $quiz->getId()); ?>

			<?php if ($quiz->askNickname()): ?>
				<div class="wpvq-input-block" id="wpvq-askNickname">
					<label><?php echo apply_filters('wpvq_nickname_label', __("Your first name :", 'wpvq')); ?></label>
					<input id="wpvq_askNickname" type="text" name="wpvq_askNickname" value="<?php echo apply_filters('wpvq_default_value_nickname', '', 'wpvq'); ?>" />
				</div>
			<?php endif; ?>

			<?php do_action('wpvq_add_fields_between', $quiz->getId()); ?>

			<?php if ($quiz->askEmail()): ?>
				<div class="wpvq-input-block" id="wpvq-askEmail">
					<label><?php echo apply_filters('wpvq_email_label', __("Your e-mail address :", 'wpvq')); ?></label>
					<input id="wpvq_askEmail" type="text" name="wpvq_askEmail" value="<?php echo apply_filters('wpvq_default_value_email', '', 'wpvq'); ?>" />
				</div>
			<?php endif; ?>

			<?php do_action('wpvq_add_fields', $quiz->getId()); ?>

			<input type="hidden" id="wpvq_ask_result" name="wpvq_ask_result" value="<?php echo $quiz->getId(); ?>" />
			<input type="hidden" name="wpvq_quizId" value="<?php echo $quiz->getId(); ?>" />

			<p class="wpvq-submit-button-ask">
				<button type="submit" id="wpvq-submit-informations"><?php echo apply_filters('wpvq_show_my_results_label', __("Show my results >>", 'wpvq')); ?></button>
				<?php if ($quiz->isAskInformationsOptional()): ?>
					<br />
					<span class="wpvq-ignore-askInfo">
						<?php echo apply_filters('wpvq_optional_label', __("Ignore & see my results >>",'wpvq')); ?>
					</span>
				<?php endif ?>
			</p>
		</form> --> 