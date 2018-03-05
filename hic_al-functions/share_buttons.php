<?php

function crunchify_social_sharing_buttons($content) {
	global $post;

	var_dump( $post );

	if(is_singular() || is_home()){

		// Get current page URL
		$crunchifyURL = urlencode(get_permalink());

		// Get current page title
		$crunchifyTitle = str_replace( ' ', '%20', get_the_title());

		// Get Post Thumbnail for pinterest
		$crunchifyThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

		// Construct sharing URL without using any script
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyURL.'&amp;via=Crunchify';
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;
		// $googleURL = 'https://plus.google.com/share?url='.$crunchifyURL;
		// $bufferURL = 'https://bufferapp.com/add?url='.$crunchifyURL.'&amp;text='.$crunchifyTitle;
		// $whatsappURL = 'whatsapp://send?text='.$crunchifyTitle . ' ' . $crunchifyURL;
		// $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$crunchifyURL.'&amp;title='.$crunchifyTitle;

		// Based on popular demand added Pinterest too
		// $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$crunchifyURL.'&amp;media='.$crunchifyThumbnail[0].'&amp;description='.$crunchifyTitle;

		// Add sharing button at the end of page/page content
		$widget = '';
		$widget .= '<div class="crunchify-social">';
		$widget .= '<h5>SHARE ON</h5> <a class="crunchify-link crunchify-twitter" href="'. $twitterURL .'" target="_blank">Twitter</a>';
		$widget .= '<a class="crunchify-link crunchify-facebook" href="'.$facebookURL.'" target="_blank">Facebook</a>';
		// $widget .= '<a class="crunchify-link crunchify-whatsapp" href="'.$whatsappURL.'" target="_blank">WhatsApp</a>';
		// $widget .= '<a class="crunchify-link crunchify-googleplus" href="'.$googleURL.'" target="_blank">Google+</a>';
		// $widget .= '<a class="crunchify-link crunchify-buffer" href="'.$bufferURL.'" target="_blank">Buffer</a>';
		// $widget .= '<a class="crunchify-link crunchify-linkedin" href="'.$linkedInURL.'" target="_blank">LinkedIn</a>';
		// $widget .= '<a class="crunchify-link crunchify-pinterest" href="'.$pinterestURL.'" data-pin-custom="true" target="_blank">Pin It</a>';
		$widget .= '</div>';

		return $widget . $content;

	}else{
		// if not a post/page then don't include sharing button
		return $content;
	}
};

// add_filter( 'the_content', 'crunchify_social_sharing_buttons');

?>
