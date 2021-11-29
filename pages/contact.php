<style>
  #mapid {
    height: 655px;
    width: 500px;
  }
</style>

<section class="container mt-5 d-flex justify-content-between">
   <div>
    <h3 class="display-6 mb-3">Contact Us</h3>
    <div id="mapid" class="ml-auto mr-auto"></div>
   </div>
   <?php include('include/quick-links.html');?>
</section>

<script>
  var mymap = L.map('mapid').setView([10.7298174, 122.546533], 15);

  L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWZhdWxhbjEyIiwiYSI6ImNrcDIzMjlsbjFxNHgybnFnaHlndXh4M3YifQ.Z1QcorEXTRnFQSRWrm6KZg', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoibWZhdWxhbjEyIiwiYSI6ImNrcDIzMjlsbjFxNHgybnFnaHlndXh4M3YifQ.Z1QcorEXTRnFQSRWrm6KZg'
  }).addTo(mymap);
</script>