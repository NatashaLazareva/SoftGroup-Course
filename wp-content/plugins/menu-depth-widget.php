<?php
/*Plugin Name: Menu Depth Widget
Description: This widget displays a menu with the specified nesting level.
Version: 0.1
Author: Natasha Setnik
Author URI:
License: GPLv2
*/

class Menu_Depth_Widget extends WP_Widget {
    function __construct() {
        parent::__construct(
        // base ID of the widget
            'menu_depth_widget',
            // name of the widget
            __('Menu Depth', ' course ' ),
            // widget options
            array (
                'description' => __( 'Displays a menu with the specified nesting level',
                    ' course ' )
            )
        );
    }

    function form( $instance ) {
        $defaults = array(
            'depth' => '-1'
        );
        $depth = $instance[ 'depth' ];
        // markup for form ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'depth' ); ?>">Menu depth:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'depth' );
            ?>" name="<?php echo $this->get_field_name( 'depth' ); ?>" value="<?php echo
            esc_attr( $depth ); ?>">
        </p>
        <?php
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance[ 'depth' ] = strip_tags( $new_instance[ 'depth' ] );
        return $instance;
    }

    function widget( $args, $instance ) {
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        wp_nav_menu( array( 'theme_location' => 'widget-menu', 'menu_class' => 'widget-menu', 'depth'=> $instance['depth'] ) );

        echo $args['after_widget'];
    }

}

function register_menu_depth_widget() {
    register_widget( 'Menu_Depth_Widget' );
}

add_action( 'widgets_init', 'register_menu_depth_widget' );

?>