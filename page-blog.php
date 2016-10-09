<?php
/**
 * Template Name: Blog
 * 
 * 
 */
?>
<?php get_header(); ?>

	<div id="content" class="grid_9 <?php echo of_get_option('blog_sidebar_pos') ?>">
	
  	<?php include_once (TEMPLATEPATH . '/title.php');?> 
		
		<?php /* custom pagination setup */
                        $values = array(
			'post_type'=> 'post',
			'post_status' => 'publish',
			'paged'    => $paged,
		        'showposts'=> -1,
			'order' => 'DESC',
			'tax_query' => array(
			    array(
				'taxonomy' => 'post_format',
				'field' => 'slug',
				'terms' => array('post-format-video'),
				'operator' => 'NOT IN'
			    )
			)
		    );
                    $page = $_GET['pagenum'];
                    if ($page < 1) $page = 1;
                    $resultsPerPage = 10;
                    $numberOfRows = count(get_posts($values));
                    $startResults = (($page - 1) * $resultsPerPage);
                    $totalPages = ceil($numberOfRows / $resultsPerPage);
                    /* end Setup */
                    
                 $args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'paged'    => $paged,
		        'showposts' => $resultsPerPage,
                        'offset'   => $startResults,
			'order' => 'DESC',
			'tax_query' => array(
			    array(
				'taxonomy' => 'post_format',
				'field' => 'slug',
				'terms' => array('post-format-video'),
				'operator' => 'NOT IN'
			    )
			)
		);
		$query = new WP_query($args);
		
			if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
			
			//if(function_exists('the_views')) { the_views(); }
			?>
			

			<article id="post-<?php the_ID(); ?>" <?php post_class('post-holder'); ?>>
					
				<?php if (is_single()) { ?>
				
					<header class="entry-header">
				
						<?php if(is_singular()) : ?>
				
							<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php _e('Permalink to:', 'theme1765');?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				
						<?php else :?>
				
							<h1 class="entry-title"><?php the_title(); ?></h1>
				
						<?php endif; ?>
				
					<?php get_template_part('includes/post-formats/post-meta'); ?>
				
					</header>
				
					<?php get_template_part('includes/post-formats/post-thumb'); ?>
				
				<?php } else { ?>
				
					<?php $post_image_size = of_get_option('post_image_size'); ?>
<?php if($post_image_size=='' || $post_image_size=='normal'){ ?>
	<?php if(has_post_thumbnail()) { ?>
		<figure class="featured-thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></figure>
	<?php } ?>
	<?php } else { ?>
	<?php if(has_post_thumbnail()) { ?>
		<?php
		$thumb = get_post_thumbnail_id();
		$img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
		$image = aq_resize( $img_url, 700, 410, true ); //resize & crop img
		?>
		<figure class="featured-thumbnail large">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo $image ?>" alt="<?php the_title(); ?>" /></a>
		</figure>
		<div class="clear"></div>
	<?php } ?>
<?php } ?>

				
					<header class="entry-header">
				
						<?php if(is_singular()) : ?>
				
							<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php _e('Permalink to:', 'theme1765');?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>
					
						<?php else :?>
				
							<h1 class="entry-title"><?php the_title(); ?></h1>
				
						<?php endif; ?>
				
					<?php get_template_part('includes/post-formats/post-meta'); ?>
				
					</header>
				
					<?php } ?>
				
				<?php if(is_singular()) : ?>
				
					<div class="post-content">
						<?php $post_excerpt = of_get_option('post_excerpt'); ?>
							<?php if ($post_excerpt=='true' || $post_excerpt=='') { ?>
					
								<div class="excerpt">
						
						
								<?php 
						
									$content = get_the_content();
									$excerpt = get_the_excerpt();

										if (has_excerpt()) {

											the_excerpt();

										} else {
						
										if(!is_search()) {
	
											echo my_string_limit_words($content,47);
								
										} else {
								
											echo my_string_limit_words($excerpt,55);
								
												}

											}
						
						
								?>
						
								</div>
						
						
						<?php } ?>
					<a href="<?php the_permalink() ?>" class="button"><?php _e('Read more', 'theme1765'); ?></a>
					</div>
				
				<?php else :?>
				
				<div class="entry-content">
				
					<?php the_content(''); ?>
					
				<!--// .content -->
				</div>
				
				<?php endif; ?>

			 
			</article>
                                                                            
                        <?php                
                                                         
			 endwhile; 
                                        
                                        
                                        
                                        do_shortcode('social_share/');
                       
                         
                         
                  else:
			 
			 ?>
			 < ?php wp_reset_query();?>
			 <div class="no-results">
				<?php echo '<p><strong>' . __('There has been an error.', 'theme1765') . '</strong></p>'; ?>
        <p><?php _e('We apologize for any inconvenience, please', 'theme1765'); ?> <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php _e('return to the home page', 'theme1765'); ?></a> <?php _e('or use the search form below.', 'theme1765'); ?></p>
        <?php get_search_form(); /* outputs the default Wordpress search form */ ?>
      </div><!--no-results-->
			
    <?php endif; ?>
    
    <?php /* call pagination */
      if($totalPages > 1) { ?>
<div class="pagenavi">
	<?php
            $pages = $_GET['pagenum'];
            if($pages < 1) $pages = 1;
            $count = 0;
            for($i=1; $i<=$totalPages; $i++)
            {
                $count++;
                $value = $i;
                if($count == $pages)
                {
                    echo '<span class="current">'.$value.'</span>';
                }
                else
                {
                    echo '<a class="inactive" href="?pagenum='.$count.'">'.$value.'</a>';
                }
            }
        ?>
</div>                                                          
    <?php } ?>
    <?php //get_template_part('includes/post-formats/post-nav'); ?>

	</div><!--#content-->
<?php //get_sidebar();?>

<aside id="sidebar" class="grid_3 notpage">


      <div id="banner-sidebar">
       <?php if ( ! dynamic_sidebar( 'Sidebar' )) : ?>
       <?php endif; ?>
       </div>
       <div class="banner-right">
       <?php if ( ! dynamic_sidebar( 'Blog Right' )) : ?>
       <?php endif; ?>
 
             </div>           
                       </aside>  

<?php get_footer(); ?>

