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
      $('#gniewkowo-map').vectorMap({
        map: 'gniewkowo',
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
                      if (code == "700lecia2"||code == "700lecia4"||code == "700lecia6"||code == "700lecia8"||code == "700lecia10"||code == "700lecia12"||code == "700lecia14"||code == "700lecia16"||code == "700lecia18"||code == "700lecia20"||code == "700lecia22") {
                       return jvm.Map.maps['gniewkowo'].paths[code].name;
                      }
                    }
                }
            },
   ////// start znaczniki
        markers: [{
          coords: [60, 110],
          name: 'punkt1',
          style: {fill: 'yellow'}
       }],

////////// kolory start
       series: {
            regions: [{
                values: {
                  "staw":'#508406ff',
                  "dz_478_68":'#fed3ffff',
                  "dz_478_69":'#fed3ffff',
                  "chodnikiiparkingi":'#b3b3b3ff',
                  "ulica_piasta":'#4d4d4dff',
                  "ulica_inowroclawska":'#4d4d4dff',
                  "ulica_dreckiego":'#4d4d4dff',
                  "ulica_700lecia":'#4d4d4dff',
                  "700lecia2":'#f7b101ff',
                  "700lecia4":'#f7b101ff',
                  "700lecia6":'#f7b101ff',
                  "700lecia8":'#f7b101ff',
                  "700lecia10":'#f7b101ff',
                  "700lecia12":'#f7b101ff',
                  "700lecia14":'#f7b101ff',
                  "700lecia16":'#f7b101ff',
                  "700lecia18":'#f7b101ff',
                  "700lecia20":'#f7b101ff',
                  "700lecia22":'#f7b101ff',
                  "dz_700lecia2":'#ffffa7ff',
                  "dz_700lecia4":'#ffffa7ff',
                  "dz_700lecia6":'#ffffa7ff',
                  "dz_700lecia8":'#ffffa7ff',
                  "dz_700lecia10":'#ffffa7ff',
                  "dz_700lecia12":'#ffffa7ff',
                  "dz_700lecia14":'#ffffa7ff',
                  "dz_700lecia16":'#ffffa7ff',
                  "dz_700lecia18":'#ffffa7ff',
                  "dz_700lecia20":'#ffffa7ff',
                  "dz_700lecia22":'#ffffa7ff'
                }
            }]
        },


      });
    });
  </script>
</body>
</html>