<?php

	$functions_path = TEMPLATEPATH . '/functions/';
	$includes_path = TEMPLATEPATH . '/includes/';
	
	//Loading jQuery and Scripts
	require_once $includes_path . 'theme-scripts.php';
	
	//Widget and Sidebar
	require_once $includes_path . 'sidebar-init.php';
	require_once $includes_path . 'register-widgets.php';
	
	//Theme initialization
	require_once $includes_path . 'theme-init.php';
	
	//Additional function
	require_once $includes_path . 'theme-function.php';
	
	//Shortcodes
	require_once $includes_path . 'theme_shortcodes/shortcodes.php';
	include_once(TEMPLATEPATH . '/includes/theme_shortcodes/alert.php');
	include_once(TEMPLATEPATH . '/includes/theme_shortcodes/tabs.php');
	include_once(TEMPLATEPATH . '/includes/theme_shortcodes/toggle.php');
	include_once(TEMPLATEPATH . '/includes/theme_shortcodes/html.php');
	
	//tinyMCE includes
	include_once(TEMPLATEPATH . '/includes/theme_shortcodes/tinymce/tinymce_shortcodes.php');
	
	//Aqua Resizer for image cropping and resizing on the fly
	require_once $includes_path . 'aq_resizer.php';
	
	// Add the postmeta
	include("includes/theme-postmeta.php");
	
	// Add the postmeta to Portfolio posts
	include("includes/theme-portfoliometa.php");
	
	
	//Loading theme textdomain
	load_theme_textdomain( 'theme1765', TEMPLATEPATH . '/languages' );
	
	//Loading options.php for theme customizer
	require_once dirname( __FILE__ ) . '/options.php';
	
        // removes detailed login error information for security
	add_filter('login_errors',create_function('$a', "return null;"));
	
	/* 
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */
	if ( !function_exists( 'optionsframework_init' ) ) {
		define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_bloginfo('template_directory') . '/admin/' );
		require_once dirname( __FILE__ ) . '/admin/options-framework.php';
	}
	
	
	
		
	// Removes Trackbacks from the comment cout
	add_filter('get_comments_number', 'comment_count', 0);
	function comment_count( $count ) {
		if ( ! is_admin() ) {
			global $id;
			$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
			return count($comments_by_type['comment']);
		} else {
			return $count;
		}
	}
	
	
	// Post Formats
	$formats = array( 
				'aside', 
				'gallery', 
				'link', 
				'image', 
				'quote', 
				'audio',
				'video');

	add_theme_support( 'post-formats', $formats ); 

	add_post_type_support( 'post', 'post-formats' );
	
	
	
	// Custom excpert length
	function new_excerpt_length($length) {
	return 60;
	}
	add_filter('excerpt_length', 'new_excerpt_length');
  
	
	// enable shortcodes in sidebar
	add_filter('widget_text', 'do_shortcode');
	
	// custom excerpt ellipses for 2.9+
	function custom_excerpt_more($more) {
		return 'Read More &raquo;';
	}
	add_filter('excerpt_more', 'custom_excerpt_more');
	// no more jumping for read more link
	function no_more_jumping($post) {
		return '&nbsp;<a href="'.get_permalink($post->ID).'" class="read-more">'.'Continue Reading'.'</a>';
	}
	add_filter('excerpt_more', 'no_more_jumping');
	
	
	// category id in body and post class
	function category_id_class($classes) {
		global $post;
		foreach((get_the_category($post->ID)) as $category)
			$classes [] = 'cat-' . $category->cat_ID . '-id';
			return $classes;
	}
	
	add_filter('post_class', 'category_id_class');
	add_filter('body_class', 'category_id_class');
        
        function wp28041_get_prev_post_sort($where){
    return 'ORDER BY post_title DESC LIMIT 1';
}
add_filter('get_prev_post_sort', 'wp28041_get_prev_post_sort');
        
       function wp28041_get_next_post_sort($where){
    return 'ORDER BY post_title ASC LIMIT 1';
}
add_filter('get_next_post_sort', 'wp28041_get_next_post_sort');
register_sidebar( array(
  'name' => __( 'Sponsor Home', 'theme1765' ),
  'id' => 'sponsor_home_banner',  
 ) );

register_sidebar( array(
  'name' => __( 'Sponsor Sidebar', 'theme1765' ),
  'id' => 'sponsor_sidebar_banner',  
 ) );
