        <?php   get_header(); $ppp=0; ?>



<div id="content" class="grid_12">

	<!--BEGIN .page-header -->
	<div class="header-title page-header">
			    
            <h1><?php the_title(); ?></h1>
		
	<!--END .page-header -->
	</div>
	
	
	
			
  <!--BEGIN #primary .hfeed-->
	<div id="primary" class="hfeed">
		
		<?php   if( have_posts() ) : /*while ( have_posts() ) :*/ the_post(); ?>
				
			<!--BEGIN .hentry -->
			<div <?php post_class(); ?> id="post-<?php the_ID(); ?>" >				
					
        <div class="two_third ">
			<!--BEGIN .oldernewer .single-oldernewer -->
					<nav class="oldernewer single-oldernewer">
						
                                            <?php $ppp++;
                                            $values = get_post_custom_values("category-include"); 
                                            $cat=$values[0];                                              
                                            $catinclude = 'portfolio_category='. $cat ;
                                            
                                            $postidarray =array ();$kk=0;
                                            $post_arraynew = $wp_query->query("post_type=portfolio&". $catinclude.'&showposts=20&orderby=name&order=ASC'); 
                                            foreach($post_arraynew as $postids)
                                            {
                                                $postidarray[] = $postids->ID; 
                                            }
                                            $currentindex = array_search($post->ID,$postidarray);
                                            
                                            $nextindex    = $currentindex+1;
                                            $previndex    = $currentindex-1;
                                            
                                            $next         = array_key_exists($nextindex, $postidarray);
                                             if($next)
                                              {
                                                 $nextpostid   = $postidarray[$nextindex];
                                                 $nextpost      = get_post($nextpostid); 
                                                 $nextposttitle = $nextpost->post_title;
                                                 $nextpostlink  = $nextpost->guid;
                                              }
                                              
                                            $prev         = array_key_exists($previndex, $postidarray);
                                             if($prev)
                                              {
                                                 $prevpostid    = $postidarray[$previndex];
                                                 $prevpost      = get_post($prevpostid); 
                                                 $prevposttitle = $prevpost->post_title;
                                                 $prevpostlink  = $prevpost->guid;
                                              }  
                                            
                                                ?>
                                            <?php if($prev) {?>
                                            <div class="older">
                                                &laquo;&laquo;Previous:
                                                <a rel="prev" href="<?php echo $prevpostlink?>"><?php echo $prevposttitle?></a>
                                             </div>
                                            <?php } ?>	
                                            
                                            <?php if($next) {?>
                                            <div class="newer">
                                                <a rel="next" href="<?php echo $nextpostlink?>"><?php echo $nextposttitle?></a>
                                                :Next&raquo;&raquo;
                                            </div>
                                            <?php } ?>	
                                            
                                            <?php /*if( get_previous_post() ) : ?>
						<div class="older"><?php previous_post_link('&laquo;&laquo;Previous: %link ') ?></div>
						<?php endif; ?>
						
						<?php if( get_next_post() ) : ?>
						<div class="newer"><?php  next_post_link('%link :Next&raquo;&raquo;') ?></div>
						<?php endif; */?>

					<!--END .oldernewer .single-oldernewer -->
					</nav>	
					<?php 



                                    // get the media elements
                                               $mediaType = get_post_meta($post->ID, 'tz_portfolio_type', true);

						switch( $mediaType ) {
							case "Image":
								tz_image($post->ID, 'portfolio-main');
								break;

							case "Slideshow":
								tz_gallery($post->ID, 'portfolio-main');
								break;
								
							case "Grid Gallery":
								tz_grid_gallery($post->ID, 'portfolio-main');
								break;

							case "Video":
								$embed = get_post_meta($post->ID, 'tz_portfolio_embed_code', true);
								echo "<div class='video-holder'>";
								echo stripslashes(htmlspecialchars_decode($embed));
								echo "</div>";
								break;

							case "Audio":
								tz_audio($post->ID);
								break;

							default:
								break;
						}
					?>
				
					<!--BEGIN .oldernewer .single-oldernewer -->
					<nav class="oldernewer single-oldernewer">
						
                                            <?php $ppp++;
                                            $values = get_post_custom_values("category-include"); 
                                            $cat=$values[0];                                              
                                            $catinclude = 'portfolio_category='. $cat ;
                                            
                                            $postidarray =array ();$kk=0;
                                            $post_arraynew = $wp_query->query("post_type=portfolio&". $catinclude.'&showposts=20&orderby=name&order=ASC'); 
                                            foreach($post_arraynew as $postids)
                                            {
                                                $postidarray[] = $postids->ID; 
                                            }
                                            $currentindex = array_search($post->ID,$postidarray);
                                            
                                            $nextindex    = $currentindex+1;
                                            $previndex    = $currentindex-1;
                                            
                                            $next         = array_key_exists($nextindex, $postidarray);
                                             if($next)
                                              {
                                                 $nextpostid   = $postidarray[$nextindex];
                                                 $nextpost      = get_post($nextpostid); 
                                                 $nextposttitle = $nextpost->post_title;
                                                 $nextpostlink  = $nextpost->guid;
                                              }
                                              
                                            $prev         = array_key_exists($previndex, $postidarray);
                                             if($prev)
                                              {
                                                 $prevpostid    = $postidarray[$previndex];
                                                 $prevpost      = get_post($prevpostid); 
                                                 $prevposttitle = $prevpost->post_title;
                                                 $prevpostlink  = $prevpost->guid;
                                              }  
                                            
                                                ?>
                                            <?php if($prev) {?>
                                            <div class="older">
                                                &laquo;&laquo;Previous:
                                                <a rel="prev" href="<?php echo $prevpostlink?>"><?php echo $prevposttitle?></a>
                                             </div>
                            
                <?php } ?>	
                                            
                                            <?php if($next) {?>
                                            <div class="newer">
                                                <a rel="next" href="<?php echo $nextpostlink?>"><?php echo $nextposttitle?></a>
                                                :Next&raquo;&raquo;
                                            </div>
                                            <?php } ?>	
                                            
                                            <?php /*if( get_previous_post() ) : ?>
						<div class="older"><?php previous_post_link('&laquo;&laquo;Previous: %link ') ?></div>
						<?php endif; ?>
						
						<?php if( get_next_post() ) : ?>
						<div class="newer"><?php  next_post_link('%link :Next&raquo;&raquo;') ?></div>
						<?php endif; */?>

					<!--END .oldernewer .single-oldernewer -->
					</nav>
					
                                        
                                       
					
				</div>

                            
   
                            
                            </div>
                            
				<!-- BEGIN .entry-content -->
				<div class="entry-content one_third last">
								
                                    
                                    
                                      <?php  if ( ! dynamic_sidebar( 'Sidebar' ) ) : ?><!-- Wigitized Home Page --><?php endif; ?>
                                    
                                    
                                    
                                    
					<!-- BEGIN .entry-meta -->
					<div class="entry-meta" style="margin-left:25px; ">
                                                  <?php 
                                                  
                                                  
                                                
                                                  if($post->ID=='862'){
                                                
                                                      
                                                  
                                                
                                                  if ( ! dynamic_sidebar( 'Boxing Right' ) ) { 
                                                      
                                                 
                                                      } 
                                                  }
                                                  
                                                  
                                                  
                                                 
                                                  
                                                  elseif  ($post->ID=='502') { 
            
                                                       if ( ! dynamic_sidebar('BusinessRight') ) { 
              
                                                             } }
                                                             
                                                             
                                                              elseif  ($post->ID=='816') { 
            
                                                       if ( ! dynamic_sidebar(' African-American/Caribbean Right') ) { 
              
                                                             } }
                                                  
                                                  elseif  ($post->ID=='861') { 
            
                                                       if ( ! dynamic_sidebar('Celebrities Right') ) { 
              
                                                             } }
                                                             
                                                             
                                                             
                                                             
                                                             elseif  ($post->ID=='818') { 
            
                                                       if ( ! dynamic_sidebar('Cultural Right') ) { 
              
                                                             } }
                                                             
                                                             
                                                             elseif  ($post->ID=='819') { 
            
                                                       if ( ! dynamic_sidebar('Entertainers Right') ) { 
              
                                                             } }
                                                             
                                                             
                                                             elseif  ($post->ID=='820') { 
            
                                                       if ( ! dynamic_sidebar('Fashion Right') ) { 
              
                                                             } }
                                                             
                                                             elseif  ($post->ID=='1190') { 
            
                                                       if ( ! dynamic_sidebar('Humanitarians Right') ) { 
              
                                                             } }
                                                             
                                                             elseif  ($post->ID=='822') { 
            
                                                       if ( ! dynamic_sidebar('Latino Right') ) { 
              
                                                             } }
                                                             
                                                             
                                                             
                                                             
                                                            
                                                             elseif  ($post->ID=='821') { 
            
                                                       if ( ! dynamic_sidebar('LGBT Right') ) { 
              
                                                             } }
                                                             
                                                              elseif  ($post->ID=='1053') { 
            
                                                       if ( ! dynamic_sidebar(' Legends Right') ) { 
              
                                                             } }
                                                             
                                                             
                                                             
                                                             
                                                                
                                                             elseif  ($post->ID=='824') { 
            
                                                       if ( ! dynamic_sidebar('Motor Right') ) { 
              
                                                             } }
                                                             
                                                             
                                                             
                                                             
                                                                
                                                             elseif  ($post->ID=='823') { 
            
                                                       if ( ! dynamic_sidebar('Music Right') ) { 
              
                                                             } }
                                                             
                                                             
                                                             
                                                             
                                                                
                                                             elseif  ($post->ID=='825') { 
            
                                                       if ( ! dynamic_sidebar('Politics Right') ) { 
              
                                                             } }
                                                             
                                                             
                                                             
                                                             
                                                                
                                                             elseif  ($post->ID=='1194') { 
            
                                                       if ( ! dynamic_sidebar('Product People Right') ) { 
              
                                                             } }
                                                             
                                                             
                                                             
                                                             
                                                                
                                                             elseif  ($post->ID=='827') { 
            
                                                       if ( ! dynamic_sidebar('Sports Right') ) { 
              
                                                             } }
                                                             
                                                             
                                                             
                                                                
                                                             elseif  ($post->ID=='828') { 
            
                                                       if ( ! dynamic_sidebar('Technology Right') ) { 
              
                                                             } }
                                                             
                                                                
                                                             elseif  ($post->ID=='2490') { 
            
                                                       if ( ! dynamic_sidebar('Legends Right') ) { 
              
                                                             } }
                                                             
                                                             
                                                                
                                                             elseif  ($post->ID=='1196') { 
            
                                                       if ( ! dynamic_sidebar('Women-Right') ) { 
              
                                                             } }
                                                             
                                                             
                                                             
                                                                
                                                             elseif  ($post->ID=='829') { 
            
                                                       if ( ! dynamic_sidebar('World-Leaders-Right') ) { 
              
                                                             } }
                                                             
                                                             
                                                      else{
                                                      
                                                     if( ! dynamic_sidebar( 'blank' ) ) { 
              
                                                            } 
             
                                                      
                                                  }
                                                  
                                                  
                                                  ?>
                                                  
                                                  
                                                  
                                                  
                                                  
                                                  
						<?php /*
							// get the meta information and display if supplied
							$portfolioClient = get_post_meta($post->ID, 'tz_portfolio_client', true);
							$portfolioDate = get_post_meta($post->ID, 'tz_portfolio_date', true); 
							$portfolioInfo = get_post_meta($post->ID, 'tz_portfolio_info', true); 
							$portfolioURL = get_post_meta($post->ID, 'tz_portfolio_url', true);
							
							
							if (!empty($portfolioClient) || !empty($portfolioDate) || !empty($portfolioInfo) || !empty($portfolioURL)){
								echo '<ul class="portfolio-meta-list">';
								}
								
							if( !empty($portfolioClient) ) {
									echo '<li>';
									echo '<strong class="portfolio-meta-key">' . __('Client:', 'framework') . '</strong>';
									echo '<span>' . $portfolioClient . '</span><br />';
									echo '</li>';
								}

							if( !empty($portfolioDate) ) {
									echo '<li>';
									echo '<strong class="portfolio-meta-key">' . __('Date:', 'framework') . '</strong>';
									echo '<span>' . $portfolioDate . '</span><br />';
									echo '</li>';
							}
							
							if( !empty($portfolioInfo) ) {
									echo '<li>';
									echo '<strong class="portfolio-meta-key">' . __('Info:', 'framework') . '</strong>';
									echo '<span>' . $portfolioInfo . '</span><br />';
									echo '</li>';
							}

							if( !empty($portfolioURL) ) {
									echo '<li>';
									echo "<a href='$portfolioURL'>" . __('Launch Project', 'framework') . "</a>";
									echo '</li>';
							}
							
							if (!empty($portfolioClient) || !empty($portfolioDate) || !empty($portfolioInfo) || !empty($portfolioURL)){
								echo '</ul>';
							}
						*/ ?>

					<!-- END .entry-meta -->
					</div>
						
					<?php //the_content(); ?>

				<!-- END .entry-content -->
				</div>                
				<!--END .hentry-->  
					
					
				</div>

				<?php /*endwhile;*/ endif; ?>
				

	<!--END #primary .hfeed-->
	</div>
	


   

 <?php // get_template_part('includes/post-formats/post-nav'); ?>



                           

<?php get_footer(); ?>