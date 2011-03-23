<?php get_header(); ?>
<div id="site">
<div id="content">

  <?php $has_organization = get_post_meta($post->ID, "organization_name_wpcm_value", true); ?>
  <?php $has_person_name = get_post_meta($post->ID, "contact_name_wpcm_value", true); ?>
  <?php $has_email = get_post_meta($post->ID, "email_wpcm_value", true); ?>

<!-- ================= -->
<!-- = google style  = -->
<!-- ================= -->

<!-- <iframe id="mapframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?&amp;t=k&amp;f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=http:%2F%2Froguegenius.com%2Furbanfarming%2Fpython%2Fdirme.2010-07-19.0539.kml&amp;sll=37.0625,-95.677068&amp;sspn=40.460237,79.013672&amp;ie=UTF8&amp;ll=35.869021,-79.917297&amp;spn=1.297561,3.515625&amp;output=embed"></iframe> 
</div> -->



<!-- ============ -->
<!-- = polymaps = -->
<!-- ============ -->

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


<!-- load the kml, something like this:  -->
<!-- var geoxml = new CM.GeoXml('eqs7day-M2.5.xml', {local:true} ); -->



<div id="cm-example" style="width: 100%; height: 500px"></div>

<script type="text/javascript" src="http://tile.cloudmade.com/wml/latest/web-maps-lite.js"></script>
 <script type="text/javascript">
   var cloudmade = new CM.Tiles.CloudMade.Web({key: '12aa5b315c7d4067941bf66d78669dcf', styleId:33922});
   var map = new CM.Map('cm-example', cloudmade);
   map.setCenter(new CM.LatLng( 35.923, -79.7442), 7);
   var geoxml = new CM.GeoXml('/wp-content/themes/Foodnet/foodnet.kml', {local:true} );
   
   CM.Event.addListener(geoxml, 'load', function() {
       map.addOverlay(geoxml);
     });
     
 </script>
 
</div>

<?php get_footer(); ?>