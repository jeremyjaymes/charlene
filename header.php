<?php
/**
 * Theme Header
 *
 * @package Charlene
 * @subpackage Template
 * @author jeremyjaymes
 * @since Charlene 2.0
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
   <meta charset="<?php bloginfo( 'charset' ); ?>">
   <meta name="viewport" content="width=device-width">

   <title><?php wp_title( '|', true, 'right' ); ?></title>

   <link rel="profile" href="http://gmpg.org/xfn/11">
   <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

   <!--[if lt IE 9]>
   <script src="<?php echo get_template_directory_uri(); ?>/lib/js/html5shiv.min.js"></script>
   <![endif]-->
   
   <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

<div id="page" class="site-container">
   <a href="#primary" class="screen-reader-text skip">Skip to content</a>
	
	<header class="site-header wrap" role="banner" itemscope itemtype="http://schema.org/WPHeader">
      <div class="title col_2 push_4">
         <h1 class="site-title" itemprop="headline"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
         <p class="site-description" itemprop="description"><?php bloginfo( 'description' ); ?></p>
      </div><!-- title -->
	</header><!-- end #header -->

<div class="site-inner">
   <div class="content-wrap">