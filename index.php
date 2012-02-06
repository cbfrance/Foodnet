<?php get_header(); ?>
<div id="site">
<div id="content">

  <?php $has_organization = get_post_meta($post->ID, "organization_name_wpcm_value", true); ?>
  <?php $has_person_name = get_post_meta($post->ID, "contact_name_wpcm_value", true); ?>
  <?php $has_email = get_post_meta($post->ID, "email_wpcm_value", true); ?>

<iframe width='100%' height='350' frameBorder='0' src='http://a.tiles.mapbox.com/v3/upload.8hyk4sbx.html#7/35.4428/-79.3433'></iframe>

<?php get_footer(); ?>

