  </div><!--.container-->
	<footer id="footer">
  	<div id="back-top-wrapper">
    	<p id="back-top">
        <a href="#top"><span></span><span class="hover"></span></a>
      </p>
    </div>
	<div id="widget-footer" class="clearfix">
      	<div class="container_12 clearfix">
		<div class="grid_3">
			<div id="footer-logo">
			<?php if(of_get_option('f_logo_type') == 'f_text_logo'){?>
          	<?php if( is_front_page() || is_home() || is_404() ) { ?>
                <h1><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h1>
            <?php } else { ?>
              <h2><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h2>
            <?php } ?>
          <?php } else { ?>
          	<?php if(of_get_option('f_logo_url') != ''){ ?>
            	<a href="<?php bloginfo('url'); ?>/" class="footer-logo"><img src="<?php echo of_get_option('f_logo_url', "" ); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>"></a>
            <?php } else { ?>
            	<a href="<?php bloginfo('url'); ?>/" class="footer-logo"><img src="<?php bloginfo('template_url'); ?>/images/footer-logo.png" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>"></a>
            <?php } ?>
          <?php }?>
		</div>
			<?php echo of_get_option('f_desc'); ?>
			</div>
		
          
            <?php if ( ! dynamic_sidebar( 'Footer' ) ) : ?>
                 <!--Widgetized Footer-->
             <?php endif; ?>
             
	</div>
      </div>
		<div class="container_12 clearfix">
			<div id="copyright" class="clearfix">
				<div class="grid_12">
					<?php if ( of_get_option('footer_menu') == 'true') { ?>  
						<nav class="footer">
							<?php wp_nav_menu( array(
								'container'       => 'ul', 
								'menu_class'      => 'footer-nav', 
								'depth'           => 0,
								'theme_location' => 'footer_menu' 
								)); 
							?>
						</nav>
					<?php } ?>
					<div id="footer-text">
						<?php $myfooter_text = of_get_option('footer_text'); ?>
						
						<?php if($myfooter_text){?>
							<?php echo of_get_option('footer_text'); ?>
						<?php } else { ?>
							<a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>" class="site-name"><?php echo _('World Liberty TV'); ?></a> &copy; <?php echo date('Y');echo '-'; echo date('Y')+1;?>  &nbsp;|&nbsp;
							<a href="<?php bloginfo('url'); ?>/privacy-policy/" title="Privacy Policy"><?php _e('Privacy Policy', 'theme1765'); ?></a>
                                                        |&nbsp;&nbsp;Powered by World Liberty TV </a>
						<?php } ?>
                                                     
                                                         
						<?php /*if( is_front_page() ) { ?>
						More <a rel="nofollow" href="http://www.templatemonster.com/category/video-gallery-wordpress-themes/" target="_blank">Video Gallery WordPress Themes at TemplateMonster.com</a>
						<?php } */ ?>
					</div>
					
				</div>
			</div>
		</div><!--.container-->
	</footer>
</div><!--#main-->
<?php wp_footer(); ?> <!-- this is used by many Wordpress features and for plugins to work properly -->
<?php if(of_get_option('ga_code')) { ?>
	<script type="text/javascript">
		<?php echo stripslashes(of_get_option('ga_code')); ?>
	</script>
  <!-- Show Google Analytics -->	
<?php } ?>

<script type="text/javascript">

 

  var _gaq = _gaq || [];

  _gaq.push(['_setAccount', 'UA-28393606-1']);

  _gaq.push(['_trackPageview']);

 

  (function() {

    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;

    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';

    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);

  })();

 

</script>
</body>
</html>