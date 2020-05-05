<?php

/**
 * The file that defines the shortcode class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://channchetra.com
 * @since      1.0.1
 *
 * @package    Mptc_Fields
 * @subpackage Mptc_Fields/includes
 */
// Add Shortcode
function ptc_legacy_gallery_shortcode( $atts ) {
    ob_start();
	// Attributes
	$atts = shortcode_atts(
		array(
			'images' => '',
		),
		$atts,
		'ptc-legacy-gallery'
    );

    if ( isset( $atts['images']) ){
        $image_lists = explode(',', $atts['images']);
        if( count($image_lists) <= 2 ){ //លក្ខណនៅពេលដែល Link Image មានតែមួយ ឬមួយហើយមាន Semicolon ឬ Empty String
           return '<br>';
        }else{

        $returen_val ='';

        $returen_val .= '<div class="slider-for">';

        foreach($image_lists as $image_full_path ){
            $returen_val .='<div><img src="';
            $returen_val .= $image_full_path; 
            $returen_val .='" /></div>';
        }
        $returen_val .='</div>';
        $returen_val .='<div class="slider-nav">';
            foreach($image_lists as $image_path_thumb ){
                $returen_val .='<div><img src="';
                $returen_val .= $image_path_thumb; 
                $returen_val .='" /></div>';
            }
        $returen_val .='</div>';
        return $returen_val;
        }
    }  
    return ob_get_clean();

}

add_shortcode( 'ptc-legacy-gallery', 'ptc_legacy_gallery_shortcode' );
