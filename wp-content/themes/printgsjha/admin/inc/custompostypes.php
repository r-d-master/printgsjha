<?php
/*********************************************************************************************

Registers Custom Portfolio Post Type

*********************************************************************************************/
$labels = array(
    'name'                          => __( 'Types', 'site5framework' ),
    'singular_name'                 => __( 'Type', 'site5framework' ),
    'search_items'                  => __( 'Search Types', 'site5framework' ),
    'popular_items'                 => __( 'Popular Types', 'site5framework' ),
    'all_items'                     => __( 'All Types', 'site5framework' ),
    'parent_item'                   => __( 'Parent Type', 'site5framework' ),
    'edit_item'                     => __( 'Edit Type', 'site5framework' ),
    'update_item'                   => __( 'Update Type', 'site5framework' ),
    'add_new_item'                  => __( 'Add New Type', 'site5framework' ),
    'new_item_name'                 => __( 'New Type', 'site5framework' ),
    'separate_items_with_commas'    => __( 'Separate Types with commas', 'site5framework' ),
    'add_or_remove_items'           => __( 'Add or remove Types', 'site5framework' ),'',
    'choose_from_most_used'         => __( 'Choose from most used Types', 'site5framework' )
    );

$args = array(
    'label'                         => __( 'Types', 'site5framework' ),
    'labels'                        => $labels,
    'public'                        => true,
    'hierarchical'                  => true,
    'show_ui'                       => true,
    'show_in_nav_menus'             => true,
    'args'                          => array( 'orderby' => 'term_order' ),
    'rewrite'                       => array( 'slug' => 'portfolio/types', 'with_front' => false ),
    'query_var'                     => true
);

register_taxonomy( 'types', 'portfolio', $args );


register_post_type( 'portfolio',
    array(
        'labels'                => array(
	    'name'                  => __( 'Portfolio', 'site5framework' ),
	    'singular_name'         => __( 'Portfolio Item', 'site5framework' ),
	    'add_new'               => __( 'Add New Item', 'site5framework' ),
	    'add_new_item'          => __( 'Add New Portfolio Item', 'site5framework' ),
	    'edit_item'             => __( 'Edit Portfolio Item', 'site5framework' ),
	    'new_item'              => __( 'Add New Portfolio Item', 'site5framework' ),
	    'view_item'             => __( 'View Item', 'site5framework' ),
	    'search_items'          => __( 'Search Portfolio', 'site5framework' ),
	    'not_found'             => __( 'No portfolio items found', 'site5framework' ),
	    'not_found_in_trash'    => __( 'No portfolio items found in trash', 'site5framework' )
            ),
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'query_var'             => true,
    	'permalink_epmask'      => true,
        'menu_position'         => 5,
        'show_in_menu'          => true,
        'supports' 				=> array( 'title', 'editor', 'comments', 'page-attributes' ),
        'rewrite'               => array( 'slug' => 'portfolio', 'with_front' => false ),
        'has_archive'           => true
    )
);


//  Add Columns to Portfolio Edit Screen


function portfolio_edit_columns($portfolio_columns){
	$portfolio_columns = array(
		"cb" 				=> "<input type=\"checkbox\" />",
		"title" 			=> __('Title', 'site5framework'),
		"portfolio-tags" 	=> __('Tags', 'site5framework'),
		"author" 			=> __('Author', 'site5framework'),
		"comments" 			=> __('Comments', 'site5framework'),
		"date" 				=> __('Date', 'site5framework'),
	);
	$portfolio_columns['comments'] = '<div class="vers"><img alt="Comments" src="' . esc_url( admin_url( 'images/comment-grey-bubble.png' ) ) . '" /></div>';
	return $portfolio_columns;
}



// Styling for the custom post type icon

add_action( 'admin_head', 'wpt_portfolio_icons' );

function wpt_portfolio_icons() {
    ?>
    <style type="text/css" media="screen">
        #menu-posts-portfolio .wp-menu-image {
            background: url(<?php echo get_template_directory_uri(); ?>/admin/images/portfolio-icon.png) no-repeat 6px 6px !important;
        }
		#menu-posts-portfolio:hover .wp-menu-image, #menu-posts-portfolio.wp-has-current-submenu .wp-menu-image {
            background-position:6px -16px !important;
        }
		#icon-edit.icon32-posts-portfolio {background: url(<?php echo get_template_directory_uri(); ?>/admin/images/portfolio-32x32.png) no-repeat;}
    </style>
<?php }?>
<?php
/*********************************************************************************************

Registers Custom Slider Post Type

*********************************************************************************************/
function wpt_slider_posttype() {

$labels = array(
    'name' 					=> __( 'Slider', 'site5framework' ),
    'singular_name' 		=> __( 'Slider Item', 'site5framework' ),
    'add_new' 				=> __( 'Add New Item', 'site5framework' ),
    'add_new_item' 			=> __( 'Add New Slider Item', 'site5framework' ),
    'edit_item' 			=> __( 'Edit Slider Item', 'site5framework' ),
    'new_item' 				=> __( 'Add New Slider Item', 'site5framework' ),
    'view_item'				=> __( 'View Item', 'site5framework' ),
    'search_items' 			=> __( 'Search Slider', 'site5framework' ),
    'not_found' 			=> __( 'No slider items found', 'site5framework' ),
    'not_found_in_trash' 	=> __( 'No slider items found in trash', 'site5framework' )
);

$args = array(
    'labels' 				=> $labels,
    'public' 				=> true,
	'publicly_queryable'    => true,
	'show_ui'               => true,
	'query_var'             => true,
	'permalink_epmask'      => true,
    'supports' 				=> array( 'title','page-attributes' ),
	'rewrite'               => array( 'slug' => 'featured', 'with_front' => false ),
    'menu_position' 		=> 5,
	'show_in_menu'          => true,
    'has_archive' 			=> true
	
);

register_post_type( 'featured', $args);
}

add_action( 'init', 'wpt_slider_posttype' );


//  Add Columns to slider edit screen

function slider_edit_columns($slider_columns){
	$slider_columns = array(
		"cb" 				=> "<input type=\"checkbox\" />",
		"title" 			=> __('Title', 'site5framework'),
		"slider-tags"  		=> __('Tags', 'site5framework'),
		"author" 			=> __('Author', 'site5framework'),
		"comments" 			=> __('Comments', 'site5framework'),
		"date" 				=> __('Date', 'site5framework'),
	);
	$slider_columns['comments'] = '<div class="vers"><img alt="Comments" src="' . esc_url( admin_url( 'images/comment-grey-bubble.png' ) ) . '" /></div>';
	return $slider_columns;
}


// Styling for the custom post type icon

add_action( 'admin_head', 'wpt_slider_icons' );

function wpt_slider_icons() {
    ?>
    <style type="text/css" media="screen">
        #menu-posts-slider .wp-menu-image {
            background: url(<?php echo get_template_directory_uri(); ?>/admin/images/slider-icon.png) no-repeat 6px 6px !important;
        }
		#menu-posts-slider:hover .wp-menu-image, #menu-posts-slider.wp-has-current-submenu .wp-menu-image {
            background-position:6px -16px !important;
        }
		#icon-edit.icon32-posts-slider {background: url(<?php echo get_template_directory_uri(); ?>/admin/images/slider-32x32.png) no-repeat;}
    </style>
<?php }

?>