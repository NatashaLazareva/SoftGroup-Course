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
        /*$defaults = array(
            'format' => 'standart'
        );*/
        $format = $instance[ 'format' ];
        // markup for form ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'format' ); ?>">Select format of posts:</label>
            <select class='widefat' id="<?php echo $this->get_field_id('format');?>"
                    name="<?php echo $this->get_field_name( 'format' ); ?>" type="text" >
                <option value="standart"<?php echo ($format=='standart')?'selected':''; ?>>Standart</option>
                <option value="aside"<?php echo ($format=='aside')?'selected':''; ?>>Aside</option>
                <option value="gallery"<?php echo ($format=='gallery')?'selected':''; ?>>Gallery</option>
                <option value="link"<?php echo ($format=='link')?'selected':''; ?>>Link</option>
                <option value="image"<?php echo ($format=='image')?'selected':''; ?>>Image</option>
                <option value="quote"<?php echo ($format=='quote')?'selected':''; ?>>Quote</option>
                <option value="status"<?php echo ($format=='status')?'selected':''; ?>>Status</option>
                <option value="video"<?php echo ($format=='video')?'selected':''; ?>>Video</option>
                <option value="chat"<?php echo ($format=='chat')?'selected':''; ?>>Chat</option>
                <option value="audio"<?php echo ($format=='audio')?'selected':''; ?>>Audio</option>
            </select>
        </p>
        <?php
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance[ 'format' ] = $new_instance[ 'format' ];
        return $instance;
    }

    function widget( $args, $instance ) {
        echo $args['before_widget'];
        $format = empty($instance['format']) ? '' : $instance['format'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        if ($format == 'standart') {
            $args = array(
                'post_type' => 'post',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'post_format',
                        'field' => 'slug',
                        'terms' => array('post-format-aside', 'post-format-gallery', 'post-format-link', 'post-format-image',
                            'post-format-quote', 'post-format-status', 'post-format-video', 'post-format-chat', 'post-format-audio'),
                        'operator' => 'NOT IN'
                    )
                )
            );
            $query = new WP_Query( $args );
            while ( $query->have_posts() ) {
                $query->the_post();
                ?>
                <h3><?php the_title();?></h3>  <?php // выведем заголовок поста
                the_content();
            }
            wp_reset_postdata();
        }
        else {
            $args = array(
                'posts_per_page' => 5,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'post_format',
                        'field' => 'slug',
                        'terms' => array('post-format-'.$format)
                    )
                )
            );
            $query = new WP_Query( $args );
            while ( $query->have_posts() ) {
                $query->the_post();
            ?>
                <h3><?php the_title();?></h3>  <?php // выведем заголовок поста
                the_content();
            }
            wp_reset_postdata();
        }
        echo $args['after_widget'];
    }
}

function register_post_formats_widget() {
    register_widget( 'Post_Formats_Widget' );
}
add_action( 'widgets_init', 'register_post_formats_widget' );



?>