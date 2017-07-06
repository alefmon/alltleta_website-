<?php

// Meta Box Style
function adenit_admin_styles(){
    global $typenow;
    if( $typenow == 'post' || $typenow == 'page' ) {
        wp_enqueue_style( 'adenit_meta_box_styles',  ADENIT_THEMEROOT . '/framework/metaboxes/css/admin.css' );
    }
}
add_action( 'admin_print_styles', 'adenit_admin_styles' );

// Metaboxs Script
function adenit_admin_scripts() {
    wp_enqueue_media();
    wp_enqueue_script( 'page_header_image', ADENIT_THEMEROOT. '/framework/metaboxes/js/adenit-metaboxs.js', array('jquery', 'media-upload'), '0.0.2', true );
}
add_action( 'admin_enqueue_scripts', 'adenit_admin_scripts' );

$adenit_metaboxes = array(
    
    // Post Options
    'adenit-post-metabox' => array(
        'title'             => esc_html__('Post Options', 'aden'),
        'applicableto'      => 'post',
        'location'          => 'normal',
        'display_condition' => '',
        'priority'          => 'high',
        'fields'            => array(
            'carousel-meta-checkbox'    => array(
                'title'         => esc_html__('&nbsp;Show Post in Carousel', 'aden'),
                'type'          => 'checkbox',
                'description'   => '',
                'class'         => ''
            ),
            'post-fullwidth-checkbox'  => array(
                'title'         => esc_html__('&nbsp;Full Width Post', 'aden'),
                'type'          => 'checkbox',
                'description'   => '',
                'class'         => ''
            ),
            'disable-sidebar-checkbox' => array(
                'title'         => esc_html__('&nbsp;Hide Sidebar on Single Page', 'aden'),
                'type'          => 'checkbox',
                'description'   => '',
                'class'         => ''
            ),
            'disable-feature-img-checkbox' => array(
                'title'         => esc_html__('&nbsp;Hide Feature Image on Single Page', 'aden'),
                'type'          => 'checkbox',
                'description'   => '',
                'class'         => ''
            ),
            'page-logo'      => array(
                'title'         => esc_html__('&nbsp;Hide Logo on Single Page', 'aden'),
                'type'          => 'checkbox',
                'description'   => '',
                'class'         => ''
            )
        )
    ),
    // Page Options
    'adenit-page-metabox' => array(
        'title'             => esc_html__('Page Options', 'aden'),
        'applicableto'      => 'page',
        'location'          => 'normal',
        'display_condition' => '',
        'priority'          => 'high',
        'fields'            => array(
            'page-carousel'    => array(
                'title'         => esc_html__('&nbsp;Show Page in Carousel', 'aden'),
                'type'          => 'checkbox',
                'description'   => '',
                'class'         => ''
            ),
            'page-feature-img'    => array(
                'title'         => esc_html__('&nbsp;Hide Feature Image on Single Page', 'aden'),
                'type'          => 'checkbox',
                'description'   => '',
                'class'         => ''
            ),
            'page-logo'      => array(
                'title'         => esc_html__('&nbsp;Hide Logo on Single Page', 'aden'),
                'type'          => 'checkbox',
                'description'   => '',
                'class'         => ''
            )
        )
    ),
    // Link metaboxes
    'adenit-link' => array(
        'title'             => esc_html__('Link Format', 'aden'),
        'applicableto'      => 'post',
        'location'          => 'normal',
        'display_condition' => 'post-format-link',
        'priority'          => 'core',
        'fields'            => array(
        
            'link'          => array(
                'title'         => esc_html__('Link Description:', 'aden'),
                'type'          => 'input',
                'description'   => '',
                'class'         => 'adenit-metabox'
            ),

            'link_author'   => array(
                'title'         => esc_html__('Link Title:', 'aden'),
                'type'          => 'input',
                'description'   => '',
                'class'         => 'adenit-metabox'
            ),

            'link_author_url'   => array(
                'title'         => esc_html__('Link Author (URL):', 'aden'),
                'type'          => 'input',
                'description'   => '',
                'class'         => 'adenit-metabox'
            )
        )
    ),
    // quote metaboxes
    'adenit-quote'    => array(
        'title'             => esc_html__('Quote Format', 'aden'),
        'applicableto'      => 'post',
        'location'          => 'normal',
        'display_condition' => 'post-format-quote',
        'priority'          => 'core',
        'fields'            => array(
            
            'quote'         => array(
                'title'         => esc_html__('Quote:', 'aden'),
                'type'          => 'input',
                'description'   => '',
                'class'         => 'adenit-metabox'
            ),
            
            'quote_author'  => array(
                'title'         => esc_html__('Quote Author:', 'aden'),
                'type'          => 'input',
                'description'   => '',
                'class'         => 'adenit-metabox'
            )
        )
    ),
    // video metaboxes
    'adenit-video'    => array(
        'title'             => esc_html__('Video Format', 'aden'),
        'applicableto'      => 'post',
        'location'          => 'normal',
        'display_condition' => 'post-format-video',
        'priority'          => 'core',
        'fields'            => array(
            'video_embed'       => array(
                'title'         => esc_html__('Video Embed Code:', 'aden'),
                'type'          => 'textarea',
                'description'   => '',
                'class'         => 'adenit-metabox'
            )                      
        )
    ),
    // Audio metaboxes
    'adenit-audio'    => array(
        'title'             => esc_html__('Audio Format', 'aden'),
        'applicableto'      => 'post',
        'location'          => 'normal',
        'display_condition' => 'post-format-audio',
        'priority'          => 'core',
        'fields'            => array(
            'audio_embed'   => array(
                'title'         => esc_html__('Audio Embed Code:', 'aden'),
                'type'          => 'textarea',
                'description'   => '',
                'class'         => 'adenit-metabox'
            )
        )
    )
);

