<?php

/*style link*/    
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

/*style link ends*/


/*script link start*/
function loadjs(){
	
	wp_register_script('customjs',get_template_directory_uri().'/js/scripts.js','',1,true);
	
	wp_enqueue_script('customjs');
	
	
}
add_action('wp_enqueue_scripts','loadjs');

/*script link ends*/

/*add menus link start*/
add_theme_support('menus');



add_theme_support('post-thumbnails');


register_nav_menus(
    
    array(
        
        'top-menu' => __('Top Menu','theme'),
        
        'footer-menu' => __('footer Menu','theme'),
        )
    
    );
/*add menus link ends*/    
    
    
    /*image size*/    
    add_image_size('smallest',300,300,true);
    add_image_size('largest',800,800,true);
    /*image size ends*/    
    
/*widget start*/    
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
    /*widget ends*/    
    
  
/*Custom Post type start*/


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
/*Custom Post type end*/
 ?>
