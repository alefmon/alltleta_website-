<?php 
add_action('customize_register', 'adenit_customize_register');

function adenit_customize_register( $wp_customize ) {

// Change Priority
$wp_customize->get_section( 'title_tagline' )->priority = 9999;

/**
 * ----------------------------------------------------------------------------------------
 * Sanitize Callback Functions
 * ----------------------------------------------------------------------------------------
 */



function adenit_checkbox_callback ( $value ) {
	return $value;
}

function adenit_number_callback ( $value ) {
	return $value;
}

function adenit_text_callback ( $value ) {
	return $value;
}

function adenit_textarea_callback ( $value ) {
	return $value;
}


function adenit_radio_callback ( $value ) {
	return $value;
}

function adenit_select_callback ( $value ) {
	return $value;
}




/**
 * ----------------------------------------------------------------------------------------
 * Color Pannel
 * ----------------------------------------------------------------------------------------
 */
$wp_customize->add_panel( 'color', array(
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Colors', 'aden' ),
    'description'    => '',
));



/**
 * ----------------------------------------------------------------------------------------
 * Top Bar Color Section
 * ----------------------------------------------------------------------------------------
 */

$wp_customize->add_section('adenit_topbar_color', array(
	'title'			=> esc_html__( 'Top Bar', 'aden' ),
	'priority'		=> 10,
	'capability'	=> 'edit_theme_options',
    'panel'  		=> 'color',
));

// Top Bar Background Color Setting
$wp_customize->add_setting( 'adenit_topbar_color[background]', array(
    'default' 	=> '#262626',
    'type' 		=> 'option',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color'
));

// Top Bar Background Color Control
$wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'adenit_topbar_color[background]', array(
		'label'    => esc_html__( 'Background', 'aden' ),
		'section'  => 'adenit_topbar_color'
	) 
));

// Top Bar Menu Color Setting
$wp_customize->add_setting( 'adenit_topbar_color[nav]', array(
    'default' 	=> '#ffffff',
    'type' 		=> 'option',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color'
));

// Top Bar Menu Color Control
$wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'adenit_topbar_color[nav]', array(
		'label'    => esc_html__( 'Text', 'aden' ),
		'section'  => 'adenit_topbar_color'
	) 
));

// Top Bar Menu Hover Color Setting
$wp_customize->add_setting( 'adenit_topbar_color[nav_hv]', array(
    'default' 	=> '#c7a770',
    'type' 		=> 'option',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color'
));

// Top Bar Menu Hover Color Control
$wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'adenit_topbar_color[nav_hv]', array(
		'label'    => esc_html__( 'Text Hover', 'aden' ),
		'section'  => 'adenit_topbar_color'
	) 
));

// Top Bar Menu Button Color Setting
$wp_customize->add_setting( 'adenit_topbar_color[sidebar_btn]', array(
    'default' 	=> '#222222',
    'type' 		=> 'option',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color'
));

// Top Bar Menu Button Color Control
$wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'adenit_topbar_color[sidebar_btn]', array(
		'label'    => esc_html__( 'Icon', 'aden' ),
		'section'  => 'adenit_topbar_color'
	) 
));

// Top Bar Menu Button Hover Color Setting
$wp_customize->add_setting( 'adenit_topbar_color[sidebar_btn_hv]', array(
    'default' 	=> '#c7a770',
    'type' 		=> 'option',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color'
));

// Top Bar Menu Button Hover Color Control
$wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'adenit_topbar_color[sidebar_btn_hv]', array(
		'label'    => esc_html__( 'Icon Hover', 'aden' ),
		'section'  => 'adenit_topbar_color'
	)
));

// Top Bar Menu Button Background Color Setting
$wp_customize->add_setting( 'adenit_topbar_color[sidebar_btn_background]', array(
    'default' 	=> '#ffffff',
    'type' 		=> 'option',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color'
));

// Top Bar Menu Button Background Color Control
$wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'adenit_topbar_color[sidebar_btn_background]', array(
		'label'    => esc_html__( 'Icon Background', 'aden' ),
		'section'  => 'adenit_topbar_color'
	) 
));


// Top Bar Button Color Setting
$wp_customize->add_setting( 'adenit_topbar_color[search]', array(
    'default' 	=> '#222222',
    'type' 		=> 'option',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color'
));

// Top Bar Button Color Control
$wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'adenit_topbar_color[search]', array(
		'label'    => esc_html__( 'Icon', 'aden' ),
		'section'  => 'adenit_topbar_color'
	) 
));

// Top Bar Button Hover Color Setting
$wp_customize->add_setting( 'adenit_topbar_color[search_hv]', array(
    'default' 	=> '#c7a770',
    'type' 		=> 'option',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color'
));

// Top Bar Button Hover Color Control
$wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'adenit_topbar_color[search_hv]', array(
		'label'    => esc_html__( 'Icon Hover', 'aden' ),
		'section'  => 'adenit_topbar_color'
	)
));

// Top Bar Button Background Color Setting
$wp_customize->add_setting( 'adenit_topbar_color[search_background]', array(
    'default' 	=> '#ffffff',
    'type' 		=> 'option',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color'
));

// Top Bar Button Background Color Control
$wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'adenit_topbar_color[search_background]', array(
		'label'    => esc_html__( 'Icon Background', 'aden' ),
		'section'  => 'adenit_topbar_color'
	) 
));



/**
 * ----------------------------------------------------------------------------------------
 * Main Menu Section
 * ----------------------------------------------------------------------------------------
 */

$wp_customize->add_section('adenit_menu_color', array(
	'title'			=> esc_html__( 'Main Menu', 'aden' ),
	'priority'		=> 20,
	'capability'	=> 'edit_theme_options',
    'panel'  		=> 'color',
));

// Main Menu Background Color Setting
$wp_customize->add_setting( 'adenit_menu_color[background]', array(
    'default' 	=> '#ffffff',
    'type' 		=> 'option',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color'
));

// Main Menu Background Color Control
$wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'adenit_menu_color[background]', array(
		'label'    => esc_html__( 'Background', 'aden' ),
		'section'  => 'adenit_menu_color'
	) 
));

// Main Menu Color Setting
$wp_customize->add_setting( 'adenit_menu_color[nav]', array(
    'default' 	=> '#222222',
    'type' 		=> 'option',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color'
));

// Main Menu Color Control
$wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'adenit_menu_color[nav]', array(
		'label'    => esc_html__( 'Text', 'aden' ),
		'section'  => 'adenit_menu_color'
	) 
));

// Main Menu Hover Color Setting
$wp_customize->add_setting( 'adenit_menu_color[nav_hv]', array(
    'default' 	=> '#c7a770',
    'type' 		=> 'option',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color'
));

// Main Menu Hover Color Control
$wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'adenit_menu_color[nav_hv]', array(
		'label'    => esc_html__( 'Text Hover', 'aden' ),
		'section'  => 'adenit_menu_color'
	) 
));


// Main Menu Submenu Border Color Setting
$wp_customize->add_setting( 'adenit_menu_color[submenu_border]', array(
    'default' 	=> '#f4f4f4f',
    'type' 		=> 'option',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color'
));

// Main Menu Submenu Border Color Control
$wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'adenit_menu_color[submenu_border]', array(
		'label'    => esc_html__( 'Sub Menu Border', 'aden' ),
		'section'  => 'adenit_menu_color'
	) 
));



/**
 * ----------------------------------------------------------------------------------------
 * Main General Color Section
 * ----------------------------------------------------------------------------------------
 */

$wp_customize->add_section('adenit_general_color', array(
	'title'			=> esc_html__( 'General', 'aden' ),
	'priority'		=> 30,
	'capability'	=> 'edit_theme_options',
    'panel'  		=> 'color',
));

// General Background Color Setting
$wp_customize->add_setting( 'adenit_general_color[background]', array(
    'default' 	=> '#ffffff',
    'type' 		=> 'option',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color'
));

// General Background Color Control
$wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'adenit_general_color[background]', array(
		'label'    => esc_html__( 'Background', 'aden' ),
		'section'  => 'adenit_general_color'
	) 
));

// General Accent Color Setting
$wp_customize->add_setting( 'adenit_general_color[accent]', array(
    'default' 	=> '#c7a770',
    'type' 		=> 'option',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color'
));

