<?php
/**
 * Template Name: Fullwidth Page
 */

get_header(); ?>
<?php 
 if($_SERVER["REQUEST_URI"]=='/contacts/')
 {
    if(isset ($_POST['fm_form_submit'])){ 
    
    $firstname   = $_POST['text-first-name'];
    $lastname    = $_POST['text-last-name'];
    $company     = $_POST['text-company-name'];
    $email       = $_POST['text-email'];
    $job         = $_POST['text-job-title'];
    $phone       = $_POST['text-phone'];
    $interest    = $_POST['text-interest'];
    $comments       = $_POST['text-comments'];
    
    $toadmin       = get_option('admin_email');
    
    $subjectadmin  = '***WLTV: Contact Us Form Submission';
    $messageadmin  = " <div>
                            Dear,Admin<br/><br/>
                            
                             New contact request received. <br/><br/>
                             
                             Name     : <b> $firstname". ' '.$lastname." </b><br/>
                             Email    : <b> $email </b><br/>
	                     Company  : <b> $company</b><br/>
                             Job      : <b> $job </b><br/>
			     Phone    : <b> $phone</b><br/>
                             Interest : <b> $interest </b><br/>
	    
                             Message  : <b> $comments </b><br/>  <br/>                            
                             

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
?>
<div id="content">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>
        <?php if(has_post_thumbnail()) {
          echo '<a href="'; the_permalink(); echo '">';
          echo '<figure class="featured-thumbnail"><span class="img-wrap">'; the_post_thumbnail(); echo '</span></figure>rfgfgfgf';
          echo '</a>';
          }
        ?>
  
				<?php the_content(); ?>
	<span style="float: left; margin-top: -60px;  float:right; color: green; font-size: 16px;"><?php if(isset($retval2)){echo "Thank you for contacting  us.";}?></span>
        <div class="pagination">
          <?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
        </div><!--.pagination-->
    </div><!--#post-# .post-->

  <?php endwhile; ?>
</div><!--#content-->
<?php get_footer(); ?>
