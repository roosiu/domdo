<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
  <title>jVectorMap demo</title>
  <link rel="stylesheet" href="jquery-jvectormap-2.0.5.css" type="text/css" media="screen"/>
  <script src="../js/jquery.js"></script>
  <script src="jquery-jvectormap-2.0.5.min.js"></script>
  <script src="jquery-jvectormap-gniewkowo.js" charset="UTF-8"></script>
</head>
<body>
  <div id="gniewkowo-map" style="width: 50vw; height: 97vh"></div>
  <script>
    $(function(){
      $('#gniewkowo-map').vectorMap({
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
          coords: [60, 110],
          name: 'punkt1',
          style: {fill: 'red'}
       }],
       markerStyle: {
        initial: {
          fill: 'red'
        }
      },


////////// kolory start
       series: {
            regions: [{
                values: {
                  "stara_kotlownia":'#f2f2f2ff',
                  "nowa_kotlownia":'#f2f2f2ff',
                  "trafostacja_dz_478_33":'#f2f2f2ff',
                  "trafostacja_dz_478_31":'#f2f2f2ff',
                  "trafostacja_dz_478_32":'#f2f2f2ff',
                  "staw":'#508406ff',
                  "boisko":'#508406ff',
                  "bud_gosp_700lecia4":'#f7b101ff',
                  "bud_gosp_700lecia8":'#f7b101ff',
                  "bud_gosp_700lecia12":'#f7b101ff',
                  "bud_gosp_700lecia16":'#f7b101ff',
                  "garaze_700l":'#a142feff',
                  "garaze_dreckiego":'#a142feff',
                  "garaze_dreckiego2":'#a142feff',
                  "garaz_adm":'#5084feff',
                  "dz_319_26":'#ffffff',
                  "dz_319_29":'#ffffff',
                  "dz_319_30":'#ffffff',
                  "dz_319_27":'#ffffff',
                  "dz_474_4":'#ffffff',
                  "dz_566_27":'#ffffff',
                  "dz_478_7":'#ffffff',
                  "dz_478_31":'#ffffff',
                  "dz_478_32":'#ffffff',
                  "dz_478_41":'#ffffff',
                  "dz_478_48":'#ffffff',
                  "dz_478_62":'#ffffff',
                  "dz_478_76":'#ffffff',
                  "dz_520_1":'#ffffff',
                  "dz_566_13":'#ffffff',
                  "dz_478_23":'#ffffff',
                  "dz_478_25":'#ffffff',
                  "dz_478_33":'#ffffff',
                  "dz_478_34":'#ffffff',
                  "dz_478_37":'#ffffff',
                  "dz_478_39":'#ffffff',
                  "dz_478_63":'#ffffff',
                  "dz_478_38":'#fed3ffff',
                  "dz_478_43":'#fed3ffff',
                  "dz_478_51":'#fed3ffff',
                  "dz_478_52":'#fed3ffff',
                  "dz_478_53":'#fed3ffff',
                  "dz_478_58":'#fed3ffff',
                  "dz_478_61":'#fed3ffff',
                  "dz_478_68":'#fed3ffff',
                  "dz_478_69":'#fed3ffff',
                  "dz_478_71":'#fed3ffff',
                  "dz_478_73":'#fed3ffff',
                  "dz_478_79":'#fed3ffff',
                  "chodnikiiparkingi":'#b3b3b3ff',
                  "chodnikiiparkingi2":'#b3b3b3ff',
                  "ulica_piasta":'#4d4d4dff',
                  "ulica_inowroclawska":'#4d4d4dff',
                  "ulica_dreckiego":'#4d4d4dff',
                  "ulica_700lecia":'#4d4d4dff',
                  "700lecia2":'#f7b101ff',
                  "700lecia4":'#f7b101ff',
                  "700lecia6":'#f7b101ff',
                  "700lecia8":'#f7b101ff',
                  "700lecia10":'#f7b101ff',
                  "700lecia10_a":'#fe7fffff',
                  "700lecia12":'#f7b101ff',
                  "700lecia14":'#f7b101ff',
                  "700lecia14_b":'#fe7fffff',
                  "700lecia16":'#f7b101ff',
                  "700lecia18":'#5084feff',
                  "700lecia18_2":'#5084feff',
                  "700lecia18_b":'#5084feff',
                  "700lecia20":'#f7b101ff',
                  "700lecia22":'#f7b101ff',
                  "dreckiego1":'#f7b101ff',
                  "dreckiego3":'#f7b101ff',
                  "dreckiego5":'#f7b101ff',
                  "dreckiego7":'#f7b101ff',
                  "dreckiego9":'#f7b101ff',
                  "dreckiego11":'#f7b101ff',
                  "dreckiego13":'#f7b101ff',
                  "dreckiego15":'#f7b101ff',
                  "dreckiego17":'#f7b101ff',
                  "dreckiego19":'#5084feff',
                  "dz_700lecia2":'#ffffa7ff',
                  "dz_700lecia4":'#ffffa7ff',
                  "dz_700lecia6":'#ffffa7ff',
                  "dz_700lecia8":'#ffffa7ff',
                  "dz_700lecia10":'#ffffa7ff',
                  "dz_700lecia12":'#ffffa7ff',
                  "dz_700lecia14":'#ffffa7ff',
                  "dz_700lecia16":'#ffffa7ff',
                  "dz_700lecia18":'#fed3ffff',
                  "dz_700lecia20":'#ffffa7ff',
                  "dz_700lecia22":'#ffffa7ff',
                  "dz_dreckiego1":'#ffffa7ff',
                  "dz_dreckiego3":'#ffffa7ff',
                  "dz_dreckiego5":'#ffffa7ff',
                  "dz_dreckiego7":'#ffffa7ff',
                  "dz_dreckiego9":'#ffffa7ff',
                  "dz_dreckiego11":'#ffffa7ff',
                  "dz_dreckiego13":'#ffffa7ff',
                  "dz_dreckiego15":'#ffffa7ff',
                  "dz_dreckiego17":'#ffffa7ff',
                  "dz_dreckiego19":'#fed3ffff'
                }
            }]
        },


      });
    });
  </script>
</body>
</html>