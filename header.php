<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <?php if(is_404()): ?><meta http-equiv="refresh" content="0;url=<?php bloginfo('url'); ?>/" /> <?php endif; ?>
	<title><?php wp_title('&#124;', true, 'right'); ?></title>

	<link rel="icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" type="image/x-icon">
	<?php wp_head(); ?>


	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Montserrat:700,400" rel="stylesheet" type="text/css">


	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/slick/slick.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/slick/slick.css"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.cookie.js"></script>

	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/custom.js"></script>

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/normalize.css" type="text/css" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); echo '?v=' . filemtime( get_stylesheet_directory() . '/style.css'); ?>" type="text/css" media="screen, projection" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/screen.css" type="text/css" />
	<!--[if lte IE 8]>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/ie.css" type="text/css" />
	<![endif]-->
	<!--[if IE 6]>
		<script src="<?php bloginfo('stylesheet_directory'); ?>/js/DD_belatedPNG_0.0.8a.js"></script>
		<script>DD_belatedPNG.fix('img, div, a, span, li');</script>
	<![endif]-->
</head>

<body <?php body_class(); ?>>

<?php if( get_field('class_dropdown') ): ?>
<div id="page" class="hfeed site <?php the_field('class_dropdown'); ?>">
<?php endif; ?>

	<div id="header" class="header" role="banner">

		<div class="nav-menu wrap">
			<?php if(have_rows('logo',4)): while(have_rows('logo',4)):the_row(); // logo ?>

				<?php if( get_sub_field('logo_type') == "image") { // if Select Logo Type choice = Image?>
					<?php if(have_rows('logo_as_image')): while(have_rows('logo_as_image')):the_row(); // logo_as_image ?>
						<?php if( get_sub_field('logo_image') ): ?>
							<div class="logo-image">
								<?php $logo_image = get_sub_field('logo_image',4); ?>
									<a href="<?php bloginfo('url'); ?>">
										<img src="<?php echo $logo_image['url']; ?>" alt="<?php the_sub_field('logo_alt');?>" />
									</a>

							</div>
						<?php endif; ?>
					<?php endwhile; endif; // end logo_as_image ?>
				<?php } //endif; ?>

				<?php if( get_sub_field('logo_type') == "text") { // if Select Logo Type choice = Text ?>
					<?php if(have_rows('logo_as_text')): while(have_rows('logo_as_text')):the_row(); // logo_as_text ?>
						<?php if( get_sub_field('logo_text') ): ?>
							<div class="logo-text">
								<a class="logo" href="<?php bloginfo('url'); ?>" alt="<?php the_sub_field('logo_alt');?>">
									<h1 class="fullsize"><?php the_sub_field('logo_text');?></h1>
								</a>
							</div>
						<?php endif; ?>
					<?php endwhile; endif; // end logo_as_text ?>
				<?php } // endif; ?>
			<?php endwhile; endif; // logo ?>

			<div class="menu">
				<a class="hamburger" href="#"><i class="fa fa-bars"></i></a>
				<ul id="nav">
					<?php
						$nav = wp_list_pages("title_li=&sort_column=menu_order&echo=0&depth=2");
						//$nav = eregi_replace('^<li class="([^"]*)">', '<li id="first" class="\\1">', $nav);
						echo $nav;
					?>
				</ul>
			</div>

		</div>

	</div><!-- #header -->

	<div id="content" class="site-content">