// General Accent Color Control
$wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'adenit_general_color[accent]', array(
		'label'    => esc_html__( 'Accent', 'aden' ),
		'section'  => 'adenit_general_color'
	) 
));

// General Text Color Setting
$wp_customize->add_setting( 'adenit_general_color[text]', array(
    'default' 	=> '#111111',
    'type' 		=> 'option',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color'
));

// General Text Color Control
$wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'adenit_general_color[text]', array(
		'label'    => esc_html__( 'Title', 'aden' ),
		'section'  => 'adenit_general_color'
	) 
));

// General Sub Text Color Setting
$wp_customize->add_setting( 'adenit_general_color[sub_text]', array(
    'default' 	=> '#000000',
    'type' 		=> 'option',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color'
));

// General Sub Text Color Control
$wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'adenit_general_color[sub_text]', array(
		'label'    => esc_html__( 'Text', 'aden' ),
		'section'  => 'adenit_general_color'
	) 
));

// General Sub Text Color Setting
$wp_customize->add_setting( 'adenit_general_color[meta]', array(
    'default' 	=> '#aaaaaa',
    'type' 		=> 'option',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color'
));

// General Sub Text Color Control
$wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'adenit_general_color[meta]', array(
		'label'    => esc_html__( 'Meta', 'aden' ),
		'section'  => 'adenit_general_color'
	) 
));

// General Border Color Setting
$wp_customize->add_setting( 'adenit_general_color[border]', array(
    'default' 	=> '#e8e8e8',
    'type' 		=> 'option',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color'
));

// General Border Color Control
$wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'adenit_general_color[border]', array(
		'label'    => esc_html__( 'Border', 'aden' ),
		'section'  => 'adenit_general_color'
	) 
));

// General Alt Color Setting
$wp_customize->add_setting( 'adenit_general_color[alt]', array(
    'default' 	=> '#f9f9f9',
    'type' 		=> 'option',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color'
));

// General Alt Color Control
$wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'adenit_general_color[alt]', array(
		'label'    => esc_html__( 'Alt', 'aden' ),
		'section'  => 'adenit_general_color'
	) 
));

// Read More Color Setting
$wp_customize->add_setting( 'adenit_general_color[read_more]', array(
    'default' 	=> '#ffffff',
    'type' 		=> 'option',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color'
));

// Read More Color Control
$wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'adenit_general_color[read_more]', array(
		'label'    => esc_html__( 'Text', 'aden' ),
		'section'  => 'adenit_general_color'
	) 
));

// Read More Color Setting
$wp_customize->add_setting( 'adenit_general_color[read_more_hv]', array(
    'default' 	=> '#ffffff',
    'type' 		=> 'option',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color'
));

// Read More Color Control
$wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'adenit_general_color[read_more_hv]', array(
		'label'    => esc_html__( 'Text Hover', 'aden' ),
		'section'  => 'adenit_general_color'
	) 
));

// Read More Background Color Setting
$wp_customize->add_setting( 'adenit_general_color[read_more_background]', array(
    'default' 	=> '#333333',
    'type' 		=> 'option',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color'
));

// Read More Background Color Control
$wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'adenit_general_color[read_more_background]', array(
		'label'    => esc_html__( 'Background', 'aden' ),
		'section'  => 'adenit_general_color'
	) 
));

// Read More Background Color Setting
$wp_customize->add_setting( 'adenit_general_color[read_more_background_hv]', array(
    'default' 	=> '#8d8d8d',
    'type' 		=> 'option',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color'
));

// Read More Background Color Control
$wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'adenit_general_color[read_more_background_hv]', array(
		'label'    => esc_html__( 'Hover Background', 'aden' ),
		'section'  => 'adenit_general_color'
	) 
));

/**
 * ----------------------------------------------------------------------------------------
 * Footer Color Section
 * ----------------------------------------------------------------------------------------
 */

$wp_customize->add_section('adenit_footer_color', array(
	'title'			=> esc_html__( 'Footer', 'aden' ),
	'priority'		=> 40,
	'capability'	=> 'edit_theme_options',
    'panel'  		=> 'color',
));

// Footer Top Background Color Setting
$wp_customize->add_setting( 'adenit_footer_color[top_background]', array(
    'default' 	=> '#333333',
    'type' 		=> 'option',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color'
));

// Footer Top Background Color Control
$wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'adenit_footer_color[top_background]', array(
		'label'    => esc_html__( 'Background', 'aden' ),
		'section'  => 'adenit_footer_color'
	) 
));

// Footer Social Color Setting
$wp_customize->add_setting( 'adenit_footer_color[social]', array(
    'default' 	=> '#ffffff',
    'type' 		=> 'option',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color'
));

// Footer Social Color Control
$wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'adenit_footer_color[social]', array(
		'label'    => esc_html__( 'Text', 'aden' ),
		'section'  => 'adenit_footer_color'
	) 
));

// Footer Social Hover Color Setting
$wp_customize->add_setting( 'adenit_footer_color[social_hv]', array(
    'default' 	=> '#c7a770',
    'type' 		=> 'option',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color'
));

// Footer Social Hover Color Control
$wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'adenit_footer_color[social_hv]', array(
		'label'    => esc_html__( 'Text Hover', 'aden' ),
		'section'  => 'adenit_footer_color'
	) 
));

// Footer Social Icon Hover Color Setting
$wp_customize->add_setting( 'adenit_footer_color[social_icon_hv]', array(
    'default' 	=> '#ffffff',
    'type' 		=> 'option',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color'
));

// Footer Social Icon Hover Color Control
$wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'adenit_footer_color[social_icon_hv]', array(
		'label'    => esc_html__( 'Icon Hover', 'aden' ),
		'section'  => 'adenit_footer_color'
	) 
));

// Footer Bottom Background Color Setting
$wp_customize->add_setting( 'adenit_footer_color[bottom_background]', array(
    'default' 	=> '#242424',
    'type' 		=> 'option',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color'
));

// Footer Bottom Background Color Control
$wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'adenit_footer_color[bottom_background]', array(
		'label'    => esc_html__( 'Background', 'aden' ),
		'section'  => 'adenit_footer_color'
	) 
));

// Footer Copyright Color Setting
$wp_customize->add_setting( 'adenit_footer_color[copyright]', array(
    'default' 	=> '#ffffff',
    'type' 		=> 'option',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color'
));

// Footer Copyright Color Control
$wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'adenit_footer_color[copyright]', array(
		'label'    => esc_html__( 'Copyright Text', 'aden' ),
		'section'  => 'adenit_footer_color'
	) 
));

// Footer Scrolltotop Color Setting
$wp_customize->add_setting( 'adenit_footer_color[scrolltotop]', array(
    'default' 	=> '#c7a770',
    'type' 		=> 'option',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color'
));

// Footer Scrolltotop Color Control
$wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'adenit_footer_color[scrolltotop]', array(
		'label'    => esc_html__( 'BackLink', 'aden' ),
		'section'  => 'adenit_footer_color'
	) 
));

// Footer Scrolltotop Hover Color Setting
$wp_customize->add_setting( 'adenit_footer_color[scrolltotop_hv]', array(
    'default' 	=> '#ffffff',
    'type' 		=> 'option',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color'
));

// Footer Scrolltotop Hover Color Control
$wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'adenit_footer_color[scrolltotop_hv]', array(
		'label'    => esc_html__( 'BackLink Hover', 'aden' ),
		'section'  => 'adenit_footer_color'
	) 
));


/**
 * ----------------------------------------------------------------------------------------
 * Header Section
 * ----------------------------------------------------------------------------------------
 */

$wp_customize->add_section( 'adenit_header', array(
	'title'			=> esc_html__( 'Header', 'aden' ),
	'priority'		=> 25
));

//FadeIn effect Setting
$wp_customize->add_setting( 'adenit_header[effect]', array(
	'default'			=> 0,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_checkbox_callback'
));

//FadeIn effect Control
$wp_customize->add_control( 'adenit_header[effect]', array(
	'label'		=> esc_html__( 'Page Transition', 'aden' ),
	'section'	=> 'adenit_header',
	'type'	  	=> 'checkbox'
));

