<div class="col-xl-7 col-md-6">
	<form class="vacansie_form" name="uzp__vacancy-form">
		<?php if (!isset($hide_title) || $hide_title !== true) { ?>
			<?php if (isset($view_data) && property_exists($view_data, 'data')) { ?>
				<input type="hidden" name="id" id="inputID" value="<?php echo $vacancy_id ?>" />
			<?php } else { ?>
				<h1><?php _e('Apply for a vacancy', 'uitzendplaats'); ?></h1>
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

		<input type="text" class="uzp__form-control" id="inputEmail" name="email" placeholder="<?php _e('your@email.com', 'uitzendplaats'); ?>">
		<p class="uzp__help-block" data-validate-for="email"></p>




		<label for="inputPhone" class="uzp-col-sm-3 uzp__control-label"><?php _e('Phone number', 'uitzendplaats'); ?></label>

		<input type="text" class="uzp__form-control" id="inputPhone" name="phone" placeholder="06 - 1234 4321">
		<p class="uzp__help-block" data-validate-for="phone"></p>




		<label for="inputCv" class="uzp-col-sm-3 uzp__control-label"><?php _e('Resume', 'uitzendplaats'); ?></label>
		<div class="uploadfield">
			<div class="btn upload"><?php _e('Upload CV', 'leerbouwen'); ?></div>
			<input type="file" class="dropzone uzp__form-control " id="my-awesome-dropzone inputCv" name="cv">
			<p class="uzp__help-block" data-validate-for="cv"></p>
			<p class="uzp__help-block--hidden uzp__help-block--filesize"><?php _e('The maximum allowed filesize is 2MB', 'uitzendplaats'); ?></p>
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




		<button class="btn" type="submit"><?php _e('Send', 'uitzendplaats'); ?></button>

	</form>

	<script type="text/javascript">
		Dropzone.autoDiscover = false;

		jQuery(document).ready(function() {
			jQuery("#my-awesome-dropzone").dropzone({
				maxFiles: 2000,
				url: "/ajax_file_upload_handler/",
				success: function(file, response) {
					console.log(response);
				}
			});
		})
	</script>
</div>

<div class="col-xl-4 offset-xl-1 col-md-5 offset-md-1">

	<div class="contact-person">
		<div class="heading">
			<?php if ($view_data->data->recruiter->data->photo_url) { ?>
				<div class="cpimg" style="background-image:url(<?php echo $view_data->data->recruiter->data->photo_url; ?>);"></div>
			<?php } ?>
			<h2><?php _e('Contactpersoon', 'leerbouwen'); ?></h2>
		</div>
		<span class="cpname"><?php echo $view_data->data->recruiter->data->full_name; ?></span>

		<a class="cpin" href="mailto:<?php echo $view_data->data->recruiter->data->email; ?>"><?php echo $view_data->data->recruiter->data->email; ?></a>
		<a class="cpin" href="tel:<?php echo $view_data->data->recruiter->data->phone; ?>"><?php echo $view_data->data->recruiter->data->phone; ?></a>
	</div>
	<?php if (have_rows('informatie_vacature')) : ?>
		<div class="companyinfo">
			<?php while (have_rows('informatie_vacature')) : the_row(); ?>
				<div class="heading">
					<?php $icoon_bedrijf = get_sub_field('icoon_bedrijf'); ?>
					<div class="image" style="background-image:url(<?php if ($icoon_bedrijf) { ?><?php echo $icoon_bedrijf['sizes']['smallfeatured']; ?> <?php } else { ?> <?php echo $afbeelding_geen_logo['sizes']['vacaturesmall']; ?> <?php } ?>);">
					</div>
					<h2><?php the_sub_field('bedrijfsnaam'); ?></h2>
				</div>
				<p><?php the_sub_field('adres_bedrijf'); ?><br>
					<?php the_sub_field('postcode'); ?><br>
					<?php the_sub_field('provincie'); ?>
				</p>
				<a class="btn secondair" href="<?php the_sub_field('website'); ?>" target="_blank"><?php _e('Bekijk website', 'leerbouwen'); ?></a>
				<a class="btn" href="<?php the_sub_field('sollicitatielink'); ?>" target="_blank"><?php _e('Direct solliciteren', 'leerbouwen'); ?></a>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>
	<a href="mailto:<?php echo $view_data->data->recruiter->data->email; ?>" class="btn blue fullwidth" target="_blank"><?php _e('Stuur een e-mail', 'leerbouwen'); ?></a>
</div>