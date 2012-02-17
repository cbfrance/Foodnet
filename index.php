<?php get_header(); ?>
<div id="site">
<div id="content">

  <?php $has_organization = get_post_meta($post->ID, "organization_name_wpcm_value", true); ?>
  <?php $has_person_name = get_post_meta($post->ID, "contact_name_wpcm_value", true); ?>
  <?php $has_email = get_post_meta($post->ID, "email_wpcm_value", true); ?>

<iframe width='500' height='300' frameBorder='0' src='http://a.tiles.mapbox.com/v3/cgblow.nc-food-net.html#7/35.443/-79.343'></iframe>

<div id="modestmaps-setup"></div>
<script>

var tilejson = {
  tilejson: '1.0.0',
  scheme: 'xyz',
  tiles: ['http://a.tiles.mapbox.com/v3/mapbox.world-light/{z}/{x}/{y}.png']
};

var url = 'http://api.tiles.mapbox.com/v3/mapbox.world-light.jsonp';
var mm = com.modestmaps;
wax.tilejson(url, function(tilejson) {
      var m = new mm.Map('modestmaps-setup',
      new wax.mm.connector(tilejson),
      new mm.Point(240,120));
      m.setCenterZoom(new mm.Location(39, -98), 2);
});
</script>

-->

<?php get_footer(); ?>

