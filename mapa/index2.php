<!DOCTYPE html>
<html>
<head>
  <title>jVectorMap demo</title>
  <link rel="stylesheet" href="jquery-jvectormap-2.0.5.css" type="text/css" media="screen"/>
  <script src="../js/jquery.js"></script>
  <script src="jquery-jvectormap-2.0.5.min.js"></script>
  <script src="jquery-jvectormap-gniewkowo.js"></script>
</head>
<body>
  <div id="gniewkowo-map" style="width: 500px; height: 500px"></div>
  <script>
 $(function(){
      var map,
          markerIndex = 0,
          markersCoords = {};

      map = new jvm.Map({
          map: 'gniewkowo',
          markerStyle: {
            initial: {
              fill: 'red'
            }
          },
          container: $('#gniewkowo-map'),
          onMarkerTipShow: function(e, tip, code){
            map.tip.text(markersCoords[code].lat.toFixed(2)+' '+markersCoords[code].lng.toFixed(2));
          },
          onMarkerClick: function(e, code){
            map.removeMarkers([code]);
            map.tip.hide();
          }
      });

      $('#gniewkowo-map').click(function(e){
          var x = e.pageX - map.container.offset().left,
              y = e.pageY - map.container.offset().top,
              latLng = map.pointToLatLng(x, y),
              targetCls = $(e.target).attr('class');

          if (latLng && (!targetCls || targetCls.indexOf('jvectormap-marker') === -1)) {
            markersCoords[markerIndex] = latLng;
            map.addMarker(markerIndex, {latLng: [latLng.lat, latLng.lng]});
            markerIndex += 1;
          }
      });
      $('#gniewkowo-map').bind('');
    });
  </script>
</body>
</html>