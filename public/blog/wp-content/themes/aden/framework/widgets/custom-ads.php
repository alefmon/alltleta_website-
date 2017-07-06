<?php

/**
 * Plugin Name: Social Widget
 */
add_action( 'widgets_init', 'infinity_custom_ads_widget_load' );
function infinity_custom_ads_widget_load() {
    register_widget( 'infinity_custom_ads_widget' );
}

class infinity_custom_ads_widget extends WP_Widget {
 	
 	/**
     * Widget constructor.
     */
    public function __construct() {
        parent::__construct(
            'infinity_custom_ads_widget',
            esc_html__( 'Aden: Custom Ads', 'aden' ),
            array(
                'classname'   => 'infinity_custom_ads_widget',
                'description' => esc_html__( 'Displays ads', 'aden' )
            ),
            array( 
                'width' => 300,
                'id_base' => 'infinity_custom_ads_widget'
            )
        );
    }

   /**
     * Widget output.
     */
    public function widget( $args, $instance ) {
        extract( $args );

        $title 		= esc_attr( $instance['title'] );
        $title 		= apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$img_url	= esc_attr( $instance['img_url'] );
	    $img_link	= esc_attr( $instance['img_link'] );

        echo $before_widget;
        if ( $title )
            echo $before_title . esc_attr( $title ) . $after_title;
		
	    if( !empty( $img_url ) ) { ?>
	    <a href="<?php echo esc_url( $img_link ); ?>" target="_blank">
	    	<img src="<?php echo esc_url( $img_url ); ?>" alt="" />
	    </a>
	    <?php }

	    echo $after_widget;
    }

    /**
     * Saves widget settings.
     */
    public function update( $new_instance, $old_instance ) {
       
        $instance = $old_instance;
        $instance['title']		= esc_attr( $new_instance['title'] );
        $instance['img_url']	= esc_attr( $new_instance['img_url'] );
        $instance['img_link']	= esc_attr( $new_instance['img_link'] );
 
        return $instance;
    }

	/**
     * Prints the settings form.
     */
    public function form( $instance ) {
    // Defaults
    $instance = wp_parse_args(
        $instance,
        array(
            'title'     => esc_html__( 'Custom Ads', 'aden' ),
            'img_url'	=> '',
            'img_link'	=> '#'
        )
    );

    $title    = esc_attr( $instance['title'] );
    $img_url  = esc_attr( $instance['img_url'] );
    $img_link = esc_attr( $instance['img_link'] );
    ?>

    <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'aden' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>
    </p>

	<p>
        <label for="<?php echo esc_attr($this->get_field_id('img_url')); ?>"><?php esc_html_e( 'Image URL:', 'aden' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('img_url')); ?>" name="<?php echo esc_attr($this->get_field_name('img_url')); ?>" type="text" value="<?php echo esc_attr($img_url); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('img_link')); ?>"><?php esc_html_e( 'Image Link:', 'aden' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('img_link')); ?>" name="<?php echo esc_attr($this->get_field_name('img_link')); ?>" type="text" value="<?php echo esc_attr($img_link); ?>" />
    </p>
    <?php
  }
}
