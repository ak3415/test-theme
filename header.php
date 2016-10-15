<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes();?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes();?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes();?>> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" <?php language_attributes();?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes();?>> <!--<![endif]-->
<head>
	<title><?php if ( is_category() ) {
		echo __('Category Archive for &quot;', 'theme1765'); single_cat_title(); echo __('&quot; | ', 'theme1765'); bloginfo( 'name' );
	} elseif ( is_tag() ) {
		echo __('Tag Archive for &quot;', 'theme1765'); single_tag_title(); echo __('&quot; | ', 'theme1765'); bloginfo( 'name' );
	} elseif ( is_archive() ) {
		wp_title(''); echo __(' Archive | ', 'theme1765'); bloginfo( 'name' );
	} elseif ( is_search() ) {
		echo __('Search for &quot;', 'theme1765').wp_specialchars($s).__('&quot; | ', 'theme1765'); bloginfo( 'name' );
	} elseif ( is_home() || is_front_page()) {
		bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
	}  elseif ( is_404() ) {
		echo __('Error 404 Not Found | ', 'theme1765'); bloginfo( 'name' );
	} elseif ( is_single() ) {
		wp_title('');
	} else {
		echo wp_title( ' | ', false, right ); bloginfo( 'name' );
	} ?></title>
        
        <!--<meta name="keywords" content="<?php //if(!dynamic_sidebar('keywords')){} ?>" />-->
     <meta name="keywords" content="Business, Fashion, Technology, Environmental Issues, Humanity, Women's Issues, Food Wine, Culture, Health, Games, Boxing, Latino, African American, Books, LGBT" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="icon" href="<?php bloginfo( 'template_url' ); ?>/favicon.ico" type="image/x-icon" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />
	<?php /* The HTML5 Shim is required for older browsers, mainly older versions IE */ ?>
  <!--[if lt IE 8]>
    <div style=' clear: both; text-align:center; position: relative;'>
    	<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" alt="" /></a>
    </div>
  <![endif]-->
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/normalize.css" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/prettyPhoto.css" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/grid.css" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/style.css" />
  <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/validtaeform.js"></script>
	<?php
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
	
		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();
	?>
  <!--[if lt IE 9]>
  <style type="text/css">
    .border {
      behavior:url(<?php bloginfo('stylesheet_directory'); ?>/PIE.php)
      }
  </style>
  <![endif]-->
  
  <!-- script src="js/jquery.prettyPhoto2.js" type="text/javascript" charset="utf-8"></script 
 -->
 
  <script type="text/javascript">
  
  jQuery(document).ready(function() {      
  jQuery("a[rel^='WLTV']").prettyPhoto({
    theme: 'pp_default',
    changepicturecallback: onPictureChanged
  });

  function onPictureChanged() {
    var twitterDiv = jQuery('.twitter');
    twitterDiv.empty();

    jQuery('<a>', {
      'class': 'twitter-share-button',
      'text': 'Tweet',
      'data-url': location.href,
      'data-count': 'none',
      'href': 'http://twitter.com/share'      
    }).appendTo(twitterDiv);    

    twttr.widgets.load();    
  }     
});
  </script>
  

  <script type="text/javascript">
  	// initialise plugins
		jQuery(function(){
			// main navigation init
			jQuery('ul.sf-menu').superfish({
				delay:       <?php echo of_get_option('sf_delay'); ?>, 		// one second delay on mouseout 
				animation:   {opacity:'<?php echo of_get_option('sf_f_animation'); ?>'<?php if (of_get_option('sf_sl_animation')=='show') { ?>,height:'<?php echo of_get_option('sf_sl_animation'); ?>'<?php } ?>}, // fade-in and slide-down animation
				speed:       '<?php echo of_get_option('sf_speed'); ?>',  // faster animation speed 
				autoArrows:  <?php echo of_get_option('sf_arrows'); ?>,   // generation of arrow mark-up (for submenu) 
				dropShadows: <?php echo of_get_option('sf_shadows'); ?>   // drop shadows (for submenu)
			});
			
			// faded slider init
			jQuery("#faded").faded({
				speed: 500,
				crossfade: true,
				autopagination:false
			});
			
		});
		
		// Init for audiojs
		audiojs.events.ready(function() {
			var as = audiojs.createAll();
		});
		
		// Init for si.files
		SI.Files.stylizeAll();
  </script>
  
  <style type="text/css">
		
		<?php $background = of_get_option('body_background');
			if ($background != '') {
				if ($background['image'] != '') {
					echo 'body { background-image:url('.$background['image']. '); background-repeat:'.$background['repeat'].'; background-position:'.$background['position'].';  background-attachment:'.$background['attachment'].'; }';
				}
				if($background['color'] != '') {
					echo 'body { background-color:'.$background['color']. '}';
				}
			};
		?>
		
		<?php $header_styling = of_get_option('header_color'); 
			if($header_styling != '') {
				echo '#header {background-color:'.$header_styling.'}';
			}
		?>
		
		<?php $links_styling = of_get_option('links_color'); 
			if($links_styling) {
				echo 'a{color:'.$links_styling.'}';
				echo '.button {background:'.$links_styling.'}';
			}
		?>
		
		<?php $body_typography = of_get_option('body_typography'); 
			if($body_typography) {
				echo 'body {font-family:'.$body_typography['face'].'; color:'.$body_typography['color'].'}';
				echo '#main {font-size:'.$body_typography['size'].'; font-style:'.$body_typography['style'].';}';
			}
		?>
  </style>

