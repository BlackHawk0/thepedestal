<?php
/**
 * Add Widget_Recent_With_Thumb widget.
 */
class Widget_Recent_With_Thumb extends WP_Widget {

    /**
     * Register widget with WordPress.
     *
     **/
    function __construct() {
        parent::__construct(
			'post_with_thumb', // Base ID
			__('Recent Post With Thumbnail', 'themecore'), // Name
			array( 'description' => __( 'Show recent post with thumnail feed to adding this widget.', 'themecore' ), ) // Args
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

		$title        = apply_filters( 'widget_title', $instance['title'] );
		$total_post   = $instance['total_post'];
		$display_date = $instance[ 'display_date' ];

		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		?>
		<ul>
		<?php
		$query_args = array(
			'post_type'           => 'post',
			'posts_per_page'      => $total_post,
			'ignore_sticky_posts' => 1,
		);		
		$posts = new WP_Query( $query_args );
		while ( $posts->have_posts() ) : $posts->the_post(); ?>
			<li>
				<?php the_post_thumbnail( 'thumbnail'); ?>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				<?php if( $display_date == "on" ): ?>
				<span class="post-date"><i class="ti ti-calendar"></i> <?php echo get_the_date(); ?></span>
				<?php endif; ?>
			</li>
		<?php endwhile; ?>
		</ul>
		<?php
		echo $args['after_widget'];
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
		}else {
			$title = __( 'Lastest Posts', 'themecore' );
		}

		if ( isset( $instance[ 'total_post' ] ) ) {
			$total_post = $instance[ 'total_post' ];
		}else {
			$total_post = '5';
		}

		if ( isset( $instance[ 'display_date' ] ) ) {
			$display_date = $instance[ 'display_date' ];
		}else {
			$display_date = 'off';
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','themecore' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('total_post'); ?>"><?php _e( 'Number of posts to show:', 'themecore' ); ?></label>
			<input class="tiny-text" id="<?php echo $this->get_field_id('total_post'); ?>" name="<?php echo $this->get_field_name('total_post'); ?>" type="number" min="1" step="1" size="3" value="<?php echo esc_attr( $total_post ) ?>">
		</p>
		<p>
			<input class="checkbox" type="checkbox" id="<?php echo $this->get_field_id( 'display_date' ); ?>" name="<?php echo $this->get_field_name('display_date'); ?>"
				<?php if (!empty($instance['display_date'])) { echo "checked='checked'";} ?>
			>
			<label for="<?php echo $this->get_field_id( 'display_date' ); ?>"><?php _e( 'Display post date?', 'themecore' ); ?></label>
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
		$instance['title']        = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['total_post']   = ( ! empty( $new_instance['total_post'] ) ) ? strip_tags( $new_instance['total_post'] ) : '';
		$instance['display_date'] = ( ! empty( $new_instance['display_date'] ) ) ? strip_tags( $new_instance['display_date'] ) : '';

		return $instance;
	}
}
function themecore_recent_with_thumb(){
	register_widget( 'Widget_Recent_With_Thumb' );
}
add_action( 'widgets_init', 'themecore_recent_with_thumb' );