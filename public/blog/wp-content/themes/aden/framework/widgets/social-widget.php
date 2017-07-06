<?php

/**
 * Plugin Name: Social Widget
 */
add_action( 'widgets_init', 'infinity_social_widget_load' );
function infinity_social_widget_load() {
    register_widget( 'infinity_social_widget' );
}

class infinity_social_widget extends WP_Widget {

    /**
     * Widget constructor.
     */
    public function __construct() {
        parent::__construct(
            'infinity_social_widget',
            esc_html__( 'Aden: Social Icons', 'aden' ),
            array(
                'classname'   => 'infinity_social_widget',
                'description' => esc_html__( 'A widget that displays your social icons', 'aden' )
            ),
            array( 
                'width' => 300,
                'id_base' => 'infinity_social_widget'
            )
        );

        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        add_action( 'admin_footer-widgets.php', array( $this, 'print_scripts' ), 9999 );
    }

    /**
     * Enqueue scripts.
     */
    public function enqueue_scripts( $hook ) {
        if ( 'widgets.php' !== $hook ) {
            return;
        }

        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'wp-color-picker' );
        wp_enqueue_script( 'underscore' );
    }

    /**
     * Print scripts.
     */
    public function print_scripts() {
        ?>
        <script>
            ( function( $ ){
                function initColorPicker( widget ) {
                    widget.find( '.color-picker' ).wpColorPicker( {
                        change: _.throttle( function() { // For Customizer
                            $(this).trigger( 'change' );
                        }, 3000 )
                    });
                }

                function onFormUpdate( event, widget ) {
                    initColorPicker( widget );
                }

                $( document ).on( 'widget-added widget-updated', onFormUpdate );

                $( document ).ready( function() {
                    $( '#widgets-right .widget:has(.color-picker)' ).each( function () {
                        initColorPicker( $( this ) );
                    } );
                } );
            }( jQuery ) );
        </script>
        <?php
    }

    /**
     * Widget output.
     */
    public function widget( $args, $instance ) {
        extract( $args );

        // Title
        $title = esc_attr( $instance['title'] );
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        // Colors & Url
        $color          = esc_attr( $instance['color'] );
        $background     = esc_attr( $instance['background'] );
        $color_hv       = esc_attr( $instance['color_hv']  );
        $background_hv  = esc_attr( $instance['background_hv'] );
        $border         = esc_attr( $instance['border'] );
        $facebook       = esc_attr( $instance['facebook'] );
        $twitter        = esc_attr( $instance['twitter'] );
        $instagram      = esc_attr( $instance['instagram'] );
        $pinterest      = esc_attr( $instance['pinterest'] );
        $bloglovin      = esc_attr( $instance['bloglovin'] );
        $google_plus    = esc_attr( $instance['google_plus'] );
        $tumblr         = esc_attr( $instance['tumblr'] );
        $youtube        = esc_attr( $instance['youtube'] );
        $vine           = esc_attr( $instance['vine'] );
        $flickr         = esc_attr( $instance['flickr'] );
        $linkedin       = esc_attr( $instance['linkedin'] );
        $behance        = esc_attr( $instance['behance'] );
        $soundcloud     = esc_attr( $instance['soundcloud'] );
        $vimeo          = esc_attr( $instance['vimeo'] );
        $rss            = esc_attr( $instance['rss'] );
        $dribbble       = esc_attr( $instance['dribbble'] );
        $envelope       = esc_attr( $instance['envelope'] );
        $widget_id      = $args['widget_id'];

        echo $before_widget;
        if ( $title )
            echo $before_title . esc_attr( $title ) . $after_title;
       ?>
        <div class="social-icons">
          <?php if(!empty($facebook)): ?>
            <a href="<?php echo esc_url($facebook); ?>">
                <i class="fa fa-facebook"></i>
            </a>
          <?php endif; ?>

          <?php if(!empty($twitter)): ?>
            <a href="<?php echo esc_url($twitter); ?>">
                <i class="fa fa-twitter"></i>
            </a>
          <?php endif; ?>

          <?php if(!empty($instagram)): ?>
            <a href="<?php echo esc_url($instagram); ?>">
                <i class="fa fa-instagram"></i>
            </a>
          <?php endif; ?>

          <?php if(!empty($pinterest)): ?>
            <a href="<?php echo esc_url($pinterest); ?>">
                <i class="fa fa-pinterest"></i>
            </a>
          <?php endif; ?>

          <?php if(!empty($bloglovin)): ?>
            <a href="<?php echo esc_url($bloglovin); ?>">
                <i class="fa fa-heart"></i>
            </a>
          <?php endif; ?>

          <?php if(!empty($google_plus)): ?>
            <a href="<?php echo esc_url($google_plus); ?>">
                <i class="fa fa-google-plus"></i>
            </a>
          <?php endif; ?>

          <?php if(!empty($tumblr)): ?>
            <a href="<?php echo esc_url($tumblr); ?>">
                <i class="fa fa-tumblr"></i>
            </a>
          <?php endif; ?>

          <?php if(!empty($youtube)): ?>
            <a href="<?php echo esc_url($youtube); ?>">
                <i class="fa fa-youtube-play"></i>
            </a>
          <?php endif; ?>

          <?php if(!empty($vine)): ?>
            <a href="<?php echo esc_url($vine); ?>">
                <i class="fa fa-vine"></i>
            </a>
          <?php endif; ?>

          <?php if(!empty($flickr)): ?>
            <a href="<?php echo esc_url($flickr); ?>">
                <i class="fa fa-flickr"></i>
            </a>
          <?php endif; ?>

          <?php if(!empty($linkedin)): ?>
            <a href="<?php echo esc_url($linkedin); ?>">
                <i class="fa fa-linkedin"></i>
            </a>
          <?php endif; ?>

          <?php if(!empty($behance)): ?>
            <a href="<?php echo esc_url($behance); ?>">
                <i class="fa fa-behance"></i>
            </a>
          <?php endif; ?>

          <?php if(!empty($soundcloud)): ?>
            <a href="<?php echo esc_url($soundcloud); ?>">
                <i class="fa fa-soundcloud"></i></a>
          <?php endif; ?>

          <?php if(!empty($vimeo)): ?>
            <a href="<?php echo esc_url($vimeo); ?>">
                <i class="fa fa-vimeo"></i>
            </a>
          <?php endif; ?>

          <?php if(!empty($rss)): ?>
            <a href="<?php echo esc_url($rss); ?>">
                <i class="fa fa-rss"></i>
            </a>
          <?php endif; ?>

          <?php if(!empty($dribbble)): ?>
            <a href="<?php echo esc_url($dribbble); ?>">
                <i class="fa fa-dribbble"></i>
            </a>
          <?php endif; ?>

          <?php if(!empty($envelope)): ?>
            <a href="<?php echo esc_url($envelope); ?>">
                <i class="fa fa-envelope-o"></i>
            </a>
          <?php endif; ?>

        </div>
        <style>
           <?php
            echo  '#'.$widget_id.' .social-icons a {
                    color: '. esc_attr($color) .';
                    background: '. esc_attr($background) .';
                    border-color: '. esc_attr($border) .';
                }
    
                #'.$widget_id.' .social-icons a:hover {
                    color: '. esc_attr($color_hv) .';
                    background: '. esc_attr($background_hv) .';
                    border-color: '. esc_attr($background_hv) .';
                }';
           ?>
        </style>
        <?php
        echo $after_widget;
    }

    /**
     * Saves widget settings.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance[ 'title' ]            = esc_attr( $new_instance['title'] );
        $instance[ 'color' ]            = esc_attr( infinity_sanitize_hex_color( $new_instance['color'] ) );
        $instance[ 'background' ]       = esc_attr( infinity_sanitize_hex_color( $new_instance['background'] ) );
        $instance[ 'color_hv' ]         = esc_attr( infinity_sanitize_hex_color( $new_instance['color_hv'] ) );
        $instance[ 'background_hv' ]    = esc_attr( infinity_sanitize_hex_color( $new_instance['background_hv'] ) );
        $instance[ 'border' ]           = esc_attr( infinity_sanitize_hex_color( $new_instance['border'] ) );
        $instance['facebook']           = esc_attr( $new_instance['facebook'] );
        $instance['twitter']            = esc_attr( $new_instance['twitter'] );
        $instance['instagram']          = esc_attr( $new_instance['instagram'] );
        $instance['pinterest']          = esc_attr( $new_instance['pinterest'] );
        $instance['bloglovin']          = esc_attr( $new_instance['bloglovin'] );
        $instance['google_plus']        = esc_attr( $new_instance['google_plus'] );
        $instance['tumblr']             = esc_attr( $new_instance['tumblr'] );
        $instance['youtube']            = esc_attr( $new_instance['youtube'] );
        $instance['vine']               = esc_attr( $new_instance['vine'] );
        $instance['flickr']             = esc_attr( $new_instance['flickr'] );
        $instance['linkedin']           = esc_attr( $new_instance['linkedin'] );
        $instance['behance']            = esc_attr( $new_instance['behance'] );
        $instance['soundcloud']         = esc_attr( $new_instance['soundcloud'] );
        $instance['vimeo']              = esc_attr( $new_instance['vimeo'] );
        $instance['rss']                = esc_attr( $new_instance['rss'] );
        $instance['dribbble']           = esc_attr( $new_instance['dribbble'] );
        $instance['envelope']           = esc_attr( $new_instance['envelope'] );
 
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
                'title'         => '',
                'color'         => '#ffffff',
                'background'    => '#222222',
                'color_hv'      => '#ffffff',
                'background_hv' => '#c7a770',
                'border'        => '#222222',
                'facebook'      => '#',
                'twitter'       => '#',
                'instagram'     => '#',
                'pinterest'     => '',
                'bloglovin'     => '',
                'google_plus'   => '',
                'tumblr'        => '',
                'youtube'       => '',
                'vine'          => '#',
                'flickr'        => '',
                'linkedin'      => '#',
                'behance'       => '',
                'soundcloud'    => '',
                'vimeo'         => '',
                'rss'           => '',
                'dribbble'      => '',
                'envelope'      => '',
            )
        );

        $title          = esc_attr ( $instance[ 'title' ] );
        $color          = esc_attr ( $instance[ 'color' ] );
        $background     = esc_attr ( $instance[ 'background' ] );
        $color_hv       = esc_attr ( $instance[ 'color_hv' ] );
        $background_hv  = esc_attr ( $instance[ 'background_hv' ] );
        $border         = esc_attr ( $instance[ 'border' ] );
        $facebook       = esc_attr ( $instance['facebook'] );
        $twitter        = esc_attr ( $instance['twitter'] );
        $instagram      = esc_attr ( $instance['instagram'] );
        $pinterest      = esc_attr ( $instance['pinterest'] );
        $bloglovin      = esc_attr ( $instance['bloglovin'] );
        $google_plus    = esc_attr ( $instance['google_plus'] );
        $tumblr         = esc_attr ( $instance['tumblr'] );
        $youtube        = esc_attr ( $instance['youtube'] );
        $vine           = esc_attr ( $instance['vine'] );
        $flickr         = esc_attr ( $instance['flickr'] );
        $linkedin       = esc_attr ( $instance['linkedin'] );
        $behance        = esc_attr ( $instance['behance'] );
        $soundcloud     = esc_attr ( $instance['soundcloud'] );
        $vimeo          = esc_attr ( $instance['vimeo'] );
        $rss            = esc_attr ( $instance['rss'] );
        $dribbble       = esc_attr ( $instance['dribbble'] );
        $envelope       = esc_attr ( $instance['envelope'] );
        ?>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'aden' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'color' ) ); ?>"><?php esc_html_e( 'Text:', 'aden' ); ?></label><br>
            <input type="text" name="<?php echo esc_attr( $this->get_field_name( 'color' ) ); ?>" class="color-picker" id="<?php echo esc_attr( $this->get_field_id( 'color' ) ); ?>" value="<?php echo esc_attr( $color ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'background' ) ); ?>"><?php esc_html_e( 'Backgorund:', 'aden' ); ?></label><br>
            <input type="text" name="<?php echo esc_attr( $this->get_field_name( 'background' ) ); ?>" class="color-picker" id="<?php echo esc_attr( $this->get_field_id( 'background' ) ); ?>" value="<?php echo esc_attr( $background ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'color_hv' ) ); ?>"><?php esc_html_e( 'Text Hover:', 'aden' ); ?></label><br>
            <input type="text" name="<?php echo esc_attr( $this->get_field_name( 'color_hv' ) ); ?>" class="color-picker" id="<?php echo esc_attr( $this->get_field_id( 'color_hv' ) ); ?>" value="<?php echo esc_attr( $color_hv ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'background_hv' ) ); ?>"><?php esc_html_e( 'Backgorund Hover:', 'aden' ); ?></label><br>
            <input type="text" name="<?php echo esc_attr( $this->get_field_name( 'background_hv' ) ); ?>" class="color-picker" id="<?php echo esc_attr( $this->get_field_id( 'background_hv' ) ); ?>" value="<?php echo esc_attr( $background_hv ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'border' ) ); ?>"><?php esc_html_e( 'Border:', 'aden' ); ?></label><br>
            <input type="text" name="<?php echo esc_attr( $this->get_field_name( 'border' ) ); ?>" class="color-picker" id="<?php echo esc_attr( $this->get_field_id( 'border' ) ); ?>" value="<?php echo esc_attr( $border ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('facebook') ); ?>"><?php esc_html_e( 'Facebook:', 'aden' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('facebook') ); ?>" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" type="text" value="<?php echo esc_attr($facebook); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('twitter')); ?>"><?php esc_html_e( 'Twitter:', 'aden' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('twitter')); ?>" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>" type="text" value="<?php echo esc_attr($twitter); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('instagram')); ?>"><?php esc_html_e( 'Instagram:', 'aden' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('instagram')); ?>" name="<?php echo esc_attr($this->get_field_name('instagram')); ?>" type="text" value="<?php echo esc_attr($instagram); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('pinterest')); ?>"><?php esc_html_e( 'Pinterest:', 'aden' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('pinterest')); ?>" name="<?php echo esc_attr($this->get_field_name('pinterest')); ?>" type="text" value="<?php echo esc_attr($pinterest); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('bloglovin')); ?>"><?php esc_html_e( 'Bloglovin:', 'aden' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('bloglovin')); ?>" name="<?php echo esc_attr($this->get_field_name('bloglovin')); ?>" type="text" value="<?php echo esc_attr($bloglovin); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('google_plus')); ?>"><?php esc_html_e( 'Google Plus:', 'aden' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('google_plus')); ?>" name="<?php echo esc_attr($this->get_field_name('google_plus')); ?>" type="text" value="<?php echo esc_attr($google_plus); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('tumblr')); ?>"><?php esc_html_e( 'Tumblr:', 'aden' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('tumblr')); ?>" name="<?php echo esc_attr($this->get_field_name('tumblr')); ?>" type="text" value="<?php echo esc_attr($tumblr); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('youtube')); ?>"><?php esc_html_e( 'Youtube:', 'aden' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('youtube')); ?>" name="<?php echo esc_attr($this->get_field_name('youtube')); ?>" type="text" value="<?php echo esc_attr($youtube); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('vine')); ?>"><?php esc_html_e( 'Vine:', 'aden' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('vine')); ?>" name="<?php echo esc_attr($this->get_field_name('vine')); ?>" type="text" value="<?php echo esc_attr($vine); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('flickr')); ?>"><?php esc_html_e( 'Flickr:', 'aden' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('flickr')); ?>" name="<?php echo esc_attr($this->get_field_name('flickr')); ?>" type="text" value="<?php echo esc_attr($flickr); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('linkedin')); ?>"><?php esc_html_e( 'Linkedin:', 'aden' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('linkedin')); ?>" name="<?php echo esc_attr($this->get_field_name('linkedin')); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('behance')); ?>"><?php esc_html_e( 'Behance:', 'aden' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('behance')); ?>" name="<?php echo esc_attr($this->get_field_name('behance')); ?>" type="text" value="<?php echo esc_attr($behance); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('soundcloud')); ?>"><?php esc_html_e( 'Soundcloud:', 'aden' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('soundcloud')); ?>" name="<?php echo esc_attr($this->get_field_name('soundcloud')); ?>" type="text" value="<?php echo esc_attr($soundcloud); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('vimeo')); ?>"><?php esc_html_e( 'Vimeo:', 'aden' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('vimeo')); ?>" name="<?php echo esc_attr($this->get_field_name('vimeo')); ?>" type="text" value="<?php echo esc_attr($vimeo); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('rss')); ?>"><?php esc_html_e( 'Rss:', 'aden' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('rss')); ?>" name="<?php echo esc_attr($this->get_field_name('rss')); ?>" type="text" value="<?php echo esc_attr($rss); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('dribbble')); ?>"><?php esc_html_e( 'Dribbble:', 'aden' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('dribbble')); ?>" name="<?php echo esc_attr($this->get_field_name('dribbble')); ?>" type="text" value="<?php echo esc_attr($dribbble); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('envelope')); ?>"><?php esc_html_e( 'Envelope:', 'aden' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('envelope')); ?>" name="<?php echo esc_attr($this->get_field_name('envelope')); ?>" type="text" value="<?php echo esc_attr($envelope); ?>" />
        </p>

        <?php
    }
}


/**
 * Sanitize Hex Values
 */
function infinity_sanitize_hex_color( $color ) {
    if ( '' === $color )
        return '';

    if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
        return $color;

    return null;
}

