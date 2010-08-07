<?php get_header(); ?>

<div id="site">
  <div id="content" class="single">
    <div class="entry">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    	<div class="vitals">
    		<img class="contact-picture" src="<?php $wpcm_image_path = get_post_meta($post->ID, "avatar_wpcm_value", true); if ($wpcm_image_path == '') { echo bloginfo('template_directory') . '/images/contact-default.png'; } else { echo get_post_meta($post->ID, "avatar_wpcm_value", true); } ?>" alt="<?php echo get_post_meta($post->ID, "first_name_wpcm_value", true); ?> <?php echo get_post_meta($post->ID, "last_name_wpcm_value", true); ?>" />
    		<p>
    		  <span class="organization"><?php echo get_post_meta($post->ID, "organization_name_wpcm_value", true); ?></span>
    			<span class="name"><?php echo get_post_meta($post->ID, "contact_name_wpcm_value", true); ?></span>
    			<span class="title"><?php echo get_post_meta($post->ID, "title_wpcm_value", true); ?></span>
    			<span class="email"><a href="mailto:<?php echo get_post_meta($post->ID, "email_wpcm_value", true); ?>"><?php echo get_post_meta($post->ID, "email_wpcm_value", true); ?></a></span>
    			<span class="website"><a href="<?php echo get_post_meta($post->ID, "website_wpcm_value", true); ?>"><?php echo get_post_meta($post->ID, "website_wpcm_value", true); ?></a></span>
    		</p>
    		  <span class="clearer"></span>
    	</div>
	
    	<?php
    		// Assign the phone numbers to variables and check to see if they exist.
    		$wpcm_number_mobile = get_post_meta($post->ID, "mobile_wpcm_value", true);
    		$wpcm_number_office = get_post_meta($post->ID, "office_phone_wpcm_value", true);
    		$wpcm_number_home = get_post_meta($post->ID, "home_phone_wpcm_value", true);
    		$wpcm_number_fax = get_post_meta($post->ID, "fax_wpcm_value", true);
    	?>
	
    	<div class="phone">
    		<h3 class="site-subtitle">Numbers</h3>
    		<ul class="phone-numbers">
    			<?php if ( $wpcm_number_mobile != '' ) { echo '<li><span class="number">' . $wpcm_number_mobile . '</span> (Mobile)</li>'; } ?>
    			<?php if ( $wpcm_number_office != '' ) { echo '<li><span class="number">' . $wpcm_number_office . '</span> (Office)</li>'; } ?>
    			<?php if ( $wpcm_number_home != '' ) { echo '<li><span class="number">' . $wpcm_number_home . '</span> (Home)</li>'; } ?>
    			<?php if ( $wpcm_number_fax != '' ) { echo '<li><span class="number">' . $wpcm_number_fax . '</span> (Fax)</li>'; } ?>
    		</ul>
    	</div>

    	<div class="additional-info">

    		<div class="address">
    			<h3 class="site-subtitle">Address</h3>
    			<p>
    			<?php echo get_post_meta($post->ID, "address_1_wpcm_value", true); ?><br/>
    			<?php $addresstwo = get_post_meta($post->ID, "address_2_wpcm_value", true); if ( $addresstwo != '' ) { echo $addresstwo . '<br/>'; } else {} ?>
    			<?php echo get_post_meta($post->ID, "city_wpcm_value", true); ?>, <?php echo get_post_meta($post->ID, "state_wpcm_value", true); ?> <?php echo get_post_meta($post->ID, "zip_wpcm_value", true); ?><br/>
    			<?php echo get_post_meta($post->ID, "country_wpcm_value", true); ?>
    			</p>		
    		</div>
		
    		<!-- 	
    			Use the <div> <h3 class="site-subtitle"> </h3> <p> </p> </div> format
    			for best results in adding additional fields.
    		--> 
		
    	</div>

    	<div class="extra">
    		<div class="notes">
    			<!-- The "related-contacts" div floats to the upper right of the additional notes section.-->
    			<div class="related-contacts">
    				<?php if (function_exists('wp23_related_posts')) { wp23_related_posts(); } ?>
    			</div>
    			<h3 class="site-subtitle">Additional Notes</h3>
    			<?php the_content(); ?>
    		</div>
		
    		<div class="contact-tags"><?php the_tags('<span>TAGS: </span>',', ',''); ?></div>
    		<div class="contact-tags"><span>Categories</span>: <?php the_category(' '); ?></div>
    	</div>

    	<span class="clearer"></span>

      <div id="sidebar">
  			<?php edit_post_link('Edit This Contact'); ?> 
  			<a target="_blank" id="location-link" href="http://maps.google.com/maps?f=q&amp;hl=en&amp;q=<?php echo get_post_meta($post->ID, "address_1_wpcm_value", true); ?>,<?php echo get_post_meta($post->ID, "city_wpcm_value", true); ?>,<?php echo get_post_meta($post->ID, "state_wpcm_value", true); ?>,<?php echo get_post_meta($post->ID, "zip_wpcm_value", true); ?>">Map Location</a>
      	<div id="user-notes">
      		<?php comments_template(); ?>
      	</div>	
        <!-- end #sidebar -->
      </div>
      
      
    	<?php endwhile; else: ?>

    	<p>
    	<?php _e('Sorry, nothing matched your criteria.'); ?>
    	</p>

    <?php endif; ?>
    <!-- end #entry -->
    
    </div>
    
  <!-- end #content -->
  </div>

<?php get_footer(); ?>
