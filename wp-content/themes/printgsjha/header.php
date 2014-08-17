<!doctype html>

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6 oldie"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7 oldie"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8 oldie"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">
		<!--[if ie]><meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'/><![endif]-->

		<title><?php wp_title( ' - ', true, 'right' ); ?> <?php bloginfo('name'); ?></title>

		<?php if ( of_get_option('snb_enablemeta')== '1') { ?>

		<!-- meta -->
		<meta name="description" content="<?php echo of_get_option('snb_metadescription')  ?>">
		<meta name="keywords" content="<?php wp_title(); ?>, <?php echo of_get_option('snb_metakeywords')  ?>" />
		<meta name="revisit-after" content="<?php echo of_get_option('snb_revisitafter')  ?> days" />
		<?php } ?>
		<meta name="author" content="www.gsjha.com">

		<?php if ( of_get_option('snb_enablerobot')== '1') { ?>

		<!-- robots -->
		<meta name="robots" content="<?php echo of_get_option('snb_metabots')  ?>" />
		<meta name="googlebot" content="<?php echo of_get_option('snb_metagooglebot')  ?>" />
		<?php } ?>

		<!-- main style css and pingback_url -->
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
  		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
  		<!-- end of main style css and pingback_url -->

		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->

		<script type="text/javascript">
		 // initialise Superfish
			$j = jQuery.noConflict();
			$j(document).ready(function(){
				$j("ul.sf-menu").superfish();
			});
		</script>

<?php if(of_get_option('snb_customtypography') == '1') { ?>
<!-- custom typography-->
	<?php if(of_get_option('snb_headingfontlink') != '') { ?>
	<?php echo of_get_option('snb_headingfontlink');?>
<!-- custom typography -->
	<?php } ?>
	<?php load_template( get_template_directory() . '/custom.typography.css.php' );?>
<?php } ?>

<?php if(of_get_option('snb_css_code') != '') { ?>
<!-- custom css -->
	<?php load_template( get_template_directory() . '/custom.css.php' );?>
<!-- custom css -->
<?php } ?>

	</head>

	<body <?php body_class(); ?>>

	<div style="position:absolute; height:5px; background:#333;width:100%;position:fixed;z-index:99999;"></div>

		<div id="container">

			<header role="banner">

					<!-- begin #logo -->
					<?php if ( !of_get_option('snb_clogo')== '') { ?>
					<div id="logo">
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<img src="<?php echo of_get_option('snb_clogo'); ?>" alt="<?php echo bloginfo( 'name' ) ?>" />
						<div id="tagline"><?php bloginfo('description'); ?></div>
						</a>
					</div>

					<?php } else { ?>

					<div id="sitename" class="h1">
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<?php if( !of_get_option('snb_clogo_text')== '') {
								echo of_get_option('snb_clogo_text');
								} else {
								bloginfo( 'name' );
							}
							?>
						</a>
					</div>
					<div id="tagline"><?php bloginfo('description'); ?></div>
					<?php }?>
					<!-- end #logo -->

					<!-- begin #socialIcons -->
					<div id="socialIcons">
						<a href="<?php echo of_get_option('snb_twitter') ?>" class="twitter tooltip" title="<?php _e( 'Follow Us on Twitter', 'site5framework' ); ?>"><?php _e( 'Follow Us on Twitter', 'site5framework' ); ?></a>
						<a href="<?php echo of_get_option('snb_facebook') ?>" class="facebook tooltip" title="<?php _e( 'Join Us on Facebook!', 'site5framework' ); ?>"><?php _e( 'Join Us on Facebook!', 'site5framework' ); ?></a>
					</div>
					<!-- end #socialIcons -->

					<!-- begin #topSearch -->
					<div id="topSearch">
						<!--<form id="searchform" method="get" action="<?php bloginfo( 'url' ); ?>">
							<input type="text" id="s" name="s" value="<?php _e( 'type your search here', 'site5framework' ); ?>" onFocus="this.value=''" />
							<input type="submit" value="" />
						</form>-->
						<p style="font-family:ComfortaaBold;font-size:17px;line-height:1.3;margin-bottom:-13%;color:#fff;background:#F82C6D;padding:4%; border-radius:5px;">Free delivery over £100</p><br/>
						<p style="font-family:ComfortaaBold;font-size:20px;line-height:1.3;margin-bottom:-5%;">Call: 0207 993 8380<br/>info@printpedia.co.uk</p>
					</div>
					<!-- end #topSearch -->

					<!-- begin #topMenu -->
					<div id="topMenu">
					<?php
					site5_main_nav( array(
					 'container' =>false,
					 'menu_class' => 'sf-menu',
					 'echo' => true,
					 'before' => '',
					 'after' => '',
					 'link_before' => '',
					 'link_after' => '',
					 'depth' => 0,
					 )
					 );
					 // Adjust using Menus in Wordpress Admin ?>

					</div>
					<!-- end #topMenu -->

			</header> <!-- end header -->
