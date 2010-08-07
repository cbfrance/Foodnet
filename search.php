<?php get_header(); ?>
<div id="site">
<div id="content">
		<h2 class="pagetitle">Search Results</h2>
  	<table>  
    	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    	<tr class="contact">
    	  <td><a href="<?php the_permalink(); ?>"><?php echo get_post_meta($post->ID, "organization_name_wpcm_value", true); ?></a></td>
      	<td><a href="<?php the_permalink(); ?>"><?php echo get_post_meta($post->ID, "contact_name_wpcm_value", true); ?></a></td>
      	<td class="m-category"><?php the_category(' '); ?></td>
    	</tr>
    	<?php endwhile; ?> 
    	</table>

    	<?php else: ?>
    	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    	<?php endif; ?>
</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
