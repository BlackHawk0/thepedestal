<?php
/**
 * Add About_Administrator_Widget widget.
 */
class About_Administrator_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     *
     **/
    function __construct() {
        parent::__construct(
			'about', // Base ID
			__('About', 'themecore'), // Name
			array( 'description' => __( 'Add your socail links to adding this widgets.', 'themecore' ), ) // Args
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
		$author_image       = $instance['author_image'];
		$author_name        = $instance['author_name'];
		$author_description = $instance['author_description'];
		$facebook_url       = $instance['facebook_url'];
		$twitter_url        = $instance['twitter_url'];
		$youtube_url    	= $instance['youtube_url'];
		$linkedin_url       = $instance['linkedin_url'];
		$instagram_url      = $instance['instagram_url'];

		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		?>
		<div class="about-details">
			<?php if( !empty($author_image) ) : ?>
				<img src="<?php echo $author_image; ?>" alt="">
			<?php endif; ?>
			
			<?php if( !empty($author_name) ) : ?>
				<h4><?php echo $author_name; ?></h4>
			<?php endif; ?>

			<?php if( !empty($author_description) ) : ?>
				<?php echo wpautop( $author_description); ?>
			<?php endif; ?>

			<?php if( !empty( $title || $facebook_url || $twitter_url || $youtube_url || $linkedin_url || $instagram_url ) ): ?>
			<ul class="social-bookmark">
				<?php if( !empty( $facebook_url ) ): ?>
				<li><a class="facebook" href="<?php echo esc_url( $facebook_url ); ?>"><i class="ti ti-facebook"></i></a></li>
				<?php endif; ?>
				<?php if( !empty( $twitter_url ) ): ?>
				<li><a class="twitter" href="<?php echo esc_url( $twitter_url ); ?>"><i class="ti ti-twitter"></i></a></li>
				<?php endif; ?>
				<?php if( !empty( $youtube_url ) ): ?>
				<li><a class="youtube" href="<?php echo esc_url( $youtube_url ); ?>"><i class="ti ti-youtube"></i></a></li>
				<?php endif; ?>
				<?php if( !empty( $linkedin_url ) ): ?>
				<li><a class="linkedin" href="<?php echo esc_url( $linkedin_url ); ?>"><i class="ti ti-linkedin"></i></a></li>
				<?php endif; ?>
				<?php if( !empty( $instagram_url ) ): ?>
				<li><a class="instagram" href="<?php echo esc_url( $instagram_url ); ?>"><i class="ti ti-instagram"></i></a></li>
				<?php endif; ?>
			</ul>
			<?php endif; ?>
		</div>
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
			$title = __( 'About Me', 'themecore' );
		}
		
		if ( isset($instance['author_image']) ) {
			$author_image = $instance['author_image'];
		}else{
			$author_image = '';
		}
		
		if ( isset($instance['author_name']) ) {
			$author_name = $instance['author_name'];
		}else{
			$author_name = 'Ashraful sarkar';
		}
		
		if ( isset($instance['author_description']) ) {
			$author_description = $instance['author_description'];
		}else{
			$author_description = 'Hi, My name is Ashraful Sarkar Naiem, I am a web developer.';
		}
		
		if ( isset($instance['facebook_url']) ) {
			$facebook_url = $instance['facebook_url'];
		}else{
			$facebook_url = 'facebook.com';
		}

		if ( isset($instance['twitter_url']) ) {
			$twitter_url = $instance['twitter_url'];
		}else{
			$twitter_url = 'twitter.com';
		}

		if ( isset($instance['youtube_url']) ) {
			$youtube_url = $instance['youtube_url'];
		}else{
			$youtube_url = 'youtube.com';
		}

		if ( isset($instance['linkedin_url']) ) {
			$linkedin_url = $instance['linkedin_url'];
		}else{
			$linkedin_url = 'linkedin.com';
		}

		if ( isset($instance['instagram_url']) ) {
			$instagram_url = $instance['instagram_url'];
		}else{
			$instagram_url = 'instagram.com';
		}

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','themecore' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
			<br>
		</p>
		<p>
            <label for="<?php echo $this->get_field_id( 'author_image' ); ?>"><?php _e('Author image:','themecore');?></label>
            <p class='imgpreview'>
				<?php if(!empty($instance['author_image'])) : ?>
				<img src="<?php echo $instance['author_image'] ?>">
				<?php endif; ?>
			</p>
            <input class='imgph' type="hidden" name="<?php echo $this->get_field_name('author_image'); ?>" id="<?php echo $this->get_field_id( 'author_image' ); ?>" value="">
            <input class="button btn-primary widgetuploader" type="button" value="<?php _e('Upload Image','themecore');?>">
        </p>
		<p>
			<label for="<?php echo $this->get_field_id( 'author_name' ); ?>"><?php _e( 'Author Name:','themecore' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'author_name' ); ?>" name="<?php echo $this->get_field_name( 'author_name' ); ?>" type="text" value="<?php echo esc_attr( $author_name ); ?>">
			<br>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'author_description' ); ?>"><?php _e( 'Author Description:','themecore' ); ?></label> 
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'author_description' ); ?>" name="<?php echo $this->get_field_name( 'author_description' ); ?>" cols="30" rows="4"><?php echo esc_attr( $author_description ); ?></textarea>
			<br>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'facebook_url' ); ?>"><?php _e( 'Facebook Url:','themecore' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'facebook_url' ); ?>" name="<?php echo $this->get_field_name( 'facebook_url' ); ?>" type="text" value="<?php echo esc_attr( $facebook_url ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'twitter_url' ); ?>"><?php _e( 'Twitter Url:','themecore' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'twitter_url' ); ?>" name="<?php echo $this->get_field_name( 'twitter_url' ); ?>" type="text" value="<?php echo esc_attr( $twitter_url ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'youtube_url' ); ?>"><?php _e( 'Youtube Url:','themecore' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'youtube_url' ); ?>" name="<?php echo $this->get_field_name( 'youtube_url' ); ?>" type="text" value="<?php echo esc_attr( $youtube_url ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'linkedin_url' ); ?>"><?php _e( 'Pinterest Url:','themecore' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'linkedin_url' ); ?>" name="<?php echo $this->get_field_name( 'linkedin_url' ); ?>" type="text" value="<?php echo esc_attr( $linkedin_url ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'instagram_url' ); ?>"><?php _e( 'Instagram Url:','themecore' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'instagram_url' ); ?>" name="<?php echo $this->get_field_name( 'instagram_url' ); ?>" type="text" value="<?php echo esc_attr( $instagram_url ); ?>">
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
		$instance['author_image']       = ( ! empty( $new_instance['author_image'] ) ) ? strip_tags( $new_instance['author_image'] ) : '';
		$instance['author_name']        = ( ! empty( $new_instance['author_name'] ) ) ? strip_tags( $new_instance['author_name'] ) : '';
		$instance['author_description'] = ( ! empty( $new_instance['author_description'] ) ) ? strip_tags( $new_instance['author_description'] ) : '';
		$instance['facebook_url']       = ( ! empty( $new_instance['facebook_url'] ) ) ? strip_tags( $new_instance['facebook_url'] ) : '';
		$instance['twitter_url']        = ( ! empty( $new_instance['twitter_url'] ) ) ? strip_tags( $new_instance['twitter_url'] ) : '';
		$instance['linkedin_url']       = ( ! empty( $new_instance['linkedin_url'] ) ) ? strip_tags( $new_instance['linkedin_url'] ) : '';
		$instance['instagram_url']      = ( ! empty( $new_instance['instagram_url'] ) ) ? strip_tags( $new_instance['instagram_url'] ) : '';
		$instance['youtube_url']    = ( ! empty( $new_instance['youtube_url'] ) ) ? strip_tags( $new_instance['youtube_url'] ) : '';

		return $instance;
	}
}

function themecore_about_administrator(){
	register_widget( 'About_Administrator_Widget' );
}
add_action( 'widgets_init', 'themecore_about_administrator' );