<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {
	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = 'theme1765';
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
	
	

}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {
	
	// Logo type
	$logo_type = array(
		"image_logo" => __("Image Logo", 'options_framework_theme'),
		"text_logo" => __("Text Logo", 'options_framework_theme')
	);
	
	// Search box in the header
	$g_search_box = array(
		"no" => "No",
		"yes" => "Yes"
	);
	
	// Background Defaults
	$background_defaults = array(
		'color' => '', 
		'image' => '', 
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll'
	);
	
	// Superfish fade-in animation
	$sf_f_animation_array = array(
		"show" => "Enable fade-in animation",
		"false" => "Disable fade-in animation"
	);
	
	// Superfish slide-down animation
	$sf_sl_animation_array = array(
		"show" => "Enable slide-down animation",
		"false" => "Disable slide-down animation"
	);
	
	// Superfish animation speed
	$sf_speed_array = array(
		"slow" => "Slow","normal" => "Normal",
		"fast" => "Fast"
	);
	
	// Superfish arrows markup
	$sf_arrows_array = array(
		"true" => "Yes",
		"false" => "No"
	);
	
	// Superfish shadows
	$sf_shadows_array = array(
		"true" => "Yes",
		"false" => "No"
	);
        
        // Footer Logo type
	$f_logo_type = array(
		"f_image_logo" => __("Image Logo", 'options_framework_theme'),
		"f_text_logo" => __("Text Logo", 'options_framework_theme')
	);
	
	
	// Fonts
	$typography_mixed_fonts = array_merge( options_typography_get_os_fonts() , options_typography_get_google_fonts() );
	asort($typography_mixed_fonts);
	
	
		
	// Footer menu
	$footer_menu_array = array("true" => "Yes","false" => "No");
	
	// Featured image size on the blog.
	$post_image_size_array = array("normal" => "Normal size","large" => "Large size");
	
	// Featured image size on the single page.
	$single_image_size_array = array("normal" => "Normal size","large" => "Large size");
	
	// Meta for blog
	$post_meta_array = array("true" => "Yes","false" => "No");
	
	// Meta for blog
	$post_excerpt_array = array(
		"true" => "Yes",
		"false" => "No"
	);
	
	
	
	
	
	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
		
	// If using image radio buttons, define a directory path
	$imagepath =  get_bloginfo('template_directory') . '/includes/images/';
		
	$options = array();
	
	$options[] = array( "name" => "General",
						"type" => "heading");
	
	$options['body_background'] = array( 
						"name" =>  "Body styling",
						"desc" => "Change the background style.",
						"id" => "body_background",
						"std" => $background_defaults, 
						"type" => "background");
	
	$options['header_color'] = array( "name" => "Header background color",
						"desc" => "Change the header background color.",
						"id" => "header_color",
						"std" => "",
						"type" => "color");
	
	$options['links_color'] = array( "name" => "Buttons and links color",
						"desc" => "Change the color of buttons and links.",
						"id" => "links_color",
						"std" => "",
						"type" => "color");
	
	$options['google_mixed_2'] = array( 'name' => 'Headings',
						'desc' => 'Choose your prefered font for headings and titles. <em>Note: * near the font meens that font from the <a href="http://www.google.com/webfonts">Google Web Fonts</a> library.</em>',
						'id' => 'google_mixed_2',
						'std' => array( 'size' => '24px', 'face' => 'Arial', 'color' => '#222'),
						'type' => 'typography',
						'options' => array(
								'faces' => $typography_mixed_fonts )
						);
						
						
	$options['google_mixed_3'] = array( 'name' => 'Body Text',
						'desc' => 'Choose your prefered font for body text. <em>Note: * near the font meens that font from the <a href="http://www.google.com/webfonts">Google Web Fonts</a> library.</em>',
						'id' => 'google_mixed_3',
						'std' => array( 'size' => '11px', 'face' => 'arial', 'color' => '#8f8f8f'),
						'type' => 'typography',
						'options' => array(
								'faces' => $typography_mixed_fonts )
						);
	
        $options[] = array( "name" => "Home Title",
						"desc" => "Enter Your Home Title used on Latest Videos section.",
						"id" => "home_title",
						"std" => "Latest Videos",
						"type" => "text");
	
	$options[] = array( "name" => "E-mail label",
						"desc" => "E-mail label",
						"id" => "email_label",
						"std" => "email:",
						"class" => "mini",
						"type" => "text");
        
        $options[] = array( "name" => "E-mail address",
						"desc" => "E-mail address",
						"id" => "email_address",
						"std" => "info@demolink.org",
						"class" => "tiny",
						"type" => "text");
	
	$options[] = array( "name" => "Custom CSS",
						"desc" => "Want to add any custom CSS code? Put in here, and the rest is taken care of. This overrides any other stylesheets. eg: a.button{color:green}",
						"id" => "custom_css",
						"std" => "",
						"type" => "textarea");
	
	
	
	
	
	$options[] = array( "name" => "Logo",
						"type" => "heading");
	
	$options['logo_type'] = array( "name" => "What kind of logo?",
						"desc" => "Select whether you want your main logo to be an image or text. If you select 'image' you can put in the image url in the next option, and if you select 'text' your Site Title will show instead.",
						"id" => "logo_type",
						"std" => "image_logo",
						"type" => "radio",
						"options" => $logo_type);
	
	$options['logo_url'] = array( "name" => "Logo Image Path",
						"desc" => "Enter the direct path to your logo image. For example http://your_website_url_here/wp-content/themes/themeXXXX/images/logo.png",
						"id" => "logo_url",
						"type" => "upload");
	
	
	$options[] = array( "name" => "Navigation",
						"type" => "heading");
	
	$options[] = array( "name" => "Delay",
						"desc" => "miliseconds delay on mouseout.",
						"id" => "sf_delay",
						"std" => "1000",
						"class" => "mini",
						"type" => "text");
	
	$options[] = array( "name" => "Fade-in animation",
						"desc" => "Fade-in animation.",
						"id" => "sf_f_animation",
						"std" => "show",
						"type" => "radio",
						"options" => $sf_f_animation_array);
	
	$options[] = array( "name" => "Slide-down animation",
						"desc" => "Slide-down animation.",
						"id" => "sf_sl_animation",
						"std" => "show",
						"type" => "radio",
						"options" => $sf_sl_animation_array);
	
	$options[] = array( "name" => "Speed",
						"desc" => "Animation speed.",
						"id" => "sf_speed",
						"type" => "select",
						"std" => "normal",
						"class" => "tiny", //mini, tiny, small
						"options" => $sf_speed_array);
	
	$options[] = array( "name" => "Arrows markup",
						"desc" => "Do you want to generate arrow mark-up?",
						"id" => "sf_arrows",
						"std" => "true",
						"type" => "radio",
						"options" => $sf_arrows_array);
	
	$options[] = array( "name" => "Drop shadows",
						"desc" => "Drop shadows (for submenu)",
						"id" => "sf_shadows",
						"std" => "false",
						"type" => "radio",
						"options" => $sf_shadows_array);
	
	
	
		
	
	
	$options[] = array( "name" => "Blog",
						"type" => "heading");
	
	$options[] = array( "name" => "Blog Title",
						"desc" => "Enter Your Blog Title used on Blog page.",
						"id" => "blog_text",
						"std" => "Blog",
						"type" => "text");
	
	$options[] = array( "name" => "Related Posts Title",
						"desc" => "Enter Your Title used on Single Post page for related posts.",
						"id" => "blog_related",
						"std" => "Related Posts",
						"type" => "text");
	
	$options['blog_sidebar_pos'] = array( "name" => "Sidebar position",
						"desc" => "Choose sidebar position.",
						"id" => "blog_sidebar_pos",
						"std" => "right",
						"type" => "images",
						"options" => array(
							'left' => $imagepath . '2cl.png',
							'right' => $imagepath . '2cr.png',)
						);
	
	$options['post_image_size'] = array( "name" => "Blog image size",
						"desc" => "Featured image size on the blog.",
						"id" => "post_image_size",
						"type" => "select",
						"std" => "normal",
						"class" => "small", //mini, tiny, small
						"options" => $post_image_size_array);
	
	$options['single_image_size'] = array( "name" => "Single post image size",
						"desc" => "Featured image size on the single page.",
						"id" => "single_image_size",
						"type" => "select",
						"std" => "normal",
						"class" => "small", //mini, tiny, small
						"options" => $single_image_size_array);
	
	$options['post_meta'] = array( "name" => "Enable Meta for blog posts?",
						"desc" => "Enable or Disable meta information for blog posts.",
						"id" => "post_meta",
						"std" => "true",
						"type" => "radio",
						"options" => $post_meta_array);
	
	$options['post_excerpt'] = array( "name" => "Enable excerpt for blog posts?",
						"desc" => "Enable or Disable excerpt for blog posts.",
						"id" => "post_excerpt",
						"std" => "true",
						"type" => "radio",
						"options" => $post_excerpt_array);
	
	
	
	
	$options[] = array( "name" => "Footer",
						"type" => "heading");
        
        $options['f_logo_type'] = array( "name" => "What kind of footer logo?",
						"desc" => "Select whether you want your footer logo to be an image or text. If you select 'image' you can put in the image url in the next option, and if you select 'text' your Site Title will show instead.",
						"id" => "f_logo_type",
						"std" => "f_image_logo",
						"type" => "radio",
						"options" => $f_logo_type);
	
	$options['f_logo_url'] = array( "name" => "Footer Logo Image Path",
						"desc" => "Enter the direct path to your logo image. For example http://your_website_url_here/wp-content/themes/themeXXXX/images/footer-logo.png",
						"id" => "f_logo_url",
						"type" => "upload");
        
        $options['f_desc'] = array( "name" => "Footer description text",
						"desc" => "Enter text used under the footer logo. HTML tags are allowed.",
						"id" => "f_desc",
						"std" => "",
						"type" => "textarea");
	
	$options['footer_text'] = array( "name" => "Footer copyright text",
						"desc" => "Enter text used in the right side of the footer. HTML tags are allowed.",
						"id" => "footer_text",
						"std" => "",
						"type" => "textarea");
	
	$options[] = array( "name" => "Google Analytics Code",
						"desc" => "You can paste your Google Analytics or other tracking code in this box. This will be automatically added to the footer.",
						"id" => "ga_code",
						"std" => "",
						"type" => "textarea");
	
	$options['feed_url'] = array( "name" => "Feedburner URL",
						"desc" => "Feedburner is a Google service that takes care of your RSS feed. Paste your Feedburner URL here to let readers see it in your website.",
						"id" => "feed_url",
						"std" => "",
						"type" => "text");
	
	$options['footer_menu'] = array( "name" => "Display Footer menu?",
						"desc" => "Do you want to display footer menu?",
						"id" => "footer_menu",
						"std" => "true",
						"type" => "radio",
						"options" => $footer_menu_array);
	
	return $options;
}

