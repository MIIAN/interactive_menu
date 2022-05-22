<?php
/**
 * 
 *  plugin won't register new menus interactiveMenu.php line 45
 * 
 *  Work around: Add this code in child theme. 
 * 
 */


 // Custom Menus  

if ( ! function_exists( 'register_custom_menus' ) ) {
    
    function register_custom_menus() {
        register_nav_menus( array(
            'interactive_menu' =>__( 'Interactive Menu', 'text_domain' )
            ));
    }
    
add_action( 'after_setup_theme', 'register_custom_menus' );

}

 // Interactive menu used with interactive_menu plugin interactive_menu.php line 65
 
function interactive_menu_placement() {
    wp_nav_menu( array(
        'container_id' => 'interactiveMenu',
        'container_class' => 'interactive_menu_hidden',
        'theme_location' => 'interactive_menu',
    ));
}

add_action( 'interactive_menu', 'interactive_menu_placement' );  