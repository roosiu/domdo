

$(window).on("load", function() {
    $("table:first tr").each(function(){

    });

});

function urlopliczenie(pracownik, objilelat) {
    uw_godziny_ogolem = {};
    $.each( pracownik, function( select, value ) {
        if(value == ""){  }
        else {

            if( value.indexOf("UW:2") != -1 ) {uw_2 = (value.match(/UW:2/g)).length;} else {uw_2 = "0";}
            if( value.indexOf("UW:4") != -1 ) {uw_4 = (value.match(/UW:4/g)).length;} else {uw_4 = "0";}
            if( value.indexOf("UW:8") != -1 ) {uw_8 = (value.match(/UW:8/g)).length;} else {uw_8 = "0";}
            if( value.indexOf("UW:9") != -1 ) {uw_9 = (value.match(/UW:9/g)).length;} else {uw_9 = "0";}
            if( value.indexOf("UW:7") != -1 ) {uw_7 = (value.match(/UW:7/g)).length;} else {uw_7 = "0";}
            uw_godziny_ogolem[select] = (uw_2*2+uw_4*4+uw_8*8+uw_9*9+uw_7*7);


            if( value.indexOf("CH") != -1 ) {ch = (value.match(/CH/g)).length;} else {ch = "0";}
            if( value.indexOf("UW") != -1 ) {uw = (value.match(/UW/g)).length;} else {uw = "0";}
            if( value.indexOf("WN") != -1 ) {wn = (value.match(/WN/g)).length;} else {wn = "0";}
            if( value.indexOf("NP") != -1 ) {np = (value.match(/NP/g)).length;} else {np = "0";}
            if( value.indexOf("NP") != -1 ) {np = (value.match(/NP/g)).length;} else {np = "0";}
            if( value.indexOf("UOK") != -1 ) {uok = (value.match(/UOK/g)).length;} else {uok = "0";}
            if( value.indexOf("OP") != -1 ) {op = (value.match(/OP/g)).length;} else {op = "0";}

            $("tr:contains("+select+")").find("td:eq(6)").append("<i>|UW:</i>"+uw+"|<i>CH:</i>"+ch+"|<i>WN:</i>"+wn+"|<br/>|<i>NP:</i>"+np+"|<i>UOK:</i>"+uok+"|<i>OP:</i>"+op+"|");
            ///  $("tr:contains("+select+")").find("td:eq(6)").append(value);

        };
    });


    $.each( objilelat, function( select, value ) {
        if(value == ""){  }
        else {

            to = parseInt($("tr:contains("+select+")").find("td:eq(4)").html());
        if(to == 208){
            dzielenie = 8;
            info = "etat: 1";
        } else if (to == 104){
            dzielenie = 4;
            info = "etat: 1/2";
        } else if (to == 52){
            dzielenie = 2;
            info = "etat: 1/4";
        }else if (to == 160){
            dzielenie = 8;
            info = "etat: 1";
        }else {
            dzielenie = 8;
            info = "etat: ?";
        }

        to_dni = to/dzielenie;
        $("tr:contains("+select+")").find("td:eq(4)").html(to+"godz. ("+to_dni+"dni "+info+")");

        godziny_od_poczatku = value*to;
        dni_od_poczatku = godziny_od_poczatku/dzielenie;
        godziny_po_odjeciu = godziny_od_poczatku - (uw_godziny_ogolem[select]);
        dni_po_odjeciu = godziny_po_odjeciu/dzielenie;

            $("tr:contains("+select+")").find("td:eq(6)").append("<br/>|<u>pozostało <i>UW:</i><br/>"+godziny_po_odjeciu+"godz.(<b>"+dni_po_odjeciu+"dni</b>)</u>|");
          ///  $("tr:contains("+select+")").find("td:eq(6)").append(value);

        };
    });


};

