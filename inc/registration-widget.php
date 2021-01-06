<?php
/**
 * Creating Widget For Profil Section 
 * 
 */
class custom_widget_profil extends WP_Widget {
	function __construct() {
		parent::__construct(
			'wapps',
			__('Widget Profil', 'diametheus'),
			array( 'description' => __( 'Widget for display Profil', 'diametheus' ), ) 
		);
	}

	//create widget front-end 
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		$name = apply_filters( 'widget_title', $instance['name'] );
		$image = apply_filters( 'widget_title', $instance['image_uri'] );
		$fb_link = get_field('fb_link', 'options');
		$rm_link = apply_filters( 'widget_title', $instance['rm_link'] );
		echo $args['before widget'];
		// Echo $args['before_title'] . $title . $args['after_title']; ?>
		<div class="author mb-4">
			<div class="author-profile p-4 d-flex flex-column align-items-center">
				<img class="mt-3 mb-4" src="<?php echo $image; ?>">
				<h3 class="mb-2"><?php echo $title; ?></h3>
				<p class="m-0"><?php echo $name; ?></p>
			</div>

			<div class="author-button p-4 d-flex align-items-center justify-content-between border-top">
				<a href="<?php echo $rm_link; ?>" class="button-secondary"><?php echo esc_html('Lees meer', 'diametheus'); ?></a>
				<span><?php echo __('Volg op', 'diametheus'); ?> <a href="<?php echo $fb_link; ?>" target="_blank"><?php echo __('Facebook', 'diametheus'); ?></a></span>
			</div>
		</div>
		<?php 

	}

	//widget Back end
	public function form($instance) {
			$title = isset( $instance[ 'title' ] ) ? esc_attr($instance[ 'title' ]) : '';
			$name = isset( $instance[ 'name' ] ) ? esc_attr($instance[ 'name' ]) : '';
			$rm_link = isset( $instance[ 'rm_link' ] ) ? esc_attr($instance[ 'rm_link' ]) : '';
			$fb_link = isset( $instance[ 'fb_link' ] ) ? esc_attr($instance[ 'fb_link' ]) : '';
			$image = isset( $instance[ 'image_uri' ] ) ? esc_attr($instance[ 'image_uri' ]) : ''; ?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e( 'Name:' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" type="text" value="<?php echo esc_attr( $name ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_name( 'rm_link' ); ?>"><?php _e( 'Lees Meer Link:' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'rm_link' ); ?>" name="<?php echo $this->get_field_name( 'rm_link' ); ?>" type="text" value="<?php echo esc_attr( $rm_link ); ?>" />
			</p>
			<p>
				<label for="<?= $this->get_field_id( 'image_uri' ); ?>">Image</label>
				<img class="<?= $this->id ?>_img" src="<?php echo (!empty($instance['image_uri'])) ? $instance['image_uri'] : ''; ?>" style="margin:0;padding:0;max-width:100%;display:block"/>
				<input type="text" class="widefat <?php echo $this->id ?>_url" name="<?php echo $this->get_field_name( 'image_uri' ); ?>" value="<?= $image; ?>" style="margin-top:5px;" />
				<input type="button" id="<?php echo $this->id ?>" class="button button-primary js_custom_upload_media" value="Upload Image" style="margin-top:5px;" />
			</p>
			<?php 
	}

	//update: replace instance with new 
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['name'] = ( ! empty( $new_instance['name'] ) ) ? strip_tags( $new_instance['name'] ) : '';
		$instance['rm_link'] = ( ! empty( $new_instance['rm_link'] ) ) ? strip_tags( $new_instance['rm_link'] ) : '';
		$instance['fb_link'] = ( ! empty( $new_instance['fb_link'] ) ) ? strip_tags( $new_instance['fb_link'] ) : '';
		$instance['image_uri'] = ( ! empty( $new_instance['image_uri'] ) ) ? strip_tags( $new_instance['image_uri'] ) : '' ;
		return $instance;
	}
}

// Register and load the widget
function wapps_load_widget_profil() {
    register_widget( 'custom_widget_profil' );
}
add_action( 'widgets_init', 'wapps_load_widget_profil' );

/**
 * 
 * Widget For Display Posts
 */
class custom_widget_post extends WP_Widget {
	function __construct() {
		parent::__construct(
			'wapps_post',
			__('Widget Blog Post', 'diametheus'),
			array( 'description' => __( 'Widget for display List of posts', 'diametheus' ), ) 
		);

	}

	//create widget front-end 
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
		}

		$r = new WP_Query(
			/**
			 * Filters the arguments for the Recent Posts widget.
			 * @see WP_Query::get_posts()
			 *
			 * @param array $args     An array of arguments used to retrieve the recent posts.
			 * @param array $instance Array of settings for the current widget.
			 */
				apply_filters(
					'widget_posts_args',
					array(
						'posts_per_page'      => $number,
						'post_status'         => 'publish',
						'ignore_sticky_posts' => true,
					),
					$instance
				)
			);
			if ( ! $r->have_posts() ) {
				return;
			}	
		///////// /
		 ?>
		<div class="blog">
			<div class="col-wrapper p-4">
				<h3 class="m-0"><?php echo $title; ?></h3>
			</div>
				
			<?php 
			foreach ( $r->posts as $popular_post ) : ?>
					<?php 
					global $post;
					$author_id = $post->post_author;
					$post_title   = get_the_title( $popular_post->ID );
					$title        = ( ! empty( $post_title ) ) ? $post_title : __( '(no title)' );
					?>
					<div class="col-wrapper p-4">
						<a href="<?php the_permalink( $popular_post->ID ); ?>"><?php echo $title; ?></a>
						<p class="m-0 mt-3"><?php echo get_the_date( 'j F, Y', $popular_post->ID ) . ' by ' . '<a href="' . get_the_permalink($popular_post->ID) . '"> '. get_the_author_meta( 'nicename', $author_id ) . '</a>'; ?></p>
					</div>
				<?php endforeach; ?>
		</div>
		<?php echo $args['after_widget'];

	}

	//widget Back end
	public function form($instance) {
			$title = isset( $instance[ 'title' ] ) ? esc_attr($instance[ 'title' ]) : '';
			$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5; ?>

			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number:' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
			</p>
			<?php 
	}

	//update: replace instance with new 
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['number']    = (int) $new_instance['number'];

		return $instance;
	}
}

// Register and load the widget
function wapps_load_widget_post() {
    register_widget( 'custom_widget_post' );
}
add_action( 'widgets_init', 'wapps_load_widget_post' );