// Header Boxed Style Setting
$wp_customize->add_setting( 'adenit_header[boxed]', array(
	'default'			=> 0,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_checkbox_callback'
));

// Header Boxed Style Control
$wp_customize->add_control( 'adenit_header[boxed]', array(
	'label'		=> esc_html__( 'Boxed Style', 'aden' ),
	'section'	=> 'adenit_header',
	'type'	  	=> 'checkbox'
));

// Top Header Checkbox Setting
$wp_customize->add_setting( 'adenit_header[top_menu]', array(
	'default'			=> true,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_checkbox_callback'
));

// Top Header Checkbox Control
$wp_customize->add_control( 'adenit_header[top_menu]', array(
	'label'		=> esc_html__( 'Show Top Bar', 'aden' ),
	'section'	=> 'adenit_header',
	'type'	  	=> 'checkbox'
));

// Top Fixed Nav Checkbox Setting
$wp_customize->add_setting( 'adenit_header[fixed_menu]', array(
	'default'			=> 0,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_checkbox_callback'
));

// Top Fixed Nav Checkbox Control
$wp_customize->add_control( 'adenit_header[fixed_menu]', array(
	'label'		=> esc_html__( 'Show Fixed Menu', 'aden' ),
	'section'	=> 'adenit_header',
	'type'		=> 'checkbox'
));

//Social Center Nav Setting
$wp_customize->add_setting( 'adenit_header[left_nav]', array(
	'default'			=> 0,
	'type'				=> 'option',
    'sanitize_callback'	=> 'adenit_checkbox_callback'
));

//Social Center Nav Control
$wp_customize->add_control( 'adenit_header[left_nav]', array(
	'label'		=> esc_html__( 'Left Align Main Menu', 'aden' ),
	'section'	=> 'adenit_header',
	'type'		=> 'checkbox'
));

// Logo upload Setting
$wp_customize->add_setting( 'adenit_header[logo]', array(
    'default'			=> '',
    'type'				=> 'option',
    'sanitize_callback'	=> 'esc_url_raw'
));

// Logo upload Setting
$wp_customize->add_control(
	new WP_Customize_Image_Control( $wp_customize, 'adenit_header[logo]', array(
		'label'    => esc_html__( 'Logo Upload', 'aden' ),
		'section'  => 'adenit_header'
	)
));

// Retina Logo upload Setting
$wp_customize->add_setting( 'adenit_header[retina_logo]', array(
    'default'			=> '',
    'type'				=> 'option',
    'sanitize_callback' => 'esc_url_raw'
));

// Retina Logo upload Setting
$wp_customize->add_control(
	new WP_Customize_Image_Control( $wp_customize, 'adenit_header[retina_logo]', array(
		'label'    => esc_html__( 'Retina Logo Upload', 'aden' ),
		'section'  => 'adenit_header'
	)
));

// Header Logo Width Setting
$wp_customize->add_setting( 'adenit_header[logo_width]', array(
	'default'			=> 700,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_number_callback'
));

// Header Logo Width Control
$wp_customize->add_control( 'adenit_header[logo_width]', array(
	'label'		=> esc_html__( 'Logo Width', 'aden' ),
	'section'	=> 'adenit_header',
	'type'		=> 'number'
));

// Header Logo Margin Setting
$wp_customize->add_setting( 'adenit_header[logo_top_magin]', array(
	'default'			=> 100,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_number_callback'
));

// Header Logo Margin Control
$wp_customize->add_control( 'adenit_header[logo_top_magin]', array(
	'label'		=> esc_html__( 'Logo Top Distance', 'aden' ),
	'section'	=> 'adenit_header',
	'type'		=> 'number'
));

// Mini Logo upload Setting
$wp_customize->add_setting( 'adenit_header[mini_logo]', array(
    'default'			=> '',
    'type'				=> 'option',
    'sanitize_callback' => 'esc_url_raw'
));

// Mini Logo upload Setting
$wp_customize->add_control(
	new WP_Customize_Image_Control( $wp_customize, 'adenit_header[mini_logo]', array(
		'label'    => esc_html__( 'Mini Logo Upload', 'aden' ),
		'section'  => 'adenit_header'
	)
));

// Header Center Height Setting
$wp_customize->add_setting( 'adenit_header[center_height]', array(
	'default'			=> 445,
	'type'				=> 'option',
    'sanitize_callback'	=> 'adenit_number_callback'
));

// Header Center Height Control
$wp_customize->add_control( 'adenit_header[center_height]', array(
	'label'		=> esc_html__( 'Header Height', 'aden' ),
	'section'	=> 'adenit_header',
	'type'		=> 'number'	
));


// Background Image upload Setting
$wp_customize->add_setting( 'adenit_header[bg_img]', array(
    'default'			=> '',
    'type'				=> 'option',
    'sanitize_callback' => 'esc_url_raw'
));

// Background Image upload Setting
$wp_customize->add_control(
	new WP_Customize_Image_Control( $wp_customize, 'adenit_header[bg_img]', array(
		'label'    => esc_html__( 'Background Image Upload', 'aden' ),
		'section'  => 'adenit_header'
	)
));

// Background Image Size
$wp_customize->add_setting( 'adenit_header[bg_size]', array(
    'default' 			=> 'cover',
    'type' 				=> 'option',
    'sanitize_callback'	=> 'adenit_radio_callback'
));

// Background Image Size
$wp_customize->add_control( 'adenit_header[bg_size]', array(
	'label'    => esc_html__( 'Background Image Size', 'aden' ),
	'section'  => 'adenit_header',
	'type'     => 'radio',
	'choices'  => array(
		'pattern' => esc_html__( 'Pattern', 'aden' ),
		'cover'   => esc_html__( 'Cover', 'aden' )
	)
));

// Background Attachment Setting
$wp_customize->add_setting( 'adenit_header[bg_att]', array(
    'default' 			=> 'scroll',
    'type' 				=> 'option',
    'sanitize_callback'	=> 'adenit_radio_callback'
));

// Background Attachment Control
$wp_customize->add_control( 'adenit_header[bg_att]', array(
	'label'    => esc_html__( 'Background Image Type', 'aden' ),
	'section'  => 'adenit_header',
	'type'     => 'radio',
	'choices'  => array(
		'scroll' => esc_html__( 'Scroll', 'aden' ),
		'fixed'   => esc_html__( 'Fixed', 'aden' )
	)
));



/**
 * ----------------------------------------------------------------------------------------
 * Carousel Section
 * ----------------------------------------------------------------------------------------
 */

$wp_customize->add_section('adenit_carousel', array(
	'title'			=> esc_html__( 'Carousel', 'aden' ),
	'priority'		=> 30
));

// Carousel Display Carousel Setting
$wp_customize->add_setting( 'adenit_carousel[show]', array(
	'default'			=> 0,
	'type'				=> 'option',
    'sanitize_callback'	=> 'adenit_checkbox_callback'
));

// Carousel Display Carousel Control
$wp_customize->add_control( 'adenit_carousel[show]', array(
	'label' 	=> esc_html__( 'Show Carousel', 'aden' ),
	'section'	=> 'adenit_carousel',
	'type'		=> 'checkbox'
));

// Carousel Effect Setting
$wp_customize->add_setting( 'adenit_carousel[effect]', array(
	'default'			=> 0,
	'type'				=> 'option',
    'sanitize_callback'	=> 'adenit_checkbox_callback'
));

// Carousel Effect Control
$wp_customize->add_control( 'adenit_carousel[effect]', array(
	'label' 	=> esc_html__( 'SlideDown Effect', 'aden' ),
	'section'	=> 'adenit_carousel',
	'type'		=> 'checkbox'
));

// Carousel Boxed Setting
$wp_customize->add_setting( 'adenit_carousel[boxed]', array(
	'default'			=> 0,
	'type'				=> 'option',
    'sanitize_callback'	=> 'adenit_checkbox_callback'
));

// Carousel Boxed Control
$wp_customize->add_control( 'adenit_carousel[boxed]', array(
	'label' 	=> esc_html__( 'Boxed Style', 'aden' ),
	'section'	=> 'adenit_carousel',
	'type'		=> 'checkbox'
));

