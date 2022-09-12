<?php

// Adds widget: News Tricker
class Newstricker_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'newstricker_widget',
			esc_html__( 'News Tricker', 'themecore' ),
			array( 'description' => esc_html__( 'Use this widget for ticker post', 'themecore' ), ) // Args
		);
	}

	private $widget_fields = array(
		array(
			'label' => 'Total Post',
			'id' => 'totalpost',
			'default' => '5',
			'type' => 'number',
		),
		array(
			'label' => 'Visible In Slide',
			'id' => 'visible',
			'default' => '3',
			'type' => 'number',
		),
		array(
			'label' => 'Direction',
			'id' => 'direction',
			'default' => 'up',
			'type' => 'text',
		),
		array(
			'label' => 'Easing',
			'id' => 'easing',
			'default' => 'swing',
			'type' => 'text',
		),
		array(
			'label' => 'Speed',
			'id' => 'speed',
			'default' => 'slow',
			'type' => 'text',
		),
		array(
			'label' => 'Interval Time',
			'id' => 'interval',
			'default' => '2000',
			'type' => 'text',
		),
		array(
			'label' => 'Pause On Hover',
			'id' => 'pausehover',
			'default' => '0',
			'type' => 'checkbox',
		),
	);

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		// Output generated fields
		echo '<p>'.$instance['totalpost'].'</p>';
		echo '<p>'.$instance['visible'].'</p>';
		echo '<p>'.$instance['direction'].'</p>';
		echo '<p>'.$instance['easing'].'</p>';
		echo '<p>'.$instance['speed'].'</p>';
		echo '<p>'.$instance['interval'].'</p>';
		echo '<p>'.$instance['pausehover'].'</p>';
		
		echo $args['after_widget'];
	}

	public function field_generator( $instance ) {
		$output = '';
		foreach ( $this->widget_fields as $widget_field ) {
			$default = '';
			if ( isset($widget_field['default']) ) {
				$default = $widget_field['default'];
			}
			$widget_value = ! empty( $instance[$widget_field['id']] ) ? $instance[$widget_field['id']] : esc_html__( $default, 'themecore' );
			switch ( $widget_field['type'] ) {
				case 'checkbox':
					$output .= '<p>';
					$output .= '<input class="checkbox" type="checkbox" '.checked( $widget_value, true, false ).' id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" value="1">';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'themecore' ).'</label>';
					$output .= '</p>';
					break;
				default:
					$output .= '<p>';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'themecore' ).':</label> ';
					$output .= '<input class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.esc_attr( $widget_value ).'">';
					$output .= '</p>';
			}
		}
		echo $output;
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'themecore' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'themecore' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
		$this->field_generator( $instance );
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		foreach ( $this->widget_fields as $widget_field ) {
			switch ( $widget_field['type'] ) {
				default:
					$instance[$widget_field['id']] = ( ! empty( $new_instance[$widget_field['id']] ) ) ? strip_tags( $new_instance[$widget_field['id']] ) : '';
			}
		}
		return $instance;
	}
}

function paseo_newstricker_widget() {
	register_widget( 'Newstricker_Widget' );
}
add_action( 'widgets_init', 'paseo_newstricker_widget' );