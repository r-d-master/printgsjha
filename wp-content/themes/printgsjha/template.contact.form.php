<?php
/*
 * Template Name: Contact Form
*/
if(isset($_POST['submitted'])) {
		//Check to make sure that the name field is not empty
		if(trim($_POST['contactName']) === '') {
			$nameError = __("You forgot to enter your name.", "site5framework");
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}

		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['email']) === '')  {
			$emailError = __("You forgot to enter your email address.", "site5framework");
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$emailError = __("You entered an invalid email address.", "site5framework");
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}

		//Check to make sure comments were entered
		if(trim($_POST['comments']) === '') {
			$commentError = __("You forgot to enter your comments.", "site5framework");
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}

		//If there is no error, send the email
		if(!isset($hasError)) {
			$msg .= "------------User Info------------ \r\n"; //Title
			$msg .= "User IP: ".$_SERVER["REMOTE_ADDR"]."\r\n"; //Sender's IP
			$msg .= "Browser Info: ".$_SERVER["HTTP_USER_AGENT"]."\r\n"; //User agent
			$msg .= "Referrer: ".$_SERVER["HTTP_REFERER"]; //Referrer

			$emailTo = ''.of_get_option('snb_contact_email').'';
			$subject = 'Contact Form Submission From '.$name;
			$body = "Name: $name \n\nEmail: $email \n\nMessage: $comments \n\n $msg";
			$headers = 'From: '.$name.' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;

			if(mail($emailTo, $subject, $body, $headers)) $emailSent = true;

	}

}
get_header();
?>
			<div id="content" class="clearfix">

				<h1><?php the_title(); ?> <?php if ( !get_post_meta($post->ID, 'snbpd_pagedesc', true)== '') { ?>/<?php }?> <span><?php echo get_post_meta($post->ID, 'snbpd_pagedesc', true); ?></span></h1>

				<div class="hrThickFull"></div>

				<div id="main" class="fullwidth" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<section class="post_content">
						<?php the_content(); ?>

					<?php if(of_get_option('snb_contact_map') != '') { ?>
						<!-- contact map -->
						<div id="contact-map">
						<?php echo of_get_option('snb_contact_map') ?>
						</div>

						<div class="hrThickFull"></div>
						<!-- end contact map -->
					<?php } ?>

					</section> <!-- end article section -->

				<div class="contactLeft">

					<p class="error" <?php if($hasError != '') echo 'style="display:block;"'; ?>><?php _e('There was an error submitting the form.', 'site5framework'); ?><p>

                    <p class="thanks"><?php _e('<strong>Thanks!</strong> Your email was successfully sent. We should be in touch soon.', 'site5framework'); ?></p>

					<form id="contactForm" method="POST">
                    <div>
					<label for="nameinput"><?php _e("Your name", "site5framework"); ?></label>
						<input type="text" id="nameinput" name="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="requiredField"/>
						<span class="error" <?php if($nameError != '') echo 'style="display:block;"'; ?>><?php _e("You forgot to enter your name.", "site5framework");?></span>
                    </div>
                    <div>
					<label for="emailinput"><?php _e("Your email", "site5framework"); ?></label>
						<input type="text" id="emailinput" name="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="requiredField email"/>
						  <span class="error" <?php if($emailError != '') echo 'style="display:block;"'; ?>><?php _e("You forgot to enter your email address.", "site5framework");?></span>
                    </div>
                    <div>
					<label for="commentinput"><?php _e("Your message", "site5framework"); ?></label>
						<textarea cols="20" rows="7" id="commentinput" name="comments" class="requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
						  <span class="error" <?php if($commentError != '') echo 'style="display:block;"'; ?>><?php _e("You forgot to enter your comments.", "site5framework");?></span>
                    </div><br />
                    <input type="hidden" name="submitted" id="submitted" value="true" />
					<button type="submit" id="submitbutton" class="submitbutton"><?php _e(' &nbsp;SEND MESSAGE&nbsp; ', 'site5framework'); ?></button>

					</form>

				</div>

				<div class="contactRight contactinfo">
					<div class="caddress"><strong><?php _e('Address:', 'site5framework') ?></strong> <?php echo of_get_option('snb_contact_address') ?></div>
	                <div class="cphone"><strong><?php _e('Phone:', 'site5framework') ?></strong> <?php echo of_get_option('snb_contact_phone') ?></div>
	                <div class="cphone"><strong><?php _e('Fax:', 'site5framework') ?></strong> <?php echo of_get_option('snb_contact_fax') ?></div>
	                <div class="cemail"><strong><?php _e('E-mail:', 'site5framework') ?></strong> <?php echo of_get_option('snb_contact_email') ?></div>

				</div>

					<?php endwhile; ?>

					<?php else : ?>

					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("No Posts Yet", "site5framework"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, What you were looking for is not here.", "site5framework"); ?></p>
					    </section>
					</article>

					<?php endif; ?>

				</div> <!-- end #main -->

			</div> <!-- end #content -->

<?php get_footer(); ?>