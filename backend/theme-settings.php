<?php

add_action( 'admin_menu', 'hic_al_theme_page' );
add_action( 'admin_init', 'hic_al_theme_settings' );

function hic_al_theme_page() {
	add_options_page(
		'HIC-AL Theme Settings',
		'HIC-AL Theme Settings',
		'manage_options',
		'hic_al_options_page',
		'hic_al_options_page'
	);
}

function hic_al_theme_settings() {
	//add settings filed with callback test_logo_display.

	add_option( 'hic_al-logo', 'logo...');

	add_settings_field("hic_al-logo-header", "Logo Cabecera", "hic_al-logo-header", "hic_al_options_page");
	add_settings_field("hic_al-logo-cover", "Logo Portada", "hic_al-logo-cover", "hic_al_options_page");
	add_settings_field("hic_al-logo-cover-mobile", "Logo Portada Móvil", "hic_al-logo-cover-mobile", "hic_al_options_page");



   add_settings_field('hic_al-organization_title', 'Organization Title', 'hic_al-organization_title', "hic_al_options_page" );
   add_settings_field('hic_al-organization_title_1', 'Organization Title 1', 'hic_al-organization_title_1', "hic_al_options_page" );
   add_settings_field('hic_al-organization_title_2', 'Organization Title 2', 'hic_al-organization_title_2', "hic_al_options_page" );
   add_settings_field('hic_al-organization_subtitle', 'Organization Subtitle', 'hic_al-organization_subtitle', "hic_al_options_page" );
   add_settings_field('hic_al-organization_statement', 'Organization Stament', 'textarea', 'hic_al-organization_statement', "hic_al_options_page" );


	add_settings_field("hic_al-cover-image-0", "", "hic_al-cover-image-0", "hic_al_options_page");
	add_settings_field("hic_al-cover-image-1", "", "hic_al-cover-image-1", "hic_al_options_page");
	add_settings_field("hic_al-cover-image-2", "", "hic_al-cover-image-2", "hic_al_options_page");
	add_settings_field("hic_al-cover-image-3", "", "hic_al-cover-image-3", "hic_al_options_page");
	add_settings_field("hic_al-cover-image-4", "", "hic_al-cover-image-4", "hic_al_options_page");

	add_settings_field("hic_al-footer-text", "Texto Pie Página", "hic_al-footer-text", "hic_al_options_page");
	add_settings_field("hic_al-legal_info", "Aviso Legal", "hic_al-legal_info", "hic_al_options_page");


	add_settings_field("hic_al-url-facebook", "", "hic_al-url-facebook", "hic_al_options_page");
	add_settings_field("hic_al-url-twitter", "", "hic_al-url-twitter", "hic_al_options_page");
	add_settings_field("hic_al-url-youtube", "", "hic_al-url-youtube", "hic_al_options_page");
	add_settings_field("hic_al-url-soundcloud", "", "hic_al-url-soundcloud", "hic_al_options_page");
	add_settings_field("hic_al-url-flickr", "", "hic_al-url-flickr", "hic_al_options_page");

	add_settings_field("hic_al-color-0", "", "hic_al-color-0", "hic_al_options_page");
	add_settings_field("hic_al-color-1", "", "hic_al-color-1", "hic_al_options_page");
	add_settings_field("hic_al-color-2", "", "hic_al-color-2", "hic_al_options_page");
	add_settings_field("hic_al-color-3", "", "hic_al-color-3", "hic_al_options_page");





	register_setting( 'hic_al_options_page-grp', 'hic_al-logo-header');
	register_setting( 'hic_al_options_page-grp', 'hic_al-logo-cover');
	register_setting( 'hic_al_options_page-grp', 'hic_al-logo-cover-mobile');


   register_setting( 'hic_al_options_page-grp', 'hic_al-organization_title' );
   register_setting( 'hic_al_options_page-grp', 'hic_al-organization_title_1' );
   register_setting( 'hic_al_options_page-grp', 'hic_al-organization_title_2' );
   register_setting( 'hic_al_options_page-grp', 'hic_al-organization_subtitle' );
   register_setting( 'hic_al_options_page-grp', 'hic_al-organization_statement' );


	register_setting( 'hic_al_options_page-grp', 'hic_al-cover-image-0');
	register_setting( 'hic_al_options_page-grp', 'hic_al-cover-image-1');
	register_setting( 'hic_al_options_page-grp', 'hic_al-cover-image-2');
	register_setting( 'hic_al_options_page-grp', 'hic_al-cover-image-3');
	register_setting( 'hic_al_options_page-grp', 'hic_al-cover-image-4');

	register_setting( 'hic_al_options_page-grp', 'hic_al-footer-text');
	register_setting( 'hic_al_options_page-grp', 'hic_al-legal_info');

	register_setting( 'hic_al_options_page-grp', 'hic_al-url-facebook');
	register_setting( 'hic_al_options_page-grp', 'hic_al-url-twitter');

	register_setting( 'hic_al_options_page-grp', 'hic_al-url-youtube');
	register_setting( 'hic_al_options_page-grp', 'hic_al-url-flickr');

	register_setting( 'hic_al_options_page-grp', 'hic_al-color-0');
	register_setting( 'hic_al_options_page-grp', 'hic_al-color-1');
	register_setting( 'hic_al_options_page-grp', 'hic_al-color-2');
	register_setting( 'hic_al_options_page-grp', 'hic_al-color-3');

}







