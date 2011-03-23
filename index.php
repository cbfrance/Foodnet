<?php get_header(); ?>
<div id="site">
<div id="content">

  <?php $has_organization = get_post_meta($post->ID, "organization_name_wpcm_value", true); ?>
  <?php $has_person_name = get_post_meta($post->ID, "contact_name_wpcm_value", true); ?>
  <?php $has_email = get_post_meta($post->ID, "email_wpcm_value", true); ?>

<!-- ================= -->
<!-- = google style  = -->
<!-- ================= -->



<!-- <style type="text/css" media="screen">
  #map {
    width: 800px;
  }
</style>

<div id="map"></div>

<script type="text/javascript" charset="utf-8">
  
  var po = org.polymaps;

  var map = po.map()
      .container(document.getElementById("map").appendChild(po.svg("svg")))
      .add(po.interact())
      .add(po.hash());
      
  map.add(po.image()
      .url(po.url("http://{S}tile.cloudmade.com"
      + "/12aa5b315c7d4067941bf66d78669dcf" // http://cloudmade.com/register
      + "/20760/256/{Z}/{X}/{Y}.png")
      .hosts(["a.", "b.", "c.", ""])));

  map.add(po.compass()
      .pan("none"));
      
</script> -->

<!-- 12708 is a nice map-->



<div id="cm-example" style="width: 100%; height: 500px"></div>

<script type="text/javascript" src="http://tile.cloudmade.com/wml/latest/web-maps-lite.js"></script>
 <script type="text/javascript">
   var cloudmade = new CM.Tiles.CloudMade.Web({key: '12aa5b315c7d4067941bf66d78669dcf', styleId:33922});
   var map = new CM.Map('cm-example', cloudmade);
   map.setCenter(new CM.LatLng( 35.923, -79.7442), 7);
   
 </script>
 
</div>

<?php get_footer(); ?>