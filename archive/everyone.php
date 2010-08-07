<?php
/*
Template Name: everyone
*/
?>

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
	
	<h2>All Entries<!-- <span><a href="login.php">Register to add your own!</a></span> --></h2>
	<table>  
	<?php query_posts('showposts=3000'); ?>  
	<?php $alt = ""; ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php if ($alt == "") { $alt = " alt"; } else { $alt = ""; } ?>
	
	<tr class="contact<?php echo $alt; ?>">
	  <td>
  	  <a href="<?php the_permalink(); ?>"><?php echo get_post_meta($post->ID, "organization_name_wpcm_value", true); ?><span class="viewlocation"></a> <a target="_blank" id="location-link" href="http://maps.google.com/maps?f=q&amp;hl=en&amp;q=<?php echo get_post_meta($post->ID, "address_1_wpcm_value", true); ?>,<?php echo get_post_meta($post->ID, "city_wpcm_value", true); ?>,<?php echo get_post_meta($post->ID, "state_wpcm_value", true); ?>,<?php echo get_post_meta($post->ID, "zip_wpcm_value", true); ?>">(View Location)</a></span>
    </td>
  	<td>
  	  <a href="<?php the_permalink(); ?>"><?php echo get_post_meta($post->ID, "contact_name_wpcm_value", true); ?></a>
    </td>
  	<td class="m-category"><?php the_category(' '); ?></td>
	</tr>
	<?php endwhile; ?> 
	</table>
	
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