//Add metaboxes
function adenit_add_post_format_metabox() {
    global $adenit_metaboxes;
    if ( ! empty( $adenit_metaboxes ) ) {
        foreach ( $adenit_metaboxes as $id => $metabox ) {
            add_meta_box( $id, $metabox['title'], 'adenit_show_metaboxes', $metabox['applicableto'], $metabox['location'], $metabox['priority'], $id );
        }
    }
}
add_action( 'admin_init', 'adenit_add_post_format_metabox' );

// Show metaboxes
function adenit_show_metaboxes( $post, $args ) {
    global $adenit_metaboxes;
    global $post;
    $custom = get_post_custom( $post->ID );
    $fields = $adenit_metaboxes[$args['id']]['fields'];
    /** Nonce **/
    $output = '<input type="hidden" name="post_format_meta_box_nonce" value="' . esc_attr( wp_create_nonce( basename( __FILE__ ) ) ) . '" />';
 
    if ( sizeof( $fields ) ) {
        foreach ( $fields as $id => $field ) {
            $meta_box_text  = isset($custom[$id][0])?$custom[$id][0]:'';
                   
            switch ( $field['type'] ) {
                default:
                case "input":
                    $output .= '<label for="' . esc_attr( $id ) . '" class="'. esc_attr( $field['class'] ) .'-label" >' . $field['title'] . '</label><input id="' . esc_attr( $id ) . '" class="'. esc_attr( $field['class'] ) .'-input" type="text" name="' . esc_attr( $id ) . '" value="' . esc_attr( $meta_box_text ). '" />';
                    break;
                case "textarea":
                    $output .= '<label for="' . esc_attr( $id ) . '" class="'. esc_attr( $field['class'] ) .'-label" >' . $field['title'] . '</label><textarea id="' . esc_attr( $id ). '" name="' . esc_attr( $id ) . '" class="'. esc_attr( $field['class'] ) .'-textarea" >' . $meta_box_text . '</textarea>';
                    break;
                case  "checkbox":
                $field_id_value = get_post_meta($post->ID, $id, true);
                $field_id_checked = '';
                if($field_id_value) $field_id_checked = 'checked'; ?>
               <div>
                    <p>
                        <label for="<?php echo esc_attr( $id ); ?>" class="'<?php echo esc_attr( $field['class'] ); ?>'-label" >
                            <input id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $field['class'] ).'-input'; ?>"  type="checkbox" name="<?php echo esc_attr( $id ); ?>" value="true" <?php echo $field_id_checked; ?> />
                            <?php echo $field['title']; ?>
                        </label>
                    </p>
               </div>
                <?php $field_id_checked = ''; ?>
            <?php 
                    break;     
            }
        }
    } 

    echo '' . $output;
}
add_action( 'save_post', 'adenit_save_metaboxes' );

