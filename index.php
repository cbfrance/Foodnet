<div id="site">
<div id="content">

  <?php get_header(); ?>

  <?php $has_organization = get_post_meta($post->ID, "organization_name_wpcm_value", true); ?>
  <?php $has_person_name = get_post_meta($post->ID, "contact_name_wpcm_value", true); ?>
  <?php $has_email = get_post_meta($post->ID, "email_wpcm_value", true); ?>

  <!-- ================== -->
  <!-- = recent entries = -->
  <!-- ================== -->

  <h2>3 Recent Sustainable Food System Contacts </h2><a href="/wp-admin/post-new.php?custom-write-panel-id=1">Add to the Network!</a>
  
  <table>  
  <?php query_posts('showposts=3'); ?>  
  <?php $alt = ""; ?>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php if ($alt == "") { $alt = " alt"; } else { $alt = ""; } ?>
  
      <!-- ================= -->
      <!-- = Contact entry = -->
      <!-- ================= -->
  
      <tr class="contact<?php echo $alt; ?>">
      <td>
        <a href="<?php the_permalink(); ?>"><?php echo get_post_meta($post->ID, "organization_name_wpcm_value", true); ?><span class="viewlocation"></a> <a target="_blank" id="location-link" href="http://maps.google.com/maps?f=q&amp;hl=en&amp;q=<?php echo get_post_meta($post->ID, "address_1_wpcm_value", true); ?>,<?php echo get_post_meta($post->ID, "city_wpcm_value", true); ?>,<?php echo get_post_meta($post->ID, "state_wpcm_value", true); ?>,<?php echo get_post_meta($post->ID, "zip_wpcm_value", true); ?>">(View Location)</a></span>
      </td>
      <td>
        <a href="<?php the_permalink(); ?>"><?php echo get_post_meta($post->ID, "contact_name_wpcm_value", true); ?></a>
      </td>
      <!-- <td class="m-category"><?php the_category(' '); ?></td> -->
    </tr>
  <?php endwhile; ?> 
  </table>

<!-- ====================== -->
<!-- = No posts condition = -->
<!-- ====================== -->  

  <?php else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
  <?php endif; ?>

<!-- end #content -->

<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar1') ) : ?>
<?php endif; ?>

<!-- ======= -->
<!-- = map = -->
<!-- ======= -->

<iframe id="mapframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=http:%2F%2Froguegenius.com%2Furbanfarming%2Fpython%2Fdirme.2010-07-19.0539.kml&amp;sll=37.0625,-95.677068&amp;sspn=40.460237,79.013672&amp;ie=UTF8&amp;ll=35.869021,-79.917297&amp;spn=1.297561,3.515625&amp;output=embed"></iframe>

</div>

<!-- =========== -->
<!-- = masonry = -->
<!-- =========== -->

<script>
    $(function(){
        $('#content').masonry({
            columnWidth: 100, 
            itemSelector: '.children'
        });
      });
  </script>

<?php get_footer(); ?>