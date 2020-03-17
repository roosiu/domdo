function urlopliczenie(pracownik) {
console.log(pracownik);

};

$(window).on("load", function() {
    $("table:first tr").each(function(){
        to = parseInt($(this).find("td:eq(4)").html());
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
        $(this).find("td:eq(4)").html(to+"godz. ("+to_dni+"dni "+info+")");
    });

});