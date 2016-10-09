<?php
/**
 * Template Name: Home Test Page
 */

get_header(); ?>
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
<div id="content" class="grid_9">
    <div class="title">
      <?php $home_title = of_get_option('home_title'); ?>
		<?php if($home_title){?>
      <h3><?php echo 'FEATURED VIDEOS'; //of_get_option('home_title'); ?></h3>
    <?php } else { ?>
      <h3><?php _e('Featured Videos','theme1765');?></h3>
    <?php } ?>
    </div>
<div id="video-cycle">
<?php if ( get_query_var('paged') ) {
              $paged = get_query_var('paged');
      } elseif ( get_query_var('page') ) {
              $paged = get_query_var('page');
      } else {
              $paged = 1;
      }
      query_posts( array(
			 'post_type' => 'post',
			 'cat' => 839, 
			 'posts_per_page' => 12,
			 'paged' => $paged,
			 'tax_query' => array(
			 'relation' => 'AND',
				array(
					'taxonomy' => 'post_format',
					'field' => 'slug',
					'terms' => array('post-format-video')
				)
			 ) )
      );
      if ( have_posts() ) : while ( have_posts() ) : the_post(); 
			
      ?>
<div class="video-item">
								  <?php $embed = get_post_meta(get_the_ID(), 'tz_video_embed', TRUE); ?>
									<?php if(has_post_thumbnail()) { ?>
										<?php
										$thumb = get_post_thumbnail_id();
										$img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
										$image = aq_resize( $img_url, 220, 140, true ); //resize & crop img
										?>
										<figure class="featured-thumbnail">
											<a rel="prettyphoto[video]" href='<?php bloginfo('template_url')?>/flash/video.swf?width=800&height=600&colorTheme=cyan&fileVideo=<?php echo stripslashes(htmlspecialchars_decode($embed)); ?>' title="<?php the_title(); ?>"><img src="<?php echo $image ?>" alt="<?php the_title(); ?>"/><span class="play"><span class="button"></span></span></a>
										</figure>
									<?php } ?>
									
									<div class="desc">
									  <div class="row-1">
									    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
									<div class="terms"><?php the_terms( $post->ID, 'category', '', ', ', '' ); ?></div>
									  </div>
									
					    <div class="row-2">
					      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="link"><span class="link-bg"></span><span class="hover"></span></a>
					     <!--<span class="rating"><?php //GetWtiLikePost(); ?><?php //if(function_exists('the_ratings')) { the_ratings(); } ?></span>
					      <span class="views"><?php //if(function_exists('the_views')) { the_views(); } ?></span>-->
					    </div>
					    </div>
								</div>
    
  
    <?php endwhile; endif; ?>
 </div>
 

  <?php get_template_part('includes/post-formats/post-nav'); ?>
</div>
<?php // get_sidebar(); ?>

<aside id="sidebar" class="grid_3 notpage">


      <div id="banner-sidebar">
       <?php if ( ! dynamic_sidebar( 'Sidebar' )) : ?>
       <?php endif; ?>
       </div>
       <div class="banner-right">


             <?php 
            
                   if ( ! dynamic_sidebar('Home Sidebar1') ) { 
              
                   } 
                   
                   
                   
                   
                   ?>       
             </div>           
                       </aside>  


              

<?php get_footer(); ?>