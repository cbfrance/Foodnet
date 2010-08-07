<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11"><meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" /><link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" /><link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>

<script src="masonry/js/jquery-1.4.2.min.js"></script>
<script src="masonry/js/jquery.masonry.js"></script>

</head>
<body>

<!-- ========== -->
<!-- = topbar = -->
<!-- ========== -->

<div id="topbar">

  
  <!-- ======= -->
  <!-- = nav = -->
  <!-- ======= -->

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


  <!-- ========== -->
  <!-- = search = -->
  <!-- ========== -->

  <div id="search"> 
    <div id="logo">
      <img src="http://ncfoodnet.com/wp-content/uploads/nc_food_logo.jpg" alt="NC Food NETwork logo">
    </div>  
      
    <h2 class="site-subtitle">Search the NC Sustainable Food System:</h2>
    <?php include (TEMPLATEPATH . '/searchform.php'); ?>
    <span>Search by name, org, zip, county, region, role or type</span>
    <span class="clearer"></span>
  </div>
  
<!-- if you want to hide empty categories change the params to 'hide_empty=0&title_li=' in that wp_list_categories -->
  <ul>    
  </ul>
  
  <h2 class="widgettitle">Categories</h2>
	<ul>
	  <?php wp_list_categories('title_li='); ?>
	</ul>
</div>