// Carousel Move Setting
$wp_customize->add_setting( 'adenit_carousel[column]', array(
	'default'			=> 4,
	'type'				=> 'option',
    'sanitize_callback'	=> 'adenit_select_callback'
));

// Carousel Column Control
$wp_customize->add_control( 'adenit_carousel[column]', array(
	'label'		=> esc_html__( 'Columns', 'aden' ),
	'section'	=> 'adenit_carousel',
	'type'		=> 'select',
	'choices'	=> array(
		'col-1'	=> esc_html__( 'One','aden' ),
		'col-2'	=> esc_html__( 'Two','aden' ),
		'col-3'	=> esc_html__( 'Three','aden' ),
		'col-4'	=> esc_html__( 'Four','aden' )
	)	
));

// Carousel Post Amount Setting
$wp_customize->add_setting( 'adenit_carousel[posts_amount]', array(
	'default'			=> '20',
	'type'				=> 'option',
    'sanitize_callback'	=> 'adenit_number_callback'
));

// Carousel Post Amount Control
$wp_customize->add_control( 'adenit_carousel[posts_amount]', array(
	'label'			=> esc_html__( 'Posts Amount', 'aden' ),
	'section'		=> 'adenit_carousel',
	'type'			=> 'number',
	'input_attrs'	=> array(
		'min'	=> 1,
		'step' 	=> 1,
		'class'	=> '',
		'style'	=> '',
    )
));

// Carousel Orderby Setting
$wp_customize->add_setting( 'adenit_carousel[orderby]', array(
	'default'			=> 'date',
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_select_callback'
));

// Carousel Orderby Control
$wp_customize->add_control( 'adenit_carousel[orderby]', array(
	'label'		=> esc_html__( 'Order By', 'aden' ),
	'section'	=> 'adenit_carousel',
	'type'		=> 'select',
	'choices'	=> array(
		'date' 			=> esc_html__( 'Date','aden' ),
		'comment_count'	=> esc_html__( 'Comments','aden' ),
		'like'			=> esc_html__( 'Likes','aden' ),
		'rand'			=> esc_html__( 'Random','aden' )
	)	
));

// Carousel Item Width Setting
$wp_customize->add_setting( 'adenit_carousel[width]', array(
	'default'			=> 720,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_number_callback'
));

// Carousel Item Width Control
$wp_customize->add_control( 'adenit_carousel[width]', array(
	'label'			=> esc_html__( 'Thumbnail Width ', 'aden' ),
	'section'		=> 'adenit_carousel',
	'type'			=> 'number',
	'input_attrs'	=> array(
        'min'   => 0,
        'step'  => 1,
        'class' => '',
        'style' => ''
    )
));

// Carousel Item Height Setting
$wp_customize->add_setting( 'adenit_carousel[height]', array(
	'default'			=> 450,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_number_callback'
));

// Carousel Item Height Control
$wp_customize->add_control( 'adenit_carousel[height]', array(
	'label'			=> esc_html__( 'Thumbnail Height ', 'aden' ),
	'section'		=> 'adenit_carousel',
	'type'			=> 'number',
	'input_attrs'	=> array(
        'min'   => 0,
        'step'  => 1,
        'class' => '',
        'style' => ''
    )
));

// Carousel textarea Setting
$wp_customize->add_setting( 'adenit_carousel[textarea]', array(
	'default'			=> '',
	'type'				=> 'option',
	'sanitize_callback' => 'adenit_textarea_callback'
));

// Carousel textarea Control
$wp_customize->add_control( 'adenit_carousel[textarea]', array(
    'type'		=> 'textarea',
    'section'	=> 'adenit_carousel',
    'label'		=> esc_html__( 'Title', 'aden' )
));

// Carousel like Setting
$wp_customize->add_setting( 'adenit_carousel[like]', array(
	'default'			=> 1,
	'type'				=> 'option',
    'sanitize_callback'	=> 'adenit_checkbox_callback'
));

// Carousel like Control
$wp_customize->add_control( 'adenit_carousel[like]', array(
	'label'		=> esc_html__( 'Show Likes', 'aden' ),
	'section'	=> 'adenit_carousel',
	'type'		=> 'checkbox'
));

// Carousel Comment Setting
$wp_customize->add_setting( 'adenit_carousel[comment]', array(
	'default'			=> 1,
	'type'				=> 'option',
    'sanitize_callback'	=> 'adenit_checkbox_callback'
));

// Carousel Comment Control
$wp_customize->add_control( 'adenit_carousel[comment]', array(
	'label'		=> esc_html__( 'Show Comments', 'aden' ),
	'section'	=> 'adenit_carousel',
	'type'		=> 'checkbox'
));
// Carousel Category Setting
$wp_customize->add_setting( 'adenit_carousel[category]', array(
	'default'			=> 1,
	'type' 				=> 'option',
    'sanitize_callback'	=> 'adenit_checkbox_callback'
));

// Carousel Category Control
$wp_customize->add_control( 'adenit_carousel[category]', array(
	'label'		=> esc_html__( 'Show Category', 'aden' ),
	'section'	=> 'adenit_carousel',
	'type'		=> 'checkbox'
));

// Carousel Title Setting
$wp_customize->add_setting( 'adenit_carousel[title]', array(
	'default'			=> 1,
	'type'				=> 'option',
    'sanitize_callback'	=> 'adenit_checkbox_callback'
));

// Carousel Title Control
$wp_customize->add_control( 'adenit_carousel[title]', array(
	'label'		=> esc_html__( 'Show Title', 'aden' ),
	'section'	=> 'adenit_carousel',
	'type'		=> 'checkbox'
));

// Carousel Date Setting
$wp_customize->add_setting( 'adenit_carousel[date]', array(
	'default'			=> 1,
	'type'				=> 'option',
    'sanitize_callback'	=> 'adenit_checkbox_callback'
));

// Carousel Date Control
$wp_customize->add_control( 'adenit_carousel[date]', array(
	'label'		=> esc_html__( 'Show Date', 'aden' ),
	'section'	=> 'adenit_carousel',
	'type'		=> 'checkbox'
));

// Carousel Autoplay Setting
$wp_customize->add_setting( 'adenit_carousel[autoplay]', array(
	'default'			=> '3000',
	'type'				=> 'option',
    'sanitize_callback'	=> 'adenit_number_callback'
));

// Carousel Autoplay Control
$wp_customize->add_control( 'adenit_carousel[autoplay]', array(
	'label'			=> esc_html__( 'Autoplay', 'aden' ),
	'section'		=> 'adenit_carousel',
	'type'			=> 'number',
	'input_attrs'	=> array(
		'min'	=> 0,
		'step' 	=> 500,
		'class'	=> '',
		'style'	=> '',
    )
));

// Carousel Navigation Setting
$wp_customize->add_setting( 'adenit_carousel[navigation]', array(
	'default' 			=> 1,
	'type' 				=> 'option',
    'sanitize_callback' => 'adenit_select_callback'
));

// Carousel Navigation Control
$wp_customize->add_control( 'adenit_carousel[navigation]', array(
	'label'		=> esc_html__( 'Show Navigation', 'aden' ),
	'section'	=> 'adenit_carousel',
	'type'		=> 'select',
	'choices'	=> array(
		'off' 			=> esc_html__( 'Off','aden' ),
		'display' 		=> esc_html__( 'On','aden' ),
		'display_hover'	=> esc_html__( 'On Hover','aden' )
	)	
));

// Carousel Pagination Setting
$wp_customize->add_setting( 'adenit_carousel[pagination]', array(
	'default'			=> 0,
	'type'				=> 'option',
    'sanitize_callback'	=> 'adenit_checkbox_callback'
));

// Carousel Pagination Control
$wp_customize->add_control( 'adenit_carousel[pagination]', array(
	'label'		=> esc_html__( 'Show Pagination', 'aden' ),
	'section'	=> 'adenit_carousel',
	'type'		=> 'checkbox'
));



/**
 * ----------------------------------------------------------------------------------------
 * Content Section
 * ----------------------------------------------------------------------------------------
 */

$wp_customize->add_section('adenit_content', array(
	'title'			=> esc_html__( 'Content', 'aden' ),
	'priority'		=> 40
));

//  Content Boxed Style Setting
$wp_customize->add_setting( 'adenit_content[boxed]', array(
	'default'			=> true,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_checkbox_callback'
));

