<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11"><meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" /><link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" /><link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>

<script src='wp-content/themes/Foodnet/js/wax/ext/modestmaps.min.js' type='text/javascript'></script>
<script src='wp-content/themes/Foodnet/js/wax/dist/wax.mm.js' type='text/javascript'></script>
<link href='wp-content/themes/Foodnet/js/wax/theme/controls.css' rel='stylesheet' type='text/css' />

</head>
<body>

  <div id="nav">
    <p>
      <a id="home-link" href="<?php bloginfo('url') ?>"><?php bloginfo('name') ?></a>
      <a id="manage-contacts" href="<?php bloginfo('url') ?>/wp-admin/edit.php">Manage Contacts</a>
      <a id="add-contact" href="<?php bloginfo('url') ?>/wp-admin/post-new.php?custom-write-panel-id=1">Add a Contact</a>
      <a id="get-help" href="<?php bloginfo('url') ?>/about">Help</a>

      <a id="logout-link" href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a>
      <span class="clearer"></span>
    </p>
  </div>

<div id="topbar">
  <div id="search"> 
    <div id="logo">
      <img src="http://ncfoodnet.com/wp-content/uploads/nc_food_logo.jpg" alt="NC Food NETwork logo">
    </div>  
    <h2 class="site-subtitle">Search the NC Sustainable Food System:</h2>
    <?php include (TEMPLATEPATH . '/searchform.php'); ?>
    <span>by name, org, zip, county, region or role</span>
    <span class="clearer"></span>
  </div>
  <ul id="categorywrap">

    <!-- http://foodnet.local/wp-admin/categories.php?action=edit&cat_ID=42 -->
    <?php wp_list_categories('hide_empty=1&title_li=&exclude=42,103,104'); ?>
  </ul>
</div>

