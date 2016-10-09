<?php if(is_page()){?>
<aside id="sidebar" class="grid_3">
    <div class="pages-sides">
<?php if ( ! dynamic_sidebar( 'Sidebar' )) : ?>
   <div id="sidebar-search" class="widget">
  	<?php //echo '<h3>' . __('Search', 'theme1765') . '</h3>'; ?>
    <?php //get_search_form(); ?> <!-- outputs the default Wordpress search form-->
  </div>
  
  <div id="sidebar-nav" class="widget menu">
    <?php //echo '<h3>' . __('Navigation', 'theme1765') . '</h3>'; ?>
    <?php //wp_nav_menu( array('menu' => 'Sidebar Menu' )); ?> <!-- editable within the Wordpress backend -->
  </div>
  
  <div id="sidebar-archives" class="widget">
    <?php //echo '<h3>' . __('Archives', 'theme1765') . '</h3>'; ?>
    <ul>
      <?php //wp_get_archives( 'type=monthly' ); ?>
    </ul>
  </div>

         
        
        
        
        
        
  <div id="sidebar-meta" class="widget">
    <?php echo '<h3>' . __('Meta', 'theme1765') . '</h3>'; ?>
    <ul>
      <?php wp_register(); ?>
      <li><?php wp_loginout(); ?></li>
      <?php wp_meta(); ?>
    </ul>
  </div>
      
      <?php endif; ?>
    </div>

<?php }else{ ?>
  <aside id="sidebar" class="grid_3">
      <?php  $_SERVER['REQUEST_URI'];if($_SERVER['REQUEST_URI']== '/liberty/'){?> 
         <div id="sidebar-homepage" class="sidebar-home">    
             
             
           
             
             
             
             
             
            <?php  if ( ! dynamic_sidebar( 'Sidebar' )) : ?>
             <?php endif; ?>
             
             
        </div>
       <?php }else { ?>
      <div id="banner-sidebar">
       <?php if ( ! dynamic_sidebar( 'Sidebar' )) : ?>
       <?php endif; ?>
        </div>
      
      <?php 
      
      
    //  if ( ! dynamic_sidebar( 'Default Right' )) {}
     
      
      
      ?>
      
      
      
      <?php } ?>
    
  <?php } ?>