//  Content Boxed Style control
$wp_customize->add_control( 'adenit_content[boxed]', array(
	'label'		=> esc_html__( 'Content Boxed Style', 'aden' ),
	'section'	=> 'adenit_content',
	'type'		=> 'checkbox'
));

//  Content Single Boxed Style Setting
$wp_customize->add_setting( 'adenit_content[single_boxed]', array(
	'default'			=> true,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_checkbox_callback'
));

//  Content Single Boxed Style control
$wp_customize->add_control( 'adenit_content[single_boxed]', array(
	'label'		=> esc_html__( 'Single Boxed Style', 'aden' ),
	'section'	=> 'adenit_content',
	'type'		=> 'checkbox'
));

// Content Width Setting
$wp_customize->add_setting( 'adenit_content[width]', array(
	'default'			=> 1180,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_number_callback'
));

// Content Width Control
$wp_customize->add_control( 'adenit_content[width]', array(
	'label'			=> esc_html__( 'Site Width', 'aden' ),
	'section'		=> 'adenit_content',
	'type'			=> 'number',
	'input_attrs'	=> array(
        'min'   => 0,
        'step'  => 1,
        'class' => '',
        'style'	=> '',
    )	
));

// Content Sidebar Width Setting
$wp_customize->add_setting( 'adenit_content[sidebar_width]', array(
	'default'			=> 330,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_number_callback'
));

// Content Sidebar Width Control
$wp_customize->add_control( 'adenit_content[sidebar_width]', array(
	'label'			=> esc_html__( 'Sidebar Width', 'aden' ),
	'section'		=> 'adenit_content',
	'type'			=> 'number',
	'input_attrs'	=> array(
        'min'   => 0,
        'step'  => 1,
        'class' => '',
        'style'	=> '',
    )	
));

// Content Sidebar Position Setting
$wp_customize->add_setting( 'adenit_content[sidebar_position]', array(
	'default'			=> 'right',
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_select_callback'
));

// Content Sidebar Position Control
$wp_customize->add_control( 'adenit_content[sidebar_position]', array(
	'label'		=> esc_html__( 'Sidebar Align', 'aden' ),
	'section' 	=> 'adenit_content',
	'type'		=> 'select',
	'choices'	=> array(
		'none'		=> esc_html__( 'Disable ','aden' ),
		'left'		=> esc_html__( 'Left ','aden' ),
		'right'		=> esc_html__( 'Right ','aden' )
	)
));

// Content Sidebar Position Setting
$wp_customize->add_setting( 'adenit_content[sidebar_single_position]', array(
	'default'			=> 'right',
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_select_callback'
));

// Content Sidebar Position Control
$wp_customize->add_control( 'adenit_content[sidebar_single_position]', array(
	'label'	=> esc_html__( 'Sidebar Single Align', 'aden' ),
	'section' 	=> 'adenit_content',
	'type'		=> 'select',
	'choices'	=> array(
	'none'		=> esc_html__( 'Disable ','aden' ),
	'left'		=> esc_html__( 'Left ','aden' ),
	'right'		=> esc_html__( 'Right ','aden' )
	)
));

// Background Image upload Setting
$wp_customize->add_setting( 'adenit_content[bg_img]', array(
    'default'			=> '',
    'type'				=> 'option',
    'sanitize_callback' => 'esc_url_raw'
));

// Background Image upload Setting
$wp_customize->add_control(
	new WP_Customize_Image_Control( $wp_customize, 'adenit_content[bg_img]', array(
		'label'    => esc_html__( 'Background Image Upload', 'aden' ),
		'section'  => 'adenit_content'
	)
));

// Background Image Size
$wp_customize->add_setting( 'adenit_content[bg_size]', array(
    'default'			=> 'pattern',
    'type'				=> 'option',
    'sanitize_callback' => 'adenit_radio_callback'
));

// Background Image Size
$wp_customize->add_control( 'adenit_content[bg_size]', array(
	'label'    => esc_html__( 'Background Image Size', 'aden' ),
	'section'  => 'adenit_content',
	'type'     => 'radio',
	'choices'  => array(
		'pattern' => esc_html__( 'Pattern', 'aden' ),
		'cover'   => esc_html__( 'Cover', 'aden' )
	)
));

// Background Attachment Setting
$wp_customize->add_setting( 'adenit_content[bg_att]', array(
    'default'			=> 'scroll',
    'type'				=> 'option',
    'sanitize_callback' => 'adenit_radio_callback'
));

// Background Attachment Control
$wp_customize->add_control( 'adenit_content[bg_att]', array(
	'label'    => esc_html__( 'Background Image Type', 'aden' ),
	'section'  => 'adenit_content',
	'type'     => 'radio',
	'choices'  => array(
		'scroll'	=> esc_html__( 'Scroll', 'aden' ),
		'fixed'		=> esc_html__( 'Fixed', 'aden' )
	)
));

// Post Media Width Setting
$wp_customize->add_setting( 'adenit_content[post_width]', array(
	'default'			=> 420,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_number_callback'
));

// Post Media Width Control
$wp_customize->add_control( 'adenit_content[post_width]', array(
	'label'			=> esc_html__( 'Thumbnail Width ', 'aden' ),
	'section'		=> 'adenit_content',
	'type'			=> 'number',
	'input_attrs'	=> array(
        'min'   => 0,
        'step'  => 1,
        'class' => '',
        'style' => ''
    )
));

// Post Media Height Setting
$wp_customize->add_setting( 'adenit_content[post_height]', array(
	'default'			=> 280,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_number_callback'
));

// Post Media Height Control
$wp_customize->add_control( 'adenit_content[post_height]', array(
	'label'			=> esc_html__( 'Thumbnail Height ', 'aden' ),
	'section'		=> 'adenit_content',
	'type'			=> 'number',
	'input_attrs'	=> array(
        'min'   => 0,
        'step'  => 1,
        'class' => '',
        'style' => ''
    )
));

// Post Column Setting
$wp_customize->add_setting( 'adenit_content[post_column]', array(
	'default'			=> 'col-2',
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_select_callback'
));

// Post Column Control
$wp_customize->add_control( 'adenit_content[post_column]', array(
	'label'		=> esc_html__( 'Columns', 'aden' ),
	'section'	=> 'adenit_content',
	'type'		=> 'select',
	'choices'	=> array(
		'col-1' => esc_html__( 'One', 'aden' ),
		'col-2' => esc_html__( 'Two', 'aden' ),
		'col-3' => esc_html__( 'Three', 'aden' )
	)	
));

//Post Horizontal Gutter Setting
$wp_customize->add_setting( 'adenit_content[horizontal_gutter]', array(
	'default'			=> 30,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_number_callback'
));

// Post Horizontal Gutter Control
$wp_customize->add_control( 'adenit_content[horizontal_gutter]', array(
	'label'			=> esc_html__( 'Horizontal Gutter', 'aden' ),
	'section'		=> 'adenit_content',
	'type'			=> 'number',
	'input_attrs'	=> array(
        'min'   => 0,
        'step'  => 1,
        'class' => '',
        'style' => ''
    )
));

//Header Post Vertical Gutter Setting
$wp_customize->add_setting( 'adenit_content[vertical_gutter]', array(
	'default'			=> 45,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_number_callback'
));

//Header Post Vertical Gutter Control
$wp_customize->add_control( 'adenit_content[vertical_gutter]', array(
	'label'			=> esc_html__( 'Vertical Gutter', 'aden' ),
	'section'		=> 'adenit_content',
	'type'			=> 'number',
	'input_attrs'	=> array(
        'min'   => 0,
        'step'  => 1,
        'class' => '',
        'style' => ''
    )
));

// Content Pagination Setting
$wp_customize->add_setting( 'adenit_content[pagination]', array(
	'default'			=> 'numbered',
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_select_callback'
));

// Content Pagination Control
$wp_customize->add_control( 'adenit_content[pagination]', array(
	'label'		=> esc_html__( 'Pagination Style', 'aden' ),
	'section'	=> 'adenit_content',
	'type'		=> 'select',
	'choices'	=> array(
		'default'	=> esc_html__( 'Default','aden' ),
		'numbered'	=> esc_html__( 'Numbered','aden' )
	)
));