// Save metaboxes
function adenit_save_metaboxes( $post_id ) {
    global $adenit_metaboxes;
    global $post;
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'adenit_nonce' ] ) && wp_verify_nonce( $_POST[ 'adenit_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    $post_type = get_post_type();
    // loop through fields and save the data
    foreach ( $adenit_metaboxes as $id => $metabox ) {
        // check if metabox is applicable for current post type
        if ( $metabox['applicableto'] == $post_type ) {
            $fields = $adenit_metaboxes[$id]['fields'];
 
            foreach ( $fields as $id => $field ) {
                $old = get_post_meta( $post_id, $id, true );
                
                if ( isset( $_POST[$id] ) ) {
                    $new = $_POST[$id];
                } else {
                    $new = '';
                }              
               
                if ( $new && $new != $old ) {
                    update_post_meta( $post_id, $id, $new );
                } elseif ( '' == $new && $old || ! isset( $_POST[$id] ) ) {
                    delete_post_meta( $post_id, $id, $old );
                }
            }
        }
    }
}

// Display metaboxes 
function adenit_display_metaboxes() {
    global $adenit_metaboxes;
    global $post;
    if ( get_post_type() == "post" ) :
        ?>
        <script type = "text/javascript">
            $ = jQuery;
           <?php
            $formats = $ids = array();
            foreach ( $adenit_metaboxes as $id => $metabox ) {
                array_push( $formats, "'" . $metabox['display_condition'] . "': '" . $id . "'" );
                array_push( $ids, "#" . $id );
            }
            ?>
 
            var formats = { <?php echo implode( ',', $formats ); ?> };
            var ids = "<?php echo implode( ',', $ids ); ?>";

            function adenitDisplayMetaboxes() {

                // Hide all post format metaboxes
                $(ids).hide();
                // Get current post format
                var selectedElt = $("input[name='post_format']:checked").attr("id");
 
                // If exists, fade in current post format metabox
                if ( formats[selectedElt] )
                    $("#" + formats[selectedElt]).fadeIn();
            }
 
            $( function() {
                // Show/hide metaboxes on page load
                adenitDisplayMetaboxes();
 
                // Show/hide metaboxes on change event
                $( "input[name='post_format']" ).change( function() {
                    adenitDisplayMetaboxes();
                });
            });
        </script>
        <?php
    endif;
}
add_action( 'admin_print_scripts', 'adenit_display_metaboxes', 1000 );

// Add a category header image field 
function add_category_header_img ( $taxonomy ) { ?>
    <div class="form-field term-header-img-wrap">
        <label for="category-header-img-data"><?php _e( 'Header Image', 'aden' ); ?></label>
        <input type="hidden" id="category-header-img-data" name="category-header-img-data" >
        <p><img id="category-header-img" style="width: 200px;cursor: pointer;"></p>
        <p id="category-header-img-desc" style="color: #666;font-style: italic;"> <?php esc_html_e('Click the image to edit or update', 'aden'); ?></p>
        <a href="#" id="category-header-img-upload"><?php esc_html_e('Set header image', 'aden'); ?></a>
        <a href="#" id="category-header-img-remove"><?php esc_html_e('Remove header image', 'aden'); ?></a>
    </div>
    <?php
}
add_action( 'category_add_form_fields','add_category_header_img', 10, 2 );

// Save category header image data
function save_category_header_img ( $term_id ) {
    if( isset( $_POST['category-header-img-data'] ) && $_POST['category-header-img-data'] !== '' ) {
        $category_header_img = $_POST['category-header-img-data'];
        add_term_meta( $term_id, 'category-header-img-data', $category_header_img, true );
    }
}
add_action( 'created_category','save_category_header_img', 10, 2 ); 

// Edit category header image field 
function update_category_header_img ( $term, $taxonomy ) { ?>
    <tr class="form-field term-header-img-wrap">
        <th scope="row">
            <label for="category-header-img-data"><?php _e( 'Header Image', 'aden' ); ?></label>
        </th>
        <td>
            <?php $category_header_img_url = get_term_meta ( $term -> term_id, 'category-header-img-data', true ); ?>
            <input type="hidden" id="category-header-img-data" name="category-header-img-data"  value="<?php echo $category_header_img_url; ?>" >
            <p><img id="category-header-img" src="<?php echo esc_url($category_header_img_url); ?>" style="width: 200px;cursor: pointer;"></p>    
            <p id="category-header-img-desc" style="color: #666;font-style: italic;"> <?php esc_html_e('Click the image to edit or update', 'aden'); ?></p>
            <p><a href="#" id="category-header-img-upload"><?php esc_html_e('Set header image', 'aden'); ?></a></p>
            <p><a href="#" id="category-header-img-remove"><?php esc_html_e('Remove header image', 'aden'); ?></a></p>
 
        </td>
    </tr>
<?php
}
add_action( 'category_edit_form_fields','update_category_header_img', 10, 2 );
  
// Update category header image field
function updated_category_header_img ( $term_id ) {
    if( isset( $_POST['category-header-img-data'] ) && $_POST['category-header-img-data'] !== '' ) {
        $category_header_img_id = $_POST['category-header-img-data'];
        update_term_meta ( $term_id, 'category-header-img-data',  $category_header_img_id );
    } else {
        update_term_meta ( $term_id, 'category-header-img-data', '' );
    }
}
add_action( 'edited_category','updated_category_header_img', 10, 2 );
  
// Add a category logo field 
function add_category_logo ( $taxonomy ) { ?>
     <div class="form-field term-logo-wrap">
        <label for="category-logo" >
        <input type="checkbox" id="category-logo"  name="category-logo" value="false"  />
        <?php _e( 'Hide Logo', 'aden' ); ?>
        </label>
    </div>
    <?php
}
add_action( 'category_add_form_fields','add_category_logo', 10, 2 );

// Save category logo data
function save_category_logo ( $term_id ) {
    if( isset( $_POST['category-logo'] ) && $_POST['category-logo'] !== '' ) {
        $category_logo_id = $_POST['category-logo'];
        add_term_meta( $term_id, 'category-logo', $category_logo_id, true );
    }
}
add_action( 'created_category','save_category_logo', 10, 2 ); 

// Edit category logo field 
function update_category_logo ( $term, $taxonomy ) { 
    $field_value =  get_term_meta ( $term -> term_id, 'category-logo', true );
    $field_checked = ($field_value)?'checked':''; ?>
    <tr class="form-field term-logo-wrap">
        <th scope="row">
            <label for="category-logo" ><?php _e( 'Hide Logo', 'aden' ); ?></label>
        </th>
        <td>
            <input type="checkbox" id="category-logo"  name="category-logo" value="false" <?php echo $field_checked; ?> />
        </td>
    </tr>
<?php
}
add_action( 'category_edit_form_fields','update_category_logo', 10, 2 );

// Update category logo field
function updated_category_logo ( $term_id ) {
    if( isset( $_POST['category-logo'] ) && $_POST['category-logo'] !== '' ) {
        $category_logo_id = $_POST['category-logo'];
        update_term_meta ( $term_id, 'category-logo',  $category_logo_id );
    } else {
        update_term_meta ( $term_id, 'category-logo', '' );
    }
}
add_action( 'edited_category','updated_category_logo', 10, 2 );

// Register Page Header Image Metabox
function register_page_header_img() {
    add_meta_box( 'image_metabox', esc_html__('Header Image', 'aden'), 'page_header_img_callback', 'post', 'side', 'low', 'image_metabox' );
    add_meta_box( 'image_metabox', esc_html__('Header Image', 'aden'), 'page_header_img_callback', 'page', 'side', 'low', 'image_metabox' );
}
add_action( 'add_meta_boxes', 'register_page_header_img' );

// Add Page Header Image Field
function page_header_img_callback( $post_id ) {
    wp_nonce_field( basename( __FILE__ ), 'page_header_img_nonce' ); ?>
    <div id="page-header-img-wrap">
        <?php $image_url = get_post_meta( get_the_ID(), 'page-header-img-data', true ); ?>
        <p><img id="page-header-img" src="<?php echo esc_url($image_url); ?>" style="width: 100%;cursor: pointer;"></p>
        <input type="hidden" id="page-header-img-data" name="page-header-img-data" value="<?php echo esc_url($image_url); ?>">
        <p id="page-header-img-desc" style="color: #666;font-style: italic;"> <?php esc_html_e('Click the image to edit or update', 'aden'); ?></p>
        <p><a href="#" id="page-header-img-upload"><?php esc_html_e('Set header image', 'aden'); ?></a></p>
        <p><a href="#" id="page-header-img-remove"><?php esc_html_e('Remove header image', 'aden'); ?></a></p>
        <p></p>
    </div>
    <?php
}

// Save Page Header Image Field
function save_page_header_img( $post_id ) {
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'page_header_img_nonce' ] ) && wp_verify_nonce( $_POST[ 'page_header_img_nonce' ], basename( __FILE__ ) ) )? 'true' : 'false';

    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
    if ( isset( $_POST[ 'page-header-img-data' ] ) && $_POST['page-header-img-data'] !== '' ) {
        $image_data = $_POST[ 'page-header-img-data' ];
        update_post_meta( $post_id, 'page-header-img-data', $image_data );
    } else {
          update_post_meta( $post_id, 'page-header-img-data', '' );
    }
}
add_action( 'save_post', 'save_page_header_img' );