register_sidebar( array(
  'name' => __( 'Home', 'theme1765' ),
  'id' => 'home_banner',  
 ) );
register_sidebar( array(
  'name' => __( 'Home Sidebar1', 'theme1765' ),
  'id' => 'home_sidebar_banner1',  
 ) );

register_sidebar( array(
  'name' => __( 'Boxing Catgeory', 'theme1765' ),
  'id' => 'boxing_banner',  
 ) );

register_sidebar( array(
  'name' => __( 'Boxing Right', 'theme1765' ),
  'id' => 'boxing_banner1',  
 ) );

register_sidebar( array(
  'name' => __( 'Default Right Banner', 'theme1765' ),
  'id' => 'default_right_banner',  
 ) );


register_sidebar( array(
  'name' => __( 'Video Top', 'theme1765' ),
  'id' => 'video_top',  
 ) );

register_sidebar( array(
  'name' =>  'video Right', 
'before_title' => '<h3>',
            'after_title' => '</h3>', 
 ) );


register_sidebar( array(
  'name' =>  'Coverage Top', 
'before_title' => '<h3>',
            'after_title' => '</h3>', 
 ) );
register_sidebar( array(
  'name' =>  'Coverage Right',
 'before_title' => '<h3>',
            'after_title' => '</h3>',  
 ) );

register_sidebar( array(
  'name' =>'Blog Top', 
 'before_title' => '<h3>',
            'after_title' => '</h3>', 
 ) );

register_sidebar( array(
  'name' => 'About Top', 
 'before_title' => '<h3>',
            'after_title' => '</h3>', 
 ) );

register_sidebar( array(
  'name' => 'About Right',
 'before_title' => '<h3>',
            'after_title' => '</h3>',  
 ) );

register_sidebar( array(
  'name' =>  'Advertising Top', 
 'before_title' => '<h3>',
            'after_title' => '</h3>',   
 ) );


register_sidebar( array(
  'name' => 'Advertising Right', 
 'before_title' => '<h3>',
            'after_title' => '</h3>',  
 ) );
register_sidebar( array(
  'name' => 'African-American/Caribbean Top',
'before_title' => '<h3>',
            'after_title' => '</h3>', 
 ) );

register_sidebar( array(
  'name' => 'Default Top Banner',
  'id' => 'blank1',
'before_title' => '<h3>',
            'after_title' => '</h3>', 
 ) );


register_sidebar( array(
  'name' =>  'African-American/Caribbean Right', 
'before_title' => '<h3>',
            'after_title' => '</h3>', 
 ) );

register_sidebar( array(
  'name' => 'Celebrities Top',
 'before_title' => '<h3>',
            'after_title' => '</h3>', 
 ) );


register_sidebar( array(
  'name' =>  'Celebrities Right',
  'id' => 'celeb-right',
  'before_title' => '<h3>',
            'after_title' => '</h3>', 
 ) );

register_sidebar( array(
  'name' =>'Cultural', 
 'before_title' => '<h3>',
            'after_title' => '</h3>', 
 ) );


register_sidebar( array(
  'name' => 'Cultural Right',
  'before_title' => '<h3>',
            'after_title' => '</h3>', 
 ) );

register_sidebar( array(
  'name' =>  'Business Top',
'before_title' => '<h3>',
            'after_title' => '</h3>', 
 ) );

register_sidebar( array(
  'name' => 'BusinessRight', 
  'before_title' => '<h3>',
            'after_title' => '</h3>', 
 ) );

register_sidebar( array(
  'name' =>  'Testimonials Top',
'before_title' => '<h3>',
            'after_title' => '</h3>', 
 ) );
register_sidebar( array(
  'name' =>  'Testimonials Right',
'before_title' => '<h3>',
            'after_title' => '</h3>', 
 ) );

register_sidebar( array(
  'name' =>'Entertainers', 
  'before_title' => '<h3>',
            'after_title' => '</h3>',  
 ) );


register_sidebar( array(
  'name' => 'Entertainers Right',
  'before_title' => '<h3>',
            'after_title' => '</h3>', 
 ) );

register_sidebar( array(
  'name' => 'Fashion', 
 'before_title' => '<h3>',
            'after_title' => '</h3>',  
 ) );


register_sidebar( array(
  'name' => 'Fashion Right',
'before_title' => '<h3>',
            'after_title' => '</h3>', 
 ) );

