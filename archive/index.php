<?php get_header(); ?>
<div id="site">
<div id="content">

<?php $has_organization = get_post_meta($post->ID, "organization_wpcm_value", true); ?>
<?php $has_person_name = get_post_meta($post->ID, "person_name_wpcm_value", true); ?>
<?php $has_email = get_post_meta($post->ID, "email_wpcm_value", true); ?>

<div id="search">	
  <div id="logo"><img src="http://ncfoodnet.com/wp-content/uploads/nc_food_logo.jpg" alt="NC Food NETwork logo"></div>	  
  <h2 class="site-subtitle">Search <?php mdv_post_count(); ?> NC Sustainable Food System Contacts:</h2>
	<?php include (TEMPLATEPATH . '/searchform.php'); ?>
	<span>Search for any name, organization name, zip code, county, region, role or type of work</span>
	<span class="clearer"></span>
</div>
	
	
	<?php else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>
	
	<ul>    
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar2') ) : ?>
    <?php endif; ?>
  </ul>
	
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>