function hic_al_options_page() {

	?>
	<div class="wrap">

		<h1>
			HIC-AL Theme Settings
		</h1>

		<!-- <form method="POST" enctype="multipart/form-data" action="options.php"> -->
		<form method="post" enctype="multipart/form-data" action="options.php">

			<h3>Logo Cabecera</h3>

			<?php hic_al_image_uploader( 'hic_al-logo-header', $width = 115, $height = 115 ); ?>

			<h3>Logo Portada</h3>

			<?php hic_al_image_uploader( 'hic_al-logo-cover', $width = 115, $height = 115 ); ?>

			<h3>Logo Portada Móvil</h3>

			<?php hic_al_image_uploader( 'hic_al-logo-cover-mobile', $width = 115, $height = 115 ); ?>


			<h3>Imágenes de Portada</h3>

			<?php

			hic_al_image_uploader( 'hic_al-cover-image-0', $width = 115, $height = 115 );
			hic_al_image_uploader( 'hic_al-cover-image-1', $width = 115, $height = 115 );
			hic_al_image_uploader( 'hic_al-cover-image-2', $width = 115, $height = 115 );
			hic_al_image_uploader( 'hic_al-cover-image-3', $width = 115, $height = 115 );
			hic_al_image_uploader( 'hic_al-cover-image-4', $width = 115, $height = 115 );

			?>

			<h3>Información de la Organización</h3>

			<h6>Título de la Organización</h6>
			<input type="text" name="hic_al-organization_title" value="<?php echo get_option('hic_al-organization_title'); ?>"/>

			<h6>Título 1 de la Organización</h6>
			<input type="text" name="hic_al-organization_title_1" value="<?php echo get_option('hic_al-organization_title_1'); ?>"/>

			<h6>Título 2 de la Organización</h6>
			<input type="text" name="hic_al-organization_title_2" value="<?php echo get_option('hic_al-organization_title_2'); ?>"/>

			<h6>Subtítulo de la Organización</h6>
			<input type="text" name="hic_al-organization_subtitle" value="<?php echo get_option('hic_al-organization_subtitle'); ?>"/>

			<h6>Texto de la Organización</h6>
			<textarea name="hic_al-organization_statement"><?php echo get_option('hic_al-organization_statement'); ?></textarea>





			<h3>Pie de Página</h3>

				<h5>
					Texto
				</h5>

				<input type="text" name="hic_al-footer-text" value="<?php echo get_option('hic_al-footer-text'); ?>"/>

				<h5>
					Aviso Legal
				</h5>
			<?php

			wp_dropdown_pages(array(
				'selected'              => get_option('hic_al-legal_info'),
				'name'                  => 'hic_al-legal_info',
				'id'                    => 'hic_al-legal_info',
			));


			?>

			<h3>Redes</h3>

			<div class="row">
				<label for="hic_al-url-facebook">Facebook</label>
				<input type="url" name="hic_al-url-facebook" id="hic_al-url-facebook" value="<?php echo get_option("hic_al-url-facebook"); ?>"/>
			</div>
			<div class="row">
				<label for="hic_al-url-twitter">Twitter</label>
				<input type="url" name="hic_al-url-twitter" id="hic_al-url-twitter" value="<?php echo get_option("hic_al-url-twitter"); ?>"/>
			</div>

			<h3>Contenidos Multimedia en Red</h3>

			<div class="row">
				<label for="hic_al-url-youtube">Youtube</label>
				<input type="url" name="hic_al-url-youtube" id="hic_al-url-youtube" value="<?php echo get_option("hic_al-url-youtube"); ?>"/>
			</div>
			<div class="row">
				<label for="hic_al-url-soundcloud">Soundcloud</label>
				<input type="url" name="hic_al-url-soundcloud" id="hic_al-url-soundcloud" value="<?php echo get_option("hic_al-url-soundcloud"); ?>"/>
			</div>
			<div class="row">
				<label for="hic_al-url-flickr">Flickr</label>
				<input type="url" name="hic_al-url-flickr" id="hic_al-url-flickr" value="<?php echo get_option("hic_al-url-flickr"); ?>"/>
			</div>

			<h3>Colores</h3>

			<div class="row">
				<label for="hic_al-url-color-0">Color 1</label>
				<input type="url" name="hic_al-color-0" id="hic_al-color-0" value="<?php echo get_option("hic_al-color-0"); ?>"/>
			</div>
			<div class="row">
				<label for="hic_al-color-1">Color 2</label>
				<input type="url" name="hic_al-color-1" id="hic_al-color-1" value="<?php echo get_option("hic_al-color-1"); ?>"/>
			</div>
			<div class="row">
				<label for="hic_al-url-color-2">Color 3</label>
				<input type="url" name="hic_al-color-2" id="hic_al-color-2" value="<?php echo get_option("hic_al-color-2"); ?>"/>
			</div>
			<div class="row">
				<label for="hic_al-color-3">Color 4</label>
				<input type="url" name="hic_al-color-3" id="hic_al-color-3" value="<?php echo get_option("hic_al-color-3"); ?>"/>
			</div>

			<?php
			settings_fields("hic_al_options_page-grp");

			do_settings_sections("hic_al_options_page");


			submit_button();

			?>
		</form>
	</div>
	<?php

	wp_enqueue_media();

	wp_enqueue_style('admin-file-uploader', get_stylesheet_directory_uri() . '/backend/admin-file-uploader.css' );

	wp_enqueue_script('imgLiquid',get_stylesheet_directory_uri().'/bower_components/imgLiquid/js/imgLiquid-min.js');
	wp_enqueue_script('admin-file-uploader', get_stylesheet_directory_uri() . '/backend/admin-file-uploader.js' );

}








function hic_al_image_uploader( $name, $width, $height ) {

	// Set variables
	$attachment_id = get_option( $name );

	$default_image = get_stylesheet_directory_uri() . '/backend/img/no-image.jpg';

	if ( $attachment_id ) {
		// if ( !empty( $attachment_id[$name] ) ) {
		$image_attributes = wp_get_attachment_image_src( $attachment_id, 'thumb');
		$src = $image_attributes[0];
		$value = $attachment_id;
	} else {
		$src = $default_image;
		$value = '';
	}

	$text = __( 'Upload', RSSFI_TEXT );

	// Print HTML field
	echo '
	<div class="upload">

	<div class="image-frame" style="width: ' . $width . 'px; height: ' . $height . 'px;">
	<img data-src="' . $default_image . '" src="' . $src . '"/>
	</div>
	<div>
	<input type="hidden" name="' . $name . '" id="' . $name . '" value="' . $value . '" />
	<button type="submit" class="upload_image_button button">' . $text . '</button>
	<button type="submit" class="remove_image_button button">&times;</button>
	</div>
	</div>
	';
}