</head>

<body <?php body_class(); ?>>

<div id="main"><!-- this encompasses the entire Web site -->
	<header id="header">
	 <div class="container_12 clearfix">
			<div class="grid_12" >


        <nav class="top-menu">
          <?php wp_nav_menu( array(
            'container'       => 'ul', 
            'menu_class'      => 'menu', 
            'menu_id'         => 'menu-top-menu',
            'depth'           => 0,
            'theme_location' => 'top_menu' /*, 
      	    'link_before' => '<span class="right">',
      	    'link_after' => '</span>' */
            )); 
          ?>
	</nav><!--.top-nav-->

      	<div class="logo">
          <?php if(of_get_option('logo_type') == 'text_logo'){?>
          	<?php if( is_front_page() || is_home() || is_404() ) { ?>
              <h1><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h1>
            <?php } else { ?>
              <h2><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h2>
            <?php } ?>
	    <p class="tagline"><?php bloginfo('description'); ?></p>
          <?php } else { ?>
          	<?php if(of_get_option('logo_url') != ''){ ?>
            	<a href="<?php bloginfo('url'); ?>/" id="logo"><img src="<?php echo of_get_option('logo_url', "" ); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>"></a>
            <?php } else { ?>
            	<a href="<?php bloginfo('url'); ?>/" id="logo"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>"></a>
            <?php } ?>
          <?php }?>

	<!-- Advertising widgets -->
	   <?php if (is_page('link-exchange')) { 
	   if ( ! dynamic_sidebar( 'Sponsor Home' ) ) { 
	   } }// end extra sidebar widget area 
	    elseif (is_page('sponsors-media')) { 
	   if ( ! dynamic_sidebar( 'Sponsors & Media Top' ) ) { 
	   } }// end extra sidebar widget area 
	    elseif(is_page('Home')) { 
	   if ( ! dynamic_sidebar( 'Home' ) ) { 
	   } } // end extra sidebar widget area 
	     elseif ( is_single('Boxing')) { 
	   if ( ! dynamic_sidebar('Boxing Catgeory') ) { 
	   } } // end extra sidebar widget area 
	   elseif ( is_single('African-American/Caribbean')) { 
	   if ( ! dynamic_sidebar('African-American/Caribbean Top') ) { 
	   } } 
	    elseif ( is_single('Business')) { 
	   if ( ! dynamic_sidebar('Business Top ') ) { 
	   } } 
	    elseif ( is_single('Celebrities')) { 
	   if ( ! dynamic_sidebar('Celebrities Top ') ) { 
	   } } 
	   elseif ( is_page('Testimonials')) { 
	   if ( ! dynamic_sidebar('Testimonials Top ') ) { 
	   } } 
	    elseif ( is_single('Cultural')) { 
	   if ( ! dynamic_sidebar('Cultural') ) { 
	   } } 
	    elseif ( is_single('Entertainers')) { 
	   if ( ! dynamic_sidebar('Entertainers') ) { 
	   } } 
	    elseif ( is_single('Fashion')) { 
	   if ( ! dynamic_sidebar('Fashion') ) { 
	   } } 
	    elseif ( is_single('Humanitarians')) { 
	   if ( ! dynamic_sidebar('Humanitarians') ) { 
	   } } 
	    elseif ( is_single('Latino')) { 
	   if ( ! dynamic_sidebar('Latino ') ) { 
	   } } 
	    elseif ( is_single('Legends')) { 
	   if ( ! dynamic_sidebar('Legends') ) { 
	   } } 
	    elseif ( is_single('LGBT')) { 
	   if ( ! dynamic_sidebar('LGBT') ) { 
	   } } 
	    elseif ( is_single('Motor')) { 
	   if ( ! dynamic_sidebar('Motor ') ) { 
	   } } 
	    elseif ( is_single('Music')) { 
	   if ( ! dynamic_sidebar('Music') ) { 
	   } } 
	    elseif ( is_single('Politics')) { 
	   if ( ! dynamic_sidebar('Politics') ) { 
	   } } 
	    elseif ( is_single('Product People')) { 
	   if ( ! dynamic_sidebar('Product People') ) { 
	   } } 
	    elseif ( is_single('Sports')) { 
	   if ( ! dynamic_sidebar('Sports') ) { 
	   } } 
	    elseif ( is_single('Technology')) { 
	   if ( ! dynamic_sidebar('Technology ') ) { 
	   } } 
	    elseif ( is_single('Women')) { 
	   if ( ! dynamic_sidebar('Women') ) { 
	   } } 
	    elseif ( is_single('World Leaders')) { 
	   if ( ! dynamic_sidebar('World Leaders ') ) { 
	   } } 
	    elseif ( is_page('pictures')) {
	   if ( ! dynamic_sidebar('pictures Top') ) { 
	   } } 
            elseif ( is_page('coverage')) { 
    	   if ( ! dynamic_sidebar('Coverage Top') ) { 
    	   } } 
	    elseif ( is_page('blog')) { 
    	   if ( ! dynamic_sidebar('Blog Top ') ) { 
    	   } }
	    elseif ( is_page('aabout-us')) { 
	   if ( ! dynamic_sidebar('About Top ') ) { 
	   } } 
	    elseif ( is_page('advertising')) { 
	   if ( ! dynamic_sidebar('Advertising Top') ) { 
	   } } 
	    elseif ( is_page('contacts')) { 
	   if ( ! dynamic_sidebar('Contact Top') ) { 
	   } } 
	    elseif ( is_page('archives')) { 
	   if ( ! dynamic_sidebar('Archives Top') ) { 
	   } } 
	    elseif ( is_page('join-us')) { 
	   if ( ! dynamic_sidebar('join-us Top') ) { 
	   } }
	    elseif ( is_page('videos')) { 
	   if ( ! dynamic_sidebar('Video Top') ) { 
	   } }
	    elseif (is_category('boxing')) { 
	   if ( ! dynamic_sidebar('Boxing Catgeory' ) ) { 
	   } }
	    elseif(is_category('business')) {
	   if( ! dynamic_sidebar( 'Business Top' ) ) { 
	   } }
	    elseif(is_category('celebrity')) {
	   if( ! dynamic_sidebar( 'Celebrities Top' ) ) { 
	   } }
	    elseif(is_category('cultural')) {
           if( ! dynamic_sidebar( 'Cultural' ) ) { 
	   } }
	    elseif(is_category('entertainment-videos')) {
	   if( ! dynamic_sidebar( 'Entertainers' ) ) { 
	   } }
	    elseif(is_category('fashion')) {
	   if( ! dynamic_sidebar( 'Fashion' ) ) { 
	   } }	
	    elseif(is_category('humanitarians')) {
	   if( ! dynamic_sidebar( 'Humanitarians' ) ) { 
	   } }
	    elseif(is_category('latino')) {
	   if( ! dynamic_sidebar( 'Latino' ) ) { 
	   } }
	    elseif(is_category('lgbt')) {
	   if( ! dynamic_sidebar( 'LGBT' ) ) { 
	   } }
	    elseif(is_category('motor')) {
	   if( ! dynamic_sidebar( 'Motor' ) ) { 
	   } }
	    elseif(is_category('politics')) {
	   if( ! dynamic_sidebar( 'Politics' ) ) { 
	   } }
	    elseif(is_category('product-people')) {
	   if( ! dynamic_sidebar( 'Product People' ) ) { 
	   } }
	    elseif(is_category('sports')) {
	   if( ! dynamic_sidebar( 'Sports' ) ) { 
	   } }
	    elseif(is_category('tech')) {
	   if( ! dynamic_sidebar( 'Technology' ) ) { 
	   } }		
	    elseif(is_category('african-american-or-caribbean')) {
	   if( ! dynamic_sidebar( 'African-American/Caribbean Top' ) ) { 
	   } }
	    elseif(is_page_template('blog-template')) {
	   if( ! dynamic_sidebar( 'Blog Top' ) ) { 
	   } }
	    else{
           if( ! dynamic_sidebar( 'blank1' ) ) : 
           endif;    
	} ?>

	<!-- End Advertising Widgets -->
        </div>
                            
                            
                            
                            
                            
        <nav class="primary">
          <?php wp_nav_menu( array(
            'container'       => 'ul', 
            'menu_class'      => 'sf-menu', 
            'menu_id'         => 'topnav',
            'depth'           => 0,
            'theme_location' => 'header_menu',
      	    'link_before' => '<span class="right">',
      	    'link_after' => '</span>'
            )); 
          ?>
        </nav><!--.primary-->
        <?php //if ( of_get_option('email_address') != '') { ?>  
              <div id="email-box">
                <span>Find Us on :</span>
                <ul class="social-links-header">
                    <li><a target="_blank" class="twitter1" href="https://twitter.com/WorldLibertyTV">Twitter<!--<img src="<?php bloginfo('template_url'); ?>/images/twitter-top.png" alt="Twitter" title="Twitter" />--></a></li>
                    <li><a target="_blank" class="facebook" href=" https://www.facebook.com/worldlibertytv?ref=hl">Facebook <!--<img src="<?php //bloginfo('template_url'); ?>/images/facebook-top.png" alt="Facebook" title="Facebook" />--></a></li>
                    <li><a target="_blank" class="linkedin" href="http://www.linkedin.com/pub/dr-adal-m-hussain-phd/70/50/428">LinkedIn<!--<img src=" <?php //bloginfo('template_url'); ?>/images/linkedin-top.png" alt="LinkedIn" title="LinkedIn" />--></a></li>
                    <li><a target="_blank" class="instagram" href="https://www.instagram.com/world_liberty_tv/">Instagram</a></li>
                     <!--<li><a target="_blank" class="rss" href="http://www.worldlibertytv.org/feed">Rss</a></li>-->
                </ul>
		<?php //echo of_get_option('email_label'); ?> <!--<a href="mailto:<?php //echo of_get_option('email_address'); ?>"><?php //echo of_get_option('email_address'); ?></a>-->
	    </div>
        <?php // } ?>
        <div id="widget-header">
            
         
            
              
                
         <div class="widget-header1 widget_my_bannerswidget1" id="my_bannerswidget-4" >   
                   
                   
                   
                  <h3 style="text-transform:capitalize;">Receive access to our exclusive newsletter!</h3>
                    <a id="newsletter-button" onclick="showpopup()" href="javascript:void(0)" title="SIGN UP TODAY">SIGN UP TODAY</a>
               </div>
              
             
                   
                   <?php  if(isset ($_POST['subscribe1'])){
                    $custname    =  trim($_POST['name1']);
                    $emailid     =  trim($_POST['emailid1']);
                   
                                 
                     $sender_name  = 'World Liberty TV';

                     $sender_email = 'brstdev@gmail.com'; 
                     $logo         =  get_bloginfo('url').'/wp-content/themes/theme1765/images/logo.png';
                     $logo1        = '<a target="_blank" href="#" ><img src="'.$logo.'" alt="World Liberty TV" title="World Liberty TV" /></a>';
                      
                   
                                             $to      = $emailid ;
                                             $subject = '***WLTV: Sign Up Form Submission' ;
                                             $message = '<body style="background:#F6F6F6; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; margin:0; padding:0;width:100%;">
                                                            <div style="background:#F6F6F6; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; margin:0 auto;width:980px; padding:0;">
                                                            <table cellspacing="0" cellpadding="0" border="0" height="100%" width="100%">
                                                                <tr>
                                                                    <td align="center" valign="top" style="padding:20px 0 20px 0">
                                                                        <!-- [ header starts here] -->
                                                                        <table bgcolor="FFFFFF" cellspacing="0" cellpadding="10" border="0"  style="border:1px solid #E0E0E0; margin: 0 auto;width:850px;margin-left:130px;line-height: 20px;">
                                                                            <tr>
                                                                                <td colspan="3" valign="top" style="background:#F5F4F4;padding: 16px;">'.$logo1.'</td>
                                                                            </tr>
                                                                            <!-- [ middle starts here] -->
                                                                            <tr>
                                                                                <td valign="top" style="border:1px solid #E0E0E0;">
                                                                                       <span>Hello '.$custname .',</span>
                                                                                       <table style=" font-size:14px; color: #333333; line-height:16px; margin:0 auto; padding:13px 18px;width:450px; background:#fff; line-height:20px;">
                                                                                             <tr><td><p style="font-size:12px; margin:0;">Thanks for contacing us.</p></td></tr>
                                                                                       </table>
                                                                                </td>
                                                                             
                                                                              </tr>
                                                                            
                                                                            <tr>
                                                                                <td colspan="3" bgcolor="#EAEAEA" align="center" style="background:#EAEAEA; text-align:center;"><center><p style="font-size:12px; margin:0;">Thank you </strong></p></center></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            </div>
                                                            </body>';
                                          
                                            $headers  = 'MIME-Version: 1.0' . "\r\n";
                                            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                                       
                                            // Additional headers
                                            //$headers .= "To: $emailid" . "\r\n";
                                            $sender_name1='World Liberty TV';
                                            $sender_email1='brstdev@gmail.com';
                                            $headers .= 'From:'.$sender_name1.'<'.$sender_email1 .'>' . "\r\n";
                                            mail($to, $subject, $message, $headers); 
               
                                  
                        //$to      = $sender_email;
                       $to      = 'worldlibertyTV@gmail.com';                     
                       $subject = 'Newsletter subscription confirmation' ;
                       $message = '<body style="background:#F6F6F6; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; margin:0; padding:0;width:100%;">
                                                            <div style="background:#F6F6F6; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; margin:0 auto; width:980px; padding:0;">
                                                            <table cellspacing="0" cellpadding="0" border="0" height="100%" width="100%">
                                                                <tr>
                                                                    <td align="center" valign="top" style="padding:20px 0 20px 0">
                                                                        <!-- [ header starts here] -->
                                                                        <table bgcolor="FFFFFF" cellspacing="0" cellpadding="10" border="0" width="850" style="border:1px solid #E0E0E0;">
                                                                            <tr>
                                                                                <td valign="top" style="background:#F5F4F4;padding:16px;">'.$logo1.'</td>
                                                                            </tr>
                                                                            <!-- [ middle starts here] -->
                                                                            <tr>
                                                                                <td valign="top">
                                                                                          <table style="border:1px solid #E0E0E0; font-size:12px; line-height:16px; margin:0 auto; margin-left:130px;padding:13px 18px;width:750px; background:#F9F9F9; line-height:20px;">
                                                                                             <tr>
                                                                                               <td>
                                                                                                  <table style=" font-size:14px; color: #333333; line-height:16px; margin:0 auto; padding:13px 18px;width:650px; background:#fff; line-height:20px;">
                                                                                                     <tr><td>Customer Name       :</td> <td>'.$custname.'</td></tr>
                                                                                                     <tr><td>Email Id            :</td> <td>'.$emailid.'</td></tr>
                                                                                                       
                                                                                                 </table> 
                                                                                               </td>
                                                                                             </tr>
                                                                                              
                                                                                       </table>
                                                                                </td>
                                                                            </tr>
                                                                             <tr>
                                                                                <td bgcolor="#EAEAEA" align="center" style="background:#EAEAEA; text-align:center;"><center><p style="font-size:12px; margin:0;">Thank you </strong></p></center></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            </div>
                                                            </body>';
                                            
                                            $headers  = 'MIME-Version: 1.0' . "\r\n";
                                            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                                       
                                            // Additional headers
                                            //$headers .= "To: $emailid" . "\r\n";
                                            $sender_name2='World Liberty TV';
                                            $sender_email2='brstdev@gmail.com';
                                            $headers .= 'From:'.$sender_name2.'<'.$sender_email2 .'>' . "\r\n";
                                             mail($to, $subject, $message, $headers); 
                         ?>
                   
                   
         
                   
                      <div id="success-msg"><p>Thanks for your subscription. We will contact you soon.</p>
                          <a href="http://brstdev.com/liberty/" onclick="hideall()">Click Here to Continue</a></div>
                      <script type="text/javascript">
                      jQuery(document).ready(function(){
                             jQuery('body').append('<div id="popup_overlay"></div>');
                             document.getElementById("succes-msg").style.display = 'block';
                         
                      });
                      function hideall(){
                           jQuery('body').find('#popup_overlay').remove();
                           document.getElementById("succes-msg").style.display = 'none;';
                          
                         //  parent.location.href='http://brstdev.com/liberty/';
                      }
                  
                  </script>
                <?php  }   ?>
               <div id="newsletter-div" style="display:none;">
                  <div class="newsletter">
                      <div class="newsletter-title"><h1>Join Our newsletter today!</h1></div>
                      <div class="description">
                          <p>When you subscribe to <b>World Liberty TV</b>, you will receive discounts and invitations to multi-cultural events, including trade shows, charity fundraisers, fashions shows,
                          cultural events, art gallery opening, business and political events and more.</p>
                          <p>Join <b>World Liberty TV</b> for FREE to access member-only features such as our discussions on multi-cultural issues and option to post your comments.</p>
                      </div>
                      <div class="newsletter-form">
                         
                            <!-- BEGIN: Benchmark Email Signup Form Code -->
                            <script type="text/javascript" id="lbscript318295" src="//www.benchmarkemail.com/code/lbformnew.js?mFcQnoBFKMTHd8wq9wpT%252BeZXUawFafLCa%252Fw80i5D0X825INw4ATiAA%253D%253D">
                            </script>
                            <noscript>Please enable JavaScript <br />
                            
                            <a href="http://www.benchmarkemail.com" target=_new style="text-decoration:none;font-family:Arial,Helvetica,sans-serif;font-size:10px;color:#999999;">Email Marketing Services</a> 
                            
                            by Benchmark</noscript>
                            <!-- END: Benchmark Email Signup Form Code -->

                          
                      </div>
                      <div class="close" onclick="hidepopup()"><a href="javascript:void(0)" title="Close">Close</a></div>
                          
                  </div>
                </div>
        <script type="text/javascript">
              
                          function showpopup()
                                        {   jQuery('body').append('<div id="popup_overlay"></div>');
                                            document.getElementById("newsletter-div").style.display = "block";
                                        }
                                        
                                        
			   function hidepopup()
                                        {    jQuery('body').find('#popup_overlay').remove();
                                             document.getElementById("newsletter-div").style.display = "none";
                                        }
                        
                                    var hide = true; 
				    jQuery(document).click(function(e){   
					var click= jQuery(e.target);
					var outsideDiv=jQuery("#newsletter-div");
					if (hide == true)
						jQuery('#newsletter-div').hide();
                                                 jQuery('body').remove('<div id="popup_overlay"></div>');
                                                hide = true;
                                               // hidepopup();
                           

				    });
				    jQuery('#newsletter-div').click(function(){
					  hide = false;
                                         
				    });
				    jQuery('#newsletter-button').click(function(){
					  hide = false;
                                           
				    });            
                                        
                                        
                          function checkEmail(){
                                var x =document.forms["data1"]["emailid"].value;
                                var atpos   =x.indexOf("@");
                                var dotpos  =x.lastIndexOf(".");
                               
                                if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
                                  {
                                   document.getElementById('emailid').style.borderColor="Red";
                                   document.getElementById('emailid').focus();
                                   return false;
                                  }
                                
                               else {   document.getElementById('emailid').style.borderColor="";
                                        return true;
                                    }
                                }
                    
                            function Name(){
                                 var uname = document.getElementById('name');
                                if (uname.value==""){
                                             document.getElementById('name').style.borderColor="Red";
                                             uname.focus();  
                                             return false;
                                           }
                                   else { 
                                       document.getElementById('name').style.borderColor="";
                                        return true; 
                                         }
                                     }

                    
                            function validateForm(){
                                     var ret_val=true;
                                     if (!checkEmail(document.getElementById('emailid'))){ret_val=false;}
                                     if (!Name()){ret_val=false;}
                                     if(ret_val == true)
                                         {
                                            this.form.submit();
                                         }
                                         else
                                          {
                                              return false;
                                          }                                    
                                 }
                                 
                                   function showpopup1()
                                   
                                   
                                   
                                        {  
                                           
        
                                             jQuery('body').append('<div id="popup_overlay_join"></div>');
                                            document.getElementById('join_us2').style.display = "block";
                                        }
                                        
                                        
			   function hidepopup1()
                                        {   
                                             
                                             jQuery('body').find('#popup_overlay_join').remove();
                                             document.getElementById('join_us2').style.display = "none";
                                              document.getElementById('popup_overlay_join').style.display = "none";
                                        }
                        
                                    var hide = true; 
				    jQuery(document).click(function(e){   
					var click= jQuery(e.target);
					var outsideDiv=jQuery('#join_us2');
					if (hide == true)
						jQuery('#join_us2').hide();
                                                 jQuery('body').remove('<div id="popup_overlay_join"></div>');
                                                hide = true;
                                               // hidepopup();
                           

				    });
				    jQuery('#join_us2').click(function(){
					  hide = false;
                                         
				    });
				    jQuery('#join_us_button').click(function(){
					  hide = false;
                                           
				    });           
      
      
  
              
           </script>
           
          
           	
        </div><!--#widget-header-->
      </div>
   </div><!--.container_12-->
	</header>
	<div class="container_12 primary_content_wrap clearfix">
            
            
            
           
