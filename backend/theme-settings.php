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

	add_settings_field("hic_al-logo-header", "Logo Cabecera", "hic_al-logo-header", "hic_al_options_page");//, "first_section");
	add_settings_field("hic_al-logo-cover", "Logo Portada", "hic_al-logo-cover", "hic_al_options_page");//, "first_section");

	add_settings_field("hic_al-cover-image-0", "", "hic_al-cover-image-0", "hic_al_options_page");//, "first_section");
	add_settings_field("hic_al-cover-image-1", "", "hic_al-cover-image-1", "hic_al_options_page");//, "first_section");
	add_settings_field("hic_al-cover-image-2", "", "hic_al-cover-image-2", "hic_al_options_page");//, "first_section");
	add_settings_field("hic_al-cover-image-3", "", "hic_al-cover-image-3", "hic_al_options_page");//, "first_section");
	add_settings_field("hic_al-cover-image-4", "", "hic_al-cover-image-4", "hic_al_options_page");//, "first_section");

	add_settings_field("hic_al-footer-text", "Texto Pie Página", "hic_al-footer-text", "hic_al_options_page");//, "first_section");
	add_settings_field("hic_al-legal_info", "Aviso Legal", "hic_al-legal_info", "hic_al_options_page");//, "first_section");

	register_setting( 'hic_al_options_page-grp', 'hic_al-logo-header');
	register_setting( 'hic_al_options_page-grp', 'hic_al-logo-cover');

	register_setting( 'hic_al_options_page-grp', 'hic_al-cover-image-0');
	register_setting( 'hic_al_options_page-grp', 'hic_al-cover-image-1');
	register_setting( 'hic_al_options_page-grp', 'hic_al-cover-image-2');
	register_setting( 'hic_al_options_page-grp', 'hic_al-cover-image-3');
	register_setting( 'hic_al_options_page-grp', 'hic_al-cover-image-4');

	register_setting( 'hic_al_options_page-grp', 'hic_al-footer-text');
	register_setting( 'hic_al_options_page-grp', 'hic_al-legal_info');

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

			<h3>Imágenes de Portada</h3>

			<?php
			hic_al_image_uploader( 'hic_al-cover-image-0', $width = 115, $height = 115 );
			hic_al_image_uploader( 'hic_al-cover-image-1', $width = 115, $height = 115 );
			hic_al_image_uploader( 'hic_al-cover-image-2', $width = 115, $height = 115 );
			hic_al_image_uploader( 'hic_al-cover-image-3', $width = 115, $height = 115 );
			hic_al_image_uploader( 'hic_al-cover-image-4', $width = 115, $height = 115 );


			?>

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
