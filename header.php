<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11"><meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" /><link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" /><link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>
</head>
<body>


<div id="topbar">
<!-- if you want to hide empty categories change the params to 'hide_empty=0&title_li=' in that wp_list_categories -->
  <ul>    
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar1') ) : ?>
    <?php endif; ?>
  </ul>
  
  <h2 class="widgettitle">Categories</h2>
	<ul>
	  <?php wp_list_categories('title_li='); ?>
	</ul>
	<?php get_search_form(); ?>
</div>

<div id="nav">
  <p>
    <a id="home-link" href="<?php bloginfo('url') ?>"><?php bloginfo('name') ?></a>
    <a id="manage-contacts" href="<?php bloginfo('url') ?>/wp-admin/edit.php">Manage Contacts</a>
    <a id="add-contact" href="<?php bloginfo('url') ?>/wp-admin/post-new.php?custom-write-panel-id=1">Add New Contact</a>
    <a id="get-help" href="<?php bloginfo('url') ?>/about">Help</a>
    
    <a id="logout-link" href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Logout &raquo;</a>
    <span class="clearer"></span>
  </p>
  
</div>
