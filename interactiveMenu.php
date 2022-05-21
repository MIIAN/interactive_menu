<?php
/*
 Plugin Name: Interactive Menu  
 Description: Interactive drop menu for information reguarding website and icons. 
 Version: 1.0.0
 Author: Milan
 Author URI: https://g-milan.com
 License: MIT
 */ 

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA
*/

if( ! defined( 'ABSPATH' ) ) {
    die; 
}

class InteractiveMenu
{
    
    function register() {
 
        // add stylesheet loaded last*/
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue') );  
        // Register interactive menu into wordpress
        add_action( 'init', array( $this, 'interactiveMenuRegister')); 
    }

    function interactiveMenuRegister() {
        register_nav_menu('interactive-menu',__( 'Interactive Menu' )); 
    }
     
    function enqueue() {
        wp_enqueue_style( 'styles', plugins_url('/assets/styles.css', __FILE__ ));
        wp_enqueue_script( 'scripts', plugins_url('/assets/main.js', __FILE__ ), array('jquery'), '1.0', true ); 
    }
}


if( class_exists( 'InteractiveMenu') ) {
    $interactiveMenu = new InteractiveMenu();
    $interactiveMenu->register(); 
}


//activation
require_once plugin_dir_path( __FILE__ ). ('inc/interactiveMenu_activate.php');
register_activation_hook( __FILE__, array( 'interactiveMenuActivate', 'activate'));

//deactivation
require_once plugin_dir_path( __FILE__ ). ('inc/interactiveMenu_deactivate.php'); 
register_deactivation_hook( __FILE__, array( 'interactiveMenuDeactivate', 'deactivate'));