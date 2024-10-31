<?php
 
/**
 * Adds Youtube_Widget widget.
 */
class yts_Youtube_subs_Widget extends WP_Widget {
 
    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'yts_youtube_subs_widget', // Base ID
            'Youtube Subs', // Name
            array( 'description' => __( 'A widget to Display Youtube button and count.', 'yts_domain' ), ) // Args
        );
    }
 
    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );
 
        echo $before_widget;
        if ( ! empty( $title ) ) {
            echo $before_title . $title . $after_title;
        }
        echo '<div class="g-ytsubscribe" data-channel="'.$instance['channel'].'" data-layout="'.$instance['layout'].'" data-count="'.$instance['count'].'"></div>';
        echo $after_widget;
    }
 
    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'Youtube Subs', 'yts_domain' );
        }
		    if ( isset( $instance[ 'channel' ] ) ) {
            $channel = $instance[ 'channel' ];
        }
        else {
            $channel = __( 'Newmaroc4', 'yts_domain' );
        }
		    if ( isset( $instance[ 'layout' ] ) ) {
            $layout = $instance[ 'layout' ];
        }
        else {
            $layout = __( 'default', 'yts_domain' );
        }
				    if ( isset( $instance[ 'count' ] ) ) {
            $count = $instance[ 'count' ];
        }
        else {
            $count = __( 'default', 'yts_domain' );
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
         </p>
		    <p>
            <label for="<?php echo $this->get_field_name( 'channel' ); ?>"><?php _e( 'Channel:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'channel' ); ?>" name="<?php echo $this->get_field_name( 'channel' ); ?>" type="text" value="<?php echo esc_attr( $channel ); ?>" />
         </p>
		 	    <p>
            <label for="<?php echo $this->get_field_name( 'layout' ); ?>"><?php _e( 'Layout:' ); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id( 'layout' ); ?>" name="<?php echo $this->get_field_name( 'layout' ); ?>">
			<option value="default" <?php echo ($layout=='default')?'selected':'';?>>Default</option>
			<option value="full" <?php echo ($layout=='full')?'selected':'';?>>Full</option>
			</select>
         </p>
		 	 	    <p>
            <label for="<?php echo $this->get_field_name( 'count' ); ?>"><?php _e( 'Count:' ); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>">
			<option value="default" <?php echo ($count=='default')?'selected':'';?>>Default</option>
			<option value="hidden" <?php echo ($count=='hidden')?'selected':'';?>>Hidden</option>
			</select>
         </p>
    <?php
    }
 
    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
 $instance['channel'] = ( !empty( $new_instance['channel'] ) ) ? strip_tags( $new_instance['channel'] ) : '';
  $instance['layout'] = ( !empty( $new_instance['layout'] ) ) ? strip_tags( $new_instance['layout'] ) : '';
    $instance['count'] = ( !empty( $new_instance['count'] ) ) ? strip_tags( $new_instance['count'] ) : '';
        return $instance;
    }
 
} // class Foo_Widget
 
?>