<?php

/**
 * Adds Book widget.
 */
class Book_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {

		/* Set up the widget options. */
		$widget_options = array(
			'classname'   => 'book_widget',
			'description' => __( 'Display a promo widget for the TUB book', 'tub' )
		);

		/* Create the widget. */
		$this->WP_Widget(
			'book_widget',                         // $this->id_base
			__( 'TUB Book Widget', 'tub' ), // $this->name
			$widget_options
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

		$html = '';

		$html .= '<div class="book_widget--image"><a href="' . get_option("tub_book_url_link") . '" target="_blank"><img src="' . get_bloginfo("stylesheet_directory") . '/images/cover.jpg"></a></div>';

		$html .= '<p class="book_widget--text">' . $instance['text'] .'</p>';

		$html .= '<a class="book_widget--link" href="' . get_option("tub_book_url_link") . '" target="_blank">' . $instance['link'] .'</a>';



		echo $before_widget;

		echo $before_title . apply_filters( 'widget_title',  $instance['title'], $instance, $this->id_base ) . $after_title;

		echo $html;

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
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'How to Give Birth Unassisted', 'tub' );

		$text = ! empty( $instance['text'] ) ? $instance['text'] : __( 'Childbirth is natural. Women’s bodies are designed to handle pregnancy and childbirth without requiring medical assistance. This book is a valuable resource for anyone planning to give birth unassisted. This book gives you the information you need.', 'tub' );

		$link = ! empty( $instance['link'] ) ? $instance['link'] : __( 'GET YOUR COPY TODAY', 'tub' );
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Description:' ); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" rows="5"><?php echo esc_attr( $text ); ?></textarea>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e( 'Link Text:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>">
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
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['text'] = ( ! empty( $new_instance['text'] ) ) ? strip_tags( $new_instance['text'] ) : '';
		$instance['link'] = ( ! empty( $new_instance['link'] ) ) ? strip_tags( $new_instance['link'] ) : '';

		return $instance;
	}

}

// register article menu widget
function register_book_widget() {
    register_widget( 'Book_Widget' );
}
add_action( 'widgets_init', 'register_book_widget' );