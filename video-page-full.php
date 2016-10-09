<?php
/**
 * Template Name: Video-page-full
 */

get_header(); ?>

<div id="content" class="grid_9 right">
	<?php include_once (TEMPLATEPATH . '/title.php');?>   
  <?php global $more;	$wpdb;$more = 0;
	  $args = array(
	 'type'                     => 'post',
	 'child_of'                 => 49,
	 'parent'                   => '',
	 'orderby'                  => 'name',
	 'order'                    => 'ASC',
	 'hide_empty'               => 0,
	 'hierarchical'             => 1,
	 'taxonomy'                 => 'category',
	 'pad_counts'               => false );
       $argsments = array('orderby' => 'name','order'=> 'ASC','child_of'=> '49');
   
       $categories   = get_categories( $args ); 
       
      //echo "<pre>";print_r($categories);exit;
  if ( empty($categories) ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'theme1765' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'theme1765' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php endif; ?>


<!-- BEGIN Gallery -->
<div id="gallery" class="four_columns">
  <ul class="portfolio">
    <?php 
      $i=1;
      foreach ($categories as $values){
      if(($i%4) == 0){ $addclass = "nomargin";	}	
    ?>
    
      <li class="<?php echo $addclass; ?>">
				<?php 
				      $img_url = get_option("z_taxonomy_image$values->term_id");
				      $image   = aq_resize( $img_url, 220, 140, true ); //resize & crop img
				      $prettyType = 'prettyPhoto';		 
				?>
				
				
        <span class="image-border"><a class="image-wrap" href="<?php echo get_site_url()?>?cat=<?php echo $values->term_id?>" rel="<?php //echo $prettyType; ?>" title="<?php the_title();?>"><img src="<?php echo $image ?>" alt="<?php the_title(); ?>" /><span class="zoom-icon"><span class="text"><?php _e('ZOOM','theme1765'); ?></span></span></a></span>
				
				
        <div class="folio-desc">
          <h3><a href="<?php echo get_site_url()?>?cat=<?php echo $values->term_id?>"><?php $title = $values->name; echo substr($title, 0, 40); ?></a></h3>
          <?php $excerpt = $values->description; echo my_string_limit_words($excerpt,22);?>
        </div>
				
				
      </li>
    
  
    <?php $i++; $addclass = ""; } ?>
  </ul>
  <div class="clear"></div>
	
  

  
  
  
</div><!-- END Gallery -->



<?php get_template_part('includes/post-formats/post-nav'); ?>
<!-- Posts Navigation -->

</div><!-- #content -->
<!-- end #main -->


<?php get_sidebar();?>

<?php get_footer(); ?>