//  Post thumbnail Setting
$wp_customize->add_setting( 'adenit_content[post_thumbnail]', array(
	'default'			=> 0,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_checkbox_callback'
));

//  Post thumbnail Control
$wp_customize->add_control( 'adenit_content[post_thumbnail]', array(
	'label'		=> esc_html__( 'Show Thumbnail Only', 'aden' ),
	'section'	=> 'adenit_content',
	'type'		=> 'checkbox'
));

//  Post Share Setting
$wp_customize->add_setting( 'adenit_content[post_like]', array(
	'default'			=> true,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_checkbox_callback'
));

//  Post Share Control
$wp_customize->add_control( 'adenit_content[post_like]', array(
	'label'		=> esc_html__( 'Show Likes', 'aden' ),
	'section'	=> 'adenit_content',
	'type'		=> 'checkbox'
));

//  Post Comment Setting
$wp_customize->add_setting( 'adenit_content[post_comment]', array(
	'default'			=> true,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_checkbox_callback'
));

//  Post Comment Control
$wp_customize->add_control( 'adenit_content[post_comment]', array(
	'label'		=> esc_html__( 'Show Comments', 'aden' ),
	'section'	=> 'adenit_content',
	'type'		=> 'checkbox'
));

//  Post categories Setting
$wp_customize->add_setting( 'adenit_content[post_categories]', array(
	'default'			=> true,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_checkbox_callback'
));

//  Post categories Control
$wp_customize->add_control( 'adenit_content[post_categories]', array(
	'label'		=> esc_html__( 'Show Category', 'aden' ),
	'section'	=> 'adenit_content',
	'type'		=> 'checkbox'
));

// Post Description Setting
$wp_customize->add_setting( 'adenit_content[post_description]', array(
	'default'			=> 'the-excerpt',
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_select_callback'
));

// Post Description Control
$wp_customize->add_control( 'adenit_content[post_description]', array(
	'label'			=> esc_html__( 'Post Description', 'aden' ),
	'section'		=> 'adenit_content',
	'type'			=> 'select',
	'choices'		=> array(
		'the-content' 	=> esc_html__( 'The Content','aden' ),
		'the-excerpt'	=> esc_html__( 'The Excerpt','aden' )
	)
));

// Post Excerpt Length Setting
$wp_customize->add_setting( 'adenit_content[post_excerpt_length]', array(
	'default'			=> 34,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_number_callback'
));

// Post Excerpt Length Control
$wp_customize->add_control( 'adenit_content[post_excerpt_length]', array(
	'label'			=> esc_html__( 'Except Length', 'aden' ),
	'section'		=> 'adenit_content',
	'type'			=> 'number',
	'input_attrs'	=> array(
        'min'	=> 0,
        'step'  => 1,
        'class' => '',
        'style' => ''
    )
));

//  Dropcap Setting
$wp_customize->add_setting( 'adenit_content[dropcap]', array(
	'default'			=> 0,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_checkbox_callback'
));

//  Dropcap Control
$wp_customize->add_control( 'adenit_content[dropcap]', array(
	'label' 	=> esc_html__( 'Show Dropcap', 'aden' ),
	'section'	=> 'adenit_content',
	'type'		=> 'checkbox'
));

//  Read More Setting
$wp_customize->add_setting( 'adenit_content[grid_read_more]', array(
	'default'			=> true,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_checkbox_callback'
));

//  Read More Control
$wp_customize->add_control( 'adenit_content[grid_read_more]', array(
	'label' 	=> esc_html__( 'Grid Read More', 'aden' ),
	'section'	=> 'adenit_content',
	'type'		=> 'checkbox'
));

//  Post Author Setting
$wp_customize->add_setting( 'adenit_content[post_author]', array(
	'default'			=> true,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_checkbox_callback'
));

//  Post Author Control
$wp_customize->add_control( 'adenit_content[post_author]', array(
	'label'		=> esc_html__( 'Show Author', 'aden' ),
	'section'	=> 'adenit_content',
	'type'		=> 'checkbox'
));

//  Post Date Setting
$wp_customize->add_setting( 'adenit_content[post_date]', array(
	'default'			=> true,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_checkbox_callback'
));

//  Post Date Control
$wp_customize->add_control( 'adenit_content[post_date]', array(
	'label'		=> esc_html__( 'Show Date', 'aden' ),
	'section'	=> 'adenit_content',
	'type'		=> 'checkbox'
));

//  Post Share Facebook Setting
$wp_customize->add_setting( 'adenit_content[facebook_share]', array(
	'default'			=> true,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_checkbox_callback'
));

//  Post Share Facebook Control
$wp_customize->add_control( 'adenit_content[facebook_share]', array(
	'label'		=> esc_html__( 'Show Facebook', 'aden' ),
	'section'	=> 'adenit_content',
	'type'		=> 'checkbox'
));

//  Post Share Twitter Setting
$wp_customize->add_setting( 'adenit_content[twitter_share]', array(
	'default'			=> true,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_checkbox_callback'
));

//  Post Share Twitter Control
$wp_customize->add_control( 'adenit_content[twitter_share]', array(
	'label'		=> esc_html__( 'Show Twitter', 'aden' ),
	'section'	=> 'adenit_content',
	'type'		=> 'checkbox'
));

//  Post Share Pinterest Setting
$wp_customize->add_setting( 'adenit_content[pinterest_share]', array(
	'default'			=> false,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_checkbox_callback'
));

//  Post Share Pinterest Control
$wp_customize->add_control( 'adenit_content[pinterest_share]', array(
	'label'		=> esc_html__( 'Show Pinterest', 'aden' ),
	'section'	=> 'adenit_content',
	'type'		=> 'checkbox'
));

//  Post Share Google Plus Setting
$wp_customize->add_setting( 'adenit_content[googleplus_share]', array(
	'default'			=> false,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_checkbox_callback'
));

//  Post Share Google Plus Control
$wp_customize->add_control( 'adenit_content[googleplus_share]', array(
	'label'		=> esc_html__( 'Show Google+', 'aden' ),
	'section'	=> 'adenit_content',
	'type'		=> 'checkbox'
));

//  Post Share Linkedin Setting
$wp_customize->add_setting( 'adenit_content[linkedin_share]', array(
	'default'			=> true,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_checkbox_callback'
));

//  Post Share Linkedin Control
$wp_customize->add_control( 'adenit_content[linkedin_share]', array(
	'label'		=> esc_html__( 'Show Linkedin', 'aden' ),
	'section'	=> 'adenit_content',
	'type'		=> 'checkbox'
));

//  Post Share Tumblr Setting
$wp_customize->add_setting( 'adenit_content[tumblr_share]', array(
	'default'			=> true,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_checkbox_callback'
));

//  Post Share Tumblr Control
$wp_customize->add_control( 'adenit_content[tumblr_share]', array(
	'label'		=> esc_html__( 'Show Tumblr', 'aden' ),
	'section'	=> 'adenit_content',
	'type'		=> 'checkbox'
));

//  Post Share Reddit Setting
$wp_customize->add_setting( 'adenit_content[reddit_share]', array(
	'default'			=> false,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_checkbox_callback'
));

//  Post Share Reddit Control
$wp_customize->add_control( 'adenit_content[reddit_share]', array(
	'label'		=> esc_html__( 'Show Reddit', 'aden' ),
	'section'	=> 'adenit_content',
	'type'		=> 'checkbox'
));

//  Post Tags Setting
$wp_customize->add_setting( 'adenit_content[post_tags]', array(
	'default'			=> true,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_checkbox_callback'
));

//  Post Tags Control
$wp_customize->add_control( 'adenit_content[post_tags]', array(
	'label'		=> esc_html__( 'Show Tags', 'aden' ),
	'section'	=> 'adenit_content',
	'type'		=> 'checkbox'
));

//  Breadcrumb Setting
$wp_customize->add_setting( 'adenit_content[breadcrumb]', array(
	'default'			=> true,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_checkbox_callback'
));

//  Breadcrumb Control
$wp_customize->add_control( 'adenit_content[breadcrumb]', array(
	'label'		=> esc_html__( 'Show breadcrumb', 'aden' ),
	'section'	=> 'adenit_content',
	'type'		=> 'checkbox'
));


