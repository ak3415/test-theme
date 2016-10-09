<?php
/**
 * Template Name: Portfolio 1 column
 */

get_header(); ?>

<?php print_r($_POST); die('hererer');?>
<div id="content">
	<div id="error404" class="clearfix">
  	<div class="error404-num grid_6 prefix_1">404</div>
    <div class="grid_4">
    	<hgroup>
        <?php echo '<h1>' . __('Sorry!', 'theme1765') . '</h1>'; ?>
        <?php echo '<h2>' . __('Page Not Found', 'theme1765') . '</h2>'; ?>
      </hgroup>
      <?php echo '<h4>' . __('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'theme1765') . '</h4>'; ?>
      <?php echo '<p>' . __('Please try using our search box below to look for information on the internet.', 'theme1765') . '</p>'; ?>
      <?php get_search_form(); /* outputs the default Wordpress search form */ ?>
    </div>
	</div><!--#error404 .post-->
</div><!--#content-->
<?php get_footer(); ?>