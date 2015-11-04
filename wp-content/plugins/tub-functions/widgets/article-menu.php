<?php

/**
 * Adds Article Menu widget.
 */
class Article_Menu extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'article_menu_widget', // Base ID
			__( 'Article Menu', 'text_domain' ), // Name
			array( 'description' => __( 'Displays a tiered menu of all Articles', 'text_domain' ), ) // Args
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
		echo $args['before_widget'];
		?>

			<nav id="nav" class="site_nav">

				<?php $args = array(
				    'depth'       => 0,
					'sort_column' => 'menu_order, post_title',
					'menu_class'  => 'menu',
					'include'     => '',
					'exclude'     => '',
					'echo'        => true,
					'show_home'   => false,
					'post_type'    => 'article',
					'link_before' => '',
					'link_after'  => '' );
				?>

				<?php wp_page_menu( $args ); ?>


			</nav>

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
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
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

		return $instance;
	}

}

// register article menu widget
function register_article_menu() {
    register_widget( 'Article_Menu' );
}
add_action( 'widgets_init', 'register_article_menu' );