register_sidebar( array(
  'name' => 'Humanitarians',
  'before_title' => '<h3>',
            'after_title' => '</h3>', 
 ) );


register_sidebar( array(
  'name' =>  'Humanitarians Right', 
 'before_title' => '<h3>',
            'after_title' => '</h3>', 
 ) );

register_sidebar( array(
  'name' =>'Latino',
 'before_title' => '<h3>',
            'after_title' => '</h3>',   
 ) );


register_sidebar( array(
  'name' =>'Latino Right',
'before_title' => '<h3>',
            'after_title' => '</h3>',  
 ) );

register_sidebar( array(
  'name' => 'Legends',
'before_title' => '<h3>',
            'after_title' => '</h3>', 
 ) );


register_sidebar( array(
  'name' =>'Legends Right',
'before_title' => '<h3>',
            'after_title' => '</h3>',  
 ) );


register_sidebar( array(
  'name' =>'LGBT',
  'before_title' => '<h3>',
            'after_title' => '</h3>', 
 ) );


register_sidebar( array(
  'name' => __( 'LGBT Right', 'theme1765' ),
 'before_title' => '<h3>',
            'after_title' => '</h3>', 
 ) );

register_sidebar( array(
  'name' =>'Motor',
  'before_title' => '<h3>',
            'after_title' => '</h3>', 
 ) );


register_sidebar( array(
  'name' => __( 'Motor Right', 'theme1765' ),
  'id' => 'motor_banner1',  
 ) );


register_sidebar( array(
  'name' => 'Music',
'before_title' => '<h3>',
            'after_title' => '</h3>',  
 ) );


register_sidebar( array(
  'name' =>'Music Right',
  'before_title' => '<h3>',
            'after_title' => '</h3>', 
 ) );

register_sidebar( array(
  'name' => __( 'Politics', 'theme1765' ),
  'id' => 'politics_banner',  
 ) );


register_sidebar( array(
  'name' =>'Politics Right',
'before_title' => '<h3>',
            'after_title' => '</h3>', 
 ) );

register_sidebar( array(
  'name' => 'Product People',
 'before_title' => '<h3>',
            'after_title' => '</h3>',   
 ) );


register_sidebar( array(
  'name' => 'Product People Right',
 'before_title' => '<h3>',
            'after_title' => '</h3>',  
 ) );

register_sidebar( array(
  'name' => 'Sports',
  'before_title' => '<h3>',
            'after_title' => '</h3>',  
 ) );


register_sidebar( array(
  'name' => 'Sports Right',
 'before_title' => '<h3>',
            'after_title' => '</h3>',  
 ) );

register_sidebar( array(
  'name' =>'Technology',
'before_title' => '<h3>',
            'after_title' => '</h3>',  
 ) );


register_sidebar( array(
  'name' =>'Technology Right',
 'before_title' => '<h3>',
            'after_title' => '</h3>',  
 ) );

register_sidebar( array(
  'name' => 'Women',
  'before_title' => '<h3>',
            'after_title' => '</h3>',  
 ) );


register_sidebar( array(
  'name' =>'Women-Right',
  'before_title' => '<h3>',
            'after_title' => '</h3>',  
 ) );

register_sidebar( array(
  'name' => __( 'World Leaders', 'theme1765' ),
  'id' => 'world-leaders-banner',  
 ) );


register_sidebar(array('name'=>'World-Leaders-Right',            
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        )); 



register_sidebar(array('name'=>'pictures Top',            
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));  
        
        register_sidebar(array('name'=>'pictures-Right',            
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));  

register_sidebar(array('name'=>'join-us Top',            
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));  
        
        register_sidebar(array('name'=>'join-us Right',            
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));
    register_sidebar(array('name'=>'Contact Top',            
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));
 register_sidebar(array('name'=>'Archives Top',            
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));
 register_sidebar(array('name'=>'Archives Right',            
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));
 register_sidebar(array('name'=>'Sponsors & Media Top',            
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));
 register_sidebar(array('name'=>'Sponsors & Media Right',            
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));




function add_first_and_last($output) {
  $output = preg_replace('/class="menu-item/', 'class="first-menu-item menu-item', $output, 1);
  $output = substr_replace($output, 'class="last-menu-item menu-item', strripos($output, 'class="menu-item'), strlen('class="menu-item'));
  return $output;
}
add_filter('wp_nav_menu', 'add_first_and_last');

?>