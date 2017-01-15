<?php get_header(); ?>

<?php  /*$_SERVER['REQUEST_URI'];if($_SERVER['REQUEST_URI']== '/liberty/blog/'){?> 
 <div class="clearfix">
  <div class="grid_9">
    <section id="slider-wrapper">
	  <?php include_once(TEMPLATEPATH . '/slider.php'); ?>
    </section><!--#slider-->
  </div>
  <div class="grid_3">
    <?php if ( ! dynamic_sidebar( 'Right Home Area' ) ) : ?><!-- Wigitized Home Page --><?php endif; ?>
  </div>
</div>
<?php }*/ ?>


<?php  $media     =  single_cat_title( '', false );
       $cat_id    =  get_query_var('cat'); 
       
      ?>
 <?php  $catquery = new WP_Query( 'cat=49&posts_per_page=40' );?>
 <?php if($cat_id == ''){ $cat_id    = 49;}else{$cat_id    =  get_query_var('cat');  } ?>
    <?php    $subcategories = get_categories('&child_of='.$cat_id .'&posts_per_page=40&hide_empty&order=ASC');?> 
    <?php   count($subcategories); ?>  
    <?php  if(count($subcategories) != 0){ ?>
<div id="content" class="grid_12 <?php echo of_get_option('blog_sidebar_pos') ?>">                    
 <div id="gallery" class="four_columns">
  <ul class="portfolio">
      <?php  $i=1;?>
     <?php   foreach ($subcategories as $category) { ?> 
                                     <?php //echo '<pre>';print_r($category->parent);?>
                                    <?php //$subcategory = new WP_Query( 'cat='.$subcategory->term_id.'&posts_per_page=10&order=asc' );
                                       // while($subcategory->have_posts()) : $subcategory->the_post(); ?>
    <?php if($category->parent == $cat_id){ ?>
    <?php    if(($i%4) == 0){ $addclass = "nomargin";	}?>
       <li class="<?php echo $addclass; ?>">
				<?php
				$thumb = get_post_thumbnail_id();
				$img_url = '/images/' . $category->cat_ID . '.jpg';
			        $prettyType = "prettyPhoto[gallery".$i."]";   
				if($cat_id == '58')
				{
				   $url = '/category/'.$media .'/'. $category->slug.'/'; 
				}
				else
				 {			
				  $url = '/'.$media .'/'. $category->slug.'/';				  
				 } 
				  ?>
			         
				
                              <span class="image-border">
                                            <a class="image-wrap" href="<?php echo bloginfo('url').'/wp-content/themes/theme1765'.$img_url;?>" rel="<?php echo $prettyType; ?>" title=" <?php echo $category->name; ?>">
                                                <img width="220" height="140" src="<?php echo bloginfo('url').'/wp-content/themes/theme1765'.$img_url ?>" alt="<?php echo $category->name; ?>" />
                                                <span class="zoom-icon">
                                                    <span class="text"><?php _e('ZOOM','theme1765'); ?></span>
                                                </span></a>
                              </span>
			
			     <div class="folio-desc" style="height: 100px;">
                              <h3><a href="<?php echo bloginfo('url') .trim($url);?>"><?php $title = $category->name; echo substr($title, 0, 40); ?></a></h3>
                              <?php $excerpt =  $category->description;  echo my_string_limit_words($excerpt,22);?>
                            </div>


                          </li>  
                   <?php } ?> 
                   <?php if($category->parent == $cat_id){$i++;} $addclass ="";  }   ?> 
                  </ul>
             </div>
      </div>

<?php }else{
    ?>
<?php  //$media =  single_cat_title( '', false );    ?>
<div id="content" class="grid_9 <?php echo of_get_option('blog_sidebar_pos') ?>">
  <div class="header-title">
    <h1><?php printf( __( 'Category : %s' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>
  <?php //echo category_description(); ?>
  </div>
    <!--BEGIN .oldernewer .single-oldernewer -->
					<nav class="oldernewer single-oldernewer">
						
                                             <?php $args = array(
                                             'type'                     => 'post',
                                             'child_of'                 => 49,
                                             'parent'                   => '',
                                             'orderby'                  => 'name',
                                             'order'                    => 'ASC',
                                             'hide_empty'               => 0,
                                             'hierarchical'             => 1,
                                             'taxonomy'                 => 'category',
                                             'pad_counts'               => false );
       
   
                                           $categories   = get_categories( $args ); 
                                           //echo get_the_category( $id );
                                          // echo "<pre>";print_r(get_query_var('cat'));die('here');
                                           
                                            foreach($categories as $postids)
                                            {
                                                $postidarray[] = $postids->cat_ID;   
                                            }
                                            $cat = get_query_var('cat');
                                            
                                            //$category = get_category($id); 
                                             
                                            
                                           
                                            $currentindex = array_search($cat,$postidarray);
                                            
                                            
                                            $nextindex    = $currentindex+1;
                                            $previndex    = $currentindex-1;
                                            
                                            $next         = array_key_exists($nextindex, $postidarray);
                                             if($next)
                                              {
                                                 $nextpostid   = $postidarray[$nextindex];
                                                 $nextpost      = get_category($nextpostid);  
                                                // echo "<pre>";print_r($nextpost);die();
                                                 $nextposttitle = $nextpost->cat_name;
                                                 $nextpostlink  = get_site_url().'?cat='.$nextpost->term_id;
                                              }
                                              
                                            $prev         = array_key_exists($previndex, $postidarray);
                                             if($prev)
                                              {
                                                 $prevpostid    = $postidarray[$previndex];
                                                 $prevpost      = get_category($prevpostid); 
                                                 $prevposttitle = $prevpost->cat_name;
                                                 $prevpostlink  = get_site_url().'?cat='.$prevpost->term_id;
                                              }  
                                            
                                                ?>
                                            <?php if($prev) {?>
                                            <div class="older">
                                                &laquo;&laquo;Previous:
                                                <a rel="prev" href="<?php echo $prevpostlink;?>"><?php echo $prevposttitle;?></a>
                                             </div>
                                            <?php } ?>	
                                            
                                            <?php if($next) {?>
                                            <div class="newer">
                                                <a rel="next" href="<?php echo $nextpostlink;?>"><?php echo $nextposttitle;?></a>
                                                :Next&raquo;&raquo;
                                            </div>
                                            <?php } ?>	
					</nav>	
    <div id="gallery" class="four_columns">
       <ul class="portfolio">
  <?php    $i=1;
           if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php    if(($i%3) == 0){ $addclass = "nomargin";	}?>
                  <li id="sub-cat-list" class="<?php echo $addclass; ?>" style=" box-shadow: none;">
                         <!--BEGIN .hentry -->
        <article style="padding:0;" id="post-<?php the_ID(); ?>" <?php post_class('post-holder video'); ?>>
		
        <?php if (is_single()) {  ?>
				<header class="entry-header">
				    <?php if(!is_singular()) : ?>
					
					 <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php _e('Permalink to:', 'theme1765');?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<?php else :?>
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php endif; ?>
					<?php get_template_part('includes/post-formats/post-meta'); ?>
					</header>
					<?php $embed = get_post_meta(get_the_ID(), 'tz_video_embed', TRUE); ?>								
					<?php if (preg_match("/youtube/i",$embed)) { ?>
					<?php $embed = get_post_meta(get_the_ID(), 'tz_video_embed', TRUE); ?>
					<?php $var2=explode("=",$embed,2); ?>
					 <iframe width="700" height="410" src="http://www.youtube.com/embed/<?php echo $var2[1]; ?>" frameborder="0" allowfullscreen></iframe>
					<?php } else { ?>
					 <iframe width="700" height="410" src='<?php bloginfo('template_url')?>/flash/video.swf?width=800&height=600&colorTheme=black&fileVideo=<?php echo stripslashes(htmlspecialchars_decode($embed)); ?>' frameborder="0" allowfullscreen></iframe>					
                                        <?php } ?>
					
	<?php } else { ?>
					
					<?php if (is_single()) { ?>
						<?php $embed = get_post_meta(get_the_ID(), 'tz_video_embed', TRUE); ?>
						<?php $var2=explode("=",$embed,2); ?>
						<iframe width="700" height="410" src="http://www.youtube.com/embed/<?php echo $var2[1]; ?>" frameborder="0" allowfullscreen></iframe>		
					<?php } else { ?>
					
								<?php $embed = get_post_meta(get_the_ID(), 'tz_video_embed', TRUE); ?>
								<?php if(has_post_thumbnail()) { ?>
								<?php	$thumb   = get_post_thumbnail_id();
									$img_url = wp_get_attachment_url( $thumb ); 
									$image   = aq_resize( $img_url, 220, 140, true ); 
									?>
							<figure class="featured-thumbnail">
							  <a href='<?php the_permalink() ?>' title="<?php the_title(); ?>">
                                                             <img src="<?php echo $image ?>" alt="<?php the_title(); ?>"/>
                                                             <span class="play">
                                                                <span class="button"></span>
                                                             </span>
                                                         </a>
						    </figure>
						<?php } ?>
					
					<?php } ?>
        
					
					<header class="entry-header" style="float:left;padding:10px 20px;">
				
					<?php if(!is_singular()) : ?>
					
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php _e('Permalink to:', 'theme1765');?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>
					
					<?php else :?>
					
					<h1 class="entry-title"><?php the_title(); ?></h1>
					
					<?php endif; ?>
					
					<?php //get_template_part('includes/post-formats/post-meta'); ?>
					
					</header>					
					
					<?php } ?>
			
					<!--BEGIN .entry-content -->
					<div class="entry-content" style="float:left;padding:10px 20px;height:110px; ">
                                            <?php  $excerpt = get_the_excerpt(); 
                                                    echo my_string_limit_words( $excerpt,22)
                                               ?>
					  <?php 
                                              //$content = the_content();print_r($content);
					   // echo my_string_limit_words($content,22);	

						//echo $content;
						?>
					
					</div>
        
        <!--END .hentry-->  
        </article> 

			<?php	
                             /*$format = get_post_format();
				get_template_part( 'includes/post-formats/'.$format );
				
				if($format == '')
				get_template_part( 'includes/post-formats/standard' );*/?>
			</li>	
		<?php $i++; $addclass = ""; endwhile; else:
		 
		 ?>
		 
		 <div class="no-results">
                        <?php echo '<p><strong>' . __('There is no video for this category avilable.', 'theme1765') . '</strong></p>'; ?>
			<?php //echo '<p><strong>' . __('There has been an error.', 'theme1765') . '</strong></p>'; ?>
			<p><?php _e('We apologize for any inconvenience, please', 'theme1765'); ?> <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php _e('return to the home page', 'theme1765'); ?></a> <?php _e('or use the search form below.', 'theme1765'); ?></p>
			<?php get_search_form(); /* outputs the default Wordpress search form */ ?>
		</div><!--no-results-->
		
	<?php endif; ?>
                
       </ul>
    </div>
    <nav class="oldernewer single-oldernewer">
						
                                             <?php $args = array(
                                             'type'                     => 'post',
                                             'child_of'                 => 49,
                                             'parent'                   => '',
                                             'orderby'                  => 'name',
                                             'order'                    => 'ASC',
                                             'hide_empty'               => 0,
                                             'hierarchical'             => 1,
                                             'taxonomy'                 => 'category',
                                             'pad_counts'               => false );
       
   
                                           $categories   = get_categories( $args ); 
                                           //echo get_the_category( $id );
                                          // echo "<pre>";print_r(get_query_var('cat'));die('here');
                                           
                                            foreach($categories as $postids)
                                            {
                                                $postidarray[] = $postids->cat_ID;   
                                            }
                                            $cat = get_query_var('cat');
                                            
                                            //$category = get_category($id); 
                                             
                                            
                                           
                                            $currentindex = array_search($cat,$postidarray);
                                            
                                            
                                            $nextindex    = $currentindex+1;
                                            $previndex    = $currentindex-1;
                                            
                                            $next         = array_key_exists($nextindex, $postidarray);
                                             if($next)
                                              {
                                                 $nextpostid   = $postidarray[$nextindex];
                                                 $nextpost      = get_category($nextpostid);  
                                                // echo "<pre>";print_r($nextpost);die();
                                                 $nextposttitle = $nextpost->cat_name;
                                                 $nextpostlink  = get_site_url().'?cat='.$nextpost->term_id;
                                              }
                                              
                                            $prev         = array_key_exists($previndex, $postidarray);
                                             if($prev)
                                              {
                                                 $prevpostid    = $postidarray[$previndex];
                                                 $prevpost      = get_category($prevpostid); 
                                                 $prevposttitle = $prevpost->cat_name;
                                                 $prevpostlink  = get_site_url().'?cat='.$prevpost->term_id;
                                              }  
                                            
                                                ?>
                                            <?php if($prev) {?>
                                            <div class="older">
                                                &laquo;&laquo;Previous:
                                                <a rel="prev" href="<?php echo $prevpostlink;?>"><?php echo $prevposttitle;?></a>
                                             </div>
                                            <?php } ?>	
                                            
                                            <?php if($next) {?>
                                            <div class="newer">
                                                <a rel="next" href="<?php echo $nextpostlink;?>"><?php echo $nextposttitle;?></a>
                                                :Next&raquo;&raquo;
                                            </div>
                                            <?php } ?>	
					</nav>
    
    
    

    
    
  <?php get_template_part('includes/post-formats/post-nav'); ?>
	
</div><!--#content-->
<?php get_sidebar(); ?>






<?php } ?>



<?php get_footer(); ?>