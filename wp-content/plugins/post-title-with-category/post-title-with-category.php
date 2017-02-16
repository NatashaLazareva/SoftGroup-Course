<?php
/*
Plugin Name: Post Title Formatting
Plugin URI:
Description: Плагін виводить пости з заголовками, які містять назву поста та назву категорії.
Формат виводу задається в адмінці.
Version: 1.0
Author: Natasha Setnik
Author URI:
License: GPL2
*/

/**
 * Create Widget
 * Class Post_Title_Widget
 */
class Post_Title_Widget extends WP_Widget {
    function __construct() {
        parent::__construct(
        // base ID of the widget
            'post_title_widget',
            // name of the widget
            __('Post Title Formatting', ' course ' ),
            // widget options
            array (
                'description' => __( 'Displays posts with titles that contain the name of the post and the category name.
                Output format is set in plugn\'s admin panel.',
                    ' course ' )
            )
        );
    }

    /*function form( $instance ) {
        $defaults = array(
            'depth' => '-1'
        );
        $depth = $instance[ 'depth' ];
        // markup for form ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'depth' ); ?>">Depth of list:</label>
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
    }*/

    function widget( $args, $instance ) {
        // kick things off
        extract( $args );
        //echo $before_widget;
        echo 'Posts titles with Category:';

        // set the arguments for WP_Query
        $args = array(
            'post_type' => 'post',
            'showposts' => '-1'
        );

        $query = new WP_Query( $args );

        if ( $query->have_posts() ) {
            // The Loop
            while ( $query->have_posts() ) {
                $query->the_post();

                add_filter( 'the_title', 'post_title_formatting' );
                echo '<li>' . get_the_title() . '</li>';

            }

            wp_reset_postdata();
        }

    }
    //}

}

function register_post_title_widget() {
    register_widget( 'post_title_widget' );
}

add_action( 'widgets_init', 'register_post_title_widget' );




add_action('admin_menu', 'ptf_settings_menu');

function ptf_settings_menu () {
    add_options_page(
        'Настройки плагина Post Title Formatting',
        'Post Title Formatting',
        'manage_options',
        'ptf_settings',
        'render_ptf_settings_page'
    );
}

function render_ptf_settings_page() {
    include ('ptf-settings.php');
}


function post_title_formatting($title) {
    $post_title_sign = sprintf('<span>%s</span>', get_the_category()[0]->name);
    //if (get_post_type() == 'post' && in_the_loop())
    if (get_post_type() == 'post')
        return $title . ' ' . get_option('awesome_text') . ' ' . $post_title_sign;
    return $title;
}
