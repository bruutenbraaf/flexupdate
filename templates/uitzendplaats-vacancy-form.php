<div class="container">
	<div class="row">
		<div class="offset-md-2 col-md-8">
		<h2><?php _e('Solliciteren bij:','flexupdate');?> <?php echo $view_data->data->title; ?></h2>
			<form class="vacansie_form" name="uzp__vacancy-form">
				<?php if (!isset($hide_title) || $hide_title !== true) { ?>
				<?php if (isset($view_data) && property_exists($view_data, 'data')) { ?>
				<input type="hidden" name="id" id="inputID"
					value="<?php echo $vacancy_id ?>" />
				<?php } else { ?>
				<h1><?php _e('Apply for a vacancy', 'uitzendplaats'); ?>
				</h1>
				<?php } ?>
				<?php } ?>

				<div class="uzp__form-success-message">
					<?php _e('Your application has been submitted. We will contact you as soon as possible.', 'uitzendplaats'); ?>
				</div>


				<label for="inputFirstName" class="uzp-col-sm-3 uzp__control-label"><?php _e('First name', 'uitzendplaats'); ?></label>

				<input type="text" class="uzp__form-control" id="inputFirstName" name="first_name">
				<p class="uzp__help-block" data-validate-for="first_name"></p>



				<label for="inputPrefix" class="uzp-col-sm-3 uzp__control-label"><?php _e('Middle name', 'uitzendplaats'); ?></label>

				<input type="text" class="uzp__form-control" id="inputPrefix" name="prefix">
				<p class="uzp__help-block" data-validate-for="prefix"></p>




				<label for="inputLastName" class="uzp-col-sm-3 uzp__control-label"><?php _e('Last name', 'uitzendplaats'); ?></label>

				<input type="text" class="uzp__form-control" id="inputLastName" name="last_name">
				<p class="uzp__help-block" data-validate-for="last_name"></p>




				<label for="inputEmail" class="uzp-col-sm-3 uzp__control-label"><?php _e('E-mail', 'uitzendplaats'); ?></label>

				<input type="text" class="uzp__form-control" id="inputEmail" name="email"
					placeholder="<?php _e('your@email.com', 'uitzendplaats'); ?>">
				<p class="uzp__help-block" data-validate-for="email"></p>




				<label for="inputPhone" class="uzp-col-sm-3 uzp__control-label"><?php _e('Phone number', 'uitzendplaats'); ?></label>

				<input type="text" class="uzp__form-control" id="inputPhone" name="phone" placeholder="06 - 1234 4321">
				<p class="uzp__help-block" data-validate-for="phone"></p>




				<label for="inputCv" class="uzp-col-sm-3 uzp__control-label"><?php _e('Resume', 'uitzendplaats'); ?></label>
				<div class="uploadfield">
					<input type="file" class="dropzone uzp__form-control " id="my-awesome-dropzone inputCv" name="cv">
					<p class="uzp__help-block" data-validate-for="cv"></p>
					<p class="uzp__help-block--hidden uzp__help-block--filesize"><?php _e('The maximum allowed filesize is 2MB', 'uitzendplaats'); ?>
					</p>
				</div>



				<label class="uzp-col-sm-3 uzp__control-label" for="inputMessage"><?php _e('Accompanying message', 'uitzendplaats'); ?></label>

				<textarea class="uzp__form-control" rows="5" id="inputMessage" name="message"></textarea>
				<p class="uzp__help-block" data-validate-for="message"></p>





				<div class="uzp__checkbox">
					<label>
						<input type="checkbox" name="accept_terms" value="true" id="acceptTerms" />
						<?php _e('De persoonlijke gegevens die u in dit formulier hebt ingevoerd, worden alleen gebruikt voor doeleinden die de wetgever toestaat. Wanneer u dit formulier verzendt, geeft u toestemming om de door u verstrekte gegevens te verwerken. Zie onze <a class="f-privacy" href=/privacybeleid/" target=_blank>privacyverklaring</a> voor meer informatie.', 'uitzendplaats'); ?>
					</label>
				</div>
				<p class="uzp__help-block" data-validate-for="accept_terms"></p>




				<button class="btn" type="submit"><?php _e('Solliciteren', 'uitzendplaats'); ?></button>

			</form>
		</div>
	</div>
</div>