/* 
 * This is an example of how to add custom scripts to the options panel.
 * This example shows/hides an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function($) {

	$('#example_showhidden').click(function() {
  		$('#section-example_text_hidden').fadeToggle(400);
	});
	
	if ($('#example_showhidden:checked').val() !== undefined) {
		$('#section-example_text_hidden').show();
	}
	
});
</script>

<?php
}


/**
* Front End Customizer
*
* WordPress 3.4 Required
*/
add_action( 'customize_register', 'theme1765_register' );
function theme1765_register($wp_customize) {
	/**
	 * This is optional, but if you want to reuse some of the defaults
	 * or values you already have built in the options panel, you
	 * can load them into $options for easy reference
	 */
	$options = optionsframework_options();
	
	
	
	/*-----------------------------------------------------------------------------------*/
	/*	General
	/*-----------------------------------------------------------------------------------*/
	$wp_customize->add_section( 'theme1765_header', array(
		'title' => __( 'General', 'theme1765' ),
		'priority' => 200
	));
	
	/* Background Image*/
	$wp_customize->add_setting( 'theme1765[body_background][image]', array(
		'default' => $options['body_background']['std']['image'],
		'type' => 'option'
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'body_background_image', array(
		'label'   => 'Background Image',
		'section' => 'theme1765_header',
		'settings'   => 'theme1765[body_background][image]'
	) ) );
	
	
	/* Background Color*/
	$wp_customize->add_setting( 'theme1765[body_background][color]', array(
		'default' => $options['body_background']['std']['color'],
		'type' => 'option'
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_background', array(
		'label'   => 'Background Color',
		'section' => 'theme1765_header',
		'settings'   => 'theme1765[body_background][color]'
	) ) );
	
	/* Header Color */
	$wp_customize->add_setting( 'theme1765[header_color]', array(
		'default' => $options['header_color']['std'],
		'type' => 'option'
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_color', array(
		'label'   => $options['header_color']['name'],
		'section' => 'theme1765_header',
		'settings'   => 'theme1765[header_color]'
	) ) );
	
	
	/* Buttons and Links Color */
	$wp_customize->add_setting( 'theme1765[links_color]', array(
		'default' => $options['links_color']['std'],
		'type' => 'option'
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'links_color', array(
		'label'   => $options['links_color']['name'],
		'section' => 'theme1765_header',
		'settings'   => 'theme1765[links_color]'
	) ) );

	
	/* Headings Font Face */
	$wp_customize->add_setting( 'theme1765[google_mixed_2][face]', array(
		'default' => $options['google_mixed_2']['std']['face'],
		'type' => 'option'
	) );
	
	$wp_customize->add_control( 'theme1765_google_mixed_2', array(
			'label' => $options['google_mixed_2']['name'],
			'section' => 'theme1765_header',
			'settings' => 'theme1765[google_mixed_2][face]',
			'type' => 'select',
			'choices' => $options['google_mixed_2']['options']['faces']
	) );
	
	/* Body Font Face */
	$wp_customize->add_setting( 'theme1765[google_mixed_3][face]', array(
		'default' => $options['google_mixed_3']['std']['face'],
		'type' => 'option'
	) );
	
	$wp_customize->add_control( 'theme1765_google_mixed_3', array(
			'label' => $options['google_mixed_3']['name'],
			'section' => 'theme1765_header',
			'settings' => 'theme1765[google_mixed_3][face]',
			'type' => 'select',
			'choices' => $options['google_mixed_3']['options']['faces']
	) );
	
	/* Search Box */
	$wp_customize->add_setting( 'theme1765[g_search_box_id]', array(
			'default' => $options['post_excerpt']['std'],
			'type' => 'option'
	) );
	$wp_customize->add_control( 'theme1765_g_search_box_id', array(
			'label' => $options['g_search_box_id']['name'],
			'section' => 'theme1765_header',
			'settings' => 'theme1765[g_search_box_id]',
			'type' => $options['g_search_box_id']['type'],
			'choices' => $options['g_search_box_id']['options']
	) );
	
	
	/*-----------------------------------------------------------------------------------*/
	/*	Logo
	/*-----------------------------------------------------------------------------------*/
	
	$wp_customize->add_section( 'theme1765_logo', array(
		'title' => __( 'Logo', 'theme1765' ),
		'priority' => 201
	) );
	
	/* Logo Type */
	$wp_customize->add_setting( 'theme1765[logo_type]', array(
			'default' => $options['logo_type']['std'],
			'type' => 'option'
	) );
	$wp_customize->add_control( 'theme1765_logo_type', array(
			'label' => $options['logo_type']['name'],
			'section' => 'theme1765_logo',
			'settings' => 'theme1765[logo_type]',
			'type' => $options['logo_type']['type'],
			'choices' => $options['logo_type']['options']
	) );
	
	/* Logo Path */
	$wp_customize->add_setting( 'theme1765[logo_url]', array(
		'type' => 'option'
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_url', array(
		'label' => $options['logo_url']['name'],
		'section' => 'theme1765_logo',
		'settings' => 'theme1765[logo_url]'
	) ) );
	
	
	
	/*-----------------------------------------------------------------------------------*/
	/*	Slider
	/*-----------------------------------------------------------------------------------*/
	
	$wp_customize->add_section( 'theme1765_slider', array(
		'title' => __( 'Slider', 'theme1765' ),
		'priority' => 202
	) );
	
	/* Slider Effect */
	$wp_customize->add_setting( 'theme1765[sl_effect]', array(
			'default' => $options['sl_effect']['std'],
			'type' => 'option'
	) );
	$wp_customize->add_control( 'theme1765_sl_effect', array(
			'label' => $options['sl_effect']['name'],
			'section' => 'theme1765_slider',
			'settings' => 'theme1765[sl_effect]',
			'type' => $options['sl_effect']['type'],
			'choices' => $options['sl_effect']['options']
	) );
	
	/* Slices */
	$wp_customize->add_setting( 'theme1765[sl_slices]', array(
			'default' => $options['sl_slices']['std'],
			'type' => 'option'
	) );
	$wp_customize->add_control( 'theme1765_sl_slices', array(
			'label' => $options['sl_slices']['name'],
			'section' => 'theme1765_slider',
			'settings' => 'theme1765[sl_slices]',
			'type' => $options['sl_slices']['type'],
			'choices' => $options['sl_slices']['options']
	) );
	
	/* Box columns */
	$wp_customize->add_setting( 'theme1765[sl_box_columns]', array(
			'default' => $options['sl_box_columns']['std'],
			'type' => 'option'
	) );
	$wp_customize->add_control( 'theme1765_sl_box_columns', array(
			'label' => $options['sl_box_columns']['name'],
			'section' => 'theme1765_slider',
			'settings' => 'theme1765[sl_box_columns]',
			'type' => $options['sl_box_columns']['type'],
			'choices' => $options['sl_box_columns']['options']
	) );
	
	/* Box rows */
	$wp_customize->add_setting( 'theme1765[sl_box_rows]', array(
			'default' => $options['sl_box_rows']['std'],
			'type' => 'option'
	) );
	$wp_customize->add_control( 'theme1765_sl_box_rows', array(
			'label' => $options['sl_box_rows']['name'],
			'section' => 'theme1765_slider',
			'settings' => 'theme1765[sl_box_rows]',
			'type' => $options['sl_box_rows']['type'],
			'choices' => $options['sl_box_rows']['options']
	) );
	
	
	/* Animation speed */
	$wp_customize->add_setting( 'theme1765[sl_animation_speed]', array(
			'default' => $options['sl_animation_speed']['std'],
			'type' => 'option'
	) );
	$wp_customize->add_control( 'theme1765_sl_animation_speed', array(
			'label' => $options['sl_animation_speed']['name'],
			'section' => 'theme1765_slider',
			'settings' => 'theme1765[sl_animation_speed]',
			'type' => $options['sl_animation_speed']['type']
	) );
	
	/* Pause time */
	$wp_customize->add_setting( 'theme1765[sl_pausetime]', array(
			'default' => $options['sl_pausetime']['std'],
			'type' => 'option'
	) );
	$wp_customize->add_control( 'theme1765_sl_pausetime', array(
			'label' => $options['sl_pausetime']['name'],
			'section' => 'theme1765_slider',
			'settings' => 'theme1765[sl_pausetime]',
			'type' => $options['sl_pausetime']['type']
	) );
	
	
	/* Display next & prev navigation? */
	$wp_customize->add_setting( 'theme1765[sl_dir_nav]', array(
			'default' => $options['sl_dir_nav']['std'],
			'type' => 'option'
	) );
	$wp_customize->add_control( 'theme1765_sl_dir_nav', array(
			'label' => $options['sl_dir_nav']['name'],
			'section' => 'theme1765_slider',
			'settings' => 'theme1765[sl_dir_nav]',
			'type' => $options['sl_dir_nav']['type'],
			'choices' => $options['sl_dir_nav']['options']
	) );
	
	
	/* Display next & prev navigation only on hover? */
	$wp_customize->add_setting( 'theme1765[sl_dir_nav_hide]', array(
			'default' => $options['sl_dir_nav_hide']['std'],
			'type' => 'option'
	) );
	$wp_customize->add_control( 'theme1765_sl_dir_nav_hide', array(
			'label' => $options['sl_dir_nav_hide']['name'],
			'section' => 'theme1765_slider',
			'settings' => 'theme1765[sl_dir_nav_hide]',
			'type' => $options['sl_dir_nav_hide']['type'],
			'choices' => $options['sl_dir_nav_hide']['options']
	) );
	
	
	/* Show pagination? */
	$wp_customize->add_setting( 'theme1765[sl_control_nav]', array(
			'default' => $options['sl_control_nav']['std'],
			'type' => 'option'
	) );
	$wp_customize->add_control( 'theme1765_sl_control_nav', array(
			'label' => $options['sl_control_nav']['name'],
			'section' => 'theme1765_slider',
			'settings' => 'theme1765[sl_control_nav]',
			'type' => $options['sl_control_nav']['type'],
			'choices' => $options['sl_control_nav']['options']
	) );
	
	
	
	
	/*-----------------------------------------------------------------------------------*/
	/*	Blog
	/*-----------------------------------------------------------------------------------*/
	
	
	$wp_customize->add_section( 'theme1765_blog', array(
			'title' => __( 'Blog', 'theme1765' ),
			'priority' => 203
	) );
	
	/* Blog image size */
	$wp_customize->add_setting( 'theme1765[post_image_size]', array(
			'default' => $options['post_image_size']['std'],
			'type' => 'option'
	) );
	$wp_customize->add_control( 'theme1765_post_image_size', array(
			'label' => $options['post_image_size']['name'],
			'section' => 'theme1765_blog',
			'settings' => 'theme1765[post_image_size]',
			'type' => $options['post_image_size']['type'],
			'choices' => $options['post_image_size']['options']
	) );
	
	/* Single post image size */
	$wp_customize->add_setting( 'theme1765[single_image_size]', array(
			'default' => $options['single_image_size']['std'],
			'type' => 'option'
	) );
	$wp_customize->add_control( 'theme1765_single_image_size', array(
			'label' => $options['single_image_size']['name'],
			'section' => 'theme1765_blog',
			'settings' => 'theme1765[single_image_size]',
			'type' => $options['single_image_size']['type'],
			'choices' => $options['single_image_size']['options']
	) );
	
	/* Post Meta */
	$wp_customize->add_setting( 'theme1765[post_meta]', array(
			'default' => $options['post_meta']['std'],
			'type' => 'option'
	) );
	$wp_customize->add_control( 'theme1765_post_meta', array(
			'label' => $options['post_meta']['name'],
			'section' => 'theme1765_blog',
			'settings' => 'theme1765[post_meta]',
			'type' => $options['post_meta']['type'],
			'choices' => $options['post_meta']['options']
	) );
	
	/* Post Excerpt */
	$wp_customize->add_setting( 'theme1765[post_excerpt]', array(
			'default' => $options['post_excerpt']['std'],
			'type' => 'option'
	) );
	$wp_customize->add_control( 'theme1765_post_excerpt', array(
			'label' => $options['post_excerpt']['name'],
			'section' => 'theme1765_blog',
			'settings' => 'theme1765[post_excerpt]',
			'type' => $options['post_excerpt']['type'],
			'choices' => $options['post_excerpt']['options']
	) );
	
	
	
	/*-----------------------------------------------------------------------------------*/
	/*	Footer
	/*-----------------------------------------------------------------------------------*/
	
	$wp_customize->add_section( 'theme1765_footer', array(
		'title' => __( 'Footer', 'theme1765' ),
		'priority' => 204
	) );
		
	/* Footer Copyright Text */
	$wp_customize->add_setting( 'theme1765[footer_text]', array(
			'default' => $options['footer_text']['std'],
			'type' => 'option'
	) );
	$wp_customize->add_control( 'theme1765_footer_text', array(
			'label' => $options['footer_text']['name'],
			'section' => 'theme1765_footer',
			'settings' => 'theme1765[footer_text]',
			'type' => 'text'
	) );
	
	
	/* Display Footer Menu */
	$wp_customize->add_setting( 'theme1765[footer_menu]', array(
			'default' => $options['footer_menu']['std'],
			'type' => 'option'
	) );
	$wp_customize->add_control( 'theme1765_footer_menu', array(
			'label' => $options['footer_menu']['name'],
			'section' => 'theme1765_footer',
			'settings' => 'theme1765[footer_menu]',
			'type' => $options['footer_menu']['type'],
			'choices' => $options['footer_menu']['options']
	) );
	

	
	};