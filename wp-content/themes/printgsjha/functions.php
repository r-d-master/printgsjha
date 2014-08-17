<?php
require_once('library/siteframework.php');		// core functions
require('theme-options.php');          			// theme options

add_action( 'add_meta_boxes', 'action_add_meta_boxes', 10, 2 );
function action_add_meta_boxes() {
	global $_wp_post_type_features;
	if (isset($_wp_post_type_features['post']['editor']) && $_wp_post_type_features['post']['editor']) {
		unset($_wp_post_type_features['post']['editor']);
		add_meta_box(
			'description_section',
			__('Editor'),
			'inner_custom_box',
			'post', 'normal', 'default'
		);
	}
	if (isset($_wp_post_type_features['page']['editor']) && $_wp_post_type_features['page']['editor']) {
		unset($_wp_post_type_features['page']['editor']);
		add_meta_box(
			'description_sectionid',
			__('Editor'),
			'inner_custom_box',
			'page', 'normal', 'default'
		);
	}
}

/*add_filter('term_links-portfolio', 'ad_filter_links');

function ad_filter_links($term_links) {
    foreach ($term_links as $term_link) {
        $term_link = str_replace('<a ', '<a class="fancybox"', $term_link);
    }
    return $term_links;
}
*/
function inner_custom_box( $post ) {
	the_editor($post->post_content);
}


function portfolio_posts_per_page( $query ) {
    if ( $query->query_vars['post_type'] == 'portfolio' ) $query->query_vars['posts_per_page'] = 6;
    return $query;
}
if ( !is_admin() ) add_filter( 'pre_get_posts', 'portfolio_posts_per_page' );

// Enqueue Scripts/Styles for our Lightbox
function tgsjha_add_lightbox() {
    wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/lightbox/js/jquery.fancybox.pack.js', array( 'jquery' ), false, true );
   // wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/lightbox/js/lightbox.js', array( 'fancybox' ), false, true );
    wp_enqueue_style( 'lightbox-style', get_template_directory_uri() . '/lightbox/css/jquery.fancybox.css' );
}
add_action( 'wp_enqueue_scripts', 'tgsjha_add_lightbox' );

?>