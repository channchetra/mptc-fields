<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/CMB2/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( dirname( __FILE__ ) . 'includes/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . 'includes/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . 'includes/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . 'includes/CMB2/init.php';
}
add_action( 'cmb2_init', 'cmb2_add_mptc_fields' );
function cmb2_add_mptc_fields() {

	$prefix = '_mptc_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'Advanced Field',
		'title'        => __( 'Advanced Field', 'PTC Custom Fields' ),
		'object_types' => array( 'page', 'post' ),
		'context'      => 'normal',
		'priority'     => 'default',
    ) );
    
	$cmb->add_field( array(
		'name' => __( 'Document File', 'PTC Custom Fields' ),
		'id' => $prefix . 'document_file',
		'type' => 'file',
	) );

	$cmb->add_field( array(
		'name' => __( 'Gallery Images', 'PTC Custom Fields' ),
		'id' => $prefix . 'gallery_images_link',
		'type' => 'textarea_small',
		'desc' => __( 'All images gallery\'s link from importer', 'PTC Custom Fields' ),
	) );

	$cmb->add_field( array(
		'name' => __( 'Video URL', 'PTC Custom Fields' ),
		'id' => $prefix . 'video_url',
		'type' => 'oembed',
	) );

}