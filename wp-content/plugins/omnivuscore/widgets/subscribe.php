<?php 
/**
 * Add MailChimp_Subscribe_Widget widget.
 */
class MailChimp_Subscribe_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     *
     **/
    function __construct() {
        parent::__construct(
			'mailchimp_subscribe', // Base ID
			__('MailChimp Subscriber', 'themecore'), // Name
			array( 'description' => __( 'Description', 'themecore' ), ) // Args
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
		$title              = apply_filters( 'widget_title', $instance['title'] );
		$mailchimp_post_url = $instance['mailchimp_post_url'];
		$placeholder_text   = $instance['placeholder_text'];
		$button_text        = $instance['button_text'];

		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		$random_id = rand(258,369);
		wp_enqueue_script( 'ajaxchimp' );
		?>
		
		<div class="themecore_subscriber_widget">
			<form id="mc-form-<?php echo esc_attr( $random_id ); ?>" class="widget-subscriber-form">
				<label class="subscrier_msg" for="mc-email-<?php echo esc_attr( $random_id ); ?>"></label>
				<div class="subscriber-form-group">
		        	<input class="subscriber-email" type="email" id="mc-email-<?php echo esc_attr( $random_id ); ?>" placeholder="<?php echo esc_attr( $placeholder_text ); ?>">
		        	<button type="submit" class="plus-btn subscriber-btn"><?php echo esc_html( $button_text ); ?><span class="ti-arrow-right"></span></button>
				</div>
			</form>
		</div>
		<script>
			(function($){
				jQuery(document).ready(function(){
				  $("#mc-form-<?php echo esc_attr( $random_id ); ?>").ajaxChimp({
				        url: "http://<?php echo $mailchimp_post_url; ?>",
				        callback: function (resp) {
				            if (resp.result === "success") {
				                jQuery("#mc-form-<?php echo esc_attr( $random_id ); ?>.widget-subscriber-form input, #mc-form-<?php echo esc_attr( $random_id ); ?>.widget-subscriber-form button,#mc-form-<?php echo esc_attr( $random_id ); ?>.widget-subscriber-form .subscriber-form-group").hide();
				            }
				        }
				    });
				});
			})(jQuery);
		</script>
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
			$title = __( 'Get Daily Update', 'themecore' );
		}

		if ( isset( $instance[ 'mailchimp_post_url' ] ) ) {
			$mailchimp_post_url = $instance[ 'mailchimp_post_url' ];
		}else {
			$mailchimp_post_url = "intimissibd.us14.list-manage.com/subscribe/post?u=a77a312486b6e42518623c58a&amp;id=4af1f9af4c";
		}

		if ( isset( $instance[ 'placeholder_text' ] ) ) {
			$placeholder_text = $instance[ 'placeholder_text' ];
		}else {
			$placeholder_text = 'Your&nbsp;Email';
		}

		if ( isset( $instance[ 'button_text' ] ) ) {
			$button_text = $instance[ 'button_text' ];
		}else {
			$button_text = 'Subscribe';
		}

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','themecore' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'mailchimp_post_url' ); ?>"><?php _e( 'Mailchimp Post Url ( without http:// ):','themecore' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'mailchimp_post_url' ); ?>" name="<?php echo $this->get_field_name( 'mailchimp_post_url' ); ?>" type="text" value="<?php echo esc_attr( $mailchimp_post_url ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'placeholder_text' ); ?>"><?php _e( 'Placeholder Text:','themecore' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'placeholder_text' ); ?>" name="<?php echo $this->get_field_name( 'placeholder_text' ); ?>" type="text" value="<?php echo esc_attr( $placeholder_text ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'button_text' ); ?>"><?php _e( 'Button Text:','themecore' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'button_text' ); ?>" name="<?php echo $this->get_field_name( 'button_text' ); ?>" type="text" value="<?php echo esc_attr( $button_text ); ?>">
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
		$instance                       = array();
		$instance['title']              = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['mailchimp_post_url'] = ( ! empty( $new_instance['mailchimp_post_url'] ) ) ? strip_tags( $new_instance['mailchimp_post_url'] ) : '';
		$instance['button_text']        = ( ! empty( $new_instance['button_text'] ) ) ? strip_tags( $new_instance['button_text'] ) : '';
		$instance['placeholder_text']   = ( ! empty( $new_instance['placeholder_text'] ) ) ? strip_tags( $new_instance['placeholder_text'] ) : '';

		return $instance;
	}
}
function themecore_subscribe_widget(){
	register_widget( 'MailChimp_Subscribe_Widget' );
}
add_action( 'widgets_init','themecore_subscribe_widget' );