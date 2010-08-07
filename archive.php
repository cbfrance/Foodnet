<?php get_header(); ?>

<div id="site">

<div id="content">

<span id="content-uppercorner"></span>
<span id="content-lowercorner"></span>

	<?php if (is_tag()) { ?>
		<h2>Contacts Tagged with <span class="archived-feature"><?php single_tag_title(); ?></span></h2>
	<?php /* If this is a category archive */ } elseif (is_category()) { ?>
		<h2>Contacts in the <span class="archived-feature"><?php single_cat_title(''); ?></span> category.</h2>
	<?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
		<h2>Contacts added on <span class="archived-feature"><?php the_time('l, F jS, Y'); ?></span></h2>
	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2>Contacts added in <span class="archived-feature"><?php the_time('F, Y'); ?></span></h2>
	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2>Contacts added in <span class="archived-feature"><?php the_time('Y'); ?></span></h2>
	<?php /* If these are search results */ } elseif (is_search()) { ?>
		<h2>Contacts that match '<span class="archived-feature"><?php the_search_query(); ?></span>'</h2>
	<?php /* Anything else that may get through the above filters */ } else {?>
		<h2>Contacts</h2>
	<?php } ?>


  <table>
	  <thead>
    	<tr>
    		<th scope="col" abbr="">Organization Name</th>
    		<th scope="col" abbr="">Contact Name</th>	
    		<th scope="col" abbr="">Categories</th>
    	</tr>	
    	</thead>
	
	<?php $alt = ""; ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php if ($alt == "") { $alt = " alt"; } else { $alt = ""; } ?>	

		<tr class="contact<?php echo $alt; ?>">
  	  <td>
    	  <a href="<?php the_permalink(); ?>"><?php echo get_post_meta($post->ID, "organization_name_wpcm_value", true); ?></a>
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
	
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>