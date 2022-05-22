<?php

/*
 Plugin Name: Interactive Menu  
 Description: Interactive Menu Widget for information reguarding website. 
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


class interactive_menu extends WP_Widget {
 
    function __construct() {
        parent::__construct(
            'interactive_menu', 
            __('Interactive Menu', 'wpb_widget_domain'), 
            array( 'description' => __( 'Set up interactive menu for your website', 'wpb_widget_domain' ), )
        );
        //load stylesheet.
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue') ); 
        //load Menu. init breaks widgets_init dosn't load?? 
        //add_action( 'need to hook in to something here so it loads in with other menu items. Work around: assets/'Code Snippets'/theme.php file', array( $this, 'register_interactive_menu') ); 
        //add_action( 'interactive_menu', array( $this, 'interactive_menu_placement'));
    }
     
    // Front-End
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
         
        echo $args['before_widget'];
        if ( ! empty( $title ) )
        echo __( '
        '. do_action('interactive_menu') . '
        <div class="widget-wrap"
        <div class="menuClass icon-widget" id="menuID">
            <i class="fa fa-arrow-circle-down fa-3x rotates" style="color:#ffffff;background-color:transparent;" id="iconID"> </i>
        <br>
        <h4 class="widget-title">' . $title . '</h4>
        </div>
        </div>
        ');
        echo $args['after_widget'];
    }
     
    // Back-End
        public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
        $title = $instance[ 'title' ];
        }
        else {
        $title = __( 'New title', 'wpb_widget_domain' );
        }
        // Widget admin form
        ?>
        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <?php
    }
     
    // Updating 
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
    
    // Styles
    function enqueue() {
        wp_enqueue_style( 'styles', plugins_url('/assets/styles.css', __FILE__ ));
        wp_enqueue_script( 'scripts', plugins_url('/assets/main.js', __FILE__ ), array('jquery'), '1.0', true ); 
    }
     
    /* Interactive Menu
    function register_interactive_menu() {
        register_nav_menu( array(
            'interactive_menu_plugin' => __( 'Interactive Menu Plugin', 'text_domain' ) 
            )); 
    }
    
    function interactive_menu_placement() {
        wp_nav_menu( array(
            'container_id' => 'interactiveMenu',
            'container_class' => 'interactive_menu_hidden',
            'theme_location' => 'interactive_menu_plugin',
        ));
    }
    */
} 
 
// Register and load the widget
function wpb_load_widget() {
    register_widget( 'interactive_menu' );
}
add_action( 'widgets_init', 'wpb_load_widget' );




