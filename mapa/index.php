<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
  <title>Gniewkowo mapa Osiedle 700-lecia</title>
  <link rel="stylesheet" href="jquery-jvectormap-2.0.5.css" type="text/css" media="screen"/>
  <script src="../js/jquery.js"></script>
  <script src="jquery-jvectormap-2.0.5.min.js"></script>
  <script src="jquery-jvectormap-gniewkowo.js" charset="UTF-8"></script>
</head>
<body>
  <div id="gniewkowo-map" style="width: 50vw; height: 97vh"></div>
  <script>
    $(function(){
        var map,
      markerIndex = 1,
      markersCoords = {1: {   /////// zrobić odczytywanie
    "lat": 46.10088953342537,
    "lng": -109.37540580514667
}};

      map = new jvm.Map({
        map: 'gniewkowo',
        regionStyle : {
        initial : {

          stroke : "black",
          "stroke-width" : 0.1,
          "stroke-opacity" : 1
        },
        hover : {
          stroke : "red",
          "stroke-width" : 0.3,
        },
        selectedHover : {}
      },
        /////// start etykiety
        regionLabelStyle:
            {
                initial:
                {
                    fill: '#000'
                },
                hover:
                {
                    fill: 'black'
                }
            },
            labels:
            {
                regions:
                {
                    render: function (code)
                    {
                      if (code == "700lecia2"||
                      code == "700lecia4"||
                      code == "700lecia6"||
                      code == "700lecia8"||
                      code == "700lecia10"||
                      code == "700lecia12"||
                      code == "700lecia14"||
                      code == "700lecia16"||
                      code == "700lecia18"||
                      code == "700lecia20"||
                      code == "700lecia22"||
                      code == "dreckiego1"||
                      code == "dreckiego3"||
                      code == "dreckiego5"||
                      code == "dreckiego7"||
                      code == "dreckiego9"||
                      code == "dreckiego11"||
                      code == "dreckiego13"||
                      code == "dreckiego15"||
                      code == "dreckiego17"||
                      code == "dreckiego19"

                      ) {
                       return jvm.Map.maps['gniewkowo'].paths[code].name;
                      }
                    }
                }
            },
   ////// start znaczniki

      markers: [{
     coords: [46.10088953342537, -109.37540580514667], ////////// poprawić pbo nie działa
       name: '110, 110',
      style: {fill: 'red'}
    }],

       markerStyle: {
        initial: {
          fill: 'red'
        }
      },

      container: $('#gniewkowo-map'),
      onMarkerTipShow: function(e, label, code){
        map.tip.text(markersCoords[code].lat.toFixed(2)+', '+markersCoords[code].lng.toFixed(2));
      },
      onMarkerClick: function(e, code){
        map.removeMarkers([code]);
        map.tip.hide();
      },


////////// kolory start
       series: {
            regions: [{
              scale: {
                terenwlasny: '#ffffa7ff',
                terenobcy: '#ffffff',
                terenwieczysty: '#fed3ffff',
                budyneknawieczystym: '#fe7fffff',
                budynekobcy: '#f2f2f2ff',
                budynekgospodarczy: '#f7b101ff',
                budynek: '#f7b101ff',
                garaze: '#a142feff',
                ulica: '#4d4d4dff',
                pawilon: '#5084feff',
                chodnik: '#b3b3b3ff',
                inne: '#508406ff'
               },
               attribute: 'fill',
                values: {
                  "stara_kotlownia":'budynekobcy',
                  "nowa_kotlownia":'budynekobcy',
                  "trafostacja_dz_478_33":'budynekobcy',
                  "trafostacja_dz_478_31":'budynekobcy',
                  "trafostacja_dz_478_32":'budynekobcy',
                  "staw":'inne',
                  "boisko":'inne',
                  "bud_gosp_700lecia4":'budynekgospodarczy',
                  "bud_gosp_700lecia8":'budynekgospodarczy',
                  "bud_gosp_700lecia12":'budynekgospodarczy',
                  "bud_gosp_700lecia16":'budynekgospodarczy',
                  "garaze_700l":'garaze',
                  "garaze_dreckiego":'garaze',
                  "garaze_dreckiego2":'garaze',
                  "garaz_adm":'budynekgospodarczy',
                  "dz_319_26":'terenobcy',
                  "dz_319_29":'terenobcy',
                  "dz_319_30":'terenobcy',
                  "dz_319_27":'terenobcy',
                  "dz_474_4":'terenobcy',
                  "dz_566_27":'terenobcy',
                  "dz_478_7":'terenobcy',
                  "dz_478_31":'terenobcy',
                  "dz_478_32":'terenobcy',
                  "dz_478_41":'terenobcy',
                  "dz_478_48":'terenobcy',
                  "dz_478_62":'terenobcy',
                  "dz_478_76":'terenobcy',
                  "dz_520_1":'terenobcy',
                  "dz_566_13":'terenobcy',
                  "dz_478_23":'terenobcy',
                  "dz_478_25":'terenobcy',
                  "dz_478_33":'terenobcy',
                  "dz_478_34":'terenobcy',
                  "dz_478_37":'terenobcy',
                  "dz_478_39":'terenobcy',
                  "dz_478_63":'terenobcy',
                  "dz_478_38":'terenwieczysty',
                  "dz_478_43":'terenwieczysty',
                  "dz_478_51":'terenwieczysty',
                  "dz_478_52":'terenwieczysty',
                  "dz_478_53":'terenwieczysty',
                  "dz_478_58":'terenwieczysty',
                  "dz_478_61":'terenwieczysty',
                  "dz_478_68":'terenwieczysty',
                  "dz_478_69":'terenwieczysty',
                  "dz_478_71":'terenwieczysty',
                  "dz_478_73":'terenwieczysty',
                  "dz_478_79":'terenwieczysty',
                  "chodnikiiparkingi":'chodnik',
                  "chodnikiiparkingi2":'chodnik',
                  "ulica_piasta":'ulica',
                  "ulica_inowroclawska":'ulica',
                  "ulica_dreckiego":'ulica',
                  "ulica_700lecia":'ulica',
                  "700lecia2":'budynek',
                  "700lecia4":'budynek',
                  "700lecia6":'budynek',
                  "700lecia8":'budynek',
                  "700lecia10":'budynek',
                  "700lecia10_a":'budyneknawieczystym',
                  "700lecia12":'budynek',
                  "700lecia14":'budynek',
                  "700lecia14_b":'budyneknawieczystym',
                  "700lecia16":'budynek',
                  "700lecia18":'pawilon',
                  "700lecia18_2":'pawilon',
                  "700lecia18_b":'pawilon',
                  "700lecia20":'budynek',
                  "700lecia22":'budynek',
                  "dreckiego1":'budynek',
                  "dreckiego3":'budynek',
                  "dreckiego5":'budynek',
                  "dreckiego7":'budynek',
                  "dreckiego9":'budynek',
                  "dreckiego11":'budynek',
                  "dreckiego13":'budynek',
                  "dreckiego15":'budynek',
                  "dreckiego17":'budynek',
                  "dreckiego19":'pawilon',
                  "dz_700lecia2":'terenwlasny',
                  "dz_700lecia4":'terenwlasny',
                  "dz_700lecia6":'terenwlasny',
                  "dz_700lecia8":'terenwlasny',
                  "dz_700lecia10":'terenwlasny',
                  "dz_700lecia12":'terenwlasny',
                  "dz_700lecia14":'terenwlasny',
                  "dz_700lecia16":'terenwlasny',
                  "dz_700lecia18":'terenwieczysty',
                  "dz_700lecia20":'terenwlasny',
                  "dz_700lecia22":'terenwlasny',
                  "dz_dreckiego1":'terenwlasny',
                  "dz_dreckiego3":'terenwlasny',
                  "dz_dreckiego5":'terenwlasny',
                  "dz_dreckiego7":'terenwlasny',
                  "dz_dreckiego9":'terenwlasny',
                  "dz_dreckiego11":'terenwlasny',
                  "dz_dreckiego13":'terenwlasny',
                  "dz_dreckiego15":'terenwlasny',
                  "dz_dreckiego17":'terenwlasny',
                  "dz_dreckiego19":'terenwieczysty'
                }
               //// ,
       /// legend: {
        ///  vertical: true,
        ///  title: 'Legenda'
      ///////  }

            }]
        }


      });
      map.container.click(function(e){
      var latLng = map.pointToLatLng(
              e.pageX - map.container.offset().left,
              e.pageY - map.container.offset().top
          ),
          targetCls = $(e.target).attr('class');

      if (latLng && (!targetCls || (targetCls && $(e.target).attr('class').indexOf('jvectormap-marker') === -1))) {
        markersCoords[markerIndex] = latLng;
        map.addMarker(markerIndex, {latLng: [latLng.lat, latLng.lng]});
        markerIndex += 1;
      }
      console.log(markersCoords);
  });
    });
  </script>
</body>
</html>