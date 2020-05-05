<?php

// Create Shortcode collapse
// Shortcode: [collapse class="collapse-navbar sidebar-cat primary-color"]Content[/collapse]
function create_collapse_shortcode($atts, $content = null) {
    ob_start();
	$atts = shortcode_atts(
		[
			'class' => 'collapse-navbar sidebar-cat primary-color'
		],
		$atts,
		'collapse'
	);

	$class = $atts['class'];
	$content = do_shortcode( $content);
    return '<div class="' . $class .'"><ul>'. $content . '</ul></div>';
    return ob_get_clean();

}
add_shortcode( 'collapse', 'create_collapse_shortcode' );

// Create Shortcode collab-item
// Shortcode: [collab-item id="" count="true" type="category"]Content[/collab-item]
function create_collabitem_shortcode($atts, $content_list = null) {
	ob_start();
	$atts = shortcode_atts(
		[
			'id' => '',
			'count' => true,
			'type' => 'category',
			'active' => false,
			'posts_per_page' => '4',
			'link' => '',
		],
		$atts,
		'collab-item'
	);

	$id = $atts['id'];
	$atts['count'];
	$posts_p = $atts['posts_per_page'];
	$type = $atts['type'];
	$link = $atts['link'];
	$atts['active'] ? $active_class = 'current-menu-ancestor' : $active_class = '';
	$counter = get_term_by('id', $id, 'category');
	if(isset($type) && $type == 'category'):
		echo '<li class="menu-item-has-children '. $active_class .'"><a title="'. __('អានបន្ត', 'mptc-field') .'" href="'. esc_url( get_category_link( $id ) ) .'">'. $content_list .' </a><span class="count">'. $counter->count .'</span>';
		$args_query_collaps = [
			'post_type' => ['post'],
			'posts_per_page' => $posts_p,
			'order' => 'DESC',
			'cat' => $id,
		];
		
		$query_collaps = new WP_Query( $args_query_collaps );
		if ( $query_collaps->have_posts() ) :
			echo '<ul class="sub-menu">';
			while ( $query_collaps->have_posts() ) :
				$query_collaps->the_post();
				echo '<li><a href="'. get_the_permalink() .'">'. get_the_title() .'​</a></li>';
			endwhile;
			echo '</ul>';
		endif;
		echo '</li>';
		wp_reset_postdata();
	else:
		echo '<li><a title="'. __('ចូលមើលទាំងអស់', '') .'" href="'. $link .'">'. $content_list .'</a></li>';
	endif;
	return ob_get_clean();
}
add_shortcode( 'collab-item', 'create_collabitem_shortcode' );