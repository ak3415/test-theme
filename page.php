<?php  get_header(); ?>
<?php /*$_SERVER['REQUEST_URI'];if($_SERVER['REQUEST_URI']== '/liberty/about-us/'){?> 
 <div class="clearfix" style="margin-top:20px;">
  <div class="grid_9">
    <section id="slider-wrapper">
	  <?php include_once(TEMPLATEPATH . '/slider.php'); ?>
    </section><!--#slider-->
  </div>
  <div class="grid_3">
    <?php if ( ! dynamic_sidebar( 'Right Home Area' ) ) : ?><!-- Wigitized Home Page --><?php endif; ?>
  </div>
</div>
<?php } */ ?>

<?php 
 if($_SERVER["REQUEST_URI"]=='/advertising/')
 {
    if(isset ($_POST['fm_advertise'])){ 
    
    $org_name    = $_POST['text-org_name'];
    $contactname = $_POST['text-contact-name'];
    $phone       = $_POST['text-phone'];
    $email       = $_POST['text-email'];
    $city        = $_POST['text-city'];
    $state       = $_POST['text-state'];
    
    
    $toadmin       = get_option('admin_email');
    
    $subjectadmin  = '***WLTV: Advertiser Form Submission';
    $messageadmin  = " <div>
                            Dear,Admin<br/><br/>
                            
                             New advertiser request received. <br/><br/>
                             <div style='margin-left: 25px;'>
                             Organization Name   : <b> $org_name </b><br/>
                             Contact Name        : <b> $contactname </b><br/>
	                     Contact Phone       : <b> $phone</b><br/>
                             Contact Email       : <b> $email </b><br/>
			     City                : <b> $city</b><br/>
                             State               : <b> $state </b><br/><br/>
		             </div>
                             Regards.

                    </div>" ;
    
    
                    $headers = 'MIME-Version: 1.0' . "\r\n";

                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                    $headers .= 'From: Admin';

   

                    $retval1  = mail ($toadmin,$subjectadmin,$messageadmin,$headers);
		    
     $subjectuser  = "Thanks for contacting World Liberty TV";
      
     $messageuser  = " <div>
                            Thank you for contacting us at World Liberty TV!<br/><br/>
 
			    One of our team members will be with you shortly.<br/><br/>

			    Thanks,<br/><br/>

			    World Liberty TV
                             

                    </div>" ;
		    $headers1 = 'MIME-Version: 1.0' . "\r\n";

                    $headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    
                    $headers1 .= 'From:World-Liberty-TV';
     
		    $retval2  = mail ($email,$subjectuser,$messageuser,$headers1);
}
 }
 
  if($_SERVER["REQUEST_URI"]=='/join-us/')
 {
    if(isset ($_POST['joinform_submit'])){ 
    
	$upload_dir = wp_upload_dir();
        //echo "<pre>";print_r($upload_dir['basedir']);

    $fname           = $_POST['text-fname'];
    $lname           = $_POST['text-lname'];
    $phone           = $_POST['text-phone'];
    $email           = $_POST['text-email'];
    $city            = $_POST['text-city'];
    $state           = $_POST['text-state'];  
    $skills          = $_POST['textarea-skills'];
    
    
    $interest        = '';
    foreach($_POST['checkbox'] as $check=>$value)
    {
	$interest .= $value.',';
    }
    $int  = rtrim($interest,',');
    $baseurl  = get_site_url();
    $path     = $upload_dir['basedir'].'/resume';
    $filename = time().$_FILES['file-resume']['name'];
    $resume   = "<a href='$baseurl/wp-content/uploads/resume/$filename'>Resume</a>"; 
    move_uploaded_file($_FILES['file-resume']['tmp_name'], $path.'/'.$filename); 
    
    $toadmin       = get_option('admin_email');
    
    $subjectadmin  = '***WLTV: Join Us Form Submission';
    $messageadmin  = " <div>
                            Dear,Admin<br/><br/>
                            
                             New Join Us request received. <br/><br/>
                             <div style='margin-left: 25px;'>
                             Name                : <b> $fname". ' '.$lname." </b><br/>                            
	                     Phone               : <b> $phone</b><br/>
                             Email               : <b> $email </b><br/>
			     City                : <b> $city</b><br/>
                             State               : <b> $state </b><br/>
			     Skills              : <b> $skills </b><br/>
			     Interest            : <b> $int </b><br/>
	                     Resume              : <b> $resume </b><br/><br/>
		             </div>
                             Regards.

                    </div>" ;
    
    
                    $headers = 'MIME-Version: 1.0' . "\r\n";

                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                    $headers .= 'From: Admin';

   

                    $retval1  = mail ($toadmin,$subjectadmin,$messageadmin,$headers);
		    
     $subjectuser  = "Thanks for contacting World Liberty TV";
      
     $messageuser  = " <div>
                            Thank you for contacting us at World Liberty TV!<br/><br/>
 
			    One of our team members will be with you shortly.<br/><br/>

			    Thanks,<br/><br/>

			    World Liberty TV
                             

                    </div>" ;
		    $headers1 = 'MIME-Version: 1.0' . "\r\n";

                    $headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    
                    $headers1 .= 'From:World-Liberty-TV';
     
		    $retval3  = mail ($email,$subjectuser,$messageuser,$headers1);
}
 }
 
 
?>

<div id="content" class="grid_9 <?php echo of_get_option('blog_sidebar_pos') ?>">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>
      <article class="post-holder">
        <div class="header-title">
		<h1><?php the_title(); ?></h1>
	</div>
        <?php if(has_post_thumbnail()) {
					echo '<a href="'; the_permalink(); echo '">';
					echo '<figure class="featured-thumbnail"><span class="img-wrap">'; the_post_thumbnail(); echo '</span></figure>';
					echo '</a>';
					}
				?>
        <div id="page-content">
          <?php the_content(); ?>
	    
	    <span style="color: green; font-size: 16px; float: left; width: 100%; margin-top: -79px; margin-left: 9px;"><?php if(isset($retval2)){echo "Thank you for contacting us.";}?></span>
          <div class="pagination">
            <?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
          </div><!--.pagination-->
        </div><!--#pageContent -->
      </article>
    </div><!--#post-# .post-->

  <?php endwhile; ?>
</div><!--#content-->


        <?php get_sidebar(); ?>


           

<?php get_footer(); ?>


