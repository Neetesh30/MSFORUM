<?php

function load_stylesheets(){
	
	wp_register_style('bootstrap',get_template_directory_uri().'/css/bootstrap.min.css',array(),false,'all');
	
	wp_enqueue_style('bootstrap');
	
	
	wp_register_style('style',get_template_directory_uri().'/style.css',array(),false,'all');
	
	wp_enqueue_style('style');
}
add_action('wp_enqueue_scripts','load_stylesheets');



function include_jquery(){
	
	wp_deregister_script('jquery');
	
	wp_enqueue_script('jquery',get_template_directory_uri().'/js/jquery-3.3.1.min.js','',1,true);
	
	add_action('wp_enqueue_scripts','jquery');
	
}
add_action('wp_enqueue_scripts','include_jquery');



function loadjs(){
	
	wp_register_script('customjs',get_template_directory_uri().'/js/scripts.js','',1,true);
	
	wp_enqueue_script('customjs');
	
	
}
add_action('wp_enqueue_scripts','loadjs');


add_theme_support('menus');



add_theme_support('post-thumbnails');


register_nav_menus(
    
    array(
        
        'top-menu' => __('Top Menu','theme'),
        
        'footer-menu' => __('footer Menu','theme'),
        )
    
    );
    
    add_image_size('smallest',300,300,true);
    add_image_size('largest',800,800,true);
    
    
function ourWidgetsInit() {
    
    register_sidebar( array(
        'name' => 'Sidebar',
        'id' => 'sidebar1'
        )
        );
        
    register_sidebar( array(
        'name' => 'Footer Area 1',
        'id' => 'footer1'
        )
        );    
        
        register_sidebar( array(
        'name' => 'Footer Area 2',
        'id' => 'footer2'
        )
        );    
        
        register_sidebar( array(
        'name' => 'Footer Area 3',
        'id' => 'footer3'
        )
        );    
        
        register_sidebar( array(
        'name' => 'Footer Area 4',
        'id' => 'footer4'
        )
        );    
        
    
}    
    add_action('widgets_init','ourWidgetsInit');
    
    
    /* Custom Post Type Start */
function create_posttype() {
register_post_type( 'Products',
// CPT Options
array(
  'labels' => array(
   'name' => __( 'Products' ),
   'singular_name' => __( 'Products' )
  ),
  'public' => true,
  'has_archive' => false,
  'rewrite' => array('slug' => 'Products'),
 )
);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );
/* Custom Post Type End */


/*Custom Post type start*/
function cw_post_type_products() {
$supports = array(
'title', // post title
'editor', // post content
'author', // post author
'thumbnail', // featured images
'excerpt', // post excerpt
'custom-fields', // custom fields
'comments', // post comments
'revisions', // post revisions
'post-formats', // post formats
);
$labels = array(
'name' => _x('Products', 'plural'),
'singular_name' => _x('Products', 'singular'),
'menu_name' => _x('Products', 'admin menu'),
'name_admin_bar' => _x('Products', 'admin bar'),
'add_new' => _x('Add New', 'add new'),
'add_new_item' => __('Add New Products'),
'new_item' => __('New Products'),
'edit_item' => __('Edit Products'),
'view_item' => __('View Products'),
'all_items' => __('All Products'),
'search_items' => __('Search Products'),
'not_found' => __('No Products found.'),
);
$args = array(
'supports' => $supports,
'labels' => $labels,
'public' => true,
'query_var' => true,
'rewrite' => array('slug' => 'Products'),
'has_archive' => true,
'hierarchical' => false,
);
register_post_type('Products', $args);
}

register_taxonomy("Category", array("products"), array("hierarchical" => true, "label" => "Category", "singular_label" => "Category", "rewrite" => true));

add_action('init', 'cw_post_type_products');


function taxonomies_category() {
    
    $labels = array(
'name' => _x('Products Category', 'plural'),
'singular_name' => _x('Products Category', 'singular'),
'menu_name' => __('Products Category', 'admin menu'),
'add_new_item' => __('Add New Products Category'),
'new_item_name' => __('New Products Category'),
'edit_item' => __('Edit Products Category'),
'update_item' => __('Update Products Category'),
'view_item' => __('View Products Category'),
'all_items' => __('All Products Category'),
'search_items' => __('Search Products Category'),
'parent_item' => __('Parent Products Category'),
'parent_item_colon' => __('Parent Products Category'),
'search_items' => __('Search Products Category'),
);
$args = array(
'labels' => $labels,
'heirarchial' => true,
);    
register_taxonomy('products_category', $args);    
}
add_action('init','taxonomies_category',0);
/*Custom Post type end*/









function awesome_custom_post_type (){
	
	$labels = array(
		'name' => 'Product',
		'singular_name' => 'Product',
		'add_new' => 'Add Item',
		'all_items' => 'All Items',
		'add_new_item' => 'Add Item',
		'edit_item' => 'Edit Item',
		'new_item' => 'New Item',
		'view_item' => 'View Item',
		'search_item' => 'Search Product',
		'not_found' => 'No items found',
		'not_found_in_trash' => 'No items found in trash',
		'parent_item_colon' => 'Parent Item'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revisions',
		),
		'taxonomies' => array('category', 'post_tag'),
		'menu_position' => 5,
		'exclude_from_search' => false
	);
	register_post_type('Product',$args);
}
add_action('init','awesome_custom_post_type');
 ?>