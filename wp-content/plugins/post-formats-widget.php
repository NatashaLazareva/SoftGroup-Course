<?php
/*Plugin Name: Post Formats Widget
Description: This widget shows posts with particular selected format
Version: 0.1
Author: Natasha Setnik
Author URI:
License: GPLv2
*/

class Post_Formats_Widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            // base ID of the widget
            'post_formats_widget',
            // name of the widget
            __('Posts with particular format', 'course' ),
            // widget options
            array (
                'description' => __( 'Show posts with particular selected format',
                    'course' )
            )
        );
    }

    function form( $instance ) {
        $defaults = array(
            'format' => 'standart'
        );
        $format = $instance[ 'format' ];
        // markup for form ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'format' ); ?>">Format of posts:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'format' );
            ?>" name="<?php echo $this->get_field_name( 'format' ); ?>" value="<?php echo
            esc_attr( $format ); ?>">
        </p>
        <?php
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance[ 'format' ] = strip_tags( $new_instance[ 'format' ] );
        return $instance;
    }

    function widget( $args, $instance ) {
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        echo ( 'Hello, World!');

        $args = array(
            'posts_per_page' => 5,
            'tax_query' => array(
                array(
                    'taxonomy' => 'post_format',
                    'field' => 'slug',
                    'terms' => array('post-format-'.$instance['format'])
                )
            )
        );
        $query = new WP_Query( $args );
        while ( $query->have_posts() ) {
            $query->the_post();
        ?>
            <p><?php the_title();?></p>  <?php // выведем заголовок поста
            the_content();
        }
        wp_reset_postdata();

        echo $args['after_widget'];
    }
}

function register_post_formats_widget() {
    register_widget( 'Post_Formats_Widget' );
}
add_action( 'widgets_init', 'register_post_formats_widget' );



?>