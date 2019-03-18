<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything.
 *
 * @package WordPress
 * @subpackage MYFORUM
 * @since MYFORUM 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="sticky-top">
    
    
    <div class="container">
    <?php
    
    wp_nav_menu(
        
        array(
            'theme_loaction' => 'top-menu',
            )
        
        );
    
    ?>
    
    </div>
    
</header>