// Similar Post Description Setting
$wp_customize->add_setting( 'adenit_content[similar_posts]', array(
	'default'			=> 'random',
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_select_callback'
));

// Similar Post Description Control
$wp_customize->add_control( 'adenit_content[similar_posts]', array(
	'label'			=> esc_html__( 'Similar post', 'aden' ),
	'section'		=> 'adenit_content',
	'type'			=> 'select',
	'choices'		=> array(
		'none' 	=> esc_html__( 'none','aden' ),
		'related'	=> esc_html__( 'Related','aden' ),
		'random'	=> esc_html__( 'Random','aden' )
	)
));

// Similar Post Title Setting
$wp_customize->add_setting( 'adenit_content[similar_posts_title]', array(
	'default'			=> 'Random Posts',
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_text_callback'
));

// Similar Post Title Control
$wp_customize->add_control( 'adenit_content[similar_posts_title]', array(
	'label'			=> esc_html__( 'Similar Posts Title', 'aden' ),
	'section'		=> 'adenit_content',
	'type'			=> 'text'
));

//  Post Author Description Setting
$wp_customize->add_setting( 'adenit_content[post_author_description]', array(
	'default'			=> true,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_checkbox_callback'
));

//  Post Author Description Control
$wp_customize->add_control( 'adenit_content[post_author_description]', array(
	'label'		=> esc_html__( 'Show Author Description', 'aden' ),
	'section'	=> 'adenit_content',
	'type'		=> 'checkbox'
));
//  Post Pagination Setting
$wp_customize->add_setting( 'adenit_content[post_pagination]', array(
	'default'			=> true,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_checkbox_callback'
));

//  Post Pagination Control
$wp_customize->add_control( 'adenit_content[post_pagination]', array(
	'label'		=> esc_html__( 'Show pagination', 'aden' ),
	'section'	=> 'adenit_content',
	'type'		=> 'checkbox'
));

//  Post Comment Area Setting
$wp_customize->add_setting( 'adenit_content[post_comment_area]', array(
	'default'			=> true,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_checkbox_callback'
));

//  Post Comment Area Control
$wp_customize->add_control( 'adenit_content[post_comment_area]', array(
	'label'		=> esc_html__( 'Show Post Comments', 'aden' ),
	'section'	=> 'adenit_content',
	'type'		=> 'checkbox'
));

//  Page Comment Area Setting
$wp_customize->add_setting( 'adenit_content[page_comment_area]', array(
	'default'			=> true,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_checkbox_callback'
));

//  Page Comment Area Control
$wp_customize->add_control( 'adenit_content[page_comment_area]', array(
	'label'		=> esc_html__( 'Show Page Comments', 'aden' ),
	'section'	=> 'adenit_content',
	'type'		=> 'checkbox'
));


/**
 * ----------------------------------------------------------------------------------------
 * Footer Section
 * ----------------------------------------------------------------------------------------
 */


$wp_customize->add_section('adenit_footer', array(
	'title'			=> esc_html__( 'Footer', 'aden' ),
	'priority'		=> 55
));

// Instagram Boxed Setting
$wp_customize->add_setting( 'adenit_footer[instagram_boxed]', array(
	'default'			=> false,
	'type'				=> 'option',
    'sanitize_callback'	=> 'adenit_checkbox_callback'
));

// Instagram Boxed Control
$wp_customize->add_control( 'adenit_footer[instagram_boxed]', array(
	'label'		=> esc_html__( 'Instagram Boxed Style', 'aden' ),
	'section'	=> 'adenit_footer',
	'type'		=> 'checkbox'
));

// Footer Boxed Style Setting
$wp_customize->add_setting( 'adenit_footer[boxed]', array(
	'default'			=> false,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_checkbox_callback'
));

// Footer Boxed Style Control
$wp_customize->add_control( 'adenit_footer[boxed]', array(
	'label'		=> esc_html__( 'Copyrights Boxed Style', 'aden' ),
	'section'	=> 'adenit_footer',
	'type'	  	=> 'checkbox'
));

// Social Checkbox Setting
$wp_customize->add_setting( 'adenit_footer[social]', array(
	'default'			=> 'on_scroll',
	'type'				=> 'option',
    'sanitize_callback'	=> 'adenit_checkbox_callback'
));

// Social Checkbox Control
$wp_customize->add_control( 'adenit_footer[social]', array(
	'label'		=> esc_html__( 'Show Social', 'aden' ),
	'section'	=> 'adenit_footer',
	'type'		=> 'select',
	'choices'	=> array(
		'off' 		=> esc_html__( 'Disable','aden' ),
		'on' 		=> esc_html__( 'By Default','aden' ),
		'on_hover'	=> esc_html__( 'On Hover','aden' ),
		'on_scroll'	=> esc_html__( 'On Scroll','aden' )
	)	
));

// Footer Logo upload Setting
$wp_customize->add_setting( 'adenit_footer[logo]', array(
    'default'			=> '',
    'type'				=> 'option',
    'sanitize_callback' => 'esc_url_raw'
));

// Footer Logo upload Control
$wp_customize->add_control(
	new WP_Customize_Image_Control( $wp_customize, 'adenit_footer[logo]', array(
		'label'    => esc_html__( 'Logo Upload', 'aden' ),
		'section'  => 'adenit_footer'
	)
));

// Footer Logo Width Setting
$wp_customize->add_setting( 'adenit_footer[logo_width]', array(
	'default'			=> 350,
	'type'				=> 'option',
    'sanitize_callback' => 'adenit_number_callback'
));

// Footer Logo Width Control
$wp_customize->add_control( 'adenit_footer[logo_width]', array(
	'label'		=> esc_html__( 'Logo Width', 'aden' ),
	'section'	=> 'adenit_footer',
	'type'		=> 'number'
));

// Copyright Setting
$wp_customize->add_setting( 'adenit_footer[copyright]', array(
	'default'			=> 'Copyrights 2016 InfinityThemes. All Rights Reserved.',
	'type'				=> 'option',
	'sanitize_callback' => 'adenit_textarea_callback'
));

// Copyright Control
$wp_customize->add_control( 'adenit_footer[copyright]', array(
    'type'		=> 'textarea',
    'section'	=> 'adenit_footer',
    'label'		=> esc_html__( 'Enter Copyright Text', 'aden' )
));




/**
 * ----------------------------------------------------------------------------------------
 * Social Section
 * ----------------------------------------------------------------------------------------
 */

$wp_customize->add_section('adenit_social', array(
	'title'			=> esc_html__( 'Social Media', 'aden' ),
	'priority'		=> 65
));

// Social Facebook Setting
$wp_customize->add_setting( 'adenit_social[facebook]', array(
	'default'			=> 'http://facebook.com',
	'type'				=> 'option',
	'sanitize_callback'	=> 'esc_url_raw'
));

// Social Facebook Control
$wp_customize->add_control( 'adenit_social[facebook]', array(
    'type'		=> 'url',
    'section'	=> 'adenit_social',
    'label'		=> esc_html__( 'Facebook', 'aden' )
));

// Social Google Plus Setting
$wp_customize->add_setting( 'adenit_social[google_plus]', array(
	'default'			=> '',
	'type'				=> 'option',
	'sanitize_callback'	=> 'esc_url_raw'
));

// Social Google Plus Control
$wp_customize->add_control( 'adenit_social[google_plus]', array(
    'type'		=> 'url',
    'section'	=> 'adenit_social',
    'label'		=> esc_html__( 'Google Plus', 'aden' )
));

// Social Twitter Setting
$wp_customize->add_setting( 'adenit_social[twitter]', array(
	'default'			=> 'http://twitter.com',
	'type'				=> 'option',
	'sanitize_callback'	=> 'esc_url_raw'
));

// Social Twitter Control
$wp_customize->add_control( 'adenit_social[twitter]', array(
    'type'		=> 'url',
    'section'	=> 'adenit_social',
    'label'		=> esc_html__( 'Twitter', 'aden' )
));

// Social Youtube Setting
$wp_customize->add_setting( 'adenit_social[youtube]', array(
	'default'			=> '',
	'type'				=> 'option',
	'sanitize_callback'	=> 'esc_url_raw'
));

