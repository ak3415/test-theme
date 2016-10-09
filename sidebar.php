<?php if(is_page()){?>
	<aside id="sidebar" class="grid_3 ispage">
    	<div class="pages-sides">
			<?php if ( ! dynamic_sidebar( 'Sidebar' )) : ?>

     		 <?php endif; ?>
     		
     		<div class="banner-right">
     		
     		<?php if (is_page('link-exchange')) { 
					if ( ! dynamic_sidebar('Sponsor Sidebar' ) ) { 
              			} }
              			
              		elseif (is_page('sponsors-media')) { 

                   if ( ! dynamic_sidebar( 'Sponsors & Media Right' ) ) { 
              
                   } }
                  elseif(is_page('coverage')) {
            		if( ! dynamic_sidebar( 'Coverage Right' ) ) { 
              			} }
                  elseif(is_page('about-us')) {
            		if( ! dynamic_sidebar( 'About Right' ) ) { 
              			} }
                  elseif(is_page('archives')) {
            		if( ! dynamic_sidebar( 'Archives Right' ) ) { 
              			} }
             /*   elseif(is_page('Blog')) {
            		if( ! dynamic_sidebar('Blog-Right' ) ) { 
              			} }
              */
             	  elseif(is_page('pictures')) {
            		if( ! dynamic_sidebar( 'pictures-Right' ) ) { 
              			} }
                  elseif(is_page('videos')) {
            		if( ! dynamic_sidebar( 'video Right' ) ) { 
              			} }
                  elseif(is_page('advertising')) {
            		if( ! dynamic_sidebar( 'Advertising Right' ) ) { 
              			} }
                  elseif(is_page('Testimonials')) {
            		if( ! dynamic_sidebar( 'Testimonials Right' ) ) { 
              			} }
                  elseif(is_page('join-us')) {
	            	if( ! dynamic_sidebar( 'join-us Right' ) ) { 
	                    } }
                  else{
                     if( ! dynamic_sidebar('default_right_banner' ) ) {
              			} }
                 ?>
        	</div>
     	</div>
	</aside>
<?php }else{ ?>
  <aside id="sidebar" class="grid_3 notpage">
      <?php  $_SERVER['REQUEST_URI'];if($_SERVER['REQUEST_URI']== '/liberty/'){?> 
         <div id="sidebar-homepage" class="sidebar-home">    
			<?php  if ( ! dynamic_sidebar( 'Sidebar' )) : ?>
            
           	<?php endif; ?>
             
            
             
        </div>

<?php }else { ?>
      <div id="banner-sidebar">
       <?php if ( ! dynamic_sidebar( 'Sidebar' )) : ?>
       <?php endif; ?>
       
       <div class="banner-right">
     		
     		<?php if (is_category('boxing')) { 
					if ( ! dynamic_sidebar('Boxing Right' ) ) { 
              			} }
                  elseif(is_category('business')) {
            		if( ! dynamic_sidebar( 'BusinessRight' ) ) { 
              			} }
                  elseif(is_category('Celebrity')) {
            		if( ! dynamic_sidebar( 'Celebrities Right' ) ) { 
              			} }
                  elseif(is_category('cultural')) {
            		if( ! dynamic_sidebar( 'Cultural Right' ) ) { 
              			} }
                  elseif(is_category('entertainment-videos')) {
            		if( ! dynamic_sidebar( 'Entertainers Right' ) ) { 
              			} }
                  elseif(is_category('fashion')) {
            		if( ! dynamic_sidebar( 'Fashion Right' ) ) { 
              			} }	
                  elseif(is_category('humanitarians')) {
            		if( ! dynamic_sidebar( 'Humanitarians Right' ) ) { 
              			} }
                  elseif(is_category('latino')) {
            		if( ! dynamic_sidebar( 'Latino Right' ) ) { 
              			} }
                  elseif(is_category('lgbt')) {
            		if( ! dynamic_sidebar( 'LGBT Right' ) ) { 
              			} }
                  elseif(is_category('motor')) {
            		if( ! dynamic_sidebar( 'Motor Right' ) ) { 
              			} }
                  elseif(is_category('politics')) {
            		if( ! dynamic_sidebar( 'Politics Right' ) ) { 
              			} }
                  elseif(is_category('product-people')) {
            		if( ! dynamic_sidebar( 'Product People Right' ) ) { 
              			} }
                  elseif(is_category('sports')) {
            		if( ! dynamic_sidebar( 'Sports Right' ) ) { 
              			} }
                  elseif(is_category('tech')) {
            		if( ! dynamic_sidebar( 'Technology Right' ) ) { 
              			} }		
                  elseif(is_category('african-american-or-caribbean')) {
            		if( ! dynamic_sidebar( 'African-American/Caribbean Right' ) ) { 
              			} }
                  elseif(in_category(1)) {
            		if( ! dynamic_sidebar( 'Blog Right' ) ) { 
              			} }
              			
              	 elseif(is_category('featured-videos')) {  
	                if ( ! dynamic_sidebar('Home Sidebar1') ) { 
              
                   } }
                  else{
                     if( ! dynamic_sidebar('default_right_banner' ) ) {
              			} }
                 ?>
        	</div>
       
        </div>
      
      <?php 
      
   
      
      
      ?>
      
      
      
      <?php } ?>
    
  <?php } ?>