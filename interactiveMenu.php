<?php

/*
 Plugin Name: Interactive Menu  
 Description: Interactive menu Widget for information reguarding website. 
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
    }
     
    // Front-End
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
         
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( ! empty( $title ) )
        echo $args['before_title'] . $title . $args['after_title'];
         
        // This is where you run the code and display the output
        echo __( '
        
        <div class="menuClass" id="menuID">
            <i class="fa fa-arrow-circle-down fa-3x rotates" id="iconID"> </i>
        </div>',
         
         'wpb_widget_domain'
         
         );
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
     
} 
 
// Register and load 
function wpb_load_widget() {
    register_widget( 'interactive_menu' );
}
add_action( 'widgets_init', 'wpb_load_widget' );