// Social Youtube Control
$wp_customize->add_control( 'adenit_social[youtube]', array(
    'type'		=> 'url',
    'section'	=> 'adenit_social',
    'label'		=> esc_html__( 'Youtube', 'aden' )
));

// Social flickr Setting
$wp_customize->add_setting( 'adenit_social[flickr]', array(
	'default'			=> '',
	'type'				=> 'option',
	'sanitize_callback'	=> 'esc_url_raw'
));

// Social flickr Control
$wp_customize->add_control( 'adenit_social[flickr]', array(
    'type'		=> 'url',
    'section'	=> 'adenit_social',
    'label'		=> esc_html__( 'Flickr', 'aden' )
));

// Social Linkedin Setting
$wp_customize->add_setting( 'adenit_social[linkedin]', array(
	'default'			=> 'http://linkedin.com',
	'type'				=> 'option',
	'sanitize_callback'	=> 'esc_url_raw'
));

// Social Linkedin Control
$wp_customize->add_control( 'adenit_social[linkedin]', array(
    'type'		=> 'url',
    'section'	=> 'adenit_social',
    'label'		=> esc_html__( 'Linkedin', 'aden' )
));

// Social bloglovin Setting
$wp_customize->add_setting( 'adenit_social[bloglovin]', array(
	'default'			=> 'http://bloglovin.com',
	'type'				=> 'option',
	'sanitize_callback'	=> 'esc_url_raw'
));

// Social bloglovin Control
$wp_customize->add_control( 'adenit_social[bloglovin]', array(
    'type'		=> 'url',
    'section'	=> 'adenit_social',
    'label'		=> esc_html__( 'Bloglovin', 'aden' )
));

// Social tumblr Setting
$wp_customize->add_setting( 'adenit_social[tumblr]', array(
	'default'			=> 'http://www.tumblr.com',
	'type'				=> 'option',
	'sanitize_callback'	=> 'esc_url_raw'
));

// Social tumblr Control
$wp_customize->add_control( 'adenit_social[tumblr]', array(
    'type'		=> 'url',
    'section'	=> 'adenit_social',
    'label'		=> esc_html__( 'Tumblr', 'aden' )
));

// Social pinterest Setting
$wp_customize->add_setting( 'adenit_social[pinterest]', array(
	'default'			=> 'http://pinterest.com',
	'type'				=> 'option',
	'sanitize_callback'	=> 'esc_url_raw'
));

// Social pinterest Control
$wp_customize->add_control( 'adenit_social[pinterest]', array(
    'type'		=> 'url',
    'section'	=> 'adenit_social',
    'label'		=> esc_html__( 'Pinterest', 'aden' )
));

// Social soundcloud Setting
$wp_customize->add_setting( 'adenit_social[soundcloud]', array(
	'default'			=> '',
	'type'				=> 'option',
	'sanitize_callback'	=> 'esc_url_raw'
));

// Social soundcloud Control
$wp_customize->add_control( 'adenit_social[soundcloud]', array(
    'type'		=> 'url',
    'section'	=> 'adenit_social',
    'label'		=> esc_html__( 'Soundcloud', 'aden' )
));

// Social behance Setting
$wp_customize->add_setting( 'adenit_social[behance]', array(
	'default'			=> '',
	'type'				=> 'option',
	'sanitize_callback'	=> 'esc_url_raw'
));

// Social behance Control
$wp_customize->add_control( 'adenit_social[behance]', array(
    'type'		=> 'url',
    'section'	=> 'adenit_social',
    'label'		=> esc_html__( 'Behance', 'aden' )
));

// Social vimeo Setting
$wp_customize->add_setting( 'adenit_social[vimeo]', array(
	'default'			=> '',
	'type'				=> 'option',
	'sanitize_callback'	=> 'esc_url_raw'
));

// Social vimeo Control
$wp_customize->add_control( 'adenit_social[vimeo]', array(
    'type'		=> 'url',
    'section'	=> 'adenit_social',
    'label'		=> esc_html__( 'Vimeo', 'aden' )
));



// Social instagram Setting
$wp_customize->add_setting( 'adenit_social[instagram]', array(
	'default'			=> 'http://instagram.com',
	'type'				=> 'option',
	'sanitize_callback'	=> 'esc_url_raw'
));

// Social instagram Control
$wp_customize->add_control( 'adenit_social[instagram]', array(
    'type'		=> 'url',
    'section'	=> 'adenit_social',
    'label'		=> esc_html__( 'Instagram', 'aden' )
));

// theme Activation
$wp_customize->add_setting( 'adenit_social[theme_activation]', array(
	'default'			=> '',
	'type'				=> 'option',
    'sanitize_callback'	=> 'adenit_checkbox_callback'
));

$wp_customize->add_control( 'adenit_social[theme_activation]', array(
	'label'   => '',
	'section' => 'adenit_social',
	'type'	  => 'checkbox'
));



/**
 * ----------------------------------------------------------------------------------------
 * Custom Css Section
 * ----------------------------------------------------------------------------------------
 */

$wp_customize->add_section('adenit_custom', array(
	'title'			=> esc_html__( 'Custom CSS', 'aden' ),
	'priority'		=> 70
));

// Custom Css textarea Setting
$wp_customize->add_setting( 'adenit_custom[css]', array(
	'default'			=> '',
	'type'				=> 'option',
	'sanitize_callback' => 'adenit_textarea_callback'
));

// Custom Css textarea Control
$wp_customize->add_control( 'adenit_custom[css]', array(
    'type'		=> 'textarea',
    'section'	=> 'adenit_custom',
    'label'		=> esc_html__( 'Enter Custom CSS', 'aden' )
));


/**
 * ----------------------------------------------------------------------------------------
 * Google Analytics Css Section
 * ----------------------------------------------------------------------------------------
 */

$wp_customize->add_section('adenit_google_analytics', array(
	'title'			=> esc_html__( 'Google Analytics', 'aden' ),
	'priority'		=> 70
));

// Google Analytics Textarea Setting
$wp_customize->add_setting( 'adenit_google_analytics[code]', array(
	'default'			=> '',
	'type'				=> 'option',
	'sanitize_callback' => 'adenit_textarea_callback'
));

// Google Analytics Textarea Control
$wp_customize->add_control( 'adenit_google_analytics[code]', array(
    'type'		=> 'textarea',
    'section'	=> 'adenit_google_analytics',
    'label'		=> esc_html__( 'Enter Google Analytics Code', 'aden' )
));


}



/**
 * ----------------------------------------------------------------------------------------
 * Load Customizer Scripts
 * ----------------------------------------------------------------------------------------
 */

function adenit_customizer_scripts() {
	
	// Register style
	wp_register_style( 'adenit-customizer-css', ADENIT_THEMEROOT. '/framework/css/adenit-customizer.css');
	wp_register_style('adenit-font-awesome', ADENIT_THEMEROOT . '/css/font-awesome.min.css');

	// Register scripts 
	wp_register_script( 'adenit-customizer-js', ADENIT_THEMEROOT . '/framework/js/adenit-customizer.js', array( 'jquery' ), false, true );
	
	// Load the custom scripts
	wp_enqueue_script( 'adenit-customizer-js' );
	
	// Load the stylesheets
	wp_enqueue_style('adenit-customizer-css');
	wp_enqueue_style('adenit-font-awesome');
}


add_action( 'customize_controls_enqueue_scripts', 'adenit_customizer_scripts' );


function adenit_live_preview() {

	// Register scripts 
	wp_register_script( 'adenit-customizer-livepreview', ADENIT_THEMEROOT .'/framework/js/customizer-livepreview.js', array('jquery'), null, true );


	$adenit_options = array( 
		'topbar_color'	=> get_option('adenit_topbar_color'),
		'menu_color'	=> get_option('adenit_menu_color'),
		'general_color'	=> get_option('adenit_general_color'),
		'footer_color'	=> get_option('adenit_footer_color')
	);

	wp_localize_script( 'adenit-customizer-livepreview', 'adenit_options', $adenit_options );

	// Load the custom scripts
	wp_enqueue_script( 'adenit-customizer-livepreview' );

}

add_action( 'customize_preview_init', 'adenit_live_preview' );
