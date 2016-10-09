<div id="faded">
  <ul class="slides test">
  <?php query_posts("post_type=slider&posts_per_page=4&post_status=publish");
	   while ( have_posts() ) : the_post(); 
  ?>
  	<li class="item">
		<?php the_content(); ?> 	
	</li>
  <?php endwhile; ?>
  <?php wp_reset_query();?>
  </ul>
  <ul class="thumbs pagination">
	  <?php $counter = 0; ?>
	  <?php query_posts("post_type=slider&posts_per_page=4&post_status=publish");
		   while ( have_posts() ) : the_post(); 
                ?>
		<li>              
		  <span class="youtube-temp"></span>       
		  <span class="hover-bg"></span>
		  <a href="#" rel="<?php echo $counter; ?>" class="title"><?php the_title(); ?></a>
		  <a href="<?php the_permalink(); ?>" class="link"></a>
		  <span class="views">
		    <?php if(function_exists('the_views')) { the_views(); echo _e(' views','theme1765'); } ?>
		  </span>
		</li>
	  <?php $counter++; endwhile; ?>
	  <?php wp_reset_query();?>
  </ul>		
</div>